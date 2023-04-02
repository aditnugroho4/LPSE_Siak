<?php
$con = mysqli_connect("localhost", "root", "", "LPSE_Siak");
?>

<?php
		$userdata = $this->session->userdata();
?>

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
					<p class="mb-9 mb-2 text-dark fw-bold"><i class="fas fa-home"></i> &nbsp;Home • Pengguna •
						Pengunjung</p>
					<br />
				</div>

				<div class="col-sm-3 text-left">
					<?= $this->session->flashdata('message'); ?>
				</div>
			</div>

			<div class="text-left"></a>
			</div>
			</br>
			<div class="card o-hidden shadow-lg">
				<div class="row vh-90 bg-white rounded align-items-center justify-content-center mx-0">
					<div class="card-body">
						<a href="" class="btn btn-primary" data-toggle="modal" data-target="#ModalTambah">
							<i style=""><img class="img-thumbnails"
									src="<?php echo base_url(); ?>assets/img/tambah.png" /></i>&nbsp;Tambah
							Pengunjung</a>
						</br>
						</br>
						<table class="table table-bordered text-dark" id="dataTable" cellspacing="0">
							<thead>
								<tr>
									<th class="text-center">No Pengunjung</th>
									<th class="text-center">Foto</th>
									<th class="text-center">Nama Pengunjung</th>
									<th class="text-center">Jenis Kelamin</th>
									<th class="text-center">No Telepon</th>
									<th class="text-center">Email</th>
									<th class="text-center">Username</th>
									<th class="text-center">Password</th>
									<th class="text-center">Timestamp</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$query = "SELECT * FROM user where role='Pengunjung'";
								$r = mysqli_query($con, $query);
								while ($row = mysqli_fetch_assoc($r)) {
								?>
								<tr>
									<td class="text-center" style="width:100px"><?php echo $row['id_user'] ?></td>
									<td class="text-center"><img
											src="<?= base_url('assets/img/profil/') . $row['gambar']; ?>"
											style="width:150px" class="img-thumbnail"></td>
									<td class="text-center"><?php echo $row['nama'] ?></td>
									<td class="text-center"><?php echo $row['jeniskelamin'] ?></td>
									<td class="text-center"><?php echo $row['notelp'] ?></td>
									<td class="text-center"><?php echo $row['email'] ?></td>
									<td class="text-center"><?php echo $row['username'] ?></td>
									<td class="text-center">*******</td>
									<td class="text-center"><?php echo $row['timestamp'] ?></td>
									<td class="text-center">
										<a href="" data-toggle="modal" data-target="#ModalUpdate<?= $row['id_user'] ?>"
											class="btn btn-danger"><i><img class="img-thumbnails"
													src="<?php echo base_url(); ?>assets/img/edit.png" /></i></a>

										<a href="" class="btn btn-warning m-2" data-toggle="modal"
											data-target="#ModalHapus<?= $row['id_user'] ?>"><i>
												<img class="img-thumbnails"
													src="<?php echo base_url(); ?>assets/img/hapus.png" /></i></a>
									</td>
								</tr>

								<!-- Update Pengunjung Modal-->
								<div class="modal fade bd-example-modal-lg" id="ModalUpdate<?= $row['id_user'] ?>"
									style="margin-top:7%;" tabindex="-1" role="dialog"
									aria-labelledby="myLargeModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg">
									<div class="modal-content border-0" id="corner">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel" style="margin-left:40%;">
													Update Pengunjung</h5>
												<button class="close" type="button" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">×</span>
												</button>
											</div>
											<div class="modal-body" style="margin-left:2%; margin-right:2%">
												<form action="" method="POST" enctype="multipart/form-data">
													<input type="hidden" name="id_user" value="<?= $row['id_user']; ?>">
													<div class="row">
														<div class="col-sm-12">
															<div class="row">
																<div class="col-sm-6">
																	<img src="<?= base_url('assets/img/profil/') . $row['gambar']; ?>"
																		style="width:320px; height:315px; margin-top:3%;"
																		class="img-thumbnail">
																	<!-- <form action="<?= base_url('pengunjung/reset') ?>"
																		method="POST" enctype="multipart/form-data">
																		<input type="hidden" id="id_user" name="id_user"
																			value="<?= $row['id_user']; ?>">
																		<div class="row">
																			<div class="col-sm-8">
																				<div class="mb-3"
																					style="margin-top:18px;">
																					<label for="Password">Reset
																						Password</label>
																					<input type="password" name="reset"
																						value="<?= set_value('password') ?>"
																						class="form-control" id="reset"
																						style="width:245px;">
																				</div>
																			</div>
																			<div class="col-sm-4">
																				<button type="submit" name="reset"
																					class="btn btn-danger"
																					style="margin-top:50px; margin-left:-1px;">Reset</button>
																			</div>
																		</div>
																	</form> -->
																</div>
																<div class="col-sm-6">
																	<div class="mb-3">
																		<label for="id_user">No Pengunjung</label>
																		<input type="text" name="id_user"
																			value="<?= $row['id_user']; ?>"
																			class="form-control" id="id_user"
																			disabled="">
																	</div>

																	<div class="mb-3">
																		<label for="nama_update">Nama
																			Pengunjung</label>
																		<input type="text" name="nama_update"
																			value="<?= $row['nama']; ?>"
																			class="form-control" id="nama_update">
																		<?= form_error('nama_update', '<small class="text-danger">', '</small>'); ?>
																	</div>

																	<div class="mb-3">
																		<label for="jeniskelamin"
																			class="form-label">Jenis kelamin</label>
																		<select class="form-select form-select mb-3"
																			name="jeniskelamin_update"
																			id="jeniskelamin_update">
																			<option value="Laki-laki" <?php if ($row['jeniskelamin'] == "Laki-laki") {
																													echo "selected";
																												} ?>>Laki-laki</option>
																			<option value="Perempuan" <?php if ($row['jeniskelamin'] == "Perempuan") {
																												echo "selected";
																											} ?>>Perempuan</option>
																		</select>
																		<?= form_error('jeniskelamin_update', '<small class="text-danger pl-3">', '</small>'); ?>
																	</div>

																	<div class="mb-3">
																		<label for="email_update">Email</label>
																		<input type="text" name="email_update"
																			value="<?= $row['email']; ?>"
																			class="form-control" id="email_update">
																		<?= form_error('email_update', '<small class="text-danger">', '</small>'); ?>
																	</div>

																	<div class="mb-3">
																		<label for="notelp_update" class="form-label">No
																			Telepon</label>
																		<input type="number"
																			value="<?= $row['notelp']; ?>"
																			class="form-control" id="notelp_update"
																			name="notelp_update">
																		<?= form_error('notelp_update', '<small class="text-danger">', '</small>'); ?>
																	</div>

																	<div class="mb-3">
																		<label for="username">Username</label>
																		<input type="text" name="username_update"
																			value="<?= $row['username']; ?>"
																			class="form-control" id="username_update">
																		<?= form_error('username_update', '<small class="text-danger">', '</small>'); ?>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="submit" name="update" class="btn btn-primary"
															style="margin-right:42%;">
															<i class="m-lg-1"><img class="img-thumbnails"
																	src="<?php echo base_url(); ?>assets/img/edit.png" /></i>
															Update</button>
													</div>
												</form>
											</div>

											<form action="<?= base_url('pengunjung/reset') ?>"
																		method="POST" enctype="multipart/form-data">
																		<input type="hidden" id="id_user" name="id_user"
																			value="<?= $row['id_user']; ?>">
																		<div class="row">
																			<div class="col-sm-8">
																				<div class="mb-3"
																					style="margin-top:18px;">
																					<label for="Password">Reset
																						Password</label>
																					<input type="password" name="password"
																						value="<?= set_value('password') ?>"
																						class="form-control" id="password"
																						style="width:245px;">
																				</div>
																			</div>
																			<div class="col-sm-4">
																				<button type="submit" name="reset"
																					class="btn btn-danger"
																					style="margin-top:50px; margin-left:-1px;">Reset</button>
																			</div>
																		</div>
																	</form>



										</div>
									</div>
								</div>
					</div>

					<!-- Hapus Pengunjung Modal-->
					<div class="modal fade" id="ModalHapus<?= $row['id_user'] ?>" tabindex="-1" role="dialog" style="margin-top:2%;position:fixed;" 
						aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
						<div class="modal-content border-0" id="corner">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Apakah Anda ingin
										Menghapus Pengunjung ini?</h5>
									<button class="close" type="button" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="modal-body">Pilih "Hapus" di bawah jika ingin
									melakukannya !</div>
								<div class="modal-footer">
									<a class="btn btn-warning m-2"
										href="<?= base_url('admin/pengunjung/hapus/') . $row['id_user']; ?>"><i>
											<img class="img-thumbnails"
												src="<?php echo base_url(); ?>assets/img/hapus.png" /></i>
										&nbsp;Hapus</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<?php
								}
