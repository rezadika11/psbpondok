<?php
include "../conf/koneksi.php";
include "../lib/inc.session.php";
$ed = mysqli_query($connect, "SELECT * FROM admin, pengguna WHERE admin.idu = pengguna.nik AND pengguna.nik = '$_GET[tid]' AND pengguna.hak_akses = 'Superadmin'");
$r = mysqli_fetch_array($ed);
?>
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Users <small>Tambah Akun Admin</small></h3>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="col-xs-3">
      </div>
      <div class="x_panel">
        <div class="x_content">
          <form id="demo-form2" method="post" action="?page=update-admin" data-parsley-validate class="form-horizontal form-label-left">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Induk <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="hidden" id="first-name" name="tid" value="<?= $_GET['tid']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                <input type="text" id="first-name" name="no_induk" value="<?= $_GET['tid']; ?>" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> Nama Lengkap <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <?= $r['nama_admin']; ?>
                <input type="text" id="last-name" name="nama" value="<?= $r['nama_admin']; ?>" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="middle-name" class="form-control col-md-7 col-xs-12" type="password" value="<?= $r['pass_asli']; ?>" name="pass">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select id="heard" class="form-control" name="hak_akses" required>
                  <option value="">Pilih Hak Akses</option>
                  <?php if ($r['hak_akses'] == "Admin") { ?>
                    <option value="Admin" selected>Admin</option>
                    <option value="Superadmin">Superadmin</option>
                  <?php } else { ?>
                    <option value="Admin">Admin</option>
                    <option value="Superadmin" selected>Superadmin</option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button class="btn btn-primary" type="button" onclick="self.history.back()">Cancel</button>
                <button class="btn btn-primary" type="reset">Reset</button>
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>