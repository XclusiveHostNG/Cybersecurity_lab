-- TAG23 - Tinubu Advocacy Group Database Schema
-- Ensure database created before running: CREATE DATABASE tag23 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE tag23;

-- Table: site_settings
CREATE TABLE IF NOT EXISTS site_settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    site_name VARCHAR(150) NOT NULL,
    site_tagline VARCHAR(255) DEFAULT NULL,
    contact_email VARCHAR(150) DEFAULT NULL,
    contact_phone VARCHAR(50) DEFAULT NULL,
    address TEXT,
    facebook_url VARCHAR(255),
    twitter_url VARCHAR(255),
    instagram_url VARCHAR(255),
    whatsapp_url VARCHAR(255),
    allow_international_registration TINYINT(1) DEFAULT 1,
    maintenance_mode TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table: admins
CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    other_name VARCHAR(100),
    email VARCHAR(150) NOT NULL UNIQUE,
    mobile_number VARCHAR(50),
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) DEFAULT 'admin',
    status ENUM('active','inactive','suspended') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table: roles
CREATE TABLE IF NOT EXISTS roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table: permissions
CREATE TABLE IF NOT EXISTS permissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL UNIQUE,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table: role_permissions
CREATE TABLE IF NOT EXISTS role_permissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role_id INT NOT NULL,
    permission_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE,
    FOREIGN KEY (permission_id) REFERENCES permissions(id) ON DELETE CASCADE,
    UNIQUE KEY uq_role_permission (role_id, permission_id)
);

-- Table: admin_roles
CREATE TABLE IF NOT EXISTS admin_roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    admin_id INT NOT NULL,
    role_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (admin_id) REFERENCES admins(id) ON DELETE CASCADE,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE,
    UNIQUE KEY uq_admin_role (admin_id, role_id)
);

-- Table: users
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    unique_identification_number VARCHAR(50) NOT NULL UNIQUE,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    other_name VARCHAR(100),
    email VARCHAR(150) NOT NULL UNIQUE,
    mobile_number VARCHAR(50),
    address TEXT,
    city VARCHAR(100),
    state VARCHAR(100),
    local_government_area VARCHAR(150),
    ward VARCHAR(150),
    polling_unit VARCHAR(150),
    senatorial_district VARCHAR(150),
    house_of_representative VARCHAR(150),
    country VARCHAR(100) DEFAULT 'Nigeria',
    occupation VARCHAR(150),
    education_level VARCHAR(100),
    annual_monthly_income DECIMAL(12,2),
    date_of_birth DATE,
    bvn VARCHAR(20),
    nin VARCHAR(20),
    pin CHAR(6) NOT NULL,
    drivers_license_number VARCHAR(50),
    voters_card_number VARCHAR(50),
    ready_for_whatsapp ENUM('yes','no') DEFAULT 'no',
    is_apc_member ENUM('yes','no') DEFAULT 'no',
    accept_terms TINYINT(1) DEFAULT 0,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    kyc_status ENUM('pending','approved','rejected') DEFAULT 'pending',
    profile_photo VARCHAR(255),
    whatsapp_group_link VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table: aspirants
CREATE TABLE IF NOT EXISTS aspirants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    unique_identification_number VARCHAR(50) NOT NULL UNIQUE,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    other_name VARCHAR(100),
    email VARCHAR(150) NOT NULL UNIQUE,
    mobile_number VARCHAR(50),
    address TEXT,
    city VARCHAR(100),
    state VARCHAR(100),
    local_government_area VARCHAR(150),
    ward VARCHAR(150),
    polling_unit VARCHAR(150),
    senatorial_district VARCHAR(150),
    house_of_representative VARCHAR(150),
    country VARCHAR(100) DEFAULT 'Nigeria',
    occupation VARCHAR(150),
    education_level VARCHAR(100),
    annual_monthly_income DECIMAL(12,2),
    date_of_birth DATE,
    bvn VARCHAR(20),
    nin VARCHAR(20),
    pin CHAR(6) NOT NULL,
    drivers_license_number VARCHAR(50),
    voters_card_number VARCHAR(50),
    ready_for_whatsapp ENUM('yes','no') DEFAULT 'no',
    is_apc_member ENUM('yes','no') DEFAULT 'no',
    accept_terms TINYINT(1) DEFAULT 0,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    kyc_status ENUM('pending','approved','rejected') DEFAULT 'pending',
    profile_photo VARCHAR(255),
    whatsapp_group_link VARCHAR(255),
    manifesto TEXT,
    campaign_message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table: kyc_documents
