-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 26, 2024 at 08:40 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b_health`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user_name`, `password`, `role`) VALUES
(1, 'admin', 'password', 'main');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `user_id` int NOT NULL,
  `appointment_id` int NOT NULL AUTO_INCREMENT,
  `date_of_appointment` date DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` int DEFAULT NULL,
  `comment_` text,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`appointment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`user_id`, `appointment_id`, `date_of_appointment`, `user_name`, `email`, `phone`, `comment_`, `status`) VALUES
(9, 42, '2024-01-03', 'FRANK256', 'frank@kafumii', 12345, 'i want to Kewpicha', 'deleted'),
(5, 41, '2024-01-13', 'FRANK256', 'frank@kafumii', 12345, 'i want to Kewpicha', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `prod_id` int NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(100) DEFAULT NULL,
  `quantity` int NOT NULL,
  `price` int DEFAULT NULL,
  `total` int DEFAULT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`prod_id`, `prod_name`, `quantity`, `price`, `total`, `user_id`) VALUES
(28, 'Allergy Medications', 3, 15000, 45000, 2),
(26, 'Ibuprofen', 1, 2000, 2000, 2),
(27, 'Aspirin', 1, 1000, 1000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `illness`
--

DROP TABLE IF EXISTS `illness`;
CREATE TABLE IF NOT EXISTS `illness` (
  `user_id` int NOT NULL,
  `illness_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` int DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `date_of_onset` date DEFAULT NULL,
  `symptoms` text,
  `severity` varchar(100) DEFAULT NULL,
  `comment_` text,
  PRIMARY KEY (`illness_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `illness`
--

INSERT INTO `illness` (`user_id`, `illness_id`, `user_name`, `email`, `phone`, `date_of_birth`, `date_of_onset`, `symptoms`, `severity`, `comment_`) VALUES
(0, 1, 'Josh', 'maria@me', 12345, '2023-09-13', '2023-09-16', 'sgdthfyjhdfstfogsdfjsdyfdstfdshfdsfdsf\r\ndfdsfgdshfdsfdsfds\r\nfdfsdfsdf', 'severe', 'scacascasc'),
(0, 2, '', '', 0, '0000-00-00', '0000-00-00', '', 'mild', ''),
(0, 3, '', '', 0, '0000-00-00', '0000-00-00', '', 'mild', ''),
(0, 4, 'mut', 'maria@me', 12345, '2023-09-02', '2023-09-30', 'dsffffffftrdyhxf', 'severe', 'xzdgfdtyufhj'),
(0, 5, 'Josh', 'maria@me', 12345, '2023-09-28', '2023-09-28', 'thutfkyuf\r\n', 'mild', ''),
(2, 6, 'Josh', 'maria@me', 12345, '2023-09-14', '2023-09-28', 'fdsgfbdgfjhk', 'moderate', 'xzdgfdtyufhj'),
(9, 7, 'FRANK', 'frank@kafumii', 12345, '2024-01-17', '2024-02-01', 'vomitting', 'mild', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`product_id`, `product_name`, `price`, `category`) VALUES
(1, 'Acetaminophen', 10000, 'medicine'),
(2, 'Ibuprofen', 2000, 'medicine'),
(3, 'Aspirin', 1000, 'medicine'),
(4, 'Cough Syrup', 10000, 'medicine'),
(5, 'Allergy Medications', 15000, 'medicine'),
(7, 'Cold and Flu Remedies', 10000, 'medicine'),
(9, 'Mouthwash', 20000, 'medicine'),
(10, 'Syringes and Needles', 30000, 'medical tools'),
(11, 'Catheters', 50000, 'medical tools'),
(12, 'Ostomy Supplies', 30000, 'medical tools'),
(13, 'Medical Gloves', 15000, 'medical tools'),
(14, 'Wheelchairs', 100000, 'medical tools'),
(15, 'Crutches', 100000, 'medical tools'),
(16, 'Knee Braces', 30000, 'medical tools'),
(17, 'Ankle Supports', 20000, 'medical tools');

-- --------------------------------------------------------

--
-- Table structure for table `order_`
--

DROP TABLE IF EXISTS `order_`;
CREATE TABLE IF NOT EXISTS `order_` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `description` text,
  `price` int NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

DROP TABLE IF EXISTS `user_reg`;
CREATE TABLE IF NOT EXISTS `user_reg` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`user_id`, `user_name`, `password`, `email`, `date_of_birth`, `address`) VALUES
(2, 'Josh', '$2y$10$zKLpkf27Ee3c1rSrVvBtnexlbAgKnMWbyVSsV7kVjlEIwz6XXu3ZG', 'maria@me', '2023-09-28', 'KISAASI'),
(3, 'mut', '$2y$10$2Sy0dFsK4Y3Hg.Bcb7CjhuFz7F8/X7GXGvHKih4U1QVX28QMxr60W', 'maria@me', '2023-09-28', 'KISAASI'),
(6, 'FRANK', '$2y$10$T0ITdDifwgK87bwvTh7lV.dV8fjelnLx0b.dPkMSAVV/v7rrxXUJ6', 'frank@kafumii', '2024-01-12', 'KISAASI'),
(7, 'FRANK', '$2y$10$zsxST1IS1JcpS/HtcGZ5be..E53BD1STpcZBX61G3zvjLJRxvyHwO', 'frank@kafumii', '2024-02-01', 'KISAASI'),
(8, 'Joshua', '$2y$10$9Vl2XsKvUZVi5zXRDxPHMexrV86kRdmFQE8EaDw3c2oj4LItOzDS2', 'david@gmail', '2024-01-11', 'KISAASI'),
(10, 'Moses', '$2y$10$XZ4zXTOVwhJUxdZ6Q2EZSu/ZVRUtkM1FaNurZ5l6CcEp2yDT8/GN.', 'moses@gmail.com', '2024-01-12', 'KISAASI');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
