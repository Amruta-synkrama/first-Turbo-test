<!DOCTYPE html>
<html>
<head>
	<title>Turbores</title>
	<link href="<?php echo base_url(); ?>favicon.png" rel="shortcut icon" type="image/x-icon"/><link href="<?php echo base_url(); ?>favicon2x.png" rel="apple-touch-icon"/>
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
	<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand text-center" href="<?php //echo base_url(); ?>">Turbores</a>
		</div>
	</nav> -->
	<div class="loader" ></div>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			jQuery(function($){
				$('.loader').delay(2300).fadeOut('slow');
			}); });
		</script>
		<style>
			.loader {
				position: fixed;
				left: 0px;
				top: 0px;
				width: 100%;
				height: 100%;
				z-index: 9999;
				background: url('<?php echo base_url(); ?>assets/img/turbo-res-gif.gif') 50% 50% no-repeat #fff; /* Change the #fff here to your background color of choice for the preloader fullscreen section */
			}
			.elementor-editor-active .loader{
				display: none;
			}
		</style>

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
				<?php
				if($this->session->flashdata('success_message'))
				{
					echo '
					<div class="alert alert-success">
					'.$this->session->flashdata("success_message").'
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
				<form action="<?php echo base_url(); ?>login/validation" method="post" class="login">
					<div class="form-group">
						<label><strong>Email</strong></label>
						<input type="email" name="email" id="email" class="form-control" value="<?php echo set_value('email') ?>">
					</div>
					<div class="form-group">
						<label><strong>Password</strong></label>
						<input type="password" name="password" id="password" class="form-control" value="">
					</div>
					<div class="row">
						<div class="col-12 col-sm-4 ">
							<button type="submit" class="btn btn-primary login"><strong>Login</strong></button>
						</div>
						<div class="col-12 col-sm-8 text-right">
							<a href="<?php echo base_url(); ?>login/forgot_password">Forgot Password?</a>
						</div> 
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>