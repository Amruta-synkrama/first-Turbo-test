<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Welcome <?php echo $session->name; ?></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Dashboard</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="container">
	<!-- Small Box (Stat card) -->
	<div class="row">
		<div class="col-lg-4 col-6">
			<!-- small card -->
			<div class="small-box bg-info">
				<div class="inner">
					<h3>150</h3>
					<p>Hotels</p>
				</div>
				<div class="icon">
					<i class="fa fa-h-square"></i>
				</div>
				<a href="<?php echo base_url() ?>hotels" class="small-box-footer">
					More info <i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-4 col-6">
			<!-- small card -->
			<div class="small-box bg-success">
				<div class="inner">
					<h3>53</h3>

					<p>Companies</p>
				</div>
				<div class="icon">
					<i class="fa fa-building"></i>
				</div>
				<a href="<?php echo base_url() ?>companies" class="small-box-footer">
					More info <i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-4 col-6">
			<!-- small card -->
			<div class="small-box bg-danger">
				<div class="inner">
					<h3>44</h3>

					<p>Links added</p>
				</div>
				<div class="icon">
					<i class="fa fa-link"></i>
				</div>
				<a href="<?php echo base_url() ?>links" class="small-box-footer">
					More info <i class="fas fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		
		<!-- ./col -->
	</div>
	<!-- /.row -->
	<!-- Default box -->
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Welcome <?php echo $session->name; ?></h3>
		</div>
		<div class="card-body">
			<p align="center"><a href="<?php echo base_url(); ?>dashboard/logout">Logout</a></p>
		</div>
	</div>
	<!-- /.card -->
	</div>
</section>
<!-- /.content -->