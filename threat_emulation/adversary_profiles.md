# Adversary Profiles

These profiles summarize the threat actors emulated within the lab. Each entry informs detection engineering, hunt queries, and purple team scenarios.

## APT29 (Cozy Bear)

- **Tactics Focused:** Initial Access via Spearphishing, Execution via PowerShell, Persistence through scheduled tasks.
- **Key Techniques:**
  - T1566.001 — Spearphishing Attachment delivered with malicious macros.
  - T1059.001 — PowerShell execution with obfuscated scripts.
  - T1053.005 — Scheduled Task creation for persistence.
- **Detection Notes:** Monitor for unusual `powershell.exe` child processes spawned by Outlook and encoded command usage. Enable enhanced logging (Script Block Logging, Module Logging) on Windows endpoints.

## FIN7

- **Tactics Focused:** Credential Access using web shells, Lateral Movement with PsExec, Exfiltration over HTTPS.
- **Key Techniques:**
  - T1505.003 — Web shell deployment on IIS servers.
  - T1021.002 — SMB/Windows Admin Shares for lateral movement.
  - T1041 — Exfiltration over C2 channel using TLS tunnels.
- **Detection Notes:** Create Sigma rules for suspicious `cmd.exe /c psexec` patterns and monitor for anomalous outbound HTTPS sessions from servers lacking internet requirements.

## Ransomware Operator (Generic)

- **Tactics Focused:** Privilege Escalation through token manipulation, Impact via data encryption, Discovery of backup infrastructure.
- **Key Techniques:**
  - T1134.001 — Token Impersonation using `mimikatz`.
  - T1486 — Encrypting file shares across SMB.
  - T1083 — File and Directory Discovery to identify backups.
- **Detection Notes:** Alert on SMB write operations to backup shares and track modifications to Volume Shadow Copy service settings.
