<?php
include('../conf/koneksi.php');

//------ANTI XSS & SQL INJECTION-------//
function antiinjection($data)
{
  $filter_sql = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
  return $filter_sql;
}


$uname = antiinjection($_POST['user']);
$pass = antiinjection($_POST['pass']);

$salt = 'vieyama';
$hash = md5($salt . $pass);

//------ANTI XSS & SQL INJECTION-------//

$sql = mysqli_query($connect, "SELECT * FROM pengguna WHERE nik='$uname' AND password='$hash' AND hak_akses != 'Santri'");

$r = mysqli_fetch_array($sql);
if ($r['nik'] == $uname and $r['password'] == $hash) {
  session_start();
  $_SESSION['nik'] = $r['nik'];
  $_SESSION['password'] = $r['password'];
  $_SESSION['hak'] = $r['hak_akses'];

  echo "<script>alert('Anda berhasil login, silahkan masuk.');
  window.location = 'media.php?page=dashboard'</script>";
} else {
  echo "<script>alert('Maaf! Login gagal. Silahkan cek lagi username dan password anda!.');
  window.location = 'home.php?page=auth'</script>";
}
