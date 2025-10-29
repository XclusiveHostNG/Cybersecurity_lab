terraform {
  required_version = ">= 1.5.0"

  required_providers {
    proxmox = {
      source  = "Telmate/proxmox"
      version = "3.0.1-rc4"
    }
  }
}

provider "proxmox" {
  pm_api_url      = var.proxmox_api_url
  pm_user         = var.proxmox_api_user
  pm_password     = var.proxmox_api_password
  pm_tls_insecure = var.proxmox_tls_insecure
}

resource "proxmox_vm_qemu" "kali" {
  name        = "red-kali"
  target_node = var.proxmox_node
  clone       = var.kali_template
  cores       = 4
  sockets     = 1
  memory      = 6144
  scsihw      = "virtio-scsi-single"
  pool        = var.red_team_pool

  disk {
    slot    = 0
    size    = 60
    storage = var.primary_storage
    type    = "scsi"
  }

  network {
    model  = "virtio"
    bridge = var.attack_network_bridge
    tag    = var.attack_vlan
  }

  lifecycle {
    ignore_changes = [target_node]
  }
}

resource "proxmox_vm_qemu" "ubuntu_monitoring" {
  name        = "blue-monitor"
  target_node = var.proxmox_node
  clone       = var.ubuntu_template
  cores       = 4
  sockets     = 1
  memory      = 8192
  scsihw      = "virtio-scsi-single"
  pool        = var.blue_team_pool

  disk {
    slot    = 0
    size    = 80
    storage = var.primary_storage
    type    = "scsi"
  }

  network {
    model  = "virtio"
    bridge = var.production_network_bridge
    tag    = var.production_vlan
  }

  network {
    model  = "virtio"
    bridge = var.management_network_bridge
    tag    = var.management_vlan
  }

  lifecycle {
    ignore_changes = [target_node]
  }
}

resource "proxmox_vm_qemu" "windows_dc" {
  name        = "dc01"
  target_node = var.proxmox_node
  clone       = var.windows_template
  cores       = 4
  sockets     = 1
  memory      = 8192
  scsihw      = "virtio-scsi-single"
  pool        = var.core_services_pool

  disk {
    slot    = 0
    size    = 100
    storage = var.primary_storage
    type    = "scsi"
  }

  network {
    model  = "virtio"
    bridge = var.production_network_bridge
    tag    = var.production_vlan
  }

  lifecycle {
    ignore_changes = [target_node]
  }
}
