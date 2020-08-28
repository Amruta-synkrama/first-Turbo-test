<!DOCTYPE html>
<html>
<head>
	<title>Turbores</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="<?php echo base_url(); ?>">Turbores</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<?php /*if(session()->get('logged_in')) : ?>
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href="/dashboard">Dashboard</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/logout">Logout</a>
						</li>
					</ul>
				<?php else: */ ?>
					<!-- <ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url(); ?>login">Login</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url(); ?>register">Register</a>
						</li>
					</ul> -->
				<?php /*endif;*/ ?>
			</div>
		</div>
	</nav>

<div class="container">
	<div class="row">
		<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-sm-3 mt-5 mb-5 pt-3 pb-3 form-wrap">
			<div class="container">
				<h2>Login</h2>
				<hr>
				<?php
				if($this->session->flashdata('message'))
				{
					echo '
					<div class="alert alert-success">
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