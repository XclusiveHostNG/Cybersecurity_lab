<?php include_once __DIR__ . '/../Includes/header.php'; ?>
<?php
$id = (int)($_GET['id'] ?? 0);
try {
    $stmt = db()->prepare('SELECT * FROM whatsapp_groups WHERE id = ?');
    $stmt->execute([$id]);
    $group = $stmt->fetch();
} catch (Throwable $th) {
    $group = null;
}
?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0 d-flex justify-content-between">
        <h5 class="mb-0"><i class="fab fa-whatsapp me-2 text-success"></i>Group Details</h5>
        <a href="/Admin/WhatsappGroups/index" class="btn btn-outline-secondary btn-sm"><i class="fa fa-arrow-left me-2"></i>Back</a>
    </div>
    <div class="card-body">
        <?php if (!$group): ?>
            <div class="alert alert-danger">WhatsApp group not found.</div>
        <?php else: ?>
            <p class="mb-1"><strong>Title:</strong> <?php echo htmlspecialchars($group['title']); ?></p>
            <p class="mb-1"><strong>Region:</strong> <?php echo htmlspecialchars($group['region']); ?></p>
            <p class="mb-1"><strong>State:</strong> <?php echo htmlspecialchars($group['state']); ?></p>
            <p class="mb-1"><strong>LGA:</strong> <?php echo htmlspecialchars($group['lga']); ?></p>
            <p class="mb-1"><strong>Link:</strong> <a href="<?php echo htmlspecialchars($group['link']); ?>" target="_blank">Join Group</a></p>
            <p class="mb-1"><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($group['description'])); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php include_once __DIR__ . '/../Includes/footer.php'; ?>
