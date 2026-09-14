-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 28, 2024 at 08:13 AM
-- Server version: 8.0.27
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

DROP TABLE IF EXISTS `admin_master`;
CREATE TABLE IF NOT EXISTS `admin_master` (
  `adminId` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `type` tinyint NOT NULL COMMENT '0 SUb, 1 Super',
  `userName` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `code_time` datetime DEFAULT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`adminId`, `Name`, `type`, `userName`, `email`, `password`, `code_time`) VALUES
(1, 'Admin', 1, 'admin@gmail.com', 'admin@gmail.com', '526d7af66001b2a350527b33b5c347c9', '2020-05-07 15:24:11');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `index` int NOT NULL DEFAULT '1000',
  `cat_name` varchar(255) NOT NULL,
  `cat_img` text NOT NULL,
  `unique_id` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `index`, `cat_name`, `cat_img`, `unique_id`) VALUES
(17, 1000, 'Dress', 'https://images.meesho.com/images/marketing/1649688502928_100.webp', 'dress'),
(16, 1000, 'Saree', 'https://images.meesho.com/images/marketing/1628672353857_100.webp', 'saree'),
(14, 1, 'Kurtis', 'https://images.meesho.com/images/widgets/9PAQI/fb2sf_300.webp', 'kurtis');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE IF NOT EXISTS `purchase` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `count` int DEFAULT NULL,
  `last_update_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `date`, `count`, `last_update_time`) VALUES
(1, '2024-01-06', 2, '2024-01-06 06:21:50'),
(2, '2024-01-08', 50, '2024-01-08 07:36:33'),
(3, '2024-01-13', 10, '2024-01-13 15:26:56'),
(4, '2024-01-21', 16, '2024-01-21 18:11:48'),
(5, '2024-01-22', 8856, '2024-01-22 06:20:05'),
(6, '2024-01-24', 5, '2024-01-24 05:18:51');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `upi_id` text NOT NULL,
  `netbanking` smallint NOT NULL DEFAULT '0' COMMENT '0 No,1 Yes',
  `merchant_key` text NOT NULL,
  `salt_key` text NOT NULL,
  `pixel_code` text NOT NULL,
  `payment_method` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_url` text NOT NULL,
  `analytics` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `upi_id`, `netbanking`, `merchant_key`, `salt_key`, `pixel_code`, `payment_method`, `website_url`, `analytics`) VALUES
(8, 'merchant1397777.augp@aubank', 0, '', '', '<!-- Meta Pixel Code -->\r\n<script>\r\n!function(f,b,e,v,n,t,s)\r\n{if(f.fbq)return;n=f.fbq=function(){n.callMethod?\r\nn.callMethod.apply(n,arguments):n.queue.push(arguments)};\r\nif(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version=\'2.0\';\r\nn.queue=[];t=b.createElement(e);t.async=!0;\r\nt.src=v;s=b.getElementsByTagName(e)[0];\r\ns.parentNode.insertBefore(t,s)}(window, document,\'script\',\r\n\'https://connect.facebook.net/en_US/fbevents.js\');\r\nfbq(\'init\', \'336366495765827\');\r\nfbq(\'track\', \'PageView\');\r\n</script>\r\n<noscript><img height=\"1\" width=\"1\" style=\"display:none\"\r\nsrc=\"https://www.facebook.com/tr?id=336366495765827&ev=PageView&noscript=1\"\r\n/></noscript>\r\n<!-- End Meta Pixel Code -->', 'gpay,phonepe,paytm,bhim_upi,whatspp_pay', 'https://meesho-sale.online/', '<!-- Google tag (gtag.js) --> <script async src=\"https://www.googletagmanager.com/gtag/js?id=G-TZYHEB664P\"></script> <script>   window.dataLayer = window.dataLayer || [];   function gtag(){dataLayer.push(arguments);}   gtag(\'js\', new Date());    gtag(\'config\', \'G-TZYHEB664P\'); </script>'),
(9, 'test@ybl', 0, '', '', '', 'gpay,phonepe,paytm,bhim_upi,whatspp_pay', 'http://localhost/store/flipkart/offer/', ''),
(10, 'test@ybl', 0, '', '', '', 'gpay', 'http://localhost/store/meesho/offer/', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `index` int NOT NULL DEFAULT '10000',
  `unique_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `is_show` int NOT NULL DEFAULT '1',
  `category` int NOT NULL,
  `color` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `storage` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `selling_price` double(10,2) DEFAULT NULL,
  `mrp` double(10,2) DEFAULT NULL,
  `fetaures` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `img1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `img2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `img3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `img4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `img5` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `from_csv` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1472 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_verient`
--

DROP TABLE IF EXISTS `tbl_product_verient`;
CREATE TABLE IF NOT EXISTS `tbl_product_verient` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `color` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `color_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `size` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `storage` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `selling_price` double(10,2) DEFAULT NULL,
  `mrp` double(10,2) DEFAULT NULL,
  `fetaures` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `img1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `img2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `img3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `img4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `img5` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `from_csv` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8460 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
