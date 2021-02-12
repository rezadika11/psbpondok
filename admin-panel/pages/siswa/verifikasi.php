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

$no = antiinjection($_POST['no_daftar']);

$cek = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM pendaftar_santri, prestasi, program WHERE pendaftar_santri.prestasi = prestasi.id_prestasi AND pendaftar_santri.program = program.id_program AND pendaftar_santri.no_daftar = '$no'"));



if ($cek['nilai_pres'] == "0") {
	$nilai = ($indo + $inggris + $mtk + $ipa) / 4;
} elseif ($cek['nilai_pres'] >= "0") {
	$nilai = ($indo + $inggris + $mtk + $ipa + $pres) / 4.5;
}

if ($nilai >= $cek['nilai_min']) {
	$hasil = "Lulus";
} else {
	$hasil = "Tidak Lulus";
}

/*--------------------------------------------------------------------------------------*/
mysqli_query($connect, "UPDATE `pendaftar_santri` SET `keterangan` = '$hasil' WHERE `pendaftar_santri`.`no_daftar` = '$no';");

echo "<script>alert('Data Terverifikasi.');</script>";
echo "<meta http-equiv='refresh' content='0;url=?page=total-siswa'>";
?>
