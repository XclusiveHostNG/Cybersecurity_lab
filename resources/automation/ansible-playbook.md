# Ansible Automation Notes

This directory stores infrastructure-as-code artifacts used to provision lab hosts.

## Playbook Structure

```
ansible/
├── inventories/
│   └── lab.yml
├── roles/
│   ├── kali/
│   ├── windows/
│   └── metasploitable/
└── playbooks/
    ├── provision-kali.yml
    ├── provision-windows.yml
    └── deploy-monitoring.yml
```

## Example Variables

```yaml
# inventories/lab.yml
all:
  children:
    management:
      hosts:
        kali-offsec:
          ansible_host: 192.168.56.50
          ansible_user: kali
    lab_internal:
      hosts:
        metasploitable:
          ansible_host: 10.10.10.20
          ansible_user: msfadmin
```

## Usage

- Run `ansible-playbook -i inventories/lab.yml playbooks/provision-kali.yml` after the Kali VM is reachable over SSH.
- Store secrets (passwords, API keys) in Ansible Vault files.
- Commit playbooks without secrets; use `.gitignore` to exclude vault password files.
