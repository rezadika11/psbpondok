<?php include "../lib/inc.session.php"; ?>
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Laporan PSB <small>Pon.Pes Darussalam Dukuhwaluh Purwokerto</small></h3>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Data Laporan PSB<small></small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>Periode</th>
                <th>Waktu Pendaftaran</th>
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
                  <td><?= indonesian_date($a['tgl_mulai']) ?> sampai <?= indonesian_date($a['tgl_selesai']) ?></td>
                  <td>
                    <input type="button" class="btn btn-primary" name="submit" value="Lihat" onclick="window.location='?page=detail-laporan&tid=<?php echo $a['id_pendaftaran']; ?>' ">
                    <form action="../admin-panel/pages/laporan/cetak_laporan.php" method="post" name="postform">
                      <input type="hidden" name="tid" value="<?php echo $a['id_pendaftaran']; ?>">
                      <input type="submit" class="btn btn-warning" name="getPdf" value="Cetak">
                    </form>
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