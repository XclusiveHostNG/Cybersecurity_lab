<aside class="bg-light border rounded p-3 h-100">
    <h5 class="mb-3"><i class="fa fa-bullhorn me-2 text-primary"></i>Latest Updates</h5>
    <?php
    try {
        $pdo = db();
        $stmt = $pdo->query("SELECT title, slug FROM blogs WHERE status='published' ORDER BY published_at DESC LIMIT 5");
        $posts = $stmt->fetchAll();
    } catch (Throwable $th) {
        $posts = [];
    }
    ?>
    <ul class="list-unstyled mb-0 small">
        <?php if (!empty($posts)): ?>
            <?php foreach ($posts as $post): ?>
                <li class="mb-2"><a class="text-decoration-none" href="/blog/<?php echo urlencode($post['slug']); ?>"><?php echo htmlspecialchars($post['title']); ?></a></li>
            <?php endforeach; ?>
        <?php else: ?>
            <li class="text-muted">No recent updates.</li>
        <?php endif; ?>
    </ul>
</aside>
