# Lab Journal

Use this journal to capture experiment details, observations, and follow-up actions.

## Entry Template

```
### [Date] - [Exercise Name]
- Objective:
- Hosts Involved:
- Tools Used:
- Key Findings:
- Issues Encountered:
- Mitigations/Next Steps:
```

## Sample Entries

### 2024-01-05 - Initial Reconnaissance
- Objective: Map open services on Metasploitable.
- Hosts Involved: kali-offsec, metasploitable.
- Tools Used: `nmap -sV -O 10.10.10.20`.
- Key Findings: Discovered vsFTPd 2.3.4, MySQL, Tomcat, Samba shares.
- Issues Encountered: None.
- Mitigations/Next Steps: Plan targeted exploitation for vsFTPd backdoor.

### 2024-01-12 - Windows Lateral Movement
- Objective: Test pass-the-hash against domain member.
- Hosts Involved: kali-offsec, win-dc01, win10-client01.
- Tools Used: `crackmapexec`, `evil-winrm`.
- Key Findings: Admin hash allowed remote command execution on client.
- Issues Encountered: WinRM initially blocked by firewall; rule updated for management subnet only.
- Mitigations/Next Steps: Implement tiered admin accounts and enable LAPS.
