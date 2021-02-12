<?php
include "header.php";
include "lib/inc.session.php";
include "conf/koneksi.php";
?>
<link rel="stylesheet" href="js/datatables/dataTables.bootstrap.css">
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
						<?php if (isset($_SESSION['nik'])) { ?>
							<li class="nav-item">
								<a class="nav-link " href="dashboard_santri.php">Dashboard</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="ubah_password.php">Ubah Password</a>
							</li>
						<?php } ?>
						<li class="nav-item">
							<a class="nav-link" href="syarat.php">Persyaratan</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="terdaftar.php">Pendaftar</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="pengumuman.php">Pengumuman</a>
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

							<h3 class="headerw3">Ubah Password</h3>
							<hr>
							<form enctype="multipart/form-data" class="contact-form" action="update_password.php" method="post">
								<div class="row">
									<div class="col-md-4">
										<label>Password Lama</label>
										<input type="hidden" class="form-control" name="idu" value="<?= $_SESSION['nik'] ?>" readonly>
										<input type="password" class="form-control" name="pass_lama" required>
									</div>

									<div class="col-md-4">
										<label>Password Baru</label>
										<input type="password" class="form-control" name="pass_baru" id="pass1" required>
									</div>

									<div class="col-md-4">
										<label>Ulangi Password Baru</label>
										<input type="password" class="form-control" name="konfirmasi_pass" id="pass2" onkeyup="checkPass(); return false;" required>
										<span id="confirmMessage" class="confirmMessage"></span>
									</div>
								</div><br>

								<div class="row-cols-md-3" align="center">
									<div class="edu_button">
										<input type="submit" name="submit" class="btn btn-primary hvr-underline-from-center" value="Ubah Password">
									</div>
								</div><br>
							</form>




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
											<input type="text" name="nisn" class="form-control" placeholder="Masukan Nisn">
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




				<!-- /.col-md-6 -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- Modal1 -->

<!--//banner_bottom-->
<script type="text/javascript">
	function checkPass() {
		//Store the password field objects into variables ...
		var pass1 = document.getElementById('pass1');
		var pass2 = document.getElementById('pass2');
		//Store the Confimation Message Object ...
		var message = document.getElementById('confirmMessage');
		//Set the colors we will be using ...
		var goodColor = "#66cc66";
		var badColor = "#ff6666";
		//Compare the values in the password field
		//and the confirmation field
		if (pass1.value == pass2.value) {
			//The passwords match.
			//Set the color to the good color and inform
			//the user that they have entered the correct password
			pass2.style.backgroundColor = goodColor;
			message.style.color = goodColor;
			message.innerHTML = "Passwords Match!"
		} else {
			//The passwords do not match.
			//Set the color to the bad color and
			//notify the user.
			pass2.style.backgroundColor = badColor;
			message.style.color = badColor;
			message.innerHTML = "Passwords Do Not Match!"
		}
	}
</script>

<!--footer-->
<div class="contact-footer-w3layouts-agile">

	<?php include "footer.php" ?>