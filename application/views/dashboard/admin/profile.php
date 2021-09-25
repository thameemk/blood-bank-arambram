<section class="card">
    <div class="card-header user-header alt bg-dark">
        <div class="media">
            <a href="#">
                <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="<?=base_url()?>assets/images/admin.jpg">
            </a>
            <div class="media-body">
                <h2 class="text-light display-6"><?=$profile->user_name?></h2>
                <p><?=$profile->user_type?></p>
            </div>
        </div>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <i class="fa fa-tasks"></i> Full Name<span class="pull-right"><?=$profile->user_name?></span>
        </li>
        <li class="list-group-item">
            <i class="fa fa-envelope-o"></i> Email <span class="pull-right" ><?=$profile->user_email?></span>
        </li>
        <li class="list-group-item">
            <i class="fa fa-group"></i> Gender <span class="pull-right" id="gender"><?=$profile->gender?></span>
        </li>
        <li class="list-group-item">
            <i class="fa fa-calendar"></i> Date of Birth<span class="pull-right" id="dob"><?=$profile->dob?></span>
        </li>
        <li class="list-group-item">
            <i class="fa fa-phone"></i> Phone<span class="pull-right" id="phone"><?=$profile->user_phone?></span>
        </li>
        <li class="list-group-item">
            <i class="fa fa-phone"></i> Phone 2<span class="pull-right" id="phone_2"><?=$profile->user_phone_2?></span>
        </li>
        <li class="list-group-item">
            <i class="fa fa-plus-circle"></i> Blood Group <span class="pull-right" id="blood_group"><?=$profile->blood_group?></span>
        </li>
        <li class="list-group-item">
            <i class="fa fa-map-marker"></i> Pincode<span class="pull-right" id="pin_code"><?=$profile->pincode?></span>
        </li>
        <li class="list-group-item">
            <i class="fa fa-map-marker"></i> Address<span class="pull-right" id="home_address"><?=$profile->address?></span>
        </li>

    </ul>
</section>