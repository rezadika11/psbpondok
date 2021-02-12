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

$no = antiinjection($_POST['nodaftar']);
$nisn = antiinjection($_POST['nisn']);
$nama = antiinjection($_POST['nama']);
$jk = antiinjection($_POST['jk']);
$alamat = antiinjection($_POST['alamat']);
$tmpt = antiinjection($_POST['tempat_lahir']);
$tgl = antiinjection($_POST['tgl_lahir']);
$agama = antiinjection($_POST['agama']);
$tinggi = antiinjection($_POST['tinggi']);
$berat = antiinjection($_POST['berat']);
$anak_ke = antiinjection($_POST['anak_ke']);
$jml_saudara = antiinjection($_POST['jml_saudara']);
$notelp = antiinjection($_POST['notelp']);
$cita = antiinjection($_POST['cita']);
$hobi = antiinjection($_POST['hobi']);
$jarak = antiinjection($_POST['jarak']);
$trans = antiinjection($_POST['trans']);
$sek = antiinjection($_POST['sek']);
$noskhu = antiinjection($_POST['no_skhu']);
$noijasah = antiinjection($_POST['no_ijasah']);
$indo = antiinjection($_POST['indo']);
$inggris = antiinjection($_POST['inggris']);
$mtk = antiinjection($_POST['mtk']);
$ipa = antiinjection($_POST['ipa']);
$pres = antiinjection($_POST['prestasi']);
$jur = antiinjection($_POST['jurusan']);
$namaayah = antiinjection($_POST['ayah']);
$namaibu = antiinjection($_POST['ibu']);
$kerjaayah = antiinjection($_POST['kerja_ayah']);
$kerjaibu = antiinjection($_POST['kerja_ibu']);
$alamatortu = antiinjection($_POST['alamat_ortu']);
$penghasilanortu = antiinjection($_POST['penghasilan_ortu']);
$notelportu = antiinjection($_POST['notelp_ortu']);
$ket = "Belum Terverifikasi";
$tgldaftar = antiinjection($_POST['tgl_daftar']);

$qpres = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM prestasi WHERE id_prestasi = '$pres'"));
$nilaipres = $qpres['nilai'];

