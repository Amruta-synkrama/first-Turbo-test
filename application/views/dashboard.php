<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Welcome <?php echo $session->name; ?></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Dashboard</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="container">
		<div class="row">
			<?php if($session->entity == 'Hotel') : ?>
				<div class="col-sm-6 col-xs-6">
					<div class="info-box">
					  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
					  <div class="info-box-content">
					    <span class="info-box-number mx-auto">
					      <div class="text-center d-flex">
					      	<?php
					      	$invID = str_pad($room_count1, 5, '0', STR_PAD_LEFT);
					      	$invIDArray = str_split((string)$invID);
					      	?>
					      	<div class=" flip-box-cust flip-cust-box-1 bg-info-cust">
					      		<?php $i = 0; foreach ($invIDArray as $int) : ?>
					      			<ul class="flip secondPlay<?php echo ($i>0) ? $i : ''; ?>">
					      				<li>
					      					<a href="#">
					      						<div class="up">
					      							<div class="shadow"></div>
					      							<div class="inn">0</div>
					      						</div>
					      						<div class="down">
					      							<div class="shadow"></div>
					      							<div class="inn">0</div>
					      						</div>
					      					</a>
					      				</li>
					      				<li>
					      					<a href="#">
					      						<div class="up">
					      							<div class="shadow"></div>
					      							<div class="inn"><?php echo $int; ?></div>
					      						</div>
					      						<div class="down">
					      							<div class="shadow"></div>
					      							<div class="inn"><?php echo $int; ?></div>
					      						</div>
					      					</a>
					      				</li>
					      			</ul>
					      			<?php if($i == 1): ?>
					      				<ul class="flip1">
					      					<li>
					      						<span style="font-size:25px;">,</span>
					      					</li>
					      				</ul>
					      			<?php endif; ?>
					      			<?php $i++; ?>
					      		<?php endforeach; ?>
					      	</div>
					      </div>
					    </span>
					    <span class="info-box-text text-center mt-2">Rooms Booked</span>
					  </div>
					  <!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<div class="col-sm-6 col-xs-6">
					<div class="info-box">
					  <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-cog"></i></span>
					  <div class="info-box-content">
					    <span class="info-box-number mx-auto">
					      <div class="text-center d-flex">
					      	<?php
					      	$invID = str_pad($room_count2, 5, '0', STR_PAD_LEFT);
					      	$invIDArray = str_split((string)$invID);
					      	?>
					      	<div class=" flip-box-cust flip-cust-box-3 bg-danger-cust">
					      		<?php $i = 0; foreach ($invIDArray as $int) : ?>
					      			<ul class="flip secondPlay<?php echo ($i>0) ? $i : ''; ?>">
					      				<li>
					      					<a href="#">
					      						<div class="up">
					      							<div class="shadow"></div>
					      							<div class="inn">0</div>
					      						</div>
					      						<div class="down">
					      							<div class="shadow"></div>
					      							<div class="inn">0</div>
					      						</div>
					      					</a>
					      				</li>
					      				<li>
					      					<a href="#">
					      						<div class="up">
					      							<div class="shadow"></div>
					      							<div class="inn"><?php echo $int; ?></div>
					      						</div>
					      						<div class="down">
					      							<div class="shadow"></div>
					      							<div class="inn"><?php echo $int; ?></div>
					      						</div>
					      					</a>
					      				</li>
					      			</ul>
					      			<?php if($i == 1): ?>
					      				<ul class="flip1">
					      					<li>
					      						<span style="font-size:25px;">,</span>
					      					</li>
					      				</ul>
					      			<?php endif; ?>
					      			<?php $i++; ?>
					      		<?php endforeach; ?>
					      	</div>
					      </div>
					    </span>
					    <span class="info-box-text text-center mt-2">Average Room Price</span>
					  </div>
					  <!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
			<?php endif; ?>
		</div>
		<!-- Small Box (Stat card) -->
		<div class="row">
			<?php if($session->entity != 'Hotel' && $session->entity != 'Hotel_EMP') : ?>
				<div class="<?php echo ($session->entity != 'Admin') ? 'col-sm-6 col-xs-6' : 'col-sm-4 col-xs-4'; ?>">
					<!-- small card -->
					<div class="small-box bg-info">
						<div class="inner">
							<h3><?php echo $hotels_count[0]->count; ?></h3>
							<p>Hotels</p>
						</div>
						<div class="icon">
							<i class="fa fa-h-square"></i>
						</div>
						<a href="<?php echo base_url() ?>hotels" class="small-box-footer">
							More info <i class="fas fa-arrow-circle-right"></i>
						</a>
					</div>
				</div>
			<?php endif; ?>
			<!-- ./col -->
			<?php if($session->entity != 'RFP' && $session->entity != 'RFP_EMP') : ?>
				<div class="<?php echo ($session->entity != 'Admin') ? 'col-sm-6 col-xs-6' : 'col-sm-4 col-xs-4'; ?>">
					<!-- small card -->
					<div class="small-box bg-success">
						<div class="inner">
							<h3><?php echo $company_count[0]->count; ?></h3>

							<p>Companies</p>
						</div>
						<div class="icon">
							<i class="fa fa-building"></i>
						</div>
						<a href="<?php echo base_url() ?>companies" class="small-box-footer">
							More info <i class="fas fa-arrow-circle-right"></i>
						</a>
					</div>
				</div>
			<?php endif; ?>
			<!-- ./col -->
			<div class="<?php echo ($session->entity != 'Admin') ? 'col-sm-6 col-xs-6' : 'col-sm-4 col-xs-4'; ?>">
				<!-- small card -->
				<div class="small-box bg-danger">
					<div class="inner">
						<h3><?php echo $links_count[0]->count; ?></h3>

						<p>Links added</p>
					</div>
					<div class="icon">
						<i class="fa fa-link"></i>
					</div>
					<a href="<?php echo base_url() ?>links" class="small-box-footer">
						More info <i class="fas fa-arrow-circle-right"></i>
					</a>
				</div>
			</div>

			<!-- ./col -->
		</div>
		<!-- /.row -->
		<div class="row">
			<?php if($session->entity != 'Hotel' && $session->entity != 'Hotel_EMP') : ?>
				<div class="<?php echo ($session->entity != 'Admin') ? 'col-sm-12 col-xs-12' : 'col-sm-6 col-xs-6'; ?>">
					<div class="card">
						<div class="card-header border-0">
							<h3 class="card-title">Last added 5 Hotels</h3>
							<div class="card-tools">
								<a href="<?php echo base_url() ?>hotels" class="btn btn-tool btn-sm">
									<i class="fas fa-bars"></i>
								</a>
							</div>
						</div>
						<div class="card-body table-responsive p-0">
							<table class="table table-striped table-valign-middle">
								<thead>
									<tr>
										<th>Name</th>
										<th>Location</th>
										<th>Status</th>
										<th>More</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($hotels_data as $hotel) :?>
										<tr>
											<td>
												<a href="<?php echo base_url(); ?>hotel?id=<?php echo $hotel->user_id; ?>"><?php echo $hotel->name; ?></a>
											</td>
											<td><?php echo $hotel->headquarter; ?></td>
											<td>
												<?php if($hotel->status != '2' ) : ?>
													<span class="badge badge-success">Active</span>
													<?php else: ?>
														<span class="badge badge-danger">Deactivate</span>
													<?php endif; ?>
												</td>
												<td>
													<a href="<?php echo base_url(); ?>hotel?id=<?php echo $hotel->user_id; ?>" class="text-muted">
														<i class="fas fa-search"></i>
													</a>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
						<!-- /.card -->
					</div>
				<?php endif; ?>
				<!-- /.col-md-6 -->
				<?php if($session->entity != 'RFP' && $session->entity != 'RFP_EMP') : ?>
					<div class="<?php echo ($session->entity != 'Admin') ? 'col-sm-12 col-xs-12' : 'col-sm-6 col-xs-6'; ?>">
						<div class="card">
							<div class="card-header border-0">
								<h3 class="card-title">Last added 5 Companies</h3>
								<div class="card-tools">
									<a href="<?php echo base_url() ?>companies" class="btn btn-tool btn-sm">
										<i class="fas fa-bars"></i>
									</a>
								</div>
							</div>
							<div class="card-body table-responsive p-0">
								<table class="table table-striped table-valign-middle">
									<thead>
										<tr>
											<th>Name</th>
											<th>Location</th>
											<th>Status</th>
											<th>More</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($companies_data as $company) :?>
											<tr>
												<td>
													<a href="<?php echo base_url(); ?>company?id=<?php echo $company->user_id; ?>"><?php echo $company->name; ?></a>
												</td>
												<td><?php echo $company->headquarter; ?></td>
												<td>
													<?php if($company->status != '2' ) : ?>
														<span class="badge badge-success">Active</span>
														<?php else: ?>
															<span class="badge badge-danger">Deactivate</span>
														<?php endif; ?>
													</td>
													<td>
														<a href="<?php echo base_url(); ?>company?id=<?php echo $company->user_id; ?>" class="text-muted">
															<i class="fas fa-search"></i>
														</a>
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<!-- /.col-md-6 -->
				</div>
				<!-- Default box -->
	<!-- <div class="card">
		<div class="card-header">
			<h3 class="card-title">Welcome <?php //echo $session->name; ?></h3>
		</div>
		<div class="card-body">
			<p align="center"><a href="<?php //echo base_url(); ?>dashboard/logout">Logout</a></p>
		</div>
	</div> -->
	<!-- /.card -->
