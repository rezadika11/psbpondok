<?php
session_start();
include "../conf/koneksi.php";
include "../lib/inc.session.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>PSB Online - Pondok Pesantren Darussalam Purwokerto</title>


  <!---icon--->
  <link rel="icon" href="../assets/img/logo_ds.png">

  <!-- Bootstrap -->
  <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->
  <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- bootstrap-datetimepicker -->
  <link href="vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="build/css/custom.min.css" rel="stylesheet">

  <!--ckEditor-->
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>

</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="media.php?page=dashboard" class="site_title"><i class="fa fa-users"></i> <span>PSB Online</span></a>
          </div>

          <div class="clearfix"></div>
          <?php
          $query = mysqli_query($connect, "SELECT * FROM admin, pengguna WHERE admin.idu = pengguna.nik AND pengguna.nik = '$_SESSION[nik]' AND pengguna.hak_akses != 'Santri'");
          $a = mysqli_fetch_array($query);
          ?>
          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <?php if ($a['foto'] == "") { ?>
                <img src="images/default.png" alt="..." class="img-circle profile_img">
              <?php } else { ?>
                <img src="uploads/admin-foto/<?= $a['foto']; ?>" alt="..." class="img-circle profile_img">
              <?php } ?>
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?= $a['nama_admin']; ?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a href="media.php?page=dashboard"><i class="fa fa-home"></i> Beranda </a></li>
                <?php if ($a['hak_akses'] == "Superadmin") { ?>
                  <li><a href="media.php?page=view-pendaftaran"><i class="fa fa-edit"></i> Pendaftaran </a></li>
                <?php } ?>
                <li><a><i class="fa fa-users"></i> Pendaftar Siswa <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="?page=total-siswa">Total Siswa</a></li>
                    <li><a href="?page=siswa-diterima">Siswa diterima</a></li>
                    <li><a href="?page=siswa-ditolak">Siswa tidak diterima</a></li>
                    <li><a href="?page=arsip-siswa">Arsip Siswa</a></li>
                  </ul>
                </li>
                <li><a href="?page=view-laporan"><i class="fa fa-print"></i> Laporan </a></li>
                <?php if ($a['hak_akses'] == "Superadmin") { ?>
                  <li><a href="?page=jurusan"><i class="fa fa-mortar-board"></i> Jurusan </a></li>
                  <li><a href="?page=soal"><i class="fa fa-edit"></i> Soal </a></li>
                  <li><a href="?page=view-kelas"><i class="fa fa-edit"></i> Kelas </a></li>


                  <!-- <li><a href="?page=View-List-Daerah"><i class="fa fa-institution"></i> Sekolah </a></li> -->
                  <li><a><i class="fa fa-users"></i> User <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="media.php?page=view-admin">Admin (Petugas)</a></li>
                      <li><a href="media.php?page=view-pendaftar">Pendaftar</a></li>
                    </ul>
                  </li>
                <?php } ?>
                <!-- <li><a href="javascript:void(0)"><i class="fa fa-edit"></i> Jalur Pendaftaran </a></li> -->

              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <?php if ($a['foto'] == "") { ?>
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/default.png" alt=""><?= $a['nama_admin']; ?>&nbsp;&nbsp;
                    <span class=" fa fa-angle-down"></span>
                  </a>
                <?php } else { ?>
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="uploads/admin-foto/<?= $a['foto']; ?>" alt=""><?= $a['nama_admin']; ?>&nbsp;&nbsp;
                    <span class=" fa fa-angle-down"></span>
                  </a>
                <?php } ?>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="?page=profile-admin"> Profile</a></li>
                  <li><a href="?page=ubah-password"> Ubah Password</a></li>
                  <li><a href="?page=sign-out"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <?php include "akses_file.php"; ?>
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          &copy;2021 Pon.Pes Darussalam Dukuhwaluh Purwokerto
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>
  <!-- Switchery -->
  <script src="vendors/switchery/dist/switchery.min.js"></script>
  <!-- Select2 -->
  <script src="vendors/select2/dist/js/select2.full.min.js"></script>
  <!-- Select2 -->
  <link href="vendors/select2/dist/css/select2.min.css" rel="stylesheet">
  <!-- Switchery -->
  <link href="vendors/switchery/dist/switchery.min.css" rel="stylesheet">
  <!-- starrr -->
  <link href="vendors/starrr/dist/starrr.css" rel="stylesheet">
  <!-- jQuery -->
  <script src="vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="vendors/nprogress/nprogress.js"></script>
  <!-- Chart.js -->
  <script src="vendors/Chart.js/dist/Chart.min.js"></script>
  <!-- gauge.js -->
  <script src="vendors/gauge.js/dist/gauge.min.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="vendors/iCheck/icheck.min.js"></script>
  <!-- Skycons -->
  <script src="vendors/skycons/skycons.js"></script>
  <!-- Flot -->
  <script src="vendors/Flot/jquery.flot.js"></script>
  <script src="vendors/Flot/jquery.flot.pie.js"></script>
  <script src="vendors/Flot/jquery.flot.time.js"></script>
  <script src="vendors/Flot/jquery.flot.stack.js"></script>
  <script src="vendors/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="vendors/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="vendors/DateJS/build/date.js"></script>
  <!-- JQVMap -->
  <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
  <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="vendors/moment/min/moment.min.js"></script>
  <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap-datetimepicker -->
  <script src="vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
  <!-- Datatables -->
  <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="vendors/jszip/dist/jszip.min.js"></script>
  <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
  <!-- validator -->
  <script src="vendors/validator/validator.js"></script>

  <script type="text/javascript">
    $('#toggle2').click(function() {
      //check if checkbox is checked
      if ($(this).is(':checked')) {

        $('#ijasah').removeAttr('disabled'); //enable input

      } else {
        $('#ijasah').attr('disabled', true); //disable input
      }
    });
  </script>

  <!-- Custom Theme Scripts -->
  <script src="build/js/custom.min.js"></script>
  <script>
    $('#myDatepicker0').datetimepicker({
      format: 'YYYY-MM-DD'
    });
    $('#myDatepicker1').datetimepicker({
      format: 'YYYY-MM-DD'
    });

    $('#myDatepicker2').datetimepicker({
      format: 'DD.MM.YYYY'
    });
    $('#myDatepicker3').datetimepicker({
      format: 'DD.MM.YYYY'
    });

    $('#myDatepicker3').datetimepicker({
      format: 'hh:mm A'
    });

    $('#myDatepicker4').datetimepicker({
      ignoreReadonly: true,
      allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();

    $('#datetimepicker7').datetimepicker({
      useCurrent: false
    });

    $("#datetimepicker6").on("dp.change", function(e) {
      $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });

    $("#datetimepicker7").on("dp.change", function(e) {
      $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
  </script>
  <script>
    $(function() {
      $("#example1").DataTable();
    });
  </script>
  <script>
    $(function() {
      $("#example2").DataTable();
    });
  </script>
  <script>
    $(function() {
      $("#example3").DataTable();
    });
  </script>
  <script type="text/javascript">
    var htmlobjek;
    $(document).ready(function() {
      $("#propinsi").change(function() {
        var propinsi = $("#propinsi").val();

        $.ajax({
          url: "../ambilkota.php",
          data: "propinsi=" + propinsi,
          cache: false,
          success: function(msg) {
            $("#kota").html(msg);

          }
        });
      });
      $("#kota").change(function() {
        var kota = $("#kota").val();
        $.ajax({
          url: "../ambilkecamatan.php",
          data: "kota=" + kota,
          cache: false,
          success: function(msg) {
            $("#kec").html(msg);
          }
        });
      });
    });
  </script>
  <!-- Add mousewheel plugin (this is optional) -->
  <script type="text/javascript" src="vendors/fancyapps-fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

  <!-- Add fancyBox main JS and CSS files -->
  <script type="text/javascript" src="vendors/fancyapps-fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
  <link rel="stylesheet" type="text/css" href="vendors/fancyapps-fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />

  <!-- Add Button helper (this is optional) -->
  <link rel="stylesheet" type="text/css" href="vendors/fancyapps-fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
  <script type="text/javascript" src="vendors/fancyapps-fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

  <!-- Add Thumbnail helper (this is optional) -->
  <link rel="stylesheet" type="text/css" href="vendors/fancyapps-fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
  <script type="text/javascript" src="vendors/fancyapps-fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

  <!-- Add Media helper (this is optional) -->
  <script type="text/javascript" src="vendors/fancyapps-fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      /*
       *  Simple image gallery. Uses default settings
       */

      $('.fancybox').fancybox();

      /*
       *  Different effects
       */

      // Remove padding, set opening and closing animations, close if clicked and disable overlay
      $(".fancybox-effects-d").fancybox({
        padding: 0,

        openEffect: 'elastic',
        openSpeed: 150,

        closeEffect: 'elastic',
        closeSpeed: 150,

        closeClick: true,

        helpers: {
          overlay: null
        }
      });
    });
  </script>
</body>

</html>