?>

<!-- Tambah Pengunjung Modal-->

<div class="modal fade bd-example-modal-lg" style="margin-top:4%;position:fixed;" id="ModalTambah" tabindex="-1" role="dialog"
	aria-labelledby="myLargeModalLabel" aria-hidden="true">

	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="margin-left:40%;">
					Tambah Pengunjung</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body" style="margin-left:2%; margin-right:2%">
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-6">
							<div class="mb-3">
								<label for="nama">Nama Pengunjung</label>
								<input type="text" name="nama" value="<?= set_value('nama'); ?>" class="form-control"
									id="nama" placeholder="Masukkan Nama Pengunjung">
								<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
							</div>

							<div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input type="text" value="<?= set_value('email'); ?>" class="form-control" id="email"
									name="email" placeholder="Masukkan Email">
								<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
							</div>

							<div class="mb-3">
								<label for="notelp" class="form-label">No Telepon</label>
								<input type="number" value="<?= set_value('notelp'); ?>" class="form-control"
									id="notelp" name="notelp" placeholder="Masukkan Nomor Telepon">
								<?= form_error('notelp', '<small class="text-danger">', '</small>'); ?>
							</div>

							<div class="mb-3">
								<label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
								<select class="form-select mb-3" value="<?= set_value('jeniskelamin'); ?>"
									name="jeniskelamin" id="jeniskelamin" placeholder="Masukkan Jenis Kelamin">
									<option value="">Pilih Jenis Kelamin</option>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>

								</select>
								<?= form_error('jeniskelamin', '<small class="text-danger">', '</small>'); ?>
							</div>


						</div>

						<div class="col-sm-6">

							<div class="mb-3">
								<label for="username" class="form-label">Username</label>
								<input type="text" value="<?= set_value('username'); ?>" class="form-control"
									id="username" name="username">
								<?= form_error('username', '<small class="text-danger">', '</small>'); ?>
							</div>

							<div class="mb-3">
								<label for="password" class="form-label"> Password</label>
								<input type="password" name='password1' class="form-control" id="password1"
									placeholder="Masukkan Password">
								<?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
							</div>


							<div class="mb-3">
								<label for="password" class="form-label"> Konfirmasi
									Password</label>
								<input type="password" name='password2' class="form-control" id="password2"
									placeholder="Ulangi Password">
							</div>

						</div>

						<div class="modal-footer">
							<button type="submit" name="tambah" class="btn btn-primary" style="margin-right:42%;">
								<i class="m-lg-1"><img class="img-thumbnails"
										src="<?php echo base_url(); ?>assets/img/tambah.png" /></i>
								Tambah</button>

						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>

