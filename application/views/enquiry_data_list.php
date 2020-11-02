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
              <div class="col-6 text-right">
                <a href="<?php echo base_url(); ?>enquiry_data/export_csv_data?form_id=<?php echo $_GET['form_id']; ?>" class="btn btn-primary">Export CSV</a>
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
                    <td><?php
                      if(isset($contact_form['your-name'])) {
                        echo $contact_form['your-name']; 
                      } else {
                        echo $contact_form['your_name']; 
                      } ?>
                    </td>
                    <td><?php
                    if(isset($contact_form['your-email'])) {
                      echo $contact_form['your-email']; 
                    } else {
                      echo $contact_form['your_email']; 
                    }
                     ?></td>
                    <td>
                    	<?php
                    	if(isset($contact_form['your-phone'])) {
                    	 	echo $contact_form['your-phone']; 
                    	} elseif(isset($contact_form['phone-number'])) {
                    		echo $contact_form['phone-number']; 
                    	} elseif(isset($contact_form['your_phone'])) {
                        echo $contact_form['your_phone']; 
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
                    	<a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>enquiry_data/view?form_id=<?php echo $_GET['form_id']; ?>&enquiry_id=<?php echo $contact->id; ?>" title="View Details">
                            <i class="fas fa-eye">
                            </i>
                            View
                        </a>
                        <?php if($contact->status != '1' ) : ?>
                          <a class="btn btn-success btn-sm add-something-cust" href="<?php echo base_url(); ?>enquiry_data/show_meter?enquiry_id=<?php echo $contact->id; ?>&form_id=<?php echo $_GET['form_id']; ?>" title="Add to meter">
                              <i class="fas fa-check">
                              </i>
                              Add
                          </a>
                        <?php else: ?>
                          <a class="btn btn-success btn-sm remove-something-cust" href="<?php echo base_url(); ?>enquiry_data/remove_meter?enquiry_id=<?php echo $contact->id; ?>&form_id=<?php echo $_GET['form_id']; ?>" title="Remove from meter">
                              <i class="fa fa-times">
                              </i>
                              Remove
                          </a>
                        <?php endif; ?>
                        <a class="btn btn-danger btn-sm delete-something-cust" href="<?php echo base_url(); ?>enquiry_data/delete?delete_request=<?php echo $contact->id; ?>&form_id=<?php echo $_GET['form_id']; ?>" title="Delete Entry">
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