</div>
</section>
<!-- /.content -->

<script type="text/javascript">
	jQuery(document).ready(function($){
		setTimeout(function () {
			<?php if(isset($room_count) && !empty($room_count)) { ?>
				secondPlay();
			<?php } if(isset($room_count1) && !empty($room_count1)) { ?>
				secondPlay2();
			<?php } if(isset($room_count2) && !empty($room_count2)) { ?>
				secondPlay3();
			<?php } ?>
		}, 3000);

		<?php if(isset($room_count) && !empty($room_count)) { ?>
		function secondPlay() {

			var timeoutcount = 1000;
			<?php
			$invID = str_pad($room_count, 5, '0', STR_PAD_LEFT);
			$intArray = str_split((string)$invID);
			$countArray = count($intArray);
			for($i = 0; $i<$countArray; $i++) :
				if($i > 0) {
					?>
					timeoutcount = timeoutcount+500;
					<?php
				}
				?>
				setTimeout(function () {
					var aa = $(".flip-cust-box-2 ul.secondPlay<?php echo ($i > 0) ? $i : '' ?><?php echo ($i > 0) ? $i : '' ?> li.active");

					if (aa.html() == undefined) {
						aa = $(".flip-cust-box-2 ul.secondPlay<?php echo ($i > 0) ? $i : '' ?> li").eq(0);
						aa.addClass("before")
						.removeClass("active")
						.next("li")
						.addClass("active")
						.closest("body")
						.addClass("play");

					}
					else if (aa.is(":last-child")) {
						$(".flip-cust-box-2 ul.secondPlay<?php echo ($i > 0) ? $i : '' ?> li").removeClass("before");
						aa.addClass("before").removeClass("active");
						aa = $(".flip-cust-box-2 ul.secondPlay<?php echo ($i > 0) ? $i : '' ?> li").eq(0);
						aa.addClass("active")
						.closest("body")
						.addClass("play");
					}
					else {
						$(".flip-cust-box-2 ul.secondPlay<?php echo ($i > 0) ? $i : '' ?> li").removeClass("before");
						aa.addClass("before")
						.removeClass("active")
						.next("li")
						.addClass("active")
						.closest("body")
						.addClass("play");
					}
				}, timeoutcount);
				<?php		
			endfor;
			?>

		}
		<?php } ?>

		<?php if(isset($room_count1) && !empty($room_count1)) { ?>
		function secondPlay2() {

			var timeoutcount = 1000;
			<?php
			$invID = str_pad($room_count1, 5, '0', STR_PAD_LEFT);
			$intArray = str_split((string)$invID);
			$countArray = count($intArray);
			for($i = 0; $i<$countArray; $i++) :
				if($i > 0) {
					?>
					timeoutcount = timeoutcount+500;
					<?php
				}
				?>
				setTimeout(function () {
					var aa = $(".flip-cust-box-1 ul.secondPlay<?php echo ($i > 0) ? $i : '' ?><?php echo ($i > 0) ? $i : '' ?> li.active");

					if (aa.html() == undefined) {
						aa = $(".flip-cust-box-1 ul.secondPlay<?php echo ($i > 0) ? $i : '' ?> li").eq(0);
						aa.addClass("before")
						.removeClass("active")
						.next("li")
						.addClass("active")
						.closest("body")
						.addClass("play");

					}
					else if (aa.is(":last-child")) {
						$(".flip-cust-box-1 ul.secondPlay<?php echo ($i > 0) ? $i : '' ?> li").removeClass("before");
						aa.addClass("before").removeClass("active");
						aa = $(".flip-cust-box-1 ul.secondPlay<?php echo ($i > 0) ? $i : '' ?> li").eq(0);
						aa.addClass("active")
						.closest("body")
						.addClass("play");
					}
					else {
						$(".flip-cust-box-1 ul.secondPlay<?php echo ($i > 0) ? $i : '' ?> li").removeClass("before");
						aa.addClass("before")
						.removeClass("active")
						.next("li")
						.addClass("active")
						.closest("body")
						.addClass("play");
					}
				}, timeoutcount);
				<?php		
			endfor;
			?>

		}
		<?php } ?>
		<?php if(isset($room_count2) && !empty($room_count2)) { ?>
		function secondPlay3() {

			var timeoutcount = 1000;
			<?php
			$invID = str_pad($room_count2, 5, '0', STR_PAD_LEFT);
			$intArray = str_split((string)$invID);
			$countArray = count($intArray);
			for($i = 0; $i<$countArray; $i++) :
				if($i > 0) {
					?>
					timeoutcount = timeoutcount+500;
					<?php
				}
				?>
				setTimeout(function () {
					var aa = $(".flip-cust-box-3 ul.secondPlay<?php echo ($i > 0) ? $i : '' ?><?php echo ($i > 0) ? $i : '' ?> li.active");

					if (aa.html() == undefined) {
						aa = $(".flip-cust-box-3 ul.secondPlay<?php echo ($i > 0) ? $i : '' ?> li").eq(0);
						aa.addClass("before")
						.removeClass("active")
						.next("li")
						.addClass("active")
						.closest("body")
						.addClass("play");

					}
					else if (aa.is(":last-child")) {
						$(".flip-cust-box-3 ul.secondPlay<?php echo ($i > 0) ? $i : '' ?> li").removeClass("before");
						aa.addClass("before").removeClass("active");
						aa = $(".flip-cust-box-3 ul.secondPlay<?php echo ($i > 0) ? $i : '' ?> li").eq(0);
						aa.addClass("active")
						.closest("body")
						.addClass("play");
					}
					else {
						$(".flip-cust-box-3 ul.secondPlay<?php echo ($i > 0) ? $i : '' ?> li").removeClass("before");
						aa.addClass("before")
						.removeClass("active")
						.next("li")
						.addClass("active")
						.closest("body")
						.addClass("play");
					}
				}, timeoutcount);
				<?php		
			endfor;
			?>

		}
		<?php } ?>

	});
</script>