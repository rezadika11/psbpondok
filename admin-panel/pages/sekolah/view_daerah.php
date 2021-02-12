         <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Daftar Daerah</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="">
              <div class="clearfix"></div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-building"></i> Tambah Provinsi, Kabupaten dan Kecamatan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start accordion -->
                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                      <!-- Tambah Provinsi -->
                      <div class="panel">
                        <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <h4 class="panel-title">Tambah Provinsi</h4>
                        </a>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
                            <table class="table table-bordered">
                              <tbody>
                                <form action="?page=tambah-provinsi" method="post">
                                <tr>
                                  <td>Nama Provinsi</td>
                                  <td> <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Provinsi"> </td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td> <button type="submit" class="btn btn-success">Tambahkan</button> </td>
                                </tr>
                                </form>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!-- Tambah Kabupaten -->
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          <h4 class="panel-title">Tambah Kabupaten</h4>
                        </a>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">
                            <table class="table table-bordered">
                              <tbody>
                                <form action="?page=tambah-kabupaten" method="post">
                                <tr>
                                  <td>Provinsi</td>
                                  <td>
                                    <select class="form-control" name="prov">
                                      <option value="">Pilih Provinsi</option>
                                      <?php
                                      $cek = mysqli_query($connect,"SELECT * FROM provinsi");
                                      while ($prov = mysqli_fetch_array($cek)) {
                                      ?>
                                      <option value="<?= $prov['id_prov']; ?>"><?= $prov['nama_prov']; ?></option>
                                    <?php } ?>
                                    </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Nama Kabupaten</td>
                                  <td> <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Kabupaten"> </td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td> <button type="submit" class="btn btn-success">Tambahkan</button> </td>
                                </tr>
                                </form>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!-- Tambah Kecamatan -->
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          <h4 class="panel-title">Tambah Kecamatan</h4>
                        </a>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                          <div class="panel-body">
                            <table class="table table-bordered">
                              <tbody>
                                <form action="?page=tambah-kecamatan" method="post">
                                  <tr>
                                  <td>Provinsi</td>
                                  <td>
                                    <select class="form-control" name="prov">
                                      <option value="">Pilih Provinsi</option>
                                      <?php
                                      $cek = mysqli_query($connect,"SELECT * FROM provinsi");
                                      while ($prov = mysqli_fetch_array($cek)) {
                                      ?>
                                      <option value="<?= $prov['id_prov']; ?>"><?= $prov['nama_prov']; ?></option>
                                    <?php } ?>
                                    </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Kabupaten</td>
                                  <td>
                                    <select class="form-control" name="kab">
                                      <option value="">Pilih Kabupaten</option>
                                      <?php
                                      $cek1 = mysqli_query($connect,"SELECT * FROM kabupaten");
                                      while ($kab = mysqli_fetch_array($cek1)) {
                                      ?>
                                      <option value="<?= $kab['id_kab']; ?>"><?= $kab['nama_kab']; ?></option>
                                    <?php } ?>
                                    </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Nama Kecamatan</td>
                                  <td> <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Kecamatan"> </td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td> <button type="submit" class="btn btn-success">Tambahkan</button> </td>
                                </tr>
                                </form>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!-- Tambah Sekolah -->
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingFour" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          <h4 class="panel-title">Tambah Sekolah</h4>
                        </a>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                          <div class="panel-body">
                            <table class="table table-bordered">
                              <tbody>
                                <form action="?page=tambah-sekolah" method="post">
                                  <tr>
                                  <td>Provinsi</td>
                                  <td>
                                    <select class="form-control" name="propinsi" id="propinsi">
                                    <option value="">Pilih Provinsi</option>
                                    <?php
                                    //mengambil nama-nama propinsi yang ada di database
                                    $propinsi = mysqli_query($connect, "SELECT * FROM provinsi ORDER BY nama_prov");
                                    while($p=mysqli_fetch_array($propinsi)){
                                    echo "<option value=\"$p[id_prov]\">$p[nama_prov]</option>\n";
                                    }
                                    ?>
                                    </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Kabupaten</td>
                                  <td>
                                    <select class="form-control" name="kota" id="kota">
                                    <option value="">Pilih Kabupaten</option>
                                    <?php
                                    //mengambil nama-nama propinsi yang ada di database
                                    $kota = mysqli_query($connect, "SELECT * FROM kabupaten ORDER BY nama_kab");
                                    while($p=mysqli_fetch_array($propinsi)){
                                    echo "<option value=\"$p[id_kab]\">$p[nama_kab]</option>\n";
                                    }
                                    ?>
                                    </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Kecamatan</td>
                                  <td>
                                    <select class="form-control"  name="kec" id="kec">
                                    <option value="">Pilih Kecamatan</option>
                                    <?php
                                    //mengambil nama-nama propinsi yang ada di database
                                    $kec = mysqli_query($connect, "SELECT * FROM kecamatan ORDER BY nama_kec");
                                    while($p=mysqli_fetch_array($kota)){
                                    echo "<option value=\"$p[id_kec]\">$p[nama_kec]</option>\n";
                                    }
                                    ?>
                                    </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Nama Sekolah</td>
                                  <td> <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Sekolah"> </td>
                                </tr>
                                <tr>
                                  <td></td>
                                  <td> <button type="submit" class="btn btn-success">Tambahkan</button> </td>
                                </tr>
                                </form>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end of accordion -->


                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-building"></i> Daftar Daerah</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start accordion -->
                    <div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">
                      <!-- daftar provinsi -->
                      <div class="panel">
                        <a class="panel-heading" role="tab" id="headingOne1" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne">
                          <h4 class="panel-title">Daftar Provinsi</h4>
                        </a>
                        <div id="collapseOne1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
                            <table class="table table-striped" id="datatable-responsive">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nama Provinsi</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                $no = 1;
                                $query = mysqli_query($connect, "SELECT * FROM provinsi ORDER BY id_prov ASC");
                                while ($prov = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                  <th scope="row"><?= $no ;?></th>
                                  <td><?= $prov['nama_prov'] ;?></td>
                                </tr>
                                <?php $no++ ; } ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!-- daftar kabupaten -->
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingTwo1" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo">
                          <h4 class="panel-title">Daftar Kabupaten</h4>
                        </a>
                        <div id="collapseTwo1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">
                            <table class="table table-striped" id="example1">
                              <!-- script datatables -->
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nama Kabupaten</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                $no = 1;
                                $query1 = mysqli_query($connect, "SELECT * FROM kabupaten ORDER BY id_kab ASC");
                                while ($kab = mysqli_fetch_array($query1)) {
                                ?>
                                <tr>
                                  <th scope="row"><?= $no ;?></th>
                                  <td><?= $kab['nama_kab'] ;?></td>
                                </tr>
                                <?php $no++ ; } ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!-- daftar kecamatan -->
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree1" aria-expanded="false" aria-controls="collapseThree">
                          <h4 class="panel-title">Daftar Kecamatan</h4>
                        </a>
                        <div id="collapseThree1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                          <div class="panel-body">
                            <table class="table table-striped" id="example2">
                              <!-- script datatables -->
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nama Kecamatan</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                $no = 1;
                                $query2 = mysqli_query($connect, "SELECT * FROM kecamatan ORDER BY id_kec ASC");
                                while ($kec = mysqli_fetch_array($query2)) {
                                ?>
                                <tr>
                                  <th scope="row"><?= $no ;?></th>
                                  <td><?= $kec['nama_kec'] ;?></td>
                                </tr>
                                <?php $no++ ; } ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!-- daftar sekolah -->
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingFour1" data-toggle="collapse" data-parent="#accordion1" href="#collapseFour1" aria-expanded="false" aria-controls="collapseFour">
                          <h4 class="panel-title">Daftar Sekolah</h4>
                        </a>
                        <div id="collapseFour1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                          <div class="panel-body">
                            <table class="table table-striped" id="example3">
                              <!-- script datatables -->
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nama Sekolah</th>
                                  <th>Asal Kecamatan</th>
                                  <th>Asal Kabupaten</th>
                                  <th>Asal Provinsi</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                $no = 1;
                                $query3 = mysqli_query($connect, "SELECT * FROM sekolahan, kecamatan, kabupaten, provinsi WHERE sekolahan.id_kec = kecamatan.id_kec AND kecamatan.id_kab = kabupaten.id_kab AND kabupaten.id_prov = provinsi.id_prov ORDER BY sekolahan.id_sekolah ASC");
                                while ($sek = mysqli_fetch_array($query3)) {
                                ?>
                                <tr>
                                  <th scope="row"><?= $no ;?></th>
                                  <td><?= $sek['nama_sekolah'] ;?></td>
                                  <td><?= $sek['nama_kec'] ;?></td>
                                  <td><?= $sek['nama_kab'] ;?></td>
                                  <td><?= $sek['nama_prov'] ;?></td>
                                </tr>
                                <?php $no++ ; } ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end of accordion -->


                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
