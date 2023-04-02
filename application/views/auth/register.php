<body class="page-content cover-image-latar">

	<!-- <body class ="bg-red"> -->


	<div class="container">

		<br />
		<br />
		<br />
		<br />


		<h1 class="text-light fw-bold" style="margin-left:36%;"> REGISTER AKUN</h1>
		<h5 class="text-light fw-bold" style="margin-left:36%;margin-top:3%;"> Silahkan Masukkan Data Diri Anda!</h5>

		<div class="container card o-hidden shadow-lg col-sm-7" style="margin-top:3%;">
			<div class="bg-white rounded align-items  mx-0">

				</br />
				<form action="" method="POST">
					<div class="card-body" style="font-size: 15px, margin-top: 10%;">

						<div class="mb-3">
							<label for="nama" class="form-label">Nama</label>
							<input type="text" value="<?= set_value('nama'); ?>" class="form-control" id="nama"
								name="nama">
							<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="mb-3">
							<label for="email" class="form-label">Email</label>
							<input type="text" value="<?= set_value('email'); ?>" class="form-control" id="email"
								name="email">
							<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="mb-3">
							<label for="notelp" class="form-label">No Telepon</label>
							<input type="text" value="<?= set_value('notelp'); ?>" class="form-control" id="notelp"
								name="notelp">
							<?= form_error('notelp', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="mb-3">
							<label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
							<select class="form-select mb-3" value="<?= set_value('jeniskelamin'); ?>"
								name="jeniskelamin" id="jeniskelamin">
								<option value="">Pilih Jenis Kelamin</option>
								<option value="Laki-laki">Laki-laki</option>
								<option value="Perempuan">Perempuan</option>
								<?= form_error('jeniskelamin', '<small class="text-danger pl-3">', '</small>'); ?>
							</select>
						</div>

						<div class="mb-3">
							<label for="username" class="form-label">Username</label>
							<input type="text" value="<?= set_value('username'); ?>" class="form-control"
								id="username" name="username">
							<?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="mb-3">
							<label for="password" class="form-label"> Password</label>
							<input type="password" name='password1' class="form-control" id="password1"
								placeholder="Masukkan Password">
							<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="mb-3">
							<label for="password" class="form-label"> Konfirmasi
								Password</label>
							<input type="password" name='password2' class="form-control" id="password2"
								placeholder="Ulangi Password">
						</div>

						<div class="row">
						
							<div class="col-sm-5 text-left">
							<br/>
							
							<a href="<?= base_url('auth') ?>" class="text-dark bold my-3 fw-bold" style="margin-top:20%;"
								style="font-size: 15px;">Sudah Punya Akun?</a>
							</div>
							<div class="col-sm-7 text-right">
								<button type="submit" class="btn btn-primary py-3">Register</button>
							
							</div>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
	</div>

</body>
