-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 02:33 PM
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
-- Database: `mysite`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(100) NOT NULL,
  `userId` varchar(100) NOT NULL,
  `packageId` int(100) NOT NULL,
  `payment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `userId`, `packageId`, `payment`) VALUES
(1, '0', 0, '70000'),
(2, '0', 10, '39900'),
(3, '0', 10, '39900'),
(4, 'jhnuman', 10, '39900'),
(5, 'jhnuman', 10, '39900'),
(6, 'jhnuman', 10, '39900'),
(7, 'jhnuman', 10, '40000');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `pax` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `title`, `description`, `price`, `pax`, `location`, `image`, `time`) VALUES
(9, 'EXPERIENCE THE GREAT HOLIDAY ON BEACH', 'EXPERIENCE THE GREAT HOLIDAY ON BEACH', 'Laoreet, voluptatum nihil dolor esse quaerat mattis explicabo maiores, est aliquet porttitor! Eaque,', '800', '10', 'Cox\'s Bazar, Chittagong', 'packege-1.jpg', '6D/5N'),
(10, 'Saint Martin Tour Package', 'Saint Martin Tour Package', 'Saint Martin Tour Package From Dhaka. The Package includes all costs including transportation to mea', '400', '20', 'Saint Martin', 'packege-2.jpg', '3D/2N'),
(11, 'COX\'s Bazar Tour Package', 'COX\'s Bazar Tour Package', 'COX\'s Bazar Tour Package For 6D/5N ', '400', '5', 'Cox\'s Bazar, Chittagong', 'packege-3.jpg', '6D/5N');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'jahidultkonline@gmail.com', '2f7ba44956eb1f6135a4adcd1e4f8164', 'user'),
(6, 'jhnuman', 'jhnuman00@gmail.com', '2f7ba44956eb1f6135a4adcd1e4f8164', 'admin'),
(8, 'nabiladmin', 'nabilrayhan17@gmail.com', '822e0f16f9bbb1be47acca6a08edf7cc', 'admin'),
(9, 'rayhan', 'nabilrayhan@gmail.com', '11dd88344422f4b0a8eb72dc4dad5487', 'user'),
(10, 'users', 'nabilrayhan17as@gmail.com', '2f7ba44956eb1f6135a4adcd1e4f8164', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
