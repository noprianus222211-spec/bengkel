-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for bengkel_222211
CREATE DATABASE IF NOT EXISTS `bengkel_222211` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bengkel_222211`;

-- Dumping structure for table bengkel_222211.admin_222211
CREATE TABLE IF NOT EXISTS `admin_222211` (
  `222211_idadmin` int(12) NOT NULL AUTO_INCREMENT,
  `222211_username` varchar(100) DEFAULT NULL,
  `222211_password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`222211_idadmin`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table bengkel_222211.admin_222211: ~20 rows (approximately)
/*!40000 ALTER TABLE `admin_222211` DISABLE KEYS */;
REPLACE INTO `admin_222211` (`222211_idadmin`, `222211_username`, `222211_password`) VALUES
	(1, 'admin', 'admin'),
	(3, 'Bengkel29Garage', '20202020'),
	(5, 'TestSepuluh', '20202020'),
	(6, 'menmen', '12345678'),
	(7, 'kasalle', '30303030'),
	(8, 'Garage', '29292929'),
	(9, 'profesional', '292929'),
	(10, 'BengkelKM9', '292929'),
	(11, 'BengkelKM9', '292929'),
	(12, 'Bengkel29 Garage', '129129'),
	(13, 'Bengkel dico sambo', '202020'),
	(14, 'nopkl', '222211'),
	(15, 'novri', '2222111'),
	(16, '1234568', '123456'),
	(17, 'admin', 'admin'),
	(18, 'admin', 'admin'),
	(19, '12345678', 'nopri'),
	(20, 'qwertyuiopa', '12345678900'),
	(21, 'bengkel theo', '1234567'),
	(22, 'theo1', 'theo1234');
/*!40000 ALTER TABLE `admin_222211` ENABLE KEYS */;

