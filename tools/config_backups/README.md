# Configuration Backups

Store sanitized configuration exports for pfSense, Security Onion, and other lab appliances here. Exclude secrets (passwords, API tokens) before committing.

## Recommended Files
- `pfsense_lab.xml` – pfSense backup with WAN/LAN settings and firewall rules.
- `security_onion.sls` – Salt stack pillars or configuration snippets.
- `virtualbox_hostonly.xml` – VirtualBox host-only network export.

> **Reminder:** Encrypt sensitive backups outside of Git and reference the storage location in your personal journal.
