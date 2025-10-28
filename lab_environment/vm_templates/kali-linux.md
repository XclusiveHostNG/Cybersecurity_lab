# Kali Linux Template

The Kali Linux VM acts as the primary offensive toolkit in the lab.

## Base Configuration

- **Version:** Kali Rolling (weekly ISO build)
- **Resources:** 4 vCPU, 6 GB RAM, 60 GB disk
- **Networking:** Dual NICs (Attack VLAN, Optional Internet VLAN)

## Provisioning Steps

1. Import the latest ISO into Proxmox and create a new VM with UEFI + Secure Boot disabled.
2. During installation, encrypt the root filesystem with LUKS.
3. Apply all updates: `sudo apt update && sudo apt full-upgrade`.
4. Install additional tools: `sudo apt install bloodhound neo4j dirsearch seclists`.
5. Configure OpenVPN profiles for lab VPN connectivity.

## Hardening Tasks

- Disable the default `kali` user, create personalized accounts, and enforce MFA.
- Configure the Uncomplicated Firewall (UFW) to restrict inbound connections.
- Rotate SSH host keys quarterly and store fingerprints in the password vault.
