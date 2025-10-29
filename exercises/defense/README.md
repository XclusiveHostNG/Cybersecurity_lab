# Defensive Exercises

These scenarios strengthen blue-team skills by focusing on detection, response, and hardening.

## Exercises

1. **Log Review:** Analyze Security Onion alerts generated during exploitation exercises.
2. **Sysmon Tuning:** Adjust `resources/sysmon-config.xml` to reduce noise while capturing attacker activity.
3. **Incident Response Drill:** Simulate a compromise and follow containment steps (isolate VM, collect forensic artifacts).
4. **Patch Validation:** Apply security updates to Windows hosts and verify services remain operational.
5. **Threat Hunting:** Use Elastic or Kibana dashboards to hunt for suspicious behaviors (e.g., PowerShell download cradle).

## Deliverables

- Detection use-cases mapped to MITRE ATT&CK techniques.
- Incident timeline documented in `resources/lab-journal.md`.
- Updated hardening checklist with completed actions.
