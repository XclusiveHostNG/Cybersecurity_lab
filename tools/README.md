# Tools and Reusable Artifacts

The `tools/` directory houses configuration exports, datasets, and detection content referenced throughout the lab guides and exercises.

## Directory Map
- `config_backups/` – pfSense and other appliance configuration exports.
- `datasets/` – Sample logs and packet captures used in analysis labs.
- `detections/` – Sigma, Suricata, and OSSEC rules engineered during the threat-hunting sprint.

## Usage Guidelines
- Do not commit sensitive credentials or proprietary data. Use sanitized samples only.
- When adding a new dataset, include a README describing its origin, timeframe, and any modifications.
- Version control detection rules with descriptive filenames (e.g., `sigma_kerberos_bruteforce.yml`).

> **Reminder:** Large binary files (over 50 MB) should be stored outside of Git and referenced with download instructions instead.
