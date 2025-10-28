# Detection Content Library

This folder catalogs detection rules produced during the lab's detection engineering sprint. Rules are grouped by technology and mapped to MITRE ATT&CK techniques.

## Folder Layout
- `sigma_*.yml` – Sigma rules ingestible by Security Onion or SIEM platforms.
- `suricata_*.rules` – Network signatures for Suricata/Zeek integrations.
- `ossec_*.xml` – Host-based rules for Wazuh/OSSEC agents.

## Contribution Workflow
1. Draft the detection in a lab notebook and capture assumptions.
2. Store the rule with a descriptive filename referencing the ATT&CK technique (e.g., `sigma_T1110_kerberos_bruteforce.yml`).
3. Update this README with testing notes under the **Test Matrix** section.
4. Tag the commit message with `detection:` for traceability.

## Test Matrix
| Detection | Data Source | Test Method | Last Verified |
|-----------|-------------|-------------|---------------|
| _Pending_ | - | - | - |

> **Note:** Include sample log snippets in the same directory (sanitized) to make future validation easier.
