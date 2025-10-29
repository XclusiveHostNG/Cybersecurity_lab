<?php include_once __DIR__ . '/Includes/header.php'; ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0">
        <h5 class="mb-0"><i class="fa fa-donate me-2 text-success"></i>Donations</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Amount</th>
                        <th>Donor</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $stmt = db()->prepare('SELECT amount, donor_name, status, created_at FROM donations WHERE aspirant_id = ? ORDER BY created_at DESC');
                        $stmt->execute([$_SESSION['aspirant_id'] ?? 0]);
                        $donations = $stmt->fetchAll();
                    } catch (Throwable $th) {
                        $donations = [];
                    }
                    if (empty($donations)) {
                        echo '<tr><td colspan="4" class="text-center text-muted">No donations received yet.</td></tr>';
                    } else {
                        foreach ($donations as $donation) {
                            echo '<tr>';
                            echo '<td>₦' . number_format((float)$donation['amount'], 2) . '</td>';
                            echo '<td>' . htmlspecialchars($donation['donor_name']);
                            echo '<td><span class="badge bg-secondary text-uppercase">' . htmlspecialchars($donation['status']) . '</span></td>';
                            echo '<td>' . date('M d, Y', strtotime($donation['created_at'])) . '</td>';
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
