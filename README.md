# Cybersecurity Lab Repository

This repository documents the journey of building a personal cybersecurity lab and provides step-by-step guidance for recreating a secure, isolated testbed. It includes environment architecture notes, detailed host setup guides, curated exercises, and supporting resources that showcase the progression from foundational security exploration to advanced offensive and defensive practices.

## Repository Structure

- `docs/` &mdash; High-level narratives about the learning journey, lab architecture, and tooling standards.
- `setup/` &mdash; Platform-specific build guides, including configuration and hardening notes.
- `exercises/` &mdash; Hands-on scenarios organized by reconnaissance, exploitation, and defense disciplines.
- `resources/` &mdash; Supplemental references such as checklists, network diagrams, and template configurations.

## Getting Started

1. Read `docs/overview.md` to understand the motivation, goals, and safety principles that inform the lab design.
2. Review `docs/lab-architecture.md` to see the target topology and resource requirements.
3. Follow the platform guides inside `setup/` to deploy vulnerable targets (e.g., Metasploitable) and tooling workstations (e.g., Kali Linux, Windows).
4. Use the scenarios under `exercises/` to practice both offensive and defensive workflows inside the isolated environment.

## Contributing

This repository reflects a personal learning journey, but contributions are welcome. Please open an issue to discuss improvements, additional lab scenarios, or corrections before submitting a pull request.

## Safety Notice

Always keep lab environments isolated from production networks. Use snapshots, strong segmentation, and non-routable addressing to ensure experiments remain contained.
