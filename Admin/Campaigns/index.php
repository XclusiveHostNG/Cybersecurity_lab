<?php include_once __DIR__ . '/../Includes/header.php'; ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fa fa-bullhorn me-2 text-warning"></i>Campaign Management</h5>
        <a href="/Admin/Campaigns/create" class="btn btn-warning btn-sm"><i class="fa fa-plus me-2"></i>Create Campaign</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Aspirant</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $stmt = db()->query('SELECT c.*, a.first_name, a.last_name FROM campaigns c LEFT JOIN aspirants a ON c.aspirant_id = a.id ORDER BY c.created_at DESC');
                        $campaigns = $stmt->fetchAll();
                    } catch (Throwable $th) {
                        $campaigns = [];
                    }
                    if (empty($campaigns)) {
                        echo '<tr><td colspan="5" class="text-center text-muted">No campaigns available.</td></tr>';
                    } else {
                        foreach ($campaigns as $campaign) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($campaign['title']);
                            echo '<td>' . htmlspecialchars(trim(($campaign['first_name'] ?? '') . ' ' . ($campaign['last_name'] ?? '')));
                            echo '<td><span class="badge bg-secondary text-uppercase">' . htmlspecialchars($campaign['status']) . '</span></td>';
                            echo '<td>' . date('M d, Y', strtotime($campaign['created_at'])) . '</td>';
                            echo '<td>';
                            echo '<a class="btn btn-sm btn-outline-primary me-1" href="/Admin/Campaigns/view?id=' . (int)$campaign['id'] . '"><i class="fa fa-eye"></i></a>';
                            echo '<a class="btn btn-sm btn-outline-warning" href="/Admin/Campaigns/edit?id=' . (int)$campaign['id'] . '"><i class="fa fa-edit"></i></a>';
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
