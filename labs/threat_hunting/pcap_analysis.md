# Threat Hunting Lab – PCAP Analysis

## Scenario Overview
- **Date:** Record the date/time of the lab.
- **Objective:** Identify the initial compromise vector and lateral movement steps from a captured PCAP.
- **Data Source:** `/nsm/pcap` export from Security Onion (Zeek + Suricata sensors).

## Requirements
- Security Onion with Stenographer enabled.
- Wireshark or tshark installed on your analyst workstation.
- Baseline network diagram from `assets/lab_network_topology.md` for reference.

## Tasks
1. **Triage the Alert**
   - Review Suricata alerts associated with the PCAP. Note signature IDs and affected hosts.
2. **Inspect Session Metadata**
   - Use Zeek `conn.log` to determine the timeline of connections between Kali and Metasploitable.
   - Highlight unusual ports or protocols compared to normal lab activity.
3. **Payload Reconstruction**
   - Extract HTTP objects or SMB files transferred during the attack.
   - Calculate SHA256 hashes and compare against known malware databases (offline).
4. **Lateral Movement Detection**
   - Identify any pivot from Metasploitable to other systems (e.g., Security Onion management interface).
   - Document credentials or exploits used.
5. **Report Findings**
   - Summarize attacker goals, techniques (MITRE ATT&CK mapping), and recommended detections in `labs/metasploitable/reports/`.

## Success Criteria
- You can articulate the full attack path from initial access to impact.
- All extracted artifacts are hashed and stored in your evidence folder.
- Recommendations include at least one network-based detection and one host-based mitigation.

> **Stretch Goal:** Use Zeek scripting to tag suspicious connections and re-import the script into Security Onion.
