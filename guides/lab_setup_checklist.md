# Lab Setup Checklist

Use this checklist to prepare your host system and virtualization platform before deploying the lab machines.

## Host Preparation

- [ ] Enable hardware virtualization (Intel VT-x/AMD-V) in BIOS/UEFI.
- [ ] Update host OS to the latest stable release.
- [ ] Install all security patches and enable automatic updates.
- [ ] Create a dedicated non-admin user account for lab management.
- [ ] Install a host-based firewall and configure strict outbound rules.

## Virtualization Platform

- [ ] Install VirtualBox or VMware Workstation Player.
- [ ] Create a host-only network with the subnet `192.168.56.0/24`.
- [ ] Configure DHCP to off; use static IP assignments for predictability.
- [ ] Download guest additions/tools packages for better integration.

## Required Downloads

- [ ] Kali Linux ISO image (latest weekly build recommended).
- [ ] Metasploitable 2 virtual appliance (OVA).
- [ ] Optional: Security Onion ISO, pfSense ISO.
- [ ] Latest VirtualBox Extension Pack (if using VirtualBox).

## Folder Structure

```
Cybersecurity_lab/
├── assets/{iso,appliances,exports}/
├── docs/
├── guides/
├── labs/
├── scripts/
└── tools/
```

Ensure this repository is cloned to the host machine and synced regularly.

## Verification

- [ ] Run the `scripts/network_scan.sh` script to confirm host-only connectivity once VMs are online.
- [ ] Document system specs and baseline snapshots in `docs/secure_lab_overview.md`.
