# Learning Journey Timeline

This timeline captures the milestones that shaped my cybersecurity lab and learning path. Each phase includes goals, lab artifacts, and reflection prompts to keep the journey intentional.

## Phase 0 – Curiosity and Foundations
- **Goal:** Understand the threat landscape and basic terminology.
- **Activities:**
  - Completed introductory courses on networking and Linux fundamentals.
  - Read the [Secure Lab Overview](secure_lab_overview.md) to anchor the lab vision.
- **Artifacts:** Notes stored under `docs/` and flashcards for command references.
- **Reflection:** What motivated me to pursue cybersecurity, and which domains excite me most?

## Phase 1 – Building the Sandbox
- **Goal:** Assemble an isolated environment to practice without risking production systems.
- **Activities:**
  - Followed the [Lab Setup Checklist](../guides/lab_setup_checklist.md).
  - Installed Kali Linux, Metasploitable, and pfSense using the corresponding guides.
  - Documented the topology in `assets/lab_network_topology.md`.
- **Artifacts:** Screenshots of VM configuration, baseline snapshots, and configuration exports saved under `tools/`.
- **Reflection:** What constraints (CPU, RAM, storage) did I encounter, and how did I mitigate them?

## Phase 2 – Offensive Skills Ramp-Up
- **Goal:** Learn fundamental offensive techniques in a controlled target.
- **Activities:**
  - Executed `labs/kali_linux/command_line_warmup.md` to reinforce muscle memory.
  - Ran `labs/metasploitable/service_enumeration.md` followed by the exploitation walkthrough.
  - Automated reconnaissance with `scripts/network_scan.sh`.
- **Artifacts:** Vulnerability reports stored in `labs/metasploitable/reports/`.
- **Reflection:** Which tactics were most effective, and how could defenders detect them?

## Phase 3 – Defensive Visibility
- **Goal:** Deploy monitoring and log analysis capabilities to observe attacks.
- **Activities:**
  - Built Security Onion using [guides/security_onion_setup.md](../guides/security_onion_setup.md).
  - Configured pfSense rules per [guides/pfsense_firewall_setup.md](../guides/pfsense_firewall_setup.md).
  - Performed threat-hunting labs under `labs/threat_hunting/`.
- **Artifacts:** Packet captures, hunt notes, and Sigma rules archived within `tools/detections/`.
- **Reflection:** What gaps in visibility remain, and which telemetry sources should be added next?

## Phase 4 – Operations and Continuous Improvement
- **Goal:** Treat the lab like a living environment with governance and hygiene.
- **Activities:**
  - Scheduled weekly update audits via `scripts/update_checklist.py`.
  - Captured incident response drills documented in `labs/secure_baseline/incident_response_drill.md`.
  - Logged retrospectives in a personal journal stored in `assets/journal/` (git-ignored for privacy).
- **Artifacts:** Change logs, patch reports, and action plans.
- **Reflection:** How do lab learnings translate to professional environments, and what certifications or projects should follow?

> **Tip:** Review this timeline quarterly, update milestones, and create new labs to target evolving interests such as cloud, IoT, or malware analysis.
