-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 05, 2019 at 12:55 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms_laravel_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cloths`
--

CREATE TABLE `cloths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cloth_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wash_price` double(8,2) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cloths`
--

INSERT INTO `cloths` (`id`, `user_id`, `cloth_name`, `wash_price`, `category`, `created_at`, `updated_at`) VALUES
(1, 1, 'Shirt', 45.70, 'Male', '2019-09-26 22:37:52', '2019-09-26 22:37:52'),
(2, 1, 'Fugu Ladies', 23.00, 'Male', '2019-10-05 04:52:55', '2019-10-05 04:52:55'),
(3, 1, 'Ladies top', 40.00, 'Female', '2019-10-05 04:53:15', '2019-10-05 04:53:15'),
(4, 1, 'Top Kids', 12.00, 'Kids', '2019-10-05 04:53:33', '2019-10-05 04:53:33');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cust_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cust_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cust_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cust_gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cust_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `cust_name`, `cust_phone`, `cust_email`, `cust_gender`, `cust_address`, `created_at`, `updated_at`) VALUES
(2, 3, 'Madam Lydia Akoto', '9047464666', 'adu@gmail.com', 'Female', 'Goa', '2019-10-03 03:12:33', '2019-10-03 03:12:33'),
(5, 3, 'Madam Diana Peprah', '0205363635', 'mdp@yahoo.com', 'Female', 'scr/10', '2019-10-04 00:31:24', '2019-10-04 00:31:24'),
(7, 3, 'Miss Adoma Boateng', '5647476363', 'adom@gmail.com', 'Female', 'SDA/45', '2019-10-04 03:17:37', '2019-10-04 03:17:37'),
(8, 3, 'Madam Diana Peprah', '53653636', 'adu@gmail.com', 'Female', 'rey', '2019-10-05 04:17:30', '2019-10-05 04:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `detailorders`
--

CREATE TABLE `detailorders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cloth_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double(8,2) NOT NULL,
  `sub_total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detailorders`
--

INSERT INTO `detailorders` (`id`, `transid`, `cloth_name`, `quantity`, `unit_price`, `sub_total`, `created_at`, `updated_at`) VALUES
(2, '2-1570177924', 'Shirt', 23, 45.70, 1051.10, '2019-10-04 08:32:08', NULL),
(3, '2-1570178197', 'Shirt', 3, 45.70, 137.10, '2019-10-04 08:36:41', NULL),
(4, '2-1570178717', 'Shirt', 23, 45.70, 1051.10, '2019-10-04 08:45:22', NULL),
(5, '6-1570178780', 'Shirt', 23, 45.70, 1051.10, '2019-10-04 08:46:29', NULL),
(6, '7-1570178857', 'Shirt', 34, 45.70, 1553.80, '2019-10-04 08:47:43', NULL),
(7, '7-1570178857', 'Shirt', 2, 45.70, 91.40, '2019-10-04 08:48:20', NULL),
(8, '7-1570178857', 'Shirt', 23, 45.70, 1051.10, '2019-10-04 08:48:45', NULL),
(9, '7-1570178857', 'Shirt', 2, 45.70, 91.40, '2019-10-04 09:20:22', NULL),
(10, '7-1570178857', 'Shirt', 32, 45.70, 1462.40, '2019-10-04 09:22:12', NULL),
(11, '7-1570178857', 'Shirt', 2, 45.70, 91.40, '2019-10-04 09:23:24', NULL),
(12, '7-1570178857', 'Shirt', 3, 45.70, 137.10, '2019-10-04 09:25:58', NULL),
(13, '7-1570178857', 'Shirt', 3, 45.70, 137.10, '2019-10-04 09:27:21', NULL),
(14, '7-1570178857', 'Shirt', 23, 45.70, 1051.10, '2019-10-04 09:33:01', NULL),
(16, '7-1570181610', 'Shirt', 6, 45.70, 274.20, '2019-10-04 09:33:54', NULL),
(17, '7-1570181610', 'Shirt', 8, 45.70, 365.60, '2019-10-04 09:34:02', NULL),
(18, '7-1570181610', 'Shirt', 23, 45.70, 1051.10, '2019-10-04 10:07:11', NULL),
(19, '1-1570188824', 'Shirt', 2, 45.70, 91.40, '2019-10-04 11:33:50', NULL),
(22, '2-1570209912', 'Shirt', 3, 45.70, 137.10, '2019-10-04 18:18:07', NULL),
(23, '1-1570263492', 'Shirt', 34, 45.70, 1553.80, '2019-10-05 08:18:19', NULL),
(24, '8-1570268850', 'Shirt', 34, 45.70, 1553.80, '2019-10-05 09:47:37', NULL),
(25, '2-1570270947', 'Shirt', 4, 45.70, 182.80, '2019-10-05 10:22:36', NULL),
(26, '2-1570271035', 'Shirt', 3, 45.70, 137.10, '2019-10-05 10:24:07', NULL),
(27, '2-1570271035', 'Fugu Ladies', 5, 23.00, 115.00, '2019-10-05 10:24:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `machines`
--

CREATE TABLE `machines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `machine_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `date_bought` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machines`
--

INSERT INTO `machines` (`id`, `user_id`, `machine_name`, `model`, `manufacturer`, `price`, `date_bought`, `created_at`, `updated_at`) VALUES
(1, 1, 'Samsong', 'S4TDG SER', 'Samg', 56.00, '2019-09-08', '2019-09-26 15:02:57', '2019-09-27 00:48:44'),
(2, 1, 'Samsong WM', 'S4TDG SER', 'Sony', 55464.00, '2019-09-21', '2019-09-27 00:57:29', '2019-09-27 00:57:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2019_09_24_033311_create_roles_table', 1),
(18, '2019_09_24_033651_create_role_user_table', 1),
(19, '2019_09_26_112056_create_customers_table', 1),
(20, '2019_09_26_155514_create_cloths_table', 1),
(22, '2019_09_26_194314_create_machines_table', 3),
(23, '2019_09_27_083649_create_orders_table', 4),
(25, '2019_10_03_110309_create_detailorders_table', 5),
(26, '2019_10_04_101519_create_payments_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `transid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `due_date` date NOT NULL,
  `total_item` int(11) NOT NULL,
  `total_amount` double(8,2) NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `transid`, `customer_id`, `due_date`, `total_item`, `total_amount`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 3, '2-1570209912', 2, '2019-10-06', 3, 137.10, 'Pending', '2019-10-04 20:31:16', NULL),
(2, 3, '2-1570209912', 2, '2019-10-06', 3, 137.10, 'Pending', '2019-10-04 20:32:39', NULL),
(3, 3, '2-1570209912', 2, '2019-10-06', 3, 137.10, 'Pending', '2019-10-04 20:33:09', NULL),
(4, 3, '2-1570209912', 2, '2019-10-06', 3, 137.10, 'Pending', '2019-10-04 20:33:51', NULL),
(5, 3, '2-1570209912', 2, '2019-10-06', 3, 137.10, 'Ready', '2019-10-04 20:37:18', '2019-10-05 08:42:25'),
(6, 3, '2-1570209912', 2, '2019-10-06', 3, 137.10, 'Pending', '2019-10-04 20:38:08', NULL),
(7, 3, '2-1570209912', 2, '2019-10-06', 3, 137.10, 'Pending', '2019-10-04 20:40:29', NULL),
(8, 3, '2-1570209912', 2, '2019-10-06', 3, 137.10, 'Pending', '2019-10-04 20:41:11', NULL),
(9, 3, '2-1570209912', 2, '2019-10-06', 3, 137.10, 'Pending', '2019-10-04 20:47:02', NULL),
(10, 3, '2-1570209912', 2, '2019-10-12', 3, 137.10, 'Pending', '2019-10-04 20:56:28', NULL),
(11, 3, '2-1570209912', 2, '2019-10-12', 3, 137.10, 'Pending', '2019-10-04 21:08:01', NULL),
(12, 3, '1-1570263492', 1, '2019-10-12', 34, 1553.80, 'Pending', '2019-10-05 08:18:39', NULL),
(13, 3, '8-1570268850', 8, '2019-10-27', 34, 1553.80, 'Pending', '2019-10-05 09:47:51', NULL),
(14, 1, '2-1570271035', 2, '2019-10-06', 8, 252.10, 'Pending', '2019-10-05 10:25:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` double(8,2) NOT NULL,
  `payment_mthd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `customer_id`, `order_id`, `payment_id`, `transid`, `total_amount`, `payment_mthd`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 1, '2-1570209912', '2-1570209912', 137.10, 'Cash Payment', '2019-10-04 20:31:16', NULL),
(2, 3, 2, 1, '2-1570209912', '2-1570209912', 137.10, 'Cash Payment', '2019-10-04 20:32:39', NULL),
(3, 3, 2, 1, '2-1570209912', '2-1570209912', 137.10, 'Cash Payment', '2019-10-04 20:33:09', NULL),
(4, 3, 2, 1, '2-1570209912', '2-1570209912', 137.10, 'Cash Payment', '2019-10-04 20:33:51', NULL),
(5, 3, 2, 1, '2-1570209912', '2-1570209912', 137.10, 'Cash Payment', '2019-10-04 20:37:18', NULL),
(6, 3, 2, 1, '2-1570209912', '2-1570209912', 137.10, 'Cash Payment', '2019-10-04 20:38:08', NULL),
(7, 3, 2, 1, '2-1570209912', '2-1570209912', 137.10, 'Cash Payment', '2019-10-04 20:40:29', NULL),
(8, 3, 2, 1, '2-1570209912', '2-1570209912', 137.10, 'Cash Payment', '2019-10-04 20:41:11', NULL),
(9, 3, 2, 1, '2-1570209912', '2-1570209912', 137.10, 'Cash Payment', '2019-10-04 20:47:02', NULL),
(10, 3, 2, 1, '5635363772', '2-1570209912', 137.10, 'Card Payment', '2019-10-04 20:56:28', NULL),
(11, 3, 2, 1, '5635363772', '2-1570209912', 137.10, 'Card Payment', '2019-10-04 21:08:01', NULL),
(12, 3, 1, 12, '54647484', '1-1570263492', 1553.80, 'Card Payment', '2019-10-05 08:18:39', NULL),
(13, 3, 8, 13, '8-1570268850', '8-1570268850', 1553.80, 'Cash Payment', '2019-10-05 09:47:51', NULL),
(14, 1, 2, 14, '2-1570271035', '2-1570271035', 252.10, 'Cash Payment', '2019-10-05 10:25:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2019-09-26 13:49:48', '2019-09-26 13:49:48'),
(2, 'Manager', '2019-09-26 13:49:48', '2019-09-26 13:49:48'),
(3, 'Front Desk', '2019-09-26 13:49:48', '2019-09-26 13:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bdate` date DEFAULT NULL,
  `salary` double(8,2) DEFAULT NULL,
  `mstatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emplydate` date DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `gender`, `bdate`, `salary`, `mstatus`, `emplydate`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@mycota.com', '9535464647', 'City Center', 'Male', '2019-09-01', 56477.00, 'Single', '2019-09-27', 'uploads/g2gAXEd6jw55HYUCV9W9cyn0B81OH3UykhdCe3D8.png', NULL, '$2y$10$BnFORcKZmEFh/B2wFNBSDeLu7qzBPlE69fZMCpmrCECleeLI4TzJG', NULL, '2019-09-26 13:49:48', '2019-10-03 01:01:14'),
(2, 'Manager', 'manager@mycota.com', '9867545322', 'Rajkot Central', 'Female', '2018-06-01', 783536.89, 'Single', '2019-09-08', 'uploads/0OZHr6lYc6TnpONhKWEePKXUrdI56iRhyQDDz1Cr.png', NULL, '$2y$10$PmpqpmDJ1gSe7oJSzKlYB.072GZx4alGBAet19NzUTMZRyTw/hAgi', NULL, '2019-09-26 13:49:48', '2019-09-30 02:36:26'),
(3, 'Front Desk', 'frontdesk@mycota.com', '7837353672', 'Rajok city', 'Male', '2019-09-01', 30453.67, 'Married', '2019-09-30', 'uploads/WYXVTeoDt7okpSoRQY6lXcXDXHg9DdqibrV51hge.png', NULL, '$2y$10$5FycYED/d5pJEPXVKMiTweZ13engbdQcLXSkJEmuaYkmDoTL2f2Be', NULL, '2019-09-26 13:49:49', '2019-10-03 00:58:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cloths`
--
ALTER TABLE `cloths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailorders`
--
ALTER TABLE `detailorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cloths`
--
ALTER TABLE `cloths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `detailorders`
--
ALTER TABLE `detailorders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `machines`
--
ALTER TABLE `machines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
