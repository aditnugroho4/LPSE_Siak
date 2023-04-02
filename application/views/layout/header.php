<!DOCTYPE html>
<html lang="en">

<head>


	<?php
$con = mysqli_connect("localhost","root","","LPSE_Siak");
?>
	<meta charset="utf-8">
	<title>LPSE Kabupaten Siak</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicon -->
	<link href="<?php echo base_url(); ?>assets/img/loading.png" rel="icon">

	<!-- Filter Table -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!-- <script src="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css"></script> -->

	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

	<!-- Libraries Stylesheet
	<link href="<?php echo base_url(); ?>assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css"
		rel="stylesheet" /> -->

	<!-- Google Web Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

	<!-- Icon Font Stylesheet -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

	<!-- Style.css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">

	<!-- Customized Bootstrap Stylesheet -->
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">


	<!-- Template Stylesheet -->
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
	<!-- <script src="<?php echo base_url(); ?>assets/js/main.js"></script> -->

	<!-- export tabel -->
	<!-- <script src="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css"></script> -->

	<?php
$userdata = $this->session->userdata();
?>


</head>

<div class="container-fluid position-relative bg-white d-flex p-0">
	<!-- Spinner Start -->

	<!-- Sidebar Start -->
	<div class="sidebar bg-light-dark">
		<nav class="navbar navbar-gray" style="position:relative;">
			<a href="#" class="navbar-brand mx-3 mb2 my-1">
				<img class="img-fluid me-1" alt="Alps" src="<?php echo base_url(); ?>assets/img/logolpse1.png" />
			</a>

			&nbsp;
			&nbsp;

			<div class="d-flex align-items-center ms-3 mb-4" style="margin-left:50%;">
				<div class="position-relative">
					<img class="rounded-circle border border-4 border-dark"
						src="<?= base_url('assets/img/tim/') . $tim['gambar'] ?>" alt=""
						style="width:80px; height:80px;"> </a>
					<div
						class="bg-success rounded-circle border border-2 border-success position-absolute end-0 bottom-0 p-2">
					</div>
				</div>
				<div class="ms-3">
					<h6 class="mb-0"><?= $tim['nama'];?></h6>
					<span><?= $tim['role'];?> LPSE</span>
				</div>
			</div>

			<div class="navbar-nav w-100 ms-0">
				<a href="<?= base_url('admin/dashboard'); ?>" class="nav-item nav-link"><i
						class="fa fa-pie-chart me-2"></i>Dashboard</a>
				<div class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
						<i class="fa fa-users me-2"></i>Pengguna</a>
					<div class="dropdown-menu bg-white">
						<a href="<?= base_url('admin/tim'); ?>" class="dropdown-item fw-bold">Tim LPSE</a>
						<a href="<?= base_url('admin/pengunjung'); ?>" class="dropdown-item fw-bold">Pengunjung</a>
					</div>
				</div>

				<a href="<?= base_url('admin/layanan'); ?>" class="nav-item nav-link"><i
						class="fas fa-hand-paper me-2"></i>Layanan</a>
				<a href="<?= base_url('admin/berita'); ?>" class="nav-item nav-link"><i
						class="fa fa-newspaper me-2"></i>Berita</a>
				<a href="<?= base_url('admin/agenda'); ?>" class="nav-item nav-link"><i
						class="fa fa-calendar me-2"></i>Agenda</a>
				<a href="<?= base_url('admin/galery'); ?>" class="nav-item nav-link"><i
						class="fa fa-image me-2"></i>Galery</a>
				<a href="<?= base_url('admin/dokumen'); ?>" class="nav-item nav-link"><i
						class="fas fa-folder-open me-2"></i>Dokumen</a>
				<a href="chart.html" class="nav-item nav-link"><i class='fa fa-comments me-2'></i>Livechat</a>
			</div>
		</nav>
	</div>
	<!-- Sidebar End -->

	<!-- Content Start -->
	<div class="content">
		<!-- Navbar Start -->
		<nav class="navbar navbar-expand bg-white sticky-top ">
&nbsp;
&nbsp;
&nbsp;
			<div class="ms-4" style="margin-top:1%;">

				<body onload="initClock()">
					<!--digital clock start-->
					<div class="datetime text-dark fw-bold">
						<div class="date">
							<span id="dayname">Day</span>,
							<span id="month">Month</span>
							<span id="daynum">00</span>,
							<span id="year">Year</span>
						</div>
						<div class="time">
							<span id="hour">00</span>:
							<span id="minutes">00</span>:
							<span id="seconds">00</span>
							<span id="period">AM</span>
						</div>
					</div>
				</body>
				&nbsp;
			</div>

			<div class="navbar-nav align-items-center sticky-top px-4 py-0 ms-auto">


				<div class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
						<img class="rounded-circle me-lg-2" src="<?= base_url('assets/img/tim/') . $tim['gambar'] ?>"
							alt="" style="width: 40px; height: 40px;">
						<span class="d-none d-lg-inline-flex fw-bold"><?= $tim['role'];?> LPSE</span>
					</a>
					<div class="dropdown-menu bg-white">
						<a href="<?= base_url('admin/user/profil/') . $tim['nip']; ?>" class="dropdown-item">My
							Profile</a>
						<a href="<?= base_url('auth/logout'); ?>" class="dropdown-item">Log
							Out</a>
					</div>
				</div>
			</div>
		</nav>



		<script type="text/javascript">
			function updateClock() {
				var now = new Date();
				var dname = now.getDay(),
					mo = now.getMonth(),
					dnum = now.getDate(),
					yr = now.getFullYear(),
					hou = now.getHours(),
					min = now.getMinutes(),
					sec = now.getSeconds(),
					pe = "AM";

				if (hou >= 12) {
					pe = "PM";
				}
				if (hou == 0) {
					hou = 12;
				}
				if (hou > 12) {
					hou = hou - 12;
				}

				Number.prototype.pad = function (digits) {
					for (var n = this.toString(); n.length < digits; n = 0 + n);
					return n;
				}

				var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober",
					"November", "Desember"
				];
				var week = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
				var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds", "period"];
				var values = [week[dname], dnum.pad(2), months[mo], yr, hou.pad(2), min.pad(2), sec.pad(2), pe];
				for (var i = 0; i < ids.length; i++)
					document.getElementById(ids[i]).firstChild.nodeValue = values[i];
			}

			function initClock() {
				updateClock();
				window.setInterval("updateClock()", 1);
			}

		</script>






		<!-- Navbar End -->
