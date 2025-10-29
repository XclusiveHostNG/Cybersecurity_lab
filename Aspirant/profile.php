<?php include_once __DIR__ . '/Includes/header.php'; ?>
<?php
try {
    $stmt = db()->prepare('SELECT * FROM aspirants WHERE id = ?');
    $stmt->execute([$_SESSION['aspirant_id'] ?? 0]);
    $aspirant = $stmt->fetch();
} catch (Throwable $th) {
    $aspirant = null;
}
?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0 d-flex justify-content-between">
        <h5 class="mb-0"><i class="fa fa-user-tie me-2 text-success"></i>Profile Information</h5>
        <a href="/Aspirant/profile-edit" class="btn btn-outline-success btn-sm"><i class="fa fa-edit me-2"></i>Edit Profile</a>
    </div>
    <div class="card-body">
        <?php if (!$aspirant): ?>
            <div class="alert alert-info">Profile not found.</div>
        <?php else: ?>
            <div class="row g-3">
                <div class="col-md-6">
                    <p class="mb-1"><strong>Name:</strong> <?php echo htmlspecialchars($aspirant['first_name'] . ' ' . $aspirant['last_name']); ?></p>
                    <p class="mb-1"><strong>Email:</strong> <?php echo htmlspecialchars($aspirant['email']); ?></p>
                    <p class="mb-1"><strong>Phone:</strong> <?php echo htmlspecialchars($aspirant['mobile_number']); ?></p>
                    <p class="mb-1"><strong>State:</strong> <?php echo htmlspecialchars($aspirant['state']); ?></p>
                </div>
                <div class="col-md-6">
                    <p class="mb-1"><strong>Unique ID:</strong> <?php echo htmlspecialchars($aspirant['unique_identification_number']); ?></p>
                    <p class="mb-1"><strong>KYC Status:</strong> <span class="badge bg-info text-uppercase"><?php echo htmlspecialchars($aspirant['kyc_status']); ?></span></p>
                    <p class="mb-1"><strong>APC Member:</strong> <?php echo strtoupper($aspirant['is_apc_member']); ?></p>
                </div>
                <div class="col-12">
                    <p class="mb-1"><strong>Manifesto:</strong></p>
                    <p><?php echo nl2br(htmlspecialchars($aspirant['manifesto'])); ?></p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php include_once __DIR__ . '/Includes/footer.php'; ?>
