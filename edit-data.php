<?php
include "header.php";
include "lib/inc.session.php";
include "conf/koneksi.php";
$sql  = mysqli_query($connect, "SELECT * FROM `pendaftar_santri`, prestasi, program WHERE pendaftar_santri.prestasi = prestasi.id_prestasi AND pendaftar_santri.program = program.id_program AND pendaftar_santri.nik = '$_SESSION[nik]'");
$r    = mysqli_fetch_array($sql);

?>
<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
  var htmlobjek;
  $(document).ready(function() {
    $("#propinsi").change(function() {
      var propinsi = $("#propinsi").val();

      $.ajax({
        url: "ambilkota.php",
        data: "propinsi=" + propinsi,
        cache: false,
        success: function(msg) {
          $("#kota").html(msg);

        }
      });
    });
    $("#kota").change(function() {
      var kota = $("#kota").val();
      $.ajax({
        url: "ambilkecamatan.php",
        data: "kota=" + kota,
        cache: false,
        success: function(msg) {
          $("#kec").html(msg);
        }
      });
    });
    $("#kec").change(function() {
      var kota = $("#kec").val();
      $.ajax({
        url: "ambilsekolah.php",
        data: "kec=" + kota,
        cache: false,
        success: function(msg) {
          $("#sek").html(msg);
        }
      });
    });
  });
