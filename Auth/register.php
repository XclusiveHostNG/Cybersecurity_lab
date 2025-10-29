<?php include_once __DIR__ . '/../Includes/Header.php'; ?>
<?php
$allowInternational = (int)($siteSettings['allow_international_registration'] ?? 1) === 1;
?>
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h2 class="h4 mb-3 text-center">Join TAG23</h2>
                        <?php if (!$allowInternational): ?>
                            <div class="alert alert-warning"><i class="fa fa-info-circle me-2"></i>International registration is currently closed. Only Nigerian citizens can register.</div>
                        <?php endif; ?>
                        <form action="/handlers/register-handler.php" method="post" class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Register As</label>
                                <select name="account_type" class="form-select" required>
                                    <option value="user">Member</option>
                                    <option value="aspirant">Aspirant</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <input type="text" name="first_name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Other Name</label>
                                <input type="text" name="other_name" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Mobile Number</label>
                                <input type="text" name="mobile_number" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Are you a Nigerian?</label>
                                <div class="d-flex gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input nationality-option" type="radio" name="is_nigerian" id="nigerianYes" value="yes" checked>
                                        <label class="form-check-label" for="nigerianYes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input nationality-option" type="radio" name="is_nigerian" id="nigerianNo" value="no" <?php echo !$allowInternational ? 'disabled' : ''; ?>>
                                        <label class="form-check-label" for="nigerianNo">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Country</label>
                                <input type="text" name="country" id="countryField" class="form-control" value="Nigeria" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">State</label>
                                <input type="text" name="state" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Local Government Area</label>
                                <input type="text" name="local_government_area" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Ward</label>
                                <input type="text" name="ward" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Polling Unit</label>
                                <input type="text" name="polling_unit" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">City</label>
                                <input type="text" name="city" class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Residential Address</label>
                                <textarea name="address" class="form-control" rows="2"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Senatorial District</label>
                                <input type="text" name="senatorial_district" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">House of Representatives</label>
                                <input type="text" name="house_of_representative" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Occupation</label>
                                <input type="text" name="occupation" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Education Level</label>
                                <select name="education_level" class="form-select">
                                    <option value="">Select Education Level</option>
                                    <option value="olevel">O'Level</option>
                                    <option value="ond">OND/NCE</option>
                                    <option value="hnd">HND</option>
                                    <option value="bsc">B.Sc</option>
                                    <option value="msc">M.Sc</option>
                                    <option value="phd">Ph.D</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Annual Monthly Income</label>
                                <input type="number" name="annual_monthly_income" class="form-control" min="0">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" name="date_of_birth" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">BVN</label>
                                <input type="text" name="bvn" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">NIN</label>
                                <input type="text" name="nin" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">6 Digit PIN</label>
                                <input type="password" name="pin" maxlength="6" minlength="6" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Driver License Number</label>
                                <input type="text" name="drivers_license_number" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Voter's Card Number</label>
                                <input type="text" name="voters_card_number" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">WhatsApp Group</label>
                                <select name="ready_for_whatsapp" class="form-select">
                                    <option value="yes">Yes</option>
                                    <option value="no" selected>No</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">APC Member?</label>
                                <select name="is_apc_member" class="form-select">
                                    <option value="yes">Yes</option>
                                    <option value="no" selected>No</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="accept_terms" id="acceptTerms" required>
                                    <label class="form-check-label" for="acceptTerms">I accept the <a href="/Pages/terms-and-conditions" target="_blank">terms and conditions</a>.</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success w-100"><i class="fa fa-user-plus me-2"></i>Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    (function() {
        const allowInternational = <?php echo $allowInternational ? 'true' : 'false'; ?>;
        const countryField = document.getElementById('countryField');
        const nigerianYes = document.getElementById('nigerianYes');
        const nigerianNo = document.getElementById('nigerianNo');

        function toggleCountry() {
            if (nigerianYes.checked) {
                countryField.value = 'Nigeria';
                countryField.readOnly = true;
            } else if (allowInternational) {
                countryField.value = '';
                countryField.readOnly = false;
                countryField.focus();
            }
        }

        document.querySelectorAll('.nationality-option').forEach(function(option) {
            option.addEventListener('change', toggleCountry);
        });

        toggleCountry();
    })();
</script>
<?php include_once __DIR__ . '/../Includes/Footer.php'; ?>
