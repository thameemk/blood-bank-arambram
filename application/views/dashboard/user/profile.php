<div class="animated fadeIn">
    <div style="justify-content: center;" class="row">
        <div class="col-lg-8 col-md-8">
            <aside class="profile-nav alt">
                <section class="card">
                    <div class="card-header user-header alt bg-dark">
                        <div class="media">
                            
                                <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="<?= $userProfile->name ?>" src="<?= $userProfile->profile_pic ?>">
                            
                            <div class="media-body">
                                <h2 class="text-light display-6"><?= $userProfile->name ?></h2>
                                <p><?= ucfirst($userProfile->user_type) ?></p>
                            </div>
                        </div>
                    </div>


                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                             <i class="fa fa-tasks"></i> Full Name<span class="pull-right"><?= $userProfile->name ?></span>
                        </li>
                        <li class="list-group-item">
                             <i class="fa fa-envelope-o"></i> Email <span class="pull-right"><?= $userProfile->email ?></span>
                        </li>
                        <li class="list-group-item">
                             <i class="fa fa-group"></i> Gender <span class="pull-right"><?= $userProfile->gender ?></span>
                        </li>
                        <li class="list-group-item">
                             <i class="fa fa-calendar"></i> Date of Birth<span class="pull-right"><?= $userProfile->dob ?></span>
                        </li>
                        <li class="list-group-item">
                             <i class="fa fa-phone"></i> Phone<span class="pull-right"><?= $userProfile->phone ?></span>
                        </li>
                        <li class="list-group-item">
                             <i class="fa fa-phone"></i> Phone 2<span class="pull-right"><?= $userProfile->phone_2 ?></span>
                        </li>
                        <li class="list-group-item">
                             <i class="fa fa-plus-circle"></i> Blood Group <span class="pull-right"><?= $userProfile->blood_group ?></span>
                        </li>
                        <li class="list-group-item">
                             <i class="fa fa-map-marker"></i> Pincode<span class="pull-right"><?= $userProfile->pin_code ?></span>
                        </li>
                        <li class="list-group-item">
                             <i class="fa fa-map-marker"></i> Address<span class="pull-right"><?= $userProfile->home_address ?></span>
                        </li>

                    </ul>

                </section>
            </aside>
        </div>
    </div>
</div>