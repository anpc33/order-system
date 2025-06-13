-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th6 13, 2025 lúc 09:55 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
USE `hexigon-order-system`;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hexigon-order-system`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('he_thong_quan_ly_don_hang_cache_356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1748335679),
('he_thong_quan_ly_don_hang_cache_356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1748335679;', 1748335679),
('he_thong_quan_ly_don_hang_cache_admin@gmail.com|127.0.0.1', 'i:3;', 1749692336),
('he_thong_quan_ly_don_hang_cache_admin@gmail.com|127.0.0.1:timer', 'i:1749692336;', 1749692336),
('he_thong_quan_ly_don_hang_cache_customer@example.com|127.0.0.1', 'i:1;', 1749692381),
('he_thong_quan_ly_don_hang_cache_customer@example.com|127.0.0.1:timer', 'i:1749692381;', 1749692381),
('he_thong_quan_ly_don_hang_cache_staff@example.com|127.0.0.1', 'i:1;', 1749692390),
('he_thong_quan_ly_don_hang_cache_staff@example.com|127.0.0.1:timer', 'i:1749692390;', 1749692390);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Điện thoại', 'dien-thoai', 'Các loại điện thoại di động và phụ kiện', 1, '2025-05-26 08:44:43', '2025-05-26 08:44:43'),
(2, 'Laptop', 'laptop', 'Máy tính xách tay và phụ kiện', 1, '2025-05-26 08:44:43', '2025-05-26 08:44:43'),
(3, 'Máy tính bảng', 'may-tinh-bang', 'Các loại máy tính bảng và phụ kiện', 1, '2025-05-26 08:44:43', '2025-05-26 08:44:43'),
(4, 'Phụ kiện', 'phu-kien', 'Phụ kiện điện thoại, laptop và máy tính bảng', 1, '2025-05-26 08:44:43', '2025-05-26 08:44:43'),
(5, 'Đồng hồ thông minh', 'dong-ho-thong-minh', 'Đồng hồ thông minh và phụ kiện', 1, '2025-05-26 08:44:43', '2025-05-26 08:44:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_03_21_create_categories_table', 1),
(5, '2025_05_26_093521_create_products_table', 1),
(6, '2025_05_26_093533_create_orders_table', 1),
(7, '2025_05_26_093545_create_order_items_table', 1),
(8, '2025_05_26_093558_create_roles_table', 1),
(9, '2025_05_26_093610_add_role_id_to_users_table', 1),
(10, '2025_05_27_052255_add_payment_method_to_orders_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `payment_method` enum('cod','banking') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cod',
  `total_price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `status` enum('pending','confirmed','shipped','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `code`, `receiver_name`, `phone`, `address`, `note`, `payment_method`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'ORD-LVPQXKL8', 'sdgsvdfb', '0987654365', 'zsdfvjvthuscxvyrvcxsn cdsytytdsvbv ', 'bgddsb', 'cod', 112970000.00, 'cancelled', '2025-05-26 22:24:22', '2025-05-26 23:12:48'),
(2, 1, 'ORD-B47TLBRP', 'dsvdsvdsv', '9098796343', 'vsdvdsvssdvgbfdfbdbdfbdfdbs', 'bfddbf', 'cod', 64980000.00, 'confirmed', '2025-05-26 22:25:46', '2025-05-26 23:34:17'),
(3, 1, 'ORD-30MR4XDU', 'Cao Quoc An ', '0878567777', 'Ha noi viet nam number 1', '', 'cod', 6990000.00, 'pending', '2025-05-26 22:43:48', '2025-05-26 23:19:16'),
(5, 2, 'ORD-VTFNR4GD', 'Cao Quốc An', '0943675223', 'Ha noi viet nam number 1', '', 'cod', 137960000.00, 'cancelled', '2025-05-27 00:05:07', '2025-05-27 01:52:02'),
(6, 2, 'ORD-MN02BHV0', 'Normal User', '0912345678', '18 Phan Bội Châu; 25T2 Hoàng Đạo Thuý; B2-R6-33 Vincom Royal City, Hanoi, Vietnam', '', 'cod', 172950000.00, 'confirmed', '2025-05-27 00:38:15', '2025-05-27 00:39:11'),
(7, 2, 'ORD-ZWKXDI5X', 'Normal User', '0912345678', '18 Phan Bội Châu; 25T2 Hoàng Đạo Thuý; B2-R6-33 Vincom Royal City, Hanoi, Vietnam', '', 'cod', 147950000.00, 'confirmed', '2025-05-27 01:23:07', '2025-05-27 01:23:42'),
(8, 2, 'ORD-WO2QUCCR', 'Normal User', '0912345678', '18 Phan Bội Châu; 25T2 Hoàng Đạo Thuý; B2-R6-33 Vincom Royal City, Hanoi, Vietnam', '', 'cod', 162940000.00, 'completed', '2025-05-27 01:50:17', '2025-06-01 23:07:00'),
(9, 2, 'ORD-TORCH7RH', 'Normal User', '0912345678', '18 Phan Bội Châu; 25T2 Hoàng Đạo Thuý; B2-R6-33 Vincom Royal City, Hanoi, Vietnam', '', 'cod', 186183214.00, 'confirmed', '2025-06-11 18:40:57', '2025-06-11 18:42:22'),
(10, 2, 'ORD-6LD3X2CO', 'Normal User', '0912345678', '18 Phan Bội Châu; 25T2 Hoàng Đạo Thuý; B2-R6-33 Vincom Royal City, Hanoi, Vietnam', '', 'cod', 100960000.00, 'confirmed', '2025-06-11 19:12:18', '2025-06-11 19:13:05'),
(11, 2, 'ORD-MA1NQPKU', 'Normal User', '0912345678', '18 Phan Bội Châu; 25T2 Hoàng Đạo Thuý; B2-R6-33 Vincom Royal City, Hanoi, Vietnam', '', 'cod', 90240000.00, 'cancelled', '2025-06-11 19:14:01', '2025-06-11 19:14:10'),
(12, 2, 'ORD-9HMKDV94', 'Normal User', '0912345678', '18 Phan Bội Châu; 25T2 Hoàng Đạo Thuý; B2-R6-33 Vincom Royal City, Hanoi, Vietnam', '', 'cod', 315423214.00, 'confirmed', '2025-06-12 20:26:35', '2025-06-12 20:29:44'),
(13, 2, 'ORD-A7JPJWDI', 'Normal User', '0912345678', '18 Phan Bội Châu; 25T2 Hoàng Đạo Thuý; B2-R6-33 Vincom Royal City, Hanoi, Vietnam', '', 'cod', 226163214.00, 'confirmed', '2025-06-12 20:31:38', '2025-06-12 20:31:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `quantity` int UNSIGNED NOT NULL,
  `total` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_name`, `price`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'iPhone 15 Pro Max', 32990000.00, 1, 32990000.00, '2025-05-26 22:24:22', '2025-05-26 22:24:22'),
(2, 1, 2, 'Samsung Galaxy S24 Ultra', 31990000.00, 1, 31990000.00, '2025-05-26 22:24:22', '2025-05-26 22:24:22'),
(3, 1, 3, 'MacBook Pro M3 Pro', 47990000.00, 1, 47990000.00, '2025-05-26 22:24:22', '2025-05-26 22:24:22'),
(4, 2, 1, 'iPhone 15 Pro Max', 32990000.00, 1, 32990000.00, '2025-05-26 22:25:46', '2025-05-26 22:25:46'),
(5, 2, 2, 'Samsung Galaxy S24 Ultra', 31990000.00, 1, 31990000.00, '2025-05-26 22:25:46', '2025-05-26 22:25:46'),
(6, 3, 7, 'AirPods Pro 2', 6990000.00, 1, 6990000.00, '2025-05-26 22:43:48', '2025-05-26 22:43:48'),
(8, 5, 1, 'iPhone 15 Pro Max', 32990000.00, 1, 32990000.00, '2025-05-27 00:05:08', '2025-05-27 00:05:08'),
(9, 5, 3, 'MacBook Pro M3 Pro', 47990000.00, 2, 95980000.00, '2025-05-27 00:05:08', '2025-05-27 00:05:08'),
(10, 5, 9, 'Apple Watch Series 9', 8990000.00, 1, 8990000.00, '2025-05-27 00:05:08', '2025-05-27 00:05:08'),
(11, 6, 1, 'iPhone 15 Pro Max', 32990000.00, 1, 32990000.00, '2025-05-27 00:38:15', '2025-05-27 00:38:15'),
(12, 6, 2, 'Samsung Galaxy S24 Ultra', 31990000.00, 2, 63980000.00, '2025-05-27 00:38:15', '2025-05-27 00:38:15'),
(13, 6, 3, 'MacBook Pro M3 Pro', 47990000.00, 1, 47990000.00, '2025-05-27 00:38:15', '2025-05-27 00:38:15'),
(14, 6, 5, 'iPad Pro M2', 27990000.00, 1, 27990000.00, '2025-05-27 00:38:15', '2025-05-27 00:38:15'),
(15, 7, 1, 'iPhone 15 Pro Max', 32990000.00, 1, 32990000.00, '2025-05-27 01:23:07', '2025-05-27 01:23:07'),
(16, 7, 2, 'Samsung Galaxy S24 Ultra', 31990000.00, 1, 31990000.00, '2025-05-27 01:23:07', '2025-05-27 01:23:07'),
(17, 7, 3, 'MacBook Pro M3 Pro', 47990000.00, 1, 47990000.00, '2025-05-27 01:23:07', '2025-05-27 01:23:07'),
(18, 7, 5, 'iPad Pro M2', 27990000.00, 1, 27990000.00, '2025-05-27 01:23:07', '2025-05-27 01:23:07'),
(19, 7, 7, 'AirPods Pro 2', 6990000.00, 1, 6990000.00, '2025-05-27 01:23:07', '2025-05-27 01:23:07'),
(20, 8, 1, 'iPhone 15 Pro Max', 32990000.00, 2, 65980000.00, '2025-05-27 01:50:17', '2025-05-27 01:50:17'),
(21, 8, 2, 'Samsung Galaxy S24 Ultra', 31990000.00, 1, 31990000.00, '2025-05-27 01:50:17', '2025-05-27 01:50:17'),
(22, 8, 3, 'MacBook Pro M3 Pro', 47990000.00, 1, 47990000.00, '2025-05-27 01:50:17', '2025-05-27 01:50:17'),
(23, 8, 9, 'Apple Watch Series 9', 8990000.00, 1, 8990000.00, '2025-05-27 01:50:17', '2025-05-27 01:50:17'),
(24, 8, 10, 'Samsung Galaxy Watch 6 Pro', 7990000.00, 1, 7990000.00, '2025-05-27 01:50:17', '2025-05-27 01:50:17'),
(25, 9, 5, 'iPad Pro M2', 27990000.00, 1, 27990000.00, '2025-06-11 18:40:57', '2025-06-11 18:40:57'),
(26, 9, 6, 'Samsung Galaxy Tab S9 Ultra', 25990000.00, 1, 25990000.00, '2025-06-11 18:40:57', '2025-06-11 18:40:57'),
(27, 9, 9, 'Apple Watch Series 9', 8990000.00, 1, 8990000.00, '2025-06-11 18:40:57', '2025-06-11 18:40:57'),
(28, 9, 14, 'IPhone 14', 123213214.00, 1, 123213214.00, '2025-06-11 18:40:57', '2025-06-11 18:40:57'),
(29, 10, 1, 'iPhone 15 Pro Max', 32990000.00, 1, 32990000.00, '2025-06-11 19:12:18', '2025-06-11 19:12:18'),
(30, 10, 2, 'Samsung Galaxy S24 Ultra', 31990000.00, 1, 31990000.00, '2025-06-11 19:12:18', '2025-06-11 19:12:18'),
(31, 10, 5, 'iPad Pro M2', 27990000.00, 1, 27990000.00, '2025-06-11 19:12:18', '2025-06-11 19:12:18'),
(32, 10, 10, 'Samsung Galaxy Watch 6 Pro', 7990000.00, 1, 7990000.00, '2025-06-11 19:12:18', '2025-06-11 19:12:18'),
(33, 11, 1, 'iPhone 15 Pro Max', 32990000.00, 1, 32990000.00, '2025-06-11 19:14:01', '2025-06-11 19:14:01'),
(34, 11, 2, 'Samsung Galaxy S24 Ultra', 31990000.00, 1, 31990000.00, '2025-06-11 19:14:01', '2025-06-11 19:14:01'),
(35, 11, 7, 'AirPods Pro 2', 6990000.00, 1, 6990000.00, '2025-06-11 19:14:01', '2025-06-11 19:14:01'),
(36, 11, 8, 'Samsung 45W Super Fast Charging', 1290000.00, 1, 1290000.00, '2025-06-11 19:14:01', '2025-06-11 19:14:01'),
(37, 11, 9, 'Apple Watch Series 9', 8990000.00, 1, 8990000.00, '2025-06-11 19:14:01', '2025-06-11 19:14:01'),
(38, 11, 10, 'Samsung Galaxy Watch 6 Pro', 7990000.00, 1, 7990000.00, '2025-06-11 19:14:01', '2025-06-11 19:14:01'),
(39, 12, 1, 'iPhone 15 Pro Max', 32990000.00, 1, 32990000.00, '2025-06-12 20:26:35', '2025-06-12 20:26:35'),
(40, 12, 2, 'Samsung Galaxy S24 Ultra', 31990000.00, 1, 31990000.00, '2025-06-12 20:26:35', '2025-06-12 20:26:35'),
(41, 12, 3, 'MacBook Pro M3 Pro', 47990000.00, 1, 47990000.00, '2025-06-12 20:26:35', '2025-06-12 20:26:35'),
(42, 12, 5, 'iPad Pro M2', 27990000.00, 1, 27990000.00, '2025-06-12 20:26:35', '2025-06-12 20:26:35'),
(43, 12, 6, 'Samsung Galaxy Tab S9 Ultra', 25990000.00, 1, 25990000.00, '2025-06-12 20:26:35', '2025-06-12 20:26:35'),
(44, 12, 7, 'AirPods Pro 2', 6990000.00, 1, 6990000.00, '2025-06-12 20:26:35', '2025-06-12 20:26:35'),
(45, 12, 8, 'Samsung 45W Super Fast Charging', 1290000.00, 1, 1290000.00, '2025-06-12 20:26:35', '2025-06-12 20:26:35'),
(46, 12, 9, 'Apple Watch Series 9', 8990000.00, 1, 8990000.00, '2025-06-12 20:26:35', '2025-06-12 20:26:35'),
(47, 12, 10, 'Samsung Galaxy Watch 6 Pro', 7990000.00, 1, 7990000.00, '2025-06-12 20:26:35', '2025-06-12 20:26:35'),
(48, 12, 14, 'IPhone 14', 123213214.00, 1, 123213214.00, '2025-06-12 20:26:35', '2025-06-12 20:26:35'),
(49, 13, 2, 'Samsung Galaxy S24 Ultra', 31990000.00, 1, 31990000.00, '2025-06-12 20:31:38', '2025-06-12 20:31:38'),
(50, 13, 5, 'iPad Pro M2', 27990000.00, 1, 27990000.00, '2025-06-12 20:31:38', '2025-06-12 20:31:38'),
(51, 13, 6, 'Samsung Galaxy Tab S9 Ultra', 25990000.00, 1, 25990000.00, '2025-06-12 20:31:38', '2025-06-12 20:31:38'),
(52, 13, 9, 'Apple Watch Series 9', 8990000.00, 1, 8990000.00, '2025-06-12 20:31:38', '2025-06-12 20:31:38'),
(53, 13, 10, 'Samsung Galaxy Watch 6 Pro', 7990000.00, 1, 7990000.00, '2025-06-12 20:31:38', '2025-06-12 20:31:38'),
(54, 13, 14, 'IPhone 14', 123213214.00, 1, 123213214.00, '2025-06-12 20:31:38', '2025-06-12 20:31:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `original_price` decimal(12,2) DEFAULT NULL,
  `price` decimal(12,2) NOT NULL,
  `stock` int UNSIGNED NOT NULL DEFAULT '0',
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `description`, `original_price`, `price`, `stock`, `thumbnail`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'iPhone 15 Pro Max', 'iphone-15-pro-max', 'iPhone 15 Pro Max với chip A17 Pro, camera 48MP, màn hình 6.7 inch Super Retina XDR.', 34990000.00, 32990000.00, 40, 'products/VgH61tKB7jjPIAgh6IaTxOj2uThmFRPHwRLYY1Gg.jpg', 'active', '2025-05-26 08:44:43', '2025-06-12 20:26:35'),
(2, 1, 'Samsung Galaxy S24 Ultra', 'samsung-galaxy-s24-ultra', 'Samsung Galaxy S24 Ultra với chip Snapdragon 8 Gen 3, camera 200MP, màn hình 6.8 inch Dynamic AMOLED 2X.', 33990000.00, 31990000.00, 35, 'products/DSBmIsDzxiLT6W3TyFSAijqNJnohu6zgbnhioezG.webp', 'active', '2025-05-26 08:44:43', '2025-06-12 20:31:38'),
(3, 2, 'MacBook Pro M3 Pro', 'macbook-pro-m3-pro', 'MacBook Pro với chip M3 Pro, màn hình 14 inch Liquid Retina XDR, RAM 18GB, SSD 512GB.', 49990000.00, 47990000.00, 23, 'products/yuzofLv6bSCW7mzCmIh21fWXABOLteav5FQp8pla.png', 'active', '2025-05-26 08:44:43', '2025-06-12 20:26:35'),
(4, 2, 'Dell XPS 15', 'dell-xps-15', 'Dell XPS 15 với CPU Intel Core i9, GPU RTX 4070, màn hình 15.6 inch OLED 4K.', 45990000.00, 43990000.00, 0, 'products/293Au53CWSXTW1wB255KVcoQIacNEZeTsGlyf3JV.webp', 'active', '2025-05-26 08:44:43', '2025-05-26 22:45:15'),
(5, 3, 'iPad Pro M2', 'ipad-pro-m2', 'iPad Pro với chip M2, màn hình 12.9 inch Liquid Retina XDR, hỗ trợ Apple Pencil 2.', 29990000.00, 27990000.00, 34, 'products/44Gs9wNVxkzGz9cK398HIsJa554rNfx15pojF869.jpg', 'active', '2025-05-26 08:44:43', '2025-06-12 20:31:38'),
(6, 3, 'Samsung Galaxy Tab S9 Ultra', 'samsung-galaxy-tab-s9-ultra', 'Samsung Galaxy Tab S9 Ultra với chip Snapdragon 8 Gen 2, màn hình 14.6 inch Super AMOLED.', 27990000.00, 25990000.00, 32, 'products/IrROZ2fmVEwUkX1yYvJi4XgWigdVT3aHNe7Iszw3.webp', 'active', '2025-05-26 08:44:44', '2025-06-12 20:31:38'),
(7, 4, 'AirPods Pro 2', 'airpods-pro-2', 'AirPods Pro 2 với chip H2, chống ồn chủ động, chống nước IPX4.', 7990000.00, 6990000.00, 96, 'products/tnBCRYVGEBveGOKRFjCQyJith1jeM6lnnQzkGC3K.webp', 'active', '2025-05-26 08:44:44', '2025-06-12 20:26:35'),
(8, 4, 'Samsung 45W Super Fast Charging', 'samsung-45w-super-fast-charging', 'Củ sạc nhanh Samsung 45W với công nghệ Super Fast Charging 2.0.', 1490000.00, 1290000.00, 78, 'products/SVt4TJI1FQBbZIi9hVWgK1eXeWzFO3LQgavMOVmM.jpg', 'active', '2025-05-26 08:44:44', '2025-06-12 20:26:35'),
(9, 5, 'Apple Watch Series 9', 'apple-watch-series-9', 'Apple Watch Series 9 với chip S9, màn hình Always-On Retina, đo nhịp tim và SpO2.', 9990000.00, 8990000.00, 54, 'products/qjvQiBHhOMPRLSbkSmhtHXSX79haL3iuzC90dXZM.png', 'active', '2025-05-26 08:44:44', '2025-06-12 20:31:38'),
(10, 5, 'Samsung Galaxy Watch 6 Pro', 'samsung-galaxy-watch-6-pro', 'Samsung Galaxy Watch 6 Pro với Wear OS, màn hình 1.4 inch Super AMOLED, đo nhịp tim và huyết áp.', 8990000.00, 7990000.00, 50, 'products/qzpRzH9PCT5AfpXZ6Odj3r8zo5MBXB19qpoBAClb.png', 'active', '2025-05-26 08:44:44', '2025-06-12 20:31:38'),
(14, 1, 'IPhone 14', 'iphone-14', 'IPhone 14', 123213214.00, 123213214.00, 30, 'products/OOtqOPyKdNiaMq20sbGfuxUHI9NsFwStnhUvpb24.jpg', 'active', '2025-05-27 01:47:07', '2025-06-12 20:31:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Gtv341DB4KMp9AhnOZYUJISflNGWOl6vhasmcU5X', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSTIyNURWV2FpOWk1ZU43RlRKRnB4Um1FY0FzMHFDWkQzWFdycm92YyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9vcmRlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1749786584),
('tLmeF0uz5OFYsl7O2m6iS8bucpZoR7gEbX7Qy9OL', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTXBjZXZyeXlWY3ZkcUtQSUtYb2JpZlJDRVI3ZDVuTWRqQ2RpV3NVSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9vcmRlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1749785529);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`, `address`, `role_id`) VALUES
(1, 'Admin User', 'admin@example.com', NULL, '$2y$12$T6Rr4AadJqJDaFR39kIfhuhgKt.sPRIylM5L8n.odgTwxDDl0ZV2O', NULL, '2025-05-26 08:45:31', '2025-05-26 08:45:31', '0987654321', '25 Ngũ Xã, Ba Đình - Hà Nội', 1),
(2, 'Normal User', 'user@example.com', NULL, '$2y$12$odkpKPyweJyXmB76EmpBlOwmGFK8fNm6XH5UuL9VEBcOVYK8yf4ba', NULL, '2025-05-26 08:45:31', '2025-05-26 08:45:31', '0912345678', '18 Phan Bội Châu; 25T2 Hoàng Đạo Thuý; B2-R6-33 Vincom Royal City, Hanoi, Vietnam', 2),
(4, 'Cao Quốc An 1', 'caoquocan@gmail.com', NULL, '$2y$12$/VA6eJqGlsDdROaxjIHc6ecYta0BxWk2E71tw9eLlVQ.PQADG4d/u', NULL, '2025-05-27 01:41:25', '2025-05-27 01:41:49', '038112212112', 'An', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_code_unique` (`code`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
