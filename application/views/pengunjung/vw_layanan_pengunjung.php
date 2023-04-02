<?php
$con = mysqli_connect("localhost", "root", "", "LPSE_Siak")
?>

<head>
	<title>Layanan | LPSE Kabupaten Siak</title>
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
	.header.header-scrolled a{
  color: #013289;
}



</style>



<section class="breadcrumbs">
	<div class="container">

		<header class="section-header" data-aos="fade-up">
			<h2 style="color:#fff;">Layanan</h2>
			<p style="color:#fff;">LPSE Kabupaten Siak</p>
		</header>
	</div>
</section>


<!-- ======= Values Section ======= -->
<section id="values" class="values">
	<br>
	<br>
	<div class="container" data-aos="fade-up">



		<div class="row" style="margin-top:-20px;">

			<?php
								$query = "SELECT * FROM layanan";
								$r = mysqli_query($con, $query);
								while ($row = mysqli_fetch_assoc($r)) {
								?>
			<div class="col-lg-4 " data-aos="fade-up" data-aos-delay="200" style="margin-top:2%;">
				<div class="box shadow-lg" id="corner">
					<img src="assets/imgPengunjung/values-1.png" class="img-fluid" alt="">
					<h3><?= $row['nama_layanan'];?></h3>
					<p><?= $row['deskripsi'];?></p>
				</div>
			</div>
			<?php } ?>
		</div>

	</div>

	<br>
	<br>
	<br>

	<br>


</section><!-- End Values Section -->

