<!doctype html>

<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $this->session->oauth_user_name ?> | <?= $page_title ?> - Blood donors Arambram </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="#">
    <link rel="shortcut icon" href="#">


    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <?php if ($page == 'my-blood-donations' || $page == 'view-all-donors' || $page == 'view-all-donations') { ?>
        <style>
            .scrolltable {
                overflow-x: auto;
                white-space: nowrap;
            }
        </style>
        <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <?php } ?>

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <?php if ($this->session->user_type == 'admin') { ?>
                    <span class="navbar-brand text-white"><b>Blood Donors <i>Admin</i></b></span>
                <?php } else { ?>
                    <span class="navbar-brand text-white"><b>Blood Donors - <i>User</i></b></span>
                <?php } ?>

            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?= base_url() ?>user/home"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>

                    <h3 class="menu-title">USER TOOLS</h3>
                    <li>
                        <a href="<?= base_url() ?>user/report-blood-donation"> <i class="menu-icon fa fa-laptop"></i>Report Blood Donation</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>user/my-blood-donations"> <i class="menu-icon fa fa-table"></i>My Blood Donations </a>
                    </li>

                    <?php if ($this->session->user_type == 'admin') { ?>
                        <h3 class="menu-title">ADMIN TOOLS</h3>

                        <li>
                            <a href="<?= base_url() ?>admin/view-all-donors"> <i class="menu-icon fa fa-laptop"></i>View All Donors</a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>admin/view-all-donations"> <i class="menu-icon fa fa-laptop"></i>View All Donations</a>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        </nav>
    </aside>

    <!-- Left Panel -->