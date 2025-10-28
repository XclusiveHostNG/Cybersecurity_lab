# Secure Lab Setup Guide

This guide walks through the process of standing up the cybersecurity lab from bare metal to a fully monitored, automation-ready
environment. Follow it sequentially or jump to the section relevant to your current phase.

## 1. Define Objectives and Scope

1. **Document learning goals:** Red vs. blue focus, certifications in progress, or tooling you want to master.
2. **Identify constraints:** Budget, power availability, physical space, and acceptable noise/heat levels.
3. **Capture success criteria:** e.g., "Detect a simulated ransomware outbreak in under 10 minutes."

> 📓 Use `journey/` to record why each decision was made and how it aligned with your goals.

## 2. Prepare Hardware & Host OS

1. **Select hardware:** Minimum 8 cores / 64 GB RAM / 2x1 TB SSD for hypervisor, plus managed switch with VLAN support.
2. **Install base OS:** Use the latest Proxmox VE or VMware ESXi ISO. Enable virtualization extensions (VT-x/AMD-V) in BIOS.
3. **Network layout:** Reserve VLAN IDs and IP ranges for Management, Production, and Attack segments.
4. **Out-of-band access:** Configure IPMI or equivalent to allow remote recovery.

## 3. Secure the Hypervisor

1. **Patch immediately:** `apt update && apt full-upgrade` (Proxmox) or run vendor patch bundle for ESXi.
2. **Lock down access:** Limit management UI to the Management VLAN, enforce MFA, and replace default certificates.
3. **Logging:** Forward syslog to the monitoring stack and enable audit logs for administrative actions.
4. **Backups:** Schedule nightly snapshots and weekly off-site backups using vzdump or Veeam Agent.

## 4. Deploy Core Network Services

1. **pfSense firewall:** Follow `lab_environment/build_guides/pfsense.md` to create VLAN interfaces and strict firewall rules.
2. **Directory services:** Provision `DC01` using `lab_environment/vm_templates/windows-server.md`.
3. **Name resolution:** Configure DNS zones for `lab.local` and static entries for monitoring/automation hosts.
4. **Time synchronization:** Point all systems at the hypervisor or pfSense NTP service.

## 5. Build Monitoring Stack

1. **Deploy Ubuntu logging host** from `lab_environment/vm_templates/ubuntu-server.md`.
2. **Install observability tooling:** Elastic stack, Graylog, and Wazuh (Docker Compose recommended).
3. **Forward telemetry:** Ship pfSense syslog, Sysmon events, auditd logs, and vulnerability scan exports.
4. **Baseline alerts:** Import starter Sigma rules and tune thresholds following `operations/monitoring-maturity.md`.

## 6. Prepare Offensive & Defensive Workstations

1. **Kali Linux attack box:** Build from the template guide and install BloodHound, Sliver, and scenario-specific tools.
2. **Blue team workstation:** Hardened Windows or Linux desktop with SIEM dashboards, Sysinternals, and forensic utilities.
3. **Jump host:** Optionally create a bastion VM with RDP/VNC restricted to management staff.

## 7. Apply Hardening and Compliance Checks

1. **Run Ansible:** Execute `ansible-playbook -i automation/ansible/inventory.yml playbooks/hardening.yml`.
2. **Validate controls:** Check `checklists/hardening-checklist.md` and `checklists/build-and-validation.md` items.
3. **Record findings:** Store compliance output in `automation/ansible/reports/` (create directory if needed).

## 8. Automate Routine Validation

1. **Health checks:** Schedule `scripts/audit_lab.sh` via cron on the management workstation.
2. **Bootstrap tooling:** Run `scripts/bootstrap_lab.sh` to install CLI dependencies (Ansible, Terraform, etc.).
3. **CI integration:** Use `automation/pipelines/github-actions.yml` or similar to lint Infrastructure-as-Code changes.

## 9. Threat Emulation & Continuous Improvement

1. **Plan scenarios:** Choose adversary profiles from `threat_emulation/adversary_profiles.md`.
2. **Execute purple team exercises:** Follow runbooks in `threat_emulation/purple_team_exercises.md`.
3. **Capture lessons:** Update `journey/` entries with discoveries, response timelines, and detection gaps.
4. **Feed back results:** Update hardening, automation, and monitoring artifacts accordingly.

## 10. Maintenance Cadence

- **Weekly:** Review monitoring dashboards and close out runbook action items.
- **Monthly:** Execute `operations/runbooks/patch-management.md` and refresh snapshots.
- **Quarterly:** Perform disaster recovery drills, rotate credentials, and review lab roadmap.
- **Annually:** Reassess goals, retire outdated tooling, and archive major lessons learned in `journey/`.

## Appendices

- **Bill of Materials Template:** Copy `docs/templates/bom-template.csv` (create if customizing) to track hardware purchases.
- **Change Calendar:** Use `docs/operational-calendar.md` to coordinate updates and purple team events.
- **Feedback Loop:** Maintain a backlog of improvements in `docs/backlog.md` (optional) and link to relevant Git issues.

By following this guide, you ensure the lab remains intentionally designed, reproducible, and aligned with the cybersecurity
skills you are striving to master.
