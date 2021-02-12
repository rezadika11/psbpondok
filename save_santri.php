<?php
include "conf/koneksi.php";

/*---------------------------- ANTI XSS & SQL INJECTION ----------------------*/
function antiinjection($data)
{
	$filter_sql = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
	return $filter_sql;
}
/*-------------------------------------------------------------------*/
// baca current date

$nik = antiinjection($_POST['nik']);
$nama = antiinjection($_POST['nama']);
$email = antiinjection($_POST['email']);
$pass = antiinjection($_POST['pass']);
$hak = "Santri";
$tgl = date('Y-m-d');

$salt = 'vieyama';
$hash = md5($salt . $pass);

$cek_user = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM pengguna WHERE nik='$nik'"));
if ($cek_user > 0) {
	echo "<script>alert('NIK Sudah Terdaftar!');</script>";
	echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
} else {

	mysqli_query($connect, "INSERT INTO pengguna
									(nik,nama_pengguna,email, password, pass_asli, hak_akses, tgl_daftar) VALUES ('$nik','$nama','$email','$hash','$pass','$hak','$tgl')");
	echo "<script> alert('Anda berhasil mendaftar'); window.location.href='dashboard.php';
			</script>";
}
