<?php
include "../conf/koneksi.php";
include "../lib/inc.session.php";
$ed = mysqli_query($connect, "SELECT * FROM pendaftaran WHERE id_pendaftaran = '$_GET[tid]'");
$r = mysqli_fetch_array($ed);
?>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Users <small>Edit Pendaftaran</small></h3>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="col-xs-3">
      </div>
      <div class="x_panel">
        <div class="x_content">
          <form class="" action="?page=update-pendaftaran" method="post">
            <div class='col-sm-3'>
              Periode Pendaftaran
              <div class="form-group">
                <input type='text' name="periode" value="<?= $r['periode'] ?>" class="form-control" required />
              </div>
            </div>
            <div class='col-sm-3'>
              Batas Awal Waktu Pendaftaran
              <div class="form-group">
                <input type='hidden' name="tid" value="<?= $r['id_pendaftaran'] ?>" class="form-control" required />
                <div class='input-group date' id='myDatepicker0'>
                  <input type='date' name="awal" value="<?= $r['tgl_mulai'] ?>" class="form-control" required />

                </div>
              </div>
            </div>
            <div class='col-sm-3'>
              Batas Akhir Waktu Pendaftaran
              <div class="form-group">
                <div class='input-group date' id='myDatepicker1'>
                  <input type='date' name="akhir" value="<?= $r['tgl_selesai'] ?>" class="form-control" required />

                </div>
              </div>
            </div>
            <div class='col-sm-3'>
              Kuota Maksimal
              <div class="form-group">
                <input type='number' name="kuota" value="<?= $r['kuota'] ?>" class="form-control" required />
              </div>
            </div>
            <div class="col-sm-12" align="center">
              <button class="btn btn-primary" type="button" onclick="self.history.back()">Cancel</button>
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>