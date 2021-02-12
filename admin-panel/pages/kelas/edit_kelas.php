<?php include "../lib/inc.session.php";
$ed = mysqli_query($connect, "SELECT * FROM kelas WHERE id_kelas = '$_GET[id]'");
$r = mysqli_fetch_array($ed);
?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Kelas <small>Tambah Kelas</small></h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-xs-3">
            </div>
            <div class="x_panel">
                <div class="x_content">
                    <form id="demo-form2" method="post" action="?page=update-kelas" data-parsley-validate class="form-horizontal form-label-left">
                        <input type='hidden' name="id_kelas" value="<?php echo $r['id_kelas']; ?>" placeholder="Masukan Jawaban A" class="form-control">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kelas <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="kelas" value="<?php echo $r['kelas']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> Nilai Awal <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="last-name" name="nilai_awal" value="<?php echo $r['nilai_awal']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nilai Akhir</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="last-name" name="nilai_akhir" value="<?php echo $r['nilai_akhir']; ?>" required="required" class="form-control col-md-7 col-xs-12">
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