CREATE TABLE IF NOT EXISTS kyc_documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    owner_type ENUM('user','aspirant') NOT NULL,
    owner_id INT NOT NULL,
    document_type VARCHAR(100) NOT NULL,
    document_path VARCHAR(255) NOT NULL,
    status ENUM('pending','approved','rejected') DEFAULT 'pending',
    remarks TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_owner (owner_type, owner_id)
);

-- Table: whatsapp_groups
CREATE TABLE IF NOT EXISTS whatsapp_groups (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    region VARCHAR(150) NOT NULL,
    state VARCHAR(100),
    lga VARCHAR(150),
    link VARCHAR(255) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table: events
CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    created_by_type ENUM('admin','aspirant') NOT NULL,
    created_by INT NOT NULL,
    title VARCHAR(150) NOT NULL,
    description TEXT,
    event_date DATETIME,
    location VARCHAR(255),
    state VARCHAR(100),
    lga VARCHAR(150),
    status ENUM('draft','published','cancelled') DEFAULT 'draft',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_creator (created_by_type, created_by)
);

-- Table: event_registrations
CREATE TABLE IF NOT EXISTS event_registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT NOT NULL,
    registrant_type ENUM('user','aspirant') NOT NULL,
    registrant_id INT NOT NULL,
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE,
    INDEX idx_registrant (registrant_type, registrant_id)
);

-- Table: donations
CREATE TABLE IF NOT EXISTS donations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    aspirant_id INT NOT NULL,
    amount DECIMAL(12,2) NOT NULL,
    donor_name VARCHAR(150),
    donor_email VARCHAR(150),
    donor_phone VARCHAR(50),
    message TEXT,
    status ENUM('pending','completed','failed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (aspirant_id) REFERENCES aspirants(id) ON DELETE CASCADE
);

-- Table: campaigns
CREATE TABLE IF NOT EXISTS campaigns (
    id INT AUTO_INCREMENT PRIMARY KEY,
    aspirant_id INT NOT NULL,
    title VARCHAR(150) NOT NULL,
    content TEXT,
    media_path VARCHAR(255),
    status ENUM('draft','published') DEFAULT 'draft',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (aspirant_id) REFERENCES aspirants(id) ON DELETE CASCADE
);

-- Table: blogs
CREATE TABLE IF NOT EXISTS blogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    excerpt TEXT,
    content LONGTEXT,
    cover_image VARCHAR(255),
    author_id INT,
    author_type ENUM('admin','aspirant') DEFAULT 'admin',
    status ENUM('draft','published') DEFAULT 'draft',
    published_at DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table: faqs
CREATE TABLE IF NOT EXISTS faqs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question VARCHAR(255) NOT NULL,
    answer TEXT NOT NULL,
    status ENUM('draft','published') DEFAULT 'published',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table: galleries
CREATE TABLE IF NOT EXISTS galleries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    description TEXT,
    media_path VARCHAR(255) NOT NULL,
    media_type ENUM('image','video') DEFAULT 'image',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table: contact_messages
CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    phone VARCHAR(50),
    subject VARCHAR(150) NOT NULL,
    message TEXT NOT NULL,
    status ENUM('new','replied','archived') DEFAULT 'new',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table: password_resets
CREATE TABLE IF NOT EXISTS password_resets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(150) NOT NULL,
    token VARCHAR(255) NOT NULL,
    user_type ENUM('user','aspirant','admin') NOT NULL,
    expires_at DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY uq_token (token)
);

-- Default Data
INSERT INTO site_settings (site_name, site_tagline, contact_email, contact_phone, address, facebook_url, twitter_url, instagram_url, whatsapp_url)
VALUES ('TAG23 - Tinubu Advocacy Group', 'Empowering democratic participation through innovative political organization management.', 'info@tag23.org', '+234 800 000 0000', 'Abuja, Nigeria', 'https://facebook.com/tag23', 'https://twitter.com/tag23', 'https://instagram.com/tag23', 'https://wa.me/2348000000000');
