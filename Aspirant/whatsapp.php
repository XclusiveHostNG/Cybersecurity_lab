<?php include_once __DIR__ . '/Includes/header.php'; ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0">
        <h5 class="mb-0"><i class="fab fa-whatsapp me-2 text-success"></i>Regional Groups</h5>
    </div>
    <div class="card-body">
        <?php
        try {
            $stmt = db()->prepare('SELECT state FROM aspirants WHERE id = ?');
            $stmt->execute([$_SESSION['aspirant_id'] ?? 0]);
            $state = $stmt->fetchColumn();
        } catch (Throwable $th) {
            $state = null;
        }
        try {
            $stmt = db()->prepare('SELECT title, region, link FROM whatsapp_groups WHERE state = ? OR region = ? ORDER BY created_at DESC');
            $stmt->execute([$state, $state]);
            $groups = $stmt->fetchAll();
        } catch (Throwable $th) {
            $groups = [];
        }
        if (empty($groups)) {
            echo '<div class="alert alert-info">No WhatsApp groups assigned yet.</div>';
        } else {
            echo '<div class="list-group">';
            foreach ($groups as $group) {
                echo '<a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" href="' . htmlspecialchars($group['link']) . '" target="_blank">';
                echo '<div><strong>' . htmlspecialchars($group['title']) . '</strong><br><span class="text-muted small">' . htmlspecialchars($group['region']) . '</span></div>';
                echo '<i class="fa fa-arrow-right"></i>';
                echo '</a>';
            }
            echo '</div>';
        }
        ?>
    </div>
</div>
<?php include_once __DIR__ . '/Includes/footer.php'; ?>
