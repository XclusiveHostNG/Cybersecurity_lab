<?php include_once __DIR__ . '/Includes/Header.php'; ?>
<section class="hero-section text-center">
    <div class="container">
        <h1>Empowering Democratic Participation</h1>
        <p class="lead mx-auto">Join TAG23 - Tinubu Advocacy Group to access tools for political mobilization, leadership development, and community impact.</p>
        <div class="d-flex justify-content-center gap-3 mt-4 flex-wrap">
            <a href="/Auth/register" class="btn btn-success btn-lg"><i class="fa fa-user-plus me-2"></i>Become a Member</a>
            <a href="/Pages/manifestoes" class="btn btn-outline-light btn-lg"><i class="fa fa-book-open me-2"></i>View Manifestoes</a>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <h2 class="section-title">Why Join TAG23?</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card card-highlight border-0 shadow-sm h-100">
                    <div class="card-body">
                        <i class="fa fa-network-wired fa-2x text-primary mb-3"></i>
                        <h5>Grassroots Network</h5>
                        <p>Access localized WhatsApp communities and constituency insights tailored to your region.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-highlight border-0 shadow-sm h-100">
                    <div class="card-body">
                        <i class="fa fa-id-card fa-2x text-success mb-3"></i>
                        <h5>Digital Identity</h5>
                        <p>Generate TAG23 ID cards, complete KYC verification, and unlock exclusive civic programmes.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-highlight border-0 shadow-sm h-100">
                    <div class="card-body">
                        <i class="fa fa-bullhorn fa-2x text-warning mb-3"></i>
                        <h5>Campaign Tools</h5>
                        <p>Aspirants coordinate campaigns, manage donations, and organize events via intuitive dashboards.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <h2 class="section-title">Upcoming Events</h2>
                <ul class="list-group list-group-flush">
                    <?php
                    try {
                        $stmt = db()->query("SELECT title, description, event_date, location FROM events WHERE status='published' ORDER BY event_date ASC LIMIT 3");
                        $events = $stmt->fetchAll();
                    } catch (Throwable $th) {
                        $events = [];
                    }
                    if (empty($events)) {
                        echo '<li class="list-group-item">No events scheduled yet.</li>';
                    } else {
                        foreach ($events as $event) {
                            echo '<li class="list-group-item">';
                            echo '<h5 class="mb-1">' . htmlspecialchars($event['title']) . '</h5>';
                            echo '<p class="mb-1 text-muted"><i class="fa fa-calendar me-2"></i>' . date('M d, Y H:i', strtotime($event['event_date'])) . ' | <i class="fa fa-map-marker-alt ms-2 me-2"></i>' . htmlspecialchars($event['location']);
                            echo '<p class="mb-0">' . htmlspecialchars(mb_strimwidth(strip_tags($event['description']), 0, 120, '...')) . '</p>';
                            echo '</li>';
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa fa-newspaper me-2 text-primary"></i>Latest Blog</h5>
                        <?php
                        try {
                            $stmt = db()->query("SELECT title, excerpt, slug FROM blogs WHERE status='published' ORDER BY published_at DESC LIMIT 1");
                            $blog = $stmt->fetch();
                        } catch (Throwable $th) {
                            $blog = null;
                        }
                        if (!$blog) {
                            echo '<p class="mb-0">Stay tuned for inspiring stories from TAG23 members and leaders.</p>';
                        } else {
                            echo '<h6>' . htmlspecialchars($blog['title']) . '</h6>';
                            echo '<p>' . htmlspecialchars($blog['excerpt']) . '</p>';
                            echo '<a class="btn btn-outline-primary btn-sm" href="/blog/' . urlencode($blog['slug']) . '">Read More</a>';
                        }
                        ?>
                    </div>
                </div>
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa fa-question-circle me-2 text-success"></i>Need Assistance?</h5>
                        <p class="mb-2">Visit our FAQ section to learn about membership requirements, KYC verification, and aspirant privileges.</p>
                        <a class="btn btn-success btn-sm" href="/Pages/faq"><i class="fa fa-arrow-right me-2"></i>View FAQ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <h2 class="section-title">Success Stories</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="mb-3"><i class="fa fa-quote-left text-primary fa-2x"></i></p>
                        <p>"TAG23 provided the structure and mentorship that enabled me to coordinate volunteers across my constituency."</p>
                        <h6 class="mb-0">Aisha, Community Organizer</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="mb-3"><i class="fa fa-quote-left text-primary fa-2x"></i></p>
                        <p>"With the aspirant dashboard, fundraising became transparent and supporters had confidence in our campaign."</p>
                        <h6 class="mb-0">Segun, House of Assembly Aspirant</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="mb-3"><i class="fa fa-quote-left text-primary fa-2x"></i></p>
                        <p>"Access to training and digital identity tools helped our ward mobilize thousands of new voters."</p>
                        <h6 class="mb-0">Fatima, Ward Leader</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once __DIR__ . '/Includes/Footer.php'; ?>
