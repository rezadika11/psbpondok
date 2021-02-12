<?php

/* include autoloader */

require_once '../../../dompdf/autoload.inc.php';

include "../../../format_tanggal.php";
include "../../../conf/koneksi.php";
/* reference the Dompdf namespace */

use Dompdf\Dompdf;


/* instantiate and use the dompdf class */

$dompdf = new Dompdf();
$ed = mysqli_query($connect, "SELECT * FROM `pendaftar_santri`,pendaftaran WHERE pendaftar_santri.id_daftar = pendaftaran.id_pendaftaran AND pendaftaran.id_pendaftaran = '$_POST[tid]'");
$r = mysqli_fetch_array($ed);

/*-------- menghitung total jumlah peserta -----------*/
$sql1 = mysqli_query($connect, "select *, count(pengguna.nik) as jml_peserta from pengguna where hak_akses = 'Santri' ");
$a = mysqli_fetch_array($sql1);
$jml_pendaftar = $a['jml_peserta'];

/*-------- menghitung total jumlah formulir terkumpul -----------*/
$sql3 = mysqli_query($connect, "select *, count(pendaftar_santri.nik) as jml_daftar from pendaftar_santri");
$c = mysqli_fetch_array($sql3);
$jml_formulir = $c['jml_daftar'];

/*-------- menghitung total jumlah formulir terkumpul -----------*/
$sql4 = mysqli_query($connect, "select *, count(pendaftar_santri.nik) as jml_cewe from pendaftar_santri where jk = 'Perempuan'");
$d = mysqli_fetch_array($sql4);
$jml_cewe = $d['jml_cewe'];

/*-------- menghitung total jumlah formulir terkumpul -----------*/
$sql5 = mysqli_query($connect, "select *, count(pendaftar_santri.nis) as jml_cowo from pendaftar_santri where jk = 'Laki - laki'");
$e = mysqli_fetch_array($sql5);
$jml_cowo = $e['jml_cowo'];

/*-------- menghitung total jumlah formulir terkumpul -----------*/
$sql6 = mysqli_query($connect, "select *, count(pendaftar_santri.nis) as jml_diterima from pendaftar_santri where keterangan = 'Lulus'");
$f = mysqli_fetch_array($sql6);
$jml_diterima = $f['jml_diterima'];

/*-------- menghitung total jumlah formulir terkumpul -----------*/
$sql7 = mysqli_query($connect, "select *, count(pendaftar_santri.nis) as jml_ditolak from pendaftar_santri where keterangan = 'Tidak Lulus'");
$g = mysqli_fetch_array($sql7);
$jml_ditolak = $g['jml_ditolak'];

$html = '

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="bootstrap.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="row">
	<div class="col-md-3">
	</div>
	<div class="col-md-9">
	<center>
	 <h4>PENERIMAAN SANTRI BARU 2020/2021<BR><h3>PONPES DARUSSALAM DUKUHWALUH PURWOKERTO</h3></h4>
	 </center>
	</div>
