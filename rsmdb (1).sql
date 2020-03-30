-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 30, 2020 at 05:27 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rsmdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `numtel` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `staffcount` int(11) NOT NULL,
  `sector` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `period_subscription` date DEFAULT NULL,
  `databasesize` int(11) DEFAULT NULL,
  `slatype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `supporttype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `email`, `adresse`, `numtel`, `website`, `staffcount`, `sector`, `file`, `activity`, `description`, `period_subscription`, `databasesize`, `slatype`, `supporttype`, `status`) VALUES
(2, 'Company2', 'Company2@mail.com', 'Company2Adresse', '22333333', 'www.secondCompany2.com', 11, 'medicine', 'hhfhfffff.pdf', 'produceeer', 'lonnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnge texxxxxxxxxxxxxxt', '2020-05-01', 1024, 'type2', 'support3', 1),
(4, 'Company1', 'Company1@mail.com', 'adressCompany1', '22555555', 'www.Company1.com', 25, 'informatique', 'hdhhdhhdskksllc.zip', 'produceCompany1', 'looooooooooooooooong texxxxxxxxxxxxte', '2020-04-01', 255, 'type1', 'support3', 1),
(5, 'Company5', 'Company5@mail.com', 'adressCompany5', '22555555', 'www.Company5.com', 25, 'informatique', 'hdhhdhhdskksllc.zip', 'produceCompany5', 'looooooooooooooooong texxxxxxxxxxxxte', '2020-04-01', 255, 'type1', 'support3', 1),
(6, 'Company4', 'Company4@mail.com', 'Company4Adresse', '22333333', 'www.secondCompany4.com', 11, 'medicine', 'hhfhfffff.pdf', 'produceeer', 'lonnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnge texxxxxxxxxxxxxxt', '2020-05-01', 1024, 'type2', 'support3', 1),
(8, 'Company9', 'Company9@mail.com', 'adressCompany9', '22555555', 'www.Company9.com', 25, 'informatique', 'hdhhdhhdskksllc.zip', 'produceCompany9', 'looooooooooooooooong texxxxxxxxxxxxte', '2020-04-01', 255, 'type3', 'support3', 1),
(9, 'Company10', 'Company10@mail.com', 'adressCompany10', '22555555', 'www.Company10.com', 25, 'informatique', 'hdhhdhhdskksllc.zip', 'produceCompany10', 'looooooooooooooooong texxxxxxxxxxxxte', '2020-04-01', 255, 'type3', 'support3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `equip`
--

DROP TABLE IF EXISTS `equip`;
CREATE TABLE IF NOT EXISTS `equip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F273C3B0979B1AD6` (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equip`
--

INSERT INTO `equip` (`id`, `company_id`) VALUES
(1, 2),
(13, 4);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8F3F68C5A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `user_id`, `date`, `action`, `module`, `url`) VALUES
(1, 9, '2020-03-18 00:00:00', 'Add User', 'User', '/user'),
(2, 9, '2020-03-18 00:00:00', 'Login', 'User', '/Login'),
(3, 10, '2020-03-18 00:00:00', 'Login', 'User', '/Login'),
(4, 9, '2020-03-18 00:00:00', 'Modify User', 'User', '/user'),
(5, 9, '2020-03-18 00:00:00', 'Modify User', 'User', '/user'),
(6, 10, '2020-03-18 00:00:00', 'Add Project', 'Project', '/project'),
(7, 14, '2020-03-18 00:00:00', 'Add Project', 'Project', '/project'),
(8, 10, '2020-03-18 00:00:00', 'Delete Project', 'Project', '/project'),
(9, 10, '2020-03-23 00:00:00', 'Modify Company', 'Company', '/company'),
(10, 9, '2020-03-23 00:00:00', 'Modify User', 'User', '/user'),
(11, 10, '2020-03-23 00:00:00', 'Modify Product', 'Product', '/product'),
(12, 10, '2020-03-23 00:00:00', 'Modify Media', 'Media', '/media'),
(13, 10, '2020-03-23 00:00:00', 'Add Referance', 'Referance', '/referance'),
(14, 10, '2020-03-23 00:00:00', 'Add Company', 'Company', '/company'),
(15, 10, '2020-03-23 00:00:00', 'Delete Company', 'Company', '/company'),
(16, 10, '2020-03-23 00:00:00', 'Modify Company', 'Company', '/company'),
(17, 9, '2020-03-23 00:00:00', 'Modify User', 'User', '/user'),
(18, 10, '2020-03-23 00:00:00', 'Login', 'User', '/Login'),
(19, 10, '2020-03-23 00:00:00', 'Add Project', 'Project', '/project'),
(20, 10, '2020-03-23 00:00:00', 'Modify Project', 'Project', '/project'),
(21, 10, '2020-03-23 00:00:00', 'Add Product', 'Product', '/product'),
(22, 10, '2020-03-23 00:00:00', 'Modify Product', 'Product', '/product'),
(23, 10, '2020-03-23 00:00:00', 'Add Media', 'Media', '/media'),
(24, 10, '2020-03-23 00:00:00', 'Modify Media', 'Media', '/media'),
(25, 10, '2020-03-23 00:00:00', 'Add Referance', 'Referance', '/referance'),
(26, 10, '2020-03-23 00:00:00', 'Add Referance', 'Referance', '/referance'),
(27, 10, '2020-03-23 00:00:00', 'Add Presentation', 'Presentation', '/presentation'),
(28, 10, '2020-03-24 00:00:00', 'Add Equip', 'Equip', '/Equip'),
(29, 10, '2020-03-24 00:00:00', 'Add Equip', 'Equip', '/Equip'),
(30, 10, '2020-03-24 00:00:00', 'Add Equip', 'Equip', '/Equip'),
(31, 10, '2020-03-24 00:00:00', 'Add Equip', 'Equip', '/Equip'),
(32, 10, '2020-03-24 19:15:16', 'Add Equip', 'Equip', '/Equip'),
(33, 10, '2020-03-24 20:36:43', 'Add Media', 'Media', '/media'),
(34, 10, '2020-03-25 20:12:57', 'Add Equip', 'Equip', '/Equip'),
(35, 10, '2020-03-25 20:18:54', 'Delete Equip', 'Equip', '/equip'),
(36, 9, '2020-03-27 23:16:52', 'Add User', 'User', '/user'),
(37, 17, '2020-03-27 23:22:32', 'Login', 'User', '/Login'),
(38, 17, '2020-03-27 23:23:12', 'Login', 'User', '/Login'),
(39, 17, '2020-03-27 23:23:31', 'Login', 'User', '/Login'),
(40, 17, '2020-03-27 23:25:48', 'Login', 'User', '/Login'),
(41, 17, '2020-03-27 23:26:10', 'Login', 'User', '/Login'),
(42, 17, '2020-03-27 23:26:31', 'Login', 'User', '/Login'),
(43, 17, '2020-03-27 23:26:50', 'Login', 'User', '/Login'),
(44, 17, '2020-03-27 23:27:10', 'Login', 'User', '/Login'),
(45, 17, '2020-03-27 23:27:32', 'Login', 'User', '/Login'),
(46, 17, '2020-03-27 23:27:49', 'Login', 'User', '/Login'),
(47, 16, '2020-03-27 23:59:45', 'Login', 'User', '/Login'),
(48, 10, '2020-03-28 17:42:51', 'Login', 'User', '/Login'),
(49, 10, '2020-03-28 17:48:21', 'Login', 'User', '/Login'),
(50, 10, '2020-03-28 17:57:47', 'Login', 'User', '/Login'),
(51, 10, '2020-03-28 17:59:52', 'Login', 'User', '/Login'),
(52, 9, '2020-03-28 18:02:46', 'Login', 'User', '/Login'),
(53, 10, '2020-03-28 19:10:01', 'Login', 'User', '/Login'),
(54, 10, '2020-03-30 16:44:53', 'Login', 'User', '/Login'),
(55, 10, '2020-03-30 16:46:59', 'Add Company', 'Company', '/company'),
(56, 10, '2020-03-30 17:05:12', 'Add Company', 'Company', '/company');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lien` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `titre`, `description`, `lien`, `type`) VALUES
(2, 'Logo2', 'logo Of company ', 'www.jjhfhhf.tn/logo2.png', 'image'),
(3, 'notLogo3', 'logo Of company ', 'www.jjhfhhf.tn/logo3.png', 'image'),
(4, 'video1', 'video Of company ', 'www.jjhfhhf.tn/video1.png', 'video'),
(5, 'video3', 'video Of company ', 'www.jjhfhhf.tn/video3.png', 'video');

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200319213906', '2020-03-19 21:40:02'),
('20200324155920', '2020-03-24 16:00:32'),
('20200327205203', '2020-03-27 21:15:42'),
('20200327211258', '2020-03-27 21:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `presentation`
--

DROP TABLE IF EXISTS `presentation`;
CREATE TABLE IF NOT EXISTS `presentation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `territories` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `presentation_creator_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9B66E8933B3A7487` (`presentation_creator_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presentation`
--

INSERT INTO `presentation` (`id`, `titre`, `territories`, `presentation_creator_id`) VALUES
(1, 'Presentation1', 'Nabeul', 9),
(2, 'Presentation2', 'Nabeul', 10),
(3, 'Presentation3', 'Nabeul', 11),
(4, 'Presentation4', 'Nabeul', 12),
(5, 'Presentation5', 'Nabeul', 12),
(6, 'Presentation6', 'Nabeul', 12);

-- --------------------------------------------------------

--
-- Table structure for table `presentation_media`
--

DROP TABLE IF EXISTS `presentation_media`;
CREATE TABLE IF NOT EXISTS `presentation_media` (
  `presentation_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  PRIMARY KEY (`presentation_id`,`media_id`),
  KEY `IDX_8C495AADAB627E8B` (`presentation_id`),
  KEY `IDX_8C495AADEA9FDD75` (`media_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presentation_media`
--

INSERT INTO `presentation_media` (`presentation_id`, `media_id`) VALUES
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(5, 3),
(6, 2),
(6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `presentation_project`
--

DROP TABLE IF EXISTS `presentation_project`;
CREATE TABLE IF NOT EXISTS `presentation_project` (
  `presentation_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`presentation_id`,`project_id`),
  KEY `IDX_B2C090B7AB627E8B` (`presentation_id`),
  KEY `IDX_B2C090B7166D1F9C` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presentation_project`
--

INSERT INTO `presentation_project` (`presentation_id`, `project_id`) VALUES
(2, 3),
(3, 4),
(3, 5),
(4, 3),
(6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `presentation_referance`
--

DROP TABLE IF EXISTS `presentation_referance`;
CREATE TABLE IF NOT EXISTS `presentation_referance` (
  `presentation_id` int(11) NOT NULL,
  `referance_id` int(11) NOT NULL,
  PRIMARY KEY (`presentation_id`,`referance_id`),
  KEY `IDX_3C64E4BAAB627E8B` (`presentation_id`),
  KEY `IDX_3C64E4BAE20AFABA` (`referance_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D34A04AD166D1F9C` (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `nom`, `logo`, `type`, `prix`, `description`, `project_id`) VALUES
(1, 'Product1', 'product11111.png', 'for something else', 25, 'loooooong texxxxxxxte', 3),
(3, 'product3', 'product3.png', 'for something', 20, 'loooooong texxxxxxxte', 8),
(4, 'product5', 'product5.png', 'for something', 20, 'loooooong texxxxxxxte', 5),
(5, 'product8', 'product8.png', 'for something', 20, 'loooooong texxxxxxxte', 10);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `territories` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `titre`, `logo`, `status`, `territories`) VALUES
(1, 'Project1', 'Project1_other.png', '1', 'nabeul'),
(3, 'Project3', 'Project3.png', '1', 'nabeul'),
(4, 'Project4', 'Project4_other.png', '1', 'nabeul'),
(5, 'Project5', 'Project5_other.png', '1', 'nabeul'),
(6, 'Project6', 'Project6_other.png', '1', 'nabeul'),
(8, 'Project8', 'Project8_other.png', '1', 'nabeul'),
(9, 'Project9', 'Project9_other.png', '1', 'nabeul'),
(10, 'Project10', 'Project1_other.png', '0', 'nabeul');

-- --------------------------------------------------------

--
-- Table structure for table `referance`
--

DROP TABLE IF EXISTS `referance`;
CREATE TABLE IF NOT EXISTS `referance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referance`
--

INSERT INTO `referance` (`id`, `titre`, `description`) VALUES
(1, 'referance1', 'lon____--------------------_____________________ger text to referance 1'),
(3, 'referance3', 'lonnnnnng text to referance 3'),
(4, 'referance4', 'lonnnnnng text tooooooooooooooooooooooooooooooo referance 4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `codepostal` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_tel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` json NOT NULL,
  `motpass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `equip_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `IDX_1483A5E9979B1AD6` (`company_id`),
  KEY `IDX_1483A5E98AC49FD9` (`equip_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `company_id`, `nom`, `prenom`, `email`, `adresse`, `codepostal`, `city`, `num_tel`, `sexe`, `role`, `motpass`, `date_naissance`, `equip_id`) VALUES
(9, 2, 'User5name', 'user5prename', 'user5@email.com', 'adrresUser5', '22', 'nabeul', '25222555', 'homme', '{}', '123', '1996-02-04', 1),
(10, 2, 'User3name', 'user3prename', 'user3@email.com', 'adrresUser3', '22', 'nabeul', '25222555', 'homme', '{}', '12345', '1996-02-04', 1),
(11, 4, 'User7name', 'user7prename', 'user7@email.com', 'adrresUser7', '22', 'nabeul', '25222555', 'homme', '{}', '123', '1996-02-04', 13),
(12, 4, 'User8name', 'user8prename', 'user8@email.com', 'adrresUser8', '22', 'nabeul', '25222555', 'homme', '{}', '123', '1996-02-04', NULL),
(13, 5, 'User9name', 'user9prename', 'user9@email.com', 'adrresUser9', '22', 'nabeul', '25222555', 'homme', '{}', '123', '1996-02-04', 1),
(14, 4, 'User10name', 'user10prename', 'user10@email.com', 'adrresUser10', '22', 'nabeul', '25222555', 'homme', '{}', '123', '1996-02-04', 13),
(15, 2, 'User11name', 'user11prename', 'user11@email.com', 'adrresUser11', '22', 'nabeul', '25222555', 'homme', '{}', '123', '1996-02-04', 1),
(16, 4, 'User12name', 'user12prename', 'user12@email.com', 'adrresUser12', '22', 'nabeul', '25222555', 'homme', '{}', '123', '1996-02-04', 13),
(17, 4, 'saif eddin', 'go', 'username14@mail.com', 'farhat hached,', '8023', 'somaa', '23249201', 'homme', '\"\"', '123456', '1996-09-16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_project`
--

DROP TABLE IF EXISTS `users_project`;
CREATE TABLE IF NOT EXISTS `users_project` (
  `users_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`users_id`,`project_id`),
  KEY `IDX_DFB3A42467B3B43D` (`users_id`),
  KEY `IDX_DFB3A424166D1F9C` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_project`
--

INSERT INTO `users_project` (`users_id`, `project_id`) VALUES
(9, 4),
(9, 5),
(9, 6),
(10, 10),
(14, 8),
(14, 9);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `equip`
--
ALTER TABLE `equip`
  ADD CONSTRAINT `FK_F273C3B0979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `FK_8F3F68C5A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `presentation`
--
ALTER TABLE `presentation`
  ADD CONSTRAINT `FK_9B66E8933B3A7487` FOREIGN KEY (`presentation_creator_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `presentation_media`
--
ALTER TABLE `presentation_media`
  ADD CONSTRAINT `FK_8C495AADAB627E8B` FOREIGN KEY (`presentation_id`) REFERENCES `presentation` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_8C495AADEA9FDD75` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `presentation_project`
--
ALTER TABLE `presentation_project`
  ADD CONSTRAINT `FK_B2C090B7166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B2C090B7AB627E8B` FOREIGN KEY (`presentation_id`) REFERENCES `presentation` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `presentation_referance`
--
ALTER TABLE `presentation_referance`
  ADD CONSTRAINT `FK_3C64E4BAAB627E8B` FOREIGN KEY (`presentation_id`) REFERENCES `presentation` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_3C64E4BAE20AFABA` FOREIGN KEY (`referance_id`) REFERENCES `referance` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_1483A5E98AC49FD9` FOREIGN KEY (`equip_id`) REFERENCES `equip` (`id`),
  ADD CONSTRAINT `FK_1483A5E9979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `users_project`
--
ALTER TABLE `users_project`
  ADD CONSTRAINT `FK_DFB3A424166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_DFB3A42467B3B43D` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
