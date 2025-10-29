# Service Catalog

Understanding service ownership and recovery expectations keeps the lab organized during maintenance and incident response. This catalog summarizes the critical components and their operational targets.

| Service             | Owner         | Location            | RTO  | RPO  | Dependencies                  |
|---------------------|---------------|---------------------|------|------|-------------------------------|
| pfSense Firewall    | Lab Architect | Proxmox VM          | 30m  | 15m  | Proxmox, Config Backups       |
| Active Directory    | Blue Team     | Windows Server VM   | 2h   | 1h   | pfSense, Proxmox, Backups     |
| Graylog Stack       | Blue Team     | Ubuntu Docker Host  | 1h   | 30m  | Elasticsearch, Nginx          |
| Wazuh Manager       | Blue Team     | Ubuntu Docker Host  | 1h   | 30m  | Elasticsearch, pfSense        |
| Kali Attack Box     | Red Team      | Proxmox VM          | 4h   | 4h   | pfSense                       |
| Elastic Stack       | Blue Team     | Ubuntu Docker Host  | 1h   | 30m  | pfSense, Storage, TLS Certs   |
| Backup NAS          | Lab Architect | Physical Appliance  | 24h  | 12h  | pfSense (NTP), Proxmox        |

## Change Management

- **Request Window:** Changes proposed via Git issues with description, risk, and rollback plan.
- **Approval:** At least one peer reviewer for production-impacting changes.
- **Scheduling:** Maintenance performed during low-usage periods (typically weekends) with communication in the lab diary.

## Documentation Requirements

- Update relevant runbooks and diagrams after every approved change.
- Capture screenshots or command output for configuration changes and attach to the issue.
- Archive deprecated procedures in an `/operations/archive/` folder with sunset rationale.
