# Lab Hardening Checklist

Use this checklist before and after running exercises to ensure the lab remains controlled and resilient.

## Pre-Exercise

- [ ] Verify all VMs are connected to correct host-only networks
- [ ] Confirm snapshots (`baseline-*`) are current
- [ ] Ensure monitoring sensors (Security Onion, ELK) are operational
- [ ] Review change logs in `resources/lab-journal.md`
- [ ] Disable unused USB pass-through devices

## During Exercise

- [ ] Record commands executed on offensive hosts
- [ ] Capture network traffic samples for later analysis
- [ ] Monitor SIEM dashboards for correlated alerts
- [ ] Note anomalies or unexpected system behavior

## Post-Exercise

- [ ] Revert targets to snapshots or re-run provisioning scripts
- [ ] Archive logs and packet captures to `resources/artifacts/`
- [ ] Update `resources/inventory.csv` with any IP/MAC changes
- [ ] Document lessons learned in the journal
- [ ] Plan remediation steps for exploited vulnerabilities

## Periodic Maintenance

- [ ] Patch management run completed (monthly)
- [ ] Backup export validated (monthly)
- [ ] Credential rotation performed (quarterly)
- [ ] Incident response tabletop executed (semi-annually)
- [ ] Tooling audit conducted (annually)
