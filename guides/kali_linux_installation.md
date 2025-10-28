# Kali Linux Installation Guide

This guide outlines how I install and harden Kali Linux as the primary attack platform in the lab.

## Step 1 – Prepare the Virtual Machine

1. Create a new VM named **Kali-Lab**.
2. Assign 2 CPU cores and 4 GB RAM.
3. Create a 40 GB dynamically allocated virtual disk.
4. Attach the Kali Linux ISO to the optical drive.
5. Set the network adapter to **Host-only Adapter** and choose the lab network.

## Step 2 – Install the Operating System

1. Boot the VM and select **Graphical Install**.
2. Choose your language, location, and keyboard layout.
3. Configure the hostname as `kali-lab` and domain as `lab.local` (optional).
4. Set a strong password for the `kali` user and create a separate administrative user if desired.
5. Use Guided Partitioning with encrypted LVM to protect data at rest.
6. Select the default desktop environment (XFCE for performance).
7. Allow the installer to fetch updates if internet access is temporarily permitted.

## Step 3 – Post-Install Hardening

- Update packages: `sudo apt update && sudo apt full-upgrade`.
- Create snapshots labeled `kali-base` and `kali-hardened`.
- Disable SSH password authentication and enforce key-based access.
- Configure a static IP of `192.168.56.10` by editing `/etc/network/interfaces` or using NetworkManager.
- Install essential tools: `sudo apt install -y metasploit-framework bloodhound neo4j openvpn`.
- Enable uncomplicated firewall (UFW):

  ```bash
  sudo ufw default deny incoming
  sudo ufw default allow outgoing
  sudo ufw enable
  ```

## Step 4 – Quality-of-Life Tweaks

- Install VirtualBox Guest Additions for better display and clipboard sharing.
- Set up shared folders pointing to the repository `assets/` directory (read-only).
- Configure terminal aliases in `~/.zshrc` for common tools like `nmap` and `msfconsole`.

## Validation Checklist

- [ ] Static IP reachable from other VMs.
- [ ] SSH service restricted to key-based authentication.
- [ ] Snapshots created and documented in `docs/secure_lab_overview.md`.
- [ ] Update script scheduled via cron (`sudo crontab -e`).
