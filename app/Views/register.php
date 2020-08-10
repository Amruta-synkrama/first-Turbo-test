<div class="container">
	<div class="row">
		<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-sm-3 mt-5 mb-5 pt-3 pb-3 form-wrap">
			<div class="container">
				<h2>Register</h2>
				<hr>
				<?php if(isset($validation)) : ?>
					<div class="row">
						<div class="col-12">
							<div class="alert alert-danger">
								<?= $validation->listErrors(); ?>
							</div>		
						</div>
					</div>
				<?php endif; ?>
				<form action="/register" method="post">
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
						<label>Confirm Password</label>
						<input type="password" name="confirm_password" id="confirm_password" class="form-control" value="">
					</div>
					<div class="form-group">
						<label>Phone Number</label>
						<input type="text" name="phone_number" id="phone_number" class="form-control" value="<?= set_value('phone_number') ?>">
					</div>
					<div class="row">
						<div class="col-12 col-sm-4 ">
							<button type="submit" class="btn btn-primary register">Register</button>
						</div>
						<div class="col-12 col-sm-8 text-right">
							<a href="/">Login</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>