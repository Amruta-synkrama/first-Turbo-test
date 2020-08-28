<!DOCTYPE html>
<html>
<head>
	<title>Turbores</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>
<body>
	<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand text-center" href="<?php //echo base_url(); ?>">Turbores</a>
		</div>
	</nav> -->

<div class="container">
	<div class="row">
		<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-sm-3 mt-5 mb-5 pt-3 pb-3 form-wrap">
			<div class="container">
				<div class="text-center mb-5">
				<a class="navbar-brand text-center" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/site-logo.png" alt="Turbores Logo" class="brand-image"></a>
				</div>
				<h2>Login</h2>
				<hr>
				<?php
				if($this->session->flashdata('message'))
				{
					echo '
					<div class="alert alert-danger">
					'.$this->session->flashdata("message").'
					</div>
					';
				}
				?>
				<?php if(!empty(validation_errors())) : ?>
					<div class="row">
						<div class="col-12">
							<div class="alert alert-danger">
								<?php echo validation_errors(); ?>
							</div>		
						</div>
					</div>
				<?php endif; ?>
				<form action="<?php echo base_url(); ?>login/validation" method="post">
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" id="email" class="form-control" value="<?php echo set_value('email') ?>">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" id="password" class="form-control" value="">
					</div>
					<div class="row">
						<div class="col-12 col-sm-4 ">
							<button type="submit" class="btn btn-primary login">Login</button>
						</div>
						<!-- <div class="col-12 col-sm-8 text-right">
							<a href="<?php //echo base_url(); ?>register">Register</a>
						</div> -->
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>