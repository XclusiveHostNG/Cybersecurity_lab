<?php include_once __DIR__ . '/Includes/header.php'; ?>
<?php
try {
    $stmt = db()->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$_SESSION['user_id'] ?? 0]);
    $user = $stmt->fetch();
} catch (Throwable $th) {
    $user = null;
}
?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0 d-flex justify-content-between">
        <h5 class="mb-0"><i class="fa fa-user me-2 text-primary"></i>Profile Information</h5>
        <a href="/User/profile-edit" class="btn btn-outline-primary btn-sm"><i class="fa fa-edit me-2"></i>Edit Profile</a>
    </div>
    <div class="card-body">
        <?php if (!$user): ?>
            <div class="alert alert-info">Profile not found.</div>
        <?php else: ?>
            <div class="row g-3">
                <div class="col-md-6">
                    <p class="mb-1"><strong>Full Name:</strong> <?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></p>
                    <p class="mb-1"><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                    <p class="mb-1"><strong>Phone:</strong> <?php echo htmlspecialchars($user['mobile_number']); ?></p>
                    <p class="mb-1"><strong>Date of Birth:</strong> <?php echo htmlspecialchars($user['date_of_birth']); ?></p>
                </div>
                <div class="col-md-6">
                    <p class="mb-1"><strong>State:</strong> <?php echo htmlspecialchars($user['state']); ?></p>
                    <p class="mb-1"><strong>LGA:</strong> <?php echo htmlspecialchars($user['local_government_area']); ?></p>
                    <p class="mb-1"><strong>Occupation:</strong> <?php echo htmlspecialchars($user['occupation']); ?></p>
                    <p class="mb-1"><strong>Education:</strong> <?php echo htmlspecialchars($user['education_level']); ?></p>
                </div>
                <div class="col-12">
                    <p class="mb-1"><strong>Address:</strong> <?php echo htmlspecialchars($user['address']); ?></p>
                    <p class="mb-1"><strong>Unique ID:</strong> <?php echo htmlspecialchars($user['unique_identification_number']); ?></p>
                    <p class="mb-1"><strong>KYC Status:</strong> <span class="badge bg-info text-uppercase"><?php echo htmlspecialchars($user['kyc_status']); ?></span></p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php include_once __DIR__ . '/Includes/footer.php'; ?>
