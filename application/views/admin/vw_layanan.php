<?php
$con = mysqli_connect("localhost", "root", "", "LPSE_Siak");
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
					<p class="mb-9 mb-2 text-dark fw-bold"><i class="fas fa-home"></i> &nbsp;Home • Layanan</p>
					<br/>
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
								Layanan</a>
							</br>
							</br>
							<table class="table table-bordered text-dark" id="dataTable">
								<thead>
									<tr>
										<th class="text-center">No Layanan</th>
										<th class="text-center">Gambar</th>
										<th class="text-center">Nama Layanan</th>
										<th class="text-center">Deskripsi Layanan</th>
										<th class="text-center">Timestamp</th>
										<th class="text-center">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php

								$query = "SELECT * FROM layanan";
								$r = mysqli_query($con, $query);
								while ($row = mysqli_fetch_assoc($r)) {
								?>
									<tr>
										<td class="text-center"><?php echo $row['id_layanan'] ?></td>
										<td><img src="<?= base_url('assets/img/layanan/') . $row['gambar']; ?>"
												style="width:200px" class="img-thumbnail"></td>
										<td class="text-center"><?php echo $row['nama_layanan'] ?>
										</td>
										<td class="justify" style="width:300px">
											<p class="page-break" ><?php echo $row['deskripsi'] ?></p>
										</td>
										<td class="text-center"><?php echo $row['timestamp'] ?></td>
										<td class="text-center">
											<a href="" data-toggle="modal"
												data-target="#ModalUpdate<?= $row['id_layanan'] ?>"
												class="btn btn-danger"><i><img class="img-thumbnails"
														src="<?php echo base_url(); ?>assets/img/edit.png" /></i></a>

											<a href="" class="btn btn-warning m-2" data-toggle="modal"
												data-target="#ModalHapus<?= $row['id_layanan'] ?>"><i>
													<img class="img-thumbnails"
														src="<?php echo base_url(); ?>assets/img/hapus.png" /></i></a>

										</td>
									</tr>

									<!-- Update Layanan Modal-->
									<div class="modal fade" style="margin-top:4%;position:fixed;"
										id="ModalUpdate<?= $row['id_layanan'] ?>" tabindex="-1" role="dialog"
										aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content"  id="corner">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel"
														style="margin-left:35%;">
														Update Layanan</h5>
													<button class="close" type="button" data-dismiss="modal"
														aria-label="Close">
														<span aria-hidden="true">×</span>
													</button>
												</div>
												<div class="modal-body" style="margin-left:2%; margin-right:2%">
													<form action="" method="POST" enctype="multipart/form-data">
														<input type="hidden" name="id_layanan"
															value="<?= $row['id_layanan']; ?>">

														<div class="form-group">
															<label for="id_layanan">Id Layanan</label>
															<input type="text" name="id_layanan"
																value="<?= $row['id_layanan']; ?>" class="form-control"
																id="id_layanan" readonly>
														</div>

														<div class="form-group">
															<label for="nama layanan">Nama Layanan</label>
															<input type="text" name="nama_layanan_update"
																value="<?= $row['nama_layanan']; ?>"
																class="form-control" id="nama_layanan_update"
																placeholder="Masukkan nama layanan">
															<?= form_error('nama_layanan_update', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>

														<div class="form-group">
															<label for="deskripsi">Deskripsi</label>
															<textarea class="form-control" style="height: 100px;"
																id="deskripsi_update"
																name="deskripsi_update"><?= $row ['deskripsi']; ?></textarea>
															<?= form_error('deskripsi_update', '<small class="text-danger pl-3">', '</small>'); ?>
														</div>

														<div class="mb-3">
															<label for="gambar" class="form-label">Foto</label>
															<div class="row">
																<div class="col-sm-3">
																	<img src="<?= base_url('assets/img/layanan/') . $row['gambar']; ?>"
																		styLe="width:400px" class="img-thumbnail">
																</div>
																<div class="col-sm-9">
																	<br />
																	<input type="file" name="gambar" id="gambar"
																		class="form-control"
																		value="<?= $row['gambar']; ?>">
																	<?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
																</div>
															</div>
														</div>

														<div class="modal-footer">
															<button type="submit" name="update" class="btn btn-danger"
																style="margin-right:38%;"> <i><img
																		class="img-thumbnails"
																		src="<?php echo base_url(); ?>assets/img/edit.png" /></i>
																&nbsp;Update</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>

									<!-- Hapus Layanan Modal-->
									<div class="modal fade" id="ModalHapus<?=$row['id_layanan']?>" tabindex="-1" style="margin-top:2%;position:fixed;" 
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
														href="<?= base_url('admin/layanan/hapus/') . $row['id_layanan'];?>"><i>
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
	<!-- </div>
</div>
</div> -->

<?php
											  }
											?>

<!-- Tambah Layanan Modal-->
<div class="modal fade" id="ModalTambah"style="margin-top:4%;position:fixed;" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content border-0" id="corner" >
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="margin-left:35%;">
					Tambah Layanan</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body" style="margin-left:2%; margin-right:2%">
				<form action="" method="POST" enctype="multipart/form-data">


					<div class="form-group">
						<label for="id_layanan">Id Layanan</label>

						<!-- Kode ID OTOMATIS-->
						<?php foreach($kd as $data):
							$a= $data['id_layanan'];
							$huruf="L-";
							$urutan = (int)substr($a, 2, 3);
							$urutan++;
							$data = $huruf.sprintf("%03s",$urutan);
							?>

						<input type="text" name="id_layanan" value="<?php echo $data?>" class="form-control"
							id="id_layanan" readonly>

						<?php endforeach; ?>
					</div>

					<div class="form-group">
						<label for="nama_layanan">Nama Layanan</label>
						<input type="text" name="nama_layanan" value="<?= set_value('nama_layanan'); ?>"
							class="form-control" id="nama_layanan" placeholder="Masukkan Nama layanan">
						<?= form_error('nama_layanan', '<small class="text-danger">', '</small>'); ?>
					</div>

					<div class="form-group">
						<label for="deskripsi">Deskripsi Layanan</label>
						<textarea class="form-control" style="height: 100px;" id="deskripsi" name="deskripsi"
							placeholder="Masukkan Deskripsi Layanan"><?= set_value('deskripsi'); ?></textarea>
						<?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
					</div>

					<div class="mb-3">
						<label for="gambar" class="form-label">Foto</label>
						<input type="file" name="gambar" id="gambar" class="form-control">


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

