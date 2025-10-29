<?php include_once __DIR__ . '/../Includes/header.php'; ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fa fa-calendar-check me-2 text-primary"></i>Event Management</h5>
        <a href="/Admin/Events/create" class="btn btn-primary btn-sm"><i class="fa fa-plus me-2"></i>Create Event</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $stmt = db()->query('SELECT * FROM events ORDER BY event_date DESC');
                        $events = $stmt->fetchAll();
                    } catch (Throwable $th) {
                        $events = [];
                    }
                    if (empty($events)) {
                        echo '<tr><td colspan="5" class="text-center text-muted">No events scheduled.</td></tr>';
                    } else {
                        foreach ($events as $event) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($event['title']) . '</td>';
                            echo '<td>' . date('M d, Y H:i', strtotime($event['event_date'])) . '</td>';
                            echo '<td>' . htmlspecialchars($event['location']);
                            echo '<td><span class="badge bg-secondary text-uppercase">' . htmlspecialchars($event['status']) . '</span></td>';
                            echo '<td>';
                            echo '<a class="btn btn-sm btn-outline-primary me-1" href="/Admin/Events/view?id=' . (int)$event['id'] . '"><i class="fa fa-eye"></i></a>';
                            echo '<a class="btn btn-sm btn-outline-warning" href="/Admin/Events/edit?id=' . (int)$event['id'] . '"><i class="fa fa-edit"></i></a>';
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
