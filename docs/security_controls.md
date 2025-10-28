# Security Controls

Maintaining a secure lab requires more than just isolated networking. This document lists the preventive, detective, and corrective controls implemented throughout the environment.

## Preventive Controls

- **Least Privilege:** Only the necessary user accounts receive administrative rights.
- **Encrypted Storage:** Sensitive credentials and reports are stored in encrypted containers such as VeraCrypt volumes.
- **Application Whitelisting:** Only approved tools are installed on Kali Linux to reduce clutter and risk.

## Detective Controls

- **Security Onion Sensors:** Monitor network traffic for suspicious signatures.
- **Sysmon on Windows Guests:** Provides detailed logging for process execution and network connections.
- **Auditd on Linux Guests:** Captures authentication attempts, file access, and privilege escalations.
- **Custom Detections:** Sigma and Suricata rules developed in `tools/detections/` target lab-specific attack patterns.

## Corrective Controls

- **Snapshot Reversion:** Roll back to pre-exploitation states after each engagement.
- **Automated Updates:** Weekly scripts ensure packages and signatures remain current.
- **Incident Runbooks:** Each lab includes response procedures to handle unexpected behavior.
- **Report Aggregation:** `scripts/report_compiler.py` consolidates findings to accelerate after-action reviews.

## Documentation Practices

- Store all findings in the `labs/*/reports` directories.
- Tag commits with the date and lab name to create an audit trail.
- Use Markdown templates to maintain consistent reporting quality.
