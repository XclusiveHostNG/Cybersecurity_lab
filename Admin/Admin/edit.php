<?php include_once __DIR__ . '/../Includes/header.php'; ?>
<?php
$id = (int)($_GET['id'] ?? 0);
try {
    $stmt = db()->prepare('SELECT * FROM admins WHERE id = ?');
    $stmt->execute([$id]);
    $admin = $stmt->fetch();
} catch (Throwable $th) {
    $admin = null;
}
?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0">
        <h5 class="mb-0"><i class="fa fa-edit me-2 text-warning"></i>Edit Administrator</h5>
    </div>
    <div class="card-body">
        <?php if (!$admin): ?>
            <div class="alert alert-danger">Admin not found.</div>
        <?php else: ?>
            <form action="/handlers/admin/admin-edit-handler.php" method="post" class="row g-3">
                <input type="hidden" name="id" value="<?php echo (int)$admin['id']; ?>">
                <div class="col-md-6">
                    <label class="form-label">First Name</label>
                    <input type="text" name="first_name" value="<?php echo htmlspecialchars($admin['first_name']); ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="last_name" value="<?php echo htmlspecialchars($admin['last_name']); ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($admin['email']); ?>" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="active" <?php echo $admin['status'] === 'active' ? 'selected' : ''; ?>>Active</option>
                        <option value="inactive" <?php echo $admin['status'] === 'inactive' ? 'selected' : ''; ?>>Inactive</option>
                        <option value="suspended" <?php echo $admin['status'] === 'suspended' ? 'selected' : ''; ?>>Suspended</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Role</label>
                    <input type="text" name="role" value="<?php echo htmlspecialchars($admin['role']); ?>" class="form-control">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-warning"><i class="fa fa-save me-2"></i>Update Admin</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>
<?php include_once __DIR__ . '/../Includes/footer.php'; ?>
