# Lab Networking Guide

Reliable segmentation is key to safe experimentation. This guide outlines how to configure IP addressing, routing, and monitoring within the lab testbed.

## Network Segments

| Segment       | Subnet          | Purpose                               |
|---------------|-----------------|---------------------------------------|
| Management    | 192.168.56.0/24 | Administrative access, updates        |
| Lab Internal  | 10.10.10.0/24   | Vulnerable targets and monitoring     |
| DMZ (Optional)| 172.16.5.0/24   | Externally exposed services simulation|

## Addressing Standards

- Reserve `.1` for gateway (if using a virtual router) and `.10`, `.20`, etc., for static hosts.
- Document assignments in `resources/inventory.csv`.
- Use DNS suffix `lab.local` for internal resolution.

## Routing

- Avoid default gateways on lab-only adapters to prevent outbound traffic.
- If internet access is required for updates, enable NAT on a virtual router and disable after updates.
- Implement firewall rules to restrict traffic between segments (e.g., only allow RDP from management to Windows hosts).

## Monitoring Integration

- Mirror lab network traffic to the Security Onion sensor using a virtual switch or port group settings.
- Configure Zeek to monitor `10.10.10.0/24` and forward logs to the ELK stack.
- Use `tcpdump` on Kali Linux for on-demand packet captures when investigating incidents.

## Time Synchronization

- Run an internal NTP server (e.g., `chrony` on the management network).
- Point all lab hosts to the NTP server to maintain consistent timestamps.

## Documentation

- Update `resources/lab-journal.md` after network changes.
- Keep diagrams current in `resources/network-diagram.md` to reflect new systems or segments.
