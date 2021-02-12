<?php
include "../conf/koneksi.php";
include "../lib/inc.session.php";
$ed = mysqli_query($connect, "SELECT * FROM soal WHERE id_soal = '$_GET[id]'");
$r = mysqli_fetch_array($ed);


?>

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Soal <small>Edit</small></h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit<small>Soal</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="container">
                        <form action="?page=update-soal" method="post">
                            <div class="row">


                                <input type='hidden' name="id_soal" value="<?php echo $r['id_soal']; ?>" placeholder="Masukan Jawaban A" class="form-control">
                                <div class="col-md-7">
                                    <label for="Soal">Soal</label>
                                    <textarea name="soal" class="form-control ckeditor"><?= htmlentities($r['soal']); ?> </textarea>
                                </div>
                                <div class="col-md-5">
                                    <label for="Soal">Jawaban A</label>
                                    <div class="form-group">
                                        <input type='text' name="a" value="<?php echo $r['a']; ?>" placeholder="Masukan Jawaban A" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label for="Soal">Jawaban B</label>
                                    <div class="form-group">
                                        <input type='text' name="b" value="<?php echo $r['b']; ?>" placeholder="Masukan Jawaban B" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label for="Soal">Jawaban C</label>
                                    <div class="form-group">
                                        <input type='text' name="c" value="<?php echo $r['c']; ?>" placeholder="Masukan Jawaban C" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label for="Soal">Jawaban D</label>
                                    <div class="form-group">
                                        <input type='text' name="d" value="<?php echo $r['d']; ?>" placeholder="Masukan Jawaban D" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="Soal">Kunci Jawaban</label>
                                    <div class="form-group">

                                        <select id="heard" class="form-control" name="kunci" required>
                                            <option value="<?php echo $r['kunci']; ?>"><?php echo $r['kunci']; ?></option>
                                            <option value="a">A</option>
                                            <option value="b">B</option>
                                            <option value="c">C</option>
                                            <option value="d">D</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="Soal">Aktifkan soal y:yes/n:no</label>
                                    <div class="form-group">

                                        <select id="heard" class="form-control" name="aktif" required>
                                            <option value="<?php echo $r['aktif']; ?>"><?php echo $r['aktif']; ?></option>
                                            <option value="Y">Y</option>
                                            <option value="N">N</option>

                                        </select>
                                    </div>
                                </div>





                            </div>
                            <div class="col md-12">
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>