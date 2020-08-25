<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?= $hotels_data->name ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active"><?= $hotels_data->name ?></li>
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

            <h3 class="profile-username text-center"><?php echo $session->name; ?></h3>

            <p class="text-muted text-center"><?php echo $session->entity; ?></p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Hotels</b> <a class="float-right">1,322</a>
              </li>
              <li class="list-group-item">
                <b>Links Received</b> <a class="float-right">543</a>
              </li>
              <li class="list-group-item">
                <b>Requests</b> <a class="float-right">13,287</a>
              </li>
            </ul>

            <a href="#" class="btn btn-primary btn-block"><b>Request Link</b></a>
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
		    <h3 class="card-title">About Hotel</h3>
		  </div>
		  <!-- /.card-header -->
		  <div class="card-body">
		    <strong><i class="fas fa-book mr-1"></i> Website</strong>

		    <p class="text-muted">
		      <a href="#">www.xyz.com</a>
		    </p>

		    <hr>

		    <strong><i class="fas fa-map-marker-alt mr-1"></i> Headquater</strong>

		    <p class="text-muted">Malibu, California</p>

		    <hr>

		    <strong><i class="fas fa-pencil-alt mr-1"></i> Contact Person</strong>

		    <p class="text-muted">
		      <p class="tag tag-danger"><strong>Contact Name:</strong> XYZ</p>
		      <p class="tag tag-danger"><strong>Contact Email:</strong> <a href="#">xyz@pqr.com</a></p>
		      <p class="tag tag-danger"><strong>Contact Number:</strong> <a href="#">+123456789</a></p>
		    </p>

		    <hr>

		    <strong><i class="far fa-file-alt mr-1"></i> Cover</strong>

		    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
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
<!-- /.content -->