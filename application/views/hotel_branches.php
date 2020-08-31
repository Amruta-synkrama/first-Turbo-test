<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Hotel Branches</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Hotel Branches</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-6">
                <h3>View Branches</h3>
              </div>
              <div class="col-6 text-right">
                <a href="<?php echo base_url(); ?>hotel_branch<?php echo ($session->entity == 'Admin') ? '?hotel_id='.$hotel_user_data->id : ''; ?>" class="btn btn-primary">Add new branch</a>
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
                  <?php if($session->entity == 'Admin') : ?>
                  <th>Status</th>
                  <?php endif; ?>
                  <th>Action</th>
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

                    <?php if($session->entity == 'Admin') : ?>
                    <td class="text-center">
                      <?php if($location->status != '2') : ?>  
                        <span class="badge badge-success">Active</span>
                      <?php else: ?>
                        <span class="badge badge-danger">Deleted</span>
                      <?php endif; ?>
                    </td>
                    <?php endif; ?>

                    <td class="project-actions">
                        <!-- <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a> -->
                        <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>hotel_branch?branch=<?php echo $location->id; ?><?php echo ($session->entity == 'Admin') ? '&hotel_id='.$hotel_user_data->id : ''; ?>">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <?php if($location->status != 2) : ?>
                        <a class="btn btn-danger btn-sm delete-something-cust" href="<?php echo base_url(); ?>hotel_branches/delete?delete_branch=<?php echo $location->id; ?><?php echo ($session->entity == 'Admin') ? '&hotel_id='.$hotel_user_data->id : ''; ?>">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                        <?php else: ?>
                        <a class="btn btn-success btn-sm activate-something-cust" href="<?php echo base_url(); ?>hotel_branches/activate?activate_branch=<?php echo $location->id; ?><?php echo ($session->entity == 'Admin') ? '&hotel_id='.$hotel_user_data->id : ''; ?>">
                            <i class="fas fa-check">
                            </i>
                            Activate
                        </a>
                        <?php endif; ?>
                    </td>
                  </tr>
                <?php endforeach;  ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Branch Name</th>
                  <th>Location</th>
                  <?php if($session->entity == 'Admin') : ?>
                  <th>Status</th>
                  <?php endif; ?>
                  <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>
