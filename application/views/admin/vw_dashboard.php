<?php
$con = mysqli_connect("localhost", "root", "", "LPSE_Siak");
?>


<style>
	.justify {
		text-align: justify;
	}

	p.page-break {
		width: 400px;
		/* word-wrap: break-all; */
		word-wrap: break-word;
		text-align: justify;
	}

	#corner {
		border-radius: 15px;
	}

</style>


<!-- Blank Start -->
<div class="card-body">

	<div class="card-body">

		<div class="card-body" style="margin-top:-3%">
			<div class="row">
				<div class="col-sm-9">
					<h3 class="text-dark fw-bold">
						<?php echo $judul; ?></h3>
					<p class="mb-9 mb-2 text-dark fw-bold"><i class="fas fa-home"></i> &nbsp;Home • Dashboard</p>
					<br />
				</div>
				<div class="col-sm-3 bg-white text-left">
					<?= $this->session->flashdata('message'); ?>
				</div>
			</div>

			<div class="row">
				<div class="bg-white">
					<div class="row">
						<!-- Dashboard Visitor-->
						<div class="col-sm-3">
							<div class="card-title">
								<div class="bg-light-dark d-flex align-items-center justify-content-between p-4 border-0 shadow-lg"
									id="corner">
									<a href="<?= site_url('Tim') ?>">
										<img class="img-fluid" src="<?php echo base_url(); ?>assets/img/visitor.png" />
									</a>
									<div class="ms-6">
										<p class="fw-bold mb-2 text-dark">Total Visitor</p>
										<h5 class="mb-0 text-right text-dark"><?= $pengunjung ?>
										</h5>
									</div>
								</div>
							</div>
						</div>

						<!-- Dashboard Pengunjung-->
						<div class="col-sm-3">
							<div class="card-title">
								<div class="bg-light-dark d-flex align-items-center justify-content-between p-4 border-0 shadow-lg"
									id="corner">
									<a href="<?= site_url('Pengunjung') ?>">
										<img class="img-fluid" src="<?php echo base_url(); ?>assets/img/tim.png" />
									</a>
									<div class="ms-0">
										<p class="fw-bold mb-2 text-dark">Tim LPSE</p>
										<h5 class="mb-0 text-right text-dark">
											<?= $tim1 ?>
										</h5>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-3">
							<div class="card-title">
								<div class="bg-light-dark d-flex align-items-center justify-content-between p-4 border-0 shadow-lg"
									id="corner">
									<a href="<?= site_url('Pengunjung') ?>">
										<img class="img-fluid"
											src="<?php echo base_url(); ?>assets/img/pengunjung.png" />
									</a>
									<div class="ms-0">
										<p class="fw-bold mb-2 text-dark">Pengunjung</p>
										<h5 class="mb-0 text-right text-dark">
											<?= $pengunjung ?>
										</h5>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="card-title">
								<div class="bg-light-dark d-flex align-items-center justify-content-between p-4 border-0 shadow-lg"
									id="corner">
									<a href="<?= site_url('Pengunjung') ?>">
										<img class="img-fluid" src="<?php echo base_url(); ?>assets/img/layanan.png" />
									</a>
									<div class="ms-0">
										<p class="fw-bold mb-2 text-dark">Layanan LPSE</p>
										<h5 class="mb-0 text-right text-dark">
											<?= $layanan ?>
										</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3">
					<div class="card-title">
						<div class="bg-white border-0 shadow-lg" style="margin-top:15px;" id="corner">
							<div class="card-body">
								<h5 class="text-center fw-bold" style="margin-top:1%;">Visitor Website</h5>
								<canvas id="#" style="margin-top:4%;"></canvas>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>

							</div>
						</div>
					</div>

					<div class="card-title">
						<div class="bg-light-dark d-flex align-items-center justify-content-between p-4 border-0 shadow-lg"
							id="corner" style="margin-top:35px;">
							<a href="<?= site_url('Pengunjung') ?>">
								<img class="img-fluid" src="<?php echo base_url(); ?>assets/img/pengunjung.png" />
							</a>
							<div class="ms-0">
								<p class="fw-bold mb-2 text-dark">CCC</p>
								<h5 class="mb-0 text-right text-dark">
									<?= $pengunjung ?>
								</h5>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="card-title">
						<div class="bg-white border-0 shadow-lg" style="margin-top:15px;" id="corner">
							<div class="card-body">
								<h5 class="text-center fw-bold" style="margin-top:1%;">Visitor Website</h5>
								<canvas id="#" style="margin-top:4%;"></canvas>
								<br>
							</div>
						</div>
					</div>

					<div class="card-title">
						<div class="bg-light-dark d-flex align-items-center justify-content-between p-4 border-0 shadow-lg"
							id="corner" style="margin-top:23px;">
							<a href="<?= site_url('Pengunjung') ?>">
								<img class="img-fluid" src="<?php echo base_url(); ?>assets/img/pengunjung.png" />
							</a>
							<div class="ms-0">
								<p class="fw-bold mb-2 text-dark">BBBB</p>
								<h5 class="mb-0 text-right text-dark">
									<?= $pengunjung ?>
								</h5>
							</div>
						</div>
					</div>

					<div class="card-title">
						<div class="bg-light-dark d-flex align-items-center justify-content-between p-4 border-0 shadow-lg"
							id="corner" style="margin-top:20px;">
							<a href="<?= site_url('Pengunjung') ?>">
								<img class="img-fluid" src="<?php echo base_url(); ?>assets/img/pengunjung.png" />
							</a>
							<div class="ms-0">
								<p class="fw-bold mb-2 text-dark">AAAA</p>
								<h5 class="mb-0 text-right text-dark">
									<?= $pengunjung ?>
								</h5>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="card-title">
						<div class="bg-white border-0 shadow-lg" style="margin-top:2%;" id="corner">
							<div class="card-body">
								<h5 class="text-center fw-bold" style="margin-top:1%;">Kategori Berita</h5>
								<canvas id="diagram" style="margin-top:4%;"><br></canvas>
								<br>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	
		



