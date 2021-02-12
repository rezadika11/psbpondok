<?php
session_start();

if (isset($_SESSION['nik'])) {
    header("Location:dashboard_santri.php");
} else {

    header("Location:dashboard.php");
}
