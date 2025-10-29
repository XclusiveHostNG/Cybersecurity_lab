<?php include_once __DIR__ . '/../Includes/header.php'; ?>
<?php
$id = (int)($_GET['id'] ?? 0);
try {
    $stmt = db()->prepare('SELECT * FROM aspirants WHERE id = ?');
    $stmt->execute([$id]);
    $aspirant = $stmt->fetch();
} catch (Throwable $th) {
    $aspirant = null;
}
?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0 d-flex justify-content-between">
        <h5 class="mb-0"><i class="fa fa-user-tie me-2 text-success"></i>Aspirant Profile</h5>
        <a href="/Admin/Aspirants/index" class="btn btn-outline-secondary btn-sm"><i class="fa fa-arrow-left me-2"></i>Back</a>
    </div>
    <div class="card-body">
        <?php if (!$aspirant): ?>
            <div class="alert alert-danger">Aspirant not found.</div>
        <?php else: ?>
            <div class="row g-3">
                <div class="col-md-6">
                    <h6 class="text-uppercase text-muted">Personal Details</h6>
                    <p class="mb-1"><strong>Name:</strong> <?php echo htmlspecialchars($aspirant['first_name'] . ' ' . $aspirant['last_name']); ?></p>
                    <p class="mb-1"><strong>Email:</strong> <?php echo htmlspecialchars($aspirant['email']); ?></p>
                    <p class="mb-1"><strong>Phone:</strong> <?php echo htmlspecialchars($aspirant['mobile_number']); ?></p>
                    <p class="mb-1"><strong>State:</strong> <?php echo htmlspecialchars($aspirant['state']); ?></p>
                    <p class="mb-1"><strong>Occupation:</strong> <?php echo htmlspecialchars($aspirant['occupation']); ?></p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-uppercase text-muted">Campaign Details</h6>
                    <p class="mb-1"><strong>Unique ID:</strong> <?php echo htmlspecialchars($aspirant['unique_identification_number']); ?></p>
                    <p class="mb-1"><strong>KYC Status:</strong> <span class="badge bg-info text-uppercase"><?php echo htmlspecialchars($aspirant['kyc_status']); ?></span></p>
                    <p class="mb-1"><strong>WhatsApp Link:</strong> <a href="<?php echo htmlspecialchars($aspirant['whatsapp_group_link']); ?>" target="_blank">Join Group</a></p>
                </div>
                <div class="col-12">
                    <h6 class="text-uppercase text-muted">Manifesto</h6>
                    <p><?php echo nl2br(htmlspecialchars($aspirant['manifesto'])); ?></p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php include_once __DIR__ . '/../Includes/footer.php'; ?>
