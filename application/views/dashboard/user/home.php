<div class="animated fadeIn">

    <div class="col-md-12 col-lg-12">
        <div class="card bg-flat-color-4 text-light">
            <div class="card-body">
                <div class="h4 m-0"><b>Your Availability</b></div>
                <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                <small class="text-light">Lorem ipsum dolor sit amet enim.</small>
            </div>
        </div>
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