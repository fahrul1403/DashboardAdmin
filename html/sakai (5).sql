-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 20, 2024 at 02:46 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sakai`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_klinik`
--

CREATE TABLE `data_klinik` (
  `id` int NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `departement` varchar(50) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `keluhan` varchar(100) NOT NULL,
  `kondisi_pasien` varchar(100) NOT NULL,
  `tanggapan_pasien` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_klinik`
--

INSERT INTO `data_klinik` (`id`, `nama_karyawan`, `departement`, `jam_masuk`, `jam_keluar`, `keluhan`, `kondisi_pasien`, `tanggapan_pasien`) VALUES
(2, 'Fahrul', 'Dokter', '11:04:00', '11:04:00', 'jjn', 'Merasa lebih Baik', 'Sangat Puas'),
(6, 'Hasan', 'IT', '14:59:00', '14:00:00', 'Testing', 'Merasa lebih Baik', 'Sangat Puas'),
(7, 'Fahrul', 'IT', '20:59:00', '23:00:00', 'Testing', 'Merasa lebih Baik', 'Sangat Puas');

-- --------------------------------------------------------

--
-- Table structure for table `data_pengunjung`
--

CREATE TABLE `data_pengunjung` (
  `nama` varchar(50) NOT NULL,
  `jumlah` int NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `alamat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `bertemu` varchar(40) NOT NULL,
  `depart` varchar(30) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time(4) NOT NULL,
  `jam_keluar` time(4) DEFAULT NULL,
  `tujuan` varchar(60) NOT NULL,
  `id` int NOT NULL,
  `no_kendaraan` varchar(10) DEFAULT NULL,
  `clear_data` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_pengunjung`
--

INSERT INTO `data_pengunjung` (`nama`, `jumlah`, `telepon`, `alamat`, `bertemu`, `depart`, `tipe`, `tanggal`, `jam_masuk`, `jam_keluar`, `tujuan`, `id`, `no_kendaraan`, `clear_data`) VALUES
('Muttar', 3, '085883731114', 'Jl. Ki Hajar Dewantara kos hj karta no34', 'Dr. Fahrul', 'Dokter', 'Perusahaan', '2024-01-20', '12:46:00.0000', '14:46:00.0000', 'Tes hari ini', 52, 'DE2313RE', ''),
('Testing', 9, '08626227278', 'Majapahit', 'Fahrul', 'IT', 'Pribadi', '2024-01-20', '18:39:00.0000', '18:39:00.0000', 'Testing', 53, '91JE', ''),
('Testi', 7, '0822626739', 'Majapaht', 'Fahrul', 'IT', 'Perusahaan', '2024-01-20', '18:51:00.0000', '20:51:00.0000', 'Tes', 55, '7JJ', ''),
('Fahrul', 9, '0826262626', 'Lombok', 'Haikal', 'IT', 'Perusahaan', '2024-01-20', '20:46:00.0000', '20:46:00.0000', 'Test', 56, 'JI6729JH', ''),
('Salma', 3, '081234345656', 'Bekasi', 'Alhadan', 'PGA ', 'Perusahaan', '2024-01-20', '19:49:00.0000', '21:00:00.0000', 'Antar paket', 58, 'B 0000 ACD', ''),
('Tes', 4, '085883731114', 'RT.1/RW.6, Simpangan, Cikarang Utara, Bekasi Regency, West Java, Indonesia, 17834', 'Dr. Fahrul', 'Docter', 'Pribadi', '2024-01-20', '21:29:00.0000', '12:29:00.0000', 'Test', 60, '3132E', ''),
('Tes3', 4, '085883731114', 'RT.1/RW.6, Simpangan, Cikarang Utara, Bekasi Regency, West Java, Indonesia, 17834', 'Dr. Fahrul', 'Docter', 'Pribadi', '2024-01-20', '21:35:00.0000', '12:35:00.0000', 'Test', 62, '3132E', ''),
('Tes7', 4, '085883731114', 'RT.1/RW.6, Simpangan, Cikarang Utara, Bekasi Regency, West Java, Indonesia, 17834', 'Dr. Fahrul', 'Docter', 'Pribadi', '2024-01-20', '22:11:00.0000', '00:00:00.0000', 'Ye', 67, '3132E', NULL),
('Andi', 3, '085883731114', 'RT.1/RW.6, Simpangan, Cikarang Utara, Bekasi Regency, West Java, Indonesia, 17834', 'Dr. Fahrul', 'Docter', 'Perusahaan', '2024-01-20', '22:21:00.0000', '02:00:00.0000', 'Tsw', 68, '3132E', 'Selesai Kunjungan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`) VALUES
(1, 'Admin', 'admin@example.com', 'admin'),
(2, 'Costumer Service', 'cs@example.com', 'cs02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_klinik`
--
ALTER TABLE `data_klinik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pengunjung`
--
ALTER TABLE `data_pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_klinik`
--
ALTER TABLE `data_klinik`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_pengunjung`
--
ALTER TABLE `data_pengunjung`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
