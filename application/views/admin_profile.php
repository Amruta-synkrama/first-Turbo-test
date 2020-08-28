<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Profile</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Company Profile</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="<?php echo base_url(); ?>theme/dist/img/user4-128x128.jpg"
                   alt="User profile picture">
            </div>

            <h3 class="profile-username text-center"><?php echo $user_data->name; ?></h3>

            <p class="text-muted text-center"><?php echo $user_data->entity; ?></p>

            <ul class="list-group list-group-unbordered mb-3">
              <!-- <li class="list-group-item">
                <b>Hotels</b> <a class="float-right">1,322</a>
              </li>
              <li class="list-group-item">
                <b>Links Received</b> <a class="float-right">543</a>
              </li>
              <li class="list-group-item">
                <b>Requests</b> <a class="float-right">13,287</a>
              </li> -->
            </ul>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">General Settings</a></li>
              <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Password Update</a></li>
              <!-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Contact Person Settings</a></li> -->
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">

            	<div class="tab-pane active" id="settings">
            		<?php if(!empty(validation_errors())) : ?>
            			<div class="row">
            				<div class="col-12">
            					<div class="alert alert-danger">
            						<?= validation_errors(); ?>
            					</div>    
            				</div>
            			</div>
            		<?php endif; ?>
            		<?php if($this->session->flashdata('user_message')) : ?>
            			<div class="row">
            				<div class="col-12">
            					<div class="alert alert-success">
            						<?php  echo $this->session->flashdata("user_message"); ?>
            					</div>
            				</div>
            			</div>
            		<?php endif; ?>
            		<form class="form-horizontal" action="<?php echo base_url(); ?>admin_profile/update_user_details" method="post">
            			<div class="form-group row">
            				<label for="inputName" class="col-sm-2 col-form-label">Name</label>
            				<div class="col-sm-10">
            					<input type="text" class="form-control" placeholder="Name" name="name" id="name" value="<?= $user_data->name; ?>">
            				</div>
            			</div>
            			<div class="form-group row">
            				<label for="inputName" class="col-sm-2 col-form-label">Username</label>
            				<div class="col-sm-10">
            					<input type="text" class="form-control" placeholder="Username" name="username" id="username" value="<?= $user_data->username; ?>" readonly disabled>
            				</div>
            			</div>
            			<div class="form-group row">
            				<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            				<div class="col-sm-10">
            					<input type="email" class="form-control" placeholder="Email" name="email" id="email" value="<?= $user_data->email; ?>" readonly disabled>
            				</div>
            			</div>
            			<div class="form-group row">
            				<label for="inputName2" class="col-sm-2 col-form-label">Phone Number</label>
            				<div class="col-sm-10">
            					<input type="text" class="form-control" placeholder="Phone Number" name="phone_number" id="phone_number" value="<?= $user_data->phone_number; ?>">
            				</div>
            			</div>
            			<div class="form-group row">
            				<div class="offset-sm-2 col-sm-10">
            					<button type="submit" class="btn btn-danger">Submit</button>
            				</div>
            			</div>
            		</form>
            	</div>

            	<div class="tab-pane" id="activity">
            		<?php if(!empty(validation_errors())) : ?>
            			<div class="row">
            				<div class="col-12">
            					<div class="alert alert-danger">
            						<?= validation_errors(); ?>
            					</div>    
            				</div>
            			</div>
            		<?php endif; ?>
            		<?php if($this->session->flashdata('user_message')) : ?>
            			<div class="row">
            				<div class="col-12">
            					<div class="alert alert-success">
            						<?php  echo $this->session->flashdata("user_message"); ?>
            					</div>
            				</div>
            			</div>
            		<?php endif; ?>
            		<form class="form-horizontal" action="<?php echo base_url(); ?>admin_profile/update_user_details_password" method="post">
            			<div class="form-group row">
            				<label for="inputName" class="col-sm-2 col-form-label">Password</label>
            				<div class="col-sm-10">
            					<input type="password" class="form-control" placeholder="Password" name="password" id="password" value="">
            				</div>
            			</div>
            			<div class="form-group row">
            				<label for="inputName" class="col-sm-2 col-form-label">Confirm Password</label>
            				<div class="col-sm-10">
            					<input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" id="confirm_password" value="">
            				</div>
            			</div>
            			<div class="form-group row">
            				<div class="offset-sm-2 col-sm-10">
            					<button type="submit" class="btn btn-danger">Submit</button>
            				</div>
            			</div>
            		</form>
            	</div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->