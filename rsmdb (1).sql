-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 26, 2020 at 01:55 AM
-- Server version: 8.0.18
-- PHP Version: 7.4.0

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `email`, `adresse`, `numtel`, `website`, `staffcount`, `sector`, `file`, `activity`, `description`, `period_subscription`, `databasesize`, `slatype`, `supporttype`, `status`) VALUES
(2, 'Company3', 'Company2@mail.com', 'Company2Adresse', '22333333', 'www.secondCompany2.com', 11, 'medicine', 'NoImageSystemYet.JPG', 'produceeer', 'lonnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnge texxxxxxxxxxxxxxt', '2021-04-17', 1024, 'type2', 'support3', 1),
(4, 'Company1', 'Company1@mail.com', 'adressCompany1', '22555555', 'www.Company1.com', 25, 'informatique', 'hdhhdhhdskksllc.zip', 'produceCompany1', 'looooooooooooooooong texxxxxxxxxxxxte', '2020-04-01', 255, 'type1', 'support3', 1),
(6, 'Company4', 'Company4@mail.com', 'Company4Adresse', '22333333', 'www.secondCompany4.com', 11, 'medicine', 'jjjjjjj4.pdf', 'produceeer', 'lonnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnge texxxxxxxxxxxxxxt', '2020-05-01', 1024, 'type2', 'support3', 1),
(8, 'Company9', 'Company9@mail.com', 'adressCompany9', '22555555', 'www.Company9.com', 25, 'informatique', 'hdhhdhhdskksllc.zip', 'produceCompany9', 'looooooooooooooooong texxxxxxxxxxxxte', '2020-04-01', 255, 'type3', 'support3', 1),
(9, 'Company10', 'Company10@mail.com', 'adressCompany10', '22555555', 'www.Company10.com', 25, 'informatique', 'hdhhdhhdskksllc.zip', 'produceCompany10', 'looooooooooooooooong texxxxxxxxxxxxte', '2020-04-01', 255, 'type3', 'support3', 1),
(15, 'Company11', 'Company11@mail.com', 'adressCompany11', '22555555', 'www.Company11.com', 25, 'informatique', 'hdhhdhhdskksllc.zip', 'produceCompany11', 'looooooooooooooooong texxxxxxxxxxxxte', '2020-04-01', 255, 'type3', 'support3', 1),
(17, 'Company12', 'Company12@mail.com', 'adressCompany12', '22555555', 'www.Company12.com', 25, 'informatique', 'hdhhdhhdskksllc.zip', 'produceCompany12', 'looooooooooooooooong texxxxxxxxxxxxte', '2020-04-01', 255, 'type3', 'support3', 1),
(18, 'Company13', 'Company13@mail.com', 'adressCompany13', '22555555', 'www.Company13.com', 25, 'informatique', 'hdhhdhhdskksllc.zip', 'produceCompany13', 'looooooooooooooooong texxxxxxxxxxxxte', '2020-04-01', 255, 'type3', 'support3', 1),
(19, 'Company14', 'Company14@mail.com', 'adressCompany13', '22555555', 'www.Company13.com', 25, 'informatique', 'hdhhdhhdskksllc.zip', 'produceCompany13', 'looooooooooooooooong texxxxxxxxxxxxte', '2020-04-01', 255, 'type3', 'support3', 1),
(20, 'Company25', 'Company25@mail.com', 'adressCompany13', '22555555', 'www.Company13.com', 25, 'informatique', 'hdhhdhhdskksllc.zip', 'produceCompany13', 'looooooooooooooooong texxxxxxxxxxxxte', '2020-04-01', 255, 'type3', 'support3', 1),
(21, 'Company26', 'Company26@mail.com', 'adressCompany13', '22555555', 'www.Company13.com', 25, 'informatique', 'hdhhdhhdskksllc.zip', 'produceCompany13', 'looooooooooooooooong texxxxxxxxxxxxte', '2020-04-01', 255, 'type3', 'support3', 1),
(22, 'Company27', 'Company27@mail.com', 'adressCompany13', '22555555', 'www.Company13.com', 25, 'informatique', 'hdhhdhhdskksllc.zip', 'produceCompany13', 'looooooooooooooooong texxxxxxxxxxxxte', '2020-04-01', 255, 'type3', 'support3', 1),
(23, 'Company28', 'Company28@mail.com', 'adressCompany13', '22555555', 'www.Company13.com', 25, 'informatique', 'hdhhdhhdskksllc.zip', 'produceCompany13', 'looooooooooooooooong texxxxxxxxxxxxte', '2020-04-01', 255, 'type3', 'support3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `equip`
--

DROP TABLE IF EXISTS `equip`;
CREATE TABLE IF NOT EXISTS `equip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F273C3B0979B1AD6` (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equip`
--

INSERT INTO `equip` (`id`, `company_id`) VALUES
(3, 2),
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8F3F68C5A76ED395` (`user_id`),
  KEY `IDX_8F3F68C5979B1AD6` (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `user_id`, `date`, `action`, `module`, `url`, `company_id`) VALUES
(45, 10, '2020-04-25 22:17:00', 'Add Media', 'Media', '/media', 2),
(46, 10, '2020-04-25 22:29:09', 'Add Project', 'Project', '/project', 2),
(47, 10, '2020-04-25 22:42:00', 'Add Product', 'Product', '/product', 2),
(48, 25, '2020-04-25 22:57:49', 'Add Media', 'Media', '/media', 4),
(49, 10, '2020-04-25 23:04:49', 'Add Project', 'Project', '/project', 2),
(50, 25, '2020-04-25 23:07:20', 'Add Product', 'Product', '/product', 4),
(51, 25, '2020-04-25 23:08:19', 'Modify Product', 'Product', '/product', 4),
(52, 29, '2020-04-26 00:03:01', 'Add Company', 'Company', '/company', 21),
(53, 30, '2020-04-26 00:05:20', 'Add Company', 'Company', '/company', 22),
(54, 31, '2020-04-26 00:07:33', 'Add Company', 'Company', '/company', 23),
(55, 10, '2020-04-26 00:13:24', 'Add Equip', 'Equip', '/Equip', 2);

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
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6A2CA10C979B1AD6` (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `titre`, `description`, `lien`, `type`, `company_id`) VALUES
(10, 'logo1', 'logo company 4', '/llll/fff.png', 'pic', 4),
(11, 'logo 2', 'logo company 2', 'kgkkgjjff.png', 'pics', 8),
(12, 'logo2', 'logo company 5', '/llll/fff.png', 'pic', 4),
(13, 'logo 3', 'logo company 2', 'kgkkgjjff.png', 'pics', 8),
(14, 'logo 3', 'logo company 2', 'kgkkgjjff.png', 'pics', 15),
(15, 'logo 5', 'logo company 5', 'kgkkgjjff.png', 'pics', 15),
(16, 'logo3', 'logo company 4', '/llll/fff.png', 'pic', 4),
(17, 'video1', 'video Of company ', '---', 'video', 4),
(18, 'video2', 'video Of company ', '---', 'video', 4),
(19, 'video2', 'video Of company ', '---', 'video', 2),
(20, 'video2', 'video Of company ', '---', 'video', 2),
(21, 'video3', 'video Of company ', '---', 'video', 2),
(22, 'file1', 'content', '---', 'all', 4);

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200409155946', '2020-04-09 16:08:23'),
('20200424204121', '2020-04-24 20:43:48'),
('20200424232101', '2020-04-24 23:24:49'),
('20200425010927', '2020-04-25 01:11:54'),
('20200425014709', '2020-04-25 01:47:27'),
('20200425191856', '2020-04-25 19:19:30'),
('20200425192734', '2020-04-25 19:28:08');

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
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9B66E8933B3A7487` (`presentation_creator_id`),
  KEY `IDX_9B66E893979B1AD6` (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D34A04AD166D1F9C` (`project_id`),
  KEY `IDX_D34A04AD979B1AD6` (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `nom`, `logo`, `type`, `prix`, `description`, `project_id`, `company_id`) VALUES
(13, 'k', 'NoImageSystemYet.JPG', 'all', 10, 'desc', 11, 2),
(14, 'product8', 'product8.png', 'for something', 20, 'loooooong texxxxxxxte', NULL, 2),
(15, 'product1555', 'NoImageSystemYet.JPG', 'all', 200, 'desc', 11, 2),
(16, 'product', 'NoImageSystemYet.JPG', 'fruit', 80, 'prod111111', NULL, 4);

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
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2FB3D0EE979B1AD6` (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `titre`, `logo`, `status`, `territories`, `company_id`) VALUES
(11, 'Project10', 'Project10.png', '1', 'nabeul', 2),
(12, 'projectcompnany2', 'NoImageSystemYet.JPG', '1', 'nabeul', 2),
(13, 'Project10', 'Project10.png', '1', 'nabeul', 2),
(14, 'Project10', 'Project10.png', '1', 'nabeul', 2),
(15, 'Project10', 'Project10.png', '1', 'nabeul', 2);

-- --------------------------------------------------------

--
-- Table structure for table `referance`
--

DROP TABLE IF EXISTS `referance`;
CREATE TABLE IF NOT EXISTS `referance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_21C1DE44979B1AD6` (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referance`
--

INSERT INTO `referance` (`id`, `titre`, `description`, `company_id`) VALUES
(6, 'referance1', 'lonnnnnng text tooooooooooooooooooooooooooooooo referance 1', 4),
(7, 'referance2', 'lonnnnnng text tooooooooooooooooooooooooooooooo referance 2', 2),
(8, 'referance2', 'lonnnnnng text tooooooooooooooooooooooooooooooo referance 2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `refresh_tokens`
--

DROP TABLE IF EXISTS `refresh_tokens`;
CREATE TABLE IF NOT EXISTS `refresh_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `refresh_token` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_9BACE7E1C74F2195` (`refresh_token`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `refresh_tokens`
--

INSERT INTO `refresh_tokens` (`id`, `refresh_token`, `username`, `valid`) VALUES
(1, 'e5930a8c86daa235e9d91c8525823e9d84005079fe2b7860c2df88d22c9628a71db04ac84e664aaa3ab7af4504d7d75b63caffe06b54040a3d7afd37f3664650', 'user11@email.com', '2020-04-09 18:17:47'),
(2, '1192108788ef19a010ae784e92adc70d43c6bab5adb3135adeb98a25ba9fa6785a63a814e848584f7ce2a9943e9b111f5f2f619cf05a58d938dfc9f7ea30a707', 'user11@email.com', '2020-04-09 18:21:16'),
(3, 'e057005003b073323a6328a7d795f6568592bba5c13248806f1ac6d60aa9cec06a6aff272edf9d57bb043811450dbbf4f826f41c3b28ae926fa359fa97253b3f', 'user11@email.com', '2020-04-09 18:21:43'),
(4, 'beea474cbd0f976431964dd1174a1eb03045701b22b61b2b7e4d44e0ce4cd52fccedad6402d7952ddeade3ec51420e0eeee7531974371b19d09c0ad885f546c9', 'user11@email.com', '2020-04-09 18:28:28'),
(5, '785a7c2d90cc95983aee3ab576549d34bcd153e7b098b38a633eabdf1e987731800baecccca2d4fcfa27768e7ca0c0c2103465d93449f559f83e79f12379fba9', 'user11@email.com', '2020-04-09 18:29:34'),
(6, '78e12dec8ecaa8e8c08eefbc574ed15b6d2dc3e78dc2c3027b824865641972ef8f594e1fa75e5b6aacf6a92ec2aae86e0eb1ae85ae5188c95ddbd2b108ae4e99', 'user11@email.com', '2020-04-09 18:30:18'),
(7, '5bb0fbab1f57dd7cec9ec131599be12d760cd8e5249a9fe58039e507fad10636076e98731772b5417050665300d589837f7e20da033f348477f1d9fe0011553f', 'user11@email.com', '2020-04-09 18:31:50'),
(8, '2889b295158fe1473a9d20255c6b770e0e79a0dccaa463634f4294fd32255f90944326ba00e5a50c5759d83cc8fbb27edc24e5759d951468b8e5e4e06f0ec6f5', 'user11@email.com', '2020-04-09 19:00:08'),
(9, '8f78e70d85e5c5214048f2ccbcbba107afbe461e7689fce5672dc1bd98a3a4e9c9591a6ec3d0c64076244b524518e5bb4b780ea45f22da865c8e367f4169ccaa', 'user11@email.com', '2020-04-09 19:05:19'),
(10, '406b44a022287eb244a9c0d956a1f47c990c3795b4527fca0d7e1765fdcf70d803645cb307b3a15b2f2b6b27ab1b9d4c59f5965216de94d6e05bfaac7a3da74d', 'user3@email.com', '2020-04-14 17:30:36'),
(11, '9401c7bd07e271f9dbabece08ee95f184e911188a92cbb44812e0aad9a4900407e2a5211b99fc0dc2139bee0366fb02c536a89223b83f63c851f05a3f5c82003', 'user3@email.com', '2020-04-14 17:35:23'),
(12, 'a66e3e8ffcb08c4910e92a49a958940d32226eddf4abb61f82bb396b4c8d0b9eb3aa97802d1d74c066a8a76a2384da8c9e6986d35dff2f9cb1d86b86b6924a38', 'user3@email.com', '2020-04-14 18:26:37'),
(13, '3b8d498d90d661153205815af9a56015914f0561090132ebb5f404c3ed23a644ae4bbf3406dc231c2b6ba73deeebdf6d13e5b4e83ddb4da7b9a073224263c5d7', 'user3@email.com', '2020-04-14 18:49:16'),
(14, 'a71666169d36d387b1993a94d23fbd362ade93df5e93219e9342f4dfce8d29613af2a714a8ab5fbec399572cc5ba304ec223af0a82e85db5923415925515d8ed', 'user3@email.com', '2020-04-14 18:54:14'),
(15, '494474373042537aa60035e9a922c46d088d52def9af8de7d84597e239cda15117613ef4c9bf9e6b83efd364b444bf4255ee3b55d0d3fbfd493bb76dfada3836', 'user3@email.com', '2020-04-14 19:30:57'),
(16, 'c6749843abda025df1e673046df1748d3b88eb945e09b78da0e7fa69fba0db48ca030765312d74bbc5c0dec4fd97116b39a6dec7ab59b1c779431a971ab9a661', 'user3@email.com', '2020-04-14 19:35:39'),
(17, '1a363aaca5812c952bd45c08ec0af81ebc1e45ff8f1014b265a4f8114c462604a34a9b719ca9f239615f25985a98f7a829694f7adfbc0577de3a9684d33ed3b9', 'user3@email.com', '2020-04-14 19:40:47'),
(18, 'f7ab676357585aef0377c5cc274d187efa9a33c6cfbaa6b0357d5a24b9111225375319843c15958c509c6ffe17fd923e2881928e796a9f1c69ef45119525def7', 'user3@email.com', '2020-04-14 19:45:28'),
(19, 'f039fd4f338a461a352059fa43fbe67d78a0ec644c6a165b6a2dd177c771b9e4fb5696dac1a27ca051786cb183d8e656e5b525e43becf6a389ea7a5edbb25b03', 'user3@email.com', '2020-04-14 20:12:04'),
(20, 'cdf8c939140bb27cfe987a4601a786b4b3226fa36bb59000b1e1cedd92b969fc7f4d1b54a0131a0a24758a2e711b2ac883a20fc78af4de06307d45ffc5c1d7be', 'user7@email.com', '2020-04-14 23:28:33'),
(21, 'fe92169b30ce1630f06096f539dbd555de942c32d5f93dc2b7096c0efe6f31824b93e31c1e3aba8f66aeedeca215838366ad76860e10e03d8db79e73ccb6c50a', 'user7@email.com', '2020-04-15 17:59:39'),
(22, '1588742b067fa695f3b773a39ba126928bf30dfb9c2e532ee16e9ea7c0ee8a797aa5b3df872d8a6a3a69187b6c45c34bd22ea121ab145fcacbd90f6c1669ab10', 'user7@email.com', '2020-04-15 18:07:59'),
(23, '044d3b8edb58126027c889d556068ae0cdbe3a6823321044040ff8be5f0ef2dde008627dcc9916b3aa4d71f1e4cfe821c5065f5234f9c8a6beee325a1e850c80', 'user7@email.com', '2020-04-15 20:23:15'),
(24, '745aade23d461659936d0426151d9a1f7c7e04c4f3e397de4fb8d4858ee12c456e7fc1ddd2fc77d6dd01743f9e922b10b6cbf3dbb69416211a5e9fe1bca25e81', 'user7@email.com', '2020-04-16 18:12:20'),
(25, 'fe67dbb4ff35b24a7838d613e2a116540bc598d18b5a0cb268452a9a0a3f4b083bc0da67a556b43606457051fc9a09f2bdf23669062ce1f987d694b38349b49a', 'user3@email.com', '2020-04-22 01:00:50'),
(26, '2c869efb394ded3fd5ca7a92a6378c0ba4249823ab6f360b3542854cc8efcb3263731ee4b28b84501160a7178f5e1238b4e47e72f618cde05fc78606f3dbb117', 'user3@email.com', '2020-04-22 01:22:26'),
(27, '356fb37dbfa601ed73a28daa0b850fbc7b33a2f65c25834f6404ad4f21af217c96e6acf8b3a2a74032fac62b57ce5de7eb9fb42593f99a9dc42a40ad48884518', 'user5@email.com', '2020-04-22 16:58:20'),
(28, 'bd9d4e74342efc1d47dcbf584f79a571b6303dd7f9c56b1252414f6f98e017573dbfcd26b752f55c814f3033d486f163c02dd3967a679cd0d450894c96bfed10', 'user5@email.com', '2020-04-22 18:19:02'),
(29, '74a24a8f9058916088e4f186c1d1e8ce406607f21d3d42d7e40a6f6d0c308106073387063241f972aa4b7b1978c51dc7d765d8c897750dfd58e9c8bd4f5b8f5c', 'user7@email.com', '2020-04-22 19:20:53'),
(30, '6c4f502f43d52c665caca15232077a8121132b3b42c71a5579c6996066f6125899039362ed7ba140fdeb5e7c2693897bd401f508cb11b7c4e46bc6a913856ff1', 'user5@email.com', '2020-04-22 19:23:12'),
(31, 'a01e9b7246a718c56e73bde456f2ed2f2dfc3e0ee5ee2edd974d14912a13d4301ff6acdbd12e96f7b9ed7bab33d4a8ed1b15a4f891b0aac2392ea18e48300f5c', 'user5@email.com', '2020-04-22 19:32:09'),
(32, 'e7e84de02b55422c4c31430b937b7fca17b5254631755b3e1a11cf82a7ff8469376db559bafca9d88cf07339d3036dddaf570c51e3f7fd643d54592ebf7de16f', 'user12@email.com', '2020-04-22 19:54:05'),
(33, '5b38003e0c0317236d6a30bec3f61d196be9b27b6e3b8db0d9b1792af444a3e30722c570e4e0de1e5cd65f6d4ccfe4e702455eef3af44a3b6bbb3c6ec5c5720e', 'user12@email.com', '2020-04-22 19:54:46'),
(34, '632229b0810a0606cdb5a5e5629605b89b0a1af983fcd5c69c755a2ee852a1bc8ea89ef7dc644429f057baad59922f5970eda2fdb189a25037f5743fbfcc8a98', 'user16@email.com', '2020-04-22 20:00:42'),
(35, '47eb9ba480a13a40d7a9db5c0631fc2b305cbae53f09d503b308e5d6c880fab04d18f98e6ac61a1095b8606eb7a04f6a9f4d78d46a9701dfc8656848c90bdb96', 'user16@email.com', '2020-04-22 20:06:10'),
(36, '5ff10a0db08b57cd9ab99c8e4ce9b63dd3549d71d5ee6e7bace4ed3dec80942688bf4096fadc74f89dcde128360d9ee84142c9f561eff6e4f866e36067ac38f8', 'user16@email.com', '2020-04-22 20:33:00'),
(37, 'b0d20bc92dbf4ff9081e161f622e61539db1d208add2339f7d1570c725247b3db74d3a4cd1de94a08a0db1a985731e0ce31ed4bf280b18a163a3d92ac005b5bc', 'user16@email.com', '2020-04-22 20:34:18'),
(38, '3966793f4d346487903fe747ab32d82c34937c33bf49f6ba0afb03a0f96f33cf2eddb8fbfd7e17eacfd91aa3fa5527b54ce3091ec455ab4251b29835fe82f8f2', 'user5@email.com', '2020-04-22 20:45:31'),
(39, 'ffecfd65130a67566cc58695881c121ee4913812358bc6f64cb58c5f134726c387ba384b36ae7a42731a245ac3f724482ff9cc8735185be9e63df124fa31fd77', 'user16@email.com', '2020-04-22 20:53:06'),
(40, '1f98f540ab34492538ed367e68abfab2cc08998bec1355f7647dc7c5e5381257305324cc5e648e462acad5adb3bc89eeee5bb22e0751c64cbfd66838e7b1c050', 'user5@email.com', '2020-04-22 22:00:25'),
(41, 'a85f6872c0574a9f8d0d0ecd2694947c58f27e04d43265a984c0bc041e2e1d4139061b508dae2359dde7a17d1ce391e3a8652e15e00dc7fe066e329c87f7ecdc', 'user11@email.com', '2020-04-22 22:07:00'),
(42, '304f62f7b8a367c7c56380fd3d737d0d5fd6d0f073d5af5dc53af63eeff43a20aa5eba9dc40540007c3cfb0284dc7fdc94f764ba9fdb2c9ed42fdecb3fe3b9b0', 'user3@email.com', '2020-04-22 23:27:07'),
(43, 'ceba7ecf0da99a99a673ccad34c099bcaf06929d92c07a753b1e24782a25640804d88aa6b60b4d66c25203c67806c4152176f640832cc6c4fa1ec6c8373ace77', 'user5@email.com', '2020-04-23 00:48:36'),
(44, 'dc78f223db166e0778cdb776f36792ad3d6a127899f03d96d2b013f79dfe6ed9b6eebb07cf10d9b0b13cbdc32dd16980a8007f4b43036fd8abe8c02748bef330', 'user5@email.com', '2020-04-23 01:00:12'),
(45, 'f65d8f1aa5e451d5a320f4a58ef708e448d9d6f506cd4b4277c6252dea5b19bc7f4a2f26a8a5a0b1d62087ac4b0579bc286494397e26361d46bff2bde1d8fccb', 'user10@email.com', '2020-04-23 01:09:57'),
(46, '03dd11698227ab3ea3052f90ed4077bd38f828f935e946d286144dd24f426b862f2640385cadd39364f1b631883e931b3e2ff6086198c3e0d9c963297b201160', 'user10@email.com', '2020-04-23 01:11:23'),
(47, '85ead73b7ac13c827ca6d14f5976629c4115deb85050c6ab0ccf902c00b08e099f9211aa6beb7978c2432662584fa5610ae368ecaeac1eb83160d3a8c3df22b7', 'user11@email.com', '2020-04-24 20:19:10'),
(48, '0aa30d153d9675ac24bdb972003c863aad8fc893819d80badfad7b569948754348bfc046fa16ab24e71d5f877226e2e24e139cad62c84081287d0529737b1b7c', 'user7@email.com', '2020-04-24 23:23:45'),
(49, 'e2124c44470a9e54d5ff2f86fed736a66e8da2641a1d77c3974b966826b319c6876526d6f21001c31ee8f726d560556cba2b83f6282c3763d8d883b6c584776b', 'user7@email.com', '2020-04-24 23:44:42'),
(50, '32fabb0952a33c566a6ef98e9389ad48863743b3931ed5a492948e30f5787cd7ef56bd538878073cc0848dc33bd92f48d0934de23a365a23ee84d67c45098bd3', 'user16@email.com', '2020-04-25 00:12:01'),
(51, 'd37028d6396b908b88dd219814d9132efcd1a35029121a87260da8ad0203303c3e9eee99b63b980507f871fdca5c8e014cfc9317fbe3ca3f7b412c3557500ee9', 'user16@email.com', '2020-04-25 01:45:19'),
(52, '43cdf697b1b130c19ca74d0d490e0f6d19d60f8646d180f04304daa5923cb05680cfd434e349fa926bc037fcc61a49144a551f6a75c56cda05846b425c7254c0', 'user3@email.com', '2020-04-25 01:59:38'),
(53, 'ea23fc99071901e7ff06e4d03e18abc1611cc9a46b4ca89fbf5613ec2fb8f0fc1d7a993a7bd246b274aa9f49bb1079eb16f3d6653d15738d944dc4cb71210086', 'user3@email.com', '2020-04-25 21:21:16'),
(54, '8d576567341fccf8d959f358197c38c828dd0204df267e2aab3eabdd92331fcbf21436e9d8de7375af84ea8a4e58f7c80c77d054cd096a135de60a1841e2e377', 'user3@email.com', '2020-04-25 21:50:39'),
(55, 'bef6203f887e0e067234060d02adde8e16007f6d432349a550205fa6290d94d7e521c6b486a3ac38b836f92849a273d21149fb85a98d150e5392001d5a0c2b8f', 'user3@email.com', '2020-04-25 23:13:06'),
(56, 'bab82106ebcca41b60ba6c604d2b9ea5e6fa367f2e37c7c49fcf58dc0f0e722c97b61bfc300d42af8630cfb4c42fa7f15c51e63b73056ca68ad6ea350cbd32e6', 'user3@email.com', '2020-04-25 23:39:54'),
(57, '89cddc359a2b92a094346e6cbe5faf479d654b6023541b76c41ea55de2577e476ab7d0c2bdedf50bfa8340c748f945ee94f9385667835d6faee6981bec57c44f', 'user16@email.com', '2020-04-25 23:54:06'),
(58, 'a6a053eeb581f0374d88858f3b3a25490a156a26237703ef6b32de1a5c130662ed4ce6652159c7181d67b0ee02cbeb7609c296003b05690437d5d535d46fc651', 'user3@email.com', '2020-04-26 01:12:10');

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
  `roles` json NOT NULL,
  `motpass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `equip_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `IDX_1483A5E9979B1AD6` (`company_id`),
  KEY `IDX_1483A5E98AC49FD9` (`equip_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `company_id`, `nom`, `prenom`, `email`, `adresse`, `codepostal`, `city`, `num_tel`, `sexe`, `roles`, `motpass`, `date_naissance`, `equip_id`) VALUES
(9, 2, 'User5name', 'user5prename', 'user5@email.com', 'adrresUser5', '22', 'nabeul', '25222555', 'homme', '\"ROLE_VIEWER\"', '$2y$12$M/gQzNG7Z/pOX65eggz3guzGDJk1VPZfyy8X564xSpleWzheGP0OW', '1996-02-04', 3),
(10, 2, 'User3name', 'user3prename', 'user3@email.com', 'adrresUser3', '22', 'nabeul', '25222555', 'homme', '\"ROLE_ADMIN\"', '$2y$12$ldcJLmiwEjlX7WyPUd0ZKuMNQYlYdk4dq/YSFB8f7gP5T6GSh4bCu', '1996-03-04', 3),
(11, 4, 'User7name', 'user7prename', 'user7@email.com', 'adrresUser7', '22', 'nabeul', '25222555', 'homme', '\"ROLE_MANAGER\"', '$2y$12$M/gQzNG7Z/pOX65eggz3guzGDJk1VPZfyy8X564xSpleWzheGP0OW', '1996-02-04', 1),
(12, 4, 'User8name', 'user8prename', 'user8@email.com', 'adrresUser8', '22', 'nabeul', '25222555', 'homme', '\"ROLE_MANAGER\"', '$2y$12$M/gQzNG7Z/pOX65eggz3guzGDJk1VPZfyy8X564xSpleWzheGP0OW', '1996-02-04', 1),
(14, 4, 'User10name', 'user10prename', 'user10@email.com', 'adrresUser10', '22', 'nabeul', '25222555', 'homme', '\"ROLE_EDITOR\"', '$2y$12$M/gQzNG7Z/pOX65eggz3guzGDJk1VPZfyy8X564xSpleWzheGP0OW', '1996-02-04', 1),
(15, 2, 'User11name', 'user11prename', 'user11@email.com', 'adrresUser11', '22', 'nabeul', '25222555', 'homme', '\"ROLE_MANAGER\"', '$2y$12$M/gQzNG7Z/pOX65eggz3guzGDJk1VPZfyy8X564xSpleWzheGP0OW', '1996-02-04', 1),
(16, 4, 'User12name', 'user12prename', 'user12@email.com', 'adrresUser12', '22', 'nabeul', '25222555', 'homme', '\"ROLE_EDITOR\"', '$2y$12$M/gQzNG7Z/pOX65eggz3guzGDJk1VPZfyy8X564xSpleWzheGP0OW', '1996-02-04', 1),
(20, 15, 'Company11', 'Company', 'Company11@mail.com', 'adressCompany11', '0000', '--', '22555555', 'Homme', '\"ROLE_ADMIN\"', 'admin', '2020-03-31', 1),
(22, 17, 'Company12', 'Company', 'Company12@mail.com', 'adressCompany12', '0000', '--', '22555555', 'Homme', '\"ROLE_ADMIN\"', 'admin', '2020-03-31', 1),
(23, 18, 'Company13', 'Company', 'Company13@mail.com', 'adressCompany13', '0000', '--', '22555555', 'Homme', '\"ROLE_ADMIN\"', 'admin', '2020-03-31', 1),
(25, 4, 'User16name', 'user16prename', 'user16@email.com', 'adrresUser16', '22', 'nabeul', '25222555', 'homme', '\"ROLE_ADMIN\"', '$2y$12$M/gQzNG7Z/pOX65eggz3guzGDJk1VPZfyy8X564xSpleWzheGP0OW', '1996-02-04', 1),
(26, 4, 'User20name', 'user20prename', 'user20@email.com', 'adrresUser20', '22', 'nabeul', '25222555', 'homme', '\"ROLE_ADMIN\"', '$2y$12$M/gQzNG7Z/pOX65eggz3guzGDJk1VPZfyy8X564xSpleWzheGP0OW', '1996-02-04', NULL),
(27, 4, 'User21name', 'user21prename', 'user21@email.com', 'adrresUser21', '22', 'nabeul', '25222555', 'homme', '\"ROLE_ADMIN\"', '$2y$12$M/gQzNG7Z/pOX65eggz3guzGDJk1VPZfyy8X564xSpleWzheGP0OW', '1996-02-04', NULL),
(28, 20, 'Company25', 'Company', 'Company25@mail.com', 'adressCompany13', '22', 'nabeul', '22555555', 'Homme', '[\"ROLE_ADMIN\"]', '$2y$12$bXAjvUOuOHgnUJVmPtq9o.i/YpS.uGObmB2AYYZEPc/1BQf5G7Rsu', '2020-04-25', NULL),
(29, 21, 'Company26', 'Company', 'Company26@mail.com', 'adressCompany13', '22', 'nabeul', '22555555', 'Homme', '[\"ROLE_ADMIN\"]', '$2y$12$ic/LXHpUElALOffi40JXve4jVNpjV88/zx2pu7xiCf5DyekL0gF/O', '2020-04-26', NULL),
(30, 22, 'Company27', 'Company', 'Company27@mail.com', 'adressCompany13', '22', 'nabeul', '22555555', 'Homme', '[\"ROLE_ADMIN\"]', '$2y$12$xzB8iyLXuWVNxofKYCjoMO78Gc/raqRgCyTRgTsFTnO14lEMRDJLO', '2020-04-26', NULL),
(31, 23, 'Company28', 'Company', 'Company28@mail.com', 'adressCompany13', '22', 'nabeul', '22555555', 'Homme', '[\"ROLE_ADMIN\"]', '$2y$12$EGBPkRa/Dx46isS.1YUEgeTo7mWhdP161FsvWDTTXcD1q5WrwcV.e', '2020-04-26', NULL);

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
(10, 11),
(10, 12),
(10, 13),
(10, 14),
(10, 15);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `equip`
--
ALTER TABLE `equip`
  ADD CONSTRAINT `FK_F273C3B0979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `FK_8F3F68C5979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `FK_8F3F68C5A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `FK_6A2CA10C979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `presentation`
--
ALTER TABLE `presentation`
  ADD CONSTRAINT `FK_9B66E8933B3A7487` FOREIGN KEY (`presentation_creator_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_9B66E893979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

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
  ADD CONSTRAINT `FK_D34A04AD166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`),
  ADD CONSTRAINT `FK_D34A04AD979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `FK_2FB3D0EE979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Constraints for table `referance`
--
ALTER TABLE `referance`
  ADD CONSTRAINT `FK_21C1DE44979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

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
