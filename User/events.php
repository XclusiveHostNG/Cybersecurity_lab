<?php include_once __DIR__ . '/Includes/header.php'; ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0">
        <h5 class="mb-0"><i class="fa fa-calendar me-2 text-primary"></i>Available Events</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $stmt = db()->query("SELECT id, title, event_date, location FROM events WHERE status='published' ORDER BY event_date ASC");
                        $events = $stmt->fetchAll();
                    } catch (Throwable $th) {
                        $events = [];
                    }
                    if (empty($events)) {
                        echo '<tr><td colspan="4" class="text-center text-muted">No events available.</td></tr>';
                    } else {
                        foreach ($events as $event) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($event['title']) . '</td>';
                            echo '<td>' . date('M d, Y H:i', strtotime($event['event_date'])) . '</td>';
                            echo '<td>' . htmlspecialchars($event['location']);
                            echo '<td><a class="btn btn-sm btn-outline-primary" href="/handlers/event-register.php?id=' . (int)$event['id'] . '"><i class="fa fa-check me-1"></i>Register</a></td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once __DIR__ . '/Includes/footer.php'; ?>
