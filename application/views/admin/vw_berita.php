<?php
$con = mysqli_connect("localhost", "root", "", "LPSE_Siak")
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

<script src="<?= base_url('assets/ckeditor/ckeditor.js') ?>"></script>


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

					<p class="mb-9 mb-2 text-dark fw-bold"><i class="fas fa-home"></i> &nbsp;Home • Berita</p>
					<br />
				</div>

				<div class="col-sm-3 text-left">
					<?= $this->session->flashdata('message'); ?>
				</div>
			</div>

			</br>
			<div class="card-title bg-white" style="margin-left:17px">
				<div class="row">
					<div class="card-title shadow-lg" id="corner1">
						<div class="card-body">

					<div class="card-title">
					<div class="row">
						<div class="col-sm-2">
							<br />
							<div>
								<select class="form-select mb-3 text-dark" name="fetchval"
									id="fetchval" aria-label="Default select example">
									<option value="" disabled="" selected="">Pilih Kategori Berita</option>
									<option value="Pengadaan">Pengadaan</option>
									<option value="Pengumuman">Pengumuman</option>
									<option value="Tips and Trik">Tips and Trik</option>
								</select>
							</div>
						</div>

						<div class="col-sm-10 text-right">
							<br />
							<a href="" class="btn btn-primary"  data-toggle="modal"
								data-target="#ModalTambah">
								<i style=""><img class="img-thumbnails"
										src="<?php echo base_url(); ?>assets/img/tambah.png" /></i>&nbsp;Tambah
								Berita</a>
							</br>
							
						</div>
					</div>
						<table class="table table-bordered text-dark" id="dataTable" cellspacing="0">
							<thead>
								<tr>
									<th class="text-center">No Berita</th>
									<th class="text-center">Gambar</th>
									<th class="text-center">Judul Berita</th>
									<th class="text-center">Kategori</th>
									<th class="text-center">Isi Berita</th>
									<th class="text-center">Timestamp</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$query = "SELECT * FROM berita";
								$r = mysqli_query($con, $query);
								while ($row = mysqli_fetch_assoc($r)) {
								?>
								<tr>
									<td class="text-center"><?php echo $row['id_berita'] ?></td>
									<td class="text-center"><img
											src="<?= base_url('assets/img/berita/') . $row['gambar']; ?>"
											style="width:300px" class="img-thumbnail"></td>
									<td class="text-center"><?php echo $row['judul'] ?></td>
									<td class="text-center fw-bold" style="width:100px"><?php echo $row['kategori'] ?></td>

										<?php $convert = $row['konten']; 
										?>
										<td class="text-justify">
											<?php echo htmlspecialchars_decode($convert) ?>
										</td> 

									<td class="text-center"><?php echo $row['timestamp'] ?></td>
									<td class="text-center" style="width:150px">
										<a href="" data-toggle="modal"
											data-target="#ModalUpdate<?= $row['id_berita'] ?>"
											class="btn btn-danger"><i><img class="img-thumbnails"
													src="<?php echo base_url(); ?>assets/img/edit.png" /></i></a>

										<a href="" class="btn btn-warning m-2" data-toggle="modal"
											data-target="#ModalHapus<?= $row['id_berita'] ?>"><i>
												<img class="img-thumbnails"
													src="<?php echo base_url(); ?>assets/img/hapus.png" /></i></a>
									</td>
								</tr>

								<!-- Update berita Modal-->
										<div class="modal fade bd-example-modal-lg"
											style="margin-top:1%;position:fixed;"
											id="ModalUpdate<?= $row['id_berita'] ?>" tabindex="-1" role="dialog"
											aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
													<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel" style="margin-left:43%;">
															Update Berita</h5>
														<button class="close" type="button" data-dismiss="modal"
															aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
													</div>
													<div class="modal-body" style="margin-left:2%; margin-right:2%">
														<form action="" method="POST" enctype="multipart/form-data">
															<input type="hidden" name="id_berita"
																value="<?= $row['id_berita']; ?>">


															<div class="form-group">
																<label for="no berita">No Berita</label>
																<input type="text" name="id_berita"
																	value="<?= $row['id_berita']; ?>"
																	class="form-control" id="id_berita" disabled="">
															</div>

															<div class="mb-3">
																<label for="gambar" class="form-label">Foto</label>
																<div class="row">
																	<div class="col-sm-3">
																		<img src="<?= base_url('assets/img/berita/') . $row['gambar']; ?>"
																			style="width:200px" class="img-thumbnail">
																	</div>
																	<div class="col-sm-9">
																		<br />
																		<input type="file" name="gambar" id="gambar"
																			class="form-control"
																			value="<?= $row['gambar']; ?>">
																		<?= form_error('gambar', '<small class="text-danger">', '</small>'); ?>
																	</div>
																</div>
															</div>

															<div class="form-group">
																<label for="judul berita">Judul Berita</label>
																<input type="text" name="judul_update"
																	value="<?= $row['judul']; ?>" class="form-control"
																	id="judul_update"
																	placeholder="Masukkan Judul Berita">
																<?= form_error('judul_update', '<small class="text-danger">', '</small>'); ?>
															</div>

															<div class="mb-3">
																<label for="kategori"
																	class="form-label">Kategori</label>
																<select class="form-select form-select mb-3"
																	name="kategori_update" id="kategori_update">

																	<option value="Pengadaan" <?php if ($row['kategori'] == "Pengadaan") {
																				echo "selected";
																			} ?>>Pengadaan</option>
																	<option value="Pengumuman" <?php if ($row['kategori'] == "Pengumuman") {
																				echo "selected";
																			} ?>>Pengumuman</option>

																	<option value="Tips and Trik" <?php if ($row['kategori'] == "Tips and Trik") {
																				echo "selected";
																			} ?>>Tips & Trik</option>
																</select>
																<?= form_error('kategori_update', '<small class="text-danger">', '</small>'); ?>
																</select>
															</div>

															<div class="form-group">
																<label for="isi berita">Isi Berita</label>
																<textarea class="form-control" style="height: 300px;"
																	id="konten<?= $row ['id_berita']; ?>"
																	name="konten"><?= $row ['konten']; ?></textarea>
																<?= form_error('konten_update', '<small class="text-danger">', '</small>'); ?>
															</div>

															<div class="modal-footer">
																<button type="submit" name="update"
																	class="btn btn-danger" style="margin-right:40%;">
																	<i><img class="img-thumbnails"
																			src="<?php echo base_url(); ?>assets/img/edit.png" /></i>
																	&nbsp;Update</button>

															</div>
														</form>
													</div>
												</div>
											</div>
										</div>

								<!-- Hapus berita Modal-->
								<div class="modal fade" style="margin-top:2%;position:fixed;" id="ModalHapus<?=$row['id_berita']?>"
									tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
									<div class="modal-content border-0" id="corner">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Apakah Anda ingin
													Menghapus Berita ini?</h5>
												<button class="close" type="button" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">×</span>
												</button>
											</div>
											<div class="modal-body">Pilih "Hapus" di bawah jika ingin
												melakukannya !</div>
											<div class="modal-footer">
												<a class="btn btn-warning m-2"
													href="<?= base_url('admin/Berita/hapus/') . $row['id_berita'];?>"><i>
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

<script>
	CKEDITOR.replace('konten<?= $row ['id_berita']; ?>');
	</script>

<?php
											  }
											?>

