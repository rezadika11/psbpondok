<?php
include "../conf/koneksi.php";
include "../lib/inc.session.php";

/*-------- menghitung total jumlah peserta -----------*/
$sql1 = mysqli_query($connect, "select *, count(pengguna.nik) as jml_peserta from pengguna where hak_akses = 'Santri' ");
$a = mysqli_fetch_array($sql1);
$jml_pendaftar = $a['jml_peserta'];

/*-------- menghitung total jumlah pengguna admin aktif -----------*/
$sql2 = mysqli_query($connect, "select *, count(pengguna.nik) as jml_pengguna from pengguna where hak_akses = 'Superadmin' ");
$b = mysqli_fetch_array($sql2);
$jml_user = $b['jml_pengguna'];

/*-------- menghitung total jumlah formulir terkumpul -----------*/
$sql3 = mysqli_query($connect, "select *, count(pendaftar_santri.nik) as jml_daftar from pendaftar_santri");
$c = mysqli_fetch_array($sql3);
$jml_formulir = $c['jml_daftar'];

/*-------- menghitung total jumlah formulir terkumpul -----------*/
$sql4 = mysqli_query($connect, "select *, count(pendaftar_santri.nik) as jml_cewe from pendaftar_santri where jk = 'Perempuan'");
$d = mysqli_fetch_array($sql4);
$jml_cewe = $d['jml_cewe'];

/*-------- menghitung total jumlah formulir terkumpul -----------*/
$sql5 = mysqli_query($connect, "select *, count(pendaftar_santri.nik) as jml_cowo from pendaftar_santri where jk = 'Laki - laki'");
$e = mysqli_fetch_array($sql5);
$jml_cowo = $e['jml_cowo'];

$query = mysqli_query($connect, "SELECT * FROM pengguna WHERE nik = '$_SESSION[nik]'");
$user = mysqli_fetch_array($query);

if ($user['email'] == "") {
  echo "<script>alert('Data belum lengkap, mohon lengkapi serta rubah password lama anda untuk kemudahaan anda.');
    window.location = 'media.php?page=edit-profile'</script>";
}
?>

<!-- top tiles -->
<div class="row tile_count">
  <?php if ($user['hak_akses'] == 'Superadmin') : ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
      <div class="count"><?= $jml_user; ?></div>
    </div>
  <?php endif; ?>

  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-clock-o"></i> Total Pendaftar</span>
    <div class="count"><?= $jml_pendaftar; ?></div>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Formulir Terkumpul</span>
    <div class="count green"><?= $jml_formulir; ?></div>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Pendaftar Laki - laki</span>
    <div class="count"><?= $jml_cowo ?></div>
    <!-- <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span> -->
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Pendaftar Perempuan</span>
    <div class="count"><?= $jml_cewe ?></div>
    <!-- <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span> -->
  </div>
  <!--   <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
    <div class="count">2,315</div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
    <div class="count">7,325</div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
  </div> -->
</div>
<!-- /top tiles -->

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="dashboard_graph">

      <div class="row x_title">
        <div class="col-md-6">
          <h3>dashboard <small>Admin</small></h3>
        </div>
      </div>
      <div class="x_content">

        <div class="bs-example" data-example-id="simple-jumbotron">
          <div class="jumbotron">
            <h3>Selamat datang <i><?= $user['nama_pengguna']; ?></i></h3>
            <p>Pada Halaman ini admin dapat menambahkan akun untuk admin lain, melihat pendaftar kemudian menyeleksi pendaftar siswa</p>
          </div>
        </div>

      </div>

      <div class="clearfix"></div>
    </div>
  </div>

</div>
<br />