# Tooling Standards

The lab prioritizes open-source, scriptable tools that support both offensive and defensive experimentation. Each platform adopts baseline configurations to ensure consistency across rebuilds.

## Offensive Workstation (Kali Linux)

- Use the **kali-rolling** repository and keep packages updated with `sudo apt update && sudo apt full-upgrade`.
- Maintain a curated list of top tools: Nmap, Metasploit, Burp Suite Community, Impacket, BloodHound, CrackMapExec, and custom scripts stored under `/opt/lab-tools`.
- Configure **tmux** profiles and **zsh** aliases for rapid command execution.
- Store VPN profiles and SSH keys in encrypted vaults (e.g., `gopass`, `pass`) to safeguard credentials.

## Vulnerable Targets

- Preserve base images as clean snapshots before running exploit chains.
- Document intentionally exposed services and credentials in `resources/vulnerable-services.md` for quick reference.
- Apply post-exploitation reset scripts to return the machine to its baseline state after exercises.

## Defensive Stack

- Centralize logging via syslog, Winlogbeat, and Filebeat directed to Security Onion.
- Enable Zeek packages for protocol analysis and Suricata rulesets for intrusion detection.
- Use `so-rule-update` and community threat feeds to keep signatures current.
- Create detection content that maps to MITRE ATT&CK techniques observed during offensive exercises.

## Automation & Version Control

- Store infrastructure-as-code artifacts under `resources/automation/`.
- Leverage Ansible playbooks to bootstrap VM configurations (user accounts, packages, logging agents).
- Version-control all scripts and configuration files; avoid manual changes without documentation.

## Backup Strategy

- Export weekly snapshots of critical VMs to external storage.
- Maintain an inventory spreadsheet (`resources/inventory.csv`) tracking hostname, IP, credentials, and snapshot dates.
- Test restore procedures quarterly to ensure backups are functional.
