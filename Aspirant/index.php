<?php include_once __DIR__ . '/Includes/header.php'; ?>
<div class="row g-4">
    <div class="col-md-4">
        <div class="card stats-card shadow-sm border-0 h-100">
            <div class="card-body">
                <h5 class="card-title"><i class="fa fa-wallet me-2 text-success"></i>Total Donations</h5>
                <p class="display-6">
                    <?php
                    try {
                        $stmt = db()->prepare("SELECT IFNULL(SUM(amount),0) FROM donations WHERE status='completed' AND aspirant_id = ?");
                        $stmt->execute([$_SESSION['aspirant_id'] ?? 0]);
                        $donations = $stmt->fetchColumn();
                    } catch (Throwable $th) {
                        $donations = 0;
                    }
                    echo '₦' . number_format((float)$donations, 2);
                    ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stats-card shadow-sm border-0 h-100">
            <div class="card-body">
                <h5 class="card-title"><i class="fa fa-bullhorn me-2 text-warning"></i>Campaigns</h5>
                <p class="display-6">
                    <?php
                    try {
                        $stmt = db()->prepare('SELECT COUNT(*) FROM campaigns WHERE aspirant_id = ?');
                        $stmt->execute([$_SESSION['aspirant_id'] ?? 0]);
                        $campaignCount = $stmt->fetchColumn();
                    } catch (Throwable $th) {
                        $campaignCount = 0;
                    }
                    echo (int)$campaignCount;
                    ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stats-card shadow-sm border-0 h-100">
            <div class="card-body">
                <h5 class="card-title"><i class="fa fa-calendar me-2 text-primary"></i>Events</h5>
                <p class="display-6">
                    <?php
                    try {
                        $stmt = db()->prepare("SELECT COUNT(*) FROM events WHERE created_by_type='aspirant' AND created_by = ?");
                        $stmt->execute([$_SESSION['aspirant_id'] ?? 0]);
                        $eventCount = $stmt->fetchColumn();
                    } catch (Throwable $th) {
                        $eventCount = 0;
                    }
                    echo (int)$eventCount;
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="card shadow-sm border-0 mt-4">
    <div class="card-header bg-white border-0">
        <h5 class="mb-0"><i class="fa fa-bullhorn me-2 text-warning"></i>Recent Campaigns</h5>
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <?php
            try {
                $stmt = db()->prepare('SELECT title, status, created_at FROM campaigns WHERE aspirant_id = ? ORDER BY created_at DESC LIMIT 5');
                $stmt->execute([$_SESSION['aspirant_id'] ?? 0]);
                $campaigns = $stmt->fetchAll();
            } catch (Throwable $th) {
                $campaigns = [];
            }
            if (empty($campaigns)) {
                echo '<li class="list-group-item text-muted">No campaigns yet.</li>';
            } else {
                foreach ($campaigns as $campaign) {
                    echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                    echo '<span>' . htmlspecialchars($campaign['title']) . '</span>';
                    echo '<span class="badge bg-secondary text-uppercase">' . htmlspecialchars($campaign['status']) . '</span>';
                    echo '</li>';
                }
            }
            ?>
        </ul>
    </div>
</div>
<?php include_once __DIR__ . '/Includes/footer.php'; ?>
