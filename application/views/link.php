<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Link</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Link</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<form action="<?php echo base_url(); ?>link/validation<?php echo ($link_id) ? '?link_id='.$link_id : ''; ?>" method="post">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Link</h3>
                </div>
                <div class="card-body">
                    <?php if(!empty(validation_errors())) : ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger">
                                    <?= validation_errors(); ?>
                                </div>      
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php //print_r($links_data); ?>
                    <div class="form-group">
                        <label for="inputName">Company Name</label>
                        <select class="form-control custom-select select2"  name="company_id" id="company_id" <?= ($link_id && ($links_data[0]->link_status == '0' || $links_data[0]->link_status == '1')) ? 'disabled' : '';  ?>>
                            <option selected disabled>Select one</option>
                            <?php foreach ($companies_data as $company) : ?>
                                <option <?php echo ($link_id && $links_data[0]->company_id == $company->user_id) ? 'selected' : ''; ?> value="<?= $company->user_id ?>"><?= $company->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">Location</label>
                        <select class="form-control custom-select select2"  name="hotel_location_id" id="hotel_location_id" <?= ($link_id && ($links_data[0]->link_status == '0' || $links_data[0]->link_status == '1')) ? 'disabled' : '';  ?>>
                            <option selected disabled>Select one</option>
                            <?php foreach ($hotel_locations as $location) : ?>
                                <option <?php echo ($link_id && $links_data[0]->hotel_location_id == $location->id) ? 'selected' : ''; ?> value="<?= $location->id ?>"><?= $location->LOCATION ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputName">URL</label>
                        <input type="text" name="url" id="url" class="form-control" value="<?= ($link_id) ? $links_data[0]->url : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputName">Expiry Date</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" name="expiration_date" id="expiration_date" class="form-control datetimepicker-input" data-target="#reservationdate" value="<?= ($link_id) ? date('m-d-Y',strtotime($links_data[0]->expiration_date)) : ''; ?>"/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        <!-- <input type="text" name="expiration_date" id="expiration_date" class="form-control" value="<?= ($link_id) ? $links_data[0]->expiration_date : ''; ?>"> -->
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <div class="row pb-5">
        <div class="col-12">
        	<?php if($link_id && $links_data[0]->link_status != '3') : ?>
	        	<a class="btn btn-danger reject-something-cust" href="<?php echo base_url(); ?>links/reject?reject_request=<?= $link_id; ?>">Reject</a>
	        <?php endif; ?>
            <input type="submit" value="<?php echo ($link_id) ? 'Update Link' : 'Create new Link'; ?>" class="btn btn-success float-right">
        </div>
    </div>
</form>
</section>
<!-- /.content