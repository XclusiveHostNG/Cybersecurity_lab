# Threat Hunting Lab – Detection Engineering Sprint

## Scenario Overview
- **Objective:** Develop detections for credential abuse and privilege escalation observed in prior labs.
- **Duration:** 2–3 hours.
- **Dependencies:** Completion of the [Log Correlation](log_correlation.md) lab.

## Sprint Backlog
1. **Define Hypotheses**
   - Hypothesis A: Attackers will generate abnormal Kerberos pre-authentication failures.
   - Hypothesis B: Attackers will attempt to add new sudo-capable users on Metasploitable.
2. **Collect Telemetry**
   - Export relevant logs from Security Onion (Zeek `kerberos.log`, `auth.log`).
   - Gather `/var/log/auth.log` from Metasploitable and `/var/log/sudo.log` if available.
3. **Author Detections**
   - Create Sigma rules for unusual Kerberos failure rates.
   - Write an OSSEC or Wazuh rule detecting `useradd` commands targeting the `sudo` group.
   - Store rules under `tools/detections/` with filenames reflecting MITRE technique IDs.
4. **Test Detections**
   - Reproduce the behavior from Kali Linux (generate brute-force attempts and privilege escalation attempts).
   - Verify alerts fire within Security Onion and document results.
5. **Publish Outcomes**
   - Record detection logic, test cases, and tuning notes in `tools/detections/README.md`.
   - Update the `docs/learning_journey_timeline.md` reflection for Phase 3.

## Deliverables
- Sigma rule files and OSSEC/Wazuh rule files committed under `tools/detections/`.
- Markdown summary capturing assumptions, data sources, and false-positive tuning steps.
- Screenshot (optional) of Security Onion dashboard showing the new alerts firing.

> **Stretch Goal:** Automate detection deployment via a script or Ansible playbook stored in `scripts/`.
