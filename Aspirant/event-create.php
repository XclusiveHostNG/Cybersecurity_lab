<?php include_once __DIR__ . '/Includes/header.php'; ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0">
        <h5 class="mb-0"><i class="fa fa-plus me-2 text-primary"></i>Create Event</h5>
    </div>
    <div class="card-body">
        <form action="/handlers/aspirant/event-create-handler.php" method="post" class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Event Date</label>
                <input type="datetime-local" name="event_date" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Location</label>
                <input type="text" name="location" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>
            <div class="col-12">
                <label class="form-label">Description</label>
                <textarea name="description" rows="4" class="form-control"></textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save me-2"></i>Save Event</button>
            </div>
        </form>
    </div>
</div>
<?php include_once __DIR__ . '/Includes/footer.php'; ?>
