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
            <strong><i class="fas fa-book mr-1"></i> Website</strong>

            <p class="text-muted">
              <a href="<?php echo $companies_data->website; ?>"><?php echo $companies_data->website; ?></a>
            </p>

            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Headquater</strong>

            <p class="text-muted"><?php echo $companies_data->headquater; ?></p>

            <hr>

            <strong><i class="fas fa-pencil-alt mr-1"></i> Contact Person</strong>

            <p class="text-muted">
              <p class="tag tag-danger"><strong>Contact Name:</strong> <?php echo $companies_data->contact_name; ?></p>
              <p class="tag tag-danger"><strong>Contact Email:</strong> <a href="#"><?php echo $companies_data->contact_email; ?></a></p>
              <p class="tag tag-danger"><strong>Contact Number:</strong> <a href="#"><?php echo $companies_data->contact_no; ?></a></p>
            </p>

            <hr>

            <strong><i class="far fa-file-alt mr-1"></i> Description</strong>

            <p class="text-muted"><?php echo $companies_data->cover; ?></p>
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
<!-- /.content