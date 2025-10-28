# pfSense Firewall Setup Guide

pfSense segments the lab network and provides controlled egress, VPN access, and logging. This guide outlines the configuration steps I follow after installing the pfSense virtual appliance.

## Prerequisites
- pfSense Community Edition ISO or OVA.
- VM with 2 vCPUs, 2 GB RAM, and 20 GB disk.
- Two NICs: `WAN` (NAT for updates) and `LAN` (host-only lab network).

## Initial Configuration Wizard
1. **Boot and Assign Interfaces**
   - Set `em0` (or equivalent) as `WAN` and `em1` as `LAN`.
   - Confirm LAN IP as `192.168.56.1/24` with DHCP enabled from `.100` to `.199`.
2. **Set Admin Credentials**
   - Use a long, unique passphrase and store in your password manager.
3. **Dashboard Hardening**
   - Navigate to *System → Advanced → Admin Access* and enforce HTTPS-only with a self-signed certificate.

## Firewall Rules
- **WAN:**
  - Block all inbound traffic by default.
  - Create a schedule to temporarily allow outbound HTTP/HTTPS when downloading updates.
- **LAN:**
  - Permit internal traffic between Kali, Metasploitable, and Security Onion.
  - Create aliases for critical hosts and restrict management ports (SSH, WebGUI) to the host machine IP.
- **Floating Rules:**
  - Mirror traffic destined for Metasploitable to the Security Onion monitoring NIC via a SPAN configuration.

## Services
- **VPN:** Configure OpenVPN (optional) to access the lab remotely without exposing services to the internet.
- **DNS Resolver:** Enable DNS over TLS to encrypt outbound DNS queries.
- **Syslog:** Forward logs to Security Onion using UDP 514.

## Maintenance Tasks
- Schedule weekly configuration backups exported to `tools/config_backups/`.
- Apply updates monthly and snapshot the VM before major upgrades.
- Review firewall logs during each `labs/threat_hunting/` exercise to correlate alerts.

## Validation Checklist
- [ ] Clients on the LAN receive DHCP addresses and can reach the pfSense web UI.
- [ ] Outbound internet access only works when the scheduled rule is enabled.
- [ ] Syslog events from pfSense appear inside Security Onion.
- [ ] VPN clients can reach internal hosts without exposing services externally.

> **Next Step:** After pfSense is hardened, rerun `scripts/network_scan.sh` to confirm the firewall enforces expected segmentation.
