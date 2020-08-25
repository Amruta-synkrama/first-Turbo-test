<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Turbores</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>theme/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">


    
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <?php if($session->entity == 'Admin') : ?>
                       <!-- <a href="<?php //echo base_url() ?>profile" class="nav-link">Profile</a> -->
                    <?php elseif($session->entity == 'Hotel') : ?>
                        <a href="<?php echo base_url() ?>hotel_profile" class="nav-link">Profile</a>
                    <?php elseif($session->entity == 'RPF') : ?>
                        <a href="<?php echo base_url() ?>company_profile" class="nav-link">Profile</a>
                    <?php endif; ?>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo base_url() ?>dashboard" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo base_url() ?>dashboard/logout" class="nav-link">Logout</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
               <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

        <!-- Right navbar links -->

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="<?php echo base_url(); ?>theme/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> 
                <span class="brand-text font-weight-light">Turbores</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url(); ?>theme/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?php echo base_url() ?>profile" class="d-block"><?php echo $session->name; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <?php if($session->entity == 'Admin') : ?>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                           with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-open">
                            <a href="<?php echo base_url() ?>dashboard" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                     <a href="<?php echo base_url() ?>dashboard" class="nav-link ">
                                         <i class="far fa-circle nav-icon"></i>
                                         <p>Dashboard</p>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                   <a href="<?php echo base_url() ?>profile" class="nav-link ">
                                       <i class="far fa-circle nav-icon"></i>
                                       <p>Profile</p>
                                   </a>
                                </li>
                                <li class="nav-item">
                                   <a href="<?php echo base_url() ?>register" class="nav-link ">
                                       <i class="far fa-circle nav-icon"></i>
                                       <p>Register</p>
                                   </a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Simple Link<span class="right badge badge-danger">New</span></p>
                            </a>
                        </li> -->
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
                <?php elseif($session->entity == 'Hotel') : ?>
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                               with font-awesome or any other icon font library -->
                               <li class="nav-item has-treeview menu-open">
                                <a href="<?php echo base_url() ?>dashboard" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                     <a href="<?php echo base_url() ?>dashboard" class="nav-link ">
                                         <i class="far fa-circle nav-icon"></i>
                                         <p>Dashboard</p>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                        <a href="<?php echo base_url() ?>hotel_profile" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Profile</p>
                                        </a>
                                    </li>
                                <li class="nav-item">
                                            <a href="<?php echo base_url() ?>hotel_branches" class="nav-link ">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Branches</p>
                                            </a>
                                        </li>
                                <li class="nav-item">
                                            <a href="<?php echo base_url() ?>companies" class="nav-link ">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Company List</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <!-- <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>Simple Link<span class="right badge badge-danger">New</span></p>
                                </a>
                            </li> -->
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                <?php elseif($session->entity == 'RPF') : ?>
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                               with font-awesome or any other icon font library -->
                               <li class="nav-item has-treeview menu-open">
                                <a href="<?php echo base_url() ?>dashboard" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                     <a href="<?php echo base_url() ?>dashboard" class="nav-link ">
                                         <i class="far fa-circle nav-icon"></i>
                                         <p>Dashboard</p>
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                                <a href="<?php echo base_url() ?>company_profile" class="nav-link ">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Profile</p>
                                                </a>
                                        </li>
                                <li class="nav-item">
                                            <a href="<?php echo base_url() ?>hotels" class="nav-link ">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Hotel List</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <!-- <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>Simple Link<span class="right badge badge-danger">New</span></p>
                                </a>
                            </li> -->
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                <?php endif; ?>

            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">