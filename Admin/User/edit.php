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
    <div class="card-header bg-white border-0">
        <h5 class="mb-0"><i class="fa fa-edit me-2 text-warning"></i>Edit Member</h5>
    </div>
    <div class="card-body">
        <?php if (!$member): ?>
            <div class="alert alert-danger">Member not found.</div>
        <?php else: ?>
            <form action="/handlers/admin/user-edit-handler.php" method="post" class="row g-3">
                <input type="hidden" name="id" value="<?php echo (int)$member['id']; ?>">
                <div class="col-md-6">
                    <label class="form-label">First Name</label>
                    <input type="text" name="first_name" value="<?php echo htmlspecialchars($member['first_name']); ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="last_name" value="<?php echo htmlspecialchars($member['last_name']); ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($member['email']); ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Phone</label>
                    <input type="text" name="mobile_number" value="<?php echo htmlspecialchars($member['mobile_number']); ?>" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">State</label>
                    <input type="text" name="state" value="<?php echo htmlspecialchars($member['state']); ?>" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">KYC Status</label>
                    <select name="kyc_status" class="form-select">
                        <option value="pending" <?php echo $member['kyc_status'] === 'pending' ? 'selected' : ''; ?>>Pending</option>
                        <option value="approved" <?php echo $member['kyc_status'] === 'approved' ? 'selected' : ''; ?>>Approved</option>
                        <option value="rejected" <?php echo $member['kyc_status'] === 'rejected' ? 'selected' : ''; ?>>Rejected</option>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-warning"><i class="fa fa-save me-2"></i>Update Member</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>
<?php include_once __DIR__ . '/../Includes/footer.php'; ?>
