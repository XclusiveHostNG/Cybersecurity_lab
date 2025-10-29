<?php include_once __DIR__ . '/Includes/header.php'; ?>
<?php
$id = (int)($_GET['id'] ?? 0);
try {
    $stmt = db()->prepare('SELECT * FROM campaigns WHERE id = ? AND aspirant_id = ?');
    $stmt->execute([$id, $_SESSION['aspirant_id'] ?? 0]);
    $campaign = $stmt->fetch();
} catch (Throwable $th) {
    $campaign = null;
}
?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0">
        <h5 class="mb-0"><i class="fa fa-edit me-2 text-warning"></i>Edit Campaign</h5>
    </div>
    <div class="card-body">
        <?php if (!$campaign): ?>
            <div class="alert alert-danger">Campaign not found.</div>
        <?php else: ?>
            <form action="/handlers/aspirant/campaign-edit-handler.php" method="post" class="row g-3">
                <input type="hidden" name="id" value="<?php echo (int)$campaign['id']; ?>">
                <div class="col-12">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" value="<?php echo htmlspecialchars($campaign['title']); ?>" class="form-control" required>
                </div>
                <div class="col-12">
                    <label class="form-label">Content</label>
                    <textarea name="content" rows="5" class="form-control" required><?php echo htmlspecialchars($campaign['content']); ?></textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Media URL</label>
                    <input type="url" name="media_path" value="<?php echo htmlspecialchars($campaign['media_path']); ?>" class="form-control">
                </div>
                <div class="col-12">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="draft" <?php echo $campaign['status'] === 'draft' ? 'selected' : ''; ?>>Draft</option>
                        <option value="published" <?php echo $campaign['status'] === 'published' ? 'selected' : ''; ?>>Published</option>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-warning"><i class="fa fa-save me-2"></i>Update Campaign</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>
<?php include_once __DIR__ . '/Includes/footer.php'; ?>
