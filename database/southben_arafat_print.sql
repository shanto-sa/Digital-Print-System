-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2023 at 05:29 PM
-- Server version: 8.0.32-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `southben_arafat_print`
--

-- --------------------------------------------------------

--
-- Table structure for table `dags`
--

CREATE TABLE `dags` (
  `id` bigint UNSIGNED NOT NULL,
  `location_id` bigint UNSIGNED NOT NULL,
  `mouza_id` bigint UNSIGNED NOT NULL,
  `new_mouza_id` bigint UNSIGNED NOT NULL,
  `map_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jalno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dag_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sit_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dags`
--

INSERT INTO `dags` (`id`, `location_id`, `mouza_id`, `new_mouza_id`, `map_type`, `jalno`, `dag_no`, `map_image`, `sit_no`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'CS', '৭৮৯৪৫৬৪', '১০১ - ১৫০', '7dg4VdlYz4.png', '২', 1, 1, '2023-05-01 16:01:08', '2023-05-01 16:22:26'),
(2, 2, 2, 2, 'BRS', '21', '84', 'sfhdrn10jv.png', '23', 1, 1, '2023-05-01 22:08:11', '2023-05-01 22:08:11');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `site_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `site_title`, `site_logo`, `contact_person`, `email`, `phone`, `address_line_1`, `address_line_2`, `city`, `state`, `zipcode`, `created_at`, `updated_at`) VALUES
(1, 'আরাফাত প্রিন্ট', 'logo.png', 'Arafat Hossain', 'arafatprint@gmail.com', '+880 1992327887', 'B/5 Ambita Bashu Lane , RN Road , Jashore', '', 'Jashore', 'Khulna', '7400', '2023-05-01 15:53:42', '2023-05-01 15:53:42');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'খুলনা', 1, 1, '2023-05-01 15:55:41', '2023-05-01 15:55:41'),
(2, 'Bagerhat', 1, 1, '2023-05-01 22:06:34', '2023-05-01 22:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_04_144117_create_permission_tables', 1),
(6, '2023_04_07_153717_create_general_settings_table', 1),
(7, '2023_04_09_225116_create_system_settings_table', 1),
(8, '2023_04_16_185123_create_locations_table', 1),
(9, '2023_04_16_185147_create_mouzas_table', 1),
(10, '2023_04_16_185203_create_dags_table', 1),
(11, '2023_05_01_095150_create_mouzasnew_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mouzas`
--

CREATE TABLE `mouzas` (
  `id` bigint UNSIGNED NOT NULL,
  `location_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mouzas`
--

INSERT INTO `mouzas` (`id`, `location_id`, `name`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'খুলনা', 1, 1, '2023-05-01 15:56:20', '2023-05-01 15:56:20'),
(2, 2, 'Domoria', 1, 1, '2023-05-01 22:06:56', '2023-05-01 22:06:56');

-- --------------------------------------------------------

--
-- Table structure for table `mouza_news`
--

CREATE TABLE `mouza_news` (
  `id` bigint UNSIGNED NOT NULL,
  `mouzas_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mouza_news`
--

INSERT INTO `mouza_news` (`id`, `mouzas_id`, `name`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'বঠিয়া ঘাটা', 1, 1, '2023-05-01 15:58:08', '2023-05-01 15:58:08'),
(2, 2, 'Srinogor', 1, 1, '2023-05-01 22:07:21', '2023-05-01 22:07:21');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user-view', 'web', '2023-05-01 15:53:41', '2023-05-01 15:53:41'),
(2, 'user-create', 'web', '2023-05-01 15:53:41', '2023-05-01 15:53:41'),
(3, 'user-edit', 'web', '2023-05-01 15:53:41', '2023-05-01 15:53:41'),
(4, 'user-delete', 'web', '2023-05-01 15:53:41', '2023-05-01 15:53:41'),
(5, 'role-view', 'web', '2023-05-01 15:53:41', '2023-05-01 15:53:41'),
(6, 'role-create', 'web', '2023-05-01 15:53:41', '2023-05-01 15:53:41'),
(7, 'role-edit', 'web', '2023-05-01 15:53:41', '2023-05-01 15:53:41'),
(8, 'role-delete', 'web', '2023-05-01 15:53:41', '2023-05-01 15:53:41'),
(9, 'role-give-permission', 'web', '2023-05-01 15:53:41', '2023-05-01 15:53:41'),
(10, 'general-settings-view', 'web', '2023-05-01 15:53:41', '2023-05-01 15:53:41'),
(11, 'general-settings-edit', 'web', '2023-05-01 15:53:41', '2023-05-01 15:53:41'),
(12, 'system-settings-view', 'web', '2023-05-01 15:53:41', '2023-05-01 15:53:41'),
(13, 'system-settings-edit', 'web', '2023-05-01 15:53:41', '2023-05-01 15:53:41'),
(14, 'location-view', 'web', '2023-05-01 15:53:41', '2023-05-01 15:53:41'),
(15, 'location-create', 'web', '2023-05-01 15:53:41', '2023-05-01 15:53:41'),
(16, 'location-edit', 'web', '2023-05-01 15:53:41', '2023-05-01 15:53:41'),
(17, 'location-delete', 'web', '2023-05-01 15:53:41', '2023-05-01 15:53:41'),
(18, 'mouza-view', 'web', '2023-05-01 15:53:41', '2023-05-01 15:53:41'),
(19, 'mouza-create', 'web', '2023-05-01 15:53:41', '2023-05-01 15:53:41'),
(20, 'mouza-edit', 'web', '2023-05-01 15:53:41', '2023-05-01 15:53:41'),
(21, 'mouza-delete', 'web', '2023-05-01 15:53:41', '2023-05-01 15:53:41'),
(22, 'mouzanew-view', 'web', '2023-05-01 15:53:41', '2023-05-01 15:53:41'),
(23, 'mouzanew-create', 'web', '2023-05-01 15:53:41', '2023-05-01 15:53:41'),
(24, 'mouzanew-edit', 'web', '2023-05-01 15:53:41', '2023-05-01 15:53:41'),
(25, 'mouzanew-delete', 'web', '2023-05-01 15:53:42', '2023-05-01 15:53:42'),
(26, 'dag-view', 'web', '2023-05-01 15:53:42', '2023-05-01 15:53:42'),
(27, 'dag-create', 'web', '2023-05-01 15:53:42', '2023-05-01 15:53:42'),
(28, 'dag-edit', 'web', '2023-05-01 15:53:42', '2023-05-01 15:53:42'),
(29, 'dag-delete', 'web', '2023-05-01 15:53:42', '2023-05-01 15:53:42');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', 'This is Super admin', 1, '2023-05-01 15:53:42', '2023-05-01 15:53:42'),
(2, 'Admin', 'web', 'This is admin', 1, '2023-05-01 15:53:42', '2023-05-01 15:53:42'),
(3, 'User', 'web', 'This is user', 1, '2023-05-01 15:53:42', '2023-05-01 15:53:42'),
(4, 'Manager', 'web', 'This is manager', 1, '2023-05-01 15:53:42', '2023-05-01 15:53:42'),
(5, 'Writer', 'web', 'This is writer', 1, '2023-05-01 15:53:42', '2023-05-01 15:53:42'),
(6, 'Developer', 'web', 'This is developer', 1, '2023-05-01 15:53:42', '2023-05-01 15:53:42');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `date_format` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_zone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `date_format`, `time_zone`, `currency_code`, `currency_symbol`, `currency`, `currency_position`, `created_at`, `updated_at`) VALUES
(1, 'd-M-Y', 'Asia/Dhaka', 'BDT', '৳', 'symbol', 'prefix', '2023-05-01 15:53:42', '2023-05-01 15:53:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female','other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `phone`, `profile_photo`, `gender`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'আরাফাত', 'প্রিন্ট', 'Super Admin', 'superadmin@gmail.com', '01992327887', '3kvYcArKbN.jpg', NULL, NULL, NULL, '$2y$10$5O2cFNpTMJuMnmYLI6upt.vrFTNx5H2M/Yp.F6GN5MTFrXybPi96S', NULL, '2023-05-01 15:53:42', '2023-05-01 16:22:46'),
(2, NULL, NULL, 'hanna.hilpert', 'quitzon.marianne@example.com', '360-673-0603', NULL, NULL, NULL, '2023-05-01 15:53:42', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MeXAcer7jU', '2023-05-01 15:53:42', '2023-05-01 15:53:42'),
(3, NULL, NULL, 'donnell70', 'asteuber@example.org', '+1.936.932.8140', NULL, NULL, NULL, '2023-05-01 15:53:42', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'HXJ8KV0pDe', '2023-05-01 15:53:42', '2023-05-01 15:53:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dags`
--
ALTER TABLE `dags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `mouzas`
--
ALTER TABLE `mouzas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mouza_news`
--
ALTER TABLE `mouza_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dags`
--
ALTER TABLE `dags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mouzas`
--
ALTER TABLE `mouzas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mouza_news`
--
ALTER TABLE `mouza_news`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
