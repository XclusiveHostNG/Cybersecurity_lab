# Security Onion Setup Guide

Security Onion provides network security monitoring, intrusion detection, and log management. This guide covers how I deploy it in the lab to visualize attacks launched from Kali against Metasploitable.

## Prerequisites
- Security Onion ISO (download from the official site).
- Virtual machine with at least 8 GB RAM, 4 vCPUs, and 200 GB disk.
- Two virtual NICs: one on the host-only lab network (monitoring) and one on a management network for administration.

## Installation Steps
1. **Create the VM:**
   - Use VirtualBox or VMware and assign the resources listed above.
   - Attach the Security Onion ISO and ensure the host-only adapter is first in the NIC list.
2. **Boot and Install:**
   - Choose the *Install* option and accept defaults for language and keyboard.
   - When prompted, set a strong administrator password and enable the Elasticsearch option for full functionality.
3. **Network Configuration:**
   - Configure the management NIC with static IP `192.168.56.40/24`.
   - Leave the monitoring NIC in *sniffer* mode so it can capture traffic without an IP address.
4. **Sensor Role Selection:**
   - Select *Standalone* to include Elastic, Logstash, and Kibana on a single VM.
   - Enable Zeek, Suricata, and Stenographer for comprehensive packet capture.
5. **Finalize:**
   - Reboot when prompted and verify that the Security Onion Console (SOC) is accessible via HTTPS on the management IP.

## Post-Installation Hardening
- Change default passwords immediately and store them in your encrypted vault.
- Restrict console access by adding firewall rules on the management NIC to allow only the host IP.
- Enable automatic rule updates with `sudo so-rule-update` and schedule via cron.

## Integration Tasks
- Configure port mirroring in VirtualBox so Metasploitable traffic is visible on the monitoring NIC.
- Add pfSense syslog forwarding to Security Onion for correlation with network alerts.
- Create dashboards in Kibana to visualize the labs you perform in `labs/threat_hunting/`.

## Validation Checklist
- [ ] Can log into Security Onion Console with the admin user.
- [ ] Zeek logs populate under `/nsm/zeek/logs/current`.
- [ ] Suricata alerts appear when running `nmap` from Kali against Metasploitable.
- [ ] pfSense firewall logs are ingested and searchable.

> **Next Step:** Move on to the [Threat Hunting PCAP Analysis Lab](../labs/threat_hunting/pcap_analysis.md) to practice investigations using Security Onion telemetry.
