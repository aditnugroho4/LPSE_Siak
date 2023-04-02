<?php
$con = mysqli_connect("localhost","root","","LPSE_Siak");
?>

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="description">

	<meta content="" name="keywords">
	<!-- Favicons -->
	<link href="<?php echo base_url(); ?>assets/imgPengunjung/loading.png" rel="icon">
	<link href="<?php echo base_url(); ?>assets/imgPengunjung/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link
		href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
		rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="<?php echo base_url(); ?>assets/vendorPengunjung/aos/aos.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/vendorPengunjung/bootstrap/css/bootstrap.min.css"
		rel="stylesheet">

	<link href="<?php echo base_url(); ?>assets/vendorPengunjung/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/vendorPengunjung/bootstrap-icons/bootstrap-icons.css"
		rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/vendorPengunjung/glightbox/css/glightbox.min.css"
		rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/vendorPengunjung/remixicon/remixicon.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/vendorPengunjung/swiper/swiper-bundle.min.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="<?php echo base_url(); ?>assets/cssPengunjung/styleHome.css" rel="stylesheet">


	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	<script src="<?= base_url('assets/ckeditor/ckeditor.js') ?>"></script>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
	<link href=" https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/4.0.2/bootstrap-material-design.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js">
	<link href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js">
	<link href="<?php echo base_url(); ?>assets/css/styleChat.css" rel="stylesheet">

</head>


<body>
	<!-- ======= Header ======= -->
	<header id="header" class="header fixed-top d-flex align-items-center">
		<div class="container-fluid container-xxl d-flex align-items-center justify-content-between">

			<h1 class="logo me-auto" style="width:15%;"><img class="img-fluid"
					src="<?php echo base_url(); ?>assets/imgPengunjung/logolpse1.png"></h1>

			<nav id="navbar" class="navbar">
				<ul>
					<li><a class="nav-link scrollto bold" href="<?= base_url('Home'); ?>">Beranda</a></li>
					<li><a class="nav-link scrollto" href="<?= base_url('About_Us'); ?>">Tentang</a></li>
					<li><a class="nav-link scrollto" href="<?= base_url('Layanan'); ?>">Layanan</a></li>
					<li><a class="nav-link scrollto" href="<?= base_url('Berita'); ?>">Berita</a></li>
					<li><a class="nav-link scrollto " href="<?= base_url('Galery'); ?>">Galeri</a></li>
					<li class="dropdown"><a href=""><span>Dokumen</span> <i class="bi bi-chevron-down"></i></a>
						<ul>
							<li><a href="<?= base_url('Dokumen/SOP'); ?>">SOP</a></li>
							<li><a href="<?= base_url('Dokumen/Regulasi'); ?>">Regulasi</a></li>
							<li><a href="<?= base_url('Dokumen/Panduan'); ?>">Panduan</a></li>
						</ul>
					</li>

					<li><a class="nav-link scrollto" href="<?= base_url('ContactUs'); ?>">Kontak Kami</a></li>
				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav><!-- .navbar -->

		</div>
	</header><!-- End Header -->


		</script>
