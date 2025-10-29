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
    <div class="card-header bg-white border-0 d-flex justify-content-between">
        <h5 class="mb-0"><i class="fa fa-calendar me-2 text-primary"></i>Event Details</h5>
        <a href="/Admin/Events/index" class="btn btn-outline-secondary btn-sm"><i class="fa fa-arrow-left me-2"></i>Back</a>
    </div>
    <div class="card-body">
        <?php if (!$event): ?>
            <div class="alert alert-danger">Event not found.</div>
        <?php else: ?>
            <p class="mb-1"><strong>Title:</strong> <?php echo htmlspecialchars($event['title']); ?></p>
            <p class="mb-1"><strong>Date:</strong> <?php echo date('M d, Y H:i', strtotime($event['event_date'])); ?></p>
            <p class="mb-1"><strong>Location:</strong> <?php echo htmlspecialchars($event['location']); ?></p>
            <p class="mb-1"><strong>Status:</strong> <span class="badge bg-info text-uppercase"><?php echo htmlspecialchars($event['status']); ?></span></p>
            <p class="mb-1"><strong>Description:</strong></p>
            <p><?php echo nl2br(htmlspecialchars($event['description'])); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php include_once __DIR__ . '/../Includes/footer.php'; ?>
