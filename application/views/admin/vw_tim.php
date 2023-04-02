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
					<p class="mb-9 mb-2 text-dark fw-bold"><i class="fas fa-home"></i> &nbsp;Home • Pengguna • Tim</p>
					<br />
				</div>

				<div class="col-sm-3 text-left">
					<?= $this->session->flashdata('message'); ?>
				</div>
			</div>

			<div class="text-left"></a>
			</div>
			</br>
			<div class="card-title bg-white" style="margin-left:17px">
				<div class="row">
					<div class="card-title shadow-lg" id="corner1">
						<div class="card-body my-3">
							<a href="" class="btn btn-primary" data-toggle="modal" data-target="#ModalTambah">
								<i style=""><img class="img-thumbnails"
										src="<?php echo base_url(); ?>assets/img/tambah.png" /></i>&nbsp;Tambah
								Tim</a>
							</br>
							</br>
							<table class="table table-bordered text-dark" id="dataTable">
								<thead>
									<tr>
										<th class="text-center">NIP</th>
										<th class="text-center">Gambar</th>
										<th class="text-center">Nama Petugas</th>
										<th class="text-center">TTL</th>
										<th class="text-center">Email</th>
										<th class="text-center">No Telepon</th>
										<th class="text-center">Jabatan</th>
										<th class="text-center">Keterangan</th>
										<th class="text-center">Timestamp</th>
										<th class="text-center">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php

								$query = "SELECT * from tim";
								$r = mysqli_query($con, $query);
								while ($row = mysqli_fetch_assoc($r)) {
								?>
									<tr>
										<td class="text-center"><?php echo $row['nip'] ?></td>
										<td class="text-center"><img
												src="<?= base_url('assets/img/tim/') . $row['gambar']; ?>"
												style="width:250px" class="img-thumbnail"></td>
										<td class="text-center"><?php echo $row['nama'] ?></td>
										<?php
										$oldDate = strtotime($row['tanggal_lahir']);
										$newDate = date('d-m-Y', $oldDate);
										?>
										<td class="text-center"><?php echo $row['tempat_lahir'] ?> /
											<?php echo $newDate ?>
										</td>
										<td class="text-center"><?php echo $row['email'] ?></td>
										<td class="text-center"><?php echo $row['notelp'] ?></td>
										<td class="text-center"><?php echo $row['jabatan'] ?></td>
										<td class="text-center"><?php echo $row['keterangan'] ?></td>
										<td class="text-center"><?php echo $row['timestamp'] ?></td>
										<td class="text-center">
											<!-- Langkah-Edit 2 Buat onclick untuk menjalankan function javascript yang kita buat -->
											<!-- onclick="EditModal('<?= $row['nip'] ?>')" untuk menggunakan function EditModal dengan nilai nip yang dikirimkan saat kita tekan a href tersebut -->

											<?php if ($row['jabatan'] == "Admin LPSE"){ ?>
											<a href="<?= base_url('User/profil/') . $row['nip'] ?>"
												class="btn btn-danger"><i><img class="img-thumbnails"
														src="<?php echo base_url(); ?>assets/img/edit.png" /></i></a>
											<?php } ?>

											<?php if ($row['jabatan'] != "Admin LPSE"){ ?>
											<a href="" data-toggle="modal" data-target="#ModalUpdate<?= $row['nip'] ?>"
												class="btn btn-danger" onclick="EditModal('<?= $row['nip'] ?>')"><i><img
														class="img-thumbnails"
														src="<?php echo base_url(); ?>assets/img/edit.png" /></i></a>

											<a href="" class="btn btn-warning m-2" data-toggle="modal"
												data-target="#ModalHapus<?= $row['nip'] ?>"><i>
													<img class="img-thumbnails"
														src="<?php echo base_url(); ?>assets/img/hapus.png" /></i></a>

											<?php } ?>


										</td>
									</tr>

									<!-- Update Tim Modal-->
									<div class="modal fade bd-example-modal-lg" id="ModalUpdate<?= $row['nip'] ?>"
									style="margin-top:7%;position:fixed;"  tabindex="-1" role="dialog"
										aria-labelledby="myLargeModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
										<div class="modal-content border-0" id="corner">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel"
														style="margin-left:40%;">
														Update Petugas</h5>
													<button class="close" type="button" data-dismiss="modal"
														aria-label="Close">
														<span aria-hidden="true">×</span>
													</button>
												</div>
												<div class="modal-body" style="margin-left:2%; margin-right:2%">
													<form action="" method="POST" enctype="multipart/form-data">
														<input type="hidden" name="nip" value="<?= $row['nip']; ?>">
														<div class="row">
															<div class="col-sm-6">
																<div class="mb-3">
																	<label for="nip_update">NIP</label>
																	<input type="text" name="nip_update"
																		value="<?= $row['nip']; ?>" class="form-control"
																		id="nip_update" disabled="">
																</div>

																<div class="mb-3">
																	<label for="nama_update">Nama Petugas</label>
																	<input type="text" name="nama_update"
																		value="<?= $row['nama']; ?>"
																		class="form-control" id="nama_update"
																		placeholder="Masukkan Nama Petugas">
																	<?= form_error('nama_update', '<small class="text-danger">', '</small>'); ?>
																</div>

																<div class="mb-3">
																	<label for="tempat_lahir_update">Tempat
																		Lahir</label>
																	<input type="text" name="tempat_lahir_update"
																		value="<?= $row['tempat_lahir']; ?>"
																		class="form-control" id="tempat_lahir_update"
																		placeholder="Masukkan Tempat Lahir">
																	<?= form_error('tempat_lahir_update', '<small class="text-danger">', '</small>'); ?>
																</div>

																<div class="mb-3">
																	<label for="tanggal_lahir_update"
																		class="form-label">Tanggal
																		Lahir</label>
																	<input type="date"
																		value="<?= $row['tanggal_lahir']; ?>"
																		class="form-control" id="tanggal_lahir_update"
																		name="tanggal_lahir_update">
																	<?= form_error('tanggal_lahir_update', '<small class="text-danger">', '</small>'); ?>
																</div>
															</div>

															<div class="col-sm-6">
																<div class="mb-3">
																	<label for="jabatan1"
																		class="form-label">Jabatan</label>
																	<select
																		class="form-select form-select mb-3 jabatan1"
																		name="jabatan_update"
																		id="jabatan<?= $row['nip']; ?>"
																		onChange="ChangeSelectUpdate(<?= $row['nip'] ?>)">
																		<option value="Penanggung Jawab LPSE" <?php if ($row['jabatan'] == "Penanggung Jawab LPSE") {
																													echo "selected";
																												} ?>>Penanggung Jawab LPSE</option>
																		<option value="Koordinator LPSE" <?php if ($row['jabatan'] == "Koordinator LPSE") {
																												echo "selected";
																											} ?>>Koordinator LPSE</option>
																		<option value="Admin LPSE" <?php if ($row['jabatan'] == "Admin LPSE") {
																												echo "selected";
																											} ?>>Admin LPSE</option>
																		<option
																			value="Unit Administrasi Sistem Elektronik" <?php if ($row['jabatan'] == "Unit Administrasi Sistem Elektronik") {
																																echo "selected";
																															} ?>>Unit Administrasi Sistem Elektronik</option>
																		<option value="Unit Registrasi dan Verifikasi" <?php if ($row['jabatan'] == "Unit Registrasi dan Verifikasi") {
																															echo "selected";
																														} ?>>Unit Registrasi dan Verifikasi</option>
																		<option value="Unit Layanan dan Dukungan" <?php if ($row['jabatan'] == "Unit Layanan dan Dukungan") {
																														echo "selected";
																													} ?>>Unit Layanan dan Dukungan</option>
																	</select>
																	<?= form_error('jabatan_update', '<small class="text-danger pl-3">', '</small>'); ?>
																</div>

																<div class="mb-3 keterangan1"
																	id="form-input-keterangan-update<?= $row['nip'] ?>">
																	<label for="keterangan"
																		class="form-label">Keterangan</label>
																	<select class="form-select form-select mb-3"
																		name="keterangan_update"
																		id="keterangan<?= $row['nip'] ?>">
																		<option value="" <?php if ($row['keterangan'] == "") {
																								echo "selected";
																							} ?>>Pilih Keterangan</option>
																		<option value="Koordinator Unit" <?php if ($row['keterangan'] == "Koordinator Unit") {
																												echo "selected";
																											} ?>>Koordinator Unit</option>
																		<option value="Anggota Unit" <?php if ($row['keterangan'] == "Anggota Unit") {
																											echo "selected";
																										} ?>>Anggota Unit</option>
																	</select>
																</div>

																<div class="mb-3">
																	<label for="email_update">Email</label>
																	<input type="text" name="email_update"
																		value="<?= $row['email']; ?>"
																		class="form-control" id="email_update">
																	<?= form_error('email_update', '<small class="text-danger">', '</small>'); ?>
																</div>

																<div class="mb-3">
																	<label for="notelp_update">No Telepon</label>
																	<input type="text" name="notelp_update"
																		value="<?= $row['notelp']; ?>"
																		class="form-control" id="notelp_update">
																	<?= form_error('notelp_update', '<small class="text-danger">', '</small>'); ?>
																</div>

																<label for="gambar" class="form-label">Foto</label>
																<div class="mb-3">
																	<img src="<?= base_url('assets/img/tim/') . $row['gambar']; ?>"
																		styLe="width:100px" class="img-thumbnail">
																	<br />
																	<input type="file" name="gambar" id="gambar"
																		class="form-control"
																		value="<?= $row['gambar']; ?>">
																	<?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
																</div>

															</div>

															<div class="modal-footer">
																<button type="submit" name="update"
																	class="btn btn-primary" style="margin-right:42%;">
																	<i class="m-lg-1"><img class="img-thumbnails"
																			src="<?php echo base_url(); ?>assets/img/edit.png" /></i>
																	Update</button>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>

									<!-- Hapus Layanan Modal-->
									<div class="modal fade"  style="margin-top:2%;position:fixed;" id="ModalHapus<?= $row['nip'] ?>" tabindex="-1"
										role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
										<div class="modal-content border-0" id="corner">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Apakah Anda ingin
														Menghapus Layanan ini?</h5>
													<button class="close" type="button" data-dismiss="modal"
														aria-label="Close">
														<span aria-hidden="true">×</span>
													</button>
												</div>
												<div class="modal-body">Pilih "Hapus" di bawah jika ingin
													melakukannya !</div>
												<div class="modal-footer">
													<a class="btn btn-warning m-2"
														href="<?= base_url('admin/tim/hapus/') . $row['nip']; ?>"><i>
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
</div>

<?php
	}