-- Dumping structure for table bengkel_222211.customer_222211
CREATE TABLE IF NOT EXISTS `customer_222211` (
  `222211_idcustomer` int(12) NOT NULL AUTO_INCREMENT,
  `222211_kodecustomer` varchar(100) DEFAULT NULL,
  `222211_nama` varchar(100) DEFAULT NULL,
  `222211_notlp` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`222211_idcustomer`),
  UNIQUE KEY `222211_kodecustomer` (`222211_kodecustomer`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table bengkel_222211.customer_222211: ~12 rows (approximately)
/*!40000 ALTER TABLE `customer_222211` DISABLE KEYS */;
REPLACE INTO `customer_222211` (`222211_idcustomer`, `222211_kodecustomer`, `222211_nama`, `222211_notlp`) VALUES
	(1, 'CUST001', 'nopri', '082292677514'),
	(5, 'CUST002', 'ad', '082292677514'),
	(6, 'CUST003', 'ade', '082292677514'),
	(7, 'CUST004', 'ade', '082292677514'),
	(8, 'CUST005', 'ade', '082292677514'),
	(9, 'CUST006', 'ade', '082292677514'),
	(10, 'CUST007', 'syahlan', '085399048022'),
	(11, 'CUST008', 'theo', '082292677514'),
	(12, 'CUST009', 'Nopri', '082188941616'),
	(13, 'CUST010', 'Yohanes Albert', '082188941616'),
	(14, 'CUST011', 'Yohanes Albert', '082188941616'),
	(15, 'CUST012', 'Nopri Testing', '082292677514'),
	(16, 'CUST013', 'Yohanes Albert', '082188941616');
/*!40000 ALTER TABLE `customer_222211` ENABLE KEYS */;

-- Dumping structure for table bengkel_222211.kendaraan_222211
CREATE TABLE IF NOT EXISTS `kendaraan_222211` (
  `222211_idkendaraan` int(12) NOT NULL AUTO_INCREMENT,
  `222211_kodecustomer` varchar(100) DEFAULT NULL,
  `222211_plat` varchar(100) DEFAULT NULL,
  `222211_jenis` enum('Mobil','Motor') DEFAULT NULL,
  `222211_merk` varchar(100) DEFAULT NULL,
  `222211_tgl` date DEFAULT NULL,
  `222211_kerusakan` varchar(100) DEFAULT NULL,
  `222211_kodemekanik` varchar(100) DEFAULT NULL,
  `222211_status` enum('Selesai','Proses','Dikerjakan') DEFAULT NULL,
  `222211_pembayaran` varchar(100) DEFAULT NULL,
  `222211_estimasi_pengerjaan` int(5) DEFAULT NULL,
  PRIMARY KEY (`222211_idkendaraan`),
  UNIQUE KEY `222211_kodecustomer` (`222211_kodecustomer`),
  UNIQUE KEY `222211_kodemekanik` (`222211_kodemekanik`),
  CONSTRAINT `kendaraan_222211_ibfk_1` FOREIGN KEY (`222211_kodecustomer`) REFERENCES `customer_222211` (`222211_kodecustomer`),
  CONSTRAINT `kendaraan_222211_ibfk_2` FOREIGN KEY (`222211_kodemekanik`) REFERENCES `mekanik_222211` (`222211_kodemekanik`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table bengkel_222211.kendaraan_222211: ~12 rows (approximately)
/*!40000 ALTER TABLE `kendaraan_222211` DISABLE KEYS */;
REPLACE INTO `kendaraan_222211` (`222211_idkendaraan`, `222211_kodecustomer`, `222211_plat`, `222211_jenis`, `222211_merk`, `222211_tgl`, `222211_kerusakan`, `222211_kodemekanik`, `222211_status`, `222211_pembayaran`, `222211_estimasi_pengerjaan`) VALUES
	(1, 'CUST001', 'DD 1010 DP', 'Mobil', 'toyota', '2026-02-08', 'Ganti Oli', NULL, 'Selesai', 'Berhasil', NULL),
	(5, 'CUST002', 'DD 1010 RR', '', 'Toyota', '2026-02-06', 'Ganti Oli', 'MKNK003', 'Dikerjakan', 'Berhasil', NULL),
	(6, 'CUST003', 'DD 1010 RR', '', 'Toyota', '2026-02-06', 'Ganti Oli, Tune Up, Overhaul, Kaki-Kaki', NULL, 'Selesai', 'Berhasil', NULL),
	(7, 'CUST004', 'DD 1010 RR', 'Mobil', 'Toyota', '2026-02-06', 'Ganti Oli', 'MKNK007', 'Dikerjakan', NULL, NULL),
	(8, 'CUST005', 'DD 1010 RR', 'Mobil', 'Toyota', '2026-02-06', 'Ganti Oli', NULL, 'Proses', NULL, NULL),
	(9, 'CUST006', 'DD 1010 RR', 'Mobil', 'Toyota', '2026-02-06', 'Ganti Oli', NULL, 'Proses', NULL, NULL),
	(10, 'CUST007', 'DD 1010 DP', 'Mobil', 'Toyota', '2026-02-20', 'Ganti Oli', 'MKNK006', 'Selesai', 'Berhasil', NULL),
	(11, 'CUST008', 'DD 1010 RR', 'Mobil', 'Toyota', '2026-02-20', 'Ganti Oli, Kaki-Kaki', 'MKNK004', 'Selesai', 'Berhasil', NULL),
	(12, 'CUST009', 'XXFFFFXX', 'Mobil', 'Toyota', '2026-02-20', 'Ganti Oli', NULL, 'Proses', NULL, 0),
	(13, 'CUST010', 'XXFFFFXX', 'Mobil', 'Toyota', '2026-02-20', 'Ganti Oli', NULL, 'Proses', NULL, 0),
	(14, 'CUST011', 'XXFFFFXX', 'Mobil', 'Toyota', '2026-02-20', 'Ganti Oli', NULL, 'Proses', NULL, 3),
	(15, 'CUST012', 'XXFFFFXX', 'Mobil', 'Toyota', '2026-02-20', 'Ganti Oli', NULL, 'Proses', NULL, 3),
	(16, 'CUST013', 'XXFFFFXX', 'Mobil', 'Toyota', '2026-03-15', 'Ganti Oli', NULL, 'Proses', NULL, 3);
/*!40000 ALTER TABLE `kendaraan_222211` ENABLE KEYS */;

-- Dumping structure for table bengkel_222211.mekanik_222211
CREATE TABLE IF NOT EXISTS `mekanik_222211` (
  `222211_idmekanik` int(12) NOT NULL AUTO_INCREMENT,
  `222211_kodemekanik` varchar(100) DEFAULT NULL,
  `222211_namamekanik` varchar(100) DEFAULT NULL,
  `222211_status` enum('Tersedia','Tidak Tersedia') DEFAULT NULL,
  PRIMARY KEY (`222211_idmekanik`),
  UNIQUE KEY `222211_kodemekanik` (`222211_kodemekanik`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table bengkel_222211.mekanik_222211: ~7 rows (approximately)
/*!40000 ALTER TABLE `mekanik_222211` DISABLE KEYS */;
REPLACE INTO `mekanik_222211` (`222211_idmekanik`, `222211_kodemekanik`, `222211_namamekanik`, `222211_status`) VALUES
	(4, 'MKNK003', 'Bro Rensa', 'Tidak Tersedia'),
	(5, 'MKNK004', 'Bro ebi', 'Tersedia'),
	(6, 'MKNK005', 'Boss Nopri', 'Tidak Tersedia'),
	(7, 'MKNK006', 'bro hendro', 'Tidak Tersedia'),
	(8, 'MKNK007', 'bro imbo', 'Tidak Tersedia'),
	(9, 'MKNK008', 'theo', 'Tersedia'),
	(10, 'MKNK009', 'nopri', 'Tidak Tersedia');
/*!40000 ALTER TABLE `mekanik_222211` ENABLE KEYS */;

-- Dumping structure for table bengkel_222211.spareparts_222211
CREATE TABLE IF NOT EXISTS `spareparts_222211` (
  `222211_idspareparts` int(12) NOT NULL AUTO_INCREMENT,
  `222211_kodespareparts` varchar(100) DEFAULT NULL,
  `222211_namaspareparts` varchar(100) DEFAULT NULL,
  `222211_merkspareparts` varchar(100) DEFAULT NULL,
  `222211_hargaspareparts` varchar(100) DEFAULT NULL,
  `222211_stok` varchar(100) DEFAULT NULL,
  `222211_kategori_sparepart` varchar(150) DEFAULT NULL,
  `222211_estimasi` int(5) DEFAULT NULL,
  `222211_hargajasa` int(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`222211_idspareparts`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table bengkel_222211.spareparts_222211: ~33 rows (approximately)
/*!40000 ALTER TABLE `spareparts_222211` DISABLE KEYS */;
REPLACE INTO `spareparts_222211` (`222211_idspareparts`, `222211_kodespareparts`, `222211_namaspareparts`, `222211_merkspareparts`, `222211_hargaspareparts`, `222211_stok`, `222211_kategori_sparepart`, `222211_estimasi`, `222211_hargajasa`) VALUES
	(12, 'SPR001', 'Oli - Shell Helix Ultra', 'Toyota', '550000', '5', 'Ganti Oli', 2, 0),
	(13, 'SPR002', 'Oli - Mobil 1', 'Toyota', '650000', '25', 'Ganti Oli', 1, 0),
	(14, 'SPR003', 'Oli - Pertamina Fastron', 'Toyota', '250000', '48', 'Ganti Oli', NULL, 0),
	(15, 'SPR004', 'Oli -  Motul 8100 x-cess', 'Toyota', '550000', '6', 'Ganti Oli', NULL, 0),
	(16, 'SPR005', 'Oli - Mesran', 'Toyota', '160000', '11', 'Ganti Oli', NULL, 0),
	(17, 'SPR006', 'Filter Oli', 'Toyota', '35000', '6', 'Ganti Oli', NULL, 0),
	(18, 'SPR007', 'prion', 'toyota', '200000', '20', 'Service AC dan Isi Freon', NULL, 0),
	(19, 'SPR008', 'Busi Standar Toyota', 'Denso', '30000', '10', 'Tune Up', NULL, 0),
	(20, 'SPR009', 'Busi Iridium Toyota', 'NGK Iridium', '120000', '10', 'Tune Up', NULL, 0),
	(21, 'SPR010', 'Busi Iridium Suzuki', 'NGK Iridium', '120000', '10', 'Tune Up', NULL, 0),
	(22, 'SPR011', 'Busi Standar Suzuki', 'Denso', '150000', '10', 'Tune Up', NULL, 0),
	(23, 'SPR012', 'Busi Standar Mitsubshi', 'Denso', '150000', '10', 'Tune Up', NULL, 0),
	(24, 'SPR013', 'Busi Iridium Mitsubishi', 'NGK Iridium', '150000', '7', 'Tune Up', NULL, 0),
	(25, 'SPR014', 'Koil Original Toyota', 'Toyota', '600000', '10', 'Tune Up', NULL, 0),
	(26, 'SPR015', 'Koil Original Suzuki', 'Suzuki', '600000', '10', 'Tune Up', NULL, 0),
	(27, 'SPR016', 'Koil Original Mitsubishi', 'Mitsubishi', '600000', '10', 'Tune Up', NULL, 0),
	(28, 'SPR017', 'Koil Aftermarket', 'Denso', '300000', '10', 'Tune Up', NULL, 0),
	(29, 'SPR018', 'Koil Botol Toyota', 'Toyota', '160000', '10', 'Tune Up', NULL, 0),
	(30, 'SPR019', 'Koil Botol Suzuki', 'Suzuki', '160000', '10', 'Tune Up', NULL, 0),
	(31, 'SPR020', 'Koil Botol Mitsubishi', 'Mitsubishi', '160000', '9', 'Tune Up', NULL, 0),
	(32, 'SPR021', 'Carburator Cleaner', 'Aspira', '75000', '9', 'Tune Up', NULL, 0),
	(33, 'SPR022', 'Sensor Oksigen Toyota', 'Toyota', '400000', '10', 'Tune Up', NULL, 0),
	(34, 'SPR023', 'Sensor Oksigen Suzuki', 'Suzuki', '300000', '10', 'Tune Up', NULL, 0),
	(35, 'SPR024', 'Sensor Oksigen Mitsubishi', 'Mitsubishi', '400000', '9', 'Tune Up', NULL, 0),
	(36, 'SPR025', 'Sensor TPS Toyota', 'Toyota', '300000', '10', 'Tune Up', NULL, 0),
	(37, 'SPR026', 'Sensor TPS Suzuki', 'Suzuki', '300000', '10', 'Tune Up', NULL, 0),
	(38, 'SPR027', 'Sensor TPS Mitsubishi', 'Mitsubishi', '300000', '10', 'Tune Up', NULL, 0),
	(39, 'SPR028', 'Paking set Toyota ', 'Toyota', '1500000', '10', 'Overhaul', NULL, 0),
	(40, 'SPR029', 'Paking Set Suzuki', 'Suzuki', '1500000', '10', 'Overhaul', NULL, 0),
	(41, 'SPR030', 'Paking set Mitsubishi', 'Mitsubishi', '1500000', '10', 'Overhaul', NULL, 0),
	(42, 'SPR031', 'Metal Jalan Toyota', 'Toyota', '500000', '10', 'Overhaul', NULL, 0),
	(43, 'SPR032', 'Metal Jalan Suzuki', 'Suzuki', '500000', '10', 'Overhaul', NULL, 0),
	(44, 'SPR033', 'Metal Jalan Mitsubishi', 'Mitsubishi', '500000', '10', 'Overhaul', NULL, 0),
	(45, 'SPR034', 'Metal Duduk Toyota', 'Toyota', '600000', '10', 'Overhaul', NULL, 0),
	(46, 'SPR035', 'Metal Duduk Suzuki', 'Suzuki', '600000', '10', 'Overhaul', NULL, 0),
	(47, 'SPR036', 'Metal Duduk Mitsubishi', 'Mitsubishi', '600000', '9', 'Overhaul', NULL, 0),
	(48, 'SPR037', 'Ring Piston Toyota', 'Toyota', '1000000', '10', 'Overhaul', NULL, 0),
	(49, 'SPR038', 'Ring Piston Suzuki', 'Suzuki', '1000000', '10', 'Overhaul', NULL, 0),
	(50, 'SPR039', 'Ring Piston Mitsubishi', 'Mitsubishi', '1000000', '10', 'Overhaul', NULL, 0),
	(51, 'SPR040', 'Ball joint Toyota', 'Toyota', '350000', '10', 'Kaki-Kaki', NULL, 0),
	(52, 'SPR041', 'Ball joint Suzuki', 'Suzuki', '350000', '10', 'Kaki-Kaki', NULL, 0),
	(53, 'SPR042', 'Ball joint Mitsubishi', 'Mitsubishi', '350000', '9', 'Kaki-Kaki', NULL, 0),
	(54, 'SPR043', 'Ball Joint 555', 'Japan', '350000', '8', 'Kaki-Kaki', NULL, 0),
	(58, 'SPR045', 'nopri', 'toyota', '200000', '10', 'Service AC dan Isi Freon', NULL, 0),
	(59, 'SPR046', 'Cat 1 liter', 'penta', '200000', '10', 'Body Repair', 13, 5700),
	(60, 'SPR047', 'test', 'Toyota', '600000', '16', 'Ganti Oli', 35, 7000);
/*!40000 ALTER TABLE `spareparts_222211` ENABLE KEYS */;

-- Dumping structure for table bengkel_222211.transaksi_222211
CREATE TABLE IF NOT EXISTS `transaksi_222211` (
  `222211_idtransaksi` int(12) NOT NULL AUTO_INCREMENT,
  `222211_kodetransaksi` varchar(100) DEFAULT NULL,
  `222211_kodecustomer` varchar(100) DEFAULT NULL,
  `222211_spareparts` varchar(100) DEFAULT NULL,
  `222211_hargajasa` varchar(100) DEFAULT NULL,
  `222211_total` varchar(100) DEFAULT NULL,
  `222211_jumlah` varchar(100) DEFAULT NULL,
  `222211_kembalian` varchar(100) DEFAULT NULL,
  `222211_estimasi_pengerjaan` int(5) DEFAULT NULL,
  PRIMARY KEY (`222211_idtransaksi`),
  UNIQUE KEY `222211_kodecustomer` (`222211_kodecustomer`),
  CONSTRAINT `transaksi_222211_ibfk_1` FOREIGN KEY (`222211_kodecustomer`) REFERENCES `customer_222211` (`222211_kodecustomer`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table bengkel_222211.transaksi_222211: ~12 rows (approximately)
/*!40000 ALTER TABLE `transaksi_222211` DISABLE KEYS */;
REPLACE INTO `transaksi_222211` (`222211_idtransaksi`, `222211_kodetransaksi`, `222211_kodecustomer`, `222211_spareparts`, `222211_hargajasa`, `222211_total`, `222211_jumlah`, `222211_kembalian`, `222211_estimasi_pengerjaan`) VALUES
	(1, 'TRNS001', 'CUST001', 'Filter Oli, Oli -  Motul 8100 x-cess, Oli - Mesran, Oli - Mobil 1, Oli - Pertamina Fastron, Oli - Sh', '2000000', '4145000', '5000000', '855000', NULL),
	(5, 'TRNS002', 'CUST002', '123456', '20000', '220000', '300000', '80000', NULL),
	(6, 'TRNS003', 'CUST003', 'Filter Oli, Ball Joint 555, Metal Duduk Mitsubishi, Busi Iridium Mitsubishi', '20000', '1155000', '2000000', '845000', NULL),
	(7, 'TRNS004', 'CUST004', 'Filter Oli', '20000', '55000', NULL, NULL, NULL),
	(8, 'TRNS005', 'CUST005', '123456', '20000', '220000', NULL, NULL, NULL),
	(9, 'TRNS006', 'CUST006', 'Filter Oli', '20000', '55000', NULL, NULL, NULL),
	(10, 'TRNS007', 'CUST007', 'Filter Oli, Oli -  Motul 8100 x-cess, Oli - Mesran, Oli - Mobil 1, Oli - Pertamina Fastron, Oli - Sh', '200000', '2345000', '3000000', '655000', NULL),
	(11, 'TRNS008', 'CUST008', 'Filter Oli, Oli -  Motul 8100 x-cess, Ball Joint 555, Ball joint Mitsubishi', '200000', '1485000', '2000000', '515000', NULL),
	(12, 'TRNS009', 'CUST009', 'Oli - Mobil 1, Oli - Shell Helix Ultra', '70000', '1270000', NULL, NULL, 0),
	(13, 'TRNS010', 'CUST010', 'Oli - Mobil 1, Oli - Shell Helix Ultra', '70000', '1270000', NULL, NULL, 0),
	(14, 'TRNS011', 'CUST011', 'Oli - Mobil 1, Oli - Shell Helix Ultra', '70000', '1270000', NULL, NULL, 3),
	(15, 'TRNS012', 'CUST012', 'Oli - Mobil 1, Oli - Shell Helix Ultra', '67000', '1267000', NULL, NULL, 3),
	(16, 'TRNS013', 'CUST013', 'Filter Oli, Oli -  Motul 8100 x-cess, Oli - Mobil 1, Oli - Shell Helix Ultra', '1765000', '3550000', NULL, NULL, 3);
/*!40000 ALTER TABLE `transaksi_222211` ENABLE KEYS */;

-- Dumping structure for view bengkel_222211.viewcust
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `viewcust` (
	`222211_nama` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci',
	`222211_notlp` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci',
	`222211_plat` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci',
	`222211_jenis` ENUM('Mobil','Motor') NULL COLLATE 'utf8mb4_general_ci',
	`222211_merk` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci',
	`222211_tgl` DATE NULL,
	`222211_kerusakan` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci',
	`222211_kodecustomer` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci',
	`222211_pembayaran` VARCHAR(100) NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view bengkel_222211.viewcust
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `viewcust`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewcust` AS SELECT `customer_222211`.`222211_nama` AS `222211_nama`, `customer_222211`.`222211_notlp` AS `222211_notlp`, `kendaraan_222211`.`222211_plat` AS `222211_plat`, `kendaraan_222211`.`222211_jenis` AS `222211_jenis`, `kendaraan_222211`.`222211_merk` AS `222211_merk`, `kendaraan_222211`.`222211_tgl` AS `222211_tgl`, `kendaraan_222211`.`222211_kerusakan` AS `222211_kerusakan`, `customer_222211`.`222211_kodecustomer` AS `222211_kodecustomer`, `kendaraan_222211`.`222211_pembayaran` AS `222211_pembayaran` FROM (`customer_222211` join `kendaraan_222211` on(`customer_222211`.`222211_kodecustomer` = `kendaraan_222211`.`222211_kodecustomer`)) ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
