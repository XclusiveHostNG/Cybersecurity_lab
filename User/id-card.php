<?php include_once __DIR__ . '/Includes/header.php'; ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0">
        <h5 class="mb-0"><i class="fa fa-id-card me-2 text-primary"></i>Digital ID Card</h5>
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
            echo '<div class="alert alert-warning">Please complete your profile to view the ID card.</div>';
        } else {
            ?>
            <div class="row g-3 align-items-center">
                <div class="col-md-4 text-center">
                    <div class="border rounded p-4 bg-light">
                        <i class="fa fa-user-circle fa-5x text-secondary"></i>
                        <p class="mt-3 mb-0">Upload Passport Photo</p>
                    </div>
                </div>
                <div class="col-md-8">
                    <h5 class="mb-1">TAG23 - Tinubu Advocacy Group</h5>
                    <p class="mb-1"><strong>Name:</strong> <?php echo htmlspecialchars($profile['first_name'] . ' ' . $profile['last_name']); ?></p>
                    <p class="mb-1"><strong>Member ID:</strong> <?php echo htmlspecialchars($profile['unique_identification_number']); ?></p>
                    <p class="mb-1"><strong>State:</strong> <?php echo htmlspecialchars($profile['state']); ?></p>
                    <button class="btn btn-outline-primary btn-sm mt-3"><i class="fa fa-print me-2"></i>Print ID Card</button>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<?php include_once __DIR__ . '/Includes/footer.php'; ?>
