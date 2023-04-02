<body class="page-content cover-image-latar">

	<!-- <body class ="bg-red"> -->


	<div class="container">

		<br />
		<br />
		<br />
		<br />
		<br />
		<br />




		<div class="wrap d-md-flex">
			<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">


				<div class="row">

					<div class="col-lg bg-white cover-image-login shadow-lg rounded-left img-fluid">

					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</div>



					<div class="col-lg bg-white rounded-right shadow-lg">
					
						<div class="p-5">
							<div class="text-center mb-4">
								<br />
								<img src="<?php echo base_url(); ?>assets/img/logolpse1.png" style="width:400px">
								<br />
							
								<div class="d-flex align-items-center justify-content-between-center mb-5">
								</div>

								<?= $this->session->flashdata('message'); ?>
								<form class="user" method="POST" action="<?= base_url('auth'); ?>"
									enctype="multipart/form-data">

									<div class="form-floating mb-3">
										<input type="text" class="form-control" name="username"
											placeholder="Masukkan username">
										<?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
										<label for="floatingInput">Username</label>
									</div>
									<div class="form-floating mb-4">
										<input type="password" class="form-control" name="password"
											placeholder="Masukkan Password">
										<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
										<label for="floatingPassword">Password</label>
									</div>

									<button type="submit" class="btn btn-warning py-3 w-100 mb-4">Login</button>

									<a href="<?= base_url('auth/register') ?>" class="text-dark bold" style="font-size: 15px, margin-top: 10%;">Belum Ada Akun?</a>

									
							</div>
				
							<br />
							
							<div class="col-auto">
							
								<p class="text-dark fw-bold" >&copy; LPSE Kabupaten Siak, All Right Reserved. 2023</p>

							</div>
						</div>
					</div>
				</div>


			</div>
</body>
