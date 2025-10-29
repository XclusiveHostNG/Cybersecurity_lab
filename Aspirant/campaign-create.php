<?php include_once __DIR__ . '/Includes/header.php'; ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0">
        <h5 class="mb-0"><i class="fa fa-plus me-2 text-warning"></i>Create Campaign</h5>
    </div>
    <div class="card-body">
        <form action="/handlers/aspirant/campaign-create-handler.php" method="post" class="row g-3">
            <div class="col-12">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="col-12">
                <label class="form-label">Content</label>
                <textarea name="content" rows="5" class="form-control" required></textarea>
            </div>
            <div class="col-12">
                <label class="form-label">Media URL</label>
                <input type="url" name="media_path" class="form-control">
            </div>
            <div class="col-12">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-warning"><i class="fa fa-save me-2"></i>Save Campaign</button>
            </div>
        </form>
    </div>
</div>
<?php include_once __DIR__ . '/Includes/footer.php'; ?>
