# Ubuntu Server Template

The Ubuntu Server VM hosts web applications, automation tooling, and blue team agents.

## Base Configuration

- **Version:** Ubuntu Server LTS (22.04)
- **Resources:** 2 vCPU, 4 GB RAM, 40 GB disk
- **Networking:** Production VLAN and optional DMZ VLAN

## Provisioning Steps

1. Perform a minimal installation with OpenSSH server enabled.
2. Configure Netplan for static IP addressing and DNS pointing to the domain controller.
3. Install Docker and Docker Compose for containerized services.
4. Deploy Wazuh agent and configure it to forward logs to the manager.
5. Schedule unattended-upgrades and enable automatic reboots when necessary.

## Hardening Tasks

- Enforce SSH key authentication and disable password logins.
- Configure AppArmor profiles for exposed services.
- Enable auditd with custom rules covering authentication and privilege escalation events.
- Regularly review `/var/log/auth.log` and forward to the centralized SIEM.
