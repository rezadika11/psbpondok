<?php
include "header.php";
include "conf/koneksi.php";
include "lib/inc.session.php";
include "format_tanggal.php";



$sql  = mysqli_query($connect, "SELECT * FROM pengguna WHERE nik = '$_SESSION[nik]' AND hak_akses = 'Santri'");
$r    = mysqli_fetch_array($sql);

$query = mysqli_query($connect, "SELECT * FROM pendaftar_santri, prestasi, program WHERE pendaftar_santri.prestasi = prestasi.id_prestasi AND pendaftar_santri.program = program.id_program AND pendaftar_santri.nik = '$_SESSION[nik]'");
$cek = mysqli_num_rows($query);
$p = mysqli_fetch_array($query);

$sql = mysqli_query($connect, "SELECT * FROM pendaftaran WHERE aktif = 'Ya'");
$s = mysqli_fetch_array($sql);
$tgl = date('YMD');
$wkt = $s['tgl_selesai'];
?>

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

            <li class="nav-item">
              <a class="nav-link active" aria-current="Dashboard" href="dashboard_santri.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="Ubah_password.php">Ubah Password</a>
            </li>
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
        <div class="card col-md-12">
          <div class="card-body">
            <div class="banner_bottom_in text-sm-center">
              <h3 class="headerw3">Selamat datang, <i><?php echo $r['nama_pengguna'] ?></i> </h3>

              <p>Pada halaman ini anda dapat melakukan pengisian formulir, melihat data diri, merubah data diri apabila ada kesalahan</p>
              <?php
              $start_date = $s['tgl_mulai'];
              $end_date = $s['tgl_selesai'];
              $todays_date = date("Y-m-d");
              if ($todays_date >= $start_date && $todays_date <= $end_date) { ?>
                <div class="edu_button">
                  <?php if ($p['keterangan'] == "") { ?>
                    <a class="btn btn-primary btn-lg hvr-underline-from-left" href="formulir.php" role="button">Isi Formulir</a>
                  <?php } else { ?>
                    <a class="btn btn-primary btn-lg hvr-underline-from-left" href="hasil_peng.php" role="button">Pengumuman</a>
                  <?php } ?>
                </div>
                <?php } else {
                if ($todays_date < $start_date) { ?>
                  <br>
                  <h2><span class="label label-primary">Pendaftaran Belum dibuka</span></h2>
                <?php } else { ?>
                  <br>
                  <h2><span class="label label-warning">Pendaftaran Sudah ditutup</span></h2>
              <?php }
              }
              ?>
            </div>

            <hr>
            <div class="top_spl_courses">
              <div class="container"><br>
                <?php
                if ($cek > 0) {
                ?>
                  <center>
                    <div class="row owner">
                      <div class="col-md-2 col-md-offset-5 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3 text-center">
                        <div class="avatar">
                          <img src="uploads/foto/<?php echo $p['foto']; ?>" alt="Thumbnail Image" class="img-thumbnail img-responsive">
                        </div><br>
                      </div>
                    </div>
                    <div class="profile-tabs">
                      <div id="my-tab-content" class="tab-content">
                        <div class="row">
                          <div class="col-md-8 col-md-offset-2">
                            <table class="table">
                              <tr>
                                <td width="250">Nomor Pendaftaran</td>
                                <td><?php echo $p['no_daftar']; ?></td>
                              </tr>
                              <tr>
                                <td width="150">Nomor Induk Keluarga</td>
                                <td><?php echo $p['nik']; ?></td>
                              </tr>
                              <tr>
                                <td width="250">Nama Santri</td>
                                <td><?php echo $p['nama_santri']; ?></td>
                              </tr>
                              <tr>
                                <td width="150">Jenis Kelamin</td>
                                <td><?php echo $p['jk']; ?></td>
                              </tr>
                              <tr>
                                <td width="150">Alamat</td>
                                <td><?php echo $p['alamat']; ?></td>
                              </tr>
                              <tr>
                                <td width="150">Tempat, Tanggal Lahir</td>
                                <td><?php echo $p['tempat_lahir']; ?>, <?php echo indonesian_date($p['tgl_lahir']); ?></td>
                              </tr>
                              <tr>
                                <td width="150">Golongan Darah</td>
                                <td><?php echo $p['goldar']; ?></td>
                              </tr>
                              <tr>
                                <td width="150">Anak Ke - </td>
                                <td><?php echo $p['anak_ke']; ?> dari <?php echo $p['jml_saudara']; ?> bersaudara</td>
                              </tr>
                              <tr>
                                <td width="150">Cita - cita</td>
                                <td><?php echo $p['cita']; ?></td>
                              </tr>
                              <tr>
                                <td width="150">Hobi</td>
                                <td><?php echo $p['hobi']; ?></td>
                              </tr>
                              <tr>
                                <td width="150">Prestasi</td>
                                <td><?php echo $p['tingkat']; ?></td>
                              </tr>
                              <tr>
                                <td width="150">Program yang Diambil</td>
                                <td><?php echo $p['nama_program']; ?></td>
                              </tr>
                              <tr>
                                <td width="150">Nama Ayah</td>
                                <td><?php echo $p['nama_ayah']; ?></td>
                              </tr>
                              <tr>
                                <td width="150">Nama Ibu</td>
                                <td><?php echo $p['nama_ibu']; ?></td>
                              </tr>
                              <tr>
                                <td width="150">Kerja Ayah</td>
                                <td><?php echo $p['kerja_ayah']; ?></td>
                              </tr>
                              <tr>
                                <td width="150">Kerja Ibu</td>
                                <td><?php echo $p['kerja_ibu']; ?></td>
                              </tr>
                              <tr>
                                <td width="150">Nama Ayah</td>
                                <td><?php echo $p['nama_ayah']; ?></td>
                              </tr>
                              <tr>
                                <td width="150">Alamat Orang Tua</td>
                                <td><?php echo $p['alamat_ortu']; ?></td>
                              </tr>
                              <tr>
                                <td width="150">Nomor Telp/HP Orang Tua</td>
                                <td><?php echo $p['notelp_ortu']; ?></td>
                              </tr>
                              <tr>
                                <td width="150">KTP/KTS/lainnya</td>
                                <td><img src="uploads/ktp/<?php echo $p['ktp']; ?>" alt="Thumbnail Image" class="img-thumbnail img-responsive"></td>
                              </tr>
                              <tr>
                                <td width="150">Kartu Keluarga</td>
                                <td><img src="uploads/kk/<?php echo $p['kk']; ?>" alt="Thumbnail Image" class="img-thumbnail img-responsive"></td>
                              </tr>
                              <tr>
                                <td width="150">Bukti Pembayaran</td>
                                <td><img src="uploads/pembayaran/<?php echo $p['pembayaran']; ?>" alt="Thumbnail Image" class="img-thumbnail img-responsive"></td>
                              </tr>
                              <tr>
                                <td width="150">Status</td>
                                <td><span class="label label-info"><?php echo $p['keterangan']; ?></span></td>
                              </tr>
                  </center>
                  </table>
                  <hr>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="edu_button">
                        <a class="btn btn-success btn-lg hvr-underline-from-left" href="edit-data.php" role="button">Edit</a>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="edu_button">
                        <a class="btn btn-primary btn-lg hvr-underline-from-left" href="soal.php" role="button">Mulai Tes</a>
                      </div>
                    </div>
                  </div>

              </div>
            </div>
          </div>
        </div>
      <?php } else { ?>
        <div class="tab-pane text-center" id="following">
          <h3>Belum ada data !</h3><br>
          <div class="avatar">
            <img src="assets/img/file_empty.png" alt="Thumbnail Image" class="img-thumbnail img-responsive" style="width:30%">
          </div>
        </div>
      <?php } ?>
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

<!--//what-we-do-->
<!--footer-->
<div class="contact-footer-w3layouts-agile">
  <?php include "footer.php" ?>