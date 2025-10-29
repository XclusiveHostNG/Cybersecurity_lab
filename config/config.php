<?php
/**
 * Global configuration for TAG23 - Tinubu Advocacy Group Platform
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$environment = getenv('APP_ENV') ?: 'local';

$config = [
    'app' => [
        'name' => 'TAG23 - Tinubu Advocacy Group',
        'env' => $environment,
        'debug' => $environment !== 'production',
        'base_url' => getenv('APP_URL') ?: 'http://localhost/tag23',
        'timezone' => 'Africa/Lagos',
    ],
    'database' => [
        'host' => getenv('DB_HOST') ?: '127.0.0.1',
        'port' => getenv('DB_PORT') ?: '3306',
        'name' => getenv('DB_DATABASE') ?: 'tag23',
        'username' => getenv('DB_USERNAME') ?: 'root',
        'password' => getenv('DB_PASSWORD') ?: '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
    ],
];

date_default_timezone_set($config['app']['timezone']);

require_once __DIR__ . '/Database.php';

db();
