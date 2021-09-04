-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2021 at 01:22 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `earsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_arsip`
--

CREATE TABLE `tabel_arsip` (
  `id_arsip` int(11) NOT NULL,
  `id_klasifikasi` int(11) DEFAULT NULL,
  `tgl_arsip` date DEFAULT NULL,
  `no_arsip` varchar(30) DEFAULT NULL,
  `nama_pengirim` varchar(255) DEFAULT NULL,
  `perihal` text,
  `tgl_upload` date DEFAULT NULL,
  `tgl_update` date DEFAULT NULL,
  `file_arsip` varchar(255) DEFAULT NULL,
  `filesize` float DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_arsip`
--

INSERT INTO `tabel_arsip` (`id_arsip`, `id_klasifikasi`, `tgl_arsip`, `no_arsip`, `nama_pengirim`, `perihal`, `tgl_upload`, `tgl_update`, `file_arsip`, `filesize`, `id_unit`, `id_user`) VALUES
(1, 2, '2021-09-01', 'ME.09.09/001/KKNI/VII/2021', 'Pusat Meteorologi Publik', 'Undangan Focus Group Discussion (FGD) Cuaca Jalur Penyeberangan', '2021-09-01', '2021-09-04', 'me99.pdf', 1, 4, 1),
(2, 3, '2021-09-01', 'ME.08.08/002/KKNI/IX/2021', 'Pusat Maritim', 'Undangan Focus Group Discussion (FGD) Cuaca Jalur Penyeberangan', '2021-09-01', '2021-09-01', 'me28.pdf', 1, 2, 1),
(11, 3, '2021-09-28', 'KKNI/XIX/2020', 'Didit', 'qwe', '2021-09-04', '2021-09-04', '1630739757_7ae2490a64dfcb947c09.pdf', 1, 4, 1),
(14, 4, '2021-07-23', 'KKNI/VII/2021', 'Didit', 'asd', '2021-09-04', '2021-09-04', '1630745774_f8237fe4a062b894e5fc.pdf', 0.001, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_klasifikasi`
--

CREATE TABLE `tabel_klasifikasi` (
  `id_klasifikasi` int(20) UNSIGNED NOT NULL,
  `kode_klasifikasi` varchar(11) NOT NULL,
  `nama_klasifikasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_klasifikasi`
--

INSERT INTO `tabel_klasifikasi` (`id_klasifikasi`, `kode_klasifikasi`, `nama_klasifikasi`) VALUES
(1, 'KJ.00.00', 'Kebijakan Meteorologi, Klimatologi, dan  Geofisika meliputi Kebijakan di Bidang Meteorologi, Klimatologi, Geofisika, dan Instrumentasi, Kalibrasi, Rekayasa, dan Jaringan Komunikasi'),
(2, 'ME.00.00', 'Operasi Meteorologi Penerbangan'),
(3, 'ME.00.01', 'Pengamatan Meteorologi Penerbangan'),
(4, 'ME.00.02', 'Informasi Meteorologi Penerbangan'),
(5, 'ME.01.00', 'Operasi Meteorologi Maritim'),
(6, 'ME.01.01', 'Pengamatan Meteorologi Maritim'),
(7, 'ME.01.02', 'Informasi Meteorologi Maritim'),
(8, 'ME.02.00', 'Pengelolaan Citra Radar'),
(9, 'ME.02.01', 'Produk Data Informasi dari Radar Cuaca'),
(10, 'ME.02.02', 'Pengelolaan Citra Satelit'),
(11, 'ME.02.03', 'Produk Data Informasi dari Satelit Cuaca');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_unit`
--

CREATE TABLE `tabel_unit` (
  `id_unit` int(11) NOT NULL,
  `nama_unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_unit`
--

INSERT INTO `tabel_unit` (`id_unit`, `nama_unit`) VALUES
(1, 'Operasional Stamar Kendari'),
(2, 'Tata Usaha Stamar Kendari'),
(4, 'Stasiun Meteorologi Kelas II Maritim Kendari');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_user`
--

INSERT INTO `tabel_user` (`id_user`, `nama_user`, `email`, `password`, `level`, `foto`, `id_unit`) VALUES
(1, 'Amar', 'afdaapala@gmail.com', '123', 2, '1630671292_8cf3079a201f2be744ac.png', 4),
(2, 'Admin', 'admin', 'admin', 1, 'user.png', 4),
(5, 'Admin Stamar KDI', 'stamarkendari@gmail.com', '123', 1, '1630651357_48de23e6aa806304064a.png', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_arsip`
--
ALTER TABLE `tabel_arsip`
  ADD PRIMARY KEY (`id_arsip`);

--
-- Indexes for table `tabel_klasifikasi`
--
ALTER TABLE `tabel_klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`),
  ADD UNIQUE KEY `id_klasifikasi` (`id_klasifikasi`);

--
-- Indexes for table `tabel_unit`
--
ALTER TABLE `tabel_unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_arsip`
--
ALTER TABLE `tabel_arsip`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tabel_klasifikasi`
--
ALTER TABLE `tabel_klasifikasi`
  MODIFY `id_klasifikasi` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tabel_unit`
--
ALTER TABLE `tabel_unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
