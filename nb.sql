-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2021 at 06:25 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nb`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_latih`
--

CREATE TABLE `data_latih` (
  `nama_pegawai` varchar(50) NOT NULL,
  `masa_kerja` int(5) NOT NULL,
  `usia` int(5) NOT NULL,
  `nilai_pelatihan` int(5) NOT NULL,
  `nilai_kinerja` int(5) NOT NULL,
  `hasil_evaluasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_latih`
--

INSERT INTO `data_latih` (`nama_pegawai`, `masa_kerja`, `usia`, `nilai_pelatihan`, `nilai_kinerja`, `hasil_evaluasi`) VALUES
('ALI TOPAN ', 10, 35, 71, 93, 'PROMOSI'),
('SARTIKA ', 15, 32, 82, 62, 'PROMOSI'),
('MIKA ', 5, 25, 91, 88, 'MUTASI'),
('RUBY ', 8, 30, 72, 96, 'PROMOSI'),
('BIAN UTAMI ', 20, 45, 59, 98, 'MUTASI'),
('RIANDARI ', 17, 42, 97, 62, 'MUTASI'),
('ULI ALWAN ', 23, 52, 97, 73, 'PROMOSI'),
('KANITA ', 18, 48, 50, 84, 'PROMOSI'),
('SARINI ', 2, 32, 60, 72, 'PHK'),
('RAFINA ', 7, 37, 81, 99, 'PROMOSI'),
('BUDIMAN ', 15, 48, 69, 92, 'MUTASI'),
('SARTIKA ', 15, 32, 87, 85, 'PROMOSI'),
('MIKA ', 5, 25, 70, 90, 'MUTASI'),
('RUBY ', 8, 30, 77, 77, 'PHK'),
('KANITA ', 18, 47, 84, 87, 'PROMOSI'),
('SARITA ', 2, 32, 87, 51, 'PHK'),
('BUDIAN ', 15, 40, 76, 76, 'MUTASI'),
('SARTIKA ', 11, 32, 91, 94, 'PROMOSI'),
('MIKO ', 6, 25, 59, 66, 'MUTASI'),
('RIANDANI ', 17, 48, 88, 53, 'PHK'),
('ULILWAN ', 24, 52, 67, 96, 'MUTASI'),
('KANISA ', 18, 48, 61, 60, 'PROMOSI'),
('SARINA ', 3, 32, 51, 52, 'PHK'),
('BUDIANA ', 15, 48, 66, 93, 'MUTASI'),
('SANTIKA ', 16, 32, 93, 81, 'PROMOSI'),
('SAFIRA ', 11, 32, 82, 69, 'PROMOSI'),
('MIRA ', 26, 50, 95, 94, 'MUTASI'),
('RIANTI ', 17, 48, 85, 83, 'PHK'),
('CICI ', 11, 32, 73, 95, 'PROMOSI'),
('INA ', 6, 25, 76, 75, 'MUTASI'),
('MIMA ', 11, 32, 58, 82, 'PROMOSI'),
('NAYA ', 6, 25, 54, 97, 'MUTASI'),
('SARINA ', 11, 32, 60, 87, 'PROMOSI'),
('BEBEN', 11, 27, 88, 92, 'PROMOSI');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
