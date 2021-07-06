<div class="animated fadeIn">

    <div class="col-md-12 col-lg-12">
        <?php if ($availabilityStatus == 0) { ?>
            <div class="card bg-flat-color-4 text-light">
                <div class="card-body">
                    <div class="h4 m-0"><b>Status - Not available for blood donation</b> </div>
                </div>
            </div>
        <?php } elseif ($availabilityStatus == 1) { ?>
            <div class="card bg-flat-color-2 text-light">
                <div class="card-body">
                    <div class="h4 m-0"><b>Status - Available for blood donation</b> </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-four">
                    <div class="stat-icon dib">
                        <i class="ti-server text-muted"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-heading">Total: <?= $totalDonations ?></div>
                            <a style="color:blue;font-size:15px;display:inline;" href="<?= base_url() ?>user/my-blood-donations">View <i style="font-size:15px;display:inline;" class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-four">
                    <div class="stat-icon dib">
                        <i class="ti-save text-muted"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-heading">Add New</div>
                            <a style="color:blue;font-size:15px;display:inline;" href="<?= base_url() ?>user/report-blood-donation">Click here <i style="font-size:15px;display:inline;" class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-four">
                    <div class="stat-icon dib">
                        <i class="ti-pulse text-muted"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-heading">Change status</div>
                            <form action="<?= base_url() ?>User/update_status" method="post">
                                <input type="hidden" name="email" value="<?= $this->session->email ?>">
                                <?php if ($availabilityStatus == 0) { ?>
                                    <button type="submit" style="color:blue;font-size:15px;display:inline;border:none;background: none;">Make Available <i style="font-size:15px;display:inline;" class="fa fa-arrow-right"></i></button>
                                <?php } elseif ($availabilityStatus == 1) { ?>
                                    <button type="submit" style="color:blue;font-size:15px;display:inline;border:none;background: none;">Make Not Available<i style="font-size:15px;display:inline;" class="fa fa-arrow-right"></i></button>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-four">
                    <div class="stat-icon dib">
                        <i class="ti-user text-muted"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-heading">My Profile</div>
                            <a style="color:blue;font-size:15px;display:inline;" href="<?= base_url() ?>user/profile">View <i style="font-size:15px;display:inline;" class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>