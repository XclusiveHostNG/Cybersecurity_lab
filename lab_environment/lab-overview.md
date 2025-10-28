# Lab Overview

This lab is designed to simulate a small enterprise network with clearly defined security zones, monitoring capabilities, and automation hooks. The environment is intentionally modular so that components can be swapped in and out as skills evolve.

## Objectives

1. Provide a safe sandbox for offensive security testing.
2. Enable defensive monitoring and incident response practice.
3. Support automation experiments with infrastructure-as-code tooling.

## Platform

- **Virtualization:** Proxmox VE hosted on a dedicated server with VT-d enabled.
- **Networking:** VLAN segmentation across management, production, and attack networks.
- **Storage:** ZFS pool with daily snapshots and off-site backups using restic.

## Services

| Zone        | Service             | Purpose                                  |
|-------------|--------------------|-------------------------------------------|
| Management  | pfSense Firewall   | Routing, VPN access, DNS sinkhole        |
| Production  | AD DS + File Share | Simulate corporate identity and data     |
| Monitoring  | ELK Stack          | Centralized log collection and analysis  |
| Attack      | Kali Rolling       | Offensive tooling and exploit testing    |

## Security Controls

- Firewall policies enforce least privilege between VLANs.
- Endpoint hardening follows CIS benchmarks.
- Sysmon deployed on Windows hosts with custom rulesets.
- Wazuh agents forward alerts to the SIEM for correlation.

## Maintenance Routine

1. Apply OS and firmware updates monthly.
2. Rotate credentials and update password vault entries quarterly.
3. Review firewall rules after each new service deployment.
