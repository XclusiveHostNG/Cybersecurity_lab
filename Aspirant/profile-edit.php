<?php include_once __DIR__ . '/Includes/header.php'; ?>
<?php
try {
    $stmt = db()->prepare('SELECT * FROM aspirants WHERE id = ?');
    $stmt->execute([$_SESSION['aspirant_id'] ?? 0]);
    $aspirant = $stmt->fetch();
} catch (Throwable $th) {
    $aspirant = null;
}
?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0">
        <h5 class="mb-0"><i class="fa fa-edit me-2 text-success"></i>Edit Aspirant Profile</h5>
    </div>
    <div class="card-body">
        <?php if (!$aspirant): ?>
            <div class="alert alert-info">Profile not found.</div>
        <?php else: ?>
            <form action="/handlers/aspirant/profile-update-handler.php" method="post" class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">First Name</label>
                    <input type="text" name="first_name" value="<?php echo htmlspecialchars($aspirant['first_name']); ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="last_name" value="<?php echo htmlspecialchars($aspirant['last_name']); ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($aspirant['email']); ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Phone</label>
                    <input type="text" name="mobile_number" value="<?php echo htmlspecialchars($aspirant['mobile_number']); ?>" class="form-control">
                </div>
                <div class="col-12">
                    <label class="form-label">Manifesto</label>
                    <textarea name="manifesto" rows="4" class="form-control"><?php echo htmlspecialchars($aspirant['manifesto']); ?></textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save me-2"></i>Update Profile</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>
<?php include_once __DIR__ . '/Includes/footer.php'; ?>
