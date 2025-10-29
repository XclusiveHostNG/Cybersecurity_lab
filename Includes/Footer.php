    </main>
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row g-3">
                <div class="col-md-6">
                    <h5>Contact</h5>
                    <ul class="list-unstyled mb-0 small">
                        <li><i class="fa fa-map-marker-alt me-2"></i><?php echo htmlspecialchars($siteSettings['address'] ?? ''); ?></li>
                        <li><i class="fa fa-envelope me-2"></i><?php echo htmlspecialchars($siteSettings['contact_email'] ?? ''); ?></li>
                        <li><i class="fa fa-phone me-2"></i><?php echo htmlspecialchars($siteSettings['contact_phone'] ?? ''); ?></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled small mb-0">
                        <li><a class="text-white text-decoration-none" href="/Pages/faq">FAQ</a></li>
                        <li><a class="text-white text-decoration-none" href="/Pages/privacy-policy">Privacy Policy</a></li>
                        <li><a class="text-white text-decoration-none" href="/Pages/terms-and-conditions">Terms &amp; Conditions</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Connect</h5>
                    <div class="d-flex gap-2">
                        <a class="text-white" href="<?php echo htmlspecialchars($siteSettings['facebook_url'] ?? '#'); ?>" target="_blank"><i class="fab fa-facebook"></i></a>
                        <a class="text-white" href="<?php echo htmlspecialchars($siteSettings['twitter_url'] ?? '#'); ?>" target="_blank"><i class="fab fa-x-twitter"></i></a>
                        <a class="text-white" href="<?php echo htmlspecialchars($siteSettings['instagram_url'] ?? '#'); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a class="text-white" href="<?php echo htmlspecialchars($siteSettings['whatsapp_url'] ?? '#'); ?>" target="_blank"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
            <p class="mt-3 mb-0 text-center small">&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($siteSettings['site_name'] ?? 'TAG23'); ?>. All rights reserved.</p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/Assets/JS/style.js"></script>
</body>
</html>
