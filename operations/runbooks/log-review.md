# Daily Log Review Runbook

This runbook ensures that defensive telemetry is inspected consistently and anomalies are triaged within 24 hours.

## Preparation

- Confirm access to Graylog, Wazuh, and Elastic dashboards.
- Update the review checklist with any new detection rules added during the previous day.
- Synchronize time across analyst workstations to ensure accurate event correlation.

## Review Workflow

1. **Security Overview Dashboard** — Check for spikes in failed authentication, blocked firewall traffic, and IPS alerts.
2. **Endpoint Alerts** — Review new Wazuh alerts, tagging each as true positive, false positive, or informational.
3. **Hunt Queries** — Execute saved searches for:
   - Unusual service creation events (Windows Event ID 7045).
   - Suspicious PowerShell usage (Event ID 4104 with encoded commands).
   - Network connections to disallowed countries.
4. **Ticketing** — Create incident tickets for events requiring deeper investigation and assign owners.
5. **Metrics Update** — Log daily statistics (alerts reviewed, incidents created, MTTR) in the SOC metrics spreadsheet.

## Escalation Criteria

- Repeated failed logins against privileged accounts.
- High-severity Suricata signatures indicating command-and-control channels.
- Any alert mapped to MITRE ATT&CK T1078 (Valid Accounts) or T1486 (Data Encrypted for Impact).

## Closure

- Summarize findings in the daily report stored under `operations/reports/YYYY-MM-DD.md`.
- Update detection tuning backlog with any false-positive patterns discovered.
- Verify that `audit_lab.sh` reports the monitoring endpoints as reachable before ending the shift.