if (isset($_POST['ubah_foto'])) {
	if ($_FILES['foto']['name'] != '') {
		$target_dir = "uploads/foto/";
		$target_file = $target_dir . basename($_FILES["foto"]["name"]);
		$fotobaru = $_FILES["foto"]["name"];

		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

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

		$query = "SELECT * FROM pendaftar_siswa WHERE nis='$nisn'"; // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim

		$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
		$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

		if (is_file("uploads/foto/" . $data['foto'])) // Jika foto ada
			unlink("uploads/foto/" . $data['foto']); // Hapus file foto sebelumnya yang ada di folder images
		// Proses ubah data ke Database
	}
	$query = "UPDATE pendaftar_siswa SET
					`nis`='$nisn',
					`nama_siswa`='$nama',
					`jk`='$jk',
					`alamat`='$alamat',
					`tempat_lahir`='$tmpt',
					`tgl_lahir`='$tgl',
					`agama`='$agama',
					`tinggi`='$tinggi',
					`berat`='$berat',
					`anak_ke`='$anak_ke',
					`jml_saudara`='$jml_saudara',
					`notelp`='$notelp',
					`cita`='$cita',
					`hobi`='$hobi',
					`jarak`='$jarak',
					`transport`='$trans',
					`asal_sekolah`='$sek',
					`noseriskhu`='$noskhu',
					`noseriijasah`='$noijasah',
					`nilai_indo`='$indo',
					`nilai_inggris`='$inggris',
					`nilai_mtk`='$mtk',
					`nilai_ipa`='$ipa',
					`nilai_pres`='$nilaipres',
					`prestasi`='$pres',
					`jurusan`='$jur',
					`nama_ayah`='$namaayah',
					`nama_ibu`='$namaibu',
					`kerja_ayah`='$kerjaayah',
					`kerja_ibu`='$kerjaibu',
					`alamat_ortu`='$alamatortu',
					`penghasilan_ortu`='$penghasilanortu',
					`notelp_ortu`='$notelportu',
					`foto`='$fotobaru',
					`tgl_daftar`='$tgldaftar'
					WHERE no_daftar='$no'";
	$sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
	if ($sql) { // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		echo "<script>alert('Data Pendaftaran sudah terupdate.');</script>";
		echo "<meta http-equiv='refresh' content='0; url=dashboard_siswa.php'>"; // Redirect ke halaman index.php
	} else {      // Jika Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
	}
} elseif (isset($_POST['ubah_skhu'])) {
	if ($_FILES['skhu']['name'] != '') {
		$target_dir2 = "uploads/skhu/";
		$target_file2 = $target_dir2 . basename($_FILES["skhu"]["name"]);
		$skhubaru = $_FILES["skhu"]["name"];

		$uploadOk = 1;
		$imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));

		// gambar 2
		$check2 = getimagesize($_FILES["skhu"]["tmp_name"]);
		if ($check2 !== false) {
			$uploadOk = 1;
		} else {
			echo "<script>alert('File bukan gambar!');</script>";
			echo "<meta http-equiv='refresh' content='0; url=formulir.php'>";
			$uploadOk = 0;
		}

		// Check file size
		if ($_FILES["skhu"]["size"] > 2000000) {
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
			if (move_uploaded_file($_FILES["skhu"]["tmp_name"], $target_file2)) {
			} else {
				echo "<script>alert('Gambar gagal diupload');</script>";
				echo "<meta http-equiv='refresh' content='0; url=formulir.php'>";
			}
		}

		$query = "SELECT * FROM pendaftar_siswa WHERE nis='$nisn'"; // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim

		$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
		$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
		// Cek apakah file foto sebelumnya ada di folder images

		if (is_file("uploads/skhu/" . $data['skhu'])) // Jika foto ada
			unlink("uploads/skhu/" . $data['skhu']); // Hapus file foto sebelumnya yang ada di folder images
		// Proses ubah data ke Database
	}

	$query = "UPDATE pendaftar_siswa SET
						          `nis`='$nisn',
											`nama_siswa`='$nama',
											`jk`='$jk',
											`alamat`='$alamat',
											`tempat_lahir`='$tmpt',
											`tgl_lahir`='$tgl',
											`agama`='$agama',
											`tinggi`='$tinggi',
											`berat`='$berat',
											`anak_ke`='$anak_ke',
											`jml_saudara`='$jml_saudara',
											`notelp`='$notelp',
											`cita`='$cita',
											`hobi`='$hobi',
											`jarak`='$jarak',
											`transport`='$trans',
											`asal_sekolah`='$sek',
											`noseriskhu`='$noskhu',
											`noseriijasah`='$noijasah',
											`nilai_indo`='$indo',
											`nilai_inggris`='$inggris',
											`nilai_mtk`='$mtk',
											`nilai_ipa`='$ipa',
											`nilai_pres`='$nilaipres',
											`prestasi`='$pres',
											`jurusan`='$jur',
											`nama_ayah`='$namaayah',
											`nama_ibu`='$namaibu',
											`kerja_ayah`='$kerjaayah',
											`kerja_ibu`='$kerjaibu',
											`alamat_ortu`='$alamatortu',
											`penghasilan_ortu`='$penghasilanortu',
											`notelp_ortu`='$notelportu',
											`skhu`='$skhubaru',
											`tgl_daftar`='$tgldaftar'
						          WHERE no_daftar='$no'";
	$sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
	if ($sql) { // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		echo "<script>alert('Data Pendaftaran sudah terupdate.');</script>";
		echo "<meta http-equiv='refresh' content='0; url=dashboard_siswa.php'>"; // Redirect ke halaman index.php
	} else {      // Jika Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
	}
} elseif (isset($_POST['ubah_ijasah'])) {
	if ($_FILES['ijasah']['name'] != '') {
		$target_dir3 = "uploads/ijasah/";
		$target_file3 = $target_dir3 . basename($_FILES["ijasah"]["name"]);
		$ijasahbaru = $_FILES["ijasah"]["name"];
		$uploadOk = 1;
		$imageFileType3 = strtolower(pathinfo($target_file3, PATHINFO_EXTENSION));

		// gambar 3
		$check3 = getimagesize($_FILES["ijasah"]["tmp_name"]);
		if ($check3 !== false) {
			$uploadOk = 1;
		} else {
			echo "<script>alert('File bukan gambar!');</script>";
			echo "<meta http-equiv='refresh' content='0; url=formulir.php'>";
			$uploadOk = 0;
		}

		// Check file size
		if ($_FILES["ijasah"]["size"] > 2000000) {
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
			if (move_uploaded_file($_FILES["ijasah"]["tmp_name"], $target_file3)) {
			} else {
				echo "<script>alert('Gambar gagal diupload');</script>";
				echo "<meta http-equiv='refresh' content='0; url=formulir.php'>";
			}
		}

		$query = "SELECT * FROM pendaftar_siswa WHERE nis='$nisn'"; // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim

		$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
		$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
		// Cek apakah file foto sebelumnya ada di folder images

		if (is_file("uploads/ijasah/" . $data['ijasah'])) // Jika foto ada
			unlink("uploads/ijasah/" . $data['ijasah']); // Hapus file foto sebelumnya yang ada di folder images
		// Proses ubah data ke Database
	}
	$query = "UPDATE pendaftar_siswa SET
						`nis`='$nisn',
						`nama_siswa`='$nama',
						`jk`='$jk',
						`alamat`='$alamat',
						`tempat_lahir`='$tmpt',
						`tgl_lahir`='$tgl',
						`agama`='$agama',
						`tinggi`='$tinggi',
						`berat`='$berat',
						`anak_ke`='$anak_ke',
						`jml_saudara`='$jml_saudara',
						`notelp`='$notelp',
						`cita`='$cita',
						`hobi`='$hobi',
						`jarak`='$jarak',
						`transport`='$trans',
						`asal_sekolah`='$sek',
						`noseriskhu`='$noskhu',
						`noseriijasah`='$noijasah',
						`nilai_indo`='$indo',
						`nilai_inggris`='$inggris',
						`nilai_mtk`='$mtk',
						`nilai_ipa`='$ipa',
						`nilai_pres`='$nilaipres',
						`prestasi`='$pres',
						`jurusan`='$jur',
						`nama_ayah`='$namaayah',
						`nama_ibu`='$namaibu',
						`kerja_ayah`='$kerjaayah',
						`kerja_ibu`='$kerjaibu',
						`alamat_ortu`='$alamatortu',
						`penghasilan_ortu`='$penghasilanortu',
						`notelp_ortu`='$notelportu',
						`ijasah`='$ijasahbaru',
						`tgl_daftar`='$tgldaftar'
						WHERE no_daftar='$no'";
	$sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
	if ($sql) { // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		echo "<script>alert('Data Pendaftaran sudah terupdate.');</script>";
		echo "<meta http-equiv='refresh' content='0; url=dashboard_siswa.php'>"; // Redirect ke halaman index.php
	} else {      // Jika Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
	}
} else { // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
	// Proses ubah data ke Database
	$query = "UPDATE pendaftar_siswa SET
	          `nis`='$nisn',
						`nama_siswa`='$nama',
						`jk`='$jk',
						`alamat`='$alamat',
						`tempat_lahir`='$tmpt',
						`tgl_lahir`='$tgl',
						`agama`='$agama',
						`tinggi`='$tinggi',
						`berat`='$berat',
						`anak_ke`='$anak_ke',
						`jml_saudara`='$jml_saudara',
						`notelp`='$notelp',
						`cita`='$cita',
						`hobi`='$hobi',
						`jarak`='$jarak',
						`transport`='$trans',
						`asal_sekolah`='$sek',
						`noseriskhu`='$noskhu',
						`noseriijasah`='$noijasah',
						`nilai_indo`='$indo',
						`nilai_inggris`='$inggris',
						`nilai_mtk`='$mtk',
						`nilai_ipa`='$ipa',
						`nilai_pres`='$nilaipres',
						`prestasi`='$pres',
						`jurusan`='$jur',
						`nama_ayah`='$namaayah',
						`nama_ibu`='$namaibu',
						`kerja_ayah`='$kerjaayah',
						`kerja_ibu`='$kerjaibu',
						`alamat_ortu`='$alamatortu',
						`penghasilan_ortu`='$penghasilanortu',
						`notelp_ortu`='$notelportu',
						`tgl_daftar`='$tgldaftar'
	          WHERE no_daftar='$no'";
	$sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
	if ($sql) { // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		echo "<script>alert('Data Pendaftaran sudah terupdate.');</script>";
		echo "<meta http-equiv='refresh' content='0; url=dashboard_siswa.php'>"; // Redirect ke halaman index.php
	} else {    // Jika Gagal, Lakukan :
		echo "<script>alert('Gambar gagal diupload');</script>";
		echo "<meta http-equiv='refresh' content='0; url=edit-data.php'>";
	}
}
