<?php
$con = mysqli_connect("localhost", "root", "", "LPSE_Siak")
?>

<style>
	.justify {
		text-align: justify;
		color: #444444;
	}

	.center {
		text-align: center;
		color: #444444;
	}

	p.word-break {
		word-wrap: break-word;
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


<!--- PENCARIAN BERITA-->

<style>
	.dropbtn {
		background: #012970;
		color: white;
		padding: 16px;
		font-size: 16px;
		border: none;
		cursor: pointer;
	}

	.dropbtn:hover,
	.dropbtn:focus {
		background: #00a2ea;
	}

	#myInput {
		max-height: calc(4 * (1em + 8px));
		box-sizing: border-box;
		background-position: 14px 12px;
		background-repeat: no-repeat;
		font-size: 16px;
		padding: 14px 90px 12px 45px;
		border: none;
		border-bottom: 1px solid #ddd;
		position: relative;
	}

	#myInput:focus {
		outline: 3px solid #ddd;
	}

	.dropdown {
		display: inline-block;

	}

	.dropdown-content {
		display: none;
		position: absolute;
		background-color: #f6f6f6;
		min-width: 119px;
		height: 230px;
		overflow: auto;
		border: 1px solid #ddd;
		z-index: 1;
	}

	.dropdown-content a {
		color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
	}

	.dropdown a:hover {
		background-color: #ddd;
	}

	.show {
		display: block;
	}
</style>

<head>
	<title><?php echo $berita['judul']; ?> | LPSE Kabupaten Siak</title>
	<meta meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>

<section class="breadcrumbs">
	<div class="container">

		<header class="section-header" data-aos="fade-up">
			<ol>
				<li><a href="index.html">Berita</a></li>
				<li>Halaman Berita</li>
			</ol>
			<h3 style="color:#fff;">Berita LPSE Kabupaten Siak</h3>


	</div>
</section>

<!-- ======= Blog Single Section ======= -->
<section id="blog" class="blog">
	<div class="container" data-aos="fade-up">

		<div class="row">

			<div class="col-lg-8 entries">

				<article class="entry entry-single">

					<div class="entry-img">
						<img src="<?= base_url('assets/img/berita/') . $berita['gambar']; ?>"
							style="width:1000px;height:500px;" class="img-fluid" alt="">
					</div>

					<h2 class="entry-title">
						<a href="blog-single.html"><?php echo $berita['judul']; ?></a>
					</h2>

					<div class="entry-meta">
						<ul>
							<li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="">Admin
									LPSE</a></li>
							<li class="d-flex align-items-center"><i class="bi bi-clock"></i><a href="">
									<?php
							$oldDate = strtotime($berita['timestamp']);
								$newDate = date('l , d F Y ', $oldDate);
								?>
									<time><?php echo $newDate ?></time></a></li>

							<li class="d-flex align-items-center"><i class="bi bi-bookmarks"></i> <a href="">
									<?php echo $berita['kategori'] ?>
								</a></li>
						</ul>

					</div>

					<div class="entry-content">
						<?php 
						$str = $berita['konten'];
						echo htmlspecialchars_decode($str);
						?>

					</div>

					<div class="entry-footer">

					</div>

				</article><!-- End blog entry -->

			</div><!-- End blog entries list -->

			<div class="col-lg-4">

				<div class="sidebar">

					<div class="dropdown col-xl-12">
						<button onclick="myFunction()" class="dropbtn col-xl-12">
							<i<b><i class="bi bi-search"></i>&nbsp;&nbsp;Pencarian Berita</b>
						</button>
						<div id="myDropdown" class="dropdown-content col-xl-12">
							<input class="col-xl-12" type="text" placeholder="Cari Berita..." id="myInput"
								onkeyup="filterFunction()" size="6">
							<?php
								$query = "SELECT * FROM `berita`";
								$r = mysqli_query($con, $query);
								while ($row = mysqli_fetch_assoc($r)) {
									?>

									<a
										href="<?= base_url('Berita/detail_berita/') . $row['id_berita']; ?>"><b><?= $row['judul'];?></b></a>
							
							
							<?php } ?>

						</div>
					</div>

					<br>
					<br>
					<br>

					<h3 class="sidebar-title">Kategori</h3>
					<div class="sidebar-item categories">
						<ul>
							<li><a href="#">Pengumuman <span>(25)</span></a></li>
							<li><a href="#">Pengadaan <span>(12)</span></a></li>
							<li><a href="#">Tips & Trik <span>(5)</span></a></li>
						</ul>
					</div><!-- End sidebar categories-->

					<h3 class="sidebar-title"><a href="<?= base_url('berita');?>">Berita Lainnya</h3>
					<div class="sidebar-item recent-posts">

						<?php
							$query = "SELECT * FROM `berita` ORDER BY id_berita DESC LIMIT 5";
							$r = mysqli_query($con, $query);
							while ($row = mysqli_fetch_assoc($r)) {
						?>

						<div class="post-item clearfix">
							<img src="<?= base_url('assets/img/berita/') . $row['gambar']; ?>" alt="" class="img-fluid">
							<h4><a href="<?= $row ['id_berita']; ?>"><?=$row['judul'];?></a></h4>

							<?php
							$oldDate = strtotime($row['timestamp']);
								$newDate = date('l , d F Y ', $oldDate);
						    ?>
							<time><?php echo $newDate ?></time>
						</div>

						<?php }?>

					</div><!-- End sidebar recent posts-->


				</div><!-- End sidebar -->

			</div><!-- End blog sidebar -->

		</div>

	</div>
</section><!-- End Blog Single Section -->

<script>
	/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
	function myFunction() {
		document.getElementById("myDropdown").classList.toggle("show");
	}

	function filterFunction() {
		var input, filter, ul, li, a, i;
		input = document.getElementById("myInput");
		filter = input.value.toUpperCase();
		div = document.getElementById("myDropdown");
		a = div.getElementsByTagName("a");
		for (i = 0; i < a.length; i++) {
			txtValue = a[i].textContent || a[i].innerText;
			if (txtValue.toUpperCase().indexOf(filter) > -1) {
				a[i].style.display = "";
			} else {
				a[i].style.display = "none";
			}
		}
	}
</script>