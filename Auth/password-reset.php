<?php include_once __DIR__ . '/../Includes/Header.php'; ?>
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h2 class="h4 mb-3 text-center">Reset Password</h2>
                        <p class="text-muted text-center small">Enter your registered email and select your account type. We will send password reset instructions.</p>
                        <form action="/handlers/password-reset-handler.php" method="post" class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Account Type</label>
                                <select name="user_type" class="form-select" required>
                                    <option value="user">Member</option>
                                    <option value="aspirant">Aspirant</option>
                                    <option value="admin">Administrator</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100"><i class="fa fa-key me-2"></i>Send Reset Link</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once __DIR__ . '/../Includes/Footer.php'; ?>
