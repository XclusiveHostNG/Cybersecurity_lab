<?php include_once __DIR__ . '/../Includes/Header.php'; ?>
<section class="py-5">
    <div class="container">
        <h2 class="section-title">Privacy Policy</h2>
        <p>TAG23 is committed to protecting personal information collected for membership management, political mobilization, and civic engagement programmes.</p>
        <div class="accordion" id="privacyAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">Information We Collect</button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#privacyAccordion">
                    <div class="accordion-body">
                        We collect personal identifiers, contact information, demographic data, and political participation metrics provided during registration and onboarding.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">How Information Is Used</button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#privacyAccordion">
                    <div class="accordion-body">
                        Data enables personalized communications, event coordination, ID card processing, and strategic campaign insights supporting democratic participation.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">Your Rights</button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#privacyAccordion">
                    <div class="accordion-body">
                        Members may access, update, or request deletion of their personal data. For any requests, contact <a href="mailto:<?php echo htmlspecialchars($siteSettings['contact_email'] ?? ''); ?>"><?php echo htmlspecialchars($siteSettings['contact_email'] ?? 'info@tag23.org'); ?></a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once __DIR__ . '/../Includes/Footer.php'; ?>