<!-- Tambah Berita Modal-->
<div class="modal fade bd-example-modal-lg" id="ModalTambah" style="margin-top:1%;position:fixed;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" id="corner">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="margin-left:43%;">
					Tambah Berita</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body" style="margin-left:2%; margin-right:2%">
				<form action="" method="POST" enctype="multipart/form-data">


					<div class="form-group">
						<label for="id_berita">No Berita</label>

						<!-- Kode ID OTOMATIS-->
						<?php foreach($kd as $data):
							$a= $data['id_berita'];
							$huruf="B-";
							$urutan = (int)substr($a, 2, 3);
							$urutan++;
							$data = $huruf.sprintf("%03s",$urutan);
						?>

						<input type="text" name="id_berita" value="<?php echo $data?>" class="form-control"
							id="id_berita" readonly>

						<?php endforeach; ?>
					</div>

					<div class="mb-3">
						<label for="gambar" class="form-label">Foto</label>
						<input type="file" name="gambar" id="gambar" class="form-control">
						<?= form_error('gambar', '<small class="text-danger">', '</small>'); ?>
					</div>

					<div class="form-group">
						<label for="judul berita">Judul berita</label>
						<input type="text" name="judul" value="<?= set_value('judul'); ?>" class="form-control"
							id="judul" placeholder="Masukkan Judul Berita">
						<?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
					</div>

					<div class="form-group">
						<label for="kategori" class="form-label">Kategori</label>
						<select class="form-select mb-3" value="<?= set_value('kategori'); ?>" name="kategori"
							id="kategori">
							<option value="">Pilih Kategori Berita</option>
							<option value="Pengadaan">Pengadaan</option>
							<option value="Pengumuman">Pengumuman</option>
							<option value="Tips and Trik">Tips & Trik</option>
						</select>
						<?= form_error('kategori', '<small class="text-danger">', '</small>'); ?>
					</div>


					<div class="form-group">
						<label for="isi agenda">Isi Berita</label>
						<textarea class="form-control" style="height: 100px;" id="konten" name="konten"
							placeholder="Masukkan Isi Agenda"><?= set_value('konten'); ?></textarea>
						<?= form_error('konten', '<small class="text-danger">', '</small>'); ?>
					</div>

					<div class="modal-footer">
						<button type="submit" name="tambah" class="btn btn-primary" style="margin-right:40%;"> <i
								class="m-lg-1"><img class="img-thumbnails"
									src="<?php echo base_url(); ?>assets/img/tambah.png" /></i>
							Tambah</button>

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

