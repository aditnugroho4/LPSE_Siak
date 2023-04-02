<?php
$con = mysqli_connect("localhost", "root", "", "LPSE_Siak")
?>


<style>
   .justify{text-align: justify;}

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
					<p class="mb-9 mb-2 text-dark fw-bold"><i class="fas fa-home"></i> &nbsp;Home • Galery</p>
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
						<div class="col-lg-2 text-left">
							<br />
							<div class="card-title">
								<select class="form-select text-dark" name="fetchval"
									id="fetchval" aria-label="Default select example">
									<option value="" disabled="" selected="">Pilih Kategori Galery &nbsp;</option>
									<option value="Kegiatan">Kegiatan</option>
									<option value="Prestasi">Prestasi</option>
								</select>
							</div>
						</div>


						<div class="col-lg-10 text-right">
							<br />
							<a href="" class="btn btn-primary text-right" data-toggle="modal"
								data-target="#ModalTambah">
								<i style=""><img class="img-thumbnails"
										src="<?php echo base_url(); ?>assets/img/tambah.png" /></i>&nbsp;Tambah
								Galery</a>
							</br>


						</div>
					</div>
						<table class="table table-bordered text-dark" width="100%" id="dataTable" cellspacing="0">
							<thead>
								<tr>
									<th class="text-center">Kode Galery</th>
									<th class="text-center">Gambar</th>
									<th class="text-center">Judul Galery</th>
									<th class="text-center">Deskripsi</th>
									<th class="text-center">Kategori</th>
									<th class="text-center">Timestamp</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$query = "SELECT * FROM galery";
								$r = mysqli_query($con, $query);
								while ($row = mysqli_fetch_assoc($r)) {
								?>

								<tr>
									<td class="text-center"><?php echo $row['id_galery'] ?></td>
									<td class="text-center"><img
											src="<?= base_url('assets/img/galeri/') . $row['gambar']; ?>"
											style="width:300px" class="img-thumbnail"></td>
									<td class="text-center"><?php echo $row['judul'] ?></td>
									<td class="text-justify" style="width:400px"><?php echo $row['deskripsi'] ?></td>
									<td class="text-center fw-bold"><?php echo $row['kategori'] ?></td>
									<td class="text-center"><?php echo $row['timestamp'] ?></td>
									<td class="text-center">
										<a href="" data-toggle="modal"
											data-target="#ModalUpdate<?= $row['id_galery'] ?>"
											class="btn btn-danger"><i><img class="img-thumbnails"
													src="<?php echo base_url(); ?>assets/img/edit.png" /></i></a>

										<a href="" class="btn btn-warning m-2" data-toggle="modal"
											data-target="#ModalHapus<?= $row['id_galery'] ?>"><i>
												<img class="img-thumbnails"
													src="<?php echo base_url(); ?>assets/img/hapus.png" /></i></a>
									</td>
								</tr>

								<!-- Update galery Modal-->
								<div class="modal fade" style="margin-top:7%;position:fixed;" id="ModalUpdate<?= $row['id_galery'] ?>"
									tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content" id="corner">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel" style="margin-left:35%;">
													Update galery</h5>
												<button class="close" type="button" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">×</span>
												</button>
											</div>
											<div class="modal-body" style="margin-left:2%; margin-right:2%">
												<form action="" method="POST"
													enctype="multipart/form-data">
													<input type="hidden" name="id_galery"
														value="<?= $row['id_galery']; ?>">


													<div class="form-group">
														<label for="no galery">Kode galery</label>
														<input type="text" name="id_galery"
															value="<?= $row['id_galery']; ?>" class="form-control"
															id="id_galery" disabled="">
													</div>

													<div class="mb-3">
														<label for="gambar" class="form-label">Foto</label>
														<div class="row">
															<div class="col-sm-3">
																<img src="<?= base_url('assets/img/galeri/') . $row['gambar']; ?>"
																	styLe="width:400px" class="img-thumbnail">
															</div>
															<div class="col-sm-9">
																<br />
																<input type="file" name="gambar" id="gambar"
																	class="form-control" value="<?= $row['gambar']; ?>">
																<?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
															</div>
														</div>
													</div>

													<div class="form-group">
														<label for="judul galery">Judul Galery</label>
														<input type="text" name="judul_update" value="<?= $row['judul']; ?>"
															class="form-control" id="judul_update"
															placeholder="Masukkan Judul galery">
														<?= form_error('judul_update', '<small class="text-danger">', '</small>'); ?>
													</div>

													<div class="mb-3">
														<label for="kategori" class="form-label">Kategori</label>
														<select class="form-select form-select mb-3" name="kategori_update"
															id="kategori_update">

															<option value="Kegiatan" <?php if ($row['kategori'] == "Kegiatan") {
																				echo "selected";
																			} ?>>Kegiatan</option>
															<option value="Prestasi" <?php if ($row['kategori'] == "Prestasi") {
																				echo "selected";
																			} ?>>Prestasi</option>
														</select>
														<?= form_error('kategori_update', '<small class="text-danger">', '</small>'); ?>
														</select>
													</div>

													<div class="form-group">
														<label for="deskripsi">Deskripsi Galery</label>
														<textarea class="form-control" style="height: 100px;"
															id="deskripsi_update"
															name="deskripsi_update"><?= $row ['deskripsi']; ?></textarea>
														<?= form_error('deskripsi_update', '<small class="text-danger">', '</small>'); ?>
													</div>

													<div class="modal-footer">
														<button type="submit" name="update" class="btn btn-danger"
															style="margin-right:38%;"> <i><img class="img-thumbnails"
																	src="<?php echo base_url(); ?>assets/img/edit.png" /></i>
															&nbsp;Update</button>

													</div>
												</form>
											</div>
										</div>
									</div>
								</div>

								<!-- Hapus galery Modal-->
								<div class="modal fade" style="margin-top:2%;position:fixed;"  id="ModalHapus<?=$row['id_galery']?>" tabindex="-1"
									role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
									<div class="modal-content border-0" id="corner">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Apakah Anda ingin
													Menghapus Galery ini?</h5>
												<button class="close" type="button" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">×</span>
												</button>
											</div>
											<div class="modal-body">Pilih "Hapus" di bawah jika ingin
												melakukannya !</div>
											<div class="modal-footer">
												<a class="btn btn-warning m-2"
													href="<?= base_url('admin/galery/hapus/') . $row['id_galery'];?>"><i>
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

<!-- Tambah galery Modal-->
<div class="modal fade" id="ModalTambah" style="margin-top:7%;position:fixed;" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" id="corner">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="margin-left:35%;">
					Tambah Galery</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body" style="margin-left:2%; margin-right:2%">
				<form action="" method="POST" enctype="multipart/form-data">


					<div class="form-group">
						<label for="id_galery">Kode Galery</label>

						<!-- Kode ID OTOMATIS-->
						<?php foreach($kd as $data):
							$a= $data['id_galery'];
							$huruf="G-";
							$urutan = (int)substr($a, 2, 3);
							$urutan++;
							$data = $huruf.sprintf("%03s",$urutan);
						?>

						<input type="text" name="id_galery" value="<?php echo $data?>" class="form-control"
							id="id_galery" readonly>

						<?php endforeach; ?>
					</div>

					<div class="mb-3">
						<label for="gambar" class="form-label">Foto</label>
						<input type="file" name="gambar" id="gambar" class="form-control">
						<?= form_error('gambar', '<small class="text-danger">', '</small>'); ?>
					</div>

					<div class="form-group">
						<label for="judul galery">Judul Galery</label>
						<input type="text" name="judul" value="<?= set_value('judul'); ?>" class="form-control"
							id="judul" placeholder="Masukkan Judul Galery">
						<?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
					</div>

					<div class="mb-3">
						<label for="kategori" class="form-label">Kategori</label>
						<select class="form-select mb-3" value="<?= set_value('kategori'); ?>" name="kategori"
							id="kategori">
							<option value="">Pilih Kategori Galery</option>
							<option value="Kegiatan">Kegiatan</option>
							<option value="Prestasi">Prestasi</option>
							<?= form_error('kategori', '<small class="text-danger">', '</small>'); ?>
						</select>
					</div>

					<div class="form-group">
						<label for="deskripsi">Deskripsi Galery</label>
						<textarea class="form-control" style="height: 100px;" id="deskripsi" name="deskripsi"
							placeholder="Masukkan Deskripsi Galery"><?= set_value('deskripsi'); ?></textarea>
						<?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
					</div>

					<div class="modal-footer">
						<button type="submit" name="tambah" class="btn btn-primary" style="margin-right:38%;"> <i
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


<script type="text/javascript">
	$(document).ready(function () {
		$("#fetchval").on('change', function () {
			var value = $(this).val();
			var data = {
				request: value
			}


			$.post("Galery/getKategori", data, function (obj) {
				var data_result = JSON.parse(obj);
				$("#dataTable tbody tr").detach();
				console.log(data_result);

				let tbody = [];

				data_result.map(value => {
					var kategori = "";
					var button = "";

					if (value.kategori === "Kegiatan") {
						kategori =
							`Kegiatan`;
						button =
							`<a href="" data-toggle="modal" data-target="#ModalUpdate${value.id_galery}" class="btn btn-danger"><i><img class="img-thumbnails"
								src="<?php echo base_url(); ?>assets/img/edit.png" /></i></a>
								<a href="" class="btn btn-warning m-2" data-toggle="modal" data-target="#ModalHapus${value.id_galery}"><i><img class="img-thumbnails"
								src="<?php echo base_url(); ?>assets/img/hapus.png" /></i></a>`;

					} else if (value.kategori === "Prestasi") {
						kategori =
							`Prestasi`;
						button =
							`<a href="" data-toggle="modal" data-target="#ModalUpdate${value.id_galery}" class="btn btn-danger"><i><img class="img-thumbnails"
								src="<?php echo base_url(); ?>assets/img/edit.png" /></i></a>
								<a href="" class="btn btn-warning m-2" data-toggle="modal" data-target="#ModalHapus${value.id_galery}"><i><img class="img-thumbnails"
								src="<?php echo base_url(); ?>assets/img/hapus.png" /></i></a>`;
					};

					tbody.push(
						`<tr>
							<td class="text-center">${value.id_galery}</td>
							<td class="text-center"><img src="<?= base_url('assets/img/galeri/')?>${value.gambar}" style="width:150px" class="img-thumbnail"></td>
							<td class="text-center">${value.judul}</td>
							<td class="text-center">${value.deskripsi}</td>
							<td class="text-center fw-bold">${kategori}</td>
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

</script>

<script>

$(document).ready(function () {
		$('#dataTable').DataTable({
			dom: 'Bfrtip',
			buttons: [{
					extend: 'pdfHtml5',
					className: 'text-light bg-danger',
					text: '<i class="fa fa-file-pdf-o">PDF</i>',
					titleAttr: 'PDF',
					alignment: 'center',
					messageTop: 'Berikut Merupakan Daftar Galery LPSE Kabupaten Siak.',
					download: 'open',
					exportOptions: {
						columns: ':visible'
					},
				},
				{
					extend: 'print',
					title: 'Galery LPSE Kabupaten Siak',
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

					
					messageTop: '<br><p class="text-center">Berikut Merupakan Daftar Galery LPSE Kabupaten Siak.</p>',
				},
				{
				extend: 'colvis',
				text: '<i class="fa fa-low-vision"></i>',
				}
			]
		});
	});

</script>
