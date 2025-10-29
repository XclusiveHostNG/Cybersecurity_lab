# Monitoring Maturity Plan

The lab's monitoring stack is designed to mimic a small enterprise SOC. This plan outlines the telemetry sources, detection engineering cadence, and validation steps that sustain high-quality alerts.

## Telemetry Sources

| Source            | Collection Method            | Destination          | Notes |
|-------------------|------------------------------|----------------------|-------|
| pfSense Firewall  | Syslog over TLS               | Graylog + ELK        | Tagged with firewall hostname and interface |
| Windows Hosts     | Winlogbeat + Sysmon          | ELK Stack            | Sigma rules compiled via ElastAlert |
| Linux Hosts       | Filebeat + Auditd             | ELK Stack            | Audit rules include privileged command execution |
| Endpoint Agents   | Wazuh Agent -> Wazuh Manager | Wazuh + Graylog      | Heartbeat alerts integrated with audit script |
| Vulnerability Scans | OpenVAS export              | Security Data Lake   | Stored for trending remediation progress |

## Detection Engineering Cadence

- **Weekly:** Review top 10 alerts by volume and tune noisy detections.
- **Bi-Weekly:** Add or update Sigma rules mapped to the latest MITRE ATT&CK techniques exercised in the lab.
- **Monthly:** Validate enrichment sources (GeoIP, threat intelligence feeds) and refresh API keys.
- **Quarterly:** Conduct purple team exercises and document coverage gaps with remediation owners.

## Health Checks

1. Confirm that ingest pipelines are online using the `audit_lab.sh` script and Graylog inputs dashboard.
2. Verify log retention meets objectives (30 days hot storage, 365 days archive on the NAS).
3. Test alert delivery channels (email, Slack webhook) via built-in notification utilities.

## Metrics and Reporting

- Mean time to detect (MTTD) and mean time to respond (MTTR) for each exercise.
- Alert false positive ratio with action items for reduction.
- Coverage of ATT&CK tactics vs. implemented detections, updated after every threat emulation run.
