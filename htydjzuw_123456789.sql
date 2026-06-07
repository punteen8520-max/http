-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 06, 2022 at 06:12 PM
-- Server version: 10.3.34-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `htydjzuw_123456789`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat` enum('true','false') COLLATE utf8_unicode_ci DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `url`, `img`, `name`, `cat`) VALUES
(3, 'more', 'gmail.png', 'อื่นๆๆ', 'true'),
(6, 'netflix', 'Netflix1.png', 'Netflix', 'true'),
(7, 'discord', '7df964b0d4c890b8f17c779f9e0b2274_game.jpg', 'DISCORD BOOST', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `background` varchar(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `alert` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `promotion_tm` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `promotion_tw` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `truewallet_phone` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `truewallet_email` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `truewallet_password` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `website` varchar(255) DEFAULT 'shop.hakko.pw',
  `tmtopup_uid` varchar(255) NOT NULL,
  `tmtopup_api_passkey` varchar(255) NOT NULL,
  `me` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'https://www.facebook.com/itorkungth',
  `truewallet_msg` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `truewallet_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nav` enum('primary','dark','success','info','warning','danger') NOT NULL,
  `say` enum('on','off') NOT NULL,
  `page_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `logged` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `announce` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `body` enum('body/gg.php','body/gg1.php','body/gg2.php') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `title`, `description`, `icon`, `background`, `name`, `alert`, `promotion_tm`, `promotion_tw`, `truewallet_phone`, `truewallet_email`, `truewallet_password`, `website`, `tmtopup_uid`, `tmtopup_api_passkey`, `me`, `truewallet_msg`, `truewallet_name`, `nav`, `say`, `page_id`, `logged`, `announce`, `body`) VALUES
(1, 'GShops เว็บไชต์จำหน่ายไอดีเกม และอื่นๆๆ', 'เว็บไชต์จำหน่ายไอดีเกม และอื่นๆๆ', 'https://gshops.xyz/img/logo.png', 'https://gurockth.com/wp-content/uploads/2021/09/rdKdiMcovPGxiBLu7gtbvn.jpg', 'GShops', 'GShops เว็บไชต์จำหน่ายไอดีเกม และอื่นๆๆ', '1', '1', '', '', '', '', '219528', '2gaAwTdS', '', '', '', 'warning', 'off', 'https://www.facebook.com/', '', '', 'body/gg1.php');

-- --------------------------------------------------------

--
-- Table structure for table `config_topup`
--

