
<?php
include "../conf/koneksi.php";
include "../lib/inc.session.php";

/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
function antiinjection($data)
{
	$filter_sql = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
	return $filter_sql;
}

$no = antiinjection($_POST['no_induk']);
$nama = antiinjection($_POST['nama']);
$pass = antiinjection($_POST['password']);
$email = antiinjection($_POST['email']);
$alamat = antiinjection($_POST['alamat']);
$tmp_lahir = antiinjection($_POST['tmp_lahir']);
$tgl_lahir = antiinjection($_POST['tgl_lahir']);
$jk = antiinjection($_POST['jk']);


$salt = 'vieyama';
$hash = md5($salt . $pass);

if (isset($_POST['ubah_foto'])) {
	if ($_FILES['foto']['name'] != '') {
		$foto = $_FILES['foto']['name'];
		$tmp = $_FILES['foto']['tmp_name'];

		$fotobaru = $nama . "-" . $foto;
		$path = "uploads/admin-foto/" . $fotobaru;

		move_uploaded_file($tmp, $path);

		$query = "SELECT * FROM admin WHERE no_induk='$no'"; // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim

		$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
		$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
		// Cek apakah file foto sebelumnya ada di folder images

		if (is_file("uploads/admin-foto/" . $data['foto'])) // Jika foto ada
			unlink("uploads/admin-foto/" . $data['foto']); // Hapus file foto sebelumnya yang ada di folder images
		// Proses ubah data ke Database
	}
	$query = "UPDATE admin SET
					`nama_admin`='$nama',
					`jk`='$jk',
         
					`alamat`='$alamat',
					`tmp_lahir`='$tmp_lahir',
					`tgl_lahir`='$tgl_lahir',
					`foto`='$fotobaru'
					WHERE no_induk='$no'";

	$query2 = "UPDATE pengguna SET
          nama_pengguna = '$nama',
          password = '$hash',
          pass_asli = '$pass',
          email = '$email' WHERE nik = '$no'";
	$sql = mysqli_query($connect, $query);
	$sql1 = mysqli_query($connect, $query2); // Eksekusi/ Jalankan query dari variabel $query
	if ($sql && $sql1) { // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		echo "<script>alert('Data Pendaftaran sudah terupdate.');</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=profile-admin'>"; // Redirect ke halaman index.php
	} else {      // Jika Gagal, Lakukan :
		echo "<script>alert('Data gagal di update.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=edit-profile'>";
	}
} else {
	/*--------------------------------------------------------------------------------------*/
	mysqli_query($connect, "UPDATE admin SET
        `nama_admin`='$nama',
        `jk`='$jk',
        `alamat`='$alamat',
        `tmp_lahir`='$tmp_lahir',
        `tgl_lahir`='$tgl_lahir'
        WHERE no_induk='$no'");
	mysqli_query($connect, "UPDATE pengguna SET
        nama_pengguna = '$nama',
        password = '$hash',
        pass_asli = '$pass',
        email = '$email' WHERE nik = '$no'");
	echo "<script>alert('Data sudah di update.');</script>";
	echo "<meta http-equiv='refresh' content='0;url=?page=profile-admin'>";
}
?>
