-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 08, 2018 at 09:47 PM
-- Server version: 5.7.21-1ubuntu1
-- PHP Version: 7.0.22-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengenalan_narkoba`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(0, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `aturan`
--

CREATE TABLE `aturan` (
  `no` int(11) NOT NULL,
  `aturan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aturan`
--

INSERT INTO `aturan` (`no`, `aturan`) VALUES
(0, '<p>kdkdedede</p><p>kjnjnjfrfrfafa frfa afrfa fa fef aef ae<b>f aef awef awef aw fa efae fawefawfe aw faw fwaefawefaefaefaefaefaw efaw</b></p><ul><li><b>jnjn</b>knknnlnknko</li><li>klmkmkl</li></ul><p>okokok<br></p><p><br></p><br><br><br>');

-- --------------------------------------------------------

--
-- Table structure for table `narkoba`
--

CREATE TABLE `narkoba` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_lain` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL,
  `gejala` text NOT NULL,
  `akibat` text NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pencegahan`
--

CREATE TABLE `pencegahan` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `post` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profil_perusahaan`
--

CREATE TABLE `profil_perusahaan` (
  `no` int(11) NOT NULL,
  `singkatan` varchar(255) NOT NULL,
  `gambar` text NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `lama` int(11) DEFAULT NULL,
  `benar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id` int(11) NOT NULL,
  `soal` text NOT NULL,
  `jawabana` varchar(255) NOT NULL,
  `jawabanb` varchar(255) NOT NULL,
  `jawabanc` varchar(255) NOT NULL,
  `jawaband` varchar(255) NOT NULL,
  `benar` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `soal`, `jawabana`, `jawabanb`, `jawabanc`, `jawaband`, `benar`) VALUES
(25, 'frjfrjf', 'frfrfrf', 'frkfrfrf', 'frfrf', 'fr', 'A'),
(26, 'pilih nomor yang benar', '3', '5', '4', '6', 'D'),
(27, 'dede', 'ded', 'ddd', 'ddd', 'dd', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `narkoba`
--
ALTER TABLE `narkoba`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pencegahan`
--
ALTER TABLE `pencegahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil_perusahaan`
--
ALTER TABLE `profil_perusahaan`
  ADD PRIMARY KEY (`singkatan`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `narkoba`
--
ALTER TABLE `narkoba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;
--
-- AUTO_INCREMENT for table `pencegahan`
--
ALTER TABLE `pencegahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
