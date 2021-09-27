-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 27, 2021 at 02:59 PM
-- Server version: 8.0.23
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'mahal@gmail.com', 'password1', '2021-04-03 14:33:18', '2021-04-03 14:33:18'),
(2, 'mahal@gmail.com', 'password1', '2021-04-03 14:33:18', '2021-04-03 14:33:18'),
(5, 'admin@gmail.com', 'password2', '2021-04-03 15:01:32', '2021-04-03 15:01:32'),
(6, 'admin@gmail.com', 'password2', '2021-04-03 15:01:32', '2021-04-03 15:01:32');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_home` int NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `is_home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Raymond', '1618120683.png', 1, 1, '2021-04-10 23:13:34', '2021-04-15 10:15:32'),
(2, 'kookaburra', '1618124420.png', 0, 1, '2021-04-11 01:00:20', '2021-04-11 01:00:20'),
(3, 'Mercedes Benz', '1618676499.png', 1, 1, '2021-04-17 10:21:40', '2021-04-17 10:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `user_type` enum('Reg','Non-Reg') NOT NULL,
  `qty` int NOT NULL,
  `product_id` int NOT NULL,
  `product_attr_id` int NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `user_type`, `qty`, `product_id`, `product_attr_id`, `added_on`) VALUES
(9, 17, 'Reg', 1, 10, 11, '2021-05-26 05:38:57'),
(10, 17, 'Reg', 1, 7, 9, '2021-05-26 05:39:02');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_category_id` int NOT NULL,
  `category_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_home` int NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `parent_category_id`, `category_image`, `is_home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Man', 'man', 0, '1618724916.webp', 1, 1, '2021-04-03 13:11:32', '2021-04-17 23:48:36'),
(2, 'Kids', 'kids', 0, '', 0, 1, '2021-04-03 13:12:15', '2021-04-03 13:12:15'),
(3, 'Sports', 'sports', 0, '1618588193.jpg', 1, 1, '2021-04-03 13:12:30', '2021-04-16 09:49:53'),
(4, 'Animal', 'animal', 2, '1618296055.webp', 0, 1, '2021-04-13 00:40:55', '2021-04-13 00:40:55'),
(5, 'Car', 'car', 0, '1618586392.jpg', 1, 1, '2021-04-15 09:52:01', '2021-04-16 09:19:52'),
(6, 'Shirt', 'shirt', 1, '1620114462.webp', 1, 1, '2021-05-04 01:47:42', '2021-05-04 01:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Red', 1, '2021-04-03 10:10:28', '2021-04-03 10:10:34'),
(2, 'Blue', 1, '2021-05-08 02:40:04', '2021-05-08 02:40:04'),
(3, 'Black', 1, '2021-05-08 02:40:13', '2021-05-08 02:40:13'),
(4, 'Green', 1, '2021-05-08 02:40:30', '2021-05-08 02:40:30'),
(5, 'Purple', 1, '2021-05-08 02:40:37', '2021-05-08 02:40:37'),
(6, 'Yellow', 1, '2021-05-08 02:40:44', '2021-05-08 02:40:44'),
(7, 'Pink', 1, '2021-05-08 02:42:29', '2021-05-08 02:42:29'),
(8, 'Orange', 1, '2021-05-08 02:42:36', '2021-05-08 02:42:36'),
(9, 'Gray', 1, '2021-05-08 02:43:08', '2021-05-08 02:43:08'),
(10, 'White', 1, '2021-05-08 02:43:19', '2021-05-08 02:43:19');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Value','Per') COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_order_amt` int NOT NULL,
  `is_one_time` int NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `title`, `code`, `value`, `type`, `min_order_amt`, `is_one_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 'April2021', 'Apr04140421', '150', 'Value', 0, 0, 0, '2021-04-03 10:08:02', '2021-04-03 10:08:02'),
(2, 'Apr142021', 'apr1428', '16', 'Per', 150, 0, 1, '2021-04-12 09:38:34', '2021-05-22 00:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gstin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL,
  `is_verify` int NOT NULL,
  `is_forgot_password` int NOT NULL,
  `rand_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `mobile`, `password`, `address`, `city`, `state`, `zip`, `company`, `gstin`, `status`, `is_verify`, `is_forgot_password`, `rand_id`, `created_at`, `updated_at`) VALUES
