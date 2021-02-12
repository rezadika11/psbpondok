<?php
include("header.php");

include "conf/koneksi.php";
include "lib/inc.session.php";
include "format_tanggal.php";

$sql  = mysqli_query($connect, "select * from pengguna where nik = '$_SESSION[nik]'");
$r    = mysqli_fetch_array($sql);

$query = mysqli_query($connect, "SELECT * FROM `pendaftar_santri`, prestasi WHERE pendaftar_santri.prestasi = prestasi.id_prestasi AND pendaftar_santri.nik = '$_SESSION[nik]'");
$cek = mysqli_num_rows($query);
$p = mysqli_fetch_array($query);



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
      <div class="col-md-12">

        <div class="card ">
          <div class="card-body ">
            <!-- Nested Row within Card Body -->



            <div class="card-body">
              <div class="col-md-12 col-md-offset-12">
                <?php
                if ($cek > 0) {
                ?>
                  <div class="panel panel-primary">
                    <div class="panel-heading mb-5" align="center">
                      <h3>Pengumuman Kelulusan PSB Online 2021</h3>
                    </div>
                    <div class="panel-body">
                      <table class="table">
                        <tr>
                          <td>Nomor Pendaftaran </td>
                          <td> :</td>
                          <td><?php echo $p['no_daftar']; ?></td>
                        </tr>
                        <tr>
                          <td>NIK </td>
                          <td> :</td>
                          <td><?php echo $p['nik']; ?></td>
                        </tr>
                        <tr>
                          <td>Nama </td>
                          <td> :</td>
                          <td><?php echo $p['nama_santri']; ?></td>
                        </tr>
                        <tr>
                          <td>Jenis Kelamin </td>
                          <td> :</td>
                          <td><?php echo $p['jk']; ?></td>
                        </tr>
                        <!-- <tr>
                                        <td>Kelas </td>
                                        <td> :</td>
                                        <td><?php echo $p['kelas']; ?></td>
                                      </tr> -->

                      </table>
                      <?php if ($p['keterangan'] == "Lulus") { ?>
                        <h3 align="center"><span class="label label-success">Anda dinyatakan Lulus seleksi penerimaan santri baru</span></h3><br>
                      <?php } elseif ($p['keterangan'] == "Tidak Lulus") { ?>
                        <h3 align="center"><span class="label label-danger">Anda dinyatakan Tidak Lulus seleksi penerimaan santri baru</span></h3>
                      <?php } else { ?>
                        <h3 align="center"><span class="label label-warning">Belum ada pengumuman</span></h3><br>
                      <?php } ?>
                    </div>
                  </div>
                <?php } else { ?>
                  <div class="tab-pane text-center" id="following">
                    <h3>Belum ada data !</h3>
                    <div class="avatar">
                      <img src="assets/img/file_empty.png" alt="Thumbnail Image" class="img-thumbnail img-responsive" style="width:100%">
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
            <br><br><br><br><br>
            <?php if ($p['keterangan'] == "Lulus") { ?>
              <div class="row">
                <div class="col-md-12 col-md-offset-1">
                  <div class="panel panel-success">
                    <div class="panel-heading" align="center">Persyaratan Daftar Ulang :</div>
                    <div class="panel-body" align="left" style="padding-left:100px;padding-right:100px;">
                      <ul>
                        <li>Membawa bukti daftar dengan mencetak formulir persyaratan <small> <i>link ada dibawah</i> </small> </li>
                        <li>Membawa Kartu NIK</li>

                        <!-- <li>Surat Pernyataan Orang Tua/Wali (disediakan Panitia)</li> -->
                      </ul>
                    </div>
                  </div>
                </div>
              </div>


              <div class="edu_button">
                <form action="pdf_formulir.php" method="post" name="postform">
                  <input type="hidden" name="tid" value="<?php echo $p['nik']; ?>">
                  <input type="submit" class="btn btn-primary btn-lg hvr-underline-from-left" name="getPdf" value="Cetak Formulir">
                </form>
              </div>
            <?php } ?>



            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->


        </div>






        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>



<!--footer-->
<div class="contact-footer-w3layouts-agile">
  <?php include "footer.php" ?>