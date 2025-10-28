# Firewall Configuration Exercise

Configure pfSense to segment and protect the lab network.

## Tasks

1. Assign interfaces:
   - WAN: NAT adapter for internet access.
   - LAN: Host-only adapter with IP `192.168.56.1/24`.

2. Create firewall rules:
   - Allow LAN to WAN traffic for updates during maintenance windows.
   - Block all inbound WAN traffic by default.
   - Permit SSH from Kali to Metasploitable.
   - Log denied connections for review.

3. Configure NAT:
   - Enable outbound NAT for LAN network.
   - Create port forwards only when needed for specific labs.

4. Hardening steps:
   - Change default admin credentials.
   - Enable 2FA for the pfSense admin portal.
   - Limit dashboard access to the host-only network.

## Verification

- Use `traceroute` from Kali to ensure traffic flows through pfSense.
- Review firewall logs for unauthorized attempts.
- Document the final rule set in `reports/firewall_rules.md`.
