<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Enquiries Data</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Enquiries Data</li>
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
                <h3>View Enquiries</h3>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover projects">
              <thead>
                <tr>
                  <th>Form Name</th>
                  <!-- <th>Count</th> -->
                </tr>
              </thead>
              <tbody>
                <tr>
                	<td><a href="<?php echo base_url() ?>enquiry_data/list?form_id=16053">Business Travel Solutions</a></td>
                	<!-- <td></td> -->
                </tr>
                <tr>
                	<td><a href="<?php echo base_url() ?>enquiry_data/list?form_id=16031">Hotels & Restaurants Seeking Growth</a></td>
                	<!-- <td></td> -->
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <th>Form Name</th>
                  <!-- <th>Count</th> -->
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
