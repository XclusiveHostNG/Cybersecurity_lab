<?php include_once __DIR__ . '/../Includes/header.php'; ?>
<?php
$id = (int)($_GET['id'] ?? 0);
try {
    $stmt = db()->prepare('SELECT first_name, last_name, email FROM users WHERE id = ?');
    $stmt->execute([$id]);
    $member = $stmt->fetch();
} catch (Throwable $th) {
    $member = null;
}
?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0">
        <h5 class="mb-0"><i class="fa fa-envelope me-2 text-info"></i>Send Message</h5>
    </div>
    <div class="card-body">
        <?php if (!$member): ?>
            <div class="alert alert-danger">Member not found.</div>
        <?php else: ?>
            <form action="/handlers/admin/user-message-handler.php" method="post" class="row g-3">
                <input type="hidden" name="id" value="<?php echo (int)$id; ?>">
                <div class="col-12">
                    <p class="mb-1">Sending message to <strong><?php echo htmlspecialchars($member['first_name'] . ' ' . $member['last_name']); ?></strong> (<?php echo htmlspecialchars($member['email']); ?>)</p>
                </div>
                <div class="col-12">
                    <label class="form-label">Subject</label>
                    <input type="text" name="subject" class="form-control" required>
                </div>
                <div class="col-12">
                    <label class="form-label">Message</label>
                    <textarea name="message" rows="5" class="form-control" required></textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-info text-white"><i class="fa fa-paper-plane me-2"></i>Send Message</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>
<?php include_once __DIR__ . '/../Includes/footer.php'; ?>
