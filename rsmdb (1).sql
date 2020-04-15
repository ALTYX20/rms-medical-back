-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 15, 2020 at 05:33 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `email`, `adresse`, `numtel`, `website`, `staffcount`, `sector`, `file`, `activity`, `description`, `period_subscription`, `databasesize`, `slatype`, `supporttype`, `status`) VALUES
(2, 'Company2', 'Company2@mail.com', 'Company2Adresse', '22333333', 'www.secondCompany2.com', 11, 'medicine', 'hhfhfffff.pdf', 'produceeer', 'lonnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnge texxxxxxxxxxxxxxt', '2020-05-01', 1024, 'type2', 'support3', 1),
(4, 'Company1', 'Company1@mail.com', 'adressCompany1', '22555555', 'www.Company1.com', 25, 'informatique', 'hdhhdhhdskksllc.zip', 'produceCompany1', 'looooooooooooooooong texxxxxxxxxxxxte', '2020-04-01', 255, 'type1', 'support3', 1),
(6, 'Company4', 'Company4@mail.com', 'Company4Adresse', '22333333', 'www.secondCompany4.com', 11, 'medicine', 'jjjjjjj4.pdf', 'produceeer', 'lonnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnge texxxxxxxxxxxxxxt', '2020-05-01', 1024, 'type2', 'support3', 1),
(8, 'Company9', 'Company9@mail.com', 'adressCompany9', '22555555', 'www.Company9.com', 25, 'informatique', 'hdhhdhhdskksllc.zip', 'produceCompany9', 'looooooooooooooooong texxxxxxxxxxxxte', '2020-04-01', 255, 'type3', 'support3', 1),
(9, 'Company10', 'Company10@mail.com', 'adressCompany10', '22555555', 'www.Company10.com', 25, 'informatique', 'hdhhdhhdskksllc.zip', 'produceCompany10', 'looooooooooooooooong texxxxxxxxxxxxte', '2020-04-01', 255, 'type3', 'support3', 1),
(15, 'Company11', 'Company11@mail.com', 'adressCompany11', '22555555', 'www.Company11.com', 25, 'informatique', 'hdhhdhhdskksllc.zip', 'produceCompany11', 'looooooooooooooooong texxxxxxxxxxxxte', '2020-04-01', 255, 'type3', 'support3', 1),
(17, 'Company12', 'Company12@mail.com', 'adressCompany12', '22555555', 'www.Company12.com', 25, 'informatique', 'hdhhdhhdskksllc.zip', 'produceCompany12', 'looooooooooooooooong texxxxxxxxxxxxte', '2020-04-01', 255, 'type3', 'support3', 1),
(18, 'Company13', 'Company13@mail.com', 'adressCompany13', '22555555', 'www.Company13.com', 25, 'informatique', 'hdhhdhhdskksllc.zip', 'produceCompany13', 'looooooooooooooooong texxxxxxxxxxxxte', '2020-04-01', 255, 'type3', 'support3', 1),
(19, 'Company14', 'Company14@mail.com', 'adressCompany13', '22555555', 'www.Company13.com', 25, 'informatique', 'hdhhdhhdskksllc.zip', 'produceCompany13', 'looooooooooooooooong texxxxxxxxxxxxte', '2020-04-01', 255, 'type3', 'support3', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  PRIMARY KEY (`id`),
  KEY `IDX_8F3F68C5A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `user_id`, `date`, `action`, `module`, `url`) VALUES
(1, 15, '2020-04-09 16:14:54', 'Login', 'User', '/Login'),
(2, 15, '2020-04-09 16:39:47', 'Login', 'User', '/Login'),
(3, 15, '2020-04-09 17:15:08', 'Login', 'User', '/Login'),
(4, 15, '2020-04-09 17:16:49', 'Login', 'User', '/Login'),
(5, 15, '2020-04-09 17:17:47', 'Login', 'User', '/Login'),
(6, 15, '2020-04-09 17:21:15', 'Login', 'User', '/Login'),
(7, 15, '2020-04-09 17:21:42', 'Login', 'User', '/Login'),
(8, 15, '2020-04-09 17:28:27', 'Login', 'User', '/Login'),
(9, 15, '2020-04-09 17:29:34', 'Login', 'User', '/Login'),
(10, 15, '2020-04-09 17:30:18', 'Login', 'User', '/Login'),
(11, 15, '2020-04-09 17:31:50', 'Login', 'User', '/Login'),
(12, 15, '2020-04-09 18:00:07', 'Login', 'User', '/Login'),
(13, 15, '2020-04-09 18:05:18', 'Login', 'User', '/Login'),
(14, 10, '2020-04-14 19:21:38', 'Modify User', 'User', '/user'),
(15, 10, '2020-04-14 19:32:20', 'Modify User', 'User', '/user'),
(16, 10, '2020-04-14 19:48:31', 'Modify User', 'User', '/user'),
(17, 10, '2020-04-14 19:48:40', 'Modify User', 'User', '/user'),
(18, 26, '2020-04-14 19:51:18', 'Add User', 'User', '/user'),
(19, 27, '2020-04-14 22:21:58', 'Add User', 'User', '/user'),
(20, 10, '2020-04-14 22:30:52', 'Modify User', 'User', '/user'),
(21, 10, '2020-04-15 17:08:53', 'Modify User', 'User', '/user'),
(22, 10, '2020-04-15 17:09:14', 'Modify User', 'User', '/user');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `titre`, `description`, `lien`, `type`) VALUES
(2, 'Logo2', 'logo Of company ', '/uploads/6551a1a196dc258582dd335dba6b58ae.pdf', 'image'),
(3, 'notLogo3', 'logo Of company ', 'www.jjhfhhf.tn/logo3.png', 'image'),
(4, 'video1', 'video Of company ', 'www.jjhfhhf.tn/video1.png', 'video'),
(5, 'video3', 'video Of company ', 'www.jjhfhhf.tn/video3.png', 'video'),
(7, 'video56', 'video Of company ', 'www.jjhfhhf.tn/video4.png', 'video');

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
('20200409155946', '2020-04-09 16:08:23');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referance`
--

INSERT INTO `referance` (`id`, `titre`, `description`) VALUES
(1, 'referance1_test', 'lon____--------------------_____________________ger text to referance 1'),
(3, 'referance3', 'lonnnnnng text to referance 3'),
(4, 'referance4', 'lonnnnnng text tooooooooooooooooooooooooooooooo referance 4');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(22, '1588742b067fa695f3b773a39ba126928bf30dfb9c2e532ee16e9ea7c0ee8a797aa5b3df872d8a6a3a69187b6c45c34bd22ea121ab145fcacbd90f6c1669ab10', 'user7@email.com', '2020-04-15 18:07:59');

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `company_id`, `nom`, `prenom`, `email`, `adresse`, `codepostal`, `city`, `num_tel`, `sexe`, `roles`, `motpass`, `date_naissance`, `equip_id`) VALUES
(9, 2, 'User5name', 'user5prename', 'user5@email.com', 'adrresUser5', '22', 'nabeul', '25222555', 'homme', '\"ROLE_VIEWER\"', '$2y$12$M/gQzNG7Z/pOX65eggz3guzGDJk1VPZfyy8X564xSpleWzheGP0OW', '1996-02-04', 1),
(10, 2, 'User3name', 'user3prename', 'user3@email.com', 'adrresUser3', '22', 'nabeul', '25222555', 'homme', '\"ROLE_ADMIN\"', '$2y$12$H.wgMK6a68s/nig/.ESJKOqHMzem7LGa.NNrOjtGWuJFu951tmMBS', '1996-03-04', 1),
(11, 4, 'User7name', 'user7prename', 'user7@email.com', 'adrresUser7', '22', 'nabeul', '25222555', 'homme', '\"ROLE_MANAGER\"', '$2y$12$M/gQzNG7Z/pOX65eggz3guzGDJk1VPZfyy8X564xSpleWzheGP0OW', '1996-02-04', 1),
(12, 4, 'User8name', 'user8prename', 'user8@email.com', 'adrresUser8', '22', 'nabeul', '25222555', 'homme', '\"ROLE_MANAGER\"', '$2y$12$M/gQzNG7Z/pOX65eggz3guzGDJk1VPZfyy8X564xSpleWzheGP0OW', '1996-02-04', 1),
(14, 4, 'User10name', 'user10prename', 'user10@email.com', 'adrresUser10', '22', 'nabeul', '25222555', 'homme', '\"ROLE_EDITOR\"', '$2y$12$M/gQzNG7Z/pOX65eggz3guzGDJk1VPZfyy8X564xSpleWzheGP0OW', '1996-02-04', 1),
(15, 2, 'User11name', 'user11prename', 'user11@email.com', 'adrresUser11', '22', 'nabeul', '25222555', 'homme', '\"ROLE_MANAGER\"', '$2y$12$M/gQzNG7Z/pOX65eggz3guzGDJk1VPZfyy8X564xSpleWzheGP0OW', '1996-02-04', 1),
(16, 4, 'User12name', 'user12prename', 'user12@email.com', 'adrresUser12', '22', 'nabeul', '25222555', 'homme', '\"ROLE_EDITOR\"', '$2y$12$M/gQzNG7Z/pOX65eggz3guzGDJk1VPZfyy8X564xSpleWzheGP0OW', '1996-02-04', 1),
(17, 4, 'saif eddin', 'go', 'username14@mail.com', 'farhat hached,', '8023', 'somaa', '23249201', 'homme', '\"ROLE_EDITOR\"', '123456', '1996-09-16', 1),
(20, 15, 'Company11', 'Company', 'Company11@mail.com', 'adressCompany11', '0000', '--', '22555555', 'Homme', '\"ROLE_ADMIN\"', 'admin', '2020-03-31', 1),
(22, 17, 'Company12', 'Company', 'Company12@mail.com', 'adressCompany12', '0000', '--', '22555555', 'Homme', '\"ROLE_ADMIN\"', 'admin', '2020-03-31', 1),
(23, 18, 'Company13', 'Company', 'Company13@mail.com', 'adressCompany13', '0000', '--', '22555555', 'Homme', '\"ROLE_ADMIN\"', 'admin', '2020-03-31', 1),
(25, 4, 'User16name', 'user16prename', 'user16@email.com', 'adrresUser16', '22', 'nabeul', '25222555', 'homme', '\"ROLE_ADMIN\"', '$2y$12$M/gQzNG7Z/pOX65eggz3guzGDJk1VPZfyy8X564xSpleWzheGP0OW', '1996-02-04', 1),
(26, 4, 'User20name', 'user20prename', 'user20@email.com', 'adrresUser20', '22', 'nabeul', '25222555', 'homme', '\"ROLE_ADMIN\"', '$2y$12$M/gQzNG7Z/pOX65eggz3guzGDJk1VPZfyy8X564xSpleWzheGP0OW', '1996-02-04', NULL),
(27, 4, 'User21name', 'user21prename', 'user21@email.com', 'adrresUser21', '22', 'nabeul', '25222555', 'homme', '\"ROLE_ADMIN\"', '$2y$12$M/gQzNG7Z/pOX65eggz3guzGDJk1VPZfyy8X564xSpleWzheGP0OW', '1996-02-04', NULL);

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
