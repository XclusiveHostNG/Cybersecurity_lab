# Lab Scripts

This directory contains helper scripts used to automate routine maintenance and auditing tasks within the lab. Each script includes inline documentation describing prerequisites and usage examples.

- `audit_lab.sh` — Verifies that core services are reachable and security controls are active. Run it daily or after maintenance windows to confirm that hosts, web services, and EDR agents respond as expected.

Additional scripts can be added following the naming convention `<purpose>_<area>.sh` and should:

1. Accept configuration via environment variables or command-line flags.
2. Emit structured logs that can be shipped to the monitoring stack.
3. Exit with meaningful status codes for integration with CI pipelines.
