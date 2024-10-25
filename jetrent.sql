-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Oct 25, 2024 at 04:19 AM
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
-- Database: `jetrent`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'Luxury', 'Luxury jets with high-end amenities.', '2024-10-22 21:51:13', '2024-10-24 04:51:29'),
(2, 'Business2', 'Business jets suitable for corporate travel.', '2024-10-22 21:51:13', '2024-10-24 08:06:04'),
(3, 'Small Jet', 'Compact jets designed for short trips.', '2024-10-22 21:51:13', '2024-10-22 21:51:13'),
(5, 'Medium Jet 2', 'tes', '2024-10-24 08:05:58', '2024-10-24 08:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_09_23_042421_create_penalties_table', 1),
(6, '2024_10_23_042017_create_units_table', 1),
(7, '2024_10_23_042119_create_categories_table', 1),
(8, '2024_10_23_042224_create_unit_categories_table', 1),
(9, '2024_10_23_042300_create_rentals_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penalties`
--

CREATE TABLE `penalties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penalty_code` varchar(255) NOT NULL,
  `max_day` int(11) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penalties`
--

INSERT INTO `penalties` (`id`, `penalty_code`, `max_day`, `price`, `created_at`, `updated_at`) VALUES
(1, 'PENALTY_1', 5, 500000.00, '2024-10-22 21:51:13', '2024-10-22 21:51:13'),
(2, 'PENALTY_2', 10, 300000.00, '2024-10-22 21:51:13', '2024-10-22 21:51:13'),
(3, 'PENALTY_3', 15, 200000.00, '2024-10-22 21:51:13', '2024-10-22 21:51:13');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `rent_start` date NOT NULL,
  `rent_end` date NOT NULL,
  `rent_return` date DEFAULT NULL,
  `returned` tinyint(1) NOT NULL DEFAULT 0,
  `penalty_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_price` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `user_id`, `unit_id`, `rent_start`, `rent_end`, `rent_return`, `returned`, `penalty_id`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 2, 4, '2024-10-24', '2024-10-29', '2024-10-24', 1, 1, 0.00, '2024-10-23 23:36:29', '2024-10-24 03:57:34'),
(2, 2, 4, '2024-10-24', '2024-10-29', '2024-10-24', 1, 1, 0.00, '2024-10-23 23:36:44', '2024-10-24 04:08:37'),
(3, 3, 4, '2024-10-24', '2024-10-29', '2024-10-24', 1, 1, 0.00, '2024-10-24 02:06:57', '2024-10-24 04:08:39'),
(4, 3, 4, '2024-10-24', '2024-10-29', '2024-10-24', 1, 1, 22777775.00, '2024-10-24 03:02:57', '2024-10-24 04:08:41'),
(5, 2, 4, '2024-10-24', '2024-10-29', '2024-10-24', 1, 1, 22777775.00, '2024-10-24 04:03:48', '2024-10-24 04:08:44'),
(6, 3, 6, '2024-10-24', '2024-10-29', '2024-10-24', 1, 1, 22777775.00, '2024-10-24 08:04:24', '2024-10-24 08:05:15');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_code` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `stock` tinyint(1) NOT NULL DEFAULT 1,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_code`, `name`, `desc`, `price`, `brand`, `stock`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'JET001', 'Gulfstream G650', 'Luxury private jet', 6500000.00, 'Airbus', 1, 'photos/gv20E7Vz5KkBJV0k9oeREUwwmSwiESVV6yBfqdo1.jpg', '2024-10-22 21:51:13', '2024-10-24 01:46:02'),
(2, 'JET002', 'Challenger 350', 'Business jet', 4500000.00, 'Boeing', 1, 'photos/hLctlvpK01yQFOJnaNR6lcljPXEJprcfdCZevITc.jpg', '2024-10-22 21:51:13', '2024-10-24 01:46:09'),
(4, 'JE006', 'JetBus405', 'sdfsdfdsfsadf', 4555555.00, 'tesdddd', 1, 'photos/96f8j0qgqCPNucLSLtCHXDOnZyW7cxkz25ad1HPS.jpg', '2024-10-23 15:36:01', '2024-10-24 04:08:44'),
(5, 'JE008', 'test', 'tessdfsdf', 4555555.00, 'tes', 1, 'photos/ViaoTn5GCNHG65WR4o2dyUrWojimasCZVlI7urLZ.jpg', '2024-10-24 07:41:04', '2024-10-24 07:41:04'),
(6, 'JE010', 'test', 'tesdafdasddfas', 4555555.00, 'tes', 1, 'photos/ppmN6UrUHNPoz2iz8uDERd9rCIgG9C9FYEd3eO8s.jpg', '2024-10-24 08:02:35', '2024-10-24 08:05:15');

-- --------------------------------------------------------

--
-- Table structure for table `unit_categories`
--

CREATE TABLE `unit_categories` (
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_categories`
--

INSERT INTO `unit_categories` (`unit_id`, `category_id`) VALUES
(1, 1),
(1, 2),
(2, 2),
(2, 3),
(4, 1),
(4, 2),
(4, 3),
(5, 2),
(5, 3),
(6, 1),
(6, 2),
(6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `phone` varchar(20) NOT NULL,
  `address` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `rent_count` int(11) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `phone`, `address`, `photo`, `rent_count`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@example.com', NULL, '$2y$10$8D4uqrDKRoNVvMbSvvHerO0Z9YuFDn/BvERbY7M/fHBT/4NmwcT6S', 'admin', '0824567234', 'Admin Address', 'profile_photos/doZpj2L6fjjsDGI4blckKd6R0M9jnmBiL5sfllCv.jpg', NULL, NULL, '2024-10-22 21:51:13', '2024-10-24 07:51:47'),
(2, 'John Doe', 'john@example.com', NULL, '$2y$10$5Lq6lEvFd6Z6OK8OY703seg6tyM93HXtRgfEVXOSrvfviJpo5bGvu', 'user', '0987654321', 'John Address', NULL, 0, NULL, '2024-10-22 21:51:13', '2024-10-24 04:08:44'),
(3, 'Nabil Afkar', 'nabilafkar2@gmail.com', NULL, '$2y$10$cerUdvM/AeSGsmqbYUv25..IhFgXU0dpaldoi9KL.esveDLXb0TfW', 'user', '082147588138', 'tesss', 'profile_photos/hkLiKINdymkHfwiuxgaVeftXXf1Ry4YfzfP2f8kV.jpg', 0, NULL, '2024-10-24 01:42:55', '2024-10-24 08:05:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `penalties`
--
ALTER TABLE `penalties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penalties_penalty_code_unique` (`penalty_code`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_user_id_foreign` (`user_id`),
  ADD KEY `rentals_unit_id_foreign` (`unit_id`),
  ADD KEY `rentals_penalty_id_foreign` (`penalty_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `units_unit_code_unique` (`unit_code`);

--
-- Indexes for table `unit_categories`
--
ALTER TABLE `unit_categories`
  ADD PRIMARY KEY (`unit_id`,`category_id`),
  ADD KEY `unit_categories_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `penalties`
--
ALTER TABLE `penalties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_penalty_id_foreign` FOREIGN KEY (`penalty_id`) REFERENCES `penalties` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `rentals_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rentals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `unit_categories`
--
ALTER TABLE `unit_categories`
  ADD CONSTRAINT `unit_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `unit_categories_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
