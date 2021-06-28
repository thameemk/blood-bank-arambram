<!-- Page title -->
<section id="page-title" data-bg-parallax="<?= base_url() ?>assets/images/login_banner.jpeg">
    <div class="container">
        <div class="page-title">
            <h1 style="color: #2264fc;"><b>Complete Your Profile</b></h1>
        </div>
    </div>
</section>
<!-- end: Page title -->

<section id="page-content">
    <div class="container">
        <div style="justify-content: center;" class="row">
            <div class="content col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <span class="h4">Complete your profile</span>
                        <p class="text-muted">Please complete your basic information. It is mandatory to become a donor in Blood Donors Arambram Group</p>
                    </div>
                    <div class="card-body">
                        <form id="form1" action="<?= base_url() ?>user/complete_profile" method="post" class="form-validate">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="username">Full Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter username" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" value="<?= $this->session->email ?>" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="gender">Gender</label>
                                    <select class="form-control" name="gender" required>
                                        <option value="">Select your gender</option>
                                        <option value="female">Female</option>
                                        <option value="male">Male</option>
                                        <option value="na">Rather not say</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="dob">Date of Birth</label>
                                    <input class="form-control" type="date" name="dob" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="telephone">Mobile Phone</label>
                                    <input class="form-control" type="tel" name="phone" placeholder="Enter your Mobile number" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="telephone">Mobile Phone 2</label>
                                    <input class="form-control" type="tel" name="phone_2" placeholder="Enter your Second mobile number">
                                </div>
                            </div>
                            <div class="form-row">
                                <label for="country">Blood Group</label>
                                <select name="blood_group" class="form-control" required>
                                    <option value="">Select your Blood group</option>
                                    <option value="A+">A RhD positive (A+)</option>
                                    <option value="A-">A RhD negative (A-)</option>
                                    <option value="B+">B RhD positive (B+)</option>
                                    <option value="B-">B RhD negative (B-)</option>
                                    <option value="O+">O RhD positive (O+)</option>
                                    <option value="O-">O RhD negative (O-)</option>
                                    <option value="AB+">AB RhD positive (AB+)</option>
                                    <option value="AB-">AB RhD negative (AB-)</option>
                                </select>
                            </div>
                            <div class="h5 mb-4">Address</div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="address">Address</label>
                                    <textarea type="text" class="form-control" name="home_address" placeholder="Enter your Home Address" required></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Pin Code:</label>
                                    <input type="number" class="form-control" name="pin_code" placeholder="Enter Pin Code" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="state">State</label>
                                    <select name="state" class="form-control" required>
                                        <option value="">Kerala</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="country">Country</label>
                                    <select name="country" class="form-control" required>
                                        <option value="">INDIA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="terms_conditions" id="terms_conditions" class="custom-control-input" value="1" required>
                                    <label class="custom-control-label" for="terms_conditions">By checking
                                        this
                                        option, you agree to acceot with the <a href="#">Terms and
                                            Conditions</a>.</label>
                                </div>
                            </div>
                            <button type="submit" class="btn m-t-30 mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>