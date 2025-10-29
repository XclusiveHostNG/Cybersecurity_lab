<?php include_once __DIR__ . '/../Includes/Header.php'; ?>
<section class="py-5">
    <div class="container">
        <h2 class="section-title">TAG23 News &amp; Stories</h2>
        <div class="row g-4">
            <?php
            try {
                $pdo = db();
                $stmt = $pdo->query("SELECT title, excerpt, slug, cover_image, published_at FROM blogs WHERE status='published' ORDER BY published_at DESC");
                $posts = $stmt->fetchAll();
            } catch (Throwable $th) {
                $posts = [];
            }

            if (empty($posts)) {
                echo '<div class="col-12"><div class="alert alert-info">No blog posts published yet.</div></div>';
            } else {
                foreach ($posts as $post) {
                    ?>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 card-highlight">
                            <?php if (!empty($post['cover_image'])): ?>
                                <img src="<?php echo htmlspecialchars($post['cover_image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($post['title']); ?>">
                            <?php endif; ?>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?php echo htmlspecialchars($post['title']); ?></h5>
                                <p class="card-text text-muted small mb-2"><i class="fa fa-calendar me-2"></i><?php echo date('M d, Y', strtotime($post['published_at'])); ?></p>
                                <p class="card-text flex-grow-1"><?php echo htmlspecialchars(mb_strimwidth($post['excerpt'], 0, 120, '...')); ?></p>
                                <a href="/blog/<?php echo urlencode($post['slug']); ?>" class="btn btn-outline-primary btn-sm mt-2">Read More</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>
<?php include_once __DIR__ . '/../Includes/Footer.php'; ?>
