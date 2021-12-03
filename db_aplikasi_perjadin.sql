-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping data for table db_aplikasi_perjadin.pegawai: ~0 rows (approximately)
DELETE FROM `pegawai`;
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `NIP`, `id_unit_kerja`, `jabatan`) VALUES
	(00000000001, 'M. ZUHRI WIJIANTO', 'aeu8ewfgp8WE HFP', 1, 'MENTERI ASET NEGARA');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;

-- Dumping data for table db_aplikasi_perjadin.pengajuan: ~0 rows (approximately)
DELETE FROM `pengajuan`;
/*!40000 ALTER TABLE `pengajuan` DISABLE KEYS */;
INSERT INTO `pengajuan` (`id_pengajuan`, `id_pegawai`, `tgl_pengajuan`, `tgl_berangkat`, `tgl_pulang`, `judul_perjadin`, `kota_tujuan`, `status_disetujui`) VALUES
	(1, 1, '2020-12-15 16:43:41', '2020-12-16', '2020-12-16', 'Mengantarkan Surat DInas', 'SURABAYA', 'Y');
/*!40000 ALTER TABLE `pengajuan` ENABLE KEYS */;

-- Dumping data for table db_aplikasi_perjadin.unit_kerja: ~0 rows (approximately)
DELETE FROM `unit_kerja`;
/*!40000 ALTER TABLE `unit_kerja` DISABLE KEYS */;
/*!40000 ALTER TABLE `unit_kerja` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
