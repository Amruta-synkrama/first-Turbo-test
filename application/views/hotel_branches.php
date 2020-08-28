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
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- <pre>
                <?php //print_r($hotel_locations); ?>
                </pre> -->
                <?php foreach ($hotel_locations as $location) :?>
                  <tr>
                    <td><?= $location->branch_name; ?></td>
                    <td><?= $location->LOCATION; ?>, <?= $location->STATE_NAME; ?></td>
                    <td class="project-actions text-right">
                        <!-- <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a> -->
                        <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>hotel_branch?branch=<?= $location->id; ?><?php echo ($session->entity == 'Admin') ? '&hotel_id='.$hotel_user_data->id : ''; ?>">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm delete-something-cust" href="<?php echo base_url(); ?>hotel_branches/delete?delete_branch=<?= $location->id; ?>">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                    </td>
                  </tr>
                <?php endforeach;  ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Branch Name</th>
                  <th>Location</th>
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
