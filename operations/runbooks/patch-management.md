# Patch Management Runbook

Use this runbook to execute monthly patch cycles across lab assets while minimizing downtime and ensuring rollback paths.

## Pre-Maintenance

1. Review `operations/service-catalog.md` to confirm patch scope and maintenance windows.
2. Notify stakeholders via the lab communication channel at least 48 hours prior.
3. Verify recent backups and VM snapshots exist for all in-scope systems.
4. Stage patches in a testing VLAN and validate functionality on clone VMs.

## Execution Steps

1. Place affected systems into maintenance mode within monitoring tools.
2. Apply hypervisor updates first (`apt update && apt full-upgrade` on Proxmox), then reboot during the window.
3. Patch pfSense using the web UI, validate firewall rules, and confirm VPN availability.
4. Update Windows systems with WSUS Offline or Windows Update for Business; run `gpupdate /force` after completion.
5. Apply Linux patches using `unattended-upgrades` or Ansible `apt` module; reboot if kernels are updated.
6. Remove maintenance windows and confirm services register as healthy in `audit_lab.sh` output.

## Post-Maintenance Validation

- Run functional tests for critical services (AD authentication, SIEM log ingestion, VPN login).
- Capture version numbers and patch IDs in the change ticket.
- Monitor logs for anomalies for 24 hours and roll back using snapshots if required.

## Rollback Strategy

1. If a service fails validation, revert to the latest snapshot or backup.
2. Document the failure, including logs and root cause, in the runbook history section.
3. Re-schedule the patch after remediation steps are identified.
