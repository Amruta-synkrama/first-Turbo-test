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
				<?php /*if(isset($validation)) : ?>
				<div class="row">
					<div class="col-12">
						<div class="alert alert-danger">
							<?= $validation->listErrors(); ?>
						</div>		
					</div>
				</div>
				<?php endif; */ ?>
				<form action="<?php echo base_url(); ?>login/validation" method="post">
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" id="email" class="form-control" value="<?= set_value('email') ?>">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" id="password" class="form-control" value="">
					</div>
					<div class="row">
						<div class="col-12 col-sm-4 ">
							<button type="submit" class="btn btn-primary login">Login</button>
						</div>
						<div class="col-12 col-sm-8 text-right">
							<a href="<?php echo base_url(); ?>register">Register</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>