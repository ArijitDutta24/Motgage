-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 14, 2019 at 04:28 PM
-- Server version: 5.7.22-0ubuntu0.17.10.1
-- PHP Version: 7.1.17-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `motgage`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` tinyint(4) NOT NULL DEFAULT '0',
  `parent_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=>"parent",1=>"sub-parent",2=>"sub-sub-parent"',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `cat_slug`, `parent_id`, `parent_type`, `created_at`, `updated_at`) VALUES
(1, 'Property Listings', 'Property Listings', 0, 0, '2019-06-06 06:06:25', '2019-06-10 08:20:47'),
(2, 'Vehicle Listings', 'Vehicle Listings', 0, 0, '2019-06-06 06:42:02', '2019-06-06 06:42:02'),
(4, 'Land', 'Land', 1, 1, '2019-06-06 07:11:19', '2019-06-10 08:20:16'),
(5, 'Residential Properties', 'Residential Properties', 1, 1, '2019-06-10 03:08:18', '2019-06-10 03:08:18'),
(6, 'Commercial Properties', 'Commercial Properties', 1, 1, '2019-06-10 03:09:13', '2019-06-10 03:09:13'),
(7, 'Industrial Properties', 'Industrial Properties', 1, 1, '2019-06-10 03:09:44', '2019-06-10 03:09:44'),
(8, 'Sedans', 'Sedans', 2, 1, '2019-06-10 03:10:27', '2019-06-10 03:10:27'),
(9, 'SUVs', 'SUVs', 2, 1, '2019-06-10 03:10:59', '2019-06-10 03:10:59'),
(10, 'Pickups', 'Pickups', 2, 1, '2019-06-10 03:11:22', '2019-06-10 03:11:22'),
(11, 'Trucks', 'Trucks', 2, 1, '2019-06-10 03:12:48', '2019-06-10 03:12:48'),
(12, 'Industrial', 'Industrial', 2, 1, '2019-06-10 03:13:16', '2019-06-10 03:13:16'),
(13, 'Other', 'Other', 2, 1, '2019-06-10 03:13:45', '2019-06-10 03:13:45'),
(14, 'Agricultural', 'Agricultural', 4, 2, '2019-06-10 03:20:03', '2019-06-10 08:22:37'),
(15, 'Residential', 'Residential', 4, 2, '2019-06-10 03:21:22', '2019-06-10 03:21:22'),
(16, 'Commercial', 'Commercial', 4, 2, '2019-06-10 03:22:25', '2019-06-10 03:22:25'),
(17, 'Multi-purpose', 'Multi-purpose', 4, 2, '2019-06-10 03:23:05', '2019-06-10 03:23:05');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int(10) UNSIGNED NOT NULL,
  `cms_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cms_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cms_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cms_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `cms_title`, `cms_slug`, `cms_desc`, `cms_status`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'about_us', 'Motgage Project Start', 1, '2019-06-03 18:30:00', '2019-06-05 00:59:21'),
(2, 'Testimonial', 'tesimonial', 'Hello Testimonial', 1, '2019-06-03 18:30:00', '2019-06-05 00:58:08');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `curr_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curr_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curr_rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=>"Active",2=>"Inactive"',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `curr_name`, `curr_code`, `curr_rate`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(2, 'Indian Rupee', 'INR', '75', 1, 1, '2019-06-13 01:28:50', '2019-06-13 01:49:32');

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
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_05_27_054012_creates_roles_table', 1),
(7, '2019_06_04_090326_create_cms_table', 2),
(8, '2019_06_05_074410_create_userinfos_table', 3),
(9, '2019_06_06_082852_create_categories_table', 4),
(18, '2019_06_11_072333_create_properties_table', 5),
(19, '2019_06_12_060046_create_property_images_table', 5),
(21, '2019_06_13_052658_create_currencies_table', 6),
(22, '2014_10_12_000000_create_users_table', 7);

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
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(10) UNSIGNED NOT NULL,
  `prop_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catid` tinyint(4) NOT NULL,
  `prop_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prop_country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prop_state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prop_city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prop_addr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prop_pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prop_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `endDate` date NOT NULL,
  `endTime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `prop_name`, `catid`, `prop_desc`, `picture`, `prop_country`, `prop_state`, `prop_city`, `prop_addr`, `prop_pincode`, `prop_price`, `user_id`, `created_by`, `status`, `endDate`, `endTime`, `is_deleted`, `created_at`, `updated_at`) VALUES
(2, 'Banglow', 16, 'tuyutyujhkhkjhkjhkjhkjhkjhkjhkjhkj', 'Main_1560426718.jpeg', '0', 'West Bengal', 'Kolkata', 'DAPL', '700031', '2000.00', 5, 'Admin', 1, '2019-06-21', '19:00', 0, '2019-06-12 01:58:46', '2019-06-13 06:21:58');

-- --------------------------------------------------------

--
-- Table structure for table `property_images`
--

CREATE TABLE `property_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `prop_id` tinyint(4) NOT NULL,
  `prop_pic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_images`
--

INSERT INTO `property_images` (`id`, `prop_id`, `prop_pic`, `created_at`, `updated_at`) VALUES
(3, 2, '1560428739.jpeg', '2019-06-12 01:58:46', '2019-06-13 06:55:39'),
(4, 2, '1560430107.jpeg', '2019-06-12 01:58:46', '2019-06-13 07:18:27');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2019-06-03 01:22:28', NULL),
(2, 'User', '2019-06-03 01:22:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userinfos`
--

CREATE TABLE `userinfos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userinfos`
--

INSERT INTO `userinfos` (`id`, `user_id`, `address`, `city`, `postal_code`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 5, 'DAPL', 'Kolkata', '700031', 3, '2019-06-05 03:19:31', '2019-06-05 07:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=>"Yes",0=>"No"',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `image`, `remember_token`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Arijit Dutta', 'arijit@digitalaptech.com', NULL, '$2y$10$iwqtw5zZFOmpKJuqEaJ.yO15F313RMa.AOhuypkgE8v2QQd0vclHO', 'profile.jpeg', NULL, 1, NULL, '2019-06-14 00:39:16', '2019-06-14 01:03:51'),
(5, 2, 'Arijit Dutta', 'arijit.dutta48@gmail.com', NULL, '$2y$10$4EN6.bJy.9HjTINdMaKNKuIuR3GVanYfRoDyJ1s5R1Sh5WK24qp.S', NULL, NULL, 1, NULL, '2019-06-14 00:39:16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_images`
--
ALTER TABLE `property_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfos`
--
ALTER TABLE `userinfos`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `property_images`
--
ALTER TABLE `property_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `userinfos`
--
ALTER TABLE `userinfos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
