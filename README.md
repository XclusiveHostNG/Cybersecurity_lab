# TAG23 - Tinubu Advocacy Group Platform

This repository contains a PHP-based political organization management system for TAG23. The platform empowers members, aspirants, and administrators with dedicated dashboards for onboarding, campaign management, events, donations, and communication.

## Features
- Responsive Bootstrap 5 frontend with Font Awesome icons.
- Dynamic homepage with events, blog highlights, and success stories.
- Comprehensive SQL schema for users, aspirants, admins, roles, permissions, campaigns, events, donations, KYC, and site settings.
- Authentication views for registration, login, and password resets.
- User and aspirant portals with profile management, onboarding, WhatsApp group access, ID cards, and event registration.
- Admin console covering user, aspirant, admin, event, campaign, KYC, gallery, WhatsApp groups, and settings management.
- `.htaccess` routing to hide `.php` extensions.

## Getting Started
1. Create the database using the SQL script in `sql/tag23_schema.sql`.
2. Update database credentials in `config/config.php`.
3. Ensure the web server points to the project root and supports Apache mod_rewrite.
4. Access the platform via the `index.php` homepage.

Refer to `PROJECT_STRUCTURE.md` for a detailed file layout.
