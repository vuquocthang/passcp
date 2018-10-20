-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 23, 2018 lúc 01:38 PM
-- Phiên bản máy phục vụ: 10.1.25-MariaDB
-- Phiên bản PHP: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `theo-doi-tien-do`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'root', '$2a$06$1RgMkA3IWp.S.P6QCXs9HunQQAJ5jKS6HMyRQYnBiQ3vqePKNGz3i', 'KcTsb54Ye8BMAyJH7kS3NsbOxbV2JufDjQuZ09XbabVSfz2UT1JoPoFMHuaF', NULL, '2018-03-17 09:47:30'),
(4, 'root11', '$2y$10$oG7zgRlKvKMBY2FwJvxJH.qs2vPIW7haD0y2k2PgNffB7gjFPWvpq', NULL, '2017-09-13 12:51:15', '2017-09-13 12:51:15'),
(5, 'thao123', '$2y$10$77r/e5PtXG2F3XDaKbSdT.o2jJvdSuB/t51iegjf8S4idMsviCtxm', NULL, '2017-09-16 04:29:00', '2017-09-16 04:29:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `docs`
--

CREATE TABLE `docs` (
  `id` int(11) NOT NULL,
  `link` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tien_do_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `docs`
--

INSERT INTO `docs` (`id`, `link`, `tien_do_id`, `created_at`) VALUES
(1, '15216300750.jpg', 8, NULL),
(2, '15216300751.jpg', 8, NULL),
(3, '15216300752.jpg', 8, NULL),
(4, '15216301530.jpg', 9, NULL),
(5, '15216301531.png', 9, NULL),
(6, '15216301532.png', 9, NULL),
(7, '15216301533.docx', 9, NULL),
(8, '15216301534.docx', 9, NULL),
(9, '15216313550.docx', 10, NULL),
(10, '15216313551.docx', 10, NULL);

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
(3, '2017_08_28_155658_create_the_loai_table', 1),
(4, '2017_08_29_222819_create_truyen_table', 1),
(5, '2017_08_30_163947_create_chuong_table', 1),
(6, '2017_08_30_171317_create_admin_table', 1),
(7, '2017_09_04_021611_create_add_status_to_the_loai', 2),
(8, '2017_09_04_021612_create_add_status_to_the_loai', 3),
(9, '2017_09_04_024817_create_add_status_to_truyen', 4),
(10, '2017_09_04_024904_create_add_status_to_chuong', 5),
(11, '2017_09_04_024818_create_add_status_to_truyen', 6),
(12, '2017_09_05_071856_create_table_add_view_to_truyen', 7),
(13, '2017_09_05_195646_add_slug_to_the_loai', 8),
(14, '2017_09_05_195716_add_slug_to_truyen', 8),
(15, '2017_09_05_195726_add_slug_to_chuong', 8),
(16, '2017_09_06_064623_create_ads_table', 9),
(17, '2017_09_07_171101_create_slide_table', 10),
(18, '2017_09_13_060549_create_top-read_table', 11),
(21, '2017_09_13_074339_create_the_loai_truyen_table', 12),
(22, '2017_09_18_231855_create_top_view_table', 12),
(23, '2017_09_20_141402_create_full_table', 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `note_docs`
--

CREATE TABLE `note_docs` (
  `id` int(11) NOT NULL,
  `link` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tien_do_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Cấu trúc bảng cho bảng `tien_do`
--

CREATE TABLE `tien_do` (
  `id` int(11) NOT NULL,
  `moc_tg` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `perform_date` date DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `w_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `fn_time` time DEFAULT NULL,
  `is_loop` int(11) DEFAULT '0',
  `chu_tri` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thanh_phan` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pl_title` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pl_content` text COLLATE utf8_unicode_ci,
  `doc` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tien_do`
--

INSERT INTO `tien_do` (`id`, `moc_tg`, `perform_date`, `content`, `w_date`, `start_time`, `fn_time`, `is_loop`, `chu_tri`, `thanh_phan`, `pl_title`, `pl_content`, `doc`, `note`, `created_at`, `updated_at`) VALUES
(9, '7', '2018-03-22', 'updating', NULL, NULL, NULL, 0, 'updating', 'updating', 'updating', 'updating', NULL, 'updating', '2018-03-21 11:02:33', '2018-03-21 11:02:33'),
(10, '8', '2018-03-22', 'updating', NULL, NULL, NULL, 0, 'updating', 'updating', 'Quy định pháp luật', 'Quy định pháp luật', NULL, 'Ghi chú', '2018-03-21 11:22:35', '2018-03-21 11:22:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `note_docs`
--
ALTER TABLE `note_docs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Chỉ mục cho bảng `tien_do`
--
ALTER TABLE `tien_do`
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
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `docs`
--
ALTER TABLE `docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT cho bảng `note_docs`
--
ALTER TABLE `note_docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tien_do`
--
ALTER TABLE `tien_do`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
