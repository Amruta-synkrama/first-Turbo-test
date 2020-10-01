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
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($contact_data as $contact) :
                	$contact_form = unserialize($contact->form_data);
                	?>
                  <tr>
                    <td>
                    	<!-- <a href="<?php //echo base_url(); ?>admin?id=<?php //echo $admin->user_id; ?>"> -->
                        <ul class="list-inline">
                          <li class="list-inline-item">
                            <?php echo $contact_form['your-name']; ?>
                          </li>
                        </ul>
                      <!-- </a> -->
                    </td>
                    <td><?php echo $contact_form['your-email']; ?></td>
                    <td>
                    	<?php
                    	if(isset($contact_form['your-phone'])) {
                    	 	echo $contact_form['your-phone']; 
                    	} else {
                    		echo $contact_form['phone-number']; 
                    	}
                    	?>
                    </td>
                    <td  class="text-center">
                      <?php if($contact->status == '1' ) : ?>
                      <span class="badge badge-success">Added</span>
                      <?php else: ?>
                      <span class="badge badge-danger">Not Added</span>
                      <?php endif; ?>
                    </td>
                    <td class="project-actions">
                    	<a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>enquiry_data/view?form_id=<?php echo $_GET['form_id']; ?>&enquiry_id=<?php echo $contact->id; ?>">
                            <i class="fas fa-eye">
                            </i>
                            View
                        </a>
                        <?php if($contact->status != '1' ) : ?>
                          <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>enquiry_data/show_meter?enquiry_id=<?php echo $contact->id; ?>&form_id=<?php echo $_GET['form_id']; ?>">
                              <i class="fas fa-check">
                              </i>
                              Add
                          </a>
                        <?php else: ?>
                          <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>enquiry_data/remove_meter?enquiry_id=<?php echo $contact->id; ?>&form_id=<?php echo $_GET['form_id']; ?>">
                              <i class="fa fa-times">
                              </i>
                              Remove
                          </a>
                        <?php endif; ?>
                        <a class="btn btn-danger btn-sm delete-something-cust" href="<?php echo base_url(); ?>enquiry_data/delete?delete_request=<?php echo $contact->id; ?>&form_id=<?php echo $_GET['form_id']; ?>">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                    </td>
                  </tr>
                <?php endforeach;   ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
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
