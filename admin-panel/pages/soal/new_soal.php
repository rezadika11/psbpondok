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
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tambah<small>Soal</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="container">
                        <div class="row">

                            <form action="?page=save-soal" method="post">
                                <div class="col-md-7">
                                    <label for="Soal">Soal</label>
                                    <textarea class="ckeditor" id="ckedtor" name="soal"></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label for="Soal">Jawaban A</label>
                                    <div class="form-group">
                                        <input type='text' name="a" placeholder="Masukan Jawaban A" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label for="Soal">Jawaban B</label>
                                    <div class="form-group">
                                        <input type='text' name="b" placeholder="Masukan Jawaban B" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label for="Soal">Jawaban C</label>
                                    <div class="form-group">
                                        <input type='text' name="c" placeholder="Masukan Jawaban C" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label for="Soal">Jawaban D</label>
                                    <div class="form-group">
                                        <input type='text' name="d" placeholder="Masukan Jawaban D" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label for="Soal">Kunci Jawaban</label>
                                    <div class="form-group">

                                        <select id="heard" class="form-control" name="kunci" required>
                                            <option value="">Pilih Kunci Jawaban</option>
                                            <option value="a">A</option>
                                            <option value="b">B</option>
                                            <option value="c">C</option>
                                            <option value="d">D</option>

                                        </select>
                                    </div>
                                </div>
                        </div>

                        <div class="col md-5">
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
</div>