-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2025 at 09:03 PM
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
-- Table structure for table `booking_inbox`
--

CREATE TABLE `booking_inbox` (
  `id` int(11) NOT NULL,
  `bookingId` int(11) DEFAULT NULL,
  `salonId` int(11) DEFAULT NULL,
  `client_mob_num` varchar(21) DEFAULT NULL,
  `isNotificationOpened` tinyint(1) DEFAULT NULL,
  `bookingType` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_inbox`
--

INSERT INTO `booking_inbox` (`id`, `bookingId`, `salonId`, `client_mob_num`, `isNotificationOpened`, `bookingType`, `created_at`, `updated_at`) VALUES
(1, 8, 35, '+966554433221', 0, NULL, '2024-12-31 15:01:26', '2024-12-31 15:01:26'),
(2, 9, 35, '+966554433221', 0, NULL, '2024-12-31 15:02:53', '2024-12-31 15:02:53'),
(3, NULL, NULL, '+966554433221', 0, NULL, '2024-12-31 15:07:45', '2024-12-31 15:07:45'),
(4, NULL, NULL, '+966554433221', 0, NULL, '2024-12-31 15:07:59', '2024-12-31 15:07:59'),
(5, NULL, NULL, '+966554433221', 0, NULL, '2025-01-01 17:31:00', '2025-01-01 17:31:00'),
(6, 8, NULL, '+966554433221', 0, NULL, '2025-01-01 17:37:30', '2025-01-01 17:37:30'),
(7, 8, 35, '+966554433221', 0, NULL, '2025-01-01 17:42:06', '2025-01-01 17:42:06'),
(8, 9, 35, '+966554433221', 0, NULL, '2025-01-01 17:43:42', '2025-01-01 17:43:42'),
(9, 8, 35, '+966554433221', 0, 'Confirmed', '2025-01-01 18:00:46', '2025-01-01 18:00:46'),
(10, 9, 35, '+966554433221', 0, 'Confirmed', '2025-01-01 18:01:00', '2025-01-01 18:01:00'),
(11, 9, 35, '+966554433221', 0, 'Cancelled', '2025-01-01 18:02:26', '2025-01-01 18:02:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_inbox`
--
ALTER TABLE `booking_inbox`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_inbox`
--
ALTER TABLE `booking_inbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
