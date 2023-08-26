-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 07:34 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fellowship`
--

-- --------------------------------------------------------

--
-- Table structure for table `fellowships`
--

CREATE TABLE `fellowships` (
  `id` int(11) NOT NULL,
  `nama_pelamar` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nomor_hp` varchar(20) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `ipk_terakhir` float DEFAULT NULL,
  `program_beasiswa` varchar(255) DEFAULT NULL,
  `berkas_syarat` varchar(255) DEFAULT NULL,
  `status_ajuan` tinyint(4) DEFAULT 0,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fellowships`
--

INSERT INTO `fellowships` (`id`, `nama_pelamar`, `email`, `nomor_hp`, `semester`, `ipk_terakhir`, `program_beasiswa`, `berkas_syarat`, `status_ajuan`, `id_user`) VALUES
(8, 'Hanni Pham', 'hanni@gmail.com', '08234234', 5, 3.18, 'Beasiswa Akademik', 'fd-hanni@gmail.com.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`) VALUES
(1, 'Pham Hanni', 'hanni@gmail.com', '$2y$10$bjJRqaanQqSQVVrebtIm9eWS/4u4wVhgv4vDuLwoNhuQBPMH9LOlO'),
(4, 'Hyerin', 'hyerin@gmail.com', '$2y$10$BQ8xzJZiFZcvO/X5mx0m4eRW5oBHM7pOC9knpiUGrsXZZn30nBU3S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fellowships`
--
ALTER TABLE `fellowships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fellowships`
--
ALTER TABLE `fellowships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fellowships`
--
ALTER TABLE `fellowships`
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
