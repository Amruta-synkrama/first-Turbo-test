<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Admins</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Admins</li>
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
                <h3>View Admins</h3>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Admin Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- <pre>
                <?php //print_r($admins_data); ?>
                </pre> -->
                <?php foreach ($admins_data as $admin) :?>
                  <tr>
                    <td>
                    	<!-- <a href="<?php //echo base_url(); ?>admin?id=<?php //echo $admin->id; ?>"> -->
                    		<?php echo $admin->name; ?>
                    	<!-- </a> -->
                    </td>
                    <td><?php echo $admin->email; ?></td>
                    <td><?php echo $admin->phone_number; ?></td>
                    <td  class="text-center">
                      <?php if($admin->status != '2' ) : ?>
                      <span class="badge badge-success">Active</span>
                      <?php else: ?>
                      <span class="badge badge-danger">Deactivate</span>
                      <?php endif; ?>
                    </td>
                    <td class="project-actions text-center">
                    	<?php /* ?>
                        <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>hotel_profile?hotel_id=<?php echo $admin->id; ?>">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <?php */ ?>
                        <?php if($admin->status != '2' ) : ?>
                        <a class="btn btn-danger btn-sm delete-something-cust" href="<?php echo base_url(); ?>admins/delete?delete_request=<?php echo $admin->id; ?>">
                            <i class="fas fa-times">
                            </i>
                            Deactivate
                        </a>
                        <?php else: ?>
                        <a class="btn btn-success btn-sm activate-something-cust" href="<?php echo base_url(); ?>admins/activate?activate_request=<?php echo $admin->id; ?>">
                            <i class="fas fa-check">
                            </i>
                            Activate
                        </a>
                        <?php endif; ?>
                    </td>
                  </tr>
                <?php endforeach;   ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Hotel Name</th>
                  <th>Location</th>
                  <th>Email</th>
                  <th>Status</th>
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
