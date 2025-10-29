<?php include_once __DIR__ . '/Includes/header.php'; ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0 d-flex justify-content-between">
        <h5 class="mb-0"><i class="fa fa-bullhorn me-2 text-warning"></i>Your Campaigns</h5>
        <a href="/Aspirant/campaign-create" class="btn btn-warning btn-sm"><i class="fa fa-plus me-2"></i>Create Campaign</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $stmt = db()->prepare('SELECT id, title, status, created_at FROM campaigns WHERE aspirant_id = ? ORDER BY created_at DESC');
                        $stmt->execute([$_SESSION['aspirant_id'] ?? 0]);
                        $campaigns = $stmt->fetchAll();
                    } catch (Throwable $th) {
                        $campaigns = [];
                    }
                    if (empty($campaigns)) {
                        echo '<tr><td colspan="4" class="text-center text-muted">No campaigns yet.</td></tr>';
                    } else {
                        foreach ($campaigns as $campaign) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($campaign['title']) . '</td>';
                            echo '<td><span class="badge bg-secondary text-uppercase">' . htmlspecialchars($campaign['status']) . '</span></td>';
                            echo '<td>' . date('M d, Y', strtotime($campaign['created_at'])) . '</td>';
                            echo '<td><a class="btn btn-sm btn-outline-warning" href="/Aspirant/campaign-edit?id=' . (int)$campaign['id'] . '"><i class="fa fa-edit"></i></a></td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once __DIR__ . '/Includes/footer.php'; ?>
