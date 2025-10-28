# Build and Validation Checklist

Use this checklist during the initial lab deployment or when rebuilding from scratch. Mark each item as complete to ensure the
environment is secure, documented, and ready for exercises.

## Phase 1: Planning

- [ ] Objectives and success criteria documented in `docs/setup-guide.md`.
- [ ] Bill of materials created from `docs/templates/bom-template.csv`.
- [ ] Network IP plan recorded (management, production, attack VLANs).
- [ ] Backup strategy defined with retention targets.

## Phase 2: Infrastructure Provisioning

- [ ] Hypervisor installed, patched, and restricted to management network.
- [ ] pfSense VM/appliance deployed with VLAN interfaces configured.
- [ ] Core services (AD DS, DNS, NTP) provisioned and verified.
- [ ] Storage snapshots and off-site backup jobs scheduled.

## Phase 3: Baseline Security

- [ ] CIS-aligned hardening applied via `automation/ansible/playbooks/hardening.yml`.
- [ ] Sysmon configuration deployed to Windows hosts.
- [ ] Linux auditd profiles enabled and forwarding to SIEM.
- [ ] Administrative credentials stored in password manager and MFA enabled.

## Phase 4: Monitoring & Logging

- [ ] Elastic + Graylog stacks operational and receiving telemetry from all hosts.
- [ ] Wazuh manager enrolled endpoints and alert routing tested.
- [ ] `scripts/audit_lab.sh` run with successful connectivity checks.
- [ ] Daily log review workflow documented in `operations/runbooks/log-review.md`.

## Phase 5: Validation & Documentation

- [ ] Smoke tests executed (login to AD, browse internal web apps, run sample attack).
- [ ] Purple team exercise scheduled and tracked in `docs/operational-calendar.md`.
- [ ] Findings recorded in `journey/` with remediation tasks linked to backlog.
- [ ] Repository README updated with any new directories or tools.

Sign and date the checklist to maintain an audit trail of lab builds:

```
Completed by: ____________________   Date: _____________
```
