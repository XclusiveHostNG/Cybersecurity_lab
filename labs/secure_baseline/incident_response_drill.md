# Incident Response Drill

Simulate a security incident within the lab to practice detection, containment, eradication, and recovery.

## Scenario

An attacker compromises the Metasploitable machine and attempts lateral movement to Kali Linux.

## Roles

- **Incident Commander:** Coordinates response activities.
- **Forensic Analyst:** Collects evidence from affected systems.
- **Network Defender:** Implements containment measures via pfSense and Security Onion.

## Procedure

1. **Detection**
   - Monitor Security Onion alerts for unusual outbound traffic.
   - Validate findings with Zeek logs and Suricata events.

2. **Containment**
   - Isolate Metasploitable by blocking its IP on pfSense.
   - Take a snapshot of the compromised VM for analysis.

3. **Eradication**
   - Identify persistence mechanisms on Metasploitable.
   - Remove malicious files and disable unauthorized services.

4. **Recovery**
   - Restore services from clean snapshots.
   - Conduct a vulnerability review to prevent recurrence.

5. **Post-Incident Review**
   - Document timeline and actions in `reports/incident_report.md`.
   - Update runbooks and detection rules based on lessons learned.
