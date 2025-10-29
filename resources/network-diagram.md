# Network Diagram Notes

Use these notes alongside graphical diagrams to keep track of lab connectivity.

## Current Layout

- **Management Network (192.168.56.0/24):**
  - Host Machine: 192.168.56.1
  - Kali Linux: 192.168.56.50
  - Optional Admin Windows VM: 192.168.56.60
- **Lab Network (10.10.10.0/24):**
  - Metasploitable: 10.10.10.20
  - Windows Domain Controller: 10.10.10.10
  - Windows Client: 10.10.10.30
  - Security Onion Sensor: 10.10.10.40
- **DMZ (172.16.5.0/24):** (Optional) Reverse proxies or web apps exposed for red teaming.

## Change Log

| Date       | Update Description                        | Performed By |
|------------|-------------------------------------------|--------------|
| 2024-01-01 | Added Security Onion sensor to lab VLAN   | Your Name    |
| 2024-01-10 | Introduced DMZ network for web challenges | Your Name    |

## Diagram Tips

- Use draw.io or diagrams.net to create editable network maps.
- Export diagrams to `resources/artifacts/` for version control.
- Include VLAN IDs, IP ranges, and purpose for each segment.
