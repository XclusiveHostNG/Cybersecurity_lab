# Windows Hardening Playbook

Use this playbook to secure Windows hosts while preserving functionality required for lab scenarios.

## Account Controls

- Enforce complex passwords with minimum length of 12 characters via Group Policy.
- Enable account lockout after five failed attempts with a 15-minute reset window.
- Disable the local Administrator account when not required; use LAPS or a password vault for secrets management.

## Network Protections

- Configure Windows Defender Firewall with inbound rules limited to RDP (management network only), SMB, and WinRM as needed.
- Disable unnecessary services (e.g., Remote Registry, Telnet).
- Restrict PowerShell Remoting to trusted hosts via `Set-PSSessionConfiguration -ShowSecurityDescriptorUI`.

## Logging & Monitoring

- Install Sysmon using `resources/sysmon-config.xml`.
- Enable PowerShell script block logging and transcription.
- Configure Windows Event Forwarding to send Security, Sysmon, and PowerShell logs to Security Onion.

## Application Control

- Enable Windows Defender Application Control in audit mode to establish baselines.
- Use Controlled Folder Access to protect critical directories from ransomware simulation.
- Maintain an allowlist of administrative tools required for exercises.

## Patch Management

- Schedule Windows Update for offline WSUS or manual patching windows.
- Document patch cycles in `resources/lab-journal.md` to correlate with attack simulations.

## Validation Checklist

- [ ] Firewall profiles enabled and tested
- [ ] Event forwarding operational
- [ ] Sysmon logs visible in SIEM
- [ ] Admin account rotation documented
- [ ] Latest cumulative updates installed
