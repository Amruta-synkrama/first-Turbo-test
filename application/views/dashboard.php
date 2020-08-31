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
		<?php if($session->entity != 'Hotel') : ?>
		<div class="<?php echo ($session->entity != 'Admin') ? 'col-sm-6 col-xs-6' : 'col-sm-4 col-xs-4'; ?>">
			<!-- small card -->
			<div class="small-box bg-info">
				<div class="inner">
					<h3><?php echo $hotels_count[0]->count; ?></h3>
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
		<?php endif; ?>
		<!-- ./col -->
		<?php if($session->entity != 'RFP') : ?>
		<div class="<?php echo ($session->entity != 'Admin') ? 'col-sm-6 col-xs-6' : 'col-sm-4 col-xs-4'; ?>">
			<!-- small card -->
			<div class="small-box bg-success">
				<div class="inner">
					<h3><?php echo $company_count[0]->count; ?></h3>

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
		<?php endif; ?>
		<!-- ./col -->
		<div class="<?php echo ($session->entity != 'Admin') ? 'col-sm-6 col-xs-6' : 'col-sm-4 col-xs-4'; ?>">
			<!-- small card -->
			<div class="small-box bg-danger">
				<div class="inner">
					<h3><?php echo $links_count[0]->count; ?></h3>

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
	<div class="row">
		<?php if($session->entity != 'Hotel') : ?>
		<div class="<?php echo ($session->entity != 'Admin') ? 'col-sm-12 col-xs-12' : 'col-sm-6 col-xs-6'; ?>">
			<div class="card">
				<div class="card-header border-0">
					<h3 class="card-title">Last added 5 Hotels</h3>
					<div class="card-tools">
						<a href="<?php echo base_url() ?>hotels" class="btn btn-tool btn-sm">
							<i class="fas fa-bars"></i>
						</a>
					</div>
				</div>
				<div class="card-body table-responsive p-0">
					<table class="table table-striped table-valign-middle">
						<thead>
							<tr>
								<th>Name</th>
								<th>Location</th>
								<th>Status</th>
								<th>More</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($hotels_data as $hotel) :?>
							<tr>
								<td>
									<a href="<?php echo base_url(); ?>hotel?id=<?php echo $hotel->user_id; ?>"><?php echo $hotel->name; ?></a>
								</td>
								<td><?php echo $hotel->headquarter; ?></td>
								<td>
									<?php if($hotel->status != '2' ) : ?>
									<span class="badge badge-success">Active</span>
									<?php else: ?>
									<span class="badge badge-danger">Deactivate</span>
									<?php endif; ?>
								</td>
								<td>
									<a href="<?php echo base_url(); ?>hotel?id=<?php echo $hotel->user_id; ?>" class="text-muted">
										<i class="fas fa-search"></i>
									</a>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- /.card -->
		</div>
		<?php endif; ?>
		<!-- /.col-md-6 -->
		<?php if($session->entity != 'RFP') : ?>
		<div class="<?php echo ($session->entity != 'Admin') ? 'col-sm-12 col-xs-12' : 'col-sm-6 col-xs-6'; ?>">
			<div class="card">
				<div class="card-header border-0">
					<h3 class="card-title">Last added 5 Companies</h3>
					<div class="card-tools">
						<a href="<?php echo base_url() ?>companies" class="btn btn-tool btn-sm">
							<i class="fas fa-bars"></i>
						</a>
					</div>
				</div>
				<div class="card-body table-responsive p-0">
					<table class="table table-striped table-valign-middle">
						<thead>
							<tr>
								<th>Name</th>
								<th>Location</th>
								<th>Status</th>
								<th>More</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($companies_data as $company) :?>
							<tr>
								<td>
									<a href="<?php echo base_url(); ?>company?id=<?php echo $company->user_id; ?>"><?php echo $company->name; ?></a>
								</td>
								<td><?php echo $company->headquarter; ?></td>
								<td>
									<?php if($company->status != '2' ) : ?>
									<span class="badge badge-success">Active</span>
									<?php else: ?>
									<span class="badge badge-danger">Deactivate</span>
									<?php endif; ?>
								</td>
								<td>
									<a href="<?php echo base_url(); ?>company?id=<?php echo $company->user_id; ?>" class="text-muted">
										<i class="fas fa-search"></i>
									</a>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<?php endif; ?>
		
		<!-- /.col-md-6 -->
	</div>
	<!-- Default box -->
	<!-- <div class="card">
		<div class="card-header">
			<h3 class="card-title">Welcome <?php //echo $session->name; ?></h3>
		</div>
		<div class="card-body">
			<p align="center"><a href="<?php //echo base_url(); ?>dashboard/logout">Logout</a></p>
		</div>
	</div> -->
	<!-- /.card -->
	</div>
</section>
<!-- /.content -->