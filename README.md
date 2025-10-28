# Cybersecurity Lab Repository

This repository chronicles the build-out of a personal cybersecurity lab—from first experiments to an enterprise-style learning environment—and provides everything needed to recreate or iterate on the setup. Every folder is documentation-driven, pairing narrative notes with technical instructions, automation artifacts, and operational runbooks.

## Repository Structure

```text
├── journey/                   # Learning journal and milestone reflections
├── lab_environment/           # Architectural design, build guides, and VM templates
│   └── build_guides/          # Step-by-step instructions for core infrastructure
├── checklists/                # Repeatable security and incident response procedures
├── operations/                # Day-two runbooks, monitoring guidance, and SOPs
│   └── runbooks/              # Actionable response procedures for common tasks
├── threat_emulation/          # Adversary profiles and purple-team exercise plans
├── automation/                # Infrastructure-as-code samples and inventories
│   └── ansible/               # Example Ansible inventory and playbooks
├── resources/                 # Curated learning references
└── scripts/                   # Utility scripts for lab automation and validation
```

## Getting Started

1. **Understand the journey:** Start with `journey/` to see how the lab evolved and which skills were built along the way.
2. **Plan the build:** Review `lab_environment/lab-overview.md` and the detailed `build_guides/` before provisioning hardware or cloud resources.
3. **Deploy infrastructure:** Use the templates in `lab_environment/vm_templates/` and automation samples in `automation/` to stand up virtual machines consistently.
4. **Operationalize security:** Apply the `checklists/` and `operations/` runbooks to enforce hardening, monitoring, and incident response workflows.
5. **Evolve capabilities:** Incorporate the `threat_emulation/` exercises to test detections, then revisit notes in `journey/` to document lessons learned.

## Lab Philosophy

- **Isolation First:** The lab remains segmented from production or personal networks until controls are validated.
- **Document to Automate:** Every manual task is documented so it can be turned into automation later.
- **Continuous Improvement:** Findings from threat emulation and incidents feed directly back into hardening and documentation.

## Contributing

This is a personal learning project, but ideas and suggestions are always welcome. Open an issue or submit a pull request with context around the improvement you would like to see.
