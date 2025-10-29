# Vulnerable Services Catalog

Track vulnerable services across lab targets to prioritize learning objectives and remediation practice.

## Metasploitable

| Service        | Port | Version  | Notes |
|----------------|------|----------|-------|
| vsFTPd         | 21   | 2.3.4    | Backdoor vulnerability (CVE-2011-2523) |
| OpenSSH        | 22   | 4.7p1    | Supports weak ciphers for downgrade testing |
| Telnet         | 23   | BusyBox  | Use for credential brute force demonstrations |
| Apache Tomcat  | 8180 | 5.5.20   | Default credentials; deploy WAR shell |
| Samba          | 139/445 | 3.0.20 | MS08-067 exploitation practice |

## Windows Domain Controller

| Service        | Port | Notes |
|----------------|------|-------|
| Active Directory | 389/636/3268/3269 | LDAP enumeration and Kerberoasting |
| SMB             | 445  | Lateral movement testing |
| WinRM           | 5985/5986 | Enabled for management; restrict to management subnet |
| DNS             | 53   | Zone transfer practice |

## Windows Client

| Service        | Port | Notes |
|----------------|------|-------|
| SMB            | 445  | File share enumeration |
| RDP            | 3389 | Enabled for blue team monitoring |

## Future Targets

Document new systems here with service lists, credentials, and relevant CVEs to expand the lab in a controlled manner.
