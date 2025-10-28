#!/usr/bin/env python3
"""Track update status for lab virtual machines."""

from __future__ import annotations

import argparse
import datetime as dt
import json
from pathlib import Path
from typing import Dict, List

CHECKLIST_FILE = Path(__file__).resolve().parent / "update_checklist.json"
DEFAULT_SYSTEMS = [
    "kali-lab",
    "metasploitable",
    "security-onion",
    "pfsense",
]


def load_checklist() -> Dict[str, str]:
    if CHECKLIST_FILE.exists():
        return json.loads(CHECKLIST_FILE.read_text(encoding="utf-8"))
    return {system: "pending" for system in DEFAULT_SYSTEMS}


def save_checklist(data: Dict[str, str]) -> None:
    CHECKLIST_FILE.write_text(json.dumps(data, indent=2), encoding="utf-8")


def mark_system(system: str, status: str) -> None:
    data = load_checklist()
    data[system] = f"{status} ({dt.date.today().isoformat()})"
    save_checklist(data)


def list_status() -> None:
    data = load_checklist()
    print("System Update Status:\n")
    for system, status in sorted(data.items()):
        print(f"- {system}: {status}")


def parse_args(argv: List[str] | None = None) -> argparse.Namespace:
    parser = argparse.ArgumentParser(description="Update lab patching checklist.")
    parser.add_argument("system", nargs="?", help="Name of the system to update")
    parser.add_argument(
        "--status",
        default="updated",
        choices=["updated", "skipped", "pending"],
        help="Status to record for the system",
    )
    parser.add_argument(
        "--list",
        action="store_true",
        help="List current status for all systems",
    )
    return parser.parse_args(argv)


def main() -> None:
    args = parse_args()
    if args.list or not args.system:
        list_status()
        return
    mark_system(args.system, args.status)
    print(f"Recorded {args.status} for {args.system}")


if __name__ == "__main__":
    main()
