<!-- Page title -->
<section id="page-title" data-bg-parallax="<?= base_url() ?>assets/images/login_banner.jpeg">
    <div class="container">
        <div class="page-title">
            <h1 style="color: #2264fc;"><b>User login</b></h1>
        </div>
    </div>
</section>
<!-- end: Page title -->
<section>
    <div class="container">
        <div style="justify-content: center;" class="row">
            <?php if (!$this->session->userdata('sess_logged_in') == 1) { ?>
                <div class="btn btn-icon-holder btn-shadow btn-light-hover btn-light-hover">
                    <a class="text-white" href="<?php echo $authURL ?>">Login with Facebook<i class="fab fa-facebook-f"></i></a>
                </div>
            <?php } else { ?>
                <div class="btn btn-icon-holder btn-shadow btn-light-hover btn-light-hover">
                    <a class="text-white" href="<?php echo base_url() ?>user/profile?>">Continue to your profile <i class="icon-home"> </i></a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>