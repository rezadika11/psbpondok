
<?php
include "../conf/koneksi.php";
include "../lib/inc.session.php";

/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
function antiinjection($data)
{
	$filter_sql = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
	return $filter_sql;
}

$id = antiinjection($_POST['tid']);
$nama = antiinjection($_POST['nama']);
/*--------------------------------------------------------------------------------------*/
mysqli_query($connect, "UPDATE `program` SET
			`nama_program`='$nama',
		WHERE `id_program` = '$id'");
echo "<script>alert('Data sudah di update.');</script>";
echo "<meta http-equiv='refresh' content='0;url=?page=jurusan'>";
?>
