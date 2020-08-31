<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Hotels</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Hotels</li>
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
                <h3>View Hotels</h3>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Hotel Name</th>
                  <th>Location</th>
                  <th>Email</th>
                  <th>Website</th>
                  <?php if($session->entity == 'Admin') : ?>
                  <th>Status</th>
                  <th>Action</th>
                  <?php endif; ?>
                </tr>
              </thead>
              <tbody>
                <!-- <pre>
                <?php //print_r($hotels_data); ?>
                </pre> -->
                <?php foreach ($hotels_data as $hotel) :?>
                  <tr>
                    <td><a href="<?php echo base_url(); ?>hotel?id=<?php echo $hotel->user_id; ?>"><?php echo $hotel->name; ?></a></td>
                    <td><?php echo $hotel->headquater; ?></td>
                    <td><?php echo $hotel->email; ?></td>
                    <td><?php echo $hotel->website; ?></td>
                      <?php if($session->entity == 'Admin') : ?>
                    <td  class="text-center">
                      <?php if($hotel->status != '2' ) : ?>
                      <span class="badge badge-success">Active</span>
                      <?php else: ?>
                      <span class="badge badge-danger">Deactivate</span>
                      <?php endif; ?>
                    </td>
                    <td class="project-actions">
                      <?php /* if($session->entity == 'RFP') : ?>
                        <a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>request_link?hotel_id=<?php echo $hotel->user_id; ?>">
                            <i class="fas fa-link">
                            </i>
                            Request Link
                        </a>
                      <?php endif; */ ?>
                        <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>hotel_profile?hotel_id=<?php echo $hotel->user_id; ?>">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <?php if($hotel->status != '2' ) : ?>
                        <a class="btn btn-danger btn-sm delete-something-cust" href="<?php echo base_url(); ?>hotels/delete?delete_request=<?php echo $hotel->user_id; ?>">
                            <i class="fas fa-times">
                            </i>
                            Deactivate
                        </a>
                        <?php else: ?>
                        <a class="btn btn-success btn-sm activate-something-cust" href="<?php echo base_url(); ?>hotels/activate?activate_request=<?php echo $hotel->user_id; ?>">
                            <i class="fas fa-check">
                            </i>
                            Activate
                        </a>
                        <?php endif; ?>
                    </td>
                      <?php endif; ?>
                  </tr>
                <?php endforeach;   ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Hotel Name</th>
                  <th>Location</th>
                  <th>Email</th>
                  <th>Website</th>
                  <?php if($session->entity == 'Admin') : ?>
                  <th>Status</th>
                  <th>Action</th>
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
