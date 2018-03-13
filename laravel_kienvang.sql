-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th3 13, 2018 lúc 01:58 AM
-- Phiên bản máy phục vụ: 10.1.22-MariaDB
-- Phiên bản PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel_kienvang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `avatar` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `avatar`, `description`, `created_at`, `updated_at`) VALUES
(1, '1520752990.jpg', 'slide 2111', '2018-03-11 07:23:10', '2018-03-11 00:23:10'),
(2, '1520751869.jpg', 'slide 1', '2018-03-11 00:04:29', '2018-03-11 00:04:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Du lịch', 'Du lịch', 0, 1, '2017-10-13 09:22:10', '2017-10-13 09:22:10'),
(2, 'Làm đẹp', 'Làm đẹp', 0, 1, '2017-10-13 09:22:20', '2017-10-13 09:22:20'),
(3, 'Chi tiêu', 'Chi tiêu', 0, 1, '2017-10-13 09:22:55', '2017-10-13 09:22:55'),
(4, 'Chợ đò', 'Chợ đò', 0, 1, '2017-10-13 09:23:51', '2017-10-13 09:23:51'),
(5, 'Sửa nhà', 'Sửa nhà', 0, 1, '2017-10-13 09:24:04', '2017-10-13 09:24:04'),
(6, 'Mua sắm', 'Mua sắm', 0, 1, '2017-10-13 09:24:21', '2017-10-13 09:24:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci,
  `scale` varchar(100) COLLATE utf8_unicode_ci DEFAULT '',
  `founding` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '1: show, 0: not show',
  `avatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `companies`
--

INSERT INTO `companies` (`id`, `name`, `summary`, `scale`, `founding`, `meta_keyword`, `meta_description`, `status`, `avatar`, `created_at`, `updated_at`) VALUES
(1, '1231', '<p>2312</p>', '11 - 555', '1999', '', '', 1, '', '2018-03-04 08:24:36', '2018-03-04 08:24:36'),
(2, '2312321', NULL, NULL, NULL, '11', '', 1, '1520177611.png', '2018-03-04 08:33:31', '2018-03-04 08:33:31'),
(3, 'dfsdfsdf', NULL, NULL, NULL, 'werwer', '', 1, '1520177785.jpg', '2018-03-04 08:36:25', '2018-03-04 08:36:25'),
(4, 'vbvbvbv11 222', '<p>bvbvbvbvbvb</p>', '1-10', '', 'vbvbv', 'vbvbv', 1, '1520179864.jpg', '2018-03-04 16:11:04', '2018-03-04 09:11:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `imports`
--

CREATE TABLE `imports` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `order_import_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `imports`
--

INSERT INTO `imports` (`id`, `product_id`, `product_name`, `product_price`, `qty`, `order_import_id`, `created_at`, `updated_at`) VALUES
(1, 7, 'Sản phẩm 7', 120000, 1, 8, '2017-10-14 09:31:20', '2017-10-14 09:31:20'),
(2, 10, 'Sản phẩm 10', 410000, 1, 9, '2017-10-14 09:32:59', '2017-10-14 09:32:59'),
(3, 7, 'Sản phẩm 7', 120000, 2, 9, '2017-10-14 09:32:59', '2017-10-14 09:32:59'),
(4, 4, 'Sản phẩm 4', 45000, 1, 9, '2017-10-14 09:32:59', '2017-10-14 09:32:59'),
(5, 10, 'Sản phẩm 10', 410000, 1, 10, '2017-10-14 09:47:35', '2017-10-14 09:47:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `major_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `meta_keyword` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL COMMENT '1: hien thi, 0: khong hien thi',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `description`, `summary`, `major_id`, `company_id`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, '2312', '12312', '<p>12321</p>', 4, 2, '123232132', '213123', 1, '2018-03-12 18:15:45', '2018-03-12 11:15:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `majors`
--

CREATE TABLE `majors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL COMMENT '1: hien thi, 0: khong hien thi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `majors`
--

INSERT INTO `majors` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'qwewqeqw1111', 1, '2018-03-11 16:48:48', '2018-03-11 09:48:33'),
(2, 'dddddd', 1, '2018-03-11 09:50:19', '2018-03-11 09:50:19'),
(3, 'sdsdsd', 1, '2018-03-11 09:51:03', '2018-03-11 09:51:03'),
(4, 'ggggg', 1, '2018-03-11 09:52:16', '2018-03-11 09:52:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_09_06_041908_create_categories_table', 1),
(4, '2017_09_06_071940_create_products_table', 1),
(5, '2017_09_06_085027_create_orders_table', 1),
(6, '2017_09_06_090838_create_order_details_table', 1),
(7, '2017_10_09_035115_create_expenses_table', 1),
(8, '2017_10_12_084201_create_imports_table', 1),
(9, '2017_10_12_084549_create_order__imports_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL COMMENT '1: tin tuc, 2: tin nensai',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` smallint(6) NOT NULL COMMENT '1: hien thi, 0: khong hien thi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `name`, `description`, `summary`, `avatar`, `meta_keyword`, `meta_description`, `type`, `created_at`, `updated_at`, `status`) VALUES
(1, 'qweqwe', 'qweqwewq', '<p><img alt=\"\" src=\"/content/userfiles/images/tu-ho-so-cat08g_s881.png\" style=\"height:549px; width:550px\" /></p>\r\n\r\n<p>qweqwewq</p>', NULL, '213213', '213213213', 1, '2018-03-06 15:56:45', '2018-03-06 08:56:45', 1),
(2, 'xcxc111', 'xcxcx', '<p>xcxcxcxc</p>', NULL, 'xcxc2222', 'xcxcxc', 1, '2018-03-06 15:57:08', '2018-03-06 08:58:06', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `info` text COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `summary`, `slug`, `avatar`, `price`, `category_id`, `info`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sản phẩm 1', 'Sản phẩm 1', '<p>Sản phẩm 1</p>', '', '1507911960.jpg', 15000, 1, '', 1, '2017-10-13 09:26:00', '2017-10-13 09:26:00'),
(2, 'Sản phẩm 2', 'Sản phẩm 2', '<p>Sản phẩm 2</p>', '', '1507912009.jpg', 20000, 2, '', 1, '2017-10-13 09:26:49', '2017-10-13 09:26:49'),
(3, 'Sản phẩm 3', 'Sản phẩm 3', '<p>Sản phẩm 3</p>', '', '1507912053.jpg', 30000, 3, '', 1, '2017-10-13 09:27:33', '2017-10-13 09:27:33'),
(4, 'Sản phẩm 4', 'Sản phẩm 4', '<p>Sản phẩm 4</p>', '', '1507912082.jpg', 45000, 4, '', 1, '2017-10-13 09:28:02', '2017-10-13 09:28:02'),
(5, 'Sản phẩm 5', 'Sản phẩm 5', '<p>Sản phẩm 5</p>', '', '1507912150.jpg', 50000, 5, '', 1, '2017-10-13 09:29:10', '2017-10-13 09:29:10'),
(6, 'Sản phẩm 6', 'Sản phẩm 6', '<p>Sản phẩm 6</p>', '', '1507912176.jpg', 62000, 6, '', 1, '2017-10-13 09:29:36', '2017-10-13 09:29:36'),
(7, 'Sản phẩm 7', 'Sản phẩm 7', '<p>Sản phẩm 7</p>', '', '1507912201.jpg', 120000, 6, '', 1, '2017-10-13 09:30:01', '2017-10-13 09:30:01'),
(8, 'Sản phẩm 8', 'Sản phẩm 8', '<p>Sản phẩm 8</p>', '', '1507912229.jpg', 230000, 1, '', 1, '2017-10-13 09:30:29', '2017-10-13 09:30:29'),
(9, 'Sản phẩm 9', 'Sản phẩm 9', '<p>Sản phẩm 9</p>', '', '1507912260.jpg', 340000, 2, '', 1, '2017-10-13 09:31:00', '2017-10-13 09:31:00'),
(10, 'Sản phẩm 10', 'Sản phẩm 10', '<p>Sản phẩm 10</p>', '', '1507912307.jpg', 410000, 4, '', 1, '2017-10-13 09:31:47', '2017-10-13 09:31:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recruitments`
--

CREATE TABLE `recruitments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL COMMENT '1: admin',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `phone`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'tuan anh', 'trantuananh198610@gmail.com', '$2y$10$eJTy5S3fhU1K2fLoqP3eIex/HV9vfRyT/yxZAVuiXov3dw0k40V2O', 'day la address', '123123333', 1, 'lYZ4KEPiPBBQCPDL74yfealHTFq1xatLD0mVPPYuOwqNeAuK3GAv5jTnE6XU', '2017-10-13 09:17:50', '2017-10-13 09:17:50');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `imports`
--
ALTER TABLE `imports`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `recruitments`
--
ALTER TABLE `recruitments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `imports`
--
ALTER TABLE `imports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `majors`
--
ALTER TABLE `majors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT cho bảng `recruitments`
--
ALTER TABLE `recruitments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
