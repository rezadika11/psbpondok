<?php
include "../conf/koneksi.php";
include "../lib/inc.session.php";
include "../format_tanggal.php";
$ed = mysqli_query($connect, "SELECT * FROM admin, pengguna WHERE admin.idu = pengguna.nik AND pengguna.nik = '$_SESSION[nik]' AND pengguna.hak_akses = 'Superadmin'");
$r = mysqli_fetch_array($ed);
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
                <img class="img-responsive avatar-view" src="uploads/admin-foto/<?= $r['foto']; ?>" alt="Avatar" title="Change the avatar">
              </div>
            </div>
            <h3><?= $r['nama_pengguna'] ?></h3>

            <ul class="list-unstyled user_data">
              <li><i class="fa fa-map-marker user-profile-icon"></i> <?= $r['alamat']; ?>
              </li>

              <li>
                <i class="fa fa-briefcase user-profile-icon"></i> <?= $r['hak_akses'] ?>
              </li>

              <li class="m-top-xs">
                <i class="fa fa-envelope-o"></i> <?= $r['email'] ?>
              </li>
            </ul>

            <a class="btn btn-success" href="?page=edit-profile"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
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
              <table class="table table-condensed">
                <tr>
                  <th>Nomor Induk</th>
                  <td><?= $r['nik']; ?></td>
                </tr>
                <tr>
                  <th>Nama</th>
                  <td><?= $r['nama_admin']; ?></td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td><?= $r['email']; ?></td>
                </tr>
                <tr>
                  <th>Alamat</th>
                  <td><?= $r['alamat']; ?></td>
                </tr>
                <tr>
                  <th>Tempat Tanggal Lahir</th>
                  <td><?= $r['tmp_lahir']; ?>, <?= indonesian_date($r['tgl_lahir']); ?></td>
                </tr>
                <tr>
                  <th>Jenis Kelamin</th>
                  <td><?= $r['jk']; ?></td>
                </tr>

              </table>
            </div>
            <!-- end of user-activity-graph -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>