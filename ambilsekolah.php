<?php
include "conf/koneksi.php";

$kec = $_GET['kec'];
$sek = mysqli_query($connect, "SELECT * FROM sekolahan WHERE id_kec='$kec' order by nama_sekolah");
echo "<option>-- Pilih sekolahan --</option>";
while($k = mysqli_fetch_array($sek)){
    echo "<option value=\"".$k['nama_sekolah']."\">".$k['nama_sekolah']."</option>\n";
}
?>
