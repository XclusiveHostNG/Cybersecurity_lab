# Terraform Lab Modules

These Terraform files illustrate how to provision a minimal Proxmox-based lab environment. They are intended as a starting point
for codifying virtual networks and base VMs; customize them to align with your own hypervisor or cloud provider.

## Getting Started

1. Install Terraform (`scripts/bootstrap_lab.sh` can handle this on Ubuntu-based systems).
2. Copy `terraform.tfvars.example` to `terraform.tfvars` and fill in API credentials.
3. Run `terraform init` to download providers, then `terraform plan` to review changes.
4. Apply with `terraform apply` when ready. Destroy resources with `terraform destroy` when you need a clean slate.

## Files

- `main.tf` — Defines provider configuration, networks, and base virtual machines.
- `variables.tf` — Declares input variables for credentials, network CIDRs, and resource sizing.
- `outputs.tf` — Exposes IP addresses and VM identifiers after apply completes.
- `terraform.tfvars.example` — Sample values to copy into a personal `terraform.tfvars` (excluded from git).

> 🔐 Store sensitive information such as API tokens in environment variables or encrypted secret managers. `terraform.tfvars`
> is deliberately ignored by `.gitignore` to prevent accidental commits.
