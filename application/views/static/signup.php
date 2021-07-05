<!doctype html>

<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $page_title ?> | Blood Donors Arambram</title>
    <meta name="description" content="The official website of Blood Donors Arambram">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="#">
    <link rel="shortcut icon" href="#">


    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="<?= base_url() ?>">
                        <h2 class="text-white"><b><i>Blood Donors Arambram</i></b></h2>
                    </a>
                </div>
                <div class="login-form">
                    <?php if ($this->session->flashdata('fail')) : ?>
                        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                            <span class="badge badge-pill badge-danger">Error</span>
                            <?php echo $this->session->flashdata('fail'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                            <span class="badge badge-pill badge-success">Success</span>
                            <?php echo $this->session->flashdata('success'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <form>
                        <div class="form-group">
                            <label style="text-transform:inherit">Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" disabled>
                        </div>
                        <div class="form-group">
                            <label style="text-transform:inherit">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" disabled>
                        </div>
                        <div class="form-group">
                            <label style="text-transform:inherit">Retype Password</label>
                            <input type="password" name="repassword" class="form-control" placeholder="Retype Password" disabled>
                        </div>
                        <button disabled type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign up</button>
                        <div class="social-login-content">
                            <div class="social-button">
                                <a href="<?php echo $authURL ?>" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign up with facebook</a>
                            </div>
                        </div>
                        <div class="register-link m-t-15 text-center">
                            <p>Already have an account ? <a href="<?= base_url() ?>login">Login Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="<?= base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/main.js"></script>


</body>

</html>