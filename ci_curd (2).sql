-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2024 at 07:21 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_curd`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(60) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(8) NOT NULL,
  `status` varchar(60) NOT NULL DEFAULT 'Un Approved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `birthday`, `email`, `mobile`, `address`, `password`, `status`) VALUES
(8, ' heena', '2000-01-01', 'heena@gmail.com', '1234', 'bjp', '147', 'Approved'),
(11, 'ariba', '0000-00-00', 'ariba@gmail.com', '3456789876', 'bijapur', '0909', 'Approved'),
(25, 'khwaja', '2000-02-02', 'khan@gmail.com', '123654', 'bjp', '123654', 'Approved'),
(31, 'sana', '2024-02-14', 'sana@gmail.com', '1254', 'xyz', '333', 'Relieved'),
(38, 'sana', '2024-02-19', 's@gmail.com', ' 1254', 'vguh', '1234', 'Relieved'),
(41, 'nihal', '2024-02-02', 'i@gmail.com', '444', 'hh', 'nn', 'Approved'),
(44, 'khwaja', '2024-02-29', 'n@gmail.com', '12365', 'Near khooni masjid, Mustfa colony, Vijaypur ,Karnataka 586101', '333', 'Un Approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
