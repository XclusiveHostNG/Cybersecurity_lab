#!/usr/bin/env python3
"""Generate an ASCII tree representation of the repository.

This utility mirrors the output of the `tree` command but is implemented in
pure Python so it works on systems where the external binary is unavailable.
It is primarily used to refresh the file listing embedded in
`docs/repo-structure.md`.
"""
from __future__ import annotations

import argparse
import sys
from pathlib import Path
from typing import Iterable, List

# Directories and files to skip when rendering the tree. Hidden directories are
# ignored automatically, but the list is configurable via CLI flags.
DEFAULT_EXCLUDES = {".git", "__pycache__", ".pytest_cache", ".venv"}


def parse_args(argv: Iterable[str]) -> argparse.Namespace:
    parser = argparse.ArgumentParser(description=__doc__)
    parser.add_argument(
        "root",
        nargs="?",
        default=Path.cwd(),
        type=Path,
        help="Root directory to render (defaults to the current working directory)",
    )
    parser.add_argument(
        "-o",
        "--output",
        type=Path,
        help="Optional file path to write the tree to. Defaults to stdout.",
    )
    parser.add_argument(
        "-l",
        "--label",
        default=".",
        help="Label used for the root of the tree (defaults to '.')",
    )
    parser.add_argument(
        "-x",
        "--exclude",
        action="append",
        default=[],
        help="Additional glob patterns or directory names to exclude.",
    )
    parser.add_argument(
        "--max-depth",
        type=int,
        default=None,
        help="Limit recursion to the specified depth (1 = show direct children only).",
    )
    return parser.parse_args(argv)


def should_skip(path: Path, excludes: set[str]) -> bool:
    """Return True if the path should not appear in the rendered tree."""
    name = path.name
    if name.startswith(".") and name not in {".gitignore"}:
        return True
    return any(part in excludes for part in path.parts)


def list_entries(directory: Path, excludes: set[str]) -> List[Path]:
    """Return sorted children of *directory* filtered using *excludes*."""
    entries: List[Path] = []
    for entry in directory.iterdir():
        if should_skip(entry, excludes):
            continue
        entries.append(entry)
    entries.sort(key=lambda p: (p.is_file(), p.name.lower()))
    return entries


def render_tree(directory: Path, prefix: str, excludes: set[str], depth: int, max_depth: int | None) -> List[str]:
    """Recursively build tree lines for *directory*."""
    if max_depth is not None and depth >= max_depth:
        return []

    entries = list_entries(directory, excludes)
    lines: List[str] = []
    last_index = len(entries) - 1

    for index, entry in enumerate(entries):
        connector = "└── " if index == last_index else "├── "
        lines.append(f"{prefix}{connector}{entry.name}")

        if entry.is_dir():
            extension = "    " if index == last_index else "│   "
            lines.extend(
                render_tree(
                    entry,
                    prefix=f"{prefix}{extension}",
                    excludes=excludes,
                    depth=depth + 1,
                    max_depth=max_depth,
                )
            )
    return lines


def main(argv: Iterable[str] | None = None) -> int:
    args = parse_args(sys.argv[1:] if argv is None else argv)
    root = args.root.resolve()

    if not root.exists() or not root.is_dir():
        sys.stderr.write(f"error: {root} is not a directory\n")
        return 1

    excludes = DEFAULT_EXCLUDES.union(set(args.exclude))
    lines = [args.label]
    lines.extend(render_tree(root, prefix="", excludes=excludes, depth=0, max_depth=args.max_depth))
    output = "\n".join(lines) + "\n"

    if args.output:
        args.output.write_text(output, encoding="utf-8")
    else:
        sys.stdout.write(output)
    return 0


if __name__ == "__main__":
    raise SystemExit(main())
