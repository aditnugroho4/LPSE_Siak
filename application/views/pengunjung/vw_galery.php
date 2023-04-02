<?php
$con = mysqli_connect("localhost", "root", "", "LPSE_Siak")
?>

<head>
	<title>Galery | LPSE Kabupaten Siak</title>
	<meta meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>

<style>
	.justify {
		text-align: justify;
		color: #444444;
	}

	.center {
		text-align: center;
		color: #444444;
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

	.shadow-lg {
		box-shadow: 0 0.5rem 2rem rgba(0, 0, 0, 0.150) !important
	}

</style>



<section class="breadcrumbs">
	<div class="container">

		<header class="section-header" data-aos="fade-up">
			<h2 style="color:#fff;">Galeri</h2>
			<p style="color:#fff;">LPSE Kabupaten Siak</p>
		</header>

	</div>
</section>

<!-- ======= Galery Section ======= -->
<section id="portfolio" class="portfolio">

	<br>
	<br>
	<div class="container" data-aos="fade-up">

		<div class="row" data-aos="fade-up" data-aos-delay="100">
			<div class="col-lg-12 d-flex justify-content-center">
			
				<ul id="portfolio-flters"style="margin-top:4px;">
					<li data-filter="*" class="filter-active">Semua</li>
					<li data-filter=".filter-app">Kegiatan</li>
					<li data-filter=".filter-card">Prestasi</li>
				</ul>
			
			</div>
		</div>
		<br>
		<br>

		<div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

			<?php
								$query = "SELECT * FROM galery where kategori='Kegiatan'";
								$r = mysqli_query($con, $query);
								while ($row = mysqli_fetch_assoc($r)) {
								?>
			<div class="col-lg-4 col-md-6 portfolio-item filter-app">
				<div class="portfolio-wrap" id="corner">
					<img src="<?= base_url('assets/img/galeri/') . $row['gambar']; ?>" class="img-fluid" alt="">
					<div class="portfolio-info">
						<h4><?= $row['judul']; ?></h4>
						<hp><?= $row['timestamp']; ?></p>
						<div class="portfolio-links">
							<a href="<?= base_url('assets/img/galeri/') . $row['gambar']; ?>"
								data-gallery="portfolioGallery" class="portfokio-lightbox"
								title="<?= $row['deskripsi']; ?>"><i class="bi bi-eye"></i></a>

						</div>
					</div>
				</div>
			</div>

			<?php } ?>

			<?php
								$query = "SELECT * FROM galery where kategori='Prestasi'";
								$r = mysqli_query($con, $query);
								while ($row = mysqli_fetch_assoc($r)) {
								?>
			<div class="col-lg-4 col-md-6 portfolio-item filter-card">
				<div class="portfolio-wrap" id="corner">
					<img src="<?= base_url('assets/img/galeri/') . $row['gambar']; ?>" style="width:1000px;height:300px;"class="img-fluid" alt="">
					<div class="portfolio-info">
						<h4><?= $row['judul']; ?></h4>
						<h6>Di posting oleh <b>Admin LPSE</b><br><?= $row['timestamp']; ?></h6>
						<div class="portfolio-links">
							<a href="<?= base_url('assets/img/galeri/') . $row['gambar']; ?>"
								data-gallery="portfolioGallery" class="portfokio-lightbox"
								title="<?= $row['deskripsi']; ?>"><i class="bi bi-eye"></i></a>

						</div>
					</div>
				</div>
			</div>

			<?php } ?>


		</div>

	</div>

	<br>
	<br>
	<br>

</section><!-- End Portfolio Section -->
