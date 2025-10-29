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
    <div class="card-header bg-white border-0">
        <h5 class="mb-0"><i class="fa fa-edit me-2 text-warning"></i>Edit WhatsApp Group</h5>
    </div>
    <div class="card-body">
        <?php if (!$group): ?>
            <div class="alert alert-danger">WhatsApp group not found.</div>
        <?php else: ?>
            <form action="/handlers/admin/whatsapp-edit-handler.php" method="post" class="row g-3">
                <input type="hidden" name="id" value="<?php echo (int)$group['id']; ?>">
                <div class="col-md-6">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" value="<?php echo htmlspecialchars($group['title']); ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Region</label>
                    <input type="text" name="region" value="<?php echo htmlspecialchars($group['region']); ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">State</label>
                    <input type="text" name="state" value="<?php echo htmlspecialchars($group['state']); ?>" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Local Government Area</label>
                    <input type="text" name="lga" value="<?php echo htmlspecialchars($group['lga']); ?>" class="form-control">
                </div>
                <div class="col-12">
                    <label class="form-label">Invite Link</label>
                    <input type="url" name="link" value="<?php echo htmlspecialchars($group['link']); ?>" class="form-control" required>
                </div>
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" rows="3" class="form-control"><?php echo htmlspecialchars($group['description']); ?></textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-warning"><i class="fa fa-save me-2"></i>Update Group</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>
<?php include_once __DIR__ . '/../Includes/footer.php'; ?>