(1, 'Toriqul Mahal', 'mahal6359@gmail.com', '1234567890', 'password1', 'South Paikpara', 'Mirpur', 'Dhaka', '1216', 'My Company Name', 'ABCEGGST', 1, 0, 0, '', '2021-04-15 14:25:16', '2021-04-15 08:34:38'),
(2, 'Toriqul Mahal', 'mahal6359@gmail.com', '1234567890', 'password1', 'South Paikpara', 'Mirpur', 'Dhaka', '1216', 'My Company Name', 'ABCEGGST', 1, 0, 0, '', '2021-04-15 14:25:16', '2021-04-15 14:25:16'),
(17, 'Mahal', 'toriqulmahal6359@yahoo.com', '0123456789', 'eyJpdiI6InBsaDNyT1R6MnVBVTFJakJGaDA3VHc9PSIsInZhbHVlIjoiVjI4MDZvZjdYbTVoTnFhZE55WTZ6Zz09IiwibWFjIjoiMDgxN2YxZDAwNjlkMGNjOWJiMWM3ZTgyOTA1OTc1MjQ0ZGNkNWUwYzcyMjZmNWU4MTBhNGU5MWI3NmU3NzU1NCJ9', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, '', '2021-05-12 22:21:26', '2021-05-12 22:21:26');

-- --------------------------------------------------------

--
-- Table structure for table `home_banners`
--

CREATE TABLE `home_banners` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_txt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_banners`
--

INSERT INTO `home_banners` (`id`, `image`, `btn_txt`, `btn_link`, `status`, `created_at`, `updated_at`) VALUES
(1, '1618758789.jpg', 'Shop Now', 'http://amazon.com', 1, '2021-04-18 09:13:09', '2021-04-18 09:13:09'),
(2, '1618759736.jpg', NULL, NULL, 1, '2021-04-18 09:25:08', '2021-04-18 09:28:56'),
(3, '1618759760.webp', NULL, NULL, 1, '2021-04-18 09:25:34', '2021-04-18 09:29:20');

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
(1, '2021_04_03_141800_create_products_table', 1),
(2, '2021_03_30_053421_create_admins_table', 2),
(3, '2021_03_31_060852_create_categories_table', 2),
(4, '2021_04_02_143752_create_coupons_table', 2),
(5, '2021_04_02_195849_create_sizes_table', 2),
(6, '2021_04_03_050106_create_colors_table', 2),
(7, '2021_04_10_161247_create_brands_table', 3),
(8, '2021_04_13_082213_create_taxes_table', 4),
(9, '2021_04_15_053200_create_customers_table', 5),
(10, '2021_04_18_140055_create_home_banners_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `customers_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` varchar(25) NOT NULL,
  `coupon_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `coupon_value` int DEFAULT NULL,
  `order_status` int NOT NULL,
  `payment_type` enum('COD','Gateway') NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `payment_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `total_amt` int NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customers_id`, `name`, `email`, `mobile`, `address`, `city`, `state`, `pincode`, `coupon_code`, `coupon_value`, `order_status`, `payment_type`, `payment_status`, `payment_id`, `total_amt`, `added_on`) VALUES
(1, 17, 'Mahal', 'toriqulmahal6359@yahoo.com', '0123456789', 'A', 'B', 'C', '1', NULL, 0, 1, 'COD', 'Pending', NULL, 1150, '2021-05-24 03:20:13'),
(2, 17, 'Mahal', 'toriqulmahal6359@yahoo.com', '0123456789', 'A', 'B', 'C', '1', NULL, 0, 1, 'COD', 'Pending', NULL, 1150, '2021-05-24 03:35:35'),
(3, 17, 'Mahal', 'toriqulmahal6359@yahoo.com', '0123456789', 'A', 'B', 'C', '1', 'apr1428', 80, 1, 'COD', 'Pending', NULL, 500, '2021-05-26 05:37:48'),
(4, 17, 'Mahal', 'toriqulmahal6359@yahoo.com', '0123456789', 'A', 'B', 'C', '1', 'apr1428', 128, 1, 'COD', 'Pending', NULL, 800, '2021-05-26 05:48:37');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `orders_id` int NOT NULL,
  `product_id` int NOT NULL,
  `products_attr_id` int NOT NULL,
  `price` int NOT NULL,
  `qty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `orders_id`, `product_id`, `products_attr_id`, `price`, `qty`) VALUES
(1, 1, 10, 11, 450, 2),
(2, 1, 2, 2, 250, 1),
(3, 2, 10, 11, 450, 2),
(4, 2, 2, 2, 250, 1),
(5, 3, 5, 7, 250, 1),
(6, 3, 6, 8, 250, 1),
(7, 4, 10, 11, 450, 1),
(8, 4, 7, 9, 350, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int NOT NULL,
  `order_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `order_status`) VALUES
