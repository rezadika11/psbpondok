<?php
include "header.php";
include "conf/koneksi.php";
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container">
			<div class="row mb-2">
				<div class="col-sm-8">
					<ul class="nav nav-pills text-bold">
						<!-- <ul class="top_nav">
                            
                            <li><a href="persyaratan.html">Persyaratan</a></li>
                            <li><a href="terdaftar.html">Terdaftar</a></li>
                            <li><a href="pengumuman.html">Pengumuman</a></li>
                        </ul> -->
						<?php if (isset($_SESSION['nik'])) { ?>
							<li class="nav-item">
								<a class="nav-link " aria-current="Dashboard" href="dashboard_santri.php">Dashboard</a>
							</li>
							<li class="nav-item">
								<a class="nav-link " href="Ubah_password.php">Ubah Password</a>
							</li>
						<?php } ?>
						<li class="nav-item">
							<a class="nav-link active" href="syarat.php">Persyaratan</a>
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
						<div class="card-body">

							<!-- /.card-header -->
							<h3 class="headerw3">Panduan PSB</h3>
							<hr>
							<div class="about-sub-gd">
								<h4 style="color: #000">Tata Cara Pendaftaran : </h4>
								<table class="table" style="text-align: left;">
									<tr>
										<td><span class="fa fa-check" aria-hidden="true"></td>
										<td>Siswa mendaftarkan di halaman utama untuk mendapatkan akun dengan memasukan NISN, Nama serta Password. Perlu diperhatikan NISN dan Password bersifat rahasia</td>
									</tr>
									<tr>
										<td><span class="fa fa-check" aria-hidden="true"></td>
										<td>Setelah mendaftar, siswa melakukan login dengan NISN dan password yang telah terdaftar sebelumnya</td>
									</tr>
									<tr>
										<td><span class="fa fa-check" aria-hidden="true"></td>
										<td>Setelah login berhasil kemudian siswa dapat langsung mengisi formulir pendaftaran PPBD Online. diwajibkan untuk mengisi semua data dengan data yang valid dan dapat dipertanggung jawabkan</td>
									</tr>
									<tr>
										<td><span class="fa fa-check" aria-hidden="true"></td>
										<td>Saat proses pengisian formulir berhasil, maka data diri akan muncul. kemudian apa bila ingin merubah data diri dapat dilakukan melalui tombol edit yang ada dibawah</td>
									</tr>
									<tr>
										<td><span class="fa fa-check" aria-hidden="true"></td>
										<td>Tunggu sampai waktu pengumuman tiba, maka hasil akan diumumkan di halaman pengumuman yang dapat di akses di dashboard siswa</td>
									</tr>
									<tr>
										<td><span class="fa fa-check" aria-hidden="true"></td>
										<td>Untuk calon siswa yang diterima melakukan pendaftaran ulang ke sekolah dengan membawa berkas/dokumen asli yang terlampir pada persyaratan</td>
									</tr>
									<tr>
										<td><span class="fa fa-check" aria-hidden="true"></td>
										<td>Verifikasi data oleh pihak sekolah</td>
									</tr>
									<tr>
										<td><span class="fa fa-check" aria-hidden="true"></td>
										<td>Pihak sekolah menyatakan calon siswa lolos seleksi / tidak (pengesahan).</td>
									</tr>
									<tr>
										<td><span class="fa fa-check" aria-hidden="true"></td>
										<td>Calon siswa membayar biaya masuk sekolah.</td>
									</tr>
								</table>
							</div>
							<h3 class="headerw3">Persyaratan PPDB</h3>
							<hr>
							<div class="about-sub-gd">
								<p>Setelah mendaftar di PSB Online, calon siswa menyerahkan hasil print out formulir online ke Sekretariat Panitia PPDB :</p>
								<table class="table" style="text-align: left;">
									<tr>
										<td><span class="fa fa-check" aria-hidden="true"></td>
										<td>Bagi Calon Siswa yang masih aktif di sekolah SMP/MTS harap melampirkan :</td>
									</tr>
									<tr>
										<td></td>
										<td>
											<ol type="a">
												<li>Foto copy NISN (Nomor Induk Siswa Nasional) : 1 lembar</li>
												<li>Foto copy raport minimal kelas 4, 5 dan 6 (semester gasal) : 1 lembar (dilegalisir)</li>
												<li>Foto copy Akta kelahiran dan Kartu Keluarga : 1 lembar</li>
												<li>pas photo berwarna ukuran 3 x 4 cm sebanyak 3 lembar</li>
												<li>Surat Pernyataan Orang Tua/Wali (disediakan Panitia)</li>
											</ol>
											(Calon siswa menunjukkan Buku Raport asli)
										</td>
									</tr>
								</table>


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

		</div>





		<!--footer-->
		<div class="contact-footer-w3layouts-agile">
			<?php include "footer.php" ?>