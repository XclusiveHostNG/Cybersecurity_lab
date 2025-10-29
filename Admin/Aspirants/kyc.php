<?php include_once __DIR__ . '/../Includes/header.php'; ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0 d-flex justify-content-between">
        <h5 class="mb-0"><i class="fa fa-id-card me-2 text-primary"></i>Aspirant KYC</h5>
        <a href="/Admin/Aspirants/index" class="btn btn-outline-secondary btn-sm"><i class="fa fa-arrow-left me-2"></i>Back</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Aspirant</th>
                        <th>Document</th>
                        <th>Status</th>
                        <th>Submitted</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $stmt = db()->prepare("SELECT k.*, a.first_name, a.last_name FROM kyc_documents k JOIN aspirants a ON k.owner_id = a.id WHERE k.owner_type = 'aspirant' ORDER BY k.created_at DESC");
                        $stmt->execute();
                        $documents = $stmt->fetchAll();
                    } catch (Throwable $th) {
                        $documents = [];
                    }
                    if (empty($documents)) {
                        echo '<tr><td colspan="5" class="text-center text-muted">No aspirant KYC documents.</td></tr>';
                    } else {
                        foreach ($documents as $doc) {
                            echo '<tr>';
                            echo '<td>' . (int)$doc['id'] . '</td>';
                            echo '<td>' . htmlspecialchars($doc['first_name'] . ' ' . $doc['last_name']) . '</td>';
                            echo '<td>' . htmlspecialchars($doc['document_type']) . '</td>';
                            echo '<td><span class="badge bg-secondary text-uppercase">' . htmlspecialchars($doc['status']) . '</span></td>';
                            echo '<td>' . date('M d, Y', strtotime($doc['created_at'])) . '</td>';
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
