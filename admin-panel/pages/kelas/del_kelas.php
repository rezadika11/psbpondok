<?php include "../lib/inc.session.php"; ?>
<?php
include "../conf/koneksi.php";

mysqli_query($connect, "DELETE FROM kelas WHERE id_kelas = '$_GET[id]'");

echo "<script>alert('Data sudah terhapus.');</script>";
echo "<meta http-equiv='refresh' content='0;url=?page=view-kelas'>";
?>
