<?php
include "../conf/koneksi.php";
include "../lib/inc.session.php";
$ed = mysqli_query($connect, "SELECT * FROM program WHERE id_program = '$_GET[tid]'");
$r = mysqli_fetch_array($ed);
?>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Program <small>Edit Program </small></h3>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="col-xs-3">
      </div>
      <div class="x_panel">
        <div class="x_content">
          <form class="" action="?page=update-jurusan" method="post">
            <div class='col-sm-6'>
              Nama Program
              <div class="form-group">
                <input type='hidden' name="tid" value="<?= $r['id_program'] ?>" class="form-control" required />
                <input type='text' name="nama" value="<?= $r['nama_program'] ?>" class="form-control" required />
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