<?php include "header.php" ?>
<style type="text/css">
    .count_down {
        padding: 5px;
        font-size: 50px;
        font-weight: bold;
        color: #222;
    }

    .count_down div {
        width: 75px;
        height: 50px;
        display: inline-block;
    }

    .count_down span {
        color: rgba(0, 0, 0, .8);
    }

    .count_down sup {
        color: rgba(0, 0, 0, .8);
        font-size: 20px;
    }
</style>
<script type="text/javascript" src="js/count/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/count/js/countdown.js"></script>
<script type="text/javascript" src="js/count/js/script.js"></script>
<!-- <link rel="stylesheet" href="js/count/font/Bebas/stylesheet.css" type="text/css" /> -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ul class="nav nav-pills text-bold">

                        <?php if (isset($_SESSION['nik'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="Dashboard" href="dashboard_santri.php">Dashboard</a>
                            </li>
                        <?php } ?>
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
            <div class="row">


                <!-- /.col-md-6 -->
                <div class="col-lg-12">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <center>
                                <h3>PONDOK PESANTREN DARUSSALAM DUKUHWALUH PURWOKERTO </h3>
                                <p style="font-size: 20px">Selamat Datang di Website Penerimaan Santri Baru Online</p>
                                <?php if (isset($_SESSION['nik'])) { ?>
                                    <button type="submit" class="btn btn-primary mb-4" a href="#" data-toggle="modal" data-target="#Modal4"> <i class="fa fa-edit" aria-hidden="true"></i> Daftar Sekarang</button>
                                <?php } else { ?>
                                    <button type="submit" class="btn btn-primary mb-4" a href="#" data-toggle="modal" data-target="#myModal3"> <i class="fa fa-edit" aria-hidden="true"></i> Daftar Sekarang</button>
                                <?php } ?>
                                </button>

                                <?php
                                include "conf/koneksi.php";
                                include "format_tanggal.php";

                                $sql = mysqli_query($connect, "SELECT * FROM pendaftaran WHERE aktif = 'Ya'");
                                $s = mysqli_fetch_array($sql);
                                $tgl = date('YMD');
                                $wkt = $s['tgl_selesai'];

                                ?>

                                <h3>Jadwal Pendaftaran PSB Online Pondok Pesantren Darussalam Dukuhwaluh Purwokerto</h3>
                                <hr>
                                <div class="about-sub-gd">
                                    <?php
                                    $start_date = $s['tgl_mulai'];
                                    $end_date = $s['tgl_selesai'];
                                    $todays_date = date("Y-m-d");
                                    if ($todays_date >= $start_date && $todays_date <= $end_date) { ?>
                                        <h1>Sisa waktu pendaftaran</h1><br>
                                        <h4 style="color: #000">Pendaftaran dibuka mulai <?= indonesian_date($s['tgl_mulai']); ?> s/d <?= indonesian_date($s['tgl_selesai']); ?></h4>
                                        <div align="center" class="col-md-12">
                                            <div id="count-down-container"></div>
                                            <script type="text/javascript">
                                                var currentyear = new Date().getFullYear()
                                                var target_date = new cdtime("count-down-container", "<?= $wkt; ?>")
                                                target_date.displaycountdown("days", displayCountDown)
                                            </script>
                                            <?php } else {
                                            if ($todays_date < $start_date) { ?>
                                                <br>
                                                <h2><span class="label label-primary">Pendaftaran Belum dibuka</span></h2>
                                            <?php } else { ?>
                                                <br>
                                                <h2><span class="badge badge-info">Pendaftaran Sudah Ditutup</span></h2>
                                        <?php }
                                        }
                                        ?>

                                        </div>
                                </div>
                        </div><br><br>
                        <div class="banner_bottom_in">
                            <?php
                            $sql1 = mysqli_query($connect, "SELECT *, count(pendaftar_santri.nik) as jml from pendaftar_santri WHERE arsip = 'Tidak' AND keterangan = 'Belum Terverifikasi' ");
                            $r = mysqli_fetch_array($sql1);
                            $jml = $r['jml'];

                            $sql1 = mysqli_query($connect, "SELECT *, count(pendaftar_santri.nik) as jml_cowo from pendaftar_santri WHERE jk = 'Laki - laki' AND arsip = 'Tidak' AND keterangan = 'Belum Terverifikasi'");
                            $r = mysqli_fetch_array($sql1);
                            $jmlcowo = $r['jml_cowo'];

                            $sql1 = mysqli_query($connect, "SELECT *, count(pendaftar_santri.nik) as jml_cewe from pendaftar_santri WHERE jk = 'Perempuan' AND arsip = 'Tidak' AND keterangan = 'Belum Terverifikasi'");
                            $r = mysqli_fetch_array($sql1);
                            $jmlcewe = $r['jml_cewe'];
                            ?>

                            <?php
                            $start_date = $s['tgl_mulai'];
                            $end_date = $s['tgl_selesai'];
                            $todays_date = date("Y-m-d");
                            if ($todays_date >= $start_date && $todays_date <= $end_date) { ?>
                                <h1>Jumlah Pendaftar saat ini : </h1>
                                <hr>
                                <div class="col-md-8">
                                    <h3>Jumlah Pendaftar hari ini : </h3>
                                    <h1 style="color: red"><?= $jml; ?></h1>
                                </div>
                                <div class="col-md-4" style="text-align: left;">
                                    <h2><?= $jmlcowo; ?> <small>Laki - laki</small></h2>
                                    <h2><?= $jmlcewe; ?> <small>Perempuan</small></h2>
                                </div><br><br>

                            <?php } ?>





                            </center>


                        </div>
                    </div>
                </div>
                <!---modal1-->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b>Login</b></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <center><img src="assets/img/logo_ds.png" style="max-height: 120px; width:120px;"></center>
                                <p>
                                <div class="card-body">
                                    <form action="log_validate.php">
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="text" name="nik" class="form-control" placeholder="Masukan nik">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            </div>
                                            <input type="password" name="pass" class="form-control" placeholder="Masukkan Password">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </div>
                </div>





                <!--modal2-->
                <div class="modal fade" id="myModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b>Daftar Akun</b></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <center><img src="assets/img/logo_ds.png" style="max-height: 120px; width:120px;"></center>
                                <p>
                                <div class="card-body">
                                    <form action="save_santri.php" method="POST">
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="number" name="nik" class="form-control" placeholder="Masukan nik">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="email" name="email" class="form-control" placeholder="Masukkan Email">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            </div>
                                            <input type="password" name="pass" class="form-control" placeholder="Masukkan Password">
                                        </div>
                                        <div class="modal-footer">

                                            <button type="submit" class="btn btn-primary">Daftar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- Modal 3-->
                <div class="modal fade" id="Modal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="logout.php" method="POST">
                                    Apakah anda ingin keluar?

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Logout</button>
                                    </div>
                                </form>
                            </div>


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


<!-- /.content-wrapper -->


<?php include "footer.php"; ?>