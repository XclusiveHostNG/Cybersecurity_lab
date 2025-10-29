<?php include_once __DIR__ . '/../Includes/header.php'; ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fa fa-users me-2 text-primary"></i>Members</h5>
        <a href="/Admin/User/create" class="btn btn-primary btn-sm"><i class="fa fa-user-plus me-2"></i>Add Member</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>KYC</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $stmt = db()->query('SELECT id, first_name, last_name, email, mobile_number, kyc_status FROM users ORDER BY created_at DESC LIMIT 20');
                        $members = $stmt->fetchAll();
                    } catch (Throwable $th) {
                        $members = [];
                    }
                    if (empty($members)) {
                        echo '<tr><td colspan="6" class="text-center text-muted">No members found.</td></tr>';
                    } else {
                        foreach ($members as $member) {
                            echo '<tr>';
                            echo '<td>' . (int)$member['id'] . '</td>';
                            echo '<td>' . htmlspecialchars($member['first_name'] . ' ' . $member['last_name']) . '</td>';
                            echo '<td>' . htmlspecialchars($member['email']) . '</td>';
                            echo '<td>' . htmlspecialchars($member['mobile_number']) . '</td>';
                            echo '<td><span class="badge bg-secondary text-uppercase">' . htmlspecialchars($member['kyc_status']) . '</span></td>';
                            echo '<td>';
                            echo '<a class="btn btn-sm btn-outline-primary me-1" href="/Admin/User/view?id=' . (int)$member['id'] . '"><i class="fa fa-eye"></i></a>';
                            echo '<a class="btn btn-sm btn-outline-success me-1" href="/Admin/User/edit?id=' . (int)$member['id'] . '"><i class="fa fa-edit"></i></a>';
                            echo '<a class="btn btn-sm btn-outline-info" href="/Admin/User/send-message?id=' . (int)$member['id'] . '"><i class="fa fa-envelope"></i></a>';
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
