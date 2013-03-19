-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2013 at 04:11 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

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

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE `accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `expirationEmail` tinyint(1) NOT NULL DEFAULT '0',
  `flagEmail` tinyint(1) NOT NULL DEFAULT '0',
  `wishlistEmail` tinyint(1) NOT NULL DEFAULT '1',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `accounts_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `email`, `password`, `expirationEmail`, `flagEmail`, `wishlistEmail`, `admin`) VALUES
(1, '0@gmail.com', '$2a$08$jJ4tJK0zLA2phcNZYOotOOJDRj.z/gy5Y4dgmXdYvV82/aYmHlAWu', 0, 0, 1, 0),
(3, '2@gmail.com', '$2a$08$QxxaYGqgu/VYUkXT4Dmx6eQocrKGVSERAN3WvQ5fN2wEPn.8e4P6q', 0, 0, 1, 0),
(5, '4@gmail.com', '$2a$08$ieSBuiRR0uNn3raZxNHhZ.NEIBpAzs/YNWVrFDA5IqlDfgbINTq3O', 0, 0, 1, 1),
(6, '5@gmail.com', '$2a$08$SKL6Eb5lbynnyAMX6fNM4uRc0woT2/d5eV/wVhZH2IYgA58Nha9Ou', 0, 0, 1, 0),
(7, '6@gmail.com', '$2a$08$A81qVmgVGtvscoovXExTB.e9ob0jODpwaiNidbeUJySmIljm7RE8i', 0, 0, 1, 0),
(8, '7@gmail.com', '$2a$08$aCIRoJT7Hnnsr4UWu8Gio.yTjXXgBcM1hdvo1SH43qDvpCGy.Yw82', 0, 0, 1, 0),
(9, '8@gmail.com', '$2a$08$Sqx8i2ZdwriqzynTm7NrrOjzji5E2DiU6qB5QGz9bBdDYzJ/bp//.', 0, 0, 1, 0),
(10, '9@gmail.com', '$2a$08$SJwWmq9byu8Fr.AWsp5uH.gQS5scRvs4yfgWRKOrGnGZaSMcwUcfa', 0, 0, 1, 0),
(12, '1@gmail.com', '$2a$08$V3htQnlaVWtVeTRabG5UVeB/QS1uBLU.8pHddzNQsLtkLPcHWJQq2', 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
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

DROP TABLE IF EXISTS `flags`;
CREATE TABLE `flags` (
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

DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
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

DROP TABLE IF EXISTS `laravel_migrations`;
CREATE TABLE `laravel_migrations` (
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

DROP TABLE IF EXISTS `listings`;
CREATE TABLE `listings` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `title`, `description`, `category_id`, `price`, `date_available`, `date_unavailable`, `created_at`, `updated_at`, `location_id`) VALUES
(1, '1/2" Pressure Regulator', 'Used on boiler feed lines to provide make up water to the system SPECIFICATIONS', 10, '30.00', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:50', '2013-03-17 00:33:50', 1),
(2, 'SHARKBITE  \r\n3/4" Cap', 'Connection system for copper, CPVC or PEX pipe', 10, '45.75', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:50', '2013-03-17 00:33:50', 1),
(3, '1-1/2" PVC P-Trap Drain', 'P-Trap', 10, '7.00', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:50', '2013-03-17 00:33:50', 2),
(4, 'Antique Brass Huntington Smart Key Entrance Door Lock', 'Latchbolt by knob from either side, except when outside knob is locked by "push in and turn-to-right" action of entire inside knob', 2, '150.00', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:50', '2013-03-17 00:33:50', 2),
(9, '16" x 25'' Roll Reflective Foil Double Bubble Foil Insulation', 'Use for heating and cooling ducts, pipe wrap, air return', 11, '12.00', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:50', '2013-03-17 00:33:50', 5),
(10, '1/2" x 10'' Ultra Poly Pex Pipe', 'Poly Plex Pipe', 6, '55.00', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:50', '2013-03-17 00:33:50', 5),
(11, '6" x 14" White Poly Baseboard Grille, with Filter', 'Save time with replacement filters that are made to fit, no cutting and fitting necessary', 6, '75.00', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:50', '2013-03-17 00:33:50', 6),
(12, 'Cosmetic Jars', 'Industrial Plastics & Paints offers cosmetic jars in to styles single wall and double wall. The double walled containers have an inner liner designed to reduce corner angles so products such as cream are easier to access.', 6, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:50', '2013-03-17 00:33:50', 6),
(17, '27" Oak Knockdown Wall Microwave Cabinet', '"Oak"-Ready to Assemble', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 9),
(18, 'Produce Bags', 'Produce Bags are manufactured for the grocery industry and are dispensed off a roll with a perforated tear-off feature for convienent in-store point of sale service.', 6, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 9),
(19, 'Layflat tubing', 'Layflat tubing has many applications. Most common is making bottom seal bags using thermal impulse heat sealer and clear poly tubing. Our customers us this method to package irregular size objects. We offer our customer either the small convenience roll or the more economical Production roll. Custom sizes and guages can be produced for orders meeting minimum requirements. Layflat is also used for temporary ducting.', 6, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 10),
(20, 'Electric Shag Faux Fur', 'Stunning combination of charcoal shag fur and pewter lurex! Fabulous costume and apparel fabric. Ideal for crafts and Home Dec too!', 5, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 10),
(21, 'Bottles', 'These classic style bottles are used for so many types of filling from chemicals to pet products, it is a multi purpose package. ', 4, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 11),
(22, 'African Mongolian Faux Fur', 'Gorgeous new quality faux fur from Shannon Fabrics! Fur has a 2'''' pile, a luxurious hand and a soft subtle sheen just like the real thing!', 5, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 11),
(23, 'STOCK BEVELS', '3/4" and 1" wide', 4, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 12),
(24, '6.8" Square Amber Ceramic Planter', 'Rich colour glaze protects the pot and holds up to the elements', 3, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 12),
(25, '5" Round Bone Colour Ceramic Planter', 'Beautiful center-piece good for holding items', 3, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 13),
(26, '38 x 100MM Standard Square Wiring Box', 'Made of hot dipped galvanized steel', 9, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 13),
(27, '100 Pack 3/16" x 2-1/4" Hex Head Concrete Screws, with Drill Bit', 'Plus drill bit', 7, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 14),
(28, 'ECOBUST TYPE 2 (10 to 25C) Expansive Mortar - 44 Lbs Pail', 't 3 Easy Steps, Drill, Mix, Pour and watch it Bust! No jack hammering or explosives needed making ECOBUST a safe, non-toxic, eco-friendly solution. No noise, dust, vibrations, fly rock, fumes or any other environmental pollution so it is ideal for sensitive jobs, big or small.', 7, '99.31', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 14),
(29, '6 Piece 100 Amp Service Entrance Mast Kit', '100 amp', 9, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 15),
(30, 'UltraVic 10 Feet Galv Roof Sheet 29 Ga', 'UltraVic is a traditional Board and Batten style that is easy to install. Extra strengthening in the side laps and intermediate ribs give UltraVic improved weather protection, incomparable snow load capacity and increased rigidity.', 2, '45.24', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 15),
(31, 'Galvanized steel', 'alvanized steel is widely used in applications where rust resistance is needed', 2, '66.30', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 16),
(32, 'Outdoor 24-Hour Digital Block Heater Timer with 2 Outlets', 'Saves energy - turns block heaters on when needed', 9, '164.00', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 16),
(33, 'Suntuf Cor. Pc 8 Feet Solar Grey', 'UltraVic is a traditional Board and Batten style that is easy to install. ', 2, '154.24', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 17),
(34, 'aluminum angle', 'General 6061 characteristics and uses: Excellent joining characteristics, good acceptance of applied coatings. ', 2, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:51', '2013-03-17 00:33:51', 17),
(35, '5" x 15''L Aluminum Backed Foam Pipe Insulation Wrap', 'Self adhesive aluminum foil backed foam roll goes on easy and stays on', 11, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:52', '2013-03-17 00:33:52', 18),
(36, '2x8x10 SPF Dimension Lumber', 'SPF Square Edge Lumber. Every piece meets the highest grading standards for strength and appearance. Dimensional lumber is ideal for a wide range of structural and nonstructural applications ', 1, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:52', '2013-03-17 00:33:52', 18),
(37, 'Sunbeam 0.7 Cu. Ft. Microwave ', 'not only gives you a better food preparation experience, its stylish design also adds to the decor of your kitchen', 8, '69.99', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:52', '2013-03-17 00:33:52', 19),
(38, 'KING SAKRETE Mortar Mix 30kg', 'SAKRETE Mortar Mix is a ready to use mixture of sand and masonry cement. For laying brick, concrete block or field stone.', 7, '123.12', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:52', '2013-03-17 00:33:52', 19),
(39, 'Bosch Tall Tub Built-In Dishwasher ', 'Makes life easier after cooking in the kitchen', 8, '800.34', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:52', '2013-03-17 00:33:52', 20),
(40, 'Chest Freezer', 'You''ll have enough room for up to 105 lbs of frozen food', 8, '139.99', '2013-07-27 00:00:00', '2013-08-05 00:00:00', '2013-03-17 00:33:52', '2013-03-17 00:33:52', 20);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `postal_code` varchar(200) NOT NULL,
  `account_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `locations_account_id_foreign` (`account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `address`, `city`, `postal_code`, `account_id`) VALUES
(1, '1370 Marine Dr', 'Vancouver', 'V6R 4K5', 1),
(2, '1370 Marine Dr', 'Vancouver', 'V6R 4K5', 1),
(5, '1370 Marine Dr', 'Vancouver', 'V6R 4K5', 3),
(6, '1370 Marine Dr', 'Vancouver', 'V6R 4K5', 3),
(9, '5645 West Blvd, Vancouver', 'Vancouver', 'V8V3X4', 5),
(10, '5645 West Blvd, Vancouver', 'Vancouver', 'V8V3X4', 5),
(11, '1755 Davie St.', 'Vancouver', 'V8V3X4', 6),
(12, '1755 Davie St.', 'Vancouver', 'V8V3X4', 6),
(13, '1133 Hastings St ', 'Vancouver', 'V8V3X4', 7),
(14, '1133 Hastings St ', 'Vancouver', 'V8V3X4', 7),
(15, '1523 Davie St.', 'Vancouver', 'V8V3X4', 8),
(16, '1523 Davie St.', 'Vancouver', 'V8V3X4', 8),
(17, '1630 15th Ave W', 'Vancouver', 'V8V3X4', 9),
(18, '1370 Marine Dr', 'Vancouver', 'V6R 4K5', 9),
(19, '1630 15th Ave W', 'Vancouver', 'V8V3X4', 10),
(20, '601-1281 Georgia St ', 'Vancouver', 'V6E3J7', 10);

-- --------------------------------------------------------

--
-- Table structure for table `staticpages`
--

DROP TABLE IF EXISTS `staticpages`;
CREATE TABLE `staticpages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

INSERT INTO `market`.`staticpages` (`id`, `title`, `body`) VALUES 
(1, 'Main Page', 'This is the default page.');

--
-- Table structure for table `surveyresults`
--

DROP TABLE IF EXISTS `surveyresults`;
CREATE TABLE `surveyresults` (
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

DROP TABLE IF EXISTS `wishlistitems`;
CREATE TABLE `wishlistitems` (
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

DROP TABLE IF EXISTS `wishlistmatches`;
CREATE TABLE `wishlistmatches` (
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
  ADD CONSTRAINT `flags_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `flags_listing_id_foreign` FOREIGN KEY (`listing_id`) REFERENCES `listings` (`id`) ON DELETE CASCADE;

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
