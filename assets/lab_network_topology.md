# Lab Network Topology

```
               +----------------+
               |    Internet    |
               +--------+-------+
                        |
                    [NAT]
                        |
                 +------+------+
                 |   pfSense   |
                 +------+------+
                        |
                Host-Only Network
                        |
        +---------------+---------------+
        |               |               |
+-------+-------+ +------+-------+ +-----+-------+
|  Kali Linux  | | Metasploitable | | Security   |
| 192.168.56.10| | 192.168.56.20  | | Onion      |
+---------------+ +---------------+ | 192.168.56.30|
                                      +-------------+
```

- pfSense enforces firewall policies and optional NAT for controlled internet access.
- Kali Linux acts as the attacker workstation.
- Metasploitable serves as the intentionally vulnerable target.
- Security Onion monitors traffic for detection and logging.
