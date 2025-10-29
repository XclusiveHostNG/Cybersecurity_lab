<?php include_once __DIR__ . '/../Includes/header.php'; ?>
<?php
try {
    $settings = fetch_site_settings();
} catch (Throwable $th) {
    $settings = [];
}
?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0">
        <h5 class="mb-0"><i class="fa fa-sliders-h me-2 text-dark"></i>Site Settings</h5>
    </div>
    <div class="card-body">
        <form action="/handlers/admin/settings-update-handler.php" method="post" class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Site Name</label>
                <input type="text" name="site_name" value="<?php echo htmlspecialchars($settings['site_name'] ?? ''); ?>" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Tagline</label>
                <input type="text" name="site_tagline" value="<?php echo htmlspecialchars($settings['site_tagline'] ?? ''); ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Contact Email</label>
                <input type="email" name="contact_email" value="<?php echo htmlspecialchars($settings['contact_email'] ?? ''); ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Contact Phone</label>
                <input type="text" name="contact_phone" value="<?php echo htmlspecialchars($settings['contact_phone'] ?? ''); ?>" class="form-control">
            </div>
            <div class="col-12">
                <label class="form-label">Address</label>
                <textarea name="address" rows="2" class="form-control"><?php echo htmlspecialchars($settings['address'] ?? ''); ?></textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label">Facebook URL</label>
                <input type="url" name="facebook_url" value="<?php echo htmlspecialchars($settings['facebook_url'] ?? ''); ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Twitter URL</label>
                <input type="url" name="twitter_url" value="<?php echo htmlspecialchars($settings['twitter_url'] ?? ''); ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Instagram URL</label>
                <input type="url" name="instagram_url" value="<?php echo htmlspecialchars($settings['instagram_url'] ?? ''); ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">WhatsApp URL</label>
                <input type="url" name="whatsapp_url" value="<?php echo htmlspecialchars($settings['whatsapp_url'] ?? ''); ?>" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Allow International Registration</label>
                <select name="allow_international_registration" class="form-select">
                    <option value="1" <?php echo !empty($settings['allow_international_registration']) ? 'selected' : ''; ?>>Enabled</option>
                    <option value="0" <?php echo empty($settings['allow_international_registration']) ? 'selected' : ''; ?>>Disabled</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Maintenance Mode</label>
                <select name="maintenance_mode" class="form-select">
                    <option value="0" <?php echo empty($settings['maintenance_mode']) ? 'selected' : ''; ?>>Off</option>
                    <option value="1" <?php echo !empty($settings['maintenance_mode']) ? 'selected' : ''; ?>>On</option>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-dark"><i class="fa fa-save me-2"></i>Update Settings</button>
            </div>
        </form>
    </div>
</div>
<?php include_once __DIR__ . '/../Includes/footer.php'; ?>
