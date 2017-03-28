-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 20, 2014 at 11:02 AM
-- Server version: 5.5.37-MariaDB
-- PHP Version: 5.5.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nilaionline148`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Super Adminisitrator');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `nip` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kode_mtkul` varchar(5) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nip`),
  KEY `kode_mtkul` (`kode_mtkul`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama`, `kode_mtkul`, `password`) VALUES
('105123', 'Iyan Gustiana', '10507', '70f32b0989903de63dde4ea96d5d4000'),
('105124', 'Diana', '10508', '3a23bb515e06d0e944ff916e79a7775c');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` char(10) DEFAULT NULL,
  `jur` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jk`, `jur`, `password`) VALUES
('10511148', 'Dimas Maryanto', 'Laki-Laki', 'MI', 'adbb30ca37e1f14f9420c89dffb4a5b1'),
('10511150', 'Riansyah Permana Putra', 'Laki-Laki', 'MI', '6098f5284e30234f1b7d80f700df3170'),
('10511152', 'William Pascal', 'Laki-Laki', 'MI', '759950333d5dffd0781d453ca54e8e13'),
('10511173', 'Muhamad Hanif Muhsin', 'Laki-Laki', 'MI', 'ba6c58f599e94b94d525af989ef49176');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE IF NOT EXISTS `matakuliah` (
  `kode_mtkul` varchar(10) NOT NULL,
  `nama_mtkul` varchar(100) NOT NULL,
  PRIMARY KEY (`kode_mtkul`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kode_mtkul`, `nama_mtkul`) VALUES
('10501', 'Algoritma & Struktur Data I'),
('10502', 'Algoritma & Struktur Data II'),
('10503', 'Lab. Pemograman Java I'),
('10504', 'Lab. Pemograman Java II'),
('10505', 'Lab. Pemograman Java III'),
('10506', 'Lab. Basisdata I'),
('10507', 'Lab. Basisdata II'),
('10508', 'Perancangan Basis Data');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `ni_tugas` int(11) DEFAULT NULL,
  `ni_uts` int(11) DEFAULT NULL,
  `ni_uas` int(11) DEFAULT NULL,
  `nim` varchar(20) NOT NULL,
  `nip` varchar(30) NOT NULL,
  UNIQUE KEY `uq_nim_nip` (`nim`,`nip`),
  KEY `nim` (`nim`),
  KEY `nip` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`ni_tugas`, `ni_uts`, `ni_uas`, `nim`, `nip`) VALUES
(82, 84, 81, '10511148', '105123'),
(96, 60, 95, '10511148', '105124'),
(50, 60, 80, '10511150', '105123'),
(80, 100, 70, '10511150', '105124');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`kode_mtkul`) REFERENCES `matakuliah` (`kode_mtkul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