</script>
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

        <div class="card my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-md-12">
                <div class="p-5">
                  <h3 class="text-center">Edit Pendaftaran Santri Baru</h3><br>


                  <div class="alert alert-info">
                    <strong>A. DATA PESERTA DIDIK</strong>
                  </div>
                  <form enctype="multipart/form-data" class="contact-form" action="edit-santri.php" method="post">
                    <div class="row">
                      <div class="col-md-4">
                        <label>Nomor Pendaftaran</label>
                        <input type="text" class="form-control" name="nodaftar" value="<?= $r['no_daftar'] ?>" readonly>
                      </div>

                      <div class="col-md-4">
                        <label>NIK</label>
                        <input type="text" class="form-control" name="nik" value="<?= $r['nik']; ?>" readonly>
                      </div>

                      <div class="col-md-4">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" value="<?= $r['nama_santri']; ?>" required>
                      </div>
                    </div><br>
                    <div class="row">
                      <div class="col-md-6">
                        <label>Jenis Kelamin</label> <br>
                        <?php if ($r['jk'] == "Laki - laki") { ?>
                          <div class="col-sm-5">
                            <label class="radio">
                              <input type="radio" name="jk" data-toggle="radio" value="Laki - laki" checked>
                              Laki - laki
                            </label>
                          </div>
                          <div class="col-sm-4">
                            <label class="radio">
                              <input type="radio" name="jk" data-toggle="radio" value="Perempuan">
                              Perempuan
                            </label>
                          </div>
                        <?php } else { ?>
                          <div class="col-sm-5">
                            <label class="radio">
                              <input type="radio" name="jk" data-toggle="radio" value="Laki - laki">
                              Laki - laki
                            </label>
                          </div>
                          <div class="col-sm-4">
                            <label class="radio">
                              <input type="radio" name="jk" data-toggle="radio" value="Perempuan" checked>
                              Perempuan
                            </label>
                          </div>
                        <?php } ?>
                      </div>
                      <div class="col-md-4">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" value="<?= $r['tempat_lahir']; ?>" placeholder="Masukan Tempat Lahir" required>
                      </div>
                      <div class="col-md-3">
                        <label>Tanggal Lahir</label>
                        <input class="datepicker form-control" type="date" name="tgl_lahir" value="<?= $r['tgl_lahir']; ?>" required />
                        <input name="tgl_daftar" type="hidden" value="<?= $r['tgl_daftar']; ?>" required />

                      </div>
                    </div><br><br>
                    <div class="row">

                    </div><br>

                    <div class="row">

                      <div class="col-md-2">
                        <label>Golongan Darah</label>
                        <input class="form-control" type="text" name="goldar" placeholder="Golongan Darah" value="<?= $r['goldar']; ?>" required />
                      </div>
                      <div class="col-md-3">
                        <label>Anak Ke</label>
                        <input class="form-control" type="number" name="anak_ke" placeholder="Anak ke-" value="<?= $r['anak_ke']; ?>" required />
                      </div>
                      <div class="col-md-3">
                        <label>Jml Saudara</label>
                        <input class="form-control" type="number" name="jml_saudara" placeholder="Jumlah Saudara" value="<?= $r['jml_saudara']; ?>" required />
                      </div>
                      <div class="col-md-4">
                        <label>Nomor Telp/HP</label>
                        <input class="form-control" type="number" name="notelp" placeholder="Nomor Telepon" value="<?= $r['notelp']; ?>" required />
                      </div>
                    </div><br>
                    <div class="row">
                      <div class="col-md-4">
                        <label>Hobi</label>
                        <input class="form-control" type="text" name="hobi" placeholder="Hobi" value="<?= $r['hobi']; ?>" required />

                      </div>
                      <div class="col-md-4">
                        <label>Cita-cita</label>
                        <input class="form-control" type="text" name="cita" placeholder="Cita-cita" value="<?= $r['cita']; ?>" required />

                      </div>
                      <div class="col-md-4">
                        <label>Asal Sekolah</label>
                        <input class="form-control" type="text" name="asal_sekolah" placeholder="Asal Sekolah" value="<?= $r['asal_sekolah']; ?>" required />

                      </div>

                    </div>

                    <div class="row">

                      <div class="col-md-6">
                        <label>Alamat</label>
                        <textarea class="form-control" placeholder="Masukkan alamat rumah" rows="3" name="alamat" required><?= $r['alamat']; ?></textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-3">
                        <select class="form-control" name="propinsi" id="propinsi">
                          <option value="">Pilih Provinsi</option>
                          <?php
                          //mengambil nama-nama propinsi yang ada di database
                          $propinsi = mysqli_query($connect, "SELECT * FROM provinsi ORDER BY nama_prov");
                          while ($p = mysqli_fetch_array($propinsi)) {
                            echo "<option value=\"$p[id_prov]\">$p[nama_prov]</option>\n";
                          }
                          ?>
                        </select>
                      </div>
                      <div class="col-sm-3">
                        <select class="form-control" name="kota" id="kota">
                          <option value="">Pilih Kabupaten</option>
                          <?php
                          //mengambil nama-nama propinsi yang ada di database
                          $kota = mysqli_query($connect, "SELECT * FROM kabupaten ORDER BY nama_kab");
                          while ($p = mysqli_fetch_array($propinsi)) {
                            echo "<option value=\"$p[id_kab]\">$p[nama_kab]</option>\n";
                          }
                          ?>
                        </select>
                      </div>
                      <div class="col-sm-3">
                        <select class="form-control" name="kec" id="kec">
                          <option value="">Pilih Kecamatan</option>
                          <?php
                          //mengambil nama-nama propinsi yang ada di database
                          $kec = mysqli_query($connect, "SELECT * FROM kecamatan ORDER BY nama_kec");
                          while ($p = mysqli_fetch_array($kota)) {
                            echo "<option value=\"$p[id_kec]\">$p[nama_kec]</option>\n";
                          }
                          ?>
                        </select>
                      </div>

                    </div>
                    <br>

                    <div class="row">

                      <div class="col-md-6" style="padding-top: 20px;">
                        <label>Foto KTP/KTS/Tanda Pengenal</label>
                        <p style=" color: red">*) Contoh </p>
                        <div class="avatar">
                          <img src="uploads/ktp/<?= $r['ktp'] ?>" alt="Thumbnail Image" class="img-thumbnail img-responsive" width="45%">
                        </div><br>
                        <label><input type="checkbox" id="toggle" name="ubah_ktp" value="true"> Ceklis jika ingin mengubah KTP<br></label>
                        <input type="file" name="ktp" id="ktp" accept="image/*" disabled required><br>
                        <script type="text/javascript">
                          $('#toggle').click(function() {
                            //check if checkbox is checked
                            if ($(this).is(':checked')) {

                              $('#ktp').removeAttr('disabled'); //enable input

                            } else {
                              $('#ktp').attr('disabled', true); //disable input
                            }
                          });
                        </script>
                      </div>
                      <div class="col-md-6" style="padding-top: 20px;">
                        <label>Foto KK</label>
                        <p style=" color: red">*) Contoh </p>
                        <div class="avatar">
                          <img src="assets/img/kk.jfif" alt="Thumbnail Image" class="img-thumbnail img-responsive" width="45%">
                        </div><br>
                        <input type="file" name="kk" id="fileToUpload" accept="image/*" required><br>
                      </div>

                    </div><br>
                    <div class="row">
                      <div class="col-sm-12">
                        <label>Prestasi yg pernah diraih</label>
                        <p> <i>*) Biarkan apabila tidak memiliki prestasi</i> </p>

                      </div>
                      <div class="col-sm-6">
                        <select class="form-control" name="prestasi" required>
                          <?php
                          $query = mysqli_query($connect, "SELECT * FROM prestasi");
                          while ($pres = mysqli_fetch_array($query)) {
                          ?>
                            <option value=" <?php echo $pres['id_prestasi']; ?> "><?php echo $pres['nama_prestasi']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div><br>
                    <div class="row">

                      <div class="col-md-6" style="padding-top: 20px;">
                        <label>Foto 3x4</label>
                        <p style=" color: red">*) Contoh </p>
                        <div class="avatar">
                          <img src="assets/img/pass.png" alt="Thumbnail Image" class="img-thumbnail img-responsive" width="25%">
                        </div><br>
                        <input type="file" name="foto" id="fileToUpload" accept="image/*" required><br>

                      </div>
                      <div class="col-md-6" style="padding-top: 20px;">
                        <label>Bukti Pembayaran Pendaftaran</label>
                        <p style=" color: red">*) Contoh </p>
                        <div class="avatar">
                          <img src="assets/img/pembayaran.jfif" alt="Thumbnail Image" class="img-thumbnail img-responsive" width="25%">
                        </div><br>
                        <input type="file" name="pembayaran" id="fileToUpload" accept="image/*" required><br>
                      </div>

                    </div><br>
                    <div class="row">
                      <div class="col-md-12">
                        <label>Program </label> <br>
                        <p> <i>*) Pilih Program Yang Ingin Anda Masuki</i> </p>
                        <select class="form-control col-md-6" name="program">
                          <option value="">Pilih Program </option>
                          <?php
                          //mengambil nama-nama propinsi yang ada di database
                          $jurusan = mysqli_query($connect, "SELECT * FROM program ORDER BY id_program");
                          while ($j = mysqli_fetch_array($jurusan)) {
                            echo "<option value=\"$j[id_program]\">$j[nama_program]</option>\n";
                          }
                          ?>
                        </select>
                      </div>
                    </div><br>
                    <div class="alert alert-info">
                      <strong>A. DATA ORANG TUA</strong>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label>Nama Ayah</label>
                        <input type="text" class="form-control" name="ayah" placeholder="Masukan Nama Ayah" required>
                      </div>

                      <div class="col-md-6">
                        <label>Nama Ibu</label>
                        <input type="text" class="form-control" name="ibu" placeholder="Masukan Nama Ibu" required>
                      </div>
                    </div><br>
                    <div class="row">
                      <div class="col-md-6">
                        <label>Pekerjaan Ayah</label>
                        <input class="form-control" type="text" name="kerja_ayah" placeholder="Pekerjaan Ayah" required />

                      </div>


                      <div class="col-md-6">
                        <label>Pekerjaan Ibu</label>
                        <input class="form-control" type="text" name="kerja_ibu" placeholder="Pekerjaan Ibu" required />

                      </div>
                    </div><br>
                    <div class="row">
                      <div class="col-md-6">
                        <label>Alamat Orang Tua</label>
                        <textarea class="form-control" placeholder="Masukkan alamat rumah" rows="3" name="alamat_ortu" required></textarea>
                      </div>

                      <div class="col-md-6">
                        <div class="col-sm-6">
                          <label>Penghasilan Orang Tua</label>
                          <select class="form-control" name="penghasilan_ortu" required>
                            <option>Pilih Penghasilan</option>
                            <option value="Kurang dari Rp.500.000,.">Kurang dari Rp.500.000,.</option>
                            <option value="Rp.500.000,. s/d Rp.1.000.000,.">Rp.500.000,. s/d Rp.1.000.000,.</option>
                            <option value="Rp.1.000.000,. s/d Rp.3.000.000,.">Rp.1.000.000,. s/d Rp.3.000.000,.</option>
                            <option value="Rp.3.000.000,. s/d Rp.5.000.000,.">Rp.3.000.000,. s/d Rp.5.000.000,.</option>
                            <option value="Diatas Rp.5000.000,.">Diatas Rp.5000.000,.</option>
                          </select>
                        </div>
                        <div class="col-sm-6">
                          <label>No Telp/HP Orang Tua</label>
                          <input type="text" class="form-control" name="notelp_ortu" placeholder="Masukan No.Telp" required>
                        </div>
                      </div>
                    </div><br>
                    <hr>
                    <div class="row">
                      <div class="col-md-2">
                        <label>
                          <input type="checkbox" required=""> &nbsp; Setuju
                        </label>
                      </div>
                      <div class="col-md-9">
                        <ul>
                          <li>Saya telah mengisi data dengan sebenar-benarnya dan dapat dipertanggungjawabkan.</li>
                          <li>Saya telah mengingat atau mencatat password untuk login nanti setelah formulir dikirimkan.</li>
                        </ul>
                      </div>
                    </div><br>
                    <div class="row" align="center">
                      <div class="edu_button">
                        <input type="submit" name="submit" class="btn btn-primary hvr-underline-from-center" value="Kirimkan Formulir Saya">
                      </div>
                    </div><br>
                  </form>

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
  </div>
</div>

<!--//inner_banner-->
<!--/short-->

<!--//inner_connectent-->
<!--footer-->
<div class="contact-footer-w3layouts-agile">
  <?php include "footer.php" ?>