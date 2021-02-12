<?php include "../lib/inc.session.php"; ?>

<?php
include "../conf/koneksi.php";

/*--------------------------------------------------------------------------*/


/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
function antiinjection($data)
{
	$filter_sql = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
	return $filter_sql;
}

$nama = antiinjection($_POST['nama']);

/*--------------------------------------------------------------------------------------*/
mysqli_query($connect, "INSERT INTO program(nama_program) VALUES ('$nama')");

echo "<script>alert('Data program sudah tersimpan.');</script>";
echo "<meta http-equiv='refresh' content='0;url=?page=jurusan'>";
?>
