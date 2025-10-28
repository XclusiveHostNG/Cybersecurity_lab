# Threat Hunting Lab – Log Correlation

## Scenario Overview
- **Date:** Record when the investigation occurs.
- **Objective:** Correlate multi-source alerts to confirm whether a credential brute-force attack succeeded.
- **Data Sources:**
  - pfSense firewall logs forwarded to Security Onion.
  - Zeek `login.log` and `notice.log`.
  - Sysmon (optional) for Windows jump hosts.

## Preparation
- Export logs for the target timeframe to `tools/datasets/log_correlation/`.
- Tag the associated network scan evidence produced by `scripts/network_scan.sh`.

## Tasks
1. **Establish Baseline**
   - Review normal authentication patterns for the Kali and Metasploitable systems.
   - Document typical source IPs and time-of-day activity.
2. **Identify Anomalies**
   - Search for repeated authentication failures in Zeek `login.log`.
   - Cross-reference pfSense logs for blocked/allowed SSH attempts.
3. **Confirm Compromise**
   - Look for successful logins following a burst of failures.
   - Examine Sysmon Event ID 4624 (if available) to determine account usage.
4. **Assess Impact**
   - Determine whether any privileged commands were executed post-login.
   - Note any lateral movement attempts captured in pfSense or Zeek logs.
5. **Document Findings**
   - Complete a narrative in `labs/secure_baseline/incident_response_drill.md` under the *Lessons Learned* section.
   - Update detection content in `tools/detections/` with Sigma or Suricata rules.

## Success Criteria
- Each anomaly is tied to corresponding evidence across at least two log sources.
- You can explain the attack progression chronologically with supporting data.
- Mitigation recommendations address authentication hardening and monitoring coverage.

> **Stretch Goal:** Automate the correlation using a Jupyter notebook that parses Zeek and pfSense logs together.
