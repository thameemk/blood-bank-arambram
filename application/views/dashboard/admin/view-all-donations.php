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
                                <th>Report ID</th>
                                <th>Name</th>
                                <th>Donated Date</th>
                                <th>Donated Place</th>
                                <th>Added Admin</th>
                                <th>View Details</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allDonations as $row) { ?>
                                <tr>
                                    <td><?= $row['report_id'] ?></td>
                                    <td><?= $row['user_name'] ?></td>
                                    <td><?= $row['donated_date'] ?></td>
                                    <td><?= $row['donated_place'] ?></td>
                                    <td>
                                        <?= $row['added_by'] ?>
                                    </td>
                                    <td>
                                        <button id="<?= $row['user_phone'] ?>" onclick="getUserDetails(this);" data-toggle="modal" data-target="#scrollmodal" type="button" class="btn btn-primary">View</button>
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
        var user_phone = div.id;
        jQuery.ajax({
            type: 'post',
            url: "<?= base_url() ?>Admin/get_user_data/" + user_phone,
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
                    jQuery("#name").append(response.user_name);
                    jQuery("#user_type").append(response.user_type.capitalize());
                    jQuery("#name_2").append(response.user_name);
                    jQuery("#email").append("<a style='color:blue;' href='tel:" + response.user_email + "'>" + response.user_email + "</a>");
                    jQuery("#phone").append("<a style='color:blue;' href='tel:" + response.user_phone + "'>" + response.user_phone + "</a>");
                    jQuery("#phone_2").append("<a style='color:blue;' href='tel:" + response.user_phone_2 + "'>" + response.user_phone_2 + "</a>");
                    jQuery("#dob").append(response.dob);
                    jQuery("#gender").append(response.gender);
                    jQuery("#pin_code").append(response.pincode);
                    jQuery("#blood_group").append(response.blood_group);
                    jQuery("#home_address").append(response.address);
                    // if (response.profile_pic) {                        
                    //     jQuery("#profile_pic").append("<img class='align-self-center rounded-circle mr-3' style='width:85px; height:85px;' alt='" + response.name + "' src='" + response.profile_pic + "'>");
                    // }
                }
            }
        });
    }
</script>