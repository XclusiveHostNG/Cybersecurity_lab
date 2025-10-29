<?php
require_once __DIR__ . '/../config/config.php';

$siteSettings = fetch_site_settings();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo htmlspecialchars($siteSettings['site_tagline'] ?? ''); ?>">
    <title><?php echo htmlspecialchars($siteSettings['site_name'] ?? 'TAG23'); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-+s3h8eaO2m30IZHuZOKhHvJ3C0cI85FhF38N5EJ2VNivXzXcX4Jt9V7H5P4xMIOKgJGdwNwp0UrEGfG6G7+Yng==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/Assets/Css/style.css">
</head>
<body>
<header class="bg-primary text-white py-3 shadow-sm">
    <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <i class="fa-solid fa-people-group fa-2x me-3"></i>
            <div>
                <h1 class="h4 mb-0"><?php echo htmlspecialchars($siteSettings['site_name'] ?? 'TAG23'); ?></h1>
                <p class="mb-0 small"><?php echo htmlspecialchars($siteSettings['site_tagline'] ?? ''); ?></p>
            </div>
        </div>
        <nav class="mt-3 mt-md-0">
            <ul class="nav">
                <li class="nav-item"><a class="nav-link text-white" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/Pages/about">About</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/Pages/manifestoes">Manifestoes</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/Pages/contact">Contact</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/Pages/privacy-policy">Privacy</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/Pages/terms-and-conditions">Terms</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/Auth/login">Login</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/Auth/register">Join TAG23</a></li>
            </ul>
        </nav>
    </div>
</header>
<main class="flex-grow-1">
