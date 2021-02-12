<?php
session_start();
unset($_SESSION['nik']);
echo "<script>alert('Anda menuju halaman login'); window.location = 'dashboard.php'</script>";
exit;
