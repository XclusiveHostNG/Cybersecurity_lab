<?php
require_once __DIR__ . '/../../config/config.php';
$siteSettings = fetch_site_settings();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard | <?php echo htmlspecialchars($siteSettings['site_name'] ?? 'TAG23'); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="/Assets/Css/admin.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <?php include __DIR__ . '/sidebar.php'; ?>
        <div class="col-lg-10 ms-auto admin-content">
            <header class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h4 mb-0">Welcome, Admin</h1>
                    <small class="text-muted">Manage the TAG23 ecosystem effectively.</small>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <span class="badge bg-success">Online</span>
                    <a href="/" class="btn btn-outline-secondary btn-sm"><i class="fa fa-globe me-2"></i>View Site</a>
                </div>
            </header>
