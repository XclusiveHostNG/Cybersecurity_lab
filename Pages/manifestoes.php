<?php include_once __DIR__ . '/../Includes/Header.php'; ?>
<section class="py-5">
    <div class="container">
        <h2 class="section-title">Manifestoes</h2>
        <p class="lead">Our manifesto pillars guide every community intervention, policy advocacy, and empowerment initiative championed by TAG23.</p>
        <div class="row g-4 mt-1">
            <?php
            try {
                $pdo = db();
                $stmt = $pdo->query("SELECT title, content FROM campaigns WHERE status='published' ORDER BY created_at DESC LIMIT 6");
                $manifestoes = $stmt->fetchAll();
            } catch (Throwable $th) {
                $manifestoes = [];
            }

            if (empty($manifestoes)) {
                $manifestoes = [
                    ['title' => 'Grassroots Empowerment', 'content' => 'Investing in community-driven programmes that create employment, education, and civic opportunities.'],
                    ['title' => 'Digital Governance', 'content' => 'Expanding access to e-governance platforms and ensuring transparency through data-driven insights.'],
                    ['title' => 'Youth Inclusion', 'content' => 'Mentoring young leaders and creating equitable platforms for youth voices in political discourse.'],
                ];
            }
            ?>
            <?php foreach ($manifestoes as $manifesto): ?>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100 card-highlight">
                        <div class="card-body">
                            <h5 class="card-title text-primary"><i class="fa fa-flag me-2"></i><?php echo htmlspecialchars($manifesto['title']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars(mb_strimwidth(strip_tags($manifesto['content']), 0, 150, '...')); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php include_once __DIR__ . '/../Includes/Footer.php'; ?>
