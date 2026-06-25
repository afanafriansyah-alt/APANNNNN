-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2026 at 10:04 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_reservasi_pbo_trpl1b_afanafriansyah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_reservasi`
--

CREATE TABLE `tabel_reservasi` (
  `id_reservasi` int NOT NULL,
  `nama_tamu` varchar(100) NOT NULL,
  `nomor_kamar` varchar(10) NOT NULL,
  `durasi_menginap` int NOT NULL,
  `harga_per_malam_dasar` decimal(10,2) NOT NULL,
  `tipe_kamar` enum('Standar','Deluxe','Suite') NOT NULL,
  `fasilitas_sarapan` tinyint(1) DEFAULT NULL,
  `akses_gym` tinyint(1) DEFAULT NULL,
  `minibar_premium` tinyint(1) DEFAULT NULL,
  `layanan_butler` tinyint(1) DEFAULT NULL,
  `pilihan_pemandangan` varchar(50) DEFAULT NULL,
  `diskon_loyalitas` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_reservasi`
--

INSERT INTO `tabel_reservasi` (`id_reservasi`, `nama_tamu`, `nomor_kamar`, `durasi_menginap`, `harga_per_malam_dasar`, `tipe_kamar`, `fasilitas_sarapan`, `akses_gym`, `minibar_premium`, `layanan_butler`, `pilihan_pemandangan`, `diskon_loyalitas`) VALUES
(1, 'Budi Santoso', '101', 2, '350000.00', 'Standar', 1, NULL, NULL, NULL, NULL, NULL),
(2, 'Siti Aminah', '102', 1, '350000.00', 'Standar', 0, NULL, NULL, NULL, NULL, NULL),
(3, 'Andi Wijaya', '103', 3, '350000.00', 'Standar', 1, NULL, NULL, NULL, NULL, NULL),
(4, 'Dewi Lestari', '104', 2, '350000.00', 'Standar', 1, NULL, NULL, NULL, NULL, NULL),
(5, 'Eko Prasetyo', '105', 4, '350000.00', 'Standar', 0, NULL, NULL, NULL, NULL, NULL),
(6, 'Rina Nose', '106', 1, '350000.00', 'Standar', 1, NULL, NULL, NULL, NULL, NULL),
(7, 'Ahmad Dhani', '107', 5, '350000.00', 'Standar', 0, NULL, NULL, NULL, NULL, NULL),
(8, 'Maya Septha', '201', 2, '600000.00', 'Deluxe', NULL, 1, NULL, NULL, 'Kolam Renang', NULL),
(9, 'Duta Sheila', '202', 3, '600000.00', 'Deluxe', NULL, 1, NULL, NULL, 'Kota', NULL),
(10, 'Ariel Noah', '203', 1, '600000.00', 'Deluxe', NULL, 0, NULL, NULL, 'Taman', NULL),
(11, 'Judika', '204', 4, '600000.00', 'Deluxe', NULL, 1, NULL, NULL, 'Pantai', NULL),
(12, 'Rossa', '205', 2, '600000.00', 'Deluxe', NULL, 0, NULL, NULL, 'Kota', NULL),
(13, 'Isyana Sarasvati', '206', 3, '600000.00', 'Deluxe', NULL, 1, NULL, NULL, 'Kolam Renang', NULL),
(14, 'Raisa Andriana', '207', 1, '600000.00', 'Deluxe', NULL, 1, NULL, NULL, 'Pantai', NULL),
(15, 'Afgan', '301', 2, '1500000.00', 'Suite', NULL, NULL, 1, 1, NULL, '5.00'),
(16, 'Tulus', '302', 5, '1500000.00', 'Suite', NULL, NULL, 1, 0, NULL, '10.00'),
(17, 'Maudy Ayunda', '303', 3, '1500000.00', 'Suite', NULL, NULL, 0, 1, NULL, '0.00'),
(18, 'Glenn Fredly', '304', 1, '1500000.00', 'Suite', NULL, NULL, 1, 1, NULL, '15.00'),
(19, 'Agnez Mo', '305', 4, '1500000.00', 'Suite', NULL, NULL, 1, 1, NULL, '20.00'),
(20, 'Reza Rahadian', '306', 2, '1500000.00', 'Suite', NULL, NULL, 0, 0, NULL, '5.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_reservasi`
--
ALTER TABLE `tabel_reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_reservasi`
--
ALTER TABLE `tabel_reservasi`
  MODIFY `id_reservasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
