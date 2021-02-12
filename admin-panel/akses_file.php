<?php
$pg = isset($_GET['page']) ? $_GET['page'] : ''; /*-- PHP 5 --*/
switch ($pg) {

		//-- sign out --//
	case 'sign-out':
		if (!file_exists("../admin-panel/sign_out.php")) die("File sign out tidak tersedia.");
		include("../admin-panel/sign_out.php");
		break;

		//--------------------------------------------------------------------------------------------------------------------//

		//-- dashboard --//
	case 'dashboard':
		if (!file_exists("../admin-panel/dashboard_admin.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/dashboard_admin.php");
		break;

		// =====================================Pendaftar=================================================
		//-- dashboard --//
	case 'view-pendaftar':
		if (!file_exists("../admin-panel/pages/pendaftar/view_pendaftar.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/pendaftar/view_pendaftar.php");
		break;

		//-- dashboard --//
	case 'del-pendaftar':
		if (!file_exists("../admin-panel/pages/pendaftar/del_pendaftar.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/pendaftar/del_pendaftar.php");
		break;

		// =================================Admin dan Superadmin==========================================
		//-- dashboard --//
	case 'view-admin':
		if (!file_exists("../admin-panel/pages/admin/view_admin.php")) die("file dashboard tidak tersedia.");
		include("../admin-panel/pages/admin/view_admin.php");
		break;
		//-- dashboard --//
	case 'profile-admin':
		if (!file_exists("../admin-panel/pages/admin/profile_admin.php")) die("file dashboard tidak tersedia.");
		include("../admin-panel/pages/admin/profile_admin.php");
		break;

		//-- dashboard --//
	case 'ubah-password':
		if (!file_exists("../admin-panel/pages/admin/ubah_pass.php")) die("file dashboard tidak tersedia.");
		include("../admin-panel/pages/admin/ubah_pass.php");
		break;
		//-- dashboard --//
	case 'update-pass':
		if (!file_exists("../admin-panel/pages/admin/update_pass.php")) die("file dashboard tidak tersedia.");
		include("../admin-panel/pages/admin/update_pass.php");
		break;

		//-- dashboard --//
	case 'edit-profile':
		if (!file_exists("../admin-panel/pages/admin/profile_edit.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/admin/profile_edit.php");
		break;
		//-- dashboard --//
	case 'update-profile':
		if (!file_exists("../admin-panel/pages/admin/profile_update.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/admin/profile_update.php");
		break;
		//-- dashboard --//
	case 'new-admin':
		if (!file_exists("../admin-panel/pages/admin/new_admin.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/admin/new_admin.php");
		break;

		//-- dashboard --//
	case 'edit-admin':
		if (!file_exists("../admin-panel/pages/admin/edit_admin.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/admin/edit_admin.php");
		break;

		//-- dashboard --//
	case 'update-admin':
		if (!file_exists("../admin-panel/pages/admin/update_admin.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/admin/update_admin.php");
		break;

		//-- dashboard --//
	case 'save-admin':
		if (!file_exists("../admin-panel/pages/admin/save_admin.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/admin/save_admin.php");
		break;

		//-- dashboard --//
	case 'del-admin':
		if (!file_exists("../admin-panel/pages/admin/del_admin.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/admin/del_admin.php");
		break;

		// =====================================Waktu Pendaftaran================================================
		//-- dashboard --//
	case 'aktifasi':
		if (!file_exists("../admin-panel/pages/pendaftaran/aktifasi.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/pendaftaran/aktifasi.php");
		break;

		//-- dashboard --//
	case 'view-pendaftaran':
		if (!file_exists("../admin-panel/pages/pendaftaran/view_pendaftaran.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/pendaftaran/view_pendaftaran.php");
		break;

		//-- dashboard --//
	case 'save-pendaftaran':
		if (!file_exists("../admin-panel/pages/pendaftaran/save_pendaftaran.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/pendaftaran/save_pendaftaran.php");
		break;

		//-- dashboard --//
	case 'del-pendaftaran':
		if (!file_exists("../admin-panel/pages/pendaftaran/del_pendaftaran.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/pendaftaran/del_pendaftaran.php");
		break;

		//-- dashboard --//
	case 'edit-pendaftaran':
		if (!file_exists("../admin-panel/pages/pendaftaran/edit_pendaftaran.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/pendaftaran/edit_pendaftaran.php");
		break;

		//-- dashboard --//
	case 'update-pendaftaran':
		if (!file_exists("../admin-panel/pages/pendaftaran/update_pendaftaran.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/pendaftaran/update_pendaftaran.php");
		break;

		//-- dashboard --//
	case 'View-List-Sekolah':
		if (!file_exists("../admin-panel/pages/sekolah/view_sekolah.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/sekolah/view_sekolah.php");
		break;

		//-- dashboard --//
	case 'View-List-Daerah':
		if (!file_exists("../admin-panel/pages/sekolah/view_daerah.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/sekolah/view_daerah.php");
		break;

		//-- dashboard --//
	case 'tambah-provinsi':
		if (!file_exists("../admin-panel/pages/sekolah/save_prov.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/sekolah/save_prov.php");
		break;
		//-- dashboard --//
	case 'tambah-kabupaten':
		if (!file_exists("../admin-panel/pages/sekolah/save_kab.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/sekolah/save_kab.php");
		break;
		//-- dashboard --//
	case 'tambah-kecamatan':
		if (!file_exists("../admin-panel/pages/sekolah/save_kec.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/sekolah/save_kec.php");
		break;

		//-- dashboard --//
	case 'tambah-sekolah':
		if (!file_exists("../admin-panel/pages/sekolah/save_sekolah.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/sekolah/save_sekolah.php");
		break;

		//-- dashboard --//
	case 'total-siswa':
		if (!file_exists("../admin-panel/pages/siswa/view_siswa.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/siswa/view_siswa.php");
		break;

		//-- dashboard --//
	case 'detail-siswa':
		if (!file_exists("../admin-panel/pages/siswa/detail_siswa.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/siswa/detail_siswa.php");
		break;

		//-- dashboard --//
	case 'verifikasi':
		if (!file_exists("../admin-panel/pages/siswa/verifikasi.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/siswa/verifikasi.php");
		break;
		//-- dashboard --//
	case 'arsipkan':
		if (!file_exists("../admin-panel/pages/siswa/arsipkan.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/siswa/arsipkan.php");
		break;

		//-- dashboard --//
	case 'arsip-siswa':
		if (!file_exists("../admin-panel/pages/siswa/arsip.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/siswa/arsip.php");
		break;

		//-- dashboard --//
	case 'siswa-diterima':
		if (!file_exists("../admin-panel/pages/siswa/diterima.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/siswa/diterima.php");
		break;

		//-- dashboard --//
	case 'siswa-ditolak':
		if (!file_exists("../admin-panel/pages/siswa/ditolak.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/siswa/ditolak.php");
		break;

		//-- dashboard --//
	case 'soal':
		if (!file_exists("../admin-panel/pages/soal/view_soal.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/soal/view_soal.php");
		break;

		//-- dashboard --//

	case 'new-soal':
		if (!file_exists("../admin-panel/pages/soal/new_soal.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/soal/new_soal.php");
		break;

		//-- dashboard --//
	case 'save-soal':
		if (!file_exists("../admin-panel/pages/soal/save_soal.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/soal/save_soal.php");
		break;

		//-- dashboard --//
	case 'edit-soal':
		if (!file_exists("../admin-panel/pages/soal/edit_soal.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/soal/edit_soal.php");
		break;

		//-- dashboard --//
	case 'update-soal':
		if (!file_exists("../admin-panel/pages/soal/update_soal.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/soal/update_soal.php");
		break;

		//-- dashboard --//
	case 'del-soal':
		if (!file_exists("../admin-panel/pages/soal/del_soal.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/soal/del_soal.php");
		break;

	case 'view-kelas':
		if (!file_exists("../admin-panel/pages/kelas/view_kelas.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/kelas/view_kelas.php");
		break;

		//-- dashboard --//

	case 'new-kelas':
		if (!file_exists("../admin-panel/pages/kelas/new_kelas.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/kelas/new_kelas.php");
		break;

		//-- dashboard --//
	case 'save-kelas':
		if (!file_exists("../admin-panel/pages/kelas/save_kelas.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/kelas/save_kelas.php");
		break;

		//-- dashboard --//
	case 'edit-kelas':
		if (!file_exists("../admin-panel/pages/kelas/edit_kelas.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/kelas/edit_kelas.php");
		break;

		//-- dashboard --//
	case 'update-kelas':
		if (!file_exists("../admin-panel/pages/kelas/update_kelas.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/kelas/update_kelas.php");
		break;

		//-- dashboard --//
	case 'del-kelas':
		if (!file_exists("../admin-panel/pages/kelas/del_kelas.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/kelas/del_kelas.php");
		break;


	case 'jurusan':
		if (!file_exists("../admin-panel/pages/jurusan/view_jurusan.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/jurusan/view_jurusan.php");
		break;

		//-- dashboard --//
	case 'save-jurusan':
		if (!file_exists("../admin-panel/pages/jurusan/save_jurusan.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/jurusan/save_jurusan.php");
		break;

		//-- dashboard --//
	case 'edit-jurusan':
		if (!file_exists("../admin-panel/pages/jurusan/edit_jurusan.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/jurusan/edit_jurusan.php");
		break;

		//-- dashboard --//
	case 'update-jurusan':
		if (!file_exists("../admin-panel/pages/jurusan/update_jurusan.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/jurusan/update_jurusan.php");
		break;

		//-- dashboard --//
	case 'delete-jurusan':
		if (!file_exists("../admin-panel/pages/jurusan/del_jurusan.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/jurusan/del_jurusan.php");
		break;

		//-- dashboard --//
	case 'view-laporan':
		if (!file_exists("../admin-panel/pages/laporan/view_laporan.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/laporan/view_laporan.php");
		break;

		//-- dashboard --//
	case 'detail-laporan':
		if (!file_exists("../admin-panel/pages/laporan/detail_laporan.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/laporan/detail_laporan.php");
		break;

		//-- dashboard --//
	case 'cetak-laporan':
		if (!file_exists("../admin-panel/pages/laporan/cetak_laporan.php")) die("File dashboard tidak tersedia.");
		include("../admin-panel/pages/laporan/cetak_laporan.php");
		break;
		/*------------------------------------------------------------------------------------------------*/
}
