# Lab Architecture

The lab is composed of tiered network segments that separate offensive tooling, vulnerable targets, and monitoring infrastructure. Virtualization is performed on commodity hardware using a combination of VirtualBox and VMware Workstation, with the option to transition to Proxmox or ESXi for enterprise-grade features.

## Topology Overview

```
                 [ Home Router ]
                       |
                 [ Physical Host ]
                       |
            +----------+-----------+
            |                      |
       [Management]           [Lab Switch]
            |                      |
      Kali Linux VM       +--------+--------+
      Admin Jumpbox       |                 |
                       Targets          Monitoring
                    (Metasploitable,   (Security Onion,
                     Windows, etc.)      ELK Stack)
```

- **Management Network:** Host-only segment for administrative access. Only trusted systems (e.g., Kali Linux, Windows admin workstation) reside here.
- **Lab Network:** Isolated segment where vulnerable targets and monitoring sensors communicate. No routing to the internet.
- **Storage:** Virtual disk images stored on dedicated SSD for performance. Snapshots are taken before major experiments.

## Resource Planning

| Component           | Minimum Specs                              | Notes |
|---------------------|---------------------------------------------|-------|
| Hypervisor Host     | 16 GB RAM, quad-core CPU, 512 GB SSD       | Allows 3-4 concurrent VMs |
| Kali Linux          | 2 vCPU, 4 GB RAM, 40 GB disk               | Offensive workstation |
| Metasploitable      | 1 vCPU, 1 GB RAM, 20 GB disk               | Vulnerable target |
| Windows Server      | 2 vCPU, 6 GB RAM, 60 GB disk               | Domain controller / file server |
| Security Onion      | 4 vCPU, 8 GB RAM, 200 GB disk              | Network monitoring |

## Network Services

- **DHCP:** Disabled on target networks; static addressing prevents accidental cross-network communication.
- **DNS:** Optional Windows DNS or internal BIND instance for AD labs.
- **Logging:** Syslog forwarded to Security Onion, Windows Event Forwarding to ELK stack, Zeek for network metadata.

## Isolation Strategies

1. Use host-only or internal networking modes in the hypervisor.
2. Disable shared clipboard and drag-and-drop between host and lab machines.
3. Maintain separate user accounts for lab administration and daily computing.
4. Regularly revert snapshots after high-risk exploitation to avoid persistence by malware samples.

## Future Enhancements

- Integrate an automation layer using Ansible or Terraform to rebuild labs quickly.
- Add an ICS/SCADA segment with simulated PLCs for specialized training.
- Deploy a SIEM like Wazuh with dashboards tuned to attack detection use cases.
