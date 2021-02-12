<?php
include "../conf/koneksi.php";
include "../lib/inc.session.php";
include "../format_tanggal.php";
$query = mysqli_query($connect, "SELECT * FROM pendaftar_santri, prestasi, program WHERE pendaftar_santri.prestasi = prestasi.id_prestasi AND pendaftar_santri.program = program.id_program AND pendaftar_santri.no_daftar = '$_GET[tid]'");
$p = mysqli_fetch_array($query);

?>
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>User Profile</h3>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
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
                <a class="fancybox-effects-d" href="../uploads/foto/<?php echo $p['foto']; ?>" title="Foto Siswa"><img class="img-responsive avatar-view" src="../uploads/foto/<?php echo $p['foto']; ?>" alt="Avatar" title="Change the avatar"></a>
              </div>
            </div>
            <h3><?= $p['nama_santri'] ?></h3>
            <form enctype="multipart/form-data" action="?page=verifikasi" method="post">
              <input type="hidden" name="no_daftar" value="<?php echo $p['no_daftar']; ?>">
              <button class="btn btn-success" type="submit"><i class="fa fa-edit m-right-xs"></i> Verifikasi</button>
            </form>
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
              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <tr>
                    <td width="250">Nomor Pendaftaran</td>
                    <td><?php echo $p['no_daftar']; ?></td>
                  </tr>
                  <tr>
                    <td width="150">Nomor Kartu Keluarga</td>
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

                  <tr>
                    <td width="150">Asal Sekolah</td>
                    <td><?php echo $p['asal_sekolah']; ?></td>
                  </tr>

                  <tr>
                    <td width="150">Prestasi</td>
                    <td><?php echo $p['tingkat']; ?></td>
                  </tr>
                  <tr>
                    <td width="150">Program Program yang Diambil</td>
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
                    <td width="150">KTP KTS/lainnya</td>
                    <td><a class="fancybox" href="../uploads/ktp/<?php echo $p['ktp']; ?>" data-fancybox-group="gallery" title="Gambar ktp" width="100%"><img src="../uploads/ktp/<?php echo $p['ktp']; ?>" alt="Thumbnail Image" class="img-thumbnail img-responsive"></a>
                    </td>
                  </tr>
                  <tr>
                    <td width="150">Kartu Keluarga</td>
                    <td><a class="fancybox" data-fancybox-group="gallery" href="../uploads/kk/<?php echo $p['kk']; ?>" title="Gambar KK" width="100%"><img src="../uploads/kk/<?php echo $p['kk']; ?>" alt="Thumbnail Image" class="img-thumbnail img-responsive"></a></td>
                  </tr>
                  <tr>
                    <td width="150">Pembayaran</td>
                    <td><a class="fancybox" data-fancybox-group="gallery" href="../uploads/pembayaran/<?php echo $p['pembayaran']; ?>" title="Gambar Pembayaran" width="100%"><img src="../uploads/pembayaran/<?php echo $p['pembayaran']; ?>" alt="Thumbnail Image" class="img-thumbnail img-responsive"></a></td>
                  </tr>
                  <!-- <tr>
                            <td width="150">Status</td>
                            <td><span class="label label-info"><?php echo $p['keterangan']; ?></span></td>
                          </tr> -->
                </table>
              </div>
            </div>
            <!-- end of user-activity-graph -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>