<script>
	CKEDITOR.replace('konten');


	</script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$("#fetchval").on('change', function () {
			var value = $(this).val();
			var data = {
				request: value
			}

			$.post("Berita/getKategori", data, function (obj) {
				var data_result = JSON.parse(obj);
				$("#dataTable tbody tr").detach();
				console.log(data_result);

				let tbody = [];

				data_result.map(value => {
					var kategori = "";
					var button = "";


					if (value.kategori === "Pengadaan") {
						kategori =
							`Pengadaan`;
						button =
							`<a href="" data-toggle="modal" data-target="#ModalUpdate${value.id_berita}" class="btn btn-danger"><i><img class="img-thumbnails"
								src="<?php echo base_url(); ?>assets/img/edit.png" /></i></a>
								<a href="" class="btn btn-warning m-2" data-toggle="modal" data-target="#ModalHapus${value.id_berita}"><i><img class="img-thumbnails"
								src="<?php echo base_url(); ?>assets/img/hapus.png" /></i></a>`;

					} else if (value.kategori === "Pengumuman") {
						kategori =
							`Pengumuman`;
						button =
							`<a href="" data-toggle="modal" data-target="#ModalUpdate${value.id_berita}" class="btn btn-danger"><i><img class="img-thumbnails"
								src="<?php echo base_url(); ?>assets/img/edit.png" /></i></a>
								<a href="" class="btn btn-warning m-2" data-toggle="modal" data-target="#ModalHapus${value.id_berita}"><i><img class="img-thumbnails"
								src="<?php echo base_url(); ?>assets/img/hapus.png" /></i></a>`;

					} else if (value.kategori === "Tips and Trik") {
						kategori =
							`Tips and Trik`;
						button =
							`<a href="" data-toggle="modal" data-target="#ModalUpdate${value.id_berita}" class="btn btn-danger"><i><img class="img-thumbnails"
								src="<?php echo base_url(); ?>assets/img/edit.png" /></i></a>
								<a href="" class="btn btn-warning m-2" data-toggle="modal" data-target="#ModalHapus${value.id_berita}"><i><img class="img-thumbnails"
								src="<?php echo base_url(); ?>assets/img/hapus.png" /></i></a>`;
					};

					tbody.push(
						`<tr>
							<td class="text-center">${value.id_berita}</td>
							<td class="text-center"><img src="<?= base_url('assets/img/berita/')?>${value.gambar}" style="width:150px" class="img-thumbnail"></td>
							<td class="text-center">${value.judul}</td>
							<td class="text-center fw-bold">${kategori}</td>
							<td class="text-justify">${value.konten}</td>
							<td class="text-center">${value.timestamp}</td>
							<td class="text-center">${button}</td>
						</tr>`);
				});
				$('#dataTable').append(tbody);
			}).fail(function () {
				alert("Data tidak di temukan!");
			});

		});
	});


	$(document).ready(function () {
		$('#dataTable').DataTable({
			dom: 'Bfrtip',
			buttons: [{
					extend: 'pdfHtml5',
					className: 'text-light bg-danger',
					text: '<i class="fa fa-file-pdf-o">  PDF</i>',
					titleAttr: 'PDF',
					alignment: 'center',
					messageTop: '<br><br><br><p>Berikut Merupakan Daftar Berita LPSE Kabupaten Siak.</p>',
					download: 'open',
					exportOptions: {
						columns: ':visible'
					},
				},
				
				{
					extend: 'print',
					title: 'Berita LPSE Kabupaten Siak',
					className: 'text-light bg-primary',
					text: '<i class="fa fa-print"> Print</i>',
					customize: function (win) {
						$(win.document.body).find('table')
							.addClass('compact')
							.css('font-size', 'inherit');

							$(win.document.body)
							.css('font-size', '15pt')
							.prepend(
								'<img src="<?= base_url('assets/img/logolpse1.png')?>" class="container" style="width:30%; margin-left:72%; right:10%;" />'
							);

							
							$(win.document.body)
							.css('font-size', '15pt')
							.prepend(
								'<img src="<?= base_url('assets/img/logolpse1.png')?>" class="container" style="position:absolute; opacity: 0.1;top:35%;" />'
							);
					},
					exportOptions: {
						columns: ':visible'
					},


					messageTop: '<br><p class="text-center">Berikut Merupakan Daftar Berita LPSE Kabupaten Siak.</p>',
				},
				{
				extend: 'colvis',
				text: '<i class="fa fa-low-vision"></i>',
				}
			]
		});
	});

</script>
