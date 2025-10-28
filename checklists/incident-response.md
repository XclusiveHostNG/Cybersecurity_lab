# Incident Response Checklist

Follow this checklist when investigating alerts generated within the lab environment.

## Preparation

- [ ] Verify communication channels (Slack, Signal) are operational.
- [ ] Ensure evidence collection tools are up to date.
- [ ] Confirm incident handlers have access to necessary systems.

## Identification

- [ ] Validate the alert against SIEM and endpoint telemetry.
- [ ] Capture volatile data (memory, network connections) from affected hosts.
- [ ] Classify the incident severity and document the scope.

## Containment

- [ ] Isolate compromised systems from the network.
- [ ] Implement firewall rules or EDR policies to block malicious activity.
- [ ] Coordinate with stakeholders about service impact.

## Eradication and Recovery

- [ ] Remove malicious artifacts and persistence mechanisms.
- [ ] Patch vulnerabilities exploited during the incident.
- [ ] Restore systems from known-good backups and monitor for recurrence.

## Lessons Learned

- [ ] Conduct a post-incident review and document findings.
- [ ] Update playbooks, detections, and training materials.
- [ ] Track remediation actions to completion.
