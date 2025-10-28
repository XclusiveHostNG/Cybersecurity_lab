# Scanning Playbook

Build a repeatable process for scanning new targets with Kali Linux.

## Preparation

- Update `nmap`, `masscan`, and `rustscan` packages.
- Configure directories:
  - `~/engagements/<target>/scans`
  - `~/engagements/<target>/loot`

## Workflow

1. **Baseline Discovery**
   - Run `nmap -sn <subnet>` to map live hosts.
   - Save results to `scans/ping_sweep.txt`.

2. **Fast Port Scan**
   - Use `masscan` for quick coverage: `sudo masscan <target> -p0-65535 --rate 10000 -oX scans/masscan.xml`.
   - Convert to grepable format with `awk` or `xsltproc`.

3. **Focused Enumeration**
   - Run targeted `nmap` scripts based on open ports.
   - Example: `nmap -sV -p 80,443 --script=http-title,http-methods <target>`.

4. **UDP Coverage**
   - Execute `nmap -sU --top-ports 100 <target>` and note any responses.

5. **Automation Hooks**
   - Integrate results with custom scripts in `scripts/` to generate markdown summaries.

## Reporting

- Store key findings in `reports/scanning_summary.md`.
- Tag Git commits with the target name for traceability.