?>

<!-- Tambah Layanan Modal-->

<div class="modal fade bd-example-modal-lg" style="margin-top:7%;position:fixed;" id="ModalTambah" tabindex="-1" role="dialog"
	aria-labelledby="myLargeModalLabel" aria-hidden="true">

	<div class="modal-dialog modal-lg">
	<div class="modal-content border-0" id="corner">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="margin-left:40%;">
					Tambah Petugas</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body" style="margin-left:2%; margin-right:2%">
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-6">
							<div class="mb-3">
								<label for="nip">NIP</label>
								<input type="text" name="nip" value="<?= set_value('nip'); ?>" class="form-control"
									id="nip" placeholder="Masukkan NIP Petugas">
								<?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>

							<div class="mb-3">
								<label for="nama">Nama Petugas</label>
								<input type="text" name="nama" value="<?= set_value('nama'); ?>" class="form-control"
									id="nama" placeholder="Masukkan Nama Petugas">
								<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
							</div>

							<div class="mb-3">
								<label for="tempat_lahir">Tempat Lahir</label>
								<input type="text" name="tempat_lahir" value="<?= set_value('tempat_lahir'); ?>"
									class="form-control" id="tempat_lahir" placeholder="Masukkan Tempat Lahir">
								<?= form_error('tempat_lahir', '<small class="text-danger">', '</small>'); ?>
							</div>

							<div class="mb-3">
								<label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
								<input type="date" value="<?= set_value('tanggal_lahir'); ?>" class="form-control"
									id="tanggal_lahir" name="tanggal_lahir">
								<?= form_error('tanggal_lahir', '<small class="text-danger">', '</small>'); ?>
							</div>

						</div>

						<div class="col-sm-6">
							<div class="mb-3">
								<label for="jabatan" class="form-label">Jabatan</label>
								<select class="form-select mb-3 jabatan" value="<?= set_value('jabatan'); ?>"
									name="jabatan" id="jabatan">
									<option value="">Pilih Jabatan</option>
									<option value="Penanggung Jawab LPSE">Penanggung Jawab LPSE</option>
									<option value="Koordinator LPSE">Koordinator LPSE</option>
									<option value="Admin LPSE">Admin LPSE</option>
									<option value="Unit Administrasi Sistem Elektronik">Unit Administrasi Sistem
										Elektronik</option>
									<option value="Unit Registrasi dan Verifikasi">Unit Registrasi dan Verifikasi
									</option>
									<option value="Unit Layanan dan Dukungan">Unit Layanan dan Dukungan</option>
									<?= form_error('jabatan', '<small class="text-danger">', '</small>'); ?>
								</select>
							</div>

							<div class="mb-3" id="form-input-keterangan">
								<label for="Keterangan">Keterangan</label>
								<select class="form-select form-select mb-3 keterangan" name="keterangan"
									id="keterangan" value="<?= set_value('keterangan'); ?>">
									<option value="" selected="">Pilih Keterangan</option>
									<option value="Koordinator Unit">Koordinator Unit</option>
									<option value="Anggota Unit">Anggota Unit</option>
								</select>
							</div>

							<div class="mb-3">
								<label for="email">Email</label>
								<input type="text" name="email" value="<?= set_value('email'); ?>"
									class="form-control" id="email" placeholder="Masukkan Email">
								<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
							</div>


							<div class="mb-3">
								<label for="notelp">No Telepon</label>
								<input type="text" name="notelp" value="<?= set_value('notelp'); ?>"
									class="form-control" id="notelp" placeholder="Masukkan Nomor Telepon">
								<?= form_error('notelp', '<small class="text-danger">', '</small>'); ?>
							</div>

							<div class="mb-3">
								<label for="gambar" class="form-label">Foto</label>
								<input type="file" name="gambar" id="gambar" class="form-control">
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script type="text/javascript">
	//JS untuk Menampilkan Form keterangan
	$(document).ready(function () {
		$("#form-input-keterangan").css("display",
			"none"); //Menghilangkan form-input ketika pertama kali dijalankan
		//form tambah
		$(".jabatan").change(
			function () {
				const jabatan = $("#jabatan option:selected")
					.val(); //Jika radio button "tidak" dipilih maka tampilkan form-inputan
				if (jabatan === 'Unit Administrasi Sistem Elektronik') {
					$("#form-input-keterangan").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
				} else if (jabatan === 'Unit Registrasi dan Verifikasi') {
					$("#form-input-keterangan").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
				} else if (jabatan === 'Unit Layanan dan Dukungan') {
					$("#form-input-keterangan").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
				} else {
					$("#form-input-keterangan").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
				}
			}
		);
	});

