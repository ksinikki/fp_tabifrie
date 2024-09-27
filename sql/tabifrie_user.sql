-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2024 at 06:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tabifrie`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabifrie_user`
--

CREATE TABLE `tabifrie_user` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `age` varchar(12) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hotel` varchar(128) NOT NULL,
  `flight` varchar(128) NOT NULL,
  `engaging` varchar(128) NOT NULL,
  `smoking` varchar(128) NOT NULL,
  `drinking` varchar(128) NOT NULL,
  `eating` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabifrie_user`
--

INSERT INTO `tabifrie_user` (`id`, `name`, `gender`, `age`, `email`, `password`, `hotel`, `flight`, `engaging`, `smoking`, `drinking`, `eating`) VALUES
(1, 'kimika', '女', '40代', 'kimika@email.com', 'kimika', '2', '2', '1', '1', '3', '3'),
(2, 'emily', '女', '30代', 'emily@email.com', 'emily', '2', '2', '1', '1', '1', '3'),
(3, 'amber', '女', '30代', 'amber@email.com', 'amber', '2', '2', '1', '1', '3', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabifrie_user`
--
ALTER TABLE `tabifrie_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabifrie_user`
--
ALTER TABLE `tabifrie_user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
