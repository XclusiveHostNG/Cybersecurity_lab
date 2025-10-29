# Metasploitable Installation Guide

Metasploitable is an intentionally vulnerable Linux virtual machine used for penetration testing practice. Follow these steps to deploy it safely within the lab.

## Prerequisites

- Hypervisor: VirtualBox, VMware Workstation, or compatible platform
- Lab network configured as host-only or internal-only
- Minimum VM resources: 1 vCPU, 1 GB RAM, 20 GB disk

## Steps

1. **Download Image:**
   - Obtain the latest Metasploitable 2 OVA from the Rapid7 GitHub repository or official mirror.
   - Verify checksums to ensure integrity: `sha256sum Metasploitable2-Linux.ova`.
2. **Import OVA:**
   - In your hypervisor, select *Import Appliance* and choose the downloaded OVA file.
   - Accept default settings, but ensure the network adapter is set to *Host-Only* or *Internal Network*.
3. **Initial Boot:**
   - Start the VM and log in using the default credentials `msfadmin:msfadmin`.
   - Change the default password immediately to prevent accidental compromise from other lab users.
4. **Network Configuration:**
   - Assign a static IP within the lab subnet (e.g., `192.168.56.20`).
   - Update `/etc/network/interfaces` accordingly and restart networking: `sudo systemctl restart networking`.
5. **Snapshot Baseline:**
   - Shut down the VM and create a snapshot named `clean-install`.
   - Document the snapshot details in `resources/inventory.csv`.

## Post-Installation Notes

Metasploitable ships with numerous outdated services (vsFTPd, Tomcat, Samba, etc.). Keep a service inventory and track the exploits practiced against each to measure progress.