</div>
<p align="center">======================================================================================</p>
<p align="center">Laporan Penerimaan Santri Baru (PPDB)<br>Pon.Pes Darussalam Dukuhwaluh Purwokerto</p>

	<table class="table table-condensed">
		<tr>
			<th width="250px">Periode Pendaftaran</th>
			<td>' . $r['periode'] . '</td>
			<td></td>
		</tr>
		<tr>
			<th width="250px">Tanggal Mulai Pendaftaran</th>
			<td>' . indonesian_date($r['tgl_mulai']) . '</td>
			<td></td>
		</tr>
		<tr>
			<th width="250px">Tanggal Berakhir Pendaftaran</th>
			<td>' . indonesian_date($r['tgl_selesai']) . '</td>
			<td></td>
		</tr>
		<tr>
			<th width="250px">Kuota Yang Ada</th>
			<td>' . $r['kuota'] . ' Santri</td>
			<td></td>
		</tr>
		<tr>
			<th width="300px">Jumlah akun calon siswa yang terdaftar</th>
			<td>' . $jml_pendaftar . ' Santri</td>
			<td></td>
		</tr>
		<tr>
			<th width="250px">Jumlah Formulir yang terkumpul</th>
			<td>' . $jml_formulir . ' Santri</td>
			<td></td>
		</tr>
		<tr>
			<th>Calon Santri</th>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th></th>
			<td>' . $jml_cowo . ' Laki - laki</td>
			<td></td>
		</tr>
		<tr>
			<th></th>
			<td>' . $jml_cewe . ' Perempuan</td>
			<td></td>
		</tr>
		<tr>
			<th>Siswa diterima</th>
			<td>' . $jml_diterima . ' Santri</td>
			<td></td>
		</tr>
		<tr>
			<th>Siswa ditolak</th>
			<td>' . $jml_ditolak . ' Santri</td>
			<td></td>
		</tr>
	</table>

		<div class="col-md-6">
			<h3>Lampiran</h3>
		</div>

	<h3>Daftar Seluruh Pendaftar</h3>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No. </th>
				<th>No Pendaftaran</th>
				<th>NIK</th>
				<th>Nama Siswa</th>
				<th>Jenis Kelamin</th>
				<th>Tanggal Daftar</th>
			</tr>
		</thead>
		<tbody>';

$query = mysqli_query($connect, "SELECT * FROM `pendaftar_santri` WHERE id_daftar = '$_POST[tid]'");
$no = 1;
while ($a = mysqli_fetch_array($query)) {

	$html .= '<tr>
				<td>' . $no . '</td>
				<td>' . $a['no_daftar'] . '</td>
				<td>' . $a['nik'] . '</td>
				<td>' . $a['nama_santri'] . '</td>
				<td>' . $a['jk'] . '</td>
				<td>' . indonesian_date($a['tgl_daftar']) . '</td>
			</tr>';
	$no++;
}
$html .= '</tbody>
	</table>
	<h3>Daftar siswa diterima</h3>
	<table class="table table-bordered">
		<thead>
			<tr>
			<th>No. </th>
			<th>No Pendaftaran</th>
			<th>NIK</th>
			<th>Nama Siswa</th>
			<th>Jenis Kelamin</th>
			<th>Tanggal Daftar</th>
			</tr>
		</thead>
		<tbody>';

$query = mysqli_query($connect, "SELECT * FROM `pendaftar_siswa` WHERE keterangan = 'Lulus' AND id_daftar = '$_POST[tid]'");
$no = 1;
while ($a = mysqli_fetch_array($query)) {

	$html .= '<tr>
			<td>' . $no . '</td>
			<td>' . $a['no_daftar'] . '</td>
			<td>' . $a['nik'] . '</td>
			<td>' . $a['nama_santri'] . '</td>
			<td>' . $a['jk'] . '</td>
			<td>' . indonesian_date($a['tgl_daftar']) . '</td>
			</tr>';
	$no++;
}
$html .= '</tbody>
	</table>
	<h3>Daftar Siswa tidak diterima</h3>
	<table class="table table-bordered">
		<thead>
			<tr>
			<th>No. </th>
			<th>No Pendaftaran</th>
			<th>NIK</th>
			<th>Nama Siswa</th>
			<th>Jenis Kelamin</th>
			<th>Tanggal Daftar</th>
			</tr>
		</thead>
		<tbody>';

$query = mysqli_query($connect, "SELECT * FROM `pendaftar_siswa` WHERE keterangan = 'Tidak Lulus' AND id_daftar = '$_POST[tid]'");
$no = 1;
while ($a = mysqli_fetch_array($query)) {

	$html .= '	<tr>
	<td>' . $no . '</td>
	<td>' . $a['no_daftar'] . '</td>
	<td>' . $a['nik'] . '</td>
	<td>' . $a['nama_santri'] . '</td>
	<td>' . $a['jk'] . '</td>
	<td>' . indonesian_date($a['tgl_daftar']) . '</td>
			</tr>';
	$no++;
}
$html .= '</tbody>
	</table>

';

$dompdf->loadHtml($html);


/* Render the HTML as PDF */

$dompdf->render();


/* Output the generated PDF to Browser */

$dompdf->stream();
