-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2021 at 09:51 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uasweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblmahasiswa`
--

CREATE TABLE `tblmahasiswa` (
  `idMhs` int(11) NOT NULL,
  `npmMhs` char(8) NOT NULL,
  `namaMahasiswa` varchar(225) NOT NULL,
  `jurusan` varchar(225) NOT NULL,
  `isActive` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmahasiswa`
--

INSERT INTO `tblmahasiswa` (`idMhs`, `npmMhs`, `namaMahasiswa`, `jurusan`, `isActive`) VALUES
(1, '19312079', 'M Rizky Fadhilah', 'Informatika', '1'),
(2, '19312121', 'Bagas Aditama', 'Teknik Elektro', '1'),
(3, '18314356', 'Adis Utami', 'Sistem Informasi', '1'),
(4, '19312124', 'Verdian', 'Sastra Inggris', '1'),
(5, '17310011', 'Ani', 'Sastra Inggris', '0'),
(6, '19313212', 'Ana Setiani', 'Sistem Informasi', '1'),
(8, '19312121', 'Adi Bagas Pangestu', 'Teknik Pertanian', '1'),
(9, '19312534', 'Adil Ramdani', 'Teknik Pertanian', '1'),
(10, '19314343', 'Andri Febrianto', 'Teknik Elektro', '1'),
(11, '17314576', 'Aisya Hijabah', 'Ilmu Komunikasi', '1'),
(12, '17312121', 'Angga Saputra', 'Teknik Elektro', '1'),
(13, '12121212', 'Adi Salman', 'Teknik Pertanian', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `idUser` int(11) NOT NULL,
  `namaUser` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isActive` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`idUser`, `namaUser`, `username`, `password`, `isActive`) VALUES
(1, 'Bambang', 'bmbg', '$2y$10$h7PxaCkmoRT9xoGCMkYjTO9nJ/zKlYcbkEentvksuziB9WqyjTkiy', '1'),
(2, 'Yudi Marga', 'yudii', '$2y$10$lFAYldxn3Y.TVq75Emlm5e1mWzD2Gc5PNAYQNKJtUHjPLWSfoGFu2', '1'),
(3, 'Mamat', 'mamat', '$2y$10$3Au5vXeX6fpSy9D.xKl4zeFzTeVoLN09IbLuTD6qrMwu/f8xkt1cO', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblmahasiswa`
--
ALTER TABLE `tblmahasiswa`
  ADD PRIMARY KEY (`idMhs`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblmahasiswa`
--
ALTER TABLE `tblmahasiswa`
  MODIFY `idMhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
