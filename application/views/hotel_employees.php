<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Hotel Employees</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Hotel Employees</li>
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
                <h3>View Hotel Employees</h3>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover projects">
              <thead>
                <tr>
                  <th>Employee Name</th>
                  <th>ID</th>
                  <th>Email</th>
                  <th>Hotel Name</th>
                  
                  <th>Status</th>
                  <th>Action</th>
                  <?php if($session->entity == 'Admin') : ?>
                  <?php endif; ?>
                </tr>
              </thead>
              <tbody>
                <!-- <pre>
                <?php //print_r($hotels_data); ?>
                </pre> -->
                <?php foreach ($hotels_emp_data as $hotel_emp) :?>
                  <tr>
                    <td>
                      <a href="<?php echo base_url(); ?>hotel_employee_profile?emp_id=<?php echo $hotel_emp->user_id; ?>">
                        <ul class="list-inline">
                          <li class="list-inline-item">
                            <?php if($hotel_emp->user_logo) : ?>
                              <img alt="Avatar" width="80px" class="table-avatar img-circle elevation-2" src="<?php echo base_url(); ?><?php echo $hotel_emp->user_logo; ?>">
                            <?php else: ?>
                              <img alt="Avatar" width="80px" class="table-avatar img-circle elevation-2" src="<?php echo base_url(); ?>theme/dist/img/boxed-bg.jpg">
                            <?php endif; ?>
                            <span class="ml-2"><?php echo $hotel_emp->name; ?></span>
                          </li>
                        </ul>
                      </a>
                    </td>
                    <td><?php echo $hotel_emp->emp_id; ?></td>
                    <td><?php echo $hotel_emp->email; ?></td>
                    <td><?php echo $hotel_emp->hotel_name; ?></td>
                      
                    <td  class="text-center">
                      <?php if($hotel_emp->status != '2' ) : ?>
                      <span class="badge badge-success">Active</span>
                      <?php else: ?>
                      <span class="badge badge-danger">Deactivate</span>
                      <?php endif; ?>
                    </td>
                    <td class="project-actions">
                      <?php /* if($session->entity == 'RFP') : ?>
                        <a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>request_link?hotel_emp_id=<?php echo $hotel_emp->user_id; ?>">
                            <i class="fas fa-link">
                            </i>
                            Request Link
                        </a>
                      <?php endif; */ ?>
                        <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>hotel_employee_profile?emp_id=<?php echo $hotel_emp->user_id; ?>">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <?php if($hotel_emp->status != '2' ) : ?>
                        <a class="btn btn-danger btn-sm delete-something-cust" href="<?php echo base_url(); ?>hotel_employees/delete?delete_request=<?php echo $hotel_emp->user_id; ?>">
                            <i class="fas fa-times">
                            </i>
                            Deactivate
                        </a>
                        <?php else: ?>
                        <a class="btn btn-success btn-sm activate-something-cust" href="<?php echo base_url(); ?>hotel_employees/activate?activate_request=<?php echo $hotel_emp->user_id; ?>">
                            <i class="fas fa-check">
                            </i>
                            Activate
                        </a>
                        <?php endif; ?>
                    </td>
                    <?php if($session->entity == 'Admin') : ?>
                      <?php endif; ?>
                  </tr>
                <?php endforeach;   ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Employee Name</th>
                  <th>ID</th>
                  <th>Email</th>
                  <th>Hotel Name</th>
                  
                  <th>Status</th>
                  <th>Action</th>
                  <?php if($session->entity == 'Admin') : ?>
                  <?php endif; ?>
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
