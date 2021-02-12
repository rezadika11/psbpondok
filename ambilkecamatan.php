<?php
include "conf/koneksi.php";

$kota = $_GET['kota'];
$kec = mysqli_query($connect, "SELECT * FROM kecamatan WHERE id_kab='$kota' order by nama_kec");
echo "<option>-- Pilih kec --</option>";
while($k = mysqli_fetch_array($kec)){
    echo "<option value=\"".$k['id_kec']."\">".$k['nama_kec']."</option>\n";
}
?>