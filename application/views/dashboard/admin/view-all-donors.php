<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Blood Donation Reports </strong>
                </div>
                <div class="scrolltable card-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Blood Group</th>
                                <th>Verify</th>
                                <th>Availability</th>
                                <th>View Details</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allDonors as $row) { ?>
                                <tr>
                                    <td><?= $row['user_id'] ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['phone'] ?></td>
                                    <td><?= $row['blood_group'] ?></td>
                                    <td>
                                        <?php if ($row['is_verified'] == 1) { ?>
                                            <span class="btn btn-success">Verified</span>
                                        <?php } elseif ($row['is_verified'] == 0) { ?>
                                            <form method="post" action="<?= base_url() ?>Admin/verify_user">
                                                <input type="hidden" name="email" value="<?= $row['email'] ?>">
                                                <button type="submit" class="btn btn-warning">Verify</button>
                                            </form>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <form method="post" action="<?= base_url() ?>Admin/change_status">
                                            <input type="hidden" name="email" value="<?= $row['email'] ?>">
                                            <?php if ($row['status'] == 1) { ?>
                                                <button type="submit" class="btn btn-success">Available</button>
                                            <?php } elseif ($row['status'] == 0) { ?>
                                                <button type="submit" class="btn btn-danger">Not Available</button>
                                            <?php } ?>
                                        </form>
                                    </td>
                                    <td>
                                        <button id="<?= $row['email'] ?>" onclick="getUserDetails(this);" data-toggle="modal" data-target="#scrollmodal" type="button" class="btn btn-primary">View</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="scrollmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollmodalLabel">Donor Details</h5>
                <button type="button" onclick="clearData();" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal_body">
                <aside class="profile-nav alt">
                    <section class="card">
                        <div class="card-header user-header alt bg-dark">
                            <div class="media">

                                <span id="profile_pic">

                                </span>
                                <div class="media-body">
                                    <h2 class="text-light display-6" id="name"></h2>
                                    <p id="user_type"></p>
                                </div>
                            </div>
                        </div>


                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <i class="fa fa-tasks"></i> Full Name<span class="pull-right" id="name_2"></span>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-envelope-o"></i> Email <span class="pull-right" id="email"></span>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-group"></i> Gender <span class="pull-right" id="gender"></span>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-calendar"></i> Date of Birth<span class="pull-right" id="dob"></span>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-phone"></i> Phone<span class="pull-right" id="phone"></span>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-phone"></i> Phone 2<span class="pull-right" id="phone_2"></span>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-plus-circle"></i> Blood Group <span class="pull-right" id="blood_group"></span>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-map-marker"></i> Pincode<span class="pull-right" id="pin_code"></span>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-map-marker"></i> Address<span class="pull-right" id="home_address"></span>
                            </li>

                        </ul>

                    </section>
                </aside>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="clearData();" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function clearData() {
        var modalHtml = "";
        jQuery("#name,#user_type,#name_2,#email,#phone,#phone_2,#dob,#gender,#profile_pic,#pin_code,#blood_group,#home_address").html(modalHtml);

    }

    String.prototype.capitalize = function() {
        return this.charAt(0).toUpperCase() + this.slice(1);
    }

    function getUserDetails(div) {
        var email = div.id;
        jQuery.ajax({
            type: 'post',
            url: "<?= base_url() ?>Admin/get_user_data/" + email,
            data: "",
            async: false,
            processData: false,
            contentType: false,
            beforeSend: function() {
                // launchpreloader();
            },
            complete: function() {
                //  stopPreloader();
            },
            success: function(result) {
                var response = jQuery.parseJSON(result)
                if (result != "null") {
                    jQuery("#name").append(response.name);
                    jQuery("#user_type").append(response.user_type.capitalize());
                    jQuery("#name_2").append(response.name);
                    jQuery("#email").append(response.email);
                    jQuery("#phone").append(response.phone);
                    jQuery("#phone_2").append(response.phone_2);
                    jQuery("#dob").append(response.dob);
                    jQuery("#gender").append(response.gender);
                    jQuery("#profile_pic").append("<img class='align-self-center rounded-circle mr-3' style='width:85px; height:85px;' alt='" + response.name + "' src='" + response.profile_pic + "'>");
                    jQuery("#pin_code").append(response.pin_code);
                    jQuery("#blood_group").append(response.blood_group);
                    jQuery("#home_address").append(response.home_address);
                }
            }
        });
    }
</script>