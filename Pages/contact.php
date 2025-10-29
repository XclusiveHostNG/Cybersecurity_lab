<?php include_once __DIR__ . '/../Includes/Header.php'; ?>
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6">
                <h2 class="section-title">Contact Us</h2>
                <p>Do you have questions or want to collaborate with TAG23? Reach out via the form and our engagement team will respond promptly.</p>
                <form action="/handlers/contact-handler.php" method="post" class="row g-3 bg-white shadow-sm border rounded p-4">
                    <div class="col-md-6">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="full_name" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Subject</label>
                        <input type="text" name="subject" class="form-control" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Message</label>
                        <textarea name="message" rows="4" class="form-control" required></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane me-2"></i>Send Message</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <div class="bg-white shadow-sm border rounded p-4 h-100">
                    <h5 class="mb-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>Our Office</h5>
                    <p class="mb-1"><?php echo htmlspecialchars($siteSettings['address'] ?? 'Abuja, Nigeria'); ?></p>
                    <p class="mb-1"><i class="fa fa-envelope me-2"></i><?php echo htmlspecialchars($siteSettings['contact_email'] ?? 'info@tag23.org'); ?></p>
                    <p class="mb-4"><i class="fa fa-phone me-2"></i><?php echo htmlspecialchars($siteSettings['contact_phone'] ?? '+234'); ?></p>
                    <div class="ratio ratio-4x3 rounded overflow-hidden">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126836.05826432306!2d7.34999655!3d9.076478600000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e0a5689d3d3df%3A0x8b6d22fcf04dc3d4!2sAbuja!5e0!3m2!1sen!2sng!4v1708474944445" allowfullscreen loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once __DIR__ . '/../Includes/Footer.php'; ?>
