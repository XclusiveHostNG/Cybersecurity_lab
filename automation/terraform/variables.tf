variable "proxmox_api_url" {
  description = "URL of the Proxmox API (e.g., https://proxmox.lab.local:8006/api2/json)"
  type        = string
}

variable "proxmox_api_user" {
  description = "Proxmox API username with permissions to manage VMs"
  type        = string
}

variable "proxmox_api_password" {
  description = "Password or API token secret for the Proxmox API user"
  type        = string
  sensitive   = true
}

variable "proxmox_tls_insecure" {
  description = "Allow insecure TLS connections (set to true only for labs)"
  type        = bool
  default     = true
}

variable "proxmox_node" {
  description = "Name of the Proxmox node to deploy VMs on"
  type        = string
}

variable "primary_storage" {
  description = "Name of the Proxmox storage to use for VM disks"
  type        = string
  default     = "local-lvm"
}

variable "management_network_bridge" {
  description = "Bridge interface for management VLAN traffic"
  type        = string
}

variable "production_network_bridge" {
  description = "Bridge interface for production VLAN traffic"
  type        = string
}

variable "attack_network_bridge" {
  description = "Bridge interface for attack VLAN traffic"
  type        = string
}

variable "management_vlan" {
  description = "VLAN ID for the management network"
  type        = number
  default     = 10
}

variable "production_vlan" {
  description = "VLAN ID for the production network"
  type        = number
  default     = 20
}

variable "attack_vlan" {
  description = "VLAN ID for the attack network"
  type        = number
  default     = 30
}

variable "kali_template" {
  description = "Name of the Kali Linux template VM"
  type        = string
}

variable "ubuntu_template" {
  description = "Name of the Ubuntu Server template VM"
  type        = string
}

variable "windows_template" {
  description = "Name of the Windows Server template VM"
  type        = string
}

variable "red_team_pool" {
  description = "Proxmox resource pool for red team assets"
  type        = string
  default     = "RedTeam"
}

variable "blue_team_pool" {
  description = "Proxmox resource pool for blue team assets"
  type        = string
  default     = "BlueTeam"
}

variable "core_services_pool" {
  description = "Proxmox resource pool for shared core services"
  type        = string
  default     = "CoreServices"
}
