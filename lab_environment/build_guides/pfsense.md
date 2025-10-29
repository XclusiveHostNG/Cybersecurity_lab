# pfSense Firewall Build Guide

The pfSense appliance enforces segmentation, provides VPN access, and acts as the authoritative DNS server for the lab. This guide outlines the baseline configuration steps and security controls applied after deployment.

## Virtual Appliance Specs

- **Platform:** pfSense CE (latest stable release)
- **Resources:** 2 vCPU, 4 GB RAM, 20 GB disk
- **Network Interfaces:**
  - `wan0` — Optional uplink for updates via a controlled network
  - `lan0` — Management VLAN (192.168.10.0/24)
  - `lan1` — Production VLAN (192.168.20.0/24)
  - `lan2` — Attack VLAN (192.168.30.0/24)

## Initial Configuration

1. Assign interfaces according to the topology and confirm link status.
2. Set strong administrative credentials and enable the secure dashboard HTTPS option.
3. Configure DHCP scopes for each internal VLAN with reservations for critical services.
4. Create DNS overrides for internal services (e.g., `graylog.lab.local`, `wazuh.lab.local`).
5. Enable NTP and point it to the hypervisor as the primary clock source.

## Security Policies

- Deny all inter-VLAN traffic by default and create explicit allow rules for required services.
- Enable stateful inspection and block bogon and private networks on the WAN interface.
- Configure geo-IP blocking for inbound VPN access except for approved countries.
- Enable Suricata inline IPS on the WAN and Production interfaces with Emerging Threats rulesets.

## Remote Access

- Deploy OpenVPN with certificate-based authentication and MFA via TOTP.
- Limit VPN clients to the management VLAN using firewall rules and add logging for every connection.
- Schedule automated revocation checks for client certificates.

## Monitoring and Logging

- Forward firewall, DHCP, and VPN logs to the central Graylog stack over TLS.
- Enable netflow export to the ELK stack for traffic analysis.
- Create alert rules for excessive blocked traffic, failed VPN logons, and IPS signature matches.

## Maintenance Checklist

- Monthly: Update pfSense packages and Suricata rules, then validate functionality with regression tests.
- Quarterly: Review firewall rules with the principle of least privilege and remove unused NAT entries.
- Annually: Rotate CA certificates, regenerate VPN client configurations, and audit interface assignments.
