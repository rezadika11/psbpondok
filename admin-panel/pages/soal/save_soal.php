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

$soal = $_POST['soal'];
$a = antiinjection($_POST['a']);
$b = antiinjection($_POST['b']);
$c = antiinjection($_POST['c']);
$d = antiinjection($_POST['d']);
$kunci = antiinjection($_POST['kunci']);


/*--------------------------------------------------------------------------------------*/
mysqli_query($connect, "INSERT INTO soal (soal,a,b,c,d,kunci) values
                ('$soal','$a','$b','$c','$d','$kunci')");

echo "<script>alert('Data soal sudah tersimpan.');</script>";
echo "<meta http-equiv='refresh' content='0;url=?page=soal'>";
?>
