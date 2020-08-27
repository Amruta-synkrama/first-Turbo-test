<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Request Link</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Request Link</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<form action="<?php echo base_url(); ?>request_link/validation<?php echo ($link_id) ? '?link_id='.$link_id : ''; ?>" method="post">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Request Link</h3>
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
                        <label for="inputName">Hotel Name</label>
                        <input type="hidden" name="company_id" id="company_id" value="<?= $session->id ?>">
                        <input type="text" name="hotel_name" id="company_name" class="form-control" disabled="" readonly="" value="<?= $hotel_user->name ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">Location</label>
                        <select class="form-control custom-select select2"  name="hotel_location_id" id="hotel_location_id" <?= ($link_id && $links_data[0]->status == '0') ? 'disabled' : '';  ?>>
                            <option selected disabled>Select one</option>
                            <?php foreach ($hotel_locations as $location) : ?>
                                <option <?php echo ($link_id && $links_data[0]->hotel_location_id == $location->id) ? 'selected' : ''; ?> value="<?= $location->id ?>"><?= $location->LOCATION ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <div class="row pb-5">
        <div class="col-12">
            <input type="submit" value="<?php echo ($link_id) ? 'Update Link' : 'Create new Link'; ?>" class="btn btn-success float-right">
        </div>
    </div>
</form>
</section>
<!-- /.content