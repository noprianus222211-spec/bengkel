-- Adminer 5.4.1 MySQL 5.7.24 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admin_222211`;
CREATE TABLE `admin_222211` (
  `222211_idadmin` int(12) NOT NULL AUTO_INCREMENT,
  `222211_username` varchar(100) DEFAULT NULL,
  `222211_password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`222211_idadmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `admin_222211` (`222211_idadmin`, `222211_username`, `222211_password`) VALUES
(1,	'admin',	'admin'),
(3,	'Bengkel29Garage',	'20202020'),
(5,	'TestSepuluh',	'20202020'),
(6,	'menmen',	'12345678'),
(7,	'kasalle',	'30303030'),
(8,	'Garage',	'29292929'),
(9,	'profesional',	'292929'),
(10,	'BengkelKM9',	'292929'),
(11,	'BengkelKM9',	'292929'),
(12,	'Bengkel29 Garage',	'129129'),
(13,	'Bengkel dico sambo',	'202020'),
(14,	'nopkl',	'222211'),
(15,	'nov',	'222211');

DROP TABLE IF EXISTS `customer_222211`;
CREATE TABLE `customer_222211` (
  `222211_idcustomer` int(12) NOT NULL AUTO_INCREMENT,
  `222211_kodecustomer` varchar(100) DEFAULT NULL,
  `222211_nama` varchar(100) DEFAULT NULL,
  `222211_notlp` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`222211_idcustomer`),
  UNIQUE KEY `222211_kodecustomer` (`222211_kodecustomer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `kendaraan_222211`;
CREATE TABLE `kendaraan_222211` (
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
  PRIMARY KEY (`222211_idkendaraan`),
  UNIQUE KEY `222211_kodecustomer` (`222211_kodecustomer`),
  UNIQUE KEY `222211_kodemekanik` (`222211_kodemekanik`),
  CONSTRAINT `kendaraan_222211_ibfk_1` FOREIGN KEY (`222211_kodecustomer`) REFERENCES `customer_222211` (`222211_kodecustomer`),
  CONSTRAINT `kendaraan_222211_ibfk_2` FOREIGN KEY (`222211_kodemekanik`) REFERENCES `mekanik_222211` (`222211_kodemekanik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `mekanik_222211`;
CREATE TABLE `mekanik_222211` (
  `222211_idmekanik` int(12) NOT NULL AUTO_INCREMENT,
  `222211_kodemekanik` varchar(100) DEFAULT NULL,
  `222211_namamekanik` varchar(100) DEFAULT NULL,
  `222211_status` enum('Tersedia','Tidak Tersedia') DEFAULT NULL,
  PRIMARY KEY (`222211_idmekanik`),
  UNIQUE KEY `222211_kodemekanik` (`222211_kodemekanik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `mekanik_222211` (`222211_idmekanik`, `222211_kodemekanik`, `222211_namamekanik`, `222211_status`) VALUES
(1,	'MKNK001',	'Rayhan',	'Tersedia'),
(3,	'MKNK002',	'Bro Yuyun',	'Tidak Tersedia'),
(4,	'MKNK003',	'Bro Rensa',	'Tersedia'),
(5,	'MKNK004',	'Bro ebi',	'Tersedia'),
(6,	'MKNK005',	'Boss Nopri',	'Tidak Tersedia'),
(7,	'MKNK006',	'bro hendro',	'Tersedia'),
(8,	'MKNK007',	'bro imbo',	'Tersedia');

DROP TABLE IF EXISTS `spareparts_222211`;
CREATE TABLE `spareparts_222211` (
  `222211_idspareparts` int(12) NOT NULL AUTO_INCREMENT,
  `222211_kodespareparts` varchar(100) DEFAULT NULL,
  `222211_namaspareparts` varchar(100) DEFAULT NULL,
  `222211_merkspareparts` varchar(100) DEFAULT NULL,
  `222211_hargaspareparts` varchar(100) DEFAULT NULL,
  `222211_stok` varchar(100) DEFAULT NULL,
  `222211_kategori_sparepart` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`222211_idspareparts`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `spareparts_222211` (`222211_idspareparts`, `222211_kodespareparts`, `222211_namaspareparts`, `222211_merkspareparts`, `222211_hargaspareparts`, `222211_stok`, `222211_kategori_sparepart`) VALUES
(12,	'SPR001',	'Oli - Shell Helix Ultra',	'Toyota',	'550000',	'12',	'Ganti Oli'),
(13,	'SPR002',	'Oli - Mobil 1',	'Toyota',	'600000',	'25',	'Ganti Oli'),
(14,	'SPR003',	'Oli - Pertamina Fastron',	'Toyota',	'250000',	'50',	'Ganti Oli'),
(15,	'SPR004',	'Oli -  Motul 8100 x-cess',	'Toyota',	'550000',	'12',	'Ganti Oli'),
(16,	'SPR005',	'Oli - Mesran',	'Toyota',	'160000',	'13',	'Ganti Oli'),
(17,	'SPR006',	'Filter Oli',	'Toyota',	'35000',	'15',	'Ganti Oli');

DROP TABLE IF EXISTS `transaksi_222211`;
CREATE TABLE `transaksi_222211` (
  `222211_idtransaksi` int(12) NOT NULL AUTO_INCREMENT,
  `222211_kodetransaksi` varchar(100) DEFAULT NULL,
  `222211_kodecustomer` varchar(100) DEFAULT NULL,
  `222211_spareparts` varchar(100) DEFAULT NULL,
  `222211_hargajasa` varchar(100) DEFAULT NULL,
  `222211_total` varchar(100) DEFAULT NULL,
  `222211_jumlah` varchar(100) DEFAULT NULL,
  `222211_kembalian` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`222211_idtransaksi`),
  UNIQUE KEY `222211_kodecustomer` (`222211_kodecustomer`),
  CONSTRAINT `transaksi_222211_ibfk_1` FOREIGN KEY (`222211_kodecustomer`) REFERENCES `customer_222211` (`222211_kodecustomer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP VIEW IF EXISTS `viewcust`;
CREATE TABLE `viewcust` (`222211_nama` varchar(100), `222211_notlp` varchar(100), `222211_plat` varchar(100), `222211_jenis` enum('Mobil','Motor'), `222211_merk` varchar(100), `222211_tgl` date, `222211_kerusakan` varchar(100), `222211_kodecustomer` varchar(100), `222211_pembayaran` varchar(100));


DROP TABLE IF EXISTS `viewcust`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `viewcust` AS select `customer_222211`.`222211_nama` AS `222211_nama`,`customer_222211`.`222211_notlp` AS `222211_notlp`,`kendaraan_222211`.`222211_plat` AS `222211_plat`,`kendaraan_222211`.`222211_jenis` AS `222211_jenis`,`kendaraan_222211`.`222211_merk` AS `222211_merk`,`kendaraan_222211`.`222211_tgl` AS `222211_tgl`,`kendaraan_222211`.`222211_kerusakan` AS `222211_kerusakan`,`customer_222211`.`222211_kodecustomer` AS `222211_kodecustomer`,`kendaraan_222211`.`222211_pembayaran` AS `222211_pembayaran` from (`customer_222211` join `kendaraan_222211` on((`customer_222211`.`222211_kodecustomer` = `kendaraan_222211`.`222211_kodecustomer`)));

-- 2026-02-07 16:06:08 UTC
