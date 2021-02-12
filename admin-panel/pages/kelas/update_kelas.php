
<?php
include "../conf/koneksi.php";
include "../lib/inc.session.php";

/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
function antiinjection($data)
{
    $filter_sql = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
    return $filter_sql;
}

$id = antiinjection($_POST['id_kelas']);
$kelas = $_POST['kelas'];
$nilai_awal = antiinjection($_POST['nilai_awal']);
$nilai_akhir = antiinjection($_POST['nilai_akhir']);

/*---------------------------------------------------------*/
$cek_update = mysqli_query($connect, "UPDATE kelas SET kelas='$kelas', nilai_awal = '$nilai_awal', nilai_akhir = '$nilai_akhir'
 WHERE id_kelas='$id'");

echo "<script>alert('Data sudah di update.');</script>";
echo "<meta http-equiv='refresh' content='0;url=?page=view-kelas'>";
?>
