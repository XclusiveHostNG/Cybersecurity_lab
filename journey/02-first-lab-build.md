# Building the First Lab Environment

The first tangible milestone was deploying a virtualized lab on a single workstation. I used VirtualBox to run isolated networks that mimicked production services without risking my home network.

## Lab Components

- **Gateway:** pfSense providing DHCP, DNS, and firewall policies.
- **Attack Box:** Kali Linux with a curated set of penetration testing tools.
- **Victim Hosts:** Windows 10 and Ubuntu Server instances configured with vulnerable services for practice.

## Lessons Learned

- Resource allocation matters—oversubscribing CPU or RAM causes lab instability.
- Snapshots are invaluable; take one before major changes.
- Documenting every configuration step makes rebuilding effortless.
