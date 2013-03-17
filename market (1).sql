-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 17, 2013 at 12:54 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `market`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `expirationEmail` tinyint(1) NOT NULL DEFAULT '0',
  `flagEmail` tinyint(1) NOT NULL DEFAULT '0',
  `wishlistEmail` tinyint(1) NOT NULL DEFAULT '1',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `accounts_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `email`, `password`, `expirationEmail`, `flagEmail`, `wishlistEmail`, `admin`) VALUES
(1, '0@gmail.com', '$2a$08$jJ4tJK0zLA2phcNZYOotOOJDRj.z/gy5Y4dgmXdYvV82/aYmHlAWu', 0, 0, 1, 0),
(2, '1@gmail.com', '$2a$08$1D85o1Jpg4pMbJJ/whr7q..PT/xogqBY1xdexLK2qBKQEqDz/ymKO', 0, 0, 1, 0),
(3, '2@gmail.com', '$2a$08$QxxaYGqgu/VYUkXT4Dmx6eQocrKGVSERAN3WvQ5fN2wEPn.8e4P6q', 0, 0, 1, 0),
(4, '3@gmail.com', '$2a$08$HwlxIdtNBMZwuunYJyDvSun/7LJjUgj7VvzF..C/VdTZ22Y72GwM2', 0, 0, 1, 0),
(5, '4@gmail.com', '$2a$08$ieSBuiRR0uNn3raZxNHhZ.NEIBpAzs/YNWVrFDA5IqlDfgbINTq3O', 0, 0, 1, 0),
(6, '5@gmail.com', '$2a$08$SKL6Eb5lbynnyAMX6fNM4uRc0woT2/d5eV/wVhZH2IYgA58Nha9Ou', 0, 0, 1, 0),
(7, '6@gmail.com', '$2a$08$A81qVmgVGtvscoovXExTB.e9ob0jODpwaiNidbeUJySmIljm7RE8i', 0, 0, 1, 0),
(8, '7@gmail.com', '$2a$08$aCIRoJT7Hnnsr4UWu8Gio.yTjXXgBcM1hdvo1SH43qDvpCGy.Yw82', 0, 0, 1, 0),
(9, '8@gmail.com', '$2a$08$Sqx8i2ZdwriqzynTm7NrrOjzji5E2DiU6qB5QGz9bBdDYzJ/bp//.', 0, 0, 1, 0),
(10, '9@gmail.com', '$2a$08$SJwWmq9byu8Fr.AWsp5uH.gQS5scRvs4yfgWRKOrGnGZaSMcwUcfa', 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Wood'),
(2, 'Metal'),
(3, 'Ceramic'),
(4, 'Glass'),
(5, 'Fabric'),
(6, 'Plastic'),
(7, 'Concrete'),
(8, 'Appliances'),
(9, 'Electical'),
(10, 'Plumbing'),
(11, 'Insulation'),
(12, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `flags`
--

CREATE TABLE IF NOT EXISTS `flags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(10) unsigned NOT NULL,
  `listing_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `flags_account_id_foreign` (`account_id`),
  KEY `flags_listing_id_foreign` (`listing_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(200) NOT NULL,
  `listing_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `images_listing_id_foreign` (`listing_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=201 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `description`, `listing_id`) VALUES
