# Automation Artifacts

Automation keeps the lab reproducible and reduces manual toil. This directory contains Infrastructure-as-Code samples, CI
pipelines, and supporting documentation that you can adapt to your environment.

## Directory Overview

- `ansible/` — Inventory and playbooks for hardening and validating lab hosts.
- `pipelines/` — CI examples (GitHub Actions) that lint Ansible, run health checks, and validate Terraform modules.
- `terraform/` — Sample Terraform configuration for provisioning Proxmox VMs and VLAN-aware networking.

## Usage Tips

1. **Start with Ansible:** Ensure your inventory reflects the hosts deployed in `lab_environment/`. The
   `playbooks/hardening.yml` file applies security baselines across Windows and Linux systems.
2. **Bootstrap tooling:** Execute `scripts/bootstrap_lab.sh` to install Ansible, Terraform, and other CLI dependencies on the
   management workstation.
3. **Adopt CI early:** Copy `pipelines/github-actions.yml` into your GitHub repository (or convert it for GitLab CI/Azure
   Pipelines) so every change is validated before merging.
4. **Extend Terraform:** Modify `terraform/main.tf` to include additional hosts such as IDS sensors, vulnerability scanners, or
   jump boxes. Keep sensitive values in `terraform.tfvars`, which is ignored by git.

> 📦 Consider creating a `automation/ansible/reports/` directory (ignored by git) to store OSCAP results and compliance summaries
> generated during playbook runs.
