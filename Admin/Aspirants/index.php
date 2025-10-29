<?php include_once __DIR__ . '/../Includes/header.php'; ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0 d-flex justify-content-between">
        <h5 class="mb-0"><i class="fa fa-user-tie me-2 text-success"></i>Aspirants</h5>
        <a href="/Admin/Aspirants/create" class="btn btn-success btn-sm"><i class="fa fa-plus me-2"></i>Add Aspirant</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>State</th>
                        <th>KYC</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $stmt = db()->query('SELECT id, first_name, last_name, email, state, kyc_status FROM aspirants ORDER BY created_at DESC LIMIT 20');
                        $aspirants = $stmt->fetchAll();
                    } catch (Throwable $th) {
                        $aspirants = [];
                    }
                    if (empty($aspirants)) {
                        echo '<tr><td colspan="6" class="text-center text-muted">No aspirants found.</td></tr>';
                    } else {
                        foreach ($aspirants as $aspirant) {
                            echo '<tr>';
                            echo '<td>' . (int)$aspirant['id'] . '</td>';
                            echo '<td>' . htmlspecialchars($aspirant['first_name'] . ' ' . $aspirant['last_name']) . '</td>';
                            echo '<td>' . htmlspecialchars($aspirant['email']) . '</td>';
                            echo '<td>' . htmlspecialchars($aspirant['state']);
                            echo '<td><span class="badge bg-secondary text-uppercase">' . htmlspecialchars($aspirant['kyc_status']) . '</span></td>';
                            echo '<td>';
                            echo '<a class="btn btn-sm btn-outline-primary me-1" href="/Admin/Aspirants/view?id=' . (int)$aspirant['id'] . '"><i class="fa fa-eye"></i></a>';
                            echo '<a class="btn btn-sm btn-outline-success me-1" href="/Admin/Aspirants/edit?id=' . (int)$aspirant['id'] . '"><i class="fa fa-edit"></i></a>';
                            echo '<a class="btn btn-sm btn-outline-info me-1" href="/Admin/Aspirants/send-message?id=' . (int)$aspirant['id'] . '"><i class="fa fa-envelope"></i></a>';
                            echo '<a class="btn btn-sm btn-outline-warning" href="/Admin/Aspirants/campaigns?id=' . (int)$aspirant['id'] . '"><i class="fa fa-bullhorn"></i></a>';
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
