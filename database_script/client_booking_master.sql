-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2024 at 01:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mirror_client`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_booking_master`
--

CREATE TABLE `client_booking_master` (
  `id` int(11) NOT NULL,
  `client_phone` varchar(20) DEFAULT NULL,
  `booking_status` varchar(20) DEFAULT NULL,
  `booking_date` varchar(20) DEFAULT NULL,
  `start_time` varchar(20) DEFAULT NULL,
  `end_time` varchar(20) DEFAULT NULL,
  `total_price` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_booking_master`
--

INSERT INTO `client_booking_master` (`id`, `client_phone`, `booking_status`, `booking_date`, `start_time`, `end_time`, `total_price`, `created_at`, `updated_at`) VALUES
(1, '+12345', 'Pending', '2024-01-28', '9:00 AM', '10:00 AM', 210, '2024-12-26 08:51:02', '2024-12-26 08:51:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_booking_master`
--
ALTER TABLE `client_booking_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_booking_master`
--
ALTER TABLE `client_booking_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
