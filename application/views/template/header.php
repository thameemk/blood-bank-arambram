<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="">
    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/images/logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title><?= $page_title ?> | Blood Donors Arambram</title>
    <!-- Stylesheets & Fonts -->
    <link href="<?= base_url() ?>assets/css/plugins.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Body Inner -->
    <div class="body-inner">
        <!-- Header -->
        <header id="header" data-fullwidth="true">
            <div class="header-inner">
                <div class="container">
                    <!--Logo-->
                    <div id="logo">
                        <a href="<?= base_url() ?>">
                            <img src="<?= base_url() ?>assets/images/logo.png" class="logo-default">
                        </a>
                    </div>
                    <!--End: Logo-->
                    <!-- Search -->
                    <div id="search"><a id="btn-search-close" class="btn-search-close" aria-label="Close search form"><i class="icon-x"></i></a>
                        <form class="search-form" action="#" method="post">
                            <input class="form-control" name="q" type="text" placeholder="Type & Search..." />
                            <span class="text-muted">Start typing & press "Enter" or "ESC" to close</span>
                        </form>
                    </div>
                    <!-- end: search -->
                    <!--Header Extras-->
                    <div class="header-extras">
                        <ul>
                            <li>
                                <a id="btn-search" href="#"> <i class="icon-search"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!--Navigation Resposnive Trigger-->
                    <div id="mainMenu-trigger">
                        <a class="lines-button x"><span class="lines"></span></a>
                    </div>
                    <!--end: Navigation Resposnive Trigger-->
                    <!--Navigation-->
                    <div id="mainMenu">
                        <div class="container">
                            <nav>
                                <ul>
                                    <li><a href="<?= base_url() ?>">Home</a></li>
                                    <?php if (!$this->session->userdata('sess_logged_in') == 1) { ?>
                                        <li><a href="<?= base_url() ?>login">Login</a></li>
                                    <?php } else { ?>
                                        <li><a href="<?= base_url() ?>user/profile">MY PROFILE</a></li>
                                        <li><a href="<?= base_url() ?>auth/logout">LOGOUT</a></li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!--END: NAVIGATION-->
                </div>
            </div>
        </header>
        <!-- end: Header -->