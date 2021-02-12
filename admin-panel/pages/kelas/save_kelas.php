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

$kelas = antiinjection($_POST['kelas']);
$nilai_awal = antiinjection($_POST['nilai_awal']);
$nilai_akhir = antiinjection($_POST['nilai_akhir']);



/*--------------------------------------------------------------------------------------*/
mysqli_query($connect, "INSERT INTO kelas (kelas,nilai_awal,nilai_akhir) values
                ('$kelas','$nilai_awal','$nilai_akhir')");

echo "<script>alert('Data soal sudah tersimpan.');</script>";
echo "<meta http-equiv='refresh' content='0;url=?page=view-kelas'>";
?>
