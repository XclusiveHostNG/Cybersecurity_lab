# Metasploitable Post-Installation Hardening (Optional)

Although Metasploitable is intentionally insecure, applying minimal hardening steps can help you practice change management and controlled exposures.

## Optional Adjustments

- **Service Tuning:** Disable unnecessary daemons when focusing on a specific exploit class. Use `sudo service <name> stop` and document changes.
- **User Management:** Create dedicated user accounts for each student to track activity separately.
- **Logging:** Enable `rsyslog` forwarding to the monitoring network for attacker activity correlation.
- **Time Sync:** Configure `ntpdate` to sync with an internal NTP server to maintain consistent timestamps across hosts.

## Reset Workflow

1. Revert the VM to the `clean-install` snapshot after each major exercise.
2. Re-run any configuration changes documented above to recreate the intended vulnerable state.
3. Update `resources/lab-journal.md` with observations, including exploited CVEs and remediation ideas.