</tbody>
</table>

</div>
</div>
</div>

</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


<script type="text/javascript">
	$(document).ready(function () {
		$('#dataTable').DataTable({
			dom: 'Bfrtip',
			buttons: [{
					extend: 'pdfHtml5',
					className: 'text-light bg-danger',
					text: '<i class="fa fa-file-pdf-o">  PDF</i>',
					titleAttr: 'PDF',
					alignment: 'center',
					messageTop: 'Berikut Merupakan Daftar Tim LPSE Kabupaten Siak.',
					download: 'open',
					exportOptions: {
						columns: ':visible'
					},
				},

				{
					extend: 'print',
					titleBottom: 'Tim LPSE Kabupaten Siak',
					className: 'text-light bg-primary',
					text: '<i class="fa fa-print"> Print</i>',
					customize: function (win) {
						$(win.document.body).find('table')
							.addClass('compact')
							.css('font-size', 'inherit');

						$(win.document.body)
							.css('font-size', '15pt')
							.prepend(
								'<img src="<?= base_url('
								assets / img / logolpse1
								.png ')?>" class="container" style="width:30%; margin-left:72%; right:10%;" />'
							);


						$(win.document.body)
							.css('font-size', '15pt')
							.prepend(
								'<img src="<?= base_url('
								assets / img / logolpse1
								.png ')?>" class="container" style="position:absolute; opacity: 0.1;top:35%;" />'
							);
					},
					exportOptions: {
						columns: ':visible'
					},

					messageTop: '<br><p class="text-center">Berikut Merupakan Daftar Tim LPSE Kabupaten Siak.</p>',
				},
				{
					extend: 'colvis',
					text: '<i class="fa fa-low-vision"></i>',
				}
			]
		});
	});

</script>
