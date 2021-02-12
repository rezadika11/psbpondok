<?php
include "header.php";
include "conf/koneksi.php";
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container">
			<div class="row mb-2">
				<div class="col-sm-12">
					<ul class="nav nav-pills text-bold">

						<?php if (isset($_SESSION['nik'])) { ?>
							<li class="nav-item">
								<a class="nav-link active" aria-current="Dashboard" href="dashboard_santri.php">Dashboard</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="Ubah_password.php">Ubah Password</a>
							</li>
						<?php } ?>
						<li class="nav-item">
							<a class="nav-link" href="syarat.php">Persyaratan</a>
						</li>
						<li class="nav-item">
							<a class="nav-link " href="terdaftar.php">Pendaftar</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="pengumuman.php">Pengumuman</a>
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

					<div class="card">

						<!-- /.card-header -->
						<div class="card-body">
							<h3 class="headerw3">Daftar Siswa yang lolos PSB Online</h3>
							<hr>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>NIK</th>
										<th>Nama Lengkap</th>
										<th>Jenis Kelamin</th>
										<th>Alamat</th>
									</tr>
								</thead>
								<tbody>
									<?php

									$sql = mysqli_query($connect, "SELECT * FROM pendaftar_santri WHERE keterangan = 'Lulus' ORDER BY nik DESC");
									$no = 1;
									while ($b = mysqli_fetch_array($sql)) {
									?>
										<tr>
											<td><?php echo $no; ?></td>
											<td><?php echo $b['nik'] ?></td>
											<td><?php echo $b['nama_santri'] ?></td>
											<td><?php echo $b['jk'] ?></td>
											<td><?php echo $b['alamat'] ?></td>
										</tr>
									<?php $no++;
									} ?>
								</tbody>
							</table>
						</div>
					</div>

				</div>
			</div>

		</div>

	</div>
</div>
<!---modal1-->
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
					<form action="log_validate.php" method="POST">
						<div class="input-group mb-4">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-envelope"></i></span>
							</div>
							<input type="number" name="nik" class="form-control" placeholder="Masukan NIK">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-lock"></i></span>
							</div>
							<input type="password" name="pass" class="form-control" placeholder="Masukkan Password">
						</div>
						<div class="modal-footer">

							<button type="submit" class="btn btn-primary">Login</button>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>








<!--footer-->
<div class="contact-footer-w3layouts-agile">

	<?php include "footer.php" ?>