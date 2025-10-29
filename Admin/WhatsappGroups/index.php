<?php include_once __DIR__ . '/../Includes/header.php'; ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0 d-flex justify-content-between">
        <h5 class="mb-0"><i class="fab fa-whatsapp me-2 text-success"></i>WhatsApp Groups</h5>
        <a href="/Admin/WhatsappGroups/create" class="btn btn-success btn-sm"><i class="fa fa-plus me-2"></i>Add Group</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Region</th>
                        <th>State</th>
                        <th>LGA</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $stmt = db()->query('SELECT * FROM whatsapp_groups ORDER BY created_at DESC');
                        $groups = $stmt->fetchAll();
                    } catch (Throwable $th) {
                        $groups = [];
                    }
                    if (empty($groups)) {
                        echo '<tr><td colspan="5" class="text-center text-muted">No groups created yet.</td></tr>';
                    } else {
                        foreach ($groups as $group) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($group['title']) . '</td>';
                            echo '<td>' . htmlspecialchars($group['region']) . '</td>';
                            echo '<td>' . htmlspecialchars($group['state']) . '</td>';
                            echo '<td>' . htmlspecialchars($group['lga']) . '</td>';
                            echo '<td>';
                            echo '<a class="btn btn-sm btn-outline-primary me-1" href="/Admin/WhatsappGroups/view?id=' . (int)$group['id'] . '"><i class="fa fa-eye"></i></a>';
                            echo '<a class="btn btn-sm btn-outline-warning" href="/Admin/WhatsappGroups/edit?id=' . (int)$group['id'] . '"><i class="fa fa-edit"></i></a>';
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