</script>

<script type="text/javascript">
	//form update
	$(document).ready(function () {
		const jabatan = $(".jabatan1").val();
		if (jabatan === "Penanggung Jawab LPSE") {
			$(".keterangan1").css("display",
				"none"); //Menghilangkan form-input ketika pertama kali dijalankan
		} else if (jabatan === "Koordinator LPSE") {
			$(".keterangan1").css("display",
				"none"); //Menghilangkan form-input ketika pertama kali dijalankan
		} else if (jabatan === "Admin LPSE") {
			$(".keterangan1").css("display",
				"none"); //Menghilangkan form-input ketika pertama kali dijalankan

		} else {
			$(".keterangan1").css("display",
				"block"); //Menghilangkan form-input ketika pertama kali dijalankan ini form di update?  
		}
	});

</script>

<script>
	// Langkah-Edit 1 (Ketika kita tekan tombol edit)
	//kalau menekan tombol edit, ambil nip sebagai penanda untuk modal mana yang akan di ubah
	function EditModal(val) {
		//Ambil nilai jabatan dari value jabatan yang ada pada modal update dengan nip yang diambil saat klik 
		const jabatan = $(`#jabatan${val} option:selected`).val();
		//Debug, apakah datanya dapat atau tidak
		// console.log(jabatan);
		// console.log(val);
		//if if tau lah ya tauu
		if (jabatan === "Penanggung Jawab LPSE") {
			$(`#form-input-keterangan-update${val}`).css("display",
				"none"); //Menghilangkan form-input ketika pertama kali dijalankan
		} else if (jabatan === "Koordinator LPSE") {
			$(`#form-input-keterangan-update${val}`).css("display",
				"none"); //Menghilangkan form-input ketika pertama kali dijalankan
		} else if (jabatan === "Admin LPSE") {
			$(`#form-input-keterangan-update${val}`).css("display",
				"none"); //Menghilangkan form-input ketika pertama kali dijalankan
		} else {
			$(`#form-input-keterangan-update${val}`).css("display",
				"block"); //Menghilangkan form-input ketika pertama kali dijalankan
		}
	}

	// Langkah-Edit 3 (Ketika mengubah jabatan pada form update)
	function ChangeSelectUpdate(val) {

		//mengambil value yang ada pada jabatan di form update
		const jabatan = $(`#jabatan${val} option:selected`)
			.val(); //Jika radio button "tidak" dipilih maka tampilkan form-inputan

		//if if tau lah ya
		if (jabatan === 'Penanggung Jawab LPSE') {
			$(`#form-input-keterangan-update${val}`).slideUp(
				"fast"); //Efek Slide Down (Menampilkan Form Input)
		} else if (jabatan === 'Koordinator LPSE') {
			$(`#form-input-keterangan-update${val}`).slideUp(
				"fast"); //Efek Slide Down (Menampilkan Form Input)
		} else if (jabatan === 'Admin LPSE') {
			$(`#form-input-keterangan-update${val}`).slideUp(
				"fast"); //Efek Slide Down (Menampilkan Form Input)
		} else {
			$(`#form-input-keterangan-update${val}`).slideDown(
				"fast"); //Efek Slide Up (Menghilangkan Form Input)
		}
	}

</script>


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
