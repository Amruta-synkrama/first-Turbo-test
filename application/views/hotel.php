<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo $hotels_data->name ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active"><?php echo $hotels_data->name ?></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <!-- Post -->
            <div class="post">
              <!-- /.user-block -->
              <div class="row mb-3">
                <div class="col-sm-6">
                  <img class="img-fluid" src="<?php echo base_url(); ?>theme/dist/img/photo1.png" alt="Photo">
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-sm-6">
                      <img class="img-fluid mb-3" src="<?php echo base_url(); ?>theme/dist/img/photo2.png" alt="Photo">
                      <img class="img-fluid" src="<?php echo base_url(); ?>theme/dist/img/photo3.jpg" alt="Photo">
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                      <img class="img-fluid mb-3" src="<?php echo base_url(); ?>theme/dist/img/photo4.jpg" alt="Photo">
                      <img class="img-fluid" src="<?php echo base_url(); ?>theme/dist/img/photo1.png" alt="Photo">
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.post -->
          </div>
        </div>
      </div>

      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <?php if($hotels_data->user_logo) : ?>
                <img class="profile-user-img img-fluid img-circle"
                src="<?php echo base_url(); ?><?php echo $hotels_data->user_logo; ?>"
                alt="User profile picture">
              <?php else: ?>
                <img class="profile-user-img img-fluid img-circle"
                src="<?php echo base_url(); ?>theme/dist/img/boxed-bg.jpg"
                alt="User profile picture">
              <?php endif; ?>
            </div>
            <!-- <pre>
              <?php //print_r($hotels_data) ?> 
            </pre> -->
            <h3 class="profile-username text-center"><?php echo $hotels_data->name; ?></h3>

            <p class="text-muted text-center"><?php echo $hotels_data->entity; ?></p>

            <hr>

            <strong><i class="fas fa-book mr-1"></i> Website</strong>

            <p class="text-muted">
              <a href="<?php echo $hotels_data->website ?>" target="_blank"><?php echo $hotels_data->website ?></a>
            </p> 

            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Headquarter</strong>

            <p class="text-muted"><?php echo $hotels_data->headquarter ?></p>



            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Hotel Branches</b> <a class="float-right"><?php echo count($hotel_locations); ?></a>
              </li>
              <li class="list-group-item">
                <b>Links Added</b> <a class="float-right"><?php echo $hotel_links_count[0]->count; ?></a>
              </li>
              <!-- <li class="list-group-item">
                <b>Requests</b> <a class="float-right">13,287</a>
              </li> -->
            </ul>
            
            <strong><i class="fas fa-pencil-alt mr-1"></i> Contact Person</strong>
            <p class="text-muted">
              <p class="tag tag-danger"><strong>Contact Name:</strong> <?php echo $hotels_data->contact_name ?></p>
              <p class="tag tag-danger"><strong>Contact Email:</strong> <a href="#"><?php echo $hotels_data->contact_email ?></a></p>
              <p class="tag tag-danger"><strong>Contact Number:</strong> <a href="#"><?php echo $hotels_data->contact_no ?></a></p>
            </p>
            <hr>
            <?php if($session->entity == 'Admin'): ?>
              <a href="<?php echo base_url() ?>links?hotel_id=<?php echo $hotels_data->user_id ?>" class="btn btn-primary btn-block"><b>View Links</b></a>
              <a href="<?php echo base_url() ?>hotel_branches?hotel_id=<?php echo $hotels_data->user_id ?>" class="btn btn-primary btn-block"><b>View Hotel Branches</b></a>
              <a href="<?php echo base_url() ?>hotel_profile?hotel_id=<?php echo $hotels_data->user_id ?>" class="btn btn-primary btn-block"><b>Edit Hotel</b></a>
            <?php /*else: ?>
              <a href="<?php echo base_url() ?>request_link?hotel_id=<?php echo $hotel_id ?>" class="btn btn-primary btn-block"><b>Request Link</b></a>
            <?php */ ?>
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
            <h3 class="card-title">About Hotel</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <strong><i class="far fa-file-alt mr-1"></i> Description</strong>
            <p class="text-muted"><?php echo $hotels_data->cover ?></p>
            <hr>

            <strong>Popular amenities</strong>
            <div class="row">
              <?php foreach ($amenities_data as $amenities) {
                $ameniti_data = $controller->hotel_search_amenities($amenities);
                ?>
                <div class="col-md-4 mt-3">
                  <p class=""><i class="material-icons"><?php echo $ameniti_data['icon'] ?></i> <span><?php echo $ameniti_data['name'] ?></span></p>
                </div>
                <?php
              } ?>
              <!-- <div class="col-md-4 mt-3">
                <p class=""><i class="material-icons">pool</i> <span>Pool</span></p>
              </div>
              <div class="col-md-4 mt-3">
                <p class=""><i class="material-icons">ac_unit</i> <span>Air Conditioning</span></p>
              </div>
              <div class="col-md-4 mt-3">
                <p class=""><i class="material-icons">spa</i> <span>Spa</span></p>
              </div>
              <div class="col-md-4 mt-3">
                <p class=""><i class="material-icons">local_dining</i> <span>Restaurant</span></p>
              </div>
              <div class="col-md-4 mt-3">
                <p class=""><i class="material-icons">fitness_center</i> <span>Gym</span></p>
              </div>
              <div class="col-md-4 mt-3">
                <p class=""><i class="material-icons">free_breakfast</i> <span>Breakfast</span></p>
              </div> -->
            </div>

            <hr>
            <div class="row">
              <div class="col-md-6">
                <strong><i class="material-icons">place</i> What's nearby</strong>
                <p class="text-muted">
                  <?php foreach ($nearby_data as $nearby) : ?>
                    <p class="tag tag-danger"><?php echo $nearby; ?></p>  
                  <?php endforeach ?>
                  <!-- <p class="tag tag-danger">Marriott Beach - 1 min walk</p>
                  <p class="tag tag-danger">South Marco Beach - 10 min walk</p>
                  <p class="tag tag-danger">Marco Golf and Garden - 12 min walk</p>
                  <p class="tag tag-danger">Marco Island Center for the Arts - 14 min walk</p>
                  <p class="tag tag-danger">Marco Island Historical Museum - 4 min drive</p> -->
                </p>
              </div>
              <div class="col-md-6">
                <strong><i class="material-icons">local_dining</i> Restaurants</strong>
                <p class="text-muted">
                  <?php foreach ($restaurants_data as $nearby) : ?>
                    <p class="tag tag-danger"><?php echo $nearby; ?></p>  
                  <?php endforeach ?>
                  <!-- <p class="tag tag-danger">Ario — 1 min walk</p>
                  <p class="tag tag-danger">Quinns on the Beach — 1 min walk</p>
                  <p class="tag tag-danger">Paradise Grill - 13 min walk</p>
                  <p class="tag tag-danger">Sunset Grille - 3 min drive</p>
                  <p class="tag tag-danger">CJs on the Bay - 4 min drive</p> -->
                </p>
              </div>
              <!-- <hr> -->
            </div>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->        
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-6">
                <h3>View Branches</h3>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Branch Name</th>
                  <th>Location</th>
                  <!-- <th>Action</th> -->
                </tr>
              </thead>
              <tbody>
                <!-- <pre>
                <?php //print_r($hotel_locations); ?>
                </pre> -->
                <?php foreach ($hotel_locations as $location) :?>
                  <tr>
                    <td><?php echo $location->branch_name; ?></td>
                    <td><?php echo $location->LOCATION; ?>, <?php echo $location->STATE_NAME; ?></td>
                  </tr>
                <?php endforeach;  ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Branch Name</th>
                  <th>Location</th>
                  <!-- <th>Action</th> -->
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>