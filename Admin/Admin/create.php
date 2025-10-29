<?php include_once __DIR__ . '/../Includes/header.php'; ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0">
        <h5 class="mb-0"><i class="fa fa-user-plus me-2 text-danger"></i>Create Administrator</h5>
    </div>
    <div class="card-body">
        <form action="/handlers/admin/admin-create-handler.php" method="post" class="row g-3">
            <div class="col-md-6">
                <label class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Mobile Number</label>
                <input type="text" name="mobile_number" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Role</label>
                <select name="role" class="form-select">
                    <option value="super-admin">Super Admin</option>
                    <option value="moderator">Moderator</option>
                    <option value="content">Content Manager</option>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-danger"><i class="fa fa-save me-2"></i>Create Admin</button>
            </div>
        </form>
    </div>
</div>
<?php include_once __DIR__ . '/../Includes/footer.php'; ?>
