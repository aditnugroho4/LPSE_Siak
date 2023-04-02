<?php
$con = mysqli_connect("localhost", "root", "", "LPSE_Siak")
?>

<style>
	.justify {
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
					<p class="mb-9 mb-2 text-dark fw-bold"><i class="fas fa-home"></i> &nbsp;Home • Agenda</p>
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
						<div class="card-body my-3">
						<a href="" class="btn btn-primary" data-toggle="modal" data-target="#ModalTambah">
							<i style=""><img class="img-thumbnails"
									src="<?php echo base_url(); ?>assets/img/tambah.png" /></i>&nbsp;Tambah
							Agenda</a>
						</br>
						</br>
						
						<table class="table table-bordered text-dark" id="dataTable" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th class="text-center">No Agenda</th>
									<th class="text-center">Nama Agenda</th>
									<th class="text-center">Isi Agenda</th>
									<th class="text-center">Tanggal Agenda</th>
									<th class="text-center">Waktu Agenda</th>
									<th class="text-center">Timestamp</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$query = "SELECT * FROM agenda";
								$r = mysqli_query($con, $query);
								while ($row = mysqli_fetch_assoc($r)) {
								?>
								<tr>
									<td class="text-center"><?php echo $row['id_agenda'] ?></td>
									<td class="text-center"><?php echo $row['nama'] ?></td>

									<td class="text-justify" style="width:400px">
										<?php $str = $row['deskripsi']; 
										echo htmlspecialchars_decode($str);
										?></td>

									<?php 
										$oldDate = strtotime($row['waktu']);
										$newDate = date('Y-m-d',$oldDate);
									?>
									<td class="text-center"><?php echo $newDate ?></td>
									<?php 
										$oldDate = strtotime($row['waktu']);
										$newDate = date('H:i',$oldDate);
									?>
									<td class="text-center"><?php echo $newDate ?></td>

									<td class="text-center"><?php echo $row['timestamp'] ?></td>
									<td class="text-center">
										<a href="" data-toggle="modal"
											data-target="#ModalUpdate<?= $row['id_agenda'] ?> "
											class="btn btn-danger"><i><img class="img-thumbnails"
													src="<?php echo base_url(); ?>assets/img/edit.png" /></i></a>

										<a href="" class="btn btn-warning m-2" data-toggle="modal"
											data-target="#ModalHapus<?= $row['id_agenda'] ?>"><i>
												<img class="img-thumbnails"
													src="<?php echo base_url(); ?>assets/img/hapus.png" /></i></a>
									</td>
								</tr>

								<!-- Update agenda Modal-->
								<div class="modal fade bd-example-modal-lg"  style="margin-top:7%;position:fixed;" id="ModalUpdate<?= $row['id_agenda'] ?>" tabindex="-1"
									role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content border-0" id="corner">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel" style="margin-left:35%;">
													Update agenda</h5>
												<button class="close" type="button" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">×</span>
												</button>
											</div>
											<div class="modal-body" style="margin-left:2%; margin-right:2%">
												<form action="" method="POST"
													enctype="multipart/form-data">
													<input type="hidden" name="id_agenda"
														value="<?= $row['id_agenda']; ?>">

													<div class="form-group">
														<label for="id_agenda">No agenda</label>
														<input type="text" name="id_agenda"
															value="<?= $row['id_agenda']; ?>" class="form-control"
															id="id_agenda" disabled="">
													</div>
													<div class="form-group">
														<label for="judul">Judul Agenda</label>
														<input type="text" name="nama_update" value="<?= $row['nama']; ?>"
															class="form-control" id="nama_update"
															placeholder="Masukkan Judul Agenda">
														<?= form_error('nama_update', '<small class="text-danger">', '</small>'); ?>
													</div>
													<div class="form-group">
														<label for="deskripsi">Isi Agenda</label>
														<textarea class="form-control" style="height: 300px;"
															id="deskripsi<?= $row ['id_agenda']; ?>" name="deskripsi"><?= $row ['deskripsi']; ?></textarea>
														<?= form_error('deskripsi_update', '<small class="text-danger">', '</small>'); ?>
													</div>
                                                    <div class="mb-3">
														<label for="timestamp" class="form-label">Jadwal Agenda</label>
														<input type="datetime-local" value="<?= $row['waktu']; ?>"
															class="form-control" id="waktu_update" name="waktu_update">
														<?= form_error('waktu_update', '<small class="text-danger">', '</small>'); ?>
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


								<!-- Hapus Agenda Modal-->
								<div class="modal fade" style="margin-top:2%;position:fixed;"  id="ModalHapus<?=$row['id_agenda']?>" tabindex="-1"
									role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
									<div class="modal-content border-0" id="corner">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Apakah Anda ingin
													Menghapus Agenda ini?</h5>
												<button class="close" type="button" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">×</span>
												</button>
											</div>
											<div class="modal-body">Pilih "Hapus" di bawah jika ingin
												melakukannya !</div>
											<div class="modal-footer">
												<a class="btn btn-warning m-2"
													href="<?= base_url('admin/agenda/hapus/') . $row['id_agenda'];?>"><i>
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
	CKEDITOR.replace('deskripsi<?= $row ['id_agenda']; ?>');
	</script>
<?php
											  }
											?>

</tbody>
</table>

<!-- Tambah agenda Modal-->
<div class="modal fade bd-example-modal-lg" id="ModalTambah" style="margin-top:5%;position:fixed;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content border-0" id="corner">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="margin-left:35%;">
					Tambah Agenda</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body" style="margin-left:2%; margin-right:2%">
				<form action="" method="POST" enctype="multipart/form-data">


					<div class="form-group">
						<label for="id_agenda">No agenda</label>

						<!-- Kode ID OTOMATIS-->
						<?php foreach($kd as $data):
							$a= $data['id_agenda'];
							$huruf="A-";
							$urutan = (int)substr($a, 2, 3);
							$urutan++;
							$data = $huruf.sprintf("%03s",$urutan);
						?>

						<input type="text" name="id_agenda" value="<?php echo $data?>" class="form-control"
							id="id_agenda" readonly>
						<?php endforeach; ?>
					</div>

					<div class="form-group">
						<label for="judul agenda">Judul Agenda</label>
						<input type="text" name="nama" value="<?= set_value('nama'); ?>" class="form-control"
							id="nama" placeholder="Masukkan Judul Agenda">
						<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
					</div>

					<div class="form-group">
						<label for="harga">Isi Agenda</label>
						<textarea class="form-control" style="height: 100px;" id="deskripsi"
							name="deskripsi" placeholder="Masukkan Deskripsi Layanan"><?= set_value('deskripsi'); ?></textarea>
						<?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
					</div>

					<div class="mb-3">
						<label for="waktu" class="form-label">Jadwal Agenda</label>
						<input type="datetime-local" value="<?= set_value('waktu'); ?>" class="form-control"
							id="waktu" name="waktu">
						<?= form_error('waktu', '<small class="text-danger">', '</small>'); ?>
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

</div>
</div>
</div>
</div>
</div>

<script>
	CKEDITOR.replace('deskripsi');


	</script>

	



<script>
$(document).ready(function () {
		$('#dataTable').DataTable({
			dom: 'Bfrtip',
			buttons: [{
					extend: 'pdfHtml5',
					className: 'text-light bg-danger',
					text: '<i class="fa fa-file-pdf-o">  PDF</i>',
					titleAttr: 'PDF',
					messageTop: 'Berikut Merupakan Daftar Agenda Kegiatan LPSE Kabupaten Siak.',
					download: 'open',
					exportOptions: {
					columns: ':visible'
					},

				},		
				{
					extend: 'print',
					title: 'Agenda LPSE Kabupaten Siak',
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

					
					messageTop: '<br><p class="text-center">Berikut Merupakan Daftar Agenda LPSE Kabupaten Siak.</p>',
				},
				{
				extend: 'colvis',
				text: '<i class="fa fa-low-vision"></i>',
				}
			]
		});
	});
</script>

