<?php include_once __DIR__ . '/../Includes/header.php'; ?>
<?php
$id = (int)($_GET['id'] ?? 0);
try {
    $stmt = db()->prepare('SELECT * FROM events WHERE id = ?');
    $stmt->execute([$id]);
    $event = $stmt->fetch();
} catch (Throwable $th) {
    $event = null;
}
?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0">
        <h5 class="mb-0"><i class="fa fa-edit me-2 text-warning"></i>Edit Event</h5>
    </div>
    <div class="card-body">
        <?php if (!$event): ?>
            <div class="alert alert-danger">Event not found.</div>
        <?php else: ?>
            <form action="/handlers/admin/event-edit-handler.php" method="post" class="row g-3">
                <input type="hidden" name="id" value="<?php echo (int)$event['id']; ?>">
                <div class="col-md-6">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" value="<?php echo htmlspecialchars($event['title']); ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Event Date</label>
                    <input type="datetime-local" name="event_date" value="<?php echo $event['event_date'] ? date('Y-m-d\TH:i', strtotime($event['event_date'])) : ''; ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" value="<?php echo htmlspecialchars($event['location']); ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="draft" <?php echo $event['status'] === 'draft' ? 'selected' : ''; ?>>Draft</option>
                        <option value="published" <?php echo $event['status'] === 'published' ? 'selected' : ''; ?>>Published</option>
                        <option value="cancelled" <?php echo $event['status'] === 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" rows="4" class="form-control"><?php echo htmlspecialchars($event['description']); ?></textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-warning"><i class="fa fa-save me-2"></i>Update Event</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>
<?php include_once __DIR__ . '/../Includes/footer.php'; ?>
