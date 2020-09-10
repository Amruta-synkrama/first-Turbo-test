<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Links</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Links</li>
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
								<h3>View Links</h3>
							</div>
							<div class="col-6 text-right">
								<?php if($session->entity == 'Admin') : ?>
									<?php if($this->input->get('hotel_id')) : ?>
										<a href="<?php echo base_url(); ?>link<?php echo ($session->entity == 'Admin') ? '?hotel_id='.$hotel_data->user_id : ''; ?>" class="btn btn-primary">Add new link</a>
									<?php endif; ?>
									<?php elseif($session->entity == 'Hotel') : ?>
										<a href="<?php echo base_url(); ?>link" class="btn btn-primary">Add new link</a>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Company Name</th>
										<th>Hotel Branch</th>
										<th>Location</th>
										<th>Link</th>
										<th>Expiry Date</th>
										<th>Status</th>
										<?php if($session->entity != 'RFP') : ?>
											<th>Action</th>
										<?php endif; ?>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($links_data as $link) :?>
										<?php 
										$is_expire = false;
										if($link->expiration_date) :
										    $expiry_date = date('Y-m-d',strtotime($link->expiration_date));
										    $today = date('Y-m-d');
										    if($today > $expiry_date) : 
										        $is_expire = true;
										    endif;
										endif;
										?>
										<tr>
										    <td><a target="_blank" href="<?php echo base_url(); ?>company?id=<?php echo $link->company_id; ?>"><?php echo $link->company_name; ?></a></td>

										    <td><?php echo $link->branch_name; ?></td>

										    <td><?php echo $link->LOCATION; ?>, <?php echo $link->STATE_NAME; ?></td>

										    <?php /* if($link->link_status != '3' && $link->link_status != '0') : */ ?>
										        <?php if($is_expire) : ?>
										            <td><a href="<?php echo base_url(); ?>404" target="_blank">Expired</a></td>
										        <?php else: ?>
										            <td><a href="<?php echo $link->url; ?>" target="_blank"><?php echo $link->url; ?></a></td>
										        <?php endif; ?>
										    <?php /* else: ?>
										            <td> - </td>
										    <?php endif; */ ?>

										    <?php if($link->expiration_date) : ?>
										        <td><?php echo $expiry_date; ?></td>
										    <?php else: ?>
										            <td> - </td>
										    <?php endif; ?>

										    <td class="text-center">
										    	<?php if($link->status != 2) : ?>
											    	<?php if(!$is_expire) : ?>
											    		<span class="badge badge-success">Active</span>
											    	<?php else : ?>
											    		<span class="badge badge-danger">Expired</span>
											    	<?php endif; ?>
										    	<?php else: ?>
										    		<span class="badge badge-danger">Deleted</span>
										    	<?php endif; ?>
										        <?php /*if($link->link_status == '0' || $link->link_status == '1') : ?>
										                <span class="badge badge-warning">Requested</span>
										        <?php elseif(!$is_expire) : ?>
										            <?php if($link->link_status == '2') : ?>
										                <span class="badge badge-success">Added</span>
										            <?php elseif($link->link_status == '3') : ?>
										                <span class="badge badge-danger">Rejected</span>
										            <?php endif; ?>
										        <?php else: ?>
										                <span class="badge badge-danger">Expired</span>
										        <?php endif;*/ ?>
										    </td>

										    <?php if($session->entity != 'RFP') : ?>
										        <td class="project-actions">
										            
										                <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>link?link_id=<?php echo $link->id; ?><?php echo ($session->entity == 'Admin') ? '&hotel_id='.$link->hotel_id : ''; ?>">
										                    <i class="fas fa-pencil-alt">
										                    </i>
										                    Edit
										                </a>
										                <?php if($link->status != 2) : ?>
									                    <a class="btn btn-danger btn-sm delete-something-cust" href="<?php echo base_url(); ?>links/delete?delete_request=<?php echo $link->id; ?><?php echo ($session->entity == 'Admin') ? '&hotel_id='.$link->hotel_id : ''; ?>">
									                        <i class="fas fa-times">
									                        </i>
									                        Delete
									                    </a>
									                    <?php else: ?>
									                    	<a class="btn btn-success btn-sm activate-something-cust" href="<?php echo base_url(); ?>links/activate?activate_request=<?php echo $link->id; ?><?php echo ($session->entity == 'Admin') ? '&hotel_id='.$link->hotel_id : ''; ?>">
									                        <i class="fas fa-check">
									                        </i>
									                        Activate
									                    	</a>
									                	<?php endif; ?>
									                <?php /*if(! $is_expire ) : ?>
										            <?php endif; */ ?>
										        </td>
										    <?php endif; ?>
										</tr>
									<?php endforeach;   ?>
								</tbody>
								<tfoot>
									<tr>
										<th>Company Name</th>
										<th>Hotel Branch</th>
										<th>Location</th>
										<th>Link</th>
										<th>Expiry Date</th>
										<th>Status</th>
										<?php if($session->entity != 'RFP') : ?>
											<th>Action</th>
										<?php endif; ?>
									</tr>
								</tfoot>
							</table>
						</div>

					</div>

				</div>
			</div>
		</div>
	</section>
