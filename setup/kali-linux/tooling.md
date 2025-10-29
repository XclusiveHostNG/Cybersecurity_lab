# Kali Linux Tooling Configuration

Standardize the Kali Linux environment to ensure repeatability across lab rebuilds and to minimize setup time before exercises.

## Shell & Terminal

- Install `zsh` and configure Oh My Zsh with the `agnoster` theme.
- Create aliases in `~/.zshrc` for common tasks:
  - `alias updatekali='sudo apt update && sudo apt full-upgrade'`
  - `alias recon='cd ~/lab-notes/recon && ls'`
- Use `tmux` with a `~/.tmux.conf` that defines pane shortcuts for reconnaissance, exploitation, and notes.

## Directory Layout

```
~/lab-notes/
├── recon/
├── exploitation/
├── privilege-escalation/
└── reports/
```

## Essential Tools

| Category            | Tools & Commands                                      |
|---------------------|-------------------------------------------------------|
| Reconnaissance      | `nmap`, `masscan`, `amass`, `dnsrecon`                |
| Exploitation        | `metasploit`, `searchsploit`, `sqlmap`, `crackmapexec`|
| Post-Exploitation   | `linpeas.sh`, `winpeas.exe`, `bloodhound.py`          |
| Credential Attacks  | `hashcat`, `john`, `hydra`                            |
| Scripting           | Python 3, `pipx`, Golang (optional)                   |

## Notes & Reporting

- Maintain Markdown notes in `~/lab-notes/reports` and sync to a private Git repository.
- Use `obsidian` or `cherrytree` for hierarchical documentation.
- Capture screen recordings with `peek` when demonstrating exploit chains.

## Security Hygiene

- Store API keys and credentials in `gopass` or an encrypted KeePass database.
- Disable NAT adapter unless updates are required; re-enable only for short periods.
- Clear browser caches and downloaded exploits after each session.
