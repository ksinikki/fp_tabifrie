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
-- Table structure for table `tabifrie_message`
--

CREATE TABLE `tabifrie_message` (
  `id` int(12) NOT NULL,
  `name` varchar(12) NOT NULL,
  `email` varchar(128) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date_submit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabifrie_message`
--

INSERT INTO `tabifrie_message` (`id`, `name`, `email`, `content`, `date_submit`) VALUES
(1, 'kimika', 'kimika@email.com', 'こんにちは。', '2024-09-27 20:35:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabifrie_message`
--
ALTER TABLE `tabifrie_message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabifrie_message`
--
ALTER TABLE `tabifrie_message`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
