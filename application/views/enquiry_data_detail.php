<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Enquiry</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Enquiry</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title mt-2">Enquiry</h3>
                    <div class="text-right">
                    <?php if($contact_data->status != '1' ) : ?>
                      <a class="btn btn-success add-something-cust" href="<?php echo base_url(); ?>enquiry_data/show_meter?enquiry_id=<?php echo $contact_data->id; ?>&form_id=<?php echo $_GET['form_id']; ?>" title="Add to meter">
                          <i class="fas fa-check">
                          </i>
                          Add to meter
                      </a>
                    <?php else: ?>
                      <a class="btn btn-success remove-something-cust" href="<?php echo base_url(); ?>enquiry_data/remove_meter?enquiry_id=<?php echo $contact_data->id; ?>&form_id=<?php echo $_GET['form_id']; ?>" title="Remove from meter">
                          <i class="fa fa-times">
                          </i>
                          Remove from meter
                      </a>
                    <?php endif; ?>
                    <a class="btn btn-danger reject-something-cust" href="<?php echo base_url(); ?>links/reject?reject_request=<?php echo $_GET['enquiry_id']; ?>&form_id=<?php echo $_GET['form_id']; ?>" title="Delete Entry">Delete</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php $contact_form = unserialize($contact_data->form_data); ?>
                    <?php foreach ($contact_form as $key => $value) : ?>
                      <div class="row mt-2">
                        <div class="col-md-4"><strong><?php echo $key; ?></strong></div>
                        <div class="col-md-8">
                            <?php if(is_array($value)) : ?>
                                    <ul>
                                <?php foreach ($value as $value1) : ?>
                                        <li><?php echo $value1; ?></li>
                                <?php endforeach ?>
                                    </ul>
                            <?php else: ?>
                            <p class="text-muted"><?php echo $value; ?></p>
                            <?php endif; ?>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  <!-- <hr> -->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <div class="row pb-5">
        <div class="col-6">
            <?php if($contact_data->status != '1' ) : ?>
              <a class="btn btn-success add-something-cust" href="<?php echo base_url(); ?>enquiry_data/show_meter?enquiry_id=<?php echo $contact_data->id; ?>&form_id=<?php echo $_GET['form_id']; ?>" title="Add to meter">
                  <i class="fas fa-check">
                  </i>
                  Add to meter
              </a>
            <?php else: ?>
              <a class="btn btn-success remove-something-cust" href="<?php echo base_url(); ?>enquiry_data/remove_meter?enquiry_id=<?php echo $contact_data->id; ?>&form_id=<?php echo $_GET['form_id']; ?>" title="Remove from meter">
                  <i class="fa fa-times">
                  </i>
                  Remove from meter
              </a>
            <?php endif; ?>
        </div>
        <div class="col-6 text-right">
	        <a class="btn btn-danger reject-something-cust" href="<?php echo base_url(); ?>links/reject?reject_request=<?php echo $_GET['enquiry_id']; ?>&form_id=<?php echo $_GET['form_id']; ?>" title="Delete Entry">Delete</a>
        </div>
    </div>
</section>