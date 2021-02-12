<?php
	include "../conf/koneksi.php";
  include "../lib/inc.session.php";

	/*--------------------------------------------------------------------------*/


		/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
		function antiinjection($data){
			$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter_sql;
		}

				$nama = antiinjection($_POST['nama']);
				$prov = antiinjection($_POST['prov']);
				$kab = antiinjection($_POST['kab']);

        $cek = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM kecamatan WHERE nama_kec='$nama'"));
        if ($cek > 0){
        echo "<script>window.alert('nama kecamatan yang anda masukan sudah ada');</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=View-List-Daerah'>";
        }else {
        mysqli_query($connect,"INSERT INTO kecamatan (nama_kec,id_kab,id_prov) VALUES ('$nama','$kab','$prov')");

        echo "<script>alert('Data sudah tersimpan.');</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=View-List-Daerah'>";
        }
?>
