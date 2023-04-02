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

<style>
	.justify {
		text-align: justify;
		color: #4444;
	}

	.center {
		text-align: center;
		color: #444;
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

	img {
		-webkit-filter: drop-shadow(1px 1px 0 white) drop-shadow(-1px -1px 0 white);
		filter: drop-shadow(1px 1px 0 white) drop-shadow(-1px -1px 0 white);
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


<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

	<div class="container">
		<div class="row">
			<div class="col-lg-6 d-flex flex-column justify-content-center">
				<h1 data-aos="fade-up">SELAMAT DATANG</h1>
				<h1 data-aos="fade-up">DI LPSE KABUPATEN SIAK</h1>
				<h2 style="color:#fff;" data-aos="fade-up" data-aos-delay="400"><b><i>“Be The BEE”</i></b>, Not Just A
					Slogan. Think big.
					We do.</h2>
			</div>
			<div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200" style="margin-left:-100px;">
				<img src="assets/imgPengunjung/logobee.png" style="width:400px; height:500px;"
					class="img-fluid vert-move" alt="">
			</div>
		</div>
	</div>

</section><!-- End Hero -->

<main id="main">

	<section id="about" class="about">

		<br>
		<br>
		<br>
		<br>
		<br>
		<br>




		<div class="container" data-aos="fade-up">

			<div class="col-lg-12 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
				<div class="content shadow-lg1" id="corner">

					<div class="row">
						<div class="col-lg-6">
							<h3>About Us</h3>
							<h2>LPSE Kabupaten Siak</h2>
							<p style="color:#444;" class="justify">
								Layanan Pengadaan Secara Elektronik adalah layanan pengelolaan teknologi informasi untuk
								memfasilitasi pelaksanaan Pengadaan Barang/Jasa secara elektronik. UKPBJ/Pejabat
								Pengadaan
								pada Kementerian/Lembaga/Perangkat Daerah yang tidak memiliki Layanan Pengadaan Secara
								Elektronik dapat menggunakan fasilitas Layanan Pengadaan Secara Elektronik yang terdekat
								dengan tempat kedudukannya untuk melaksanakan pengadaan secara elektronik, khususnya di
								daerah <b>Pemerintah Kabupaten Siak Sri Indrapura.</b>
							</p>

						</div>
						<div class="col-lg-6 about-img" style="margin-top:3%;">
							<img src="assets/imgPengunjung/logolpse1.png" class="img-fluid" alt="">
						</div>

					</div>
					<br>

					<div class="text-center text-lg-start">
						<a href=""
							class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
							<span>Selengkapnya</span>
							<i class="bi bi-arrow-right"></i>
						</a>
					</div>


				</div>

			</div>
</div>


			<br>
			<br>
			<br>
			<br>
			<br>
			<br>

	</section><!-- End About Section -->


	<!-- ======= Recent Blog Posts Section ======= -->
	<section id="recent-blog-posts" class="recent-blog-posts">

		<br>
		<br>


		<div class="container" data-aos="fade-up">

			<header class="section-header">
				<h2>BERITA</h2>
				<p>Portal Berita LPSE Kabupaten Siak</p>
			</header>

			<br>
			<br>
			<br>
			<br>
			<div class="row">

				<?php
                        $query = "SELECT * FROM `berita` ORDER BY id_berita DESC LIMIT 3";
                        $r = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($r)) {
                        ?>

				<div class="col-lg-4">
					<div class="post-box">
						<div class="post-img"><img src="<?= base_url('assets/img/berita/') . $row['gambar']; ?>"
								style="width:500px;height:300px;" alt="" class="img-fluid"></div>

						<?php
$oldDate = strtotime($row['timestamp']);
    $newDate = date('l , d F Y ', $oldDate);
    ?>
	
						<span class="post-date"><?php echo $newDate ?></span>
						<h3 class="post-title"><?= $row['judul']; ?></a></h3>
						<a href="<?= base_url('Berita/detail_berita/') . $row['id_berita']; ?>"
							class="readmore stretched-link mt-auto"></a>
					</div>
				</div>
				<?php } ?>

				<br>
				<br>


			</div>


		</div>

		<section id="blog" class="blog">

			<br>
			<br>
			<div class="entry1 center" data-aos="fade-up">

				<div class="entry-content">
					<div class="read-more button">
						<a href="<?= base_url('Berita'); ?>"><b>Selengkapnya</a>
					</div>
				</div>
			</div>

			<br>
			<br>
			  
			<br>
			<br>

		</section><!-- End Recent Blog Posts Section -->

	</section><!-- End Recent Blog Posts Section -->


	<!-- ======= Testimonials Section ======= -->
	<section id="testimonials" class="testimonials">
		<br>
		<br>
		<br>
		<div class="container" data-aos="fade-up">

			<header class="section-header">
				<h2>AGENDA</h2>
				<p>Agenda Kegiatan LPSE Kabupaten Siak</p>
			</header>

			<br>
			<br>
	

			<div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
				<div class="swiper-wrapper">

					<?php
								$query = "SELECT * FROM agenda ORDER BY id_agenda ASC";
								$r = mysqli_query($con, $query);
								while ($row = mysqli_fetch_assoc($r)) {
								?>
					<div class="swiper-slide">
						<div class="testimonial-item">

							<span class="bi bi-calendar2-check-fill center" style="font-size:40px;"></span>
							<br>
							<h1 style="font-size: 18px;" class="center"><b><?= $row['nama'];?></b></h1>
							
							<?php 
										$oldDate = strtotime($row['waktu']);
										$oldTime = strtotime($row['waktu']);
										$newDate = date('d/m/Y',$oldDate);
										$newTime = date('H:i',$oldTime);
									?>
							<h1 style="font-size: 15px;" class="center"><b>Jadwal : <?php echo $newDate ?> - <?php echo $newTime ?> </b></h1>
							<br>
							<?php
								$str = $row['deskripsi'];
								echo htmlspecialchars_decode($str);
								?>

							<?php 
										$oldDate = strtotime($row['timestamp']);
										$oldTime = strtotime($row['timestamp']);
										$newDate = date('d/m/Y',$oldDate);
										$newTime = date('H:i',$oldTime);
									?>
									<br>
									<br>
							<div class="center">Postingan: <br><?php echo $newDate ?> - <?php echo $newTime ?> | Admin LPSE Kabupaten Siak </div>
						</div>


					</div><!-- End testimonial item -->

					<?php } ?>

				</div>

				<div class="swiper-pagination"></div>
			</div>

		</div>

		<br>
		<br>
		<br>
	</section><!-- End Testimonials Section -->



</main><!-- End #main -->


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