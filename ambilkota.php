<?php
include "conf/koneksi.php";

$propinsi = $_GET['propinsi'];
$kota = mysqli_query($connect, "SELECT * FROM kabupaten WHERE id_prov='$propinsi' order by nama_kab");
echo "<option>-- Pilih kab --</option>";
while($k = mysqli_fetch_array($kota)){
    echo "<option value=\"".$k['id_kab']."\">".$k['nama_kab']."</option>\n";
}
?>
