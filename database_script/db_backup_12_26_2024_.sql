-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 27, 2024 at 03:03 AM
-- Server version: 8.0.35-0ubuntu0.20.04.1
-- PHP Version: 7.4.3-4ubuntu2.19

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
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int NOT NULL,
  `english_name` varchar(500) NOT NULL,
  `arabic_name` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `english_name`, `arabic_name`, `created_at`, `updated_at`) VALUES
(1, 'National Commercial Bank (NCB)', 'البنك الأهلي السعودي', '2024-03-01 17:44:52', '2024-03-01 17:44:52'),
(2, 'Al Rajhi Bank', 'مصرف الراجحي', '2024-03-01 17:44:52', '2024-03-01 17:44:52'),
(3, 'Riyad Bank', 'بنك الرياض', '2024-03-01 17:46:36', '2024-03-01 17:46:36'),
(4, 'Banque Saudi Fransi (BSF)', 'البنك السعودي الفرنسي', '2024-03-01 17:47:51', '2024-03-01 17:47:51'),
(5, 'Saudi British Bank (SABB)', 'البنك السعودي البريطاني', '2024-03-01 17:48:39', '2024-03-01 17:48:39'),
(6, 'Arab National Bank (ANB)', 'البنك العربي الوطني', '2024-03-01 17:49:18', '2024-03-01 17:49:18'),
(7, 'Alinma Bank', 'مصرف الإنماء', '2024-03-01 17:49:50', '2024-03-01 17:49:50'),
(8, 'Alawwal Bank', 'البنك الأول', '2024-03-01 17:50:56', '2024-03-01 17:50:56'),
(9, 'Saudi Investment Bank (SIB)', 'مصرف السعودي للاستثمار', '2024-03-01 17:51:48', '2024-03-01 17:51:48'),
(10, 'Bank AlJazira', 'بنك الجزيرة', '2024-03-01 17:52:36', '2024-03-01 17:52:36'),
(11, 'Bank AlBilad', 'مصرف البلاد', '2024-03-01 17:53:01', '2024-03-01 17:53:01'),
(12, 'Emirates NBD', 'الإمارات NBD', '2024-03-01 17:53:23', '2024-03-01 17:53:23');

-- --------------------------------------------------------

--
-- Table structure for table `business_type`
--

