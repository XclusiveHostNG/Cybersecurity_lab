<?php include_once __DIR__ . '/../Includes/header.php'; ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0">
        <h5 class="mb-0"><i class="fa fa-plus me-2 text-success"></i>Create WhatsApp Group</h5>
    </div>
    <div class="card-body">
        <form action="/handlers/admin/whatsapp-create-handler.php" method="post" class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Region</label>
                <input type="text" name="region" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">State</label>
                <input type="text" name="state" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Local Government Area</label>
                <input type="text" name="lga" class="form-control">
            </div>
            <div class="col-12">
                <label class="form-label">Invite Link</label>
                <input type="url" name="link" class="form-control" required>
            </div>
            <div class="col-12">
                <label class="form-label">Description</label>
                <textarea name="description" rows="3" class="form-control"></textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success"><i class="fa fa-save me-2"></i>Save Group</button>
            </div>
        </form>
    </div>
</div>
<?php include_once __DIR__ . '/../Includes/footer.php'; ?>
