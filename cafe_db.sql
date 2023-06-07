-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 11:50 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe_db`
--
CREATE DATABASE IF NOT EXISTS `cafe_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cafe_db`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adm_id` int(11) NOT NULL,
  `adm_name` varchar(255) NOT NULL,
  `adm_ph` varchar(255) NOT NULL,
  `adm_em` varchar(255) NOT NULL,
  `adm_pw` varchar(16) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adm_id`, `adm_name`, `adm_ph`, `adm_em`, `adm_pw`, `create_at`, `update_at`) VALUES
(1, 'Mary Win', '091122334455', 'maryWin12@gmail.com', 'MaryWin12', '2023-05-23 09:37:34', '2023-05-23 09:37:34'),
(2, 'Kellly Thuzar', '0928823773456', 'kellyThuzar98@gmail.com', 'KellyThuzar98', '2023-05-23 09:37:34', '2023-05-23 09:37:34'),
(3, 'Terry Kyaw', '0979889765432', 'terryKyaw43@gamil.com', 'TerryKyaw43', '2023-05-23 09:37:34', '2023-05-23 09:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(30) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `create_at`, `update_at`) VALUES
(1, 'Espresso', '2023-05-23 09:38:06', '2023-05-23 09:38:06'),
(2, 'Hand-Drip', '2023-05-23 09:38:06', '2023-05-23 09:38:06'),
(3, 'Coffee-Brews', '2023-05-23 09:38:06', '2023-05-23 09:38:06'),
(4, 'Cakes and Desserts', '2023-05-23 09:38:06', '2023-05-23 09:38:06'),
(6, 'Milk Tea', '2023-06-05 13:19:43', '2023-06-05 13:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `cus_ph` varchar(255) NOT NULL,
  `cus_em` varchar(255) NOT NULL,
  `cus_pw` varchar(20) NOT NULL,
  `cus_pw_re` varchar(20) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cus_id`, `cus_name`, `cus_ph`, `cus_em`, `cus_pw`, `cus_pw_re`, `create_at`, `update_at`) VALUES
(1, 'Thomas Henderson', '0840502835', 't.henderson@gmail.com', 'thomas12', 'thomas12', '2023-05-23 09:37:53', '2023-05-23 09:37:53'),
(11, 'Sai Sitt', '09123456789', 'sspo@gmail.com', 'sspo123', 'sspo123', '2023-05-30 10:56:05', '2023-05-30 10:56:05'),
(12, 'Rick Rover', '091122334455', 'rick11@gmail.com', 'rickrover11', 'rickrover11', '2023-05-30 12:11:28', '2023-05-30 12:11:28'),
(14, 'Peter Gibson', '0911122233344', 'peter99@gmail.com', 'peter99', 'peter99', '2023-06-05 12:26:22', '2023-06-05 12:26:22'),
(15, 'Lewis Lawson', '09987654321', 'lewis11@gmail.com', 'lewis123', 'lewis123', '2023-06-05 12:27:36', '2023-06-05 12:27:36');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `or_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `pd_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `or_date` date NOT NULL,
  `creat_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pd_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `pd_name` varchar(255) NOT NULL,
  `pd_price` decimal(6,2) NOT NULL,
  `description` text DEFAULT NULL,
  `pd_img` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pd_id`, `cat_id`, `pd_name`, `pd_price`, `description`, `pd_img`, `create_at`, `update_at`) VALUES
(2, 1, 'Irish', '2500.00', '', 'irish.png', '2023-05-23 09:38:21', '2023-05-23 09:38:21'),
(3, 1, 'Mocha', '3000.00', NULL, 'mocha.png', '2023-05-23 09:38:21', '2023-05-23 09:38:21'),
(4, 1, 'Macchiato', '3000.00', NULL, 'macchiato.jpg', '2023-05-23 09:38:21', '2023-05-23 09:38:21'),
(5, 1, 'Affogato', '4500.00', NULL, 'affogato.png', '2023-05-23 09:38:21', '2023-05-23 09:38:21'),
(6, 1, 'Cappuccino', '3000.00', NULL, 'cappuccino.png', '2023-05-23 09:38:21', '2023-05-23 09:38:21'),
(7, 1, 'Americano', '2500.00', NULL, 'americano.png', '2023-05-23 09:38:21', '2023-05-23 09:38:21'),
(8, 1, 'Espresso', '2500.00', NULL, 'espresso.png', '2023-05-23 09:38:21', '2023-05-23 09:38:21'),
(9, 2, 'French Press', '3500.00', NULL, 'french-press.png', '2023-05-23 09:38:21', '2023-05-23 09:38:21'),
(10, 2, 'Hand-Drip shake', '4000.00', NULL, 'hand-drip.jpg', '2023-05-23 09:38:21', '2023-05-23 09:38:21'),
(11, 3, 'Cold Brew', '3000.00', NULL, 'coldbrew.png', '2023-05-23 09:38:21', '2023-05-23 09:38:21'),
(12, 3, 'Matcha Green Tea', '3000.00', NULL, 'matcha.png', '2023-05-23 09:38:21', '2023-05-23 09:38:21'),
(13, 4, 'Honey Toast', '5000.00', NULL, 'Honey-toast.jpg', '2023-05-23 09:38:21', '2023-05-23 09:38:21'),
(14, 4, 'Ice-cream Cake', '6500.00', NULL, 'chocolate-cake.png', '2023-05-23 09:38:21', '2023-05-23 09:38:21'),
(15, 4, 'Italian Ice Cream Vanilla', '5500.00', NULL, 'vanilla-icecream.png', '2023-05-23 09:38:21', '2023-05-23 09:38:21'),
(16, 4, 'Tiramisu', '6000.00', NULL, 'tiramisu.png', '2023-05-23 09:38:21', '2023-05-23 09:38:21'),
(17, 4, 'Red Velvet Cake', '4500.00', NULL, 'redvelvet.png', '2023-05-23 09:38:21', '2023-05-23 09:38:21'),
(18, 4, 'Cheese tart', '3300.00', NULL, 'cheese-tart.png', '2023-05-23 09:38:21', '2023-05-23 09:38:21'),
(19, 4, 'Lemon tart', '3300.00', NULL, 'lemon-tart.png', '2023-05-23 09:38:21', '2023-05-23 09:38:21'),
(20, 4, 'French Eclair', '2500.00', NULL, 'eclair.jpg', '2023-05-23 09:38:21', '2023-05-23 09:38:21'),
(21, 4, 'Macarons', '2500.00', NULL, 'macaron.png', '2023-05-23 09:38:21', '2023-05-23 09:38:21'),
(22, 4, 'Brownies', '2000.00', NULL, 'brownie.png', '2023-05-23 09:38:21', '2023-05-23 09:38:21'),
(41, 1, 'Latte', '2800.00', '', 'latte2.jpg', '2023-06-05 11:28:22', '2023-06-05 11:28:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`or_id`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `pd_id` (`pd_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pd_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `or_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customers` (`cus_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`pd_id`) REFERENCES `products` (`pd_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
