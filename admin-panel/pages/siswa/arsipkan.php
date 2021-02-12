
<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";

	/*--------------------------------------------------------------------------*/


		/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
		function antiinjection($data){
			$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter_sql;
		}

				$no = antiinjection($_GET['tid']);
				 /*--------------------------------------------------------------------------------------*/
				mysqli_query($connect, "UPDATE `pendaftar_siswa` SET `arsip` = 'Ya' WHERE `pendaftar_siswa`.`no_daftar` = '$no';");

							echo "<script>alert('Data Terarsipkan.');</script>";
							echo "<meta http-equiv='refresh' content='0;url=?page=siswa-diterima'>";
?>