CREATE TABLE `business_type` (
  `id` int NOT NULL,
  `english_name` varchar(200) DEFAULT NULL,
  `arabic_name` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `business_type`
--

INSERT INTO `business_type` (`id`, `english_name`, `arabic_name`, `created_at`, `updated_at`) VALUES
(1, 'Business type 1', 'بيزنس 1', '2024-01-12 19:50:44', '2024-01-12 19:50:44'),
(2, 'Business type 2', 'بيزنس 2', '2024-01-21 18:02:24', '2024-01-21 18:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `client_booking`
--

CREATE TABLE `client_booking` (
  `id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `subcategory_id` int DEFAULT NULL,
  `client_phone` varchar(20) DEFAULT NULL,
  `booking_status` varchar(10) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_from` varchar(500) DEFAULT NULL,
  `booking_to` varchar(500) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `price` float DEFAULT NULL,
  `salon_id` int DEFAULT NULL,
  `branch_id` int DEFAULT NULL,
  `employee_id` int DEFAULT NULL,
  `invoice_reference` int DEFAULT NULL,
  `ispaid` tinyint(1) NOT NULL DEFAULT '0',
  `notes` varchar(500) DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `client_booking`
--

INSERT INTO `client_booking` (`id`, `category_id`, `subcategory_id`, `client_phone`, `booking_status`, `booking_date`, `booking_from`, `booking_to`, `quantity`, `price`, `salon_id`, `branch_id`, `employee_id`, `invoice_reference`, `ispaid`, `notes`, `created_at`, `updated_at`) VALUES
(3, 1, 1, '+12345', 'Pending', '2024-01-28', '8:00 AM', '9:30 AM', 1, 200, 1, 3, 3, 1, 1, 'booking Notes', '2024-01-28 08:21:57', '2024-02-24 22:01:14'),
(4, 1, 1, '+12345', 'Pending', '2024-01-28', '9:00 AM', '10:00 AM', 1, 200, 1, 3, 3, 1, 0, NULL, '2024-02-13 07:00:25', '2024-02-17 00:24:20'),
(5, 1, 1, '1234568911', 'Pending', '2024-01-28', '9:00 AM', '10:00 AM', 1, 200, 1, 1, 3, NULL, 0, NULL, '2024-02-13 07:00:50', '2024-02-13 07:00:50'),
(6, 1, 1, '+125553456891125', 'Pending', '2024-01-28', '9:00 AM', '10:00 AM', 1, 200, 1, 1, 3, NULL, 0, NULL, '2024-02-20 06:06:21', '2024-02-20 06:06:21'),
(8, 15, 62, '+12345', 'Pending', '2024-02-04', '08:00 AM', '11:00 PM', 1, 200, 35, 59, 25, NULL, 0, 'New Notes 1', '2024-02-25 11:01:56', '2024-02-25 11:08:37'),
(9, 15, 62, '+12345', 'Confirmed', '2024-02-04', '08:00 AM', '11:00 PM', 1, 200, 35, 59, 25, NULL, 0, '', '2024-02-25 11:28:39', '2024-12-26 10:48:57'),
(10, 15, 62, '+12345', 'Pending', '2024-02-04', '08:00 AM', '11:00 PM', 1, 200, 35, 59, 25, 38, 0, '', '2024-02-25 11:30:53', '2024-12-13 10:52:52'),
(11, 15, 62, '+966558800', 'Pending', '2024-02-04', '08:00 AM', '11:00 PM', 1, 200, 35, 59, 25, NULL, 0, '', '2024-02-27 02:08:45', '2024-02-27 02:08:45'),
(12, 15, 63, '+966556677889', 'Confirmed', '2024-02-27', '08:00 AM', '09:00 AM', 1, 0, 35, 59, 25, 3, 1, '', '2024-02-27 07:14:25', '2024-12-24 08:46:50'),
(13, 15, 62, '+966556677889', 'Pending', '2024-02-27', '08:00 AM', '09:00 AM', 1, 200, 35, 59, 25, 4, 0, '', '2024-02-27 07:21:15', '2024-03-01 11:46:00'),
(14, 15, 62, '+966556677889', 'Pending', '2024-02-27', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 4, 0, '', '2024-02-27 07:49:35', '2024-03-01 11:46:00'),
(15, 15, 62, '+966556677889', 'Pending', '2024-02-27', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 4, 0, '', '2024-02-27 07:55:09', '2024-03-01 11:46:00'),
(16, 15, 62, '+966556677889', 'Pending', '2024-02-27', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 4, 0, '', '2024-02-27 07:59:03', '2024-03-01 11:46:00'),
(17, 15, 62, '+966556677889', 'Pending', '2024-02-27', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 4, 1, '', '2024-02-27 08:00:12', '2024-03-01 11:49:07'),
(18, 15, 62, '+966567891234', 'Pending', '2024-02-27', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, NULL, 0, '', '2024-02-27 08:24:17', '2024-02-27 08:24:17'),
(19, 15, 62, '+966558800', 'Pending', '2024-02-04', '08:00 AM', '09:00 AM', 1, 200, 35, 59, 25, NULL, 0, '', '2024-02-27 08:42:32', '2024-02-27 08:42:32'),
(20, 15, 62, '+966558800', 'Pending', '2024-02-04', '08:00 AM', '09:00 AM', 1, 200, 35, 59, 25, NULL, 0, '', '2024-03-01 12:05:41', '2024-03-01 12:05:41'),
(21, 15, 62, '+966558800', 'Pending', '2024-02-04', '08:00 AM', '09:00 AM', 1, 200, 35, 59, 25, NULL, 0, '', '2024-03-01 12:05:58', '2024-03-01 12:05:58'),
(22, 15, 62, '+966551234556', 'Pending', '2024-03-02', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 5, 1, '', '2024-03-01 12:10:02', '2024-03-01 12:10:53'),
(23, 15, 62, '+966551234556', 'Pending', '2024-03-02', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 6, 1, '', '2024-03-01 12:14:40', '2024-03-01 12:18:43'),
(24, 15, 62, '+966551234556', 'Pending', '2024-03-02', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 7, 1, '', '2024-03-01 12:24:25', '2024-03-01 12:25:19'),
(25, 15, 62, '+966551234556', 'Pending', '2024-03-02', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 8, 1, '', '2024-03-01 12:27:46', '2024-03-01 12:28:18'),
(26, 15, 62, '+966551234556', 'Pending', '2024-03-02', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 9, 1, '', '2024-03-01 12:29:46', '2024-03-01 12:30:14'),
(27, 15, 62, '+966551234556', 'Pending', '2024-03-02', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 10, 1, '', '2024-03-01 12:30:19', '2024-03-01 12:30:51'),
(28, 15, 62, '+966551234556', 'Pending', '2024-03-02', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 11, 1, '', '2024-03-01 12:32:13', '2024-03-01 12:32:40'),
(29, 15, 62, '+966551234556', 'Pending', '2024-03-02', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 12, 1, '', '2024-03-01 12:34:17', '2024-03-01 12:34:54'),
(30, 15, 62, '+966551234556', 'Pending', '2024-03-02', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 13, 1, '', '2024-03-01 12:36:39', '2024-03-01 12:37:08'),
(31, 15, 62, '+966551234556', 'Pending', '2024-03-02', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 14, 1, '', '2024-03-01 12:39:09', '2024-03-01 12:39:59'),
(32, 15, 62, '+966551234556', 'Pending', '2024-03-02', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 15, 1, '', '2024-03-01 12:41:13', '2024-03-01 12:41:50'),
(33, 15, 62, '+966551472580', 'Pending', '2024-03-02', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 16, 1, '', '2024-03-01 12:46:58', '2024-03-01 12:47:30'),
(34, 15, 62, '+966557891234', 'Pending', '2024-03-04', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 17, 1, '', '2024-03-04 10:15:35', '2024-03-04 10:33:57'),
(35, 15, 62, '+966557891234', 'Confirmed', '2024-03-04', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 18, 1, '', '2024-03-04 10:23:37', '2024-12-24 08:46:24'),
(36, 15, 62, '+966557891234', 'Confirmed', '2024-03-04', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 19, 1, '', '2024-03-04 10:24:06', '2024-12-24 08:47:06'),
(37, 15, 62, '+966557891234', 'Confirmed', '2024-03-04', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 20, 1, '', '2024-03-04 10:25:20', '2024-12-24 08:47:14'),
(38, 15, 62, '+966557891234', 'Confirmed', '2024-03-04', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 21, 1, '', '2024-03-04 10:30:23', '2024-12-24 08:47:19'),
(39, 15, 62, '+966557891234', 'Pending', '2024-03-04', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 22, 1, '', '2024-03-04 10:31:30', '2024-03-04 10:33:57'),
(40, 15, 62, '+966557891234', 'Pending', '2024-03-04', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 23, 1, '', '2024-03-04 10:32:36', '2024-03-04 10:33:57'),
(41, 15, 62, '+966557891234', 'Pending', '2024-03-04', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 24, 0, '', '2024-03-04 10:58:17', '2024-03-04 10:58:18'),
(42, 3, 10, '+966557891234', 'Pending', '2024-03-04', '08:00 AM', '08:15 AM', 1, 100, 35, 59, 25, 25, 0, '', '2024-03-04 10:59:41', '2024-03-04 10:59:42'),
(43, 15, 62, '+966522222221', 'Pending', '2024-03-05', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 26, 0, '', '2024-03-05 00:21:52', '2024-03-05 00:21:52'),
(44, 15, 62, '+966551234567', 'Pending', '2024-03-12', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 27, 1, '', '2024-03-11 00:00:55', '2024-03-11 00:01:27'),
(45, 15, 64, '+966543996969', 'Confirmed', '2024-03-31', '08:00 AM', '08:15 AM', 1, 0, 35, 59, 25, 28, 0, '', '2024-03-30 14:46:42', '2024-12-24 08:47:27'),
(46, 15, 65, '+966555555555', 'Pending', '2024-04-03', '08:00 AM', '08:15 AM', 1, 0, 35, 59, 25, 29, 0, '', '2024-04-03 06:58:37', '2024-04-03 06:58:37'),
(47, 15, 62, '+966557777888', 'Pending', '2024-04-08', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 30, 0, '', '2024-04-06 01:55:21', '2024-04-06 01:55:22'),
(48, 3, 8, '+966543996969', 'Pending', '2024-04-24', '08:00 AM', '08:15 AM', 1, 100, 35, 59, 25, 31, 0, '', '2024-04-24 07:41:21', '2024-04-24 07:41:21'),
(49, 15, 62, '+966554433221', 'Pending', '2024-05-21', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 32, 0, '', '2024-05-21 08:30:46', '2024-05-21 08:30:46'),
(50, 15, 62, '+966554433221', 'Confirmed', '2024-05-21', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 33, 0, '', '2024-05-21 08:31:07', '2024-12-24 08:47:40'),
(51, 15, 62, '+966554433221', 'Pending', '2024-05-21', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 34, 0, '', '2024-05-21 08:31:15', '2024-05-21 08:31:16'),
(52, 15, 62, '+966554433221', 'Pending', '2024-05-21', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 35, 0, '', '2024-05-21 08:31:19', '2024-05-21 08:31:19'),
(53, 15, 62, '+966554433221', 'Pending', '2024-05-21', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 36, 0, 'ANOTHER Booking Note', '2024-05-21 08:31:22', '2024-12-24 09:11:19'),
(54, 15, 62, '+966554433221', 'Pending', '2024-05-21', '08:00 AM', '08:15 AM', 1, 200, 35, 59, 25, 37, 0, 'New Booking Note', '2024-05-21 08:31:27', '2024-12-24 09:10:47'),
(55, 15, 62, '+12345', 'Confirmed', '2024-02-04', '08:00 AM', '11:00 PM', 1, 200, 35, 59, 25, NULL, 0, '', '2024-12-20 10:53:30', '2024-12-24 08:47:52'),
(56, 15, 62, '+12345', 'Pending', '2024-02-04', '08:00 AM', '11:00 PM', 1, 200, 35, 1, 25, NULL, 0, 'New Notes', '2024-12-23 23:33:45', '2024-12-23 23:34:07'),
(57, 15, 62, '+12345', 'Confirmed', '2024-02-04', '08:00 AM', '11:00 PM', 1, 200, 35, 1, 25, NULL, 0, '', '2024-12-23 23:33:56', '2024-12-24 08:48:11'),
(58, 15, 62, '+12345', 'Pending', '2024-02-04', '08:00 AM', '11:00 PM', 1, 200, 35, 1, 25, NULL, 0, '', '2024-12-25 11:37:26', '2024-12-25 11:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `einvoice_payment`
--

CREATE TABLE `einvoice_payment` (
  `id` int NOT NULL,
  `amount` float DEFAULT NULL,
  `einvoice_header_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `payment_vendor_master_id` int NOT NULL,
  `currency` varchar(3) NOT NULL DEFAULT 'SAR'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `einvoice_simplified_invoice_header`
--

CREATE TABLE `einvoice_simplified_invoice_header` (
  `id` int NOT NULL,
  `invoice_id` int DEFAULT NULL,
  `header_invoice_number` varchar(20) DEFAULT NULL,
  `header_issue_date` datetime DEFAULT NULL,
  `header_date_of_supply` datetime DEFAULT NULL,
  `seller_name` varchar(45) DEFAULT NULL,
  `seller_building_no` varchar(45) DEFAULT NULL,
  `seller_street_name` varchar(45) DEFAULT NULL,
  `seller_district` varchar(45) DEFAULT NULL,
  `seller_city` varchar(45) DEFAULT NULL,
  `seller_country` varchar(45) DEFAULT NULL,
  `seller_postal_code` varchar(45) DEFAULT NULL,
  `seller_additional_no` varchar(45) DEFAULT NULL,
  `seller_vat_number` varchar(45) DEFAULT NULL,
  `seller_other_seller_id` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `total_discount` float DEFAULT NULL,
  `discount_model_id` int DEFAULT NULL,
  `supplier_vat_no` varchar(20) DEFAULT NULL,
  `order_no` varchar(20) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `supplier_name` varchar(45) DEFAULT NULL,
  `supplier_address` mediumtext,
  `trans_type` varchar(45) DEFAULT NULL,
  `vat_rate` float DEFAULT NULL,
  `other_fees` float DEFAULT NULL,
  `total_amount_excluding_vat` float DEFAULT NULL,
  `vat_amount` float DEFAULT NULL,
  `total_amount_including_vat` float DEFAULT NULL,
  `invoice_url` mediumtext,
  `company_vat_no` varchar(45) DEFAULT NULL,
  `einvoice_type` enum('b2c','b2b') DEFAULT NULL,
  `einvoice_no` varchar(50) DEFAULT NULL,
  `company_profile_data_id` int DEFAULT NULL,
  `company_code` varchar(10) DEFAULT NULL,
  `invoice_status` enum('Active','Void','Paid','Not Paid') DEFAULT 'Active',
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_address` varchar(255) DEFAULT NULL,
  `customer_vat_no` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `einvoice_simplified_invoice_header`
--

INSERT INTO `einvoice_simplified_invoice_header` (`id`, `invoice_id`, `header_invoice_number`, `header_issue_date`, `header_date_of_supply`, `seller_name`, `seller_building_no`, `seller_street_name`, `seller_district`, `seller_city`, `seller_country`, `seller_postal_code`, `seller_additional_no`, `seller_vat_number`, `seller_other_seller_id`, `created_at`, `updated_at`, `total_discount`, `discount_model_id`, `supplier_vat_no`, `order_no`, `company_name`, `supplier_name`, `supplier_address`, `trans_type`, `vat_rate`, `other_fees`, `total_amount_excluding_vat`, `vat_amount`, `total_amount_including_vat`, `invoice_url`, `company_vat_no`, `einvoice_type`, `einvoice_no`, `company_profile_data_id`, `company_code`, `invoice_status`, `customer_name`, `customer_address`, `customer_vat_no`) VALUES
(274, NULL, '2200322', '2023-01-15 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-13 19:10:56', '2023-09-13 19:10:56', 120, NULL, '302008513600003', '100', 'شركة استراتيجيات المعلومات', NULL, NULL, 'Standard Supply', 0.15, 0, 5768, 865.2, 6633.2, 'http://localhost/einvoiceb2b/', NULL, 'b2b', '100', NULL, '1688405103', 'Active', 'Bamashmous T rading EST', 'Al SALAM, Sari St, Jeddah, Makkah, Saudi Arabia, 23436', '300149773800003'),
(275, NULL, '2200323', '2023-01-15 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-13 19:11:57', '2023-09-13 19:11:57', 120, NULL, '302008513600003', '100', 'شركة استراتيجيات المعلومات', NULL, NULL, 'Standard Supply', 0.15, 0, 5768, 865.2, 6633.2, 'http://localhost/einvoiceb2b/', NULL, 'b2b', 'INV53', NULL, '1688405103', 'Active', 'Bamashmous T rading EST', 'Al SALAM, Sari St, Jeddah, Makkah, Saudi Arabia, 23436', '300149773800003'),
(276, NULL, '2300324', '2023-01-15 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-13 19:54:03', '2023-09-13 19:54:03', 120, NULL, '302008513600003', '100', 'شركة استراتيجيات المعلومات', NULL, NULL, 'Standard Supply', 0.15, 0, 5768, 865.2, 6633.2, 'http://localhost/einvoiceb2b/', NULL, 'b2b', 'INV53', NULL, '1688405103', 'Active', 'Bamashmous T rading EST', 'Al SALAM, Sari St, Jeddah, Makkah, Saudi Arabia, 23436', '300149773800003'),
(277, NULL, '2300325', '2023-01-15 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-13 20:03:45', '2023-09-13 20:03:45', 120, NULL, '302008513600003', '100', 'شركة استراتيجيات المعلومات', NULL, NULL, 'Standard Supply', 0.15, 0, 5768, 865.2, 6633.2, 'http://localhost/einvoiceb2b', NULL, 'b2b', 'INV53', NULL, '1688405103', 'Active', 'Bamashmous T rading EST', 'Al SALAM, Sari St, Jeddah, Makkah, Saudi Arabia, 23436', '300149773800003'),
(278, NULL, '2300326', '2023-01-15 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-13 20:04:35', '2023-09-13 20:04:35', 120, NULL, '302008513600003', '100', 'شركة استراتيجيات المعلومات', NULL, NULL, 'Standard Supply', 0.15, 0, 5768, 865.2, 6633.2, 'http://localhost/einvoiceb2b/', NULL, 'b2b', 'INV53', NULL, '1688405103', 'Active', 'Bamashmous T rading EST', 'Al SALAM, Sari St, Jeddah, Makkah, Saudi Arabia, 23436', '300149773800003'),
(279, NULL, '2300327', '2023-01-15 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-14 08:16:05', '2023-09-14 08:16:05', 120, NULL, '302008513600003', '100', 'شركة استراتيجيات المعلومات', NULL, NULL, 'Standard Supply', 0.15, 0, 5768, 865.2, 6633.2, 'http://localhost/einvoiceb2b/', NULL, 'b2b', 'INV53', NULL, '1688405103', 'Active', 'Bamashmous T rading EST', 'Al SALAM, Sari St, Jeddah, Makkah, Saudi Arabia, 23436', '300149773800003'),
(280, NULL, '2300328', '2023-01-15 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-18 16:26:21', '2023-09-18 16:26:21', 120, NULL, '302008513600003', '100', 'شركة استراتيجيات المعلومات', NULL, NULL, 'Standard Supply', 0.15, 0, 5768, 865.2, 6633.2, 'http://localhost/einvoiceb2c/', NULL, 'b2c', 'INV53', NULL, '1688405103', 'Active', 'Bamashmous T rading EST', 'Al SALAM, Sari St, Jeddah, Makkah, Saudi Arabia, 23436', '300149773800003');

-- --------------------------------------------------------

--
-- Table structure for table `einvoice_simplified_invoice_line`
--

CREATE TABLE `einvoice_simplified_invoice_line` (
  `id` int NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `taxable_amount` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `tax_rate` float DEFAULT NULL,
  `tax_amount` float DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `currency` varchar(5) DEFAULT NULL,
  `einvoice_simplified_invoice_header_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `discount_model_id` int DEFAULT NULL,
  `gross_amount` float DEFAULT NULL,
  `amount_after_discount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `einvoice_simplified_invoice_line`
--

INSERT INTO `einvoice_simplified_invoice_line` (`id`, `item_name`, `unit_price`, `quantity`, `taxable_amount`, `discount`, `tax_rate`, `tax_amount`, `subtotal`, `currency`, `einvoice_simplified_invoice_header_id`, `created_at`, `updated_at`, `discount_model_id`, `gross_amount`, `amount_after_discount`) VALUES
(700, 'Domain Se rvice s - Domain Se rvice s 307329656923', 2801, 1, 2801, 0, 0.15, 420.15, NULL, 'SAR', 274, '2023-09-13 19:10:56', '2023-09-13 19:10:56', NULL, 3221.15, 2801),
(701, 'Microsoft - Microsoft 805334179715', 270, 10, 2700, 120, 0.15, 387, NULL, 'SAR', 274, '2023-09-13 19:10:56', '2023-09-13 19:10:56', NULL, 2967, 2580),
(702, 'Microsoft - Microsoft 805334179715', 387, 1, 387, 0, 0.15, 58.05, NULL, 'SAR', 274, '2023-09-13 19:10:56', '2023-09-13 19:10:56', NULL, 445.05, 387),
(703, 'Domain Se rvice s - Domain Se rvice s 307329656923', 2801, 1, 2801, 0, 0.15, 420.15, NULL, 'SAR', 275, '2023-09-13 19:11:57', '2023-09-13 19:11:57', NULL, 3221.15, 2801),
(704, 'Microsoft - Microsoft 805334179715', 270, 10, 2700, 120, 0.15, 387, NULL, 'SAR', 275, '2023-09-13 19:11:57', '2023-09-13 19:11:57', NULL, 2967, 2580),
(705, 'Microsoft - Microsoft 805334179715', 387, 1, 387, 0, 0.15, 58.05, NULL, 'SAR', 275, '2023-09-13 19:11:57', '2023-09-13 19:11:57', NULL, 445.05, 387),
(706, 'Domain Se rvice s - Domain Se rvice s 307329656923', 2801, 1, 2801, 0, 0.15, 420.15, NULL, 'SAR', 276, '2023-09-13 19:54:03', '2023-09-13 19:54:03', NULL, 3221.15, 2801),
(707, 'Microsoft - Microsoft 805334179715', 270, 10, 2700, 120, 0.15, 387, NULL, 'SAR', 276, '2023-09-13 19:54:03', '2023-09-13 19:54:03', NULL, 2967, 2580),
(708, 'Microsoft - Microsoft 805334179715', 387, 1, 387, 0, 0.15, 58.05, NULL, 'SAR', 276, '2023-09-13 19:54:03', '2023-09-13 19:54:03', NULL, 445.05, 387),
(709, 'Domain Se rvice s - Domain Se rvice s 307329656923', 2801, 1, 2801, 0, 0.15, 420.15, NULL, 'SAR', 277, '2023-09-13 20:03:45', '2023-09-13 20:03:45', NULL, 3221.15, 2801),
(710, 'Microsoft - Microsoft 805334179715', 270, 10, 2700, 120, 0.15, 387, NULL, 'SAR', 277, '2023-09-13 20:03:45', '2023-09-13 20:03:45', NULL, 2967, 2580),
(711, 'Microsoft - Microsoft 805334179715', 387, 1, 387, 0, 0.15, 58.05, NULL, 'SAR', 277, '2023-09-13 20:03:45', '2023-09-13 20:03:45', NULL, 445.05, 387),
(712, 'Domain Se rvice s - Domain Se rvice s 307329656923', 2801, 1, 2801, 0, 0.15, 420.15, NULL, 'SAR', 278, '2023-09-13 20:04:35', '2023-09-13 20:04:35', NULL, 3221.15, 2801),
(713, 'Microsoft - Microsoft 805334179715', 270, 10, 2700, 120, 0.15, 387, NULL, 'SAR', 278, '2023-09-13 20:04:35', '2023-09-13 20:04:35', NULL, 2967, 2580),
(714, 'Microsoft - Microsoft 805334179715', 387, 1, 387, 0, 0.15, 58.05, NULL, 'SAR', 278, '2023-09-13 20:04:35', '2023-09-13 20:04:35', NULL, 445.05, 387),
(715, 'Domain Se rvice s - Domain Se rvice s 307329656923', 2801, 1, 2801, 0, 0.15, 420.15, NULL, 'SAR', 279, '2023-09-14 08:16:05', '2023-09-14 08:16:05', NULL, 3221.15, 2801),
(716, 'Microsoft - Microsoft 805334179715', 270, 10, 2700, 120, 0.15, 387, NULL, 'SAR', 279, '2023-09-14 08:16:05', '2023-09-14 08:16:05', NULL, 2967, 2580),
(717, 'Microsoft - Microsoft 805334179715', 387, 1, 387, 0, 0.15, 58.05, NULL, 'SAR', 279, '2023-09-14 08:16:05', '2023-09-14 08:16:05', NULL, 445.05, 387),
(718, 'Domain Se rvice s - Domain Se rvice s 307329656923', 2801, 1, 2801, 0, 0.15, 420.15, NULL, 'SAR', 280, '2023-09-18 16:26:21', '2023-09-18 16:26:21', NULL, 3221.15, 2801),
(719, 'Microsoft - Microsoft 805334179715', 270, 10, 2700, 120, 0.15, 387, NULL, 'SAR', 280, '2023-09-18 16:26:21', '2023-09-18 16:26:21', NULL, 2967, 2580),
(720, 'Microsoft - Microsoft 805334179715', 387, 1, 387, 0, 0.15, 58.05, NULL, 'SAR', 280, '2023-09-18 16:26:21', '2023-09-18 16:26:21', NULL, 445.05, 387);

-- --------------------------------------------------------

--
-- Table structure for table `isg_company_profile_data`
--

CREATE TABLE `isg_company_profile_data` (
  `id` int NOT NULL,
  `company_name` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ACTIVE` enum('0','1') DEFAULT '0',
  `company_code` varchar(10) NOT NULL,
  `bsiness_name` varchar(45) DEFAULT NULL,
  `email_id` varchar(45) DEFAULT NULL,
  `contact_name` varchar(45) DEFAULT NULL,
  `contact_number` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `cr_number` varchar(45) DEFAULT NULL,
  `cr_upload` mediumtext,
  `vat_number` varchar(45) DEFAULT NULL,
  `vat_certificate_upload` mediumtext,
  `business_logo_upload` mediumtext,
  `bank_name` varchar(45) DEFAULT NULL,
  `bank_account_number` varchar(45) DEFAULT NULL,
  `iban` varchar(45) DEFAULT NULL,
  `vat_rate` float DEFAULT '0.15',
  `currency` varchar(5) DEFAULT 'SAR'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `isg_company_profile_data`
--

INSERT INTO `isg_company_profile_data` (`id`, `company_name`, `created_at`, `updated_at`, `ACTIVE`, `company_code`, `bsiness_name`, `email_id`, `contact_name`, `contact_number`, `country`, `city`, `cr_number`, `cr_upload`, `vat_number`, `vat_certificate_upload`, `business_logo_upload`, `bank_name`, `bank_account_number`, `iban`, `vat_rate`, `currency`) VALUES
(4, 'ISG', NULL, '2023-06-25 06:44:14', '1', '100', 'شركة استراتيجيات المعلومات', 'raed@isglobal.co', 'Raed', '+966050', 'KSA', 'Jed', NULL, 'YY22', '66666666666', 'AAA666', 'isg.png', 'Al Ahli', NULL, 'IBAN099900', 0, 'SAR'),
(5, 'Mirror', NULL, NULL, '1', '200', 'Mirror', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.15, 'SAR'),
(9, 'ISG1688405103', '2023-07-03 17:25:03', '2023-09-12 14:40:26', NULL, '1688405103', 'شركة استراتيجيات المعلومات', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '302008513600003', NULL, NULL, NULL, NULL, NULL, 0.15, 'SAR'),
(10, 'Test Root1688411607', '2023-07-03 19:13:27', '2023-07-03 19:16:44', NULL, '1688411607', 'شركتى', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.15, NULL),
(11, 'شركة استراتيجيات المعلومات1688640644', '2023-07-06 10:50:44', '2023-07-06 10:50:44', '1', '1688640644', 'شركة استراتيجيات المعلومات', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `isg_customer_master_data`
--

CREATE TABLE `isg_customer_master_data` (
  `id` int NOT NULL,
  `customer_number` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `tel_no` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `adress1` varchar(200) DEFAULT NULL,
  `adress2` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `company_profile_data_id` int DEFAULT NULL,
  `company_code` varchar(10) DEFAULT NULL,
  `company_name` varchar(45) DEFAULT NULL,
  `company_name_ar` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `website` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `contact` varchar(45) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `vat_number` varchar(45) DEFAULT NULL,
  `history` varchar(200) DEFAULT NULL,
  `notes` mediumtext,
  `customer_type` enum('b2c','b2b') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `isg_customer_master_data`
--

INSERT INTO `isg_customer_master_data` (`id`, `customer_number`, `first_name`, `last_name`, `tel_no`, `email`, `adress1`, `adress2`, `created_at`, `updated_at`, `company_profile_data_id`, `company_code`, `company_name`, `company_name_ar`, `country`, `city`, `website`, `phone`, `contact`, `position`, `vat_number`, `history`, `notes`, `customer_type`) VALUES
(50, 'Customer 1', NULL, NULL, '+966', 'a.kamal@isglobal.co', 'Egypt', 'Cairo', '2023-03-28 23:36:50', '2023-03-28 23:36:50', NULL, '100', 'ISG', 'شركة 1', 'ksa', 'jed', 'isg.com', '+20', 'Ahmed Kamal', 'TPM', '98888', 'History...', 'My Notes...', 'b2b'),
(51, 'Raed El Mashhadi', NULL, NULL, '+966', 'raed@isglobal.co', 'KSA, Jeddah', 'Riyadh', '2023-03-31 01:15:48', '2023-03-31 01:15:48', NULL, '100', 'ISG LLC', 'شركة تكنولوجيا المعلومات', 'ksa', 'jed', 'isg.co', '+0100', 'Raed El Mashhadi', 'CEO', '302008513600003', 'History....example', 'Notes....example', 'b2b'),
(52, 'My Customer', NULL, NULL, '+201002521807', NULL, NULL, NULL, '2023-06-02 16:06:30', '2023-06-02 16:06:30', NULL, '100', NULL, NULL, 'ksa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'b2b'),
(53, '100', NULL, NULL, '20', 'akamal@isglobal.co', 'Egypt', 'Cairo', '2023-06-02 16:06:49', '2023-06-02 16:06:49', NULL, '100', 'ISG', 'شركة اى اس جى', 'Saudi Arabia', 'Jeddah', 'https://isglobal.co', '966', 'Ahmed', 'TPM', '999', 'History', 'Notes', 'b2b'),
(54, '200', NULL, NULL, '20', 'akamal@isglobal.co', 'Egypt', 'Cairo', '2023-06-02 16:06:49', '2023-06-02 16:06:49', NULL, '100', 'ISG', 'شركة اى اس جى', 'Saudi Arabia', 'Jeddah', 'https://isglobal.co', '966', 'Ahmed', 'TPM', '999', 'History', 'Notes', 'b2b'),
(55, '300', NULL, NULL, '20', 'akamal@isglobal.co', 'Egypt', 'Cairo', '2023-06-02 16:06:49', '2023-06-02 16:06:49', NULL, '100', 'ISG', 'شركة اى اس جى', 'Saudi Arabia', 'Jeddah', 'https://isglobal.co', '966', 'Ahmed', 'TPM', '999', 'History', 'Notes', 'b2b'),
(56, '400', NULL, NULL, '20', 'akamal@isglobal.co', 'Egypt', 'Cairo', '2023-06-02 16:06:49', '2023-06-02 16:06:49', NULL, '100', 'ISG', 'شركة اى اس جى', 'Saudi Arabia', 'Jeddah', 'https://isglobal.co', '966', 'Ahmed', 'TPM', '999', 'History', 'Notes', 'b2b'),
(57, '500', NULL, NULL, '20', 'akamal@isglobal.co', 'Egypt', 'Cairo', '2023-06-02 16:06:49', '2023-06-02 16:06:49', NULL, '100', 'ISG', 'شركة اى اس جى', 'Saudi Arabia', 'Jeddah', 'https://isglobal.co', '966', 'Ahmed', 'TPM', '999', 'History', 'Notes', 'b2b'),
(58, '600', NULL, NULL, '20', 'akamal@isglobal.co', 'Egypt', 'Cairo', '2023-06-02 16:06:49', '2023-06-02 16:06:49', NULL, '100', 'ISG', 'شركة اى اس جى', 'Saudi Arabia', 'Jeddah', 'https://isglobal.co', '966', 'Ahmed', 'TPM', '999', 'History', 'Notes', 'b2b'),
(59, 'My Customer', NULL, NULL, '+201002521807', NULL, NULL, NULL, '2023-06-02 16:06:57', '2023-06-02 16:06:57', NULL, '100', NULL, NULL, 'ksa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'b2b');

-- --------------------------------------------------------

--
-- Table structure for table `isg_discount_model`
--

CREATE TABLE `isg_discount_model` (
  `id` int NOT NULL,
  `percent` float DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `is_active` enum('0','1') DEFAULT NULL,
  `active_from` datetime DEFAULT NULL,
  `active_to` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_failed_jobs`
--

CREATE TABLE `isg_failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `isg_invoice`
--

CREATE TABLE `isg_invoice` (
  `id` int NOT NULL,
  `invoice_header` varchar(45) DEFAULT NULL,
  `invoice_text` mediumtext,
  `invoice_amount` float DEFAULT NULL,
  `invoice_type` enum('Free','Paid') NOT NULL DEFAULT 'Paid',
  `invoice_status` enum('P','NP','PP') DEFAULT 'NP',
  `user_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `gross_amount` float DEFAULT NULL,
  `order_master_id` int DEFAULT NULL,
  `order_no` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_invoice_details`
--

CREATE TABLE `isg_invoice_details` (
  `id` int NOT NULL,
  `invoice_header` varchar(45) DEFAULT NULL,
  `invoice_text` mediumtext,
  `invoice_amount` float DEFAULT NULL,
  `invoice_type` enum('Free','Paid') DEFAULT 'Paid',
  `invoice_status` enum('P','NP','PP') DEFAULT 'NP',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `tax_percent` float DEFAULT NULL,
  `gross_amount` float DEFAULT NULL,
  `invoice_id` int NOT NULL,
  `order_master_id` int DEFAULT NULL,
  `order_details_id` int DEFAULT NULL,
  `order_no` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_item_master`
--

CREATE TABLE `isg_item_master` (
  `id` int NOT NULL,
  `item_name` varchar(45) NOT NULL,
  `price` float DEFAULT NULL,
  `tax_included` enum('0','1') DEFAULT '0',
  `item_description` mediumtext,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `currency_code` varchar(5) DEFAULT NULL,
  `tax_id` int DEFAULT NULL,
  `item_type` enum('service','item') DEFAULT 'item',
  `company_profile_data_id` int DEFAULT NULL,
  `company_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `isg_item_master`
--

INSERT INTO `isg_item_master` (`id`, `item_name`, `price`, `tax_included`, `item_description`, `created_at`, `updated_at`, `currency_code`, `tax_id`, `item_type`, `company_profile_data_id`, `company_code`) VALUES
(86, 'Technical Support', 500, NULL, 'Technical Support. Post Go Live', '2023-03-28 23:38:59', '2023-03-28 23:38:59', 'SAR', NULL, 'service', NULL, '100'),
(87, 'API Development', 1000, NULL, 'API Development Service', '2023-03-31 00:34:26', '2023-03-31 00:34:26', 'SAR', NULL, 'service', NULL, '100'),
(88, 'New Item', 500, NULL, 'New Item. Desc', '2023-03-31 01:27:32', '2023-03-31 01:27:32', 'SAR', NULL, 'service', NULL, '100'),
(89, 'Hair Cut', 50, NULL, 'Hair Cut. Mirror', '2023-03-31 01:27:41', '2023-03-31 01:27:41', 'SAR', NULL, 'service', NULL, '100'),
(90, 'Hair Cut', 50, NULL, 'Hair Cut. Mirror', '2023-03-31 01:27:41', '2023-03-31 01:27:41', 'SAR', NULL, 'service', NULL, '100'),
(91, 'Hair Cut', 50, NULL, 'Hair Cut. Mirror', '2023-03-31 01:27:41', '2023-03-31 01:27:41', 'SAR', NULL, 'service', NULL, '100'),
(92, 'Hair Cut', 50, NULL, 'Hair Cut. Mirror', '2023-03-31 01:27:41', '2023-03-31 01:27:41', 'SAR', NULL, 'service', NULL, '100'),
(93, 'Hair Cut', 50, NULL, 'Hair Cut. Mirror', '2023-03-31 01:27:41', '2023-03-31 01:27:41', 'SAR', NULL, 'service', NULL, '100'),
(94, 'Test', 100, NULL, 'Test', '2023-03-31 01:28:30', '2023-03-31 01:28:30', 'SAR', NULL, 'service', NULL, '100'),
(95, 'Test', 100, NULL, 'Test', '2023-03-31 01:28:35', '2023-03-31 01:28:35', 'SAR', NULL, 'service', NULL, '100'),
(96, 'Test', 100, NULL, 'Test', '2023-03-31 01:28:40', '2023-03-31 01:28:40', 'SAR', NULL, 'service', NULL, '100'),
(97, 'Planning', 899, NULL, 'Planning', '2023-04-03 01:24:57', '2023-04-03 01:24:57', 'SAR', NULL, 'service', NULL, '100'),
(98, 'Planning', 899, NULL, 'Planning', '2023-04-03 01:25:05', '2023-04-03 01:25:05', 'SAR', NULL, 'service', NULL, '100'),
(99, 'Product 1', 100, NULL, 'Product 1 Description', '2023-05-31 20:38:26', '2023-05-31 20:38:26', 'SAR', NULL, 'item', NULL, '100'),
(100, 'Product 1', 100, NULL, 'Product 1 Description', '2023-05-31 20:38:59', '2023-05-31 20:38:59', 'SAR', NULL, 'item', NULL, '100'),
(101, 'Technical Support', 899, NULL, 'Planning', '2023-05-31 22:39:51', '2023-05-31 22:39:51', 'SAR', NULL, 'service', NULL, '100'),
(102, 'API Development', 100899, NULL, 'API Development', '2023-05-31 22:40:11', '2023-05-31 22:40:11', 'SAR', NULL, 'service', NULL, '100'),
(103, 'Product 3', 444, NULL, 'Product 3', '2023-05-31 22:40:36', '2023-05-31 22:40:36', 'SAR', NULL, 'item', NULL, '100'),
(104, 'Product 5', 444, NULL, 'Product 5', '2023-06-01 10:18:04', '2023-06-01 10:18:04', 'SAR', NULL, 'item', NULL, '100'),
(105, 'Apple Macbook Pro 13 Inch', 500, NULL, 'Description Apple Macbook Pro 13 Inch', '2023-07-03 17:55:37', '2023-07-03 17:55:37', 'SAR', NULL, 'item', NULL, '1688405103'),
(106, 'Apple Macbook Pro 13 Inch', 500, NULL, 'Description Apple Macbook Pro 13 Inch', '2023-07-03 17:55:37', '2023-07-03 17:55:37', 'SAR', NULL, 'item', NULL, '1688405103'),
(107, 'Apple Macbook Pro 13 Inch', 500, NULL, 'Description Apple Macbook Pro 13 Inch', '2023-07-03 17:55:37', '2023-07-03 17:55:37', 'SAR', NULL, 'item', NULL, '1688405103'),
(108, 'Apple Macbook Pro 13 Inch', 500, NULL, 'Description Apple Macbook Pro 13 Inch', '2023-07-03 17:55:37', '2023-07-03 17:55:37', 'SAR', NULL, 'item', NULL, '1688405103'),
(109, 'Apple Macbook Pro 13 Inch', 500, NULL, 'Description Apple Macbook Pro 13 Inch', '2023-07-03 17:55:37', '2023-07-03 17:55:37', 'SAR', NULL, 'item', NULL, '1688405103'),
(110, 'Apple Macbook Pro 13 Inch', 500, NULL, 'Description Apple Macbook Pro 13 Inch', '2023-07-03 17:55:37', '2023-07-03 17:55:37', 'SAR', NULL, 'item', NULL, '1688405103'),
(111, 'Apple Macbook Pro 13 Inch', 500, NULL, 'Description Apple Macbook Pro 13 Inch', '2023-07-06 10:45:06', '2023-07-06 10:45:06', 'SAR', NULL, 'item', NULL, '1688405103'),
(112, 'Apple Macbook Pro 13 Inch', 500, NULL, 'Description Apple Macbook Pro 13 Inch', '2023-07-06 10:45:06', '2023-07-06 10:45:06', 'SAR', NULL, 'item', NULL, '1688405103'),
(113, 'Apple Macbook Pro 13 Inch', 500, NULL, 'Description Apple Macbook Pro 13 Inch', '2023-07-06 10:45:06', '2023-07-06 10:45:06', 'SAR', NULL, 'item', NULL, '1688405103'),
(114, 'Apple Macbook Pro 13 Inch', 500, NULL, 'Description Apple Macbook Pro 13 Inch', '2023-07-06 10:45:06', '2023-07-06 10:45:06', 'SAR', NULL, 'item', NULL, '1688405103'),
(115, 'Apple Macbook Pro 13 Inch', 500, NULL, 'Description Apple Macbook Pro 13 Inch', '2023-07-06 10:45:06', '2023-07-06 10:45:06', 'SAR', NULL, 'item', NULL, '1688405103'),
(116, 'Apple Macbook Pro 13 Inch', 500, NULL, 'Description Apple Macbook Pro 13 Inch', '2023-07-06 10:45:06', '2023-07-06 10:45:06', 'SAR', NULL, 'item', NULL, '1688405103');

-- --------------------------------------------------------

--
-- Table structure for table `isg_item_vendor`
--

CREATE TABLE `isg_item_vendor` (
  `id` int NOT NULL,
  `vendor_master_id` int NOT NULL,
  `item_master_id` int DEFAULT NULL,
  `basic_price` float DEFAULT NULL,
  `tax_included` enum('0','1') DEFAULT NULL,
  `tax_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `currency_code` varchar(5) DEFAULT NULL,
  `vendor_services_id` int DEFAULT NULL,
  `item_name` varchar(45) DEFAULT NULL,
  `gross_price` float DEFAULT NULL,
  `item_image` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_membership`
--

CREATE TABLE `isg_membership` (
  `id` int NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_migrations`
--

CREATE TABLE `isg_migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `isg_order_basket`
--

CREATE TABLE `isg_order_basket` (
  `id` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `deleted` enum('0','1') DEFAULT '0',
  `item_vendor_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `status` enum('InProgress','Completed','Cancelled') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_order_details`
--

CREATE TABLE `isg_order_details` (
  `id` int NOT NULL,
  `order_text` mediumtext,
  `order_master_id` int NOT NULL,
  `item_vendor_id` int NOT NULL,
  `item_master_id` int DEFAULT NULL,
  `basic_price` float DEFAULT NULL,
  `gross_price` varchar(45) DEFAULT NULL,
  `tax_included` enum('1','0') DEFAULT NULL,
  `item_name` varchar(45) DEFAULT NULL,
  `currency_code` varchar(5) DEFAULT NULL,
  `tax_id` int DEFAULT NULL,
  `tax_amount` float DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `total_discount` float DEFAULT NULL,
  `discount_model_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_order_master`
--

CREATE TABLE `isg_order_master` (
  `id` int NOT NULL,
  `order_no` int NOT NULL,
  `order_text` mediumtext,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `total_net_price` float DEFAULT NULL,
  `total_gross_price` float DEFAULT NULL,
  `order_status` enum('InProgress','Completed') DEFAULT 'InProgress',
  `user_id` int DEFAULT NULL,
  `total_discount` float DEFAULT NULL,
  `discount_model_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_payment_checkout`
--

CREATE TABLE `isg_payment_checkout` (
  `id` int NOT NULL,
  `status` varchar(5) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `emailFlag` varchar(2) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `gender` varchar(5) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `payment_vendor_master_invoice_id` int DEFAULT NULL,
  `payment_vendor_master_invoice_type` enum('Free','Paid') DEFAULT NULL,
  `checkout_info_first_name` varchar(100) DEFAULT NULL,
  `checkout_info_last_name` varchar(100) DEFAULT NULL,
  `checkout_info_mobile_number` varchar(25) DEFAULT NULL,
  `checkout_info_promo_code` varchar(15) DEFAULT NULL,
  `checkout_info_email` varchar(100) DEFAULT NULL,
  `total_price` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `payment_vendor_master_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_payment_payee`
--

CREATE TABLE `isg_payment_payee` (
  `id` int NOT NULL,
  `payee_name` varchar(200) NOT NULL,
  `user_id` int DEFAULT NULL,
  `isg_service_subscriber_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `isg_payment_provider_config`
--

CREATE TABLE `isg_payment_provider_config` (
  `id` int NOT NULL,
  `provider_name` varchar(45) DEFAULT NULL,
  `shopper_url` mediumtext,
  `checkout_url` varchar(200) DEFAULT NULL,
  `entity_id` varchar(45) DEFAULT NULL,
  `currency` varchar(3) DEFAULT NULL,
  `payment_type` varchar(3) DEFAULT NULL,
  `test_mode` varchar(20) DEFAULT NULL,
  `customer_email` varchar(45) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `payment_url` varchar(200) DEFAULT NULL,
  `status` enum('Active','InActive') DEFAULT 'InActive',
  `target_server` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `isg_payment_user_configuration`
--

CREATE TABLE `isg_payment_user_configuration` (
  `id` int NOT NULL,
  `user_id` int NOT NULL DEFAULT '0',
  `payment_brand_name` varchar(20) DEFAULT NULL,
  `url` mediumtext,
  `entity_id` varchar(200) DEFAULT NULL,
  `card_number` varchar(200) DEFAULT NULL,
  `card_holder` varchar(200) DEFAULT NULL,
  `card_expiry_month` varchar(2) DEFAULT NULL,
  `card_expiry_year` varchar(4) DEFAULT NULL,
  `card_cvv` varchar(3) DEFAULT NULL,
  `registration_id` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_payment_user_invoice`
--

CREATE TABLE `isg_payment_user_invoice` (
  `id` int NOT NULL,
  `currency_code` varchar(5) NOT NULL,
  `payee_amount` float NOT NULL,
  `payment_payee_id` int NOT NULL,
  `invoice_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `payee_name` varchar(45) DEFAULT NULL,
  `invoice_user_name` varchar(45) DEFAULT NULL,
  `invoice_details_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `isg_payment_vendor_details`
--

CREATE TABLE `isg_payment_vendor_details` (
  `id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `message` mediumtext,
  `payment_vendor_master_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `isg_payment_vendor_master`
--

CREATE TABLE `isg_payment_vendor_master` (
  `id` int NOT NULL,
  `session_id` varchar(200) DEFAULT NULL,
  `UUID` varchar(100) NOT NULL,
  `status` enum('COUT','INPG','COMP','REJD') DEFAULT NULL,
  `message` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `invoice_id` int DEFAULT NULL,
  `payment_payee_id` int DEFAULT NULL,
  `einvoice_header_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `isg_permission`
--

CREATE TABLE `isg_permission` (
  `id` int NOT NULL,
  `role_id` int NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `module` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `membership_id` int DEFAULT NULL,
  `can_update` enum('0','1') DEFAULT '0',
  `can_delete` enum('0','1') DEFAULT '0',
  `can_create_user` enum('0','1') DEFAULT '0',
  `can_create_company` enum('0','1') DEFAULT '0',
  `can_view_einvoice_b2b` enum('0','1') DEFAULT '0',
  `can_view_einvoice_b2c` enum('0','1') DEFAULT '0',
  `can_add_b2c` enum('0','1') DEFAULT '0',
  `can_add_b2b` enum('0','1') DEFAULT '0',
  `can_view_item_master` enum('0','1') DEFAULT '0',
  `can_view_service_master` enum('0','1') DEFAULT '0',
  `can_view_vendor_master` enum('0','1') DEFAULT '0',
  `can_view_customer_master_b2b` enum('0','1') DEFAULT '0',
  `can_view_customer_master_b2c` enum('0','1') DEFAULT '0',
  `can_view_item_vendor` enum('0','1') DEFAULT '0',
  `can_view_user_profile` enum('0','1') DEFAULT '0',
  `can_provide_view_pages_access` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `isg_permission`
--

INSERT INTO `isg_permission` (`id`, `role_id`, `title`, `module`, `description`, `created_at`, `updated_at`, `membership_id`, `can_update`, `can_delete`, `can_create_user`, `can_create_company`, `can_view_einvoice_b2b`, `can_view_einvoice_b2c`, `can_add_b2c`, `can_add_b2b`, `can_view_item_master`, `can_view_service_master`, `can_view_vendor_master`, `can_view_customer_master_b2b`, `can_view_customer_master_b2c`, `can_view_item_vendor`, `can_view_user_profile`, `can_provide_view_pages_access`) VALUES
(2, 1, 'Root Account', 'All', 'Root Account', '2022-10-17 23:47:54', '2022-10-17 23:47:55', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(3, 2, 'User Account', 'Custom', 'User Account', '2022-10-18 00:00:18', '2022-10-18 00:00:19', NULL, '1', '1', '0', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `isg_privacy_policy_header`
--

CREATE TABLE `isg_privacy_policy_header` (
  `id` int NOT NULL,
  `title` mediumtext,
  `content` text,
  `privacy_policy_template_id` int DEFAULT NULL,
  `privacy_policy_questionnaire_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `active` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_privacy_policy_lines`
--

CREATE TABLE `isg_privacy_policy_lines` (
  `id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `privacy_policy_header_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `active` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_privacy_policy_questionnaire`
--

CREATE TABLE `isg_privacy_policy_questionnaire` (
  `id` int NOT NULL,
  `business_type` varchar(200) DEFAULT NULL,
  `application_type` varchar(45) DEFAULT NULL,
  `website_url` varchar(45) DEFAULT NULL,
  `advertising` enum('0','1') DEFAULT NULL,
  `social_media_facebook` enum('0','1') DEFAULT NULL,
  `social_media_instgram` enum('0','1') DEFAULT NULL,
  `social_media_twitter` enum('0','1') DEFAULT NULL,
  `social_media_linkedin` enum('0','1') DEFAULT NULL,
  `social_media_youtube` enum('0','1') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `active` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_privacy_policy_template`
--

CREATE TABLE `isg_privacy_policy_template` (
  `id` int NOT NULL,
  `title` mediumtext,
  `content` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `active` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_role`
--

CREATE TABLE `isg_role` (
  `id` int NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `isg_role`
--

INSERT INTO `isg_role` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Root Account', 'Root Account', '2022-10-17 23:40:52', '2022-10-17 23:40:53'),
(2, 'User Account', 'User Account', '2022-10-17 23:59:07', '2022-10-17 23:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `isg_root_account`
--

CREATE TABLE `isg_root_account` (
  `id` int NOT NULL,
  `company_name` varchar(45) DEFAULT NULL,
  `root_account_code` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `company_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `isg_root_account`
--

INSERT INTO `isg_root_account` (`id`, `company_name`, `root_account_code`, `created_at`, `updated_at`, `company_code`) VALUES
(4, 'ISG', '88888999990000411332aaa333001130', '2022-10-17 23:28:42', '2022-10-17 23:28:43', '100'),
(5, 'Mirror', 'm800659881000aayyuu0521541000', '2022-10-17 23:29:01', '2022-10-17 23:29:02', '200'),
(12, 'ISG1688405103', '1688405103', '2023-07-03 17:25:03', '2023-07-03 17:25:03', '1688405103'),
(13, 'Test Root1688411607', '1688411607', '2023-07-03 19:13:27', '2023-07-03 19:13:27', '1688411607'),
(14, 'شركة استراتيجيات المعلومات1688640644', '1688640644', '2023-07-06 10:50:44', '2023-07-06 10:50:44', '1688640644');

-- --------------------------------------------------------

--
-- Table structure for table `isg_service_item`
--

CREATE TABLE `isg_service_item` (
  `id` int NOT NULL,
  `service_name` varchar(45) DEFAULT NULL,
  `service_name_ar` varchar(45) DEFAULT NULL,
  `service_price` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_service_plan`
--

CREATE TABLE `isg_service_plan` (
  `id` int NOT NULL,
  `plan_name` varchar(45) DEFAULT NULL,
  `plan_name_ar` varchar(45) DEFAULT NULL,
  `is_active` enum('0','1') DEFAULT NULL,
  `total_price` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_service_plan_items`
--

CREATE TABLE `isg_service_plan_items` (
  `id` int NOT NULL,
  `isg_service_plan_id` int NOT NULL,
  `isg_service_item_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_service_plan_subscriber`
--

CREATE TABLE `isg_service_plan_subscriber` (
  `id` int NOT NULL,
  `isg_service_plan_id` int NOT NULL,
  `isg_service_subscriber_id` int NOT NULL,
  `active_from` datetime DEFAULT NULL,
  `active_to` datetime DEFAULT NULL,
  `is_active` enum('0','1') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_service_subscriber`
--

CREATE TABLE `isg_service_subscriber` (
  `id` int NOT NULL,
  `subscriber_name` varchar(45) DEFAULT NULL,
  `email_id` varchar(45) DEFAULT NULL,
  `tell_no` varchar(45) DEFAULT NULL,
  `isg_user_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_signup_staging`
--

CREATE TABLE `isg_signup_staging` (
  `id` int NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile_no` varchar(20) DEFAULT NULL,
  `business_type` varchar(100) DEFAULT NULL,
  `otp` varchar(6) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `org_name` varchar(100) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `status` enum('signup','otp','finish') NOT NULL DEFAULT 'signup',
  `signup_type` enum('email','mobile') NOT NULL DEFAULT 'email',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `isg_signup_staging`
--

INSERT INTO `isg_signup_staging` (`id`, `email`, `mobile_no`, `business_type`, `otp`, `name`, `org_name`, `password`, `status`, `signup_type`, `created_at`, `updated_at`) VALUES
(54, 'a.kamal@isglobal.co', NULL, NULL, '3254', NULL, NULL, NULL, 'signup', 'email', '2023-03-23 20:11:47', '2023-08-31 00:09:06'),
(55, 'ahmedkamal.cs@gmail.com', NULL, NULL, '8202', NULL, NULL, NULL, 'otp', 'email', '2023-03-23 20:18:35', '2023-07-03 17:24:54'),
(56, 'Raed.dba@gmail.com', NULL, NULL, '6482', NULL, NULL, NULL, 'otp', 'email', '2023-05-28 09:23:37', '2023-05-28 09:24:14'),
(57, 'test1@gmail.com', NULL, NULL, '5376', NULL, NULL, NULL, 'otp', 'email', '2023-07-03 18:07:51', '2023-07-03 18:08:07'),
(58, 'test2@gmail.com', NULL, NULL, '3319', NULL, NULL, NULL, 'otp', 'email', '2023-07-03 19:09:19', '2023-07-03 19:09:34'),
(59, 'testroot@gmail.com', NULL, NULL, '7012', NULL, NULL, NULL, 'otp', 'email', '2023-07-03 19:13:00', '2023-07-03 19:13:15'),
(60, 'test5@isglobal.co', NULL, NULL, '3368', NULL, NULL, NULL, 'otp', 'email', '2023-07-03 19:15:07', '2023-07-03 19:15:16'),
(61, 'support@isglobal.co', NULL, NULL, '5758', NULL, NULL, NULL, 'otp', 'email', '2023-07-06 10:50:07', '2023-07-06 10:50:26'),
(62, 'info@isglobal.co', NULL, NULL, '3161', NULL, NULL, NULL, 'otp', 'email', '2023-07-06 10:53:04', '2023-07-06 10:53:17');

-- --------------------------------------------------------

--
-- Table structure for table `isg_system_series`
--

CREATE TABLE `isg_system_series` (
  `id` int NOT NULL,
  `series_name` varchar(45) NOT NULL,
  `last_number` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `isg_system_series`
--

INSERT INTO `isg_system_series` (`id`, `series_name`, `last_number`) VALUES
(3, 'ORDER_NO_S', 100),
(4, 'EInvoice_NO_S', 329);

-- --------------------------------------------------------

--
-- Table structure for table `isg_tax`
--

CREATE TABLE `isg_tax` (
  `id` int NOT NULL,
  `amount` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_active` enum('0','1') DEFAULT '0',
  `tax_type` varchar(45) DEFAULT 'VAT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_user`
--

CREATE TABLE `isg_user` (
  `id` int NOT NULL,
  `user_email` varchar(45) DEFAULT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `user_phone_no` varchar(20) DEFAULT NULL,
  `password` mediumtext,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `user_active` enum('1','0') DEFAULT '0',
  `user_last_login` datetime DEFAULT NULL,
  `is_email_verified` enum('0','1') DEFAULT '0',
  `is_phone_verified` enum('0','1') DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `role_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `isg_user`
--

INSERT INTO `isg_user` (`id`, `user_email`, `user_name`, `user_phone_no`, `password`, `first_name`, `last_name`, `user_active`, `user_last_login`, `is_email_verified`, `is_phone_verified`, `created_at`, `updated_at`, `role_id`) VALUES
(5, NULL, '', '+011495231488', '$2y$10$iLOHDMuFkPmikJ9MZsHIqeN/bfDS2sincr3Q6yBsrgRToKHMbS8XO', 'saad mohamed saad aly', NULL, '1', NULL, NULL, '1', '2023-12-20 00:30:18', '2023-12-20 00:30:18', NULL),
(6, NULL, '', '+01149523144', '$2y$10$BRPqd1L3w74cxVr5ruCd.e/i5j4.L/k9wRihe8HXMfBDFnLP7yire', 'saad mohamed saad aly', NULL, '1', NULL, NULL, '1', '2023-12-21 14:08:43', '2023-12-21 14:08:43', NULL),
(7, NULL, '', '+01149523143', '$2y$10$1YkqZgkTdX63VIWjO5OXxOTXELUlO4GVuWNxFowdxUvKDNrI0czFG', 'saad mohamed saad aly', NULL, '1', NULL, NULL, '1', '2024-01-07 21:11:04', '2024-01-07 21:32:42', NULL),
(8, NULL, '', '+01149523151', '$2y$10$pHob7THSVsRftHC.4nPlvOOzrWYKDZFTyrdF0ObodCeXfBHO4uv8S', 'employee name', NULL, '1', NULL, NULL, '1', '2024-01-07 21:45:22', '2024-01-07 21:46:45', NULL),
(9, NULL, '', '+01149523152', '$2y$10$vRudZX4hEZaba0veZ4eU..chSffpdPyH6vaSsKToZuN3zMu9qPrxS', 'employee name', NULL, '0', NULL, NULL, '0', '2024-01-07 21:49:49', '2024-01-07 21:49:49', NULL),
(10, NULL, '', '+01149523158', '$2y$10$sO5rykINTtgZMqtzN9zqruFhWd/RDToB10vbTBQHUWMQFrxqgIWGW', 'employee name', NULL, '1', NULL, NULL, '1', '2024-01-07 22:00:06', '2024-01-07 22:01:29', NULL),
(11, NULL, '', '+1', '$2y$10$P3ySnFqIq5XKvKrMBxWtr.hT3bTrhTPkzc0ldzpkgsWlxYm8/fqIm', 'user name', NULL, '1', NULL, NULL, '1', '2024-01-10 22:17:59', '2024-01-10 22:18:19', NULL),
(12, NULL, '', '+2', '$2y$10$3lKq09how4wiYMRWISoX.evsxZqHK/pwIhlgUOIistrGo9fkgAGqm', 'user name', NULL, '1', NULL, NULL, '1', '2024-01-13 01:21:38', '2024-01-13 01:21:50', NULL),
(13, NULL, '', '+20100000999', '$2y$10$TL7MEs8yQk0S//DMNtvkWOyu2xRoHohDfKudsq0tb.gTKWV0xbmom', 'Ahmed Kamal', NULL, '1', NULL, NULL, '1', '2024-01-20 13:57:00', '2024-12-17 06:43:40', NULL),
(14, NULL, '', '+0566666666', '$2y$10$RuVeKccmNOT2/SM2eZ/iA.P8jlvscA7.9vSyv7cpOu.4YilGvcPAu', 'Sarmad', NULL, '1', NULL, NULL, '1', '2024-01-20 16:02:17', '2024-01-20 16:02:25', NULL),
(15, NULL, '', '+0577777777', '$2y$10$h/N6Pf4HY7JisheI8hpUzOmocT1kqEB2WFJ2ByYLgPVEgkr3L3/Ga', 'm', NULL, '0', NULL, NULL, '0', '2024-01-22 15:57:01', '2024-01-22 15:57:01', NULL),
(16, NULL, '', '+0577777778', '$2y$10$ZxJ60GQ0r1Ry12rvYSAmme.0x0CATlBEGaU00G1lY8LwRW2U/j32K', 'm', NULL, '1', NULL, NULL, '1', '2024-01-22 15:57:16', '2024-01-22 15:57:20', NULL),
(17, NULL, '', '+0523111111', '$2y$10$WvrYwr.Tw9bncBeV8.lsLeR2PlD4g85GXVwLKkQrJ41OSq3wB5NoW', 'g', NULL, '1', NULL, NULL, '1', '2024-01-22 15:59:10', '2024-01-22 15:59:14', NULL),
(18, NULL, '', '+0588888888', '$2y$10$xMsHDmJGdp8E.lN3Yu2Ef./S4TaxjE6BRpXWjJuPEQ1/P4NJbJNFK', 'S', NULL, '1', NULL, NULL, '1', '2024-01-22 16:23:52', '2024-01-22 16:23:59', NULL),
(19, NULL, '', '+0566444444', '$2y$10$DdP2PuXQQKqhRk/6vxa/lulhhWkDjjXOUBky/43mqa06nQxqJO7Fa', 'h', NULL, '1', NULL, NULL, '1', '2024-01-22 16:39:25', '2024-01-22 16:39:31', NULL),
(20, NULL, '', '+0599999999', '$2y$10$U1Qaksa6FAdmJodRmdY7SeCA5..VJ9ol6UD88m8hE9zIuN3WRsszC', 'sarmad', NULL, '1', NULL, NULL, '1', '2024-01-23 12:17:36', '2024-01-23 12:17:43', NULL),
(21, NULL, '', '+0511223344', '$2y$10$NOJ.4WvP7696Zk0L05.6BOAQnGHAgg64SNfnEUg5Ylhn4YVMNWIFe', 'Sarmad', NULL, '1', NULL, NULL, '1', '2024-01-23 12:19:19', '2024-01-23 12:19:23', NULL),
(22, NULL, '', '+0566778899', '$2y$10$4pOdbBV6u41tfvY/WYJIQuZjR5QfQMZSi9tdRGCdAQQorRf3r2Nce', 'Zubi', NULL, '0', NULL, NULL, '0', '2024-01-23 13:53:23', '2024-01-23 13:53:23', NULL),
(23, NULL, '', '+0566677788', '$2y$10$Z65GdTa8UodCZQnD4cFV8.IGJX4VOSIIOltEOssOljJVlnr.W3tg2', 'Zubi', NULL, '1', NULL, NULL, '1', '2024-01-23 13:53:51', '2024-01-23 13:53:55', NULL),
(24, NULL, '', '+0544112233', '$2y$10$umNyW4geiAo78P.W9dKZHuJ/a3FsZExIrQYyqmHmhFv15bstYMNNO', 'test', NULL, '1', NULL, NULL, '1', '2024-01-23 14:08:10', '2024-01-23 14:08:14', NULL),
(25, NULL, '', '+0588811133', '$2y$10$6tTxagdukiql6kiyv/zpeeHxN7ydou6kK7eNTKr9d/0EOt48pYv8m', 'sarmad', NULL, '1', NULL, NULL, '1', '2024-01-23 14:33:14', '2024-01-23 14:33:20', NULL),
(26, NULL, '', '+0511122200', '$2y$10$EKRfsPeJ0zNU4zWSLptK7em.obL8G5A98nNBTa/Vgdlh/fFd1pBi6', 'Sarmad', NULL, '1', NULL, NULL, '1', '2024-01-23 14:35:09', '2024-01-23 14:35:16', NULL),
(27, NULL, '', '+0543996969', '$2y$10$fwhPEElEahcnFIQTEcsBVOJTw/JLycl79Bf5hQymeERn9eRpVoUKG', 'Red', NULL, '1', NULL, NULL, '1', '2024-01-23 15:56:21', '2024-01-23 15:56:28', NULL),
(28, NULL, '', '+0541108111', '$2y$10$xiXfLmdTMwhgh1IGcWorD.EryI4u4ttDP17G/zfYFP9BjZPB6c4FW', 'Yousef', NULL, '1', NULL, NULL, '1', '2024-01-23 16:15:26', '2024-01-23 16:15:39', NULL),
(29, NULL, '', '+0566777811', '$2y$10$sSkvUPgKMlFiD/rXNoPob.WpfIeCbvP9UDh9a2QQdvAs/W6F8LhTS', 'gshsgh', NULL, '1', NULL, NULL, '1', '2024-01-24 11:28:20', '2024-01-24 11:28:26', NULL),
(30, NULL, '', '+0511144477', '$2y$10$zReEfBMP2SB2PMOkwOKmT.RxWwDcIRWW.cVdHSvSuJBRTrrEIepgS', 'sarmad', NULL, '1', NULL, NULL, '1', '2024-01-24 12:25:55', '2024-01-24 12:25:59', NULL),
(31, NULL, '', '+0522228888', '$2y$10$kA1qNsFubdVKnWlNalITRuSsTDhi850YCJe4KNqEZ0EDl8CTkdvvG', 'ggg', NULL, '1', NULL, NULL, '1', '2024-01-24 12:59:56', '2024-01-24 12:59:59', NULL),
(32, NULL, '', '+0588888555', '$2y$10$dg3tqHQaNXGvTZIVzytTuOXENc/gCU8f5krl2MpcujjqhgKInaSF6', 'sarmad', NULL, '1', NULL, NULL, '1', '2024-01-25 20:15:24', '2024-01-25 20:15:27', NULL),
(33, NULL, '', '+0533337777', '$2y$10$bO7J84OcX6qErlD.lksst.3Ehl8F1slK3.tmHEQQZcccCR1r1o9rW', 'sarmad', NULL, '1', NULL, NULL, '1', '2024-01-26 19:05:35', '2024-01-26 19:05:41', NULL),
(34, NULL, '', '+0599991111', '$2y$10$km.1EZxIpSoIsWSdaAgOCuS76kwHkuRsKjT.JVumIs3o0Ak6G4jwq', 'gg', NULL, '1', NULL, NULL, '1', '2024-01-26 19:24:26', '2024-01-26 19:24:38', NULL),
(35, NULL, '', '+0555555555', '$2y$10$dmZaZVMDlQtRzf0sNQE/v.Imt71VoxPTpsvE4l7m5P6QykRk9Qh2m', 'Raed', NULL, '1', NULL, NULL, '1', '2024-01-28 17:57:32', '2024-01-28 17:57:39', NULL),
(36, NULL, '', '+0577889966', '$2y$10$oXcO9AyouasaMsKgWi/K2ew3dLfqakO9zbWaXEBML.8yYlKxWhKeC', 'tfd', NULL, '1', NULL, NULL, '1', '2024-01-29 12:28:18', '2024-01-29 12:28:27', NULL),
(37, NULL, '', '+0522225555', '$2y$10$1ZyNd3DkyTAkIdo858f1surdjEcPEeKCE/WF0oREk9VVjPGPn6a.S', 'new   user', NULL, '1', NULL, NULL, '1', '2024-01-29 14:00:18', '2024-01-29 14:00:26', NULL),
(38, NULL, '', '+0544441234', '$2y$10$sVuH6IdyZt6N6sTY8dztt.CmeE2pSMtKXRpQrk6Qpuzu4lyTXQnna', 'hhh', NULL, '1', NULL, NULL, '1', '2024-01-29 14:19:25', '2024-01-29 14:19:30', NULL),
(39, NULL, '', '+0522448866', '$2y$10$A3yHOyEGi0H.6xR5WKBh6.Gjri72OCMjX9XGZAsiibnsehte9b4hK', 'sarmsr', NULL, '1', NULL, NULL, '1', '2024-01-29 14:22:32', '2024-01-29 14:22:39', NULL),
(40, NULL, '', '+0533445566', '$2y$10$EMkYTImBlNIWhpFbNY2xI.c2UFFz6JaOohGtqrhEnAlh3NS3tYn4q', 'Seanad', NULL, '1', NULL, NULL, '1', '2024-01-29 14:46:34', '2024-01-29 14:46:41', NULL),
(41, NULL, '', '+0544444444', '$2y$10$03YINmDvQ4tHa5I3Kw807O8aFR9cjS60EUqLt6gtFtl2iMrUkp4Ri', 'Red', NULL, '1', NULL, NULL, '1', '2024-01-30 16:19:29', '2024-01-30 16:19:33', NULL),
(42, NULL, '', '+0599112233', '$2y$10$JNvTpYQbZajJnSWPNc16De5eetDyLoG3DCdATnvy8FFmIAFuHSIQq', 'Ahmed', NULL, '1', NULL, NULL, '1', '2024-01-30 19:27:43', '2024-01-30 19:27:53', NULL),
(43, NULL, '', '+0587676787', '$2y$10$XJZiWZEzIGXJO8f5dpD82eLP7F2e5OsIewg23HAhSBh.IkBfVr9Q6', 'test', NULL, '1', NULL, NULL, '1', '2024-01-30 19:35:31', '2024-01-30 19:35:38', NULL),
(44, NULL, '', '+0544447777', '$2y$10$Nv23GWQyX3MR7Y.6SZWS3O6hmbGppfoDcpPA92J.kg7lOTqArssr.', 'Sarmad', NULL, '1', NULL, NULL, '1', '2024-01-30 19:59:10', '2024-01-30 19:59:14', NULL),
(45, NULL, '', '+0588008800', '$2y$10$0kLyiUYaW.fCcOEpmM/.KuHmaGEg6Khno/qhv1T3VFdGb3l/QKUTu', 'sarmad new', NULL, '1', NULL, NULL, '1', '2024-01-31 19:06:35', '2024-01-31 19:06:59', NULL),
(46, NULL, '', '+0534534534', '$2y$10$HweXFv7bHpqDTlveNJ5LBeRGtIiq2ykpQ9djIITSOwJcZI2kXKw26', 'Sarmad', NULL, '1', NULL, NULL, '1', '2024-01-31 19:29:21', '2024-01-31 19:29:26', NULL),
(47, NULL, '', '+0575335789', '$2y$10$KsR1JL5jLhbmzl7Ead/FPOUzLR1RsxiTS/ZoxCwqYkRtg4mXi0xqi', 'abc', NULL, '1', NULL, NULL, '1', '2024-01-31 19:33:42', '2024-01-31 19:33:56', NULL),
(48, NULL, '', '+0525785421', '$2y$10$Fr6oxI1vbk0x453sIiPjpecGMgzLhA80zQQmXFFFHB4kY3TMiEP2S', 'fvc', NULL, '1', NULL, NULL, '1', '2024-01-31 19:34:59', '2024-01-31 19:34:59', NULL),
(49, NULL, '', '+20100000', '$2y$10$YfxbTgjg35QZxqjYNY8fhORAVHxQ2z3BYVjFOFaCV.C3YfbeTw6Qy', 'Ahmed Kamal', NULL, '1', NULL, NULL, '1', '2024-01-31 19:41:53', '2024-01-31 19:42:01', NULL),
(50, NULL, '', '+0588888789', '$2y$10$7CpM1OZzB.OsGJ0BsoRvKOhbiW0donPGXnc7yQnEBsC51NpGwxhaW', 'test user', NULL, '1', NULL, NULL, '1', '2024-01-31 19:56:45', '2024-01-31 19:56:51', NULL),
(51, NULL, '', '+0522558800', '$2y$10$5F1DpEE5owaoUMXzmCnTwOTQIVv/zSPl/6s9s9BCWnAAry.ulT4E6', 'sada', NULL, '1', NULL, NULL, '1', '2024-01-31 20:04:31', '2024-01-31 20:04:41', NULL),
(52, NULL, '', '+0533366699', '$2y$10$QYQVehBPjsi.iAQKTUR0G.MBoAbU5m9gQfiX9pZOmrw/tphtyrz6.', 'sarmad', NULL, '1', NULL, NULL, '1', '2024-01-31 20:52:38', '2024-01-31 20:52:53', NULL),
(53, NULL, '', '+0512477854', '$2y$10$zrwyTzQmSgiOZ9wr/I274.bk2vhTuiZwR1Ni3xzpCwuwRADOEDPta', 'fahgs', NULL, '1', NULL, NULL, '1', '2024-01-31 20:55:17', '2024-01-31 20:55:17', NULL),
(54, NULL, '', '+0577889900', '$2y$10$EwFKlYFH3zIbf7ZakaixSOSILJUxsa8IiZpRnO6m3RcN2wK..xQGa', 'zccv', NULL, '1', NULL, NULL, '1', '2024-01-31 21:02:12', '2024-01-31 21:02:17', NULL),
(55, NULL, '', '+0512754840', '$2y$10$x/WVDWBO8JJLG0TIcvhWvueOQ8.1s40xuM.i7Een5ROu89vxJMEsi', 'abssh', NULL, '1', NULL, NULL, '1', '2024-01-31 21:04:08', '2024-01-31 21:04:08', NULL),
(56, NULL, '', '+977566667777', '$2y$10$ZwnfqMGsOWDzTWkvLWRnkerj3yOT8cpQ6.XpNIAw0bYq3FL6Q5Owm', 'Sarmad new', NULL, '1', NULL, NULL, '1', '2024-02-01 08:31:53', '2024-02-01 08:32:05', NULL),
(57, NULL, '', '+977574123698', '$2y$10$F9XG236NCrHWRmefjhN4Oumb6SiDTLkN8u4yj/38nR4Rh6B/imkaK', 'test employee', NULL, '1', NULL, NULL, '1', '2024-02-01 08:34:28', '2024-02-01 08:34:28', NULL),
(58, NULL, '', '+977511223344', '$2y$10$JtcKqLFnNte1GjjqYehg8eueFhplJj2JLXKW6YzaqEXDcVhGR0vY6', 'gshd', NULL, '1', NULL, NULL, '1', '2024-02-01 08:39:40', '2024-02-01 08:39:46', NULL),
(59, NULL, '', '+977517548654', '$2y$10$udlQhvIvbw811zvSCF6DE.yjrMgDYd1wl5M27Wrm1yD1YHNbD.fh.', 'test user 1', NULL, '1', NULL, NULL, '1', '2024-02-01 08:41:19', '2024-02-01 08:41:19', NULL),
(60, NULL, '', '+977512457845', '$2y$10$/Czb3Atf/X8rJmyDQqNBsekYJ7lYsbl4z2ELis6.bLsw24NF7YYbu', 'dagg', NULL, '1', NULL, NULL, '1', '2024-02-01 08:44:44', '2024-02-01 08:44:49', NULL),
(61, NULL, '', '+977514725803', '$2y$10$N./zycbm3y/IFfw1io2A4e.FgNL1wRMQVRTLzJLpLUstqgGkPG93W', 'fhfg', NULL, '1', NULL, NULL, '1', '2024-02-01 08:46:43', '2024-02-01 08:46:43', NULL),
(62, NULL, '', '+977577553366', '$2y$10$5XxObXvrwNMkWXL2a.lbK.Q7qWg2LDTWI37LbPrhcmvJHEWSkJv92', 'asdg', NULL, '1', NULL, NULL, '1', '2024-02-01 08:54:15', '2024-02-01 08:54:19', NULL),
(63, NULL, '', '+977514785236', '$2y$10$0fI7vwAoOEYiqFk9hD4NT.kyD42aNzrPv3Df7rVzLsKPrSNPqHIiu', 'hug', NULL, '1', NULL, NULL, '1', '2024-02-01 08:55:51', '2024-02-01 08:55:51', NULL),
(64, NULL, '', '+966543234232', '$2y$10$MJyd4wbc7qmTxbysYLavu.XaXuRsdbz81hCzJ6NZhCTk1EqWxB/Ze', 'sat', NULL, '1', NULL, NULL, '1', '2024-02-01 11:39:04', '2024-02-01 11:39:25', NULL),
(65, NULL, '', '+966543121232', '$2y$10$mXL1x0ggOYYdApXJDI3A8uqVGq6nqWZjUru/7kQWg5CwEIr5i3dUm', 'wee', NULL, '1', NULL, NULL, '1', '2024-02-01 11:41:28', '2024-02-01 11:41:28', NULL),
(66, NULL, '', '+966543996969', '$2y$10$lPZZKKKkdKk8X9OuxwLlQ.s2bbnYTzjLptYfKu2W7yp8.tuPWL/3K', 'Red', NULL, '1', NULL, NULL, '1', '2024-02-01 15:06:25', '2024-02-01 15:06:30', NULL),
(67, NULL, '', '+966563177773', '$2y$10$cy9o//Fkm.SvHq1vM1.vD.bHkQDMP2djji.1NM1JBb2VcPKKG.iKW', 'hanouf matbouli', NULL, '1', NULL, NULL, '1', '2024-02-01 16:45:08', '2024-02-01 16:46:22', NULL),
(68, NULL, '', '+966540546364', '$2y$10$sF4wk8B5Ji33iBlSLviQeuBj3VEbWgex38I3vKbcSBbePEs0LSnra', 'hanouf', NULL, '1', NULL, NULL, '1', '2024-02-01 16:51:31', '2024-02-01 16:51:31', NULL),
(69, NULL, '', '+966511223344', '$2y$10$Ysg0R0OxxfjlN0Cn5GlkJOa55laLiMR9BfhJ8OSJu8wLXQFpwTWRS', 'sarmad', NULL, '1', NULL, NULL, '1', '2024-02-01 16:59:22', '2024-02-01 16:59:29', NULL),
(70, NULL, '', '+966541108111', '$2y$10$yIV9fOiQzVIxvVcNyoPId.gbFL8FWdA4URwiG.YIjncw.PvNOxYJu', 'yousef', NULL, '1', NULL, NULL, '1', '2024-02-02 10:09:23', '2024-02-02 10:09:30', NULL),
(71, NULL, '', '+966552233445', '$2y$10$2w.Zd1VBu0q5y9Jjzu80LOMPPs9VZb6P9A7F3lWY/plf1fQR79i/a', 'sarmad', NULL, '1', NULL, NULL, '1', '2024-02-11 14:28:46', '2024-02-11 14:28:51', NULL),
(72, NULL, '', '+966556677889', '$2y$10$OJWRJwjrezXGAFPZZCSTwO3wcb9M5T8yJnzTEcJh9BRTzzfLaYNXe', 'sat', NULL, '1', NULL, NULL, '1', '2024-02-11 15:55:13', '2024-02-11 15:55:18', NULL),
(73, NULL, '', '+966555555555', '$2y$10$d4U/YPKVeTlluA6ZRnSaDuvao0WBxm88dN4vF18aEp/.Cbke8hGmq', 'Sam', NULL, '1', NULL, NULL, '1', '2024-02-12 19:05:18', '2024-02-12 19:05:18', NULL),
(74, NULL, '', '+966544444444', '$2y$10$8zuNE/Gv4PjCuMeqdasWyuI7W4HuPafHorex2KndFIw4mT6DWZ32K', 'kam', NULL, '1', NULL, NULL, '1', '2024-02-12 19:05:35', '2024-02-12 19:05:35', NULL),
(75, NULL, '', '+966522222222', '$2y$10$kW9P3SbNR4OR.IXbo50h2usvpq.pf5A.VW.tsFF3GlJZahEJzb/2q', 'Sam', NULL, '1', NULL, NULL, '1', '2024-02-12 19:06:20', '2024-02-12 19:06:20', NULL),
(76, NULL, '', '+966588888888', '$2y$10$Uw9f7bszCTEbQyeQDIo.XeBAUp1CteJQMyAmQh4trzZbfZfUMypue', 'pol', NULL, '1', NULL, NULL, '1', '2024-02-12 19:06:34', '2024-02-12 19:06:34', NULL),
(77, NULL, '', '+966556420863', '$2y$10$7/.S1rKMP7UjlbWz/vh.M.lfRjp0E2FKo0.ul6HePY2TYkHTJgkMG', 'Hatoun Matboli', NULL, '1', NULL, NULL, '1', '2024-02-18 13:28:19', '2024-02-18 13:28:22', NULL),
(78, NULL, '', '+966558800789', '$2y$10$tGn/tt1k2Qfw36TKHuBNz.5Qm/icmYPoh9pKA/2XGCame1foP5ipC', 'Sarmad', NULL, '1', NULL, NULL, '1', '2024-02-18 18:58:08', '2024-02-18 18:58:13', NULL),
(79, NULL, '', '+966567891234', '$2y$10$V9qdoz3vstA5539MXDs3hOrZdt.gRSLeuAc/WkcORImeeWVIE44Z6', 'sarmad', NULL, '1', NULL, NULL, '1', '2024-02-27 16:23:22', '2024-02-27 16:23:28', NULL),
(80, NULL, '', '+966533333333', '$2y$10$a7Kf5N1NM2BrQIa7AXOeCeEjc.G03K2FWW1FHgO8FCf0dPB9mX4lS', 'Red', NULL, '1', NULL, NULL, '1', '2024-02-27 18:08:16', '2024-02-27 18:09:36', NULL),
(81, NULL, '', '+966533333333', '$2y$10$Er6A55ZlzLNyIuwIOMN.keRd1LmUme6JA9GvjQNPwg0czJccTBxhG', 'Red', NULL, '0', NULL, NULL, '0', '2024-02-27 18:09:25', '2024-02-27 18:09:25', NULL),
(82, NULL, '', '+966551234556', '$2y$10$ehebmC/MqLdSZciJLUyl4.W.yuwtFtUND1xDJm/aY8pb2EcS8V3/u', 'Sarmad test', NULL, '1', NULL, NULL, '1', '2024-03-01 20:09:23', '2024-03-01 20:09:26', NULL),
(83, NULL, '', '+966551472580', '$2y$10$cJOCzCAkYC.iWDx.ZL7QlObVDgUulr206OHPQtwyl7z6GZfdNYpEC', 'Sarmad new', NULL, '1', NULL, NULL, '1', '2024-03-01 20:46:32', '2024-03-01 20:46:35', NULL),
(84, NULL, '', '+966551122334', '$2y$10$LqWmNnla4miSxjzZECcswe4DeXqaFS7SgyCliR4GJdlJeV87tlPBm', 'Test', NULL, '0', NULL, NULL, '0', '2024-03-02 06:09:25', '2024-03-02 06:09:25', NULL),
(85, NULL, '', '+966551122334', '$2y$10$NJAAAMdXxvfkcQnY4F29M.fUWyP1FEFE66DdBAqD9buUJt9FVIuwK', 'Test', NULL, '0', NULL, NULL, '0', '2024-03-02 06:22:29', '2024-03-02 06:22:29', NULL),
(86, NULL, '', '+966552255880', '$2y$10$NMQyVn3Gz3N5kOIRDlaaQuU6xTeDrKv4.MlvyXDJZ1bBVTJY9jLQO', 'sarm', NULL, '0', NULL, NULL, '0', '2024-03-02 06:23:06', '2024-03-02 06:23:06', NULL),
(87, NULL, '', '+966552255880', '$2y$10$warVKoL1.T/Onp8HSP2cf.gSNkyWGpWW66F0DHytzZRmvABJQAGHa', 'sarmad', NULL, '0', NULL, NULL, '0', '2024-03-02 06:27:28', '2024-03-02 06:27:28', NULL),
(88, NULL, '', '+966557891234', '$2y$10$K6fMIG3xtQpmZem.gqy7KeM.Gzop097Wi5lSRvO/YTi1Kd.K4hAVe', 'danger', NULL, '1', NULL, NULL, '1', '2024-03-04 18:15:11', '2024-03-04 18:15:16', NULL),
(89, NULL, '', '+966522222221', '$2y$10$rQ3HfQnXRp4mk...n8FbpexDiLif4Dhu.kP0MozuABUMTn9KO4rGu', 'Red', NULL, '1', NULL, NULL, '1', '2024-03-05 08:21:11', '2024-03-05 08:21:15', NULL),
(90, NULL, '', '+966551234567', '$2y$10$Q7Eb7Q8d2HLvSSwHbzkddueySIEhkc.2yvJQEB27VhWbIfmbnA73u', 'ss', NULL, '1', NULL, NULL, '1', '2024-03-11 08:00:50', '2024-03-11 08:00:53', NULL),
(91, NULL, '', '+966557777888', '$2y$10$iiq3ciD2pfzYs3Wl8Jv1o.VFoA9XTG/PGHfd3XjFdkwNPgqQCKfsS', 'hah', NULL, '1', NULL, NULL, '1', '2024-04-06 09:55:17', '2024-04-06 09:55:19', NULL),
(92, NULL, '', '+966562124074', '$2y$10$hSwbBk0wx4gvpLNUxlhyoe5t8FiiwoVYSfTkLIMKoZ/zIjH4d83NG', 'the blue spa', NULL, '1', NULL, NULL, '1', '2024-04-22 00:23:32', '2024-04-22 00:23:54', NULL),
(93, NULL, '', '+966562390750', '$2y$10$hNqfZi1ciBDmjPW//mtvZ.u6Pdh52tuYlKg0.rdiS8P4tXYaSVrCa', 'roshel', NULL, '1', NULL, NULL, '1', '2024-04-22 07:33:15', '2024-04-22 07:33:15', NULL),
(94, NULL, '', '+966522222223', '$2y$10$.KYBx6LBDzJyDLNk6pL5Iu2LsZtUW8EEiXECcA8BWwHGVTQo6xeRK', 'Red', NULL, '1', NULL, NULL, '1', '2024-04-25 15:52:50', '2024-04-25 15:52:55', NULL),
(95, NULL, '', '+966532450364', '$2y$10$e.qSuJl9BvCQyveDL6yGa.8Hje83SDedynOtzMoI7OAl0VRmJIQKG', 'Amjad Majeed Alsaif', NULL, '1', NULL, NULL, '1', '2024-05-15 18:49:03', '2024-05-15 18:50:05', NULL),
(96, NULL, '', '+966554433221', '$2y$10$BDZmmrCJ2rST8Z8hr0Dd6eVt4xx0YH7MSgNkJNIatna5P9MWo9xxu', 'Sat', NULL, '1', NULL, NULL, '1', '2024-05-21 16:30:38', '2024-05-21 16:30:44', NULL),
(97, NULL, '', '+966505166105', '$2y$10$nuPwBQqrsVKuES36sXGnsOJf.kAxfrT2JTsAQQ/W576Jvparzu6p2', 'sager nadershah', NULL, '1', NULL, NULL, '1', '2024-07-02 16:41:44', '2024-09-19 13:01:08', NULL),
(98, NULL, '', '+966585166105', '$2y$10$r0WHHWMLo/0YGS0tJ3tUw.9ndF8H77vP5Z/0tRbXaW0Ze9rtMLmCe', 'sager Nadershah', NULL, '0', NULL, NULL, '0', '2024-09-05 21:33:25', '2024-09-05 21:33:25', NULL),
(99, NULL, '', '+966505166105', '$2y$10$lto./C18YxsMorU7Gyo9QudBfwuh26t5fQxD/RpAPkvAvZaNkFWV.', 'sager nadershah', NULL, '0', NULL, NULL, '0', '2024-09-19 13:00:32', '2024-09-19 13:00:32', NULL),
(100, NULL, '', '+01149523148', '$2y$10$H64RNuUSeKNoLsQr/wR4xOfqz3w/vP3MyiwL4y.Vyy7wX13PSpccy', 'saad mohamed saad aly', NULL, '0', NULL, NULL, '0', '2024-12-13 18:44:41', '2024-12-13 18:44:41', NULL),
(101, NULL, '', '+20100000998', '$2y$10$ukOzVUbakhlLMm8Hra3/Y.Te4arECttDUEUEWQy.0urSI8fguR4A2', 'Ahmed Kamal', NULL, '1', NULL, NULL, '1', '2024-12-17 20:25:46', '2024-12-17 20:26:05', NULL),
(102, NULL, '', '+0512541254', '$2y$10$yvu5s0AKMO9PfND4YY2UF.Z9eDBO/H2jl4hu.HAuHDb.Kr/9tyNW2', 'junaid ijaz', NULL, '0', NULL, NULL, '0', '2024-12-18 21:09:33', '2024-12-18 21:09:33', NULL),
(103, NULL, '', '+20100000989', '$2y$10$rkdHpniiiYTZE7eqE2gYFOkjhbc47Ko3p8BAnxio3WveSa3/gpFFa', 'Ahmed Kamal', NULL, '1', NULL, NULL, '1', '2024-12-19 09:08:28', '2024-12-19 09:08:35', NULL),
(104, NULL, '', '+20100001000', '$2y$10$M8xCt.3aedgYuxv6rD73YeHsDVoVxCiKkyF.rU4GuUzn56tkmAKFe', 'Ahmed Kamal', NULL, '1', NULL, NULL, '1', '2024-12-19 09:14:08', '2024-12-19 09:14:17', NULL),
(105, NULL, '', '+0500012345', '$2y$10$tdSwwP8SLcsXUwOHTDXtb.4DRbmNbu0PI1lLALq2VKfggIymxFUV6', 'junaid ijaz', NULL, '1', NULL, NULL, '1', '2024-12-19 16:22:11', '2024-12-19 16:22:21', NULL),
(106, NULL, '', '+0500012345', '$2y$10$6Se4J4g5RnI40ZbhA.gQX.0U9azREnU6IZ/mYbN9fckxU4d0pur.i', 'junaid ijaz', NULL, '0', NULL, NULL, '0', '2024-12-19 16:22:12', '2024-12-19 16:22:12', NULL),
(107, NULL, '', '+0555555554', '$2y$10$YjBBRcX6NbLThIAduNpk9.h5WcLO5eauBvecTEpzHMkuiBYlDM4b2', 'junaid ijaz', NULL, '1', NULL, NULL, '1', '2024-12-19 18:30:13', '2024-12-19 18:30:24', NULL),
(108, NULL, '', '+0555555553', '$2y$10$MxO4e5GzlxSDmfn3fFvrtuYgCq0hPXVPlvgyqW1i1weEZkN1Lys3y', 'junaid ijaz', NULL, '1', NULL, NULL, '1', '2024-12-19 18:35:52', '2024-12-19 18:35:57', NULL),
(109, NULL, '', '+0555555567', '$2y$10$ucwthfLKofHXVqSftMHun.YlXt6H6SURbO5/65xqnoEo/Vy/UK1qO', 'junaid ijaz', NULL, '1', NULL, NULL, '1', '2024-12-24 18:12:29', '2024-12-24 18:12:34', NULL),
(110, NULL, '', '+0512312312', '$2y$10$TO8Weuo5Md89XpDzoube0.zitbX.zG.8TtPmZ1NLzjY967Dkmh7NS', 'test user', NULL, '1', NULL, NULL, '1', '2024-12-25 11:33:55', '2024-12-25 11:34:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `isg_user_booking`
--

CREATE TABLE `isg_user_booking` (
  `user_id` int NOT NULL,
  `vendor_booking_calendar_id` int NOT NULL,
  `user_remarks` mediumtext,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_user_company`
--

CREATE TABLE `isg_user_company` (
  `id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `company_id` int NOT NULL,
  `company_code` varchar(10) DEFAULT NULL,
  `users_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `isg_user_company`
--

INSERT INTO `isg_user_company` (`id`, `created_at`, `updated_at`, `company_id`, `company_code`, `users_id`) VALUES
(26, '2023-07-03 17:25:03', '2023-07-03 17:25:03', 9, '1688405103', 38),
(27, '2023-07-03 18:08:29', '2023-07-03 18:08:29', 9, '1688405103', 39),
(28, '2023-07-03 19:09:44', '2023-07-03 19:09:44', 9, '1688405103', 40),
(29, '2023-07-03 19:13:27', '2023-07-03 19:13:27', 10, '1688411607', 41),
(30, '2023-07-03 19:15:32', '2023-07-03 19:15:32', 10, '1688411607', 42),
(31, '2023-07-06 10:48:33', '2023-07-06 10:48:33', 9, '1688405103', 43),
(32, '2023-07-06 10:50:45', '2023-07-06 10:50:45', 11, '1688640644', 44),
(33, '2023-07-06 10:53:28', '2023-07-06 10:53:28', 11, '1688640644', 45);

-- --------------------------------------------------------

--
-- Table structure for table `isg_user_devices`
--

CREATE TABLE `isg_user_devices` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `device_id` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_user_otp`
--

CREATE TABLE `isg_user_otp` (
  `id` int NOT NULL,
  `phone_number` varchar(45) DEFAULT NULL,
  `otp` varchar(6) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `full_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `isg_user_otp`
--

INSERT INTO `isg_user_otp` (`id`, `phone_number`, `otp`, `created_at`, `updated_at`, `email`, `full_name`) VALUES
(7, NULL, '2180', '2023-06-13 08:17:08', '2023-06-13 08:17:08', 'ahmedkamal.cs@gmail.com_', NULL),
(17, NULL, '8202', '2023-07-03 17:24:44', '2023-07-03 17:24:44', 'ahmedkamal.cs@gmail.com', NULL),
(18, NULL, '5376', '2023-07-03 18:07:51', '2023-07-03 18:07:51', 'test1@gmail.com', NULL),
(19, NULL, '3319', '2023-07-03 19:09:19', '2023-07-03 19:09:19', 'test2@gmail.com', NULL),
(20, NULL, '7012', '2023-07-03 19:13:00', '2023-07-03 19:13:00', 'testroot@gmail.com', NULL),
(21, NULL, '3368', '2023-07-03 19:15:07', '2023-07-03 19:15:07', 'test5@isglobal.co', NULL),
(22, NULL, '3254', '2023-07-06 10:48:02', '2023-07-06 10:48:02', 'a.kamal@isglobal.co', NULL),
(23, NULL, '5758', '2023-07-06 10:50:07', '2023-07-06 10:50:07', 'support@isglobal.co', NULL),
(24, NULL, '3161', '2023-07-06 10:53:04', '2023-07-06 10:53:04', 'info@isglobal.co', NULL),
(53, '+011495231588', '1234', '2023-12-20 00:51:04', '2023-12-20 00:51:04', NULL, NULL),
(59, '+', '1234', '2023-12-25 06:36:34', '2023-12-25 06:36:34', NULL, NULL),
(62, '+01149523152', '1234', '2024-01-07 21:49:50', '2024-01-07 21:49:50', NULL, 'employee name'),
(72, '+01149523159', '1234', '2024-01-13 00:59:54', '2024-01-13 00:59:54', NULL, 'employee namer'),
(75, '+01149523157', '1234', '2024-01-13 01:28:06', '2024-01-13 01:28:06', NULL, 'employee namer'),
(76, '+2', '1234', '2024-01-15 21:03:19', '2024-01-15 21:03:19', NULL, NULL),
(89, '+0577777777', '1234', '2024-01-22 15:57:01', '2024-01-22 15:57:01', NULL, 'm'),
(102, '+0523456789', '1234', '2024-01-23 09:50:09', '2024-01-23 09:50:09', NULL, 'Sarmad'),
(103, '+0566666668', '1234', '2024-01-23 10:14:53', '2024-01-23 10:14:53', NULL, 'sarmad'),
(104, '+0571234578', '1234', '2024-01-23 11:09:02', '2024-01-23 11:09:02', NULL, 'sarmad'),
(105, '+0532945670', '1234', '2024-01-23 11:09:14', '2024-01-23 11:09:14', NULL, 'malik'),
(107, '+0578452135', '1234', '2024-01-23 11:26:14', '2024-01-23 11:26:14', NULL, 'taim'),
(108, '+0578453784', '1234', '2024-01-23 11:26:27', '2024-01-23 11:26:27', NULL, 'Ger'),
(114, '+0522334455', '1234', '2024-01-23 12:22:15', '2024-01-23 12:22:15', NULL, 'nusrat'),
(115, '+0555556677', '1234', '2024-01-23 12:22:29', '2024-01-23 12:22:29', NULL, 'Rahat'),
(116, '+0577441122', '1234', '2024-01-23 12:22:42', '2024-01-23 12:22:42', NULL, 'Atif'),
(122, '+0512785698', '1234', '2024-01-23 12:35:55', '2024-01-23 12:35:55', NULL, 'Sarmad'),
(123, '+0567845123', '1234', '2024-01-23 12:36:07', '2024-01-23 12:36:07', NULL, 'sarmad'),
(129, '+0566778899', '1234', '2024-01-23 13:53:23', '2024-01-23 13:53:23', NULL, 'Zubi'),
(132, '+0525852585', '1234', '2024-01-23 13:55:54', '2024-01-23 13:55:54', NULL, 'mantar'),
(133, '+0574612348', '1234', '2024-01-23 13:56:10', '2024-01-23 13:56:10', NULL, 'shanter'),
(136, '+0514785158', '1234', '2024-01-23 14:10:40', '2024-01-23 14:10:40', NULL, 'test employee'),
(137, '+0517741158', '1234', '2024-01-23 14:10:57', '2024-01-23 14:10:57', NULL, 'test employee 2'),
(149, '+0544466677', '1234', '2024-01-23 14:37:10', '2024-01-23 14:37:10', NULL, 'sarmad'),
(178, '+0517751213', '1234', '2024-01-24 12:37:07', '2024-01-24 12:37:07', NULL, 'fagsg'),
(179, '+0522224178', '1234', '2024-01-24 12:37:25', '2024-01-24 12:37:25', NULL, 'gfsfgg'),
(186, '+0517775553', '1234', '2024-01-24 13:02:25', '2024-01-24 13:02:25', NULL, 'hdjdh'),
(187, '+0512774560', '1234', '2024-01-24 13:02:35', '2024-01-24 13:02:35', NULL, 'hshd'),
(188, '+0517774511', '1234', '2024-01-24 13:02:45', '2024-01-24 13:02:45', NULL, 'hdjd'),
(192, '+0541234567', '1234', '2024-01-24 14:25:31', '2024-01-24 14:25:31', NULL, 'raed'),
(219, '+0577781258', '1234', '2024-01-25 20:03:29', '2024-01-25 20:03:29', NULL, 'dawqwar'),
(220, '+0522548770', '1234', '2024-01-25 20:03:55', '2024-01-25 20:03:55', NULL, 'hdjdhdhb'),
(223, '+0511499999', '1234', '2024-01-25 20:17:20', '2024-01-25 20:17:20', NULL, 'gshdhg'),
(241, '+0511447750', '1234', '2024-01-26 19:08:13', '2024-01-26 19:08:13', NULL, 'يتي'),
(247, '+0517754213', '1234', '2024-01-26 19:26:27', '2024-01-26 19:26:27', NULL, 'gshs'),
(257, '+0545287456', '1234', '2024-01-28 16:29:32', '2024-01-28 16:29:32', NULL, 'red'),
(258, '+0541236987', '1234', '2024-01-28 16:29:51', '2024-01-28 16:29:51', NULL, 'Ted'),
(264, '+0524569874', '1234', '2024-01-28 18:03:57', '2024-01-28 18:03:57', NULL, 'Red'),
(265, '+0587412365', '1234', '2024-01-28 18:04:12', '2024-01-28 18:04:12', NULL, 'Blue'),
(355, '+0565656565', '1234', '2024-01-30 19:43:18', '2024-01-30 19:43:18', NULL, 'test'),
(356, '+0578998989', '1234', '2024-01-30 19:53:10', '2024-01-30 19:53:10', NULL, 'staff'),
(361, '+0537364833', '1234', '2024-01-30 20:05:11', '2024-01-30 20:05:11', NULL, 'add sad'),
(362, '+0523234453', '1234', '2024-01-30 20:05:25', '2024-01-30 20:05:25', NULL, 'did'),
(363, '+0565633421', '1234', '2024-01-30 20:05:37', '2024-01-30 20:05:37', NULL, 'Dodd'),
(386, '+0525785421', '1234', '2024-01-31 19:34:59', '2024-01-31 19:34:59', NULL, 'fvc'),
(392, '+0512477854', '1234', '2024-01-31 20:55:17', '2024-01-31 20:55:17', NULL, 'fahgs'),
(395, '+0512754840', '1234', '2024-01-31 21:04:08', '2024-01-31 21:04:08', NULL, 'abssh'),
(398, '+977574123698', '1234', '2024-02-01 08:34:28', '2024-02-01 08:34:28', NULL, 'test employee'),
(401, '+977517548654', '1234', '2024-02-01 08:41:19', '2024-02-01 08:41:19', NULL, 'test user 1'),
(404, '+977514725803', '1234', '2024-02-01 08:46:43', '2024-02-01 08:46:43', NULL, 'fhfg'),
(407, '+977514785236', '1234', '2024-02-01 08:55:51', '2024-02-01 08:55:51', NULL, 'hug'),
(410, '+966543121232', '1234', '2024-02-01 11:41:28', '2024-02-01 11:41:28', NULL, 'wee'),
(415, '+966540546364', '1234', '2024-02-01 16:51:31', '2024-02-01 16:51:31', NULL, 'hanouf'),
(442, '+966544444444', '1234', '2024-02-12 19:05:35', '2024-02-12 19:05:35', NULL, 'kam'),
(443, '+966522222222', '1234', '2024-02-12 19:06:20', '2024-02-12 19:06:20', NULL, 'Sam'),
(444, '+966588888888', '1234', '2024-02-12 19:06:34', '2024-02-12 19:06:34', NULL, 'pol'),
(476, '+966551122334', '1234', '2024-03-02 06:22:29', '2024-03-02 06:22:29', NULL, 'Test'),
(478, '+966552255880', '1234', '2024-03-02 06:27:28', '2024-03-02 06:27:28', NULL, 'sarmad'),
(493, '+966562390750', '1234', '2024-04-22 07:33:15', '2024-04-22 07:33:15', NULL, 'roshel'),
(505, '+966532450364', '1234', '2024-05-26 10:34:04', '2024-05-26 10:34:04', NULL, NULL),
(508, '+966541108111', '1234', '2024-08-04 14:50:18', '2024-08-04 14:50:18', NULL, NULL),
(509, '+966585166105', '1234', '2024-09-05 21:33:25', '2024-09-05 21:33:25', NULL, 'sager Nadershah'),
(513, '+966543996969', '1234', '2024-10-16 15:55:49', '2024-10-16 15:55:49', NULL, NULL),
(514, '+966505166105', '1234', '2024-10-27 11:15:38', '2024-10-27 11:15:38', NULL, NULL),
(515, '+01149523148', '1234', '2024-12-13 18:44:41', '2024-12-13 18:44:41', NULL, 'saad mohamed saad aly'),
(517, '+0512541254', '1234', '2024-12-18 21:09:33', '2024-12-18 21:09:33', NULL, 'junaid ijaz');

-- --------------------------------------------------------

--
-- Table structure for table `isg_user_privacy_policy`
--

CREATE TABLE `isg_user_privacy_policy` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `privacy_policy_header_id` int DEFAULT NULL,
  `note` mediumtext,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `active` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_user_role`
--

CREATE TABLE `isg_user_role` (
  `id` int NOT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `role_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `isg_user_role`
--

INSERT INTO `isg_user_role` (`id`, `users_id`, `role_id`) VALUES
(25, 38, 1),
(26, 39, 1),
(27, 40, 1),
(28, 41, 1),
(29, 42, 1),
(30, 43, 1),
(31, 44, 1),
(32, 45, 1);

-- --------------------------------------------------------

--
-- Table structure for table `isg_vendor_booking_calendar`
--

CREATE TABLE `isg_vendor_booking_calendar` (
  `id` int NOT NULL,
  `calendar_day` date DEFAULT NULL,
  `calendar_time` time DEFAULT NULL,
  `calendar_text` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `vendor_master_id` int NOT NULL,
  `booked` enum('0','1') NOT NULL DEFAULT '0',
  `user_id` int DEFAULT NULL,
  `beautician_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_vendor_commission_setup`
--

CREATE TABLE `isg_vendor_commission_setup` (
  `id` int NOT NULL,
  `amount` float DEFAULT NULL,
  `percent` float DEFAULT NULL,
  `vendor_master_id` int NOT NULL,
  `transaction_type` enum('C','F') NOT NULL DEFAULT 'C'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_vendor_commission_transaction`
--

CREATE TABLE `isg_vendor_commission_transaction` (
  `id` int NOT NULL,
  `vendor_master_id` int NOT NULL,
  `vendor_commission_setup_id` int NOT NULL,
  `order_details_id` int DEFAULT NULL,
  `order_master_id` int DEFAULT NULL,
  `gross_amount` float NOT NULL,
  `net_amount` float NOT NULL,
  `order_details_gross_amount` float DEFAULT NULL,
  `order_details_net_amount` float DEFAULT NULL,
  `commission_percent` float DEFAULT NULL,
  `commission_fixed_amount` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `einvoice_id` int DEFAULT NULL,
  `transaction_type` enum('C','F') NOT NULL DEFAULT 'C'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_vendor_master`
--

CREATE TABLE `isg_vendor_master` (
  `id` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `tel_no` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `vat_certificate` varchar(20) DEFAULT NULL,
  `cr_license` varchar(45) DEFAULT NULL,
  `bank_account_iban` varchar(45) DEFAULT NULL,
  `contact_details` varchar(45) DEFAULT NULL,
  `company_profile_data_id` int DEFAULT NULL,
  `company_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_vendor_profile`
--

CREATE TABLE `isg_vendor_profile` (
  `id` int NOT NULL,
  `vendor_master_id` int NOT NULL,
  `profile_name` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `profile_picture` mediumtext,
  `tel_no` varchar(45) DEFAULT NULL,
  `mobile_no` varchar(45) DEFAULT NULL,
  `bio` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `isg_vendor_services`
--

CREATE TABLE `isg_vendor_services` (
  `id` int NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `available` enum('0','1') DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `vendor_master_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_invoices`
--

CREATE TABLE `payment_invoices` (
  `id` int NOT NULL,
  `invoice_number` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `payment_invoices`
--

INSERT INTO `payment_invoices` (`id`, `invoice_number`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-02-18 09:26:31', '2024-02-18 09:26:31'),
(2, 2, '2024-02-18 11:00:13', '2024-02-18 11:00:13'),
(3, 2, '2024-02-18 11:00:16', '2024-02-18 11:00:16'),
(4, 2, '2024-02-18 11:00:19', '2024-02-18 11:00:19'),
(5, 2, '2024-02-18 11:00:22', '2024-02-18 11:00:22'),
(6, 4, '2024-03-01 11:49:07', '2024-03-01 11:49:07'),
(7, 3, '2024-03-01 11:49:07', '2024-03-01 11:49:07'),
(8, 5, '2024-03-01 12:10:53', '2024-03-01 12:10:53'),
(9, 6, '2024-03-01 12:18:43', '2024-03-01 12:18:43'),
(10, 6, '2024-03-01 12:20:31', '2024-03-01 12:20:31'),
(11, 6, '2024-03-01 12:21:22', '2024-03-01 12:21:22'),
(12, 7, '2024-03-01 12:25:19', '2024-03-01 12:25:19'),
(13, 8, '2024-03-01 12:28:18', '2024-03-01 12:28:18'),
(14, 8, '2024-03-01 12:29:28', '2024-03-01 12:29:28'),
(15, 9, '2024-03-01 12:30:14', '2024-03-01 12:30:14'),
(16, 10, '2024-03-01 12:30:51', '2024-03-01 12:30:51'),
(17, 11, '2024-03-01 12:32:40', '2024-03-01 12:32:40'),
(18, 12, '2024-03-01 12:34:54', '2024-03-01 12:34:54'),
(19, 13, '2024-03-01 12:37:08', '2024-03-01 12:37:08'),
(20, 14, '2024-03-01 12:39:59', '2024-03-01 12:39:59'),
(21, 15, '2024-03-01 12:41:50', '2024-03-01 12:41:50'),
(22, 16, '2024-03-01 12:47:30', '2024-03-01 12:47:30'),
(23, 23, '2024-03-04 10:33:57', '2024-03-04 10:33:57'),
(24, 22, '2024-03-04 10:33:57', '2024-03-04 10:33:57'),
(25, 21, '2024-03-04 10:33:57', '2024-03-04 10:33:57'),
(26, 20, '2024-03-04 10:33:57', '2024-03-04 10:33:57'),
(27, 19, '2024-03-04 10:33:57', '2024-03-04 10:33:57'),
(28, 18, '2024-03-04 10:33:57', '2024-03-04 10:33:57'),
(29, 17, '2024-03-04 10:33:57', '2024-03-04 10:33:57'),
(30, 27, '2024-03-11 00:01:27', '2024-03-11 00:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `salon_branches`
--

CREATE TABLE `salon_branches` (
  `id` int NOT NULL,
  `salon_id` int NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `longtitude` double DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `salon_branches`
--

INSERT INTO `salon_branches` (`id`, `salon_id`, `address`, `longtitude`, `latitude`, `created_at`, `updated_at`) VALUES
(3, 1, NULL, 585, 125, '2024-01-02 21:12:47', '2024-01-02 21:12:47'),
(4, 1, 'branch address 1- street no', 585, 125, '2024-01-02 21:15:02', '2024-01-02 21:15:02'),
(5, 1, NULL, NULL, NULL, '2024-01-09 19:40:07', '2024-01-09 19:40:07'),
(6, 1, NULL, NULL, NULL, '2024-01-09 19:40:20', '2024-01-09 19:40:20'),
(7, 1, NULL, NULL, NULL, '2024-01-09 19:44:00', '2024-01-09 19:44:00'),
(8, 1, NULL, NULL, NULL, '2024-01-09 19:44:45', '2024-01-09 19:44:45'),
(9, 1, 'branch address 1- street no', 585, 125, '2024-01-09 19:50:02', '2024-01-09 19:50:02'),
(10, 1, 'branch address 1- street no2', 585, 125, '2024-01-09 19:50:09', '2024-01-09 19:50:09'),
(11, 1, 'branch address 1- street no2', 585, 125, '2024-01-12 17:55:40', '2024-01-12 17:55:40'),
(12, 1, 'branch address 1- street no2', 585, 125, '2024-01-12 23:26:05', '2024-01-12 23:26:05'),
(13, 1, 'branch address 1- street no2', 585, 125, '2024-01-12 23:26:22', '2024-01-12 23:26:22'),
(15, 7, 'Kahuta - Kotli Road, Rawalpindi, Punjab, Pakistan', 73.402310907841, 33.58977959386, '2024-01-23 00:43:17', '2024-01-23 00:43:17'),
(16, 6, 'Kahuta - Kotli Road, Rawalpindi, Punjab, Pakistan', 73.402374945581, 33.589832100683, '2024-01-23 03:08:34', '2024-01-23 03:08:34'),
(17, 6, 'Rawalpindi, Punjab, Pakistan', 73.403685204685, 33.588639238314, '2024-01-23 03:08:41', '2024-01-23 03:08:41'),
(18, 8, 'Rawalpindi, Punjab, Pakistan', 73.403755947948, 33.588606281451, '2024-01-23 03:25:50', '2024-01-23 03:25:50'),
(19, 8, 'Kahuta - Kotli Road, Rawalpindi, Punjab, Pakistan', 73.402970395982, 33.590276173072, '2024-01-23 03:26:00', '2024-01-23 03:26:00'),
(20, 9, 'Kahuta - Kotli Road, Rawalpindi, Punjab, Pakistan', 73.402648195624, 33.589984873015, '2024-01-23 04:21:37', '2024-01-23 04:21:37'),
(21, 9, 'Kahuta - Kotli Road, Rawalpindi, Punjab, Pakistan', 73.400626145303, 33.588871332472, '2024-01-23 04:21:50', '2024-01-23 04:21:50'),
(22, 9, 'Home', 73.403763324022, 33.58870347623, '2024-01-23 04:21:59', '2024-01-23 04:21:59'),
(23, 10, 'Kahuta - Kotli Road, Rawalpindi, Punjab, Pakistan', 73.402709886432, 33.590047713475, '2024-01-23 04:35:31', '2024-01-23 04:35:31'),
(24, 10, 'Home', 73.403712362051, 33.588596785404, '2024-01-23 04:35:43', '2024-01-23 04:35:43'),
(25, 11, 'Rawalpindi, Punjab, Pakistan', 73.403697609901, 33.588799274425, '2024-01-23 05:55:20', '2024-01-23 05:55:20'),
(26, 11, 'Home', 73.403457887471, 33.589280777442, '2024-01-23 05:55:33', '2024-01-23 05:55:33'),
(27, 12, 'Kahuta - Kotli Road, Rawalpindi, Punjab, Pakistan', 73.402805775404, 33.590092399996, '2024-01-23 06:10:07', '2024-01-23 06:10:07'),
(28, 12, 'Home', 73.404271937907, 33.590726108237, '2024-01-23 06:10:24', '2024-01-23 06:10:24'),
(29, 13, 'Rawalpindi, Punjab, Pakistan', 73.403388485312, 33.589497229489, '2024-01-23 06:36:41', '2024-01-23 06:36:41'),
(30, 13, 'Rawalpindi, Punjab, Pakistan', 73.405119851232, 33.589432154286, '2024-01-23 06:36:56', '2024-01-23 06:36:56'),
(31, 14, '4399, Al Mudhaffar Bin Saban, جدة, Mecca, 23822, Saudi Arabia', 39.060710482299, 21.794897892839, '2024-01-23 08:01:53', '2024-01-23 08:01:53'),
(32, 14, 'الورود', 39.06214915216, 21.798240702966, '2024-01-23 08:02:27', '2024-01-23 08:02:27'),
(33, 7, 'Kahuta - Kotli Road, Rawalpindi, Punjab, Pakistan', 73.402705192566, 33.590038217586, '2024-01-23 10:51:20', '2024-01-23 10:51:20'),
(34, 15, 'کہوٹہ - کوٹلی روڈ, روالبندي, البنجاب, باكستان', 73.402238152921, 33.589807243734, '2024-01-24 04:32:06', '2024-01-24 04:32:06'),
(35, 15, 'روالبندي, البنجاب, باكستان', 73.403637595475, 33.588759335249, '2024-01-24 04:32:16', '2024-01-24 04:32:16'),
(36, 16, 'روالبندي, البنجاب, باكستان', 73.403712362051, 33.588596785404, '2024-01-24 05:01:48', '2024-01-24 05:01:48'),
(37, 16, 'کہوٹہ - کوٹلی روڈ, روالبندي, البنجاب, باكستان', 73.402354493737, 33.589839082971, '2024-01-24 05:01:57', '2024-01-24 05:01:57'),
(38, 16, 'کہوٹہ - کوٹلی روڈ, روالبندي, البنجاب, باكستان', 73.403121605515, 33.590276173072, '2024-01-24 05:02:09', '2024-01-24 05:02:09'),
(39, 17, '6629, Muhammad Ibn Majah St, جدة, Mecca, 23441, Saudi Arabia', 39.174362048507, 21.561449117198, '2024-01-24 06:24:31', '2024-01-24 06:24:31'),
(40, 7, 'Hejdhd', 73.403086401522, 33.590274218042, '2024-01-25 12:02:50', '2024-01-25 12:02:50'),
(41, 7, 'Rawalpindi, Punjab, Pakistan', 73.40382669121, 33.589279939562, '2024-01-25 12:02:59', '2024-01-25 12:02:59'),
(42, 18, 'Rawalpindi, Punjab, Pakistan', 73.403679169714, 33.588669960802, '2024-01-25 12:17:05', '2024-01-25 12:17:05'),
(43, 19, 'Kahuta - Kotli Road, Rawalpindi, Punjab, Pakistan', 73.402814157307, 33.589988224507, '2024-01-26 11:07:55', '2024-01-26 11:07:55'),
(44, 20, 'Kahuta - Kotli Road, Rawalpindi, Punjab, Pakistan', 73.402299173176, 33.589834614307, '2024-01-26 11:26:08', '2024-01-26 11:26:08'),
(45, 21, '4381, Al Mudhaffar Bin Saban, جدة, Mecca, 23822, Saudi Arabia', 39.060714170337, 21.794646976584, '2024-01-28 10:03:22', '2024-01-28 10:03:22'),
(46, 21, 'Al Quwayiyah, Riyadh Region, 19211, Saudi Arabia', 45.079199932516, 23.885899931749, '2024-01-29 08:25:40', '2024-01-29 08:25:40'),
(47, 22, 'Al Quwayiyah, Riyadh Region, 19211, Saudi Arabia', 45.079199932516, 23.885899931749, '2024-01-30 11:42:43', '2024-01-30 11:42:43'),
(48, 22, 'Al Quwayiyah, Riyadh Region, 19211, Saudi Arabia', 45.079199932516, 23.885899931749, '2024-01-30 11:42:48', '2024-01-30 11:42:48'),
(49, 23, 'Al Quwayiyah, Riyadh Region, 19211, Saudi Arabia', 45.079199932516, 23.885899931749, '2024-01-30 12:02:44', '2024-01-30 12:02:44'),
(50, 24, 'Rawalpindi, Punjab, Pakistan', 73.40371504426, 33.588587568651, '2024-01-31 11:09:01', '2024-01-31 11:09:01'),
(51, 26, 'Rawalpindi, Punjab, Pakistan', 73.40371504426, 33.588587568651, '2024-01-31 11:34:48', '2024-01-31 11:34:48'),
(52, 28, 'Rawalpindi, Punjab, Pakistan', 73.40371504426, 33.588587568651, '2024-01-31 12:55:05', '2024-01-31 12:55:05'),
(53, 29, 'Rawalpindi, Punjab, Pakistan', 73.403558135033, 33.588947579875, '2024-01-31 13:03:56', '2024-01-31 13:03:56'),
(54, 30, 'Rawalpindi, Punjab, Pakistan', 73.40356182307, 33.588867701641, '2024-02-01 00:33:55', '2024-02-01 00:33:55'),
(55, 31, 'Kahuta - Kotli Road, Rawalpindi, Punjab, Pakistan', 73.402779959142, 33.590125356291, '2024-02-01 00:41:04', '2024-02-01 00:41:04'),
(56, 32, 'Rawalpindi, Punjab, Pakistan', 73.40371504426, 33.588587568651, '2024-02-01 00:46:22', '2024-02-01 00:46:22'),
(57, 33, 'Rawalpindi, Punjab, Pakistan', 73.40371504426, 33.588587568651, '2024-02-01 00:55:38', '2024-02-01 00:55:38'),
(58, 34, 'Al Quwayiyah, Riyadh Region, 19211, Saudi Arabia', 45.079199932516, 23.885899931749, '2024-02-01 03:41:12', '2024-02-01 03:41:12'),
(59, 35, '6223 احمد العطاس، حي الزهراء، جدة 23521 3397، السعودية', 39.165487624705, 21.563065868091, '2024-02-01 08:50:25', '2024-02-01 08:50:25'),
(60, 38, 'Al Shujoun, جدة, Mecca, 23822, Saudi Arabia', 39.061840698123, 21.795663402621, '2024-02-12 11:03:50', '2024-02-12 11:03:50'),
(61, 39, '6223 احمد العطاس، حي الزهراء، جدة 23521 3397، السعودية', 39.061888642609, 21.794689626152, '2024-02-18 05:37:13', '2024-02-18 05:37:13'),
(62, 40, '8745–8781, طريق الأمير سلطان, جدة, منطقة مكة, 23435, المملكة العربية السعودية', 39.143289662898, 21.573891865903, '2024-04-21 23:32:21', '2024-04-21 23:32:21');

-- --------------------------------------------------------

--
-- Table structure for table `salon_employee`
--

CREATE TABLE `salon_employee` (
  `id` int NOT NULL,
  `salon_id` int NOT NULL,
  `employee_phone_no` varchar(15) DEFAULT NULL,
  `employee_name` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `salon_employee`
--

INSERT INTO `salon_employee` (`id`, `salon_id`, `employee_phone_no`, `employee_name`, `created_at`, `updated_at`) VALUES
(1, 1, '01149523148', 'employee naem', '2024-01-07 18:20:23', '2024-01-07 18:20:23'),
(2, 1, '01149523150', 'employee name', '2024-01-07 19:44:39', '2024-01-07 19:44:39'),
(3, 1, '01149523151', 'employee name', '2024-01-07 19:45:22', '2024-01-07 19:45:22'),
(4, 1, '01149523152', 'employee name', '2024-01-07 19:49:49', '2024-01-07 19:49:49'),
(5, 1, '01149523153', 'employee name', '2024-01-07 19:56:58', '2024-01-07 19:56:58'),
(6, 1, '01149523154', 'employee name', '2024-01-07 19:58:58', '2024-01-07 19:58:58'),
(7, 1, '01149523155', 'employee name', '2024-01-07 19:59:29', '2024-01-07 19:59:29'),
(8, 1, '01149523158', 'employee name', '2024-01-07 20:00:06', '2024-01-07 20:00:06'),
(9, 1, '01149523159', 'employee name', '2024-01-12 17:58:29', '2024-01-12 17:58:29'),
(10, 1, '01149523159', 'employee name', '2024-01-12 22:55:08', '2024-01-12 22:55:08'),
(11, 1, '01149523159', 'employee name', '2024-01-12 22:55:17', '2024-01-12 22:55:17'),
(12, 1, '01149523159', 'employee name', '2024-01-12 22:56:03', '2024-01-12 22:56:03'),
(13, 1, '01149523159', 'employee namer', '2024-01-12 22:56:12', '2024-01-12 22:56:12'),
(14, 1, '01149523159', 'employee namer', '2024-01-12 22:59:06', '2024-01-12 22:59:06'),
(15, 1, '01149523159', 'employee namer', '2024-01-12 22:59:53', '2024-01-12 22:59:53'),
(16, 1, '01149523162', 'employee name2', '2024-01-12 23:00:49', '2024-01-12 23:14:05'),
(17, 1, '01149523157', 'employee namer', '2024-01-12 23:28:05', '2024-01-12 23:28:05'),
(18, 7, '0523456789', 'Sarmad', '2024-01-23 01:50:09', '2024-01-23 01:50:09'),
(19, 7, '0566666666', 'sarmad', '2024-01-23 02:14:47', '2024-01-23 02:14:47'),
(20, 7, '0566666668', 'sarmad', '2024-01-23 02:14:53', '2024-01-23 02:14:53'),
(21, 6, '0571234578', 'sarmad', '2024-01-23 03:09:02', '2024-01-23 03:09:02'),
(22, 6, '0532945670', 'malik', '2024-01-23 03:09:14', '2024-01-23 03:09:14'),
(23, 8, '0578452135', 'taim', '2024-01-23 03:26:14', '2024-01-23 03:26:14'),
(24, 8, '0578453784', 'Ger', '2024-01-23 03:26:27', '2024-01-23 03:26:27'),
(25, 35, '+0522334455', 'nusrat', '2024-01-23 04:22:15', '2024-01-23 04:22:15'),
(26, 9, '0555556677', 'Rahat', '2024-01-23 04:22:29', '2024-01-23 04:22:29'),
(27, 9, '0577441122', 'Atif', '2024-01-23 04:22:42', '2024-01-23 04:22:42'),
(28, 10, '0512785698', 'Sarmad', '2024-01-23 04:35:55', '2024-01-23 04:35:55'),
(29, 10, '0567845123', 'sarmad', '2024-01-23 04:36:07', '2024-01-23 04:36:07'),
(30, 11, '0525852585', 'mantar', '2024-01-23 05:55:54', '2024-01-23 05:55:54'),
(31, 11, '0574612348', 'shanter', '2024-01-23 05:56:10', '2024-01-23 05:56:10'),
(32, 12, '0514785158', 'test employee', '2024-01-23 06:10:40', '2024-01-23 06:10:40'),
(33, 12, '0517741158', 'test employee 2', '2024-01-23 06:10:57', '2024-01-23 06:10:57'),
(34, 13, '0544466677', 'sarmad', '2024-01-23 06:37:10', '2024-01-23 06:37:10'),
(35, 13, '0577889966', 'sarmad', '2024-01-23 06:37:20', '2024-01-23 06:37:20'),
(36, 15, '0517751213', 'fagsg', '2024-01-24 04:37:07', '2024-01-24 04:37:07'),
(37, 15, '0522224178', 'gfsfgg', '2024-01-24 04:37:25', '2024-01-24 04:37:25'),
(38, 16, '0517775553', 'hdjdh', '2024-01-24 05:02:25', '2024-01-24 05:02:25'),
(39, 16, '0512774560', 'hshd', '2024-01-24 05:02:35', '2024-01-24 05:02:35'),
(40, 16, '0517774511', 'hdjd', '2024-01-24 05:02:45', '2024-01-24 05:02:45'),
(41, 17, '0541108111', 'yousef', '2024-01-24 06:24:49', '2024-01-24 06:24:49'),
(42, 17, '0541234567', 'raed', '2024-01-24 06:25:31', '2024-01-24 06:25:31'),
(43, 7, '0577781258', 'dawqwar', '2024-01-25 12:03:29', '2024-01-25 12:03:29'),
(44, 7, '0522548770', 'hdjdhdhb', '2024-01-25 12:03:55', '2024-01-25 12:03:55'),
(45, 18, '0511499999', 'gshdhg', '2024-01-25 12:17:20', '2024-01-25 12:17:20'),
(46, 19, '0511447750', 'يتي', '2024-01-26 11:08:13', '2024-01-26 11:08:13'),
(47, 20, '0517754213', 'gshs', '2024-01-26 11:26:27', '2024-01-26 11:26:27'),
(48, 14, '0545287456', 'red', '2024-01-28 08:29:32', '2024-01-28 08:29:32'),
(49, 14, '0541236987', 'Ted', '2024-01-28 08:29:51', '2024-01-28 08:29:51'),
(50, 21, '0524569874', 'Red', '2024-01-28 10:03:57', '2024-01-28 10:03:57'),
(51, 21, '0587412365', 'Blue', '2024-01-28 10:04:12', '2024-01-28 10:04:12'),
(52, 22, '0565656565', 'test', '2024-01-30 11:43:18', '2024-01-30 11:43:18'),
(53, 22, '0566666666', 'added', '2024-01-30 11:44:39', '2024-01-30 11:44:39'),
(54, 22, '0555555555', 'same employee', '2024-01-30 11:51:02', '2024-01-30 11:51:02'),
(55, 22, '0578998989', 'staff', '2024-01-30 11:53:10', '2024-01-30 11:53:10'),
(56, 22, '0522448866', 'different name', '2024-01-30 11:56:54', '2024-01-30 11:56:54'),
(57, 22, '0544447777', 'different name 1', '2024-01-30 11:58:39', '2024-01-30 11:58:39'),
(58, 23, '0555555555', 'first employee', '2024-01-30 12:03:13', '2024-01-30 12:03:13'),
(59, 23, '0537364833', 'add sad', '2024-01-30 12:05:11', '2024-01-30 12:05:11'),
(60, 23, '0523234453', 'did', '2024-01-30 12:05:25', '2024-01-30 12:05:25'),
(61, 23, '0565633421', 'Dodd', '2024-01-30 12:05:37', '2024-01-30 12:05:37'),
(62, 24, '0555555555', 'Raed', '2024-01-31 11:09:20', '2024-01-31 11:09:20'),
(63, 24, '0544447777', 'Sarmad test', '2024-01-31 11:09:37', '2024-01-31 11:09:37'),
(64, 26, '0525785421', 'fvc', '2024-01-31 11:34:59', '2024-01-31 11:34:59'),
(65, 28, '0512477854', 'fahgs', '2024-01-31 12:55:17', '2024-01-31 12:55:17'),
(66, 29, '0512754840', 'abssh', '2024-01-31 13:04:08', '2024-01-31 13:04:08'),
(67, 30, '+977574123698', 'test employee', '2024-02-01 00:34:28', '2024-02-01 00:34:28'),
(68, 31, '+977517548654', 'test user 1', '2024-02-01 00:41:19', '2024-02-01 00:41:19'),
(69, 32, '+977514725803', 'fhfg', '2024-02-01 00:46:43', '2024-02-01 00:46:43'),
(70, 33, '+977514785236', 'hug', '2024-02-01 00:55:51', '2024-02-01 00:55:51'),
(71, 34, '+966543121232', 'wee', '2024-02-01 03:41:28', '2024-02-01 03:41:28'),
(72, 35, '+966540546364', 'hanouf', '2024-02-01 08:51:31', '2024-02-01 08:51:31'),
(73, 38, '+966555555555', 'Sam', '2024-02-12 11:05:18', '2024-02-12 11:05:18'),
(74, 38, '+966544444444', 'kam', '2024-02-12 11:05:35', '2024-02-12 11:05:35'),
(75, 38, '+966522222222', 'Sam', '2024-02-12 11:06:20', '2024-02-12 11:06:20'),
(76, 38, '+966588888888', 'pol', '2024-02-12 11:06:34', '2024-02-12 11:06:34'),
(77, 39, '+966556420863', 'Maria', '2024-02-18 05:38:46', '2024-02-18 05:38:46'),
(78, 39, '+966544444444', 'Dana', '2024-02-18 05:40:31', '2024-02-18 05:40:31'),
(79, 40, '+966562390750', 'roshel', '2024-04-21 23:33:15', '2024-04-21 23:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `salon_gallery`
--

CREATE TABLE `salon_gallery` (
  `id` int NOT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `gallery` varchar(500) DEFAULT NULL,
  `user_phone_no` varchar(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `salon_gallery`
--

INSERT INTO `salon_gallery` (`id`, `logo`, `gallery`, `user_phone_no`, `updated_at`, `created_at`) VALUES
(50, '33b3214d792caf311e1f00fd22b392c5.jpg', 'cefb500a9f3d05511296a719cffb21cf.jpg|73f490f3f868edbcd80b5d3f7cedc403.jpg|363763e5c3dc3a68b399058c34aecf2c.jpg|3e7e0224018ab3cf51abb96464d518cd.jpg', '0588888888', '2024-01-23 03:54:16', '2024-01-23 03:54:16'),
(51, '7283518d47a05a09d33779a17adf1707.jpg', '0163cceb20f5ca7b313419c068abd9dc.jpg|af5afd7f7c807171981d443ad4f4f648.jpg|2ba61cc3a8f44143e1f2f13b2b729ab3.jpg', '+0511223344', '2024-01-23 04:38:12', '2024-01-23 04:38:12'),
(53, '544a4f59f691574154a60b8539ebf914.jpg', '966eaa9527eb956f0dc8788132986707.jpg|b8cfbf77a3d250a4523ba67a65a7d031.jpg|81d7118d88d5570189ace943bd14f142.jpg', '+0566677788', '2024-01-23 06:03:33', '2024-01-23 06:03:33'),
(54, '83451e7ef8755c2a8f464093c808f529.jpg', '236f119f58f5fd102c5a2ca609fdcbd8.jpg|66121d1f782d29b62a286909165517bc.jpg|856fc81623da2150ba2210ba1b51d241.jpg', '+0544112233', '2024-01-23 06:12:18', '2024-01-23 06:12:18'),
(56, '1f5f5b265100daad35b3a491e1c55351.jpg', '6a61d423d02a1c56250dc23ae7ff12f3.jpg|dbb422937d7ff56e049d61da730b3e11.jpg|8e68c3c7bf14ad0bcaba52babfa470bd.jpg', '+0588811133', '2024-01-23 06:38:21', '2024-01-23 06:38:21'),
(57, '36e51f22c86d237a5bb2e3451f8a7072.jpg', 'c0fda89ebd645bd7cea60fcbb5960309.jpg|a1324603d9b1a22277809229934a36fd.jpg|94e4451ad23909020c28b26ca3a13cb8.jpg', '+0511144477', '2024-01-24 04:44:02', '2024-01-24 04:44:02'),
(60, '689016f6ee80ef507e2f5d67614b4be8.jpg', '7f2cba89a7116c7c6b0a769572d5fad9.jpg|940392f5f32a7ade1cc201767cf83e31.jpg|d04d42cdf14579cd294e5079e0745411.jpg', '+0588888555', '2024-01-25 13:04:45', '2024-01-25 13:04:45'),
(62, '286674e3082feb7e5afb92777e48821f.jpg', 'dfea0768cc6ba51dd20c7224016b0bd7.jpg|c4ef9c39b300931b69a36fb3dbb8d60e.jpg|48c00ae965e23b2869f8eaa13d2dcefa.jpg', '+0533337777', '2024-01-26 11:17:17', '2024-01-26 11:17:17'),
(63, '63d5fb54a858dd033fe90e6e4a74b0f0.jpg', '83451e7ef8755c2a8f464093c808f529.jpg|6acb084470c0a8bdf431d5427d1f29bc.jpg', '+0599991111', '2024-01-26 11:28:48', '2024-01-26 11:28:48'),
(65, 'de7f47e09c8e05e6021ababdf6bc58e7.jpg', 'fc2dc7d20994a777cfd5e6de734fe254.jpg', '+0541108111', '2024-01-28 10:12:09', '2024-01-28 10:12:09'),
(66, '44e215cfff0d2a4a66e595d3923cb843.jpg', '10c66082c124f8afe3df4886f5e516e0.jpg|8909a6e385b0fbc1f3885c00ae838de7.jpeg|3ebd728de6fa78aa8bc932e9abece9c0.jpeg', '0555555555', '2024-01-28 12:55:37', '2024-01-28 12:55:37'),
(67, 'd93c96e6a23fff65b91b900aaa541998.jpeg', 'bcc0d400288793e8bdcd7c19a8ac0c2b.pdf|a4666cd9e1ab0e4abf05a0fb232f4ad3.jpg', '1235', '2024-01-29 06:17:40', '2024-01-29 06:17:40'),
(70, '665d5cbb82b5785d9f344c46417c6c36.png', '59d9b46aa00c70238bb89056cfeb96c0.png|0f9cafd014db7a619ddb4276af0d692c.jpeg', '0566666666', '2024-01-29 06:32:24', '2024-01-29 06:32:24'),
(75, 'a724b9124acc7b5058ed75a31a9c2919.jpg', '4f53d60aee2ffa2af10e3463da26b784.jpg|2e7638c6f7667569fe469fec28c7405b.jpg|9529fbba677729d3206b3b9073d1e9ca.jpg', '+0555555555', '2024-01-29 09:04:09', '2024-01-29 09:04:09'),
(76, 'c1bb2ec7a913e32a2d05cacf3b83cd1b.jpg', 'fc1dc4549df0335d7f506edb5d66af16.jpg', '+0566666666', '2024-01-29 11:12:32', '2024-01-29 11:12:32'),
(81, 'cc42acc8ce334185e0193753adb6cb77.png', '20ba7f85c05c5e5b75abced9ece67ac9.heic', '0544447777', '2024-01-30 13:08:48', '2024-01-30 13:08:48'),
(86, '2172fde49301047270b2897085e4319d.jpg', '7e9e346dc5fd268b49bf418523af8679.jpg|eaa52f3366768bca401dca9ea5b181dd.jpg|3b2acfe2e38102074656ed938abf4ac3.jpg|530468698061c34fe19ecbdf1a5fb950.jpg', '+0544447777', '2024-01-30 13:52:32', '2024-01-30 13:52:32'),
(87, '2fe2a9d4c06124698de449b12aeb6249.jpg', '1cd73be1e256a7405516501e94e892ac.jpg|a4fa7175d4757e45eac71a8487751f63.jpg', '+0588008800', '2024-01-31 11:11:30', '2024-01-31 11:11:30'),
(88, '31ca0ca71184bbdb3de7b20a51e88e90.png', 'a8fa3c8e035cf26461d25cf448047f04.heic', '0534534534', '2024-01-31 11:30:31', '2024-01-31 11:30:31'),
(89, '35464c848f410e55a13bb9d78e7fddd0.jpg', '65f2a94c8c2d56d5b43a1a3d9d811102.jpg', '0575335789', '2024-01-31 11:35:34', '2024-01-31 11:35:34'),
(90, 'db2de541293171af2b0ccdf7c64d72d4.jpg', '6f683b372cc7eacb980ec61b736cac74.jpg|3e9f7c16bd1cdea78f8e2eea72dfdfbe.jpeg|ae31ee951b4d4bfb5518e0fcdc064a83.jpeg', '20100000', '2024-01-31 11:42:50', '2024-01-31 11:42:50'),
(91, 'dab49080d80c724aad5ebf158d63df41.jpg', '2d36b5821f8affc6868b59dfc9af6c9f.jpg|3937230de3c8041e4da6ac3246a888e8.jpg|a0f3601dc682036423013a5d965db9aa.jpg|4d0b954f0bef437c29dfa73fafdf3fa5.jpg', '+0533366699', '2024-01-31 12:56:16', '2024-01-31 12:56:16'),
(92, 'da21bae82c02d1e2b8168d57cd3fbab7.jpg', '3fc0a5dc1f5757c71b88be8adbfd10e9.jpg|b8ffa41d4e492f0fad2f13e29e1762eb.jpg|9ee70b7987a735c046ac30a1556272c8.jpg|dc0c398086fee58f9d64e1e47aa4e586.jpg', '+0577889900', '2024-01-31 13:04:55', '2024-01-31 13:04:55'),
(93, '0e139b17a92b2df7d6c3c840e51465fe.jpg', '5b970a1d9be0fd100063fd6cd688b73e.jpg|8d6a06b2f1208b59454a9a749928b0c0.jpg|a3048e47310d6efaa4b1eaf55227bc92.jpg|1c54985e4f95b7819ca0357c0cb9a09f.jpg', '+977566667777', '2024-02-01 00:36:01', '2024-02-01 00:36:01'),
(96, 'fdda6e957f1e5ee2f3b311fe4f145ae1.png', 'e242660df1b69b74dcc7fde711f924ff.heic', '977534534534', '2024-02-01 00:51:12', '2024-02-01 00:51:12'),
(97, '81c8727c62e800be708dbf37c4695dff.jpg', '9ee70b7987a735c046ac30a1556272c8.jpg|10cc088a48f313ab3b1f4e6e76353dd4.jpg|75f266633433d20abf6c1a13d97e7491.jpg', '+977512457845', '2024-02-01 00:51:30', '2024-02-01 00:51:30'),
(98, '8c53d30ad023ce50140181f713059ddf.jpg', '4f5a97cf06cf69028997db51d8726d28.jpg|e3bc4e7f243ebc05d66a0568a3331966.jpg|7d128c1d4a33165a8676d1650d8ff828.jpg|5c16b0d099fd16c49462fb3c951b3ebf.jpg|f7696a9b362ac5a51c3dc8f098b73923.jpg|9715d04413f296eaf3c30c47cec3daa6.jpg', '+977577553366', '2024-02-01 00:57:07', '2024-02-01 00:57:07'),
(99, '5f8a7deb15235a128fcd99ad6bfde11e.jpg', '23ad3e314e2a2b43b4c720507cec0723.jpg', '+966543234232', '2024-02-01 03:42:31', '2024-02-01 03:42:31'),
(102, 'b030afbb3a8af8fb0759241c97466ee4.jpg', '80f2f15983422987ea30d77bb531be86.jpeg|e7d161ac8d8a76529d39d9f5b4249ccb.jpeg|37bf8bb245c5ae952fb107153f18958f.jpg|d08726019e4a2a15cb1d49092e4d0522.png', '966563177773', '2024-02-04 09:23:33', '2024-02-04 09:23:33'),
(106, '2912bbeedc16c67bd0529ab7d438c1ac.jpg', '7eb5ac36014a76629c40069e46136a61.jpg|7417744a2bac776fabe5a09b21c707a2.jpg|e345fac6bc5c868f0222430c733fa26e.jpg|20ef119e812e178ecb44efa448b57ebc.jpg|2e92962c0b6996add9517e4242ea9bdc.jpg|a48564053b3c7b54800246348c7fa4a0.jpg|50c1f44e426560f3f2cdcb3e19e39903.jpg|4f05d4821fe9967817dea5a20c4e7b35.jpg', '+966562124074', '2024-04-21 23:43:39', '2024-04-21 23:43:39'),
(107, '8909a6e385b0fbc1f3885c00ae838de7.jpg', '8722c8f495dcee23f39d5519735e1f71.jpg|1bd36c9ae813f304363ae6ac7f48068e.jpg|fbaafc6ec0f0e70f1472122178b4a1a1.jpg|7180cffd6a8e829dacfc2a31b3f72ece.jpg|15e122e839dfdaa7ce969536f94aecf6.jpg', '+966563177773', '2024-04-22 09:33:29', '2024-04-22 09:33:29'),
(108, 'c9bc734c0663a142b7bec265098f8dbf.jpg', 'e43739bba7cdb577e9e3e4e42447f5a5.jpg|63eb58bd4d3486f001438f911a11d323.jpg|4042483f5c2c4015e2a6abd47aa76b6f.jpg|70f250e2d762fbde8a2e70eabf6eb953.jpg', '+966556420863', '2024-04-22 11:19:17', '2024-04-22 11:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `salon_invoices`
--

CREATE TABLE `salon_invoices` (
  `id` int NOT NULL,
  `salon_id` int DEFAULT NULL,
  `salon_mob_num` varchar(20) DEFAULT NULL,
  `client_mob_num` varchar(20) DEFAULT NULL,
  `client_id` int DEFAULT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `payment_status` varchar(15) DEFAULT NULL,
  `payment_response` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `salon_invoices`
--

INSERT INTO `salon_invoices` (`id`, `salon_id`, `salon_mob_num`, `client_mob_num`, `client_id`, `amount`, `payment_status`, `payment_response`, `created_at`, `updated_at`) VALUES
(1, 35, '+966123456789', '12345', NULL, '100', 'Paid', NULL, '2024-02-18 09:23:52', '2024-02-18 09:26:31'),
(2, 35, '+966123456789', '+966558800789', NULL, '100', 'Paid', NULL, '2024-02-18 10:59:53', '2024-02-18 11:00:13'),
(3, 35, '+966123456789', '+966558800789', NULL, '100', 'Paid', NULL, '2024-03-01 11:07:38', '2024-03-01 11:49:07'),
(4, 35, '+966123456789', '+966556677889', NULL, '1000', 'Paid', NULL, '2024-03-01 11:46:00', '2024-03-01 11:49:07'),
(5, 35, '+966563177773', '+966551234556', NULL, '200', 'Paid', NULL, '2024-03-01 12:10:02', '2024-03-01 12:10:53'),
(6, 35, '+966563177773', '+966551234556', NULL, '200', 'Paid', NULL, '2024-03-01 12:15:06', '2024-03-01 12:18:43'),
(7, 35, '+966563177773', '+966551234556', NULL, '200', 'Paid', NULL, '2024-03-01 12:24:25', '2024-03-01 12:25:19'),
(8, 35, '+966563177773', '+966551234556', NULL, '200', 'Paid', NULL, '2024-03-01 12:27:46', '2024-03-01 12:28:18'),
(9, 35, '+966563177773', '+966551234556', NULL, '200', 'Paid', NULL, '2024-03-01 12:29:47', '2024-03-01 12:30:14'),
(10, 35, '+966563177773', '+966551234556', NULL, '200', 'Paid', NULL, '2024-03-01 12:30:19', '2024-03-01 12:30:51'),
(11, 35, '+966563177773', '+966551234556', NULL, '200', 'Paid', NULL, '2024-03-01 12:32:13', '2024-03-01 12:32:40'),
(12, 35, '+966563177773', '+966551234556', NULL, '200', 'Paid', NULL, '2024-03-01 12:34:18', '2024-03-01 12:34:54'),
(13, 35, '+966563177773', '+966551234556', NULL, '200', 'Paid', NULL, '2024-03-01 12:36:40', '2024-03-01 12:37:08'),
(14, 35, '+966563177773', '+966551234556', NULL, '200', 'Paid', NULL, '2024-03-01 12:39:10', '2024-03-01 12:39:59'),
(15, 35, '+966563177773', '+966551234556', NULL, '200', 'Paid', NULL, '2024-03-01 12:41:13', '2024-03-01 12:41:50'),
(16, 35, '+966563177773', '+966551472580', NULL, '200', 'Paid', NULL, '2024-03-01 12:46:58', '2024-03-01 12:47:30'),
(17, 35, '+966563177773', '+966557891234', NULL, '200', 'Paid', NULL, '2024-03-04 10:15:36', '2024-03-04 10:33:57'),
(18, 35, '+966563177773', '+966557891234', NULL, '400', 'Paid', NULL, '2024-03-04 10:23:37', '2024-03-04 10:33:57'),
(19, 35, '+966563177773', '+966557891234', NULL, '600', 'Paid', NULL, '2024-03-04 10:24:07', '2024-03-04 10:33:57'),
(20, 35, '+966563177773', '+966557891234', NULL, '800', 'Paid', NULL, '2024-03-04 10:25:21', '2024-03-04 10:33:57'),
(21, 35, '+966563177773', '+966557891234', NULL, '1000', 'Paid', NULL, '2024-03-04 10:30:24', '2024-03-04 10:33:57'),
(22, 35, '+966563177773', '+966557891234', NULL, '1200', 'Paid', NULL, '2024-03-04 10:31:31', '2024-03-04 10:33:57'),
(23, 35, '+966563177773', '+966557891234', NULL, '1400', 'Paid', NULL, '2024-03-04 10:32:37', '2024-03-04 10:33:57'),
(24, 35, '+966563177773', '+966557891234', NULL, '200', 'Not Paid', NULL, '2024-03-04 10:58:18', '2024-03-04 10:58:18'),
(25, 35, '+966563177773', '+966557891234', NULL, '300', 'Not Paid', NULL, '2024-03-04 10:59:42', '2024-03-04 10:59:42'),
(26, 35, '+966563177773', '+966522222221', NULL, '200', 'Not Paid', NULL, '2024-03-05 00:21:52', '2024-03-05 00:21:52'),
(27, 35, '+966563177773', '+966551234567', NULL, '200', 'Paid', NULL, '2024-03-11 00:00:56', '2024-03-11 00:01:27'),
(28, 35, '+966563177773', '+966543996969', NULL, '0', 'Not Paid', NULL, '2024-03-30 14:46:42', '2024-03-30 14:46:42'),
(29, 35, '+966563177773', '+966555555555', NULL, '0', 'Not Paid', NULL, '2024-04-03 06:58:37', '2024-04-03 06:58:37'),
(30, 35, '+966563177773', '+966557777888', NULL, '200', 'Not Paid', NULL, '2024-04-06 01:55:22', '2024-04-06 01:55:22'),
(31, 35, '+966563177773', '+966543996969', NULL, '100', 'Not Paid', NULL, '2024-04-24 07:41:21', '2024-04-24 07:41:21'),
(32, 35, '+966563177773', '+966554433221', NULL, '200', 'Not Paid', NULL, '2024-05-21 08:30:46', '2024-05-21 08:30:46'),
(33, 35, '+966563177773', '+966554433221', NULL, '400', 'Not Paid', NULL, '2024-05-21 08:31:08', '2024-05-21 08:31:08'),
(34, 35, '+966563177773', '+966554433221', NULL, '600', 'Not Paid', NULL, '2024-05-21 08:31:16', '2024-05-21 08:31:16'),
(35, 35, '+966563177773', '+966554433221', NULL, '800', 'Not Paid', NULL, '2024-05-21 08:31:19', '2024-05-21 08:31:19'),
(36, 35, '+966563177773', '+966554433221', NULL, '1000', 'Not Paid', NULL, '2024-05-21 08:31:23', '2024-05-21 08:31:23'),
(37, 35, '+966563177773', '+966554433221', NULL, '1200', 'Not Paid', NULL, '2024-05-21 08:31:28', '2024-05-21 08:31:28'),
(38, 35, '+966123456789', '12345', NULL, '100', 'Not Paid', NULL, '2024-12-13 10:52:52', '2024-12-13 10:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `salon_master`
--

CREATE TABLE `salon_master` (
  `id` int NOT NULL,
  `user_phone_no` varchar(20) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `arabic_name` varchar(200) DEFAULT NULL,
  `service_type` int DEFAULT NULL,
  `business_type` int DEFAULT NULL,
  `commercial_file` varchar(500) DEFAULT NULL,
  `tax_file` varchar(500) DEFAULT NULL,
  `bank_id` int DEFAULT NULL,
  `IBAN_file` varchar(500) DEFAULT NULL,
  `team_member` int DEFAULT NULL,
  `branches_no` int DEFAULT NULL,
  `working_days` int DEFAULT NULL,
  `working_hours_from` varchar(15) DEFAULT NULL,
  `working_hours_till` varchar(15) DEFAULT NULL,
  `offering_24h_services` tinyint(1) NOT NULL DEFAULT '0',
  `clients_type` varchar(200) DEFAULT NULL,
  `work_style` int NOT NULL DEFAULT '1',
  `salon_services` tinyint(1) NOT NULL DEFAULT '0',
  `home_services` tinyint(1) NOT NULL DEFAULT '0',
  `serving_females` tinyint(1) NOT NULL DEFAULT '0',
  `serving_males` tinyint(1) NOT NULL DEFAULT '0',
  `working_monday` tinyint(1) NOT NULL DEFAULT '0',
  `working_tuesday` tinyint(1) NOT NULL DEFAULT '0',
  `working_wednesday` tinyint(1) NOT NULL DEFAULT '0',
  `working_thrusday` tinyint(1) NOT NULL DEFAULT '0',
  `working_friday` tinyint(1) NOT NULL DEFAULT '0',
  `working_saturday` tinyint(1) NOT NULL DEFAULT '0',
  `working_sunday` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `salon_master`
--

INSERT INTO `salon_master` (`id`, `user_phone_no`, `name`, `arabic_name`, `service_type`, `business_type`, `commercial_file`, `tax_file`, `bank_id`, `IBAN_file`, `team_member`, `branches_no`, `working_days`, `working_hours_from`, `working_hours_till`, `offering_24h_services`, `clients_type`, `work_style`, `salon_services`, `home_services`, `serving_females`, `serving_males`, `working_monday`, `working_tuesday`, `working_wednesday`, `working_thrusday`, `working_friday`, `working_saturday`, `working_sunday`, `created_at`, `updated_at`) VALUES
(35, '+966563177773', 'Al Masaj', 'المساج', 1, 3, 'e951ccd95572a67138f4572c1c7d7ee8.pdf', NULL, 2, '117ffc1acd844e431a4b73f0867adae5.pdf', 1, 1, 0, '10:30 PM', '10:30 PM', 0, '0', 1, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, '2024-02-01 08:48:37', '2024-04-22 09:32:19'),
(37, '+966541108111', 'A', 'a', 1, 3, NULL, NULL, NULL, NULL, 1, 1, 5, '12:00 AM', '11:59 PM', 1, '1', 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, '2024-02-08 03:03:56', '2024-02-08 03:03:56'),
(38, '+966543996969', 'xyz', 'الجمال', 1, 1, 'a4666cd9e1ab0e4abf05a0fb232f4ad3.pdf', NULL, 1, 'c10f48884c9c7fdbd9a7959c59eebea8.pdf', 1, 1, 4, '12:00 AM', '11:59 PM', 1, '0', 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, '2024-02-12 11:03:09', '2024-09-19 05:06:39'),
(39, '+966556420863', 'Highlights', 'هايلايتس', 1, 1, '69961657077e0093ed761aa01916c5ff.pdf', NULL, 10, '054ab897023645cd7ad69525c46992a0.pdf', 1, 1, 0, '12:00 AM', '12:00 AM', 0, '0', 1, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, '2024-02-18 05:32:57', '2024-04-22 11:16:55'),
(40, '+966562124074', 'the blue spa', 'دا بلو سبا', 1, 1, '95c3f1a8b262ec7a929a8739e21142d7.pdf', NULL, 1, '250dd56814ad7c50971ee4020519c6f5.pdf', 1, 1, 0, '12:32 AM', '12:32 AM', 0, '0', 1, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, '2024-04-21 16:25:45', '2024-04-22 11:33:55'),
(41, '+966555555555', 'Dads dad', 'added', 1, 3, NULL, NULL, NULL, NULL, 1, 1, 6, '10:07 PM', '10:07 PM', 0, '0', 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, '2024-12-19 09:08:00', '2024-12-19 09:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `salon_services`
--

CREATE TABLE `salon_services` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `user_phone_no` varchar(20) DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `subcategory_id` int DEFAULT NULL,
  `serving_females` tinyint(1) DEFAULT '0',
  `serving_males` tinyint(1) DEFAULT '0',
  `service_description` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `service_duration` smallint DEFAULT NULL,
  `service_price` float DEFAULT NULL,
  `isactive` tinyint(1) DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `salon_services`
--

INSERT INTO `salon_services` (`id`, `user_id`, `user_phone_no`, `category_id`, `subcategory_id`, `serving_females`, `serving_males`, `service_description`, `service_duration`, `service_price`, `isactive`, `updated_at`, `created_At`) VALUES
(3, 0, '01149523148', 1, 1, 0, 0, '', 0, 0, 1, '2023-12-27 05:37:36', '2023-12-27 05:37:36'),
(4, 0, '01149523148', 1, 2, 0, 0, '', 0, 0, 1, '2023-12-27 05:37:36', '2023-12-27 05:37:36'),
(19, 0, '1235', 1, 1, 1, 1, 'service1', 80, 150, 1, '2024-01-20 02:06:25', '2024-01-20 02:06:25'),
(20, 0, '1235', 1, 2, 1, 0, 'service2', 20, 100, 1, '2024-01-20 02:06:25', '2024-01-20 02:06:25'),
(58, NULL, '0566666666', 1, 1, 0, 1, 'Test', 15, 100, 1, '2024-01-23 02:24:51', '2024-01-23 02:24:51'),
(59, NULL, '0566666666', 1, 2, 0, 0, '', 0, 10, 1, '2024-01-23 02:24:51', '2024-01-23 02:24:51'),
(60, NULL, '0566666666', 1, 3, 0, 0, '', 0, 20.1, 1, '2024-01-23 02:24:51', '2024-01-23 02:24:51'),
(61, NULL, '0566666666', 1, 4, 0, 0, '', 0, 19, 1, '2024-01-23 02:24:51', '2024-01-23 02:24:51'),
(62, NULL, '0566666666', 2, 5, 1, 0, 'This is test description', 45, 200, 1, '2024-01-23 02:56:10', '2024-01-23 02:56:10'),
(63, NULL, '0566666666', 2, 6, 0, 0, '', 0, 0, 1, '2024-01-23 02:56:10', '2024-01-23 02:56:10'),
(64, NULL, '0566666666', 2, 7, 0, 0, '', 0, 0, 1, '2024-01-23 02:56:10', '2024-01-23 02:56:10'),
(69, NULL, '0533333333', 1, 1, 1, 1, 'Gshhshddh', 45, 100, 1, '2024-01-23 03:11:30', '2024-01-23 03:11:30'),
(70, NULL, '0533333333', 1, 2, 1, 1, 'Bnnb. N', 60, 100, 1, '2024-01-23 03:11:30', '2024-01-23 03:11:30'),
(71, NULL, '0533333333', 1, 3, 0, 0, '', 0, 0, 1, '2024-01-23 03:11:30', '2024-01-23 03:11:30'),
(72, NULL, '0533333333', 1, 4, 0, 0, '', 0, 0, 1, '2024-01-23 03:11:30', '2024-01-23 03:11:30'),
(76, NULL, '0533333333', 2, 5, 1, 0, 'Yyyyu', 15, 100, 1, '2024-01-23 03:20:27', '2024-01-23 03:20:27'),
(77, NULL, '0533333333', 2, 6, 0, 0, '', 0, 0, 1, '2024-01-23 03:20:27', '2024-01-23 03:20:27'),
(78, NULL, '0533333333', 2, 7, 0, 0, '', 0, 0, 1, '2024-01-23 03:20:27', '2024-01-23 03:20:27'),
(79, NULL, '0588888888', 1, 1, 1, 0, 'Hdjdb', 30, 120, 1, '2024-01-23 03:26:54', '2024-01-23 03:26:54'),
(80, NULL, '0588888888', 1, 2, 0, 0, '', 0, 0, 1, '2024-01-23 03:26:54', '2024-01-23 03:26:54'),
(81, NULL, '0588888888', 1, 3, 0, 0, '', 0, 0, 1, '2024-01-23 03:26:54', '2024-01-23 03:26:54'),
(82, NULL, '0588888888', 1, 4, 0, 0, '', 0, 0, 1, '2024-01-23 03:26:54', '2024-01-23 03:26:54'),
(83, NULL, '0588888888', 2, 5, 1, 0, 'Bjbjbjbj', 15, 100, 1, '2024-01-23 03:28:10', '2024-01-23 03:28:10'),
(84, NULL, '0588888888', 2, 6, 0, 1, 'Bnbbjbj', 15, 100, 1, '2024-01-23 03:28:10', '2024-01-23 03:28:10'),
(86, NULL, '+0511223344', 1, 1, 0, 1, 'Services', 60, 100, 1, '2024-01-23 04:24:02', '2024-01-23 04:24:02'),
(87, NULL, '+0511223344', 1, 2, 0, 0, '', 0, 0, 1, '2024-01-23 04:24:02', '2024-01-23 04:24:02'),
(88, NULL, '+0511223344', 1, 3, 0, 0, '', 0, 0, 1, '2024-01-23 04:24:02', '2024-01-23 04:24:02'),
(89, NULL, '+0511223344', 1, 4, 0, 0, '', 0, 0, 1, '2024-01-23 04:24:02', '2024-01-23 04:24:02'),
(90, NULL, '+0511223344', 2, 5, 1, 1, 'Vhvuvvuv', 60, 10, 1, '2024-01-23 04:36:44', '2024-01-23 04:36:44'),
(91, NULL, '+0511223344', 2, 6, 1, 0, 'Jvvhvvjv', 30, 100, 1, '2024-01-23 04:36:44', '2024-01-23 04:36:44'),
(92, NULL, '+0511223344', 2, 7, 0, 0, '', 0, 0, 1, '2024-01-23 04:36:44', '2024-01-23 04:36:44'),
(93, NULL, '+0566677788', 1, 1, 1, 1, 'Bdjdb', 30, 120, 1, '2024-01-23 05:56:31', '2024-01-23 05:56:31'),
(94, NULL, '+0566677788', 1, 2, 0, 0, '', 0, 0, 1, '2024-01-23 05:56:31', '2024-01-23 05:56:31'),
(95, NULL, '+0566677788', 1, 3, 0, 0, '', 0, 0, 1, '2024-01-23 05:56:31', '2024-01-23 05:56:31'),
(96, NULL, '+0566677788', 1, 4, 0, 0, '', 0, 0, 1, '2024-01-23 05:56:31', '2024-01-23 05:56:31'),
(97, NULL, '+0544112233', 1, 1, 1, 1, 'Hi this is test description ', 30, 20, 1, '2024-01-23 06:11:41', '2024-01-23 06:11:41'),
(98, NULL, '+0544112233', 1, 2, 0, 1, 'Test description', 45, 18, 1, '2024-01-23 06:11:41', '2024-01-23 06:11:41'),
(99, NULL, '+0544112233', 1, 3, 0, 0, '', 0, 0, 1, '2024-01-23 06:11:41', '2024-01-23 06:11:41'),
(100, NULL, '+0544112233', 1, 4, 0, 0, '', 0, 0, 1, '2024-01-23 06:11:41', '2024-01-23 06:11:41'),
(101, NULL, '+0566666666', 1, 1, 1, 1, 'Bsjdbdj', 15, 100, 1, '2024-01-23 06:25:17', '2024-01-23 06:25:17'),
(102, NULL, '+0566666666', 1, 2, 1, 1, 'Hsjdbdjb', 45, 100, 1, '2024-01-23 06:25:17', '2024-01-23 06:25:17'),
(103, NULL, '+0566666666', 1, 3, 0, 0, '', 0, 0, 1, '2024-01-23 06:25:17', '2024-01-23 06:25:17'),
(104, NULL, '+0566666666', 1, 4, 0, 0, '', 0, 0, 1, '2024-01-23 06:25:17', '2024-01-23 06:25:17'),
(105, NULL, '+0566666666', 2, 5, 1, 1, 'This is for testing', 30, 50, 1, '2024-01-23 06:30:05', '2024-01-23 06:30:05'),
(106, NULL, '+0566666666', 2, 6, 1, 1, 'Bdjbddj', 60, 150, 1, '2024-01-23 06:30:05', '2024-01-23 06:30:05'),
(107, NULL, '+0566666666', 2, 7, 0, 0, '', 0, 0, 1, '2024-01-23 06:30:05', '2024-01-23 06:30:05'),
(108, NULL, '+0588811133', 1, 1, 1, 0, 'Bdjdbbf', 45, 100, 1, '2024-01-23 06:37:43', '2024-01-23 06:37:43'),
(109, NULL, '+0588811133', 1, 2, 1, 0, 'Vdjdvj', 15, 100, 1, '2024-01-23 06:37:43', '2024-01-23 06:37:43'),
(110, NULL, '+0588811133', 1, 3, 0, 0, '', 0, 0, 1, '2024-01-23 06:37:43', '2024-01-23 06:37:43'),
(111, NULL, '+0588811133', 1, 4, 0, 0, '', 0, 0, 1, '2024-01-23 06:37:43', '2024-01-23 06:37:43'),
(112, NULL, '+0511144477', 1, 1, 1, 0, 'Nskdbdkfnf', 15, 100, 1, '2024-01-24 04:41:37', '2024-01-24 04:41:37'),
(113, NULL, '+0511144477', 1, 2, 0, 0, '', 0, 0, 1, '2024-01-24 04:41:37', '2024-01-24 04:41:37'),
(114, NULL, '+0511144477', 1, 3, 0, 0, '', 0, 0, 1, '2024-01-24 04:41:37', '2024-01-24 04:41:37'),
(115, NULL, '+0511144477', 1, 4, 0, 0, '', 0, 0, 1, '2024-01-24 04:41:37', '2024-01-24 04:41:37'),
(116, NULL, '+0522228888', 1, 1, 1, 0, 'Hchvhvhc ', 45, 100, 1, '2024-01-24 05:08:02', '2024-01-24 05:08:02'),
(117, NULL, '+0522228888', 1, 2, 0, 0, '', 0, 0, 1, '2024-01-24 05:08:02', '2024-01-24 05:08:02'),
(118, NULL, '+0522228888', 1, 3, 0, 0, '', 0, 0, 1, '2024-01-24 05:08:02', '2024-01-24 05:08:02'),
(119, NULL, '+0522228888', 1, 4, 0, 0, '', 0, 0, 1, '2024-01-24 05:08:02', '2024-01-24 05:08:02'),
(120, NULL, '+0541108111', 1, 1, 0, 0, '', 0, 0, 1, '2024-01-24 06:26:09', '2024-01-24 06:26:09'),
(121, NULL, '+0541108111', 1, 2, 0, 1, 'Test', 15, 100, 1, '2024-01-24 06:26:09', '2024-01-24 06:26:09'),
(122, NULL, '+0541108111', 1, 3, 0, 0, '', 0, 0, 1, '2024-01-24 06:26:09', '2024-01-24 06:26:09'),
(123, NULL, '+0541108111', 1, 4, 0, 0, '', 0, 0, 1, '2024-01-24 06:26:09', '2024-01-24 06:26:09'),
(124, NULL, '+0588888555', 1, 1, 1, 1, 'Bs zbznzbsjsks', 45, 100, 1, '2024-01-25 12:38:07', '2024-01-25 12:38:07'),
(125, NULL, '+0588888555', 1, 2, 0, 0, '', 0, 0, 1, '2024-01-25 12:38:07', '2024-01-25 12:38:07'),
(126, NULL, '+0588888555', 1, 3, 0, 0, '', 0, 0, 1, '2024-01-25 12:38:07', '2024-01-25 12:38:07'),
(127, NULL, '+0588888555', 1, 4, 0, 0, '', 0, 0, 1, '2024-01-25 12:38:07', '2024-01-25 12:38:07'),
(128, NULL, '+0588888555', 2, 5, 0, 0, '', 0, 0, 1, '2024-01-25 13:03:50', '2024-01-25 13:03:50'),
(129, NULL, '+0588888555', 2, 6, 1, 1, 'Guydfgfd', 15, 100, 1, '2024-01-25 13:03:50', '2024-01-25 13:03:50'),
(130, NULL, '+0588888555', 2, 7, 0, 0, '', 0, 0, 1, '2024-01-25 13:03:50', '2024-01-25 13:03:50'),
(131, NULL, '+0533337777', 1, 1, 1, 1, 'تبنبر', 45, 100, 1, '2024-01-26 11:08:40', '2024-01-26 11:08:40'),
(132, NULL, '+0533337777', 1, 2, 0, 0, '', 0, 0, 1, '2024-01-26 11:08:40', '2024-01-26 11:08:40'),
(133, NULL, '+0533337777', 1, 3, 0, 0, '', 0, 0, 1, '2024-01-26 11:08:40', '2024-01-26 11:08:40'),
(134, NULL, '+0533337777', 1, 4, 0, 0, '', 0, 0, 1, '2024-01-26 11:08:40', '2024-01-26 11:08:40'),
(135, NULL, '+0533337777', 2, 5, 1, 0, 'Hahwg', 15, 100, 1, '2024-01-26 11:15:34', '2024-01-26 11:15:34'),
(136, NULL, '+0533337777', 2, 6, 0, 0, '', 0, 0, 1, '2024-01-26 11:15:34', '2024-01-26 11:15:34'),
(137, NULL, '+0533337777', 2, 7, 0, 0, '', 0, 0, 1, '2024-01-26 11:15:34', '2024-01-26 11:15:34'),
(138, NULL, '+0599991111', 1, 1, 1, 1, 'اسنيتيتس', 30, 100, 1, '2024-01-26 11:27:11', '2024-01-26 11:27:11'),
(139, NULL, '+0599991111', 1, 2, 0, 0, '', 0, 0, 1, '2024-01-26 11:27:11', '2024-01-26 11:27:11'),
(140, NULL, '+0599991111', 1, 3, 0, 0, '', 0, 0, 1, '2024-01-26 11:27:11', '2024-01-26 11:27:11'),
(141, NULL, '+0599991111', 1, 4, 0, 0, '', 0, 0, 1, '2024-01-26 11:27:11', '2024-01-26 11:27:11'),
(142, NULL, '+0599991111', 2, 5, 1, 1, 'بدبس', 15, 100, 1, '2024-01-26 11:27:32', '2024-01-26 11:27:32'),
(143, NULL, '+0599991111', 2, 6, 0, 0, '', 0, 0, 1, '2024-01-26 11:27:32', '2024-01-26 11:27:32'),
(144, NULL, '+0599991111', 2, 7, 0, 0, '', 0, 0, 1, '2024-01-26 11:27:32', '2024-01-26 11:27:32'),
(145, NULL, '+0555555555', 1, 1, 1, 1, 'Na', 15, 100, 1, '2024-01-28 10:05:22', '2024-01-28 10:05:22'),
(146, NULL, '+0555555555', 1, 2, 0, 0, '', 0, 0, 1, '2024-01-28 10:05:22', '2024-01-28 10:05:22'),
(147, NULL, '+0555555555', 1, 3, 0, 0, '', 0, 0, 1, '2024-01-28 10:05:22', '2024-01-28 10:05:22'),
(148, NULL, '+0555555555', 1, 4, 0, 0, '', 0, 0, 1, '2024-01-28 10:05:22', '2024-01-28 10:05:22'),
(149, NULL, '+0555555555', 3, 8, 1, 1, 'Na', 15, 100, 1, '2024-01-30 08:31:22', '2024-01-30 08:31:22'),
(150, NULL, '+0555555555', 3, 9, 0, 0, NULL, 0, 0, 1, '2024-01-30 08:31:22', '2024-01-30 08:31:22'),
(151, NULL, '+0555555555', 3, 10, 0, 0, NULL, 0, 0, 1, '2024-01-30 08:31:22', '2024-01-30 08:31:22'),
(152, NULL, '+0555555555', 3, 11, 0, 0, NULL, 0, 0, 1, '2024-01-30 08:31:22', '2024-01-30 08:31:22'),
(153, NULL, '+0555555555', 3, 12, 0, 0, NULL, 0, 0, 1, '2024-01-30 08:31:22', '2024-01-30 08:31:22'),
(154, NULL, '+0555555555', 14, 57, 1, 1, 'Na', 15, 100, 1, '2024-01-30 08:31:50', '2024-01-30 08:31:50'),
(155, NULL, '+0555555555', 14, 58, 0, 0, NULL, 0, 0, 1, '2024-01-30 08:31:50', '2024-01-30 08:31:50'),
(156, NULL, '+0555555555', 14, 59, 0, 0, NULL, 0, 0, 1, '2024-01-30 08:31:50', '2024-01-30 08:31:50'),
(157, NULL, '+0555555555', 14, 60, 0, 0, NULL, 0, 0, 1, '2024-01-30 08:31:50', '2024-01-30 08:31:50'),
(158, NULL, '+0555555555', 14, 61, 0, 0, NULL, 0, 0, 1, '2024-01-30 08:31:50', '2024-01-30 08:31:50'),
(164, NULL, '+0544447777', 3, 8, 1, 0, 'Asdfsaf', 15, 100, 1, '2024-01-30 12:11:39', '2024-01-30 12:11:39'),
(165, NULL, '+0544447777', 3, 9, 0, 0, NULL, 0, 0, 1, '2024-01-30 12:11:39', '2024-01-30 12:11:39'),
(166, NULL, '+0544447777', 3, 10, 0, 0, NULL, 0, 0, 1, '2024-01-30 12:11:39', '2024-01-30 12:11:39'),
(167, NULL, '+0544447777', 3, 11, 0, 0, NULL, 0, 0, 1, '2024-01-30 12:11:39', '2024-01-30 12:11:39'),
(168, NULL, '+0544447777', 3, 12, 0, 0, NULL, 0, 0, 1, '2024-01-30 12:11:39', '2024-01-30 12:11:39'),
(169, NULL, '+0544447777', 4, 13, 1, 1, 'Test description', 15, 100, 1, '2024-01-30 12:34:40', '2024-01-30 12:34:40'),
(170, NULL, '+0544447777', 4, 14, 0, 0, NULL, 0, 0, 1, '2024-01-30 12:34:40', '2024-01-30 12:34:40'),
(171, NULL, '+0544447777', 4, 15, 0, 0, NULL, 0, 0, 1, '2024-01-30 12:34:40', '2024-01-30 12:34:40'),
(172, NULL, '+0544447777', 4, 16, 0, 0, NULL, 0, 0, 1, '2024-01-30 12:34:40', '2024-01-30 12:34:40'),
(173, NULL, '+0544447777', 4, 17, 0, 0, NULL, 0, 0, 1, '2024-01-30 12:34:40', '2024-01-30 12:34:40'),
(174, NULL, '+0588008800', 3, 8, 1, 0, 'This is test service', 45, 40, 1, '2024-01-31 11:10:08', '2024-01-31 11:10:08'),
(175, NULL, '+0588008800', 3, 9, 0, 0, NULL, 0, 0, 1, '2024-01-31 11:10:08', '2024-01-31 11:10:08'),
(176, NULL, '+0588008800', 3, 10, 0, 0, NULL, 0, 0, 1, '2024-01-31 11:10:08', '2024-01-31 11:10:08'),
(177, NULL, '+0588008800', 3, 11, 0, 0, NULL, 0, 0, 1, '2024-01-31 11:10:08', '2024-01-31 11:10:08'),
(178, NULL, '+0588008800', 3, 12, 0, 0, NULL, 0, 0, 1, '2024-01-31 11:10:08', '2024-01-31 11:10:08'),
(179, NULL, '+0575335789', 3, 8, 0, 1, 'Ncn', 15, 100, 1, '2024-01-31 11:35:09', '2024-01-31 11:35:09'),
(180, NULL, '+0575335789', 3, 9, 0, 0, NULL, 0, 0, 1, '2024-01-31 11:35:09', '2024-01-31 11:35:09'),
(181, NULL, '+0575335789', 3, 10, 0, 0, NULL, 0, 0, 1, '2024-01-31 11:35:09', '2024-01-31 11:35:09'),
(182, NULL, '+0575335789', 3, 11, 0, 0, NULL, 0, 0, 1, '2024-01-31 11:35:09', '2024-01-31 11:35:09'),
(183, NULL, '+0575335789', 3, 12, 0, 0, NULL, 0, 0, 1, '2024-01-31 11:35:09', '2024-01-31 11:35:09'),
(184, NULL, '+0533366699', 3, 8, 0, 1, 'Vshsgs', 15, 100, 1, '2024-01-31 12:55:29', '2024-01-31 12:55:29'),
(185, NULL, '+0533366699', 3, 9, 0, 0, NULL, 0, 0, 1, '2024-01-31 12:55:29', '2024-01-31 12:55:29'),
(186, NULL, '+0533366699', 3, 10, 0, 0, NULL, 0, 0, 1, '2024-01-31 12:55:29', '2024-01-31 12:55:29'),
(187, NULL, '+0533366699', 3, 11, 0, 0, NULL, 0, 0, 1, '2024-01-31 12:55:29', '2024-01-31 12:55:29'),
(188, NULL, '+0533366699', 3, 12, 0, 0, NULL, 0, 0, 1, '2024-01-31 12:55:29', '2024-01-31 12:55:29'),
(189, NULL, '+0577889900', 3, 8, 1, 0, 'Bshsbd', 15, 100, 1, '2024-01-31 13:04:18', '2024-01-31 13:04:18'),
(190, NULL, '+0577889900', 3, 9, 0, 0, NULL, 0, 0, 1, '2024-01-31 13:04:18', '2024-01-31 13:04:18'),
(191, NULL, '+0577889900', 3, 10, 0, 0, NULL, 0, 0, 1, '2024-01-31 13:04:18', '2024-01-31 13:04:18'),
(192, NULL, '+0577889900', 3, 11, 0, 0, NULL, 0, 0, 1, '2024-01-31 13:04:18', '2024-01-31 13:04:18'),
(193, NULL, '+0577889900', 3, 12, 0, 0, NULL, 0, 0, 1, '2024-01-31 13:04:18', '2024-01-31 13:04:18'),
(194, NULL, '+977566667777', 5, 18, 0, 0, NULL, 0, 0, 1, '2024-02-01 00:34:56', '2024-02-01 00:34:56'),
(195, NULL, '+977566667777', 5, 19, 0, 1, 'Afs', 15, 100, 1, '2024-02-01 00:34:56', '2024-02-01 00:34:56'),
(196, NULL, '+977566667777', 5, 20, 0, 0, NULL, 0, 0, 1, '2024-02-01 00:34:56', '2024-02-01 00:34:56'),
(197, NULL, '+977566667777', 5, 21, 0, 0, NULL, 0, 0, 1, '2024-02-01 00:34:56', '2024-02-01 00:34:56'),
(198, NULL, '+977566667777', 5, 22, 0, 0, NULL, 0, 0, 1, '2024-02-01 00:34:56', '2024-02-01 00:34:56'),
(199, NULL, '+977566667777', 5, 23, 0, 0, NULL, 0, 0, 1, '2024-02-01 00:34:56', '2024-02-01 00:34:56'),
(200, NULL, '+977511223344', 3, 8, 1, 1, 'Cshsvs', 15, 100, 1, '2024-02-01 00:41:44', '2024-02-01 00:41:44'),
(201, NULL, '+977511223344', 3, 9, 1, 1, 'Bshdv', 60, 100, 1, '2024-02-01 00:41:44', '2024-02-01 00:41:44'),
(202, NULL, '+977511223344', 3, 10, 0, 0, NULL, 0, 0, 1, '2024-02-01 00:41:44', '2024-02-01 00:41:44'),
(203, NULL, '+977511223344', 3, 11, 0, 0, NULL, 0, 0, 1, '2024-02-01 00:41:44', '2024-02-01 00:41:44'),
(204, NULL, '+977511223344', 3, 12, 0, 0, NULL, 0, 0, 1, '2024-02-01 00:41:44', '2024-02-01 00:41:44'),
(205, NULL, '+977512457845', 3, 8, 1, 1, 'Hfhfh', 15, 100, 1, '2024-02-01 00:47:10', '2024-02-01 00:47:10'),
(206, NULL, '+977512457845', 3, 9, 0, 1, 'Ghd', 15, 100, 1, '2024-02-01 00:47:10', '2024-02-01 00:47:10'),
(207, NULL, '+977512457845', 3, 10, 0, 0, NULL, 0, 0, 1, '2024-02-01 00:47:10', '2024-02-01 00:47:10'),
(208, NULL, '+977512457845', 3, 11, 0, 0, NULL, 0, 0, 1, '2024-02-01 00:47:10', '2024-02-01 00:47:10'),
(209, NULL, '+977512457845', 3, 12, 0, 0, NULL, 0, 0, 1, '2024-02-01 00:47:10', '2024-02-01 00:47:10'),
(210, NULL, '+977577553366', 3, 8, 1, 1, 'Bnv', 15, 100, 1, '2024-02-01 00:56:21', '2024-02-01 00:56:21'),
(211, NULL, '+977577553366', 3, 9, 1, 1, 'Chgxgc', 15, 100, 1, '2024-02-01 00:56:21', '2024-02-01 00:56:21'),
(212, NULL, '+977577553366', 3, 10, 1, 1, 'Vjc', 45, 50, 1, '2024-02-01 00:56:21', '2024-02-01 00:56:21'),
(213, NULL, '+977577553366', 3, 11, 0, 0, NULL, 0, 0, 1, '2024-02-01 00:56:21', '2024-02-01 00:56:21'),
(214, NULL, '+977577553366', 3, 12, 0, 0, NULL, 0, 0, 1, '2024-02-01 00:56:21', '2024-02-01 00:56:21'),
(215, NULL, '+966543234232', 3, 8, 1, 0, 'Sdfsf', 15, 100, 1, '2024-02-01 03:42:02', '2024-02-01 03:42:02'),
(216, NULL, '+966543234232', 3, 9, 0, 0, NULL, 0, 0, 1, '2024-02-01 03:42:02', '2024-02-01 03:42:02'),
(217, NULL, '+966543234232', 3, 10, 0, 0, NULL, 0, 0, 1, '2024-02-01 03:42:02', '2024-02-01 03:42:02'),
(218, NULL, '+966543234232', 3, 11, 0, 0, NULL, 0, 0, 1, '2024-02-01 03:42:02', '2024-02-01 03:42:02'),
(219, NULL, '+966543234232', 3, 12, 0, 0, NULL, 0, 0, 1, '2024-02-01 03:42:02', '2024-02-01 03:42:02'),
(220, NULL, '+966563177773', 15, 62, 1, 1, 'Massage relaxing', 15, 200, 1, '2024-02-01 08:52:31', '2024-02-01 08:52:31'),
(221, NULL, '+966563177773', 15, 63, 0, 0, NULL, 0, 0, 1, '2024-02-01 08:52:31', '2024-02-01 08:52:31'),
(222, NULL, '+966563177773', 15, 64, 0, 0, NULL, 0, 0, 1, '2024-02-01 08:52:31', '2024-02-01 08:52:31'),
(223, NULL, '+966563177773', 15, 65, 0, 0, NULL, 0, 0, 1, '2024-02-01 08:52:31', '2024-02-01 08:52:31'),
(224, NULL, '+966563177773', 15, 66, 0, 0, NULL, 0, 0, 1, '2024-02-01 08:52:31', '2024-02-01 08:52:31'),
(225, NULL, '+966563177773', 15, 68, 0, 0, NULL, 0, 0, 1, '2024-02-01 08:52:31', '2024-02-01 08:52:31'),
(226, NULL, '+966563177773', 15, 69, 0, 0, NULL, 0, 0, 1, '2024-02-01 08:52:31', '2024-02-01 08:52:31'),
(227, NULL, '+966563177773', 15, 70, 0, 0, NULL, 0, 0, 1, '2024-02-01 08:52:31', '2024-02-01 08:52:31'),
(228, NULL, '+966563177773', 15, 71, 0, 0, NULL, 0, 0, 1, '2024-02-01 08:52:31', '2024-02-01 08:52:31'),
(229, NULL, '+966563177773', 35, 62, 0, 1, 'Demo Service', 15, 100.1, 1, '2024-02-04 09:50:44', '2024-02-04 09:50:44'),
(238, NULL, '+966563177773', 1, 1, 0, 1, 'Test', 15, 100, 1, '2024-02-10 09:54:00', '2024-02-10 09:54:00'),
(239, NULL, '+966563177773', 1, 2, 0, 0, NULL, 0, 10, 0, '2024-02-10 09:54:00', '2024-02-10 09:54:00'),
(240, NULL, '+966563177773', 1, 3, 0, 0, NULL, 0, 20.1, 0, '2024-02-10 09:54:00', '2024-02-10 09:54:00'),
(241, NULL, '+966563177773', 1, 4, 0, 0, NULL, 0, 19, 0, '2024-02-10 09:54:00', '2024-02-10 09:54:00'),
(246, NULL, '+966563177773', 2, 1, 0, 1, 'Test', 15, 100, 1, '2024-02-15 04:41:56', '2024-02-15 04:41:56'),
(247, NULL, '+966563177773', 2, 2, 0, 0, NULL, 0, 10, 0, '2024-02-15 04:41:56', '2024-02-15 04:41:56'),
(248, NULL, '+966563177773', 2, 3, 0, 0, NULL, 0, 20.1, 0, '2024-02-15 04:41:56', '2024-02-15 04:41:56'),
(249, NULL, '+966563177773', 2, 4, 0, 0, NULL, 0, 19, 0, '2024-02-15 04:41:56', '2024-02-15 04:41:56'),
(250, NULL, '+966563177773', 3, 8, 1, 1, 'Test details', 15, 100, 1, '2024-02-15 05:01:55', '2024-02-15 05:01:55'),
(251, NULL, '+966563177773', 3, 9, 0, 0, NULL, 0, 0, 0, '2024-02-15 05:01:55', '2024-02-15 05:01:55'),
(252, NULL, '+966563177773', 3, 10, 1, 1, 'Bshd', 15, 100, 1, '2024-02-15 05:01:55', '2024-02-15 05:01:55'),
(253, NULL, '+966563177773', 3, 11, 1, 0, 'Bshd', 15, 100, 1, '2024-02-15 05:01:55', '2024-02-15 05:01:55'),
(254, NULL, '+966563177773', 3, 12, 0, 0, NULL, 0, 0, 0, '2024-02-15 05:01:55', '2024-02-15 05:01:55'),
(255, NULL, '+966556420863', 20, 108, 1, 0, 'Na', 30, 150, 1, '2024-02-18 05:46:24', '2024-02-18 05:46:24'),
(256, NULL, '+966556420863', 20, 109, 1, 0, 'Na', 45, 380, 1, '2024-02-18 05:46:24', '2024-02-18 05:46:24'),
(257, NULL, '+966556420863', 20, 110, 0, 0, NULL, 0, 0, 0, '2024-02-18 05:46:24', '2024-02-18 05:46:24'),
(258, NULL, '+966556420863', 20, 111, 0, 0, NULL, 0, 0, 0, '2024-02-18 05:46:24', '2024-02-18 05:46:24'),
(259, NULL, '+966562124074', 15, 62, 1, 1, 'مساج استرخائي  في راحة منزلك ~', 60, 300, 1, '2024-04-21 23:36:30', '2024-04-21 23:36:30'),
(260, NULL, '+966562124074', 15, 63, 1, 1, 'مساج سويدي', 60, 300, 1, '2024-04-21 23:36:30', '2024-04-21 23:36:30'),
(261, NULL, '+966562124074', 15, 64, 0, 0, NULL, 0, 0, 0, '2024-04-21 23:36:30', '2024-04-21 23:36:30'),
(262, NULL, '+966562124074', 15, 65, 0, 0, NULL, 0, 0, 0, '2024-04-21 23:36:30', '2024-04-21 23:36:30'),
(263, NULL, '+966562124074', 15, 66, 0, 0, NULL, 0, 0, 0, '2024-04-21 23:36:30', '2024-04-21 23:36:30'),
(264, NULL, '+966562124074', 15, 68, 1, 1, 'مساج علاجي', 60, 400, 1, '2024-04-21 23:36:30', '2024-04-21 23:36:30'),
(265, NULL, '+966562124074', 15, 69, 1, 1, 'مساج بالاحجار', 60, 400, 1, '2024-04-21 23:36:30', '2024-04-21 23:36:30'),
(266, NULL, '+966562124074', 15, 70, 0, 0, NULL, 0, 0, 0, '2024-04-21 23:36:30', '2024-04-21 23:36:30'),
(267, NULL, '+966562124074', 15, 71, 0, 0, NULL, 0, 0, 0, '2024-04-21 23:36:30', '2024-04-21 23:36:30'),
(268, NULL, '+966562124074', 13, 53, 1, 0, 'For hand', 15, 37, 1, '2024-04-21 23:37:43', '2024-04-21 23:37:43'),
(269, NULL, '+966562124074', 13, 54, 0, 0, NULL, 0, 0, 0, '2024-04-21 23:37:43', '2024-04-21 23:37:43'),
(270, NULL, '+966562124074', 13, 55, 0, 0, NULL, 0, 0, 0, '2024-04-21 23:37:43', '2024-04-21 23:37:43'),
(271, NULL, '+966562124074', 13, 56, 0, 0, NULL, 0, 0, 0, '2024-04-21 23:37:43', '2024-04-21 23:37:43'),
(272, NULL, '+966562124074', 14, 57, 1, 1, 'Classic mani pedi(hand and feet cleaning) with tools', 60, 247, 1, '2024-04-21 23:39:58', '2024-04-21 23:39:58'),
(273, NULL, '+966562124074', 14, 58, 1, 1, 'Spa pedi and mani with scrub', 60, 350, 1, '2024-04-21 23:39:58', '2024-04-21 23:39:58'),
(274, NULL, '+966562124074', 14, 59, 0, 0, NULL, 0, 0, 0, '2024-04-21 23:39:58', '2024-04-21 23:39:58'),
(275, NULL, '+966562124074', 14, 60, 0, 0, NULL, 0, 0, 0, '2024-04-21 23:39:58', '2024-04-21 23:39:58'),
(276, NULL, '+966562124074', 14, 61, 0, 0, NULL, 0, 0, 0, '2024-04-21 23:39:58', '2024-04-21 23:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `services_subcategory`
--

CREATE TABLE `services_subcategory` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `arabic_name` varchar(200) DEFAULT NULL,
  `english_name` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `services_subcategory`
--

INSERT INTO `services_subcategory` (`id`, `category_id`, `arabic_name`, `english_name`, `updated_at`, `created_at`) VALUES
(8, 3, 'جلسة الزيوت السبعة', 'Oil hair treatment', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(9, 3, 'جلسة ترطيب للشعر', 'Hair mask', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(10, 3, 'جلسة علاج الشعر المتقصف', 'Damaged hair treatment', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(11, 3, 'تنظيف الفروة', 'Scalp Detox', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(12, 3, 'جلسة انبات الشعر', 'Hair Grow', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(13, 4, 'تركيب دبل فيس', 'Tape ', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(14, 4, 'تركيب نانو', 'Nano', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(15, 4, 'تركيب كرستالات', 'تركيب كرستالات', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(16, 4, 'صيانة', 'Maintenance', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(17, 4, 'ازالة', 'Removal', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(18, 5, 'سشوار عادي', 'Classic Blowdry', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(19, 5, 'سشوار ويفي', 'Wavy', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(20, 5, 'فير واسع', 'Big curls', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(21, 5, 'تكسير', 'Retro', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(22, 5, 'تسريحه', 'Up do', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(23, 5, 'ذيل الحصان', 'Ponytail', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(24, 6, 'قص اطراف', 'Trim', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(25, 6, 'قص كامل', 'Hair cut', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(26, 6, 'قص غرة', 'Bangs cut', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(27, 6, 'قص مكينة', 'Hair cut machine', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(28, 6, 'ازالة التقصف', 'Frizz cut', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(29, 7, 'فيلر', 'Filler', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(30, 7, 'اولابليكس', 'Olaplex', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(31, 7, 'كافيار', 'Caviar', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(32, 7, 'ديسكفري', 'Discovery', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(33, 8, 'بروتين', 'Protien', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(34, 8, 'جذور', 'Protien -Roots', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(35, 8, 'دكتور ايه', 'Dr.AN', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(36, 8, 'بيبي كريم', 'BB Creame', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(37, 8, 'كولاجين', 'Collagen', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(38, 8, 'بوتوكس', 'Botox', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(39, 9, 'هايلايت لولايت', 'highlights', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(40, 9, 'اومبري  سومبري', 'ombre hair color', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(41, 9, 'لون واحد', 'Hair color', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(42, 9, 'صبغة جذوز', 'root touch up', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(43, 9, 'رينساج', 'Rinsage', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(44, 9, 'صبغة من غير امونيا', 'Ammonia free hair dye', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(45, 9, 'كونتور', 'countour', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(46, 10, 'برافين يد', 'Hand', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(47, 10, 'برافين رجل', 'Feet', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(48, 11, 'تركيب مع لون', 'Fake nails with color', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(49, 11, 'تركيب مع ديزاين', 'Fake Nails with nail art', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(50, 12, 'تركيب جل اكستنشن', 'Gel nails extension', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(51, 12, 'ريفل جل اكستنشن', 'Refill', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(52, 12, 'ازالة جل اكستنشن', 'Removal', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(53, 13, 'لون عادي', 'Nail Polish', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(54, 13, 'لون فرنش', 'French Color', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(55, 13, 'لون جل عادي', 'Gel color', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(56, 13, 'لون جل فرنش', 'French Gel color', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(57, 14, 'كلاسك', 'Classic', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(58, 14, 'سبا', 'Spa', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(59, 14, 'ملكي', 'Royal', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(60, 14, 'برد اظافر', 'Nail file', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(61, 14, 'تنظيف زوايد', 'Cutical removal', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(62, 15, 'مساج استرخائي', 'Relax', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(63, 15, 'مساج سويدي', 'Swedish', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(64, 15, 'مساج اللمفاوي', 'مساج اللمفاوي', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(65, 15, 'مساج تايلاندي', 'Thao', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(66, 15, 'مساج الحمل', 'Prenatal', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(68, 15, 'مساج علاجي', 'massage theapy', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(69, 15, 'مساج الاحجار الساخنة', 'Hot stone ', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(70, 15, 'مساج الكهرمان', 'Cutical removal', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(71, 15, 'مساج الشمع الساخن', 'Hot wax massage', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(72, 16, 'واكس وجه', 'face wax', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(73, 16, 'واكس حواجب', 'eyebrow wax', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(74, 16, 'واكس شنب', 'wax upper lip', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(75, 16, 'واكس جسم', 'wax full body', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(76, 16, 'واكس يد', 'hand wax', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(77, 16, 'واكس نص يد', 'half hand wax', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(78, 16, 'واكس رجل', 'wax feet', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(79, 16, 'واكس نص رجل', 'half feet wax', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(80, 16, 'حلاوة جسم كامل', 'حلاوة جسم كامل', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(81, 16, 'حلاوه يد', 'حلاوه يد', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(82, 16, 'حلاوه نص يد', 'حلاوه نص يد', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(83, 16, 'حلاوه رجل', 'حلاوه رجل', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(84, 16, 'حلاوه نص رجل', 'حلاوه نص رجل', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(85, 16, 'فتلة حواجب', 'Eyebrow threading', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(86, 16, 'صبغة حواجب', 'Eyebrow color', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(87, 16, 'موس حواجب', 'Eyebrow cleaning', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(88, 16, 'فتلة وجه', 'Face threading', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(89, 16, 'فتلة شنب', 'Upper lip threading', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(90, 16, 'تشقير وجه', 'Face bleaching', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(91, 16, 'تشقير حواجب', 'Eyebrow bleaching', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(92, 17, 'هيدرافيشل', 'Hydrafacial', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(93, 17, 'تنظيف بشرة', 'Facial', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(94, 17, 'تنظيف بشرة مع ماسك النضارة', 'Facial with glow mask', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(95, 17, 'تنظيف بشرة ب فيتامين سي', 'Facial with Vitamin C', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(96, 17, ' تنظيف بشره  مع ماسك للتفتيح', 'Facial  with whitening mask', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(97, 18, 'حمام مغربي كلاسك', 'Classic', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(98, 18, 'حمام مغربي ملكي', 'Royal', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(99, 18, 'حمام مغربي بالماسكات', 'Masks', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(100, 18, 'حمام مغربي بالعكر الفاسي', 'Ekr Fasi', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(101, 18, 'حمام مغربي بالاعشاب', 'Herbal', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(102, 19, 'رموش يومية', 'Daily lashes', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(103, 19, 'رموش اسبوعية', 'Weekly lashes', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(104, 19, 'رموش شهرية', 'Monthly Lashes', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(105, 19, 'ريفيل رموش شهرية', 'Refill', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(106, 19, 'ليفتنج رموش', 'Lash lifting', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(107, 19, 'ليفتنج حواجب', 'Eyebrow lifting', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(108, 20, 'مكياج ناعم', 'Simple makeup', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(109, 20, 'مكياج سهرة', 'Heavy makeup', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(110, 20, 'مكياج عيون', 'Eye makeup', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(111, 20, 'مكياج جسم', 'Body makeup', '2024-02-25 16:00:00', '2024-02-25 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `service_category`
--

CREATE TABLE `service_category` (
  `id` int NOT NULL,
  `english_name` varchar(200) DEFAULT NULL,
  `arabic_name` varchar(200) DEFAULT NULL,
  `icon` varchar(500) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `service_category`
--

INSERT INTO `service_category` (`id`, `english_name`, `arabic_name`, `icon`, `updated_at`, `created_at`) VALUES
(3, 'Hair', 'عناية بالشعر', '', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(4, 'Hair Extension', 'اكستنشن', '', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(5, 'استشوار', 'استشوار', '', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(6, 'القص', 'القص', '', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(7, 'معالجات بارده', 'معالجات بارده', '', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(8, 'Strarightening hair treatment', 'معالجات بالحراره', '', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(9, 'الصبغات', 'الصبغات', '', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(10, 'Paraffine', 'برافين', '', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(11, 'fake nails', 'fake nails', '', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(12, 'Gel nails extension', 'جل اكستنشن', '', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(13, 'Nail polish', 'لون اظافر', '', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(14, 'Manicure & Pedicure', 'بدكير و مانكير', '', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(15, 'المساج', 'المساج', '', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(16, 'العناية الشخصية', 'العناية الشخصية', '', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(17, 'Facial', 'العناية بالبشره', '', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(18, 'Moroccan Bath', 'حمام مغربي', '', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(19, 'Eyelashes', 'الرموش', '', '2024-02-25 16:00:00', '2024-02-25 16:00:00'),
(20, 'Makeup', 'المكياج', '', '2024-02-25 16:00:00', '2024-02-25 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE `service_type` (
  `id` int NOT NULL,
  `english_name` varchar(200) DEFAULT NULL,
  `arabic_name` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `service_type`
--

INSERT INTO `service_type` (`id`, `english_name`, `arabic_name`, `created_at`, `updated_at`) VALUES
(1, 'Service1', 'خدمة 1', '2024-01-20 14:13:29', '2024-01-20 14:13:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_profile_data_id` int DEFAULT NULL,
  `company_code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `isg_signup_staging_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `company_profile_data_id`, `company_code`, `approved`, `isg_signup_staging_id`) VALUES
(29, 'Raed Al Mashhady', 'Raed.dba@gmail.com', NULL, '$2y$10$5OLRyZhHt6NtnGfGq6axfOsRLJkADfWHSt.SGNEm529v.qSb4ReYq', NULL, '2023-05-28 07:28:06', '2023-05-28 07:28:06', NULL, '100', '1', NULL),
(38, 'ISG', 'ahmedkamal.cs@gmail.com', NULL, '$2y$10$kDHfFdN2ZsvfO0/Ae8mmy.9KT94t8fpGu7uI.nRstVgk945QbrdHa', NULL, '2023-07-03 14:25:03', '2023-07-03 14:25:03', NULL, '1688405103', '1', NULL),
(39, 'Ahmed', 'test1@gmail.com', NULL, '$2y$10$1EeVqtLUfq.GhmebkEre3uqX4MKoJ3M2wJ2tyJpLYso6i3WEW/xhq', NULL, '2023-07-03 15:08:29', '2023-07-03 15:08:29', NULL, '1688405103', '1', NULL),
(40, 'Ahmed', 'test2@gmail.com', NULL, '$2y$10$8yyGyktJAEbXScmHDfE4Y.FbcdBG/51bTfAcOgAY4uMZD6brDS6QC', NULL, '2023-07-03 16:09:44', '2023-07-03 16:09:44', NULL, '1688405103', '1', NULL),
(41, 'Test Root', 'testroot@gmail.com', NULL, '$2y$10$bs/8KDijEri.sMzEa3eL1utwdiDgMPOcc1PA47FAPzozd9yfAmg4.', NULL, '2023-07-03 16:13:27', '2023-07-03 16:13:27', NULL, '1688411607', '1', NULL),
(42, 'Test 5', 'test5@isglobal.co', NULL, '$2y$10$GSRiouCvPgInl9s3nlk7su13x7boKhaeaqzEtRxGiw8bOvRSX37gC', NULL, '2023-07-03 16:15:32', '2023-07-03 16:15:32', NULL, '1688411607', '1', NULL),
(43, 'Ahmed', 'a.kamal@isglobal.co', NULL, '$2y$10$jA6LXBdaCXo2DJWwcNHU5emv2DkZcUL9ogU/q50ZdFvIIi40gtl5K', NULL, '2023-07-06 07:48:33', '2023-07-06 07:48:33', NULL, '1688405103', '1', NULL),
(44, 'شركة استراتيجيات المعلومات', 'support@isglobal.co', NULL, '$2y$10$KgG3fXniQXWv5ErjmwhXLuWxQj75TSUXiXTclDHfwMcjxCk41nFEq', NULL, '2023-07-06 07:50:44', '2023-07-06 07:50:45', NULL, '1688640644', '1', NULL),
(45, 'Info', 'info@isglobal.co', NULL, '$2y$10$UFUQhZhusj6hb6MRMBAMSe0cFJnYxsHiQ/f0QwQOxpNnAZ9BfH3iq', NULL, '2023-07-06 07:53:28', '2023-07-06 07:53:28', NULL, '1688640644', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `work_style`
--

CREATE TABLE `work_style` (
  `id` int NOT NULL,
  `english_name` varchar(200) DEFAULT NULL,
  `arabic_name` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `work_style`
--

INSERT INTO `work_style` (`id`, `english_name`, `arabic_name`, `created_at`, `updated_at`) VALUES
(1, 'Working With team', 'العمل مع الفريق', '2024-01-09 20:50:47', '2024-01-09 20:50:47'),
(3, 'Work Individual', 'العمل بمفردى', '2024-01-30 03:40:30', '2024-01-30 03:40:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_type`
--
ALTER TABLE `business_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_booking`
--
ALTER TABLE `client_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `einvoice_payment`
--
ALTER TABLE `einvoice_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_payment_einvoice_einvoice_simplified_invoice_header_idx` (`einvoice_header_id`),
  ADD KEY `fk_payment_einvoice_payment_vendor_master1_idx` (`payment_vendor_master_id`);

--
-- Indexes for table `einvoice_simplified_invoice_header`
--
ALTER TABLE `einvoice_simplified_invoice_header`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_einvoice_simplified_invoice_invoice1_idx` (`invoice_id`),
  ADD KEY `fk_einvoice_simplified_invoice_header_discount_model1_idx` (`discount_model_id`),
  ADD KEY `fk_einvoice_simplified_invoice_header_company_profile_data1_idx` (`company_profile_data_id`,`company_code`);

--
-- Indexes for table `einvoice_simplified_invoice_line`
--
ALTER TABLE `einvoice_simplified_invoice_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_einvoice_simplified_invoice_line_einvoice_simplified_inv_idx` (`einvoice_simplified_invoice_header_id`),
  ADD KEY `fk_einvoice_simplified_invoice_line_discount_model1_idx` (`discount_model_id`);

--
-- Indexes for table `isg_company_profile_data`
--
ALTER TABLE `isg_company_profile_data`
  ADD PRIMARY KEY (`id`,`company_code`);

--
-- Indexes for table `isg_customer_master_data`
--
ALTER TABLE `isg_customer_master_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer_master_data_company_profile_data1_idx` (`company_profile_data_id`,`company_code`);

--
-- Indexes for table `isg_discount_model`
--
ALTER TABLE `isg_discount_model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isg_failed_jobs`
--
ALTER TABLE `isg_failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `isg_invoice`
--
ALTER TABLE `isg_invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invoice_user1_idx` (`user_id`),
  ADD KEY `fk_invoice_order_master1_idx` (`order_master_id`);

--
-- Indexes for table `isg_invoice_details`
--
ALTER TABLE `isg_invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invoice_details_invoice1_idx` (`invoice_id`),
  ADD KEY `fk_invoice_details_order_master1_idx` (`order_master_id`),
  ADD KEY `fk_invoice_details_order_details1_idx` (`order_details_id`);

--
-- Indexes for table `isg_item_master`
--
ALTER TABLE `isg_item_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_item_master_tax1_idx` (`tax_id`),
  ADD KEY `fk_item_master_company_profile_data1_idx` (`company_profile_data_id`,`company_code`);

--
-- Indexes for table `isg_item_vendor`
--
ALTER TABLE `isg_item_vendor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vendor_tems_vendor_master1_idx` (`vendor_master_id`),
  ADD KEY `fk_vendor_tems_item_master1_idx` (`item_master_id`),
  ADD KEY `fk_item_vendor_tax1_idx` (`tax_id`),
  ADD KEY `fk_item_vendor_vendor_services1_idx` (`vendor_services_id`);

--
-- Indexes for table `isg_membership`
--
ALTER TABLE `isg_membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isg_migrations`
--
ALTER TABLE `isg_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isg_order_basket`
--
ALTER TABLE `isg_order_basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_basket_item_vendor1_idx` (`item_vendor_id`),
  ADD KEY `fk_order_basket_user1_idx` (`user_id`);

--
-- Indexes for table `isg_order_details`
--
ALTER TABLE `isg_order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_details_order_master1_idx` (`order_master_id`),
  ADD KEY `fk_order_details_item_vendor1_idx` (`item_vendor_id`),
  ADD KEY `fk_order_details_item_master1_idx` (`item_master_id`),
  ADD KEY `fk_order_details_tax1_idx` (`tax_id`),
  ADD KEY `fk_order_details_user1_idx` (`user_id`),
  ADD KEY `fk_order_details_discount_model1_idx` (`discount_model_id`);

--
-- Indexes for table `isg_order_master`
--
ALTER TABLE `isg_order_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_master_user1_idx` (`user_id`),
  ADD KEY `fk_order_master_discount_model1_idx` (`discount_model_id`);

--
-- Indexes for table `isg_payment_checkout`
--
ALTER TABLE `isg_payment_checkout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_payment_checkout_payment_vendor_master1_idx` (`payment_vendor_master_id`);

--
-- Indexes for table `isg_payment_payee`
--
ALTER TABLE `isg_payment_payee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_payment_payee_user1_idx` (`user_id`),
  ADD KEY `fk_isg_payment_payee_isg_service_subscriber1_idx` (`isg_service_subscriber_id`);

--
-- Indexes for table `isg_payment_provider_config`
--
ALTER TABLE `isg_payment_provider_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isg_payment_user_configuration`
--
ALTER TABLE `isg_payment_user_configuration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Payment_User_Configuration_Payment_Brand1_idx` (`payment_brand_name`),
  ADD KEY `fk_payment_user_configuration_user1_idx` (`user_id`);

--
-- Indexes for table `isg_payment_user_invoice`
--
ALTER TABLE `isg_payment_user_invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Payment_User_Ticket_currency1_idx` (`currency_code`),
  ADD KEY `fk_payment_user_invoice_payment_payee1_idx` (`payment_payee_id`),
  ADD KEY `fk_payment_user_invoice_invoice1_idx` (`invoice_id`),
  ADD KEY `fk_payment_user_invoice_invoice_details1_idx` (`invoice_details_id`);

--
-- Indexes for table `isg_payment_vendor_details`
--
ALTER TABLE `isg_payment_vendor_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_payment_vendor_details_payment_vendor_master1_idx` (`payment_vendor_master_id`);

--
-- Indexes for table `isg_payment_vendor_master`
--
ALTER TABLE `isg_payment_vendor_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UUID_UNIQUE` (`UUID`),
  ADD UNIQUE KEY `session_id_UNIQUE` (`session_id`),
  ADD KEY `fk_payment_vendor_master_invoice1_idx` (`invoice_id`),
  ADD KEY `fk_payment_vendor_master_payment_payee1_idx` (`payment_payee_id`),
  ADD KEY `fk_payment_vendor_master_einvoice_simplified_invoice_header_idx` (`einvoice_header_id`);

--
-- Indexes for table `isg_permission`
--
ALTER TABLE `isg_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_permission_role1_idx` (`role_id`),
  ADD KEY `fk_permission_membership1_idx` (`membership_id`);

--
-- Indexes for table `isg_privacy_policy_header`
--
ALTER TABLE `isg_privacy_policy_header`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_privacy_policy_header_privacy_policy_template1_idx` (`privacy_policy_template_id`),
  ADD KEY `fk_privacy_policy_header_privacy_policy_questionnaire1_idx` (`privacy_policy_questionnaire_id`);

--
-- Indexes for table `isg_privacy_policy_lines`
--
ALTER TABLE `isg_privacy_policy_lines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_privacy_policy_lines_privacy_policy_header1_idx` (`privacy_policy_header_id`);

--
-- Indexes for table `isg_privacy_policy_questionnaire`
--
ALTER TABLE `isg_privacy_policy_questionnaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isg_privacy_policy_template`
--
ALTER TABLE `isg_privacy_policy_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isg_role`
--
ALTER TABLE `isg_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isg_root_account`
--
ALTER TABLE `isg_root_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isg_service_item`
--
ALTER TABLE `isg_service_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isg_service_plan`
--
ALTER TABLE `isg_service_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isg_service_plan_items`
--
ALTER TABLE `isg_service_plan_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_isg_service_plan_tems_isg_service_plan1_idx` (`isg_service_plan_id`),
  ADD KEY `fk_isg_service_plan_tems_isg_service_item1_idx` (`isg_service_item_id`);

--
-- Indexes for table `isg_service_plan_subscriber`
--
ALTER TABLE `isg_service_plan_subscriber`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_isg_service_plan_subscriber_isg_service_plan1_idx` (`isg_service_plan_id`),
  ADD KEY `fk_isg_service_plan_subscriber_isg_service_subscriber1_idx` (`isg_service_subscriber_id`);

--
-- Indexes for table `isg_service_subscriber`
--
ALTER TABLE `isg_service_subscriber`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_isg_service_subscriber_isg_user1_idx` (`isg_user_id`);

--
-- Indexes for table `isg_signup_staging`
--
ALTER TABLE `isg_signup_staging`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isg_system_series`
--
ALTER TABLE `isg_system_series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isg_tax`
--
ALTER TABLE `isg_tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isg_user`
--
ALTER TABLE `isg_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_role1_idx` (`role_id`);

--
-- Indexes for table `isg_user_booking`
--
ALTER TABLE `isg_user_booking`
  ADD KEY `fk_user_booking_user1_idx` (`user_id`),
  ADD KEY `fk_user_booking_vendor_booking_calendar1_idx` (`vendor_booking_calendar_id`);

--
-- Indexes for table `isg_user_company`
--
ALTER TABLE `isg_user_company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_company_isg_company_profile_data1_idx` (`company_id`,`company_code`),
  ADD KEY `fk_user_company_users1_idx` (`users_id`);

--
-- Indexes for table `isg_user_devices`
--
ALTER TABLE `isg_user_devices`
  ADD PRIMARY KEY (`id`,`user_id`),
  ADD KEY `fk_user_devices_user_idx` (`user_id`);

--
-- Indexes for table `isg_user_otp`
--
ALTER TABLE `isg_user_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isg_user_privacy_policy`
--
ALTER TABLE `isg_user_privacy_policy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_privacy_policy_user1_idx` (`user_id`),
  ADD KEY `fk_user_privacy_policy_privacy_policy_header1_idx` (`privacy_policy_header_id`);

--
-- Indexes for table `isg_user_role`
--
ALTER TABLE `isg_user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_role_users1_idx` (`users_id`),
  ADD KEY `fk_user_role_role1_idx` (`role_id`);

--
-- Indexes for table `isg_vendor_booking_calendar`
--
ALTER TABLE `isg_vendor_booking_calendar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vendor_calendar_vendor_master1_idx` (`vendor_master_id`),
  ADD KEY `fk_vendor_booking_calendar_user1_idx` (`user_id`);

--
-- Indexes for table `isg_vendor_commission_setup`
--
ALTER TABLE `isg_vendor_commission_setup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vendor_commission_setup_vendor_master1_idx` (`vendor_master_id`);

--
-- Indexes for table `isg_vendor_commission_transaction`
--
ALTER TABLE `isg_vendor_commission_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vendor_commission_transaction_vendor_master1_idx` (`vendor_master_id`),
  ADD KEY `fk_vendor_commission_transaction_vendor_commission_setup1_idx` (`vendor_commission_setup_id`),
  ADD KEY `fk_vendor_commission_transaction_order_details1_idx` (`order_details_id`),
  ADD KEY `fk_vendor_commission_transaction_order_master1_idx` (`order_master_id`),
  ADD KEY `fk_isg_vendor_commission_transaction_einvoice_simplified_in_idx` (`einvoice_id`);

--
-- Indexes for table `isg_vendor_master`
--
ALTER TABLE `isg_vendor_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vendor_master_company_profile_data1_idx` (`company_profile_data_id`,`company_code`);

--
-- Indexes for table `isg_vendor_profile`
--
ALTER TABLE `isg_vendor_profile`
  ADD PRIMARY KEY (`id`,`vendor_master_id`),
  ADD KEY `fk_vendor_profile_vendor_master1_idx` (`vendor_master_id`);

--
-- Indexes for table `isg_vendor_services`
--
ALTER TABLE `isg_vendor_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vendor_services_vendor_master1_idx` (`vendor_master_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_invoices`
--
ALTER TABLE `payment_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salon_branches`
--
ALTER TABLE `salon_branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salon_employee`
--
ALTER TABLE `salon_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salon_gallery`
--
ALTER TABLE `salon_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salon_invoices`
--
ALTER TABLE `salon_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salon_master`
--
ALTER TABLE `salon_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salon_services`
--
ALTER TABLE `salon_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_subcategory`
--
ALTER TABLE `services_subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_category`
--
ALTER TABLE `service_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `fk_users_company_profile_data1_idx` (`company_profile_data_id`),
  ADD KEY `fk_users_isg_signup_staging1_idx` (`isg_signup_staging_id`);

--
-- Indexes for table `work_style`
--
ALTER TABLE `work_style`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `business_type`
--
ALTER TABLE `business_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client_booking`
--
ALTER TABLE `client_booking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `einvoice_payment`
--
ALTER TABLE `einvoice_payment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `einvoice_simplified_invoice_header`
--
ALTER TABLE `einvoice_simplified_invoice_header`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT for table `einvoice_simplified_invoice_line`
--
ALTER TABLE `einvoice_simplified_invoice_line`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=721;

--
-- AUTO_INCREMENT for table `isg_company_profile_data`
--
ALTER TABLE `isg_company_profile_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `isg_customer_master_data`
--
ALTER TABLE `isg_customer_master_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `isg_discount_model`
--
ALTER TABLE `isg_discount_model`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isg_failed_jobs`
--
ALTER TABLE `isg_failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isg_invoice`
--
ALTER TABLE `isg_invoice`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isg_invoice_details`
--
ALTER TABLE `isg_invoice_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isg_item_master`
--
ALTER TABLE `isg_item_master`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `isg_item_vendor`
--
ALTER TABLE `isg_item_vendor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `isg_membership`
--
ALTER TABLE `isg_membership`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isg_migrations`
--
ALTER TABLE `isg_migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `isg_order_basket`
--
ALTER TABLE `isg_order_basket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isg_order_details`
--
ALTER TABLE `isg_order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isg_order_master`
--
ALTER TABLE `isg_order_master`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isg_payment_checkout`
--
ALTER TABLE `isg_payment_checkout`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isg_payment_payee`
--
ALTER TABLE `isg_payment_payee`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `isg_payment_provider_config`
--
ALTER TABLE `isg_payment_provider_config`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `isg_payment_user_configuration`
--
ALTER TABLE `isg_payment_user_configuration`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isg_payment_user_invoice`
--
ALTER TABLE `isg_payment_user_invoice`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `isg_payment_vendor_details`
--
ALTER TABLE `isg_payment_vendor_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `isg_payment_vendor_master`
--
ALTER TABLE `isg_payment_vendor_master`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `isg_permission`
--
ALTER TABLE `isg_permission`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `isg_privacy_policy_header`
--
ALTER TABLE `isg_privacy_policy_header`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isg_privacy_policy_lines`
--
ALTER TABLE `isg_privacy_policy_lines`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isg_privacy_policy_questionnaire`
--
ALTER TABLE `isg_privacy_policy_questionnaire`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isg_privacy_policy_template`
--
ALTER TABLE `isg_privacy_policy_template`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isg_role`
--
ALTER TABLE `isg_role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `isg_root_account`
--
ALTER TABLE `isg_root_account`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `isg_service_item`
--
ALTER TABLE `isg_service_item`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isg_service_plan`
--
ALTER TABLE `isg_service_plan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isg_service_plan_items`
--
ALTER TABLE `isg_service_plan_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isg_service_plan_subscriber`
--
ALTER TABLE `isg_service_plan_subscriber`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isg_service_subscriber`
--
ALTER TABLE `isg_service_subscriber`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isg_signup_staging`
--
ALTER TABLE `isg_signup_staging`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `isg_system_series`
--
ALTER TABLE `isg_system_series`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `isg_tax`
--
ALTER TABLE `isg_tax`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isg_user`
--
ALTER TABLE `isg_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `isg_user_company`
--
ALTER TABLE `isg_user_company`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `isg_user_devices`
--
ALTER TABLE `isg_user_devices`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isg_user_otp`
--
ALTER TABLE `isg_user_otp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=539;

--
-- AUTO_INCREMENT for table `isg_user_privacy_policy`
--
ALTER TABLE `isg_user_privacy_policy`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isg_user_role`
--
ALTER TABLE `isg_user_role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `isg_vendor_booking_calendar`
--
ALTER TABLE `isg_vendor_booking_calendar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isg_vendor_commission_setup`
--
ALTER TABLE `isg_vendor_commission_setup`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isg_vendor_commission_transaction`
--
ALTER TABLE `isg_vendor_commission_transaction`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isg_vendor_master`
--
ALTER TABLE `isg_vendor_master`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `isg_vendor_profile`
--
ALTER TABLE `isg_vendor_profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isg_vendor_services`
--
ALTER TABLE `isg_vendor_services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_invoices`
--
ALTER TABLE `payment_invoices`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `salon_branches`
--
ALTER TABLE `salon_branches`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `salon_employee`
--
ALTER TABLE `salon_employee`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `salon_gallery`
--
ALTER TABLE `salon_gallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `salon_invoices`
--
ALTER TABLE `salon_invoices`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `salon_master`
--
ALTER TABLE `salon_master`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `salon_services`
--
ALTER TABLE `salon_services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- AUTO_INCREMENT for table `services_subcategory`
--
ALTER TABLE `services_subcategory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `service_category`
--
ALTER TABLE `service_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `service_type`
--
ALTER TABLE `service_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `work_style`
--
ALTER TABLE `work_style`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `einvoice_payment`
--
ALTER TABLE `einvoice_payment`
  ADD CONSTRAINT `fk_payment_einvoice_einvoice_simplified_invoice_header` FOREIGN KEY (`einvoice_header_id`) REFERENCES `einvoice_simplified_invoice_header` (`id`),
  ADD CONSTRAINT `fk_payment_einvoice_payment_vendor_master1` FOREIGN KEY (`payment_vendor_master_id`) REFERENCES `isg_payment_vendor_master` (`id`);

--
-- Constraints for table `einvoice_simplified_invoice_header`
--
ALTER TABLE `einvoice_simplified_invoice_header`
  ADD CONSTRAINT `fk_einvoice_simplified_invoice_header_company_profile_data1` FOREIGN KEY (`company_profile_data_id`,`company_code`) REFERENCES `isg_company_profile_data` (`id`, `company_code`),
  ADD CONSTRAINT `fk_einvoice_simplified_invoice_header_discount_model1` FOREIGN KEY (`discount_model_id`) REFERENCES `isg_discount_model` (`id`),
  ADD CONSTRAINT `fk_einvoice_simplified_invoice_invoice1` FOREIGN KEY (`invoice_id`) REFERENCES `isg_invoice` (`id`);

--
-- Constraints for table `einvoice_simplified_invoice_line`
--
ALTER TABLE `einvoice_simplified_invoice_line`
  ADD CONSTRAINT `fk_einvoice_simplified_invoice_line_discount_model1` FOREIGN KEY (`discount_model_id`) REFERENCES `isg_discount_model` (`id`),
  ADD CONSTRAINT `fk_einvoice_simplified_invoice_line_einvoice_simplified_invoi1` FOREIGN KEY (`einvoice_simplified_invoice_header_id`) REFERENCES `einvoice_simplified_invoice_header` (`id`);

--
-- Constraints for table `isg_customer_master_data`
--
ALTER TABLE `isg_customer_master_data`
  ADD CONSTRAINT `fk_customer_master_data_company_profile_data1` FOREIGN KEY (`company_profile_data_id`,`company_code`) REFERENCES `isg_company_profile_data` (`id`, `company_code`);

--
-- Constraints for table `isg_invoice`
--
ALTER TABLE `isg_invoice`
  ADD CONSTRAINT `fk_invoice_order_master1` FOREIGN KEY (`order_master_id`) REFERENCES `isg_order_master` (`id`),
  ADD CONSTRAINT `fk_invoice_user1` FOREIGN KEY (`user_id`) REFERENCES `isg_user` (`id`);

--
-- Constraints for table `isg_invoice_details`
--
ALTER TABLE `isg_invoice_details`
  ADD CONSTRAINT `fk_invoice_details_invoice1` FOREIGN KEY (`invoice_id`) REFERENCES `isg_invoice` (`id`),
  ADD CONSTRAINT `fk_invoice_details_order_details1` FOREIGN KEY (`order_details_id`) REFERENCES `isg_order_details` (`id`),
  ADD CONSTRAINT `fk_invoice_details_order_master1` FOREIGN KEY (`order_master_id`) REFERENCES `isg_order_master` (`id`);

--
-- Constraints for table `isg_item_master`
--
ALTER TABLE `isg_item_master`
  ADD CONSTRAINT `fk_item_master_company_profile_data1` FOREIGN KEY (`company_profile_data_id`,`company_code`) REFERENCES `isg_company_profile_data` (`id`, `company_code`),
  ADD CONSTRAINT `fk_item_master_tax1` FOREIGN KEY (`tax_id`) REFERENCES `isg_tax` (`id`);

--
-- Constraints for table `isg_item_vendor`
--
ALTER TABLE `isg_item_vendor`
  ADD CONSTRAINT `fk_item_vendor_tax1` FOREIGN KEY (`tax_id`) REFERENCES `isg_tax` (`id`),
  ADD CONSTRAINT `fk_item_vendor_vendor_services1` FOREIGN KEY (`vendor_services_id`) REFERENCES `isg_vendor_services` (`id`),
  ADD CONSTRAINT `fk_vendor_tems_item_master1` FOREIGN KEY (`item_master_id`) REFERENCES `isg_item_master` (`id`),
  ADD CONSTRAINT `fk_vendor_tems_vendor_master1` FOREIGN KEY (`vendor_master_id`) REFERENCES `isg_vendor_master` (`id`);

--
-- Constraints for table `isg_order_basket`
--
ALTER TABLE `isg_order_basket`
  ADD CONSTRAINT `fk_order_basket_item_vendor1` FOREIGN KEY (`item_vendor_id`) REFERENCES `isg_item_vendor` (`id`),
  ADD CONSTRAINT `fk_order_basket_user1` FOREIGN KEY (`user_id`) REFERENCES `isg_user` (`id`);

--
-- Constraints for table `isg_order_details`
--
ALTER TABLE `isg_order_details`
  ADD CONSTRAINT `fk_order_details_discount_model1` FOREIGN KEY (`discount_model_id`) REFERENCES `isg_discount_model` (`id`),
  ADD CONSTRAINT `fk_order_details_item_master1` FOREIGN KEY (`item_master_id`) REFERENCES `isg_item_master` (`id`),
  ADD CONSTRAINT `fk_order_details_item_vendor1` FOREIGN KEY (`item_vendor_id`) REFERENCES `isg_item_vendor` (`id`),
  ADD CONSTRAINT `fk_order_details_order_master1` FOREIGN KEY (`order_master_id`) REFERENCES `isg_order_master` (`id`),
  ADD CONSTRAINT `fk_order_details_tax1` FOREIGN KEY (`tax_id`) REFERENCES `isg_tax` (`id`),
  ADD CONSTRAINT `fk_order_details_user1` FOREIGN KEY (`user_id`) REFERENCES `isg_user` (`id`);

--
-- Constraints for table `isg_order_master`
--
ALTER TABLE `isg_order_master`
  ADD CONSTRAINT `fk_order_master_discount_model1` FOREIGN KEY (`discount_model_id`) REFERENCES `isg_discount_model` (`id`),
  ADD CONSTRAINT `fk_order_master_user1` FOREIGN KEY (`user_id`) REFERENCES `isg_user` (`id`);

--
-- Constraints for table `isg_payment_checkout`
--
ALTER TABLE `isg_payment_checkout`
  ADD CONSTRAINT `fk_payment_checkout_payment_vendor_master1` FOREIGN KEY (`payment_vendor_master_id`) REFERENCES `isg_payment_vendor_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `isg_payment_payee`
--
ALTER TABLE `isg_payment_payee`
  ADD CONSTRAINT `fk_isg_payment_payee_isg_service_subscriber1` FOREIGN KEY (`isg_service_subscriber_id`) REFERENCES `isg_service_subscriber` (`id`),
  ADD CONSTRAINT `fk_payment_payee_user1` FOREIGN KEY (`user_id`) REFERENCES `isg_user` (`id`);

--
-- Constraints for table `isg_payment_user_configuration`
--
ALTER TABLE `isg_payment_user_configuration`
  ADD CONSTRAINT `fk_payment_user_configuration_user1` FOREIGN KEY (`user_id`) REFERENCES `isg_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `isg_payment_user_invoice`
--
ALTER TABLE `isg_payment_user_invoice`
  ADD CONSTRAINT `fk_payment_user_invoice_invoice1` FOREIGN KEY (`invoice_id`) REFERENCES `isg_invoice` (`id`),
  ADD CONSTRAINT `fk_payment_user_invoice_invoice_details1` FOREIGN KEY (`invoice_details_id`) REFERENCES `isg_invoice_details` (`id`),
  ADD CONSTRAINT `fk_payment_user_invoice_payment_payee1` FOREIGN KEY (`payment_payee_id`) REFERENCES `isg_payment_payee` (`id`);

--
-- Constraints for table `isg_payment_vendor_details`
--
ALTER TABLE `isg_payment_vendor_details`
  ADD CONSTRAINT `fk_payment_vendor_details_payment_vendor_master1` FOREIGN KEY (`payment_vendor_master_id`) REFERENCES `isg_payment_vendor_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `isg_payment_vendor_master`
--
ALTER TABLE `isg_payment_vendor_master`
  ADD CONSTRAINT `fk_payment_vendor_master_einvoice_simplified_invoice_header1` FOREIGN KEY (`einvoice_header_id`) REFERENCES `einvoice_simplified_invoice_header` (`id`),
  ADD CONSTRAINT `fk_payment_vendor_master_invoice1` FOREIGN KEY (`invoice_id`) REFERENCES `isg_invoice` (`id`),
  ADD CONSTRAINT `fk_payment_vendor_master_payment_payee1` FOREIGN KEY (`payment_payee_id`) REFERENCES `isg_payment_payee` (`id`);

--
-- Constraints for table `isg_permission`
--
ALTER TABLE `isg_permission`
  ADD CONSTRAINT `fk_permission_membership1` FOREIGN KEY (`membership_id`) REFERENCES `isg_membership` (`id`),
  ADD CONSTRAINT `fk_permission_role1` FOREIGN KEY (`role_id`) REFERENCES `isg_role` (`id`);

--
-- Constraints for table `isg_privacy_policy_header`
--
ALTER TABLE `isg_privacy_policy_header`
  ADD CONSTRAINT `fk_privacy_policy_header_privacy_policy_questionnaire1` FOREIGN KEY (`privacy_policy_questionnaire_id`) REFERENCES `isg_privacy_policy_questionnaire` (`id`),
  ADD CONSTRAINT `fk_privacy_policy_header_privacy_policy_template1` FOREIGN KEY (`privacy_policy_template_id`) REFERENCES `isg_privacy_policy_template` (`id`);

--
-- Constraints for table `isg_privacy_policy_lines`
--
ALTER TABLE `isg_privacy_policy_lines`
  ADD CONSTRAINT `fk_privacy_policy_lines_privacy_policy_header1` FOREIGN KEY (`privacy_policy_header_id`) REFERENCES `isg_privacy_policy_header` (`id`);

--
-- Constraints for table `isg_service_plan_items`
--
ALTER TABLE `isg_service_plan_items`
  ADD CONSTRAINT `fk_isg_service_plan_tems_isg_service_item1` FOREIGN KEY (`isg_service_item_id`) REFERENCES `isg_service_item` (`id`),
  ADD CONSTRAINT `fk_isg_service_plan_tems_isg_service_plan1` FOREIGN KEY (`isg_service_plan_id`) REFERENCES `isg_service_plan` (`id`);

--
-- Constraints for table `isg_service_plan_subscriber`
--
ALTER TABLE `isg_service_plan_subscriber`
  ADD CONSTRAINT `fk_isg_service_plan_subscriber_isg_service_plan1` FOREIGN KEY (`isg_service_plan_id`) REFERENCES `isg_service_plan` (`id`),
  ADD CONSTRAINT `fk_isg_service_plan_subscriber_isg_service_subscriber1` FOREIGN KEY (`isg_service_subscriber_id`) REFERENCES `isg_service_subscriber` (`id`);

--
-- Constraints for table `isg_service_subscriber`
--
ALTER TABLE `isg_service_subscriber`
  ADD CONSTRAINT `fk_isg_service_subscriber_isg_user1` FOREIGN KEY (`isg_user_id`) REFERENCES `isg_user` (`id`);

--
-- Constraints for table `isg_user`
--
ALTER TABLE `isg_user`
  ADD CONSTRAINT `fk_user_role1` FOREIGN KEY (`role_id`) REFERENCES `isg_role` (`id`);

--
-- Constraints for table `isg_user_booking`
--
ALTER TABLE `isg_user_booking`
  ADD CONSTRAINT `fk_user_booking_user1` FOREIGN KEY (`user_id`) REFERENCES `isg_user` (`id`),
  ADD CONSTRAINT `fk_user_booking_vendor_booking_calendar1` FOREIGN KEY (`vendor_booking_calendar_id`) REFERENCES `isg_vendor_booking_calendar` (`id`);

--
-- Constraints for table `isg_user_company`
--
ALTER TABLE `isg_user_company`
  ADD CONSTRAINT `fk_user_company_isg_company_profile_data1` FOREIGN KEY (`company_id`,`company_code`) REFERENCES `isg_company_profile_data` (`id`, `company_code`),
  ADD CONSTRAINT `fk_user_company_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `isg_user_devices`
--
ALTER TABLE `isg_user_devices`
  ADD CONSTRAINT `fk_user_devices_user` FOREIGN KEY (`user_id`) REFERENCES `isg_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `isg_user_privacy_policy`
--
ALTER TABLE `isg_user_privacy_policy`
  ADD CONSTRAINT `fk_user_privacy_policy_privacy_policy_header1` FOREIGN KEY (`privacy_policy_header_id`) REFERENCES `isg_privacy_policy_header` (`id`),
  ADD CONSTRAINT `fk_user_privacy_policy_user1` FOREIGN KEY (`user_id`) REFERENCES `isg_user` (`id`);

--
-- Constraints for table `isg_user_role`
--
ALTER TABLE `isg_user_role`
  ADD CONSTRAINT `fk_user_role_role1` FOREIGN KEY (`role_id`) REFERENCES `isg_role` (`id`),
  ADD CONSTRAINT `fk_user_role_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `isg_vendor_booking_calendar`
--
ALTER TABLE `isg_vendor_booking_calendar`
  ADD CONSTRAINT `fk_vendor_booking_calendar_user1` FOREIGN KEY (`user_id`) REFERENCES `isg_user` (`id`),
  ADD CONSTRAINT `fk_vendor_calendar_vendor_master1` FOREIGN KEY (`vendor_master_id`) REFERENCES `isg_vendor_master` (`id`);

--
-- Constraints for table `isg_vendor_commission_setup`
--
ALTER TABLE `isg_vendor_commission_setup`
  ADD CONSTRAINT `fk_vendor_commission_setup_vendor_master1` FOREIGN KEY (`vendor_master_id`) REFERENCES `isg_vendor_master` (`id`);

--
-- Constraints for table `isg_vendor_commission_transaction`
--
ALTER TABLE `isg_vendor_commission_transaction`
  ADD CONSTRAINT `fk_isg_vendor_commission_transaction_einvoice_simplified_invo1` FOREIGN KEY (`einvoice_id`) REFERENCES `einvoice_simplified_invoice_header` (`id`),
  ADD CONSTRAINT `fk_vendor_commission_transaction_order_details1` FOREIGN KEY (`order_details_id`) REFERENCES `isg_order_details` (`id`),
  ADD CONSTRAINT `fk_vendor_commission_transaction_order_master1` FOREIGN KEY (`order_master_id`) REFERENCES `isg_order_master` (`id`),
  ADD CONSTRAINT `fk_vendor_commission_transaction_vendor_commission_setup1` FOREIGN KEY (`vendor_commission_setup_id`) REFERENCES `isg_vendor_commission_setup` (`id`),
  ADD CONSTRAINT `fk_vendor_commission_transaction_vendor_master1` FOREIGN KEY (`vendor_master_id`) REFERENCES `isg_vendor_master` (`id`);

--
-- Constraints for table `isg_vendor_master`
--
ALTER TABLE `isg_vendor_master`
  ADD CONSTRAINT `fk_vendor_master_company_profile_data1` FOREIGN KEY (`company_profile_data_id`,`company_code`) REFERENCES `isg_company_profile_data` (`id`, `company_code`);

--
-- Constraints for table `isg_vendor_profile`
--
ALTER TABLE `isg_vendor_profile`
  ADD CONSTRAINT `fk_vendor_profile_vendor_master1` FOREIGN KEY (`vendor_master_id`) REFERENCES `isg_vendor_master` (`id`);

--
-- Constraints for table `isg_vendor_services`
--
ALTER TABLE `isg_vendor_services`
  ADD CONSTRAINT `fk_vendor_services_vendor_master1` FOREIGN KEY (`vendor_master_id`) REFERENCES `isg_vendor_master` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_company_profile_data1` FOREIGN KEY (`company_profile_data_id`) REFERENCES `isg_company_profile_data` (`id`),
  ADD CONSTRAINT `fk_users_isg_signup_staging1` FOREIGN KEY (`isg_signup_staging_id`) REFERENCES `isg_signup_staging` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
