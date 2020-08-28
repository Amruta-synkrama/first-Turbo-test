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
              <?php if($company_user_data->user_logo) : ?>
              <img class="profile-user-img img-fluid img-circle" src="<?php echo $company_user_data->user_logo; ?>" alt="User profile picture">
              <?php else: ?>
              <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url(); ?>theme/dist/img/user4-128x128.jpg" alt="User profile picture">
              <?php endif; ?>
            </div>

            <h3 class="profile-username text-center"><?php echo $company_user_data->name; ?></h3>

            <p class="text-muted text-center"><?php echo $company_user_data->entity; ?></p>

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

            <a href="<?php echo base_url(); ?>hotels" class="btn btn-primary btn-block"><b>View Hotels</b></a>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">About Company</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <strong><i class="fas fa-book mr-1"></i> Website</strong>

            <p class="text-muted">
              <a href="<?php echo $company_data->website ?>" target="_blank"><?php echo $company_data->website ?></a>
            </p>

            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Headquater</strong>

            <p class="text-muted"><?php echo $company_data->headquater ?></p>

            <hr>

            <strong><i class="fas fa-pencil-alt mr-1"></i> Contact Person</strong>

            <p class="text-muted">
              <p class="tag tag-danger"><strong>Contact Name:</strong> <?php echo $company_data->contact_name ?></p>
              <p class="tag tag-danger"><strong>Contact Email:</strong> <a href="#"><?php echo $company_data->contact_email ?></a></p>
              <p class="tag tag-danger"><strong>Contact Number:</strong> <a href="#"><?php echo $company_data->contact_no ?></a></p>
            </p>

            <hr>

            <strong><i class="far fa-file-alt mr-1"></i> Cover</strong>

            <p class="text-muted"><?php echo $company_data->cover ?></p>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Company Settings</a></li>
              <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Contact Person Settings</a></li>
              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">General Settings</a></li>
              <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Password Update</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <?php if(!empty(validation_errors())) : ?>
                  <div class="row">
                    <div class="col-12">
                      <div class="alert alert-danger">
                        <?php echo validation_errors(); ?>
                      </div>    
                    </div>
                  </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('company_message')) : ?>
                  <div class="row">
                    <div class="col-12">
                      <div class="alert alert-success">
                        <?php  echo $this->session->flashdata("company_message"); ?>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('error_upload_message')) : ?>
                  <div class="row">
                    <div class="col-12">
                      <div class="alert alert-danger">
                        <?php  echo $this->session->flashdata("error_upload_message"); ?>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                <form class="form-horizontal" action="<?php echo base_url(); ?>company_profile/update_company_details<?php echo ($session->entity == 'Admin') ? '?company_id='.$company_user_data->id : ''; ?>" method="post">
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Website</label>
                    <div class="col-sm-10">
                      <input type="text" name="website" id="website" class="form-control" placeholder="Website" value="<?php echo $company_data->website; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Headquater</label>
                    <div class="col-sm-10">
                      <input type="text" name="headquater" id="headquater" class="form-control" placeholder="Headquater" value="<?php echo $company_data->headquater; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputExperience" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                      <textarea name="cover" id="cover" class="form-control" value="<?php echo $company_data->cover; ?>"><?php echo $company_data->cover; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>


                <?php if($this->session->flashdata('upload_message')) : ?>
                  <div class="row">
                    <div class="col-12">
                      <div class="alert alert-success">
                        <?php  echo $this->session->flashdata("upload_message"); ?>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('error_upload_message')) : ?>
                  <div class="row">
                    <div class="col-12">
                      <div class="alert alert-danger">
                        <?php  echo $this->session->flashdata("error_upload_message"); ?>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                <form class="form-horizontal mt-5" action="<?php echo base_url(); ?>company_profile/upload_logo<?php echo ($session->entity == 'Admin') ? '?company_id='.$company_user_data->id : ''; ?>" method="post" enctype="multipart/form-data">

                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Logo</label>
                    <div class="col-sm-10">
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="logo" name="logo">
                          <label class="custom-file-label" for="logo">Choose file</label>
                        </div>
                      </div>
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
              <div class="tab-pane" id="timeline">
                <?php if(!empty(validation_errors())) : ?>
                  <div class="row">
                    <div class="col-12">
                      <div class="alert alert-danger">
                        <?php echo validation_errors(); ?>
                      </div>    
                    </div>
                  </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('contact_message')) : ?>
                  <div class="row">
                    <div class="col-12">
                      <div class="alert alert-success">
                        <?php  echo $this->session->flashdata("contact_message"); ?>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                <form class="form-horizontal" action="<?php echo base_url(); ?>company_profile/update_contact_details<?php echo ($session->entity == 'Admin') ? '?company_id='.$company_user_data->id : ''; ?>" method="post">
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Name" name="contact_name" id="contact_name" value="<?php echo $company_data->contact_name; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" placeholder="Email" name="contact_email" id="contact_email" value="<?php echo $company_data->contact_email; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Phone Number" name="contact_no" id="contact_no" value="<?php echo $company_data->contact_no; ?>">
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

              <div class="tab-pane" id="settings">
                <?php if(!empty(validation_errors())) : ?>
                  <div class="row">
                    <div class="col-12">
                      <div class="alert alert-danger">
                        <?php echo validation_errors(); ?>
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
                <form class="form-horizontal" action="<?php echo base_url(); ?>company_profile/update_user_details<?php echo ($session->entity == 'Admin') ? '?company_id='.$company_user_data->id : ''; ?> " method="post">
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="<?php echo $company_user_data->name; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Username" name="username" id="username" value="<?php echo $company_user_data->username; ?>" readonly disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="<?php echo $company_user_data->email; ?>" readonly disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Phone Number" name="phone_number" id="phone_number" value="<?php echo $company_user_data->phone_number; ?>">
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
              <div class="tab-pane" id="password">
                <?php if(!empty(validation_errors())) : ?>
                  <div class="row">
                    <div class="col-12">
                      <div class="alert alert-danger">
                        <?php echo validation_errors(); ?>
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
                <form class="form-horizontal" action="<?php echo base_url(); ?>company_profile/update_user_details_password<?php echo ($session->entity == 'Admin') ? '?company_id='.$company_user_data->id : ''; ?>" method="post">
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
<!-- /.content