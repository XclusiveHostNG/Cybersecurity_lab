# System Hardening Checklist

Use this checklist when provisioning or auditing systems inside the lab.

## Accounts and Access

- [ ] Disable default accounts and rename administrative usernames.
- [ ] Enforce MFA for all interactive logons.
- [ ] Rotate service account credentials every 90 days.

## Patch Management

- [ ] Apply OS updates and firmware patches.
- [ ] Validate backups prior to major upgrades.
- [ ] Document change windows and expected impact.

## Network Controls

- [ ] Restrict inbound traffic using host-based firewalls.
- [ ] Enforce TLS on all web services with certificates issued by the lab CA.
- [ ] Disable unused network services and close unneeded ports.

## Monitoring

- [ ] Forward system logs to the ELK stack.
- [ ] Enable endpoint detection agents (Wazuh/Sysmon).
- [ ] Configure alerts for privilege escalation and anomalous logins.
