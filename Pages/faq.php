<?php include_once __DIR__ . '/../Includes/Header.php'; ?>
<section class="py-5 bg-white">
    <div class="container">
        <h2 class="section-title">Frequently Asked Questions</h2>
        <div class="accordion" id="faqAccordion">
            <?php
            try {
                $pdo = db();
                $stmt = $pdo->query("SELECT question, answer FROM faqs WHERE status='published' ORDER BY created_at DESC");
                $faqs = $stmt->fetchAll();
            } catch (Throwable $th) {
                $faqs = [];
            }

            if (empty($faqs)) {
                $faqs = [
                    ['question' => 'How do I become a member?', 'answer' => 'Click on Join TAG23 to register as a member. Complete the onboarding steps and your account will be reviewed.'],
                    ['question' => 'Can I join from outside Nigeria?', 'answer' => 'International registration is determined by site settings. If allowed, select your country during signup.'],
                    ['question' => 'What benefits do aspirants receive?', 'answer' => 'Aspirants access campaign tools, donation management, event creation, and strategic communications support.'],
                ];
            }
            ?>
            <?php foreach ($faqs as $index => $faq): ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeading<?php echo $index; ?>">
                        <button class="accordion-button <?php echo $index !== 0 ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse<?php echo $index; ?>">
                            <?php echo htmlspecialchars($faq['question']); ?>
                        </button>
                    </h2>
                    <div id="faqCollapse<?php echo $index; ?>" class="accordion-collapse collapse <?php echo $index === 0 ? 'show' : ''; ?>" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <?php echo nl2br(htmlspecialchars($faq['answer'])); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php include_once __DIR__ . '/../Includes/Footer.php'; ?>
