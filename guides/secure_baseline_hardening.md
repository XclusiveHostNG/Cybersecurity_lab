# Secure Baseline Hardening Guide

This guide captures the baseline security configurations applied across all lab machines to maintain consistency.

## Account Policies

- Enforce strong passwords (minimum 14 characters, complexity requirements enabled).
- Configure automatic lockouts after five failed login attempts.
- Disable unused default accounts and document any service accounts created.

## Patch Management

- Schedule weekly patch windows for each VM.
- Use `scripts/update_checklist.py` to log completed updates.
- Maintain snapshots prior to patching to enable quick rollback if issues arise.

## Logging and Monitoring

- Forward syslog events from Linux systems to the Security Onion VM.
- Enable Windows Event Forwarding where applicable.
- Store logs for at least 30 days within the lab environment.

## Backup Strategy

- Export critical VMs monthly and store them offline.
- Backup the `labs/` directory weekly to encrypted external storage.
- Verify backups quarterly by performing restoration drills.

## Change Management

- Record significant configuration changes in `docs/security_controls.md`.
- Use Git commits with descriptive messages referencing the affected VM.
- Review changes during monthly lab retrospectives to identify improvement areas.
