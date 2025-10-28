# Metasploitable Setup Guide

Metasploitable 2 is an intentionally vulnerable virtual machine used to practice exploitation techniques. Follow these steps to import and configure it safely.

## Step 1 – Import the Appliance

1. Download the latest OVA file from the Rapid7 repository.
2. In VirtualBox, click **File → Import Appliance** and select the OVA.
3. Review the settings and uncheck **Enable Remote Display** for security.
4. Set the base folder to your dedicated lab directory.

## Step 2 – Network Configuration

- Adapter 1: **Host-only Adapter**, attached to the lab network.
- Disable any additional adapters to keep the VM isolated.
- Set the MAC address to be static for consistent DHCP leases if you ever enable it.

## Step 3 – Initial Boot

1. Start the VM and log in with the default credentials `msfadmin:msfadmin`.
2. Run `ifconfig` to note the assigned IP address. Configure it statically to `192.168.56.20` by editing `/etc/network/interfaces`:

   ```bash
   auto eth0
   iface eth0 inet static
       address 192.168.56.20
       netmask 255.255.255.0
       gateway 192.168.56.1
   ```

3. Restart networking: `sudo service networking restart`.
4. Update `/etc/hosts` to include friendly names for other lab systems.

## Step 4 – Hardening the Edges

While Metasploitable is designed to be vulnerable, still take precautions:

- Change the default password to a strong passphrase but document it in the lab notes.
- Disable SSH root login by editing `/etc/ssh/sshd_config`.
- Create a snapshot named `metasploitable-clean` after configuration.

## Step 5 – Validation

- [ ] Ping between Kali and Metasploitable.
- [ ] Run `nmap -sV 192.168.56.20` from Kali and capture the output in `labs/metasploitable/service_enumeration.md`.
- [ ] Document any intentional misconfigurations used in future labs.
