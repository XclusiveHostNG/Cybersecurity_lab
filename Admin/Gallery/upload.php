<?php include_once __DIR__ . '/../Includes/header.php'; ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0">
        <h5 class="mb-0"><i class="fa fa-upload me-2 text-success"></i>Upload Media</h5>
    </div>
    <div class="card-body">
        <form action="/handlers/admin/gallery-upload-handler.php" method="post" enctype="multipart/form-data" class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Media Type</label>
                <select name="media_type" class="form-select">
                    <option value="image">Image</option>
                    <option value="video">Video Embed</option>
                </select>
            </div>
            <div class="col-12">
                <label class="form-label">Media File / URL</label>
                <input type="file" name="media_file" class="form-control">
                <small class="text-muted">For videos, provide an embeddable URL in the description field.</small>
            </div>
            <div class="col-12">
                <label class="form-label">Description / Embed URL</label>
                <textarea name="description" rows="3" class="form-control"></textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success"><i class="fa fa-save me-2"></i>Upload</button>
            </div>
        </form>
    </div>
</div>
<?php include_once __DIR__ . '/../Includes/footer.php'; ?>
