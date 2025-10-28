# Virtualization Basics

Before diving into the lab builds, it is important to understand how virtualization technology enables safe experimentation.

## Hypervisor Choices

- **VirtualBox** – Free, cross-platform, supports snapshots and host-only networking. Ideal for beginners.
- **VMware Workstation Player** – Free for non-commercial use, offers advanced networking features.
- **Proxmox VE** – Bare-metal hypervisor with clustering capabilities; use when you outgrow desktop virtualization.

## Resource Planning

1. Allocate at least two CPU cores and 4 GB RAM to Kali Linux for smooth operation.
2. Metasploitable runs comfortably with 1 CPU and 1 GB RAM.
3. Leave at least 4 GB RAM free for the host operating system to maintain responsiveness.
4. Use dynamically allocated disks, but pre-allocate if you notice performance issues.

## Networking Modes

- **Host-Only:** VMs communicate with each other and the host but not the internet.
- **NAT:** VMs access the internet via the host. Use sparingly to download updates under controlled conditions.
- **Bridged:** VMs appear on the same network as the host. Avoid unless you have strict firewall rules.

## Snapshot Strategy

Take snapshots after major milestones:

1. Fresh OS installation.
2. Post-update and configuration hardening.
3. Before running intrusive penetration tests.

Snapshots allow you to roll back to a clean state, making repeatable testing and demos easier.

## Storage Layout

Keep ISO images and exported appliances in the `assets/` directory to reduce re-downloads. Store large files outside of version control if they exceed repository limits.
