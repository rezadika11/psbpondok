<?php
include "../conf/koneksi.php";
include "../lib/inc.session.php";
include "../format_tanggal.php";
$ed = mysqli_query($connect, "SELECT * FROM admin, pengguna WHERE admin.idu = pengguna.nik AND pengguna.nik = '$_SESSION[nik]' AND pengguna.hak_akses != 'Santri'");
$r = mysqli_fetch_array($ed);
?>
<div class="">
	<div class="page-title">
		<div class="title_left">
			<h3>Edit Profile</h3>
		</div>
	</div>

	<div class="clearfix"></div>

	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<form action="?page=update-profile" method="post" enctype="multipart/form-data" class="contact-form">
				<div class="x_panel">
					<div class="x_title">
						<h2>Profile Pengguna</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
							<div class="profile_img">
								<div id="crop-avatar">
									<!-- Current avatar -->
									<?php if ($r['foto'] == "") { ?>
										<h4 style="color:red">Foto profile belum diisi</h4>
									<?php } else { ?>
										<img class="img-responsive avatar-view" src="uploads/admin-foto/<?= $r['foto']; ?>" alt="Avatar" title="Change the avatar">
									<?php } ?>
								</div>
							</div>
							<h3><?= $r['nama_pengguna'] ?></h3>
							<ul class="list-unstyled user_data">
								<label><input type="checkbox" id="toggle2" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br></label>
								<input type="file" name="foto" id="ijasah" accept="image/*" required disabled><br>
								</li>
							</ul>
							<br />
						</div>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<div class="profile_title">
								<div class="col-md-6">
									<h2>Biodata</h2>
								</div>
							</div>
							<!-- start of user-activity-graph -->
							<div class="col-md-12"><br>
								<table class="table table-condensed">
									<tr>
										<th>Nomor Induk</th>
										<td><input class="form-control" type="text" name="no_induk" value="<?= $r['nik']; ?>" readonly> </td>
									</tr>
									<tr>
										<th>Nama</th>
										<td><input class="form-control" type="text" name="nama" value="<?= $r['nama_admin']; ?>" required></td>
									</tr>
									<tr>
										<th>Email</th>
										<td><input class="form-control" type="text" name="email" value="<?= $r['email']; ?>" required></td>
									</tr>
									<tr>
										<th>Alamat</th>
										<td><textarea id="message" required="required" class="form-control" name="alamat" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"><?= $r['alamat']; ?></textarea></td>
									</tr>
									<tr>
										<th>Tempat Tanggal Lahir</th>
										<td>
											<div class="col-md-6">
												<input class="form-control" type="text" name="tmp_lahir" value="<?= $r['tmp_lahir']; ?>" required>
											</div>
											<div class='input-group date' id='myDatepicker1'>
												<input type='date' name="tgl_lahir" value="<?= $r['tgl_lahir']; ?>" class="form-control" required />


												</span>
											</div>
									</tr>
									<tr>
										<th>Jenis Kelamin</th>
										<td>
											<div class="radio">
												<?php if ($r['jk'] == 'Laki-laki') { ?>
													<label>
														<input type="radio" class="flat" name="jk" value="Laki-laki" checked> Laki - Laki
													</label>
													<label>
														<input type="radio" class="flat" name="jk" value="Perempuan"> Perempuan
													</label>
												<?php } else { ?>
													<label>
														<input type="radio" class="flat" name="jk" value="Laki-laki"> Laki - Laki
													</label>
													<label>
														<input type="radio" class="flat" name="jk" value="Perempuan" checked> Perempuan
													</label>
												<?php } ?>
											</div>
										</td>
									</tr>

									<tr>
										<td></td>
										<td> <button class="btn btn-primary" type="button" onclick="self.history.back()">Cancel</button>
											<button type="submit" class="btn btn-success">Submit</button>
										</td>
									</tr>
								</table>
							</div>
							<!-- end of user-activity-graph -->
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>