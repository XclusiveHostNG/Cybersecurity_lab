# Credential Attacks Practice

This exercise explores password attack methodologies in a controlled environment.

## Warning

Only perform these attacks against authorized lab systems. Never target production networks.

## Scenario Setup

- Create a test VM or container running SSH with weak credentials (`student:Password123`).
- Generate a password list using `cewl` from a sample website or wordlist.
- Store wordlists in `~/engagements/wordlists/`.

## Exercises

1. **Brute Force with Hydra**
   - Command: `hydra -l student -P wordlists/top-passwords.txt ssh://192.168.56.25`.
   - Record success or failure and adjust wordlists accordingly.

2. **Credential Spraying**
   - Use `ncrack` or `crackmapexec` to test one password across multiple hosts.
   - Document any account lockouts to highlight detection opportunities.

3. **Password Cracking**
   - Capture password hashes using `responder` or offline files.
   - Use `john --wordlist=wordlists/custom.txt hashes.txt` to attempt cracking.

## Reporting

- Summarize results in `reports/credential_attack_findings.md`.
- Include mitigation strategies such as MFA, account lockout policies, and user education.
