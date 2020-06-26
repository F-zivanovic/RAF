-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2020 at 06:57 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masine`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabelamasina`
--

CREATE TABLE `tabelamasina` (
  `id` int(11) NOT NULL,
  `uuid` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `status` enum('STOPPED','RUNNING') NOT NULL,
  `createAt` date NOT NULL,
  `active` tinyint(4) NOT NULL,
  `ram` int(11) NOT NULL,
  `max_free` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabelamasina`
--

INSERT INTO `tabelamasina` (`id`, `uuid`, `name`, `status`, `createAt`, `active`, `ram`, `max_free`) VALUES
(12, '5e907bd927e31', 'uros', 'RUNNING', '2020-04-10', 0, 53, 43),
(19, '5e908139b3f58', 'filip', 'STOPPED', '2020-04-10', 0, 32, 32),
(20, '5e90906618ad4', 'amd', 'STOPPED', '2020-04-10', 0, 0, 0),
(21, '5e9090838155f', 'amd', 'RUNNING', '2020-04-10', 0, 64, 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabelamasina`
--
ALTER TABLE `tabelamasina`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabelamasina`
--
ALTER TABLE `tabelamasina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
