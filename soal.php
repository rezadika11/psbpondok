<?php
include("header.php");

include "conf/koneksi.php";
include "lib/inc.session.php";
include "format_tanggal.php";

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ul class="nav nav-pills text-bold">
                        <!-- <ul class="top_nav">
                            
                            <li><a href="persyaratan.html">Persyaratan</a></li>
                            <li><a href="terdaftar.html">Terdaftar</a></li>
                            <li><a href="pengumuman.html">Pengumuman</a></li>
                        </ul> -->

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="Dashboard" href="dashboard_santri.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="Ubah_password.php">Ubah Password</a>
                        </li>
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
            <div class="col-md-12">

                <div class="card ">
                    <div class="card-body ">
                        <!-- Nested Row within Card Body -->



                        <div class="card-body">
                            <div class="col-md-12 col-md-offset-12">
                                <h3>KERJAKAN SOAL PILIHAN GANDA DI BAWAH INI!</h3>
                                <table border="0">
                                    <tbody>
                                        <?php
                                        include "conf/koneksi.php";
                                        $query    = mysqli_query($connect, "SELECT * FROM soal WHERE aktif='Y' ORDER BY id_soal DESC");
                                        $jumlah = mysqli_num_rows($query);
                                        $no = 0;
                                        while ($data = mysqli_fetch_array($query)) {
                                            $no++
                                        ?>
                                            <form action="jawab.php" method="POST">
                                                <input type="hidden" name="id[]" value="<?php echo $data['id_soal']; ?>">
                                                <input type="hidden" name="jumlah" value="<?php echo $jumlah; ?>">
                                                <tr>
                                                    <td><?php echo $no ?>:</td>
                                                    <td><?php echo $data['soal']; ?></td>
                                                </tr>

                                                <tr>
                                                    <td></td>
                                                    <td>A. <input name="pilihan[<?php echo $data['id_soal'] ?>]" type="radio" value="A" required><?php echo $data['a']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>B. <input name="pilihan[<?php echo $data['id_soal'] ?>]" type="radio" value="B" required><?php echo $data['b']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>C. <input name="pilihan[<?php echo $data['id_soal'] ?>]" type="radio" value="C" required><?php echo $data['c']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>D. <input name="pilihan[<?php echo $data['id_soal'] ?>]" type="radio" value="D" required><?php echo $data['d']; ?></td>
                                                </tr>
                                            <?php
                                        }
                                            ?>
                                            <tr>
                                                <td height="40"></td>
                                                <td>
                                                    <input type="submit" name="submit" value="Jawab" onclick="return confirm('Perhatian! Apakah Anda sudah yakin dengan semua jawaban Anda?')">
                                                    <input type="reset" value="Reset">
                                                </td>
                                            </tr>
                                            </form>
                                    </tbody>
                                </table>


                            </div>




                            <!-- /.col-md-6 -->
                        </div>
                        <!-- /.row -->


                    </div>






                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>



    <!--footer-->
    <div class="contact-footer-w3layouts-agile">
        <?php include "footer.php" ?>