-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 09:12 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_monitoring`
--

CREATE TABLE `tb_monitoring` (
  `id_monitoring` int(15) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `client` varchar(50) NOT NULL,
  `picture_leader` blob NOT NULL,
  `name_leader` varchar(50) NOT NULL,
  `email_leader` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_monitoring`
--

INSERT INTO `tb_monitoring` (`id_monitoring`, `project_name`, `client`, `picture_leader`, `name_leader`, `email_leader`, `start_date`, `end_date`) VALUES
(1, 'pembuata SI keuangan', 'PT.Merdeka', 0x696d67312e706e67, 'Abdurrahman', 'abdurrahman07092001@gmail.com', '2023-01-01', '2023-01-27'),
(5, 'pembuatan SI akademik', 'STMIK SZ', 0x696d67312e706e67, 'Kurniawan', 'kurniawan@gmail.com', '2023-01-01', '2023-01-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_monitoring`
--
ALTER TABLE `tb_monitoring`
  ADD PRIMARY KEY (`id_monitoring`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_monitoring`
--
ALTER TABLE `tb_monitoring`
  MODIFY `id_monitoring` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
