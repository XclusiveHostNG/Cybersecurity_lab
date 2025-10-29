# Windows Lab Installation Guide

Windows-based hosts simulate enterprise environments for practicing Active Directory attacks and defenses.

## Licensing Options

- Use Microsoft Evaluation Center images for Windows Server and Windows 10/11 Enterprise (90-180 day evaluation).
- Alternatively, leverage Windows 10/11 Developer images for short-lived testing.

## Windows Server Deployment

1. **Download ISO:** Obtain Windows Server 2019 or 2022 evaluation ISO.
2. **Create VM:** Allocate 2 vCPU, 6 GB RAM, 60 GB disk; add two NICs (management + lab).
3. **Install OS:** Proceed through standard setup, setting a strong administrator password.
4. **Roles & Features:** Install Active Directory Domain Services if simulating a domain. Promote to a new forest (e.g., `lab.local`).
5. **Static IP:** Assign management NIC to `192.168.56.10` and lab NIC to `10.10.10.10` with no default gateway on lab interface.
6. **Updates:** Apply Windows Updates while temporarily enabling NAT access, then disable once patched.
7. **Snapshot:** Capture `baseline-domain-controller` snapshot.

## Windows Client Deployment

1. **Download ISO:** Use Windows 10/11 Enterprise evaluation image.
2. **Create VM:** 2 vCPU, 4 GB RAM, 40 GB disk; single NIC on lab network.
3. **Join Domain:** After installation, join the `lab.local` domain using domain admin credentials.
4. **User Accounts:** Create standard user accounts (`student1`, `analyst1`) for practice.
5. **Defender Configuration:** Enable controlled folder access and sample submission for defensive exercises.
6. **Snapshot:** Capture `baseline-client` snapshot.

## Hardening Baseline

- Enable Windows Firewall on all profiles with strict inbound rules.
- Configure Windows Event Forwarding to send security logs to the monitoring stack.
- Deploy Sysmon with a curated configuration (see `resources/sysmon-config.xml`).
- Disable SMBv1 unless required for specific exercises; document deviations.

## Maintenance

- Refresh evaluation licenses before expiration by rolling back to snapshots or rearming (`slmgr /rearm`).
- Regularly export GPO settings for version control.
- Record changes in `resources/lab-journal.md` with timestamps.
