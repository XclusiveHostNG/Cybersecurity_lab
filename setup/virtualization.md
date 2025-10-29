# Virtualization Platform Setup

Select a hypervisor that balances performance, licensing, and usability. The lab was originally built on VirtualBox, then expanded to VMware Workstation Pro for advanced networking.

## Host Requirements

- **CPU:** Quad-core processor with hardware virtualization (Intel VT-x/AMD-V)
- **Memory:** Minimum 16 GB to run multiple VMs concurrently
- **Storage:** SSD preferred; allocate at least 500 GB for VM images
- **Networking:** Multiple NICs or VLAN-capable switch for segmented lab connectivity

## Hypervisor Installation

### VirtualBox (Initial Phase)

1. Download the latest VirtualBox installer for your host OS.
2. Install the Extension Pack to enable USB 2.0/3.0 and RDP features.
3. Create host-only networks via *File > Host Network Manager* (e.g., `vboxnet0`).

### VMware Workstation / Fusion (Advanced Phase)

1. Install VMware Workstation Pro (Windows/Linux) or Fusion (macOS).
2. Create custom virtual networks using the Virtual Network Editor:
   - `VMnet2` &mdash; Management (host-only)
   - `VMnet3` &mdash; Lab (host-only, no DHCP)
3. Disable automatic bridging to prevent unintended internet access.

### Proxmox VE (Future Upgrade)

1. Download the Proxmox ISO and create a bootable USB.
2. Install on dedicated hardware; configure a management interface and separate lab bridge.
3. Use Proxmox templates to clone Kali, Metasploitable, and Windows images quickly.

## Resource Allocation Strategy

- Start with small footprints and scale RAM/CPU based on exercise requirements.
- Use thin-provisioned disks but monitor capacity to avoid overcommitment.
- Schedule lab shutdowns during off-hours to reduce host power consumption.

## Snapshot & Backup Practices

1. Take snapshots before major changes or exploit runs.
2. Export critical VM snapshots monthly to external storage.
3. Maintain snapshot logs in `resources/inventory.csv` for traceability.

## Troubleshooting Tips

- If VMs lose network connectivity, reset the host-only adapter and reassign static IPs.
- Monitor host CPU/RAM usage; close unnecessary applications during lab sessions.
- Keep hypervisor software updated to patch security vulnerabilities.