CREATE TABLE `config_topup` (
  `id` int(11) NOT NULL,
  `truemoney` int(11) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `config_topup`
--

INSERT INTO `config_topup` (`id`, `truemoney`, `point`) VALUES
(1, 50, 50),
(2, 90, 90),
(3, 150, 150),
(4, 300, 300),
(5, 500, 500),
(6, 1000, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `image_slide`
--

CREATE TABLE `image_slide` (
  `id` int(11) NOT NULL,
  `image_name` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_buy`
--

CREATE TABLE `log_buy` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `point` int(11) NOT NULL DEFAULT 0,
  `topup` varchar(2555) NOT NULL DEFAULT '0',
  `active` enum('true','false') NOT NULL DEFAULT 'true',
  `ip` varchar(255) NOT NULL,
  `rank` enum('member','admin') NOT NULL DEFAULT 'member',
  `email` varchar(255) DEFAULT NULL,
  `code` varchar(255) NOT NULL DEFAULT '0',
  `lastclick` varchar(2555) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `info` varchar(10000) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(1500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `help` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `pattern` enum('normaltext','code','eml:psw','usr:psw','usr:eml:psw','eml:psw:prf:pin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `reduce` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'true',
  `cat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `random_spin`
--

CREATE TABLE `random_spin` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name_spin` text NOT NULL,
  `point` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `redeem`
--

CREATE TABLE `redeem` (
  `id` int(11) NOT NULL,
  `code` varchar(30) CHARACTER SET utf8 NOT NULL,
  `price` int(11) NOT NULL,
  `status` enum('Redeem','UnRedeem') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'UnRedeem'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting_spin`
--

CREATE TABLE `setting_spin` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `message` text NOT NULL,
  `reward_type` varchar(255) NOT NULL,
  `reward_point` decimal(11,2) NOT NULL DEFAULT 0.00,
  `reward_itemcatalog` text NOT NULL,
  `percent` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(255) NOT NULL,
  `type` int(255) NOT NULL,
  `contents` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `id` int(11) NOT NULL,
  `term` varchar(2555) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`id`, `term`) VALUES
(1, '<h1>เงื่อนไขการให้บริการ (Terms of Service)</h1>\r\n\r\n<h2>GSHOPS เกี่ยวกับอะไร</h2>\r\n<p>ร้านค้า GSHOPS เป็นร้านขายไอดีเกมและสินค้าอื่นๆอีกมากมาย โดยเน้นไปทางแอพพรีเมี่ยมเช่นพวก Netflix เป็นต้น โดยเปิดให้บริการ\r\nแบบ <mark>ระบบอัตโนมัติ 24 ชั่วโมง</mark></span>\r\nแต่ทางเราไม่มีส่วนเกี่ยวข้องกับเกมหรือบริษัทแอพพรีเมี่ยมที่จัดจำหน่ายโดยตรง ร้านค้า GSHOPS เป็นเพียงผู้จัดจำหน่ายรายหนึ่งเท่านั้น\r\n</p>\r\n<h2>นโยบายด้านลิขสิทธิ์</h2>\r\n<p>ห้ามใครก็ตามคัดลอกหรือดัดแปลง รูปภาพ,ข้อมูล,ระบบ,รูปแบบเว็บไซต์ โดยทุกอย่างอันเป็นทรัพย์สินทางปัญญา ห้ามนำไปใช้โดยไม่ได้รับอนุญาต\r\n</p>\r\n<h2>บัญชีสมาชิกของคุณ</h2>\r\n<p>\r\nบัญชีสมาชิก เป็นบัญชีส่วนตัวของท่านแต่เพียงผู้เดียว ท่านไม่ควรนำไปบอกต่อใคร แต่หากแอดมินพบกิจกรรมที่น่าสงสัย / ส่อแววในการทุจริตร้านค้า GSHOPS\r\nหรือมีการปลอมแปลงเป็นทีมงานของร้าน GSHOPS ทางทีมงานขออนุญาต<span style=\"color:red;\">ลบบัญชีของท่านในทันที</span>โดยไม่ต้องแจ้งให้ทราบล่วงหน้า\r\nโดยรหัสผ่านทางแอดมินและทีมงานจะไม่สามารถขโมยหรือดูได้เนื่องจากมีระบบป้องกันในการแปลงค่า รหัสผ่าน ซึ่งทำให้รหัสของท่านปลอดภัยเป็นอย่างมาก\r\n</p>\r\n<h2>นโยบายการคืนเงิน</h2>\r\n<p>\r\nร้านค้า GSHOPS <span style=\"color:red;\">ไม่มีนโยบายในการคืนเงิน</span> แต่หากสินค้าเกิดมีปัญหาขึ้นมาทางเราจะรับผิดชอบโดยการเคลมให้ ( หากสินค้านั้นๆยังอยู่ในระยะเวลาประกัน )\r\nแต่ถ้าหากเป็นปัญหาที่เกิดจากเว็บไซต์ GSHOPS ทางเราจะมีการพิจรณาอีกครั้งหนึ่ง\r\nหากลูกค้ามีอายุต่ำกว่า 18 ปี ควรบอกผู้ปกครองก่อนทำการสั่งซื้อ เพราะถ้าหากสั่งซื้อไปแล้วจะไม่สามารถคืนเงินหรือคืนสินค้าได้\r\nหากท่านเติมเงินเข้ามา แล้วทำการสั่งซื้อสินค้าของทางเรา นั่นหมายถึง \"ท่านอ่านรายละเอียดสินค้าอย่างครบถ้วนเรียบร้อยแล้ว\" เพราะถ้าหากเกิด\r\nปัญหาแอดมินจะรับผิดชอบได้เพียงแค่ตามประกันที่เขียนไว้ในรายละเอียดเท่านั้น\r\n<h2>เงื่อนไขการใช้บริการ</h2>\r\nร้านค้า GSHOPS ขอสงวนสิทธิ์ในการเพิ่มเติม ลบ หรือเปลี่ยนแปลงเงื่อนไขการใช้บริการ โดยท่านอาจจะต้องมีการเข้ามาเช็คหรืออ่านให้ครบถ้วนก่อนทำก่อนสั่งซื้อ\r\nเพราะเราจะยึดการนโยบายของทางร้านเป็นหลักนะครับ ถือว่าแจ้งให้ทราบโดยทั่วถึงกัน ขอบคุณที่เลือกใช้บริการกับ GSHOPS ครับ\r\n</p>');

-- --------------------------------------------------------

--
-- Table structure for table `topup`
--

CREATE TABLE `topup` (
  `id` int(11) NOT NULL,
  `TW_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(3000) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'verify',
  `date` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Truewallet'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topup`
--

INSERT INTO `topup` (`id`, `TW_id`, `amount`, `status`, `date`, `username`, `type`) VALUES
(7, 'A9onfTmjNjmp1u3hlg', '10', 'success', '07-01-2022 16:56', 'bigbaba55yo', 'เติมเงินด้วย ซองของขวัญ'),
(11, 'lku98zspd7', '100', 'success', '11-01-2022 11:14', 'bigbaba55yo', 'เติมเงินด้วยคูปอง'),
(12, 'Rwe6gofg3y6a2O1c1p', '10', 'success', '12-01-2022 21:48\r\n', 'Boonnoi123', 'เติมเงินด้วย ซองของขวัญ'),
(13, 'abpPA8cAkNgQu2qai1', '25', 'success', '14-01-2022 14:08', 'peemine25462003', 'เติมเงินด้วย ซองของขวัญ'),
(14, 'a09dYgOldnod0kh9ij', '25', 'success', '17-01-2022 9:27', 'Dechaphon', 'เติมเงินด้วย ซองของขวัญ'),
(15, 'we2SiifDjl51ORyb1p', '400', 'success', '19-01-2022 10:20', 'Poomkungzz', 'เติมเงินด้วย ซองของขวัญ'),
(16, 'f2osY9X0iWnu1cm7ik', '10', 'success', '19-01-2022 10:51', 'Wish962G', 'เติมเงินด้วย ซองของขวัญ'),
(17, '4Tome89TkGcOksedTp', '10', 'success', '22-01-2022 13:41', 'Spon3dSa', 'เติมเงินด้วย ซองของขวัญ'),
(18, 'FnbiMNdC19blGg6u1c', '11', 'success', '22-01-2022 14:31', 'bigbaba55yo', 'เติมเงินด้วย ซองของขวัญ'),
(19, 'khLlQ1OdfNfkjWNN1b', '500', 'success', '23-01-2022 12:17', 'sonicmx4', 'เติมเงินด้วย ซองของขวัญ'),
(20, 'iBlda3dYgA4eJ0PDrc', '400', 'success', '23-01-2022 12:38', 'cark24m', 'เติมเงินด้วย ซองของขวัญ'),
(21, 'aiDJnaa1g2nl5hbsbn', '12', 'success', '23-01-2022 19:41', 'SainumTH', 'เติมเงินด้วย ซองของขวัญ'),
(22, 'HNmpaZAdX4Np1icpho', '10', 'success', '24-01-2022 14:02', 'naikhet5155', 'เติมเงินด้วย ซองของขวัญ'),
(23, 'mF5uakvjAeBpmKihzl', '25', 'success', '25-01-2022 22:28', 'mintwwwe', 'เติมเงินด้วย ซองของขวัญ'),
(24, '9Y0ejpg2ejaEMit1nf', '25', 'success', '25-01-2022 22:29', 'mintwwwe', 'เติมเงินด้วย ซองของขวัญ'),
(25, 'JdedV11b6nlhLEx1kg', '25', 'success', '26-01-2022 22:15', 'photo_45', 'เติมเงินด้วย ซองของขวัญ'),
(26, 'lRifVaTUjjQcWupsmd', '25', 'success', '28-01-2022 11:04', 'Nickeeeeryt', 'เติมเงินด้วย ซองของขวัญ'),
(27, 'gcnszvbDYazujnXaBm', '10', 'success', '30-01-2022 16:22', 'ThanaphonRakkong', 'เติมเงินด้วย ซองของขวัญ'),
(28, 'free', '30', 'success', '31-01-2022 17:52', 'SLEEP_KUNG', 'เติมเงินด้วยคูปอง'),
(29, 'vcj17bskFjcBnldoho', '10', 'success', '04-03-2022 12:20', 'Aa990', 'เติมเงินด้วย ซองของขวัญ'),
(30, 'iPRdUCPanHAJhdmP2o', '10', 'success', '05-03-2022 2:02', 'jarvis', 'เติมเงินด้วย ซองของขวัญ'),
(31, 'acg0Kp1jDRasyWpaob', '10', 'success', '17-03-2022 16:25', 'bigbaba55yo', 'เติมเงินด้วย ซองของขวัญ'),
(32, 's42DdZ1G8I', '20', 'success', '17-03-2022 16:38', 'bigbaba55yo', 'เติมเงินด้วยคูปอง'),
(33, 'eaSYlkFPxeAmmBabbp', '10.00', 'success', '17-03-2022 17:10', 'bigbaba55yo', 'เติมเงินด้วย ซองของขวัญ'),
(35, 'cjEkV5uIEjmblQd7no', '10.00', 'success', '17-03-2022 17:16', 'bigbaba55yo', 'เติมเงินด้วย ซองของขวัญ'),
(45, '492xOF2K22', '1', 'success', '22-03-2022 00:07', 'bigbaba55yo', 'เติมเงินด้วยคูปอง'),
(46, 'a1JOnLW7NbJ7PpTaej', '16.00', 'success', '30-03-2022 4:44', 'bigbaba55yo', 'เติมเงินด้วย ซองของขวัญ'),
(47, 'aZzuFIr8dA', '3060', 'success', '30-03-2022 06:14', 'admin', 'เติมเงินด้วยคูปอง');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `view`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wallet_account`
--

CREATE TABLE `wallet_account` (
  `id` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `mutiple` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet_account`
--

INSERT INTO `wallet_account` (`id`, `phone`, `mutiple`) VALUES
(1, '0637277204', '1');

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `id` int(11) NOT NULL,
  `video` enum('true','false') NOT NULL,
  `videourl` varchar(255) NOT NULL,
  `truewallet` enum('true','false') NOT NULL,
  `truemoney` enum('true','false') NOT NULL,
  `page` enum('true','false') NOT NULL,
  `pageurl` varchar(255) NOT NULL,
  `imagesback` enum('true','false') NOT NULL,
  `imagesbackurl` varchar(255) NOT NULL,
  `website` enum('true','false') NOT NULL,
  `pointfree` enum('true','false') NOT NULL,
  `random` enum('true','false') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `random2` enum('true','false') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `spin` enum('true','false') NOT NULL,
  `spin2` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`id`, `video`, `videourl`, `truewallet`, `truemoney`, `page`, `pageurl`, `imagesback`, `imagesbackurl`, `website`, `pointfree`, `random`, `random2`, `spin`, `spin2`) VALUES
(1, 'false', '1', 'true', 'true', 'false', 'Hi', 'true', 'true', 'true', 'true', 'false', 'false', 'false', 'false');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config_topup`
--
ALTER TABLE `config_topup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_slide`
--
ALTER TABLE `image_slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_buy`
--
ALTER TABLE `log_buy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `random_spin`
--
ALTER TABLE `random_spin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redeem`
--
ALTER TABLE `redeem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_spin`
--
ALTER TABLE `setting_spin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_account`
--
ALTER TABLE `wallet_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `config_topup`
--
ALTER TABLE `config_topup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `image_slide`
--
ALTER TABLE `image_slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `log_buy`
--
ALTER TABLE `log_buy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `random_spin`
--
ALTER TABLE `random_spin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redeem`
--
ALTER TABLE `redeem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_spin`
--
ALTER TABLE `setting_spin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `topup`
--
ALTER TABLE `topup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wallet_account`
--
ALTER TABLE `wallet_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
