
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

$no = antiinjection($_POST['no_induk']);
$nama = antiinjection($_POST['nama']);
$pass = antiinjection($_POST['pass']);
$hak = antiinjection($_POST['hak_akses']);
$tgl = date('Y-m-d');


$salt = 'vieyama';
$hash = md5($salt . $pass);

$cek_user = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM admin WHERE no_induk='$no'"));
if ($cek_user > 0) {
	echo "<script>alert('Id admin sudah ada!');</script>";
	echo "<meta http-equiv='refresh' content='0;url=?page=new-admin'>";
} else {
	/*--------------------------------------------------------------------------------------*/
	mysqli_query($connect, "INSERT INTO pengguna(nik,nama_pengguna,password,pass_asli,hak_akses,tgl_daftar) VALUES ('$no','$nama','$hash','$pass','$hak','$tgl')");
	mysqli_query($connect, "INSERT INTO admin(no_induk,nama_admin,idu) VALUES ('$no','$nama','$no')");

	echo "<script>alert('Data sudah tersimpan.');</script>";
	echo "<meta http-equiv='refresh' content='0;url=?page=view-admin'>";
}
?>
