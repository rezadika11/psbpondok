
<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";

		/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
		function antiinjection($data){
			$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter_sql;
		}

     $id = antiinjection($_POST['tid']);
     $aktif = antiinjection($_POST['aktif']);
	/*--------------------------------------------------------------------------------------*/
		mysqli_query($connect, "UPDATE `pendaftaran` SET
			`aktif`='$aktif'
		WHERE `id_pendaftaran` = '$id'");
    echo "<script>alert('Data berubah.');</script>";
    echo "<meta http-equiv='refresh' content='0;url=?page=view-pendaftaran'>";
?>
