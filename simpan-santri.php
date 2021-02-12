<?php
include "conf/koneksi.php";



/*---------------------------- ANTI XSS & SQL INJECTION ----------------------*/
function antiinjection($data)
{
	$filter_sql = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
	return $filter_sql;
}
/*-------------------------------------------------------------------*/
// baca current date

$id_daftar = antiinjection($_POST['id_daftar']);
$no = antiinjection($_POST['nodaftar']);
$nik = antiinjection($_POST['nik']);
$nama = antiinjection($_POST['nama']);
$jk = antiinjection($_POST['jk']);
$tmpt = antiinjection($_POST['tempat_lahir']);
$tgl = antiinjection($_POST['tgl_lahir']);
$goldar = antiinjection($_POST['goldar']);
$anak_ke = antiinjection($_POST['anak_ke']);
$jml_saudara = antiinjection($_POST['jml_saudara']);
$notelp = antiinjection($_POST['notelp']);
$cita = antiinjection($_POST['cita']);
$hobi = antiinjection($_POST['hobi']);
$asal_sekolah = antiinjection($_POST['asal_sekolah']);
$alamat = antiinjection($_POST['alamat']);
$pres = antiinjection($_POST['prestasi']);
$program = antiinjection($_POST['program']);
$namaayah = antiinjection($_POST['ayah']);
$namaibu = antiinjection($_POST['ibu']);
$kerjaayah = antiinjection($_POST['kerja_ayah']);
$kerjaibu = antiinjection($_POST['kerja_ibu']);
$alamatortu = antiinjection($_POST['alamat_ortu']);
$penghasilanortu = antiinjection($_POST['penghasilan_ortu']);
$notelportu = antiinjection($_POST['notelp_ortu']);
$ket = "Belum Terverifikasi";
$tgldaftar = date('Ymd');
$arsip = "Tidak";

