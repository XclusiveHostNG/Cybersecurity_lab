# Kali Linux Installation Guide

Kali Linux serves as the primary offensive security workstation in the lab. Install it with persistence to retain tools and configurations between sessions.

## Prerequisites

- ISO image from the official Kali Linux website (64-bit installer)
- Hypervisor with at least 2 vCPU, 4 GB RAM, 40 GB disk allocated
- Host-only or internal network for isolation

## Installation Steps

1. **Create VM:**
   - Name: `kali-offsec`
   - Hardware: 2 vCPU, 4 GB RAM, 40 GB dynamically allocated disk
   - Network: Host-only or internal adapter; optionally add a NAT adapter disabled by default
2. **Boot ISO:**
   - Choose *Graphical Install*.
   - Set locale and keyboard layout.
3. **Partitioning:**
   - Use guided partitioning with LVM to support future snapshots.
   - Assign an encrypted LVM if storing sensitive notes.
4. **User Setup:**
   - Create a non-root user for daily operations.
   - Enable automatic login only if the VM remains isolated.
5. **Package Selection:**
   - Install default tools plus *Top 10* meta-package for essential utilities.
6. **Updates:**
   - After first boot, run `sudo apt update && sudo apt full-upgrade`.
   - Install guest additions for clipboard control and screen resizing.
7. **Snapshot:**
   - Take a snapshot named `baseline-tools` after configuring network and updates.

## Post-Install Checklist

- Configure SSH keys and store them in an encrypted vault.
- Clone this repository for reference: `git clone https://github.com/<user>/Cybersecurity_lab.git`.
- Set up `/opt/lab-tools` directory for additional scripts.
- Install preferred IDE or note-taking tools (VS Code, Obsidian) with offline installers.
