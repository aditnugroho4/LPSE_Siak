<?php
$con = mysqli_connect("localhost", "root", "", "LPSE_Siak")
?>

<head>
	<title>Dokumen SOP | LPSE Kabupaten Siak</title>
	<meta meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>


<style>
	.justify {
		text-align: justify;
		color: #444444;
	}

	.center {
		text-align: center;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	p.page-break {
		word-break: break-all;
		text-align: justify;

	}

	hr.new4 {
		border: 1px solid grey;
	}

	div.relative {
  position: absolute;
  bottom: 40px;
  position: center;
  width: 90%;
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
			<h2 style="color:#fff;">DOKUMEN SOP</h2>
			<p style="color:#fff;">LPSE Kabupaten Siak</p>
		</header>

	</div>
</section>

<!-- ======= Dokumen SOP Section ======= -->
<section id="features" class="features">

	<br>
	<br>

	<div class="container" data-aos="fade-up" style="">

		<br>

		<div class="row" style="margin-top:-2%;">


			<div class="col-lg-12 mt-5 mt-lg-0">
				<br>
				<br>
				<div class="row align-self-center gy-4">

					<?php
								$query = "SELECT * FROM dokumen where kategori='SOP'";
								$r = mysqli_query($con, $query);
								while ($row = mysqli_fetch_assoc($r)) {
								?>

					<div class="col-md-4 item" data-aos="zoom-out" data-aos-delay="200" style="height:400px;">
						<div class="feature-box2 align-items-center shadow-lg" id="corner" data-aos="fade-up"
							data-aos-delay="400">

							<div class="col-sm-12" >
						
								<div class="col-sm-12 center">
								<img src="<?= base_url('assets/img/loading.png') ?>" style="width:50px;" class="img-fluid center" alt="">
								</div>
						

							<div class="col-sm-12" style="padding:20px;center:20px;">

							

							<h5 class="center" style="font-family:roboto;">
									<?php echo $row['judul']; ?></h5>
								</div>
								<div class="relative">


								<h6 class="center" style="font-family:Comic Sans MS;">
								<?php
									$oldDate = strtotime($row['timestamp']);
									$oldTime = strtotime($row['timestamp']);
									$newDate = date('d F Y ', $oldDate);
									$newTime = date('H:i',$oldTime);
								?>
									Diunggah pada <?php echo $newDate ?>, <?php echo $newTime ?>
								</h6>
								<hr class="new4">
								<?php 
								$a = $row['size'];
								$b = $a % 1000;
								?>
									<a href="<?= base_url('dokumen/download/') ?><?= $row['id_dokumen'] ?>" class="btn"
										style="width:100%;"><i class="fa fa-download"></i> <b>UNDUH</b> 
										
										<?=
										
										$b ?>
										
										
										KB</a>



								</div>
							</div>



						</div>
					</div>
					<?php } ?>

				</div>


			</div>


			<nav class="pagination-container">

				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<div id="pagination-numbers">

				</div>

			</nav>

		</div>
	</div>

</section><!-- End Dokumen SOP Section -->

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