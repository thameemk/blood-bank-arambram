<!-- Page title -->
<section id="page-title" data-bg-parallax="<?= base_url() ?>assets/images/login_banner.jpeg">
    <div class="container">
        <div class="page-title">
            <h1 style="color: #3b22fc;"><b>User login</b></h1>
            <span style="color: #3b22fc;"><b>User login page</b></span>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a style="color: #3b22fc;" href="<?= base_url() ?>"><b>Home</b></a>
                </li>
                <li><a style="color: #3b22fc;" href="#"><b>Pages</b></a>
                </li>
                <li class="active"><a style="color: #3b22fc;" href="<?= base_url() ?>login"><b>User login</b></a>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- end: Page title -->
<section>
    <div class="container">
        <div style="justify-content: center;" class="row">
            <?php if (!$this->session->userdata('sess_logged_in') == 1) { ?>
                <a class="btn btn-icon-holder btn-shadow btn-light-hover btn-light-hover" href="<?php $authURL ?>">
                    Login with Facebook<i class="fab fa-facebook-f"></i>
                </a>
            <?php } else { ?>
                <a class="btn btn-icon-holder btn-shadow btn-light-hover btn-light-hover" href="<?php $authURL ?>">
                    Continue to your profile <i class="icon-home"> </i>
                </a>
            <?php } ?>
        </div>
    </div>
</section>