if (isset($_REQUEST['submit'])) {

	$target_dir = "uploads/foto/";
	$target_dir2 = "uploads/kk/";
	$target_dir3 = "uploads/ktp/";
	$target_dir4 = "uploads/pembayaran/";
	$target_file = $target_dir . basename($_FILES["foto"]["name"]);
	$target_file2 = $target_dir2 . basename($_FILES["kk"]["name"]);
	$target_file3 = $target_dir3 . basename($_FILES["ktp"]["name"]);
	$target_file4 = $target_dir4 . basename($_FILES["pembayaran"]["name"]);
	$fotobaru = $_FILES["foto"]["name"];
	$kkbaru = $_FILES["kk"]["name"];
	$ktpbaru = $_FILES["ktp"]["name"];
	$pembayaranbaru = $_FILES["pembayaran"]["name"];

	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	$imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
	$imageFileType3 = strtolower(pathinfo($target_file3, PATHINFO_EXTENSION));
	$imageFileType4 = strtolower(pathinfo($target_file4, PATHINFO_EXTENSION));


	// gambar 1
	$check = getimagesize($_FILES["foto"]["tmp_name"]);
	if ($check !== false) {
		$uploadOk = 1;
	} else {
		echo "<script>alert('File bukan gambar!');</script>";
		echo "<meta http-equiv='refresh' content='0; url=formulir.php'>";
		$uploadOk = 0;
	}

	// Check file size
	if ($_FILES["foto"]["size"] > 2000000) {
		echo "<script>alert('Gambar tidak boleh lebih dari 2MB');</script>";
		echo "<meta http-equiv='refresh' content='0; url=formulir.php'>";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
		echo "<script>alert('Gambar hanya boleh berupa JPG, PNG atau JPEG');</script>";
		echo "<meta http-equiv='refresh' content='0; url=formulir.php'>";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "<script>alert('Gambar gagal diupload');</script>";
		echo "<meta http-equiv='refresh' content='0; url=formulir.php'>";
		// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
		} else {
			echo "<script>alert('Gambar gagal diupload');</script>";
			echo "<meta http-equiv='refresh' content='0; url=formulir.php'>";
		}
	}

	// gambar 2
	$check2 = getimagesize($_FILES["kk"]["tmp_name"]);
	if ($check2 !== false) {
		$uploadOk = 1;
	} else {
		echo "<script>alert('File bukan gambar!');</script>";
		echo "<meta http-equiv='refresh' content='0; url=formulir.php'>";
		$uploadOk = 0;
	}

	// Check file size
	if ($_FILES["kk"]["size"] > 2000000) {
		echo "<script>alert('Gambar tidak boleh lebih dari 2MB');</script>";
		echo "<meta http-equiv='refresh' content='0; url=formulir.php'>";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if ($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg") {
		echo "<script>alert('Gambar hanya boleh berupa JPG, PNG atau JPEG');</script>";
		echo "<meta http-equiv='refresh' content='0; url=formulir.php'>";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "<script>alert('Gambar gagal diupload');</script>";
		echo "<meta http-equiv='refresh' content='0; url=formulir.php'>";
		// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["kk"]["tmp_name"], $target_file2)) {
		} else {
			echo "<script>alert('Gambar gagal diupload');</script>";
			echo "<meta http-equiv='refresh' content='0; url=formulir.php'>";
		}
	}

	// gambar 3
	$check3 = getimagesize($_FILES["ktp"]["tmp_name"]);
	if ($check3 !== false) {
		$uploadOk = 1;
	} else {
		echo "<script>alert('File bukan gambar!');</script>";
		echo "<meta http-equiv='refresh' content='0; url=formulir.php'>";
		$uploadOk = 0;
	}

	// Check file size
	if ($_FILES["ktp"]["size"] > 2000000) {
		echo "<script>alert('Gambar tidak boleh lebih dari 2MB');</script>";
		echo "<meta http-equiv='refresh' content='0; url=formulir.php'>";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if ($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg") {
		echo "<script>alert('Gambar hanya boleh berupa JPG, PNG atau JPEG');</script>";
		echo "<meta http-equiv='refresh' content='0; url=formulir.php'>";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "<script>alert('Gambar gagal diupload');</script>";
		echo "<meta http-equiv='refresh' content='0; url=formulir.php'>";
		// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["ktp"]["tmp_name"], $target_file3)) {
		} else {
			echo "<script>alert('Gambar gagal diupload');</script>";
			echo "<meta http-equiv='refresh' content='0; url=formulir.php'>";
		}
	}

	// gambar 4
	$check4 = getimagesize($_FILES["pembayaran"]["tmp_name"]);
	if ($check4 !== false) {
		$uploadOk = 1;
	} else {
		echo "<script>alert('File bukan gambar!');</script>";
		echo "<meta http-equiv='refresh' content='0; url=formulir.php'>";
		$uploadOk = 0;
	}

	// Check file size
	if ($_FILES["pembayaran"]["size"] > 2000000) {
		echo "<script>alert('Gambar tidak boleh lebih dari 2MB');</script>";
		echo "<meta http-equiv='refresh' content='0; url=formulir.php'>";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if ($imageFileType4 != "jpg" && $imageFileType4 != "png" && $imageFileType4 != "jpeg") {
		echo "<script>alert('Gambar hanya boleh berupa JPG, PNG atau JPEG');</script>";
		echo "<meta http-equiv='refresh' content='0; url=formulir.php'>";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "<script>alert('Gambar gagal diupload');</script>";
		echo "<meta http-equiv='refresh' content='0; url=formulir.php'>";
		// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["pembayaran"]["tmp_name"], $target_file4)) {
		} else {
			echo "<script>alert('Gambar gagal diupload');</script>";
			echo "<meta http-equiv='refresh' content='0; url=formulir.php'>";
		}
	}


	$qpres = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM prestasi WHERE id_prestasi = '$pres'"));
	$nilaipres = $qpres['nilai'];
	$cek_user = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM pendaftar_santri WHERE nik='$nik'"));
	if ($cek_user > 0) {
		echo "<script>alert('NIK Sudah Terdaftar!');</script>";
		echo "<meta http-equiv='refresh' content='0; url=formulir.php'>";
	} else {

		$result = mysqli_query($connect, "INSERT INTO pendaftar_santri VALUES ('$no',
					'$nik',
					'$nama',
					'$jk',
					'$alamat',
					'$tmpt',
					'$tgl',
					'$goldar',
					'$anak_ke',
					'$jml_saudara',
					'$notelp',
					'$cita',
					'$hobi',
					'$asal_sekolah',
					'$pres',
					'$program',
					'$namaayah',
					'$namaibu',
					'$kerjaayah',
					'$kerjaibu',
					'$alamatortu',
					'$penghasilanortu',
					'$notelportu',
					'$ktpbaru',
					'$fotobaru',
					'$kkbaru',
					'$pembayaranbaru',
					'$tgldaftar',
					'$ket',
					'$arsip',
					'$id_daftar')");

		if (!$result) {
			die('Query Error : ' . mysqli_errno($connect) .
				' - ' . mysqli_error($connect));
		}
		echo "<script>alert('Data Pendaftaran sudah tersimpan.');</script>";
		echo "<meta http-equiv='refresh' content='0; url=dashboard_santri.php'>";
	}
} else {  // Jika gambar gagal diupload, Lakukan :
	echo "<script>alert('Data Pendaftaran gagal tersimpan');</script>";
	echo "<meta http-equiv='refresh' content='0; url=formulir.php'>";
}