(1, 'PIC DESCRIPTIOIN', 1),
(2, 'PIC DESCRIPTIOIN', 1),
(3, 'PIC DESCRIPTIOIN', 1),
(4, 'PIC DESCRIPTIOIN', 1),
(5, 'PIC DESCRIPTIOIN', 1),
(6, 'PIC DESCRIPTIOIN', 2),
(7, 'PIC DESCRIPTIOIN', 2),
(8, 'PIC DESCRIPTIOIN', 2),
(9, 'PIC DESCRIPTIOIN', 2),
(10, 'PIC DESCRIPTIOIN', 2),
(11, 'PIC DESCRIPTIOIN', 3),
(12, 'PIC DESCRIPTIOIN', 3),
(13, 'PIC DESCRIPTIOIN', 3),
(14, 'PIC DESCRIPTIOIN', 3),
(15, 'PIC DESCRIPTIOIN', 3),
(16, 'PIC DESCRIPTIOIN', 4),
(17, 'PIC DESCRIPTIOIN', 4),
(18, 'PIC DESCRIPTIOIN', 4),
(19, 'PIC DESCRIPTIOIN', 4),
(20, 'PIC DESCRIPTIOIN', 4),
(21, 'PIC DESCRIPTIOIN', 5),
(22, 'PIC DESCRIPTIOIN', 5),
(23, 'PIC DESCRIPTIOIN', 5),
(24, 'PIC DESCRIPTIOIN', 5),
(25, 'PIC DESCRIPTIOIN', 5),
(26, 'PIC DESCRIPTIOIN', 6),
(27, 'PIC DESCRIPTIOIN', 6),
(28, 'PIC DESCRIPTIOIN', 6),
(29, 'PIC DESCRIPTIOIN', 6),
(30, 'PIC DESCRIPTIOIN', 6),
(31, 'PIC DESCRIPTIOIN', 7),
(32, 'PIC DESCRIPTIOIN', 7),
(33, 'PIC DESCRIPTIOIN', 7),
(34, 'PIC DESCRIPTIOIN', 7),
(35, 'PIC DESCRIPTIOIN', 7),
(36, 'PIC DESCRIPTIOIN', 8),
(37, 'PIC DESCRIPTIOIN', 8),
(38, 'PIC DESCRIPTIOIN', 8),
(39, 'PIC DESCRIPTIOIN', 8),
(40, 'PIC DESCRIPTIOIN', 8),
(41, 'PIC DESCRIPTIOIN', 9),
(42, 'PIC DESCRIPTIOIN', 9),
(43, 'PIC DESCRIPTIOIN', 9),
(44, 'PIC DESCRIPTIOIN', 9),
(45, 'PIC DESCRIPTIOIN', 9),
(46, 'PIC DESCRIPTIOIN', 10),
(47, 'PIC DESCRIPTIOIN', 10),
(48, 'PIC DESCRIPTIOIN', 10),
(49, 'PIC DESCRIPTIOIN', 10),
(50, 'PIC DESCRIPTIOIN', 10),
(51, 'PIC DESCRIPTIOIN', 11),
(52, 'PIC DESCRIPTIOIN', 11),
(53, 'PIC DESCRIPTIOIN', 11),
(54, 'PIC DESCRIPTIOIN', 11),
(55, 'PIC DESCRIPTIOIN', 11),
(56, 'PIC DESCRIPTIOIN', 12),
(57, 'PIC DESCRIPTIOIN', 12),
(58, 'PIC DESCRIPTIOIN', 12),
(59, 'PIC DESCRIPTIOIN', 12),
(60, 'PIC DESCRIPTIOIN', 12),
(61, 'PIC DESCRIPTIOIN', 13),
(62, 'PIC DESCRIPTIOIN', 13),
(63, 'PIC DESCRIPTIOIN', 13),
(64, 'PIC DESCRIPTIOIN', 13),
(65, 'PIC DESCRIPTIOIN', 13),
(66, 'PIC DESCRIPTIOIN', 14),
(67, 'PIC DESCRIPTIOIN', 14),
(68, 'PIC DESCRIPTIOIN', 14),
(69, 'PIC DESCRIPTIOIN', 14),
(70, 'PIC DESCRIPTIOIN', 14),
(71, 'PIC DESCRIPTIOIN', 15),
(72, 'PIC DESCRIPTIOIN', 15),
(73, 'PIC DESCRIPTIOIN', 15),
(74, 'PIC DESCRIPTIOIN', 15),
(75, 'PIC DESCRIPTIOIN', 15),
(76, 'PIC DESCRIPTIOIN', 16),
(77, 'PIC DESCRIPTIOIN', 16),
(78, 'PIC DESCRIPTIOIN', 16),
(79, 'PIC DESCRIPTIOIN', 16),
(80, 'PIC DESCRIPTIOIN', 16),
(81, 'PIC DESCRIPTIOIN', 17),
(82, 'PIC DESCRIPTIOIN', 17),
(83, 'PIC DESCRIPTIOIN', 17),
(84, 'PIC DESCRIPTIOIN', 17),
(85, 'PIC DESCRIPTIOIN', 17),
(86, 'PIC DESCRIPTIOIN', 18),
(87, 'PIC DESCRIPTIOIN', 18),
(88, 'PIC DESCRIPTIOIN', 18),
(89, 'PIC DESCRIPTIOIN', 18),
(90, 'PIC DESCRIPTIOIN', 18),
(91, 'PIC DESCRIPTIOIN', 19),
(92, 'PIC DESCRIPTIOIN', 19),
(93, 'PIC DESCRIPTIOIN', 19),
(94, 'PIC DESCRIPTIOIN', 19),
(95, 'PIC DESCRIPTIOIN', 19),
(96, 'PIC DESCRIPTIOIN', 20),
(97, 'PIC DESCRIPTIOIN', 20),
(98, 'PIC DESCRIPTIOIN', 20),
(99, 'PIC DESCRIPTIOIN', 20),
(100, 'PIC DESCRIPTIOIN', 20),
(101, 'PIC DESCRIPTIOIN', 21),
(102, 'PIC DESCRIPTIOIN', 21),
(103, 'PIC DESCRIPTIOIN', 21),
(104, 'PIC DESCRIPTIOIN', 21),
(105, 'PIC DESCRIPTIOIN', 21),
(106, 'PIC DESCRIPTIOIN', 22),
(107, 'PIC DESCRIPTIOIN', 22),
(108, 'PIC DESCRIPTIOIN', 22),
(109, 'PIC DESCRIPTIOIN', 22),
(110, 'PIC DESCRIPTIOIN', 22),
(111, 'PIC DESCRIPTIOIN', 23),
(112, 'PIC DESCRIPTIOIN', 23),
(113, 'PIC DESCRIPTIOIN', 23),
(114, 'PIC DESCRIPTIOIN', 23),
(115, 'PIC DESCRIPTIOIN', 23),
(116, 'PIC DESCRIPTIOIN', 24),
(117, 'PIC DESCRIPTIOIN', 24),
(118, 'PIC DESCRIPTIOIN', 24),
(119, 'PIC DESCRIPTIOIN', 24),
(120, 'PIC DESCRIPTIOIN', 24),
(121, 'PIC DESCRIPTIOIN', 25),
(122, 'PIC DESCRIPTIOIN', 25),
(123, 'PIC DESCRIPTIOIN', 25),
(124, 'PIC DESCRIPTIOIN', 25),
(125, 'PIC DESCRIPTIOIN', 25),
(126, 'PIC DESCRIPTIOIN', 26),
(127, 'PIC DESCRIPTIOIN', 26),
(128, 'PIC DESCRIPTIOIN', 26),
(129, 'PIC DESCRIPTIOIN', 26),
(130, 'PIC DESCRIPTIOIN', 26),
(131, 'PIC DESCRIPTIOIN', 27),
(132, 'PIC DESCRIPTIOIN', 27),
(133, 'PIC DESCRIPTIOIN', 27),
(134, 'PIC DESCRIPTIOIN', 27),
(135, 'PIC DESCRIPTIOIN', 27),
(136, 'PIC DESCRIPTIOIN', 28),
(137, 'PIC DESCRIPTIOIN', 28),
(138, 'PIC DESCRIPTIOIN', 28),
(139, 'PIC DESCRIPTIOIN', 28),
(140, 'PIC DESCRIPTIOIN', 28),
(141, 'PIC DESCRIPTIOIN', 29),
(142, 'PIC DESCRIPTIOIN', 29),
(143, 'PIC DESCRIPTIOIN', 29),
(144, 'PIC DESCRIPTIOIN', 29),
(145, 'PIC DESCRIPTIOIN', 29),
(146, 'PIC DESCRIPTIOIN', 30),
(147, 'PIC DESCRIPTIOIN', 30),
(148, 'PIC DESCRIPTIOIN', 30),
(149, 'PIC DESCRIPTIOIN', 30),
(150, 'PIC DESCRIPTIOIN', 30),
(151, 'PIC DESCRIPTIOIN', 31),
(152, 'PIC DESCRIPTIOIN', 31),
(153, 'PIC DESCRIPTIOIN', 31),
(154, 'PIC DESCRIPTIOIN', 31),
(155, 'PIC DESCRIPTIOIN', 31),
(156, 'PIC DESCRIPTIOIN', 32),
(157, 'PIC DESCRIPTIOIN', 32),
(158, 'PIC DESCRIPTIOIN', 32),
(159, 'PIC DESCRIPTIOIN', 32),
(160, 'PIC DESCRIPTIOIN', 32),
(161, 'PIC DESCRIPTIOIN', 33),
(162, 'PIC DESCRIPTIOIN', 33),
(163, 'PIC DESCRIPTIOIN', 33),
(164, 'PIC DESCRIPTIOIN', 33),
(165, 'PIC DESCRIPTIOIN', 33),
(166, 'PIC DESCRIPTIOIN', 34),
(167, 'PIC DESCRIPTIOIN', 34),
(168, 'PIC DESCRIPTIOIN', 34),
(169, 'PIC DESCRIPTIOIN', 34),
(170, 'PIC DESCRIPTIOIN', 34),
(171, 'PIC DESCRIPTIOIN', 35),
(172, 'PIC DESCRIPTIOIN', 35),
(173, 'PIC DESCRIPTIOIN', 35),
(174, 'PIC DESCRIPTIOIN', 35),
(175, 'PIC DESCRIPTIOIN', 35),
(176, 'PIC DESCRIPTIOIN', 36),
(177, 'PIC DESCRIPTIOIN', 36),
(178, 'PIC DESCRIPTIOIN', 36),
(179, 'PIC DESCRIPTIOIN', 36),
(180, 'PIC DESCRIPTIOIN', 36),
(181, 'PIC DESCRIPTIOIN', 37),
(182, 'PIC DESCRIPTIOIN', 37),
(183, 'PIC DESCRIPTIOIN', 37),
(184, 'PIC DESCRIPTIOIN', 37),
(185, 'PIC DESCRIPTIOIN', 37),
(186, 'PIC DESCRIPTIOIN', 38),
(187, 'PIC DESCRIPTIOIN', 38),
(188, 'PIC DESCRIPTIOIN', 38),
(189, 'PIC DESCRIPTIOIN', 38),
(190, 'PIC DESCRIPTIOIN', 38),
(191, 'PIC DESCRIPTIOIN', 39),
(192, 'PIC DESCRIPTIOIN', 39),
(193, 'PIC DESCRIPTIOIN', 39),
(194, 'PIC DESCRIPTIOIN', 39),
(195, 'PIC DESCRIPTIOIN', 39),
(196, 'PIC DESCRIPTIOIN', 40),
(197, 'PIC DESCRIPTIOIN', 40),
(198, 'PIC DESCRIPTIOIN', 40),
(199, 'PIC DESCRIPTIOIN', 40),
(200, 'PIC DESCRIPTIOIN', 40);

