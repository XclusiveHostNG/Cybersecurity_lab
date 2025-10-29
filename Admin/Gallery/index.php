<?php include_once __DIR__ . '/../Includes/header.php'; ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0 d-flex justify-content-between">
        <h5 class="mb-0"><i class="fa fa-image me-2 text-success"></i>Gallery Management</h5>
        <a href="/Admin/Gallery/upload" class="btn btn-success btn-sm"><i class="fa fa-upload me-2"></i>Upload Media</a>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <?php
            try {
                $stmt = db()->query('SELECT * FROM galleries ORDER BY created_at DESC');
                $items = $stmt->fetchAll();
            } catch (Throwable $th) {
                $items = [];
            }
            if (empty($items)) {
                echo '<div class="col-12"><div class="alert alert-info">No gallery items yet.</div></div>';
            } else {
                foreach ($items as $item) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card border-0 shadow-sm h-100">';
                    if ($item['media_type'] === 'video') {
                        echo '<div class="ratio ratio-16x9"><iframe src="' . htmlspecialchars($item['media_path']) . '" allowfullscreen></iframe></div>';
                    } else {
                        echo '<img src="' . htmlspecialchars($item['media_path']) . '" class="card-img-top" alt="' . htmlspecialchars($item['title']) . '">';
                    }
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . htmlspecialchars($item['title']) . '</h5>';
                    echo '<p class="card-text small text-muted">' . htmlspecialchars($item['description']);
                    echo '</div></div></div>';
                }
            }
            ?>
        </div>
    </div>
</div>
<?php include_once __DIR__ . '/../Includes/footer.php'; ?>
