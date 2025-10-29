<?php include_once __DIR__ . '/../Includes/header.php'; ?>
<?php
$id = (int)($_GET['id'] ?? 0);
try {
    $stmt = db()->prepare('SELECT first_name, last_name FROM aspirants WHERE id = ?');
    $stmt->execute([$id]);
    $aspirant = $stmt->fetch();
} catch (Throwable $th) {
    $aspirant = null;
}
?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
        <div>
            <h5 class="mb-0"><i class="fa fa-bullhorn me-2 text-warning"></i>Campaigns</h5>
            <?php if ($aspirant): ?>
                <small class="text-muted">for <?php echo htmlspecialchars($aspirant['first_name'] . ' ' . $aspirant['last_name']); ?></small>
            <?php endif; ?>
        </div>
        <a href="/Admin/Aspirants/index" class="btn btn-outline-secondary btn-sm"><i class="fa fa-arrow-left me-2"></i>Back</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $stmt = db()->prepare('SELECT title, status, created_at FROM campaigns WHERE aspirant_id = ? ORDER BY created_at DESC');
                        $stmt->execute([$id]);
                        $campaigns = $stmt->fetchAll();
                    } catch (Throwable $th) {
                        $campaigns = [];
                    }
                    if (empty($campaigns)) {
                        echo '<tr><td colspan="3" class="text-center text-muted">No campaigns created.</td></tr>';
                    } else {
                        foreach ($campaigns as $campaign) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($campaign['title']) . '</td>';
                            echo '<td><span class="badge bg-secondary text-uppercase">' . htmlspecialchars($campaign['status']) . '</span></td>';
                            echo '<td>' . date('M d, Y', strtotime($campaign['created_at'])) . '</td>';
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
