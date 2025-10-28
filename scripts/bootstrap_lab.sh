#!/usr/bin/env bash
# bootstrap_lab.sh - Configure a management workstation with core lab tooling.
#
# This script installs Ansible, Terraform, and other CLI utilities used throughout the lab documentation. It is intentionally
# idempotent and safe to re-run after system updates. Adjust package manager commands to match your distribution.

set -euo pipefail

log() {
  printf '[bootstrap] %s\n' "$*"
}

require_command() {
  if ! command -v "$1" >/dev/null 2>&1; then
    log "Installing $1"
    sudo apt-get update -y >/dev/null
    sudo apt-get install -y "$1"
  else
    log "$1 already installed"
  fi
}

install_ansible() {
  if ! command -v ansible >/dev/null 2>&1; then
    log "Installing Ansible"
    sudo apt-get update -y >/dev/null
    sudo apt-get install -y python3 python3-pip sshpass
    python3 -m pip install --user --upgrade ansible ansible-lint
  else
    log "Ansible already installed"
  fi
}

install_terraform() {
  if ! command -v terraform >/dev/null 2>&1; then
    log "Installing Terraform"
    sudo apt-get update -y >/dev/null
    sudo apt-get install -y gnupg software-properties-common curl
    curl -fsSL https://apt.releases.hashicorp.com/gpg | sudo gpg --dearmor -o /usr/share/keyrings/hashicorp-archive-keyring.gpg
    echo "deb [signed-by=/usr/share/keyrings/hashicorp-archive-keyring.gpg] https://apt.releases.hashicorp.com $(lsb_release -cs) main" | sudo tee /etc/apt/sources.list.d/hashicorp.list >/dev/null
    sudo apt-get update -y >/dev/null
    sudo apt-get install -y terraform
  else
    log "Terraform already installed"
  fi
}

install_misc_tools() {
  local tools=(jq nmap git curl)
  for tool in "${tools[@]}"; do
    require_command "$tool"
  done
}

configure_workspace() {
  mkdir -p "$HOME/.config/cyber-lab"
  cat <<'CONFIG' > "$HOME/.config/cyber-lab/README.txt"
This directory stores generated configuration for the cybersecurity lab tooling.
- ansible.log      : Latest Ansible run output
- terraform.tfvars : Local secrets/variables (not committed to git)
CONFIG
  log "Workspace directory prepared at $HOME/.config/cyber-lab"
}

main() {
  log "Bootstrapping management workstation"
  install_ansible
  install_terraform
  install_misc_tools
  configure_workspace
  log "Bootstrap complete. Review README.md for next steps."
}

main "$@"
