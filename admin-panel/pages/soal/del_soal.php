<?php include "../lib/inc.session.php"; ?>
<?php
include "../conf/koneksi.php";

mysqli_query($connect, "DELETE FROM soal WHERE id_soal = '$_GET[id]'");

echo "<script>alert('Data sudah terhapus.');</script>";
echo "<meta http-equiv='refresh' content='0;url=?page=soal'>";
?>
