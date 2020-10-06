<!DOCTYPE html>
<html>
<head>
  <link href="<?php echo base_url(); ?>favicon.png" rel="shortcut icon" type="image/x-icon"/><link href="<?php echo base_url(); ?>favicon2x.png" rel="apple-touch-icon"/>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Turbores</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>theme/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- Tempusdominus Bbootstrap 4 -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>theme/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>theme/plugins/select2/css/select2.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>theme/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>theme/plugins/jqvmap/jqvmap.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>theme/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>theme/plugins/toastr/toastr.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>theme/dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>theme/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>theme/plugins/daterangepicker/daterangepicker.css">
	<!-- summernote -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>theme/plugins/summernote/summernote-bs4.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>theme/dist/css/lightbox.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>theme/dist/css/croppie.css">

<!-- jQuery -->
<script src="<?php echo base_url(); ?>theme/plugins/jquery/jquery.min.js"></script>

<script src="<?php echo base_url(); ?>theme/dist/js/croppie.js"></script>
  <style>
    .bs-popover-right{left: 14% !important;}
    .overlay{
      opacity: 0.2;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed accent-orange sidebar-collapse <?php //if($_SESSION['user_data']->first_login == 1) { echo "sidebar-collapse ";} ?>">
	<div class="wrapper">

		<!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            <?php /* ?>
                <li class="nav-item d-none d-sm-inline-block">
                    <?php if($session->entity == 'Admin') : ?>
                       <!-- <a href="<?php //echo base_url() ?>profile" class="nav-link">Profile</a> -->
                    <?php elseif($session->entity == 'Hotel') : ?>
                        <a href="<?php echo base_url() ?>hotel_profile" class="nav-link">Profile</a>
                    <?php elseif($session->entity == 'RFP') : ?>
                        <a href="<?php echo base_url() ?>company_profile" class="nav-link">Profile</a>
                    <?php endif; ?>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo base_url() ?>dashboard" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo base_url() ?>dashboard/logout" class="nav-link">Logout</a>
                </li>
            <?php */ ?>
            </ul>

            <!-- SEARCH FORM -->
            <!-- <form class="form-inline ml-3">
               <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form> -->

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Messages Dropdown Menu -->
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item">
            <a class="nav-link" id="logoutBtn" href="<?php echo base_url() ?>dashboard/logout" role="button">
              Logout
            </a>
          </li>
        </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4 sidebar-dark-orange"> <!-- sidebar-dark-primary -->
            <!-- Brand Logo -->
            <a href="<?php echo base_url(); ?>" class="brand-link">
                <img src="<?php echo base_url(); ?>assets/img/site-logo.png" alt="Turbores Logo" class="brand-image"> 
                <span class="brand-text font-weight-light">Turbores</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                      <?php if($session->user_logo) : ?>
                        <img src="<?php echo base_url(); ?><?php echo $session->user_logo; ?>" class="img-circle elevation-2" alt="User Image">
                      <?php else: ?>
                        <img src="<?php echo base_url(); ?>theme/dist/img/boxed-bg.jpg" class="img-circle elevation-2" alt="User Image">
                      <?php endif; ?>

                    </div>
                    <div class="info">
                        <?php if($session->entity == 'Admin') : ?>
                        <a href="<?php echo base_url() ?>admin_profile" class="d-block"><?php echo $session->name; ?></a>
                        <?php elseif($session->entity == 'Hotel') : ?>
                        <a href="<?php echo base_url() ?>hotel_profile" class="d-block"><?php echo $session->name; ?></a>
                        <?php elseif($session->entity == 'RFP') : ?>
                        <a href="<?php echo base_url() ?>company_profile" class="d-block"><?php echo $session->name; ?></a>
                        <?php elseif($session->entity == 'RFP_EMP') : ?>
                        <a href="<?php echo base_url() ?>company_employee_profile" class="d-block"><?php echo $session->name; ?></a>
                        <?php elseif($session->entity == 'Hotel_EMP') : ?>
                        <a href="<?php echo base_url() ?>hotel_employee_profile" class="d-block"><?php echo $session->name; ?></a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <?php if($session->entity == 'Admin') : ?>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <li class="nav-item pop">
                        <a href="<?php echo base_url() ?>dashboard" class="nav-link <?php if($this->uri->segment(1)=="dashboard"){echo 'active';}?>" id="pop_dashboard" rel='popover'>
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>Dashboard</p>
                        </a>
                      </li>
                      
               
                      <li class="nav-item">
                        <a href="<?php echo base_url() ?>admin_profile" class="nav-link <?php if($this->uri->segment(1)=="admin_profile"){echo 'active';}?>" id="pop_admin_profile" rel='popover'>
                          <i class="far fa-user nav-icon"></i>
                          <p>Profile</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?php echo base_url() ?>register" class="nav-link <?php if($this->uri->segment(1)=="register"){echo 'active';}?>" id="pop_register" rel='popover'>
                          <i class="far fa-registered nav-icon"></i>
                          <p>Register</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?php echo base_url() ?>register_employee" class="nav-link <?php if($this->uri->segment(1)=="register_employee"){echo 'active';}?>" id="pop_register_employee" rel='popover'>
                          <i class="far fa-registered nav-icon"></i>
                          <p>Register Employee</p>
                        </a>
                      </li>
                      <?php if($session->id == 1) : ?>
                      <li class="nav-item">
                        <a href="<?php echo base_url() ?>admins" class="nav-link <?php if($this->uri->segment(1)=="admins"){echo 'active';}?>" id="pop_admins" rel='popover'>
                          <i class="fa fa-users nav-icon"></i>
                          <p>Admins</p>
                        </a>
                      </li>
                      <?php endif; ?>
                      <li class="nav-item">
                        <a href="<?php echo base_url() ?>hotels" class="nav-link <?php if($this->uri->segment(1)=="hotels"){echo 'active';}?>" id="pop_hotels" rel='popover'>
                          <i class="fa fa-h-square nav-icon"></i>
                          <p>Hotels</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?php echo base_url() ?>hotel_employees" class="nav-link <?php if($this->uri->segment(1)=="hotel_employees"){echo 'active';}?>" id="pop_hotel_employees" rel='popover'>
                          <i class="fas fa-users nav-icon"></i>
                          <p>Hotel Employees</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?php echo base_url() ?>companies" class="nav-link <?php if($this->uri->segment(1)=="companies"){echo 'active';}?>" id="pop_companies" rel='popover'>
                          <i class="fa fa-building nav-icon"></i>
                          <p>Company List</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?php echo base_url() ?>company_employees" class="nav-link <?php if($this->uri->segment(1)=="company_employees"){echo 'active';}?>" id="pop_company_employees" rel='popover'>
                          <i class="fas fa-users nav-icon"></i>
                          <p>Company Employees</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?php echo base_url() ?>links" class="nav-link <?php if($this->uri->segment(1)=="links"){echo 'active';}?>" id="pop_links" rel='popover'>
                          <i class="fa fa-link nav-icon"></i>
                          <p>Rate Links</p>
                        </a>
                      </li> 
                      <li class="nav-item">
                        <a href="<?php echo base_url() ?>enquiry_data" class="nav-link <?php if($this->uri->segment(1)=="enquiry_data"){echo 'active';}?>">
                          <i class="fa fa-envelope nav-icon"></i>
                          <p>Enquiries</p>
                        </a>
                      </li>     
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
                <?php elseif($session->entity == 'Hotel') : ?>
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            
                          <li class="nav-item">
                            <a href="<?php echo base_url() ?>dashboard" class="nav-link <?php if($this->uri->segment(1)=="dashboard"){echo 'active';}?>" id="pop_dashboard" rel='popover'>
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>Dashboard</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url() ?>hotel_profile" class="nav-link <?php if($this->uri->segment(1)=="hotel_profile"){echo 'active';}?>" id="pop_hotel_profile" rel='popover'>
                              <i class="far fa-user nav-icon"></i>
                              <p>Profile</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url() ?>register_employee" class="nav-link <?php if($this->uri->segment(1)=="register_employee"){echo 'active';}?>" id="pop_register_employee" rel='popover'>
                              <i class="far fa-registered nav-icon"></i>
                              <p>Register Employee</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url() ?>hotel_employees" class="nav-link <?php if($this->uri->segment(1)=="hotel_employees"){echo 'active';}?>" id="pop_hotel_employees" rel='popover'>
                              <i class="fas fa-users nav-icon"></i>
                              <p>Hotel Employees</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url() ?>hotel_branches" class="nav-link <?php if($this->uri->segment(1)=="hotel_branches"){echo 'active';}?>" id="pop_hotel_branches" rel='popover'>
                              <i class="fa fa-share-alt nav-icon"></i>
                              <p>Properties</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url() ?>companies" class="nav-link <?php if($this->uri->segment(1)=="companies"){echo 'active';}?>" id="pop_companies" rel='popover'>
                              <i class="fa fa-building nav-icon"></i>
                              <p>Company List</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url() ?>links" class="nav-link <?php if($this->uri->segment(1)=="links"){echo 'active';}?>"  id="pop_links" rel='popover'>
                              <i class="fa fa-link nav-icon"></i>
                              <p>Rate Links</p>
                            </a>
                          </li>
                                    
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                <?php elseif($session->entity == 'RFP') : ?>
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            
                          <li class="nav-item">
                            <a href="<?php echo base_url() ?>dashboard" class="nav-link <?php if($this->uri->segment(1)=="dashboard"){echo 'active';}?>" id="pop_dashboard" rel='popover'>
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>Dashboard</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url() ?>company_profile" class="nav-link <?php if($this->uri->segment(1)=="company_profile"){echo 'active';}?>" id="pop_company_profile" rel='popover'>
                              <i class="far fa-user nav-icon"></i>
                              <p>Profile</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url() ?>register_employee" class="nav-link <?php if($this->uri->segment(1)=="register_employee"){echo 'active';}?>" id="pop_register_employee" rel='popover'>
                              <i class="far fa-registered nav-icon"></i>
                              <p>Register Employee</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url() ?>company_employees" class="nav-link <?php if($this->uri->segment(1)=="company_employees"){echo 'active';}?>" id="pop_company_employees" rel='popover'>
                              <i class="fas fa-users nav-icon"></i>
                              <p>Company Employees</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url() ?>hotels" class="nav-link <?php if($this->uri->segment(1)=="hotels"){echo 'active';}?>" id="pop_hotels" rel='popover'>
                              <i class="fa fa-h-square nav-icon"></i>
                              <p>Hotel List</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url() ?>links" class="nav-link <?php if($this->uri->segment(1)=="links"){echo 'active';}?>" id="pop_links" rel='popover'>
                              <i class="fa fa-link nav-icon"></i>
                              <p>Rate Links</p>
                            </a>
                          </li>
                                   
                        </ul>
                    </nav>
                <?php elseif($session->entity == 'RFP_EMP') : ?>
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            
                          <li class="nav-item">
                            <a href="<?php echo base_url() ?>dashboard" class="nav-link <?php if($this->uri->segment(1)=="dashboard"){echo 'active';}?>" id="pop_dashboard" rel='popover'>
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>Dashboard</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url() ?>company" class="nav-link <?php if($this->uri->segment(1)=="company"){echo 'active';}?>" id="pop_company" rel='popover'>
                              <i class="fa fa-building nav-icon"></i>
                              <p>Company Details</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url() ?>company_employee_profile" class="nav-link <?php if($this->uri->segment(1)=="company_employee_profile"){echo 'active';}?>" id="pop_company_employee_profile" rel='popover'>
                              <i class="far fa-user nav-icon"></i>
                              <p>Profile</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url() ?>hotels" class="nav-link <?php if($this->uri->segment(1)=="hotels"){echo 'active';}?>" id="pop_hotels" rel='popover'>
                              <i class="fa fa-h-square nav-icon"></i>
                              <p>Hotel List</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url() ?>links" class="nav-link <?php if($this->uri->segment(1)=="links"){echo 'active';}?>" id="pop_links" rel='popover'>
                              <i class="fa fa-link nav-icon"></i>
                              <p>Rate Links</p>
                            </a>
                          </li>
                                   
                        </ul>
                    </nav>
                <?php elseif($session->entity == 'Hotel_EMP') : ?>
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            
                          <li class="nav-item">
                            <a href="<?php echo base_url() ?>dashboard" class="nav-link <?php if($this->uri->segment(1)=="dashboard"){echo 'active';}?>" id="pop_dashboard" rel='popover'>
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>Dashboard</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url() ?>hotel" class="nav-link <?php if($this->uri->segment(1)=="hotel"){echo 'active';}?>" id="pop_hotel" rel='popover'>
                              <i class="fa fa-h-square nav-icon"></i>
                              <p>Hotel Details</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url() ?>hotel_employee_profile" class="nav-link <?php if($this->uri->segment(1)=="hotel_employee_profile"){echo 'active';}?>" id="pop_hotel_employee_profile" rel='popover'>
                              <i class="far fa-user nav-icon"></i>
                              <p>Profile</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url() ?>hotel_branches" class="nav-link <?php if($this->uri->segment(1)=="hotel_branches"){echo 'active';}?>">
                              <i class="fa fa-share-alt nav-icon"></i>
                              <p>Properties</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url() ?>companies" class="nav-link <?php if($this->uri->segment(1)=="companies"){echo 'active';}?>" id="pop_companies" rel='popover'>
                              <i class="fa fa-h-square nav-icon"></i>
                              <p>Company List</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo base_url() ?>links" class="nav-link <?php if($this->uri->segment(1)=="links"){echo 'active';}?>" id="pop_links" rel='popover'>
                              <i class="fa fa-link nav-icon"></i>
                              <p>Rate Links</p>
                            </a>
                          </li>
                                   
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                <?php endif; ?>

            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">