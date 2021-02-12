<?php include "../lib/inc.session.php"; ?>
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Pendaftaran <small>Pon.Pes Darussalam Dukuhwaluh Purwokerto</small></h3>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Tambah Waktu <small> Pendaftaran</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="container">
            <div class="row">
              <form enctype="multipart/form-data" action="?page=save-pendaftaran" method="post">
                <div class='col-sm-3'>
                  Periode Pendaftaran
                  <div class="form-group">
                    <input type='text' name="periode" placeholder="Periode Pendaftaran" class="form-control" required />
                  </div>
                </div>
                <div class='col-sm-3'>
                  Batas Awal Waktu Pendaftaran
                  <div class="form-group">
                    <div class='input-group date' id='myDatepicker0'>
                      <input type='date' name="awal" placeholder="Waktu Awal Pendaftaran" class="form-control" required />

                    </div>
                  </div>
                </div>
                <div class='col-sm-3'>
                  Batas Akhir Waktu Pendaftaran
                  <div class="form-group">
                    <div class='input-group date' id='myDatepicker1'>
                      <input type='date' name="akhir" placeholder="Waktu Akhir Pendaftaran" class="form-control" required />

                    </div>
                  </div>
                </div>
                <div class='col-sm-3'>
                  Kuota Maksimal
                  <div class="form-group">
                    <input type='number' name="kuota" placeholder="Masukan Jumlah Maksimal Kuota" class="form-control" required />
                    <input type='hidden' name="aktif" value="Tidak" class="form-control" required />
                  </div>
                </div>
                <div class="col-sm-12">
                  <center><button class="btn btn-primary" type="reset">Reset</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                  </center>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="x_panel">
        <div class="x_title">
          <h2>Data Jadwal Pendaftaran<small>PPDB</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>Periode</th>
                <th>Batas Awal</th>
                <th>Batas Akhir</th>
                <th>Kuota</th>
                <th>Status</th>
                <th>Aktif</th>
                <th>Aktifasi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php

              include "../conf/koneksi.php";
              include "../format_tanggal.php";

              $query = mysqli_query($connect, "SELECT * FROM `pendaftaran` ");
              $no = 1;
              while ($a = mysqli_fetch_array($query)) {
              ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><?= $a['periode'] ?></td>
                  <td><?= indonesian_date($a['tgl_mulai']) ?></td>
                  <td><?= indonesian_date($a['tgl_selesai']) ?></td>
                  <td><?= $a['kuota'] ?></td>
                  <td>
                    <?php
                    $start_date = $a['tgl_mulai'];
                    $end_date = $a['tgl_selesai'];
                    $todays_date = date("Y-m-d");
                    if ($todays_date >= $start_date && $todays_date <= $end_date) { ?>
                      <span class="label label-info">Pendaftaran sedang berlangsung</span>
                      <?php } else {
                      if ($todays_date < $start_date) { ?>
                        <span class="label label-primary">Pendaftaran Belum dibuka</span>
                      <?php } else { ?>
                        <span class="label label-warning">Pendaftaran Sudah ditutup</span>
                    <?php }
                    }
                    ?>

                  <td>
                    <form action="?page=aktifasi" method="post">
                      <input type="hidden" name="tid" value="<?= $a['id_pendaftaran']; ?>" />
                      <?php if ($a['aktif'] == "Ya") { ?>
                        <label><input type="radio" class="flat" name="aktif" id="genderM" value="Ya" checked="" required />&nbsp;Ya</label>&nbsp;&nbsp;&nbsp;
                        <label><input type="radio" class="flat" name="aktif" id="genderF" value="Tidak" required />&nbsp;Tidak</label>
                      <?php } else { ?>
                        <label><input type="radio" class="flat" name="aktif" id="genderM" value="Ya" required />&nbsp;Ya</label>&nbsp;&nbsp;&nbsp;
                        <label><input type="radio" class="flat" name="aktif" id="genderF" value="Tidak" checked="" required />&nbsp;Tidak</label>
                      <?php } ?>
                  </td>
                  <td>
                    <button class="btn btn-default btn-sm" type="submit">Update</button>
                    </form>
                  </td>
                  <td>
                    <input type="button" class="btn btn-primary" name="submit" value="Edit" onclick="window.location='?page=edit-pendaftaran&tid=<?php echo $a['id_pendaftaran']; ?>' ">
                    <input type="button" class="btn btn-warning" name="reset" value="Hapus" onclick="window.location='?page=del-pendaftaran&tid=<?php echo $a['id_pendaftaran']; ?>' ">
                  </td>
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