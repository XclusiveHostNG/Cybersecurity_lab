# Assets

This directory stores supporting materials for the lab, such as network diagrams, exported scan results, and ISO file references.

## Suggested Organization

```
assets/
├── diagrams/
├── iso/
├── appliances/
├── journal/             # Personal reflections (git-ignored) referenced in the journey timeline
└── exports/             # Sanitized screenshots, dashboard exports, and evidence bundles
```

Large binary files (ISO images, virtual appliances) should be stored outside of version control. Instead, include checksum files or download links.

## Files

- `lab_network_topology.md` – Text-based diagram describing the lab network layout.
- `journey_journal_template.md` – Prompts for documenting reflections after each lab (copy outside version control).
