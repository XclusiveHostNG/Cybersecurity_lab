<?php include_once __DIR__ . '/../Includes/header.php'; ?>
<?php
$id = (int)($_GET['id'] ?? 0);
try {
    $stmt = db()->prepare('SELECT * FROM admins WHERE id = ?');
    $stmt->execute([$id]);
    $admin = $stmt->fetch();
} catch (Throwable $th) {
    $admin = null;
}
?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0 d-flex justify-content-between">
        <h5 class="mb-0"><i class="fa fa-user-shield me-2 text-danger"></i>Admin Profile</h5>
        <a href="/Admin/Admin/index" class="btn btn-outline-secondary btn-sm"><i class="fa fa-arrow-left me-2"></i>Back</a>
    </div>
    <div class="card-body">
        <?php if (!$admin): ?>
            <div class="alert alert-danger">Admin not found.</div>
        <?php else: ?>
            <div class="row g-3">
                <div class="col-md-6">
                    <p class="mb-1"><strong>Name:</strong> <?php echo htmlspecialchars($admin['first_name'] . ' ' . $admin['last_name']); ?></p>
                    <p class="mb-1"><strong>Email:</strong> <?php echo htmlspecialchars($admin['email']); ?></p>
                    <p class="mb-1"><strong>Phone:</strong> <?php echo htmlspecialchars($admin['mobile_number']); ?></p>
                </div>
                <div class="col-md-6">
                    <p class="mb-1"><strong>Username:</strong> <?php echo htmlspecialchars($admin['username']); ?></p>
                    <p class="mb-1"><strong>Role:</strong> <?php echo htmlspecialchars($admin['role']); ?></p>
                    <p class="mb-1"><strong>Status:</strong> <span class="badge bg-info text-uppercase"><?php echo htmlspecialchars($admin['status']); ?></span></p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php include_once __DIR__ . '/../Includes/footer.php'; ?>
