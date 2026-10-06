-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2026 at 09:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nidn` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(15) NOT NULL,
  `kode_mk` varchar(12) NOT NULL,
  `semester` tinyint(3) UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(9) NOT NULL,
  `nilai_huruf` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `prodi` varchar(80) NOT NULL,
  `angkatan` year(4) NOT NULL,
  `ipk` decimal(3,2) DEFAULT 0.00
) ;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `email`, `prodi`, `angkatan`, `ipk`) VALUES
('24210028', 'Dina Camelia', 'dina@kampus.ac.id', 'Teknik Informatika', '2024', 3.95),
('24210073', 'Nadine Agietha', 'nadine@kampus.ac.id', 'Teknik Informatika', '2024', 3.92);

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `kode_mk` varchar(12) NOT NULL,
  `nama_mk` varchar(100) NOT NULL,
  `sks` tinyint(3) UNSIGNED NOT NULL,
  `nidn` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_krs` (`nim`,`kode_mk`,`semester`,`tahun_ajaran`),
  ADD KEY `fk_krs_mk` (`kode_mk`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`kode_mk`),
  ADD KEY `fk_mk_dosen` (`nidn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `fk_krs_mahasiswa` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_krs_mk` FOREIGN KEY (`kode_mk`) REFERENCES `mata_kuliah` (`kode_mk`) ON UPDATE CASCADE;

--
-- Constraints for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD CONSTRAINT `fk_mk_dosen` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
