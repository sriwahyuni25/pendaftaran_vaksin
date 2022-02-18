-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2022 at 04:25 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_vaksin`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_vaksin`
--

CREATE TABLE `jadwal_vaksin` (
  `id_jadwal` int(3) NOT NULL,
  `id` int(3) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_vaksin`
--

INSERT INTO `jadwal_vaksin` (`id_jadwal`, `id`, `tanggal`, `lokasi`) VALUES
(0, 1, '0000-00-00', 'lohbener'),
(1, 1, '2021-12-01', 'jatibarang'),
(2, 2, '2021-12-02', 'karangampel'),
(9, 2, '0000-00-00', 'jayalaksana');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar_vaksin`
--

CREATE TABLE `pendaftar_vaksin` (
  `id_pendaftaran` int(11) NOT NULL,
  `tanggal_vaksin` date NOT NULL,
  `jenis_vaksin` varchar(50) NOT NULL,
  `dosis` int(11) NOT NULL,
  `nik` char(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` int(11) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` char(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftar_vaksin`
--

INSERT INTO `pendaftar_vaksin` (`id_pendaftaran`, `tanggal_vaksin`, `jenis_vaksin`, `dosis`, `nik`, `nama`, `jk`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telp`) VALUES
(23, '2021-12-03', '1', 1, '2005003', 'ayu', 2, 'london', '2021-12-30', 'hwuukwkkwdd', '008766'),
(25, '2021-12-04', '2', 2, '5678', 'ayu', 2, 'indramayu', '2021-12-02', 'jayalaksana', '0866');

-- --------------------------------------------------------

--
-- Table structure for table `stok_vaksin`
--

CREATE TABLE `stok_vaksin` (
  `id` int(3) NOT NULL,
  `jenis_vaksin` varchar(50) NOT NULL,
  `tahap_vaksin` varchar(3) NOT NULL,
  `jumlah_tersedia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_vaksin`
--

INSERT INTO `stok_vaksin` (`id`, `jenis_vaksin`, `tahap_vaksin`, `jumlah_tersedia`) VALUES
(1, 'Astra', '1', '6'),
(2, 'astra', '2', '4'),
(14, 'sinovac', '1', '18'),
(15, 'sinovac', '2', '7'),
(16, 'sinovac', '2', '9');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pendaftaran`
--

INSERT INTO `tbl_pendaftaran` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '1', 'admin@gmail.com'),
(2, 'faqi', '123', 'user22@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal_vaksin`
--
ALTER TABLE `jadwal_vaksin`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `pendaftar_vaksin`
--
ALTER TABLE `pendaftar_vaksin`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `stok_vaksin`
--
ALTER TABLE `stok_vaksin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pendaftar_vaksin`
--
ALTER TABLE `pendaftar_vaksin`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `stok_vaksin`
--
ALTER TABLE `stok_vaksin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_vaksin`
--
ALTER TABLE `jadwal_vaksin`
  ADD CONSTRAINT `jadwal_vaksin_ibfk_1` FOREIGN KEY (`id`) REFERENCES `stok_vaksin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
