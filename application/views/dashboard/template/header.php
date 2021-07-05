 <!-- Right Panel -->

 <div id="right-panel" class="right-panel">

     <!-- Header-->
     <header id="header" class="header">

         <div class="header-menu">

             <div class="col-sm-7">
                 <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                 <div class="header-left">
                     <button class="search-trigger"><i class="fa fa-search"></i></button>
                     <div class="form-inline">
                         <form class="search-form">
                             <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                             <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                         </form>
                     </div>

                     <div class="dropdown for-notification">
                         <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <i class="fa fa-bell"></i>
                             <span class="count bg-danger">0</span>
                         </button>
                     </div>

                     <div class="dropdown for-message">
                         <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <i class="ti-email"></i>
                             <span class="count bg-primary">0</span>
                         </button>
                     </div>
                 </div>
             </div>

             <div class="col-sm-5">
                 <div class="user-area dropdown float-right">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <img class="user-avatar rounded-circle" src="<?= $this->session->profile_pic ?>" alt="<?= $this->session->oauth_user_name ?>">
                     </a>

                     <div class="user-menu dropdown-menu">
                         <a class="nav-link" href="<?= base_url() ?>user/profile"><i class="fa fa-user"></i> My Profile</a>

                         <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>

                         <a class="nav-link" href="<?= base_url() ?>auth/logout"><i class="fa fa-power-off"></i> Logout</a>
                     </div>
                 </div>
             </div>
         </div>

     </header>
     <!-- Header-->

     <div class="breadcrumbs">
         <div class="col-sm-4">
             <div class="page-header float-left">
                 <div class="page-title">
                     <h1>Dashboard</h1>
                 </div>
             </div>
         </div>
         <div class="col-sm-8">
             <div class="page-header float-right">
                 <div class="page-title">
                     <ol class="breadcrumb text-right">
                         <li><a href="#">Dashboard</a></li>
                         <?php if ($this->session->user_type == 'admin') { ?>
                             <li><a href="#">Admin</a></li>
                         <?php } else { ?>
                             <li><a href="#">User</a></li>
                         <?php } ?>
                         <li class="active"><?= $page_title ?></li>
                     </ol>
                 </div>
             </div>
         </div>
     </div>
     <div class="content mt-3">
         <?php if ($this->session->flashdata('fail')) : ?>
             <div class="alert alert-danger" role="alert">
                 <center><?php echo $this->session->flashdata('fail'); ?></center>
             </div>
         <?php endif; ?>

         <?php if ($this->session->flashdata('success')) : ?>
             <div class="alert alert-success" role="alert">
                 <center><?php echo $this->session->flashdata('success'); ?></center>
             </div>
         <?php endif; ?>