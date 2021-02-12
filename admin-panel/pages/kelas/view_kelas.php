<?php include "../lib/inc.session.php"; ?>

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Soal <small>Pon.Pes Darussalam Dukuhwaluh Purwokerto</small></h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-xs-3">
                <input type="button" class="btn btn-default" name="addBtnUser" value="Tambah Kelas" onclick="window.location='?page=new-kelas'">
            </div>
            <div class="x_panel">
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Kelas</th>
                                <th>Nilai Awal</th>
                                <th>Nilai Akhir</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            include "../conf/koneksi.php";
                            include "../format_tanggal.php";

                            $query = mysqli_query($connect, "SELECT * FROM `kelas`");
                            $no = 1;
                            while ($a = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $a['kelas'] ?></td>

                                    <td><?php echo $a['nilai_awal'] ?></td>
                                    <td><?php echo $a['nilai_akhir'] ?></td>
                                    <td>
                                        <input type="button" class="btn btn-primary" name="reset" value="Edit" onclick="window.location='?page=edit-kelas&id=<?php echo $a['id_kelas']; ?>' ">
                                        <input type="button" class="btn btn-warning" name="reset" value="Hapus" onclick="window.location='?page=del-kelas&id=<?php echo $a['id_kelas']; ?>' ">
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