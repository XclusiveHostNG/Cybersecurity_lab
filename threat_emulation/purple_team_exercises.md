# Purple Team Exercise Playbook

This playbook structures collaborative exercises between offensive and defensive personas in the lab. Each scenario documents objectives, execution steps, detection goals, and success criteria.

## Scenario 1 — Spearphishing to Domain Compromise

- **Objective:** Validate the ability to detect and respond to credential theft via malicious attachments.
- **Execution:**
  1. Red team crafts a phishing email using GoPhish targeting a lab mailbox.
  2. Attachment drops a payload that executes an obfuscated PowerShell script for persistence.
  3. Blue team monitors email gateways and endpoint telemetry for suspicious behavior.
- **Detection Goals:**
  - Alert on anomalous email attachment types reaching end users.
  - Detect encoded PowerShell execution and new scheduled tasks.
  - Identify suspicious authentication attempts in Active Directory logs.
- **Success Criteria:**
  - Blue team raises an incident ticket within 15 minutes of payload execution.
  - Containment actions isolate the compromised host and reset affected credentials.

## Scenario 2 — Lateral Movement via SMB

- **Objective:** Ensure defenders can spot unauthorized lateral movement using built-in Windows utilities.
- **Execution:**
  1. Red team gains initial access to a workstation (assumed breach).
  2. Use `wmic` and `psexec` to pivot to the file server and exfiltrate data.
  3. Blue team hunts for anomalous remote service creation and network shares.
- **Detection Goals:**
  - Identify Event ID 7045 entries linked to remote service creation.
  - Flag SMB sessions originating from non-admin workstations to servers.
  - Correlate exfiltration attempts with data egress alerts.
- **Success Criteria:**
  - Blue team blocks lateral movement within 20 minutes.
  - Playbook updates capture new Sigma rules or firewall controls introduced.

## Scenario 3 — Backup Destruction Attempt

- **Objective:** Test response to ransomware-like behavior targeting backup infrastructure.
- **Execution:**
  1. Red team enumerates backup shares and attempts to delete snapshots.
  2. Deploys a mock ransomware payload that encrypts non-critical data.
  3. Blue team validates backup integrity and executes recovery procedures.
- **Detection Goals:**
  - Alert on deletion or modification of backup snapshots.
  - Detect high-volume SMB delete operations from atypical hosts.
  - Validate that `audit_lab.sh` reports EDR agents as active during the event.
- **Success Criteria:**
  - Recovery from backups within RTO.
  - Incident report filed with lessons learned and control enhancements.
