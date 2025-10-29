<?php include_once __DIR__ . '/../Includes/Header.php'; ?>
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h2 class="h4 mb-3 text-center">Login to Your Dashboard</h2>
                        <form action="/handlers/login-handler.php" method="post" class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Username or Email</label>
                                <input type="text" name="identifier" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Login As</label>
                                <select name="login_type" class="form-select" required>
                                    <option value="user">Member</option>
                                    <option value="aspirant">Aspirant</option>
                                    <option value="admin">Administrator</option>
                                </select>
                            </div>
                            <div class="col-12 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                </div>
                                <a href="/Auth/password-reset" class="small">Forgot Password?</a>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100"><i class="fa fa-sign-in-alt me-2"></i>Login</button>
                            </div>
                        </form>
                        <p class="text-center small mt-3">Don't have an account? <a href="/Auth/register">Register now</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once __DIR__ . '/../Includes/Footer.php'; ?>
