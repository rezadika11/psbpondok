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

        $cek = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM provinsi WHERE nama_prov='$nama'"));
        if ($cek > 0){
        echo "<script>window.alert('nama provinsi yang anda masukan sudah ada');</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=View-List-Daerah'>";
        }else {
        mysqli_query($connect,"INSERT INTO provinsi (nama_prov) VALUES ('$nama')");

        echo "<script>alert('Data sudah tersimpan.');</script>";
        echo "<meta http-equiv='refresh' content='0;url=?page=View-List-Daerah'>";
        }
?>
