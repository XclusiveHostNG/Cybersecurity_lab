<?php
/**
 * Simple PDO wrapper for TAG23 platform.
 */

function db(): PDO
{
    static $connection;

    if ($connection instanceof PDO) {
        return $connection;
    }

    global $config;

    if (!isset($config['database'])) {
        throw new RuntimeException('Database configuration not found.');
    }

    $dbConfig = $config['database'];
    $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=%s',
        $dbConfig['host'],
        $dbConfig['port'],
        $dbConfig['name'],
        $dbConfig['charset']
    );

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try {
        $connection = new PDO($dsn, $dbConfig['username'], $dbConfig['password'], $options);
    } catch (PDOException $e) {
        if (!empty($config['app']['debug'])) {
            die('Database connection failed: ' . $e->getMessage());
        }
        throw $e;
    }

    return $connection;
}

function fetch_site_settings(): array
{
    $pdo = db();
    $stmt = $pdo->query('SELECT * FROM site_settings ORDER BY id DESC LIMIT 1');
    return $stmt->fetch() ?: [
        'site_name' => 'TAG23 - Tinubu Advocacy Group',
        'site_tagline' => 'Empowering democratic participation through innovative political organization management.',
        'contact_email' => 'info@example.com',
        'contact_phone' => '+234 000 000 0000',
        'address' => 'Abuja, Nigeria',
        'facebook_url' => '#',
        'twitter_url' => '#',
        'instagram_url' => '#',
        'whatsapp_url' => '#',
    ];
}
