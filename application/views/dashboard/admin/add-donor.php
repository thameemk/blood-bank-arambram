<div class="animated fadeIn">
    <div style="justify-content: center;" class="row">
        <div class="col-lg-8">

            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Add Donor</strong>
                </div>
                <div class="card-body">
                    <!-- complete form -->
                    <div id="pay-invoice">
                        <div class="card-body">

                            <form action="<?= base_url() ?>Admin/add_donor" method="post" class="form-validate" novalidate>
                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">Full Name</label>
                                    <input name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="control-label mb-1">Email</label>
                                    <input type="email" class="form-control" name="email" aria-required="true" aria-invalid="false" required>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select class="form-control" name="gender" required>
                                        <option value="">Select your gender</option>
                                        <option value="female">Female</option>
                                        <option value="male">Male</option>
                                        <option value="na">Rather not say</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input class="form-control" type="date" name="dob" required>
                                </div>
                                <div class="form-group">
                                    <label for="telephone">Mobile Phone</label>
                                    <input class="form-control" type="tel" name="phone" placeholder="Enter your Mobile number" required>
                                </div>
                                <div class="form-group">
                                    <label for="telephone">Mobile Phone 2</label>
                                    <input class="form-control" type="tel" name="phone_2" placeholder="Enter your Second mobile number">
                                </div>
                                <div class="form-group">
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
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea type="text" class="form-control" name="home_address" placeholder="Enter your Home Address" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Pin Code:</label>
                                    <input type="number" class="form-control" name="pin_code" placeholder="Enter Pin Code" required>
                                </div>
                            
                                <div class="row">
                                    <div class="form-group col-6">
                                        <button type="reset" class="btn btn-danger btn-lg btn-block">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                    <div class="form-group col-6">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- complete from -->

        </div>
    </div>
</div>