<?php
$con = mysqli_connect("localhost", "root", "", "LPSE_Siak")
?>

<head>
	<title>Berita | LPSE Kabupaten Siak</title>
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


	.hidden {
		display: none;
	}

	.pagination-container {

		display: flex;
		align-items: center;
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
</style>



<section class="breadcrumbs">
	<div class="container">

		<header class="section-header" data-aos="fade-up">
			<h2 style="color:#fff;">Berita</h2>
			<p style="color:#fff;">LPSE Kabupaten Siak</p>
		</header>

	</div>
</section>


<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">


	<div class="container" data-aos="fade-up">

	

			<div class="row" data-aos="fade-up" data-aos-delay="200" style="min-height: 1000px;margin-top:-2;">

				<?php
                        $query = "SELECT * FROM berita";
                        $r = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($r)) {
                        ?>

				<div class="col-lg-4 item" style="margin-top:1%;margin-bottom:1%;">
					<article class="entry" id="corner">
						<div class="entry-img" id="corner">
							<img src="<?= base_url('assets/img/berita/') . $row['gambar']; ?>"
								style="width:500px;height:300px;" alt="" class="img-fluid">
						</div>

						<div class="entry-meta">
							<ul>
								<li class="align-items-center"><i class="bi bi-person"></i> <a href="">Admin
										LPSE</a></li>
								<li class=" align-items-center"><i class="bi bi-clock"></i><a href="">
										<?php
								$oldDate = strtotime($row['timestamp']);
								$newDate = date('l , d F Y ', $oldDate);
								?>
										<time><?php echo $newDate ?></time></a></li>
							</ul>
						</div>

						<h2 class="entry-title" style="height:150px;" class="justify">
							<a href="<?= base_url('Berita/detail_berita/') . $row['id_berita']; ?>">
								<p><?= $row['judul']; ?></p>
							</a>
						</h2>

						<!-- <br>

							<div class="col-lg-12 mt-5 mt-lg-0 " style="margin-left:15px;">
								<div class="entry-content">
									<div class="read-more">
										<a href="<?= base_url('Berita/detail_berita/') . $row['id_berita']; ?>">Selengkapnya</a>
									</div>
								</div>
							</div> -->

					</article><!-- End blog entry -->
				</div>

				<?php } ?>





			</div>

			<br>
			<br>


			<nav class="pagination-container">


				<div id="pagination-numbers">

				</div>

			</nav>


</section><!-- End Blog Section -->

<script>
	const paginationNumbers = document.getElementById("pagination-numbers");
	const paginatedList = document.getElementById("paginated-list");
	const listItems = document.querySelectorAll(".item");

	const paginationLimit = 6;
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