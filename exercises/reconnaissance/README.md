# Reconnaissance Exercises

These scenarios focus on information gathering, enumeration, and mapping attack surfaces within the lab.

## Exercises

1. **Network Sweep:** Use `nmap` and `masscan` to identify live hosts on the lab network.
2. **Service Fingerprinting:** Capture service banners and enumerate versions for vulnerability research.
3. **Web Enumeration:** Employ `gobuster`, `nikto`, and manual analysis to discover directories on Metasploitable web services.
4. **DNS Recon:** Enumerate DNS records in the `lab.local` domain using `dnsrecon` and `dig`.
5. **SMB Enumeration:** Use `smbclient` and `enum4linux` to uncover shared resources and user lists on Windows hosts.

## Success Criteria

- Document findings in `resources/lab-journal.md`.
- Map identified services to potential CVEs using `resources/vulnerable-services.md`.
- Maintain captured evidence (screenshots, logs) under `resources/artifacts/`.
