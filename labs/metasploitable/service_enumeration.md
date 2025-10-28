# Service Enumeration Exercise

This exercise documents the reconnaissance phase against the Metasploitable target.

## Scope

- Target: `192.168.56.20`
- Tools: `nmap`, `enum4linux`, `nikto`, `msfconsole`

## Tasks

1. **Network Discovery**
   - Run `nmap -sn 192.168.56.0/24` and verify the target appears in the host-only network.
   - Document MAC addresses and hostnames discovered.

2. **Port Scanning**
   - Execute a full TCP scan: `nmap -sS -p- -T4 192.168.56.20`.
   - Save the output to `reports/service_scan.txt`.
   - Identify open ports and associated services.

3. **Service Enumeration**
   - Use `nmap -sV -sC -O 192.168.56.20` to detect versions and scripts.
   - Run `enum4linux -a 192.168.56.20` to gather SMB information.
   - Target web services with `nikto -h http://192.168.56.20`.

4. **Analysis**
   - Map discovered services to known vulnerabilities.
   - Prioritize targets based on exploit availability and impact.

## Deliverables

- Completed scan outputs stored in the `reports/` folder.
- Notes on potential attack vectors added to this file or attached as comments.
- Summary table included in the vulnerability report.
