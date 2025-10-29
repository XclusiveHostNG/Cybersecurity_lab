output "kali_ip" {
  description = "IP address assigned to the Kali attack box"
  value       = proxmox_vm_qemu.kali.ipv4_addresses[0]
}

output "monitoring_ip" {
  description = "IP address assigned to the monitoring host"
  value       = proxmox_vm_qemu.ubuntu_monitoring.ipv4_addresses[0]
}

output "dc_ip" {
  description = "IP address assigned to the domain controller"
  value       = proxmox_vm_qemu.windows_dc.ipv4_addresses[0]
}
