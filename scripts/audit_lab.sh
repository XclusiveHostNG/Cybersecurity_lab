#!/usr/bin/env bash
# audit_lab.sh - Run routine health checks across the cybersecurity lab.
#
# Requirements:
#   - bash 5+
#   - nmap
#   - curl
#   - jq
#
# Usage:
#   ./audit_lab.sh
#
# The script performs three categories of checks:
#   1. Network reachability for critical hosts.
#   2. Service availability for web applications and APIs.
#   3. Security control validation (e.g., EDR agent heartbeat).

set -euo pipefail

LAB_HOSTS=(
  "192.168.10.1:pfSense Firewall"
  "192.168.20.10:Domain Controller"
  "192.168.30.5:Kali Attack Box"
)

WEB_ENDPOINTS=(
  "https://graylog.lab.local/api/system/metrics"
  "https://wazuh.lab.local"
)

EDR_API="https://wazuh.lab.local/api/v4/agents"

log() {
  local level="$1"; shift
  printf "[%s] %s\n" "$level" "$*"
}

check_host_reachability() {
  log INFO "Checking host reachability"
  for entry in "${LAB_HOSTS[@]}"; do
    IFS=":" read -r ip name <<<"$entry"
    if ping -c 1 -W 2 "$ip" >/dev/null 2>&1; then
      log OK "$name ($ip) reachable"
    else
      log WARN "$name ($ip) unreachable"
    fi
  done
}

check_services() {
  log INFO "Verifying web endpoints"
  for url in "${WEB_ENDPOINTS[@]}"; do
    if curl -sk --max-time 5 -o /dev/null "$url"; then
      log OK "$url responding"
    else
      log WARN "$url not responding"
    fi
  done
}

check_edr_agents() {
  log INFO "Validating EDR agent status"
  if ! command -v jq >/dev/null 2>&1; then
    log WARN "jq not installed; skipping EDR validation"
    return
  fi

  response=$(curl -sk --max-time 5 "$EDR_API" || true)
  if [[ -z "$response" ]]; then
    log WARN "No response from EDR API"
    return
  fi

  online_count=$(jq '.data | map(select(.status == "active")) | length' <<<"$response" 2>/dev/null || echo 0)
  log OK "Active EDR agents: $online_count"
}

main() {
  log INFO "Starting lab audit"
  check_host_reachability
  check_services
  check_edr_agents
  log INFO "Audit complete"
}

main "$@"
