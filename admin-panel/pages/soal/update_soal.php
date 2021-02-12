
<?php
include "../conf/koneksi.php";
include "../lib/inc.session.php";

/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
function antiinjection($data)
{
    $filter_sql = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
    return $filter_sql;
}

$id = antiinjection($_POST['id_soal']);
$soal = $_POST['soal'];
$a = antiinjection($_POST['a']);
$b = antiinjection($_POST['b']);
$c = antiinjection($_POST['c']);
$d = antiinjection($_POST['d']);
$kunci = antiinjection($_POST['kunci']);
$aktif = antiinjection($_POST['aktif']);
/*---------------------------------------------------------*/
$cek_update = mysqli_query($connect, "UPDATE soal SET soal='$soal', a = '$a', b = '$b', c = '$c', d = '$d', kunci = '$kunci', 
aktif = '$aktif' WHERE id_soal='$id'");

echo "<script>alert('Data sudah di update.');</script>";
echo "<meta http-equiv='refresh' content='0;url=?page=soal'>";
?>
