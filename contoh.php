<?php
include "conf/koneksi.php";
include "format_tanggal.php";

$query = mysqli_query($connect, "SELECT * FROM pendaftar_santri, prestasi, program WHERE pendaftar_santri.prestasi = prestasi.id_prestasi AND pendaftar_santri.program = program.id_program AND pendaftar_santri.nik= '15.11.0135'");
$cek = mysqli_num_rows($query);
$p = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
</head>

<body>
	<div class="container-fluid">
		<div class="col-md-3">
			<img src="images/icon.jpg" alt="">
		</div>
		<div class="col-md-6">
			<center>
				<h2>SMK MA'ARIF 2 GOMBONG</h2>
				Jl. Kemukus No. 96 B, Gombong, Kemukus, Gombong, Kabupaten Kebumen, Jawa Tengah 54416
			</center>
		</div>
		<div class="col-md-3">
		</div>
	</div>
	<p align="center">==============================================================================================================================================================</p>
	<div class="col-md-12">
		<h4 align="center"><b>BUKTI PENDAFTARAN</b><BR> CALON PESERTA DIDIK BARU SMK 2 MA'RIF GOMBONG</h4><br><br>
		<table class="table table-condensed">
			<tr>
				<td>1</td>
				<th width="250">Nomor Pendaftaran</th>
				<td><?php echo $p['no_daftar']; ?></td>
			</tr>
			<tr>
				<td>2</td>
				<th width="150">Nomor Induk Siswa</th>
				<td><?php echo $p['nis']; ?></td>
			</tr>
			<tr>
				<td>3</td>
				<th width="250">Nama Siswa</th>
				<td><?php echo $p['nama_siswa']; ?></td>
			</tr>
			<tr>
				<td>4</td>
				<th width="150">Jenis Kelamin</th>
				<td><?php echo $p['jk']; ?></td>
			</tr>
			<tr>
				<td>5</td>
				<th width="150">Alamat</th>
				<td><?php echo $p['alamat']; ?></td>
			</tr>
			<tr>
				<td>6</td>
				<th width="150">Tempat, Tanggal Lahir</th>
				<td><?php echo $p['tempat_lahir']; ?>, <?php echo indonesian_date($p['tgl_lahir']); ?></td>
			</tr>
			<tr>
				<td>7</td>
				<th width="150">Agama</th>
				<td><?php echo $p['agama']; ?></td>
			</tr>
			<tr>
				<td>8</td>
				<th width="150">TInggi Badan</th>
				<td><?php echo $p['tinggi']; ?> CM</td>
			</tr>
			<tr>
				<td>9</td>
				<th width="150">Berat Badan</th>
				<td><?php echo $p['berat']; ?> KG</td>
			</tr>
			<tr>
				<td>10</td>
				<th width="150">Anak Ke - </th>
				<td><?php echo $p['anak_ke']; ?> dari <?php echo $p['jml_saudara']; ?> bersaudara</td>
			</tr>
			<tr>
				<td>11</td>
				<th width="150">Cita - cita</th>
				<td><?php echo $p['cita']; ?></td>
			</tr>
			<tr>
				<td>12</td>
				<th width="150">Hobi</th>
				<td><?php echo $p['hobi']; ?></td>
			</tr>
			<tr>
				<td>13</td>
				<th width="150">Jarak Rumah ke Sekolah</th>
				<td><?php echo $p['jarak']; ?></td>
			</tr>
			<tr>
				<td>14</td>
				<th width="150">Transportasi</th>
				<td><?php echo $p['transport']; ?></td>
			</tr>
			<tr>
				<td>15</td>
				<th width="150">Asal Sekolah</th>
				<td><?php echo $p['asal_sekolah']; ?></td>
			</tr>
			<tr>
				<td>16</td>
				<th width="150">Nilai Bahasa Indonesia</th>
				<td><?php echo $p['nilai_indo']; ?></td>
			</tr>
			<tr>
				<td>17</td>
				<th width="150">Nilai Bahasa Inggris</th>
				<td><?php echo $p['nilai_inggris']; ?></td>
			</tr>
			<tr>
				<td>18</td>
				<th width="150">Nilai Matematika</th>
				<td><?php echo $p['nilai_mtk']; ?></td>
			</tr>
			<tr>
				<td>19</td>
				<th width="150">Nilai IPA</th>
				<td><?php echo $p['nilai_ipa']; ?></td>
			</tr>
			<tr>
				<td>20</td>
				<th width="150">Prestasi</th>
				<td><?php echo $p['tingkat']; ?></td>
			</tr>
			<tr>
				<td>21</td>
				<th width="150">Program Kejuruan yang Diambil</th>
				<td><?php echo $p['nama_jurusan']; ?></td>
			</tr>
			<tr>
				<td>22</td>
				<th width="150">Nama Ayah</th>
				<td><?php echo $p['nama_ayah']; ?></td>
			</tr>
			<tr>
				<td>23</td>
				<th width="150">Nama Ibu</th>
				<td><?php echo $p['nama_ibu']; ?></td>
			</tr>
			<tr>
				<td>24</td>
				<th width="150">Kerja Ayah</th>
				<td><?php echo $p['kerja_ayah']; ?></td>
			</tr>
			<tr>
				<td>25</td>
				<th width="150">Kerja Ibu</th>
				<td><?php echo $p['kerja_ibu']; ?></td>
			</tr>
			<tr>
				<td>26</td>
				<th width="150">Alamat Orang Tua</th>
				<td><?php echo $p['alamat_ortu']; ?></td>
			</tr>
			<tr>
				<td>27</td>
				<th width="150">Nomor Telp/HP Orang Tua</th>
				<td><?php echo $p['notelp_ortu']; ?></td>
			</tr>
			<tr>
				<td>28</td>
				<th width="150">Nomor Seri Ijasah</th>
				<td><?php echo $p['noseriijasah']; ?></td>
			</tr>
			<tr>
				<td>29</td>
				<th width="150">Nomor Seri SKHU</th>
				<td><?php echo $p['noseriskhu']; ?></td>
			</tr>

			<tr>
				<td>30</td>
				<th width="150">Status</th>
				<td>
					<h3><span class="label label-info"><?php echo $p['keterangan']; ?></span></h3>
				</td>
			</tr>
			<tr>
				<td></td>
				<td align="center" style="padding-right:10px;"><br><br><img src="images/pass.png" width="85px"></td>
				<td><br><br>
					<p>Susukan, 67676767 </p>
					Nama Pendaftar
					<br><br><br><br>
					<?php echo $p['nama_siswa']; ?>
				</td>
			</tr>
		</table>
	</div>
</body>

</html>