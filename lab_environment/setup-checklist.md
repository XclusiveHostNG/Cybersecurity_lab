# Lab Environment Setup Checklist

This checklist zooms in on the infrastructure build steps to ensure network segmentation, virtualization resources, and core
services are configured consistently every time.

## Hypervisor Preparation

- [ ] Hardware health check performed (SMART status, memory diagnostics, firmware versions).
- [ ] BIOS settings verified (virtualization extensions, VT-d/IOMMU, boot order, secure boot disabled if required).
- [ ] Proxmox/ESXi installed with management IP reserved and documented.
- [ ] Storage pools created (`local-lvm`, `nfs-backups`, etc.) with appropriate redundancy.
- [ ] Two-factor authentication enforced for admin accounts.

## Networking

- [ ] Managed switch configured with VLANs: Management (10), Production (20), Attack (30), Optional DMZ (40).
- [ ] Trunk ports established between hypervisor, switch, and firewall.
- [ ] DHCP scopes defined on pfSense with static mappings for critical hosts.
- [ ] Firewall rules implemented following least privilege (document exceptions).
- [ ] VPN configuration validated with restricted access to Management VLAN only.

## Core Services

- [ ] Active Directory domain `LAB.LOCAL` installed with baseline OUs and service accounts.
- [ ] File server or NAS configured with SMB shares for tools, logs, and backups.
- [ ] Internal certificate authority created to issue TLS certs for internal services.
- [ ] Sysmon, Winlogbeat, and Filebeat packages staged for deployment.
- [ ] Time synchronization confirmed across all hosts.

## Monitoring Stack

- [ ] Elasticsearch cluster initialized with TLS and user authentication.
- [ ] Graylog inputs configured for syslog (TCP/TLS) and GELF UDP.
- [ ] Wazuh manager enrolling agents and generating heartbeat alerts.
- [ ] Dashboards built for firewall events, authentication trends, and endpoint alerts.
- [ ] Retention policies configured (hot vs. archive storage).

## Documentation & Validation

- [ ] Network diagram updated (`lab_environment/network-diagram.md`).
- [ ] Service catalog entries refreshed (`operations/service-catalog.md`).
- [ ] All runbooks linked to the infrastructure components they support.
- [ ] `checklists/build-and-validation.md` reviewed and outstanding items tracked in backlog.
- [ ] Change tickets or Git issues closed with references to this checklist.

Keep a printed or digital copy of this checklist for each iteration of the lab build and store completed versions in the
`operations/reports/` directory for auditing purposes.
