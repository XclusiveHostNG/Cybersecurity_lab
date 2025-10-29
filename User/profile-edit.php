<?php include_once __DIR__ . '/Includes/header.php'; ?>
<?php
try {
    $stmt = db()->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$_SESSION['user_id'] ?? 0]);
    $user = $stmt->fetch();
} catch (Throwable $th) {
    $user = null;
}
?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0">
        <h5 class="mb-0"><i class="fa fa-edit me-2 text-primary"></i>Edit Profile</h5>
    </div>
    <div class="card-body">
        <?php if (!$user): ?>
            <div class="alert alert-info">Profile not found.</div>
        <?php else: ?>
            <form action="/handlers/user/profile-update-handler.php" method="post" class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">First Name</label>
                    <input type="text" name="first_name" value="<?php echo htmlspecialchars($user['first_name']); ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="last_name" value="<?php echo htmlspecialchars($user['last_name']); ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Mobile Number</label>
                    <input type="text" name="mobile_number" value="<?php echo htmlspecialchars($user['mobile_number']); ?>" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">State</label>
                    <input type="text" name="state" value="<?php echo htmlspecialchars($user['state']); ?>" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Occupation</label>
                    <input type="text" name="occupation" value="<?php echo htmlspecialchars($user['occupation']); ?>" class="form-control">
                </div>
                <div class="col-12">
                    <label class="form-label">Address</label>
                    <textarea name="address" rows="2" class="form-control"><?php echo htmlspecialchars($user['address']); ?></textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save me-2"></i>Update Profile</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>
<?php include_once __DIR__ . '/Includes/footer.php'; ?>
