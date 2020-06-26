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
-- Database: `opetsema`
--

-- --------------------------------------------------------

--
-- Table structure for table `opettabela`
--

CREATE TABLE `opettabela` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `opettabela`
--

INSERT INTO `opettabela` (`id`, `username`, `password`, `firstname`, `lastname`) VALUES
(1, 'filip', 'Maslovaric', NULL, NULL),
(2, 'filip.zivanovic1999@gmail.com', '$2y$10$ZVOJ6C7DyUf7OYXWhTA6F.EOALB0bym907XDI6K3vu6MApQY//GKK', NULL, 'Zivanovic'),
(3, 'fzivanovic2618s@raf.edu.rs', '$2y$10$5wD66gvaUoSIBX5KOVEG7O5BZNJFha57JlvvJRXai8SZLBaknPkzq', NULL, 'Zivanovic'),
(4, 'fzivanovic2618s@raf.edu.rs', '$2y$10$BqzEGZqvFOoILHQKjmHQ5.m36PUMjXFaodfGCAfhYMq4Nhzl0BIim', 'Filip', 'Zivanovic'),
(5, 'filip.zivanovic1999@gmail.com', '$2y$10$zeDAgPCs6WWBXn0kFv0qqO6khIB0dAmXam.630M/7iIcc6Gc/Usjy', '', ''),
(6, 'filip.zivanovic1999@gmail.com', '$2y$10$2KULi1moOshM9Yg7DQYRuerDQEjs2CM2WQO08IHfzIa53qYu6Cbym', 'Filip', 'Zivanovic'),
(7, 'admin@gmail.com', '$2y$10$zSf99hDiW57CAZ232do2VeXIWdfsGGQn1ZBcqeoOVyqd7lnh6CjBG', '', ''),
(8, 'filip.zivanovic1999@gmail.com', '$2y$10$nbt0LozsyO6ic3es.GO.vutcJ4ixtpGktG4zt/k7Sd7/VVbIi33YW', '', ''),
(9, 'filip.zivanovic1999@gmail.com', '$2y$10$WBdOzfI9gT1DVpTys89/VublBV5NFGXuWrNKlsW86wMTD2itsjbvC', 'Filip', 'Zivanovic'),
(10, 'filip.zivanovic1999@gmail.com', '$2y$10$sMb6wIyX98aVdPDy90rX/.S5xytkTrND8uJbvL3gCrclxhEbFsPrK', 'Filip', 'Zivanovic'),
(11, 'filip.zivanovic1999@gmail.com', '$2y$10$56AE6AR6Ea6scaGC9xy3dOMitW5UAqTLhQNERS04XJPGEVKGJzRAS', 'Filip', 'fsddsfsdf'),
(12, 'uterzic@gmail.com', '$2y$10$LXhEnGloiI1OHU.OuYC0MeDRwSFqcsphK6VhSn5Imb8AetcOIwcu6', 'urosd', 'fasdfsd'),
(13, 'filip.pozarevac@mali.com', '$2y$10$f3UzdpImoyW2IspPavAyjetk5bpmT/OTsEQTIJ0qOtkJCeAtdPrIy', 'Filip', 'Zivanovic'),
(14, 'filip123@gmai.coml', '$2y$10$CHX69ZQRdtTLMq/o8ELq1eyKeOnvhReeSrZJspLq8bK.JFTXU4zLq', '', ''),
(15, 'kolubara@gmail.com', '$2y$10$lloki84hkZsSOUX50Pink.XkzCu9Nd8tDB.afC.QU/eKUDvkicNG.', 'Uros', 'Smrad'),
(16, 'ja@gmail.com', '$2y$10$G1z4WkVREb.q8yqZUIs6B.jCTrUPKYm1wdNZ1Y6OCRV/hhNoASrAa', 'uros', 'filip');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `opettabela`
--
ALTER TABLE `opettabela`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `opettabela`
--
ALTER TABLE `opettabela`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
