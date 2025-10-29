<?php include_once __DIR__ . '/Includes/header.php'; ?>
<div class="row g-4">
    <div class="col-md-4">
        <div class="card stats-card shadow-sm border-0 h-100">
            <div class="card-body">
                <h5 class="card-title"><i class="fa fa-clipboard-check me-2 text-success"></i>Onboarding Progress</h5>
                <p class="display-6">
                    <?php
                    try {
                        $stmt = db()->prepare("SELECT onboarding_step FROM users WHERE id = ?");
                        $stmt->execute([$_SESSION['user_id'] ?? 0]);
                        $step = $stmt->fetchColumn();
                    } catch (Throwable $th) {
                        $step = 0;
                    }
                    echo (int)$step . '/5';
                    ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stats-card shadow-sm border-0 h-100">
            <div class="card-body">
                <h5 class="card-title"><i class="fa fa-whatsapp me-2 text-success"></i>WhatsApp Group</h5>
                <p class="mb-2">Access your regional community.</p>
                <?php
                try {
                    $stmt = db()->prepare('SELECT whatsapp_group_link FROM users WHERE id = ?');
                    $stmt->execute([$_SESSION['user_id'] ?? 0]);
                    $link = $stmt->fetchColumn();
                } catch (Throwable $th) {
                    $link = null;
                }
                if ($link) {
                    echo '<a class="btn btn-success btn-sm" href="' . htmlspecialchars($link) . '" target="_blank"><i class="fab fa-whatsapp me-2"></i>Join Group</a>';
                } else {
                    echo '<span class="badge bg-warning text-dark">Link Pending</span>';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stats-card shadow-sm border-0 h-100">
            <div class="card-body">
                <h5 class="card-title"><i class="fa fa-calendar me-2 text-primary"></i>Upcoming Events</h5>
                <ul class="list-unstyled mb-0">
                    <?php
                    try {
                        $stmt = db()->query("SELECT title, event_date FROM events WHERE status='published' AND event_date >= NOW() ORDER BY event_date ASC LIMIT 3");
                        $events = $stmt->fetchAll();
                    } catch (Throwable $th) {
                        $events = [];
                    }
                    if (empty($events)) {
                        echo '<li class="text-muted">No events scheduled.</li>';
                    } else {
                        foreach ($events as $event) {
                            echo '<li class="mb-2"><strong>' . htmlspecialchars($event['title']) . '</strong><br><span class="text-muted small">' . date('M d, Y', strtotime($event['event_date'])) . '</span></li>';
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="card shadow-sm border-0 mt-4">
    <div class="card-header bg-white border-0">
        <h5 class="mb-0"><i class="fa fa-id-card me-2 text-primary"></i>Your Digital ID Card</h5>
    </div>
    <div class="card-body">
        <?php
        try {
            $stmt = db()->prepare('SELECT unique_identification_number, first_name, last_name, state, profile_photo FROM users WHERE id = ?');
            $stmt->execute([$_SESSION['user_id'] ?? 0]);
            $profile = $stmt->fetch();
        } catch (Throwable $th) {
            $profile = null;
        }
        if (!$profile) {
            echo '<div class="alert alert-info">Complete your profile to generate ID card.</div>';
        } else {
            ?>
            <div class="row g-3 align-items-center">
                <div class="col-md-3 text-center">
                    <div class="border rounded p-3 bg-light">
                        <i class="fa fa-user-circle fa-4x text-secondary"></i>
                        <p class="mb-0 mt-2">Passport Pending</p>
                    </div>
                </div>
                <div class="col-md-9">
                    <p class="mb-1"><strong>Name:</strong> <?php echo htmlspecialchars($profile['first_name'] . ' ' . $profile['last_name']); ?></p>
                    <p class="mb-1"><strong>Member ID:</strong> <?php echo htmlspecialchars($profile['unique_identification_number']); ?></p>
                    <p class="mb-1"><strong>State:</strong> <?php echo htmlspecialchars($profile['state']); ?></p>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<?php include_once __DIR__ . '/Includes/footer.php'; ?>
