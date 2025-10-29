<?php include_once __DIR__ . '/Includes/header.php'; ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0">
        <h5 class="mb-0"><i class="fa fa-clipboard-check me-2 text-success"></i>Onboarding Steps</h5>
    </div>
    <div class="card-body">
        <ol class="list-group list-group-numbered">
            <?php
            $steps = [
                'Complete personal profile information',
                'Verify contact details',
                'Upload identification documents',
                'Select WhatsApp region group',
                'Submit for KYC approval'
            ];
            try {
                $stmt = db()->prepare('SELECT onboarding_step FROM users WHERE id = ?');
                $stmt->execute([$_SESSION['user_id'] ?? 0]);
                $current = (int)$stmt->fetchColumn();
            } catch (Throwable $th) {
                $current = 0;
            }
            foreach ($steps as $index => $step) {
                $completed = $index + 1 <= $current;
                echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                echo '<span>' . htmlspecialchars($step) . '</span>';
                echo $completed ? '<span class="badge bg-success">Completed</span>' : '<span class="badge bg-secondary">Pending</span>';
                echo '</li>';
            }
            ?>
        </ol>
    </div>
</div>
<?php include_once __DIR__ . '/Includes/footer.php'; ?>
