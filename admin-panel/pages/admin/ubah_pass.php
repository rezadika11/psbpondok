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
            <br />
          </div>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="profile_title">
              <div class="col-md-6">
                <h2>Ubah Password</h2>
              </div>
            </div>
            <!-- start of user-activity-graph -->
            <div class="col-md-12"><br>
              <form action="?page=update-pass" method="post" enctype="multipart/form-data" class="contact-form">
                <table class="table table-condensed">
                  <tr>
                    <th width="200px">Masukan Password Lama</th>
                    <input class="form-control" type="hidden" name="idu" value="<?= $r['nik'] ?>">
                    <td><input class="form-control" type="password" name="password_lama" placeholder="Masukan Password Lama"> </td>
                  </tr>
                  <tr>
                    <th>Masukan Password Baru</th>
                    <td><input class="form-control" type="password" name="password_baru" id="pass1" placeholder="Masukan Password Baru" required></td>
                  </tr>
                  <tr>
                    <th>Konfirmasi Password</th>
                    <td><input class="form-control" type="password" name="konfirmasi_password" id="pass2" onkeyup="checkPass(); return false;" placeholder="Masukan Password Baru" required></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td> <button class="btn btn-primary" type="button" onclick="self.history.back()">Cancel</button>
                      <button type="submit" class="btn btn-success">Submit</button>
                    </td>
                  </tr>
                </table>
              </form>
            </div>
            <!-- end of user-activity-graph -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function checkPass() {
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field
    //and the confirmation field
    if (pass1.value == pass2.value) {
      //The passwords match.
      //Set the color to the good color and inform
      //the user that they have entered the correct password
      pass2.style.backgroundColor = goodColor;
      message.style.color = goodColor;
      message.innerHTML = "Passwords Match!"
    } else {
      //The passwords do not match.
      //Set the color to the bad color and
      //notify the user.
      pass2.style.backgroundColor = badColor;
      message.style.color = badColor;
      message.innerHTML = "Passwords Do Not Match!"
    }
  }
</script>