<?php include_once __DIR__ . '/Includes/header.php'; ?>
<div class="row g-4">
    <div class="col-xl-3 col-md-6">
        <div class="card stats-card shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title"><i class="fa fa-users text-primary me-2"></i>Total Members</h5>
                <p class="display-6 mb-0">
                    <?php
                    try {
                        $stmt = db()->query('SELECT COUNT(*) as total FROM users');
                        $totalUsers = $stmt->fetchColumn();
                    } catch (Throwable $th) {
                        $totalUsers = 0;
                    }
                    echo (int)$totalUsers;
                    ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card stats-card shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title"><i class="fa fa-user-tie text-success me-2"></i>Total Aspirants</h5>
                <p class="display-6 mb-0">
                    <?php
                    try {
                        $stmt = db()->query('SELECT COUNT(*) as total FROM aspirants');
                        $totalAspirants = $stmt->fetchColumn();
                    } catch (Throwable $th) {
                        $totalAspirants = 0;
                    }
                    echo (int)$totalAspirants;
                    ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card stats-card shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title"><i class="fa fa-calendar-check text-warning me-2"></i>Upcoming Events</h5>
                <p class="display-6 mb-0">
                    <?php
                    try {
                        $stmt = db()->query("SELECT COUNT(*) FROM events WHERE status='published' AND event_date >= NOW()");
                        $totalEvents = $stmt->fetchColumn();
                    } catch (Throwable $th) {
                        $totalEvents = 0;
                    }
                    echo (int)$totalEvents;
                    ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card stats-card shadow-sm border-0">
            <div class="card-body">
                <h5 class="card-title"><i class="fa fa-wallet text-danger me-2"></i>Donations (₦)</h5>
                <p class="display-6 mb-0">
                    <?php
                    try {
                        $stmt = db()->query("SELECT IFNULL(SUM(amount),0) FROM donations WHERE status='completed'");
                        $totalDonations = $stmt->fetchColumn();
                    } catch (Throwable $th) {
                        $totalDonations = 0;
                    }
                    echo number_format((float)$totalDonations, 2);
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row g-4 mt-1">
    <div class="col-lg-6">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white border-0">
                <h5 class="card-title mb-0"><i class="fa fa-id-card me-2 text-primary"></i>Recent KYC Requests</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Submitted</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            try {
                                $stmt = db()->query("SELECT owner_type, owner_id, status, created_at FROM kyc_documents ORDER BY created_at DESC LIMIT 5");
                                $kycItems = $stmt->fetchAll();
                            } catch (Throwable $th) {
                                $kycItems = [];
                            }
                            if (empty($kycItems)) {
                                echo '<tr><td colspan="4" class="text-center text-muted">No KYC submissions found.</td></tr>';
                            } else {
                                foreach ($kycItems as $item) {
                                    echo '<tr>';
                                    echo '<td>' . htmlspecialchars(strtoupper($item['owner_type'])) . ' #' . (int)$item['owner_id'] . '</td>';
                                    echo '<td>' . htmlspecialchars($item['owner_type']) . '</td>';
                                    echo '<td><span class="badge bg-info text-uppercase">' . htmlspecialchars($item['status']) . '</span></td>';
                                    echo '<td>' . date('M d, Y', strtotime($item['created_at'])) . '</td>';
                                    echo '</tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white border-0">
                <h5 class="card-title mb-0"><i class="fa fa-calendar me-2 text-success"></i>Upcoming Events</h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <?php
                    try {
                        $stmt = db()->query("SELECT title, event_date, location FROM events WHERE status='published' ORDER BY event_date ASC LIMIT 5");
                        $events = $stmt->fetchAll();
                    } catch (Throwable $th) {
                        $events = [];
                    }
                    if (empty($events)) {
                        echo '<li class="list-group-item">No upcoming events.</li>';
                    } else {
                        foreach ($events as $event) {
                            echo '<li class="list-group-item">';
                            echo '<div class="d-flex justify-content-between align-items-center">';
                            echo '<div><strong>' . htmlspecialchars($event['title']) . '</strong><br><span class="text-muted small"><i class="fa fa-map-marker-alt me-1"></i>' . htmlspecialchars($event['location']) . '</span></div>';
                            echo '<span class="badge bg-light text-dark">' . date('M d, Y', strtotime($event['event_date'])) . '</span>';
                            echo '</div>';
                            echo '</li>';
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include_once __DIR__ . '/Includes/footer.php'; ?>
