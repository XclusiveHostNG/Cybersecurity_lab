# Cybersecurity Lab

Welcome to my cybersecurity lab repository. This project documents how I began my journey into cybersecurity, how I built a secure home lab environment, and the structured exercises I use to continue learning.

## Repository Structure

```text
.
├── assets/                  # Diagrams, exported reports, and supporting resources
├── docs/                    # Reference material, architecture decisions, and learning roadmap
├── guides/                  # Step-by-step build and hardening walkthroughs
├── labs/
│   ├── kali_linux/          # Offensive workflow warmups and credential attack drills
│   ├── metasploitable/      # Service enumeration, exploitation, and reporting templates
│   ├── secure_baseline/     # Defensive playbooks for firewalling, monitoring, and IR drills
│   └── threat_hunting/      # New blue-team focused investigations and log analysis labs
├── scripts/                 # Automation helpers for scanning, updates, and reporting
└── tools/                   # Configuration snippets and reusable artifacts for the lab
```

- `docs/` – foundational knowledge, checklists, and reference material for building and maintaining the lab.
- `guides/` – step-by-step walkthroughs for setting up critical components such as Kali Linux, Metasploitable, and secure baselines.
- `labs/` – detailed lab exercises with objectives, requirements, and reporting templates for both offensive and defensive skills.
- `scripts/` – utility scripts to automate repetitive tasks like network scanning, update auditing, and report compilation.
- `tools/` – configuration exports, sample datasets, and other reusable building blocks referenced in the guides.
- `assets/` – diagrams, exported reports, and supporting resources for the lab guides.

## Getting Started

1. Review the [Secure Lab Overview](docs/secure_lab_overview.md) to understand the goals and design principles of the environment.
2. Map the progression using the [Learning Journey Timeline](docs/learning_journey_timeline.md) so you can track milestones and reflection points.
3. Follow the [Lab Setup Checklist](guides/lab_setup_checklist.md) to prepare your virtualization platform and host machine.
4. Build the base environment using the guides for [Kali Linux](guides/kali_linux_installation.md), [Metasploitable](guides/metasploitable_setup.md), [Security Onion](guides/security_onion_setup.md), and [pfSense](guides/pfsense_firewall_setup.md).
5. Work through the lab exercises under the `labs/` directory to gain hands-on experience across offensive, defensive, and operational disciplines.

## Prerequisites

- Host system capable of running virtualization software (VirtualBox, VMware, or similar).
- At least 16 GB RAM, 100 GB free disk space, and hardware virtualization extensions enabled in BIOS/UEFI.
- Reliable internet connection for downloading ISO images and updates.

## Contributing

This repository represents my personal learning journey. Suggestions and improvements are welcome through issues or pull requests. Please keep feedback constructive and focused on educational value.

## License

This project is released under the MIT License. See [LICENSE](LICENSE) for details.
