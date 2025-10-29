<?php include_once __DIR__ . '/Includes/header.php'; ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-0 d-flex justify-content-between">
        <h5 class="mb-0"><i class="fa fa-calendar me-2 text-primary"></i>Your Events</h5>
        <a href="/Aspirant/event-create" class="btn btn-primary btn-sm"><i class="fa fa-plus me-2"></i>Create Event</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $stmt = db()->prepare("SELECT id, title, event_date, status FROM events WHERE created_by_type='aspirant' AND created_by = ? ORDER BY event_date DESC");
                        $stmt->execute([$_SESSION['aspirant_id'] ?? 0]);
                        $events = $stmt->fetchAll();
                    } catch (Throwable $th) {
                        $events = [];
                    }
                    if (empty($events)) {
                        echo '<tr><td colspan="4" class="text-center text-muted">No events yet.</td></tr>';
                    } else {
                        foreach ($events as $event) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($event['title']) . '</td>';
                            echo '<td>' . date('M d, Y H:i', strtotime($event['event_date'])) . '</td>';
                            echo '<td><span class="badge bg-secondary text-uppercase">' . htmlspecialchars($event['status']) . '</span></td>';
                            echo '<td><a class="btn btn-sm btn-outline-primary" href="/Aspirant/event-edit?id=' . (int)$event['id'] . '"><i class="fa fa-edit"></i></a></td>';
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
