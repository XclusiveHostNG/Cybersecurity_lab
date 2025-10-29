# Cybersecurity Lab Repository

This repository chronicles the build-out of a personal cybersecurity lab—from the first exercises to a full enterprise-style
playground—and provides everything needed to recreate or iterate on the setup. Each directory pairs narrative notes with
step-by-step instructions, automation artifacts, and operational runbooks so you can both follow the journey and reproduce the
environment on your own hardware or homelab cluster.

## How to Use This Repository

1. **Learn the origin story** in `journey/` to understand the skills developed at each milestone.
2. **Design your topology** using `lab_environment/` where diagrams, build guides, and setup checklists live.
3. **Provision infrastructure** by adapting the automation samples under `automation/` and the VM templates in
   `lab_environment/vm_templates/`.
4. **Operationalize defenses** with the procedures in `operations/` and the hardening + incident response checklists in
   `checklists/`.
5. **Continuously challenge the lab** using the adversary simulations and purple team playbooks under `threat_emulation/`.

> 💡 All documentation is written to be technology-agnostic. Replace the virtualization platform, network ranges, or
> automation tooling with your own preferences while keeping the same guiding structure.

## Repository Structure

The following high-level map shows how the lab documentation is organized.

```text
├── automation/                # Infrastructure-as-code samples and pipelines
│   └── ansible/               # Example Ansible inventory and playbooks
├── checklists/                # Repeatable security and incident response procedures
├── docs/                      # Deep-dive guides and planning references
├── journey/                   # Learning journal and milestone reflections
├── lab_environment/           # Architectural design, build guides, and VM templates
│   └── build_guides/          # Step-by-step instructions for core infrastructure
├── operations/                # Day-two runbooks, monitoring guidance, and SOPs
│   └── runbooks/              # Actionable response procedures for common tasks
├── resources/                 # Curated learning references for continued growth
├── scripts/                   # Utility scripts for lab automation and validation
└── threat_emulation/          # Adversary profiles and purple-team exercise plans
```

### Detailed Directory Map

Use the table below to quickly locate notable files. Treat it as a living index when adding new material. A comprehensive
tree that lists every tracked file lives in `docs/repo-structure.md` for times when you need an authoritative snapshot of the
repository layout.

| Path | Description |
| ---- | ----------- |
| `automation/README.md` | Overview of automation strategy and roadmap for IaC expansion. |
| `automation/ansible/inventory.yml` | Sample inventory demonstrating how hosts are grouped by function. |
| `automation/ansible/playbooks/hardening.yml` | Baseline hardening playbook for Linux and Windows assets. |
| `automation/pipelines/github-actions.yml` | Continuous integration example that lint-checks Ansible content. |
| `automation/terraform/main.tf` | Terraform sample for provisioning lab networks and VMs on Proxmox. |
| `checklists/build-and-validation.md` | Comprehensive checklist for initial lab setup and smoke testing. |
| `checklists/hardening-checklist.md` | Control validation steps aligned to CIS benchmarks. |
| `docs/setup-guide.md` | End-to-end secured lab deployment guide covering hardware to monitoring. |
| `journey/` | Narrative documenting how the lab evolved and key lessons learned. |
| `lab_environment/setup-checklist.md` | Task list for preparing virtualization, network segments, and base services. |
| `operations/monitoring-maturity.md` | SOC-inspired telemetry strategy and detection tuning cadence. |
| `scripts/audit_lab.sh` | Health-check script validating critical services and EDR agent status. |
| `scripts/bootstrap_lab.sh` | Helper script for configuring the management workstation with required tooling. |
| `scripts/generate_repo_tree.py` | Utility to regenerate the repository tree snippet documented in `docs/repo-structure.md`. |
| `threat_emulation/purple_team_exercises.md` | Scenario outlines mapping offensive actions to defensive validations. |

## Lab Philosophy

- **Isolation First:** The lab stays segmented from production or personal networks until controls are validated.
- **Document to Automate:** Every manual task is documented so it can be automated later.
- **Continuous Improvement:** Findings from threat emulation and incidents feed back into hardening and documentation updates.

## Contributing

This is a personal learning project, but ideas and suggestions are welcome. Open an issue or submit a pull request with context
around the improvement you would like to see. When contributing, keep the documentation-driven approach in mind and update the
index above so future readers can easily discover your additions.
