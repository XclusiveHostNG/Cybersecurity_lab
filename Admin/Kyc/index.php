<?php include_once __DIR__ . '/../Includes/header.php'; ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0">
        <h5 class="mb-0"><i class="fa fa-id-card me-2 text-primary"></i>KYC Management</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Owner</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Submitted</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $stmt = db()->query("SELECT k.*, CASE WHEN k.owner_type='user' THEN u.first_name ELSE a.first_name END as first_name,
                                                     CASE WHEN k.owner_type='user' THEN u.last_name ELSE a.last_name END as last_name
                                              FROM kyc_documents k
                                              LEFT JOIN users u ON k.owner_type='user' AND u.id = k.owner_id
                                              LEFT JOIN aspirants a ON k.owner_type='aspirant' AND a.id = k.owner_id
                                              ORDER BY k.created_at DESC");
                        $kycRows = $stmt->fetchAll();
                    } catch (Throwable $th) {
                        $kycRows = [];
                    }
                    if (empty($kycRows)) {
                        echo '<tr><td colspan="5" class="text-center text-muted">No KYC submissions found.</td></tr>';
                    } else {
                        foreach ($kycRows as $row) {
                            echo '<tr>';
                            echo '<td>' . (int)$row['id'] . '</td>';
                            echo '<td>' . htmlspecialchars(trim(($row['first_name'] ?? '') . ' ' . ($row['last_name'] ?? ''))) . '</td>';
                            echo '<td>' . htmlspecialchars(strtoupper($row['owner_type']));
                            echo '<td><span class="badge bg-secondary text-uppercase">' . htmlspecialchars($row['status']) . '</span></td>';
                            echo '<td>' . date('M d, Y', strtotime($row['created_at'])) . '</td>';
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
