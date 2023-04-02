<?php
$con = mysqli_connect("localhost", "root", "", "LPSE_Siak");
?>

<?php
		$userdata = $this->session->userdata();
?>

<style>
	.justify {
		text-align: justify;
	}

	p.page-break {
		word-break: break-all;
		text-align: justify;
	}

	#corner {
		border-radius: 15px;
	}

	#corner1 {
		border-radius: 30px;
	}

</style>

<!-- Blank Start -->
<div class="card-body">

	<div class="col-auto">
	</div>
	<div class="card-body">
		<div class="card-body" style="margin-top:-2%">
			<div class="row">
				<div class="col-sm-9">
					<h3 class="text-dark fw-bold">
						<?php echo $judul; ?></h3>
					<p class="mb-9 mb-2 text-dark fw-bold"><i class="fas fa-home"></i> &nbsp;Home • My Profile</p>
					<br />
				</div>

				<div class="col-sm-3 text-left">
					<?= $this->session->flashdata('message'); ?>
				</div>
			</div>

			<div class="card-title bg-white" style="margin-left:17px">
				<div class="row">
					<div class="card-title shadow-lg" id="corner1">
						<div class="card-body">

							<form action="<?= base_url('admin/user/profilUpdate/') . $tim['nip'] ?>" method="POST" enctype="multipart/form-data">
								<div class="row">
									<div class="col-sm-3">
										</br />
										</br />
										<img src="<?= base_url('assets/img/tim/') . $tim['gambar']; ?>"
											style="width:400px; margin-left:40px;" class="img-thumbnail">
										<div class="custom-file" style="margin-left:80px;">
											<br>
											<input type="file" name="gambar" id="gambar" class="form-control">
										</div>
									</div>

									<div class="col-sm-3">
										<div class="card-body">
											<div class="form-group col-md-12">
												</br />
												<form action="" method="POST" enctype="multipart/form-data">
													<input type="hidden" name="nip" value="<?= $tim['nip']; ?>">

													<div class="mb-3">
														<label for="nip" class="form-label">NIP</label>
														<input type="text" value="<?= $tim['nip']; ?>" readonly
															class="form-control" id="id_user" name="id_user">
														<?= form_error('id_user', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>

													<div class="mb-3">
														<label for="nama" class="form-label">Nama</label>
														<input type="text" value="<?= $tim['nama']; ?>"
															class="form-control" id="nama" name="nama">
														<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
													</div>

													<div class="mb-3">
														<label for="jenis kelamin" class="form-label">Jenis
															Kelamin</label>
														<select class="form-select form-select mb-3"
															name="jeniskelamin" id="jeniskelamin">
															<option selected>Pilih Jenis Kelamin</option>
															<option value="Laki-laki" <?php if ($tim['jeniskelamin'] == "Laki-laki") {
                                                echo "selected";
                                            } ?>>Laki-laki</option>
															<option value="Perempuan" <?php if ($tim['jeniskelamin'] == "Perempuan") {
                                                echo "selected";
                                            } ?>>Perempuan</option>
														</select>
														<?= form_error('jeniskelamin', '<small class="text-danger pl-3">', '</small>'); ?>
														</select>
													</div>


													<div class="mb-3">
														<label for="tempat_lahir_update">Tempat
															Lahir</label>
														<input type="text" name="tempat_lahir"
															value="<?= $tim['tempat_lahir']; ?>" class="form-control"
															id="tempat_lahir"
															placeholder="Masukkan Tempat Lahir">
														<?= form_error('tempat_lahir', '<small class="text-danger">', '</small>'); ?>
													</div>

													<div class="mb-3">
														<label for="tanggal_lahir_update" class="form-label">Tanggal
															Lahir</label>
														<input type="date" value="<?= $tim['tanggal_lahir']; ?>"
															class="form-control" id="tanggal_lahir"
															name="tanggal_lahir">
														<?= form_error('tanggal_lahir_update', '<small class="text-danger">', '</small>'); ?>
													</div>

												</form>
											</div>
										</div>
									</div>


									<div class="col-sm-3">
										<div class="card-body">
											<div class="form-group col-md-12">

												</br />

												<div class="mb-3">
													<label for="role" class="form-label">Jabatan</label>
													<select class="form-select form-select mb-3" name="role" id="role"
														disabled="">
														<option value="3">Admin LPSE</option>
													</select>
												</div>

												<div class="mb-3">
													<label for="username">Username</label>
													<input type="text" name="username" value="<?= $user['username']; ?>"
														class="form-control" id="username">
													<?= form_error('username', '<small class="text-danger">', '</small>'); ?>
												</div>

												<div class="mb-3">
													<label for="email">Email</label>
													<input type="text" name="email" value="<?= $tim['email']; ?>"
														class="form-control" id="email">
													<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
												</div>

												<div class="mb-3">
													<label for="notelp" class="form-label">Nomor Telepon</label>
													<input type="text" value="<?= $tim['notelp']; ?>"
														class="form-control" id="notelp" name="notelp">
												</div>

												<div class="mb-3 text-left">
													<button type="submit" name="update" class="btn btn-primary"><i
															class="m-lg-1"><img class="img-thumbnails"
																src="<?php echo base_url(); ?>assets/img/edit.png" /></i>
														Update
														Profil</button>
												</div>

							</form>
						</div>
					</div>
				</div>


				<div class="col-sm-3">
					<div class="card-body">
						<div class="form-group col-md-12">
							<form action="<?= base_url('admin/Profil/reset') ?>" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="nip" value="<?= $user['id_user']; ?>">
								</br />
								<div class="mb-3">
									<label for="password" class="form-label">Password</label>
									<input type="password" value="*****" readonly class="form-control" id="password"
										name="password">
								</div>
								<div class="mb-3">
									<label for="reset" class="form-label">Reset Password</label>
									<input type="password" name='password' value="<?= set_value('password') ?>"
										class="form-control" id="password" name="password">
								</div>
								<button type="submit" name="reset" class="btn btn-danger">Reset
									Password</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<br>

	</div>
</div>
</div>
</div>
