<?php
$con = mysqli_connect("localhost", "root", "", "LPSE_Siak")
?>

<head>
	<meta charset="utf-8">

	<meta content="" name="description">
	<meta content="" name="keywords">
	<title>Portal Resmi LPSE Kabupaten Siak</title>
	<meta meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>

<style>
	.justify {
		text-align: justify;
	}

	.center {
		text-align: center;
		color: #444;
	}

	.center1 {
		display: block;
		margin-left: auto;
		margin-right: auto;
	}

	.center2 {
		display: block;
		margin-left: auto;
		margin-right: auto;
		width: 95%;
	}

	.center3 {
		display: block;
		margin-left: auto;
		margin-right: auto;
		margin-top: auto;
		margin-bottom: auto;

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

	.shadow-lg1 {
		box-shadow: 0 0.5rem 2rem rgba(0, 0, 0, 0.150) !important;
	}

	.shadow-lg2 {
		box-shadow: 0 0.5rem 2rem rgba(0, 0, 0, 0.150) !important;
		border-radius: 15px;
	}

	.hidden {
		display: none;
	}

	.pagination-container {
		min-height: 30%;
		display: flex;
		position: relative;
		justify-content: center;
	}

	.pagination-number,
	.pagination-button {
		font-size: 1.1rem;
		background: #012970;
		border: none;
		margin: 0.25rem 0.25rem;
		cursor: pointer;
		height: 2.5rem;
		width: 2.5rem;
		color: #fff;
	}

	.pagination-number:hover,
	.pagination-button:not(.disabled):hover {

		background: #012970;
	}

	.pagination-number.active {
		background: #01a1eb;

	}


	.button {
		display: inline-block;
		padding: .75rem 1.25rem;
		border-radius: 10rem;
		color: #fff;
		text-transform: uppercase;
		font-size: 1rem;
		letter-spacing: .15rem;
		transition: all .3s;
		position: relative;
		overflow: hidden;
		z-index: 1;
	}
</style>

<style>
	img.vert-move {
		-webkit-animation: mover 1s infinite alternate;
		animation: mover 1s infinite alternate;
	}

	@-webkit-keyframes mover {
		0% {
			transform: translateY(0);
		}

		100% {
			transform: translateY(-20px);
		}
	}

	@keyframes mover {
		0% {
			transform: translateY(0);
		}

		100% {
			transform: translateY(-30px);
		}
	}
</style>

<section class="breadcrumbs">
	<div class="container">

		<header class="section-header" data-aos="fade-up">
			<h2 style="color:#fff;">TENTANG</h2>
			<p style="color:#fff;">LPSE Kabupaten Siak</p>
		</header>

	</div>
</section>

<section id="about" class="about">

	<br>
	<br>

	<div class="container" data-aos="fade-up">

		<div class="col-lg-12 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
			<div class="content" id="corner">

				<div class="row">
					<div class="col-sm-12">
						<p style="color:#ffff;" class="justify">
							Layanan Pengadaan Secara Elektronik adalah layanan pengelolaan teknologi informasi untuk
							memfasilitasi pelaksanaan Pengadaan Barang/Jasa secara elektronik. UKPBJ/Pejabat
							Pengadaan
							pada Kementerian/Lembaga/Perangkat Daerah yang tidak memiliki Layanan Pengadaan Secara
							Elektronik dapat menggunakan fasilitas Layanan Pengadaan Secara Elektronik yang terdekat
							dengan tempat kedudukannya untuk melaksanakan pengadaan secara elektronik, khususnya di
							daerah <b>Pemerintah Kabupaten Siak Sri Indrapura.</b>
						</p>

					</div>

					<div class="col-lg-12" style="padding:1%;">
						<img src="assets/imgPengunjung/tim.png" class="img-fluid center1" alt=""
							style="height:700px;padding:20px;">
					</div>



				</div>


				<br>

			</div>

		</div>
	</div>

	<br>
	<br>
	<br>
	<br>
	<br>
	<br>

</section><!-- End Pricing Section -->

<section id="team" class="team">

	<div class="container">


		<div class="row gy-4">

			<div class="col-lg-5 col-md-6">
		

				<header class="section-header2">
					<h4>Sejarah</h4>
					<h4>LPSE Kabupaten Siak</h4>
				</header>

			</div>

			<div class="col-lg-7 col-md-6">
				<div class="experience" id="experience" style="padding:20px;">
					<div class="container">
						<div class="timeline">
							<div class="timeline-item left wow slideInLeft" data-aos="fade-left"
								data-aos-anchor="#example-anchor" data-aos-offset="1000" data-aos-duration="1000">

								<div class="timeline-text">
									<div class="timeline-date">2010</div>
									<h2><b>Layanan Pengadaan Secara Elektronik (LPSE)</b> Nasional terbentuk</h2>
								</div>
							</div>
							<div class="timeline-item right wow slideInRight" data-aos="fade-right"
								data-aos-anchor="#example-anchor" data-aos-offset="1000" data-aos-duration="1000">
								<div class="timeline-text">
									<div class="timeline-date">2012  -  2017</div>
									<h2><b>Layanan Pengadaan Secara Elektronik (LPSE)</b> berkedudukan melekat (adhoc) pada Bagian Administrasi Pembangunan Sekretariat Daerah Kabupaten Siak</h2>
								</div>
							</div>
							<div class="timeline-item left wow slideInLeft" data-aos="fade-left"
								data-aos-anchor="#example-anchor" data-aos-offset="1000" data-aos-duration="1000">
								<div class="timeline-text">
									<div class="timeline-date">2017  -  Sekarang</div>
									<h2><b>Layanan Pengadaan Secara Elektronik (LPSE) Kabupaten Siak</b> secara Permanen berada di Bagian Pengadaan Barang Jasa Sekretariat Daerah Kabupaten Siak, tepat nya di Sub Bagian Pengelolaan Pelayanan Pengadaan Secara Elektronik (LPSE)
									</h2>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>


		</div>

	</div>

</section>



<section id="pricing" class="pricing">

	<br>
	<br>
	<br>

	<div class="container" data-aos="fade-up">


		<div class="row gy-4" data-aos="fade-left">

			<div class="col-lg-5 col-md-6" data-aos="zoom-in" data-aos-delay="300">


				<header class="section-header">

					<img src="assets/img/logobee.png" style="width:500px; height:480px;" class="img-fluid vert-move"
						alt="">
					<h2>VISI MISI</h2>
					<h2>LPSE KABUPATEN SIAK</h2>
				</header>

			</div>




			<div class="col-lg-7 col-md-6" data-aos="zoom-in" data-aos-delay="400">
				<div class="box" id="corner">
					<h3>VISI<br>LPSE KABUPATEN SIAK</h3>
					<div class="col-lg-12">
						<p style="text-align:justify;">Mewujudkan LPSE Kabupaten Siak sebagai wadah penggerak utama
							percepatan pengadaan barang/jasa yang profesional, transparan, akuntabel dan efisien untuk
							mewujudkan penghematan keuangan daerah yang efektif dan optimal.</p>
					</div>


					<br>

					<div class="col-lg-12">
						<h3>MISI <br> LPSE KABUPATEN SIAK</h3>
						<ol type="1">
							<li style="text-align:justify;">Mewujudkan Unit Kerja Bidang Pengadaan Yang Handal.</li>

							<li style="text-align:justify;">Membangun Sumber Daya Manusia Pengadaan Yang Berkualitas.
							</li>

							<li style="text-align:justify;">Mengelola Dan Mengembangkan Sistem Pengadaan Yang
								Terintegrasi.</li>

							<li style="text-align:justify;">Mendukung Upaya Pemberantasan Korupsi, Kolusi Dan Nepotisme.
							</li>

							<li style="text-align:justify;">Mendukung Upaya Percepatan Penyerapan Pengadaan Barang/Jasa
								Pemerintah.</li>

							<li style="text-align:justify;">Meningkatkan Kualitas Dan Kapasitas Sarana Dan Prasarana
								Layanan Pengadaan Barang/Jasa Secara Elektronik.</li>

							<li style="text-align:justify;">Mewujudkan Sinergi Antar Instansi/Pihak Lain Dalam
								Meningkatkan Kualitas Pengadaan Barang/Jasa.</li>

							<li style="text-align:justify;">Membantu Penyusunan Dan Penyempurnaan Tata Kelola Pengadaan
								Yang Komprehensif.</li>

							<li style="text-align:justify;">Memberikan Pelayanan Prima Terhadap Pengguna Layanan Tanpa
								Dipungut Biaya.</li>
						</ol>
					</div>

				</div>
			</div>


		</div>

	</div>

	<br>
	<br>
	<br>

</section><!-- End Pricing Section -->


<section id="team" class="team">

	<div class="container" data-aos="fade-up">

		<header class="section-header">
			<h2>Anggota Tim</h2>
			<p>LPSE Kabupaten Siak</p>
		</header>
		<br>
		<br>

		<div class="row gy-4">

			<?php
            $query = "SELECT * FROM tim";
            $r = mysqli_query($con, $query);
            while ($row = mysqli_fetch_assoc($r)) {
        ?>

			<div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100"
				style="margin-top:1%;margin-bottom:1%;">
				<div class="member">
					<div class="member-img">
						<img src="assets/imgPengunjung/team/team-1.jpg" class="img-fluid" alt="">
					</div>
					<div class="member-info">
						<h4>Walter White</h4>
						<span>Chief Executive Officer</span>
						<p>Velit aut quia fugit et et. Dolorum ea voluptate vel tempore tenetur ipsa quae aut. Ipsum
							exercitationem iure minima enim corporis et voluptate.</p>
					</div>
				</div>
			</div>

			<?php } ?>

		</div>

	</div>

</section>


<!-- ======= Features Section ======= -->
<section id="features" class="features">

	<div class="container" data-aos="fade-up">

		<br>
		<br>

		<header class="section-header">
			<h2>FASILITAS</h2>
			<p>LPSE Kabupaten Siak</p>
		</header>


		<!-- Feature Tabs -->
		<div class="row feture-tabs" data-aos="fade-right">
			<div class="col-lg-12">

				<div class="row">

					<div class="col-lg-2">
						<!-- Tabs -->
						<ul class="nav nav-pills mb-3" style="margin-bottom:3%;">
							<li>
								<div class="col-md-12" data-aos="fade-right" data-aos-delay="300">
									<div class="feature-box d-flex align-items-center" style="width:180px;" id="corner">
										<h3><a class="nav-link active" data-bs-toggle="pill" href="#tab1">Ruang
												Pelayanan</a>
										</h3>
									</div>
								</div>

							</li>


							<li>
								<div class="col-md-12" data-aos="zoom-out" data-aos-delay="300">
									<div class="feature-box d-flex align-items-center" style="width:180px;" id="corner">
										<h3><a class="nav-link" data-bs-toggle="pill" href="#tab2">Ruangan Bidding</a>
										</h3>
									</div>
								</div>
							</li>

							<li>
								<div class="col-md-12" data-aos="zoom-out" data-aos-delay="300">
									<div class="feature-box d-flex align-items-center" style="width:180px;" id="corner">
										<h3><a class="nav-link" data-bs-toggle="pill" href="#tab3">Ruang Pelayanan</a>
										</h3>
									</div>
								</div>
							</li>

							<li>
								<div class="col-md-12" data-aos="zoom-out" data-aos-delay="300">
									<div class="feature-box d-flex align-items-center" style="width:180px;" id="corner">
										<h3><a class="nav-link" data-bs-toggle="pill" href="#tab4">Ruang Pelayanan</a>
										</h3>
									</div>
								</div>
							</li>

							<li>
								<div class="col-md-12" data-aos="zoom-out" data-aos-delay="300">
									<div class="feature-box d-flex align-items-center" style="width:180px;" id="corner">
										<h3><a class="nav-link" data-bs-toggle="pill" href="#tab5">Ruang Pelayanan</a>
										</h3>
									</div>
								</div>
							</li>
						</ul><!-- End Tabs -->



					</div>

					<div class="col-lg-10 feature-box1 d-flex align-items-center" id="corner" style="height:584px;">

						<!-- Tab Content -->
						<div class="tab-content" style="padding:4%;">
							<br>
							<div class="tab-pane fade show active center1" id="tab1">
								<div class="row" style="margin-top:1%;" data-aos="fade-left">
									<div class="col-lg-4">
										<div class="d-flex align-items-center mb-2" style="margin-top:50%">
											<h4 class="center3">Consequuntur inventore voluptates consequatur aut vel
												et. Eos doloribus
												expedita.
												Sapiente
												atque consequatur minima nihil quae aspernatur quo suscipit voluptatem.
											</h4>
										</div>
									</div>

									<div class="col-lg-8">
										<img src="assets/imgPengunjung/1.png" style="width:1000px; height:450px;"
											class="img-fluid center1 shadow-lg2" alt="" id="corner">
									</div>
								</div>

								<br>
								<br>

							</div><!-- End Tab 1 Content -->

							<div class="tab-pane fade show center1" id="tab2">
								<div class="d-flex align-items-center mb-2 center2">
									<h4>Consequuntur inventore voluptates consequatur aut vel et. Eos doloribus
										expedita.
										Sapiente
										atque consequatur minima nihil quae aspernatur quo suscipit voluptatem.</h4>
								</div>

								<img src="assets/imgPengunjung/2.png" style="width:1000px; height:450px;"
									class="img-fluid center1" alt="" id="corner">

								<br>
								<br>

							</div><!-- End Tab 2 Content -->

							<div class="tab-pane fade show" id="tab3">
								<p>Consequuntur inventore voluptates consequatur aut vel et. Eos doloribus expedita.
									Sapiente
									atque consequatur minima nihil quae aspernatur quo suscipit voluptatem.</p>
								<div class="d-flex align-items-center mb-2">
									<i class="bi bi-check2"></i>
									<h4>Repudiandae rerum velit modi et officia quasi facilis</h4>
								</div>
								<p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis. Sapiente minima
									commodi
									dolorum
									non eveniet magni quaerat nemo et.</p>
								<div class="d-flex align-items-center mb-2">
									<i class="bi bi-check2"></i>
									<h4>Incidunt non veritatis illum ea ut nisi</h4>
								</div>
								<p>Non quod totam minus repellendus autem sint velit. Rerum debitis facere soluta
									tenetur.
									Iure
									molestiae assumenda sunt qui inventore eligendi voluptates nisi at. Dolorem quo
									tempora.
									Quia et perferendis.</p>
							</div><!-- End Tab 3 Content -->

						</div>
					</div>



				</div><!-- End Feature Tabs -->


				<br>
				<br>
				<br>
				<br>

			</div>






</section><!-- End Features Section -->


<script>
	const paginationNumbers = document.getElementById("pagination-numbers");
	const paginatedList = document.getElementById("paginated-list");
	const listItems = document.querySelectorAll(".item");

	const paginationLimit = 4;
	const pageCount = Math.ceil(listItems.length / paginationLimit);
	let currentPage = 1;

	const appendPageNumber = (index) => {
		const pageNumber = document.createElement("button");
		pageNumber.className = "pagination-number";
		pageNumber.innerHTML = index;
		pageNumber.setAttribute("page-index", index);
		pageNumber.setAttribute("aria-label", "Page " + index);

		paginationNumbers.appendChild(pageNumber);
	};

	const getPaginationNumbers = () => {
		for (let i = 1; i <= pageCount; i++) {
			appendPageNumber(i);
		}
	};

	const handleActivePageNumber = () => {
		document.querySelectorAll(".pagination-number").forEach((button) => {
			button.classList.remove("active");
			const pageIndex = Number(button.getAttribute("page-index"));
			if (pageIndex == currentPage) {
				button.classList.add("active");
			}
		});
	};

	const setCurrentPage = (pageNum) => {
		currentPage = pageNum;
		handleActivePageNumber();

		const prevRange = (pageNum - 1) * paginationLimit;
		const currRange = pageNum * paginationLimit;

		listItems.forEach((item, index) => {
			item.classList.add("hidden");
			if (index >= prevRange && index < currRange) {
				item.classList.remove("hidden");
			}
		});
	};

	window.addEventListener("load", () => {
		getPaginationNumbers();
		setCurrentPage(1);

		document.querySelectorAll(".pagination-number").forEach((button) => {
			const pageIndex = Number(button.getAttribute("page-index"));

			if (pageIndex) {
				button.addEventListener("click", () => {
					setCurrentPage(pageIndex);
				});
			}
		});
	});
</script>

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