# Troubleshooting Guide

Common issues encountered while running the cybersecurity lab and how to resolve them.

## Virtual Machine Performance Issues

- **Symptom:** Kali Linux feels sluggish.
  - Increase video memory to 64 MB and enable 3D acceleration if supported.
  - Close unused applications on the host to free CPU and RAM.
  - Consider increasing the VM's RAM to 6 GB if hardware permits.

- **Symptom:** Metasploitable freezes during boot.
  - Disable audio and USB controllers in the VM settings.
  - Verify the virtual disk is not corrupted; re-import if necessary.

## Networking Problems

- **Symptom:** VMs cannot reach each other.
  - Confirm all adapters are attached to the same host-only network.
  - Run `scripts/network_scan.sh` to validate connectivity.
  - Restart the VirtualBox Host-Only Ethernet Adapter service.

- **Symptom:** Internet access unavailable when expected.
  - Check pfSense firewall rules and NAT configuration.
  - Ensure the pfSense VM has a second adapter set to NAT.

## Tooling Errors

- **Symptom:** `msfconsole` fails to start.
  - Update the Metasploit Framework using `msfupdate`.
  - Verify PostgreSQL service is running: `sudo systemctl status postgresql`.

- **Symptom:** Security Onion sensors not capturing traffic.
  - Confirm the sensor interface is in promiscuous mode.
  - Restart services with `sudo so-status` and `sudo so-restart`.
- **Symptom:** `report_compiler.py` exits with "No reports found".
  - Verify completed report templates exist under `labs/*/reports/`.
  - Adjust the `--pattern` flag to match your naming convention.

Document additional troubleshooting steps in this file to build a knowledge base over time.
