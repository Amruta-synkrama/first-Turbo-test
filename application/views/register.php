<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Register</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Register</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="card">

		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-sm-3 mt-5 mb-5 pt-3 pb-3 form-wrap">
					<div class="container">
						<?php if(!empty(validation_errors())) : ?>
							<div class="row">
								<div class="col-12">
									<div class="alert alert-danger">
										<?= validation_errors(); ?>
									</div>		
								</div>
							</div>
						<?php endif; ?>
						<form action="<?php echo base_url(); ?>register/validation" method="post">
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" id="name" class="form-control" value="<?= set_value('name') ?>">
							</div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="username" id="username" class="form-control" value="<?= set_value('username') ?>">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" id="email" class="form-control" value="<?= set_value('email') ?>">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" id="password" class="form-control" value="">
							</div>
							<div class="form-group">
								<label>Phone Number</label>
								<input type="text" name="phone_number" id="phone_number" class="form-control" value="<?= set_value('phone_number') ?>">
							</div>
							<div class="form-group">
								<label>User Role</label>
								<select class="form-control" name="entity" id="entity" class="form-control">
									<option value="" selected="" disabled="">Select Value</option>
									<option value="Admin">Admin</option>
									<option value="Hotel">Hotels</option>
									<option value="RPF">Company</option>
								</select>
							</div>
							<div class="row">
								<div class="col-12 col-sm-4 ">
									<button type="submit" class="btn btn-primary register">Register</button>
								</div>
								<!-- <div class="col-12 col-sm-8 text-right">
									<a href="<?php //echo base_url(); ?>login">Login</a>
								</div> -->
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.card -->
</section>
<!-- /.content -->