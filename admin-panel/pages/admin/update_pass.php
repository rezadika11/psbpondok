
<?php
include "../conf/koneksi.php";
include "../lib/inc.session.php";

/*--------------------------------------------------------------------------*/


/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
function antiinjection($data)
{
	$filter_sql = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
	return $filter_sql;
}

$no = antiinjection($_POST['idu']);
$password_lama			= antiinjection($_POST['password_lama']);
$password_baru			= antiinjection($_POST['password_baru']);
$konfirmasi_password	= antiinjection($_POST['konfirmasi_password']);


$salt = 'vieyama';
$hash = md5($salt . $password_lama);
$hash_baru = md5($salt . $password_baru);

$cek_user = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM pengguna WHERE password = '$hash'"));
if ($cek_user > 0) {
	if ($password_baru == $konfirmasi_password) {
		mysqli_query($connect, "UPDATE `pengguna` SET
                     `password`='$hash_baru'
                   WHERE `nik` = '$no'");

		echo "<script>alert('Password berhasil dirubah.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=dashboard'>";
	} else {

		echo "<script>alert('Password Baru Tidak Cocok!');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=ubah-password'>";
	}
} else {

	echo "<script>alert('Password ditemukan!');</script>";
	echo "<meta http-equiv='refresh' content='0;url=?page=ubah-password'>";
}
?>