<!-- ======= Frequently Asked Questions Section ======= -->
<section id="faq" class="faq">

	<br>
	<br>

	<div class="container" data-aos="fade-up">

		<header class="section-header">
			<h2>F.A.Q</h2>
			<p>Frequently Asked Questions</p>
		</header>
		<br>
		<br>

		<div class="faq-list">
			<ul>
				<li data-aos="fade-up" data-aos-delay="100">
				<i class="bx bx-help-circle icon-help"></i><a data-bs-toggle="collapse" class="collapsed"
						data-bs-target="#faq-list-1">Bagaimana Cara Mendaftar menjadi Penyedia/Rekanan di Website SPSE
						Untuk Mengikuti Lelang Melalui LPSE?<i class="bx bx-chevron-down icon-show"></i>
						<i class="bx bx-chevron-up icon-close"></i></a>
					<div id="faq-list-1" class="collapse" data-bs-parent=".faq-list">

						<p>Untuk dapat mengikuti pelelangan melalui Sistem Pengadaan Secara Elektronik di LPSE, penyedia
							diharuskan melakukan pendaftaran di LPSE terdekat.</p>
						<p>Proses pendaftaran penyedia dilakukan melalui 2 (dua) tahap, yaitu :</p>
						&nbsp;
						<p>A. PENDAFTARAN ONLINE</p>
						<p>Pendaftaran secara online dilakukan dengan cara mendaftar melalui website LPSE.</p>
						&nbsp;
						<p>B. VERIFIKASI</p>
						<p>Setelah melakukan daftar online di website SPSE, Penyedia WAJIB melakukan verifikasi untuk
							mengaktifkan User ID dan Password yang telah didaftarkan.</p>
						<p>Berikut tahapan untuk melakukan verifikasi:</p>
						<p style="margin-left:2%;">1.Penyedia datang ke Sekretariat LPSE Kabupaten Siak, Komplek
							Perkantoran Tanjung Agung
							Kecamatan Mempura – Kabupaten Siak.</p>
						<p style="margin-left:2%;">2.Verifikator LPSE melihat data penyedia di halaman verifikator untuk
							memastikan status
							penyedia (Terdaftar/Belum Terdaftar/Terverifikasi)</p>
						<p style="margin-left:2%;">3.Jika penyedia belum terdaftar verifikator mengarahkan penyedia
							untuk melakukan daftar
							online di bidding room dengan pendampingan Tim Helpdesk.</p>
						<p style="margin-left:2%;">4.Jika sudah terdaftar Verifikator memeriksa kelengkapan persyaratan
							verifikasi berupa:</p>
						<p style="margin-left:4%;">a.Print Out Formulir keikutsertaan yang ditandatangani Direktur,
							dicap dan bermaterai
							Rp.6.000,-;</p>
						<p style="margin-left:4%;">b.Print Out Formulir Pendaftaran;</p>
						<p style="margin-left:4%;">c.Selain Direktur Pembawa Dokumen Harus Membawa Surat Kuasa, dicap
							bermaterai Rp. 6.000,- dan
							ditandatangani Direktur;</p>
						<p style="margin-left:4%;">d.Pembawa Surat Kuasa bagi Selain Yang Ada Dalam Akta Harus
							Dibuktikan dengan SK Pengangkatan
							(Surat Pernyataan) Sebagai Karyawan, dicap bermaterai Rp. 6.000,- dan ditandatangani
							Direktur;</p>
						<p style="margin-left:4%;">e.KTP Direktur dan atau Yang Diberi Kuasa (Asli dan Copy);</p>
						<p style="margin-left:4%;">f.NPWP Perusahaan (Asli dan Copy);</p>
						<p style="margin-left:4%;">g.SIUP, SIUJK dan SBU serta Surat Ijin lainnya sesuai dengan Jenis
							Usaha (Asli dan CopyAkta
							Pendirian dan perubahan terakhir. Khusus PT sesuai UU No. 40 Tahun 2007 tentang Perseroan
							Terbatas beserta Pengesahannya dengan Keputusan Menteri Hukum dan HAM (Asli dan Copy);</p>
						<p style="margin-left:4%;">h.TDP (Asli dan Copy);</p>
						<p style="margin-left:4%;">i.SITU / HO dan Domisili (Asli dan Copy);</p>
						<p style="margin-left:4%;">j.Surat Pengukuhan Kena Pajak (Asli dan Copy).</p>
						<p style="margin-left:4%;">5.Verifikator memastikan Softcopy dokumen sesuai dengan Aslinya dan
							masih berlaku.</p>
						<p style="margin-left:4%;">6.Verifikator menyetujui pendaftaran online di Aplikasi SPSE jika
							dokumen dinyatakan lengkap.
							Aplikasi SPSE akan secara otomatis mengirim e-mail aktivasi.</p>
					</div>
				</li>

				<li data-aos="fade-up" data-aos-delay="200">
					<i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
						data-bs-target="#faq-list-2" class="collapsed">Bagaimana Cara Mengganti Email Perusahaan ?<i
							class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
					<div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
						<p>Jika Penyedia tidak dapat mengakses E-Mailnya kembali, penyedia yang bersangkutan harus
							mengganti alamat E-Mail yang terdaftar LPSE dengan langkah sebagai berikut :</p>
						<p>A. Penyedia Mengajukan Surat Permohonan yang dibuat diatas kertas berkop perusahaan,
							dicap/stempel dan bermaterai (Asli dan Scanan) serta melampirkan :</p>
						<p>1.KTP Direktur (Asli dan Fotocopy)</p>
						<p>2.NPWP (Asli dan Fotocopy)</p>
						<p>3.SIUP/SIUJK (Asli dan Fotocopy)</p>
						<p>4.TDP (Asli dan Fotocopy)</p>
						<p>5.Akta Pendirian dan Perubahan Terakhir (Asli dan Fotocopy).</p>
						<p>**Seluruh Fotocopy, dimasukkan dalam amplop/Map.</p>
						&nbsp;
						<p>B. Jika yang datang ke LPSE serta membawa berkas bukan Pimpinan Perusahaan/Direktur maka
							harus membawa Surat Kuasa dari Direktur nya.</p>
					</div>
				</li>

				<li data-aos="fade-up" data-aos-delay="300">
					<i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
						data-bs-target="#faq-list-3" class="collapsed">Bagaimana Cara Mengaktifkan Agregasi Data
						Penyedia dan dimana? Lalu Apa Saja Syaratnya?<i class="bx bx-chevron-down icon-show"></i><i
							class="bx bx-chevron-up icon-close"></i></a>
					<div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
						<p>Penyedia dapat mengirimkan email ke Helpdesk LKPP melalui LPSE Terkait dengan melampirkan
							Data Penyedia seperti :</p>
						<p>a.SIUP/SIUJK</p>
						<p>b.NPWP</p>
						<p>c.dll.</p>
						<p>Atau dapat menghubungi Call Center (021) 2993 5577</p>
					</div>
				</li>

				<li data-aos="fade-up" data-aos-delay="400">
					<i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
						data-bs-target="#faq-list-4" class="collapsed">Mengapa data RUP tidak ditemukan ketika membuat
						paket e-Purchasing melalui e-Katalog?<i class="bx bx-chevron-down icon-show"></i><i
							class="bx bx-chevron-up icon-close"></i></a>
					<div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
						<p>Pada ePurchasing v.4, data RUP menggunakan data RUP yang terdapat dalam Sistem Informasi
							Rencana Umum Pengadaan (SIRUP).</p>
						<p>Harap perbaharui data RUP di SIRUP apabila memang belum pernah menginput data RUP, dan
							pastikan metode pemilihan adalah ePurchasing.</p>
						<p>e-Purchasing hanya menarik data RUP yang sudah tayang/diumumkan di sirup.lkpp.go.id.</p>
					</div>
				</li>

				<li data-aos="fade-up" data-aos-delay="500">
					<i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
						data-bs-target="#faq-list-5" class="collapsed">Apa yang dimaksud dengan Aplikasi SiKAP?<i
							class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
					<div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
						<p>SiKAP adalah singkatan dari Sistem Informasi Kinerja Penyedia, Aplikasi SiKAP merupakan
							aplikasi subsistem dari SPSE yang digunakan untuk mengelola data/informasi mengenai riwayat
							kinerja dan/atau data kualifikasi Penyedia Barang/Jasa yang dimanfaatkan untuk mendapatkan
							Informasi Kinerja Penyedia Barang/Jasa dalam proses e-Lelang Cepat/e-Seleksi Cepat</p>
					</div>
				</li>

				<li data-aos="fade-up" data-aos-delay="600">
					<i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
						data-bs-target="#faq-list-6" class="collapsed">Apa yang dimaksud dengan e-Lelang Cepat/e-Seleksi
						Cepat?<i class="bx bx-chevron-down icon-show"></i><i
							class="bx bx-chevron-up icon-close"></i></a>
					<div id="faq-list-6" class="collapse" data-bs-parent=".faq-list">
						<p>e-Lelang Cepat/e-Seleksi Cepat adalah metode yang digunakan untuk pemilihan Penyedia
							Barang/Jasa menggunakan Aplikasi SPSE 4 dengan memanfaatkan Informasi Kinerja Penyedia
							Barang/Jasa yang ada dalam Aplikasi SiKaP</p>
						</p>
					</div>
				</li>
				<li data-aos="fade-up" data-aos-delay="700">
					<i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
						data-bs-target="#faq-list-7" class="collapsed">Bagaimana Proses Penyedia mengikuti e-Lelang
						Cepat/e-Seleksi Cepat?<i class="bx bx-chevron-down icon-show"></i><i
							class="bx bx-chevron-up icon-close"></i></a>
					<div id="faq-list-7" class="collapse" data-bs-parent=".faq-list">
						<p>Penyedia harus memiliki Akun SPSE/User Id yang sudah teraktifasi agregasinya, lalu login
							di Aplikasi SiKaP untuk melengkapi kembali Data Kualifikasinya seperti Izin Usaha, Akta,
							Pemilik, Pengurus, Tenaga Ahli, Peralatan, Pengalaman, Pajak, dan Preferensi. Untuk
							penginputan Data Penyedia disesuaikan dengan Kode Klasifikasi Bidang Usaha (KBLI)
							masing-masing, untuk Penyedia Konstruksi juga disesuaikan SBU (Sertikat Badan Usaha)
							masing-masing.</p>
					</div>
				</li>
				<li data-aos="fade-up" data-aos-delay="800">
					<i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
						data-bs-target="#faq-list-8" class="collapsed">Bagaimana Proses Pokja membuat Paket e-Lelang
						Cepat/e-Seleksi Cepat?<i class="bx bx-chevron-down icon-show"></i><i
							class="bx bx-chevron-up icon-close"></i></a>
					<div id="faq-list-8" class="collapse" data-bs-parent=".faq-list">
						<p>Pokja login di SPSE Versi 4 dan membuat paket lelang sesuai paketnya yang sudah di sinkronkan
							dari aplikasi SiRUP (Sistem Rencana Umum Pengadaan), lalu pada pilihan menu metode pemilihan
							pilihlah &#8220;e-Lelang Cepat&#8221; susun jadwalnya, lalu klik menu &#8220;setting
							Kriteria&#8221; untuk menentukan Kriteria yang memiliki Kualifikasi seperti apa yang akan
							diundang oleh sistem untuk mendaftar pada Lelang tsb.</p>
						<p>Pokja dapat mengatur Kriteria Shortlist seperti :</p>
						<p>1. Mengatur Minimal Pengalaman Pekerjaan Sejenis</p>
						<p>2. Mengatur Minimal Nilai Kontrak</p>
						<p>3. Jangka Waktu Tahun</p>
						<p>4. Mengatur Izin Usaha sesuai KBLI</p>
						<p>5. Mengatur Klasifikasi yang sesuai</p>
					</div>
				</li>
				<li data-aos="fade-up" data-aos-delay="900">
					<i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
						data-bs-target="#faq-list-9" class="collapsed">Bagaimana Alur Proses e-Lelang Cepat/e-Seleksi
						Cepat?<i class="bx bx-chevron-down icon-show"></i><i
							class="bx bx-chevron-up icon-close"></i></a>
					<div id="faq-list-9" class="collapse" data-bs-parent=".faq-list">
						<p>e-lelang dilaksanakan menggunakan SPSE 4 dengan memanfaatkan Aplikasi SIKaP cara :</p>
						<p>1. Pokja membuat paket lelang cepat di SPSE 4 dengan Kriteria Sortlist Penyedia yang dibuat
							sesuai dengan kebutuhan K/L/D/I, Lalu sistem akan mengirimkan undangan melalui email Kepada
							Penyedia yang memenuhi Kriteria Sortlist.</p>
						<p>2. Penyedia akan menerima Undangan untuk mendaftar pada paket lelang cepat sesuai yang
							diterima di emailnya Ketika Tahapan &#8220;Pemberian Penjelasan &#8220;.</p>
						<p>3.Penyedia kemudian login di SPSE 4 untuk mendaftar lelang cepat tsb dengan cara pilih menu
							&#8220;Lelang Baru&#8221; cari nama paketnya kemudian klik setuju pada informasi Pakta
							Integritas, dengan menyetujui Pakta Integritas Penyedia sudah terdaftar pada lelang
							tersebut.</p>
						<p>4.Ikuti tahapan selanjutnya seperti download dokumen, dan melakukan Anwizdjing jika terdapat
							dokumen yang kurang jelas.</p>
						<p>5.Pada Tahapan Upload Dokumen Penawaran, Penyedia akan mengupload dokumen penawaran harga
							saja menggunakan Apendo Versi 4 3.</p>
						<p>6.Setelah Tahapan Upload Dokumen Penawaran selesai, Pokja dapat membuka dokumen penawaran
							yang masuk dengan melakukan verifikasi dengan memanfaatkan data Kualifikasi yang ada pada
							aplikasi SiKAP.</p>
						<p>7.sistem akan menunjuk kepada Penawar terendah sebagai calon pemenang.</p>
					</div>
				</li>
			</ul>
		</div>

	</div>

	<br>
	<br>

</section><!-- End Frequently Asked Questions Section -->
