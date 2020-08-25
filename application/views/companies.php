<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Companies</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Companies</li>
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
                <h3>View Companies</h3>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Company Name</th>
                  <th>Location</th>
                  <th>Email</th>
                  <th>Website</th>
                  <!-- <th>Action</th> -->
                </tr>
              </thead>
              <tbody>
                <!-- <pre>
                <?php //print_r($companies_data); ?>
                </pre> -->
                <?php foreach ($companies_data as $company) :?>
                  <tr>
                    <td><a href="<?php echo base_url(); ?>company?id=<?= $company->user_id; ?>"><?= $company->name; ?></a></td>
                    <td><?= $company->headquater; ?></td>
                    <td><?= $company->email; ?></td>
                    <td><?= $company->website; ?></td>
                    <!-- <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a>
                    </td> -->
                  </tr>
                <?php endforeach;   ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Company Name</th>
                  <th>Location</th>
                  <th>Email</th>
                  <th>Website</th>
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
  </div>
</section>
