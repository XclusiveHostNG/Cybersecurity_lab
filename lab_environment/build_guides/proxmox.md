# Proxmox VE Build Guide

This guide documents the baseline hypervisor configuration that powers the cybersecurity lab. It emphasizes segmentation, snapshot hygiene, and resource management so that the environment remains stable even under heavy experimentation.

## Hardware Assumptions

- Intel VT-d or AMD-Vi capable CPU with at least 8 cores.
- 64 GB RAM to accommodate simultaneous blue/red team scenarios.
- Dual NICs to separate management traffic from lab VLANs.
- Two SSDs (mirrored) for the system and one HDD array for bulk storage.

## Installation Steps

1. Download the latest Proxmox VE ISO and create a bootable USB drive.
2. Configure BIOS settings: enable virtualization extensions, disable Secure Boot, and set the management NIC as primary.
3. Boot from the USB drive and follow the installer, selecting ZFS RAID1 for the system volume.
4. Assign the management NIC a static IP on the management VLAN (e.g., `192.168.10.5`).
5. Set up a non-root administrator account and enroll it in two-factor authentication once the install is complete.

## Post-Install Hardening

- Update the system: `apt update && apt full-upgrade` followed by a reboot.
- Enable the Proxmox firewall globally and configure allow-lists for management IP ranges.
- Replace the default self-signed certificate with an internal CA-issued certificate.
- Configure syslog forwarding to the monitoring stack.
- Create a daily job that snapshots all critical VMs with a seven-day retention policy.

## Resource Organization

- Create resource pools for `BlueTeam`, `RedTeam`, and `CoreServices` to simplify access control.
- Tag templates and golden images with semantic versions (e.g., `ubuntu-server:v1.2`).
- Use cloud-init enabled templates for Linux distributions to standardize provisioning.

## Backup Strategy

- Schedule nightly vzdump backups of critical VMs to an NFS share mounted from the backup NAS.
- Run weekly integrity checks on the backup storage and alert if degradation is detected.
- Document the restore process and perform quarterly recovery drills.
