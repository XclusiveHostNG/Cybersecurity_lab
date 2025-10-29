<?php include_once __DIR__ . '/../Includes/header.php'; ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0 d-flex justify-content-between">
        <h5 class="mb-0"><i class="fa fa-user-shield me-2 text-danger"></i>Administrators</h5>
        <a href="/Admin/Admin/create" class="btn btn-danger btn-sm"><i class="fa fa-plus me-2"></i>Add Admin</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $stmt = db()->query('SELECT id, first_name, last_name, email, status FROM admins ORDER BY created_at DESC');
                        $admins = $stmt->fetchAll();
                    } catch (Throwable $th) {
                        $admins = [];
                    }
                    if (empty($admins)) {
                        echo '<tr><td colspan="5" class="text-center text-muted">No administrators found.</td></tr>';
                    } else {
                        foreach ($admins as $admin) {
                            echo '<tr>';
                            echo '<td>' . (int)$admin['id'] . '</td>';
                            echo '<td>' . htmlspecialchars($admin['first_name'] . ' ' . $admin['last_name']) . '</td>';
                            echo '<td>' . htmlspecialchars($admin['email']) . '</td>';
                            echo '<td><span class="badge bg-secondary text-uppercase">' . htmlspecialchars($admin['status']) . '</span></td>';
                            echo '<td>';
                            echo '<a class="btn btn-sm btn-outline-primary me-1" href="/Admin/Admin/view?id=' . (int)$admin['id'] . '"><i class="fa fa-eye"></i></a>';
                            echo '<a class="btn btn-sm btn-outline-warning" href="/Admin/Admin/edit?id=' . (int)$admin['id'] . '"><i class="fa fa-edit"></i></a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once __DIR__ . '/../Includes/footer.php'; ?>
