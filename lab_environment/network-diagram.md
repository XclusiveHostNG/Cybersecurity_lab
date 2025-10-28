# Network Diagram

```
               [Internet]
                   |
             [VPN Gateway]
                   |
             +-----------+
             | pfSense   |
             +-----------+
            /      |      \
           /       |       \
  [Mgmt VLAN] [Prod VLAN] [Attack VLAN]
       |            |             |
 [Proxmox GUI]  [AD DS]     [Kali Linux]
       |            |             |
 [Ansible Ctrl] [FileSrv]  [Purple Team VM]

```

## Segmentation Notes

- **Management VLAN** is restricted to admin workstations and the hypervisor.
- **Production VLAN** hosts domain services, file servers, and vulnerable applications.
- **Attack VLAN** is a sandbox for offensive tooling with no outbound internet access by default.

Routing between VLANs is controlled by pfSense firewall rules, and all traffic is mirrored to the monitoring stack for analysis.
