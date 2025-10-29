# Learning Journey Overview

Building this cybersecurity lab started as a curiosity-driven initiative to understand how attackers operate and how defenders can counter them. The lab evolved through incremental milestones, starting with familiarization on safe vulnerable machines, expanding into multi-host environments, and culminating in purple-team style exercises that combine offensive discovery with defensive monitoring.

## Milestones

1. **Foundations:** Learned Linux command-line fundamentals, networking basics, and security terminology using online platforms and guided tutorials.
2. **First Lab Build:** Deployed a single Metasploitable virtual machine inside a VirtualBox host-only network to practice reconnaissance and exploitation without risk to other systems.
3. **Tooling Expansion:** Introduced Kali Linux as the primary offensive workstation and configured persistent storage, proxychains, and VPN tooling.
4. **Diverse Targets:** Added Windows Server and client operating systems to simulate corporate environments and explore Active Directory attack paths.
5. **Defensive Visibility:** Implemented open-source detection tooling (e.g., Security Onion, Zeek) to capture logs and build detection rules while attacks are executed.
6. **Automation & Documentation:** Wrote repeatable build documentation, scripts for baseline configuration, and regular snapshot routines to ensure quick recovery after experiments.

## Guiding Principles

- **Safety First:** Always operate the lab on an isolated virtual network with no bridge to production or personal networks.
- **Documentation Matters:** Record changes, commands, and observations in lab journals to accelerate troubleshooting and knowledge retention.
- **Incremental Complexity:** Add one new component at a time, validating stability and security before layering additional services.
- **Ethical Use:** Practice only on systems you own or have explicit permission to test.

## Next Steps

Continue to enrich the lab by integrating threat emulation frameworks, blue-team dashboards, and automated patch pipelines. Align experiments with personal learning goals, certification objectives, or professional projects to keep the journey focused and rewarding.
