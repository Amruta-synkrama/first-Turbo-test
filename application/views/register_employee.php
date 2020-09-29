<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Register Employee</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Register Employee</li>
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
				<div class="col-md-12 mt-5 mb-5 p-3 form-wrap">
					<div class="container">
						<?php if(!empty(validation_errors())) : ?>
							<div class="row">
								<div class="col-12">
									<div class="alert alert-danger">
										<?php echo validation_errors(); ?>
									</div>		
								</div>
							</div>
						<?php endif; ?>
						<form action="<?php echo base_url(); ?>register_employee/validation" method="post" class="register_user_emp">
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label>Name</label>
										<input type="text" name="name" id="name" class="form-control" value="<?php echo set_value('name') ?>">
									</div>
									<div class="form-group">
										<label>Username</label>
										<input type="text" name="username" id="username" class="form-control" value="<?php echo set_value('username') ?>">
									</div>
									<div class="form-group">
										<label>Email</label>
										<input type="email" name="email" id="email" class="form-control" value="<?php echo set_value('email') ?>">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="password" id="password" class="form-control" value="">
									</div>
									<div class="form-group">
										<label>Phone Number</label>
										<input type="text" name="phone_number" id="phone_number" class="form-control" value="<?php echo set_value('phone_number') ?>" data-inputmask='"mask": "(999)999-9999"' data-mask>
									</div>
									<?php if($session->entity == 'Admin') : ?>
										<div class="form-group">
											<label>User Role</label>
											<select class="form-control entity_select" name="entity" id="entity">
												<option value="" selected="" disabled="">Select Value</option>
												<option value="Hotel_EMP">Hotels Employee</option>
												<option value="RFP_EMP">Company Employee</option>
											</select>
										</div>
										<?php elseif($session->entity == 'Hotel') : ?>
											<input type="hidden" name="entity" id="entity" class="form-control" value="Hotel_EMP">
										<?php elseif($session->entity == 'RFP') : ?>
												<input type="hidden" name="entity" id="entity" class="form-control" value="RFP_EMP">
										<?php endif; ?>
										<?php if($session->entity != 'Admin') : ?> 
										<input type="hidden" name="admin_user" id="admin_user" class="form-control" value="<?php echo $session->id; ?>">
										<div class="form-group">
											<label>Employee ID</label>
											<input type="text" name="emp_id" id="emp_id" class="form-control" value="<?php echo set_value('emp_id') ?>">
										</div>
										<?php endif; ?>
									</div>
								</div>
									<?php if($session->entity == 'Admin') : ?> 
									<div class="row">
										<div class="col-6">
											<div class="form-group">
												<label for="inputStatus">Users</label>
												<select class="form-control custom-select admin_select select2"  name="admin_user" id="admin_user">
													<option selected disabled>Please select</option>
												</select>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label>Employee ID</label>
												<input type="text" name="emp_id" id="emp_id" class="form-control" value="<?php echo set_value('emp_id') ?>">
											</div>
										</div>
									</div>
									<?php endif; ?>

									<div class="row">

										<div class="col-12 col-sm-4 mt-5">
											<button type="submit" class="btn btn-primary register">Register</button>
										</div>
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
		<?php if($session->entity == 'Admin') : ?>
			<script type="text/javascript">
				$(document).ready(function(){
					$('body').on("change", ".entity_select", function() {
						var value = $(this).val();
						console.log(value);
						var url= "<?php echo base_url('register_employee/get_users') ?>"; 
						$.ajax({ 
                type: "POST", //send with post 
                url: url, 
                data: {'value':value}, 
                success:function(data){ 
                	$('.admin_select').html(data);
                } 
            });
					});
				});
			</script>
			<?php endif; ?>