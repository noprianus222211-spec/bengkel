-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Feb 2026 pada 13.09
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkel_222211`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_222211`
--

CREATE TABLE `admin_222211` (
  `222211_idadmin` int(12) NOT NULL,
  `222211_username` varchar(100) DEFAULT NULL,
  `222211_password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin_222211`
--

INSERT INTO `admin_222211` (`222211_idadmin`, `222211_username`, `222211_password`) VALUES
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer_222211`
--

CREATE TABLE `customer_222211` (
  `222211_idcustomer` int(12) NOT NULL,
  `222211_kodecustomer` varchar(100) DEFAULT NULL,
  `222211_nama` varchar(100) DEFAULT NULL,
  `222211_notlp` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customer_222211`
--

INSERT INTO `customer_222211` (`222211_idcustomer`, `222211_kodecustomer`, `222211_nama`, `222211_notlp`) VALUES
(1, 'CUST001', 'nopri', '082292677514'),
(5, 'CUST002', 'ad', '082292677514'),
(6, 'CUST003', 'ade', '082292677514'),
(7, 'CUST004', 'ade', '082292677514'),
(8, 'CUST005', 'ade', '082292677514'),
(9, 'CUST006', 'ade', '082292677514'),
(10, 'CUST007', 'syahlan', '085399048022'),
(11, 'CUST008', 'theo', '082292677514');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan_222211`
--

CREATE TABLE `kendaraan_222211` (
  `222211_idkendaraan` int(12) NOT NULL,
  `222211_kodecustomer` varchar(100) DEFAULT NULL,
  `222211_plat` varchar(100) DEFAULT NULL,
  `222211_jenis` enum('Mobil','Motor') DEFAULT NULL,
  `222211_merk` varchar(100) DEFAULT NULL,
  `222211_tgl` date DEFAULT NULL,
  `222211_kerusakan` varchar(100) DEFAULT NULL,
  `222211_kodemekanik` varchar(100) DEFAULT NULL,
  `222211_status` enum('Selesai','Proses','Dikerjakan') DEFAULT NULL,
  `222211_pembayaran` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kendaraan_222211`
--

INSERT INTO `kendaraan_222211` (`222211_idkendaraan`, `222211_kodecustomer`, `222211_plat`, `222211_jenis`, `222211_merk`, `222211_tgl`, `222211_kerusakan`, `222211_kodemekanik`, `222211_status`, `222211_pembayaran`) VALUES
(1, 'CUST001', 'DD 1010 DP', 'Mobil', 'toyota', '2026-02-08', 'Ganti Oli', NULL, 'Selesai', 'Berhasil'),
(5, 'CUST002', 'DD 1010 RR', '', 'Toyota', '2026-02-06', 'Ganti Oli', 'MKNK003', 'Dikerjakan', 'Berhasil'),
(6, 'CUST003', 'DD 1010 RR', '', 'Toyota', '2026-02-06', 'Ganti Oli, Tune Up, Overhaul, Kaki-Kaki', NULL, 'Selesai', 'Berhasil'),
(7, 'CUST004', 'DD 1010 RR', 'Mobil', 'Toyota', '2026-02-06', 'Ganti Oli', 'MKNK007', 'Dikerjakan', NULL),
(8, 'CUST005', 'DD 1010 RR', 'Mobil', 'Toyota', '2026-02-06', 'Ganti Oli', NULL, 'Proses', NULL),
(9, 'CUST006', 'DD 1010 RR', 'Mobil', 'Toyota', '2026-02-06', 'Ganti Oli', NULL, 'Proses', NULL),
(10, 'CUST007', 'DD 1010 DP', 'Mobil', 'Toyota', '2026-02-20', 'Ganti Oli', 'MKNK006', 'Selesai', 'Berhasil'),
(11, 'CUST008', 'DD 1010 RR', 'Mobil', 'Toyota', '2026-02-20', 'Ganti Oli, Kaki-Kaki', 'MKNK004', 'Selesai', 'Berhasil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mekanik_222211`
--

CREATE TABLE `mekanik_222211` (
  `222211_idmekanik` int(12) NOT NULL,
  `222211_kodemekanik` varchar(100) DEFAULT NULL,
  `222211_namamekanik` varchar(100) DEFAULT NULL,
  `222211_status` enum('Tersedia','Tidak Tersedia') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mekanik_222211`
--

INSERT INTO `mekanik_222211` (`222211_idmekanik`, `222211_kodemekanik`, `222211_namamekanik`, `222211_status`) VALUES
(4, 'MKNK003', 'Bro Rensa', 'Tidak Tersedia'),
(5, 'MKNK004', 'Bro ebi', 'Tersedia'),
(6, 'MKNK005', 'Boss Nopri', 'Tidak Tersedia'),
(7, 'MKNK006', 'bro hendro', 'Tidak Tersedia'),
(8, 'MKNK007', 'bro imbo', 'Tidak Tersedia'),
(9, 'MKNK008', 'theo', 'Tersedia'),
(10, 'MKNK009', 'nopri', 'Tidak Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spareparts_222211`
--

CREATE TABLE `spareparts_222211` (
  `222211_idspareparts` int(12) NOT NULL,
  `222211_kodespareparts` varchar(100) DEFAULT NULL,
  `222211_namaspareparts` varchar(100) DEFAULT NULL,
  `222211_merkspareparts` varchar(100) DEFAULT NULL,
  `222211_hargaspareparts` varchar(100) DEFAULT NULL,
  `222211_stok` varchar(100) DEFAULT NULL,
  `222211_kategori_sparepart` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `spareparts_222211`
--

INSERT INTO `spareparts_222211` (`222211_idspareparts`, `222211_kodespareparts`, `222211_namaspareparts`, `222211_merkspareparts`, `222211_hargaspareparts`, `222211_stok`, `222211_kategori_sparepart`) VALUES
(12, 'SPR001', 'Oli - Shell Helix Ultra', 'Toyota', '550000', '10', 'Ganti Oli'),
(13, 'SPR002', 'Oli - Mobil 1', 'Toyota', '650000', '30', 'Ganti Oli'),
(14, 'SPR003', 'Oli - Pertamina Fastron', 'Toyota', '250000', '48', 'Ganti Oli'),
(15, 'SPR004', 'Oli -  Motul 8100 x-cess', 'Toyota', '550000', '7', 'Ganti Oli'),
(16, 'SPR005', 'Oli - Mesran', 'Toyota', '160000', '11', 'Ganti Oli'),
(17, 'SPR006', 'Filter Oli', 'Toyota', '35000', '7', 'Ganti Oli'),
(18, 'SPR007', 'prion', 'toyota', '200000', '20', 'Service AC dan Isi Freon'),
(19, 'SPR008', 'Busi Standar Toyota', 'Denso', '30000', '10', 'Tune Up'),
(20, 'SPR009', 'Busi Iridium Toyota', 'NGK Iridium', '120000', '10', 'Tune Up'),
(21, 'SPR010', 'Busi Iridium Suzuki', 'NGK Iridium', '120000', '10', 'Tune Up'),
(22, 'SPR011', 'Busi Standar Suzuki', 'Denso', '150000', '10', 'Tune Up'),
(23, 'SPR012', 'Busi Standar Mitsubshi', 'Denso', '150000', '10', 'Tune Up'),
(24, 'SPR013', 'Busi Iridium Mitsubishi', 'NGK Iridium', '150000', '7', 'Tune Up'),
(25, 'SPR014', 'Koil Original Toyota', 'Toyota', '600000', '10', 'Tune Up'),
(26, 'SPR015', 'Koil Original Suzuki', 'Suzuki', '600000', '10', 'Tune Up'),
(27, 'SPR016', 'Koil Original Mitsubishi', 'Mitsubishi', '600000', '10', 'Tune Up'),
(28, 'SPR017', 'Koil Aftermarket', 'Denso', '300000', '10', 'Tune Up'),
(29, 'SPR018', 'Koil Botol Toyota', 'Toyota', '160000', '10', 'Tune Up'),
(30, 'SPR019', 'Koil Botol Suzuki', 'Suzuki', '160000', '10', 'Tune Up'),
(31, 'SPR020', 'Koil Botol Mitsubishi', 'Mitsubishi', '160000', '9', 'Tune Up'),
(32, 'SPR021', 'Carburator Cleaner', 'Aspira', '75000', '9', 'Tune Up'),
(33, 'SPR022', 'Sensor Oksigen Toyota', 'Toyota', '400000', '10', 'Tune Up'),
(34, 'SPR023', 'Sensor Oksigen Suzuki', 'Suzuki', '300000', '10', 'Tune Up'),
(35, 'SPR024', 'Sensor Oksigen Mitsubishi', 'Mitsubishi', '400000', '9', 'Tune Up'),
(36, 'SPR025', 'Sensor TPS Toyota', 'Toyota', '300000', '10', 'Tune Up'),
(37, 'SPR026', 'Sensor TPS Suzuki', 'Suzuki', '300000', '10', 'Tune Up'),
(38, 'SPR027', 'Sensor TPS Mitsubishi', 'Mitsubishi', '300000', '10', 'Tune Up'),
(39, 'SPR028', 'Paking set Toyota ', 'Toyota', '1500000', '10', 'Overhaul'),
(40, 'SPR029', 'Paking Set Suzuki', 'Suzuki', '1500000', '10', 'Overhaul'),
(41, 'SPR030', 'Paking set Mitsubishi', 'Mitsubishi', '1500000', '10', 'Overhaul'),
(42, 'SPR031', 'Metal Jalan Toyota', 'Toyota', '500000', '10', 'Overhaul'),
(43, 'SPR032', 'Metal Jalan Suzuki', 'Suzuki', '500000', '10', 'Overhaul'),
(44, 'SPR033', 'Metal Jalan Mitsubishi', 'Mitsubishi', '500000', '10', 'Overhaul'),
(45, 'SPR034', 'Metal Duduk Toyota', 'Toyota', '600000', '10', 'Overhaul'),
(46, 'SPR035', 'Metal Duduk Suzuki', 'Suzuki', '600000', '10', 'Overhaul'),
(47, 'SPR036', 'Metal Duduk Mitsubishi', 'Mitsubishi', '600000', '9', 'Overhaul'),
(48, 'SPR037', 'Ring Piston Toyota', 'Toyota', '1000000', '10', 'Overhaul'),
(49, 'SPR038', 'Ring Piston Suzuki', 'Suzuki', '1000000', '10', 'Overhaul'),
(50, 'SPR039', 'Ring Piston Mitsubishi', 'Mitsubishi', '1000000', '10', 'Overhaul'),
(51, 'SPR040', 'Ball joint Toyota', 'Toyota', '350000', '10', 'Kaki-Kaki'),
(52, 'SPR041', 'Ball joint Suzuki', 'Suzuki', '350000', '10', 'Kaki-Kaki'),
(53, 'SPR042', 'Ball joint Mitsubishi', 'Mitsubishi', '350000', '9', 'Kaki-Kaki'),
(54, 'SPR043', 'Ball Joint 555', 'Japan', '350000', '8', 'Kaki-Kaki'),
(58, 'SPR045', 'nopri', 'toyota', '200000', '10', 'Service AC dan Isi Freon'),
(59, 'SPR046', 'Cat 1 liter', 'penta', '200000', '10', 'Body Repair');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_222211`
--

CREATE TABLE `transaksi_222211` (
  `222211_idtransaksi` int(12) NOT NULL,
  `222211_kodetransaksi` varchar(100) DEFAULT NULL,
  `222211_kodecustomer` varchar(100) DEFAULT NULL,
  `222211_spareparts` varchar(100) DEFAULT NULL,
  `222211_hargajasa` varchar(100) DEFAULT NULL,
  `222211_total` varchar(100) DEFAULT NULL,
  `222211_jumlah` varchar(100) DEFAULT NULL,
  `222211_kembalian` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi_222211`
--

INSERT INTO `transaksi_222211` (`222211_idtransaksi`, `222211_kodetransaksi`, `222211_kodecustomer`, `222211_spareparts`, `222211_hargajasa`, `222211_total`, `222211_jumlah`, `222211_kembalian`) VALUES
(1, 'TRNS001', 'CUST001', 'Filter Oli, Oli -  Motul 8100 x-cess, Oli - Mesran, Oli - Mobil 1, Oli - Pertamina Fastron, Oli - Sh', '2000000', '4145000', '5000000', '855000'),
(5, 'TRNS002', 'CUST002', '123456', '20000', '220000', '300000', '80000'),
(6, 'TRNS003', 'CUST003', 'Filter Oli, Ball Joint 555, Metal Duduk Mitsubishi, Busi Iridium Mitsubishi', '20000', '1155000', '2000000', '845000'),
(7, 'TRNS004', 'CUST004', 'Filter Oli', '20000', '55000', NULL, NULL),
(8, 'TRNS005', 'CUST005', '123456', '20000', '220000', NULL, NULL),
(9, 'TRNS006', 'CUST006', 'Filter Oli', '20000', '55000', NULL, NULL),
(10, 'TRNS007', 'CUST007', 'Filter Oli, Oli -  Motul 8100 x-cess, Oli - Mesran, Oli - Mobil 1, Oli - Pertamina Fastron, Oli - Sh', '200000', '2345000', '3000000', '655000'),
(11, 'TRNS008', 'CUST008', 'Filter Oli, Oli -  Motul 8100 x-cess, Ball Joint 555, Ball joint Mitsubishi', '200000', '1485000', '2000000', '515000');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `viewcust`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `viewcust` (
`222211_nama` varchar(100)
,`222211_notlp` varchar(100)
,`222211_plat` varchar(100)
,`222211_jenis` enum('Mobil','Motor')
,`222211_merk` varchar(100)
,`222211_tgl` date
,`222211_kerusakan` varchar(100)
,`222211_kodecustomer` varchar(100)
,`222211_pembayaran` varchar(100)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `viewcust`
--
DROP TABLE IF EXISTS `viewcust`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewcust`  AS SELECT `customer_222211`.`222211_nama` AS `222211_nama`, `customer_222211`.`222211_notlp` AS `222211_notlp`, `kendaraan_222211`.`222211_plat` AS `222211_plat`, `kendaraan_222211`.`222211_jenis` AS `222211_jenis`, `kendaraan_222211`.`222211_merk` AS `222211_merk`, `kendaraan_222211`.`222211_tgl` AS `222211_tgl`, `kendaraan_222211`.`222211_kerusakan` AS `222211_kerusakan`, `customer_222211`.`222211_kodecustomer` AS `222211_kodecustomer`, `kendaraan_222211`.`222211_pembayaran` AS `222211_pembayaran` FROM (`customer_222211` join `kendaraan_222211` on(`customer_222211`.`222211_kodecustomer` = `kendaraan_222211`.`222211_kodecustomer`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_222211`
--
ALTER TABLE `admin_222211`
  ADD PRIMARY KEY (`222211_idadmin`);

--
-- Indeks untuk tabel `customer_222211`
--
ALTER TABLE `customer_222211`
  ADD PRIMARY KEY (`222211_idcustomer`),
  ADD UNIQUE KEY `222211_kodecustomer` (`222211_kodecustomer`);

--
-- Indeks untuk tabel `kendaraan_222211`
--
ALTER TABLE `kendaraan_222211`
  ADD PRIMARY KEY (`222211_idkendaraan`),
  ADD UNIQUE KEY `222211_kodecustomer` (`222211_kodecustomer`),
  ADD UNIQUE KEY `222211_kodemekanik` (`222211_kodemekanik`);

--
-- Indeks untuk tabel `mekanik_222211`
--
ALTER TABLE `mekanik_222211`
  ADD PRIMARY KEY (`222211_idmekanik`),
  ADD UNIQUE KEY `222211_kodemekanik` (`222211_kodemekanik`);

--
-- Indeks untuk tabel `spareparts_222211`
--
ALTER TABLE `spareparts_222211`
  ADD PRIMARY KEY (`222211_idspareparts`);

--
-- Indeks untuk tabel `transaksi_222211`
--
ALTER TABLE `transaksi_222211`
  ADD PRIMARY KEY (`222211_idtransaksi`),
  ADD UNIQUE KEY `222211_kodecustomer` (`222211_kodecustomer`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin_222211`
--
ALTER TABLE `admin_222211`
  MODIFY `222211_idadmin` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `customer_222211`
--
ALTER TABLE `customer_222211`
  MODIFY `222211_idcustomer` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kendaraan_222211`
--
ALTER TABLE `kendaraan_222211`
  MODIFY `222211_idkendaraan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `mekanik_222211`
--
ALTER TABLE `mekanik_222211`
  MODIFY `222211_idmekanik` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `spareparts_222211`
--
ALTER TABLE `spareparts_222211`
  MODIFY `222211_idspareparts` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `transaksi_222211`
--
ALTER TABLE `transaksi_222211`
  MODIFY `222211_idtransaksi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kendaraan_222211`
--
ALTER TABLE `kendaraan_222211`
  ADD CONSTRAINT `kendaraan_222211_ibfk_1` FOREIGN KEY (`222211_kodecustomer`) REFERENCES `customer_222211` (`222211_kodecustomer`),
  ADD CONSTRAINT `kendaraan_222211_ibfk_2` FOREIGN KEY (`222211_kodemekanik`) REFERENCES `mekanik_222211` (`222211_kodemekanik`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `transaksi_222211`
--
ALTER TABLE `transaksi_222211`
  ADD CONSTRAINT `transaksi_222211_ibfk_1` FOREIGN KEY (`222211_kodecustomer`) REFERENCES `customer_222211` (`222211_kodecustomer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
