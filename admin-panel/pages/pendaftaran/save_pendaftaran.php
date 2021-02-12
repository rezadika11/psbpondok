<?php include "../lib/inc.session.php"; ?>

<?php
	include "../conf/koneksi.php";

	/*--------------------------------------------------------------------------*/


		/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
		function antiinjection($data){
			$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter_sql;
		}

				$periode = antiinjection($_POST['periode']);
				$awal = antiinjection($_POST['awal']);
				$akhir = antiinjection($_POST['akhir']);
				$kuota = antiinjection($_POST['kuota']);
				$aktif = 'Ya';

				/*--------------------------------------------------------------------------------------*/
				mysqli_query($connect, "INSERT INTO pendaftaran(periode, tgl_mulai, tgl_selesai, kuota, aktif) VALUES ('$periode','$awal','$akhir','$kuota','$aktif')");

							echo "<script>alert('Data Pendaftaran sudah ditambahkan.');</script>";
							echo "<meta http-equiv='refresh' content='0;url=?page=view-pendaftaran'>";
?>
