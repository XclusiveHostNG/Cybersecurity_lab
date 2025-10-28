# Monitoring and Alerting Exercise

Deploy Security Onion to capture network telemetry and configure meaningful alerts.

## Setup Steps

1. Provision a Security Onion VM with 4 CPU cores and 8 GB RAM.
2. Attach one adapter to the host-only network (management) and another in promiscuous mode for monitoring.
3. Run the setup wizard in Evaluation mode and define the monitor interface.

## Data Sources

- Enable Syslog ingestion from Kali and Metasploitable.
- Configure Zeek and Suricata sensors for network analysis.
- Integrate pfSense logs via Syslog or Filebeat.

## Alert Tuning

- Create custom detection rules for:
  - Excessive SSH authentication failures.
  - HTTP traffic to known vulnerable web apps.
  - Unusual DNS queries.
- Suppress noisy signatures to reduce alert fatigue.

## Validation

- Generate sample traffic (e.g., failed logins, HTTP scans) and confirm alerts trigger.
- Export dashboards or timelines to `reports/monitoring_summary.md`.
- Record lessons learned and next actions.
