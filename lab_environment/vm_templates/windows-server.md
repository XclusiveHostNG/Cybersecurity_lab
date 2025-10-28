# Windows Server Template

The Windows Server VM provides Active Directory Domain Services and simulates a small enterprise domain.

## Base Configuration

- **Version:** Windows Server 2022 Datacenter Evaluation
- **Resources:** 4 vCPU, 8 GB RAM, 80 GB disk
- **Networking:** Production VLAN only

## Provisioning Steps

1. Install Windows Server with GUI and enable automatic updates.
2. Rename the server to `DC01` and assign a static IP.
3. Promote the server to a domain controller for `LAB.LOCAL`.
4. Create baseline OUs: `Workstations`, `Servers`, `Service Accounts`.
5. Install the DHCP and DNS roles with secure-only dynamic updates.

## Hardening Tasks

- Apply the CIS Level 1 benchmark using Microsoft Security Compliance Toolkit.
- Enable Windows Defender Credential Guard and LSA Protection.
- Deploy Sysmon with custom configuration and forward logs to the SIEM.
- Enforce strong password policies and account lockout thresholds via GPO.
