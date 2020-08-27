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
								<?php if($session->entity == 'RFP') : ?>
									<a href="<?php echo base_url(); ?>hotels" class="btn btn-primary">Request new link</a>
									<?php else: ?>
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
										<th>Hotel</th>
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
										    <td><a target="_blank" href="<?php echo base_url(); ?>company?id=<?= $link->company_id; ?>"><?= $link->company_name; ?></a></td>

										    <td><?= $link->branch_name; ?></td>

										    <td><?= $link->LOCATION; ?>, <?= $link->STATE_NAME; ?></td>

										    <?php if($link->link_status != '3' && $link->link_status != '0') : ?>
										        <?php if($is_expire) : ?>
										            <td><a href="<?= base_url(); ?>404" target="_blank">Expired</a></td>
										        <?php else: ?>
										            <td><a href="<?= $link->url; ?>" target="_blank"><?= $link->url; ?></a></td>
										        <?php endif; ?>
										    <?php else: ?>
										            <td> - </td>
										    <?php endif; ?>

										    <?php if($link->expiration_date) : ?>
										        <td><?= $expiry_date; ?></td>
										    <?php else: ?>
										            <td> - </td>
										    <?php endif; ?>

										    <td>
										        <?php if($link->link_status == '0' || $link->link_status == '1') : ?>
										                <span class="badge badge-warning">Requested</span>
										        <?php elseif(!$is_expire) : ?>
										            <?php if($link->link_status == '2') : ?>
										                <span class="badge badge-success">Added</span>
										            <?php elseif($link->link_status == '3') : ?>
										                <span class="badge badge-danger">Rejected</span>
										            <?php endif; ?>
										        <?php else: ?>
										                <span class="badge badge-danger">Expired</span>
										        <?php endif; ?>
										    </td>

										    <?php if($session->entity != 'RFP') : ?>
										        <td class="project-actions text-right">
										            <?php if(! $is_expire ) : ?>
										                <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>link?link_id=<?= $link->id; ?>">
										                    <i class="fas fa-pencil-alt">
										                    </i>
										                    Edit
										                </a>
										                <?php if($link->link_status != '3') : ?>
										                    <a class="btn btn-danger btn-sm reject-something-cust" href="<?php echo base_url(); ?>links/reject?reject_request=<?= $link->id; ?>">
										                        <i class="fas fa-times">
										                        </i>
										                        Reject
										                    </a>
										                <?php endif; ?>
										            <?php endif; ?>
										        </td>
										    <?php endif; ?>
										</tr>
									<?php endforeach;   ?>
								</tbody>
								<tfoot>
									<tr>
										<th>Company Name</th>
										<th>Hotel</th>
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
