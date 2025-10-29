<?php
require_once __DIR__ . '/../../config/config.php';
$siteSettings = fetch_site_settings();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Aspirant Dashboard | <?php echo htmlspecialchars($siteSettings['site_name'] ?? 'TAG23'); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="/Assets/Css/app.css">
</head>
<body class="bg-light">
<div class="container-fluid">
    <div class="row">
        <?php include __DIR__ . '/sidebar.php'; ?>
        <div class="col-lg-10 ms-auto p-4">
            <header class="dashboard-header mb-4">
                <h1 class="h3 mb-1">Aspirant Dashboard</h1>
                <p class="mb-0">Manage your campaign activities, events, and donations.</p>
            </header>
