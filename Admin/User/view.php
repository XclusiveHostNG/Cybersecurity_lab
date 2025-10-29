<?php include_once __DIR__ . '/../Includes/header.php'; ?>
<?php
$id = (int)($_GET['id'] ?? 0);
try {
    $stmt = db()->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$id]);
    $member = $stmt->fetch();
} catch (Throwable $th) {
    $member = null;
}
?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0 d-flex justify-content-between">
        <h5 class="mb-0"><i class="fa fa-user-circle me-2 text-primary"></i>Member Profile</h5>
        <a href="/Admin/User/index" class="btn btn-outline-secondary btn-sm"><i class="fa fa-arrow-left me-2"></i>Back</a>
    </div>
    <div class="card-body">
        <?php if (!$member): ?>
            <div class="alert alert-danger">Member not found.</div>
        <?php else: ?>
            <div class="row g-3">
                <div class="col-md-6">
                    <h6 class="text-uppercase text-muted">Personal Details</h6>
                    <p class="mb-1"><strong>Name:</strong> <?php echo htmlspecialchars($member['first_name'] . ' ' . $member['last_name']); ?></p>
                    <p class="mb-1"><strong>Email:</strong> <?php echo htmlspecialchars($member['email']); ?></p>
                    <p class="mb-1"><strong>Phone:</strong> <?php echo htmlspecialchars($member['mobile_number']); ?></p>
                    <p class="mb-1"><strong>Occupation:</strong> <?php echo htmlspecialchars($member['occupation']); ?></p>
                    <p class="mb-1"><strong>Education:</strong> <?php echo htmlspecialchars($member['education_level']); ?></p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-uppercase text-muted">Political Information</h6>
                    <p class="mb-1"><strong>Unique ID:</strong> <?php echo htmlspecialchars($member['unique_identification_number']); ?></p>
                    <p class="mb-1"><strong>APC Member:</strong> <?php echo strtoupper($member['is_apc_member']); ?></p>
                    <p class="mb-1"><strong>WhatsApp Ready:</strong> <?php echo strtoupper($member['ready_for_whatsapp']); ?></p>
                    <p class="mb-1"><strong>KYC Status:</strong> <span class="badge bg-info text-uppercase"><?php echo htmlspecialchars($member['kyc_status']); ?></span></p>
                </div>
                <div class="col-12">
                    <h6 class="text-uppercase text-muted">Address</h6>
                    <p class="mb-1"><?php echo htmlspecialchars($member['address']); ?></p>
                    <p class="mb-1">City: <?php echo htmlspecialchars($member['city']); ?> | State: <?php echo htmlspecialchars($member['state']); ?></p>
                    <p class="mb-1">LGA: <?php echo htmlspecialchars($member['local_government_area']); ?> | Ward: <?php echo htmlspecialchars($member['ward']); ?></p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php include_once __DIR__ . '/../Includes/footer.php'; ?>
