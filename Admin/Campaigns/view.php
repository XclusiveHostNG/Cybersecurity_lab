<?php include_once __DIR__ . '/../Includes/header.php'; ?>
<?php
$id = (int)($_GET['id'] ?? 0);
try {
    $stmt = db()->prepare('SELECT c.*, a.first_name, a.last_name FROM campaigns c LEFT JOIN aspirants a ON c.aspirant_id = a.id WHERE c.id = ?');
    $stmt->execute([$id]);
    $campaign = $stmt->fetch();
} catch (Throwable $th) {
    $campaign = null;
}
?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0 d-flex justify-content-between">
        <h5 class="mb-0"><i class="fa fa-bullhorn me-2 text-warning"></i>Campaign Details</h5>
        <a href="/Admin/Campaigns/index" class="btn btn-outline-secondary btn-sm"><i class="fa fa-arrow-left me-2"></i>Back</a>
    </div>
    <div class="card-body">
        <?php if (!$campaign): ?>
            <div class="alert alert-danger">Campaign not found.</div>
        <?php else: ?>
            <p class="mb-1"><strong>Title:</strong> <?php echo htmlspecialchars($campaign['title']); ?></p>
            <p class="mb-1"><strong>Aspirant:</strong> <?php echo htmlspecialchars(trim(($campaign['first_name'] ?? '') . ' ' . ($campaign['last_name'] ?? ''))); ?></p>
            <p class="mb-1"><strong>Status:</strong> <span class="badge bg-info text-uppercase"><?php echo htmlspecialchars($campaign['status']); ?></span></p>
            <p class="mb-1"><strong>Content:</strong></p>
            <p><?php echo nl2br(htmlspecialchars($campaign['content'])); ?></p>
            <?php if (!empty($campaign['media_path'])): ?>
                <p><strong>Media:</strong> <a href="<?php echo htmlspecialchars($campaign['media_path']); ?>" target="_blank">View Asset</a></p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php include_once __DIR__ . '/../Includes/footer.php'; ?>