(1, 'Placed'),
(2, 'On The Way'),
(3, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `technical_specification` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `uses` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `warranty` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `lead_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_id` int DEFAULT NULL,
  `is_promo` int NOT NULL,
  `is_featured` int NOT NULL,
  `is_discounted` int NOT NULL,
  `is_tranding` int NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `category_id`, `name`, `slug`, `brand`, `model`, `short_desc`, `desc`, `keywords`, `technical_specification`, `uses`, `warranty`, `lead_time`, `tax_id`, `is_promo`, `is_featured`, `is_discounted`, `is_tranding`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Cotton Shirt', '1', 'Raymond', 'Black', 'This is the Black Shirt', 'Idiot , I can see this is a black shirt, you fool', 'Black, shirt, raymond, collection', 'Null', 'Common, Formal', 'No warranty', '', NULL, 0, 0, 0, 0, 1, '2021-04-04 10:22:31', '2021-04-04 10:22:31'),
(2, '1617606357.jpg', 3, 'Kookabura Cricket bat solid', '2', 'Kookabura', 'White wooden solid', 'Hey Kid, This is a Bat', 'Wanna Play This ??', 'cricket, sports, bat', 'null', 'null', 'no warranty', '', NULL, 0, 0, 0, 0, 1, '2021-04-05 01:05:58', '2021-04-05 01:05:58'),
(3, '1617766330.webp', 2, 'SHIRT BH569', '3', 'century', 'BH51356', 'Hey, Kid, This is the white shirt', 'Hey, Fool, I see That is a black century shirt', 'shirt, red, white, 38', 'null', 'no uses', 'no warranty', '', NULL, 0, 0, 0, 0, 1, '2021-04-06 21:32:10', '2021-04-06 21:32:10'),
(4, '1618067422.webp', 1, 'White Shirt FH569814', '4', 'century', 'FH569814', 'Hey man, This is White Shirt', 'Aye, Foool, I can see this is a white labeled shirt', 'shirt, white, XL', 'null', 'no uses', 'no warranty', '', NULL, 0, 0, 0, 0, 1, '2021-04-10 09:10:23', '2021-04-10 09:10:23'),
(5, '1618067845.webp', 1, 'White Shirt FH569814', '10', 'century', 'FH569814', 'Hey man, This is a White Shirt', 'Aye, Fooool, I see that is a white labeled shirt', 'shirt, white', 'null', 'no uses', 'no warranty', '', NULL, 0, 0, 0, 0, 1, '2021-04-10 09:17:25', '2021-04-10 09:17:25'),
(6, '1618068330.webp', 1, 'WHITE SHIRT BH569', '9', '1', 'FH569814', '<p>Hey man, I see this is a White shirt</p>', '<p>Aye, Foool, I see This is a white labeled shirt</p>', 'shirt, white', '<p>null</p>', '<p>no uses</p>', 'no warranty', NULL, 1, 0, 0, 0, 0, 1, '2021-04-10 09:25:30', '2021-04-14 08:44:08'),
(7, '1618130401.jpg', 3, 'Kookaburra', '8', '2', '9FGHYT6', 'Hey, Kid, This is a solid wooden bat', 'Aye, Foooool, I see this is a bat', 'bat, cricket', 'null', 'playing cricket', 'no warranty', '', NULL, 0, 0, 0, 0, 1, '2021-04-11 02:40:01', '2021-04-11 02:40:01'),
(8, '1618131072.webp', 1, 'WHITE SHIRT BH569', '12', '1', '85KHJUS', 'Hey, Man This is white shirt', 'Hello, man I see this', 'shirt, man, white', 'null', 'no uses', 'no warranty', '', NULL, 0, 0, 0, 0, 1, '2021-04-11 02:51:12', '2021-04-11 02:51:12'),
(9, '1618131303.webp', 2, 'WHITE SHIRT BH569', '13', '1', '9FGHYT6', 'This is a white shirt', 'I see this is a white shirt', 'shirt, white', 'null', 'no uses', 'no warranty', '', NULL, 0, 0, 0, 0, 1, '2021-04-11 02:55:03', '2021-04-11 02:55:03'),
(10, '1618131987.jpg', 3, 'Kookabura Cricket bat solid', '15', '2', 'BH51356', '<p>This is a Cricket Bat</p>', '<p>This is a solid cricket bat</p>', 'cricket, bat', '<p>null</p>', '<p>no uses</p>', 'no warranty', '2-3 days', 2, 0, 1, 1, 0, 1, '2021-04-11 03:06:27', '2021-04-26 13:07:09'),
(11, '1618676890.jpg', 5, 'Mercedes Benz G550 series 4x4 SUV', 'cars', '3', 'SUV G550', '<p>Hey man, This is a Car</p>', '<p>Aye foooooool, I see this a car</p>', 'car, mercedes, SUV', '<p>null</p>', '<p>driving</p>', 'no warranty', '2-3 days', 1, 0, 0, 0, 0, 1, '2021-04-17 10:28:10', '2021-04-17 10:28:10');

-- --------------------------------------------------------

--
-- Table structure for table `products_attr`
--

CREATE TABLE `products_attr` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `sku` varchar(255) NOT NULL,
  `attr_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `mrp` int DEFAULT NULL,
  `price` int DEFAULT NULL,
  `qty` int NOT NULL,
  `size_id` int NOT NULL,
  `color_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products_attr`
--

INSERT INTO `products_attr` (`id`, `product_id`, `sku`, `attr_image`, `mrp`, `price`, `qty`, `size_id`, `color_id`) VALUES
(1, 3, '45', '', 10, 100, 10, 1, 1),
(2, 2, '35', '134817881.jpg', 52, 250, 5, 2, 1),
(5, 3, '25', '419656842.webp', 25, 250, 10, 1, 1),
(6, 3, '65', '390476091.webp', 30, 150, 5, 1, 1),
(7, 5, '75', '652734527.webp', 25, 250, 10, 1, 1),
(8, 6, '95', '', 25, 250, 10, 1, 1),
(9, 7, '10', '247447963.jpg', 35, 350, 10, 2, 1),
(10, 8, '12', '174843712.webp', 0, 0, 10, 1, 1),
(11, 10, '110', '', 25, 450, 20, 2, 1),
(12, 10, '113', '', 45, 450, 10, 2, 1),
(13, 11, '114', '685665595.jpg', 10000, 9999, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `images` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `images`) VALUES
(1, 6, '611927994.webp'),
(4, 10, ''),
(9, 6, '484608307.webp'),
(12, 11, '546699618.jpg'),
(13, 10, ''),
(14, 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `status`, `created_at`, `updated_at`) VALUES
(1, 'XL', 1, '2021-04-05 08:55:18', '2021-04-05 08:55:18'),
(2, '38', 1, '2021-04-05 08:55:49', '2021-04-05 08:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint UNSIGNED NOT NULL,
  `tax_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `tax_desc`, `tax_value`, `status`, `created_at`, `updated_at`) VALUES
(1, 'GST 12%', '12', 1, '2021-04-13 09:58:56', '2021-04-13 10:08:48'),
(2, 'GST 16%', '16', 1, '2021-04-13 10:30:47', '2021-04-13 10:30:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_banners`
--
ALTER TABLE `home_banners`
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
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_attr`
--
ALTER TABLE `products_attr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `home_banners`
--
ALTER TABLE `home_banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products_attr`
--
ALTER TABLE `products_attr`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
