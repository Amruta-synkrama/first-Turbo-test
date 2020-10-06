<!DOCTYPE html>
<html>
<head>
	<title>Turbores - Forgot Password</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
	<script src="<?php echo base_url(); ?>theme/plugins/jquery/jquery.min.js"></script>
	<!-- jquery-validation -->
	<script src="<?php echo base_url(); ?>theme/plugins/jquery-validation/jquery.validate.min.js"></script>
	<script src="<?php echo base_url(); ?>theme/plugins/jquery-validation/additional-methods.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	 <script src="<?php echo base_url(); ?>assets/js/validator.js"></script> 
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-sm-3 mt-5 mb-5 pt-3 pb-3 form-wrap">
			<div class="container">
				<div class="text-center mb-5">
				<a class="navbar-brand text-center" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/site-logo.png" alt="Turbores Logo" class="brand-image"></a>
				</div>
				<h2>Forgot Password</h2>
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
				<form action="<?php echo base_url(); ?>login/forgot_password_validation" method="post" class="login_forgot_pass">
					<div class="form-group">
						<label><strong>Email</strong></label>
						<input type="email" name="email" id="email" class="form-control" value="<?php echo set_value('email') ?>">
					</div>
					<div class="row">
						<div class="col-12 col-sm-4 ">
							<button type="submit" class="btn btn-primary login"><strong>Reset Password</strong></button>
						</div>
						<div class="col-12 col-sm-8 text-right">
							<a href="<?php echo base_url(); ?>">Back to login</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>