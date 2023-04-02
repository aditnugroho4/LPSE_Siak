<?php
$con = mysqli_connect("localhost", "root", "", "LPSE_Siak")
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
					<p class="mb-9 mb-2 text-dark fw-bold"><i class="fas fa-home"></i> &nbsp;Home • Dokumen</p>
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
											<select class="form-select mb-3 text-dark" name="fetchval" id="fetchval"
												aria-label="Default select example">
												<option value="" disabled="" selected="">Pilih Kategori Dokumen</option>
												<option value="SOP">SOP</option>
												<option value="Regulasi">Regulasi</option>
												<option value="Panduan">Panduan</option>
											</select>
										</div>
									</div>


									<div class="col-sm-10 text-right">
										<br />
										<a href="" class="btn btn-primary text-right" data-toggle="modal"
											data-target="#ModalTambah">
											<i style=""><img class="img-thumbnails"
													src="<?php echo base_url(); ?>assets/img/tambah.png" /></i>&nbsp;Tambah
											Dokumen</a>
										</br>


									</div>
								</div>

								<table class="table table-bordered text-dark" id="dataTable" cellspacing="0">
									<thead>
										<tr>
											<th class="text-center">No Dokumen</th>
											<th class="text-center">Nama Dokumen</th>
											<th class="text-center">Kategori</th>
											<th class="text-center">Berkas</th>
											<th class="text-center">Size</th>
											<th class="text-center">Timestamp</th>
											<th class="text-center">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
								$query = "SELECT * FROM dokumen";
								$r = mysqli_query($con, $query);
								while ($row = mysqli_fetch_assoc($r)) {
								?>
										<tr>
											<td class="text-center"><?php echo $row['id_dokumen'] ?></td>
											<td class="text-center"><?php echo $row['judul'] ?></td>
											<td class="text-center fw-bold"><?php echo $row['kategori'] ?></td>
											<td class="text-center"><?php echo $row['berkas'] ?></td>
											<td class="text-center"><?= $row['size'] ?> Byte</td>
											<td class="text-center"><?php echo $row['timestamp'] ?></td>
											<td class="text-center">
												<a href="" data-toggle="modal"
													data-target="#ModalUpdate<?= $row['id_dokumen'] ?>"
													class="btn btn-danger"><i><img class="img-thumbnails"
															src="<?php echo base_url(); ?>assets/img/edit.png" /></i></a>

												<a href="" class="btn btn-warning m-2" data-toggle="modal"
													data-target="#ModalHapus<?= $row['id_dokumen'] ?>"><i>
														<img class="img-thumbnails"
															src="<?php echo base_url(); ?>assets/img/hapus.png" /></i></a>

												<a href="<?= base_url('dokumen/download/') ?><?= $row['id_dokumen'] ?>"
													class="btn btn-success">
													<i><img class="img-thumbnails"
															src="<?php echo base_url(); ?>assets/img/download.png" /></i></a>
											</td>
										</tr>

										<!-- Update dokumen Modal-->
										<div class="modal fade" style="margin-top:7%;position:fixed;"
											id="ModalUpdate<?= $row['id_dokumen'] ?>" tabindex="-1" role="dialog"
											aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content"id="corner">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel"
															style="margin-left:35%;">
															Update Dokumen</h5>
														<button class="close" type="button" data-dismiss="modal"
															aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
													</div>
													<div class="modal-body" style="margin-left:2%; margin-right:2%">
														<form action="" method="POST" enctype="multipart/form-data">
															<input type="hidden" name="id_dokumen"
																value="<?= $row['id_dokumen']; ?>">
															<div class="form-group">
																<label for="id_dokumen">No dokumen</label>
																<input type="text" name="id_dokumen"
																	value="<?= $row['id_dokumen']; ?>"
																	class="form-control" id="id_dokumen" disabled="">
															</div>

															<div class="form-group">
																<label for="judul">Judul dokumen</label>
																<input type="text" name="judul_update"
																	value="<?= $row['judul']; ?>" class="form-control"
																	id="judul_update"
																	placeholder="Masukkan Judul dokumen">
																<?= form_error('judul_update', '<small class="text-danger">', '</small>'); ?>
															</div>

															<div class="mb-3">
																<label for="kategori"
																	class="form-label">Kategori</label>
																<select class="form-select form-select mb-3"
																	name="kategori_update" id="kategori_update">

																	<option value="SOP" <?php if ($row['kategori'] == "SOP") {
																				echo "selected";
																			} ?>>SOP</option>
																	<option value="Regulasi" <?php if ($row['kategori'] == "Regulasi") {
																				echo "selected";
																			} ?>>Regulasi</option>

																	<option value="Panduan" <?php if ($row['kategori'] == "Panduan") {
																				echo "selected";
																			} ?>>Panduan</option>
																</select>
																<?= form_error('kategori_update', '<small class="text-danger">', '</small>'); ?>
																</select>
															</div>


															<div class="mb-3">
																<label for="berkas">Berkas</label>
																<input type="text" name="berkas"
																	value="<?php echo $row['berkas'];?>"
																	class="form-control" id="berkas" disabled="">
																<input type="file" name="berkas" id="berkas"
																	class="form-control" value="<?= $row['berkas']; ?>">
																<?= form_error('berkas', '<small class="text-danger">', '</small>'); ?>
															</div>

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

							<!-- Hapus dokumen Modal-->
							<div class="modal fade" style="margin-top:2%;position:fixed;"  id="ModalHapus<?=$row['id_dokumen']?>" tabindex="-1" role="dialog"
								aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content border-0" id="corner">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Apakah Anda ingin
												Menghapus dokumen ini?</h5>
											<button class="close" type="button" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
										</div>
										<div class="modal-body">Pilih "Hapus" di bawah jika ingin
											melakukannya !</div>
										<div class="modal-footer">
											<a class="btn btn-warning m-2"
												href="<?= base_url('admin/dokumen/hapus/') . $row['id_dokumen'];?>"><i>
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

<!-- Tambah dokumen Modal-->
<div class="modal fade" id="ModalTambah" style="margin-top:7%;position:fixed;"  tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content border-0" id="corner">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="margin-left:35%;">
					Tambah dokumen</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body" style="margin-left:2%; margin-right:2%">
				<form action="" method="POST" enctype="multipart/form-data">


					<div class="form-group">
						<label for="id_dokumen">No dokumen</label>

						<!-- Kode ID OTOMATIS-->
						<?php foreach($kd as $data):
							$a= $data['id_dokumen'];
							$huruf="D-";
							$urutan = (int)substr($a, 2, 3);
							$urutan++;
							$data = $huruf.sprintf("%03s",$urutan);
						?>

						<input type="text" name="id_dokumen" value="<?php echo $data?>" class="form-control"
							id="id_dokumen" readonly>
						<?php endforeach; ?>
					</div>

					<div class="form-group">
						<label for="judul dokumen">Judul dokumen</label>
						<input type="text" name="judul" value="<?= set_value('judul'); ?>" class="form-control"
							id="judul" placeholder="Masukkan Judul dokumen">
						<?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
					</div>


					<div class="mb-3">
						<label for="kategori" class="form-label">Kategori</label>
						<select class="form-select mb-3" value="<?= set_value('kategori'); ?>" name="kategori"
							id="kategori">
							<option value="">Pilih Kategori Dokumen</option>
							<option value="SOP">SOP</option>
							<option value="Regulasi">Regulasi</option>
							<option value="Panduan">Panduan</option>
						</select>
						<?= form_error('kategori', '<small class="text-danger">', '</small>'); ?>
					</div>

					<div class="mb-3">
						<label for="berkas" class="form-label">Berkas</label>
						<input type="file" name="berkas" id="berkas" class="form-control">
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

			$.post("Dokumen/getKategori", data, function (obj) {
				var data_result = JSON.parse(obj);
				$("#dataTable tbody tr").detach();
				console.log(data_result);

				let tbody = [];

				data_result.map(value => {
					var kategori = "";
					var button = "";

					if (value.kategori === "SOP") {
						kategori =
							`SOP`;
						button =
							`<a href="" data-toggle="modal" data-target="#ModalUpdate${value.id_dokumen}" class="btn btn-danger"><i><img class="img-thumbnails"
								src="<?php echo base_url(); ?>assets/img/edit.png" /></i></a>
							<a href="" class="btn btn-warning m-2" data-toggle="modal" data-target="#ModalHapus${value.id_dokumen}"><i><img class="img-thumbnails"
								src="<?php echo base_url(); ?>assets/img/hapus.png" /></i></a>
							<a href="<?= base_url('dokumen/download/') ?>${value.id_dokumen}"class="btn btn-success">
							<i><img class="img-thumbnails" src="<?php echo base_url(); ?>assets/img/download.png" /></i></a>`;

					} else if (value.kategori === "Regulasi") {
						kategori =
							`Regulasi`;
						button =
							`<a href="" data-toggle="modal" data-target="#ModalUpdate${value.id_dokumen}" class="btn btn-danger"><i><img class="img-thumbnails"
								src="<?php echo base_url(); ?>assets/img/edit.png" /></i></a>
							<a href="" class="btn btn-warning m-2" data-toggle="modal" data-target="#ModalHapus${value.id_dokumen}"><i><img class="img-thumbnails"
								src="<?php echo base_url(); ?>assets/img/hapus.png" /></i></a>
							<a href="<?= base_url('dokumen/download/') ?>${value.id_dokumen}"class="btn btn-success">
								<i><img class="img-thumbnails" src="<?php echo base_url(); ?>assets/img/download.png" /></i></a>`;

					} else if (value.kategori === "Panduan") {
						kategori =
							`Panduan`;
						button =
							`<a href="" data-toggle="modal" data-target="#ModalUpdate${value.id_dokumen}" class="btn btn-danger"><i><img class="img-thumbnails"
								src="<?php echo base_url(); ?>assets/img/edit.png" /></i></a>
							<a href="" class="btn btn-warning m-2" data-toggle="modal" data-target="#ModalHapus${value.id_dokumen}"><i><img class="img-thumbnails"
								src="<?php echo base_url(); ?>assets/img/hapus.png" /></i></a>
							<a href="<?= base_url('dokumen/download/') ?>${value.id_dokumen}"class="btn btn-success">
								<i><img class="img-thumbnails" src="<?php echo base_url(); ?>assets/img/download.png" /></i></a>`;
					};

					tbody.push(
						`<tr>
							<td class="text-center">${value.id_dokumen}</td>
							<td class="text-center">${value.judul}</td>
							<td class="text-center fw-bold">${kategori}</td>
							<td class="text-center">${value.berkas}</td>
							<td class="text-center">${value.size}&nbsp; Byte</td>
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
					messageTop: 'Berikut Merupakan Daftar Dokumen LPSE Kabupaten Siak.',
					download: 'open',
					exportOptions: {
						columns: ':visible'
					},
				},

				{
					extend: 'print',
					title: 'Dokumen LPSE Kabupaten Siak',
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


					messageTop: '<br><p class="text-center">Berikut Merupakan Daftar Dokumen LPSE Kabupaten Siak.</p>',
				},
				{
					extend: 'colvis',
					text: '<i class="fa fa-low-vision"></i>',
				}
			]
		});
	});

</script>
