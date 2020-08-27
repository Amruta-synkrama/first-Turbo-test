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
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- <pre>
                <?php //print_r($hotels_data); ?>
                </pre> -->
                <?php foreach ($hotels_data as $hotel) :?>
                  <tr>
                    <td><a href="<?php echo base_url(); ?>hotel?id=<?= $hotel->user_id; ?>"><?= $hotel->name; ?></a></td>
                    <td><?= $hotel->headquater; ?></td>
                    <td><?= $hotel->email; ?></td>
                    <td><?= $hotel->website; ?></td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="<?php echo base_url(); ?>request_link?hotel_id=<?= $hotel->user_id; ?>">
                            <i class="fas fa-link">
                            </i>
                            Request Link
                        </a>
                    </td>
                  </tr>
                <?php endforeach;   ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Hotel Name</th>
                  <th>Location</th>
                  <th>Email</th>
                  <th>Website</th>
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
