# Automation Pipelines

This directory contains examples of how to integrate the cybersecurity lab repository with continuous integration/continuous
deployment (CI/CD) systems. Use these samples as a baseline for linting Infrastructure-as-Code, running compliance checks, and
tracking artifact versions.

## GitHub Actions

- `github-actions.yml` demonstrates how to:
  - Run `ansible-lint` and YAML validation on every pull request.
  - Execute shell scripts like `scripts/audit_lab.sh` in a controlled environment.
  - Upload compliance reports as workflow artifacts for review.

## Extending the Pipelines

1. **Add Terraform validation:** Include `terraform fmt -check` and `terraform validate` steps once modules are created.
2. **Incorporate security scanning:** Integrate tools such as Trivy, tfsec, or Checkov to scan container images and IaC.
3. **Notify stakeholders:** Hook workflow results into Slack, Microsoft Teams, or email notifications.
4. **Version artifacts:** Publish hardened VM templates or configuration bundles to an internal registry after successful tests.

> ⚠️ Secrets such as API tokens or SSH keys should be stored in CI secret managers and never checked into the repository.
