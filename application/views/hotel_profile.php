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
          <li class="breadcrumb-item active">Hotel Profile</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <?php if($gallery_data) : ?>
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <!-- Post -->
            <div class="post">
              <!-- /.user-block -->
              
              <div class="row mb-3">
                <?php $i = 1; ?>
                <?php foreach ($gallery_data as $image) : ?>
                  <?php if($i == 1) : ?>
                <div class="col-sm-6">
                  <a class="example-image-link" data-lightbox="example-2" href="<?php echo base_url(); ?><?php echo $image; ?>">
                    <img class="img-fluid" src="<?php echo base_url(); ?><?php echo $image; ?>" alt="Photo">
                  </a>
                </div>
                <?php elseif($i == 2 ) : ?>
                <!-- /.col -->
                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-sm-6">
                      <a class="example-image-link" data-lightbox="example-2" href="<?php echo base_url(); ?><?php echo $image; ?>">
                        <img class="img-fluid mb-3" src="<?php echo base_url(); ?><?php echo $image; ?>" alt="Photo">
                      </a>
                <?php elseif($i == 3) : ?>
                      <a class="example-image-link" data-lightbox="example-2" href="<?php echo base_url(); ?><?php echo $image; ?>">
                        <img class="img-fluid mb-3" src="<?php echo base_url(); ?><?php echo $image; ?>" alt="Photo">
                      </a>
                    </div>
                <?php elseif($i == 4 ) : ?>
                    <!-- /.col -->
                    <div class="col-sm-6">
                      <a class="example-image-link" data-lightbox="example-2" href="<?php echo base_url(); ?><?php echo $image; ?>">
                        <img class="img-fluid mb-3" src="<?php echo base_url(); ?><?php echo $image; ?>" alt="Photo">
                      </a>
                <?php elseif($i == 5 ) : ?>
                      <a class="example-image-link" data-lightbox="example-2" href="<?php echo base_url(); ?><?php echo $image; ?>">
                        <img class="img-fluid mb-3" src="<?php echo base_url(); ?><?php echo $image; ?>" alt="Photo">
                      </a>
                    </div>
                    <!-- /.col -->
                    
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.col -->
              <?php else: ?>
                <a class="example-image-link" data-lightbox="example-2" href="<?php echo base_url(); ?><?php echo $image; ?>"></a>
              <?php endif; ?>
              <?php $i++; ?>
              <?php endforeach; ?>
              <?php if($i == 2) : ?>
                <!-- </div> -->
              <?php elseif($i == 3) : ?>
                  </div>
                </div>
              </div>
              <?php elseif($i == 4) : ?>
                </div>
              </div>
              <?php elseif($i == 5 ) : ?>
                  </div>
                </div>
              </div>
              <?php endif; ?>
              </div>
              
              <!-- /.row -->
            </div>
            <!-- /.post -->
          </div>
        </div>
      </div>
      <?php endif; ?>

      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <?php if($hotel_user_data->user_logo) : ?>
              <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url(); ?><?php echo $hotel_user_data->user_logo; ?>" alt="User profile picture">
              <?php else: ?>
              <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url(); ?>theme/dist/img/boxed-bg.jpg" alt="User profile picture">
              <?php endif; ?>
            </div>

            <h3 class="profile-username text-center"><?php echo $hotel_user_data->name; ?></h3>

            <p class="text-muted text-center"><?php echo $hotel_user_data->entity; ?></p>

            <ul class="list-group list-group-unbordered mb-3">
              <!-- <li class="list-group-item">
                <b>Companies</b> <a class="float-right">1,322</a>
              </li>
              <li class="list-group-item">
                <b>Links Uploaded</b> <a class="float-right">543</a>
              </li>
              <li class="list-group-item">
                <b>Requests</b> <a class="float-right">13,287</a>
              </li> -->
            </ul>

            <hr>

            <strong><i class="fas fa-book mr-1"></i> Website</strong>

            <p class="text-muted">
              <a href="<?php echo $hotel_data->website ?>" target="_blank"><?php echo $hotel_data->website ?></a>
            </p> 

            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Headquarter</strong>

            <p class="text-muted"><?php echo $hotel_data->headquarter ?></p>


            <?php /* ?>
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
            <?php */ ?>
            <hr>
            <strong><i class="fas fa-pencil-alt mr-1"></i> Contact Person</strong>
            <p class="text-muted">
              <p class="tag tag-danger"><strong>Contact Name:</strong> <?php echo $hotel_data->contact_name ?></p>
              <p class="tag tag-danger"><strong>Contact Email:</strong> <a href="#"><?php echo $hotel_data->contact_email ?></a></p>
              <p class="tag tag-danger"><strong>Contact Number:</strong> <a href="#"><?php echo $hotel_data->contact_no ?></a></p>
            </p>
            <hr>

            <?php if($session->entity == 'Admin'): ?>
              <a href="<?php echo base_url() ?>hotel_branches?hotel_id=<?php echo $hotel_user_data->id ?>" class="btn btn-primary btn-block"><b>View Branches</b></a>
              <a href="<?php echo base_url() ?>links?hotel_id=<?php echo $hotel_user_data->id ?>" class="btn btn-primary btn-block"><b>Add Links</b></a>
            <?php else: ?>
              <a href="<?php echo base_url() ?>hotel_branches" class="btn btn-primary btn-block"><b>View Branches</b></a>
              <a href="<?php echo base_url() ?>links" class="btn btn-primary btn-block"><b>Add Links</b></a>
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
            <p class="text-muted"><?php echo $hotel_data->cover ?></p>
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
        
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Hotel Settings</a></li>
              <li class="nav-item"><a class="nav-link" href="#logo" data-toggle="tab">Logo Update</a></li>
              <li class="nav-item"><a class="nav-link" href="#amenities" data-toggle="tab">Amenities Settings</a></li>
              <li class="nav-item"><a class="nav-link" href="#gallery" data-toggle="tab">Gallery Settings</a></li>
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
                <?php if($this->session->flashdata('hotel_message')) : ?>
                  <div class="row">
                    <div class="col-12">
                      <div class="alert alert-success">
                        <?php  echo $this->session->flashdata("hotel_message"); ?>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                <form class="form-horizontal" action="<?php echo base_url(); ?>hotel_profile/update_hotel_details<?php echo ($session->entity == 'Admin') ? '?hotel_id='.$hotel_user_data->id : ''; ?>" method="post">
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Website</label>
                    <div class="col-sm-10">
                      <input type="text" name="website" id="website" class="form-control" placeholder="Website" value="<?php echo $hotel_data->website; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Headquarter</label>
                    <div class="col-sm-10">
                      <input type="text" name="headquarter" id="headquarter" class="form-control" placeholder="headquarter" value="<?php echo $hotel_data->headquarter; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputExperience" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                      <textarea rows="8" name="cover" id="cover" class="form-control" value="<?php echo $hotel_data->cover; ?>"><?php echo $hotel_data->cover; ?></textarea>
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
                <div class="tab-pane" id="logo">

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

                <div class="form-group row">
                  <label for="inputName" class="col-sm-2 col-form-label">Logo</label>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" id="upload" class="custom-file-input" name="logo" accept=".png,.jpg,.jpeg,.JPG">
                        <label class="custom-file-label" for="upload">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-danger upload-result">Submit</button>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="offset-sm-2 col-sm-5">
                    <div id="upload-demo" style="width:350px"></div>
                  </div>
                  <div class="col-sm-5">
                    <div id="upload-demo-i" style="background:#e1e1e1;width:300px;padding:50px;height:300px;margin-top:30px"></div>
                  </div>
                  <div class="offset-sm-2 col-sm-10">
                    <div class="text-center">
                      <form class="form-horizontal mt-5" action="<?php echo base_url(); ?>hotel_profile/save_logos<?php echo ($session->entity == 'Admin') ? '?hotel_id='.$hotel_user_data->id : ''; ?>" method="post" enctype="multipart/form-data">   
                        <input type="hidden" name="logo_url" id="logo_url" value="">
                        <button type="submit" class="btn btn-danger">Save Logo</button>
                      </form>   
                    </div>
                  </div>
                </div>

                <?php /* ?>
                <form class="form-horizontal mt-5" action="<?php echo base_url(); ?>hotel_profile/upload_logo<?php echo ($session->entity == 'Admin') ? '?hotel_id='.$hotel_user_data->id : ''; ?>" method="post" enctype="multipart/form-data">

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
                <?php */ ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="amenities">
                <?php if(!empty(validation_errors())) : ?>
                  <div class="row">
                    <div class="col-12">
                      <div class="alert alert-danger">
                        <?php echo validation_errors(); ?>
                      </div>    
                    </div>
                  </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('amenities_message')) : ?>
                  <div class="row">
                    <div class="col-12">
                      <div class="alert alert-success">
                        <?php  echo $this->session->flashdata("amenities_message"); ?>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('amenities_error_message')) : ?>
                  <div class="row">
                    <div class="col-12">
                      <div class="alert alert-danger">
                        <?php  echo $this->session->flashdata("amenities_error_message"); ?>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                <form class="form-horizontal" action="<?php echo base_url(); ?>hotel_profile/update_amenities<?php echo ($session->entity == 'Admin') ? '?hotel_id='.$hotel_user_data->id : ''; ?>" method="post">
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Amenities</label>
                    <div class="col-sm-10">
                      <div class="row">
                        <?php foreach ($amenities_general_data as $amenity) : ?>
                          <div class="col-sm-6">
                            <div class="form-group clearfix">
                              <div class="icheck-primary d-inline">
                                <?php $is_exists = in_array($amenity['name'], $amenities_data); ?>
                                <input type="checkbox" name="amenities[]" value="<?php echo $amenity['name']; ?>" id="<?php echo $amenity['icon']; ?>" <?php echo ($is_exists) ? 'checked' : ''; ?>>
                                <label for="<?php echo $amenity['icon']; ?>">
                                  <i class="material-icons"><?php echo $amenity['icon']; ?></i> <span><?php echo $amenity['name']; ?></span> 
                                </label>
                              </div>
                            </div>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>

                <hr>
                <h4>Nearby Places</h4>
                <?php if(!empty(validation_errors())) : ?>
                  <div class="row">
                    <div class="col-12">
                      <div class="alert alert-danger">
                        <?php echo validation_errors(); ?>
                      </div>    
                    </div>
                  </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('nearby_message')) : ?>
                  <div class="row">
                    <div class="col-12">
                      <div class="alert alert-success">
                        <?php  echo $this->session->flashdata("nearby_message"); ?>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('nearby_error_message')) : ?>
                  <div class="row">
                    <div class="col-12">
                      <div class="alert alert-danger">
                        <?php  echo $this->session->flashdata("nearby_error_message"); ?>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                <form class="form-horizontal" action="<?php echo base_url(); ?>hotel_profile/update_nearby<?php echo ($session->entity == 'Admin') ? '?hotel_id='.$hotel_user_data->id : ''; ?>" method="post">
                  <div class="add-nearby-wrap-main">
                    <?php if(empty($nearby_data)) : ?>
                    <div class="form-group row add-nearby-wrap add-nearby-1">
                      <label for="inputName" class="col-sm-2 col-form-label">Nearby</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="Nearby Place" name="nearby[]" id="nearby" value="">
                      </div>
                      <div class="col-sm-3">
                        <div class="margin">
                          <a class="btn btn-success btn-sm add-new-field">
                            <i class="fas fa-plus"></i> Add
                          </a>
                        </div>
                      </div>
                    </div>
                    <?php else: ?>
                      <?php $i = 1; ?>
                      <?php foreach ($nearby_data as $nearby_val) : ?>
                        <div class="form-group row add-nearby-wrap add-nearby-1">
                          <label for="inputName" class="col-sm-2 col-form-label">Nearby</label>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" placeholder="Nearby Place" name="nearby[]" id="nearby" value="<?php echo $nearby_val; ?>">
                          </div>
                          <div class="col-sm-3">
                            <div class="margin">
                              <a class="btn btn-success btn-sm add-new-field">
                                <i class="fas fa-plus"></i> Add
                              </a>
                              <?php if($i > 1) : ?>
                                <a class="btn btn-danger btn-sm remove-new-field remove-something-cust">
                                  <i class="fas fa-minus"></i> Remove
                                </a>
                              <?php endif; ?>
                            </div>
                          </div>
                        </div>
                        <?php $i++; ?>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
                <hr>
                <h4>Nearby Restaurants</h4>
                <?php if(!empty(validation_errors())) : ?>
                  <div class="row">
                    <div class="col-12">
                      <div class="alert alert-danger">
                        <?php echo validation_errors(); ?>
                      </div>    
                    </div>
                  </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('restaurants_message')) : ?>
                  <div class="row">
                    <div class="col-12">
                      <div class="alert alert-success">
                        <?php  echo $this->session->flashdata("restaurants_message"); ?>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('nearby_error_message')) : ?>
                  <div class="row">
                    <div class="col-12">
                      <div class="alert alert-danger">
                        <?php  echo $this->session->flashdata("nearby_error_message"); ?>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                <form class="form-horizontal" action="<?php echo base_url(); ?>hotel_profile/update_nearby_rest<?php echo ($session->entity == 'Admin') ? '?hotel_id='.$hotel_user_data->id : ''; ?>" method="post">
                  <div class="add-restaurants-wrap-main">
                    <?php if(empty($restaurants_data)) : ?>
                    <div class="form-group row add-restaurants-wrap add-restaurants-1">
                      <label for="inputName" class="col-sm-2 col-form-label">Restaurants</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="Restaurants" name="restaurants[]" id="restaurants" value="">
                      </div>
                      <div class="col-sm-3">
                        <div class="margin">
                          <a class="btn btn-success btn-sm add-new-restaurants">
                            <i class="fas fa-plus"></i> Add
                          </a>
                        </div>
                      </div>
                    </div>
                    <?php else: ?>
                      <?php $i = 1; ?>
                      <?php foreach ($restaurants_data as $restaurants_val) : ?>
                        <div class="form-group row add-restaurants-wrap add-restaurants-1">
                          <label for="inputName" class="col-sm-2 col-form-label">Restaurants</label>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" placeholder="Restaurants" name="restaurants[]" id="restaurants" value="<?php echo $restaurants_val; ?>">
                          </div>
                          <div class="col-sm-3">
                            <div class="margin">
                              <a class="btn btn-success btn-sm add-new-restaurants">
                                <i class="fas fa-plus"></i> Add
                              </a>
                              <?php if($i > 1) : ?>
                                <a class="btn btn-danger btn-sm remove-new-restaurants remove-something-cust">
                                  <i class="fas fa-minus"></i> Remove
                                </a>
                              <?php endif; ?>
                            </div>
                          </div>
                        </div>
                        <?php $i++; ?>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="gallery">
                
                <?php if($this->session->flashdata('upload_gallery_message')) : ?>
                  <div class="row">
                    <div class="col-12">
                      <div class="alert alert-success">
                        <?php  echo $this->session->flashdata("upload_gallery_message"); ?>
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
                <form class="form-horizontal mt-5" action="<?php echo base_url(); ?>hotel_profile/upload_gallery<?php echo ($session->entity == 'Admin') ? '?hotel_id='.$hotel_user_data->id : ''; ?>" method="post" enctype="multipart/form-data">

                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Logo</label>
                    <div class="col-sm-10">
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="files" name='files[]' multiple="">
                          <label class="custom-file-label" for="files">Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-danger" id="file-submit">Submit</button>
                    </div>
                  </div>
                </form>

                <div class="row show-gallery-images" data-gallery-count="<?php echo count($gallery_data); ?>">
                  <?php if($gallery_data) : ?>
                    <?php $i = 0; ?>
                    <?php foreach ($gallery_data as $image) : ?>
                      <div class="col-sm-3 mt-4 remove-img-gallery-wrap-<?php echo $i; ?> ">
                        <div class="card"  style="width:210px;">
                          <div class="p-2">
                            <div class="card-tools text-right card-tools-cust-abs">
                              <button title="remove" type="button" class="btn btn-tool text-danger remove-img-gallery" data-img-id="<?php echo $i; ?>"><i class="fas fa-times"></i>
                              </button>
                            </div>
                            <a class="example-image-link" data-lightbox="example-1" href="<?php echo base_url(); ?><?php echo $image; ?>">
                            <img width="190px" src="<?php echo base_url(); ?><?php echo $image; ?>" alt="">
                            </a>
                            <!-- /.card-tools -->
                          </div>
                        </div>
                      </div>
                      <?php $i++; ?>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </div>
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
                <form class="form-horizontal" action="<?php echo base_url(); ?>hotel_profile/update_contact_details<?php echo ($session->entity == 'Admin') ? '?hotel_id='.$hotel_user_data->id : ''; ?>" method="post">
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Name" name="contact_name" id="contact_name" value="<?php echo $hotel_data->contact_name; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" placeholder="Email" name="contact_email" id="contact_email" value="<?php echo $hotel_data->contact_email; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Phone Number" name="contact_no" id="contact_no" value="<?php echo $hotel_data->contact_no; ?>">
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
                <form class="form-horizontal" action="<?php echo base_url(); ?>hotel_profile/update_user_details<?php echo ($session->entity == 'Admin') ? '?hotel_id='.$hotel_user_data->id : ''; ?>" method="post">
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="<?php echo $hotel_user_data->name; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Username" name="username" id="username" value="<?php echo $hotel_user_data->username; ?>" readonly disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="<?php echo $hotel_user_data->email; ?>" readonly disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Phone Number" name="phone_number" id="phone_number" value="<?php echo $hotel_user_data->phone_number; ?>">
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
                <form class="form-horizontal" action="<?php echo base_url(); ?>hotel_profile/update_user_details_password<?php echo ($session->entity == 'Admin') ? '?hotel_id='.$hotel_user_data->id : ''; ?>" method="post">
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
<script>
  jQuery(document).ready(function(){

    $('body').on('click','.add-new-field',function(){
      var nearbylen = $('.add-nearby-wrap').length;
      if(nearbylen <= 4) {
        var html = `
        <div class="form-group row add-nearby-wrap add-nearby-1">
          <label for="inputName" class="col-sm-2 col-form-label">Nearby</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" placeholder="Nearby Place" name="nearby[]" id="nearby" value="">
          </div>
          <div class="col-sm-3">
            <div class="margin">
              <a class="btn btn-success btn-sm add-new-field">
                <i class="fas fa-plus"></i> Add
              </a>
              <a class="btn btn-danger btn-sm remove-new-field remove-something-cust">
                <i class="fas fa-minus"></i> Remove
              </a>
            </div>
          </div>
        </div>
        `;
        $('.add-nearby-wrap-main').append(html);
      } 
    });

    $('body').on('click','.remove-new-field',function(){
      $(this).parents('.add-nearby-wrap').remove();
    });


    $('body').on('click','.add-new-restaurants',function(){
      var restaurantslen = $('.add-restaurants-wrap').length;
      if(restaurantslen <= 4) {
        var html = `
        <div class="form-group row add-restaurants-wrap add-restaurants-1">
          <label for="inputName" class="col-sm-2 col-form-label">Restaurants</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" placeholder="Restaurants" name="restaurants[]" id="restaurants" value="">
          </div>
          <div class="col-sm-3">
            <div class="margin">
              <a class="btn btn-success btn-sm add-new-restaurants">
                <i class="fas fa-plus"></i> Add
              </a>
              <a class="btn btn-danger btn-sm remove-new-restaurants remove-something-cust">
                <i class="fas fa-minus"></i> Remove
              </a>
            </div>
          </div>
        </div>
        `;
        $('.add-restaurants-wrap-main').append(html);
      } 
    });

    $('body').on('click','.remove-new-restaurants',function(){
      $(this).parents('.add-restaurants-wrap').remove();
    });

    $('body').on('click',"button[type = 'submit']#file-submit",function(e){
       var $fileUpload = $("input[type='file']#files");
       var max_upload = 15 - parseInt($('.show-gallery-images').data('gallery-count'));
       console.log(max_upload);
       // e.preventDefault();
       if (parseInt($fileUpload.get(0).files.length) > max_upload){
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'You can only allowed to upload a maximum of '+max_upload+' files!'
          });
          e.preventDefault();
       }
    });

    $('body').on('click','.remove-img-gallery',function(){
      var imgId = $(this).data('img-id');
      var hotel_id = '<?php echo $hotel_id; ?>';
      console.log(imgId);

      var url= "<?php echo base_url('hotel_profile/remove_image') ?>"; 
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          $.ajax({ 
            type: "POST", //send with post 
            url: url, 
            data: {'value':imgId, 'hotel_id':hotel_id}, 
            success:function(data){ 
              $('.show-gallery-images').html(data);
              toastr.success('Deleted Successfully');
            } 
          });
        }
      });
    });

  });
</script>

<script type="text/javascript">
$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 200,
        height: 200,
        type: 'circle'
    },
    boundary: {
        width: 300,
        height: 300
    }
});
     
$('#upload').on('change', function () { 
  var reader = new FileReader();
    reader.onload = function (e) {
      $uploadCrop.croppie('bind', {
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
          
    }
    reader.readAsDataURL(this.files[0]);
});
     
$('.upload-result').on('click', function (ev) {
  $uploadCrop.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (resp) {
     
    $.ajax({
      url: "<?php echo base_url() ?>hotel_profile/upload_logos<?php echo ($session->entity == 'Admin') ? '?company_id='.$hotel_user_data->id : ''; ?>",
      type: "POST",
      data: {"image":resp},
      success: function (data) {
        console.log(data);
        html = '<img src="<?php echo base_url(); ?>' + data + '" />';
        $("#upload-demo-i").html(html);
        $("#logo_url").val(data);

      }
    });
  });
});
    
</script>