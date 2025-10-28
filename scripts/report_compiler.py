#!/usr/bin/env python3
"""Aggregate lab notes into a single markdown report.

This helper searches for completed lab report templates across the repository
and concatenates them into a timestamped report saved under
`labs/_compiled_reports/`.
"""

from __future__ import annotations

import argparse
import datetime as dt
import pathlib
from typing import Iterable, List

REPO_ROOT = pathlib.Path(__file__).resolve().parents[1]
REPORT_DIR = REPO_ROOT / "labs" / "_compiled_reports"
DEFAULT_GLOB = "**/reports/*report*.md"


def find_reports(pattern: str) -> Iterable[pathlib.Path]:
    for path in REPO_ROOT.glob(pattern):
        if path.is_file():
            yield path


def compile_reports(paths: Iterable[pathlib.Path]) -> str:
    sections: List[str] = []
    for report in sorted(paths):
        relative = report.relative_to(REPO_ROOT)
        header = f"# {relative}\n"
        sections.append(header)
        sections.append(report.read_text(encoding="utf-8"))
        sections.append("\n\n")
    return "".join(sections)


def write_output(content: str, prefix: str) -> pathlib.Path:
    REPORT_DIR.mkdir(exist_ok=True)
    timestamp = dt.datetime.now().strftime("%Y%m%d-%H%M%S")
    filename = f"{prefix}_{timestamp}.md"
    output_path = REPORT_DIR / filename
    output_path.write_text(content, encoding="utf-8")
    return output_path


def main() -> None:
    parser = argparse.ArgumentParser(description="Compile lab reports into a single markdown file.")
    parser.add_argument(
        "--pattern",
        default=DEFAULT_GLOB,
        help="Glob pattern for locating report files (default: %(default)s)",
    )
    parser.add_argument(
        "--prefix",
        default="lab_compilation",
        help="Filename prefix for the generated report",
    )
    args = parser.parse_args()

    reports = list(find_reports(args.pattern))
    if not reports:
        raise SystemExit("No reports found. Update the pattern or add completed reports before running.")

    compiled = compile_reports(reports)
    output_path = write_output(compiled, args.prefix)
    print(f"[+] Compiled {len(reports)} reports into {output_path.relative_to(REPO_ROOT)}")


if __name__ == "__main__":
    main()
