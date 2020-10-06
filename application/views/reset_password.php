<!DOCTYPE html>
<html>
<head>
	<title>Turbores - Reset Password</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel=stylesheet href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel=stylesheet href="https://fonts.googleapis.com/css?family=Lato:300,400">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
	<script src="<?php echo base_url(); ?>theme/plugins/jquery/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- jquery-validation -->
	<script src="<?php echo base_url(); ?>theme/plugins/jquery-validation/jquery.validate.min.js"></script>
	<script src="<?php echo base_url(); ?>theme/plugins/jquery-validation/additional-methods.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	 <script src="<?php echo base_url(); ?>assets/js/validator.js"></script> 
	 <script src="<?php echo base_url(); ?>assets/js/custom.js"></script> 
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-sm-3 mt-5 mb-5 pt-3 pb-3 form-wrap">
			<div class="container">
				<div class="text-center mb-5">
				<a class="navbar-brand text-center" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/site-logo.png" alt="Turbores Logo" class="brand-image"></a>
				</div>
				<h2>Reset Password</h2>
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
				<form action="<?php echo base_url(); ?>login/reset_password_validation?cid=<?php echo $_GET['cid']; ?>" method="post" class="login_reset_pass">
					<div class="form-group">
						<label><strong>Password</strong></label>
						<input type="password" name="password" id="password" class="form-control" value="">
						<div id="popover-password">
						    <p>Password Strength: <span id="result"> </span></p>
						    <div class="progress">
						        <div id="password-strength" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
						        </div>
						    </div>
						    <ul class="list-unstyled">
						        <li class=""><span class="low-upper-case"><i class="fa fa-times" aria-hidden="true"></i></span>&nbsp; 1 lowercase &amp; 1 uppercase</li>
						        <li class=""><span class="one-number"><i class="fa fa-times" aria-hidden="true"></i></span> &nbsp;1 number (0-9)</li>
						        <li class=""><span class="one-special-char"><i class="fa fa-times" aria-hidden="true"></i></span> &nbsp;1 Special Character (!@#$%^&*).</li>
						        <li class=""><span class="eight-character"><i class="fa fa-times" aria-hidden="true"></i></span>&nbsp; Atleast 8 Character</li>
						    </ul>
						</div>
					</div>
					<div class="form-group">
						<label><strong>Password</strong></label>
						<input type="password" name="confirm_password" id="confirm_password" class="form-control" value="">
					</div>
					<div class="row">
						<div class="col-12 col-sm-4 ">
							<button type="submit" class="btn btn-primary login" id="password-submit" disabled=""><strong>Reset Password</strong></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>