#!/usr/bin/env bash

# Network scanning helper for the cybersecurity lab.
# Discovers active hosts on the host-only network and performs a quick port scan.

set -euo pipefail

SUBNET="192.168.56.0/24"
OUTPUT_DIR="$(dirname "$0")/../labs/metasploitable/reports"
TIMESTAMP="$(date +%Y%m%d-%H%M%S)"
PING_OUTPUT="${OUTPUT_DIR}/ping_sweep_${TIMESTAMP}.txt"
PORT_OUTPUT="${OUTPUT_DIR}/quick_scan_${TIMESTAMP}.txt"

mkdir -p "$OUTPUT_DIR"

echo "[+] Starting ping sweep on ${SUBNET}"
nmap -sn "$SUBNET" | tee "$PING_OUTPUT"

echo "[+] Running quick port scan against responsive hosts"
while read -r line; do
  if [[ "$line" =~ Nmap\ scan\ report\ for\ ([0-9.]+) ]]; then
    HOST="${BASH_REMATCH[1]}"
    echo "[+] Scanning $HOST"
    nmap -sS -T4 -p 1-1024 "$HOST" | tee -a "$PORT_OUTPUT"
  fi
done < <(grep "Nmap scan report" "$PING_OUTPUT")

echo "[+] Results saved to:"
echo "    $PING_OUTPUT"
echo "    $PORT_OUTPUT"
