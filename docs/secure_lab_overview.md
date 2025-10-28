# Secure Lab Overview

This document explains the guiding principles, architecture, and security controls of my cybersecurity lab. The environment is designed to be isolated, reproducible, and aligned with industry best practices so that experimentation never endangers production systems.

## Learning Objectives

- Understand the role of virtualization in creating safe testing environments.
- Practice installing and hardening offensive and defensive operating systems.
- Build muscle memory for incident response, vulnerability assessment, and penetration testing workflows.
- Document findings with professional-style reports.

## Lab Architecture

The lab uses a hub-and-spoke topology within a host-only network. VirtualBox is the primary hypervisor, and each virtual machine is assigned a static IP address to simplify routing and documentation.

| System | Role | IP Address | Notes |
| ------ | ---- | ---------- | ----- |
| Kali Linux | Attack platform | 192.168.56.10 | Offensive tooling, vulnerability scanning, exploit development |
| Metasploitable 2 | Target machine | 192.168.56.20 | Intentionally vulnerable Ubuntu-based server |
| Security Onion | Monitoring | 192.168.56.30 | Optional sensor for network visibility and logging |
| pfSense | Edge firewall | 192.168.56.1 | Segments lab traffic and provides controlled outbound access |
| Analyst Workstation | Documentation | 192.168.56.50 | Hosts tools for report compilation and detection engineering |

> **Tip:** Use snapshots after installing each machine so you can revert quickly if an experiment causes instability.

## Isolation Strategy

1. **Host-only Networking:** Virtual machines communicate with each other but not the internet unless explicitly configured through the firewall VM.
2. **Dedicated User Accounts:** Create separate host OS user profiles for lab work to prevent privilege creep.
3. **Resource Monitoring:** Track CPU, RAM, and disk usage to avoid host performance issues.
4. **Version Control:** Store lab notes and scripts in this repository to track progress and experiment history.

## Security Controls Implemented

- Firewall rules blocking outbound traffic by default.
- Regular updates to Kali Linux and security monitoring tools.
- Restricted shared folders to limit file transfer between host and guests.
- Encrypted storage for sensitive credentials and reports.

## Next Steps

Continue to the [Lab Setup Checklist](../guides/lab_setup_checklist.md) to prepare your host machine, then follow the platform-specific guides. When defensive components are online, explore the new [Threat Hunting Labs](../labs/threat_hunting/README.md) to correlate telemetry with offensive exercises.
