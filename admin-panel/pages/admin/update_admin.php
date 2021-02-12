
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
$no = antiinjection($_POST['no_induk']);
$nama = antiinjection($_POST['nama']);
$pass = antiinjection($_POST['pass']);
$hak = antiinjection($_POST['hak_akses']);

$salt = 'vieyama';
$hash = md5($salt . $pass);

/*--------------------------------------------------------------------------------------*/
mysqli_query($connect, "UPDATE `pengguna` SET
			`nik`='$no',
			`nama_pengguna`='$nama',
      `password`='$hash',
      `pass_asli`='$pass',
			`hak_akses`='$hak'
		WHERE `nik` = '$id'");
echo "<script>alert('Data sudah di update.');</script>";
echo "<meta http-equiv='refresh' content='0;url=?page=view-admin'>";
?>
