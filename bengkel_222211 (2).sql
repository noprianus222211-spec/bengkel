-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jan 2026 pada 15.28
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
(15, 'nov', '222211');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer_222211`
--

CREATE TABLE `customer_222211` (
  `222211_idcustomer` int(12) NOT NULL,
  `222211_kodecustomer` varchar(100) DEFAULT NULL,
  `222211_nama` varchar(100) DEFAULT NULL,
  `222211_notlp` varchar(100) DEFAULT NULL,
  `222211_id_transaksi` int(5) DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customer_222211`
--

INSERT INTO `customer_222211` (`222211_idcustomer`, `222211_kodecustomer`, `222211_nama`, `222211_notlp`) VALUES
(13, 'CUST002', 'nopri', '082292677514'),
(14, 'CUST003', 'Bapak Nopri', '08222222222'),
(15, 'CUST004', 'yuyun', '082292677514'),
(16, 'CUST005', 'Rensa', '09090909'),
(17, 'CUST006', 'Surya', '08229263'),
(19, 'CUST007', 'nov', '082292677514');

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
(14, 'CUST002', 'DD 1212 AA', 'Mobil', 'Toyota', '2025-01-05', '', 'MKNK002', 'Selesai', 'Belum Bayar'),
(15, 'CUST003', 'DD 1212 AB', 'Mobil', 'Toyota', '2025-01-06', 'servis filter oli', NULL, 'Proses', 'Berhasil'),
(16, 'CUST004', 'DD 2020 PM', 'Mobil', 'Toyota', '2025-01-08', '', NULL, 'Proses', NULL),
(17, 'CUST005', 'DD 2020 SS', 'Mobil', 'Toyota', '2025-01-08', '', NULL, 'Proses', NULL),
(18, 'CUST006', 'DD 2020 PM', 'Mobil', 'Toyota', '2025-01-17', 'penyok', NULL, 'Proses', NULL),
(20, 'CUST007', 'DD 1010 RR', 'Mobil', 'toyota', '2025-12-05', 'repaint bamper', NULL, 'Proses', NULL);

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
(1, 'MKNK001', 'Rayhan', 'Tersedia'),
(3, 'MKNK002', 'Bro Yuyun', 'Tidak Tersedia'),
(4, 'MKNK003', 'Bro Rensa', 'Tersedia'),
(5, 'MKNK004', 'Bro ebi', 'Tersedia'),
(6, 'MKNK005', 'Boss Nopri', 'Tersedia'),
(7, 'MKNK006', 'bro hendro', 'Tersedia'),
(8, 'MKNK007', 'bro imbo', 'Tersedia');

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
  `222211_stok` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `spareparts_222211`
--

INSERT INTO `spareparts_222211` (`222211_idspareparts`, `222211_kodespareparts`, `222211_namaspareparts`, `222211_merkspareparts`, `222211_hargaspareparts`, `222211_stok`) VALUES
(3, 'SPR002', 'Shockbreaker', 'Honda', '300000', '2'),
(4, 'SPR003', 'filter udara', 'Toyota', '100000', '20'),
(5, 'SPR004', 'filter oli', 'Toyota', '100000', '20'),
(6, 'SPR005', 'filter oli', 'Toyota', '1000000', '20'),
(7, 'SPR006', 'Oli Mobil', 'Motul', '500000', '20'),
(8, 'SPR007', 'Oli', 'Mesran', '200000', '20'),
(9, 'SPR008', 'Lampu Depan', 'D-Mac', '700000', '20'),
(10, 'SPR009', 'Lampu Belakang', 'D-Mac', '500000', '20');

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
(12, 'TRNS002', 'CUST002', 'Oli Mobil', '200000', '275000', '500000', '225000'),
(13, 'TRNS003', 'CUST003', 'Oli Mobil', '10000', '85000', '200000', '115000');

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
  MODIFY `222211_idadmin` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `customer_222211`
--
ALTER TABLE `customer_222211`
  MODIFY `222211_idcustomer` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `kendaraan_222211`
--
ALTER TABLE `kendaraan_222211`
  MODIFY `222211_idkendaraan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `mekanik_222211`
--
ALTER TABLE `mekanik_222211`
  MODIFY `222211_idmekanik` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `spareparts_222211`
--
ALTER TABLE `spareparts_222211`
  MODIFY `222211_idspareparts` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `transaksi_222211`
--
ALTER TABLE `transaksi_222211`
  MODIFY `222211_idtransaksi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kendaraan_222211`
--
ALTER TABLE `kendaraan_222211`
  ADD CONSTRAINT `kendaraan_222211_ibfk_1` FOREIGN KEY (`222211_kodecustomer`) REFERENCES `customer_222211` (`222211_kodecustomer`),
  ADD CONSTRAINT `kendaraan_222211_ibfk_2` FOREIGN KEY (`222211_kodemekanik`) REFERENCES `mekanik_222211` (`222211_kodemekanik`);

--
-- Ketidakleluasaan untuk tabel `transaksi_222211`
--
ALTER TABLE `transaksi_222211`
  ADD CONSTRAINT `transaksi_222211_ibfk_1` FOREIGN KEY (`222211_kodecustomer`) REFERENCES `customer_222211` (`222211_kodecustomer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
