<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo $companies_data->name ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active"><?php echo $companies_data->name ?></li>
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
              <?php if($companies_data->user_logo) : ?>
                <img class="profile-user-img img-fluid img-circle"
                src="<?php echo base_url(); ?><?php echo $companies_data->user_logo; ?>"
                alt="User profile picture">
              <?php else: ?>
                <img class="profile-user-img img-fluid img-circle"
                src="<?php echo base_url(); ?>theme/dist/img/boxed-bg.jpg"
                alt="User profile picture">
              <?php endif; ?>
            </div>
            <!-- <pre>
              <?php //print_r($companies_data) ?> 
            </pre> -->

            <h3 class="profile-username text-center"><?php echo $companies_data->name; ?></h3>

            <p class="text-muted text-center"><?php echo $companies_data->entity; ?></p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Hotels</b> <a class="float-right"><?php echo $hotels_count; ?></a>
              </li>
              <li class="list-group-item">
                <b>Links Received</b> <a class="float-right"><?php echo $company_links_count[0]->count; ?></a>
              </li>
              <!-- <li class="list-group-item">
                <b>Requests</b> <a class="float-right">13,287</a>
              </li> -->
            </ul>
            <?php if($session->entity == 'Admin'): ?>
            <a href="<?php echo base_url() ?>links?company_id=<?php echo $companies_data->user_id ?>" class="btn btn-primary btn-block"><b>View Link</b></a>
            <a href="<?php echo base_url() ?>company_profile?company_id=<?php echo $companies_data->user_id ?>" class="btn btn-primary btn-block"><b>Edit Company</b></a>
            <?php else: ?>
              <a href="<?php echo base_url() ?>links" class="btn btn-primary btn-block"><b>Add Link</b></a>
            <?php endif; ?>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->


      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <!-- About Me Box -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">About Company</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <h3>Description</h3>

            <p class="text-muted"><?php echo $companies_data->cover; ?></p>

            <hr>

            <div class="row mt-2">
              <div class="col-md-4"><strong>Website</strong></div>
              <div class="col-md-8"><p class="text-muted"><a href="<?php echo $companies_data->website; ?>"><?php echo $companies_data->website; ?></a></p></div>
            </div>
            <div class="row mt-2">
              <div class="col-md-4"><strong>Headquarter</strong></div>
              <div class="col-md-8"><p class="text-muted"><?php echo $companies_data->headquarter; ?></p></div>
            </div>
            <div class="row mt-2">
              <div class="col-md-4"><strong>Phone Number</strong></div>
              <div class="col-md-8"><p class="text-muted"><?php echo $companies_data->phone_number; ?></p></div>
            </div>

            <p class="mt-2"><strong>Contact Person</strong></p>
            <div class="row">
              <div class="col-md-4"><strong>Contact Name</strong></div>
              <div class="col-md-8"><p class="text-muted"><?php echo $companies_data->contact_name; ?></p></div>
            </div>
            <div class="row">
              <div class="col-md-4"><strong>Contact Email</strong></div>
              <div class="col-md-8"><p class="text-muted"><a href="mailto:<?php echo $companies_data->contact_email; ?>"><?php echo $companies_data->contact_email; ?></a></p></div>
            </div>
            <div class="row">
              <div class="col-md-4"><strong>Contact Number</strong></div>
              <div class="col-md-8"><p class="text-muted"><a href="tel:<?php echo $companies_data->contact_no; ?>"><?php echo $companies_data->contact_no; ?></a></p></div>
            </div>

            <!-- <hr> -->

            
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->        
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </div><!-- /.container-fluid -->
</section>