-- --------------------------------------------------------

--
-- Table structure for table `laravel_migrations`
--

CREATE TABLE IF NOT EXISTS `laravel_migrations` (
  `bundle` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`bundle`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laravel_migrations`
--

INSERT INTO `laravel_migrations` (`bundle`, `name`, `batch`) VALUES
('application', '2013_02_26_004656_create_account', 1),
('application', '2013_02_26_010351_create_location', 1),
('application', '2013_02_26_010938_create_listing', 1),
('application', '2013_02_26_012319_create_wishlist_item', 1),
('application', '2013_02_26_012803_create_image', 1),
('application', '2013_02_26_013053_create_survey_result', 1),
('application', '2013_02_26_013628_create_categories', 1),
('application', '2013_02_26_014832_create_wishlist_match', 1),
('application', '2013_03_13_013629_foreign_keys', 1),
('application', '2013_03_13_230009_insert_accounts', 1),
('application', '2013_03_13_231037_insert_locations', 1),
('application', '2013_03_13_231557_insert_listings', 1),
('application', '2013_03_13_232334_insert_pics', 1),
('application', '2013_03_17_000656_createflag', 1),
('application', '2013_03_17_000901_addflagforeign', 1),
('application', '2013_03_17_002139_createstaticpages', 1);

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE IF NOT EXISTS `listings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `date_available` datetime NOT NULL,
  `date_unavailable` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `location_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `listings_location_id_foreign` (`location_id`),
  KEY `listings_category_id_foreign` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `title`, `description`, `category_id`, `price`, `date_available`, `date_unavailable`, `created_at`, `updated_at`, `location_id`) VALUES
(1, '0', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:50', '2013-03-17 00:33:50', 1),
(2, '1', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:50', '2013-03-17 00:33:50', 1),
(3, '0', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:50', '2013-03-17 00:33:50', 2),
(4, '1', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:50', '2013-03-17 00:33:50', 2),
(5, '0', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:50', '2013-03-17 00:33:50', 3),
(6, '1', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:50', '2013-03-17 00:33:50', 3),
(7, '0', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:50', '2013-03-17 00:33:50', 4),
(8, '1', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:50', '2013-03-17 00:33:50', 4),
(9, '0', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:50', '2013-03-17 00:33:50', 5),
(10, '1', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:50', '2013-03-17 00:33:50', 5),
(11, '0', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:50', '2013-03-17 00:33:50', 6),
(12, '1', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:50', '2013-03-17 00:33:50', 6),
(13, '0', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 7),
(14, '1', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 7),
(15, '0', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 8),
(16, '1', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 8),
(17, '0', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 9),
(18, '1', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 9),
(19, '0', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 10),
(20, '1', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 10),
(21, '0', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 11),
(22, '1', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 11),
(23, '0', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 12),
(24, '1', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 12),
(25, '0', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 13),
(26, '1', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 13),
(27, '0', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 14),
(28, '1', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 14),
(29, '0', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 15),
(30, '1', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 15),
(31, '0', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 16),
(32, '1', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 16),
(33, '0', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 17),
(34, '1', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 17),
(35, '0', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:52', '2013-03-17 00:33:52', 18),
(36, '1', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:52', '2013-03-17 00:33:52', 18),
(37, '0', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:52', '2013-03-17 00:33:52', 19),
(38, '1', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:52', '2013-03-17 00:33:52', 19),
(39, '0', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:52', '2013-03-17 00:33:52', 20),
(40, '1', 'THSI IFS AWIFAWOEIJFAWIEJFWEIFJ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:52', '2013-03-17 00:33:52', 20);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `postal_code` varchar(200) NOT NULL,
  `account_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `locations_account_id_foreign` (`account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `address`, `city`, `postal_code`, `account_id`) VALUES
(1, '123 fake St.', 'Vancouver', 'V8V3X4', 1),
(2, '123 fake St.', 'Vancouver', 'V8V3X4', 1),
(3, '123 fake St.', 'Vancouver', 'V8V3X4', 2),
(4, '123 fake St.', 'Vancouver', 'V8V3X4', 2),
(5, '123 fake St.', 'Vancouver', 'V8V3X4', 3),
(6, '123 fake St.', 'Vancouver', 'V8V3X4', 3),
(7, '123 fake St.', 'Vancouver', 'V8V3X4', 4),
(8, '123 fake St.', 'Vancouver', 'V8V3X4', 4),
(9, '123 fake St.', 'Vancouver', 'V8V3X4', 5),
(10, '123 fake St.', 'Vancouver', 'V8V3X4', 5),
(11, '123 fake St.', 'Vancouver', 'V8V3X4', 6),
(12, '123 fake St.', 'Vancouver', 'V8V3X4', 6),
(13, '123 fake St.', 'Vancouver', 'V8V3X4', 7),
(14, '123 fake St.', 'Vancouver', 'V8V3X4', 7),
(15, '123 fake St.', 'Vancouver', 'V8V3X4', 8),
(16, '123 fake St.', 'Vancouver', 'V8V3X4', 8),
(17, '123 fake St.', 'Vancouver', 'V8V3X4', 9),
(18, '123 fake St.', 'Vancouver', 'V8V3X4', 9),
(19, '123 fake St.', 'Vancouver', 'V8V3X4', 10),
(20, '123 fake St.', 'Vancouver', 'V8V3X4', 10);

-- --------------------------------------------------------

--
-- Table structure for table `staticpages`
--

CREATE TABLE IF NOT EXISTS `staticpages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `surveyresults`
--

CREATE TABLE IF NOT EXISTS `surveyresults` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `material_type` varchar(200) NOT NULL,
  `monetary_value` float NOT NULL,
  `exchange_success` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wishlistitems`
--

CREATE TABLE IF NOT EXISTS `wishlistitems` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(200) NOT NULL,
  `account_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `wishlistitems_account_id_foreign` (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wishlistmatches`
--

CREATE TABLE IF NOT EXISTS `wishlistmatches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `wishlistitem_id` int(10) unsigned NOT NULL,
  `listing_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `wishlistmatches_wishlistitem_id_foreign` (`wishlistitem_id`),
  KEY `wishlistmatches_listing_id_foreign` (`listing_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flags`
--
ALTER TABLE `flags`
  ADD CONSTRAINT `flags_listing_id_foreign` FOREIGN KEY (`listing_id`) REFERENCES `listings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `flags_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_listing_id_foreign` FOREIGN KEY (`listing_id`) REFERENCES `listings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `listings`
--
ALTER TABLE `listings`
  ADD CONSTRAINT `listings_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `listings_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlistitems`
--
ALTER TABLE `wishlistitems`
  ADD CONSTRAINT `wishlistitems_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlistmatches`
--
ALTER TABLE `wishlistmatches`
  ADD CONSTRAINT `wishlistmatches_listing_id_foreign` FOREIGN KEY (`listing_id`) REFERENCES `listings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlistmatches_wishlistitem_id_foreign` FOREIGN KEY (`wishlistitem_id`) REFERENCES `wishlistitems` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
