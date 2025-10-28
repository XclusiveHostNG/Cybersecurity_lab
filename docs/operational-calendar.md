# Operational Calendar

Use this rolling calendar to plan maintenance, training, and threat emulation events. Adjust the cadence to fit your schedule
and add notes as tasks are completed.

| Month | Activities | Owner | Notes |
| ----- | ---------- | ----- | ----- |
| January | Annual goal-setting workshop, inventory hardware firmware levels, rotate encryption keys | Lab Architect | Kick off backlog grooming for new projects |
| February | Patch cycle, phishing resilience exercise, update detection content | Blue Team Lead | Validate alert routing after playbooks change |
| March | Disaster recovery drill, update Ansible roles, capture metrics review | Operations | Document any backup performance issues |
| April | Offensive tooling refresh, purple team scenario #1, network segmentation review | Red Team Lead | Verify Attack VLAN isolation |
| May | Patch cycle, compliance scan with OSCAP, run log review tabletop | Blue Team Lead | Update audit evidence in `operations/reports/` |
| June | Hardware health check, virtualization capacity planning, backlog refinement | Lab Architect | Assess need for hardware upgrades |
| July | Patch cycle, purple team scenario #2, update Sysmon configuration | Joint Team | Compare results against previous scenario |
| August | Cloud lab expansion pilot, review Terraform modules, credential rotation | Automation Engineer | Stage updates in feature branch |
| September | Patch cycle, SOC maturity assessment, update monitoring dashboards | Blue Team Lead | Capture improvements in `monitoring-maturity.md` |
| October | Incident response live-fire exercise, update incident communication plan | Incident Commander | Capture timeline in journey journal |
| November | Patch cycle, vulnerability management sprint, update service catalog | Operations | Confirm RTO/RPO assumptions |
| December | Year-end retrospective, archive documentation, hardware dust-off | Entire Team | Celebrate wins and plan next year's roadmap |

## Usage Tips

- Treat each row as a checklist; strike through or comment when an activity is complete.
- Add ad-hoc events (e.g., conferences, certification exams) in a copy of this calendar stored under `docs/`.
- Reference this calendar when filing Git issues so work aligns with scheduled maintenance windows.
