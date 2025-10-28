# Repository File Structure Reference

This document captures the current layout of the cybersecurity lab repository. Use it when you want a quick, authoritative
view of where each artifact lives or when you plan to extend the project with new content.

## Top-Level Overview

The repository is organized around the lifecycle of building and operating the lab. The table below explains the focus of each
top-level directory.

| Path | Purpose |
| ---- | ------- |
| `automation/` | Infrastructure-as-code samples and CI/CD automation that speed up provisioning and validation. |
| `checklists/` | Repeatable task lists for hardening, validation, and incident response activities. |
| `docs/` | Long-form guides and planning references, including this file. |
| `journey/` | Narrative entries documenting the learning process and milestones reached along the way. |
| `lab_environment/` | Architecture descriptions, build guides, and VM templates for the environment. |
| `operations/` | Day-two operational resources such as monitoring strategy and runbooks. |
| `resources/` | Curated books, courses, and other study materials supporting continued growth. |
| `scripts/` | Utility scripts for auditing the lab and bootstrapping workstations. |
| `threat_emulation/` | Adversary profiles and purple-team exercise plans used to test defenses. |

## Detailed Tree

The following tree lists every tracked file. Update this section when adding or removing artifacts so it remains accurate.

```text
.
├── README.md
├── automation
│   ├── README.md
│   ├── ansible
│   │   ├── README.md
│   │   ├── files
│   │   │   └── sysmon-config.xml
│   │   ├── inventory.yml
│   │   └── playbooks
│   │       └── hardening.yml
│   ├── pipelines
│   │   ├── README.md
│   │   └── github-actions.yml
│   └── terraform
│       ├── README.md
│       ├── main.tf
│       ├── outputs.tf
│       ├── terraform.tfvars.example
│       └── variables.tf
├── checklists
│   ├── build-and-validation.md
│   ├── hardening-checklist.md
│   └── incident-response.md
├── docs
│   ├── backlog.md
│   ├── operational-calendar.md
│   ├── repo-structure.md
│   ├── setup-guide.md
│   └── templates
│       └── bom-template.csv
├── journey
│   ├── 01-getting-started.md
│   ├── 02-first-lab-build.md
│   ├── 03-learning-milestones.md
│   └── 04-future-expansion.md
├── lab_environment
│   ├── build_guides
│   │   ├── pfsense.md
│   │   └── proxmox.md
│   ├── lab-overview.md
│   ├── network-diagram.md
│   ├── setup-checklist.md
│   └── vm_templates
│       ├── kali-linux.md
│       ├── ubuntu-server.md
│       └── windows-server.md
├── operations
│   ├── README.md
│   ├── monitoring-maturity.md
│   └── runbooks
│       ├── log-review.md
│       └── patch-management.md
├── resources
│   ├── books.md
│   └── online-courses.md
├── scripts
│   ├── README.md
│   ├── audit_lab.sh
│   └── bootstrap_lab.sh
└── threat_emulation
    ├── adversary_profiles.md
    └── purple_team_exercises.md
```

## Maintenance Tips

- Keep the tree sorted alphabetically to simplify scanning and comparisons with `git status` output.
- When adding a new directory, consider whether it needs an accompanying README to explain its purpose.
- If a script or playbook depends on external tooling, document prerequisites in the relevant directory README and in the
  top-level `README.md` so new contributors are aware.

Maintaining an accurate structure reference helps future lab builders quickly orient themselves and prevents artifacts from
getting lost as the repository grows.
