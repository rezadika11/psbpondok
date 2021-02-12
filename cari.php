<?php
include "header.php";
?>

<?php
include "conf/koneksi.php";

/*---------------------------- ANTI XSS & SQL INJECTION ----------------------*/
function antiinjection($data)
{
	$filter_sql = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
	return $filter_sql;
}
/*-------------------------------------------------------------------*/
// baca current date

$cari = antiinjection($_POST['cari']);

if (isset($cari)) {

	// $cari=preg_replace("#[^a-z0-9]#i"," ", $cari);//fungsi ini untuk menghindari karakter selain dari huruf dan angka dengan mengubahnya menjadi spasi, misalkan karakter ' maka akan berubah menjadi space

	$sql = mysqli_query($connect, "SELECT * FROM pendaftar_santri WHERE nik like '%" . $cari . "%'");

?>
	<!-- echo "<script>alert('Data Pendaftaran sudah tersimpan. Silahkan Login');</script>";
								echo "<meta http-equiv='refresh' content='0; url=beranda'>"; -->
	<!-- Modal1 -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><b>Login</b></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<center><img src="assets/img/logo_ds.png" style="max-height: 120px; width:120px;"></center>
					<p>
					<div class="card-body">
						<form action="log_validate.php">
							<div class="input-group mb-4">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-envelope"></i></span>
								</div>
								<input type="text" name="nik" class="form-control" placeholder="Masukan NIK">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-lock"></i></span>
								</div>
								<input type="password" name="pass" class="form-control" placeholder="Masukkan Password">
							</div>
						</form>
					</div>
				</div>
				<div class="modal-footer">

					<button type="button" class="btn btn-primary">Login</button>
				</div>
			</div>
		</div>
	</div>
	<!-- //Modal1 -->


	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container">
				<div class="row mb-2">
					<div class="col-sm-12">
						<ul class="nav nav-pills text-bold">
							<!-- <ul class="top_nav">
                          
                            <li><a href="persyaratan.html">Persyaratan</a></li>
                            <li><a href="terdaftar.html">Terdaftar</a></li>
                            <li><a href="pengumuman.html">Pengumuman</a></li>
                        </ul> -->
							<?php if (isset($_SESSION['nisn'])) { ?>
								<li class="nav-item">
									<a class="nav-link " aria-current="Dashboard" href="dashboard_santri.php">Dashboard</a>
								</li>
							<?php } ?>
							<li class="nav-item">
								<a class="nav-link" href="syarat.php">Persyaratan</a>
							</li>
							<li class="nav-item">
								<a class="nav-link " href="terdaftar.php">Pendaftar</a>
							</li>
							<li class="nav-item">
								<a class="nav-link " href="pengumuman.php">Pengumuman</a>
							</li>

						</ul>

					</div><!-- /.col -->

				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<div class="content">
			<div class="container">
				<div class="row">


					<!-- /.col-md-6 -->
					<div class="col-lg-12">
						<h2 class="m-0 text-dark mb-3"> </h2>
						<div class="card">

							<!-- /.card-header -->
							<div class="card-body">
								<h3 class="headerw3">Hasil Pencarian</h3>
								<hr>
								<h4>Data yang anda cari : <i><?= $cari; ?></i> </h4> <br>
								<div class="about-sub-gd">
									<table class="table" style="text-align: left;">
										<tr>
											<th>NIK</th>
											<th>Nama Santri</th>
											<th>Jenis Kelamin</th>
											<th>Alamat</th>
										</tr>
										<?php while ($find = mysqli_fetch_array($sql)) { ?>
											<tr>
												<td> <?= $find['nik'] ?> </td>
												<td> <?= $find['nama_santri'] ?> </td>
												<td> <?= $find['jk'] ?> </td>
												<td> <?= $find['alamat'] ?> </td>
											</tr>
									<?php }
									} ?>
									</table>

								</div>

							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>


	<!--footer-->
	<div class="contact-footer-w3layouts-agile">
		<?php include "footer.php" ?>