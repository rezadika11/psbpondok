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
				$kec = antiinjection($_POST['kec']);

        $cek = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM sekolahan WHERE nama_sekolah='$nama'"));
        if ($cek > 0){
        echo "<script>window.alert('nama sekolah yang anda masukan sudah ada');</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=View-List-Daerah'>";
        }else {
        mysqli_query($connect,"INSERT INTO sekolahan (nama_sekolah,id_kec) VALUES ('$nama','$kec')");

        echo "<script>alert('Data sudah tersimpan.');</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=View-List-Daerah'>";
        }
?>
