<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Hotel Branch</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Hotel Branch</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<form action="<?php echo base_url(); ?>hotel_branch/validation<?php echo ($branch_id) ? '?branch='.$branch_id : ''; ?>" method="post">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Hotel Branch</h3>
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
                    <?php //print_r($hotel_locations); ?>
                    <div class="form-group">
                        <label for="inputName">Branch Name</label>
                        <input type="text" name="branch_name" id="branch_name" class="form-control" value="<?= ($branch_id) ? $hotel_locations[0]->branch_name : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">State</label>
                        <select class="form-control custom-select select2" name="state_id" id="state_id">
                            <option selected disabled>Select one</option>
                            <?php foreach ($state_data as $state) : ?>
                                <option <?php echo ($branch_id && $hotel_locations[0]->ID_STATE == $state->ID) ? 'selected' : ''; ?> value="<?= $state->ID ?>"><?= $state->STATE_NAME ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">City</label>
                        <select class="form-control custom-select select2"  name="location_id" id="location_id">
                            <option selected disabled>Select one</option>
                            <?php foreach ($location_data as $location) : ?>
                                <option <?php echo ($branch_id &&$hotel_locations[0]->location_id == $location->ID) ? 'selected' : ''; ?> value="<?= $location->ID ?>"><?= $location->LOCATION ?></option>
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
            <input type="submit" value="<?php echo ($branch_id) ? 'Update Branch' : 'Create new Branch'; ?>" class="btn btn-success float-right">
        </div>
    </div>
</form>
</section>
<!-- /.content -->