-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 16, 2012 at 09:33 AM
-- Server version: 5.1.56
-- PHP Version: 5.2.9

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;
SET time_zone = "+00:00";

//test

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `deemtech_twinne`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

CREATE TABLE IF NOT EXISTS `tbl_address` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `address_line1` varchar(225) NOT NULL,
  `address_line2` varchar(225) DEFAULT NULL,
  `address_line3` varchar(225) DEFAULT NULL,
  `city` varchar(225) NOT NULL,
  `state` varchar(225) DEFAULT NULL,
  `country` varchar(225) NOT NULL,
  `postcode` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `tbl_address`
--

INSERT INTO `tbl_address` (`id`, `address_line1`, `address_line2`, `address_line3`, `city`, `state`, `country`, `postcode`) VALUES
(3, 'G-1', 'Sitabari', 'Sanganer', 'jaipur', NULL, 'India', NULL),
(5, '56, sitabari', '', '', 'Chomu', '', 'India', NULL),
(6, 'c-16', 'greater kailash colony', 'lalkothi', 'jaipur', 'rajasthan', 'india', NULL),
(7, 'c-16', 'greater kailash colony', 'lalkothi', 'jaipur', 'rajasthan', 'india', NULL),
(8, 'test', 'test', 'test', 'jaipur', 'rajasthan', 'india', NULL),
(9, 'test', 'test', 'test', 'jaipur', 'rajasthan', 'india', NULL),
(10, 'test', 'test', 'test', 'jaipur', 'rajasthan', 'india', NULL),
(11, 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', NULL),
(12, 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', NULL),
(13, 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', NULL),
(14, 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', NULL),
(15, 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', NULL),
(16, 'B-504, Amrit Kalash,', 'Gopalpura,', 'Jaipur', 'Jaipur', 'Rajasthan', 'India', NULL),
(17, 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', NULL),
(18, 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', NULL),
(19, 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', NULL),
(20, 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', NULL),
(21, 'Adline122', 'Adline222', 'Adline322', 'jaipur22', 'Rajasthan22', 'india22', NULL),
(22, 'dsfds', 'dsfdsf', 'dsfsd', 'fdsf', 'dsfsd', 'sdfsdf', NULL),
(23, 'bAdline1', 'bAdline2', 'bAdline3', 'bcity', 'brajasthan', 'bindia', NULL),
(24, 'bAdline1', 'bAdline1', 'bAdline1', 'bcity', 'brajasthan', 'bindia', NULL),
(25, 'bAdline1', 'bAdline1', 'bAdline1', 'bjaipur', 'braj', 'pindia', NULL),
(26, '40,janpath', '', '', 'jai', 'raj', 'India', NULL),
(27, 'dsfds22', 'dsfdsf22', 'dsfsd22', 'fdsf22', 'dsfsd22', 'sdfsdf22', NULL),
(28, 'G-12', '', '', 'Naples', '', 'Italy', NULL),
(29, 'G-12', '', '', 'Naples', '', 'Italy', NULL),
(30, '50, japath', '', '', 'jai', 'raj', 'India', NULL),
(31, 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_designer`
--

CREATE TABLE IF NOT EXISTS `tbl_admin_designer` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `designer_id` int(11) NOT NULL,
  `is_active` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin_designer`
--

INSERT INTO `tbl_admin_designer` (`id`, `admin_id`, `designer_id`, `is_active`) VALUES
(1, 3, 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE IF NOT EXISTS `tbl_banner` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `rotate` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`id`, `title`, `is_active`, `rotate`) VALUES
(1, 'Homepage top banner', '1', '0'),
(2, 'All pages top banner', '1', '1'),
(3, 'Single page bottom-right banner', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner_file`
--

CREATE TABLE IF NOT EXISTS `tbl_banner_file` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `banner_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_banner_file`
--

INSERT INTO `tbl_banner_file` (`id`, `banner_id`, `file_id`) VALUES
(12, 1, 294),
(14, 2, 299),
(9, 3, 291),
(10, 3, 292);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catagory`
--

CREATE TABLE IF NOT EXISTS `tbl_catagory` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `no_of_products` int(5) NOT NULL,
  `is_active` enum('0','1') NOT NULL,
  `parent` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_catagory`
--

INSERT INTO `tbl_catagory` (`id`, `name`, `description`, `no_of_products`, `is_active`, `parent`) VALUES
(1, 'top catagory', 'top catagory', 0, '1', NULL),
(3, 'Catagory#1', 'This is first Catagory.', 0, '0', NULL),
(4, 'Catagory#2', 'This is another category.', 56, '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cms`
--

CREATE TABLE IF NOT EXISTS `tbl_cms` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `content` text NOT NULL,
  `is_active` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_cms`
--

INSERT INTO `tbl_cms` (`id`, `title`, `content`, `is_active`) VALUES
(1, 'About Us', '<p>\n	Our website is a best place for designer cloths including designer&#39;s profile. you can simply buy garments,add your designs, or participate in our contests.</p>\n', '0'),
(2, 'Contact Us', '<p>\n	www.twinne.com 27, B block, Malviye Nagar, 9799058090</p>\n', '0'),
(3, 'Support', '<p>\n	shskjksjskl skjlsjklssls</p>\n<p>\n	jskjsksjkslkjslsk</p>\n<p>\n	kjhsijsoosis</p>\n<p>\n	jikjaakjs</p>\n<p>\n	regards</p>\n<p>\n	Sudesh Pal</p>\n', '1'),
(4, 'my page', '<p>\n	Hi,</p>\n<p>\n	&nbsp; &nbsp; &nbsp; &nbsp;This is my favorite page. I like it...............</p>\n', '0'),
(5, 'mukesh page', '<p>\n	<span style="font-size:16px;">I like it.</span> This is my fevorite page.<span style="background-color:#ffd700;">I have place my design here.</span></p>\n', '0'),
(6, 'muk', '<p>\n	<span style="background-color:#ff8c00;">A slew of sub-Rs 10 lakh SUVs will also debut at the expo including the Eco Sport from Ford and Duster from Renault.</span> These new products -- high on technology and contemporary in design -- are expected to create a new sub Rs 10 lakh compact SUV segment taking the competition to homegrown Mahindra Scorpio and Tata Safari.</p>\n', '0'),
(7, 'muk', '<p>\n	A slew of sub-Rs 10 lakh SUVs will also debut at the expo including the Eco Sport from Ford and Duster from Renault. These new products -- high on technology and contemporary in design -- are expected to create a new sub Rs 10 lakh compact SUV segment taking the competition to homegrown Mahindra Scorpio and Tata Safari.</p>\n', '0'),
(8, 'muk', '<p>\n	<span style="color: rgb(63, 63, 63); font-family: georgia; font-size: 15px; line-height: 20px; text-align: left; ">Lohiya, is restless today. &quot;Most residents feel the district has never been at par with VVIP constituencies like Rae Bareli or Saifai,&quot; an Ayurvedic medicine shop owner Lakhan Prasad said.&nbsp;</span></p>\n', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

CREATE TABLE IF NOT EXISTS `tbl_color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `code` varchar(100) NOT NULL,
  `product_count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_color`
--

INSERT INTO `tbl_color` (`id`, `name`, `code`, `product_count`) VALUES
(1, 'Black', '000000', 3),
(2, 'White', 'ffffff', 5),
(4, 'Blue', '0e2cf0', 6),
(5, 'Yello', 'f0e50e', 3),
(7, 'pink', 'e7a2eb', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=111 ;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `user_id`, `content`, `date`) VALUES
(1, 1, 'dxzfdsfsadfsdfdsfds\r\nsdfds\r\nfsdf\r\nf\r\ndsf\r\nds\r\nf\r\nds\r\nfds\r\n', '0'),
(17, 1, 'This is awesome...Approved!! Congratulation, Hope you would show us your talent in the next Project..I love it!!', '1323164215'),
(18, 1, '', '1323164643'),
(19, 1, 'This is awesome...Approved!! Congratulation, Hope you would show us your talent in the next Project..I love it!!', '1323167998'),
(27, 41, 'Truly its Awesome..Keep it up!!', '1323175061'),
(28, 41, 'Great  Sebastian!!', '1323175417'),
(29, 0, 'I like it.', '1323237950'),
(30, 1, 'Hi', '1323242782'),
(31, 44, 'hello', '1323242991'),
(32, 44, 'mukesh', '1323243068'),
(33, 44, 'Hello mukesh', '1323248293'),
(34, 44, 'vimal', '1323248310'),
(35, 44, 'Hello,\n\n       I Like this design.', '1323264134'),
(36, 1, 'Ok,\n       I will provide to this.', '1323264195'),
(37, 44, 'Ok,\n    I agree with you.', '1323264364'),
(38, 1, 'Ok,\n       I will provide to this.', '1323264388'),
(39, 1, 'Ok,\n       I will provide to this.', '1323264405'),
(40, 1, 'Hello', '1323264438'),
(41, 44, 'hdsfm,ngdfkgnkjdfh', '1323264465'),
(42, 1, 'Hello', '1323264479'),
(43, 1, 'ashok', '1323264501'),
(44, 44, 'kjdhgsnnvhc jdhgsfjkghh s dfjgh dhg ddgdsfjg dghdf dfkghkdg akdgha ksdfgha asdfkghag akf asdfg hsdag ', '1323264522'),
(45, 1, 'ashok', '1323264533'),
(46, 1, 'vimal', '1323264620'),
(47, 44, 'hfsdfb  dfg  kasdng sdfng dfsag fsdkg fadskg fasdkjgh adsfg adskfg dfakgh ad gasdg kjfg asdfg sg mukesh', '1323264654'),
(48, 1, 'vimal', '1323264663'),
(49, 44, 'hi', '1323685105'),
(58, 44, 'Hello', '1323851409'),
(59, 1, 'mukesh', '1323851473'),
(60, 44, 'I like it.', '1323851514'),
(61, 1, 'mukesh', '1323851526'),
(62, 1, 'repeat', '1323851558'),
(63, 44, 'yes', '1323851598'),
(64, 1, 'repeat', '1323851613'),
(65, 1, 'I checked it', '1323851650'),
(66, 1, 'Hi this is a New design..!!', '1323943849'),
(67, 1, 'Great work by our designers..', '1323943937'),
(68, 44, 'Hi, I like it.', '1324019680'),
(69, 1, 'I see it.', '1324019732'),
(70, 44, 'ok', '1324019750'),
(71, 1, 'I see it.', '1324019765'),
(72, 44, 'Nice!!\n', '1324019943'),
(73, 1, 'ok', '1324019963'),
(74, 1, 'ok', '1324019977'),
(75, 1, 'ok', '1324019997'),
(76, 44, 'Kya OK', '1324020067'),
(77, 1, 'ok', '1324020083'),
(78, 46, 'Testing', '1324473058'),
(79, 1, 'Yes testing process', '1324473142'),
(80, 46, 'ok', '1324473168'),
(81, 1, 'I know', '1324473203'),
(82, 46, 'fine', '1324473234'),
(83, 1, 'I check it.', '1324473280'),
(84, 46, 'It''s work perfect', '1324473323'),
(85, 47, 'Hello, there are ma designs...!!', '1325067561'),
(90, 1, 'Accept design.', '1325072000'),
(91, 47, 'hi ', '1325072254'),
(92, 46, 'Hello', '1327661576'),
(93, 60, 'hi', '1327661646'),
(98, 60, 'test discussion with designer on project vimal project', '1327905712'),
(99, 60, 'test message  for adi arora My Project#3', '1327905854'),
(100, 47, 'reply to admin', '1327906035'),
(101, 47, 'hellooooooooooooo', '1327906665'),
(102, 46, 'dfsf', '1329111709'),
(103, 46, 'My design', '1329112902'),
(104, 60, 'Ok,\n            I have see it.', '1329113312'),
(107, 60, 'test comment', '1329132061'),
(108, 60, 'another test', '1329132078'),
(109, 60, 'ciao', '1329132099'),
(110, 60, 'your design rocks', '1329137107');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contest`
--

CREATE TABLE IF NOT EXISTS `tbl_contest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `start_date` int(10) NOT NULL,
  `end_date` int(10) NOT NULL,
  `winner` varchar(225) NOT NULL,
  `is_active` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_contest`
--

INSERT INTO `tbl_contest` (`id`, `name`, `description`, `start_date`, `end_date`, `winner`, `is_active`) VALUES
(17, 'Contest5', '<p>\n	<img alt="wink" height="20" src="http://192.168.1.56/twinne_new/js/ckeditor/plugins/smiley/images/wink_smile.gif" title="wink" width="20" /></p>\n<p>\n	This is our latest Contest, Hurray !!!</p>\n', 1339365600, 1344636000, '1', '0'),
(18, 'Contest5', '<p>\n	<img alt="wink" height="20" src="http://192.168.1.56/twinne_new/js/ckeditor/plugins/smiley/images/wink_smile.gif" title="wink" width="20" /></p>\n<p>\n	This is our latest Contest, Hurray !!!</p>\n', 1339304400, 1344574800, '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coupon`
--

CREATE TABLE IF NOT EXISTS `tbl_coupon` (
  `id` bigint(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `code` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `discount` int(3) NOT NULL,
  `total_amount` int(5) NOT NULL,
  `start_date` varchar(225) NOT NULL,
  `end_date` varchar(225) NOT NULL,
  `uses_coupon` int(11) NOT NULL,
  `uses_customer` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_coupon`
--

INSERT INTO `tbl_coupon` (`id`, `name`, `code`, `type`, `discount`, `total_amount`, `start_date`, `end_date`, `uses_coupon`, `uses_customer`, `status`, `is_active`) VALUES
(1, 'test', 'sdfds', 'Free shipping', 50, 200, '1324015200', '1327816800', 444, 4444, '1', '1'),
(2, 'fgf', 'dfgfd', 'fixed', 213, 234, '1297378800', '1315692000', 13, 1, '0', '0'),
(3, 'dgfdg', 'fdgfdg', 'fixed', 456, 345, '1313013600', '1318284000', 23, 2, '1', '1'),
(4, 'dsfd', 'sdfsf', 'fixed', 99, 123, '1339365600', '1334095200', 124, 12, '1', '0'),
(5, 'mukesh', 'mmm', 'Fixed', 30, 100, '1324879200', '1325224800', 1, 1, '1', '0'),
(6, 'mukesh', 'ss', 'Fixed', 50, 150, '1325743200', '1328162400', 20, 20, '1', '1'),
(7, 'FACEBOOK', 'FACEBOOK10', 'Percentage', 10, 100, '1326866400', '1327125600', 100, 1, '1', '1'),
(8, 'testcop', '123456', 'Percentage', 10, 2, '1326348000', '1327816800', 2222, 2222, '1', '1'),
(9, 'test2', '1254asdfd', 'Percentage', 30, 1, '1327471200', '1327816800', 55, 55, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coupon_catagory`
--

CREATE TABLE IF NOT EXISTS `tbl_coupon_catagory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catagory_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_coupon_catagory`
--

INSERT INTO `tbl_coupon_catagory` (`id`, `catagory_id`, `coupon_id`) VALUES
(1, 4, 1),
(2, 1, 3),
(3, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_currency`
--

CREATE TABLE IF NOT EXISTS `tbl_currency` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `short_name` varchar(225) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `default` enum('0','1') NOT NULL,
  `is_active` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_currency`
--

INSERT INTO `tbl_currency` (`id`, `short_name`, `name`, `description`, `default`, `is_active`) VALUES
(1, '$', 'US dollar', 'United State Dollar', '1', '1'),
(2, '&pound;', 'UK Pound', NULL, '0', '1'),
(3, '&euro;', 'Europe Euro', NULL, '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designer_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_designer_payment` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `payment_status` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_designer_payment`
--

INSERT INTO `tbl_designer_payment` (`id`, `user_id`, `month`, `year`, `payment_status`, `date`) VALUES
(1, 10, 1, 2012, 'Payment processed', '1329308413'),
(2, 10, 12, 2011, 'Payment pending', '1329308442'),
(3, 47, 12, 2011, 'Payment processed', '1329310067');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discount`
--

CREATE TABLE IF NOT EXISTS `tbl_discount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `quantity` mediumint(10) NOT NULL,
  `price` mediumint(10) NOT NULL,
  `start_date` varchar(100) NOT NULL,
  `end_date` varchar(100) NOT NULL,
  `pcount` int(11) NOT NULL DEFAULT '0',
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_discount`
--

INSERT INTO `tbl_discount` (`id`, `product_id`, `quantity`, `price`, `start_date`, `end_date`, `pcount`, `is_active`) VALUES
(1, 4, 10, 56, '1336687200', '1341957600', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email`
--

CREATE TABLE IF NOT EXISTS `tbl_email` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `to_email` varchar(200) DEFAULT NULL,
  `from_email` varchar(200) DEFAULT NULL,
  `re_email` varchar(200) NOT NULL,
  `template` text NOT NULL,
  `status` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_email`
--

INSERT INTO `tbl_email` (`id`, `to_email`, `from_email`, `re_email`, `template`, `status`) VALUES
(1, 'super_admin@twinne.com', NULL, 'admin@twinne.com', '<p>\n	A new order has been placed. The details are given below</p>\n<p>\n	Order id : {order_id}</p>\n<p>\n	User id : {user_id}</p>\n<p>\n	Thanks,</p>\n<p>\n	Team Twinne</p>\n', 'order admin'),
(2, NULL, 'admin@twinne.com', 'admin1@twinne.com', '<p>\n	Dear User,</p>\n<p>\n	<order_id><user_id>Your order has been placed successfully. Order details are give below.</user_id></order_id></p>\n<p>\n	Order id : {order_id}</p>\n<p>\n	User id : {user_id}</p>\n<p>\n	Thanks,</p>\n<p>\n	Team Twinne</p>\n', 'user order placed'),
(3, NULL, 'admin@twinne.com', 'admin1@twinne.com', '<p>\n	Dear User,</p>\n<p>\n	Your order has been shipped. Order details are given below:</p>\n<p>\n	Order id : {order_id}</p>\n<p>\n	User id : {user_id}</p>\n<p>\n	Order date : {order_date}</p>\n<p>\n	&nbsp;</p>\n<p>\n	Thanks,</p>\n<p>\n	Team Twinne</p>\n', 'user order shipped'),
(4, NULL, 'admin@twinne.com', 'admin1@twinne.com', '<p>\n	Dear User,</p>\n<p>\n	Thanks for communicating with us.</p>\n<p>\n	We will communicate with you soon.</p>\n<p>\n	&nbsp;</p>\n<p>\n	Thanks,</p>\n<p>\n	Team Twinne</p>\n', 'user contacted'),
(5, NULL, 'admin@twinne.com', 'admin1@twinne.com', 'Dear <user_id>\nCongratulations!! your account has been created.\nEnjoy the services of our portal.', 'user account'),
(6, NULL, 'super_admin@twinne.com', 'admin@twinne.com', 'Dear <user_id>\nCongratulations!! your design has been approved.Keep it up.', 'design approved');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_files`
--

CREATE TABLE IF NOT EXISTS `tbl_files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL DEFAULT '',
  `filepath` varchar(255) NOT NULL DEFAULT '',
  `filetype` varchar(255) NOT NULL,
  `filesize` int(10) unsigned NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `timestamp` (`timestamp`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=421 ;

--
-- Dumping data for table `tbl_files`
--

INSERT INTO `tbl_files` (`id`, `filename`, `filepath`, `filetype`, `filesize`, `status`, `timestamp`) VALUES
(1, 'TheNaughtyKidsPhotographs1_001.jpg', 'images/product_image/original_image/TheNaughtyKidsPhotographs1_001.jpg', 'image/jpeg', 80, 1, 1320814794),
(2, 'TheNaughtyKidsPhotographs1_001.jpg', 'images/product_image/original_image/TheNaughtyKidsPhotographs1_001.jpg', 'image/jpeg', 80, 1, 1320816052),
(3, 'TheNaughtyKidsPhotographs1_0011.jpg', 'images/product_image/original_image/TheNaughtyKidsPhotographs1_0011.jpg', 'image/jpeg', 80, 1, 1320816186),
(4, 'BBlack_Web.jpg', 'images/product_image/original_image/BBlack_Web.jpg', 'image/jpeg', 57, 1, 1320817627),
(5, 'BBlack_Web1.jpg', 'images/product_image/original_image/BBlack_Web1.jpg', 'image/jpeg', 57, 1, 1320817643),
(6, '6music_foals2.jpg', 'images/product_image/original_image/6music_foals2.jpg', 'image/jpeg', 24, 1, 1320817705),
(7, 'Bon_Jovi_4.jpg', 'images/product_image/original_image/Bon_Jovi_4.jpg', 'image/jpeg', 235, 1, 1320817775),
(8, 'BBlack_Web2.jpg', 'images/product_image/original_image/BBlack_Web2.jpg', 'image/jpeg', 57, 1, 1320817803),
(9, 'slide.png', 'images/product_image/original_image/slide.png', 'image/png', 262, 1, 1320818085),
(10, 'jesse.png', 'images/product_image/original_image/jesse.png', 'image/png', 284, 1, 1320822941),
(11, 'index.jpeg', 'images/product_image/original_image/index.jpeg', 'image/jpeg', 8, 1, 1320822963),
(12, 'index1.jpeg', 'images/product_image/original_image/index1.jpeg', 'image/jpeg', 8, 1, 1320829404),
(13, 'Bon_Jovi_41.jpg', 'images/product_image/original_image/Bon_Jovi_41.jpg', 'image/jpeg', 235, 1, 1320829430),
(14, 'images.jpeg', 'images/product_image/original_image/images.jpeg', 'image/jpeg', 11, 1, 1320830950),
(15, 'johnlennonlennonlegendfhn5.jpg', 'images/product_image/original_image/johnlennonlennonlegendfhn5.jpg', 'image/jpeg', 121, 1, 1320835085),
(16, 'slide1.png', 'images/product_image/original_image/slide1.png', 'image/png', 262, 1, 1320835215),
(17, '81183775.jpg', 'images/product_image/original_image/81183775.jpg', 'image/jpeg', 536, 1, 1320835267),
(18, 'idfmages.jpeg', 'images/product_image/original_image/idfmages.jpeg', 'image/jpeg', 4, 1, 1320835305),
(19, 'johnlennonlennonlegendfhn51.jpg', 'images/product_image/original_image/johnlennonlennonlegendfhn51.jpg', 'image/jpeg', 121, 1, 1320835589),
(20, 'justinbieber_030710.jpg', 'images/product_image/original_image/justinbieber_030710.jpg', 'image/jpeg', 33, 1, 1320922185),
(21, '811837751.jpg', 'images/product_image/original_image/811837751.jpg', 'image/jpeg', 536, 1, 1320986960),
(22, 'Bon_Jovi_42.jpg', 'images/product_image/original_image/Bon_Jovi_42.jpg', 'image/jpeg', 235, 1, 1320989127),
(23, 'T-Shirt-Designs.jpg', 'images/product_image/original_image/T-Shirt-Designs.jpg', 'image/jpeg', 390, 1, 1320993720),
(24, 'romania.jpg', 'images/product_image/original_image/romania.jpg', 'image/jpeg', 96, 1, 1320993735),
(25, 'original_tshirt4.jpg', 'images/product_image/original_image/original_tshirt4.jpg', 'image/jpeg', 933, 1, 1320993778),
(26, 'malha-1-933x1191.jpg', 'images/product_image/original_image/malha-1-933x1191.jpg', 'image/jpeg', 122, 1, 1320993789),
(27, 'hd_a8b57a054d3b698c1b016317c56ba54c.jpg', 'images/product_image/original_image/hd_a8b57a054d3b698c1b016317c56ba54c.jpg', 'image/jpeg', 93, 1, 1320993939),
(28, '81.jpg', 'images/product_image/original_image/81.jpg', 'image/jpeg', 224, 1, 1320993950),
(29, 'hd_f5cd2718bf55f09ea3e96f8d94965b67.jpg', 'images/product_image/original_image/hd_f5cd2718bf55f09ea3e96f8d94965b67.jpg', 'image/jpeg', 93, 1, 1320993961),
(30, 'romania1.jpg', 'images/product_image/original_image/romania1.jpg', 'image/jpeg', 96, 1, 1320994266),
(31, 'romania2.jpg', 'images/product_image/original_image/romania2.jpg', 'image/jpeg', 96, 1, 1320994474),
(32, 'romania3.jpg', 'images/product_image/original_image/romania3.jpg', 'image/jpeg', 96, 1, 1320994637),
(33, 'romania4.jpg', 'images/product_image/original_image/romania4.jpg', 'image/jpeg', 96, 1, 1320995088),
(34, 'romania5.jpg', 'images/product_image/original_image/romania5.jpg', 'image/jpeg', 96, 1, 1321006378),
(35, 'malha-1-933x11911.jpg', 'images/product_image/original_image/malha-1-933x11911.jpg', 'image/jpeg', 122, 1, 1321006470),
(39, 'jesse1.png', 'adm/images/profile_image/jesse1.png', 'image/png', 284, 1, 1322036518),
(38, 'idfmages.jpeg', 'adm/images/profile_image/idfmages.jpeg', 'image/jpeg', 4, 1, 1322033519),
(40, 'idfmages1.jpeg', 'adm/images/profile_image/idfmages1.jpeg', 'image/jpeg', 4, 1, 1322036677),
(46, 'johnlennonlennonlegendfhn51.jpg', 'adm/images/profile_image/johnlennonlennonlegendfhn51.jpg', 'image/jpeg', 121, 1, 1322039226),
(45, 'idfmages2.jpeg', 'adm/images/profile_image/idfmages2.jpeg', 'image/jpeg', 4, 1, 1322038687),
(44, 'hd_f5cd2718bf55f09ea3e96f8d94965b671.jpg', 'adm/images/profile_image/hd_f5cd2718bf55f09ea3e96f8d94965b671.jpg', 'image/jpeg', 93, 1, 1322038407),
(47, 'idfmages3.jpeg', 'adm/images/profile_image/idfmages3.jpeg', 'image/jpeg', 4, 1, 1322039597),
(48, 'johnlennonlennonlegendfhn52.jpg', 'adm/images/profile_image/johnlennonlennonlegendfhn52.jpg', 'image/jpeg', 121, 1, 1322110146),
(49, 'johnlennonlennonlegendfhn53.jpg', 'adm/images/profile_image/johnlennonlennonlegendfhn53.jpg', 'image/jpeg', 121, 1, 1322110392),
(50, 'johnlennonlennonlegendfhn54.jpg', 'adm/images/profile_image/johnlennonlennonlegendfhn54.jpg', 'image/jpeg', 121, 1, 1322110688),
(51, 'jesse2.png', 'adm/images/profile_image/jesse2.png', 'image/png', 284, 1, 1322110743),
(52, 'johnlennonlennonlegendfhn55.jpg', 'adm/images/profile_image/johnlennonlennonlegendfhn55.jpg', 'image/jpeg', 121, 1, 1322111196),
(53, 'johnlennonlennonlegendfhn56.jpg', 'adm/images/profile_image/johnlennonlennonlegendfhn56.jpg', 'image/jpeg', 121, 1, 1322111488),
(54, '6music_foals2.jpg', 'adm/images/profile_image/6music_foals2.jpg', 'image/jpeg', 24, 1, 1322115625),
(55, 'johnlennonlennonlegendfhn5.jpg', 'images/profile_image/main_image/johnlennonlennonlegendfhn5.jpg', 'image/jpeg', 121, 1, 1322132358),
(56, 'jesse.png', 'images/profile_image/main_image/jesse.png', 'image/png', 284, 1, 1322132436),
(57, 'jesse1.png', 'images/profile_image/main_image/jesse1.png', 'image/png', 284, 1, 1322132459),
(58, 'malha-1-933x1191.jpg', 'images/profile_image/main_image/malha-1-933x1191.jpg', 'image/jpeg', 122, 1, 1322132494),
(59, 'malha-1-933x11911.jpg', 'images/profile_image/main_image/malha-1-933x11911.jpg', 'image/jpeg', 122, 1, 1322132775),
(60, 'romania.jpg', 'images/profile_image/main_image/romania.jpg', 'image/jpeg', 96, 1, 1322132891),
(61, 'romania1.jpg', 'images/profile_image/main_image/romania1.jpg', 'image/jpeg', 96, 1, 1322133136),
(62, 'romania2.jpg', 'images/profile_image/main_image/romania2.jpg', 'image/jpeg', 96, 1, 1322133156),
(63, 'romania3.jpg', 'images/profile_image/main_image/romania3.jpg', 'image/jpeg', 96, 1, 1322133188),
(64, 'T-Shirt-Designs.jpg', 'images/profile_image/main_image/T-Shirt-Designs.jpg', 'image/jpeg', 390, 1, 1322133221),
(65, 'romania.jpg', 'images/profile_image/original_image/romania.jpg', 'image/jpeg', 96, 1, 1322133511),
(66, 'T-Shirt-Designs.jpg', 'images/profile_image/original_image/T-Shirt-Designs.jpg', 'image/jpeg', 390, 1, 1322133614),
(67, 'T-Shirt-Designs1.jpg', 'images/profile_image/original_image/T-Shirt-Designs1.jpg', 'image/jpeg', 390, 1, 1322133713),
(68, 'T-Shirt-Designs2.jpg', 'images/profile_image/original_image/T-Shirt-Designs2.jpg', 'image/jpeg', 390, 1, 1322133776),
(69, 'Bon_Jovi_4.jpg', 'images/profile_image/original_image/Bon_Jovi_4.jpg', 'image/jpeg', 235, 1, 1322139030),
(70, 'hd_f5cd2718bf55f09ea3e96f8d94965b671.jpg', 'images/product_image/original_image/hd_f5cd2718bf55f09ea3e96f8d94965b671.jpg', 'image/jpeg', 93, 1, 1322484796),
(71, '6music_foals21.jpg', 'images/product_image/original_image/6music_foals21.jpg', 'image/jpeg', 24, 1, 1322485134),
(72, 'jesse1.png', 'images/product_image/original_image/jesse1.png', 'image/png', 284, 1, 1322486119),
(73, 'malha-1-933x11912.jpg', 'images/product_image/original_image/malha-1-933x11912.jpg', 'image/jpeg', 122, 1, 1322486135),
(74, 'hd_f5cd2718bf55f09ea3e96f8d94965b672.jpg', 'images/product_image/original_image/hd_f5cd2718bf55f09ea3e96f8d94965b672.jpg', 'image/jpeg', 93, 1, 1322486223),
(75, 'BBlack_Web3.jpg', 'images/product_image/original_image/BBlack_Web3.jpg', 'image/jpeg', 57, 1, 1322486233),
(226, 'F-21.jpg', 'images/upcoming_images/original_image/F-21.jpg', 'image/jpeg', 117, 1, 1323090033),
(216, 'tshirt111.jpg', 'images/upcoming_images/original_image/tshirt111.jpg', 'image/jpeg', 42, 1, 1323085913),
(188, 'jesse1.png', 'images/project_image/original_image/jesse1.png', 'image/png', 284, 1, 1323067270),
(194, '3.jpg', 'images/project_image/original_image/3.jpg', 'image/jpeg', 112, 1, 1323070285),
(192, 'johnlennonlennonlegendfhn5.jpg', 'images/project_image/original_image/johnlennonlennonlegendfhn5.jpg', 'image/jpeg', 121, 1, 1323069615),
(190, 'hd_f5cd2718bf55f09ea3e96f8d94965b67.jpg', 'images/project_image/original_image/hd_f5cd2718bf55f09ea3e96f8d94965b67.jpg', 'image/jpeg', 93, 1, 1323068318),
(193, 'idfmages1.jpeg', 'images/project_image/original_image/idfmages1.jpeg', 'image/jpeg', 4, 1, 1323069890),
(191, 'hd_f5cd2718bf55f09ea3e96f8d94965b671.jpg', 'images/project_image/original_image/hd_f5cd2718bf55f09ea3e96f8d94965b671.jpg', 'image/jpeg', 93, 1, 1323068460),
(189, 'romania.jpg', 'images/project_image/original_image/romania.jpg', 'image/jpeg', 96, 1, 1323068021),
(187, '6music_foals2.jpg', 'images/project_image/original_image/6music_foals2.jpg', 'image/jpeg', 24, 1, 1323067208),
(184, '81.jpg', 'images/project_image/original_image/81.jpg', 'image/jpeg', 224, 1, 1322904621),
(183, 'n30tshirt-300x266.jpg', 'images/project_image/original_image/n30tshirt-300x266.jpg', 'image/jpeg', 12, 1, 1322904597),
(186, 'jesse.png', 'images/project_image/original_image/jesse.png', 'image/png', 284, 1, 1322904734),
(185, 'idfmages.jpeg', 'images/project_image/original_image/idfmages.jpeg', 'image/jpeg', 4, 1, 1322904622),
(225, 'three-wolf-moon-t-shirt-designs.jpg', 'images/upcoming_images/original_image/three-wolf-moon-t-shirt-designs.jpg', 'image/jpeg', 69, 1, 1323090010),
(224, 'tshirt5.jpg', 'images/upcoming_images/original_image/tshirt5.jpg', 'image/jpeg', 409, 1, 1323089989),
(234, 'romania.jpg', 'images/upcoming_images/original_image/romania.jpg', 'image/jpeg', 96, 1, 1323091724),
(215, 'tshirt51.jpg', 'images/upcoming_images/original_image/tshirt51.jpg', 'image/jpeg', 409, 1, 1323085764),
(217, 'andrea-breast-cancer-tshirt.jpg', 'images/upcoming_images/original_image/andrea-breast-cancer-tshirt.jpg', 'image/jpeg', 503, 1, 1323086345),
(236, 'Hrithik.jpg', 'images/profile_image/original_image/Hrithik.jpg', 'image/jpeg', 12, 1, 1323172246),
(228, 'cool-designer-tshirt_(8).jpg', 'images/upcoming_images/original_image/cool-designer-tshirt_(8).jpg', 'image/jpeg', 72, 1, 1323090758),
(229, 'cool-designer-tshirt_(8)1.jpg', 'images/upcoming_images/original_image/cool-designer-tshirt_(8)1.jpg', 'image/jpeg', 72, 1, 1323090808),
(235, 'tshirt11.jpg', 'images/upcoming_images/original_image/tshirt11.jpg', 'image/jpeg', 42, 1, 1323092414),
(237, 'n30tshirt-300x266.jpg', 'images/product_image/original_image/n30tshirt-300x266.jpg', 'image/jpeg', 12, 1, 1323236196),
(238, 'stock-photo-unisex-black-t-shirt-template-isolated-on-white-clipping-path-24334405.jpg', 'images/product_image/original_image/stock-photo-unisex-black-t-shirt-template-isolated-on-white-clipping-path-24334405.jpg', 'image/jpeg', 24, 1, 1323236243),
(239, 'romania51.jpg', 'images/product_image/original_image/romania51.jpg', 'image/jpeg', 19, 1, 1323236301),
(240, 'malha-1-933x11913.jpg', 'images/product_image/original_image/malha-1-933x11913.jpg', 'image/jpeg', 14, 1, 1323236412),
(241, '811837752.jpg', 'images/product_image/original_image/811837752.jpg', 'image/jpeg', 21, 1, 1323236462),
(242, 'eat_sleep_download_t_shirt_medium.jpg', 'images/product_image/original_image/eat_sleep_download_t_shirt_medium.jpg', 'image/jpeg', 7, 1, 1323236534),
(243, 'Fila_TshirtDownload.jpg', 'images/product_image/original_image/Fila_TshirtDownload.jpg', 'image/jpeg', 18, 1, 1323236584),
(244, 'malha-1-933x11914.jpg', 'images/product_image/original_image/malha-1-933x11914.jpg', 'image/jpeg', 14, 1, 1323237087),
(245, 'eat_sleep_download_t_shirt_medium1.jpg', 'images/product_image/original_image/eat_sleep_download_t_shirt_medium1.jpg', 'image/jpeg', 7, 1, 1323237108),
(246, 'original_tshirt41.jpg', 'images/product_image/original_image/original_tshirt41.jpg', 'image/jpeg', 17, 1, 1323241664),
(247, 'n30tshirt-300x2661.jpg', 'images/project_image/original_image/n30tshirt-300x2661.jpg', 'image/jpeg', 12, 1, 1323242456),
(248, 'romania5.jpg', 'images/project_image/original_image/romania5.jpg', 'image/jpeg', 19, 1, 1323242457),
(249, 'eat_sleep_download_t_shirt_medium.jpg', 'images/project_image/original_image/eat_sleep_download_t_shirt_medium.jpg', 'image/jpeg', 7, 1, 1323242457),
(250, 'Fila_TshirtDownload.jpg', 'images/upcoming_images/original_image/Fila_TshirtDownload.jpg', 'image/jpeg', 18, 1, 1323242755),
(251, 'download_tshirt-p235039520533901287z7tqq_400.jpg', 'images/project_image/original_image/download_tshirt-p235039520533901287z7tqq_400.jpg', 'image/jpeg', 21, 1, 1323256855),
(252, 'malha-1-933x1191.jpg', 'images/project_image/original_image/malha-1-933x1191.jpg', 'image/jpeg', 14, 1, 1323256856),
(253, 'KTM_TShirt_Front.jpg', 'images/project_image/original_image/KTM_TShirt_Front.jpg', 'image/jpeg', 157, 1, 1323256856),
(254, 'bigstock_Woman_working_at_desk_with_lap_20123477.jpg', 'images/profile_image/original_image/bigstock_Woman_working_at_desk_with_lap_20123477.jpg', 'image/jpeg', 300, 1, 1323264319),
(255, 'download_tshirt-p235039520533901287z7tqq_400.jpg', 'images/product_image/original_image/download_tshirt-p235039520533901287z7tqq_400.jpg', 'image/jpeg', 21, 1, 1323684217),
(256, 'n30tshirt-300x266.jpg', 'images/upcoming_images/original_image/n30tshirt-300x266.jpg', 'image/jpeg', 12, 1, 1323693307),
(257, 'original_tshirt4.jpg', 'images/upcoming_images/original_image/original_tshirt4.jpg', 'image/jpeg', 17, 1, 1323693383),
(258, 'malha-1-933x1191.jpg', 'images/upcoming_images/original_image/malha-1-933x1191.jpg', 'image/jpeg', 14, 1, 1323693429),
(259, 'n30tshirt-300x266.jpg', 'images/upcoming_images/original_image/n30tshirt-300x266.jpg', 'image/jpeg', 12, 1, 1323693478),
(260, 'n30tshirt-300x2661.jpg', 'images/upcoming_images/original_image/n30tshirt-300x2661.jpg', 'image/jpeg', 12, 1, 1323693537),
(261, 'n30tshirt-300x2661.jpg', 'images/upcoming_images/original_image/n30tshirt-300x2661.jpg', 'image/jpeg', 12, 1, 1323694030),
(262, 'n30tshirt-300x2662.jpg', 'images/upcoming_images/original_image/n30tshirt-300x2662.jpg', 'image/jpeg', 12, 1, 1323694076),
(277, 'banner2.jpg', 'images/banner_images/banner2.jpg', 'image/jpeg', 19, 1, 1323783492),
(278, 'banner21.jpg', 'images/banner_images/banner21.jpg', 'image/jpeg', 19, 1, 1323783507),
(279, 'banner3.jpg', 'images/banner_images/banner3.jpg', 'image/jpeg', 23, 1, 1323783533),
(280, 'bhutan_festival_banner.jpg', 'images/banner_images/bhutan_festival_banner.jpg', 'image/jpeg', 23, 1, 1323783546),
(281, '4735873851_41ac39cb3b.jpg', 'images/banner_images/4735873851_41ac39cb3b.jpg', 'image/jpeg', 22, 1, 1323783565),
(286, 'romania52.jpg', 'images/product_image/original_image/romania52.jpg', 'image/jpeg', 19, 1, 1323847921),
(285, 'eat_sleep_download_t_shirt_medium2.jpg', 'images/product_image/original_image/eat_sleep_download_t_shirt_medium2.jpg', 'image/jpeg', 7, 1, 1323847501),
(284, 'th_159eff38ab0518ad0f7c2f26b8c7336e_1311334842_magicfields_bigHighlightImage_1_1.jpg', 'images/banner_images/th_159eff38ab0518ad0f7c2f26b8c7336e_1311334842_magicfields_bigHighlightImage_1_1.jpg', 'image/jpeg', 14, 1, 1323846375),
(282, '594781585000.jpg', 'images/banner_images/594781585000.jpg', 'image/jpeg', 39, 1, 1323783580),
(283, 'In-this-photo-provided-by-the-Florida-Keys-News.jpg', 'images/banner_images/In-this-photo-provided-by-the-Florida-Keys-News.jpg', 'image/jpeg', 10, 1, 1323846082),
(287, 'malha-1-933x11915.jpg', 'images/product_image/original_image/malha-1-933x11915.jpg', 'image/jpeg', 14, 1, 1323853086),
(288, 'download_tshirt-p235039520533901287z7tqq_4001.jpg', 'images/product_image/original_image/download_tshirt-p235039520533901287z7tqq_4001.jpg', 'image/jpeg', 21, 1, 1323853138),
(290, 'cool-designer-tshirt_(8)2.jpg', 'images/upcoming_images/original_image/cool-designer-tshirt_(8)2.jpg', 'image/jpeg', 72, 1, 1323943566),
(291, 'In-this-photo-provided-by-the-Florida-Keys-News.jpg', 'images/banner_images/In-this-photo-provided-by-the-Florida-Keys-News.jpg', 'image/jpeg', 10, 1, 1324096241),
(292, '594781585000.jpg', 'images/banner_images/594781585000.jpg', 'image/jpeg', 39, 1, 1324096258),
(293, 'top_banner.jpg', 'images/banner_images/top_banner.jpg', 'image/jpeg', 75, 1, 1324096390),
(294, 'top_banner.jpg', 'images/banner_images/top_banner.jpg', 'image/jpeg', 75, 1, 1324096851),
(295, 'bigstock_Woman_working_at_desk_with_lap_201234771.jpg', 'images/profile_image/original_image/bigstock_Woman_working_at_desk_with_lap_201234771.jpg', 'image/jpeg', 300, 1, 1324273631),
(296, 'KTM_TShirt_Front.jpg', 'images/product_image/original_image/KTM_TShirt_Front.jpg', 'image/jpeg', 157, 1, 1324275217),
(297, 'KTM_TShirt_Front1.jpg', 'images/product_image/original_image/KTM_TShirt_Front1.jpg', 'image/jpeg', 157, 1, 1324275446),
(298, 'banner30.jpg', 'images/banner_images/banner30.jpg', 'image/jpeg', 20, 1, 1324279863),
(299, 'banner301.jpg', 'images/banner_images/banner301.jpg', 'image/jpeg', 20, 1, 1324288721),
(300, '250tnqv.jpg', 'images/banner_images/250tnqv.jpg', 'image/jpeg', 3, 1, 1324289062),
(301, '250tnqv.jpg', 'images/banner_images/250tnqv.jpg', 'image/jpeg', 3, 1, 1324289160),
(302, 'Hrithik1.jpg', 'images/profile_image/original_image/Hrithik1.jpg', 'image/jpeg', 12, 1, 1324297029),
(303, 'Hrithik.jpg', 'images/product_image/original_image/Hrithik.jpg', 'image/jpeg', 12, 1, 1324447099),
(304, 'Hrithik1.jpg', 'images/product_image/original_image/Hrithik1.jpg', 'image/jpeg', 12, 1, 1324447365),
(305, 'Hrithik2.jpg', 'images/product_image/original_image/Hrithik2.jpg', 'image/jpeg', 12, 1, 1324447729),
(306, 'romania53.jpg', 'images/product_image/original_image/romania53.jpg', 'image/jpeg', 19, 1, 1324993819),
(307, 'original_tshirt42.jpg', 'images/product_image/original_image/original_tshirt42.jpg', 'image/jpeg', 17, 1, 1325047600),
(308, 'tshirt17.jpg', 'images/project_image/original_image/tshirt17.jpg', 'image/jpeg', 244, 1, 1325067473),
(309, 'tshirt16.jpg', 'images/project_image/original_image/tshirt16.jpg', 'image/jpeg', 105, 1, 1325067490),
(310, 'tshirt12.jpg', 'images/project_image/original_image/tshirt12.jpg', 'image/jpeg', 136, 1, 1325067508),
(311, 'tshirt1.jpg', 'images/project_image/original_image/tshirt1.jpg', 'image/jpeg', 156, 1, 1325071054),
(312, 'tshirt2.jpg', 'images/project_image/original_image/tshirt2.jpg', 'image/jpeg', 190, 1, 1325071102),
(313, 'tshirt11.jpg', 'images/project_image/original_image/tshirt11.jpg', 'image/jpeg', 156, 1, 1325071767),
(314, 'tshirt8.jpg', 'images/project_image/original_image/tshirt8.jpg', 'image/jpeg', 119, 1, 1325072222),
(315, 'Aishwarya-Hrithik-In-Guzaarish-Movie-Stills-3.jpg', 'adm/images/profile_image/Aishwarya-Hrithik-In-Guzaarish-Movie-Stills-3.jpg', 'image/jpeg', 34, 1, 1325155691),
(316, 'Aishwarya-Hrithik-In-Guzaarish-Movie-Stills-31.jpg', 'adm/images/profile_image/Aishwarya-Hrithik-In-Guzaarish-Movie-Stills-31.jpg', 'image/jpeg', 34, 1, 1325155717),
(317, 'tshirt_simple.jpg', 'images/product_image/original_image/tshirt_simple.jpg', 'image/jpeg', 20, 1, 1325657170),
(392, 'T-Shirts-Design-picture1.jpg', 'images/product_image/original_image/T-Shirts-Design-picture1.jpg', 'image/jpeg', 9, 1, 1327588702),
(319, 'Creative-Men-Fashion-Gift-Ideas-Sayings-Tshirt-by-SJM-Superhero-590x620.jpg', 'images/profile_image/original_image/Creative-Men-Fashion-Gift-Ideas-Sayings-Tshirt-by-SJM-Superhero-590x620.jpg', 'image/jpeg', 51, 1, 1325667098),
(391, '1120211246640661.jpg', 'images/product_image/original_image/1120211246640661.jpg', 'image/jpeg', 219, 1, 1327588592),
(390, 'evil-monkey-5-i2.jpg', 'images/product_image/original_image/evil-monkey-5-i2.jpg', 'image/jpeg', 131, 1, 1327588405),
(323, 'Bioshock_-_Welcome_to_Rapture_(alex)_copy_(1)_large_3.png', 'images/profile_image/original_image/Bioshock_-_Welcome_to_Rapture_(alex)_copy_(1)_large_3.png', 'image/png', 314, 1, 1325765440),
(324, 'Beetlejuice_-_Here_Lies_Betelgeuse_(James)_large_3.png', 'images/upcoming_images/original_image/Beetlejuice_-_Here_Lies_Betelgeuse_(James)_large_3.png', 'image/png', 295, 1, 1325769351),
(397, 'girl.jpg', 'images/product_image/original_image/girl.jpg', 'image/jpeg', 41, 1, 1327664015),
(398, 'avatar_girl.png', 'images/product_image/original_image/avatar_girl.png', 'image/png', 70, 1, 1327664095),
(377, 'Shirt-Designs-11.jpg', 'images/product_image/original_image/Shirt-Designs-11.jpg', 'image/jpeg', 118, 1, 1327587005),
(378, 'tshirt8.jpg', 'images/product_image/original_image/tshirt8.jpg', 'image/jpeg', 119, 1, 1327587056),
(376, '2766744-1-elvis-original.jpg', 'images/product_image/original_image/2766744-1-elvis-original.jpg', 'image/jpeg', 24, 1, 1327586941),
(328, 'Beetlejuice_-_Here_Lies_Betelgeuse_(James)_large_3.png', 'images/product_image/original_image/Beetlejuice_-_Here_Lies_Betelgeuse_(James)_large_3.png', 'image/png', 295, 1, 1325832321),
(329, 'Frankie+Morello+Funky+T+shirt+for+Men+Pink+g_2022_130961.jpg', 'images/product_image/original_image/Frankie+Morello+Funky+T+shirt+for+Men+Pink+g_2022_130961.jpg', 'image/jpeg', 66, 1, 1325833881),
(330, '1120211246640661.jpg', 'images/graphic_image/original_image/1120211246640661.jpg', 'image/jpeg', 219, 1, 1326273368),
(331, '21f6cf60231d7de799019045376d04552d556b9d.jpg', 'images/profile_image/original_image/21f6cf60231d7de799019045376d04552d556b9d.jpg', 'image/jpeg', 7, 1, 1326381860),
(332, 'tshirt20.jpg', 'images/profile_image/original_image/tshirt20.jpg', 'image/jpeg', 57, 1, 1326439631),
(333, 'tshirt201.jpg', 'images/profile_image/original_image/tshirt201.jpg', 'image/jpeg', 57, 1, 1326439663),
(334, 't-shirt_designer.jpg', 'images/profile_image/original_image/t-shirt_designer.jpg', 'image/jpeg', 50, 1, 1326694150),
(335, 'The_Crow_-_Vintage_(alex)_copy_(1)_large_3.png', 'images/profile_image/original_image/The_Crow_-_Vintage_(alex)_copy_(1)_large_3.png', 'image/png', 349, 1, 1326709726),
(336, 'evil-monkey-5-i.jpg', 'images/product_image/original_image/evil-monkey-5-i.jpg', 'image/jpeg', 131, 1, 1326714300),
(337, 'Shirt-Designs-1.jpg', 'images/product_image/original_image/Shirt-Designs-1.jpg', 'image/jpeg', 118, 1, 1326714460),
(338, 'tshirt4.jpg', 'images/product_image/original_image/tshirt4.jpg', 'image/jpeg', 108, 1, 1326714561),
(339, 'tshirt16.jpg', 'images/product_image/original_image/tshirt16.jpg', 'image/jpeg', 105, 1, 1326714648),
(340, 'tshirt3.jpg', 'images/product_image/original_image/tshirt3.jpg', 'image/jpeg', 371, 1, 1326714712),
(341, 'tshirt10.jpg', 'images/product_image/original_image/tshirt10.jpg', 'image/jpeg', 92, 1, 1326714767),
(342, 'tshirt9.jpg', 'images/product_image/original_image/tshirt9.jpg', 'image/jpeg', 168, 1, 1326717270),
(343, 'tshirt191.jpg', 'images/product_image/original_image/tshirt191.jpg', 'image/jpeg', 90, 1, 1326717432),
(389, 'tshirt2.jpg', 'images/product_image/original_image/tshirt2.jpg', 'image/jpeg', 190, 1, 1327588366),
(388, 'tshirt41.jpg', 'images/product_image/original_image/tshirt41.jpg', 'image/jpeg', 108, 1, 1327588320),
(387, 'tshirt5.jpg', 'images/product_image/original_image/tshirt5.jpg', 'image/jpeg', 181, 1, 1327588248),
(386, 'tshirt101.jpg', 'images/product_image/original_image/tshirt101.jpg', 'image/jpeg', 92, 1, 1327588193),
(385, 'tshirt19.jpg', 'images/product_image/original_image/tshirt19.jpg', 'image/jpeg', 90, 1, 1327587980),
(383, 'evil-monkey-5-i1.jpg', 'images/product_image/original_image/evil-monkey-5-i1.jpg', 'image/jpeg', 131, 1, 1327587667),
(384, 'tshirt17.jpg', 'images/product_image/original_image/tshirt17.jpg', 'image/jpeg', 244, 1, 1327587906),
(381, 'tshirt18.jpg', 'images/product_image/original_image/tshirt18.jpg', 'image/jpeg', 242, 1, 1327587312),
(382, 'tshirt12.jpg', 'images/product_image/original_image/tshirt12.jpg', 'image/jpeg', 136, 1, 1327587472),
(380, 'tshirt1.jpg', 'images/product_image/original_image/tshirt1.jpg', 'image/jpeg', 156, 1, 1327587188),
(355, 'images1.jpeg', 'images/product_image/original_image/images1.jpeg', 'image/jpeg', 8, 1, 1326884451),
(379, 'tshirt161.jpg', 'images/product_image/original_image/tshirt161.jpg', 'image/jpeg', 105, 1, 1327587096),
(357, '05881101.jpg', 'images/product_image/original_image/05881101.jpg', 'image/jpeg', 43, 1, 1326884587),
(358, 'Smoking-Gun.jpg', 'images/product_image/original_image/Smoking-Gun.jpg', 'image/jpeg', 70, 1, 1327048806),
(359, 'quality-black-ca099-newest-arrival-man-s-short-sleeve-cotton-t-shirts-shirt-best.jpg', 'images/product_image/original_image/quality-black-ca099-newest-arrival-man-s-short-sleeve-cotton-t-shirts-shirt-best.jpg', 'image/jpeg', 61, 1, 1327049525),
(360, 'tshirt162.jpg', 'images/product_image/original_image/tshirt162.jpg', 'image/jpeg', 105, 1, 1327049595),
(361, 'butt_man_tshirt-p2358988965151900693ygf_400.jpg', 'images/product_image/original_image/butt_man_tshirt-p2358988965151900693ygf_400.jpg', 'image/jpeg', 28, 1, 1327068288),
(362, 'Frankie+Morello+Funky+T+shirt+for+Men+Pink+g_2022_130962.jpg', 'images/product_image/original_image/Frankie+Morello+Funky+T+shirt+for+Men+Pink+g_2022_130962.jpg', 'image/jpeg', 66, 1, 1327068305),
(363, '42177157.jpg', 'images/product_image/original_image/42177157.jpg', 'image/jpeg', 101, 1, 1327068333),
(364, '12382812911_0.jpg', 'images/product_image/original_image/12382812911_0.jpg', 'image/jpeg', 51, 1, 1327068369),
(365, 'Bioshock_2_-_Player_(alex)_copy_(1)_large_3.png', 'images/product_image/original_image/Bioshock_2_-_Player_(alex)_copy_(1)_large_3.png', 'image/png', 286, 1, 1327068981),
(366, 'etJXMXBa9N4IF7m.jpg', 'images/product_image/original_image/etJXMXBa9N4IF7m.jpg', 'image/jpeg', 71, 1, 1327069012),
(367, 'T-Shirts-Design-picture.jpg', 'images/product_image/original_image/T-Shirts-Design-picture.jpg', 'image/jpeg', 30, 1, 1327143712),
(368, '365178442_447.jpg', 'images/product_image/original_image/365178442_447.jpg', 'image/jpeg', 54, 1, 1327143782),
(369, 'F-21.jpg', 'images/product_image/original_image/F-21.jpg', 'image/jpeg', 117, 1, 1327313169),
(370, 'The_Crowe_-_Quote_(alex)_copy_(1)_Large_3.png', 'images/product_image/original_image/The_Crowe_-_Quote_(alex)_copy_(1)_Large_3.png', 'image/png', 282, 1, 1327313213),
(375, 'three-wolf-moon-t-shirt-designs.jpg', 'images/product_image/original_image/three-wolf-moon-t-shirt-designs.jpg', 'image/jpeg', 69, 1, 1327586909),
(372, 'Prototype_-_Jumper_Red_(james)_copy_(1)_large_31.png', 'images/product_image/original_image/Prototype_-_Jumper_Red_(james)_copy_(1)_large_31.png', 'image/png', 281, 1, 1327313530),
(373, '12444845305_0.jpg', 'images/product_image/original_image/12444845305_0.jpg', 'image/jpeg', 39, 1, 1327317953),
(374, 'Frankie+Morello+Funky+T+shirt+for+Men+Pink+g_2022_13096.jpg', 'images/profile_image/original_image/Frankie+Morello+Funky+T+shirt+for+Men+Pink+g_2022_13096.jpg', 'image/jpeg', 66, 1, 1327495267),
(393, 'Prototype_-_Jumper_Red_(james)_copy_(1)_large_3.png', 'images/product_image/original_image/Prototype_-_Jumper_Red_(james)_copy_(1)_large_3.png', 'image/png', 281, 1, 1327588766),
(394, 'tshirt11.jpg', 'images/product_image/original_image/tshirt11.jpg', 'image/jpeg', 42, 1, 1327588856),
(395, 'tshirt20.jpg', 'images/product_image/original_image/tshirt20.jpg', 'image/jpeg', 57, 1, 1327588924),
(396, 'tshirt6.jpg', 'images/product_image/original_image/tshirt6.jpg', 'image/jpeg', 255, 1, 1327589704),
(399, 'avatar.png', 'images/product_image/original_image/avatar.png', 'image/png', 59, 1, 1327664105),
(400, 'andrea-breast-cancer-tshirt.jpg', 'images/profile_image/original_image/andrea-breast-cancer-tshirt.jpg', 'image/jpeg', 503, 1, 1327898268),
(401, 'tshirt18.jpg', 'images/graphic_image/original_image/tshirt18.jpg', 'image/jpeg', 242, 1, 1327929052),
(402, 'image1kkxxl.jpg', 'images/project_image/original_image/image1kkxxl.jpg', 'image/jpeg', 147, 1, 1328009054),
(405, 'tshirt20.jpg', 'images/graphic_image/original_image/tshirt20.jpg', 'image/jpeg', 57, 1, 1328594563),
(406, 'tshirt21.jpg', 'images/project_image/original_image/tshirt21.jpg', 'image/jpeg', 190, 1, 1328596708),
(407, 'tshirt3.jpg', 'images/project_image/original_image/tshirt3.jpg', 'image/jpeg', 371, 1, 1328597445),
(408, 'tshirt6.jpg', 'images/project_image/original_image/tshirt6.jpg', 'image/jpeg', 255, 1, 1328597629),
(409, 'tshirt31.jpg', 'images/project_image/original_image/tshirt31.jpg', 'image/jpeg', 371, 1, 1328597694),
(411, 'tshirt_simple1.jpg', 'images/product_image/original_image/tshirt_simple1.jpg', 'image/jpeg', 20, 1, 1328770829),
(412, 'tshirt7.jpg', 'images/product_image/original_image/tshirt7.jpg', 'image/jpeg', 132, 1, 1328770902),
(413, 'tshirt81.jpg', 'images/project_image/original_image/tshirt81.jpg', 'image/jpeg', 119, 1, 1329111644),
(414, 'tshirt10.jpg', 'images/project_image/original_image/tshirt10.jpg', 'image/jpeg', 92, 1, 1329111858),
(415, 'tshirt5.jpg', 'images/project_image/original_image/tshirt5.jpg', 'image/jpeg', 181, 1, 1329111927),
(416, 'tshirt20.jpg', 'images/project_image/original_image/tshirt20.jpg', 'image/jpeg', 57, 1, 1329111954),
(417, 'image1kkxxl1.jpg', 'images/project_image/original_image/image1kkxxl1.jpg', 'image/jpeg', 147, 1, 1329136417),
(418, 'tshirt111.jpg', 'images/product_image/original_image/tshirt111.jpg', 'image/jpeg', 42, 1, 1329398294),
(419, 'F-2.jpg', 'images/product_image/original_image/F-2.jpg', 'image/jpeg', 117, 1, 1329398433),
(420, 'tshirt_simple2.jpg', 'images/product_image/original_image/tshirt_simple2.jpg', 'image/jpeg', 20, 1, 1329398582);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_graphic`
--

CREATE TABLE IF NOT EXISTS `tbl_graphic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `contest_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_id` int(15) NOT NULL,
  `date_added` int(10) NOT NULL,
  `ip_address` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_graphic`
--

INSERT INTO `tbl_graphic` (`id`, `title`, `description`, `contest_id`, `user_id`, `file_id`, `date_added`, `ip_address`) VALUES
(12, 'Graphic 2', 'juhayhio', 0, 47, 330, 1326273368, ''),
(17, 'Test 1', 'I place my design!!!!!!!!1', 0, 46, 405, 1328594562, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ordaddress`
--

CREATE TABLE IF NOT EXISTS `tbl_ordaddress` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) NOT NULL,
  `address_line3` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `postcode` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=163 ;

--
-- Dumping data for table `tbl_ordaddress`
--

INSERT INTO `tbl_ordaddress` (`id`, `first_name`, `last_name`, `address_line1`, `address_line2`, `address_line3`, `city`, `state`, `country`, `postcode`, `type`) VALUES
(10, 'Krishna', '', 'c16', 'greater kailash', 'colony', 'jaipur', 'rajasthan', 'india', '302013', 'billing'),
(9, 'Krishna', 'Sharma', 'test1', 'test', 'test', 'jaipur', 'rajasthan', 'india', '1234', 'shipping'),
(8, 'Krishna', 'Sharma', 'test1', 'test', 'test', 'jaipur', 'rajasthan', 'india', '11', 'billing'),
(7, 'Krishna', 'Sharma', 'test1', 'test', 'test', 'jaipur', 'rajasthan', 'india', '11', 'shipping'),
(5, 'Krishna', 'Sharma', 'test1', 'test', 'test', 'jaipur', 'rajasthan', 'india', '1234', 'shipping'),
(6, 'Krishna', 'Sharma', 'test1', 'test', 'test', 'jaipur', 'rajasthan', 'india', '1234', 'billing'),
(11, 'Krishna', 'Sharma', 'test1', 'test', 'test', 'jaipur', 'rajasthan', 'india', '1234', 'shipping'),
(12, 'Krishna', '', 'c16', 'greater kailash', 'colony', 'jaipur', 'rajasthan', 'india', '302013', 'billing'),
(13, 'Krishna', 'Sharma', 'test1', 'test', 'test', 'jaipur', 'rajasthan', 'india', '1234', 'shipping'),
(14, 'Krishna', '', 'c16', 'greater kailash', 'colony', 'jaipur', 'rajasthan', 'india', '302013', 'billing'),
(15, 'Krishna', 'Sharma', 'test1', 'test', 'test', 'jaipur', 'rajasthan', 'india', 'dsfsdf', 'shipping'),
(16, 'Krishna', 'Sharma', 'c16 greater', 'kailash', 'colony', 'jaipur', 'rajasthan', 'india', '302013', 'billing'),
(17, 'Krishna', 'Sharma', 'test1', 'test', 'test', 'jaipur', 'rajasthan', 'india', 'dsfsdf', 'shipping'),
(18, 'Krishna', 'Sharma', 'c16 greater', 'kailash', 'colony', 'jaipur', 'rajasthan', 'india', '302013', 'billing'),
(19, 'Krishna', 'Sharma', 'test1', 'test', 'test', 'jaipur', 'rajasthan', 'india', '123', 'shipping'),
(20, 'Krishna', 'Sharma', 'test1', 'test', 'test', 'jaipur', 'rajasthan', 'india', '123', 'billing'),
(21, 'Krishna', 'Sharma', 'test1', 'test', 'test', 'jaipur', 'rajasthan', 'india', '111', 'shipping'),
(22, 'Krishna', 'Sharma', 'test1', 'test', 'test', 'jaipur', 'rajasthan', 'india', '111', 'billing'),
(23, 'Krishna', 'Sharma', 'test1', 'test', 'test', 'jaipur', 'rajasthan', 'india', '111', 'shipping'),
(24, 'Krishna', 'Sharma', 'test1', 'test', 'test', 'jaipur', 'rajasthan', 'india', '111', 'billing'),
(25, 'Krishna', 'Sharma', 'test1', 'test', 'test', 'jaipur', 'rajasthan', 'india', 'sdfsdf', 'shipping'),
(26, 'Krishna', 'Sharma', 'test1', 'test', 'test', 'jaipur', 'rajasthan', 'india', 'sdfsdf', 'billing'),
(27, 'Krishna', 'Sharma', 'test1', 'test', 'test', 'jaipur', 'rajasthan', 'india', 'sadad', 'shipping'),
(28, 'Krishna', 'Sharma', 'test1', 'test', 'test', 'jaipur', 'rajasthan', 'india', 'sadad', 'billing'),
(29, 'Krishna', 'Sharma', 'test', 'test', 'test', 'jaipur', 'rajasthan', 'india', '123', 'shipping'),
(30, 'Krishna', 'Sharma', 'test', 'test', 'test', 'jaipur', 'rajasthan', 'india', '123', 'billing'),
(31, 'Sudesh Pal', 'Yadav', 'G-1', 'Sitabari', 'Sanganer', 'jaipur', 'rajasthan', 'India', '302013', 'shipping'),
(32, 'Sudesh Pal', 'Yadav', 'G-1', 'Sitabari', 'Sanganer', 'jaipur', 'rajasthan', 'India', '302013', 'billing'),
(33, 'mukesh', 'sharma', 'Lalkothi', 'fdf', 'df', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(34, 'mukesh', 'sharma', 'Lalkothi', 'vxcfv', 'gdgdf', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(35, 'mukesh', 'sharma', 'Lalkothi', 'gfsdfg', 'sdfsdf', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(36, 'mukesh', 'sharma', 'Lalkothi', 'hgfh', 'hdfhdf', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(37, 'mukesh', 'sharma', 'Lalkothi', 'asd', 'asdsa', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(38, 'mukesh', 'sharma', 'Lalkothi', 'asd', 'asd', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(39, 'Krishna', 'Sharma', 'test', 'test', 'testing the code', 'jaipur', 'rajasthan', 'india', '302010', 'shipping'),
(40, 'Krishna', 'Sharma', 'test', 'test', 'testing the code', 'jaipur', 'rajasthan', 'india', '302010', 'billing'),
(41, 'Krishna', 'Sharma', 'test', 'test', 'testing the code', 'jaipur', 'rajasthan', 'india', '302010', 'shipping'),
(42, 'Krishna', 'Sharma', 'test', 'test', 'testing the code', 'jaipur', 'rajasthan', 'india', '302010', 'billing'),
(43, 'Avdhesh', 'Bansal', '234324', '324', '24324', '324324', '4324', '4234', 'dsfdsf', 'shipping'),
(44, 'Avdhesh', 'Bansal', '234324', '324', '24324', '324324', '4324', '4234', 'dsfdsf', 'billing'),
(45, 'df', 'sfdsfsd', 'sdf', 'dsfds', 'sdfds', 'fdsfds', 'fdsfsd', 'fsd', 'fdsf', 'shipping'),
(46, 'df', 'sfdsfsd', 'sdf', 'dsfds', 'sdfds', 'fdsfds', 'fdsfsd', 'fsd', 'fdsf', 'billing'),
(47, 'Krishna', 'Sharma', 'test', 'test', 'test', 'jaipur', 'rajasthan', 'india', '1234', 'billing'),
(48, 'ravi', 'choudhary', 'test', 'test', 'test', 'jaipur', 'rajasthan', 'india', '12345', 'shipping'),
(49, 'Avdhe', 'Ban', 'Adlin', 'dd', 'Adlin', 'jai', 'Rajasth', 'ind', '3214', 'billing'),
(50, 'Avdhe', 'Ban', 'Adlin', 'dd', 'Adlin', 'jai', 'Rajasth', 'ind', '3214', 'billing'),
(51, 'Avdhesh', 'Bansal', 'Adline1', 'Adline2', 'Adline3', 'jaipur', 'Rajasthan', 'india', '46546', 'billing'),
(52, 'fggfdg', 'gdfgdfgdf', 'Adline1', 'Adline2', 'Adline3', 'jaipur', 'Rajasthan', 'india', 'gdfgfd', 'shipping'),
(53, 'mukesh', 'sharma', 'Lalkothi', 'fdsf sf', ' sdf dsf', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(54, 'mukesh', 'sharma', 'Lalkothi', 'fdsf sf', ' sdf dsf', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(55, 'mukesh', 'sharma', 'Lalkothi', 'derd', 'dfsdf', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(56, 'mukesh', 'sharma', 'Lalkothi', 'sad', 'dasdas', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(57, 'mukesh', 'sharma', 'Lalkothi', 'kjk gjd jhgj df hyyfg h', ' fgh   fghfg hsrtyer ty45y 4 54', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(58, 'mukesh', 'sharma', 'Lalkothi', 'kjk gjd jhgj df hyyfg h', ' fgh   fghfg hsrtyer ty45y 4 54', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(59, 'mukesh', 'sharma', 'Lalkothi', 'rrtery', 'tyuytu', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(60, 'ashok ', 'taneja', 'Lalkothi', 'rrtery', 'tyuytu', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(61, 'mukesh', 'sharma', 'Lalkothi', 'asr', 'fwerwer', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(62, 'mukesh', 'sharma', 'Lalkothi', 'asr', 'fwerwer', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(63, 'Krishna', 'Sharma', 'test', 'test', 'test', 'jaipur', 'rajasthan', 'india', '302013', 'billing'),
(64, 'Krishna', 'Sharma', 'test', 'test', 'test', 'jaipur', 'rajasthan', 'india', '302013', 'shipping'),
(65, 'Krishna', 'Sharma', 'test', 'test', 'test', 'jaipur', 'rajasthan', 'india', '321', 'billing'),
(66, 'Krishna', 'Sharma', 'test', 'test', 'test', 'jaipur', 'rajasthan', 'india', '321', 'shipping'),
(67, 'Avdhesh12', 'Bansal12', 'Adline122', 'Adline222', 'Adline322', 'jaipur22', 'Rajasthan22', 'india22', 'dfds', 'billing'),
(68, 'dsfd', 'dfsd', 'Adline122', 'Adline222', 'Adline322', 'jaipur22', 'Rajasthan22', 'india22', 'dfdfd', 'shipping'),
(69, 'mukesh', 'kumar', 'Lalkothi', 'sdasadd', 'asdasd', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(70, 'mukesh', 'sharma', 'Lalkothi', 'fsdf', 'fsfsf', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(71, 'Krishna', 'Sharma', 'test', 'test', 'test', 'jaipur', 'rajasthan', 'india', '11111', 'billing'),
(72, 'Krishna', 'Sharma', 'test', 'test', 'test', 'jaipur', 'rajasthan', 'india', '11111', 'shipping'),
(73, 'mukesh', 'kumar', 'Lalkothi', 'hfhghf fgh fh ', 'fgh fghf fgh fgh', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(74, 'mukesh', 'kumar', 'Lalkothi', ' hgfh ', 'fghfgh', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(75, 'mukesh', 'kumar', 'Lalkothi', 'sfdfsdf', 'fdgfdg', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(76, 'mukesh', 'kumar', 'Lalkothi', 'sfdfsdf', 'fdgfdg', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(77, 'mukesh', 'kumar', 'Lalkothi', 'dfgdfg', 'dgfg', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(78, 'mukesh', 'kumar', 'Lalkothi', 'dfgdfg', 'dgfg', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(79, 'mukesh', 'kumar', 'Lalkothi', 'gdfg', 'dfgdfg', 'jai', 'Raj', 'Ind', '30201', 'billing'),
(80, 'mukesh', 'kumar', 'Lalkothi', 'gdfg', 'dfgdfg', 'jai', 'Raj', 'Ind', '30201', 'shipping'),
(81, 'mukesh', 'kumar', 'Lalkothi', 'wreew f we', 'wer we', 'jai', 'Raj', 'Ind', '30201', 'billing'),
(82, 'mukesh', 'kumar', 'Lalkothi', 'wreew f we', 'wer we', 'jai', 'Raj', 'Ind', '30201', 'shipping'),
(83, 'mukesh', 'kumar', 'Lalkothi', 'dfdsf', 'g sdgf', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(84, 'mukesh', 'kumar', 'Lalkothi', 'dfdsf', 'g sdgf', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(85, 'mukesh', 'kumar', 'Lalkothi', 'etr', 'tret', 'jai', 'Raj', 'Ind', '30201', 'billing'),
(86, 'mukesh', 'kumar', 'Lalkothi', 'etr', 'tret', 'jai', 'Raj', 'Ind', '30201', 'shipping'),
(87, 'SEBASTIANO', 'GUERRIERO', 'G-12', 'ttt', 'eee', 'Naples', 'Naples', 'Italy', '80030', 'billing'),
(88, 'SEBASTIANO', 'GUERRIERO', 'G-12', 'ttt', 'eee', 'Naples', 'Naples', 'Italy', '80030', 'shipping'),
(89, 'mukesh', 'sharma', 'Lalkothi', 'fdsf', 'sfsdfsdf', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(90, 'mukesh', 'sharma', 'Lalkothi', 'fbsdb', 'fbsdbfvbb', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(91, 'mukesh', 'sharma', 'Lalkothi', 'erwer', 'sdfsd', 'jai', 'Raj', 'Ind', '3020154', 'billing'),
(92, 'vikas', 'sharma', 'Lalkothi', 'sdfs', 'sdfsb', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(93, 'SEBASTIANO', 'GUERRIERO', 'G-12', 'uuuu', 'tttt', 'Naples', 'naples', 'Italy', '80030', 'billing'),
(94, 'SEBASTIANO', 'GUERRIERO', 'G-12', 'uuuu', 'tttt', 'Naples', 'naples', 'Italy', '80030', 'shipping'),
(95, 'mukesh', 'sharma', 'Lalkothi', 'rwrw tert', 'tertert', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(96, 'mukesh', 'sharma', 'Lalkothi', 'fsdf dsf sdf', 'sfsd sdf sdfsd', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(97, 'mukesh', 'sharma', 'Lalkothi', 'sdad sff', 'sfsdf fsdf', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(98, 'mukesh', 'sharma', 'Lalkothi', 'sdf gdfg', 'dg dfgg', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(99, 'mukesh', 'sharma', 'Lalkothi', 'ewrew  dfef', 'sdf dsf sdf', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(100, 'mukesh', 'sharma', 'Lalkothi', 'gert t t', ' et t ert', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(101, 'Krishna', 'Sharma', 'test', 'test', 'test', 'jaipur', 'rajasthan', 'india', '123', 'billing'),
(102, 'Krishna', 'Sharma', 'test', 'test', 'test', 'jaipur', 'rajasthan', 'india', '123', 'shipping'),
(103, 'mukesh', 'sharma', 'Lalkothi', 'ju gf ', 'ghj kjhk', 'jai', 'Raj', 'Ind', '302014', 'billing'),
(104, 'mukesh', 'sharma', 'Lalkothi', 'erve  ', 'dgdfgd g', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(105, 'mukesh', 'sharma', 'Lalkothi', 'asdasd', 'das sa sadas', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(106, 'mukesh', 'sharma', 'Lalkothi', 'wqewqe e e ', 'qe we qwe', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(107, 'mukesh', 'sharma', 'Lalkothi', 'sad asd d das', ' das as asdas', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(108, 'mukesh', 'sharma', 'Lalkothi', 'rfsdf sdfsd ', ' sdf sf sdf', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(109, 'mukesh', 'sharma', 'Lalkothi', 'fhghgfh ', ' fh h', 'jai', 'Raj', 'Ind', '30201', 'billing'),
(110, 'mukesh', 'sharma', 'Lalkothi', 'bbnm', 'mcm', 'jai', 'Raj', 'Ind', '30201', 'shipping'),
(111, 'mukesh', 'sharma', 'Lalkothi', 'sdfsd df f', ' sdf  sdf ', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(112, 'mukesh', 'sharma', 'Lalkothi', 'dsf f', 'fsd ', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(113, 'mukesh', 'sharma', 'Lalkothi', 'sdfsd df f', ' sdf  sdf ', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(114, 'mukesh', 'sharma', 'Lalkothi', 'dsf f', 'fsd ', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(115, 'mukesh', 'sharma', 'Lalkothi', 'dsfs dsfsdf', 'sdf sdfsdf sdf', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(116, 'mukesh', 'sharma', 'Lalkothi', 'dsa  df ', 'fsdf dsf ds fsdf', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(117, 'mukesh', 'sharma', 'Lalkothi', 'sfdsf f', ' sdfdf', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(118, 'mukesh', 'sharma', 'Lalkothi', 'sfdsf f', ' sdfdf', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(119, 'mukesh', 'sharma', 'Lalkothi', 'tfertv ert ', 'e te er', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(120, 'mukesh', 'sharma', 'Lalkothi', 'tfertv ert ', 'e te er', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(121, 'SEBASTIANOtest', 'GUERRIEROtest', 'G-12test', 'test', 'test', 'Naplestest', 'test', 'Italytest', 'test', 'billing'),
(122, 'SEBASTIANOtest', 'GUERRIEROtest', 'G-test', 'test', 'est', 'Naplestest', 'test', 'Italytest', 'test', 'shipping'),
(123, 'SEBASTIANOtest', 'GUERRIEROtest', 'G-12test', 'test', 'test', 'Naplestest', 'test', 'Italytest', 'test', 'billing'),
(124, 'SEBASTIANOtest', 'GUERRIEROtest', 'G-12test', 'test', 'test', 'Naplestest', 'test', 'Italytest', 'test', 'shipping'),
(125, 'mukesh', 'sharma', 'Lalkothi', 'fdg g ', 'dfg dg', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(126, 'mukesh', 'sharma', 'Lalkothi', 'dfs ds', 'sf ffs', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(127, 'mukesh', 'sharma', 'Lalkothi', 'wer', 'w', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(128, 'mukesh', 'sharma', 'Lalkothi', 'ddd', 'ddd', 'jai', 'Raj', 'Ind', '3020125', 'shipping'),
(129, 'SEBASTIANO', 'GUERRIERO', 'G-12', 'viaoo ', 'viaoo', 'Naples', 'mariglianella', 'Italy', '80030', 'billing'),
(130, 'SEBASTIANO', 'GUERRIERO', 'G-12', 'viaoo ', 'viaoo', 'Naples', 'mariglianella', 'Italy', '80030', 'shipping'),
(131, 'mukesh', 'sharma', 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(132, 'mukesh', 'sharma', 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(133, 'mukesh', 'sharma', 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(134, 'mukesh', 'sharma', 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(135, 'Krishna', 'Sharma', 'test', 'test', 'test', 'jaipur', 'rajasthan', 'india', '111', 'billing'),
(136, 'Krishna', 'Sharma', 'test', 'test', 'test', 'jaipur', 'rajasthan', 'india', '111', 'shipping'),
(137, 'mukesh', 'sharma', 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(138, 'mukesh', 'sharma', 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(139, 'mukesh', 'sharma', 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(140, 'mukesh', 'sharma', 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(141, 'SEBASTIANO', 'GUERRIERO', 'G-12', 'ghht', 'gjjt', 'Naples', 'italy', 'Italy', '80030', 'billing'),
(142, 'SEBASTIANO', 'GUERRIERO', 'G-12', 'ghht', 'gjjt', 'Naples', 'italy', 'Italy', '80030', 'shipping'),
(143, 'mukesh', 'sharma', 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', '30201', 'billing'),
(144, 'mukesh', 'sharma', 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', '30201', 'shipping'),
(145, 'mukesh', 'sharma', 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(146, 'mukesh', 'sharma', 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(147, 'mukesh', 'sharma', 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(148, 'mukesh', 'sharma', 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(149, 'mukesh', 'sharma', 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', '32015', 'billing'),
(150, 'mukesh', 'sharma', 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', '32015', 'shipping'),
(151, 'mukesh', 'sharma', 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(152, 'mukesh', 'sharma', 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(153, 'SEBASTIANO', 'GUERRIERO', 'G-12', '', '', 'Naples', 'ert', 'Italy', '75', 'billing'),
(154, 'SEBASTIANO', 'GUERRIERO', 'G-12', '', '', 'Naples', 'ert', 'Italy', '75', 'shipping'),
(155, 'mukesh', 'sharma', 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(156, 'mukesh', 'sharma', 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(157, 'mukesh', 'sharma', 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(158, 'mukesh', 'sharma', 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(159, 'mukesh', 'sharma', 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', '302015', 'billing'),
(160, 'mukesh', 'sharma', 'Lalkothi', '', '', 'jai', 'Raj', 'Ind', '302015', 'shipping'),
(161, 'SEBASTIANO', 'GUERRIERO', 'G-12', 'vip', 'ciop', 'Naples', 'hthththt', 'Italy', '869696', 'billing'),
(162, 'SEBASTIANO', 'GUERRIERO', 'G-12', 'vip', 'ciop', 'Naples', 'hthththt', 'Italy', '869696', 'shipping');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hash_code` varchar(225) NOT NULL,
  `payment` int(11) DEFAULT NULL,
  `status` varchar(225) NOT NULL,
  `order_date` date NOT NULL,
  `deliver_date` date DEFAULT NULL,
  `total_amount` int(10) NOT NULL,
  `tax` int(10) DEFAULT NULL,
  `shipping_amount` int(10) DEFAULT NULL,
  `shipping_tax` int(10) DEFAULT NULL,
  `shipping_address` int(11) NOT NULL,
  `coupon_code` varchar(225) DEFAULT NULL,
  `coupon` int(11) DEFAULT NULL,
  `currency` int(3) DEFAULT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `ip_address` varchar(100) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `pmtmethod` varchar(100) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6547696 ;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `user_id`, `hash_code`, `payment`, `status`, `order_date`, `deliver_date`, `total_amount`, `tax`, `shipping_amount`, `shipping_tax`, `shipping_address`, `coupon_code`, `coupon`, `currency`, `is_active`, `ip_address`, `shipping_id`, `pmtmethod`, `coupon_id`) VALUES
(6547556, 1, 'jhjahjh', NULL, 'completed', '2011-11-16', '2011-11-17', 43, 12, 10, 4, 2, NULL, NULL, NULL, '0', '', 0, '', 0),
(6547557, 1, 'vdcbcbn fd ffff', NULL, 'shipped', '2011-11-16', '2011-11-10', 43, 12, 8, 2, 2, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547558, 44, '', 210, 'payment underprocess', '2011-12-14', NULL, 210, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547559, 44, '', 110, 'refunded', '2011-12-14', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547560, 44, '', 110, 'payment underprocess', '2011-12-14', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547561, 0, '', NULL, 'pending', '0000-00-00', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547562, 44, '', 110, 'pending', '2011-12-14', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '0', '', 0, '', 0),
(6547563, 0, '', NULL, 'pending', '0000-00-00', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547564, 1, '', 410, 'payment underprocess', '2011-12-15', NULL, 410, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547565, 1, '', 410, 'payment underprocess', '2011-12-15', NULL, 410, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547566, 44, '', 210, 'payment underprocess', '2011-12-16', NULL, 210, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547567, 1, '', 210, 'payment underprocess', '2011-12-16', NULL, 210, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547568, 44, '', 210, 'pending', '2011-12-16', NULL, 210, NULL, 10, NULL, 0, NULL, NULL, NULL, '0', '', 0, '', 0),
(6547569, 44, '', 210, 'payment underprocess', '2011-12-16', NULL, 210, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547570, 44, '', 210, 'refunded', '2011-12-16', NULL, 210, NULL, 10, NULL, 0, NULL, NULL, NULL, '0', '', 0, '', 0),
(6547571, 44, '', 210, 'payment underprocess', '2011-12-16', NULL, 210, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547572, 44, '', 310, 'payment underprocess', '2011-12-16', NULL, 310, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547573, 1, '', 110, 'payment underprocess', '2011-12-17', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547574, 44, '', 310, 'payment underprocess', '2011-12-17', NULL, 310, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547575, 44, '', 310, 'payment underprocess', '2011-12-17', NULL, 310, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547576, 1, '', 310, 'payment underprocess', '2011-12-17', NULL, 310, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547577, 44, '', 310, 'pending', '2011-12-17', NULL, 310, NULL, 10, NULL, 0, NULL, NULL, NULL, '0', '', 0, '', 0),
(6547578, 1, '', 310, 'pending', '2011-12-17', NULL, 310, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547579, 44, '', 110, 'pending', '2011-12-17', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '0', '', 0, '', 0),
(6547580, 44, '', 210, 'Payment Successful', '2011-12-17', NULL, 210, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547581, 44, '', 110, 'Payment Successful', '2011-12-17', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547582, 46, '', 110, 'refunded', '0000-00-00', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '0', '', 0, '', 0),
(6547583, 46, '', 210, 'refunded', '0000-00-00', NULL, 210, NULL, 10, NULL, 0, NULL, NULL, NULL, '0', '', 0, '', 0),
(6547584, 46, '', 510, 'Payment Successful', '2011-12-19', NULL, 510, NULL, 10, NULL, 0, NULL, NULL, NULL, '0', '', 0, '', 0),
(6547585, 46, '', 610, 'Payment Pending', '2011-12-19', NULL, 610, NULL, 10, NULL, 0, NULL, NULL, NULL, '0', '', 0, '', 0),
(6547586, 0, '', NULL, 'Payment Successful', '0000-00-00', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547587, 40, '', 110, 'Payment Successful', '2011-12-19', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547588, 46, '', 110, 'Payment Successful', '2011-12-19', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '0', '', 0, '', 0),
(6547589, 46, '', 110, 'Payment Pending', '2011-12-19', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547590, 46, '', 110, 'Payment Pending', '2011-12-19', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547591, 46, '', 210, 'Payment Pending', '2011-12-19', NULL, 210, NULL, 10, NULL, 0, NULL, NULL, NULL, '0', '', 0, '', 0),
(6547592, 46, '', 410, 'Payment Successful', '2011-12-19', NULL, 410, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547593, 46, '', 210, 'Payment Successful', '2011-12-19', NULL, 210, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547594, 46, '', 110, 'Payment Pending', '2011-12-19', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547595, 1, '', 210, 'shipped', '2011-12-19', NULL, 210, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547596, 46, '', 110, 'Payment Successful', '2011-12-19', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547597, 46, '', 110, 'Payment Pending', '2011-12-19', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '0', '', 0, '', 0),
(6547598, 46, '', 110, 'Payment Pending', '2011-12-20', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '0', '', 0, '', 0),
(6547599, 46, '', 310, 'refunded', '2011-12-20', NULL, 310, NULL, 10, NULL, 0, NULL, NULL, NULL, '0', '', 0, '', 0),
(6547600, 46, '', 310, 'Payment Pending', '2011-12-20', NULL, 310, NULL, 10, NULL, 0, NULL, NULL, NULL, '0', '', 0, '', 0),
(6547601, 46, '', 410, 'Payment Pending', '2011-12-20', NULL, 410, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547602, 46, '', 510, 'Payment Pending', '2011-12-20', NULL, 510, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547603, 46, '', 110, 'refunded', '2011-12-20', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547604, 46, '', 110, 'refunded', '2011-12-20', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547605, 0, '', NULL, 'Payment Successful', '0000-00-00', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547606, 46, '', 110, 'canceled', '2011-12-21', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '0', '', 0, '', 0),
(6547607, 46, '', 210, 'refunded', '2011-12-25', NULL, 210, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547608, 46, '', 110, 'refunded', '2011-12-26', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '0', '', 0, '', 0),
(6547609, 0, '', 10, 'Payment Pending', '2011-12-26', NULL, 10, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547610, 1, '', 110, 'Payment Pending', '2011-12-27', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547611, 46, '', 210, 'refunded', '2011-12-28', NULL, 210, NULL, 10, NULL, 0, NULL, NULL, NULL, '0', '', 0, '', 0),
(6547612, 40, '', 110, 'Payment Pending', '2011-12-29', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547613, 1, '', 110, 'Payment Successful', '2011-12-29', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547614, 46, '', 110, 'refunded', '2011-12-29', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547615, 0, '', NULL, '', '0000-00-00', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '0', '', 0, '', 0),
(6547616, 46, '', 120, 'refunded', '2011-12-29', NULL, 120, NULL, 20, NULL, 0, NULL, NULL, NULL, '0', '', 0, '', 0),
(6547617, 1, '', 110, 'Payment Pending', '2012-01-04', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547618, 0, '', NULL, '', '0000-00-00', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '0', '', 0, '', 0),
(6547619, 0, '', NULL, '', '0000-00-00', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '0', '', 0, '', 0),
(6547620, 46, '', 110, 'Payment Pending', '2012-01-06', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547621, 40, '', NULL, 'Payment Pending', '2012-01-11', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547622, 40, '', 110, 'Payment Successful', '2012-01-11', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 1, 'paypal', 0),
(6547623, 50, '', 310, 'Payment Pending', '2012-01-11', NULL, 310, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 1, 'paypal', 0),
(6547624, 50, '', NULL, 'Payment Pending', '2012-01-12', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '0', '', 1, '', 0),
(6547625, 40, '', 120, 'Payment Pending', '2012-01-12', NULL, 120, NULL, 20, NULL, 0, NULL, NULL, NULL, '1', '', 2, 'paypal', 0),
(6547626, 50, '', 220, 'Payment Successful', '2012-01-12', NULL, 220, NULL, 20, NULL, 0, NULL, NULL, NULL, '1', '', 2, 'authorize', 0),
(6547627, 50, '', 465, 'Payment Successful', '2012-01-12', NULL, 465, NULL, 20, NULL, 0, NULL, NULL, NULL, '1', '', 2, 'paypal', 0),
(6547628, 46, '', 110, 'refunded', '2012-01-13', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 1, 'authorize', 0),
(6547629, 46, '', 220, 'refunded', '2012-01-13', NULL, 220, NULL, 20, NULL, 0, NULL, NULL, NULL, '1', '', 2, 'paypal', 0),
(6547630, 46, '', NULL, 'Payment Pending', '2012-01-13', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547631, 46, '', 120, 'Payment Successful', '2012-01-13', NULL, 120, NULL, 20, NULL, 0, NULL, NULL, NULL, '1', '', 2, 'paypal', 0),
(6547632, 46, '', 220, 'refunded', '2012-01-13', NULL, 220, NULL, 20, NULL, 0, NULL, NULL, NULL, '1', '', 2, 'paypal', 0),
(6547633, 0, '', NULL, '', '0000-00-00', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '0', '', 0, '', 0),
(6547634, 0, '', NULL, '', '0000-00-00', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '0', '', 0, '', 0),
(6547635, 0, '', NULL, '', '0000-00-00', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '0', '', 0, '', 0),
(6547636, 40, '', 120, 'Payment Successful', '2012-01-15', NULL, 120, NULL, 20, NULL, 0, NULL, NULL, NULL, '1', '', 2, 'authorize', 0),
(6547637, 40, '', 120, 'Payment Successful', '2012-01-16', NULL, 120, NULL, 20, NULL, 0, NULL, NULL, NULL, '1', '', 2, 'authorize', 0),
(6547638, 50, '', 155, 'Payment Successful', '2012-01-16', NULL, 155, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 1, 'authorize', 0),
(6547639, 0, '', NULL, '', '0000-00-00', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1', '', 0, 'authorize', 0),
(6547640, 0, '', NULL, '', '0000-00-00', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1', '', 0, 'authorize', 0),
(6547641, 0, '', 0, 'Payment failed', '0000-00-00', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547642, 46, '', 110, 'Payment Successful', '2012-01-16', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '', 1, 'authorize', 0),
(6547643, 40, '', 110, 'Payment Successful', '2012-01-16', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '0', '122.161.79.151', 1, 'paypal', 0),
(6547644, 46, '', 120, 'Payment Successful', '2012-01-16', NULL, 120, NULL, 20, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 2, 'paypal', 0),
(6547645, 46, '', 120, 'refunded', '2012-01-16', NULL, 120, NULL, 20, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 2, 'authorize', 0),
(6547646, 46, '', 120, 'Payment Successful', '2012-01-16', NULL, 120, NULL, 20, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 2, 'paypal', 0),
(6547647, 46, '', 120, 'Payment Successful', '2012-01-17', NULL, 120, NULL, 20, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 2, 'authorize', 0),
(6547648, 46, '', 210, 'Payment Pending', '2012-01-18', NULL, 210, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 1, 'paypal', 0),
(6547649, 0, '', 200, 'Payment Successful', '0000-00-00', NULL, 200, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547650, 46, '', 110, 'Payment Pending', '2012-01-18', NULL, 110, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 1, 'paypal', 0),
(6547651, 46, '', NULL, 'Payment Pending', '2012-01-18', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 0, '', 0),
(6547652, 0, '', NULL, '', '0000-00-00', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '0', '', 0, '', 0),
(6547653, 60, '', NULL, 'Payment Pending', '2012-01-20', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '0', '93.97.177.55', 1, '', 0),
(6547654, 46, '', 165, 'Payment Successful', '2012-01-21', NULL, 165, NULL, 20, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 2, 'authorize', 0),
(6547655, 46, '', NULL, 'Payment Pending', '2012-01-21', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 0, '', 0),
(6547656, 60, '', NULL, 'Payment Pending', '2012-01-21', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1', '93.97.177.55', 2, '', 0),
(6547657, 46, '', 110, 'Payment Successful', '2012-01-23', NULL, 110, NULL, 20, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 2, 'authorize', 0),
(6547658, 46, '', 110, 'Payment Successful', '2012-01-23', NULL, 110, NULL, 20, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 2, 'authorize', 0),
(6547659, 46, '', 110, 'Payment Successful', '2012-01-23', NULL, 110, NULL, 20, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 2, 'authorize', 0),
(6547660, 40, '', 98, 'Payment Successful', '2012-01-23', NULL, 98, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '122.161.25.179', 1, 'paypal', 6),
(6547661, 46, '', NULL, 'Payment Pending', '2012-01-24', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 0, '', 0),
(6547662, 46, '', 20, 'refunded', '2012-01-24', NULL, 20, NULL, 20, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 2, 'authorize', 0),
(6547663, 46, '', 218, 'Payment Successful', '2012-01-24', NULL, 218, NULL, 20, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 2, 'authorize', 6),
(6547664, 46, '', 130, 'Payment Successful', '2012-01-25', NULL, 130, NULL, 20, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 2, 'authorize', 0),
(6547665, 46, '', 220, 'Payment Successful', '2012-01-25', NULL, 220, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 0, 'authorize', 1),
(6547666, 0, '', 0, 'Payment failed', '0000-00-00', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547667, 0, '', 0, 'Payment failed', '0000-00-00', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547668, 0, '', 0, 'Payment failed', '0000-00-00', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547669, 46, '', 20, 'Payment Successful', '2012-01-26', NULL, 20, NULL, 20, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 2, 'authorize', 0),
(6547670, 46, '', 10, 'Payment Successful', '2012-01-26', NULL, 10, NULL, 10, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 1, 'authorize', 0),
(6547671, 46, '', NULL, 'Payment Pending', '2012-01-26', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 0, '', 0),
(6547672, 60, '', 1175, 'Payment failed', '2012-01-26', NULL, 1175, NULL, 20, NULL, 0, NULL, NULL, NULL, '0', '122.176.83.10', 2, 'authorize', 0),
(6547673, 60, '', 1175, 'Payment Successful', '2012-01-26', NULL, 1175, NULL, 20, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 2, 'authorize', 9),
(6547674, 0, '', NULL, '', '0000-00-00', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1', '', 0, 'authorize', 0),
(6547675, 46, '', 1198, 'Payment failed', '2012-01-27', NULL, 1198, 108, 10, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 1, 'paypal', 0),
(6547676, 46, '', 1208, 'Payment Successful', '2012-01-27', NULL, 1208, 108, 20, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 2, 'paypal', 6),
(6547677, 60, '', 340, 'shipped', '2012-01-27', NULL, 340, 30, 10, NULL, 0, NULL, NULL, NULL, '1', '93.97.177.55', 1, 'paypal', 0),
(6547678, 46, '', NULL, 'Payment Pending', '2012-01-29', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 0, '', 0),
(6547679, 46, '', 152, 'Payment Successful', '2012-01-29', NULL, 152, 12, 20, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 2, 'authorize', 0),
(6547680, 40, '', 120, 'Payment Successful', '2012-01-30', NULL, 120, 10, 10, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 1, 'authorize', 0),
(6547681, 46, '', NULL, 'Payment Pending', '2012-01-30', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 2, '', 0),
(6547682, 46, '', 130, 'Payment Successful', '2012-01-30', NULL, 130, 10, 20, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 2, 'authorize', 6),
(6547683, 0, '', 0, 'Payment failed', '0000-00-00', NULL, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547684, 60, '', NULL, 'Payment Pending', '2012-01-31', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1', '2.30.104.232', 1, 'paypal', 0),
(6547685, 46, '', NULL, 'Payment Pending', '2012-02-01', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 0, '', 0),
(6547686, 46, '', 175, 'Payment failed', '2012-02-01', NULL, 175, 15, 10, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 1, 'authorize', 0),
(6547687, 46, '', 175, 'Payment failed', '2012-02-01', NULL, 175, 15, 10, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 1, 'authorize', 0),
(6547688, 46, '', 175, 'Payment Successful', '2012-02-01', NULL, 175, 15, 10, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 1, 'authorize', 6),
(6547689, 46, '', 153, '', '2012-02-01', NULL, 153, 13, 10, NULL, 0, NULL, NULL, NULL, '1', '122.176.83.10', 1, 'authorize', 6),
(6547690, 0, '', 0, 'Payment failed', '0000-00-00', NULL, 0, 0, NULL, NULL, 0, NULL, NULL, NULL, '1', '', 0, '', 0),
(6547691, 60, '', NULL, 'Payment Pending', '2012-02-03', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1', '87.11.112.50', 1, 'paypal', 0),
(6547692, 46, '', 240, 'Payment failed', '2012-02-13', NULL, 240, 20, 20, NULL, 0, NULL, NULL, NULL, '1', '122.161.33.193', 2, 'authorize', 0),
(6547693, 46, '', 900, 'Payment Successful', '2012-02-13', NULL, 900, 80, 20, NULL, 0, NULL, NULL, NULL, '1', '122.161.33.193', 2, 'authorize', 0),
(6547694, 46, '', 186, 'Payment Successful', '2012-02-13', NULL, 186, 16, 10, NULL, 0, NULL, NULL, NULL, '1', '122.161.33.193', 1, 'paypal', 0),
(6547695, 60, '', NULL, 'Payment Pending', '2012-02-13', NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1', '2.25.184.88', 2, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_history`
--

CREATE TABLE IF NOT EXISTS `tbl_order_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `created` date NOT NULL,
  `comment` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `notified` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Dumping data for table `tbl_order_history`
--

INSERT INTO `tbl_order_history` (`id`, `order_id`, `created`, `comment`, `status`, `notified`) VALUES
(1, 6547556, '2011-11-16', 'test', 'pending', 1),
(4, 6547556, '2011-11-30', 'testing for cancelled product', 'canceled', 1),
(3, 6547556, '2011-11-30', 'test', 'pending', 1),
(5, 6547556, '2011-12-01', 'test', 'Awaiting for the pac', 1),
(6, 6547556, '2011-12-01', 'sdfsdfsdf', 'refunded', 1),
(7, 6547556, '2011-12-21', '', 'completed', 0),
(8, 6547595, '2011-12-21', '', 'shipped', 0),
(9, 6547606, '2011-12-21', 'order completed', 'completed', 1),
(10, 6547606, '2011-12-21', '', 'shipped', 1),
(11, 6547599, '2011-12-22', 'hi', 'refunded', 1),
(12, 6547607, '2011-12-25', 'hi', 'refunded', 1),
(13, 6547606, '2011-12-26', 'fdsfsdf', 'refunded', 1),
(14, 6547606, '2011-12-26', '', 'canceled', 0),
(15, 6547608, '2011-12-26', '', 'pending', 0),
(16, 6547608, '2011-12-26', '', 'shipped', 0),
(17, 6547559, '2011-12-26', '', 'refunded', 1),
(18, 6547582, '2011-12-26', '', 'refunded', 0),
(19, 6547570, '2011-12-26', 'hi', 'refunded', 1),
(20, 6547604, '2011-12-28', 'Hello,\n       I sent refund status in your mail iD.', 'refunded', 1),
(21, 6547608, '2011-12-28', '', 'pending', 0),
(22, 6547603, '2011-12-28', 'I like it.', 'refunded', 1),
(23, 6547611, '2011-12-28', 'Hi,\n    I have refund your order.', 'refunded', 1),
(24, 6547608, '2011-12-28', '', 'refunded', 0),
(25, 6547616, '2011-12-29', 'Hi,I have refunded your order.please check your mail ID.', 'refunded', 1),
(26, 6547562, '2012-01-05', 'shi', 'canceled', 1),
(27, 6547562, '2012-01-05', 'shi', 'canceled', 1),
(28, 6547562, '2012-01-05', '5435', 'pending', 1),
(29, 6547614, '2012-01-05', 'hi muk hsd bhd ahbdad ashda dsabd asdsbad asd', 'refunded', 1),
(30, 6547632, '2012-01-13', 'Hi i like it. this is fine.', 'refunded', 1),
(31, 6547628, '2012-01-13', 'fh fghyh', 'refunded', 1),
(32, 6547583, '2012-01-16', 'adfsfd', 'pending', 1),
(33, 6547583, '2012-01-16', 'sadaed', 'refunded', 1),
(34, 6547629, '2012-01-16', 'sadasdsa', 'refunded', 1),
(35, 6547643, '2012-01-16', '', 'Payment Successful', 0),
(36, 6547644, '2012-01-16', '', 'Payment Successful', 0),
(37, 6547645, '2012-01-16', '', 'Payment Successful', 0),
(38, 6547645, '2012-01-16', '', 'Payment Pending', 0),
(39, 6547645, '2012-01-16', 'gwqre  fheg fdsajf gsdf sdf', 'refunded', 1),
(40, 6547646, '2012-01-16', '', 'Payment Successful', 0),
(41, 6547647, '2012-01-17', '', 'Payment Successful', 0),
(42, 6547648, '2012-01-18', '', 'Payment Pending', 0),
(43, 6547648, '2012-01-18', '', 'Payment Pending', 0),
(44, 6547648, '2012-01-18', '', 'Payment Pending', 0),
(45, 0, '2012-01-18', '', 'Payment Successful', 0),
(46, 6547650, '2012-01-18', '', 'Payment Pending', 0),
(47, 6547651, '2012-01-18', '', 'Payment Pending', 0),
(48, 6547653, '2012-01-20', '', 'Payment Pending', 0),
(49, 6547654, '2012-01-21', '', 'Payment Successful', 0),
(50, 6547655, '2012-01-21', '', 'Payment Pending', 0),
(51, 6547656, '2012-01-21', '', 'Payment Pending', 0),
(52, 6547657, '2012-01-23', '', 'Payment Successful', 0),
(53, 6547658, '2012-01-23', '', 'Payment Successful', 0),
(54, 6547659, '2012-01-23', '', 'Payment Successful', 0),
(55, 6547660, '2012-01-23', '', 'Payment Successful', 0),
(56, 6547661, '2012-01-24', '', 'Payment Pending', 0),
(57, 6547662, '2012-01-24', '', 'Payment Successful', 0),
(58, 6547663, '2012-01-24', '', 'Payment Successful', 0),
(59, 6547662, '2012-01-24', 'Hi,\n    dffdfdsv dvvf  dsvfdsvf dsf dsfd fdsf', 'refunded', 1),
(60, 6547664, '2012-01-25', '', 'Payment Successful', 0),
(61, 6547665, '2012-01-25', '', 'Payment Successful', 0),
(62, 6547665, '2012-01-25', '', 'Payment Pending', 0),
(63, 6547669, '2012-01-26', '', 'Payment Successful', 0),
(64, 6547669, '2012-01-26', '', 'Payment Pending', 0),
(65, 6547670, '2012-01-26', '', 'Payment Successful', 0),
(66, 6547671, '2012-01-26', '', 'Payment Pending', 0),
(67, 6547672, '2012-01-26', '', 'Payment Pending', 0),
(68, 6547673, '2012-01-26', '', 'Payment Successful', 0),
(69, 6547675, '2012-01-27', '', 'Payment Pending', 0),
(70, 6547676, '2012-01-27', '', 'Payment Successful', 0),
(71, 6547677, '2012-01-27', '', 'Payment Pending', 0),
(72, 6547677, '2012-01-29', 'The product has been shipped', 'shipped', 0),
(73, 6547678, '2012-01-29', '', 'Payment Pending', 0),
(74, 6547679, '2012-01-29', '', 'Payment Successful', 0),
(75, 6547680, '2012-01-30', '', 'Payment Successful', 0),
(76, 6547681, '2012-01-30', '', 'Payment Pending', 0),
(77, 6547682, '2012-01-30', '', 'Payment Successful', 0),
(78, 6547684, '2012-01-31', '', 'Payment Pending', 0),
(79, 6547685, '2012-02-01', '', 'Payment Pending', 0),
(80, 6547686, '2012-02-01', '', 'Payment Pending', 0),
(81, 6547687, '2012-02-01', '', 'Payment Pending', 0),
(82, 6547688, '2012-02-01', '', 'Payment Successful', 0),
(83, 6547689, '2012-02-01', '', 'Payment Successful', 0),
(84, 6547691, '2012-02-03', '', 'Payment Pending', 0),
(85, 6547691, '2012-02-03', '', 'Payment Pending', 0),
(86, 6547691, '2012-02-03', '', 'Payment Pending', 0),
(87, 6547689, '2012-02-06', 'oioio', '', 0),
(88, 6547692, '2012-02-13', '', 'Payment Pending', 0),
(89, 6547693, '2012-02-13', '', 'Payment Successful', 0),
(90, 6547694, '2012-02-13', '', 'Payment Successful', 0),
(91, 6547695, '2012-02-13', '', 'Payment Pending', 0),
(92, 6547695, '2012-02-13', '', 'Payment Pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_ordaddress`
--

CREATE TABLE IF NOT EXISTS `tbl_order_ordaddress` (
  `id` bigint(15) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `ordaddress_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=155 ;

--
-- Dumping data for table `tbl_order_ordaddress`
--

INSERT INTO `tbl_order_ordaddress` (`id`, `order_id`, `ordaddress_id`) VALUES
(1, 6547635, 5),
(2, 6547635, 6),
(3, 6547636, 7),
(4, 6547636, 8),
(5, 6547637, 9),
(6, 6547637, 10),
(7, 6547638, 11),
(8, 6547638, 12),
(9, 6547639, 13),
(10, 6547639, 14),
(11, 6547640, 15),
(12, 6547640, 16),
(13, 6547641, 17),
(14, 6547641, 18),
(15, 6547642, 19),
(16, 6547642, 20),
(17, 6547643, 21),
(18, 6547643, 22),
(19, 6547644, 23),
(20, 6547644, 24),
(21, 6547646, 25),
(22, 6547646, 26),
(23, 6547647, 27),
(24, 6547647, 28),
(25, 6547612, 29),
(26, 6547612, 30),
(27, 6547613, 31),
(28, 6547613, 32),
(29, 6547614, 33),
(30, 6547614, 34),
(31, 6547616, 35),
(32, 6547616, 36),
(33, 6547622, 41),
(34, 6547622, 42),
(35, 6547623, 43),
(36, 6547623, 44),
(37, 6547624, 45),
(38, 6547624, 46),
(39, 6547625, 48),
(40, 6547625, 47),
(41, 6547626, 49),
(42, 6547626, 50),
(43, 6547627, 52),
(44, 6547627, 51),
(45, 6547628, 54),
(46, 6547628, 53),
(47, 6547629, 56),
(48, 6547629, 55),
(49, 6547630, 58),
(50, 6547630, 57),
(51, 6547631, 60),
(52, 6547631, 59),
(53, 6547632, 62),
(54, 6547632, 61),
(55, 6547636, 64),
(56, 6547636, 63),
(57, 6547637, 66),
(58, 6547637, 65),
(59, 6547638, 68),
(60, 6547638, 67),
(61, 6547642, 70),
(62, 6547642, 69),
(63, 6547643, 72),
(64, 6547643, 71),
(65, 6547644, 74),
(66, 6547644, 73),
(67, 6547645, 76),
(68, 6547645, 75),
(69, 6547646, 78),
(70, 6547646, 77),
(71, 6547647, 80),
(72, 6547647, 79),
(73, 6547648, 82),
(74, 6547648, 81),
(75, 6547650, 84),
(76, 6547650, 83),
(77, 6547651, 86),
(78, 6547651, 85),
(79, 6547653, 88),
(80, 6547653, 87),
(81, 6547654, 90),
(82, 6547654, 89),
(83, 6547655, 92),
(84, 6547655, 91),
(85, 6547656, 94),
(86, 6547656, 93),
(87, 6547657, 96),
(88, 6547657, 95),
(89, 6547658, 98),
(90, 6547658, 97),
(91, 6547659, 100),
(92, 6547659, 99),
(93, 6547660, 102),
(94, 6547660, 101),
(95, 6547661, 104),
(96, 6547661, 103),
(97, 6547662, 106),
(98, 6547662, 105),
(99, 6547663, 108),
(100, 6547663, 107),
(101, 6547664, 110),
(102, 6547664, 109),
(103, 6547665, 112),
(104, 6547665, 111),
(105, 6547665, 114),
(106, 6547665, 113),
(107, 6547669, 116),
(108, 6547669, 115),
(109, 6547670, 118),
(110, 6547670, 117),
(111, 6547671, 120),
(112, 6547671, 119),
(113, 6547672, 122),
(114, 6547672, 121),
(115, 6547673, 124),
(116, 6547673, 123),
(117, 6547675, 126),
(118, 6547675, 125),
(119, 6547676, 128),
(120, 6547676, 127),
(121, 6547677, 130),
(122, 6547677, 129),
(123, 6547678, 132),
(124, 6547678, 131),
(125, 6547679, 134),
(126, 6547679, 133),
(127, 6547680, 136),
(128, 6547680, 135),
(129, 6547681, 138),
(130, 6547681, 137),
(131, 6547682, 140),
(132, 6547682, 139),
(133, 6547684, 142),
(134, 6547684, 141),
(135, 6547685, 144),
(136, 6547685, 143),
(137, 6547686, 146),
(138, 6547686, 145),
(139, 6547687, 148),
(140, 6547687, 147),
(141, 6547688, 150),
(142, 6547688, 149),
(143, 6547689, 152),
(144, 6547689, 151),
(145, 6547691, 154),
(146, 6547691, 153),
(147, 6547692, 156),
(148, 6547692, 155),
(149, 6547693, 158),
(150, 6547693, 157),
(151, 6547694, 160),
(152, 6547694, 159),
(153, 6547695, 162),
(154, 6547695, 161);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_product`
--

CREATE TABLE IF NOT EXISTS `tbl_order_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(4) NOT NULL,
  `original_value` int(10) NOT NULL,
  `prize` int(10) NOT NULL,
  `status` varchar(225) NOT NULL,
  `size_id` int(11) NOT NULL,
  `revenue` int(3) NOT NULL,
  `rdm_quantity` int(11) NOT NULL,
  `points_used` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=116 ;

--
-- Dumping data for table `tbl_order_product`
--

INSERT INTO `tbl_order_product` (`id`, `order_id`, `product_id`, `quantity`, `original_value`, `prize`, `status`, `size_id`, `revenue`, `rdm_quantity`, `points_used`) VALUES
(6, 6547556, 2, 3, 100, 100, '1', 2, 0, 0, 0),
(7, 6547558, 1, 2, 100, 100, '', 2, 0, 0, 0),
(8, 6547559, 1, 1, 100, 100, '', 2, 0, 0, 0),
(9, 6547560, 1, 1, 100, 100, '', 2, 0, 0, 0),
(10, 6547562, 1, 1, 100, 100, '', 2, 0, 0, 0),
(11, 6547564, 2, 4, 100, 100, '', 7, 0, 0, 0),
(12, 6547565, 2, 4, 100, 100, '', 7, 0, 0, 0),
(13, 6547566, 1, 2, 100, 100, '', 2, 0, 0, 0),
(14, 6547567, 5, 1, 200, 200, '', 2, 0, 0, 0),
(15, 6547568, 1, 2, 100, 100, '', 2, 0, 0, 0),
(16, 6547569, 1, 2, 100, 100, '', 3, 0, 0, 0),
(17, 6547570, 1, 2, 100, 100, '', 4, 0, 0, 0),
(18, 6547571, 1, 2, 100, 100, '', 2, 0, 0, 0),
(19, 6547572, 1, 3, 100, 100, '', 4, 0, 0, 0),
(20, 6547573, 3, 1, 100, 100, '', 1, 0, 0, 0),
(21, 6547574, 1, 3, 100, 100, '', 3, 0, 0, 0),
(22, 6547575, 1, 3, 100, 100, '', 4, 0, 0, 0),
(23, 6547576, 3, 1, 100, 100, '', 1, 0, 0, 0),
(24, 6547576, 3, 2, 100, 100, '', 2, 0, 0, 0),
(25, 6547577, 1, 3, 100, 100, '', 3, 0, 0, 0),
(26, 6547578, 2, 3, 100, 100, '', 1, 0, 0, 0),
(27, 6547579, 1, 1, 100, 100, '', 4, 0, 0, 0),
(28, 6547580, 3, 2, 100, 100, '', 2, 0, 0, 0),
(29, 6547581, 1, 1, 100, 100, '', 4, 0, 0, 0),
(30, 6547582, 2, 1, 100, 100, '', 1, 0, 0, 0),
(31, 6547583, 5, 1, 200, 200, '', 2, 0, 0, 0),
(32, 6547584, 5, 1, 200, 200, '', 2, 0, 0, 0),
(33, 6547584, 1, 3, 100, 100, '', 4, 0, 0, 0),
(34, 6547585, 5, 1, 200, 200, '', 2, 0, 0, 0),
(35, 6547585, 1, 3, 100, 100, '', 4, 0, 0, 0),
(36, 6547585, 2, 1, 100, 100, '', 1, 0, 0, 0),
(37, 6547587, 4, 1, 100, 100, '', 4, 0, 0, 0),
(38, 6547588, 1, 1, 100, 100, '', 4, 0, 0, 0),
(39, 6547589, 1, 1, 100, 100, '', 4, 0, 0, 0),
(40, 6547590, 1, 1, 100, 100, '', 2, 0, 0, 0),
(41, 6547591, 1, 2, 100, 100, '', 4, 0, 0, 0),
(42, 6547592, 1, 4, 100, 100, '', 5, 0, 0, 0),
(43, 6547593, 1, 2, 100, 100, '', 4, 0, 0, 0),
(44, 6547594, 2, 1, 100, 100, '', 1, 0, 0, 0),
(45, 6547595, 1, 2, 100, 100, '', 6, 0, 0, 0),
(46, 6547596, 1, 1, 100, 100, '', 6, 0, 0, 0),
(47, 6547597, 2, 1, 100, 100, '', 1, 0, 0, 0),
(48, 6547598, 1, 1, 100, 100, '', 6, 0, 0, 0),
(49, 6547599, 1, 3, 100, 100, '', 6, 0, 0, 0),
(50, 6547600, 1, 3, 100, 100, '', 6, 0, 0, 0),
(51, 6547601, 1, 4, 100, 100, '', 6, 0, 0, 0),
(52, 6547602, 2, 5, 100, 100, '', 1, 0, 0, 0),
(53, 6547603, 2, 1, 100, 100, '', 3, 0, 0, 0),
(54, 6547604, 1, 1, 100, 100, '', 6, 0, 0, 0),
(55, 6547606, 1, 1, 100, 100, '', 2, 0, 0, 0),
(56, 6547607, 1, 2, 100, 100, '', 6, 0, 0, 0),
(57, 6547608, 1, 1, 100, 100, '', 6, 0, 0, 0),
(58, 6547610, 1, 1, 100, 100, '', 3, 0, 0, 0),
(59, 6547611, 28, 1, 200, 200, '', 1, 0, 0, 0),
(60, 6547612, 4, 1, 100, 100, '', 4, 0, 0, 0),
(61, 6547613, 4, 1, 100, 100, '', 4, 0, 0, 0),
(62, 6547614, 1, 1, 100, 100, '', 6, 0, 0, 0),
(63, 6547616, 1, 1, 100, 100, '', 6, 0, 0, 0),
(64, 6547617, 4, 1, 100, 100, '', 4, 0, 0, 0),
(65, 6547622, 3, 1, 100, 100, '', 4, 0, 0, 0),
(66, 6547623, 2, 3, 100, 100, '', 1, 0, 0, 0),
(67, 6547625, 3, 1, 100, 100, '', 4, 0, 0, 0),
(68, 6547626, 3, 1, 100, 100, '', 5, 0, 0, 0),
(69, 6547626, 3, 1, 100, 100, '', 1, 0, 0, 0),
(71, 6547627, 18, 2, 300, 300, '', 7, 0, 0, 0),
(72, 6547628, 1, 3, 100, 100, '', 4, 0, 0, 0),
(73, 6547629, 3, 2, 100, 100, '', 4, 0, 0, 0),
(74, 6547631, 3, 1, 100, 100, '', 4, 0, 0, 0),
(75, 6547632, 5, 1, 200, 200, '', 4, 0, 0, 0),
(76, 6547636, 3, 1, 100, 100, '', 5, 0, 0, 0),
(77, 6547637, 3, 1, 100, 100, '', 5, 0, 0, 0),
(78, 6547638, 15, 1, 145, 145, '', 5, 0, 0, 0),
(79, 6547642, 1, 1, 100, 100, '', 4, 0, 0, 0),
(80, 6547643, 3, 1, 100, 100, '', 6, 0, 0, 0),
(81, 6547644, 1, 1, 100, 100, '', 4, 0, 0, 0),
(82, 6547645, 1, 1, 100, 100, '', 4, 0, 0, 0),
(84, 6547647, 2, 1, 100, 100, '', 1, 0, 0, 0),
(85, 6547648, 3, 2, 100, 100, '', 5, 0, 0, 0),
(86, 6547649, 3, 2, 100, 100, '', 5, 0, 0, 0),
(87, 6547650, 1, 1, 100, 100, '', 4, 0, 0, 0),
(88, 6547654, 15, 2, 145, 145, '', 4, 0, 0, 0),
(89, 6547657, 1, 1, 90, 90, '', 1, 0, 0, 0),
(90, 6547658, 1, 1, 90, 90, '', 1, 0, 0, 0),
(91, 6547659, 1, 1, 90, 90, '', 7, 0, 0, 0),
(92, 6547660, 2, 1, 100, 100, '', 1, 0, 0, 0),
(93, 6547662, 1, 1, 90, 90, '', 1, 0, 0, 0),
(94, 6547663, 5, 1, 200, 200, '', 1, 0, 0, 0),
(95, 6547664, 2, 1, 100, 100, '', 1, 0, 0, 0),
(96, 6547665, 5, 1, 200, 200, '', 1, 0, 0, 0),
(97, 6547669, 1, 2, 90, 90, '', 1, 0, 0, 0),
(98, 6547670, 1, 2, 90, 90, '', 1, 0, 0, 0),
(99, 6547672, 18, 3, 300, 300, '', 6, 0, 0, 0),
(100, 6547672, 18, 2, 300, 300, '', 2, 0, 0, 0),
(101, 6547673, 18, 3, 300, 300, '', 6, 0, 0, 0),
(102, 6547673, 18, 2, 300, 300, '', 2, 0, 0, 0),
(103, 6547675, 30, 6, 200, 200, '', 4, 0, 0, 0),
(104, 6547676, 30, 6, 200, 200, '', 4, 0, 0, 0),
(106, 6547679, 3, 1, 120, 120, '', 1, 0, 0, 0),
(107, 6547680, 2, 1, 100, 100, '', 1, 0, 0, 0),
(108, 6547682, 17, 1, 150, 150, '', 7, 0, 0, 0),
(109, 6547686, 19, 1, 200, 200, '', 1, 0, 0, 0),
(110, 6547687, 19, 1, 200, 200, '', 1, 0, 0, 0),
(111, 6547688, 19, 1, 200, 200, '', 1, 0, 0, 0),
(112, 6547689, 21, 1, 180, 180, '', 1, 0, 0, 0),
(113, 6547692, 6, 2, 100, 100, '', 3, 0, 0, 0),
(114, 6547693, 4, 2, 400, 400, '', 5, 0, 0, 0),
(115, 6547694, 18, 1, 160, 160, '', 4, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paymentmethod`
--

CREATE TABLE IF NOT EXISTS `tbl_paymentmethod` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_paymentmethod`
--

INSERT INTO `tbl_paymentmethod` (`id`, `name`, `status`) VALUES
(1, 'Credit card via authorize.net', 1),
(2, 'Paypal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_credit`
--

CREATE TABLE IF NOT EXISTS `tbl_payment_credit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `amount` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pcategory`
--

CREATE TABLE IF NOT EXISTS `tbl_pcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(225) NOT NULL,
  `post_count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE IF NOT EXISTS `tbl_post` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `pcategory_id` int(11) NOT NULL,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `price` int(11) NOT NULL,
  `original_value` int(11) NOT NULL,
  `catagory_id` int(3) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(225) NOT NULL,
  `available` int(4) NOT NULL DEFAULT '0',
  `sold` int(4) NOT NULL DEFAULT '0',
  `is_active` enum('0','1') NOT NULL DEFAULT '0',
  `for_man` enum('0','1') NOT NULL,
  `for_woman` enum('0','1') NOT NULL,
  `man_image` int(15) DEFAULT NULL,
  `woman_image` int(15) DEFAULT NULL,
  `date_added` varchar(200) NOT NULL,
  `points_to_buy` int(11) NOT NULL,
  `points_you_get` int(11) NOT NULL,
  `product_info` text NOT NULL,
  `color_id` int(10) NOT NULL,
  `feature_image` int(15) NOT NULL,
  `tag` text NOT NULL,
  `size_info` text NOT NULL,
  `delivery_info` text NOT NULL,
  `meta_tags` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `price`, `original_value`, `catagory_id`, `user_id`, `status`, `available`, `sold`, `is_active`, `for_man`, `for_woman`, `man_image`, `woman_image`, `date_added`, `points_to_buy`, `points_you_get`, `product_info`, `color_id`, `feature_image`, `tag`, `size_info`, `delivery_info`, `meta_tags`) VALUES
(1, 'Test Product 1', 225, 200, 0, 10, 'In Stock', 0, 1023, '1', '1', '1', NULL, NULL, '', 30, 50, 'asaa', 1, 375, '', '', 'asaa', 'werrwer'),
(2, 'Test Product 2', 150, 130, 0, 10, 'In Stock', 0, 31, '1', '1', '1', NULL, NULL, '', 0, 0, 'Its a pure cotton made in Italy.', 2, 376, '', '', 'Its a pure cotton made in Italy.', 'Test '),
(3, 'Test Product 3', 120, 0, 0, 47, 'In Stock', 0, 2047, '1', '1', '1', NULL, NULL, '1329398294', 0, 0, 'Its a pure cotton made in Italy.', 4, 418, '', 'This product available in men size', 'Its a pure cotton made in Italy.', ''),
(4, 'Test product4', 400, 350, 0, 46, 'In Stock', 0, 1, '1', '1', '1', NULL, NULL, '', 0, 0, 'This is 100% cotton made in Italy.', 4, 378, '', 'X,Xl size available.', 'This is 100% cotton made in Italy.', 'kkkk'),
(5, 'Test product5', 100, 90, 0, 10, 'In Stock', 0, 7, '1', '1', '0', NULL, NULL, '', 0, 0, ' dfg d dfgfdgdfg ', 2, 379, '', '', ' dfg d dfgfdgdfg ', ''),
(6, 'Test product5', 100, 120, 0, 44, 'In Stock', 0, 0, '1', '1', '0', NULL, NULL, '', 0, 0, 'xczczc', 5, 380, '', '', 'xczczc', ''),
(7, 'Test product6', 230, 150, 0, 10, '', 0, 0, '0', '0', '0', NULL, NULL, '', 0, 0, '', 0, 0, '', '', '', ''),
(8, 'Test product6', 230, 150, 0, 0, '', 0, 0, '0', '0', '0', NULL, NULL, '', 0, 0, '', 0, 0, '', '', '', ''),
(9, 'Test product6', 230, 150, 0, 0, '', 0, 0, '0', '0', '0', NULL, NULL, '', 0, 0, '', 0, 0, '', '', '', ''),
(12, 'asas', 33, 33, 0, 3, '', 0, 0, '0', '0', '1', NULL, NULL, '', 0, 0, '', 0, 0, '', '', '', ''),
(13, 'Test product9', 150, 100, 0, 10, 'In Stock', 0, 0, '1', '0', '1', NULL, NULL, '', 0, 0, 'This is available in men category.', 4, 381, '', '', ' mbnmbnm', ''),
(14, 'Grover', 123, 100, 0, 0, '', 0, 0, '0', '0', '1', NULL, NULL, '', 0, 0, '', 0, 0, '', '', '', ''),
(15, 'Test Product12', 160, 120, 0, 46, 'In Stock', 0, 3, '1', '1', '1', NULL, NULL, '', 0, 0, 'This is available in men and  women category.', 1, 382, '', '', 'fhghh', ''),
(17, 'New product25', 150, 120, 0, 44, 'In Stock', 0, 1, '1', '1', '0', NULL, NULL, '', 0, 0, 'fasdfsdfg', 1, 383, '', '', 'shipping charges for this', ''),
(18, 'mukesh product1', 160, 150, 0, 46, 'In Stock', 0, 15, '1', '1', '1', NULL, NULL, '', 0, 0, 'This is available in multi color.', 4, 384, '', '', 'fhfgh fghfgh', ''),
(19, 'vimal', 200, 160, 0, 44, 'In Stock', 0, 1, '1', '1', '0', NULL, NULL, '', 0, 0, 'dftgdfgdfgdfg', 4, 385, '', '', 'dftgdfgdfgdfg', ''),
(20, 'muk', 200, 190, 0, 44, 'In Stock', 0, 0, '1', '1', '0', NULL, NULL, '', 0, 0, 'gdfdf dfd d', 2, 386, '', '', 'gdfdf dfd d', ''),
(21, 'fdsf', 180, 150, 0, 44, 'In Stock', 0, 1, '1', '1', '0', NULL, NULL, '', 0, 0, ' dfg jytu', 4, 387, '', '', ' dfg jytu', ''),
(22, 'sharma', 150, 140, 0, 44, 'In Stock', 0, 0, '1', '1', '0', NULL, NULL, '', 0, 0, 'xzcv cxvxc', 1, 388, '', '', 'xzcv cxvxc', ''),
(23, 'sharma', 170, 150, 0, 44, 'In Stock', 0, 0, '1', '0', '1', NULL, NULL, '', 0, 0, 'fh fg tyuu', 4, 389, '', '', 'fh fg tyuu', ''),
(24, 'Smith', 200, 180, 0, 44, 'In Stock', 0, 0, '1', '0', '1', NULL, NULL, '', 0, 0, 'fgh f tyujytu', 2, 390, '', '', 'fgh f tyujytu', ''),
(25, 'product2', 200, 150, 0, 44, 'In Stock', 0, 0, '1', '1', '0', NULL, NULL, '', 0, 0, 'This is half slive t shirt', 0, 391, '', 'fsf  sdf dsf', '', ''),
(26, 'muk prod 1', 200, 170, 0, 46, 'In Stock', 0, 0, '1', '1', '0', NULL, NULL, '', 0, 0, 'This is my favorite product', 1, 392, '', '', '', ''),
(28, 'mukesh product1', 180, 150, 0, 46, 'Out of Stock', 0, 0, '1', '1', '0', NULL, NULL, '', 0, 0, 'Hello', 5, 393, '', '', 'Hello', ''),
(29, 'muk product1', 140, 120, 0, 46, 'In Stock', 0, 0, '1', '1', '0', NULL, NULL, '', 0, 0, 'bhbcfnsdabdsf dsaf', 1, 394, '', '', 'bhbcfnsdabdsf dsaf', ''),
(30, 'product5', 200, 180, 0, 46, 'In Stock', 0, 1, '1', '1', '1', NULL, NULL, '', 0, 0, 'This is printed t-shirt in available in red color.Retro T-shirt apparel design free to Retro T-shirt apparel design free to use and abuse. Please let me know ', 2, 395, 'sdfb s fdsf f f fsdf sdf  gfdg dfgf fdgdfgdf', 'Xl size available for this  fdsbffds sdfsf sdf sdf\nRetro T-shirt apparel design free to use and abuse. Please let me know what types of vectors you would like to see more of.\nGo to chadlonius.com and let me know.', 'This is printed t-shirt in available in red color.Retro T-shirt apparel design free to Retro T-shirt apparel design free to use and abuse. Please let me know ', ''),
(32, 'mm pro', 200, 0, 0, 46, 'In Stock', 0, 0, '1', '1', '1', NULL, NULL, '', 0, 0, 'd gdfgd gdfgd', 5, 396, 'd gf', ' dfgd gd', 'd gdfgd gdfgd', ''),
(33, 'dsfshgfg', 20, 0, 0, 47, 'Out of stock', 0, 0, '1', '1', '0', NULL, NULL, '1329398433', 0, 0, 'dgdfg', 4, 419, 'cvxv', 'dgdfg', 'dgdfg', ''),
(34, 'friday', 60, 0, 0, 47, 'Out of stock', 0, 0, '1', '1', '0', NULL, NULL, '1329398582', 0, 0, 'friday', 7, 420, 'friday', 'friday', 'friday', ''),
(35, 'T-shirt title test', 50, 0, 0, 10, 'In Stock', 0, 0, '1', '1', '1', NULL, NULL, '', 0, 0, 'These are the main info about the product', 2, 0, 'grunge,white', 'S = 34cm\nM = 40cm', 'Free shipping all over the world', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_catagory`
--

CREATE TABLE IF NOT EXISTS `tbl_product_catagory` (
  `id` bigint(15) NOT NULL AUTO_INCREMENT,
  `catagory_id` int(5) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_product_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `comment_id` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_product_comment`
--

INSERT INTO `tbl_product_comment` (`id`, `product_id`, `comment_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_coupon`
--

CREATE TABLE IF NOT EXISTS `tbl_product_coupon` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `product_id` int(15) NOT NULL,
  `coupon_id` int(15) NOT NULL,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_product_coupon`
--

INSERT INTO `tbl_product_coupon` (`id`, `product_id`, `coupon_id`, `type`) VALUES
(1, 1, 1, 'man'),
(2, 2, 1, 'man'),
(3, 3, 1, 'both'),
(4, 4, 1, 'both'),
(5, 5, 1, 'both'),
(6, 15, 1, 'woman'),
(8, 1, 3, 'man'),
(9, 2, 3, 'man'),
(10, 3, 3, 'both'),
(11, 5, 3, 'woman'),
(12, 13, 3, 'both'),
(13, 14, 3, 'man');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_file`
--

CREATE TABLE IF NOT EXISTS `tbl_product_file` (
  `id` bigint(15) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(15) NOT NULL,
  `file_id` bigint(15) NOT NULL,
  `type` varchar(225) NOT NULL,
  `default` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `tbl_product_file`
--

INSERT INTO `tbl_product_file` (`id`, `product_id`, `file_id`, `type`, `default`) VALUES
(76, 1, 363, 'woman', '0'),
(83, 32, 372, 'man', '1'),
(78, 2, 365, 'man', '1'),
(75, 1, 362, 'man', '1'),
(16, 3, 17, 'man', '1'),
(59, 28, 306, 'man', '1'),
(17, 3, 18, 'woman', '1'),
(77, 1, 364, 'woman', '1'),
(79, 2, 366, 'woman', '1'),
(21, 4, 22, 'man', '0'),
(22, 5, 23, 'man', '1'),
(30, 5, 33, 'woman', '1'),
(24, 5, 25, 'man', '0'),
(25, 5, 26, 'woman', '0'),
(26, 4, 27, 'man', '1'),
(27, 4, 28, 'woman', '1'),
(28, 4, 29, 'woman', '0'),
(32, 6, 35, 'man', '1'),
(31, 6, 34, 'man', '0'),
(66, 30, 339, 'man', '1'),
(44, 14, 242, 'woman', '1'),
(60, 15, 307, 'man', '1'),
(80, 15, 367, 'woman', '1'),
(65, 29, 338, 'man', '1'),
(63, 13, 336, 'woman', '1'),
(64, 22, 337, 'man', '0'),
(43, 12, 241, 'woman', '1'),
(42, 13, 240, 'man', '1'),
(45, 17, 243, 'man', '1'),
(46, 18, 244, 'man', '1'),
(47, 18, 245, 'woman', '1'),
(48, 19, 246, 'man', '1'),
(49, 21, 255, 'man', '1'),
(50, 23, 285, 'man', '1'),
(51, 24, 286, 'man', '1'),
(81, 30, 368, 'woman', '1'),
(55, 26, 297, 'man', '1'),
(86, 2, 376, 'featured', '0'),
(85, 1, 375, 'featured', '0'),
(84, 32, 373, 'woman', '1'),
(69, 20, 342, 'man', '1'),
(70, 25, 343, 'man', '1'),
(71, 23, 355, 'woman', '1'),
(72, 24, 357, 'woman', '0'),
(110, 3, 418, 'featured', '0'),
(88, 4, 378, 'featured', '0'),
(89, 5, 379, 'featured', '0'),
(90, 6, 380, 'featured', '0'),
(91, 13, 381, 'featured', '0'),
(92, 15, 382, 'featured', '0'),
(93, 17, 383, 'featured', '0'),
(94, 18, 384, 'featured', '0'),
(95, 19, 385, 'featured', '0'),
(96, 20, 386, 'featured', '0'),
(97, 21, 387, 'featured', '0'),
(98, 22, 388, 'featured', '0'),
(99, 23, 389, 'featured', '0'),
(100, 24, 390, 'featured', '0'),
(101, 25, 391, 'featured', '0'),
(102, 26, 392, 'featured', '0'),
(103, 28, 393, 'featured', '0'),
(104, 29, 394, 'featured', '0'),
(105, 30, 395, 'featured', '0'),
(106, 32, 396, 'featured', '0'),
(112, 34, 420, 'featured', '0'),
(108, 34, 398, 'woman', '0'),
(109, 34, 399, 'man', '0'),
(111, 33, 419, 'featured', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_size`
--

CREATE TABLE IF NOT EXISTS `tbl_product_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `catagory` varchar(255) NOT NULL,
  `stock` int(10) unsigned NOT NULL,
  `sold` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=174 ;

--
-- Dumping data for table `tbl_product_size`
--

INSERT INTO `tbl_product_size` (`id`, `product_id`, `size_id`, `catagory`, `stock`, `sold`) VALUES
(1, 1, 1, 'man', 1, 0),
(2, 1, 2, 'man', 5, 0),
(110, 29, 1, 'man', 5, 0),
(4, 1, 4, 'woman', 1, 0),
(5, 1, 5, 'woman', 5, 0),
(6, 1, 6, 'woman', 5, 0),
(7, 3, 1, 'man', 3, 0),
(8, 3, 2, 'man', 3, 0),
(109, 22, 7, 'man', 6, 0),
(10, 2, 1, 'man', 1, 0),
(13, 2, 7, 'man', 3, 0),
(11, 2, 2, 'man', 1, 0),
(108, 22, 3, 'man', 1, 0),
(14, 5, 1, 'man', 5, 0),
(15, 5, 2, 'man', 1, 0),
(17, 5, 7, 'man', 2, 0),
(18, 5, 4, 'woman', 9, 0),
(19, 5, 5, 'woman', 20, 0),
(20, 5, 6, 'woman', 32, 0),
(21, 5, 8, 'woman', 7, 0),
(22, 4, 4, 'woman', 1, 0),
(23, 4, 5, 'woman', 3, 0),
(24, 4, 6, 'woman', 6, 0),
(25, 4, 8, 'woman', 0, 0),
(26, 4, 1, 'man', 3, 0),
(27, 4, 2, 'man', 2, 0),
(107, 22, 2, 'man', 3, 0),
(29, 4, 7, 'man', 1, 0),
(101, 13, 6, 'woman', 6, 0),
(100, 13, 5, 'woman', 5, 0),
(99, 13, 4, 'woman', 5, 0),
(98, 17, 7, 'man', 5, 0),
(97, 17, 3, 'man', 2, 0),
(96, 17, 2, 'man', 2, 0),
(95, 17, 1, 'man', 5, 0),
(38, 1, 7, 'man', 5, 0),
(39, 18, 4, 'woman', 3, 0),
(40, 18, 5, 'woman', 5, 0),
(41, 18, 6, 'woman', 0, 0),
(42, 18, 8, 'woman', 1, 0),
(43, 19, 1, 'man', 1, 0),
(44, 19, 2, 'man', 3, 0),
(106, 22, 1, 'man', 5, 0),
(46, 19, 7, 'man', 6, 0),
(47, 20, 1, 'man', 4, 0),
(48, 20, 2, 'man', 2, 0),
(105, 6, 7, 'man', 1, 0),
(50, 20, 7, 'man', 3, 0),
(51, 21, 1, 'man', 3, 0),
(52, 21, 2, 'man', 4, 0),
(104, 6, 3, 'man', 6, 0),
(54, 21, 7, 'man', 1, 0),
(55, 23, 1, 'man', 4, 0),
(56, 23, 2, 'man', 5, 0),
(103, 6, 2, 'man', 5, 0),
(58, 23, 7, 'man', 3, 0),
(59, 24, 1, 'man', 2, 0),
(60, 24, 2, 'man', 6, 0),
(62, 24, 7, 'man', 3, 0),
(63, 25, 1, 'man', 5, 0),
(64, 25, 2, 'man', 2, 0),
(91, 1, 8, 'woman', 0, 0),
(66, 25, 7, 'man', 1, 0),
(67, 26, 1, 'man', 4, 0),
(68, 26, 2, 'man', 5, 0),
(70, 26, 7, 'man', 7, 0),
(90, 3, 8, 'woman', 5, 0),
(71, 28, 1, 'man', 50, 0),
(72, 28, 2, 'man', 1, 0),
(89, 3, 6, 'woman', 1, 0),
(74, 28, 7, 'man', 0, 0),
(75, 18, 1, 'man', 1, 0),
(76, 18, 2, 'man', 4, 0),
(88, 3, 5, 'woman', 3, 0),
(78, 18, 7, 'man', 6, 0),
(102, 6, 1, 'man', 8, 0),
(79, 15, 1, 'man', 2, 0),
(80, 15, 2, 'man', 3, 0),
(87, 3, 4, 'woman', 5, 0),
(82, 15, 7, 'man', 3, 0),
(83, 15, 4, 'woman', 5, 0),
(84, 15, 5, 'woman', 6, 0),
(85, 15, 6, 'woman', 2, 0),
(86, 15, 8, 'woman', 3, 0),
(111, 29, 2, 'man', 6, 0),
(112, 29, 3, 'man', 1, 0),
(113, 29, 7, 'man', 3, 0),
(114, 30, 1, 'man', 4, 0),
(115, 30, 2, 'man', 4, 0),
(116, 30, 3, 'man', 1, 0),
(117, 30, 7, 'man', 2, 0),
(118, 30, 4, 'woman', 3, 0),
(119, 30, 5, 'woman', 6, 0),
(120, 30, 6, 'woman', 2, 0),
(148, 32, 7, 'man', 8, 0),
(147, 32, 3, 'man', 6, 0),
(146, 32, 2, 'man', 4, 0),
(145, 32, 1, 'man', 2, 0),
(144, 1, 3, 'man', 5, 0),
(128, 3, 3, 'man', 5, 0),
(129, 3, 7, 'man', 3, 0),
(136, 23, 6, 'woman', 1, 0),
(135, 23, 5, 'woman', 5, 0),
(134, 23, 4, 'woman', 4, 0),
(133, 5, 3, 'man', 6, 0),
(137, 24, 4, 'woman', 4, 0),
(138, 24, 5, 'woman', 5, 0),
(139, 24, 6, 'woman', 1, 0),
(149, 15, 3, 'man', 5, 0),
(150, 18, 3, 'man', 2, 0),
(151, 19, 3, 'man', 5, 0),
(152, 2, 3, 'man', 2, 0),
(153, 4, 3, 'man', 2, 0),
(154, 20, 3, 'man', 5, 0),
(155, 21, 3, 'man', 5, 0),
(156, 25, 3, 'man', 5, 0),
(157, 26, 3, 'man', 4, 0),
(158, 28, 3, 'man', 1, 0),
(159, 33, 1, 'man', 1, 0),
(160, 33, 2, 'man', 2, 0),
(161, 33, 3, 'man', 1, 0),
(162, 33, 7, 'man', 1, 0),
(163, 34, 4, 'woman', 123, 0),
(164, 34, 5, 'woman', 123, 0),
(165, 34, 6, 'woman', 123, 0),
(166, 34, 1, 'man', 123, 0),
(167, 34, 2, 'man', 123, 0),
(168, 34, 3, 'man', 123, 0),
(169, 34, 7, 'man', 123, 0),
(170, 35, 1, 'man', 30, 0),
(171, 35, 2, 'man', 30, 0),
(172, 35, 3, 'man', 30, 0),
(173, 35, 7, 'man', 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_wishlist`
--

CREATE TABLE IF NOT EXISTS `tbl_product_wishlist` (
  `id` bigint(15) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `type` varchar(200) DEFAULT NULL,
  `wishlist_id` bigint(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=299 ;

--
-- Dumping data for table `tbl_product_wishlist`
--

INSERT INTO `tbl_product_wishlist` (`id`, `product_id`, `type`, `wishlist_id`) VALUES
(197, 4, NULL, 136),
(196, 3, NULL, 136),
(129, 2, NULL, 3),
(130, 3, NULL, 3),
(198, 2, NULL, 136);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE IF NOT EXISTS `tbl_project` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(225) NOT NULL,
  `date_added` varchar(225) NOT NULL,
  `date_accept` varchar(225) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_project`
--

INSERT INTO `tbl_project` (`id`, `title`, `description`, `user_id`, `status`, `date_added`, `date_accept`, `is_active`) VALUES
(1, 'Project#1', 'zsxx', 3, 'Declined', '1323558000', '1323903600', '1'),
(2, 'Project#3', 'jhnjn', 3, 'Declined', '1324508400', '', '1'),
(3, 'vimal project', 'fdsfdsfdsf', 44, 'Accepted', '1323237600', '1323237600', '1'),
(4, 'vimal project1', 'Hi,\n\n     I like it.', 44, 'Accepted', '1323237600', '1323237600', '1'),
(5, 'muk', 'fnhsdjfn', 44, 'Accepted', '1323669600', '1323669600', '1'),
(6, 'My Project#1', 'This is ma first Project!!\nHope you like that!!', 47, 'Accepted', '1325052000', '1325224800', '1'),
(7, 'Mukesh design', 'I have placed my design for moderation.', 46, 'Accepted', '1325052000', '1325138400', '0'),
(9, 'My Project#3', 'Hi, This is ma another one!!', 47, 'Accepted', '1325052000', '', '1'),
(10, '1st artwork design', 'this will be a great design', 80, 'In progress', '1328009053', '', '1'),
(11, 'Test Design ', 'Place my design.', 46, 'In progress', '1328596707', '', '1'),
(12, 'Test Design 2', 'dfsdf', 46, 'Accepted', '1328594400', '', '1'),
(17, 'test 4', 'descriptuin here', 46, 'In progress', '1329136417', '', '1'),
(15, 'Test mukesh', 'I like this design.', 46, 'In progress', '1329026400', '', '0'),
(16, 'Test design 2', 'Nice ', 46, 'Accepted', '1329026400', '1329112800', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_project_comment` (
  `id` bigint(15) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_project_comment`
--

INSERT INTO `tbl_project_comment` (`id`, `project_id`, `comment_id`) VALUES
(1, 6, 85),
(13, 16, 103),
(7, 9, 91),
(8, 3, 98),
(9, 9, 99),
(10, 9, 100),
(11, 9, 101),
(12, 15, 102),
(14, 16, 104),
(17, 17, 110);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_file`
--

CREATE TABLE IF NOT EXISTS `tbl_project_file` (
  `id` bigint(15) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `file_id` int(15) NOT NULL,
  `default` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `tbl_project_file`
--

INSERT INTO `tbl_project_file` (`id`, `project_id`, `file_id`, `default`) VALUES
(4, 1, 184, '0'),
(5, 1, 185, '0'),
(3, 1, 183, '0'),
(6, 2, 186, '0'),
(7, 3, 247, '0'),
(8, 3, 248, '0'),
(9, 3, 249, '0'),
(10, 4, 251, '0'),
(11, 4, 252, '0'),
(12, 4, 253, '0'),
(13, 6, 308, '1'),
(14, 6, 309, '0'),
(15, 6, 310, '0'),
(16, 7, 311, '1'),
(17, 7, 312, '0'),
(19, 9, 314, '1'),
(20, 10, 402, '1'),
(21, 11, 406, '1'),
(22, 12, 407, '1'),
(29, 17, 417, '0'),
(25, 15, 413, '0'),
(26, 16, 414, '0'),
(27, 16, 415, '0'),
(28, 16, 416, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_refund`
--

CREATE TABLE IF NOT EXISTS `tbl_refund` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `reason` text NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_refund`
--

INSERT INTO `tbl_refund` (`id`, `order_id`, `status`, `reason`, `created`) VALUES
(1, 6547556, 'Awaiting for the pack', 'for test', '2011-11-30'),
(2, 6547604, 'Awaiting for the pack', '', '2011-12-28'),
(3, 6547603, 'Awaiting for the pack', '', '2011-12-28'),
(4, 6547611, 'Awaiting for the pack', '', '2011-12-29'),
(5, 6547608, 'Awaiting for the pack', '', '2011-12-29'),
(6, 6547616, 'Awaiting for the pack', '', '2011-12-29'),
(7, 6547614, 'Awaiting for the pack', '', '2012-01-05'),
(8, 6547632, 'Awaiting for the pack', '', '2012-01-13'),
(9, 6547628, 'Awaiting for the pack', '', '2012-01-13'),
(10, 6547583, 'Awaiting for the pack', '', '2012-01-16'),
(11, 6547629, 'Awaiting for the pack', '', '2012-01-16'),
(12, 6547645, 'Awaiting for the pack', '', '2012-01-16'),
(13, 6547662, 'Awaiting for the pack', '', '2012-01-24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_refund_history`
--

CREATE TABLE IF NOT EXISTS `tbl_refund_history` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `date_added` date NOT NULL,
  `comment` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `notified` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_refund_history`
--

INSERT INTO `tbl_refund_history` (`id`, `order_id`, `date_added`, `comment`, `status`, `notified`) VALUES
(0, 6547556, '2011-12-01', 'ffdsfsdf', 'Awaiting for the pack', 1),
(0, 6547556, '2011-12-01', 'test', 'payment sent', 1),
(0, 6547556, '2011-12-01', 'sdfdsfsdf', 'refund refused', 1),
(0, 6547604, '2011-12-28', 'test', 'payment sent', 1),
(0, 6547604, '2011-12-28', '', 'Awaiting for the pack', 0),
(0, 6547603, '2011-12-28', '', 'payment sent', 1),
(0, 6547603, '2011-12-28', '', 'Awaiting for the pack', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE IF NOT EXISTS `tbl_role` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `is_active` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `name`, `is_active`) VALUES
(1, 'Super Admins', '1'),
(2, 'Adminstrators', '1'),
(3, 'Designers', '1'),
(4, 'Customers', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE IF NOT EXISTS `tbl_shipping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`id`, `type`, `price`) VALUES
(1, 'Standard delivery (2-3 weeks)', 10.00),
(2, 'Express delivery (1 week)', 20.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_size`
--

CREATE TABLE IF NOT EXISTS `tbl_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `catagory` varchar(255) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_size`
--

INSERT INTO `tbl_size` (`id`, `name`, `description`, `catagory`, `is_active`) VALUES
(1, 'M', 'Its  a medium one.', 'man', '1'),
(2, 'S', 'Its a small one.', 'man', '1'),
(3, 'L', 'This is large one.', 'man', '1'),
(4, 'M', 'its a medium', 'woman', '1'),
(5, 'S', 'Its a small', 'woman', '1'),
(6, 'L', 'Its large', 'woman', '1'),
(7, 'XL', 'This extra large.', 'man', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_system`
--

CREATE TABLE IF NOT EXISTS `tbl_system` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `website_name` varchar(250) NOT NULL,
  `site_email` varchar(200) NOT NULL,
  `meta_desc` text NOT NULL,
  `keywords` text NOT NULL,
  `address` text NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `revenue` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_system`
--

INSERT INTO `tbl_system` (`id`, `website_name`, `site_email`, `meta_desc`, `keywords`, `address`, `telephone`, `is_active`, `revenue`) VALUES
(1, 'twinne', 'admin@twinne.com', 'hsndbfsgbf ', 'adfs asfaf', '20,janptag', '01412742224', '1', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_taxes`
--

CREATE TABLE IF NOT EXISTS `tbl_taxes` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `apply_to` varchar(100) NOT NULL,
  `rate` int(5) NOT NULL,
  `default` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_taxes`
--

INSERT INTO `tbl_taxes` (`id`, `name`, `apply_to`, `rate`, `default`) VALUES
(1, 'USA Tax', 'United States', 10, '0'),
(2, 'Europe Vat', 'Europe', 10, '0'),
(6, 'russ', 'in', 10, '1'),
(4, 'Default', 'Everywhere', 10, '0'),
(5, 'Great britain vat', 'London', 10, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_terms`
--

CREATE TABLE IF NOT EXISTS `tbl_terms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `terms` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_terms`
--

INSERT INTO `tbl_terms` (`id`, `terms`) VALUES
(1, '<p>\n	<span style="font-family:georgia,serif;"><span style="background-color:#ff8c00;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eu posuere massa. Phasellus id nunc a erat faucibus vehicula.</span> Praesent eu urna nunc, at cursus metus. In nulla ante,</span><strong><span style="font-family:georgia,serif;"> venenatis sed accumsan et, convallis congue velit. Mauris venenatis venenatis varius. </span>Proin a ante ac tellus mattis pretium id at tellus. Integer in ipsum at eros semper varius ac nec nisl. Sed vitae odio felis, eu consequat justo. Ut ac purus quis justo aliquet venenatis. Curabitur imperdiet, augue vel sagittis luctus, metus eros sodales lectus, at sagittis justo massa sed felis. Cras at nisi ac felis pulvinar fermentum. Integer luctus iaculis libero, quis vestibulum orci imperdiet commodo. Suspendisse et sem quam, in euismod sapien. Aliquam vitae facilisis diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris sit amet convallis purus.</strong></p>\n<p>\n	<strong>Nunc sit amet ante erat. Ut euismod leo ac lorem imperdiet eu tincidunt tortor ali</strong>quam. Aenean sem sem, laoreet eget ultrices id, tincidunt ut nulla. Sed eget lacus dolor, ac dignissim nibh. Fusce vitae velit a quam vehicula sagittis eget non turpis. Sed quis elit purus. Nullam cursus eleifend varius. In facilisis, velit eu dignissim blandit, risus nulla fringilla nibh, ac volutpat odio ligula vel dui. Curabitur tortor augue, fringilla id sodales eget, vehicula at augue. Donec quis quam sed magna pretium tincidunt non nec turpis. Aliquam imperdiet congue porta. Maecenas luctus placerat suscipit. Curabitur ut velit quis urna semper porta in a dui. Morbi et tellus urna, non venenatis nunc. Etiam bibendum neque ut elit euismod ultrices. Suspendisse a dolor sit amet lacus sollicitudin vulputate nec et nisi. Etiam lacinia velit eget quam ornare vehicula. Nullam a eros diam, vitae mollis justo.</p>\n<p>\n	Proin laoreet accumsan mi eget hendrerit. Duis facilisis eros id diam ullamcorper tincidunt in at odio. Sed eleifend cursus tristique. Proin vitae lectus vitae mi porta rutrum. Suspendisse potenti. Aenean eget lectus quis est tincidunt porttitor. Cras posuere nunc in nunc tristique eget luctus enim blandit. Ut sagittis ornare metus, sit amet bibendum justo mattis at.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transection`
--

CREATE TABLE IF NOT EXISTS `tbl_transection` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `method` varchar(225) NOT NULL,
  `status` int(3) NOT NULL,
  `type` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_upcoming_design`
--

CREATE TABLE IF NOT EXISTS `tbl_upcoming_design` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_added` varchar(225) NOT NULL,
  `date_removed` varchar(225) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `subscribors` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbl_upcoming_design`
--

INSERT INTO `tbl_upcoming_design` (`id`, `title`, `user_id`, `date_added`, `date_removed`, `status`, `subscribors`) VALUES
(17, 'Upcoming Project#8', 3, '1323092414', '', '1', ',mukesh.sharma@deemtech.com'),
(16, 'Upcoming Project#4', 10, '1328110987', '', '0', ''),
(8, 'Upcoming Project#5', 10, '1323089989', '', '1', ''),
(9, 'Upcoming Project#6', 10, '1323090010', '', '1', ''),
(10, 'Upcoming Project#9', 10, '1323694076', '', '1', ',cxvxcv,fgfffhgfghfh,why_mukinfo@yahoo.co.in'),
(21, 'My design1', 44, '1323943566', '', '1', ',why_mukinfo@yahoo.co.in,why_mukinfo@yahoo.co.in,se.guerriero@gmail.com,sebastiano@twinne.com,ashok.taneja@deemtech.com,se.guerriero@gmail.com'),
(22, 'muk design', 46, '1327661933', '', '1', ',shoki.taneja011@gmail.com,rakesh@deemtech.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_upcoming_design_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_upcoming_design_comment` (
  `id` bigint(15) NOT NULL AUTO_INCREMENT,
  `upcoming_design_id` int(15) NOT NULL,
  `comment_id` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `tbl_upcoming_design_comment`
--

INSERT INTO `tbl_upcoming_design_comment` (`id`, `upcoming_design_id`, `comment_id`) VALUES
(1, 8, 17),
(2, 8, 18),
(12, 8, 28),
(11, 8, 27),
(13, 17, 29),
(60, 21, 76),
(59, 21, 75),
(58, 21, 74),
(57, 21, 73),
(56, 21, 72),
(55, 9, 71),
(54, 9, 70),
(53, 9, 69),
(52, 9, 68),
(51, 21, 67),
(50, 21, 66),
(49, 10, 65),
(48, 10, 64),
(47, 10, 63),
(46, 10, 62),
(45, 10, 61),
(44, 10, 60),
(43, 10, 59),
(42, 10, 58),
(33, 10, 49),
(76, 21, 108),
(75, 21, 107),
(68, 16, 84),
(67, 16, 83),
(66, 16, 82),
(65, 16, 81),
(64, 16, 80),
(63, 16, 79),
(61, 21, 77),
(62, 16, 78),
(77, 22, 109);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_upcoming_design_file`
--

CREATE TABLE IF NOT EXISTS `tbl_upcoming_design_file` (
  `id` bigint(15) NOT NULL AUTO_INCREMENT,
  `upcoming_design_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `tbl_upcoming_design_file`
--

INSERT INTO `tbl_upcoming_design_file` (`id`, `upcoming_design_id`, `file_id`) VALUES
(21, 9, 225),
(20, 8, 224),
(28, 16, 234),
(34, 10, 262),
(29, 17, 235),
(36, 21, 290),
(37, 22, 324);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `first_name` varchar(225) DEFAULT NULL,
  `last_name` varchar(225) DEFAULT NULL,
  `gender` varchar(225) DEFAULT NULL,
  `website` varchar(225) NOT NULL,
  `profile` text NOT NULL,
  `reward_points` int(10) NOT NULL,
  `supervisor` varchar(225) NOT NULL,
  `display_type` int(2) DEFAULT NULL,
  `currency_id` int(3) DEFAULT NULL,
  `is_active` enum('0','1') NOT NULL,
  `role_id` int(3) NOT NULL,
  `notification` enum('0','1') NOT NULL,
  `salt` varchar(225) DEFAULT NULL,
  `last_login` date NOT NULL,
  `created` date NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `remember_me` enum('0','1') NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `fb_uid` int(11) NOT NULL,
  `revenue` int(3) NOT NULL,
  `pmt_method` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`username`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `gender`, `website`, `profile`, `reward_points`, `supervisor`, `display_type`, `currency_id`, `is_active`, `role_id`, `notification`, `salt`, `last_login`, `created`, `display_name`, `remember_me`, `status`, `fb_uid`, `revenue`, `pmt_method`) VALUES
(5, 'sudeshpall', 'yadav.sudeshpal1@gmail.com', 'ef3a8112070edb920ea18bdbe38d6db6ff55e46d', 'Ravindra', 'Chaudhry', NULL, '', '', 0, '', NULL, NULL, '0', 1, '1', '2d4f558f507cf2aaf466117c13083967', '0000-00-00', '0000-00-00', NULL, '0', '', 0, 0, ''),
(10, 'shoky1', 'shokky@gmail.com', 'b704333dcd9e19f3e32aea3b9fc9b701a36c1021', 'Ashok', 'Taneja', 'Male', '', 'This is new one.', 0, '18', 1, 1, '1', 3, '', 'c078c5361a009c25426e754650c133d3', '2012-01-30', '0000-00-00', NULL, '0', '1', 0, 30, ''),
(11, 'sudesh2', 'sudesh@deemtech.com', 'ad72ad26c5139b73f61e8d1e0bf9fd80d58ce737', NULL, NULL, NULL, '', '', 0, '', NULL, NULL, '0', 1, '1', 'f86c257288d1862a383863aaa5155457', '0000-00-00', '0000-00-00', NULL, '0', '', 0, 0, ''),
(12, 'ravi', 'ravindar.choudhary@deemtech.com', 'a85cb8d09d053ab3f86557f244b924c497baed39', NULL, NULL, NULL, '', '', 0, '', NULL, NULL, '0', 1, '1', 'd3cc1fc133ac9974a8450350cd900398', '0000-00-00', '0000-00-00', NULL, '0', '', 0, 0, ''),
(13, 'ravi1', 'ravindar.choudhary1@deemtech.com', '1d5ac0926197dfb69103946563cef0b00fdbdde2', NULL, NULL, NULL, '', '', 0, '', NULL, NULL, '0', 1, '1', '03924e14fc6926982a53fbb5553bceb9', '0000-00-00', '0000-00-00', NULL, '0', '', 0, 0, ''),
(14, 'suideshpall', 'yadav.sudeshpal2@gmail.com', 'ae2b1f1fdd627652e8b45c8f4edad932a86dc74a', NULL, NULL, NULL, '', '', 0, '', NULL, NULL, '0', 4, '1', '9884e876906529239f00575b5caaf232', '0000-00-00', '0000-00-00', NULL, '0', '', 0, 0, ''),
(17, 'sudesh87', 'sudesh87@gmail.com', '8347597e30cfa3597406d6876208b685a811834e', 'Sudesh', 'Yadav', NULL, 'www.facebook.com/sudesh87', '', 0, '', NULL, NULL, '1', 4, '1', 'f7999a712db469ccb48c75b9ae65399d', '0000-00-00', '2011-11-22', NULL, '0', '', 0, 0, ''),
(18, 'twinne_admin88', 'twinne_admin88@twinne.com', '60b953ae65ec158392f2b917cb36801526f4756f', 'Somesh', 'Sharma', NULL, 'www.sharmatextiles.com', '', 0, '', NULL, NULL, '1', 2, '1', 'b19698e5f91e623cdc1e33fef2939a16', '0000-00-00', '2011-11-22', NULL, '0', '', 0, 0, ''),
(27, 'esrewr', 'werewr@jsdfgds.com', 'bc0e17fbd92167416bb53d68f9082d659b799239', 'esrt', 'iusyt', NULL, 'isdyfiu', '', 0, '', NULL, NULL, '1', 2, '1', '29354dc0c5d4666fb0033d575091c4c4', '0000-00-00', '2011-11-23', NULL, '0', '', 0, 0, ''),
(29, 'ertretr', 'erte@dsh.com', '94f9e281cdbf9f3e9ae36ae0a1f20450ab527115', 'sradyts', 'ystuy', NULL, 'wtewayrtu', '', 0, '', NULL, NULL, '0', 2, '1', '58dc10e5a8e4f4c29daf3efa9b7cbc92', '0000-00-00', '2011-11-23', NULL, '0', '', 0, 0, ''),
(30, 'sdfdf', 'yadav.sudeshdshfj@sdgjf.com', '791eb3a7945facbd97523be72bc9f0612a817105', 'usdftguid', 'sdkfuydu', NULL, 'dsufdsdhfjk', '', 0, '', NULL, NULL, '0', 2, '1', 'ad2f981ed1ad4958e507eeb8745a0411', '0000-00-00', '2011-11-23', NULL, '0', '', 0, 0, ''),
(31, 'hajhajhs', 'iauiuaiu@gmail.com', 'e877c43b4603bdb82b136bc95caef532d5ea035c', 'Ravan', 'Chimpa', NULL, 'ravan88.com', '', 0, '', NULL, NULL, '0', 2, '1', '837abadb3d623b805e55855c9ae2a8ef', '0000-00-00', '2011-11-24', NULL, '0', '', 0, 0, ''),
(32, 'rtytry', 'tryt@djsfkg.com', 'ce225f2663e96b8a60d9fcb565141a4b9d1d2333', 'uyrtf', 'usdtrf', NULL, 'suytu', '', 0, '', NULL, NULL, '0', 1, '1', '601ad4f44d8affe5afa0c8d9d0ab628a', '0000-00-00', '2011-11-24', NULL, '0', '', 0, 0, ''),
(33, 'fdgfg', 'dfgf@dhfg.com', '8aca3aab737eeaa3114625213af1bbe4a70d01ce', 'hjgf', 'usdgf', NULL, 'djfg', '', 0, '', NULL, NULL, '0', 1, '1', '9f05e987eecc498b266282725efbe428', '0000-00-00', '2011-11-24', NULL, '0', '', 0, 0, ''),
(34, 'dfgfdg', 'dfgfd@djgf.com', 'de9018f6fe4a958e017aa76d5eeb8d7ba601f984', 'dsyftg', 'ustyu', NULL, 'dusyft', '', 0, '', NULL, NULL, '0', 1, '1', '2d00fb116ce4885dd4c84efd7baf9ee1', '0000-00-00', '2011-11-24', NULL, '0', '', 0, 0, ''),
(35, 'sudesh1234', 'sudesh1231@gmail.com', '73eca77fdc2efb4bcf5b2edc3d9bdd95d42ea12b', NULL, NULL, NULL, '', '', 0, '', NULL, NULL, '0', 4, '1', '2e33d9ece879651d746edf10b7385462', '0000-00-00', '2011-11-24', NULL, '0', '', 0, 0, ''),
(39, 'krishna', 'krishna.sharma@deemtech.com', '29ce4daf854236c1e892008fb3960e83a06343ff', 'krishna', 'sharma', 'Male', '', '', 0, '', 1, 1, '0', 4, '0', 'f0b103a4fca83d8055ca56c3474d7592', '0000-00-00', '2011-12-01', 'krishna sharma', '0', '', 0, 0, ''),
(40, 'krishnas', 'kksshp@gmail.com', 'eff973d6a5153980003b1c2bfe0ee44d8ce511c1', 'Krishna', 'Sharma', 'Male', '', 'testing account', 200, '', 1, 1, '0', 4, '0', '135de7b68ef9cab6c53b838dcb3d157a', '2012-02-16', '2011-12-02', 'Krishna Sharma', '0', '0', 1085415573, 0, ''),
(44, 'vimal', 'shoki.taneja011@gmail.com', '4d53917a7b35cf77ac5b4cba3fd114b05d75ed92', 'vimal', 'sharma', 'Male', 'fdhdsjfhjh', 'Hi,\n       I like it.', 0, '', 1, 1, '1', 3, '1', '4133b99a68b608a1273280a7e76db58d', '0000-00-00', '2011-12-07', 'vimal sharma', '0', '1', 0, 30, ''),
(46, 'mukesh', 'why_mukinfo@yahoo.co.in', 'bcafeba30988966b743d9efd00f29c54216a601a', 'mukesh', 'sharma', 'female', 'deemtech.com', 'This is my favorite fdsadfasd', 110, '60', 1, 3, '1', 3, '1', '0f4da966f36e473041d3012c1913d2c4', '2012-02-13', '2011-12-19', 'mukesh sharma', '0', '1', 0, 30, ''),
(47, 'tanny88', 'shoky87@rediffmail.com', '3a2bee9f740aaab8040222ed3e7a8304e3b57f82', 'Adi', 'Arora', 'Male', '', 'I am not a Designer :p', 0, '', 2, 1, '1', 3, '1', '32d483300da271c02af8b00ec0241977', '2012-02-16', '2011-12-19', 'Adi', '0', '1', 2147483647, 30, 'paypal'),
(52, 'rajesh', 'rajesh@gmail.com', 'd56f1608d81cf80c9ba5a762c60c3cc2cd76cd8c', NULL, NULL, NULL, '', '', 0, '', NULL, NULL, '1', 0, '0', '0bf909902abe6660efef27aac8473c4e', '0000-00-00', '2012-01-13', NULL, '0', '0', 0, 0, ''),
(53, 'shar', 'shar@gmail.com', 'e2060039c6c4ee3cb7575ee67ba884496f150069', NULL, NULL, NULL, '', '', 0, '', NULL, NULL, '1', 0, '0', 'a5a55f9c7824444e540a72102470ae3e', '0000-00-00', '2012-01-13', NULL, '0', '0', 0, 0, ''),
(54, 'sharma', 'sharma@gmail.com', '384a868e2c5d986e68127a19834b80b4512ed321', NULL, NULL, NULL, '', '', 0, '', NULL, NULL, '1', 0, '0', 'f14532c7b12868ee03e1e9df4c7f7202', '0000-00-00', '2012-01-13', NULL, '0', '0', 0, 0, ''),
(58, 'rakesh', 'rakesh@deemtech.com', '9acadd4979b3c1055d5b7e0c9b4aeee1ec2c9a2a', NULL, NULL, NULL, '', '', 0, '', NULL, NULL, '1', 0, '1', '650a22f043e7977f5b57ffd6fc87e8a2', '0000-00-00', '2012-01-13', NULL, '0', '0', 0, 0, ''),
(59, 'rakeshshekhawat', 'rakesh.shekhawat@gmail.com', 'a626fdbd97fd68883da1be8f065c304e38719132', NULL, NULL, NULL, '', '', 0, '', NULL, NULL, '1', 0, '1', '706d65e65d73dc23560c5be39002692c', '0000-00-00', '2012-01-13', NULL, '0', '0', 0, 0, ''),
(60, 'admin', 'taneja.shoky@gmail.com', '4a37cd255a0910c04a9c3cbb52e560cd56bca612', 'SEBASTIANO', 'GUERRIERO', 'Male', '', 'I am super Admin :D', 0, '', 1, 3, '1', 1, '1', '33337107631bbfea44dd249e02077962', '2012-02-15', '2012-01-16', 'SEBASTIANO GUERRIERO', '0', '0', 0, 0, ''),
(68, 'sebastiano', 'sebastiano@twinne.com', '8a877e4f9d06446901a01821e25960e7d04dfbb5', NULL, NULL, NULL, '', '', 0, '', NULL, NULL, '1', 0, '0', '87207b1dea8496d09e998a22cab46e99', '0000-00-00', '2012-01-18', NULL, '0', '0', 0, 0, ''),
(69, 'anil', 'anil@gmail.com', '706f4fef5678974b2a73ba8cb3d58206032672df', NULL, NULL, NULL, '', '', 0, '', NULL, NULL, '1', 0, '0', '0ec779b74c5f1a5668ab5fed1823a632', '0000-00-00', '2012-01-19', NULL, '0', '0', 0, 0, ''),
(71, 'tanny89', 'taneja89@gmail.com', '13298047ca00d111da8b23c16f08cbc3103bacd9', NULL, NULL, NULL, '', '', 0, '', NULL, NULL, '1', 0, '0', 'd38babe4adcc128044213f8d7b9e2374', '0000-00-00', '2012-01-19', NULL, '0', '0', 0, 0, ''),
(77, 'saurabh2', 'saurabh2@gmail.com', 'f6a40a8ef4b7bbe4688fa56bbbca25e906a239f3', 'Saurabh', 'Jain', NULL, 'saurabh.com', 'I am freelancer designer,working in Italy for 3 years.', 0, '', NULL, NULL, '1', 4, '1', 'dc29e44fabef8119d3de4950ea391881', '0000-00-00', '2012-01-28', NULL, '0', '0', 0, 0, ''),
(78, 'sebastianog', 'se.guerriero@gmail.com', 'dc99d9ddf48e7fc191944ee613de02c5a4021554', NULL, NULL, 'male', '', '', 0, '', NULL, NULL, '1', 4, '0', 'c2e49c724f845ec71d3815edd627c4ef', '0000-00-00', '2012-01-29', NULL, '0', '0', 0, 0, ''),
(79, 'vikram', 'seller83test@gmail.com', 'be087cc11d7a367a065ffccde119cd8277f64813', NULL, NULL, 'male', '', '', 0, '', NULL, NULL, '1', 4, '0', '879e219669e15fb9c050ced923510cfd', '0000-00-00', '2012-01-30', NULL, '0', '0', 0, 0, ''),
(80, 'kekko', 'kekko@kekko.it', 'f2d71938ba402fb540ddc0fb1e33928661103ffc', 'kekko', 'live', NULL, '', 'this is kekko''s profile', 0, '5', NULL, NULL, '1', 3, '1', '59abc117e314f56b54d4498512b90db9', '2012-01-31', '2012-01-31', NULL, '0', '0', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_address`
--

CREATE TABLE IF NOT EXISTS `tbl_user_address` (
  `id` bigint(15) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `default` enum('0','1') NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_user_address`
--

INSERT INTO `tbl_user_address` (`id`, `user_id`, `address_id`, `default`, `type`) VALUES
(2, 1, 3, '1', 'shipping'),
(4, 38, 5, '0', ''),
(5, 39, 7, '1', 'shipping'),
(6, 40, 10, '1', 'shipping'),
(7, 46, 20, '1', 'shipping'),
(8, 47, 16, '1', 'shipping'),
(9, 50, 21, '1', 'shipping'),
(10, 50, 22, '1', 'billing'),
(11, 50, 23, '1', 'billing'),
(12, 50, 24, '1', 'billing'),
(13, 50, 25, '1', 'billing'),
(14, 48, 26, '1', 'shipping'),
(15, 50, 27, '1', 'billing'),
(16, 60, 28, '1', 'shipping'),
(17, 60, 29, '1', 'billing'),
(18, 61, 30, '1', 'shipping'),
(19, 46, 31, '1', 'billing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_cms`
--

CREATE TABLE IF NOT EXISTS `tbl_user_cms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cms_id` int(11) NOT NULL,
  `default` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_coupon`
--

CREATE TABLE IF NOT EXISTS `tbl_user_coupon` (
  `id` bigint(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `coupon_count` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_file`
--

CREATE TABLE IF NOT EXISTS `tbl_user_file` (
  `id` bigint(15) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) NOT NULL,
  `image_id` bigint(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_id` bigint(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `tbl_user_file`
--

INSERT INTO `tbl_user_file` (`id`, `profile_id`, `image_id`, `user_id`, `file_id`) VALUES
(1, 29, 46, 0, 0),
(2, 30, 47, 0, 0),
(3, 0, 0, 30, 47),
(4, 31, 48, 0, 0),
(5, 0, 0, 31, 48),
(6, 32, 49, 0, 0),
(7, 0, 0, 32, 49),
(8, 34, 53, 0, 0),
(9, 0, 0, 34, 51),
(10, 0, 0, 34, 53),
(11, 27, 54, 0, 0),
(12, 0, 0, 27, 54),
(13, 1, 334, 0, 0),
(14, 0, 0, 1, 55),
(15, 0, 0, 1, 56),
(16, 0, 0, 1, 57),
(17, 0, 0, 1, 58),
(18, 0, 0, 1, 59),
(19, 0, 0, 1, 60),
(20, 0, 0, 1, 61),
(21, 0, 0, 1, 62),
(22, 0, 0, 1, 63),
(23, 0, 0, 1, 64),
(24, 0, 0, 1, 65),
(25, 0, 0, 1, 66),
(26, 0, 0, 1, 67),
(27, 0, 0, 1, 68),
(28, 37, 69, 0, 0),
(29, 0, 0, 37, 69),
(30, 41, 236, 0, 0),
(31, 0, 0, 41, 236),
(32, 44, 254, 0, 0),
(33, 0, 0, 44, 254),
(34, 46, 319, 0, 0),
(35, 0, 0, 46, 295),
(36, 47, 302, 0, 0),
(37, 0, 0, 47, 302),
(38, 0, 0, 46, 316),
(39, 0, 0, 46, 319),
(40, 48, 323, 0, 0),
(41, 0, 0, 48, 323),
(42, 50, 331, 0, 0),
(43, 0, 0, 50, 331),
(44, 49, 333, 0, 0),
(45, 0, 0, 49, 333),
(46, 0, 0, 1, 334),
(47, 60, 335, 0, 0),
(48, 0, 0, 60, 335),
(49, 76, 374, 0, 0),
(50, 0, 0, 76, 374);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_post`
--

CREATE TABLE IF NOT EXISTS `tbl_user_post` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_id` int(15) NOT NULL,
  `pcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE IF NOT EXISTS `tbl_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(225) NOT NULL,
  `date` int(10) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`id`, `user_id`, `title`, `description`, `link`, `date`, `is_active`) VALUES
(1, 1, 'new video', 'dcsdsadsd', '0', 1320136264, '1'),
(2, 1, 'video', 'zsdsadsad', '0', 1320136251, '0'),
(6, 1, 'akon chammak challo', '0', '0', 1319203403, '1'),
(7, 1, 'shakira waka waka', 'sgvfssdfgbsbhf', '0', 1319281061, '1'),
(8, 1, 'Hum Bewafa', 'Kishor kumar song...\n', 'youtube.com', 1320319034, '0'),
(9, 1, '', '', '', 1320487849, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_video_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) NOT NULL,
  `comment_id` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_video_comment`
--

INSERT INTO `tbl_video_comment` (`id`, `video_id`, `comment_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE IF NOT EXISTS `tbl_wishlist` (
  `id` bigint(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=311 ;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`id`, `name`, `user_id`) VALUES
(102, NULL, 49),
(3, NULL, 39),
(225, NULL, 74),
(5, NULL, 41),
(305, NULL, 60),
(136, NULL, 50),
(137, NULL, 55),
(309, NULL, 47),
(149, NULL, 1),
(159, NULL, 61),
(253, NULL, 10),
(184, NULL, 18),
(222, NULL, 73),
(232, NULL, 76),
(306, NULL, 46),
(264, NULL, 5),
(310, NULL, 40);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wp_commentmeta`
--

CREATE TABLE IF NOT EXISTS `tbl_wp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wp_comments`
--

CREATE TABLE IF NOT EXISTS `tbl_wp_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_approved` (`comment_approved`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_wp_comments`
--

INSERT INTO `tbl_wp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'Mr WordPress', '', 'http://wordpress.org/', '', '2011-12-09 04:28:35', '2011-12-09 04:28:35', 'Hi, this is a comment.<br />To delete a comment, just log in and view the post&#039;s comments. There you will have the option to edit or delete them.', 0, '0', '', '', 0, 0),
(4, 1, 'vikas', 'seller83test@gmail.com', '', '122.176.83.10', '2011-12-21 06:23:13', '2011-12-21 06:23:13', 'hello', 0, '0', 'Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0', '', 0, 7),
(5, 1, 'admin', 'abid.hussain@deemtech.com', '', '122.176.83.10', '2011-12-26 06:17:14', '2011-12-26 06:17:14', 'Hi test', 0, '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.63 Safari/535.7', '', 0, 1),
(7, 1, 'mukesh', 'why_mukinfo@yahoo.co.in', '', '122.176.83.10', '2012-01-04 10:28:32', '2012-01-04 10:28:32', 'Hello', 0, '1', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; InfoPath.2)', '', 0, 4),
(8, 3, 'mukesh', 'why_mukinfo@yahoo.co.in', '', '122.176.83.10', '2012-01-13 06:29:46', '2012-01-13 06:29:46', 'erltk', 0, '1', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; InfoPath.2)', '', 0, 4),
(9, 5, 'mukesh', 'why_mukinfo@yahoo.co.in', '', '122.176.83.10', '2012-01-13 06:32:46', '2012-01-13 06:32:46', 'yrtyrt', 0, '1', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; InfoPath.2)', '', 0, 4),
(10, 31, 'admin', 'abid.hussain@deemtech.com', '', '127.0.0.1', '2012-01-20 11:34:05', '2012-01-20 11:34:05', 'test', 0, '1', 'Mozilla/5.0 (Windows NT 5.2; rv:9.0.1) Gecko/20100101 Firefox/9.0.1', '', 0, 1),
(11, 31, 'admin', 'abid.hussain@deemtech.com', '', '127.0.0.1', '2012-01-20 12:47:47', '2012-01-20 12:47:47', 'yes test', 0, '1', 'Mozilla/5.0 (Windows NT 5.2; rv:9.0.1) Gecko/20100101 Firefox/9.0.1', '', 0, 1),
(12, 31, 'rakesh', 'rakesh2@deemtech.com', '', '127.0.0.1', '2012-01-24 08:26:30', '2012-01-24 08:26:30', 'dgffdfdfdfdf', 0, '0', 'Mozilla/5.0 (Windows NT 5.2; rv:9.0.1) Gecko/20100101 Firefox/9.0.1', '', 0, 0),
(13, 31, 'admin', 'abid.hussain@deemtech.com', '', '127.0.0.1', '2012-01-24 08:38:33', '2012-01-24 08:38:33', 'htyhty', 0, '1', 'Mozilla/5.0 (Windows NT 5.2; rv:9.0.1) Gecko/20100101 Firefox/9.0.1', '', 0, 1),
(14, 54, 'admin', 'abid.hussain@deemtech.com', '', '127.0.0.1', '2012-01-24 11:14:59', '2012-01-24 11:14:59', 'yes test', 0, '1', 'Mozilla/5.0 (Windows NT 5.2; rv:9.0.1) Gecko/20100101 Firefox/9.0.1', '', 0, 1),
(15, 54, 'mukesh', 'why_mukinfo@yahoo.co.in', '', '122.176.83.10', '2012-02-01 09:34:36', '2012-02-01 09:34:36', 'nice video!!!!!!!!', 0, '1', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; InfoPath.2)', '', 0, 4),
(16, 5, 'mukesh', 'why_mukinfo@yahoo.co.in', '', '122.176.83.10', '2012-02-03 10:36:51', '2012-02-03 10:36:51', 'hii', 0, '1', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; InfoPath.2)', '', 0, 4),
(17, 54, 'mukesh', 'why_mukinfo@yahoo.co.in', '', '122.176.83.10', '2012-02-03 12:34:46', '2012-02-03 12:34:46', 'hi', 0, '1', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; InfoPath.2)', '', 0, 4),
(18, 3, 'admin', 'abid.hussain@deemtech.com', '', '2.25.184.88', '2012-02-13 11:23:18', '2012-02-13 11:23:18', 'ascas', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:10.0.1) Gecko/20100101 Firefox/10.0.1', '', 0, 1),
(19, 5, 'admin', 'abid.hussain@deemtech.com', '', '2.25.184.88', '2012-02-13 11:23:33', '2012-02-13 11:23:33', 'test comment', 0, '1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:10.0.1) Gecko/20100101 Firefox/10.0.1', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wp_links`
--

CREATE TABLE IF NOT EXISTS `tbl_wp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_image` varchar(255) NOT NULL DEFAULT '',
  `link_target` varchar(25) NOT NULL DEFAULT '',
  `link_description` varchar(255) NOT NULL DEFAULT '',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL DEFAULT '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_wp_links`
--

INSERT INTO `tbl_wp_links` (`link_id`, `link_url`, `link_name`, `link_image`, `link_target`, `link_description`, `link_visible`, `link_owner`, `link_rating`, `link_updated`, `link_rel`, `link_notes`, `link_rss`) VALUES
(1, 'http://codex.wordpress.org/', 'Documentation', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(2, 'http://wordpress.org/news/', 'WordPress Blog', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', 'http://wordpress.org/news/feed/'),
(3, 'http://wordpress.org/extend/ideas/', 'Suggest Ideas', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(4, 'http://wordpress.org/support/', 'Support Forum', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(5, 'http://wordpress.org/extend/plugins/', 'Plugins', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(6, 'http://wordpress.org/extend/themes/', 'Themes', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(7, 'http://planet.wordpress.org/', 'WordPress Planet', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wp_options`
--

CREATE TABLE IF NOT EXISTS `tbl_wp_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL DEFAULT '0',
  `option_name` varchar(64) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=971 ;

--
-- Dumping data for table `tbl_wp_options`
--

INSERT INTO `tbl_wp_options` (`option_id`, `blog_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 0, 'siteurl', 'http://hostingmachine.net/dev/twinne/blog', 'yes'),
(2, 0, 'blogname', 'Twinne - Blog', 'yes'),
(3, 0, 'blogdescription', 'Just another WordPress site', 'yes'),
(4, 0, 'users_can_register', '0', 'yes'),
(5, 0, 'admin_email', 'abid.hussain@deemtech.com', 'yes'),
(6, 0, 'start_of_week', '1', 'yes'),
(7, 0, 'use_balanceTags', '', 'yes'),
(8, 0, 'use_smilies', '1', 'yes'),
(9, 0, 'require_name_email', '1', 'yes'),
(10, 0, 'comments_notify', '1', 'yes'),
(11, 0, 'posts_per_rss', '10', 'yes'),
(12, 0, 'rss_use_excerpt', '0', 'yes'),
(13, 0, 'mailserver_url', 'mail.example.com', 'yes'),
(14, 0, 'mailserver_login', 'login@example.com', 'yes'),
(15, 0, 'mailserver_pass', 'password', 'yes'),
(16, 0, 'mailserver_port', '110', 'yes'),
(17, 0, 'default_category', '5', 'yes'),
(18, 0, 'default_comment_status', 'closed', 'yes'),
(19, 0, 'default_ping_status', 'open', 'yes'),
(20, 0, 'default_pingback_flag', '1', 'yes'),
(21, 0, 'default_post_edit_rows', '20', 'yes'),
(22, 0, 'posts_per_page', '10', 'yes'),
(23, 0, 'date_format', 'F j, Y', 'yes'),
(24, 0, 'time_format', 'g:i a', 'yes'),
(25, 0, 'links_updated_date_format', 'F j, Y g:i a', 'yes'),
(26, 0, 'links_recently_updated_prepend', '<em>', 'yes'),
(27, 0, 'links_recently_updated_append', '</em>', 'yes'),
(28, 0, 'links_recently_updated_time', '120', 'yes'),
(29, 0, 'comment_moderation', '', 'yes'),
(30, 0, 'moderation_notify', '1', 'yes'),
(31, 0, 'permalink_structure', '/%category%/%postname%/', 'yes'),
(32, 0, 'gzipcompression', '0', 'yes'),
(33, 0, 'hack_file', '0', 'yes'),
(34, 0, 'blog_charset', 'UTF-8', 'yes'),
(35, 0, 'moderation_keys', '', 'no'),
(36, 0, 'active_plugins', 'a:1:{i:0;s:35:"wp-page-numbers/wp-page-numbers.php";}', 'yes'),
(37, 0, 'home', 'http://hostingmachine.net/dev/twinne/blog', 'yes'),
(38, 0, 'category_base', '', 'yes'),
(39, 0, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(40, 0, 'advanced_edit', '0', 'yes'),
(41, 0, 'comment_max_links', '2', 'yes'),
(42, 0, 'gmt_offset', '0', 'yes'),
(43, 0, 'default_email_category', '1', 'yes'),
(44, 0, 'recently_edited', 'a:2:{i:0;s:62:"E:\\xampp\\htdocs\\twinne\\blog/wp-content/themes/twinne/style.css";i:1;s:0:"";}', 'no'),
(45, 0, 'template', 'twinne', 'yes'),
(46, 0, 'stylesheet', 'twinne', 'yes'),
(47, 0, 'comment_whitelist', '1', 'yes'),
(48, 0, 'blacklist_keys', '', 'no'),
(49, 0, 'comment_registration', '1', 'yes'),
(50, 0, 'rss_language', 'en', 'yes'),
(51, 0, 'html_type', 'text/html', 'yes'),
(52, 0, 'use_trackback', '0', 'yes'),
(53, 0, 'default_role', 'subscriber', 'yes'),
(54, 0, 'db_version', '19470', 'yes'),
(55, 0, 'uploads_use_yearmonth_folders', '1', 'yes'),
(56, 0, 'upload_path', '', 'yes'),
(57, 0, 'blog_public', '1', 'yes'),
(58, 0, 'default_link_category', '2', 'yes'),
(59, 0, 'show_on_front', 'page', 'yes'),
(60, 0, 'tag_base', '', 'yes'),
(61, 0, 'show_avatars', '1', 'yes'),
(62, 0, 'avatar_rating', 'G', 'yes'),
(63, 0, 'upload_url_path', '', 'yes'),
(64, 0, 'thumbnail_size_w', '150', 'yes'),
(65, 0, 'thumbnail_size_h', '150', 'yes'),
(66, 0, 'thumbnail_crop', '1', 'yes'),
(67, 0, 'medium_size_w', '300', 'yes'),
(68, 0, 'medium_size_h', '300', 'yes'),
(69, 0, 'avatar_default', 'gravatar_default', 'yes'),
(70, 0, 'enable_app', '', 'yes'),
(71, 0, 'enable_xmlrpc', '', 'yes'),
(72, 0, 'large_size_w', '1024', 'yes'),
(73, 0, 'large_size_h', '1024', 'yes'),
(74, 0, 'image_default_link_type', 'file', 'yes'),
(75, 0, 'image_default_size', '', 'yes'),
(76, 0, 'image_default_align', '', 'yes'),
(77, 0, 'close_comments_for_old_posts', '', 'yes'),
(78, 0, 'close_comments_days_old', '14', 'yes'),
(79, 0, 'thread_comments', '1', 'yes'),
(80, 0, 'thread_comments_depth', '5', 'yes'),
(81, 0, 'page_comments', '', 'yes'),
(82, 0, 'comments_per_page', '50', 'yes'),
(83, 0, 'default_comments_page', 'newest', 'yes'),
(84, 0, 'comment_order', 'asc', 'yes'),
(85, 0, 'sticky_posts', 'a:0:{}', 'yes'),
(86, 0, 'widget_categories', 'a:2:{i:2;a:4:{s:5:"title";s:0:"";s:5:"count";i:0;s:12:"hierarchical";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(87, 0, 'widget_text', 'a:7:{i:2;a:0:{}i:3;a:3:{s:5:"title";s:0:"";s:4:"text";s:242:"<div class="facebook_like_box">\r\n          <div class="facebook_like_box_top">Find us on Facebook</div>\r\n          <div style="padding:8px;"><img alt="facebook" src="http://localhost/twinne/images/facebook_platform.jpg"></div>\r\n        </div>";s:6:"filter";b:0;}i:4;a:3:{s:5:"title";s:0:"";s:4:"text";s:9:"rhghgfhfh";s:6:"filter";b:0;}i:5;a:3:{s:5:"title";s:7:"dfgfdgd";s:4:"text";s:7:"dsfgdgd";s:6:"filter";b:0;}i:6;a:3:{s:5:"title";s:0:"";s:4:"text";s:8:"FDGDFGDG";s:6:"filter";b:0;}i:7;a:3:{s:5:"title";s:0:"";s:4:"text";s:350:"<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fdeemtech&amp;width=292&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:290px;" allowTransparency="true"></iframe>";s:6:"filter";b:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(88, 0, 'widget_rss', 'a:2:{i:2;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(89, 0, 'timezone_string', '', 'yes'),
(90, 0, 'embed_autourls', '1', 'yes'),
(91, 0, 'embed_size_w', '', 'yes'),
(92, 0, 'embed_size_h', '600', 'yes'),
(93, 0, 'page_for_posts', '0', 'yes'),
(94, 0, 'page_on_front', '23', 'yes'),
(95, 0, 'default_post_format', '0', 'yes'),
(96, 0, 'tbl_wp_user_roles', 'a:5:{s:13:"administrator";a:2:{s:4:"name";s:13:"Administrator";s:12:"capabilities";a:62:{s:13:"switch_themes";b:1;s:11:"edit_themes";b:1;s:16:"activate_plugins";b:1;s:12:"edit_plugins";b:1;s:10:"edit_users";b:1;s:10:"edit_files";b:1;s:14:"manage_options";b:1;s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:6:"import";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:8:"level_10";b:1;s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:12:"delete_users";b:1;s:12:"create_users";b:1;s:17:"unfiltered_upload";b:1;s:14:"edit_dashboard";b:1;s:14:"update_plugins";b:1;s:14:"delete_plugins";b:1;s:15:"install_plugins";b:1;s:13:"update_themes";b:1;s:14:"install_themes";b:1;s:11:"update_core";b:1;s:10:"list_users";b:1;s:12:"remove_users";b:1;s:9:"add_users";b:1;s:13:"promote_users";b:1;s:18:"edit_theme_options";b:1;s:13:"delete_themes";b:1;s:6:"export";b:1;}}s:6:"editor";a:2:{s:4:"name";s:6:"Editor";s:12:"capabilities";a:34:{s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;}}s:6:"author";a:2:{s:4:"name";s:6:"Author";s:12:"capabilities";a:10:{s:12:"upload_files";b:1;s:10:"edit_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:4:"read";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:22:"delete_published_posts";b:1;}}s:11:"contributor";a:2:{s:4:"name";s:11:"Contributor";s:12:"capabilities";a:5:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;}}s:10:"subscriber";a:2:{s:4:"name";s:10:"Subscriber";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}}', 'yes'),
(97, 0, 'widget_search', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(98, 0, 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(99, 0, 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(100, 0, 'widget_archives', 'a:2:{i:2;a:3:{s:5:"title";s:0:"";s:5:"count";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(101, 0, 'widget_meta', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(102, 0, 'sidebars_widgets', 'a:10:{s:19:"primary-widget-area";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:8:"rakesh-3";a:3:{i:0;s:15:"flickr-badges-3";i:1;s:6:"text-5";i:2;s:6:"text-3";}s:19:"wp_inactive_widgets";a:10:{i:0;s:6:"text-4";i:1;s:15:"flickr-badges-2";i:2;s:7:"pages-2";i:3;s:10:"calendar-2";i:4;s:7:"links-2";i:5;s:6:"text-2";i:6;s:5:"rss-2";i:7;s:11:"tag_cloud-2";i:8;s:10:"nav_menu-2";i:9;s:30:"widget_twentyeleven_ephemera-2";}s:9:"sidebar-1";a:0:{}s:9:"sidebar-2";a:0:{}s:9:"sidebar-3";a:0:{}s:9:"sidebar-4";a:0:{}s:8:"facebook";a:1:{i:0;s:6:"text-7";}s:8:"flickr-3";a:1:{i:0;s:15:"flickr-badges-4";}s:13:"array_version";i:3;}', 'yes'),
(103, 0, 'cron', 'a:3:{i:1329409717;a:3:{s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1329452932;a:1:{s:19:"wp_scheduled_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}s:7:"version";i:2;}', 'yes'),
(106, 0, 'widget_pages', 'a:2:{i:2;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(107, 0, 'widget_calendar', 'a:2:{i:2;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(108, 0, 'widget_links', 'a:2:{i:2;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(109, 0, 'widget_tag_cloud', 'a:2:{i:2;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(110, 0, 'widget_nav_menu', 'a:2:{i:2;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(111, 0, 'widget_widget_twentyeleven_ephemera', 'a:2:{i:2;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(969, 0, '_site_transient_timeout_theme_roots', '1329374335', 'yes'),
(970, 0, '_site_transient_theme_roots', 'a:3:{s:12:"twentyeleven";s:7:"/themes";s:9:"twentyten";s:7:"/themes";s:6:"twinne";s:7:"/themes";}', 'yes'),
(115, 0, '_site_transient_update_themes', 'O:8:"stdClass":3:{s:12:"last_checked";i:1329367135;s:7:"checked";a:3:{s:12:"twentyeleven";s:3:"1.2";s:9:"twentyten";s:3:"1.2";s:6:"twinne";s:3:"1.2";}s:8:"response";a:2:{s:12:"twentyeleven";a:3:{s:11:"new_version";s:3:"1.3";s:3:"url";s:47:"http://wordpress.org/extend/themes/twentyeleven";s:7:"package";s:64:"http://wordpress.org/extend/themes/download/twentyeleven.1.3.zip";}s:9:"twentyten";a:3:{s:11:"new_version";s:3:"1.3";s:3:"url";s:44:"http://wordpress.org/extend/themes/twentyten";s:7:"package";s:61:"http://wordpress.org/extend/themes/download/twentyten.1.3.zip";}}}', 'yes'),
(219, 0, '_site_transient_timeout_browser_04dac836bdc45a530a3fc7606bb07a72', '1324705488', 'yes'),
(220, 0, '_site_transient_browser_04dac836bdc45a530a3fc7606bb07a72', 'a:9:{s:8:"platform";s:5:"Linux";s:4:"name";s:7:"Firefox";s:7:"version";s:6:"3.6.20";s:10:"update_url";s:23:"http://www.firefox.com/";s:7:"img_src";s:50:"http://s.wordpress.org/images/browsers/firefox.png";s:11:"img_src_ssl";s:49:"https://wordpress.org/images/browsers/firefox.png";s:15:"current_version";s:1:"6";s:7:"upgrade";b:1;s:8:"insecure";b:0;}', 'yes'),
(118, 0, 'dashboard_widget_options', 'a:4:{s:25:"dashboard_recent_comments";a:1:{s:5:"items";i:5;}s:24:"dashboard_incoming_links";a:5:{s:4:"home";s:41:"http://hostingmachine.net/dev/twinne/blog";s:4:"link";s:117:"http://blogsearch.google.com/blogsearch?scoring=d&partner=wordpress&q=link:http://hostingmachine.net/dev/twinne/blog/";s:3:"url";s:137:"http://blogsearch.google.com/blogsearch_feeds?scoring=d&ie=utf-8&num=10&output=rss&partner=wordpress&q=link:http://localhost/twinne/blog/";s:5:"items";i:10;s:9:"show_date";b:0;}s:17:"dashboard_primary";a:7:{s:4:"link";s:26:"http://wordpress.org/news/";s:3:"url";s:31:"http://wordpress.org/news/feed/";s:5:"title";s:14:"WordPress Blog";s:5:"items";i:2;s:12:"show_summary";i:1;s:11:"show_author";i:0;s:9:"show_date";i:1;}s:19:"dashboard_secondary";a:7:{s:4:"link";s:28:"http://planet.wordpress.org/";s:3:"url";s:33:"http://planet.wordpress.org/feed/";s:5:"title";s:20:"Other WordPress News";s:5:"items";i:5;s:12:"show_summary";i:0;s:11:"show_author";i:0;s:9:"show_date";i:0;}}', 'yes'),
(157, 0, 'current_theme', 'Twinne', 'yes'),
(491, 0, 'db_upgraded', '', 'yes'),
(492, 0, '_site_transient_update_core', 'O:8:"stdClass":3:{s:7:"updates";a:1:{i:0;O:8:"stdClass":9:{s:8:"response";s:6:"latest";s:8:"download";s:40:"http://wordpress.org/wordpress-3.3.1.zip";s:6:"locale";s:5:"en_US";s:8:"packages";O:8:"stdClass":4:{s:4:"full";s:40:"http://wordpress.org/wordpress-3.3.1.zip";s:10:"no_content";s:51:"http://wordpress.org/wordpress-3.3.1-no-content.zip";s:11:"new_bundled";s:52:"http://wordpress.org/wordpress-3.3.1-new-bundled.zip";s:7:"partial";b:0;}s:7:"current";s:5:"3.3.1";s:11:"php_version";s:5:"5.2.4";s:13:"mysql_version";s:3:"5.0";s:11:"new_bundled";s:3:"3.2";s:15:"partial_version";s:0:"";}}s:12:"last_checked";i:1329367134;s:15:"version_checked";s:5:"3.3.1";}', 'yes'),
(493, 0, 'can_compress_scripts', '1', 'yes'),
(568, 0, 'category_children', 'a:0:{}', 'yes'),
(695, 0, '_site_transient_timeout_browser_c997ae74a8b0d634e12da643ea44603f', '1328258863', 'yes'),
(696, 0, '_site_transient_browser_c997ae74a8b0d634e12da643ea44603f', 'a:9:{s:8:"platform";s:5:"Linux";s:4:"name";s:7:"Firefox";s:7:"version";s:6:"3.6.18";s:10:"update_url";s:23:"http://www.firefox.com/";s:7:"img_src";s:50:"http://s.wordpress.org/images/browsers/firefox.png";s:11:"img_src_ssl";s:49:"https://wordpress.org/images/browsers/firefox.png";s:15:"current_version";s:1:"9";s:7:"upgrade";b:1;s:8:"insecure";b:0;}', 'yes'),
(420, 0, '_site_transient_timeout_browser_926458294354a12add66e31e94df6913', '1326277562', 'yes'),
(421, 0, '_site_transient_browser_926458294354a12add66e31e94df6913', 'a:9:{s:8:"platform";s:7:"Windows";s:4:"name";s:6:"Chrome";s:7:"version";s:11:"16.0.912.63";s:10:"update_url";s:28:"http://www.google.com/chrome";s:7:"img_src";s:49:"http://s.wordpress.org/images/browsers/chrome.png";s:11:"img_src_ssl";s:48:"https://wordpress.org/images/browsers/chrome.png";s:15:"current_version";s:2:"16";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'yes'),
(928, 0, '_transient_timeout_feed_mod_e5ae0c0dbb86dd8dba86e1b71bc3355d', '1329180362', 'no'),
(929, 0, '_transient_feed_mod_e5ae0c0dbb86dd8dba86e1b71bc3355d', '1329137162', 'no'),
(930, 0, '_transient_feed_ac0b00fe65abe10e0c5b588f3ed8c7ca', 'a:4:{s:5:"child";a:1:{s:0:"";a:1:{s:3:"rss";a:1:{i:0;a:6:{s:4:"data";s:3:"\n\n\n";s:7:"attribs";a:1:{s:0:"";a:1:{s:7:"version";s:3:"2.0";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:1:{s:7:"channel";a:1:{i:0;a:6:{s:4:"data";s:50:"\n	\n	\n	\n	\n	\n	\n	\n	\n	\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n	";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:3:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:14:"WordPress News";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:25:"http://wordpress.org/news";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:14:"WordPress News";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:13:"lastBuildDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 30 Jan 2012 17:05:16 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"language";a:1:{i:0;a:5:{s:4:"data";s:5:"en-US";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:9:"generator";a:1:{i:0;a:5:{s:4:"data";s:39:"http://wordpress.org/?v=3.4-alpha-19904";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"item";a:10:{i:0;a:6:{s:4:"data";s:41:"\n		\n		\n		\n		\n		\n				\n\n		\n		\n			\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:18:"Year of the Meetup";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:53:"http://wordpress.org/news/2012/01/year-of-the-meetup/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:62:"http://wordpress.org/news/2012/01/year-of-the-meetup/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 27 Jan 2012 20:17:49 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:1:{i:0;a:5:{s:4:"data";s:9:"Community";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=2210";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:456:"We hereby declare 2012 as the Year of the WordPress Meetup. You''ll want to get in on this action. So what is a WordPress Meetup? Basically, it''s people in a community getting together &#8212; meeting up &#8212; who share an interest in WordPress, whether they be bloggers, business users, developers, consultants, or any other category of person able to say, "I use WordPress in some way and I like it, and I want to meet other people who can say the same.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:10:"Jane Wells";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:6300:"<p>We hereby declare 2012 as the Year of the WordPress Meetup. You&#8217;ll want to get in on this action.</p>\n<blockquote><p><strong>meet&middot;up</strong> \\<strong>m&#275;t</strong>-&#601;p\\ <em>noun</em><br />\nA meeting, especially a regular meeting of people who share a particular interest and have connected with each other through a social-networking Web site: <em>a meetup for new moms in the neighborhood; a meetup to plan the trip; a meetup for WordPress users.</em><sup>1</sup></p></blockquote>\n<p>So what is a <em>WordPress Meetup</em>? Basically, it&#8217;s people in a community getting together &#8212; meeting up &#8212; who share an interest in WordPress, whether they be bloggers, business users, developers, consultants, or any other category of person able to say, &#8220;I use WordPress in some way and I like it, and I want to meet other people who can say the same.&#8221; Meetups come in different shapes and sizes, but they all carry the benefit of connecting you with potential collaborators and friends, and helping you learn more about what you can do with WordPress. Here are some of the common types of WordPress meetups:</p>\n<ul>\n<li>Hang out and work on your WordPress sites together</li>\n<li>Social/happy hour type gatherings</li>\n<li>Mini-lectures/presentations</li>\n<li>Developer hacking meetups</li>\n<li>Show &amp; tell of how group members are using WordPress</li>\n<li>Formal instruction on how to use WordPress</li>\n<li>Lecture series (possibly with visiting speakers)</li>\n<li>Genius bar/help desk</li>\n</ul>\n<p>There&#8217;s no prescribed format, as each local group can decide for itself what they want to do. Some groups mix it up from month to month, while others have multiple events each month to satisfy the needs of their community.</p>\n<p>The tough part? Running a popular group takes time and money. Just as we worked last year to remove the financial burden for <a href="http://wordcamp.org">WordCamp</a> organizers and provide logistical support so they could focus more on their event content and experience, we want to start extending that kind of support to meetup groups as well. We don&#8217;t want it to cost anything for someone to run a WordPress meetup, or to attend one &#8212; building local communities should be as free as WordPress itself!</p>\n<p>Since there are so many more meetups than there are WordCamps, we&#8217;re going to start with the cost that is the same for every group: meetup.com organizer dues. We&#8217;re setting up an official WordPress account on <a href="http://Meetup.com">Meetup.com</a> right now, and over the next couple of weeks will be working with existing meetup group organizers, people who want to start a new meetup group, and the helpful folks at Meetup.com to put this program in place. WordPress meetup groups that choose to have their group become part of the WordPress account will no longer pay organizer dues for that group, as the <a href="http://wordpressfoundation.org">WordPress Foundation</a> will be footing the bill.</p>\n<p>This is exciting for several reasons. First, it means local organizers who are giving something back to the project by way of their time won&#8217;t also have shell out $12-19/month for the privilege. That alone is a big step. Second, it will open the door to more events and leaders within a community, since leadership and event planning won&#8217;t need to be tied to &#8220;owning&#8221; the meetup group. Third, more active meetup groups means more WordCamps, yay!</p>\n<p>In addition to the financial aspects, we&#8217;ll be working on ways to improve social recognition of meetup activity by incorporating feeds from the official meetup groups into the WordPress.org site, and including meetup group participation in the activity stream on your <a href="http://profiles.wordpress.org/">WordPress.org profile</a>.<sup>2</sup> I&#8217;m also hoping we can do something around providing video equipment to meetup groups (like we already do for WordCamps) to record presentations and tutorials that can be posted to <a href="http://WordPress.tv">WordPress.tv</a>, helping meetup groups offer WordPress classes in their community, and getting involved with mentoring WordPress clubs at local schools and universities. Oh, and we&#8217;ll send out some WordPress buttons and stickers to the groups that join in, because everyone loves buttons and stickers.</p>\n<p>We&#8217;re also putting together some cool resources for people who want to start a new meetup group. There will be a field guide to getting started and some supplies to help you get your group going, and a forum for organizers to talk to and learn from each other.</p>\n<p>Over time, we&#8217;ll be talking to organizers and looking at what other expenses we can absorb and what other support we can provide to local groups. For now, we&#8217;re starting with the organizer dues. If you currently run a WordPress meetup group (whether you are using Meetup.com or not) or would like to start a WordPress meetup group in your area, please fill out our <a href="http://wordpressdotorg.polldaddy.com/s/wordpress-meetup-groups">WordPress Meetup Groups survey</a>. Filling in the survey doesn&#8217;t obligate you to join the official group, it just gives us a starting point to a) find out what groups are around/interested, and b) get some information on existing groups and their expenses and needs. Meetup.com will contact the group organizers who&#8217;ve said they&#8217;d like to join the new program, and will walk them through the logistics of the change and answer questions before helping them to opt-in officially.</p>\n<p>So, if you currently run a WordPress meetup group, or you would like to start one, please  fill out our <a href="http://wordpressdotorg.polldaddy.com/s/wordpress-meetup-groups">WordPress Meetup Groups survey</a>. I can&#8217;t wait to see more meetups!</p>\n<p><strong>1</strong> &#8211; Adapted from <a href="http://dictionary.reference.com/browse/meetup">&#8220;meetup&#8221; definition at dictionary.com</a>.<br />\n<strong>2</strong> &#8211; Didn&#8217;t know about profiles? Check out http://profiles.wordpress.org/users/yourwordpressdotorgusernamehere (put in the username you use in the WordPress.org forums) to see yours!</p>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:58:"http://wordpress.org/news/2012/01/year-of-the-meetup/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:1;a:6:{s:4:"data";s:41:"\n		\n		\n		\n		\n		\n				\n\n		\n		\n			\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:35:"Internet Blackout Day on January 18";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:52:"http://wordpress.org/news/2012/01/internet-blackout/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:61:"http://wordpress.org/news/2012/01/internet-blackout/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 17 Jan 2012 23:18:58 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:1:{i:0;a:5:{s:4:"data";s:9:"Community";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=2199";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:314:"WordPress.org is officially joining the protest against Senate Bill 968: the Protect IP Act that is coming before the U.S. Senate next week. As I wrote in my post a week ago, if this bill is passed it will jeopardize internet freedom and shift the power of the independent web into the hands of corporations. [...]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:10:"Jane Wells";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:1752:"<p>WordPress.org is officially joining the <a href="http://sopastrike.com/">protest against Senate Bill 968: the Protect IP Act</a> that is coming before the U.S. Senate next week. As I wrote in <a title="Help Stop SOPA/PIPA" href="http://wordpress.org/news/2012/01/help-stop-sopa-pipa/">my post a week ago</a>, if this bill is passed it will jeopardize internet freedom and shift the power of the independent web into the hands of corporations. We must stop it.</p>\n<p>On January 18, 2012 many sites around the web &#8212; from small personal blogs to internet institutions like <a href="http://Mozilla.org">Mozilla</a>, <a href="http://en.wikipedia.org/wiki/Wikipedia:SOPA_initiative/Action">Wikipedia</a>, <a href="http://blog.reddit.com/2012/01/stopped-they-must-be-on-this-all.html">reddit</a>, and <a href="https://twitter.com/#!/benhuh/status/157538541155516416">I Can Has Cheezburger?</a> &#8211; will be going dark in protest and to drive their visitors to sites like <a href="http://americancensorship.org">americancensorship.org</a> to take action and help fight the passage of the Protect IP Act. So will WordPress.org.</p>\n<p>If you want to join the protest by blacking out your WordPress site or applying a ribbon, there is now a variety of <a href="http://wordpress.org/extend/plugins/tags/sopa">blackout plugins in the WordPress.org plugins directory</a>. While joining the protest in this manner is laudable, please don&#8217;t forget to also make those phone calls to U.S. Senators &#8212; they&#8217;re the ones with the voting power.</p>\n<ul>\n<li><a href="http://wordpress.org/extend/plugins/tags/sopa">Get a protest plugin</a></li>\n<li><a href="http://americancensorship.org">Take action at americancensorship.org</a></li>\n</ul>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:57:"http://wordpress.org/news/2012/01/internet-blackout/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:2;a:6:{s:4:"data";s:41:"\n		\n		\n		\n		\n		\n				\n\n		\n		\n			\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:19:"Help Stop SOPA/PIPA";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:54:"http://wordpress.org/news/2012/01/help-stop-sopa-pipa/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:63:"http://wordpress.org/news/2012/01/help-stop-sopa-pipa/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 10 Jan 2012 19:18:56 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:1:{i:0;a:5:{s:4:"data";s:9:"Community";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=2191";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:298:"You are an agent of change. Has anyone ever told you that? Well, I just did, and I meant it. Normally we stay away from from politics here at the official WordPress project &#8212; having users from all over the globe that span the political spectrum is evidence that we are doing our job and [...]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:10:"Jane Wells";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:4305:"<p>You are an agent of change. Has anyone ever told you that? Well, I just did, and I meant it.</p>\n<p>Normally we stay away from from politics here at the official WordPress project &#8212; having users from all over the globe that span the political spectrum is evidence that we are doing our job and democratizing publishing, and we don&#8217;t want to alienate any of our users no matter how much some of us may disagree with some of them personally. Today, I&#8217;m breaking our no-politics rule, because <a href="http://americancensorship.org/">there&#8217;s something going on</a> in U.S. politics right now that we need to make sure you know about and understand, because it affects us all.</p>\n<p>Using WordPress to blog, to publish, to communicate things online that once upon a time would have been relegated to an unread private journal (or simply remained unspoken, uncreated, unshared) makes <strong>you</strong> a part of one of the biggest changes in modern history: the democratization of publishing and the independent web. Every time you click Publish, you are a part of that change, whether you are posting canny political insight or a cat that makes you LOL. How would you feel if the web stopped being so free and independent? I&#8217;m <del>concerned</del> freaked right the heck out about the bills that threaten to do this, and as a participant in one of the biggest changes in modern history, you should be, too.</p>\n<p>You may have heard people talking/blogging/twittering about SOPA &#8212; the Stop Online Piracy Act. The recent <a href="http://godaddyboycott.org/">SOPA-related boycott of GoDaddy</a> was all over the news, with many people expressing their outrage over the possibilities of SOPA, but when I ask people about SOPA and its sister bill in the Senate, PIPA (Protect IP Act), many don&#8217;t really know what the bills propose, or what we stand to lose. If you are not freaked out by SOPA/PIPA, please: for the next four minutes, instead of checking Facebook statuses, seeing who mentioned you on Twitter, or watching the latest episode of Sherlock*, watch this video (by <a href="http://fightforthefuture.org/">Fight for the Future</a>).</p>\n<p>    <iframe src="http://player.vimeo.com/video/31100268" width="600" height="338" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></p>\n<p>Some thoughts:</p>\n<ul>\n<li>In the U.S. our legal system maintains that the burden of proof is on the accuser, and that people are innocent until proven guilty. This tenet seems to be on the chopping block when it comes to the web if these bills pass, as companies could shut down sites based on accusation alone.</li>\n<li>Laws are not like lines of PHP; they are not easily reverted if someone wakes up and realizes there is a better way to do things. We should not be so quick to codify something this far-reaching.</li>\n<li>The people writing these laws are not the people writing the independent web, and they are not out to protect it. We have to stand up for it ourselves.</li>\n</ul>\n<p>Blogging is a form of activism. You can be an agent of change. Some people will tell you that taking action is useless, that online petitions, phone calls to representatives, and other actions won&#8217;t change a single mind, especially one that&#8217;s been convinced of something by lobbyist dollars. To those people, I repeat the words of Margaret Mead:</p>\n<blockquote><p>Never doubt that a small group of thoughtful, committed citizens can change the world. Indeed, it is the only thing that ever has.</p></blockquote>\n<p>We are not a small group. More than 60 million people use WordPress &#8212; it&#8217;s said to power <a href="http://w3techs.com/technologies/overview/content_management/all">about 15% of the web</a>. We can make an impact, and you can be an agent of change. Go to <a href="http://americancensorship.org/">Stop American Censorship</a> for more information and a bunch of ways you can take action quickly, easily, and painlessly. The Senate votes in two weeks, and we need to help at least 41 more senators see reason before then. Please. <a href="http://americancensorship.org/">Make your voice heard</a>.</p>\n<p><em>*Yes, the latest episode of Sherlock is good. Stephen Moffatt + Russell Tovey = always good</em></p>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:59:"http://wordpress.org/news/2012/01/help-stop-sopa-pipa/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:3;a:6:{s:4:"data";s:44:"\n		\n		\n		\n		\n		\n				\n		\n\n		\n		\n			\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:48:"WordPress 3.3.1 Security and Maintenance Release";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:50:"http://wordpress.org/news/2012/01/wordpress-3-3-1/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:59:"http://wordpress.org/news/2012/01/wordpress-3-3-1/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 03 Jan 2012 21:24:10 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:2:{i:0;a:5:{s:4:"data";s:8:"Releases";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:8:"Security";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:50:"http://wordpress.org/news/2012/01/wordpress-3-3-1/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:358:"WordPress 3.3.1 is now available. This maintenance release fixes 15 issues with WordPress 3.3, as well as a fix for a cross-site scripting vulnerability that affected version 3.3. Thanks to Joshua H., Hoang T., Stefan Zimmerman, Chris K., and the Go Daddy security team for responsibly disclosing the bug to our security team. Download 3.3.1 or visit [...]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:10:"Ryan Boren";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:603:"<p>WordPress 3.3.1 is now available. This maintenance release fixes <a href="http://core.trac.wordpress.org/query?status=closed&amp;resolution=fixed&amp;milestone=3.3.1&amp;group=resolution&amp;order=priority">15 issues</a> with WordPress 3.3, as well as a fix for a cross-site scripting vulnerability that affected version 3.3. Thanks to Joshua H., Hoang T., Stefan Zimmerman, Chris K., and the Go Daddy security team for responsibly disclosing the bug to our security team.</p>\n<p><a href="http://wordpress.org/download/">Download 3.3.1</a> or visit Dashboard &rarr; Updates in your site admin.</p>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:55:"http://wordpress.org/news/2012/01/wordpress-3-3-1/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:4;a:6:{s:4:"data";s:41:"\n		\n		\n		\n		\n		\n				\n\n		\n		\n			\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:25:"WordPress 3.3 “Sonny”";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:40:"http://wordpress.org/news/2011/12/sonny/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:49:"http://wordpress.org/news/2011/12/sonny/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 12 Dec 2011 22:58:50 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:1:{i:0;a:5:{s:4:"data";s:8:"Releases";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=2135";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:382:"The latest and greatest version of the WordPress software &#8212; 3.3, named &#8220;Sonny&#8221; in honor of the great jazz saxophonist Sonny Stitt &#8212; is immediately available for download or update inside your WordPress dashboard. WordPress has had over 65 million downloads since version 3.0 was released, and in this third major iteration we&#8217;ve added significant [...]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:14:"Matt Mullenweg";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:17122:"<p>The latest and greatest version of the WordPress software &#8212; 3.3, named &#8220;Sonny&#8221; in honor of the great jazz saxophonist Sonny Stitt &#8212; is <a href="http://wordpress.org/download/">immediately available for download</a> or update inside your WordPress dashboard.</p>\n<p>WordPress has had over 65 million downloads since version 3.0 was released, and in this third major iteration we&#8217;ve added significant polish around the new user experience, navigation, uploading, and imports. Check out this short video that summarizes the things we think you&#8217;ll find are the cat&#8217;s pajamas:</p>\n<div id="v-I7NAw9Zk-1" class="video-player"><embed id="v-I7NAw9Zk-1-video" src="http://s0.videopress.com/player.swf?v=1.03&amp;guid=I7NAw9Zk&amp;isDynamicSeeking=true" type="application/x-shockwave-flash" width="692" height="388" title="Introducing WordPress 3.3 &quot;Sonny&quot;" wmode="direct" seamlesstabbing="true" allowfullscreen="true" allowscriptaccess="always" overstretch="true"></embed></div>\n<h3>For Users</h3>\n<p>Experienced users will appreciate the new <strong>drag-and-drop uploader</strong>, hover menus for the navigation, the new toolbar, improved co-editing support, and the new Tumblr importer. We&#8217;ve also been thinking a ton about what the WordPress experience is like for people completely new to the software. Version 3.3 has significant improvements there with<strong> pointer tips</strong> for new features included in each update, a friendly welcome message for first-time users, and revamped help tabs throughout the interface. Finally we&#8217;ve improved the dashboard experience on the iPad and other tablets with better touch support.</p>\n<h3>For Developers</h3>\n<p>There is a ton of candy for developers as well. I&#8217;d recommend starting your exploration with the <a href="http://codex.wordpress.org/Function_Reference/wp_editor">new editor API</a>, new jQuery version, better ways to hook into the help screens, more performant post-slug-only permalinks, and of course the entire list of improvements <a href="http://codex.wordpress.org/Version_3.3">on the Codex</a> and <a href="http://core.trac.wordpress.org/milestone/3.3">in Trac</a>.</p>\n<h3>Roll the Credits</h3>\n<p>The Credits tab on the new About WordPress screen in the WordPress dashboard provides recognition for contributors to each release, but we like to thank them here as well.</p>\n<p><a href="http://profiles.wordpress.org/users/aaroncampbell">Aaron D. Campbell</a>, <a href="http://profiles.wordpress.org/users/jorbin">Aaron Jorbin</a>, <a href="http://profiles.wordpress.org/users/adambackstrom">Adam Backstrom</a>, <a href="http://profiles.wordpress.org/users/kawauso">Adam Harley</a>, <a href="http://profiles.wordpress.org/users/xknown">Alex Concha</a>, <a href="http://profiles.wordpress.org/users/alexkingorg">Alex King</a>, <a href="http://profiles.wordpress.org/users/viper007bond">Alex Mills (Viper007Bond)</a>, <a href="http://profiles.wordpress.org/users/amereservant">amereservant</a>, <a href="http://profiles.wordpress.org/users/ampt">ampt</a>, <a href="http://profiles.wordpress.org/users/lordandrei">Andrei Freeman</a>, <a href="http://profiles.wordpress.org/users/arena">Andre Renaut</a>, <a href="http://profiles.wordpress.org/users/andrewfrazier">andrewfrazier</a>, <a href="http://profiles.wordpress.org/users/nacin">Andrew Nacin</a>, <a href="http://profiles.wordpress.org/users/azaozz">Andrew Ozz</a>, <a href="http://profiles.wordpress.org/users/andrewryno">Andrew Ryno</a>, <a href="http://profiles.wordpress.org/users/andy">Andy Skelton</a>, <a href="http://profiles.wordpress.org/users/lumination">Anthony Atkinson</a>, <a href="http://profiles.wordpress.org/users/filosofo">Austin Matzko</a>, <a href="http://profiles.wordpress.org/users/simek">Bartosz Kaszubowski</a>, <a href="http://profiles.wordpress.org/users/benbalter">Benjamin J. Balter</a>, <a href="http://profiles.wordpress.org/users/brandondove">Brandon Dove</a>, <a href="http://profiles.wordpress.org/users/carlospaulino">carlospaulino</a>, <a href="http://profiles.wordpress.org/users/caspie">Caspie</a>, <a href="http://profiles.wordpress.org/users/cebradesign">cebradesign</a>, <a href="http://profiles.wordpress.org/users/chexee">Chelsea Otakan</a>, <a href="http://profiles.wordpress.org/users/chipbennett">Chip Bennett</a>, <a href="http://profiles.wordpress.org/users/chrisbliss18">Chris Jean</a>, <a href="http://profiles.wordpress.org/users/coenjacobs">Coen Jacobs</a>, <a href="http://profiles.wordpress.org/users/cgrymala">Curtiss Grymala</a>, <a href="http://profiles.wordpress.org/users/danielbachhuber">Daniel Bachhuber</a>, <a href="http://profiles.wordpress.org/users/koopersmith">Daryl Koopersmith</a>, <a href="http://profiles.wordpress.org/users/dllh">Daryl L. L. Houston</a>, <a href="http://profiles.wordpress.org/users/davecpage">David</a>, <a href="http://profiles.wordpress.org/users/dcowgill">David Cowgill</a>, <a href="http://profiles.wordpress.org/users/dgwyer">David Gwyer</a>, <a href="http://profiles.wordpress.org/users/damst">Da^MsT</a>, <a href="http://profiles.wordpress.org/users/deltafactory">deltafactory</a>, <a href="http://profiles.wordpress.org/users/demetris">demetris</a>, <a href="http://profiles.wordpress.org/users/valendesigns">Derek Herman</a>, <a href="http://profiles.wordpress.org/users/devinreams">Devin Reams</a>, <a href="http://profiles.wordpress.org/users/adeptris">Digital Raindrops</a>, <a href="http://profiles.wordpress.org/users/dd32">Dion Hulse (@dd32)</a>, <a href="http://profiles.wordpress.org/users/ocean90">Dominik Schilling (ocean90)</a>, <a href="http://profiles.wordpress.org/users/dougwrites">Doug Provencio</a>, <a href="http://profiles.wordpress.org/users/dragoonis">dragoonis</a>, <a href="http://profiles.wordpress.org/users/drewapicture">DrewAPicture</a>, <a href="http://profiles.wordpress.org/users/cyberhobo">Dylan Kuhn</a>, <a href="http://profiles.wordpress.org/users/eduplessis">eduplessis</a>, <a href="http://profiles.wordpress.org/users/eightamrock">Eightamrock</a>, <a href="http://profiles.wordpress.org/users/eko-fr">eko-fr</a>, <a href="http://profiles.wordpress.org/users/elpie">Elpie</a>, <a href="http://profiles.wordpress.org/users/elyobo">elyobo</a>, <a href="http://profiles.wordpress.org/users/empireoflight">Empireoflight</a>, <a href="http://profiles.wordpress.org/users/ethitter">Erick Hitter</a>, <a href="http://profiles.wordpress.org/users/ericmann">Eric Mann</a>, <a href="http://profiles.wordpress.org/users/ejdanderson">Evan Anderson</a>, <a href="http://profiles.wordpress.org/users/evansolomon">Evan Solomon</a>, <a href="http://profiles.wordpress.org/users/fonglh">fonglh</a>, <a href="http://profiles.wordpress.org/users/garyc40">garyc40</a>, <a href="http://profiles.wordpress.org/users/garyj">Gary Jones</a>, <a href="http://profiles.wordpress.org/users/logiclord">Gaurav Aggarwal</a>, <a href="http://profiles.wordpress.org/users/georgestephanis">George Stephanis</a>, <a href="http://profiles.wordpress.org/users/goldenapples">goldenapples</a>, <a href="http://profiles.wordpress.org/users/goto10">goto10</a>, <a href="http://profiles.wordpress.org/users/hakre">hakre</a>, <a href="http://profiles.wordpress.org/users/helenyhou">Helen Hou-Sandi</a>, <a href="http://profiles.wordpress.org/users/iandstewart">Ian Stewart</a>, <a href="http://profiles.wordpress.org/users/ipstenu">Ipstenu</a>, <a href="http://profiles.wordpress.org/users/madjax">Jackson</a>, <a href="http://profiles.wordpress.org/users/jacobwg">Jacob Gillespie</a>, <a href="http://profiles.wordpress.org/users/jakemgold">Jake Goldman</a>, <a href="http://profiles.wordpress.org/users/jamescollins">James Collins</a>, <a href="http://profiles.wordpress.org/users/jane">Jane Wells</a>, <a href="http://profiles.wordpress.org/users/jeremyclarke">jeremyclarke</a>, <a href="http://profiles.wordpress.org/users/jayjdk">Jesper Johansen (Jayjdk)</a>, <a href="http://profiles.wordpress.org/users/jgadbois">jgadbois</a>, <a href="http://profiles.wordpress.org/users/jick">Jick</a>, <a href="http://profiles.wordpress.org/users/joehoyle">Joe Hoyle</a>, <a href="http://profiles.wordpress.org/users/johnbillion">John Blackbourn</a>, <a href="http://profiles.wordpress.org/users/vegasgeek">John Hawkins</a>, <a href="http://profiles.wordpress.org/users/johnjamesjacoby">John James Jacoby</a>, <a href="http://profiles.wordpress.org/users/johnonolan">JohnONolan</a>, <a href="http://profiles.wordpress.org/users/johnpbloch">John P. Bloch</a>, <a href="http://profiles.wordpress.org/users/duck_">Jon Cave</a>, <a href="http://profiles.wordpress.org/users/koke">Jorge Bernal</a>, <a href="http://profiles.wordpress.org/users/josephscott">Joseph Scott</a>, <a href="http://profiles.wordpress.org/users/jtclarke">jtclarke</a>, <a href="http://profiles.wordpress.org/users/yuraz">Jurica Zuanovic</a>, <a href="http://profiles.wordpress.org/users/justindgivens">Justin Givens</a>, <a href="http://profiles.wordpress.org/users/justinsainton">Justin Sainton</a>, <a href="http://profiles.wordpress.org/users/trepmal">Kailey Lampert (trepmal)</a>, <a href="http://profiles.wordpress.org/users/kevinb">kevinB</a>, <a href="http://profiles.wordpress.org/users/kitchin">kitchin</a>, <a href="http://profiles.wordpress.org/users/kovshenin">Konstantin Kovshenin</a>, <a href="http://profiles.wordpress.org/users/tenpura">Kuraishi</a>, <a href="http://profiles.wordpress.org/users/kurtpayne">Kurt Payne</a>, <a href="http://profiles.wordpress.org/users/lancewillett">Lance Willett</a>, <a href="http://profiles.wordpress.org/users/latz">Latz</a>, <a href="http://profiles.wordpress.org/users/linuxologos">linuxologos</a>, <a href="http://profiles.wordpress.org/users/lloydbudd">Lloyd Budd</a>, <a href="http://profiles.wordpress.org/users/ldebrouwer">Luc De Brouwer</a>, <a href="http://profiles.wordpress.org/users/lukeschlather">lukeschlather</a>, <a href="http://profiles.wordpress.org/users/mako09">Mako</a>, <a href="http://profiles.wordpress.org/users/settle">Mantas Malcius</a>, <a href="http://profiles.wordpress.org/users/marcuspope">MarcusPope</a>, <a href="http://profiles.wordpress.org/users/mark-k">mark-k</a>, <a href="http://profiles.wordpress.org/users/markjaquith">Mark Jaquith</a>, <a href="http://profiles.wordpress.org/users/markmcwilliams">Mark McWilliams</a>, <a href="http://profiles.wordpress.org/users/markoheijnen">Marko Heijnen</a>, <a href="http://profiles.wordpress.org/users/tfnab">Martin Lormes</a>, <a href="http://profiles.wordpress.org/users/masonjames">masonjames</a>, <a href="http://profiles.wordpress.org/users/matveb">Matias Ventura</a>, <a href="http://profiles.wordpress.org/users/matt">Matt Mullenweg</a>, <a href="http://profiles.wordpress.org/users/iammattthomas">Matt Thomas</a>, <a href="http://profiles.wordpress.org/users/mattwiebe">Matt Wiebe</a>, <a href="http://profiles.wordpress.org/users/mattyrob">MattyRob</a>, <a href="http://profiles.wordpress.org/users/merty">Mert Yazicioglu</a>, <a href="http://profiles.wordpress.org/users/mdawaffe">Michael Adams (mdawaffe)</a>, <a href="http://profiles.wordpress.org/users/mfields">Michael Fields</a>, <a href="http://profiles.wordpress.org/users/mau">Michal &#8220;Mau&#8221; Pliska</a>, <a href="http://profiles.wordpress.org/users/mbijon">Mike Bijon</a>, <a href="http://profiles.wordpress.org/users/dh-shredder">Mike Schroder</a>, <a href="http://profiles.wordpress.org/users/dimadin">Milan Dinic</a>, <a href="http://profiles.wordpress.org/users/mitchoyoshitaka">mitchoyoshitaka</a>, <a href="http://profiles.wordpress.org/users/batmoo">Mohammad Jangda</a>, <a href="http://profiles.wordpress.org/users/mhauan">Morten Hauan</a>, <a href="http://profiles.wordpress.org/users/usermrpapa">Mr Papa</a>, <a href="http://profiles.wordpress.org/users/mrtorrent">mrtorrent</a>, <a href="http://profiles.wordpress.org/users/Nao">Naoko McCracken</a>, <a href="http://profiles.wordpress.org/users/natebedortha">natebedortha</a>, <a href="http://profiles.wordpress.org/users/nbachiyski">Nikolay Bachiyski</a>, <a href="http://profiles.wordpress.org/users/olivm">olivM</a>, <a href="http://profiles.wordpress.org/users/olleicua">olleicua</a>, <a href="http://profiles.wordpress.org/users/otto42">Otto</a>, <a href="http://profiles.wordpress.org/users/pagesimplify">pagesimplify</a>, <a href="http://profiles.wordpress.org/users/paulhastings0">paulhastings0</a>, <a href="http://profiles.wordpress.org/users/pavelevap">pavelevap</a>, <a href="http://profiles.wordpress.org/users/petemall">pete.mall</a>, <a href="http://profiles.wordpress.org/users/westi">Peter Westwood</a>, <a href="http://profiles.wordpress.org/users/peterwilsoncc">peterwilsoncc</a>, <a href="http://profiles.wordpress.org/users/ppaire">ppaire</a>, <a href="http://profiles.wordpress.org/users/ptahdunbar">Ptah Dunbar</a>, <a href="http://profiles.wordpress.org/users/r-a-y">r-a-y</a>, <a href="http://profiles.wordpress.org/users/ramiy">Rami Y</a>, <a href="http://profiles.wordpress.org/users/rasheed">Rasheed Bydousi</a>, <a href="http://profiles.wordpress.org/users/miqrogroove">Robert Chapin (miqrogroove)</a>, <a href="http://profiles.wordpress.org/users/wpmuguru">Ron Rennick</a>, <a href="http://profiles.wordpress.org/users/rosshanney">Ross Hanney</a>, <a href="http://profiles.wordpress.org/users/ruslany">ruslany</a>, <a href="http://profiles.wordpress.org/users/ryan">Ryan Boren</a>, <a href="http://profiles.wordpress.org/users/ryanhellyer">ryanhellyer</a>, <a href="http://profiles.wordpress.org/users/ryanimel">Ryan Imel</a>, <a href="http://profiles.wordpress.org/users/zeo">Safirul Alredha</a>, <a href="http://profiles.wordpress.org/users/solarissmoke">Samir Shah</a>, <a href="http://profiles.wordpress.org/users/gluten">Sam Margulies</a>, <a href="http://profiles.wordpress.org/users/saracannon">saracannon</a>, <a href="http://profiles.wordpress.org/users/scottbasgaard">Scott Basgaard</a>, <a href="http://profiles.wordpress.org/users/sbressler">Scott Bressler</a>, <a href="http://profiles.wordpress.org/users/l3rady">Scott Cariss</a>, <a href="http://profiles.wordpress.org/users/scottconnerly">scottconnerly</a>, <a href="http://profiles.wordpress.org/users/coffee2code">Scott Reilly</a>, <a href="http://profiles.wordpress.org/users/wonderboymusic">Scott Taylor</a>, <a href="http://profiles.wordpress.org/users/scribu">scribu</a>, <a href="http://profiles.wordpress.org/users/sergeybiryukov">Sergey Biryukov</a>, <a href="http://profiles.wordpress.org/users/designsimply">Sheri Bigelow</a>, <a href="http://profiles.wordpress.org/users/simonwheatley">Simon Wheatley</a>, <a href="http://profiles.wordpress.org/users/sirzooro">sirzooro</a>, <a href="http://profiles.wordpress.org/users/sillybean">Stephanie Leary</a>, <a href="http://profiles.wordpress.org/users/tech163">tech163</a>, <a href="http://profiles.wordpress.org/users/thedeadmedic">TheDeadMedic</a>, <a href="http://profiles.wordpress.org/users/tmoorewp">Tim Moore</a>, <a href="http://profiles.wordpress.org/users/tomauger">Tom Auger</a>, <a href="http://profiles.wordpress.org/users/ansimation">Travis Ballard</a>, <a href="http://profiles.wordpress.org/users/sorich87">Ulrich Sossou</a>, <a href="http://profiles.wordpress.org/users/vnsavage">vnsavage</a>, <a href="http://profiles.wordpress.org/users/wpweaver">wpweaver</a>, <a href="http://profiles.wordpress.org/users/wraithkenny">WraithKenny</a>, <a href="http://profiles.wordpress.org/users/yoavf">Yoav Farhi</a>, and <a href="http://profiles.wordpress.org/users/vanillalounge">Ze Fontainhas</a>.</p>\n<p>As well, we&#8217;d like to give a shout out to these users who have been particularly active <a href="http://wordpress.org/support/">on the support forums</a> since the release of 3.2:</p>\n<p><a href="http://profiles.wordpress.org/users/alchymyth">alchymyth</a>, <a href="http://profiles.wordpress.org/users/andrea_r">Andrea_r</a>, <a href="http://profiles.wordpress.org/users/claytonjames">ClaytonJames</a>, <a href="http://profiles.wordpress.org/users/numeeja">cubecolour</a>, <a href="http://profiles.wordpress.org/users/eranmiller">Eran Miller</a>, <a href="http://profiles.wordpress.org/users/esmi">esmi</a>, <a href="http://profiles.wordpress.org/users/fredericktownes">Frederick Townes</a>, <a href="http://profiles.wordpress.org/users/govpatel">govpatel</a>, <a href="http://profiles.wordpress.org/users/ipstenu">Ipstenu</a>, <a href="http://profiles.wordpress.org/users/keesiemeijer">keesiemeijer</a>, <a href="http://profiles.wordpress.org/users/kmessinger">kmessinger</a>, <a href="http://profiles.wordpress.org/users/netweblogic">Marcus</a>, <a href="http://profiles.wordpress.org/users/otto42">Otto</a>, <a href="http://profiles.wordpress.org/users/peredur">peredur</a>, <a href="http://profiles.wordpress.org/users/rvoodoo">Rev. Voodoo</a>, <a href="http://profiles.wordpress.org/users/samboll">Samuel B</a>, <a href="http://profiles.wordpress.org/users/tobiasbg">Tobias</a>, <a href="http://profiles.wordpress.org/users/vtxyzzy">vtxyzzy</a>, and <a href="http://profiles.wordpress.org/users/zoonini">zoonini</a>.</p>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:45:"http://wordpress.org/news/2011/12/sonny/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:5;a:6:{s:4:"data";s:44:"\n		\n		\n		\n		\n		\n				\n		\n\n		\n		\n			\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:33:"WordPress 3.3 Release Candidate 3";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:52:"http://wordpress.org/news/2011/12/wordpress-3-3-rc3/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:61:"http://wordpress.org/news/2011/12/wordpress-3-3-rc3/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sun, 11 Dec 2011 00:27:32 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:2:{i:0;a:5:{s:4:"data";s:11:"Development";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:8:"Releases";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=2130";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:364:"The third (and hopefully final!) release candidate for WordPress 3.3 is now available. Since RC2, we&#8217;ve done a handful of last-minute tweaks and bugfixes that we felt were necessary. Our goal is to release version 3.3 early next week, so plugin and theme authors, this is your last pre-release chance to  test your plugins and themes  to find any [...]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:10:"Jane Wells";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:1726:"<p>The third (and hopefully final!) release candidate for WordPress 3.3 is now available. Since RC2, we&#8217;ve done <a href="http://core.trac.wordpress.org/log/trunk/?action=stop_on_copy&amp;mode=stop_on_copy&amp;rev=19587&amp;stop_rev=19568&amp;limit=100">a handful of last-minute tweaks and bugfixes</a> that we felt were necessary.</p>\n<p>Our goal is to release version 3.3 early next week, so <strong>plugin and theme authors, this is your last pre-release chance to  test your plugins and themes </strong> to find any compatibility issues before the final release. We&#8217;ve published <a href="http://wpdevel.wordpress.com/tag/3-3-dev-notes/">a number of posts</a> on the development blog that explain important things you need to know as you prepare for WordPress 3.3. Please review this information immediately if you have not done so already.</p>\n<p>If you think you&#8217;ve found a bug, you can post to the <a href="http://wordpress.org/support/forum/alphabeta">Alpha/Beta area</a> in the support forums. Or, if you&#8217;re comfortable writing a reproducible bug report, file one on <a href="http://core.trac.wordpress.org/">WordPress Trac</a>. Known issues that crop up will be listed <a href="http://core.trac.wordpress.org/report/6">here</a>, but let&#8217;s all keep our fingers crossed for a quiet Sunday so we can get these new features into your hands early next week!</p>\n<p><em>To test WordPress 3.3, try the <a href="http://wordpress.org/extend/plugins/wordpress-beta-tester/">WordPress Beta Tester plugin</a> (you’ll want &#8220;bleeding edge nightlies&#8221;). Or you can <a href="http://wordpress.org/wordpress-3.3-RC3.zip">download the release candidate here</a> (zip).</em></p>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:57:"http://wordpress.org/news/2011/12/wordpress-3-3-rc3/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:6;a:6:{s:4:"data";s:41:"\n		\n		\n		\n		\n		\n				\n\n		\n		\n			\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:21:"Core Team Meetup Time";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:56:"http://wordpress.org/news/2011/12/core-team-meetup-time/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:65:"http://wordpress.org/news/2011/12/core-team-meetup-time/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sun, 11 Dec 2011 00:06:56 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:1:{i:0;a:5:{s:4:"data";s:9:"Community";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=2127";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:352:"It&#8217;s almost that time again, when the WordPress core development team gets together in person to review the year&#8217;s progress and talk about priorities for the coming year. Next week Matt Mullenweg, Mark Jaquith, Peter Westwood, Andrew Ozz, Andrew Nacin, Dion Hulse, Daryl Koopersmith, Jon Cave, and I will meet at Tybee Island, GA, the [...]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:10:"Jane Wells";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:2152:"<p>It&#8217;s almost that time again, when the WordPress core development team gets together in person to review the year&#8217;s progress and talk about priorities for the coming year. Next week <a href="http://profiles.wordpress.org/users/matt">Matt Mullenweg</a>, <a href="http://profiles.wordpress.org/users/markjaquith">Mark Jaquith</a>, <a href="http://profiles.wordpress.org/users/westi">Peter Westwood</a>, <a href="http://profiles.wordpress.org/users/azaozz">Andrew Ozz</a>, <a href="http://profiles.wordpress.org/users/nacin">Andrew Nacin</a>, <a href="http://profiles.wordpress.org/users/dd32">Dion Hulse</a>, <a href="http://profiles.wordpress.org/users/koopersmith">Daryl Koopersmith</a>, <a href="http://profiles.wordpress.org/users/duck_">Jon Cave</a>, and <a href="http://profiles.wordpress.org/users/jane">I</a> will meet at Tybee Island, GA, the same location as the last meetup.</p>\n<p>Last year we wanted to do a video town hall, but ran into technical and scheduling difficulties. This year we&#8217;re planning ahead, and will definitely make it happen. <a title="Questions thread" href="http://wordpress.org/support/topic/core-dev-team-meetup-qa">We&#8217;re currently taking questions</a>, and will record a series of town hall-style videos where we answer your questions. Ask about the roadmap, code, community, contributing, WordCamps, meetups, themes, plugins, features, you name it. No topic (as long as it is about WordPress) is off limits, and we&#8217;ll do our best to answer as many questions as we can while we are together. The videos will be posted to this blog and archived at <a href="http://wordpress.tv">WordPress.tv</a>.</p>\n<p>Last year the people who were in attendance also posted pictures and updates to Twitter using the <a title="#wptybee on Twitter" href="https://twitter.com/#!/search?q=%23wptybee">#wptybee</a> tag. We&#8217;ll use the same tag this year, so if you&#8217;re interested in following along, add it to your Twitter client as a search.</p>\n<p>What do you want to know from us? <a title="Questions thread" href="http://wordpress.org/support/topic/core-dev-team-meetup-qa">Ask away</a>!</p>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:61:"http://wordpress.org/news/2011/12/core-team-meetup-time/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:7;a:6:{s:4:"data";s:44:"\n		\n		\n		\n		\n		\n				\n		\n\n		\n		\n			\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:33:"WordPress 3.3 Release Candidate 2";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:68:"http://wordpress.org/news/2011/12/wordpress-3-3-release-candidate-2/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:77:"http://wordpress.org/news/2011/12/wordpress-3-3-release-candidate-2/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 07 Dec 2011 06:26:57 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:2:{i:0;a:5:{s:4:"data";s:11:"Development";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:8:"Releases";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=2119";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:349:"The second release candidate for WordPress 3.3 is now available! As the first release candidate was well-received, we think we&#8217;re really close to a final release. Primarily, we&#8217;ve ensured that new toolbar (the admin bar in 3.2) has a consistent appearance across all browsers, and the API for developers is now final. You can check [...]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:12:"Andrew Nacin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:2123:"<p>The second release candidate for WordPress 3.3 is now available!</p>\n<p>As the first release candidate was well-received, we think we&#8217;re <em>really</em> close to a final release. Primarily, we&#8217;ve ensured that new toolbar (the admin bar in 3.2) has a consistent appearance across all browsers, and the API for developers is now final. You can check our bug tracker for the <a href="http://core.trac.wordpress.org/log/trunk?action=stop_on_copy&amp;mode=stop_on_copy&amp;rev=19567&amp;stop_rev=19531&amp;limit=100&amp;verbose=on">complete list of changes</a>.</p>\n<p><strong>Plugin and theme authors, please test your plugins and themes now</strong>, so that if there is a compatibility issue, we can figure it out before the final release. On our development blog, we&#8217;ve published <a href="http://wpdevel.wordpress.com/tag/3-3-dev-notes/">a number of posts</a> that explain important things you need to know as you prepare for WordPress 3.3.</p>\n<p>If you haven’t tested WordPress 3.3 yet, now is the time — please though, not on your live site unless you’re adventurous. Once you install RC2, you can visit About WordPress page (hover over the WordPress logo in the top left) to see an overview of what&#8217;s to come in WordPress 3.3 (and what to test, of course).</p>\n<p>If you think you&#8217;ve found a bug, you can post to the <a href="http://wordpress.org/support/forum/alphabeta">Alpha/Beta area</a> in the support forums. Or, if you&#8217;re comfortable writing a reproducible bug report, file one on <a href="http://core.trac.wordpress.org/">WordPress Trac</a>. Known issues that crop up will be listed <a href="http://core.trac.wordpress.org/report/6">here</a>.</p>\n<p>Enjoy!</p>\n<p><em>To test WordPress 3.3, try the <a href="http://wordpress.org/extend/plugins/wordpress-beta-tester/">WordPress Beta Tester plugin</a> (you’ll want &#8220;bleeding edge nightlies&#8221;). Or you can <a href="http://wordpress.org/wordpress-3.3-RC2.zip">download the release candidate here</a> (zip).</em></p>\n<p>Sometimes time slows down<br />\nbetween releases &#8211; like now<br />\nThis is RC2</p>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:73:"http://wordpress.org/news/2011/12/wordpress-3-3-release-candidate-2/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:8;a:6:{s:4:"data";s:41:"\n		\n		\n		\n		\n		\n				\n\n		\n		\n			\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:33:"WordPress 3.3 Release Candidate 1";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:68:"http://wordpress.org/news/2011/12/wordpress-3-3-release-candidate-1/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:77:"http://wordpress.org/news/2011/12/wordpress-3-3-release-candidate-1/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 01 Dec 2011 05:55:08 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:1:{i:0;a:5:{s:4:"data";s:8:"Releases";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=2113";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:334:"Release Candidate stage means we think we&#8217;re done and are about ready to launch this version, but are doing one last check before we officially call it. So take a look, and as always, please check your themes and plugins for compatibility if you&#8217;re a developer. Stayed up late tonight, Hammering toward RC1. Now with [...]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:10:"Ryan Boren";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:475:"<p>Release Candidate stage means we think we&#8217;re done and are about ready to launch this version, but are doing one last check before we officially call it. So take a look, and as always, please check your themes and plugins for compatibility if you&#8217;re a developer.</p>\n<p>Stayed up late tonight,<br />\nHammering toward RC1.<br />\nNow with more icons!</p>\n<p><a href="http://wordpress.org/wordpress-3.3-RC1.zip">Download WordPress 3.3 Release Candidate 1</a>.</p>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:73:"http://wordpress.org/news/2011/12/wordpress-3-3-release-candidate-1/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:9;a:6:{s:4:"data";s:41:"\n		\n		\n		\n		\n		\n				\n\n		\n		\n			\n			\n		\n		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:34:"WordPress 3.3 Beta 4 Available Now";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:55:"http://wordpress.org/news/2011/11/wordpress-3-3-beta-4/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:64:"http://wordpress.org/news/2011/11/wordpress-3-3-beta-4/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 24 Nov 2011 01:44:28 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:1:{i:0;a:5:{s:4:"data";s:8:"Releases";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=2106";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:312:"The march toward 3.3 continues! With all our major tickets closed, we are very close to a release candidate. In Beta 4 we&#8217;ve fixed a bunch of bugs, cleaned up the UI, added real text in some of the screens that still had placeholder text in Beta 3 (post-update screen, the Dashboard welcome area, new [...]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:10:"Jane Wells";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:817:"<p>The march toward 3.3 continues!</p>\n<p>With all our major tickets closed, we are very close to a release candidate. In Beta 4 we&#8217;ve fixed a bunch of bugs, cleaned up the UI, added real text in some of the screens that still had placeholder text in Beta 3 (post-update screen, the Dashboard welcome area, new feature pointers), and generally tightened things up. We updated to jQuery 1.7.1 and addressed a LOT of bugs.</p>\n<p>If you are a plugin or theme developer (or distributor), please test against Beta 4 to ensure there are no issues.</p>\n<p>If you find any problems, please report them as usual. Many thanks!</p>\n<p>Thought 3 was the last?<br />\nHa ha! Beta 4 is here &#8211;<br />\nBetter get testing!</p>\n<p><a href="http://wordpress.org/wordpress-3.3-beta4.zip">Download WordPress 3.3 Beta 4</a></p>\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:60:"http://wordpress.org/news/2011/11/wordpress-3-3-beta-4/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}s:27:"http://www.w3.org/2005/Atom";a:1:{s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:0:"";s:7:"attribs";a:1:{s:0:"";a:3:{s:4:"href";s:31:"http://wordpress.org/news/feed/";s:3:"rel";s:4:"self";s:4:"type";s:19:"application/rss+xml";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:44:"http://purl.org/rss/1.0/modules/syndication/";a:2:{s:12:"updatePeriod";a:1:{i:0;a:5:{s:4:"data";s:6:"hourly";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:15:"updateFrequency";a:1:{i:0;a:5:{s:4:"data";s:1:"1";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}}}}}}s:4:"type";i:128;s:7:"headers";a:8:{s:6:"server";s:5:"nginx";s:4:"date";s:29:"Mon, 13 Feb 2012 12:46:02 GMT";s:12:"content-type";s:23:"text/xml; charset=UTF-8";s:10:"connection";s:5:"close";s:4:"vary";s:15:"Accept-Encoding";s:10:"x-pingback";s:36:"http://wordpress.org/news/xmlrpc.php";s:13:"last-modified";s:29:"Mon, 30 Jan 2012 17:05:16 GMT";s:4:"x-nc";s:11:"HIT luv 139";}s:5:"build";s:14:"20090627192103";}', 'no'),
(939, 0, '_transient_timeout_feed_mod_867bd5c64f85878d03a060509cd2f92c', '1329180362', 'no'),
(940, 0, '_transient_feed_mod_867bd5c64f85878d03a060509cd2f92c', '1329137162', 'no'),
(941, 0, '_transient_timeout_dash_aa95765b5cc111c56d5993d476b1c2f0', '1329180362', 'no'),
(942, 0, '_transient_dash_aa95765b5cc111c56d5993d476b1c2f0', '<div class="rss-widget"><ul><li><a class=''rsswidget'' href=''http://buddypress.org/2012/02/buddypress-1-5-4/'' title=''Available immediately is BuddyPress 1.5.4. This is a bug fix release that will prevent your members from inviting friends to groups they are already members of (say that three times fast.) It is a recommended update for all existing BuddyPress 1.5 and WordPress 3.3 installations. Download BuddyPress 1.5.4 from WordPress Extend or BuddyPress.org. [&hellip;]''>BuddyPress: BuddyPress 1.5.4</a></li><li><a class=''rsswidget'' href=''http://feedproxy.google.com/~r/weblogtoolscollection/UXMP/~3/-nPi9dNqFyk/'' title=''New plugins Compact Taxonomy Checkboxes allows you to collapse and reduce the height of hierarchical category and taxonomy panels in the WordPress admin. Google Places is designed specifically for Business owners to help optimize their business listing on Google Search, Places, and Earth. Makeuptor allows you to add theme decorations, social network icons or [&hellip;]''>Weblog Tools Collection: WordPress Plugin Releases for 2/11</a></li><li><a class=''rsswidget'' href=''http://feedproxy.google.com/~r/WordpressTavern/~3/6BqEBTTIDLs/update-on-my-use-of-limit-login-attempts'' title=''Alex who also goes by Viperbond007 has recently installed Limit Login Attempts on his personal blog because someone is trying to brute force their way into his site. I’ve mentioned this plugin before and his post reminded me that I should probably give you all an update as to the results I’ve seen over the past few months. Since January 1st, 2012 there have  [&hellip;]''>WPTavern: Update On My Use Of Limit Login Attempts</a></li><li><a class=''rsswidget'' href=''http://wordpress.tv/2012/02/10/rick-radko-dont-just-paste-this-code-in-your-functions-php/'' title='' [&hellip;]''>WordPress.tv: Rick Radko: Don’t ‘Just paste this code in your functions.php’</a></li><li><a class=''rsswidget'' href=''http://feedproxy.google.com/~r/WordpressTavern/~3/7c1kIqBUnVk/ian-stewarts-predictions-on-wordpress-themes-for-2012'' title=''Ian Stewart shared some of his predictions as they relate to WordPress themes for 2012. His thoughts on Lighter themes as well as themes getting rid of the useless options are spot on. It’s a trend that’s made headway since the beginning of 2012 and it will only continue during the rest of the year. I’m not quite sure about his thoughts on using the default  [&hellip;]''>WPTavern: Ian Stewarts Predictions On WordPress Themes For 2012</a></li></ul></div>', 'no'),
(937, 0, '_transient_timeout_feed_867bd5c64f85878d03a060509cd2f92c', '1329180362', 'no'),
(938, 0, '_transient_feed_867bd5c64f85878d03a060509cd2f92c', 'a:4:{s:5:"child";a:1:{s:0:"";a:1:{s:3:"rss";a:1:{i:0;a:6:{s:4:"data";s:3:"\n\n\n";s:7:"attribs";a:1:{s:0:"";a:1:{s:7:"version";s:3:"2.0";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:1:{s:7:"channel";a:1:{i:0;a:6:{s:4:"data";s:61:"\n	\n	\n	\n	\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:16:"WordPress Planet";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:28:"http://planet.wordpress.org/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"language";a:1:{i:0;a:5:{s:4:"data";s:2:"en";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:47:"WordPress Planet - http://planet.wordpress.org/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"item";a:50:{i:0;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:28:"BuddyPress: BuddyPress 1.5.4";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"http://buddypress.org/?p=1835";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:47:"http://buddypress.org/2012/02/buddypress-1-5-4/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:563:"<p>Available immediately is <a title="Download BuddyPress" href="http://wordpress.org/extend/plugins/buddypress/">BuddyPress 1.5.4</a>. This is a bug fix release that will prevent your members from inviting friends to groups they are already members of (say that three times fast.) It is a recommended update for all existing BuddyPress 1.5 and WordPress 3.3 installations.</p>\n<p>Download BuddyPress 1.5.4 from <a href="http://wordpress.org/extend/plugins/buddypress/">WordPress Extend</a> or <a href="http://buddypress.org/download/">BuddyPress.org.</a></p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 11 Feb 2012 22:17:56 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:17:"John James Jacoby";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:1;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:59:"Weblog Tools Collection: WordPress Plugin Releases for 2/11";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"http://weblogtoolscollection.com/?p=11028";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:73:"http://feedproxy.google.com/~r/weblogtoolscollection/UXMP/~3/-nPi9dNqFyk/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1603:"<h3>New plugins</h3>\n<p><a href="http://wordpress.org/extend/plugins/compact-taxonomy-checkboxes/"><strong>Compact Taxonomy Checkboxes</strong></a> allows you to collapse and reduce the height of hierarchical category and taxonomy panels in the WordPress admin.</p>\n<p><a href="http://wordpress.org/extend/plugins/google-places/"><strong>Google Places</strong></a> is designed specifically for Business owners to help optimize their business listing on Google Search, Places, and Earth.</p>\n<p><a href="http://wordpress.org/extend/plugins/makeuptor/"><strong>Makeuptor</strong></a> allows you to add theme decorations, social network icons or various labels and tags in just two clicks.</p>\n<p><a href="http://www.shortcodepress.com/"><strong>Shortcode Press</strong></a> allows you to easily insert message boxes, buttons, videos, and highlighted text into your WordPress posts and pages.</p>\n<p><a href="http://wordpress.org/extend/plugins/token-manager/"><strong>Token Manager</strong></a> allows web developers to program PHP, HTML, CSS and JavaScript into tokens that can be used throughout WordPress.</p>\n<h3>Updated plugins</h3>\n<p><a href="http://wpmarketplaceplugin.com/"><strong>WP Marketplace</strong></a> is all you need to build your own marketplace.</p>\n<p><a href="http://wordpress.org/extend/plugins/wp-stripe/"><strong>WP Stripe</strong></a> provides a payment form and recent donor widget by utilizing <a href="https://stripe.com/">Stripe.com</a>, an alternative to PayPal.</p>\n<img src="http://feeds.feedburner.com/~r/weblogtoolscollection/UXMP/~4/-nPi9dNqFyk" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 11 Feb 2012 14:00:08 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:5:"James";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:2;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:50:"WPTavern: Update On My Use Of Limit Login Attempts";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:31:"http://www.wptavern.com/?p=6262";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:102:"http://feedproxy.google.com/~r/WordpressTavern/~3/6BqEBTTIDLs/update-on-my-use-of-limit-login-attempts";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:2348:"<p>Alex who also goes by Viperbond007 has <a href="http://www.viper007bond.com/2012/02/09/plugin-recommendation-limit-login-attempts/">recently installed</a> Limit Login Attempts on his personal blog because someone is trying to brute force their way into his site. I&#8217;ve <a href="http://www.wptavern.com/review-of-the-limit-login-attempts-plugin">mentioned this plugin before</a> and his post reminded me that I should probably give you all an update as to the results I&#8217;ve seen over the past few months. </p>\n<p>Since January 1st, 2012 there have been 75 email notifications sent to my inbox letting me know of an IP address that failed to login to the back-end of WPTavern three times in a row. In almost every case, the notifications look like the following with the IP address being different.</p>\n<blockquote><p>3 failed login attempts (1 lockout(s)) from IP: 78.29.15.137</p>\n<p>Last user attempted: admin</p>\n<p>IP was blocked for 20 minutes</p></blockquote>\n<p>There have only been a few times when Webmaster and even fewer with Jeffro as the attempted username. I receive multiple notifications every day with some spurts of 3-4 different IP addresses failing to login. I have no idea if these are real people or bots trying to login but thankfully, Limit Login Attempts is keeping me abreast of all the failed attempts. It&#8217;s definitely a plugin you should consider installing for the sake of monitoring the activity of failed login attempts. This is also a reminder that if you are using <strong>admin</strong> as your administrative username or have that username within the Administrator role, you&#8217;re begging for trouble. </p>\n<p>Related posts:<ol>\n<li><a href="http://www.wptavern.com/so-far-so-good-with-limit-login-attempts" rel="bookmark" title="So Far So Good With Limit Login Attempts">So Far So Good With Limit Login Attempts</a></li>\n<li><a href="http://www.wptavern.com/ajax-edit-comments-gets-a-minor-update" rel="bookmark" title="Ajax Edit Comments Gets A Minor Update">Ajax Edit Comments Gets A Minor Update</a></li>\n<li><a href="http://www.wptavern.com/scott-reilly-doing-the-update-dance" rel="bookmark" title="Scott Reilly Doing The Update Dance">Scott Reilly Doing The Update Dance</a></li>\n</ol></p><img src="http://feeds.feedburner.com/~r/WordpressTavern/~4/6BqEBTTIDLs" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 11 Feb 2012 01:00:29 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:6:"Jeffro";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:3;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:82:"WordPress.tv: Rick Radko: Don’t ‘Just paste this code in your functions.php’";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:27:"http://wordpress.tv/?p=9085";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:90:"http://wordpress.tv/2012/02/10/rick-radko-dont-just-paste-this-code-in-your-functions-php/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1915:"<div id="v-ng3QXp1x-1" class="video-player">\n</div>\n<br />  <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gocomments/wptv.wordpress.com/9085/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/comments/wptv.wordpress.com/9085/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/godelicious/wptv.wordpress.com/9085/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/delicious/wptv.wordpress.com/9085/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gofacebook/wptv.wordpress.com/9085/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/facebook/wptv.wordpress.com/9085/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gotwitter/wptv.wordpress.com/9085/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/twitter/wptv.wordpress.com/9085/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gostumble/wptv.wordpress.com/9085/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/stumble/wptv.wordpress.com/9085/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/godigg/wptv.wordpress.com/9085/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/digg/wptv.wordpress.com/9085/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/goreddit/wptv.wordpress.com/9085/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/reddit/wptv.wordpress.com/9085/" /></a> <img alt="" border="0" src="http://stats.wordpress.com/b.gif?host=wordpress.tv&blog=5089392&post=9085&subd=wptv&ref=&feed=1" width="1" height="1" /><div><a href="http://wordpress.tv/2012/02/10/rick-radko-dont-just-paste-this-code-in-your-functions-php/"><img alt="WC Toronto 2011 &#8211; Don&#8217;t &#8216;Just paste this code in your functions.php&#8217;" src="http://videos.videopress.com/ng3QXp1x/wcto-don_t-e2809cjust-paste-this-code-in-your-functions_scruberthumbnail_0.jpg" width="160" height="120" /></a></div>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 11 Feb 2012 00:20:54 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"wctoronto";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:4;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:63:"WPTavern: Ian Stewarts Predictions On WordPress Themes For 2012";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:31:"http://www.wptavern.com/?p=6258";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:115:"http://feedproxy.google.com/~r/WordpressTavern/~3/7c1kIqBUnVk/ian-stewarts-predictions-on-wordpress-themes-for-2012";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:2981:"<p>Ian Stewart <a href="http://themeshaper.com/2012/02/07/wordpress-themes-2012/">shared some of his predictions</a> as they relate to WordPress themes for 2012. His thoughts on Lighter themes as well as themes getting rid of the useless options are spot on. It&#8217;s a trend that&#8217;s made headway since the beginning of 2012 and it will only continue during the rest of the year. I&#8217;m not quite sure about his thoughts on using the default theme that ships with WordPress because it gives you a 1,000 hour head start. I&#8217;m sure many will beg to differ but it&#8217;s a good trend to see that with each default theme, the team will be trying new ideas and hopefully, begin inspiring everyone else. </p>\n<p>Amongst the comments, <a href="http://themeshaper.com/2012/02/07/wordpress-themes-2012/comment-page-1/#comment-71795">Josh Leuze proposed</a> that themes should have less features built into them. </p>\n<blockquote><p>Along with less theme options it would be nice to see less features built into themes. There are so many themes out there with poorly implemented breadcrumbs, slideshows, and other functionality that doesn’t really need to be built in when there are so many awesome plugins they could integrate instead.</p>\n<p>And with all the time they save by choosing established plugins instead of rolling their own, they can concentrate on sweet designs instead </p></blockquote>\n<p>With that being said, do you know of any themes that concentrate exclusively on providing a rich, beautiful presentation of content without all the doo dads attached onto it such as sliders, breadcrumbs, flashy headers, etc.? A theme that takes each post type and turns that piece of content whether it be a video, image, or blockquote into a thing of beauty. I&#8217;m willing to bet that most WordPress themes be it free or commercial do not accomplish that task out of the box. Instead, it seems like it takes a skilled designer or team of designers to turn a specific WordPress theme into a great presentation of content. However, the monkey wrench thrown into the equation is that themes are subjective and what looks great to one person may look like crap to someone else. If you can find a theme that accomplishes everything I&#8217;ve mentioned out of the box, I think that gets you closer to a 1,000 hour head start. </p>\n<p>Related posts:<ol>\n<li><a href="http://www.wptavern.com/wordpress-themes-in-2009" rel="bookmark" title="WordPress Themes In 2009">WordPress Themes In 2009</a></li>\n<li><a href="http://www.wptavern.com/the-history-of-wordpress-default-themes" rel="bookmark" title="The History Of WordPress Default Themes">The History Of WordPress Default Themes</a></li>\n<li><a href="http://www.wptavern.com/big-congratulations-to-ian-stewart" rel="bookmark" title="Big Congratulations To Ian Stewart">Big Congratulations To Ian Stewart</a></li>\n</ol></p><img src="http://feeds.feedburner.com/~r/WordpressTavern/~4/7c1kIqBUnVk" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 10 Feb 2012 21:00:21 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:6:"Jeffro";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:5;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:59:"WPTavern: Links In Image Captions Possibly Coming In WP 3.4";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:31:"http://www.wptavern.com/?p=6256";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:111:"http://feedproxy.google.com/~r/WordpressTavern/~3/hSfVALb4nmw/links-in-image-captions-possibly-coming-in-wp-3-4";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1730:"<p>It was an idea that was proposed by Jeremy Clarke about a year ago and soon, that idea will be turned into a reality. His idea was to fix the image caption system to <a href="http://wordpress.org/extend/ideas/topic/fix-the-caption-system-to-allow-links-inside-captions">allow links within the caption area</a> of images. It&#8217;s an idea that I support as I&#8217;ve mentioned in a <a href="http://www.wptavern.com/how-to-insert-links-inside-of-image-captions">previous post</a> as the image caption serves as the perfect opportunity to provide attribution and is especially useful for the Image Post Type. </p>\n<p>Ticket <a href="http://core.trac.wordpress.org/ticket/18311">#18311</a> which centers around this functionality has been blessed and looks like it will be added to WordPress 3.4 if all goes well. Everyone interested in this feature should follow the progress made on the ticket as well as test the patch and last but not least, provide feedback. </p>\n<p>Related posts:<ol>\n<li><a href="http://www.wptavern.com/how-to-insert-links-inside-of-image-captions" rel="bookmark" title="How To Insert Links Inside Of Image Captions">How To Insert Links Inside Of Image Captions</a></li>\n<li><a href="http://www.wptavern.com/screencast-basic-image-editing-in-wordpress-2-9" rel="bookmark" title="Screencast: Basic Image Editing In WordPress 2.9">Screencast: Basic Image Editing In WordPress 2.9</a></li>\n<li><a href="http://www.wptavern.com/using-wordpress-to-create-multiple-image-sizes" rel="bookmark" title="Using WordPress To Create Multiple Image Sizes">Using WordPress To Create Multiple Image Sizes</a></li>\n</ol></p><img src="http://feeds.feedburner.com/~r/WordpressTavern/~4/hSfVALb4nmw" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 10 Feb 2012 18:00:47 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:6:"Jeffro";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:6;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:68:"WordPress.tv: Joe Rozsa: Custo(my)ze WordPress Themes with Photoshop";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:27:"http://wordpress.tv/?p=9080";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:83:"http://wordpress.tv/2012/02/10/joe-rozsa-customyze-wordpress-themes-with-photoshop/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1875:"<div id="v-SmIHen8n-1" class="video-player">\n</div>\n<br />  <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gocomments/wptv.wordpress.com/9080/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/comments/wptv.wordpress.com/9080/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/godelicious/wptv.wordpress.com/9080/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/delicious/wptv.wordpress.com/9080/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gofacebook/wptv.wordpress.com/9080/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/facebook/wptv.wordpress.com/9080/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gotwitter/wptv.wordpress.com/9080/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/twitter/wptv.wordpress.com/9080/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gostumble/wptv.wordpress.com/9080/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/stumble/wptv.wordpress.com/9080/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/godigg/wptv.wordpress.com/9080/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/digg/wptv.wordpress.com/9080/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/goreddit/wptv.wordpress.com/9080/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/reddit/wptv.wordpress.com/9080/" /></a> <img alt="" border="0" src="http://stats.wordpress.com/b.gif?host=wordpress.tv&blog=5089392&post=9080&subd=wptv&ref=&feed=1" width="1" height="1" /><div><a href="http://wordpress.tv/2012/02/10/joe-rozsa-customyze-wordpress-themes-with-photoshop/"><img alt="WC Toronto 2011 &#8211; Custo(my)ze WordPress Themes with Photoshop" src="http://videos.videopress.com/SmIHen8n/wcto-customyize-wordpress-themes-with-photoshop_scruberthumbnail_0.jpg" width="160" height="120" /></a></div>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 10 Feb 2012 14:15:13 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"wctoronto";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:7;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:69:"WPTavern: Captial P Dangit Filter Does Not Apply To Crossword Puzzles";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:31:"http://www.wptavern.com/?p=6249";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:121:"http://feedproxy.google.com/~r/WordpressTavern/~3/YlHgCnDI-Os/captial-p-dangit-filter-does-not-apply-to-crossword-puzzles";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:946:"<div id="attachment_6251" class="wp-caption aligncenter"><a href="http://josephscott.org/archives/2012/02/wordpressed/"><img src="http://www.wptavern.com/wp-content/uploads/2012/02/WordPressCrossWord-500x375.jpg" alt="" title="WordPressCrossWord" width="500" height="375" class="size-large wp-image-6251" /></a><p class="wp-caption-text">It&#039;s Capital P Dangit</p></div>\n<p>Related posts:<ol>\n<li><a href="http://www.wptavern.com/not-one-but-two-wordpress-tats" rel="bookmark" title="Not One But Two WordPress Tats">Not One But Two WordPress Tats</a></li>\n<li><a href="http://www.wptavern.com/a-look-at-the-new-menu-ui" rel="bookmark" title="A Look At The New Menu UI">A Look At The New Menu UI</a></li>\n<li><a href="http://www.wptavern.com/wanna-wordpress-wiki" rel="bookmark" title="Wanna WordPress Wiki">Wanna WordPress Wiki</a></li>\n</ol></p><img src="http://feeds.feedburner.com/~r/WordpressTavern/~4/YlHgCnDI-Os" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 10 Feb 2012 14:00:57 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:6:"Jeffro";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:8;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:56:"Weblog Tools Collection: First Ever WP on Tour a Success";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"http://weblogtoolscollection.com/?p=11025";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:73:"http://feedproxy.google.com/~r/weblogtoolscollection/UXMP/~3/evA9J-8Jz24/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1289:"<p>After being <a href="http://weblogtoolscollection.com/archives/2011/05/14/wp-on-tour-international-wordpress-coworking/">in the planning stage</a> for a few months, the first ever <a href="http://wpontour.com/">WP on Tour</a> was <a href="http://wpontour.com/2012/02/07/amazing-wp-on-tour-sitges/">a huge success</a>. The goal of WP on Tour was to bring WordPress fans from around the world for a solid week of fun and co-working, and <a href="http://wpcandy.com/reports/the-first-wp-on-tour-was-a-hugesuccess">this first WP on Tour</a> brought ten WordPress fans and developers to Sitges, Spain.</p>\n<p>The crew worked together on a few client and personal projects, and some of the biggest releases of the week were major updates to <a href="http://wordpress.org/extend/plugins/wp-stripe/">WP Stripe</a> and <a href="https://github.com/delans/YouTube-DJ">YouTube DJ</a>. As for the fun aspect, they were kind enough to snap <a href="http://www.flickr.com/groups/wpontour/pool">several photos</a> throughout the week.</p>\n<p>Does this look like fun to you? If so, you might want to <a href="http://wpontour.com/roll-your-own/">host a WP on Tour event in your home town</a>.</p>\n<img src="http://feeds.feedburner.com/~r/weblogtoolscollection/UXMP/~4/evA9J-8Jz24" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 10 Feb 2012 14:00:54 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:5:"James";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:9;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:83:"WordPress.tv: Justin Sainton: Your Ecommerce Site, in 30 Minutes or Less (Workshop)";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wptv.wordpress.com/?p=9227";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:97:"http://wordpress.tv/2012/01/15/justin-sainton-your-ecommerce-site-in-30-minutes-or-less-workshop/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1862:"<div id="v-l3oeJSAd-1" class="video-player">\n</div>\n<br />  <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gocomments/wptv.wordpress.com/9227/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/comments/wptv.wordpress.com/9227/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/godelicious/wptv.wordpress.com/9227/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/delicious/wptv.wordpress.com/9227/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gofacebook/wptv.wordpress.com/9227/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/facebook/wptv.wordpress.com/9227/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gotwitter/wptv.wordpress.com/9227/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/twitter/wptv.wordpress.com/9227/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gostumble/wptv.wordpress.com/9227/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/stumble/wptv.wordpress.com/9227/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/godigg/wptv.wordpress.com/9227/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/digg/wptv.wordpress.com/9227/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/goreddit/wptv.wordpress.com/9227/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/reddit/wptv.wordpress.com/9227/" /></a> <img alt="" border="0" src="http://stats.wordpress.com/b.gif?host=wordpress.tv&blog=5089392&post=9227&subd=wptv&ref=&feed=1" width="1" height="1" /><div><a href="http://wordpress.tv/2012/01/15/justin-sainton-your-ecommerce-site-in-30-minutes-or-less-workshop/"><img alt="Developer: Justin Sainton: Your Ecommerce Site in 30 Minutes or Less" src="http://videos.videopress.com/l3oeJSAd/developer-e-commerce-site_std.original.jpg" width="160" height="120" /></a></div>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 10 Feb 2012 12:30:09 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:11:"WordCamp KC";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:10;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:38:"Jane Wells: A Bakery? Also, OMGOMGOMG!";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://jane.wordpress.com/?p=1231";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:61:"http://jane.wordpress.com/2012/02/09/a-bakery-also-omgomgomg/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:5570:"<p>This post has the potential to be as long as <a href="https://twitter.com/#!/janeforshort/media/slideshow?url=pic.twitter.com%2FjGlRMeKX">the scarf I made Matt for his birthday</a>. Knowing that, I&#8217;ll try to keep it short and to the point. Opportunity knocked last week and I decided to answer. No, I&#8217;m not leaving WordPress or Automattic; get your mind out of the gutter. The owner of a small restaurant here on Tybee (Charly&#8217;s) is retiring and selling his place, and I plunked down $10,000 as a deposit to buy it!<br />\n<a href="http://buyjaneabakery.com"><img class="aligncenter size-full wp-image-1238" title="jbug-4x3-noborder" src="http://jane.files.wordpress.com/2012/02/jbug-4x3-noborder.png?w=584" alt="Jitterbug: eat. drink. blog." /></a><br />\nI want to turn it into a bakery/internet cafe/WordPressy community gathering space. Bake in the morning to force some non-computer time, then do my usual WP stuff in the lulls. I wrote a 20-page business plan full of stats and projections, and some smart money types tell me it looks good. But wait! I&#8217;ve spent all my money in the last few years on things like raising my brother&#8217;s kids, buying braces for same, helping my mom buy her house down here, and stuff like that. I am broke! I can&#8217;t afford to buy this place and turn it into the vision of awesomeness I see in my head, despite the below-market price and my plan to take a loan out against my 401k. So: crowdfunding!</p>\n<p>The project &#8212; the Jitterbug Bakery &#8212; was accepted to Kickstarter yesterday, and on Monday once I finish their project setup, I&#8217;ll launch a fundraising campaign there. I also set up a WordPress site with a paypal plugin for the non-Kickstarter types, which would mean less lost to fees. If you want to help me make this thing a reality, I&#8217;d love it if you&#8217;d pitch in (rewards range from my brownies and Jitterbug swag to website setups and reviews), but will in no way hold it against you if you don&#8217;t.</p>\n<div id="attachment_1233" class="wp-caption alignright"><a href="http://jane.files.wordpress.com/2012/02/front-deck-sml.jpg"><img class="size-full wp-image-1233" title="front-deck-sml" src="http://jane.files.wordpress.com/2012/02/front-deck-sml.jpg?w=584" alt="small green house with a deck with seating" /></a><p class="wp-caption-text">The building in question: the future Jitterbug</p></div>\n<p>If I don&#8217;t raise enough money in a month to meet the closing costs on March 31, I&#8217;ll take up a private investor&#8217;s offer to buy the building and lease it to me with an option to buy, so I can put the money that I have raised into the business costs rather than the building. (Did you know a decent refurbished espresso setup costs up to $15k? And I don&#8217;t even drink coffee!) But if you&#8217;re reading this, you probably know I&#8217;m independent and stubborn to a fault, and I&#8217;d really rather just buy the building rather than call in such a big favor. It&#8217;s a little crazy to try and raise $250k this way in a month, but I&#8217;ll never know if I don&#8217;t try, right?</p>\n<p>So if you ever thought to yourself, &#8220;I wish I could buy Jane a [drink, dinner, iPad, car] to show her how much I appreciate all she does,&#8221; here&#8217;s your chance! I&#8217;ll provide the drinks and dinner if you come visit the Jitterbug, I don&#8217;t like iPads, and I have a car I like. I put up a site at <a href="http://BuyJaneABakery.com">BuyJaneABakery.com</a> that is pretty much just what it sounds like. It has all the info on what I (we, if you include my mom and Morgan!) want to create for my local community. The Contribute page has a donation widget at the bottom. Yes, a bit hidden. The Personal Fundraising plugin I wanted to use was pretty and awesome but more trouble than it was worth. If you&#8217;re a Kickstarter type of person, I&#8217;ll update this post by Monday when the project goes live there.</p>\n<p>If you ever really loved me, <a href="http://BuyJaneABakery.com">help me buy a bakery</a>!</p>\n<br />  <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gocomments/jane.wordpress.com/1231/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/comments/jane.wordpress.com/1231/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/godelicious/jane.wordpress.com/1231/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/delicious/jane.wordpress.com/1231/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gofacebook/jane.wordpress.com/1231/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/facebook/jane.wordpress.com/1231/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gotwitter/jane.wordpress.com/1231/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/twitter/jane.wordpress.com/1231/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gostumble/jane.wordpress.com/1231/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/stumble/jane.wordpress.com/1231/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/godigg/jane.wordpress.com/1231/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/digg/jane.wordpress.com/1231/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/goreddit/jane.wordpress.com/1231/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/reddit/jane.wordpress.com/1231/" /></a> <img alt="" border="0" src="http://stats.wordpress.com/b.gif?host=jane.wordpress.com&blog=201&post=1231&subd=jane&ref=&feed=1" width="1" height="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 09 Feb 2012 21:43:50 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:10:"Jane Wells";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:11;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:83:"WP Android: WordPress for Android Now Available for Nook Color/Tablet & Kindle Fire";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:35:"http://android.wordpress.org/?p=589";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:66:"http://android.wordpress.org/2012/02/09/wordpress-android-tablets/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:4120:"<p><img src="http://wpandroid.files.wordpress.com/2012/01/wordpress-android-phones-tablets.jpg?w=840" alt="" title="wordpress-android-phones-tablets" class="alignnone size-full wp-image-606" /></p>\n<p>Did you know that WordPress for Android runs on both phones and tablets? Sometimes a little extra screen space can help you draft that longer blog post. If you have a Samsung Galaxy Tab, Motorola Xoom, or another Android tablet you&#8217;ll find the WordPress app in the <a href="https://market.android.com/details?id=org.wordpress.android">Android Market</a>.</p>\n<h4><a href="http://wpandroid.files.wordpress.com/2012/02/kindle-firenook-color-press-image.jpg"><img src="http://wpandroid.files.wordpress.com/2012/02/kindle-firenook-color-press-image.jpg?w=320&h=446" alt="WordPress for Android 2.0 on Nook Color and Kindle Fire" title="kindle-fire+nook-color-press-image" width="320" height="446" class="alignright size-medium wp-image-627" /></a>Now for the Nook Color/Tablet and Kindle Fire, too!</h4>\n<p>We&#8217;re happy to announce that WordPress for Android is now available for the <a href="http://www.barnesandnoble.com/w/books/1108649025?ean=2940043882349&itm=1&usri=wordpress">Nook Color/Tablet</a> and <a href="http://www.amazon.com/Kindle-Fire-Amazon-Tablet/dp/B0051VVOB2">Kindle Fire</a>. The 7&#8243; screen on these tablets make an excellent home for the all-new Dashboard UI that we added in <a title="Version 2.0: Android Blogging, Re-Imagined" href="http://android.wordpress.org/2011/12/19/version-2-0-android-blogging-re-imagined/">WordPress for Android 2.0</a>.</p>\n<p>We paid special attention to the post editor on theses devices, enhancing the layout to make it super simple to edit your post content in either landscape or portrait orientation. You&#8217;ll find everything there that you&#8217;d want in a WordPress app, including support for editing post content, adding media, viewing your stats, comment notifications, and more.</p>\n<p>The app is available today in the <a href="http://www.amazon.com/Automattic-Inc-WordPress/dp/B004GFN11A/">Amazon Appstore</a> and <a href="http://www.barnesandnoble.com/w/books/1108649025?ean=2940043882349&itm=1&usri=wordpress">Nook Store</a>.</p>\n<h4>Feedback</h4>\n<p>How do you like the tablet WordPress app? Let us know in the comments section below, or <a href="http://twitter.com/wpandroid">ping us on Twitter</a>.</p>\n<p>Be sure to <a href="http://android.wordpress.org/feed/">subscribe to this blog</a> to stay up to date with the latest happenings around WordPress for Android.</p>\n<br />  <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gocomments/wpandroid.wordpress.com/589/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/comments/wpandroid.wordpress.com/589/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/godelicious/wpandroid.wordpress.com/589/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/delicious/wpandroid.wordpress.com/589/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gofacebook/wpandroid.wordpress.com/589/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/facebook/wpandroid.wordpress.com/589/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gotwitter/wpandroid.wordpress.com/589/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/twitter/wpandroid.wordpress.com/589/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gostumble/wpandroid.wordpress.com/589/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/stumble/wpandroid.wordpress.com/589/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/godigg/wpandroid.wordpress.com/589/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/digg/wpandroid.wordpress.com/589/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/goreddit/wpandroid.wordpress.com/589/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/reddit/wpandroid.wordpress.com/589/" /></a> <img alt="" border="0" src="http://stats.wordpress.com/b.gif?host=android.wordpress.org&blog=9426921&post=589&subd=wpandroid&ref=&feed=1" width="1" height="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 09 Feb 2012 13:08:32 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:3:"Dan";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:12;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:57:"Weblog Tools Collection: WordPress Theme Releases for 2/9";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"http://weblogtoolscollection.com/?p=11020";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:73:"http://feedproxy.google.com/~r/weblogtoolscollection/UXMP/~3/JXPaZ2EGkAM/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:795:"<p><img class="alignnone size-full wp-image-11022" title="aqua" src="http://weblogtoolscollection.com/wp-content/uploads/2012/02/aqua.jpg" alt="" width="150" height="113" /></p>\n<p><a href="http://emptynestthemes.com/2012/02/08/aqua-theme/"><strong>Aqua</strong></a> is a crisp, clean, and bright theme with small touches of aqua as an accent.</p>\n<p><img class="alignnone size-full wp-image-11021" title="gridly" src="http://weblogtoolscollection.com/wp-content/uploads/2012/02/gridly.jpg" alt="" width="150" height="107" /></p>\n<p><a href="http://www.eleventhemes.com/gridly-theme/"><strong>Gridly</strong></a> is a clean, minimal, and responsive theme with a simple options panel.</p>\n<img src="http://feeds.feedburner.com/~r/weblogtoolscollection/UXMP/~4/JXPaZ2EGkAM" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 09 Feb 2012 13:00:31 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:5:"James";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:13;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:19:"Joseph: WordPressed";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:30:"http://josephscott.org/?p=5346";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:52:"http://josephscott.org/archives/2012/02/wordpressed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:414:"<p><img alt="" src="https://lh3.googleusercontent.com/-ZtRwbE8oqKQ/TzKYg4fZ8UI/AAAAAAAAAUs/8jKbPwI5gE8/s720/wordpressed.jpg" title="Word pressed" class="alignnone" width="720" height="540" /></p>\n<p>I noticed Sarah working on a crossword puzzle from the local ad circular that comes in the mail.  At first glance I thought that section was labeled &#8220;WordPress&#8221; instead of &#8220;Word pressed&#8221;.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 08 Feb 2012 18:00:03 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:12:"Joseph Scott";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:14;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:49:"WPTavern: The History Of WordPress Default Themes";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:31:"http://www.wptavern.com/?p=6246";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:101:"http://feedproxy.google.com/~r/WordpressTavern/~3/H42DFlf6h6g/the-history-of-wordpress-default-themes";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1430:"<p>WPLift has a cool post highlighting the <a href="http://wplift.com/a-history-of-default-wordpress-themes">different default themes</a> that WordPress has had since its inception. According to the post, since WordPress was first created, the publishing platform has had a total of five default themes with Twenty Twelve being the sixth, slated to arrive with WordPress 3.4. It was a nice stroll down memory lane and a bit surprising that the amount of default themes was so low. However, it seemed like forever when Kubrick was the default theme for WordPress. </p>\n<p>So the question is, how many of you remember using the first WordPress Default theme for your site?</p>\n<p>Related posts:<ol>\n<li><a href="http://www.wptavern.com/value-default-themes-maxblogpress-and-canonical-plugins" rel="bookmark" title="Value, Default Themes, MaxBlogPress And Canonical Plugins">Value, Default Themes, MaxBlogPress And Canonical Plugins</a></li>\n<li><a href="http://www.wptavern.com/matt-mullenweg-to-be-in-charge-of-the-2012-default-theme" rel="bookmark" title="Matt Mullenweg To Be In Charge Of The 2012 Default Theme">Matt Mullenweg To Be In Charge Of The 2012 Default Theme</a></li>\n<li><a href="http://www.wptavern.com/wordpress-themes-in-2009" rel="bookmark" title="WordPress Themes In 2009">WordPress Themes In 2009</a></li>\n</ol></p><img src="http://feeds.feedburner.com/~r/WordpressTavern/~4/H42DFlf6h6g" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 08 Feb 2012 14:00:34 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:6:"Jeffro";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:15;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:74:"Weblog Tools Collection: Printed WordPress Magazine to be Released Shortly";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"http://weblogtoolscollection.com/?p=11015";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:73:"http://feedproxy.google.com/~r/weblogtoolscollection/UXMP/~3/63qKVmTLI1g/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1164:"<p><a href="http://wpcandy.com/quarterly">WPCandy Quarterly</a>, a <a href="http://wordpress.org/">WordPress</a> related quarterly print magazine from the folks at <a href="http://wpcandy.com/">WPCandy</a>, is just about to be mailed out to the lucky readers who either pre-ordered or subscribed. To my knowledge, or at least about half an hour of searching, this may very well be the first ever printed WordPress magazine publication.</p>\n<p>The first issue will feature articles from 11 well-known contributors, and due to demand from the pre-orders, 2,000 copies are making their way through the printers as you read this. <a href="http://wpcandy.com/announces/quarterly-01-design-process-video">A lot of thought</a> went into the design of this magazine, and you can see a video blazing through the various drafts below.</p>\n<p>It&#8217;s not too late to reserve your copy, so if you want to be a part of this historical launch, you should <a href="http://wpcandy.com/quarterly">place your order</a> soon before they&#8217;re shipped.</p>\n<p>    </p>\n<img src="http://feeds.feedburner.com/~r/weblogtoolscollection/UXMP/~4/63qKVmTLI1g" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 08 Feb 2012 13:00:04 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:5:"James";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:16;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:53:"WPTavern: Senior PHP Developer Position Open – Lift";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:31:"http://www.wptavern.com/?p=6243";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:101:"http://feedproxy.google.com/~r/WordpressTavern/~3/dN2KnHn1RKM/senior-php-developer-position-open-lift";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1036:"<p>Chris of LiftUX reached out to me the other day and wanted me to let everyone know that they are hiring for the position of <a href="http://liftux.com/jobs/senior-wordpress-php-developer/">Senior WordPress/PHP developer</a>. The developer would also be helping to build out themes and plugins for <a href="http://upthemes.com/">UpThemes</a>.</p>\n<p>Related posts:<ol>\n<li><a href="http://www.wptavern.com/wordpress-developers-that-are-hiring" rel="bookmark" title="WordPress Developers That Are Hiring">WordPress Developers That Are Hiring</a></li>\n<li><a href="http://www.wptavern.com/wordpress-developer-chats-should-focus-on-core" rel="bookmark" title="WordPress Developer Chats Should Focus On Core">WordPress Developer Chats Should Focus On Core</a></li>\n<li><a href="http://www.wptavern.com/want-to-work-for-crowd-favorite" rel="bookmark" title="Want To Work For Crowd Favorite?">Want To Work For Crowd Favorite?</a></li>\n</ol></p><img src="http://feeds.feedburner.com/~r/WordpressTavern/~4/dN2KnHn1RKM" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 07 Feb 2012 18:00:09 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:6:"Jeffro";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:17;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:66:"WPTavern: First Issue Of The WPCandy Quarterly Almost Out The Door";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:31:"http://www.wptavern.com/?p=6240";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:118:"http://feedproxy.google.com/~r/WordpressTavern/~3/emTl6kPlRBo/first-issue-of-the-wpcandy-quarterly-almost-out-the-door";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1418:"<p>Many people within the WordPress community are anxiously awaiting the first issue of the WPCandy Quarterly to show up in their mailbox. According to Ryan, that day is soon approaching as the first batches are currently being printed</a>. However, since there is still some time before we&#8217;ll be holding the physical copy, Ryan <a href="http://wpcandy.com/announces/quarterly-01-design-process-video">has explained how he went about developing the first issue</a>. Based on the video Ryan published showcasing the various designs that articles have gone through, it looks like the magazine will have an impressive display around the content of each article, giving it that magazine feel. </p>\n<p>Related posts:<ol>\n<li><a href="http://www.wptavern.com/wpcandy-set-to-publish-first-wp-centric-print-magazine" rel="bookmark" title="WPCandy Set To Publish First WP Centric Print Magazine">WPCandy Set To Publish First WP Centric Print Magazine</a></li>\n<li><a href="http://www.wptavern.com/how-ryan-imel-created-the-wp-quarterly-page" rel="bookmark" title="How Ryan Imel Created The WP Quarterly Page">How Ryan Imel Created The WP Quarterly Page</a></li>\n<li><a href="http://www.wptavern.com/wpcandy-is-back-in-business" rel="bookmark" title="WPCandy Is Back In Business">WPCandy Is Back In Business</a></li>\n</ol></p><img src="http://feeds.feedburner.com/~r/WordpressTavern/~4/emTl6kPlRBo" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 07 Feb 2012 14:00:17 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:6:"Jeffro";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:18;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:58:"Weblog Tools Collection: WordPress Plugin Releases for 2/7";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"http://weblogtoolscollection.com/?p=11011";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:73:"http://feedproxy.google.com/~r/weblogtoolscollection/UXMP/~3/AM6W4C3RlI0/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:906:"<h3>New plugins</h3>\n<p><a href="http://geeklad.com/wordpress-plugin-to-remove-google-adsense-and-google-analytics"><strong>Google AdSense and Google Analytics Remover</strong></a> will prevent AdSense ads and Analytics tracking code from displaying when you are logged in.</p>\n<h3>Updated plugins</h3>\n<p><a href="http://wordpress.org/extend/plugins/custom-field-suite/"><strong>Custom Field Suite</strong></a> allows you to visually manage custom fields.</p>\n<p><a href="http://www.fastsecurecontactform.com/"><strong>Fast Secure Contact Form</strong></a> lets your visitors send you a quick e-mail message and blocks all common spammer tactics. Additionally, the plugin has a multi-form feature, optional extra fields, and an option to redirect visitors to any URL after the message is sent.</p>\n<img src="http://feeds.feedburner.com/~r/weblogtoolscollection/UXMP/~4/AM6W4C3RlI0" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 07 Feb 2012 13:00:01 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:5:"James";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:19;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:35:"WPTavern: BuddyPress Codex Revamped";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:31:"http://www.wptavern.com/?p=6236";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:87:"http://feedproxy.google.com/~r/WordpressTavern/~3/R0SygD8Vul0/buddypress-codex-revamped";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1334:"<p>John James Jacoby of BuddyPress.org has announced that the BuddyPress Codex has received a <a href="http://buddypress.org/2012/02/buddypress-codex-refresh/">much needed refresh</a>. Here is the kicker, the BuddyPress Codex is powered by a WordPress installation where all registered users are an editor. Users can share information as in a traditional wiki but everything is housed on individual pages. Interestingly enough, this very idea was proposed a couple of times during the past few years for the WordPress Codex but it never gained much traction. </p>\n<p>Head on over to the <a href="http://codex.buddypress.org/">NEW BuddyPress Codex</a> and check it out. It will be interesting to see how this approach scales. </p>\n<p>Related posts:<ol>\n<li><a href="http://www.wptavern.com/buddypress-to-the-rescue-for-ning-users" rel="bookmark" title="BuddyPress To The Rescue For Ning Users">BuddyPress To The Rescue For Ning Users</a></li>\n<li><a href="http://www.wptavern.com/buddypress-1-5-2-released" rel="bookmark" title="BuddyPress 1.5.2 Released">BuddyPress 1.5.2 Released</a></li>\n<li><a href="http://www.wptavern.com/handful-of-codex-stats" rel="bookmark" title="Handful Of Codex Stats">Handful Of Codex Stats</a></li>\n</ol></p><img src="http://feeds.feedburner.com/~r/WordpressTavern/~4/R0SygD8Vul0" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 06 Feb 2012 18:00:32 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:6:"Jeffro";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:20;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:31:"WPTavern: How Page.ly Was Built";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:31:"http://www.wptavern.com/?p=6233";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:83:"http://feedproxy.google.com/~r/WordpressTavern/~3/7AtTcDhuJUw/how-page-ly-was-built";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:555:"<p>First off, congratulations to Joshua Strebel and to his wife as they are now first-time parents. Secondly, Joshua has put together a pretty transparent view as to how he created Page.ly, a WordPress specific hosting service. So far, the guide is five parts long but I advise you to start out with <a href="http://blog.page.ly/2012/01/building-page-ly-part1-identifying-the-opportunity/">part 1</a>, Identifying the opportunity.</p>\n<p>No related posts.</p><img src="http://feeds.feedburner.com/~r/WordpressTavern/~4/7AtTcDhuJUw" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 06 Feb 2012 14:00:45 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:6:"Jeffro";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:21;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:56:"Weblog Tools Collection: BuddyPress Codex Gets a Refresh";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"http://weblogtoolscollection.com/?p=11007";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:73:"http://feedproxy.google.com/~r/weblogtoolscollection/UXMP/~3/kyrQoX-sZlM/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:950:"<p>If you&#8217;re a fan of <a href="http://wordpress.org/">WordPress</a>, you probably know about the <a href="http://codex.wordpress.org/Main_Page">WordPress Codex</a>, the massive community-editable source of WordPress documentation.</p>\n<p>Just <a href="http://buddypress.org/2012/02/buddypress-codex-refresh/">yesterday</a>, the <a href="http://buddypress.org/">BuddyPress</a> core team gave a massive update to the <a href="http://codex.buddypress.org/">BuddyPress Codex</a>, making it easier than ever to learn how to use the #1 social networking platform plugin for WordPress.</p>\n<p>Even though the new BuddyPress Codex may function like a traditional Wiki, it&#8217;s actually built on top of WordPress and BuddyPress. After all, why not show off some of the cool things you can do with a platform while you learn how to use it?</p>\n<img src="http://feeds.feedburner.com/~r/weblogtoolscollection/UXMP/~4/kyrQoX-sZlM" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 06 Feb 2012 13:00:48 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:5:"James";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:22;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:57:"Weblog Tools Collection: WordPress Theme Releases for 2/5";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"http://weblogtoolscollection.com/?p=11002";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:73:"http://feedproxy.google.com/~r/weblogtoolscollection/UXMP/~3/6_jnuaFsL3Y/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1099:"<p><img class="alignnone size-full wp-image-11005" title="blush" src="http://weblogtoolscollection.com/wp-content/uploads/2012/02/blush.jpg" alt="" width="150" height="113" /></p>\n<p><a href="http://emptynestthemes.com/2012/02/04/blush-theme/"><strong>Blush</strong></a> is a soft, warm, feminine theme in tones of rose and cream.</p>\n<p><img class="alignnone size-full wp-image-11003" title="boozurk" src="http://weblogtoolscollection.com/wp-content/uploads/2012/02/boozurk.jpg" alt="" width="150" height="112" /></p>\n<p><a href="http://wordpress.org/extend/themes/boozurk"><strong>Boozurk</strong></a> is a clear theme with a lot of features.</p>\n<p><img class="alignnone size-full wp-image-11004" title="thefranciswright" src="http://weblogtoolscollection.com/wp-content/uploads/2012/02/thefranciswright.jpg" alt="" width="150" height="113" /></p>\n<p><a href="http://wordpress.org/extend/themes/the-frances-wright"><strong>The Frances Wright</strong></a> is a clean and elegant theme.</p>\n<img src="http://feeds.feedburner.com/~r/weblogtoolscollection/UXMP/~4/6_jnuaFsL3Y" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sun, 05 Feb 2012 14:30:04 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:5:"James";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:23;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:36:"BuddyPress: BuddyPress Codex Refresh";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"http://buddypress.org/?p=1827";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:55:"http://buddypress.org/2012/02/buddypress-codex-refresh/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1487:"<p>We all know how critically important the <a title="WordPress Codex" href="http://codex.wordpress.org">WordPress.org Codex</a> is. Countless laborious hours have gone into making it the de-facto resource for all things WordPress.org related. It serves as an online encyclopedia of WordPress functions, actions, best practices, and examples on how extend WordPress far beyond its initial reach.</p>\n<p>You may not know it but we&#8217;ve had a codex here at BuddyPress.org since the early days. It&#8217;s mostly made life really difficult and forced everyone into the forums or to other sites for help.</p>\n<p>Today, I&#8217;m really happy to report that the core team has spent some time this weekend to finally refresh the <a title="BuddyPress.org Codex Home" href="http://codex.buddypress.org">BuddyPress Codex</a>.</p>\n<p>The BuddyPress Codex is a WordPress installation where everyone is an editor. You are free to contribute your knowledge into it exactly the way a traditional Wiki works, all using WordPress pages and a few custom taxonomies specific to the BuddyPress project.</p>\n<p>In addition, we&#8217;ve added a few small social integrations to show off who created and edited each page, and we&#8217;re keeping track of all those edits through the BuddyPress Activity component so you can show off your contributions back to the community.</p>\n<p>We really think you&#8217;ll like the changes, and hope you&#8217;ll let us know your thoughts in the comments below!</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sun, 05 Feb 2012 03:22:59 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:17:"John James Jacoby";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:24;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:76:"Weblog Tools Collection: A Plugin to Make All Themes Responsive, Coming Soon";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"http://weblogtoolscollection.com/?p=10999";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:73:"http://feedproxy.google.com/~r/weblogtoolscollection/UXMP/~3/cIDSNIZX2nE/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1001:"<p>It&#8217;s no secret that I&#8217;m a fan of <a href="http://weblogtoolscollection.com/archives/2011/10/23/wordpress-and-responsive-web-design/">responsive themes</a>. Knowing that your <a href="http://wordpress.org/">WordPress</a> blog will look just as good on a tiny mobile screen as it does on a huge desktop screen is one of the most important factors of design to me, especially in today&#8217;s age where mobile device usage is growing so rapidly.</p>\n<p>Sadly, there aren&#8217;t many responsive themes out there, but <a href="http://www.responsiveplugin.com/">Responsive Plugin</a> aims to change that. Once released, Responsive Plugin will make any theme scale perfectly on any screen size. There is no definitive release date, but it is definitely coming out sooner rather than later, and you can find a signup form at the bottom of the site if you want to follow the action.</p>\n<img src="http://feeds.feedburner.com/~r/weblogtoolscollection/UXMP/~4/cIDSNIZX2nE" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 04 Feb 2012 13:00:04 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:5:"James";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:25;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:75:"WPTavern: VoodooPress Celebrates 1 Year Anniversary By Giving Away T-Shirts";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:31:"http://www.wptavern.com/?p=6228";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:127:"http://feedproxy.google.com/~r/WordpressTavern/~3/o5_YrfZq4bM/voodoopress-celebrated-1-year-anniversary-by-giving-away-t-shirts";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1238:"<p>WordPress community site VoodooPress has recently turned one year old. To celebrate, they are <a href="http://voodoopress.com/voodoopress-1-year-anniversary-t-shirt-giveaway/">giving away VoodooPress branded T-Shirts</a>. They come at the cost of providing the site some social love by clicking on any of the social media icons on the site. Small price to pay for a chance at a T-Shirt. Congrats to the VoodooPress team and I hope the second year is better than the first! </p>\n<p>Just imagine how powerful one would be if they wielded a GPL voodoo doll. </p>\n<p>Related posts:<ol>\n<li><a href="http://www.wptavern.com/andrew-nacin-one-year-later" rel="bookmark" title="Andrew Nacin &#8211; One Year Later">Andrew Nacin &#8211; One Year Later</a></li>\n<li><a href="http://www.wptavern.com/its-that-time-of-year-again" rel="bookmark" title="It&#8217;s That Time Of Year Again">It&#8217;s That Time Of Year Again</a></li>\n<li><a href="http://www.wptavern.com/wptavern-celebrates-thank-a-plugin-author-day" rel="bookmark" title="WPTavern Celebrates Thank A Plugin Author Day!">WPTavern Celebrates Thank A Plugin Author Day!</a></li>\n</ol></p><img src="http://feeds.feedburner.com/~r/WordpressTavern/~4/o5_YrfZq4bM" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 04 Feb 2012 00:00:00 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:6:"Jeffro";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:26;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:61:"WPTavern: Digging Into WordPress Book Updated To Cover WP 3.3";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:31:"http://www.wptavern.com/?p=6225";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:113:"http://feedproxy.google.com/~r/WordpressTavern/~3/NUTRLru8sis/digging-into-wordpress-book-updated-to-cover-wp-3-3";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1080:"<p>The WordPress book, <a href="http://digwp.com/book/">Digging Into WordPress</a> has been updated to cover WordPress 3.2 and 3.3. This marks the 9th edition of the book as noted by Jeff Starr. Those of you who are owners of any previous version of the book will receive this update for free. </p>\n<p>Related posts:<ol>\n<li><a href="http://www.wptavern.com/affiliate-program-for-digging-into-wordpress-closes" rel="bookmark" title="Affiliate Program For Digging Into WordPress Closes">Affiliate Program For Digging Into WordPress Closes</a></li>\n<li><a href="http://www.wptavern.com/guest-review-of-the-book-wordpress-ajax" rel="bookmark" title="Guest Review Of The Book: WordPress & Ajax">Guest Review Of The Book: WordPress &#038; Ajax</a></li>\n<li><a href="http://www.wptavern.com/new-wordpress-book-wordpress-3-site-blueprints" rel="bookmark" title="New WordPress Book &#8211; WordPress 3 Site Blueprints">New WordPress Book &#8211; WordPress 3 Site Blueprints</a></li>\n</ol></p><img src="http://feeds.feedburner.com/~r/WordpressTavern/~4/NUTRLru8sis" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 03 Feb 2012 21:00:50 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:6:"Jeffro";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:27;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:58:"WPTavern: Situations In Which MultiSite Should Not Be Used";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:31:"http://www.wptavern.com/?p=6223";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:110:"http://feedproxy.google.com/~r/WordpressTavern/~3/Pgfd1-2fP3A/situations-in-which-multisite-should-not-be-used";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:446:"<p>Ipstenu once again has a <a href="http://tech.ipstenu.org/2011/dont-use-wordpress-multisite/">great article</a> that covers some situations in which MultiSite is not the best tool for the job. If you&#8217;re thinking that you need to use MultiSite to accomplish a certain task, make sure that task is not on her list.</p>\n<p>No related posts.</p><img src="http://feeds.feedburner.com/~r/WordpressTavern/~4/Pgfd1-2fP3A" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 03 Feb 2012 18:00:04 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:6:"Jeffro";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:28;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:65:"WPTavern: Press75 Joins The WordPress.com Commercial Theme Family";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:31:"http://www.wptavern.com/?p=6218";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:117:"http://feedproxy.google.com/~r/WordpressTavern/~3/Br8dDfr3GUI/press75-joins-the-wordpress-com-commercial-theme-family";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1738:"<p><a href="http://www.wptavern.com/wp-content/uploads/2012/02/press75logo.png" rel="thumbnail"><img src="http://www.wptavern.com/wp-content/uploads/2012/02/press75logo.png" alt="Press75.com Logo" title="press75logo" width="248" height="117" class="alignright size-full wp-image-6219" /></a>Congratulations goes out to Luke McDonald as one of the themes produced by <a href="http://www.Press75.com">Press75.com</a> has been selected to be part of the <a href="http://en.blog.wordpress.com/2012/02/02/new-themes-currents-and-debut/">WordPress.com commercial theme store</a>. The theme is priced at $50.00 and is called Debut. It&#8217;s mobile ready right out of the box along with having post format support. Speaking of post formats, Debut is especially interesting because when users select the Audio post format, it expands into a multi-track playlist. You can see the theme in action via the <a href="http://theme.wordpress.com/themes/debut/">WordPress.com theme showcase</a>. </p>\n<p>Related posts:<ol>\n<li><a href="http://www.wptavern.com/so-many-commercial-themes-so-many-theme-sorters" rel="bookmark" title="So Many Commercial Themes &#8211; So Many Theme Sorters">So Many Commercial Themes &#8211; So Many Theme Sorters</a></li>\n<li><a href="http://www.wptavern.com/alex-king-releases-post-formats-admin-ui-code" rel="bookmark" title="Alex King Releases Post Formats Admin UI Code">Alex King Releases Post Formats Admin UI Code</a></li>\n<li><a href="http://www.wptavern.com/review-of-the-richbiz-commercial-theme" rel="bookmark" title="Review Of The RichBiz Commercial Theme">Review Of The RichBiz Commercial Theme</a></li>\n</ol></p><img src="http://feeds.feedburner.com/~r/WordpressTavern/~4/Br8dDfr3GUI" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 03 Feb 2012 14:00:36 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:6:"Jeffro";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:29;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:58:"Weblog Tools Collection: WordPress Plugin Releases for 2/3";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"http://weblogtoolscollection.com/?p=10997";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:73:"http://feedproxy.google.com/~r/weblogtoolscollection/UXMP/~3/oAXMHUdgjsE/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1357:"<h3>New plugins</h3>\n<p><a href="http://wordpress.org/extend/plugins/quick-notice/"><strong>Quick Notice Bar</strong></a> will help you to display a sticky message in your site&#8217;s header.</p>\n<p><a href="http://wordpress.org/extend/plugins/repress/"><strong>RePress</strong></a> allows you to circumvent internet censorship by proxying traffic to websites that have been blocked by repressive regimes.</p>\n<p><a href="http://www.totalbounty.com/freebies/widget-logic-visual/"><strong>Widget Logic Visual</strong></a> lets you control on which pages widgets appear using conditional tags.</p>\n<p><a href="http://www.tautologicalcode.net/wordpress-plugin-wp-really-simple-health/"><strong>WP Really Simple Health</strong></a> allows you to view memory utilization, server uptime, and CPU load on the new admin toolbar.</p>\n<h3>Updated plugins</h3>\n<p><a href="http://wordpress.org/extend/plugins/tallyopia-analytics-plugin/"><strong>Tallyopia Analytics</strong></a> provides analytics that you can embed into your site using shortcodes or view in your admin dashboard.</p>\n<p><a href="http://wordpress.org/extend/plugins/ultimate-tinymce/"><strong>Ultimate TinyMCE</strong></a> beefs up your visual editor with a plethora of advanced options.</p>\n<img src="http://feeds.feedburner.com/~r/weblogtoolscollection/UXMP/~4/oAXMHUdgjsE" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 03 Feb 2012 13:00:57 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:5:"James";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:30;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:39:"WP Windows Phone 7: Version 1.5 Is Here";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:40:"http://windowsphone.wordpress.org/?p=238";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:57:"http://windowsphone.wordpress.org/2012/02/02/version-1-5/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:4002:"<p><img src="http://wpwindowsphone.files.wordpress.com/2012/02/wordpress-windowsphone-v1-5.jpg" alt="Version 1.5 of WordPress for Windows Phone - showing the updated dashboard" title="wordpress-windowsphone-v1-5" width="258" height="455" class="alignright size-full wp-image-246" />We&#8217;re very happy to announce that version 1.5 of WordPress for Windows Phone is now available. This update focuses on speed and reliability &#8211; here&#8217;s what&#8217;s changed:</p>\n<ul>\n<li><strong>Stats:</strong> We&#8217;ve moved the stats section to its own page in the app which greatly improved the loading time for the blog panorama. While we were at it we fixed some bugs and improved the styling of the charts. The result is a much smoother experience for keeping up with your site&#8217;s stats. Just tap the new stats button in the actions pane to view your stats.</li>\n<li><strong>Post scheduling:</strong> The ability to schedule posts was a missing piece in the app. Now you can easily set a future publish date for your posts right from the app.</li>\n<li><strong>Comments</strong>: The comments list has been updated and now features a simple way to select multiple comments for bulk moderation.</li>\n<li><strong>Infinite scrolling:</strong> Your posts, pages, and comments now keep loading as you scroll down the list. No need to tap an extra button, it&#8217;s quick and easy.</li>\n<li><strong>Media uploading:</strong> The uploading reliability has been greatly improved. Now the app uploads your media in bite-size chunks, and automatically retries if you lose your connection. This has been tested a great deal and works well in most everyday situations.</li>\n</ul>\n<p>In addition to the improvements and bug fixes, version 1.5 of WordPress for Windows Phone has also seen some minor UI enhancements and updates, as well as a number of crash fixes. All in all, we&#8217;re very happy with this release, which should make it even easier for you to blog from that fancy Windows Phone of yours.</p>\n<p>We&#8217;re not resting just yet though. What would you like to see added to or improved on in the app? Comment on this post or shout out on <a href="http://twitter.com/wpwindowsphone">Twitter</a> and let us know your thoughts.</p>\n<p>Huge thanks to everyone involved in this release: Dan Roundhill, Danilo Ercoli, Robert Collins, Max Cutler.</p>\n<br />  <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gocomments/wpwindowsphone.wordpress.com/238/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/comments/wpwindowsphone.wordpress.com/238/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/godelicious/wpwindowsphone.wordpress.com/238/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/delicious/wpwindowsphone.wordpress.com/238/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gofacebook/wpwindowsphone.wordpress.com/238/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/facebook/wpwindowsphone.wordpress.com/238/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gotwitter/wpwindowsphone.wordpress.com/238/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/twitter/wpwindowsphone.wordpress.com/238/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gostumble/wpwindowsphone.wordpress.com/238/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/stumble/wpwindowsphone.wordpress.com/238/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/godigg/wpwindowsphone.wordpress.com/238/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/digg/wpwindowsphone.wordpress.com/238/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/goreddit/wpwindowsphone.wordpress.com/238/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/reddit/wpwindowsphone.wordpress.com/238/" /></a> <img alt="" border="0" src="http://stats.wordpress.com/b.gif?host=windowsphone.wordpress.org&blog=16495748&post=238&subd=wpwindowsphone&ref=&feed=1" width="1" height="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 02 Feb 2012 11:00:16 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:11:"Isaac Keyet";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:31;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:14:"Matt: LIFE.com";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:21:"http://ma.tt/?p=40005";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:30:"http://ma.tt/2012/02/life-com/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:204:"<p><a href="http://life.time.com/">LIFE magazine has relaunched, powered by WordPress.com VIP</a>. I&#8217;m a huge fan of the magazine&#8217;s history and the work of photographers like John Dominis.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 01 Feb 2012 13:48:32 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:4:"Matt";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:32;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:57:"Weblog Tools Collection: WordPress Theme Releases for 2/1";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"http://weblogtoolscollection.com/?p=10991";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:73:"http://feedproxy.google.com/~r/weblogtoolscollection/UXMP/~3/t5vsxua94Rw/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1276:"<p><img class="alignnone size-full wp-image-10992" title="dusktodawn" src="http://weblogtoolscollection.com/wp-content/uploads/2012/02/dusktodawn.jpg" alt="" width="150" height="113" /></p>\n<p><a href="http://wordpress.org/extend/themes/dusk-to-dawn"><strong>Dusk To Dawn</strong></a> is a dark theme that melds old-style organic ornaments with modern design and typography.</p>\n<p><img class="alignnone size-full wp-image-10993" title="grisaille" src="http://weblogtoolscollection.com/wp-content/uploads/2012/02/grisaille.jpg" alt="" width="150" height="113" /></p>\n<p><a href="http://wordpress.org/extend/themes/grisaille"><strong>Grisaille</strong></a> is a classic and simple two-column design adjusted for mobile browsing.</p>\n<p><img class="alignnone size-full wp-image-10994" title="stark" src="http://weblogtoolscollection.com/wp-content/uploads/2012/02/stark.jpg" alt="" width="150" height="113" /></p>\n<p><a href="http://emptynestthemes.com/2012/01/25/stark-wordpress-theme/"><strong>Stark</strong></a> has 2 columns with a left sidebar, is of fluid width, has both an upper menu and a vertical menu, and is high contrast with vivid red, black and white.</p>\n<img src="http://feeds.feedburner.com/~r/weblogtoolscollection/UXMP/~4/t5vsxua94Rw" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 01 Feb 2012 13:00:39 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:5:"James";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:33;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:56:"WPTavern: DBS Interactive Releases Theme Reference Guide";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:31:"http://www.wptavern.com/?p=6215";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:108:"http://feedproxy.google.com/~r/WordpressTavern/~3/PhPkZy7osdE/dbs-interactive-releases-theme-reference-guide";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1089:"<p>DBS Interactive which is an interactive agency has released their version of a <a href="http://www.dbswebsite.com/design/wordpress-reference/V3/">WordPress 3.0+ theme reference guide</a>. The guide is a reworked version of the information you would find in the Codex around template tags. So if the Codex presentation of this data is not your cup of tea, perhaps this reference guide will be easier to follow. </p>\n<p>Related posts:<ol>\n<li><a href="http://www.wptavern.com/simple-guide-to-adding-theme-options" rel="bookmark" title="Simple Guide To Adding Theme Options">Simple Guide To Adding Theme Options</a></li>\n<li><a href="http://www.wptavern.com/good-guide-on-avoiding-themeplugin-lock-in" rel="bookmark" title="Good Guide On Avoiding Theme/Plugin Lock-In">Good Guide On Avoiding Theme/Plugin Lock-In</a></li>\n<li><a href="http://www.wptavern.com/idiots-guide-to-wordpress" rel="bookmark" title="Idiot&#8217;s Guide To WordPress">Idiot&#8217;s Guide To WordPress</a></li>\n</ol></p><img src="http://feeds.feedburner.com/~r/WordpressTavern/~4/PhPkZy7osdE" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 31 Jan 2012 18:00:40 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:6:"Jeffro";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:34;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:50:"WPTavern: Recovering From A Crashed WordPress Site";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:31:"http://www.wptavern.com/?p=6212";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:102:"http://feedproxy.google.com/~r/WordpressTavern/~3/wIuvpN4IMJc/recovering-from-a-crashed-wordpress-site";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1314:"<p>Themefuse has a <a href="http://themefuse.com/blog/restoring-wordpress-after-a-crash/">generally good checklist</a> on things to do when a WordPress powered website crashes. While the article doesn&#8217;t contain any drastically new information, it&#8217;s still a good list of things to do to get your site back up and running as soon as possible if a crash were to occur. </p>\n<p>Related posts:<ol>\n<li><a href="http://www.wptavern.com/5-tips-to-create-a-great-site-about-wordpress" rel="bookmark" title="5 Tips To Create A Great Site About WordPress">5 Tips To Create A Great Site About WordPress</a></li>\n<li><a href="http://www.wptavern.com/four-common-sense-ways-to-improve-security-on-your-wordpress-powered-site" rel="bookmark" title="Four Common Sense Ways To Improve Security On Your WordPress Powered Site">Four Common Sense Ways To Improve Security On Your WordPress Powered Site</a></li>\n<li><a href="http://www.wptavern.com/14-things-to-consider-when-choosing-a-webhost-for-your-wordpress-powered-site" rel="bookmark" title="14 Things To Consider When Choosing A Webhost For Your WordPress Powered Site">14 Things To Consider When Choosing A Webhost For Your WordPress Powered Site</a></li>\n</ol></p><img src="http://feeds.feedburner.com/~r/WordpressTavern/~4/wIuvpN4IMJc" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 31 Jan 2012 14:00:21 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:6:"Jeffro";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:35;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:72:"Weblog Tools Collection: The WordPress Theme Review Team Needs Your Help";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"http://weblogtoolscollection.com/?p=10987";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:73:"http://feedproxy.google.com/~r/weblogtoolscollection/UXMP/~3/dzoYM7R6jNM/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1268:"<p>Are you a <a href="http://wordpress.org/">WordPress</a> blogger? Do you enjoy having thousands of safe themes to choose from in <a href="http://wordpress.org/extend/themes/">the official directory</a>? Did you know that a small group of volunteers goes through every single line of code in every submitted theme to make sure that they work properly on a basic installation and are free from malicious code? Chances are, you didn&#8217;t know that last bit, but now you do.</p>\n<p><a href="http://make.wordpress.org/themes/">The Theme Review Team</a> could use your help, especially if you know your way around a theme or two. At this time, there are typically many more theme submissions than active reviewers, so if you&#8217;re looking for a great way to help out the entire WordPress community, <a href="http://make.wordpress.org/themes/about/how-to-join-wptrt/">join the Theme Review Team today</a>! If you&#8217;re a theme developer, but don&#8217;t have the free time to volunteer, you can at least help the team out by ensuring that your theme meets <a href="http://make.wordpress.org/themes/guidelines/">the guidelines</a> before submitting it.</p>\n<img src="http://feeds.feedburner.com/~r/weblogtoolscollection/UXMP/~4/dzoYM7R6jNM" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 31 Jan 2012 13:00:20 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:5:"James";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:36;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:73:"WPTavern: Do You Want To See Plugin Specific Dashboard Widgets Disappear?";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:31:"http://www.wptavern.com/?p=6205";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:124:"http://feedproxy.google.com/~r/WordpressTavern/~3/UsALJhPSMEg/do-you-want-to-see-plugin-specific-dashboard-widgets-disappear";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:2683:"<p>Joost de Valk was one of the first to start the trend and now, he&#8217;s on pace to reverse it. <a href="http://yoast.com/wordpress-dashboard-widgets/">Joost announced</a> that he has decided to remove the dashboard widget which shows the most recent posts on his site from his SEO plugin. </p>\n<p><a href="http://www.wptavern.com/wp-content/uploads/2012/01/YoastSEoDashboardWidget.png" rel="thumbnail"><img src="http://www.wptavern.com/wp-content/uploads/2012/01/YoastSEoDashboardWidget.png" alt="" title="YoastSEoDashboardWidget" width="472" height="361" class="aligncenter size-full wp-image-6210" /></a></p>\n<p>Joost provided some interesting statistics that show where most of his visitors are coming from. As it turns out, the dashboard news are did provide additional traffic but very little in the way of conversions which is one of the reasons for the removal. Looking at the reactions of those that use the plugin, some applaud Joost for this action while others wanted the ability to choose whether to hide or display the news widget. While not mentioned, I think it&#8217;s a little humorous as well that within the <a href="http://wpcandy.com/presents/wordpress-plugin-user-interface-guide">Plugin UI Guide</a> published by WPCandy recently, they featured the Dashboard News Widget of Joost De Valks SEO Plugin as what not to do.</p>\n<div class="aligncenter">Note: There is a poll embedded within this post, please visit the site to participate in this post''s poll.</div>\n<p>While I want to see the results of the poll question I asked, I&#8217;ll pose a few more questions for you to answer. When is it ok to have a dashboard widget such as the one that used to be within the WordPress SEO plugin by Yoast? Is the dashboard considered sacred real estate reserved for only the most important information? </p>\n<p>Personally, I like the trend of removing dashboard widgets generated by plugins. In this case, I think less is more. </p>\n<p>Related posts:<ol>\n<li><a href="http://www.wptavern.com/changing-feeds-in-the-wordpress-dashboard" rel="bookmark" title="Changing Feeds In The WordPress Dashboard">Changing Feeds In The WordPress Dashboard</a></li>\n<li><a href="http://www.wptavern.com/is-it-time-to-refocus-the-dashboard-for-news" rel="bookmark" title="Is It Time To Refocus The Dashboard For News?">Is It Time To Refocus The Dashboard For News?</a></li>\n<li><a href="http://www.wptavern.com/chances-of-wptavern-getting-into-dashboard" rel="bookmark" title="Chances Of WPTavern Getting Into Dashboard?">Chances Of WPTavern Getting Into Dashboard?</a></li>\n</ol></p><img src="http://feeds.feedburner.com/~r/WordpressTavern/~4/UsALJhPSMEg" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 30 Jan 2012 18:00:26 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:6:"Jeffro";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:37;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:57:"WPTavern: Theme Review Team Could Use Some More Reviewers";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:31:"http://www.wptavern.com/?p=6201";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:109:"http://feedproxy.google.com/~r/WordpressTavern/~3/it2qnaCX_lI/theme-review-team-could-use-some-more-reviewers";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:2267:"<p>The Theme Review Team <a href="http://make.wordpress.org/themes/2012/01/28/wptrt-irc-review-in-saturday-28-jan-11/">tried something new</a> this past weekend. Members of the review team that could make it, spent all day in IRC to review themes stuck in the <a href="http://themes.trac.wordpress.org/query?status=new&status=reopened&time=..14daysago&group=owner&col=id&col=summary&col=keywords&col=status&col=reporter&col=time&col=changetime&report=3&order=time">Priority 2 queue</a> which lists themes that have been stuck in the review process for more than two weeks. While the goal was to clear the queue, the last time I checked the number of themes was around 81. Some of the themes have been in the review process for over 6 weeks. Browsing through the queue, I even noticed two themes submitted by Automattic. One was called <a href="http://themes.trac.wordpress.org/ticket/6095">Duotone</a> which has been in the queue for 5 weeks with <a href="http://themes.trac.wordpress.org/ticket/5992">Bouquet</a> coming in at 6 weeks. Just goes to show that Automattic doesn&#8217;t receive preferential treatment when it comes to the review process. </p>\n<p>If you would like to see themes get through the review process faster, please consider joining the <a href="http://make.wordpress.org/themes/about/how-to-join-wptrt/">theme review team</a>. As a theme author, you can also help make the review process go faster by ensuring that your theme meets the <a href="http://make.wordpress.org/themes/guidelines/">following guidelines</a>.</p>\n<p>Related posts:<ol>\n<li><a href="http://www.wptavern.com/name-your-dream-theme-team" rel="bookmark" title="Name Your Dream Theme Team">Name Your Dream Theme Team</a></li>\n<li><a href="http://www.wptavern.com/wpweekly-episode-106-%e2%80%93-the-theme-review-team" rel="bookmark" title="WPWeekly Episode 106 – The Theme Review Team">WPWeekly Episode 106 – The Theme Review Team</a></li>\n<li><a href="http://www.wptavern.com/devpress-plans-to-launch-plugintheme-review-service" rel="bookmark" title="DevPress Plans To Launch Plugin/Theme Review Service">DevPress Plans To Launch Plugin/Theme Review Service</a></li>\n</ol></p><img src="http://feeds.feedburner.com/~r/WordpressTavern/~4/it2qnaCX_lI" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 30 Jan 2012 14:00:38 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:6:"Jeffro";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:38;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:59:"Weblog Tools Collection: WordPress Plugin Releases for 1/30";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"http://weblogtoolscollection.com/?p=10985";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:73:"http://feedproxy.google.com/~r/weblogtoolscollection/UXMP/~3/gltABUCXy4g/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:972:"<h3>New plugins</h3>\n<p><a href="http://jonasnordstrom.se/plugins/no-soup/"><strong>No Soup</strong></a> allows you to block users from a specific IP or range(s) of IPs and redirect them to another site.</p>\n<p><a href="http://safeskydiving.com/whatelse-wordpress-plugin/"><strong>WhatElse</strong></a> is a widget that lets you manually add related content to every post or page.</p>\n<h3>Updated plugins</h3>\n<p><a href="http://wordpress.org/extend/plugins/joemobi/"><strong>Joemobi</strong></a> allows you to create native Android and BlackBerry applications from your WordPress site.</p>\n<p><a href="http://wordpress.org/extend/plugins/loginradius-for-wordpress/"><strong>Social Login for WordPress</strong></a> lets your users log in and comment via their accounts with popular ID providers such as Facebook, Google, Twitter, Yahoo, Live, and over 15 more.</p>\n<img src="http://feeds.feedburner.com/~r/weblogtoolscollection/UXMP/~4/gltABUCXy4g" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 30 Jan 2012 13:00:38 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:5:"James";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:39;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:77:"WPTavern: WordPress Foundation To Foot The Bill For Meetup.com Organizer Dues";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:31:"http://www.wptavern.com/?p=6195";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:129:"http://feedproxy.google.com/~r/WordpressTavern/~3/CmtdvSxjhkY/wordpress-foundation-to-foot-the-bill-for-meetup-com-organizer-dues";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:3006:"<p><a href="http://www.wptavern.com/wp-content/uploads/2012/01/wordpressmeetups.png" rel="thumbnail"><img src="http://www.wptavern.com/wp-content/uploads/2012/01/wordpressmeetups.png" alt="" title="wordpressmeetups" width="148" height="97" class="alignright size-full wp-image-6196" /></a>In what I believe to be an excellent use of the WordPress Foundation, Jane Wells has <a href="http://wordpress.org/news/2012/01/year-of-the-meetup/">shared news</a> that the foundation plans on footing the bill for Meetup.com Organizer dues that need to be paid by the founder of the meetup group. Considering the amount of these dues range from $12-19/month it&#8217;s not exactly cheap. </p>\n<blockquote><p>We’re setting up an official WordPress account on Meetup.com right now, and over the next couple of weeks will be working with existing meetup group organizers, people who want to start a new meetup group, and the helpful folks at Meetup.com to put this program in place. WordPress meetup groups that choose to have their group become part of the WordPress account will no longer pay organizer dues for that group, as the WordPress Foundation will be footing the bill.</p>\n<p>This is exciting for several reasons. First, it means local organizers who are giving something back to the project by way of their time won’t also have shell out $12-19/month for the privilege. That alone is a big step. Second, it will open the door to more events and leaders within a community, since leadership and event planning won’t need to be tied to “owning” the meetup group. Third, more active meetup groups means more WordCamps, yay!</p></blockquote>\n<p>This is great news considering how many people use Meetup.com to control all aspects of their local WordPress meetups. Reading through the post, it looks like there are no strings attached but I wonder if by joining the official WordPress Meetup Group if at some point in the future, there will be some sort of Meetup guidelines published that those users will need to follow. If there are any guidelines that will need to be followed, I would hope that they are no where near as stringent as the <a href="http://plan.wordcamp.org/planning-details/">WordCamp guidelines</a>. </p>\n<p>If you&#8217;re already a Meetup.com WordPress group organizer or looking to get started, be sure to <a href="http://wordpressdotorg.polldaddy.com/s/wordpress-meetup-groups">take the survey</a> so it gives the foundation a good starting point.</p>\n<p>Related posts:<ol>\n<li><a href="http://www.wptavern.com/new-forum-for-wordpress-meetup-organizers" rel="bookmark" title="New Forum For WordPress Meetup Organizers">New Forum For WordPress Meetup Organizers</a></li>\n<li><a href="http://www.wptavern.com/my-experience-in-running-a-wordpress-meetup" rel="bookmark" title="My Experience In Running A WordPress Meetup">My Experience In Running A WordPress Meetup</a></li>\n</ol></p><img src="http://feeds.feedburner.com/~r/WordpressTavern/~4/CmtdvSxjhkY" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 28 Jan 2012 18:00:36 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:6:"Jeffro";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:40;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:42:"WPTavern: Uncensoring The Web With RePress";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:31:"http://www.wptavern.com/?p=6191";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:94:"http://feedproxy.google.com/~r/WordpressTavern/~3/4c3gxRDpFNQ/uncensoring-the-web-with-repress";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:2489:"<p>A brand new plugin released by GreenHost aims to make censoring the web next to impossible. It&#8217;s called <a href="http://wordpress.org/extend/plugins/repress/">RePress</a> and turns any WordPress powered website it&#8217;s installed on into a proxy server. The plugin was created in response to piratebay.org being blocked within the Netherlands due to a court ruling. </p>\n<div id="attachment_6192" class="wp-caption aligncenter"><a href="http://www.wptavern.com/wp-content/uploads/2012/01/HeaderImageForRepressPlugin.png" rel="thumbnail"><img src="http://www.wptavern.com/wp-content/uploads/2012/01/HeaderImageForRepressPlugin-500x143.png" alt="" title="HeaderImageForRepressPlugin" width="500" height="143" class="size-large wp-image-6192" /></a><p class="wp-caption-text">Header Image As Seen On Their WordPress.org Plugin Page</p></div>\n<p>RePress uses <a href="http://code.google.com/p/phproxyimproved/">phpproxyimproved</a> as its HTML parser which is another piece of open source code that allows the proxy magic to happen. After installing the plugin, you&#8217;ll need to give it a unique URL that will be used when going through the proxy to the blocked website. I received the following message after trying to view one of the default websites that are added to the proxy list:</p>\n<blockquote><p>\nIn order to protect your blog from cross-site scripting attacks, please log out of your WordPress administration backend before accessing any of the proxied site urls.<br />\nPlease log out of WordPress by clicking on this logout link.</p>\n<p>Afterwards you will be directly redirected to the proxied website.<br />\nFor security reasons. This will also delete all cookies for this domain (your remembered settings will be lost). </p></blockquote>\n<p>So if there is a particular website that you visit often using your site as a proxy, you&#8217;ll need to bookmark the URL and visit it only when you&#8217;re logged out of WordPress. </p>\n<p>If you decide to give RePress a try, please give GreenHost some feedback on it <a href="http://www.wptavern.com/forum/plugins-hacks/2380-repress-plugin-uncensor-web-wordpress.html">via the following forum thread.</a> </p>\n<p>Related posts:<ol>\n<li><a href="http://www.wptavern.com/addicott-web-suggests-6-more-plugins" rel="bookmark" title="Addicott Web Suggests 6 More Plugins">Addicott Web Suggests 6 More Plugins</a></li>\n</ol></p><img src="http://feeds.feedburner.com/~r/WordpressTavern/~4/4c3gxRDpFNQ" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 28 Jan 2012 14:00:23 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:6:"Jeffro";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:41;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:58:"Weblog Tools Collection: WordPress Theme Releases for 1/28";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"http://weblogtoolscollection.com/?p=10979";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:73:"http://feedproxy.google.com/~r/weblogtoolscollection/UXMP/~3/26HHIoHN32o/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:770:"<p><img class="alignnone size-full wp-image-10981" title="putte" src="http://weblogtoolscollection.com/wp-content/uploads/2012/01/putte.jpg" alt="" width="150" height="113" /></p>\n<p><a href="http://gazpo.com/2012/01/wordpress-theme-putte/"><strong>Putte</strong></a> is a clean and beautiful theme with great features.</p>\n<p><img class="alignnone size-full wp-image-10980" title="redmodern" src="http://weblogtoolscollection.com/wp-content/uploads/2012/01/redmodern.jpg" alt="" width="150" height="113" /></p>\n<p><a href="http://wordpress.org/extend/themes/red-modern"><strong>Red Modern</strong></a> is an elegant theme with red modern menus and elements.</p>\n<img src="http://feeds.feedburner.com/~r/weblogtoolscollection/UXMP/~4/26HHIoHN32o" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 28 Jan 2012 13:00:56 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:5:"James";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:42;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:59:"Peter Westwood: Tracing things back to where they came from";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:34:"http://westi.wordpress.com/?p=6337";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:82:"http://westi.wordpress.com/2012/01/28/tracing-things-back-to-where-they-came-from/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:6248:"<p>One of the things I find myself doing a lot when developing WordPress is debugging things and so I spend a lot of time thinking of ways I can make this easier for me and easier for everyone else. Overtime this had led to a number of significant improvements to the debug ability of WordPress core including things like <a href="http://core.trac.wordpress.org/ticket/5033">WP_DEBUG</a> and the Deprecated Notices as well as the development of great tools like the <a href="http://westi.wordpress.com/2011/01/05/introducing-debug-bar/">Debug Bar plugin</a>.</p>\n<p>Recently I&#8217;ve found that the more context you can get to an issue the easier it is to understand and debug and I also noticed that while we recorded a simple backtrace for queries in core when <code>SAVEQUERIES</code> was defined we didn&#8217;t do a good job of presenting the data. Some function calls need more context that just the function name to be most useful &#8211; such as when running an action/filter it is useful to know the name and when requiring or including a file is useful to know the file name and some path context. This lead to the idea of refactoring the backtrace capture functionality out of WPDB and into a function that was improved to give proper calling syntax for functions in classes when called statically and was more obviously re-usable by plugins like the Debug Bar.</p>\n<p>So today I have introduced <code>wp_debug_backtrace_summary( $ignore_class = null, $skip_frames = 0, $pretty = true )</code> for <a href="http://core.trac.wordpress.org/ticket/19589">#19589</a>. If you provide no arguments you will get back string containing the full trace of the code run up to the place where you call <code>wp_debug_backtrace_summary()</code> &#8211; you won&#8217;t see the call to it in the trace as it always hides itself.</p>\n<p>The best way to see the difference and improvements is to look at how this improves the information in the development version of the Debug Bar (new release coming soon) so after the break I have included some before and after screenshots.</p>\n<p><span id="more-6337"></span></p>\n<div id="attachment_6338" class="wp-caption aligncenter"><a href="http://westi.files.wordpress.com/2012/01/queries-before.png"><img class="size-full wp-image-6338" title="queries-before" src="http://westi.files.wordpress.com/2012/01/queries-before.png?w=630&h=101" alt="" width="630" height="101" /></a><p class="wp-caption-text">Debug Bar query list before the change showing the previous limited infomation</p></div>\n<div id="attachment_6339" class="wp-caption aligncenter"><a href="http://westi.files.wordpress.com/2012/01/queries-after.png"><img class="size-full wp-image-6339" title="queries-after" src="http://westi.files.wordpress.com/2012/01/queries-after.png?w=630&h=152" alt="" width="630" height="152" /></a><p class="wp-caption-text">Development version of the Debug Bar showing the enhanced details</p></div>\n<div id="attachment_6340" class="wp-caption aligncenter"><a href="http://westi.files.wordpress.com/2012/01/warnings-before.png"><img class="size-full wp-image-6340" title="warnings-before" src="http://westi.files.wordpress.com/2012/01/warnings-before.png?w=630&h=48" alt="" width="630" height="48" /></a><p class="wp-caption-text">An example of how the Debug Bar currently displays warnings, notices and deprecated function calls.</p></div>\n<div id="attachment_6341" class="wp-caption aligncenter"><a href="http://westi.files.wordpress.com/2012/01/warnings-after.png"><img class="size-full wp-image-6341" title="warnings-after" src="http://westi.files.wordpress.com/2012/01/warnings-after.png?w=630&h=76" alt="" width="630" height="76" /></a><p class="wp-caption-text">The development version of the Debug Bar showing how it can use this new function to display much more useful information</p></div>\n<p>One of the things I suspect I will be doing a lot with this new function is dropping calls to <code>error_log( </code><code>wp_debug_backtrace_summary</code>() ); into code that I am trying to debug and work out how often and from where it is being called.  In the past I&#8217;ve done this by using <code>print_r( debug_backtrace() );</code> which prints out a lot of information (some of which is pretty useful) and more recently I&#8217;ve been using <code>print_r( debug_backtrace( false ) );</code> so as to only fetch and print the stack traces.</p>\n<p>Using this new function does mean I lose by using  the access to line numbers and file names I had from the raw PHP functions but I find that with the file names in the require/include calls and the function name being called I can get to the code just as fast as before.</p>\n<p>I hope you all put this new function to good use!</p>\n<br />  <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gocomments/westi.wordpress.com/6337/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/comments/westi.wordpress.com/6337/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/godelicious/westi.wordpress.com/6337/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/delicious/westi.wordpress.com/6337/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gofacebook/westi.wordpress.com/6337/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/facebook/westi.wordpress.com/6337/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gotwitter/westi.wordpress.com/6337/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/twitter/westi.wordpress.com/6337/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gostumble/westi.wordpress.com/6337/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/stumble/westi.wordpress.com/6337/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/godigg/westi.wordpress.com/6337/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/digg/westi.wordpress.com/6337/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/goreddit/westi.wordpress.com/6337/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/reddit/westi.wordpress.com/6337/" /></a> <img alt="" border="0" src="http://stats.wordpress.com/b.gif?host=westi.wordpress.com&blog=15396&post=6337&subd=westi&ref=&feed=1" width="1" height="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 28 Jan 2012 12:14:26 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:14:"Peter Westwood";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:43;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:28:"Dev Blog: Year of the Meetup";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=2210";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:53:"http://wordpress.org/news/2012/01/year-of-the-meetup/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:6299:"<p>We hereby declare 2012 as the Year of the WordPress Meetup. You&#8217;ll want to get in on this action.</p>\n<blockquote><p><strong>meet&middot;up</strong> \\<strong>m&#275;t</strong>-&#601;p\\ <em>noun</em><br />\nA meeting, especially a regular meeting of people who share a particular interest and have connected with each other through a social-networking Web site: <em>a meetup for new moms in the neighborhood; a meetup to plan the trip; a meetup for WordPress users.</em><sup>1</sup></p></blockquote>\n<p>So what is a <em>WordPress Meetup</em>? Basically, it&#8217;s people in a community getting together &#8212; meeting up &#8212; who share an interest in WordPress, whether they be bloggers, business users, developers, consultants, or any other category of person able to say, &#8220;I use WordPress in some way and I like it, and I want to meet other people who can say the same.&#8221; Meetups come in different shapes and sizes, but they all carry the benefit of connecting you with potential collaborators and friends, and helping you learn more about what you can do with WordPress. Here are some of the common types of WordPress meetups:</p>\n<ul>\n<li>Hang out and work on your WordPress sites together</li>\n<li>Social/happy hour type gatherings</li>\n<li>Mini-lectures/presentations</li>\n<li>Developer hacking meetups</li>\n<li>Show &amp; tell of how group members are using WordPress</li>\n<li>Formal instruction on how to use WordPress</li>\n<li>Lecture series (possibly with visiting speakers)</li>\n<li>Genius bar/help desk</li>\n</ul>\n<p>There&#8217;s no prescribed format, as each local group can decide for itself what they want to do. Some groups mix it up from month to month, while others have multiple events each month to satisfy the needs of their community.</p>\n<p>The tough part? Running a popular group takes time and money. Just as we worked last year to remove the financial burden for <a href="http://wordcamp.org">WordCamp</a> organizers and provide logistical support so they could focus more on their event content and experience, we want to start extending that kind of support to meetup groups as well. We don&#8217;t want it to cost anything for someone to run a WordPress meetup, or to attend one &#8212; building local communities should be as free as WordPress itself!</p>\n<p>Since there are so many more meetups than there are WordCamps, we&#8217;re going to start with the cost that is the same for every group: meetup.com organizer dues. We&#8217;re setting up an official WordPress account on <a href="http://Meetup.com">Meetup.com</a> right now, and over the next couple of weeks will be working with existing meetup group organizers, people who want to start a new meetup group, and the helpful folks at Meetup.com to put this program in place. WordPress meetup groups that choose to have their group become part of the WordPress account will no longer pay organizer dues for that group, as the <a href="http://wordpressfoundation.org">WordPress Foundation</a> will be footing the bill.</p>\n<p>This is exciting for several reasons. First, it means local organizers who are giving something back to the project by way of their time won&#8217;t also have shell out $12-19/month for the privilege. That alone is a big step. Second, it will open the door to more events and leaders within a community, since leadership and event planning won&#8217;t need to be tied to &#8220;owning&#8221; the meetup group. Third, more active meetup groups means more WordCamps, yay!</p>\n<p>In addition to the financial aspects, we&#8217;ll be working on ways to improve social recognition of meetup activity by incorporating feeds from the official meetup groups into the WordPress.org site, and including meetup group participation in the activity stream on your <a href="http://profiles.wordpress.org/">WordPress.org profile</a>.<sup>2</sup> I&#8217;m also hoping we can do something around providing video equipment to meetup groups (like we already do for WordCamps) to record presentations and tutorials that can be posted to <a href="http://WordPress.tv">WordPress.tv</a>, helping meetup groups offer WordPress classes in their community, and getting involved with mentoring WordPress clubs at local schools and universities. Oh, and we&#8217;ll send out some WordPress buttons and stickers to the groups that join in, because everyone loves buttons and stickers.</p>\n<p>We&#8217;re also putting together some cool resources for people who want to start a new meetup group. There will be a field guide to getting started and some supplies to help you get your group going, and a forum for organizers to talk to and learn from each other.</p>\n<p>Over time, we&#8217;ll be talking to organizers and looking at what other expenses we can absorb and what other support we can provide to local groups. For now, we&#8217;re starting with the organizer dues. If you currently run a WordPress meetup group (whether you are using Meetup.com or not) or would like to start a WordPress meetup group in your area, please fill out our <a href="http://wordpressdotorg.polldaddy.com/s/wordpress-meetup-groups">WordPress Meetup Groups survey</a>. Filling in the survey doesn&#8217;t obligate you to join the official group, it just gives us a starting point to a) find out what groups are around/interested, and b) get some information on existing groups and their expenses and needs. Meetup.com will contact the group organizers who&#8217;ve said they&#8217;d like to join the new program, and will walk them through the logistics of the change and answer questions before helping them to opt-in officially.</p>\n<p>So, if you currently run a WordPress meetup group, or you would like to start one, please  fill out our <a href="http://wordpressdotorg.polldaddy.com/s/wordpress-meetup-groups">WordPress Meetup Groups survey</a>. I can&#8217;t wait to see more meetups!</p>\n<p><strong>1</strong> &#8211; Adapted from <a href="http://dictionary.reference.com/browse/meetup">&#8220;meetup&#8221; definition at dictionary.com</a>.<br />\n<strong>2</strong> &#8211; Didn&#8217;t know about profiles? Check out http://profiles.wordpress.org/users/yourwordpressdotorgusernamehere (put in the username you use in the WordPress.org forums) to see yours!</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 27 Jan 2012 20:17:49 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:10:"Jane Wells";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:44;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:72:"Weblog Tools Collection: PressTrends Releases Plugin for WordPress Blogs";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"http://weblogtoolscollection.com/?p=10974";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:73:"http://feedproxy.google.com/~r/weblogtoolscollection/UXMP/~3/SQ0Skz3I3vY/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1021:"<p><a href="http://presstrends.io/">PressTrends</a> has released <a href="http://presstrends.io/blog/2012/01/introducing-presstrends-plugin-for-wordpress/">a rather fascinating plugin</a> for <a href="http://wordpress.org/">WordPress</a> blogs. <a href="http://wordpress.org/extend/plugins/presstrends/">The plugin</a> will allow you to measure various metrics for your posts, comments, and plugin usage, and compare these to averages across the entire PressTrends community.</p>\n<p>The feature list may be just a bit basic now, but there are more features on the way, the design is very clean-cut, and if you&#8217;re interested to see how you&#8217;re doing versus &#8220;the status quo,&#8221; this is definitely the way to do it.</p>\n<p>If you&#8217;re a theme designer, you might also be interested in <a href="http://presstrends.io/learn">their core product</a>, which provides metrics for theme usage.</p>\n<img src="http://feeds.feedburner.com/~r/weblogtoolscollection/UXMP/~4/SQ0Skz3I3vY" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 27 Jan 2012 13:00:32 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:5:"James";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:45;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:72:"WordPress.tv: Christopher Ross: Make a Living by Giving it Away for Free";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:27:"http://wordpress.tv/?p=9311";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:89:"http://wordpress.tv/2012/01/27/christopher-ross-make-a-living-by-giving-it-away-for-free/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1878:"<div id="v-lNawX8wM-1" class="video-player">\n</div>\n<br />  <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gocomments/wptv.wordpress.com/9311/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/comments/wptv.wordpress.com/9311/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/godelicious/wptv.wordpress.com/9311/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/delicious/wptv.wordpress.com/9311/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gofacebook/wptv.wordpress.com/9311/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/facebook/wptv.wordpress.com/9311/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gotwitter/wptv.wordpress.com/9311/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/twitter/wptv.wordpress.com/9311/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gostumble/wptv.wordpress.com/9311/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/stumble/wptv.wordpress.com/9311/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/godigg/wptv.wordpress.com/9311/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/digg/wptv.wordpress.com/9311/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/goreddit/wptv.wordpress.com/9311/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/reddit/wptv.wordpress.com/9311/" /></a> <img alt="" border="0" src="http://stats.wordpress.com/b.gif?host=wordpress.tv&blog=5089392&post=9311&subd=wptv&ref=&feed=1" width="1" height="1" /><div><a href="http://wordpress.tv/2012/01/27/christopher-ross-make-a-living-by-giving-it-away-for-free/"><img alt="WC Toronto 2011 &#8211; Make a Living by Giving it Away for Free" src="http://videos.videopress.com/lNawX8wM/wcto-make-a-living-by-giving-it-away-for-free-1_scruberthumbnail_0.jpg" width="160" height="120" /></a></div>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 27 Jan 2012 11:00:04 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"wctoronto";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:46;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:63:"WordPress.tv: Trevor Mills: Building Mobile Apps with WordPress";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:27:"http://wordpress.tv/?p=9078";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:80:"http://wordpress.tv/2012/01/26/trevor-mills-building-mobile-apps-with-wordpress/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1859:"<div id="v-Q1ibRp6W-1" class="video-player">\n</div>\n<br />  <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gocomments/wptv.wordpress.com/9078/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/comments/wptv.wordpress.com/9078/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/godelicious/wptv.wordpress.com/9078/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/delicious/wptv.wordpress.com/9078/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gofacebook/wptv.wordpress.com/9078/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/facebook/wptv.wordpress.com/9078/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gotwitter/wptv.wordpress.com/9078/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/twitter/wptv.wordpress.com/9078/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gostumble/wptv.wordpress.com/9078/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/stumble/wptv.wordpress.com/9078/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/godigg/wptv.wordpress.com/9078/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/digg/wptv.wordpress.com/9078/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/goreddit/wptv.wordpress.com/9078/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/reddit/wptv.wordpress.com/9078/" /></a> <img alt="" border="0" src="http://stats.wordpress.com/b.gif?host=wordpress.tv&blog=5089392&post=9078&subd=wptv&ref=&feed=1" width="1" height="1" /><div><a href="http://wordpress.tv/2012/01/26/trevor-mills-building-mobile-apps-with-wordpress/"><img alt="WC Toronto 2011 &#8211; Building Mobile Apps with WordPress" src="http://videos.videopress.com/Q1ibRp6W/wcto-building-mobile-apps-with-wordpress_1_scruberthumbnail_0.jpg" width="160" height="120" /></a></div>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 27 Jan 2012 05:00:08 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"wctoronto";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:47;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:55:"WordPress.tv: Ron & Andrea Rennick: WordPress Multisite";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:27:"http://wordpress.tv/?p=9076";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:70:"http://wordpress.tv/2012/01/26/ron-andrea-rennick-wordpress-multisite/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1817:"<div id="v-QKDrBrqz-1" class="video-player">\n</div>\n<br />  <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gocomments/wptv.wordpress.com/9076/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/comments/wptv.wordpress.com/9076/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/godelicious/wptv.wordpress.com/9076/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/delicious/wptv.wordpress.com/9076/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gofacebook/wptv.wordpress.com/9076/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/facebook/wptv.wordpress.com/9076/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gotwitter/wptv.wordpress.com/9076/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/twitter/wptv.wordpress.com/9076/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gostumble/wptv.wordpress.com/9076/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/stumble/wptv.wordpress.com/9076/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/godigg/wptv.wordpress.com/9076/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/digg/wptv.wordpress.com/9076/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/goreddit/wptv.wordpress.com/9076/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/reddit/wptv.wordpress.com/9076/" /></a> <img alt="" border="0" src="http://stats.wordpress.com/b.gif?host=wordpress.tv&blog=5089392&post=9076&subd=wptv&ref=&feed=1" width="1" height="1" /><div><a href="http://wordpress.tv/2012/01/26/ron-andrea-rennick-wordpress-multisite/"><img alt="WC Toronto 2011 &#8211; WordPress Multisite" src="http://videos.videopress.com/QKDrBrqz/wcto-wordpress-multisite_1_scruberthumbnail_0.jpg" width="160" height="120" /></a></div>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 26 Jan 2012 23:00:15 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"wctoronto";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:48;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:57:"WPTavern: Interview With ManageWP Owner Vladimir Prelovac";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:31:"http://www.wptavern.com/?p=6181";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:109:"http://feedproxy.google.com/~r/WordpressTavern/~3/cuOdRQUE2OY/interview-with-managewp-owner-vladimir-prelovac";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:8214:"<p><a href="https://managewp.com/">ManageWP</a> is a new service that aims to make managing multiple websites as easy as possible. They&#8217;ve recently opened their doors to the public and Vladimir Prelovac was kind enough to take some time out of his schedule to answer a few questions I had. Enjoy!</p>\n<p><strong>Is ManageWP a webhosting company or simply a means of managing websites that are hosted elsewhere?</strong></p>\n<p>We are not a webhosting company, as ManageWP provides an efficient way to manage any number of websites that are hosted on your own servers, but we do offer something new and unique to the WordPress community: one dashboard for all their websites no matter where they are hosted. This ensures that our users maintain total control over their websites while also ensuring that they can continue to expand, without restriction, far into the future.</p>\n<div id="attachment_6184" class="wp-caption aligncenter"><a href="http://www.wptavern.com/wp-content/uploads/2012/01/managewp1.png" rel="thumbnail"><img class="size-large wp-image-6184" title="managewp1" src="http://www.wptavern.com/wp-content/uploads/2012/01/managewp1-500x179.png" alt="" width="500" height="179" /></a><p class="wp-caption-text">ManageWP Dashboard After I Added The WPTavern Website</p></div>\n<p><strong>What was the idea or inspiration behind creating ManageWP?</strong></p>\n<p>As with all plugins I have developed, ManageWP was created out of the pure need to solve a problem. The problem here was having to do repetitive tasks — like updating and maintaining your sites (something computers and Internet services are supposed to be good at).</p>\n<p>As you surely know, managing numerous WordPress sites can be somewhat time consuming. Add several WordPress sites into the mix, and you quickly become a slave to your CMS. I wanted to simplify the process, so that was when ManageWP became reality.</p>\n<p><strong>What are some of the things going on behind the scenes to make ManageWP function like a well oiled machine?</strong></p>\n<p>It requires a tremendous amount of effort by all of our team members. That’s the first thing that springs to mind. It’s not easy to create and maintain a service this complex, one which also remains in sync with the WordPress development cycle, all while having it work with thousands of different WordPress setups and with thousands of different server/hosting configurations.</p>\n<p>It’s not an easy job. But we also have no intention of stopping anytime soon!</p>\n<div id="attachment_6186" class="wp-caption aligncenter"><a href="http://www.wptavern.com/wp-content/uploads/2012/01/managewp2.png" rel="thumbnail"><img class="size-large wp-image-6186" title="managewp2" src="http://www.wptavern.com/wp-content/uploads/2012/01/managewp2-500x336.png" alt="" width="500" height="336" /></a><p class="wp-caption-text">Options To Schedule A Backup For A Particular Site</p></div>\n<p><strong>What are some of the benefits of using ManageWP versus using WordPress Multisite?</strong></p>\n<p>The most notable benefit is ManageWP’s ease of us. While being a good idea on paper, WordPress Multisite demands a certain level of technical knowledge to install, manage, and maintain. It also takes time, time which many people find valuable. And while Multisite might be good enough for some people, we always want to offer our users so much more value and time-saving functionality.</p>\n<p>And we differentiate ourselves by providing many awesome features:</p>\n<ul>\n<li>you can set up and monitor fully automated backups for all of your websites from one location, along with being able to specify exactly where you want those backups stored;</li>\n<li>you can use ManageWP to monitor your website’s up-time;</li>\n<li>you can use ManageWP to monitor crucial SEO performance metrics;</li>\n<li>you can take advantage of incredible third-party services like Google Analytics and DropBox;</li>\n<li>you can change passwords for your admin user on all of your WordPress sites from within ManageWP;</li>\n<li>and the list goes on and on.</li>\n</ul>\n<p>As for the similarities between ManageWP and WordPress Multisite — it ends with the ability to update plugins. ManageWP goes far beyond that. However, if you’re already setup with WordPress Multisite, that’s no problem. ManageWP fully integrates with that too!</p>\n<p><strong>What types of security practices have been put into place to protect customers?</strong></p>\n<p>We know that the success of our business depends a lot on security; this has been our focus since day one. To ensure that our user’s data is secure, we dropped the built-in XML RPC protocol — it’s inherently insecure to work with as it exposes sensitive data. We replaced it with OpenSSL encryption. Because of this, the transmission of your data remains completely secure.</p>\n<p>We also never ask users to enter their admin passwords for any websites they are managing with us. We do not have access to your site’s credentials and other crucial information. Our technology is innovative in that it allows ManageWP to talk directly to your WordPress sites through our ManageWP Worker plugin. So by utilizing WordPress’ built-in plugin architecture, we are able to do amazing things to help you manage all of your sites.</p>\n<p>As for protecting your ManageWP account, we utilize multiple layers of protection: restricting the login by IP address and two-factor authentication (wherein a security code is sent to user’s email or phone via SMS). This is far beyond industry standards, and it’s only a handful of the things we do to ensure that our users’ sites are safe.</p>\n<p>We take great pride in this.</p>\n<div id="attachment_6187" class="wp-caption aligncenter"><a href="http://www.wptavern.com/wp-content/uploads/2012/01/managewp3.png" rel="thumbnail"><img src="http://www.wptavern.com/wp-content/uploads/2012/01/managewp3-500x222.png" alt="" title="managewp3" width="500" height="222" class="size-large wp-image-6187" /></a><p class="wp-caption-text">All Sorts Of Cool Things You Can Do From One Location</p></div>\n<p><strong>Are there any differences between the self-hosted product of ManageWP and the ManageWP website?</strong></p>\n<p>The Enterprise (self-hosted) version of ManageWP is essentially the same as our hosted version. But we offer this to companies and organizations that want all of the benefits of ManageWP in the privacy of their own hosting environment. For example, this can be (and usually is) important for data compliance within larger organizations.</p>\n<p>Our Enterprise users also enjoy our full attention and dedicated support. We often work with our Enterprise customers to provide them with the special features that they need. We always make the extra effort to ensure that our customers&#8217; needs are served.</p>\n<p><strong>How has your experience in developing plugins and working with sites such as Mashable contribute to what you&#8217;ve accomplished with ManageWP?</strong></p>\n<p>I started making WordPress plugins almost five years ago, so getting to know WordPress inside-out helped me tremendously in understanding the needs of the average WordPress user — if such user exists at all, as there are so many uses for WordPress today. After that, it was then only a matter of coordinating with our team to develop a high-quality solution that works on almost any number of different WordPress setups.</p>\n<p>And now that we have launched ManageWP, I can direct my focus my attention on improving it further and adding new and amazing functionality. That makes me very happy. I hope it will continue to make our incredible customers happy as well.</p>\n<p>Related posts:<ol>\n<li><a href="http://www.wptavern.com/talking-wordpress-with-vladimir-prelovac" rel="bookmark" title="Talking WordPress With Vladimir Prelovac">Talking WordPress With Vladimir Prelovac</a></li>\n<li><a href="http://www.wptavern.com/wordpress-and-how-it-changed-content-management" rel="bookmark" title="WordPress And How It Changed Content Management">WordPress And How It Changed Content Management</a></li>\n</ol></p><img src="http://feeds.feedburner.com/~r/WordpressTavern/~4/cuOdRQUE2OY" height="1" width="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 26 Jan 2012 18:00:25 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:6:"Jeffro";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:49;a:6:{s:4:"data";s:13:"\n	\n	\n	\n	\n	\n	\n";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:86:"WordPress.tv: Mark Reale & Khori Armstrong: Using WordPress to Build Interactive Games";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:27:"http://wordpress.tv/?p=9074";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:101:"http://wordpress.tv/2012/01/26/mark-reale-khori-armstrong-using-wordpress-to-build-interactive-games/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1894:"<div id="v-Rr592zoO-1" class="video-player">\n</div>\n<br />  <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gocomments/wptv.wordpress.com/9074/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/comments/wptv.wordpress.com/9074/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/godelicious/wptv.wordpress.com/9074/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/delicious/wptv.wordpress.com/9074/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gofacebook/wptv.wordpress.com/9074/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/facebook/wptv.wordpress.com/9074/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gotwitter/wptv.wordpress.com/9074/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/twitter/wptv.wordpress.com/9074/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/gostumble/wptv.wordpress.com/9074/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/stumble/wptv.wordpress.com/9074/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/godigg/wptv.wordpress.com/9074/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/digg/wptv.wordpress.com/9074/" /></a> <a rel="nofollow" href="http://feeds.wordpress.com/1.0/goreddit/wptv.wordpress.com/9074/"><img alt="" border="0" src="http://feeds.wordpress.com/1.0/reddit/wptv.wordpress.com/9074/" /></a> <img alt="" border="0" src="http://stats.wordpress.com/b.gif?host=wordpress.tv&blog=5089392&post=9074&subd=wptv&ref=&feed=1" width="1" height="1" /><div><a href="http://wordpress.tv/2012/01/26/mark-reale-khori-armstrong-using-wordpress-to-build-interactive-games/"><img alt="WC Toronto 2011 &#8211; Using WordPress to Build Interactive Games" src="http://videos.videopress.com/Rr592zoO/wcto-using-wordpress-to-build-interactive-games_1_scruberthumbnail_0.jpg" width="160" height="120" /></a></div>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 26 Jan 2012 17:00:52 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"wctoronto";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}}}}}}}}}}s:4:"type";i:128;s:7:"headers";a:9:{s:6:"server";s:5:"nginx";s:4:"date";s:29:"Mon, 13 Feb 2012 12:46:02 GMT";s:12:"content-type";s:15:"application/xml";s:10:"connection";s:5:"close";s:4:"vary";s:15:"Accept-Encoding";s:13:"last-modified";s:29:"Mon, 13 Feb 2012 12:30:14 GMT";s:14:"content-length";s:6:"135796";s:4:"x-nc";s:11:"HIT luv 139";s:13:"accept-ranges";s:5:"bytes";}s:5:"build";s:14:"20090627192103";}', 'no'),
(949, 0, '_transient_timeout_feed_mod_57bc725ad6568758915363af670fd8bc', '1329180362', 'no'),
(950, 0, '_transient_feed_mod_57bc725ad6568758915363af670fd8bc', '1329137162', 'no'),
(954, 0, '_transient_feed_mod_1a5f760f2e2b48827d4974a60857e7c2', '1329137162', 'no'),
(958, 0, '_transient_dash_de3249c4736ad3bd2cd29147c4a0d43e', '<h4>Most Popular</h4>\n<h5><a href=''http://wordpress.org/extend/plugins/si-contact-form/''>Fast Secure Contact Form</a></h5>&nbsp;<span>(<a href=''plugin-install.php?tab=plugin-information&amp;plugin=si-contact-form&amp;_wpnonce=d6783ed0d2&amp;TB_iframe=true&amp;width=600&amp;height=800'' class=''thickbox'' title=''Fast Secure Contact Form''>Install</a>)</span>\n<p>A super customizable contact form that lets your visitors send you email. Blocks all automated spammers. No templates to mess with.</p>\n<h4>Newest Plugins</h4>\n<h5><a href=''http://wordpress.org/extend/plugins/valentines-day/''>Valentine&#039;s Day</a></h5>&nbsp;<span>(<a href=''plugin-install.php?tab=plugin-information&amp;plugin=valentines-day&amp;_wpnonce=ff276737ac&amp;TB_iframe=true&amp;width=600&amp;height=800'' class=''thickbox'' title=''Valentine&#039;s Day''>Install</a>)</span>\n<p>Display falling hearts and tunes on Saint Valentine&#039;s Day to express love with you website.</p>\n<h4>Recently Updated</h4>\n<h5><a href=''http://wordpress.org/extend/plugins/ajax-contact-me/''>Contact Me</a></h5>&nbsp;<span>(<a href=''plugin-install.php?tab=plugin-information&amp;plugin=ajax-contact-me&amp;_wpnonce=01ae5706b5&amp;TB_iframe=true&amp;width=600&amp;height=800'' class=''thickbox'' title=''Contact Me''>Install</a>)</span>\n<p>Contact Me is an elegant and light AJAX contact form. Activate the plugin and insert simple short code [contactme] into posts/pages.</p>\n', 'no'),
(953, 0, '_transient_timeout_feed_mod_1a5f760f2e2b48827d4974a60857e7c2', '1329180362', 'no'),
(945, 0, '_transient_timeout_feed_mod_a5420c83891a9c88ad2a4f04584a5efc', '1329180362', 'no'),
(946, 0, '_transient_feed_mod_a5420c83891a9c88ad2a4f04584a5efc', '1329137162', 'no'),
(943, 0, '_transient_timeout_feed_a5420c83891a9c88ad2a4f04584a5efc', '1329180362', 'no'),
(944, 0, '_transient_feed_a5420c83891a9c88ad2a4f04584a5efc', 'a:4:{s:5:"child";a:1:{s:0:"";a:1:{s:3:"rss";a:1:{i:0;a:6:{s:4:"data";s:3:"\n	\n";s:7:"attribs";a:1:{s:0:"";a:1:{s:7:"version";s:3:"2.0";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:1:{s:7:"channel";a:1:{i:0;a:6:{s:4:"data";s:72:"\n		\n		\n		\n		\n		\n		\n				\n\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n\n	";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:39:"WordPress Plugins » View: Most Popular";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:51:"http://wordpress.org/extend/plugins/browse/popular/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:39:"WordPress Plugins » View: Most Popular";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"language";a:1:{i:0;a:5:{s:4:"data";s:5:"en-US";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 13 Feb 2012 12:33:34 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:9:"generator";a:1:{i:0;a:5:{s:4:"data";s:25:"http://bbpress.org/?v=1.1";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"item";a:15:{i:0;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:27:"Matt Mullenweg on "Akismet"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:52:"http://wordpress.org/extend/plugins/akismet/#post-15";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 09 Mar 2007 22:11:30 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:39:"15@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:98:"Akismet checks your comments against the Akismet web service to see if they look like spam or not.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:14:"Matt Mullenweg";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:1;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:36:"Takayuki Miyoshi on "Contact Form 7"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:61:"http://wordpress.org/extend/plugins/contact-form-7/#post-2141";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 02 Aug 2007 12:45:03 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"2141@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:54:"Just another contact form plugin. Simple but flexible.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:16:"Takayuki Miyoshi";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:2;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:33:"uberdose on "All in One SEO Pack"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:65:"http://wordpress.org/extend/plugins/all-in-one-seo-pack/#post-753";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 30 Mar 2007 20:08:18 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:40:"753@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:92:"Automatically optimizes your Wordpress blog for Search Engines (Search Engine Optimization).";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:8:"uberdose";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:3;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:19:"kikadev on "gtrans"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:54:"http://wordpress.org/extend/plugins/gtrans/#post-30417";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 22 Sep 2011 11:48:04 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"30417@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:45:"GTranslate: Google Translate for your website";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:7:"kikadev";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:4;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:49:"Joost de Valk on "Google Analytics for WordPress"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:77:"http://wordpress.org/extend/plugins/google-analytics-for-wordpress/#post-2316";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 14 Sep 2007 12:15:27 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"2316@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:145:"Track your WordPress site easily and with lots of metadata: views per author &#38; category, automatic tracking of outbound clicks and pageviews.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Joost de Valk";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:5;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:42:"Mike Challis on "Fast Secure Contact Form"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:63:"http://wordpress.org/extend/plugins/si-contact-form/#post-12636";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 27 Aug 2009 01:20:04 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"12636@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:131:"A super customizable contact form that lets your visitors send you email. Blocks all automated spammers. No templates to mess with.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:12:"Mike Challis";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:6;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:28:"Lester Chan on "WP-PageNavi"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:57:"http://wordpress.org/extend/plugins/wp-pagenavi/#post-363";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 09 Mar 2007 23:17:57 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:40:"363@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:49:"Adds a more advanced paging navigation interface.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:11:"Lester Chan";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:7;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:30:"Alex Rabe on "NextGEN Gallery"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:62:"http://wordpress.org/extend/plugins/nextgen-gallery/#post-1169";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 23 Apr 2007 20:08:06 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"1169@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:108:"NextGEN Gallery is a full integrated Image Gallery plugin for WordPress with dozens of options and features.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"Alex Rabe";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:8;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:29:"Arne on "Google XML Sitemaps"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:70:"http://wordpress.org/extend/plugins/google-sitemap-generator/#post-132";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 09 Mar 2007 22:31:32 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:40:"132@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:105:"This plugin will generate a special XML sitemap which will help search engines to better index your blog.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:4:"Arne";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:9;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:38:"Brian Colinger on "WordPress Importer"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:66:"http://wordpress.org/extend/plugins/wordpress-importer/#post-18101";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 20 May 2010 17:42:45 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"18101@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:101:"Import posts, pages, comments, custom fields, categories, tags and more from a WordPress export file.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:14:"Brian Colinger";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:10;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:41:"Joost de Valk on "WordPress SEO by Yoast"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:60:"http://wordpress.org/extend/plugins/wordpress-seo/#post-8321";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 01 Jan 2009 20:34:44 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"8321@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:131:"Improve your WordPress SEO: Write better content and have a fully optimized WordPress site using the WordPress SEO plugin by Yoast.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Joost de Valk";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:11;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:30:"BraveNewCode Inc. on "WPtouch"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:54:"http://wordpress.org/extend/plugins/wptouch/#post-5468";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 01 May 2008 04:58:09 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"5468@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:70:"WPtouch: A simple, powerful and elegant mobile theme for your website.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:17:"BraveNewCode Inc.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:12;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:32:"Marcel on "Add Link to Facebook"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:68:"http://wordpress.org/extend/plugins/add-link-to-facebook/#post-24221";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 05 Feb 2011 14:30:39 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"24221@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:99:"Automatically add links to published posts or pages to your Facebook wall, pages or groups and more";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:6:"Marcel";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:13;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:36:"Donncha O Caoimh on "WP Super Cache"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:61:"http://wordpress.org/extend/plugins/wp-super-cache/#post-2572";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 05 Nov 2007 11:40:04 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"2572@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:73:"A very fast caching engine for WordPress that produces static html files.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:16:"Donncha O Caoimh";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:14;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:54:"Michael Adams (mdawaffe) on "Jetpack by WordPress.com"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:55:"http://wordpress.org/extend/plugins/jetpack/#post-23862";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 20 Jan 2011 02:21:38 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"23862@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:104:"Supercharge your WordPress site with powerful features previously only available to WordPress.com users.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:24:"Michael Adams (mdawaffe)";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}s:27:"http://www.w3.org/2005/Atom";a:1:{s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:0:"";s:7:"attribs";a:1:{s:0:"";a:3:{s:4:"href";s:52:"http://wordpress.org/extend/plugins/rss/view/popular";s:3:"rel";s:4:"self";s:4:"type";s:19:"application/rss+xml";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}}}}}}s:4:"type";i:128;s:7:"headers";a:8:{s:6:"server";s:5:"nginx";s:4:"date";s:29:"Mon, 13 Feb 2012 12:46:03 GMT";s:12:"content-type";s:23:"text/xml; charset=UTF-8";s:10:"connection";s:5:"close";s:4:"vary";s:15:"Accept-Encoding";s:13:"last-modified";s:19:"2007-03-09 22:11:30";s:14:"content-length";s:4:"7690";s:4:"x-nc";s:11:"HIT luv 139";}s:5:"build";s:14:"20090627192103";}', 'no'),
(490, 0, 'initial_db_version', '18226', 'yes'),
(955, 0, '_transient_timeout_plugin_slugs', '1329223562', 'no'),
(956, 0, '_transient_plugin_slugs', 'a:7:{i:0;s:19:"akismet/akismet.php";i:1;s:25:"auto-login/auto-login.php";i:2;s:30:"flickr-badges-widget/index.php";i:3;s:9:"hello.php";i:4;s:31:"slickr-flickr/slickr-flickr.php";i:5;s:35:"wp-code-igniter/wp-code-igniter.php";i:6;s:35:"wp-page-numbers/wp-page-numbers.php";}', 'no'),
(378, 0, '_site_transient_timeout_browser_917b7b9447bbebbffa4bc4d355c75a1c', '1325762153', 'yes'),
(379, 0, '_site_transient_browser_917b7b9447bbebbffa4bc4d355c75a1c', 'a:9:{s:8:"platform";s:7:"Windows";s:4:"name";s:7:"Firefox";s:7:"version";s:3:"8.0";s:10:"update_url";s:23:"http://www.firefox.com/";s:7:"img_src";s:50:"http://s.wordpress.org/images/browsers/firefox.png";s:11:"img_src_ssl";s:49:"https://wordpress.org/images/browsers/firefox.png";s:15:"current_version";s:1:"9";s:7:"upgrade";b:1;s:8:"insecure";b:0;}', 'yes'),
(625, 0, '_site_transient_timeout_wporg_theme_feature_list', '1327061324', 'yes'),
(626, 0, '_site_transient_wporg_theme_feature_list', 'a:5:{s:6:"Colors";a:15:{i:0;s:5:"black";i:1;s:4:"blue";i:2;s:5:"brown";i:3;s:4:"gray";i:4;s:5:"green";i:5;s:6:"orange";i:6;s:4:"pink";i:7;s:6:"purple";i:8;s:3:"red";i:9;s:6:"silver";i:10;s:3:"tan";i:11;s:5:"white";i:12;s:6:"yellow";i:13;s:4:"dark";i:14;s:5:"light";}s:7:"Columns";a:6:{i:0;s:10:"one-column";i:1;s:11:"two-columns";i:2;s:13:"three-columns";i:3;s:12:"four-columns";i:4;s:12:"left-sidebar";i:5;s:13:"right-sidebar";}s:5:"Width";a:2:{i:0;s:11:"fixed-width";i:1;s:14:"flexible-width";}s:8:"Features";a:18:{i:0;s:8:"blavatar";i:1;s:10:"buddypress";i:2;s:17:"custom-background";i:3;s:13:"custom-colors";i:4;s:13:"custom-header";i:5;s:11:"custom-menu";i:6;s:12:"editor-style";i:7;s:21:"featured-image-header";i:8;s:15:"featured-images";i:9;s:20:"front-page-post-form";i:10;s:19:"full-width-template";i:11;s:12:"microformats";i:12;s:12:"post-formats";i:13;s:20:"rtl-language-support";i:14;s:11:"sticky-post";i:15;s:13:"theme-options";i:16;s:17:"threaded-comments";i:17;s:17:"translation-ready";}s:7:"Subject";a:3:{i:0;s:7:"holiday";i:1;s:13:"photoblogging";i:2;s:8:"seasonal";}}', 'yes'),
(951, 0, '_transient_timeout_feed_1a5f760f2e2b48827d4974a60857e7c2', '1329180362', 'no'),
(952, 0, '_transient_feed_1a5f760f2e2b48827d4974a60857e7c2', 'a:4:{s:5:"child";a:1:{s:0:"";a:1:{s:3:"rss";a:1:{i:0;a:6:{s:4:"data";s:3:"\n	\n";s:7:"attribs";a:1:{s:0:"";a:1:{s:7:"version";s:3:"2.0";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:1:{s:7:"channel";a:1:{i:0;a:6:{s:4:"data";s:72:"\n		\n		\n		\n		\n		\n		\n				\n\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n\n	";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:43:"WordPress Plugins » View: Recently Updated";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:51:"http://wordpress.org/extend/plugins/browse/updated/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:43:"WordPress Plugins » View: Recently Updated";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"language";a:1:{i:0;a:5:{s:4:"data";s:5:"en-US";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 13 Feb 2012 12:31:48 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:9:"generator";a:1:{i:0;a:5:{s:4:"data";s:25:"http://bbpress.org/?v=1.1";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"item";a:15:{i:0;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:36:"daveligthart on "WP-Stats-Dashboard"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:65:"http://wordpress.org/extend/plugins/wp-stats-dashboard/#post-7708";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 14 Nov 2008 23:21:54 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:41:"7708@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:96:"Social media and site stats tracking and monitoring. WordPress.com Statistics Dashboard Widgets.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:12:"daveligthart";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:1;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:26:"barrena on "Feed Globedia"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:61:"http://wordpress.org/extend/plugins/feed-globedia/#post-10851";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 25 May 2009 07:02:44 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"10851@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:68:"Plugin para la creación de un RSS completo y privado para Globedia.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:7:"barrena";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:2;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:27:"mortay on "Social Counters"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:63:"http://wordpress.org/extend/plugins/social-counters/#post-21379";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 06 Oct 2010 16:28:21 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"21379@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:135:"It allows to place social sharing links with counters (if available) to the most popular social networks: Menéame,Twitter,Facebook,...";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:6:"mortay";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:3;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:25:"barrena on "Tu.Tv Oembed"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:59:"http://wordpress.org/extend/plugins/tutv-oembed/#post-34847";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 13 Feb 2012 09:30:16 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"34847@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:192:"Simple plugin para que puedas añadir videos de <a href="http://tu.tv" rel="nofollow">http://tu.tv</a> a tu blog de Wordpress. Sólo tiene que copiar la dirección (URL) del video en tu post o";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:7:"barrena";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:4;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:40:"Vinoj Cardoza on "Cardoza Worpress Poll"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:70:"http://wordpress.org/extend/plugins/cardoza-wordpress-poll/#post-34835";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sun, 12 Feb 2012 16:13:59 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"34835@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:138:"Cardoza Wordpress Poll is completely ajax powered polling system. This poll plugin supports both single and multiple selection of answers.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Vinoj Cardoza";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:5;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:30:"plhwin on "友荐推荐工具"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:53:"http://wordpress.org/extend/plugins/ujian/#post-34689";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 08 Feb 2012 03:03:28 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"34689@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:150:"友荐是一款基于社会化的智能推荐工具，只需添加一行代码，即可为您的网站添加站内智能推荐功能，当用户浏览";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:6:"plhwin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:6;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:59:"Tobiask on "Simple Trackback Validation with Topsy Blocker"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:94:"http://wordpress.org/extend/plugins/simple-trackback-validation-with-topsy-blocker/#post-17941";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 12 May 2010 18:18:19 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"17941@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:150:"REPLACEMENT of the original Simple Trackback Validation Plugin from Miachel. Performs a simple but very effective test on all incoming trackbacks in o";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:7:"Tobiask";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:7;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:23:"skipser on "GplusBadge"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:59:"http://wordpress.org/extend/plugins/gplus-badge/#post-34375";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sun, 29 Jan 2012 14:44:45 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"34375@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:115:"A simple plugin that adds a google+ badge for linking to your google+ profile and showing your number of followers.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:7:"skipser";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:8;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:25:"ichurakov on "Contact Me"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:63:"http://wordpress.org/extend/plugins/ajax-contact-me/#post-34790";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 10 Feb 2012 18:03:18 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"34790@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:132:"Contact Me is an elegant and light AJAX contact form. Activate the plugin and insert simple short code [contactme] into posts/pages.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"ichurakov";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:9;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:41:"tpk on "Cart Analytics for WP e-Commerce"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:80:"http://wordpress.org/extend/plugins/cart-analytics-for-wp-e-commerce/#post-34810";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 11 Feb 2012 11:30:59 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"34810@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:84:"Checks how many products added to cart are actually purchased. WP e-Commerce needed.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:3:"tpk";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:10;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:28:"svnlabs on "Valentine''s Day"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:62:"http://wordpress.org/extend/plugins/valentines-day/#post-34786";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 10 Feb 2012 16:41:34 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"34786@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:96:"Display falling hearts and tunes on Saint Valentine&#039;s Day to express love with you website.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:7:"svnlabs";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:11;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:27:"scil on "Local highlighter"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:65:"http://wordpress.org/extend/plugins/local-highlighter/#post-34782";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 10 Feb 2012 15:32:58 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"34782@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:110:"Allow your visitors to highlight words, sentences or images and add comments to them by simply selecting them.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:4:"scil";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:12;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:43:"mojowill on "The Mojo Sliding Widget Panel"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:77:"http://wordpress.org/extend/plugins/the-mojo-sliding-widget-panel/#post-33908";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 16 Jan 2012 16:56:00 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"33908@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:72:"A jQuery powered sliding widget area for the top of your Wordpress site.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:8:"mojowill";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:13;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:24:"ajayver on "RSS Manager"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:59:"http://wordpress.org/extend/plugins/rss-manager/#post-26163";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 28 Apr 2011 09:31:56 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"26163@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:76:"This plugin gives you the ability to change the appearance of your RSS feed.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:7:"ajayver";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:14;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:38:"marcrice83 on "Youtube Channel Plugin"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:72:"http://wordpress.org/extend/plugins/youtube-channel-showcase/#post-32328";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 22 Nov 2011 16:14:57 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"32328@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:135:"Youtube channel gallery - displays list of youtube videos from a channel and showcases a selected video at the top which can be rotated";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:10:"marcrice83";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}s:27:"http://www.w3.org/2005/Atom";a:1:{s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:0:"";s:7:"attribs";a:1:{s:0:"";a:3:{s:4:"href";s:52:"http://wordpress.org/extend/plugins/rss/view/updated";s:3:"rel";s:4:"self";s:4:"type";s:19:"application/rss+xml";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}}}}}}s:4:"type";i:128;s:7:"headers";a:8:{s:6:"server";s:5:"nginx";s:4:"date";s:29:"Mon, 13 Feb 2012 12:46:03 GMT";s:12:"content-type";s:23:"text/xml; charset=UTF-8";s:10:"connection";s:5:"close";s:4:"vary";s:15:"Accept-Encoding";s:13:"last-modified";s:19:"2008-11-14 23:21:54";s:14:"content-length";s:4:"8035";s:4:"x-nc";s:11:"HIT luv 139";}s:5:"build";s:14:"20090627192103";}', 'no'),
(957, 0, '_transient_timeout_dash_de3249c4736ad3bd2cd29147c4a0d43e', '1329180362', 'no'),
(158, 0, 'theme_mods_twinne', 'a:2:{i:0;b:0;s:18:"nav_menu_locations";a:4:{s:7:"primary";i:0;s:11:"footermenu1";i:7;s:11:"footermenu2";i:8;s:10:"footermenu";i:9;}}', 'yes'),
(161, 0, 'recently_activated', 'a:1:{s:30:"flickr-badges-widget/index.php";i:1328265552;}', 'yes'),
(162, 0, '_transient_random_seed', '1d5059173874b601848d641650402fc7', 'yes'),
(167, 0, '_site_transient_timeout_browser_23c947680b058d49da589863a5c1d587', '1324027000', 'yes'),
(168, 0, '_site_transient_browser_23c947680b058d49da589863a5c1d587', 'a:9:{s:8:"platform";s:5:"Linux";s:4:"name";s:6:"Chrome";s:7:"version";s:12:"12.0.742.112";s:10:"update_url";s:28:"http://www.google.com/chrome";s:7:"img_src";s:49:"http://s.wordpress.org/images/browsers/chrome.png";s:11:"img_src_ssl";s:48:"https://wordpress.org/images/browsers/chrome.png";s:15:"current_version";s:2:"13";s:7:"upgrade";b:1;s:8:"insecure";b:0;}', 'yes'),
(739, 0, '_site_transient_timeout_browser_c3c83d18b0819c4d3896b00fe43ba1a1', '1328506405', 'yes'),
(740, 0, '_site_transient_browser_c3c83d18b0819c4d3896b00fe43ba1a1', 'a:9:{s:8:"platform";s:7:"Windows";s:4:"name";s:7:"Firefox";s:7:"version";s:5:"9.0.1";s:10:"update_url";s:23:"http://www.firefox.com/";s:7:"img_src";s:50:"http://s.wordpress.org/images/browsers/firefox.png";s:11:"img_src_ssl";s:49:"https://wordpress.org/images/browsers/firefox.png";s:15:"current_version";s:1:"9";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'yes'),
(622, 0, '_site_transient_timeout_poptags_40cd750bba9870f18aada2478b24840a', '1327061061', 'yes'),
(623, 0, '_site_transient_poptags_40cd750bba9870f18aada2478b24840a', 'a:40:{s:6:"widget";a:3:{s:4:"name";s:6:"widget";s:4:"slug";s:6:"widget";s:5:"count";s:4:"2477";}s:4:"post";a:3:{s:4:"name";s:4:"Post";s:4:"slug";s:4:"post";s:5:"count";s:4:"1672";}s:6:"plugin";a:3:{s:4:"name";s:6:"plugin";s:4:"slug";s:6:"plugin";s:5:"count";s:4:"1488";}s:5:"posts";a:3:{s:4:"name";s:5:"posts";s:4:"slug";s:5:"posts";s:5:"count";s:4:"1249";}s:5:"admin";a:3:{s:4:"name";s:5:"admin";s:4:"slug";s:5:"admin";s:5:"count";s:4:"1237";}s:7:"sidebar";a:3:{s:4:"name";s:7:"sidebar";s:4:"slug";s:7:"sidebar";s:5:"count";s:4:"1202";}s:8:"comments";a:3:{s:4:"name";s:8:"comments";s:4:"slug";s:8:"comments";s:5:"count";s:3:"881";}s:6:"images";a:3:{s:4:"name";s:6:"images";s:4:"slug";s:6:"images";s:5:"count";s:3:"809";}s:7:"twitter";a:3:{s:4:"name";s:7:"twitter";s:4:"slug";s:7:"twitter";s:5:"count";s:3:"778";}s:4:"page";a:3:{s:4:"name";s:4:"page";s:4:"slug";s:4:"page";s:5:"count";s:3:"758";}s:6:"google";a:3:{s:4:"name";s:6:"google";s:4:"slug";s:6:"google";s:5:"count";s:3:"739";}s:5:"links";a:3:{s:4:"name";s:5:"links";s:4:"slug";s:5:"links";s:5:"count";s:3:"686";}s:5:"image";a:3:{s:4:"name";s:5:"image";s:4:"slug";s:5:"image";s:5:"count";s:3:"675";}s:3:"seo";a:3:{s:4:"name";s:3:"seo";s:4:"slug";s:3:"seo";s:5:"count";s:3:"600";}s:3:"rss";a:3:{s:4:"name";s:3:"rss";s:4:"slug";s:3:"rss";s:5:"count";s:3:"530";}s:7:"gallery";a:3:{s:4:"name";s:7:"gallery";s:4:"slug";s:7:"gallery";s:5:"count";s:3:"517";}s:7:"widgets";a:3:{s:4:"name";s:7:"widgets";s:4:"slug";s:7:"widgets";s:5:"count";s:3:"445";}s:5:"pages";a:3:{s:4:"name";s:5:"pages";s:4:"slug";s:5:"pages";s:5:"count";s:3:"443";}s:4:"ajax";a:3:{s:4:"name";s:4:"AJAX";s:4:"slug";s:4:"ajax";s:5:"count";s:3:"439";}s:9:"wordpress";a:3:{s:4:"name";s:9:"wordpress";s:4:"slug";s:9:"wordpress";s:5:"count";s:3:"430";}s:8:"facebook";a:3:{s:4:"name";s:8:"Facebook";s:4:"slug";s:8:"facebook";s:5:"count";s:3:"428";}s:6:"social";a:3:{s:4:"name";s:6:"social";s:4:"slug";s:6:"social";s:5:"count";s:3:"400";}s:9:"shortcode";a:3:{s:4:"name";s:9:"shortcode";s:4:"slug";s:9:"shortcode";s:5:"count";s:3:"389";}s:6:"jquery";a:3:{s:4:"name";s:6:"jquery";s:4:"slug";s:6:"jquery";s:5:"count";s:3:"379";}s:10:"javascript";a:3:{s:4:"name";s:10:"javascript";s:4:"slug";s:10:"javascript";s:5:"count";s:3:"373";}s:4:"feed";a:3:{s:4:"name";s:4:"feed";s:4:"slug";s:4:"feed";s:5:"count";s:3:"355";}s:10:"buddypress";a:3:{s:4:"name";s:10:"buddypress";s:4:"slug";s:10:"buddypress";s:5:"count";s:3:"354";}s:5:"photo";a:3:{s:4:"name";s:5:"photo";s:4:"slug";s:5:"photo";s:5:"count";s:3:"354";}s:5:"video";a:3:{s:4:"name";s:5:"video";s:4:"slug";s:5:"video";s:5:"count";s:3:"350";}s:5:"email";a:3:{s:4:"name";s:5:"email";s:4:"slug";s:5:"email";s:5:"count";s:3:"345";}s:5:"media";a:3:{s:4:"name";s:5:"media";s:4:"slug";s:5:"media";s:5:"count";s:3:"345";}s:6:"photos";a:3:{s:4:"name";s:6:"photos";s:4:"slug";s:6:"photos";s:5:"count";s:3:"340";}s:5:"flash";a:3:{s:4:"name";s:5:"flash";s:4:"slug";s:5:"flash";s:5:"count";s:3:"328";}s:4:"tags";a:3:{s:4:"name";s:4:"tags";s:4:"slug";s:4:"tags";s:5:"count";s:3:"318";}s:5:"stats";a:3:{s:4:"name";s:5:"stats";s:4:"slug";s:5:"stats";s:5:"count";s:3:"312";}s:4:"link";a:3:{s:4:"name";s:4:"link";s:4:"slug";s:4:"link";s:5:"count";s:3:"309";}s:7:"content";a:3:{s:4:"name";s:7:"content";s:4:"slug";s:7:"content";s:5:"count";s:3:"301";}s:8:"category";a:3:{s:4:"name";s:8:"category";s:4:"slug";s:8:"category";s:5:"count";s:3:"289";}s:7:"comment";a:3:{s:4:"name";s:7:"comment";s:4:"slug";s:7:"comment";s:5:"count";s:3:"289";}s:4:"spam";a:3:{s:4:"name";s:4:"spam";s:4:"slug";s:4:"spam";s:5:"count";s:3:"283";}}', 'yes'),
(565, 0, 'wp_page_numbers_array', 'a:14:{s:20:"head_stylesheetsheet";s:2:"on";s:32:"head_stylesheetsheet_folder_name";s:0:"";s:12:"page_of_page";s:2:"no";s:17:"page_of_page_text";s:0:"";s:10:"page_of_of";s:0:"";s:14:"next_prev_text";s:2:"on";s:22:"show_start_end_numbers";s:2:"on";s:17:"show_page_numbers";s:2:"on";s:11:"limit_pages";s:0:"";s:8:"nextpage";s:2:">>";s:8:"prevpage";s:2:"<<";s:10:"startspace";s:0:"";s:8:"endspace";s:0:"";s:11:"style_theme";s:7:"classic";}', 'yes'),
(628, 0, '_site_transient_update_plugins', 'O:8:"stdClass":3:{s:12:"last_checked";i:1329367134;s:7:"checked";a:7:{s:19:"akismet/akismet.php";s:5:"2.5.3";s:25:"auto-login/auto-login.php";s:3:"1.0";s:30:"flickr-badges-widget/index.php";s:3:"1.0";s:9:"hello.php";s:3:"1.6";s:31:"slickr-flickr/slickr-flickr.php";s:4:"1.37";s:35:"wp-code-igniter/wp-code-igniter.php";s:3:"1.0";s:35:"wp-page-numbers/wp-page-numbers.php";s:3:"0.5";}s:8:"response";a:1:{s:19:"akismet/akismet.php";O:8:"stdClass":5:{s:2:"id";s:2:"15";s:4:"slug";s:7:"akismet";s:11:"new_version";s:5:"2.5.5";s:3:"url";s:44:"http://wordpress.org/extend/plugins/akismet/";s:7:"package";s:55:"http://downloads.wordpress.org/plugin/akismet.2.5.5.zip";}}}', 'yes'),
(571, 0, 'widget_query-posts', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(586, 0, 'widget_quickflickr', 'a:17:{s:5:"title";s:18:"Flickr photostream";s:4:"view";s:2:"_t";s:20:"before_flickr_widget";s:20:"<div class="flickr">";s:19:"after_flickr_widget";s:6:"</div>";s:5:"error";s:0:"";s:5:"items";s:1:"6";s:11:"before_item";s:0:"";s:10:"after_item";s:0:"";s:10:"more_title";s:0:"";s:6:"target";s:0:"";s:11:"show_titles";s:0:"";s:8:"username";s:10:"RAKESH1818";s:8:"thickbox";s:7:"checked";s:4:"tags";s:0:"";s:6:"random";s:0:"";s:10:"javascript";s:0:"";s:7:"user_id";s:12:"74737611@N05";}', 'yes'),
(621, 0, '_transient_plugins_delete_result_1', '1', 'yes'),
(627, 0, 'nav_menu_options', 'a:2:{i:0;b:0;s:8:"auto_add";a:0:{}}', 'yes'),
(629, 0, 'widget_flickr-badges', 'a:4:{i:2;a:7:{s:5:"title";s:0:"";s:10:"intro_text";s:0:"";s:10:"outro_text";s:0:"";s:4:"type";s:4:"user";s:9:"flickr_id";s:12:"21879932@N02";s:5:"count";i:6;s:7:"display";s:6:"latest";}i:3;a:7:{s:5:"title";s:0:"";s:10:"intro_text";s:0:"";s:10:"outro_text";s:0:"";s:4:"type";s:4:"user";s:9:"flickr_id";s:12:"21879932@N02";s:5:"count";i:6;s:7:"display";s:6:"latest";}i:4;a:7:{s:5:"title";s:6:"FLICKR";s:10:"intro_text";s:0:"";s:10:"outro_text";s:0:"";s:4:"type";s:4:"user";s:9:"flickr_id";s:12:"74737611@N05";s:5:"count";i:6;s:7:"display";s:6:"latest";}s:12:"_multiwidget";i:1;}', 'yes'),
(931, 0, '_transient_timeout_feed_mod_ac0b00fe65abe10e0c5b588f3ed8c7ca', '1329180362', 'no'),
(932, 0, '_transient_feed_mod_ac0b00fe65abe10e0c5b588f3ed8c7ca', '1329137162', 'no'),
(933, 0, '_transient_timeout_dash_20494a3d90a6669585674ed0eb8dcd8f', '1329180362', 'no'),
(934, 0, '_transient_dash_20494a3d90a6669585674ed0eb8dcd8f', '<ul>\n	<li><strong>noreply@blogger.com (rajwin007)</strong> linked here <a href="http://rajwin-aravind.blogspot.com/2011/12/connect-oracle-with-servlet-netbeans.html">saying</a>, "Right click on Oracle Thin ,then select Connect Us ..."</li>\n	<li><strong>Rajwin 007</strong> linked here <a href="http://rajwin-aravind.blogspot.com/2011/12/jmag-designer-105-x86-englishjapanese.html">saying</a>, "NOTE: If u Found Any Broken Links,Please search Th ..."</li>\n	<li><strong>Stephen Tsai</strong> linked here <a href="http://warriorbeat.staradvertiserblogs.com/2011/10/08/just-win-baby/">saying</a>, "Hmmm. Anybody want to buy shares of stock in a gen ..."</li>\n	<li><strong>Neuronix</strong> linked here <a href="http://habrahabr.ru/blogs/hardware/129799/">saying</a>, "mysql_host localhost ; mysql_user user ; mysql_pas ..."</li>\n	<li><strong>Francesco</strong> linked here <a href="http://insidetheapple.superweb.ws/macbook-macbookpro-cinemadisplay/">saying</a>, "[url=http://darmowetapety24.blogspot.com]Darmowe t ..."</li>\n	<li><strong>dodik</strong> linked here <a href="http://kgos.karanganyar.go.id/?p=924">saying</a>, "I possess a handful of blogs myself and I think yo ..."</li>\n	<li><strong>no2redzone</strong> linked here <a href="http://no2redzone.wordpress.com/2011/02/10/adventures-with-redzone/">saying</a>, "In a message yesterday I explained how RedZone is  ..."</li>\n	<li><strong>obratu</strong> linked here <a href="http://p2p.wrox.com/book-professional-xmpp-programming-javascript-jquery/80041-bosh-connection-manager.html">saying</a>, "Source File: http://localhost:8273/scripts/flXHR-. ..."</li>\n	<li><strong>Peter Miller</strong> linked here <a href="http://tidalblog.blogspot.com/2010/10/putting-my-oar-in-well-almost.html">saying</a>, "... significance of OAR files. Pathfinder alluded  ..."</li>\n	<li><strong>Hank Williams</strong> linked here <a href="http://whydoeseverythingsuck.com/2010/06/apple-fears-killer-app.html">saying</a>, "Wow, what a stupid post, link baiter. ..... In wri ..."</li>\n</ul>\n', 'no'),
(935, 0, '_transient_timeout_dash_4077549d03da2e451c8b5f002294ff51', '1329180362', 'no'),
(936, 0, '_transient_dash_4077549d03da2e451c8b5f002294ff51', '<div class="rss-widget"><ul><li><a class=''rsswidget'' href=''http://wordpress.org/news/2012/01/year-of-the-meetup/'' title=''We hereby declare 2012 as the Year of the WordPress Meetup. You&#039;ll want to get in on this action. So what is a WordPress Meetup? Basically, it&#039;s people in a community getting together — meeting up — who share an interest in WordPress, whether they be bloggers, business users, developers, consultants, or any other category of person able to say,  [&hellip;]''>Year of the Meetup</a> <span class="rss-date">January 27, 2012</span><div class=''rssSummary''>We hereby declare 2012 as the Year of the WordPress Meetup. You&#039;ll want to get in on this action. So what is a WordPress Meetup? Basically, it&#039;s people in a community getting together — meeting up — who share an interest in WordPress, whether they be bloggers, business users, developers, consultants, or any other category of person able to say,  [&hellip;]</div></li><li><a class=''rsswidget'' href=''http://wordpress.org/news/2012/01/internet-blackout/'' title=''WordPress.org is officially joining the protest against Senate Bill 968: the Protect IP Act that is coming before the U.S. Senate next week. As I wrote in my post a week ago, if this bill is passed it will jeopardize internet freedom and shift the power of the independent web into the hands of corporations. [&hellip;]''>Internet Blackout Day on January 18</a> <span class="rss-date">January 17, 2012</span><div class=''rssSummary''>WordPress.org is officially joining the protest against Senate Bill 968: the Protect IP Act that is coming before the U.S. Senate next week. As I wrote in my post a week ago, if this bill is passed it will jeopardize internet freedom and shift the power of the independent web into the hands of corporations. [&hellip;]</div></li></ul></div>', 'no'),
(925, 0, '_transient_timeout_feed_ac0b00fe65abe10e0c5b588f3ed8c7ca', '1329180362', 'no'),
(926, 0, '_transient_timeout_feed_e5ae0c0dbb86dd8dba86e1b71bc3355d', '1329180362', 'no'),
(927, 0, '_transient_feed_e5ae0c0dbb86dd8dba86e1b71bc3355d', 'a:4:{s:5:"child";a:1:{s:0:"";a:1:{s:3:"rss";a:1:{i:0;a:6:{s:4:"data";s:4:"\n  \n";s:7:"attribs";a:1:{s:0:"";a:1:{s:7:"version";s:3:"2.0";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:1:{s:7:"channel";a:1:{i:0;a:6:{s:4:"data";s:83:"\n    \n    \n    \n    \n    \n    \n    \n    \n    \n    \n    \n    \n    \n    \n    \n    \n  ";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:4:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:55:"link:http://localhost/twinne/blog/ - Google Blog Search";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:92:"http://www.google.com/search?ie=utf-8&q=link:http://localhost/twinne/blog/&tbm=blg&tbs=sbd:1";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:17:"About 916 results";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"item";a:10:{i:0;a:6:{s:4:"data";s:47:"\n      \n      \n      \n      \n      \n      \n    ";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:3:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:75:"connect Oracle with servlet - Netbeans - Tutorial | Science Hack <b>...</b>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:84:"http://rajwin-aravind.blogspot.com/2011/12/connect-oracle-with-servlet-netbeans.html";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:245:"Right click on Oracle Thin ,then select Connect Using. Now you can view small window. Fill the form with following Details: Host: <em>localhost</em>. Port: 1521. SID: XE username: system. Password: password which you gave when installing oracle.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:3:{s:9:"publisher";a:1:{i:0;a:5:{s:4:"data";s:82:"Science Hack | Rajwin007 | Narivilap Patty | Learn Hack | Aravind Raj | Hack Trick";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:31:"noreply@blogger.com (rajwin007)";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"date";a:1:{i:0;a:5:{s:4:"data";s:29:"Mon, 26 Dec 2011 06:05:02 GMT";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:1;a:6:{s:4:"data";s:47:"\n      \n      \n      \n      \n      \n      \n    ";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:3:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:67:"JMAG Designer 10.5 x86 (English/Japanese) | Science Hack <b>...</b>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:85:"http://rajwin-aravind.blogspot.com/2011/12/jmag-designer-105-x86-englishjapanese.html";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:302:"NOTE: If u Found Any Broken <em>Links</em>,Please search That file in. Download <b>...</b> Official site: <em>http</em>://www.jmag-international.com <b>...</b> The license to replace the ***** on the machine name (eg <em>localhost</em>). <b>...</b> Related Posts Plugin for WordPress, <em>Blogger</em>.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:3:{s:9:"publisher";a:1:{i:0;a:5:{s:4:"data";s:82:"Science Hack | Rajwin007 | Narivilap Patty | Learn Hack | Aravind Raj | Hack Trick";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:10:"Rajwin 007";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"date";a:1:{i:0;a:5:{s:4:"data";s:29:"Sun, 18 Dec 2011 05:03:26 GMT";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:2;a:6:{s:4:"data";s:47:"\n      \n      \n      \n      \n      \n      \n    ";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:3:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:80:"The Warrior Beat | Just win, baby | UH football, University of Hawaii <b>...</b>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:68:"http://warriorbeat.staradvertiserblogs.com/2011/10/08/just-win-baby/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:541:"Hmmm. Anybody want to buy shares of stock in a gently used 5-year-old <em>blog</em> with a tricky delete button and ample memory to write new rules? <b>......</b> <em>link</em>: October 9th, 2011 at 2:44 am. <em>link</em>. <em>http</em>://www.gazette.com/sports/mueh-126443-names-john. html. Garret: October 9th, 2011 at 2:46 am. Maybe cause they were playing at home. The Texas-Oklahoma game is played in Dallas, which is the same distance away from Austin, TX as it is from <b>......</b> I developed a joomla site on my <em>localhost</em>.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:3:{s:9:"publisher";a:1:{i:0;a:5:{s:4:"data";s:101:"The Warrior Beat| UH football, University of Hawaii athletics | staradvertiser.com | Honolulu, Hawaii";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:12:"Stephen Tsai";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"date";a:1:{i:0;a:5:{s:4:"data";s:29:"Sat, 08 Oct 2011 16:10:24 GMT";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:3;a:6:{s:4:"data";s:47:"\n      \n      \n      \n      \n      \n      \n    ";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:3:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:116:"«Умный дом» собственными руками. Часть 2. Видеонаблюдение <b>...</b>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:42:"http://habrahabr.ru/blogs/hardware/129799/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:691:"mysql_host <em>localhost</em> ; mysql_user user ; mysql_password password # У меня есть еще 3 камеры ;) thread /etc/motion/thread1.conf thread /etc/motion/thread2.conf thread /etc/motion/thread3.conf. В конфигах threadX.conf все параметры аналогичны <b>.....</b> Проглядев замечательный ресурс <em>http</em>://ab-log.ru/smart-house, ссылку на который Вы приложили в первой статье, полностью потерял интерес к Вашему освещению данного вопроса. <b>....</b> 1x Коммутатор D-<em>link</em> (1500 руб. ), <b>...</b>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:3:{s:9:"publisher";a:1:{i:0;a:5:{s:4:"data";s:19:"Хабрахабр:";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:8:"Neuronix";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"date";a:1:{i:0;a:5:{s:4:"data";s:29:"Wed, 05 Oct 2011 08:28:17 GMT";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:4;a:6:{s:4:"data";s:47:"\n      \n      \n      \n      \n      \n      \n    ";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:3:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:39:"Macbook, MacbookPro &amp; CinemaDisplay";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:67:"http://insidetheapple.superweb.ws/macbook-macbookpro-cinemadisplay/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:567:"[url=<em>http</em>://darmowetapety24.<em>blogspot</em>.com]Darmowe tapety[/url]. By mattecync <b>.....</b> I have AVG on it, but whenever I go to piratebay, not even download just go to a <em>link</em> on there I get a butt ton of viruses and my computer won&#39;t allow me to run AVG, any program, or the internet because they are all corrupt. I spent 60 <b>.....</b> Php files run from the <em>localhost</em> with xml in them don&#39;t display properly however if the file is just opened in the browser from another location then it displays fine. ______ <b>...</b>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:3:{s:9:"publisher";a:1:{i:0;a:5:{s:4:"data";s:0:"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"Francesco";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"date";a:1:{i:0;a:5:{s:4:"data";s:29:"Mon, 15 Aug 2011 00:00:00 GMT";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:5;a:6:{s:4:"data";s:47:"\n      \n      \n      \n      \n      \n      \n    ";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:3:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:22:"Install Nagios « kgos";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:36:"http://kgos.karanganyar.go.id/?p=924";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:294:"I possess a handful of <em>blogs</em> myself and I think you should take a look here: <em>http</em>://seopressors.org/ You&#39;ll find it&#39;s a very nice tool that can bring you a lot more visitors. Keep up the quality posts. Reply &middot; 3 sim card says: January 6, 2012 at 7:49 <b>...</b>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:3:{s:9:"publisher";a:1:{i:0;a:5:{s:4:"data";s:4:"kgos";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:5:"dodik";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"date";a:1:{i:0;a:5:{s:4:"data";s:29:"Wed, 20 Jul 2011 00:33:17 GMT";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:6;a:6:{s:4:"data";s:47:"\n      \n      \n      \n      \n      \n      \n    ";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:3:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:37:"Adventures With RedZone « no2redzone";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:67:"http://no2redzone.wordpress.com/2011/02/10/adventures-with-redzone/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:545:"In a message yesterday I explained how RedZone is exploiting the Parcel Media security hole in the Second Life Client software to make your browser silently send customised and personalised <em>HTTP</em> GET requests back to the isellsl.ath.cx <b>...</b> ( Actually I used an IP address of my LAMP server, rather than <em>localhost</em>. <b>....</b> Of course, to add them with someone elses IP address, just ask them to click the <em>link</em> too. <b>.....</b> Thanx NO2 for this <em>blog</em> and for letting us know about what you found out.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:3:{s:9:"publisher";a:1:{i:0;a:5:{s:4:"data";s:10:"no2redzone";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:10:"no2redzone";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"date";a:1:{i:0;a:5:{s:4:"data";s:29:"Thu, 10 Feb 2011 23:23:31 GMT";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:7;a:6:{s:4:"data";s:47:"\n      \n      \n      \n      \n      \n      \n    ";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:3:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:23:"BOSH connection manager";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:107:"http://p2p.wrox.com/book-professional-xmpp-programming-javascript-jquery/80041-bosh-connection-manager.html";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:562:"Source File: <em>http</em>://<em>localhost</em>:8273/scripts/flXHR-...loy/flensed.js. Line: 12. It worked <b>...</b> <em>twine twine</em> is offline. Registered User. Join Date: Jul 2010. Posts: 1. Thanks: 0. Thanked 0 Times in 0 Posts. Default. My Hello script is also getting a ConnFailed response. When I go directly to <em>http</em>://bosh.metajack.im:5280/xmpp-httpbind I can see the page with the XEP-0124 <em>link</em> but when I run the Hello test page on my local server, the connection attempt results in a status of 2. So basically the test <b>...</b>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:3:{s:9:"publisher";a:1:{i:0;a:5:{s:4:"data";s:19:"p2p.wrox.com Forums";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:6:"obratu";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"date";a:1:{i:0;a:5:{s:4:"data";s:29:"Mon, 17 Jan 2011 08:00:00 GMT";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:8;a:6:{s:4:"data";s:47:"\n      \n      \n      \n      \n      \n      \n    ";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:3:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:43:"TidalBlog: Putting my OAR in (well, almost)";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:72:"http://tidalblog.blogspot.com/2010/10/putting-my-oar-in-well-almost.html";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:580:"<b>...</b> significance of OAR files. Pathfinder alluded to them in his <em>blog</em> on USB on OpenSim and they surfaced again at last week&#39;s VWER meeting (the transcript includes <em>links</em> to OAR repositories). <b>...</b> Download and install the Imprudence viewer from <em>http</em>://imprudenceviewer.org/wiki/Downloads 4. Copy the Imprudence <b>...</b> The grid should be set to <em>localhost</em> in the dropdown. Ignore the error <b>....</b> Tabloid Update: Part 2 &middot; Using <em>Twine</em> to make a path through an OpenSim buil... Mesh viewers and <b>...</b>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:3:{s:9:"publisher";a:1:{i:0;a:5:{s:4:"data";s:9:"TidalBlog";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:12:"Peter Miller";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"date";a:1:{i:0;a:5:{s:4:"data";s:29:"Wed, 20 Oct 2010 15:16:00 GMT";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:9;a:6:{s:4:"data";s:47:"\n      \n      \n      \n      \n      \n      \n    ";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:3:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:53:"Why does everything suck?: Apple fears the killer app";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:68:"http://whydoeseverythingsuck.com/2010/06/apple-fears-killer-app.html";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:307:"Wow, what a stupid post, <em>link</em> baiter. <b>.....</b> In writing (yes, in <em>blog</em> posts too) surely you want to eliminate word usage that states the *opposite* of what you mean to say. :-D <b>....</b> Don&#39;t forget to jailbreak your iPad and run node.js on <em>http</em>://<em>localhost</em>.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:3:{s:9:"publisher";a:1:{i:0;a:5:{s:4:"data";s:25:"Why does everything suck?";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Hank Williams";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"date";a:1:{i:0;a:5:{s:4:"data";s:29:"Fri, 11 Jun 2010 12:23:00 GMT";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}s:36:"http://a9.com/-/spec/opensearch/1.1/";a:3:{s:12:"totalResults";a:1:{i:0;a:5:{s:4:"data";s:3:"916";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:10:"startIndex";a:1:{i:0;a:5:{s:4:"data";s:1:"1";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:12:"itemsPerPage";a:1:{i:0;a:5:{s:4:"data";s:2:"10";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}}}}}}s:4:"type";i:128;s:7:"headers";a:9:{s:12:"content-type";s:28:"text/xml; charset=ISO-8859-1";s:4:"date";s:29:"Mon, 13 Feb 2012 12:46:02 GMT";s:7:"expires";s:2:"-1";s:13:"cache-control";s:18:"private, max-age=0";s:10:"set-cookie";a:2:{i:0;s:143:"PREF=ID=61b8acfc148ff4a2:FF=0:TM=1329137162:LM=1329137162:S=jpVF0WxuTWGA4zfK; expires=Wed, 12-Feb-2014 12:46:02 GMT; path=/; domain=.google.com";i:1;s:212:"NID=56=2Opfhzmv67NcVbhCRb8uwEpXi-QvqneE9LBpDkiQ5TR542jHWCif9Bbwc7JSk5YgAMLKYLRAl3hc91D6d8RDEmT-eU93Q1T7HGPf0MBAG9AEQw2DCYaJytOqZp4nXFgO; expires=Tue, 14-Aug-2012 12:46:02 GMT; path=/; domain=.google.com; HttpOnly";}s:3:"p3p";s:122:"CP="This is not a P3P policy! See http://www.google.com/support/accounts/bin/answer.py?hl=en&answer=151657 for more info."";s:6:"server";s:3:"gws";s:16:"x-xss-protection";s:13:"1; mode=block";s:15:"x-frame-options";s:10:"SAMEORIGIN";}s:5:"build";s:14:"20090627192103";}', 'no'),
(786, 0, 'rewrite_rules', 'a:72:{s:47:"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:42:"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:35:"category/(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:17:"category/(.+?)/?$";s:35:"index.php?category_name=$matches[1]";s:44:"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:39:"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:32:"tag/([^/]+)/page/?([0-9]{1,})/?$";s:43:"index.php?tag=$matches[1]&paged=$matches[2]";s:14:"tag/([^/]+)/?$";s:25:"index.php?tag=$matches[1]";s:45:"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:40:"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:33:"type/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?post_format=$matches[1]&paged=$matches[2]";s:15:"type/([^/]+)/?$";s:33:"index.php?post_format=$matches[1]";s:48:".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$";s:18:"index.php?feed=old";s:32:"feed/(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:27:"(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:20:"page/?([0-9]{1,})/?$";s:28:"index.php?&paged=$matches[1]";s:27:"comment-page-([0-9]{1,})/?$";s:39:"index.php?&page_id=23&cpage=$matches[1]";s:41:"comments/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:36:"comments/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:29:"comments/page/?([0-9]{1,})/?$";s:28:"index.php?&paged=$matches[1]";s:44:"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:39:"search/(.+)/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:32:"search/(.+)/page/?([0-9]{1,})/?$";s:41:"index.php?s=$matches[1]&paged=$matches[2]";s:14:"search/(.+)/?$";s:23:"index.php?s=$matches[1]";s:47:"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:42:"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:35:"author/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?author_name=$matches[1]&paged=$matches[2]";s:17:"author/([^/]+)/?$";s:33:"index.php?author_name=$matches[1]";s:69:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]";s:39:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$";s:63:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]";s:56:"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:51:"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:44:"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]";s:26:"([0-9]{4})/([0-9]{1,2})/?$";s:47:"index.php?year=$matches[1]&monthnum=$matches[2]";s:43:"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:38:"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:31:"([0-9]{4})/page/?([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&paged=$matches[2]";s:13:"([0-9]{4})/?$";s:26:"index.php?year=$matches[1]";s:27:".?.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:".?.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:20:"(.?.+?)/trackback/?$";s:35:"index.php?pagename=$matches[1]&tb=1";s:40:"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:35:"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:28:"(.?.+?)/page/?([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&paged=$matches[2]";s:35:"(.?.+?)/comment-page-([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&cpage=$matches[2]";s:20:"(.?.+?)(/[0-9]+)?/?$";s:47:"index.php?pagename=$matches[1]&page=$matches[2]";s:31:".+?/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:41:".+?/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:61:".+?/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:56:".+?/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:56:".+?/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:26:"(.+?)/([^/]+)/trackback/?$";s:57:"index.php?category_name=$matches[1]&name=$matches[2]&tb=1";s:46:"(.+?)/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:69:"index.php?category_name=$matches[1]&name=$matches[2]&feed=$matches[3]";s:41:"(.+?)/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:69:"index.php?category_name=$matches[1]&name=$matches[2]&feed=$matches[3]";s:34:"(.+?)/([^/]+)/page/?([0-9]{1,})/?$";s:70:"index.php?category_name=$matches[1]&name=$matches[2]&paged=$matches[3]";s:41:"(.+?)/([^/]+)/comment-page-([0-9]{1,})/?$";s:70:"index.php?category_name=$matches[1]&name=$matches[2]&cpage=$matches[3]";s:26:"(.+?)/([^/]+)(/[0-9]+)?/?$";s:69:"index.php?category_name=$matches[1]&name=$matches[2]&page=$matches[3]";s:20:".+?/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:30:".+?/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:50:".+?/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:45:".+?/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:45:".+?/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:38:"(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:33:"(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:26:"(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:33:"(.+?)/comment-page-([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&cpage=$matches[2]";s:8:"(.+?)/?$";s:35:"index.php?category_name=$matches[1]";}', 'yes'),
(783, 0, '_site_transient_browser_61bfabcb3a96faa38cd57badca0157a3', 'a:9:{s:8:"platform";s:7:"Windows";s:4:"name";s:7:"Firefox";s:7:"version";s:5:"9.0.1";s:10:"update_url";s:23:"http://www.firefox.com/";s:7:"img_src";s:50:"http://s.wordpress.org/images/browsers/firefox.png";s:11:"img_src_ssl";s:49:"https://wordpress.org/images/browsers/firefox.png";s:15:"current_version";s:1:"9";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'yes'),
(782, 0, '_site_transient_timeout_browser_61bfabcb3a96faa38cd57badca0157a3', '1328536853', 'yes'),
(947, 0, '_transient_timeout_feed_57bc725ad6568758915363af670fd8bc', '1329180362', 'no'),
(948, 0, '_transient_feed_57bc725ad6568758915363af670fd8bc', 'a:4:{s:5:"child";a:1:{s:0:"";a:1:{s:3:"rss";a:1:{i:0;a:6:{s:4:"data";s:3:"\n	\n";s:7:"attribs";a:1:{s:0:"";a:1:{s:7:"version";s:3:"2.0";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:1:{s:7:"channel";a:1:{i:0;a:6:{s:4:"data";s:72:"\n		\n		\n		\n		\n		\n		\n				\n\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n\n	";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:33:"WordPress Plugins » View: Newest";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:47:"http://wordpress.org/extend/plugins/browse/new/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:33:"WordPress Plugins » View: Newest";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"language";a:1:{i:0;a:5:{s:4:"data";s:5:"en-US";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 13 Feb 2012 12:45:16 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:9:"generator";a:1:{i:0;a:5:{s:4:"data";s:25:"http://bbpress.org/?v=1.1";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"item";a:15:{i:0;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:28:"svnlabs on "Valentine''s Day"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:62:"http://wordpress.org/extend/plugins/valentines-day/#post-34786";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 10 Feb 2012 16:41:34 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"34786@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:96:"Display falling hearts and tunes on Saint Valentine&#039;s Day to express love with you website.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:7:"svnlabs";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:1;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:25:"barrena on "Tu.Tv Oembed"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:59:"http://wordpress.org/extend/plugins/tutv-oembed/#post-34847";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 13 Feb 2012 09:30:16 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"34847@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:192:"Simple plugin para que puedas añadir videos de <a href="http://tu.tv" rel="nofollow">http://tu.tv</a> a tu blog de Wordpress. Sólo tiene que copiar la dirección (URL) del video en tu post o";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:7:"barrena";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:2;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:30:"plhwin on "友荐推荐工具"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:53:"http://wordpress.org/extend/plugins/ujian/#post-34689";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 08 Feb 2012 03:03:28 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"34689@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:150:"友荐是一款基于社会化的智能推荐工具，只需添加一行代码，即可为您的网站添加站内智能推荐功能，当用户浏览";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:6:"plhwin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:3;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:40:"Vinoj Cardoza on "Cardoza Worpress Poll"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:70:"http://wordpress.org/extend/plugins/cardoza-wordpress-poll/#post-34835";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sun, 12 Feb 2012 16:13:59 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"34835@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:138:"Cardoza Wordpress Poll is completely ajax powered polling system. This poll plugin supports both single and multiple selection of answers.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Vinoj Cardoza";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:4;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:25:"ichurakov on "Contact Me"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:63:"http://wordpress.org/extend/plugins/ajax-contact-me/#post-34790";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 10 Feb 2012 18:03:18 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"34790@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:132:"Contact Me is an elegant and light AJAX contact form. Activate the plugin and insert simple short code [contactme] into posts/pages.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"ichurakov";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:5;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:41:"tpk on "Cart Analytics for WP e-Commerce"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:80:"http://wordpress.org/extend/plugins/cart-analytics-for-wp-e-commerce/#post-34810";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 11 Feb 2012 11:30:59 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"34810@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:84:"Checks how many products added to cart are actually purchased. WP e-Commerce needed.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:3:"tpk";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:6;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:44:"blacktooth on "Authenticated Twitter Widget"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:76:"http://wordpress.org/extend/plugins/authenticated-twitter-widget/#post-34717";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 08 Feb 2012 18:47:30 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"34717@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:112:"Display tweets from your Twitter account in a WordPress widget with the option of using Authenticated API calls.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:10:"blacktooth";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:7;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:27:"Diije on "wp-link-analysis"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:64:"http://wordpress.org/extend/plugins/wp-link-analysis/#post-34709";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 08 Feb 2012 16:12:05 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"34709@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:129:"Ce plugin analyse les liens contenus dans un article et les affiche dans une metabox dans l&#039;interface d&#039;administration.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:5:"Diije";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:8;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:30:"wprelief on "Sk Replace Howdy"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:64:"http://wordpress.org/extend/plugins/sk-replace-howdy/#post-34676";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 07 Feb 2012 16:41:14 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"34676@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:85:"Allows you to change the greeting message that is at the top of your wp-admin screens";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:8:"wprelief";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:9;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:42:"wprelief on "SK Add Visual Editor Buttons"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:81:"http://wordpress.org/extend/plugins/add-buttons-to-your-visual-editor/#post-34677";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 07 Feb 2012 17:03:37 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"34677@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:88:"Adds buttons to the visual editor, which give you more functionality when editing posts.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:8:"wprelief";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:10;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:36:"dloading on "Weather sidebar widget"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:70:"http://wordpress.org/extend/plugins/weather-sidebar-widget/#post-34651";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 06 Feb 2012 21:13:27 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"34651@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:135:"The Weather sidebar widget shows current weather and forecasts for the current day and the next three days for any location you choose.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:8:"dloading";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:11;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:42:"Jabawack on "Simple Custom Posts per Page"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:76:"http://wordpress.org/extend/plugins/simple-custom-posts-per-page/#post-34777";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 10 Feb 2012 11:00:13 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"34777@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:95:"This plugin allows to configure the number of posts displayed for every custom post registered.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:8:"Jabawack";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:12;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:37:"subanomic on "Recent Video Aggregate"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:70:"http://wordpress.org/extend/plugins/recent-video-aggregate/#post-34516";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 02 Feb 2012 14:17:20 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"34516@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:71:"Provides a widget that displays recent videos from Vimeo, YouTube, etc.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:9:"subanomic";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:13;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:25:"Nathan Osman on "StackAd"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:55:"http://wordpress.org/extend/plugins/stackad/#post-34767";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 09 Feb 2012 22:29:11 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"34767@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:96:"StackAd provides an easy way to advertise open source projects on your blog with minimal effort.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:12:"Nathan Osman";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:14;a:6:{s:4:"data";s:30:"\n			\n			\n			\n			\n			\n			\n					";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:27:"mlazarov on "WP Post Links"";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:61:"http://wordpress.org/extend/plugins/wp-post-links/#post-34780";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 10 Feb 2012 14:44:47 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:42:"34780@http://wordpress.org/extend/plugins/";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:67:"Easy way to add unlimited permanent links after each of your posts.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:8:"mlazarov";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}s:27:"http://www.w3.org/2005/Atom";a:1:{s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:0:"";s:7:"attribs";a:1:{s:0:"";a:3:{s:4:"href";s:48:"http://wordpress.org/extend/plugins/rss/view/new";s:3:"rel";s:4:"self";s:4:"type";s:19:"application/rss+xml";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}}}}}}s:4:"type";i:128;s:7:"headers";a:8:{s:6:"server";s:5:"nginx";s:4:"date";s:29:"Mon, 13 Feb 2012 12:46:03 GMT";s:12:"content-type";s:23:"text/xml; charset=UTF-8";s:10:"connection";s:5:"close";s:4:"vary";s:15:"Accept-Encoding";s:13:"last-modified";s:19:"2012-02-10 16:41:34";s:14:"content-length";s:4:"7946";s:4:"x-nc";s:11:"HIT luv 139";}s:5:"build";s:14:"20090627192103";}', 'no'),
(923, 0, '_site_transient_timeout_browser_7ffa122e40fe13a1dfc7db6bb40b4361', '1329741957', 'yes'),
(924, 0, '_site_transient_browser_7ffa122e40fe13a1dfc7db6bb40b4361', 'a:9:{s:8:"platform";s:9:"Macintosh";s:4:"name";s:7:"Firefox";s:7:"version";s:6:"10.0.1";s:10:"update_url";s:23:"http://www.firefox.com/";s:7:"img_src";s:50:"http://s.wordpress.org/images/browsers/firefox.png";s:11:"img_src_ssl";s:49:"https://wordpress.org/images/browsers/firefox.png";s:15:"current_version";s:1:"9";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wp_postmeta`
--

CREATE TABLE IF NOT EXISTS `tbl_wp_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=169 ;

--
-- Dumping data for table `tbl_wp_postmeta`
--

INSERT INTO `tbl_wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 3, '_edit_last', '1'),
(5, 3, '_edit_lock', '1326979260:1'),
(8, 5, '_edit_last', '1'),
(11, 5, '_edit_lock', '1326979247:1'),
(30, 23, '_edit_last', '1'),
(31, 23, '_edit_lock', '1328265397:1'),
(32, 23, '_wp_page_template', 'blogpage.php'),
(40, 1, '_edit_last', '1'),
(43, 31, '_edit_last', '1'),
(39, 1, '_edit_lock', '1326979657:1'),
(44, 31, '_edit_lock', '1327060268:1'),
(50, 31, 'Youtube_id', 'ho6_JeZI9ZI'),
(53, 35, '_menu_item_type', 'post_type'),
(54, 35, '_menu_item_menu_item_parent', '0'),
(55, 35, '_menu_item_object_id', '23'),
(56, 35, '_menu_item_object', 'page'),
(57, 35, '_menu_item_target', ''),
(58, 35, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(59, 35, '_menu_item_xfn', ''),
(60, 35, '_menu_item_url', ''),
(72, 37, '_menu_item_menu_item_parent', '0'),
(62, 36, '_menu_item_type', 'post_type'),
(63, 36, '_menu_item_menu_item_parent', '0'),
(64, 36, '_menu_item_object_id', '2'),
(65, 36, '_menu_item_object', 'page'),
(66, 36, '_menu_item_target', ''),
(67, 36, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(68, 36, '_menu_item_xfn', ''),
(69, 36, '_menu_item_url', ''),
(71, 37, '_menu_item_type', 'post_type'),
(73, 37, '_menu_item_object_id', '23'),
(74, 37, '_menu_item_object', 'page'),
(75, 37, '_menu_item_target', ''),
(76, 37, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(77, 37, '_menu_item_xfn', ''),
(78, 37, '_menu_item_url', ''),
(90, 39, '_menu_item_menu_item_parent', '0'),
(80, 38, '_menu_item_type', 'post_type'),
(81, 38, '_menu_item_menu_item_parent', '0'),
(82, 38, '_menu_item_object_id', '2'),
(83, 38, '_menu_item_object', 'page'),
(84, 38, '_menu_item_target', ''),
(85, 38, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(86, 38, '_menu_item_xfn', ''),
(87, 38, '_menu_item_url', ''),
(89, 39, '_menu_item_type', 'post_type'),
(91, 39, '_menu_item_object_id', '23'),
(92, 39, '_menu_item_object', 'page'),
(93, 39, '_menu_item_target', ''),
(94, 39, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(95, 39, '_menu_item_xfn', ''),
(96, 39, '_menu_item_url', ''),
(108, 41, '_menu_item_menu_item_parent', '0'),
(98, 40, '_menu_item_type', 'post_type'),
(99, 40, '_menu_item_menu_item_parent', '0'),
(100, 40, '_menu_item_object_id', '2'),
(101, 40, '_menu_item_object', 'page'),
(102, 40, '_menu_item_target', ''),
(103, 40, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(104, 40, '_menu_item_xfn', ''),
(105, 40, '_menu_item_url', ''),
(107, 41, '_menu_item_type', 'custom'),
(109, 41, '_menu_item_object_id', '41'),
(110, 41, '_menu_item_object', 'custom'),
(111, 41, '_menu_item_target', ''),
(112, 41, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(113, 41, '_menu_item_xfn', ''),
(114, 41, '_menu_item_url', '#'),
(116, 42, '_menu_item_type', 'custom'),
(117, 42, '_menu_item_menu_item_parent', '0'),
(118, 42, '_menu_item_object_id', '42'),
(119, 42, '_menu_item_object', 'custom'),
(120, 42, '_menu_item_target', ''),
(121, 42, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(122, 42, '_menu_item_xfn', ''),
(123, 42, '_menu_item_url', '#'),
(145, 31, 'detail_page_top_text', 'A LOOK INSIDE THE COMPANY - TWINNE TV'),
(125, 43, '_menu_item_type', 'custom'),
(126, 43, '_menu_item_menu_item_parent', '0'),
(127, 43, '_menu_item_object_id', '43'),
(128, 43, '_menu_item_object', 'custom'),
(129, 43, '_menu_item_target', ''),
(130, 43, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(131, 43, '_menu_item_xfn', ''),
(132, 43, '_menu_item_url', '#'),
(144, 2, '_edit_last', '1'),
(134, 44, '_menu_item_type', 'custom'),
(135, 44, '_menu_item_menu_item_parent', '0'),
(136, 44, '_menu_item_object_id', '44'),
(137, 44, '_menu_item_object', 'custom'),
(138, 44, '_menu_item_target', ''),
(139, 44, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(140, 44, '_menu_item_xfn', ''),
(141, 44, '_menu_item_url', 'http://www.google.co.in/'),
(143, 2, '_edit_lock', '1328882551:1'),
(153, 54, '_edit_lock', '1327060876:1'),
(152, 54, '_edit_last', '1'),
(154, 54, 'Youtube_id', 'SwbP9WLX3fY'),
(155, 54, 'detail_page_top_text', 'Lorem Ipsum is simply dummy'),
(159, 57, '_edit_lock', '1327933908:1'),
(158, 57, '_edit_last', '1'),
(160, 57, '_wp_page_template', 'menus.php'),
(161, 60, '_edit_last', '1'),
(162, 60, '_edit_lock', '1327921479:1'),
(166, 62, '_edit_lock', '1327924879:1'),
(165, 62, '_edit_last', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wp_posts`
--

CREATE TABLE IF NOT EXISTS `tbl_wp_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_excerpt` text NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_password` varchar(20) NOT NULL DEFAULT '',
  `post_name` varchar(200) NOT NULL DEFAULT '',
  `to_ping` text NOT NULL,
  `pinged` text NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` text NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `tbl_wp_posts`
--

INSERT INTO `tbl_wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2011-12-09 04:28:35', '2011-12-09 04:28:35', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vestibulum fermentum erat eget luctus. Pellentesque tristique, ipsum eu euismod lacinia, nisl sem elementum lectus, at vehicula purus magna sed dolor. Vestibulum augue eros, interdum et tincidunt sed, lobortis eget nulla. Cras malesuada, lectus sit amet elementum sollicitudin, orci diam ornare elit, quis consequat lacus neque hendrerit justo. Phasellus id leo quis est consectetur feugiat nec nec erat. Aliquam molestie consectetur nunc, in volutpat nisl condimentum id. Sed id tellus nulla, vitae condimentum leo. Donec vehicula vestibulum aliquam. Vivamus id fermentum lectus. Aenean eget dolor tellus. Aenean a purus eros. Donec quis risus nunc. Sed a nibh ligula, et sollicitudin lacus. Nunc vitae mauris velit.\r\n\r\nUt sit amet tincidunt enim. Vestibulum convallis fringilla sollicitudin. Fusce suscipit porttitor sapien, vel posuere nisi lacinia et. Phasellus quis tincidunt mi. Morbi consectetur, mi sit amet lacinia mattis, orci lacus blandit mauris, a lobortis ante magna ac libero. Aliquam elementum pharetra justo ac feugiat. Nullam varius rutrum elit vel dictum. Duis gravida, tellus eget imperdiet ornare, mi est viverra magna, a adipiscing lectus tortor eu nibh. Integer quam nisi, accumsan ut convallis sed, interdum quis magna. Suspendisse congue, turpis eu hendrerit suscipit, magna nisl pellentesque nisl, eget interdum elit lectus at dolor. Duis sed purus erat, eu posuere metus. Proin quam nisi, consectetur vitae tempus non, blandit et ligula. Aenean magna velit, euismod ac imperdiet quis, tristique posuere turpis. In ut ante lorem, in condimentum dui. Pellentesque vehicula metus at dolor fringilla eget commodo nisl condimentum.', 'Hello world!', '', 'publish', 'open', 'open', '', 'hello-world', '', '', '2012-01-19 13:23:04', '2012-01-19 13:23:04', '', 0, 'http://localhost/twinne/blog/?p=1', 0, 'post', '', 2),
(2, 1, '2011-12-09 04:28:35', '2011-12-09 04:28:35', 'This is an example page. It''s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:\r\n<blockquote>Hi there! I''m a bike messenger by day, aspiring actor by night, and this is my blog. I live in Los Angeles, have a great dog named Jack, and I like piña coladas. (And gettin'' caught in the rain.)</blockquote>\r\n...or something like this:\r\n<blockquote>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickies to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</blockquote>\r\nAs a new WordPress user, you should go to <a href="http://localhost/twinne/blog/wp-admin/">your dashboard</a> to delete this page and create new pages for your content. Have fun!', 'Sample Page', '', 'publish', 'closed', 'open', '', 'sample-page', '', '', '2012-01-20 10:43:15', '2012-01-20 10:43:15', '', 0, 'http://localhost/twinne/blog/?page_id=2', 0, 'page', '', 0),
(3, 1, '2011-12-21 06:25:05', '2011-12-21 06:25:05', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vestibulum fermentum erat eget luctus. Pellentesque tristique, ipsum eu euismod lacinia, nisl sem elementum lectus, at vehicula purus magna sed dolor. Vestibulum augue eros, interdum et tincidunt sed, lobortis eget nulla. Cras malesuada, lectus sit amet elementum sollicitudin, orci diam ornare elit, quis consequat lacus neque hendrerit justo. Phasellus id leo quis est consectetur feugiat nec nec erat. Aliquam molestie consectetur nunc, in volutpat nisl condimentum id. Sed id tellus nulla, vitae condimentum leo. Donec vehicula vestibulum aliquam. Vivamus id fermentum lectus. Aenean eget dolor tellus. Aenean a purus eros. Donec quis risus nunc. Sed a nibh ligula, et sollicitudin lacus. Nunc vitae mauris velit.\r\n\r\nUt sit amet tincidunt enim. Vestibulum convallis fringilla sollicitudin. Fusce suscipit porttitor sapien, vel posuere nisi lacinia et. Phasellus quis tincidunt mi. Morbi consectetur, mi sit amet lacinia mattis, orci lacus blandit mauris, a lobortis ante magna ac libero. Aliquam elementum pharetra justo ac feugiat. Nullam varius rutrum elit vel dictum. Duis gravida, tellus eget imperdiet ornare, mi est viverra magna, a adipiscing lectus tortor eu nibh. Integer quam nisi, accumsan ut convallis sed, interdum quis magna. Suspendisse congue, turpis eu hendrerit suscipit, magna nisl pellentesque nisl, eget interdum elit lectus at dolor. Duis sed purus erat, eu posuere metus. Proin quam nisi, consectetur vitae tempus non, blandit et ligula. Aenean magna velit, euismod ac imperdiet quis, tristique posuere turpis. In ut ante lorem, in condimentum dui. Pellentesque vehicula metus at dolor fringilla eget commodo nisl condimentum.', 'Test', '', 'publish', 'open', 'open', '', 'test', '', '', '2012-01-19 13:22:50', '2012-01-19 13:22:50', '', 0, 'http://localhost/twinne/blog/?p=3', 0, 'post', '', 2),
(4, 1, '2011-12-09 04:28:51', '2011-12-09 04:28:51', '', 'Auto Draft', '', 'inherit', 'open', 'open', '', '3-revision', '', '', '2011-12-09 04:28:51', '2011-12-09 04:28:51', '', 3, 'http://hostingmachine.net/dev/twinne/blog/?p=4', 0, 'revision', '', 0),
(5, 1, '2011-12-29 14:00:29', '2011-12-29 14:00:29', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vestibulum fermentum erat eget luctus. Pellentesque tristique, ipsum eu euismod lacinia, nisl sem elementum lectus, at vehicula purus magna sed dolor. Vestibulum augue eros, interdum et tincidunt sed, lobortis eget nulla. Cras malesuada, lectus sit amet elementum sollicitudin, orci diam ornare elit, quis consequat lacus neque hendrerit justo. Phasellus id leo quis est consectetur feugiat nec nec erat. Aliquam molestie consectetur nunc, in volutpat nisl condimentum id. Sed id tellus nulla, vitae condimentum leo. Donec vehicula vestibulum aliquam. Vivamus id fermentum lectus. Aenean eget dolor tellus. Aenean a purus eros. Donec quis risus nunc. Sed a nibh ligula, et sollicitudin lacus. Nunc vitae mauris velit.\r\n\r\nUt sit amet tincidunt enim. Vestibulum convallis fringilla sollicitudin. Fusce suscipit porttitor sapien, vel posuere nisi lacinia et. Phasellus quis tincidunt mi. Morbi consectetur, mi sit amet lacinia mattis, orci lacus blandit mauris, a lobortis ante magna ac libero. Aliquam elementum pharetra justo ac feugiat. Nullam varius rutrum elit vel dictum. Duis gravida, tellus eget imperdiet ornare, mi est viverra magna, a adipiscing lectus tortor eu nibh. Integer quam nisi, accumsan ut convallis sed, interdum quis magna. Suspendisse congue, turpis eu hendrerit suscipit, magna nisl pellentesque nisl, eget interdum elit lectus at dolor. Duis sed purus erat, eu posuere metus. Proin quam nisi, consectetur vitae tempus non, blandit et ligula. Aenean magna velit, euismod ac imperdiet quis, tristique posuere turpis. In ut ante lorem, in condimentum dui. Pellentesque vehicula metus at dolor fringilla eget commodo nisl condimentum.', 'mukesh blog', '', 'publish', 'open', 'open', '', 'mukesh-blog', '', '', '2012-01-19 13:22:34', '2012-01-19 13:22:34', '', 0, 'http://hostingmachine.net/dev/twinne/blog/?p=5', 0, 'post', '', 3),
(6, 1, '2011-12-21 06:27:59', '2011-12-21 06:27:59', 'Hi,\nTesting process.', 'Test', '', 'inherit', 'open', 'open', '', '3-autosave', '', '', '2011-12-21 06:27:59', '2011-12-21 06:27:59', '', 3, 'http://hostingmachine.net/dev/twinne/blog/?p=6', 0, 'revision', '', 0),
(7, 1, '2011-12-21 06:25:05', '2011-12-21 06:25:05', 'Hi,\r\n    Testing process.', 'Test', '', 'inherit', 'open', 'open', '', '3-revision-2', '', '', '2011-12-21 06:25:05', '2011-12-21 06:25:05', '', 3, 'http://hostingmachine.net/dev/twinne/blog/?p=7', 0, 'revision', '', 0),
(8, 1, '2011-12-21 06:28:46', '2011-12-21 06:28:46', 'Hi,\r\nTesting process.', 'Test', '', 'inherit', 'open', 'open', '', '3-revision-3', '', '', '2011-12-21 06:28:46', '2011-12-21 06:28:46', '', 3, 'http://hostingmachine.net/dev/twinne/blog/?p=8', 0, 'revision', '', 0),
(9, 1, '2011-12-21 06:25:05', '2011-12-21 06:25:05', '', 'Auto Draft', '', 'inherit', 'open', 'open', '', '5-revision', '', '', '2011-12-21 06:25:05', '2011-12-21 06:25:05', '', 5, 'http://hostingmachine.net/dev/twinne/blog/?p=9', 0, 'revision', '', 0),
(59, 1, '2012-01-30 05:33:25', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'closed', 'open', '', '', '', '', '2012-01-30 05:33:25', '0000-00-00 00:00:00', '', 0, 'http://localhost/twinne/blog/?p=59', 0, 'post', '', 0),
(23, 1, '2012-01-19 12:42:08', '2012-01-19 12:42:08', '', 'blogpage', '', 'publish', 'open', 'open', '', 'blogpage', '', '', '2012-01-19 12:42:08', '2012-01-19 12:42:08', '', 0, 'http://localhost/twinne/blog/?page_id=23', 0, 'page', '', 0),
(22, 1, '2012-01-04 10:28:52', '2012-01-04 10:28:52', 'I have place my blog here.', 'mukesh blog', '', 'inherit', 'open', 'open', '', '5-autosave', '', '', '2012-01-04 10:28:52', '2012-01-04 10:28:52', '', 5, 'http://hostingmachine.net/dev/twinne/blog/?p=22', 0, 'revision', '', 0),
(24, 1, '2012-01-19 12:42:05', '2012-01-19 12:42:05', '', 'blogpage', '', 'inherit', 'open', 'open', '', '23-revision', '', '', '2012-01-19 12:42:05', '2012-01-19 12:42:05', '', 23, 'http://localhost/twinne/blog/?p=24', 0, 'revision', '', 0),
(57, 1, '2012-01-27 09:01:11', '2012-01-27 09:01:11', '', 'Footer menu', '', 'publish', 'closed', 'open', '', 'footermenu', '', '', '2012-01-30 14:23:06', '2012-01-30 14:23:06', '', 0, 'http://localhost/twinne/blog/?page_id=57', 0, 'page', '', 0),
(26, 1, '2011-12-29 14:00:29', '2011-12-29 14:00:29', 'I have place my blog here.', 'mukesh blog', '', 'inherit', 'closed', 'open', '', '5-revision-2', '', '', '2011-12-29 14:00:29', '2011-12-29 14:00:29', '', 5, 'http://localhost/twinne/blog/?p=26', 0, 'revision', '', 0),
(27, 1, '2012-01-19 12:57:20', '2012-01-19 12:57:20', 'I have place my blog here.', 'mukesh blog', '', 'inherit', 'closed', 'open', '', '5-revision-3', '', '', '2012-01-19 12:57:20', '2012-01-19 12:57:20', '', 5, 'http://localhost/twinne/blog/?p=27', 0, 'revision', '', 0),
(28, 1, '2011-12-21 06:29:38', '2011-12-21 06:29:38', 'Hi,\r\nTesting process.', 'Test', '', 'inherit', 'closed', 'open', '', '3-revision-4', '', '', '2011-12-21 06:29:38', '2011-12-21 06:29:38', '', 3, 'http://localhost/twinne/blog/?p=28', 0, 'revision', '', 0),
(29, 1, '2011-12-09 04:28:35', '2011-12-09 04:28:35', 'Welcome to WordPress. This is your first post. Edit or delete it, then start blogging!', 'Hello world!', '', 'inherit', 'closed', 'open', '', '1-revision', '', '', '2011-12-09 04:28:35', '2011-12-09 04:28:35', '', 1, 'http://localhost/twinne/blog/?p=29', 0, 'revision', '', 0),
(30, 1, '2012-01-19 13:24:07', '2012-01-19 13:24:07', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vestibulum fermentum erat eget luctus. Pellentesque tristique, ipsum eu euismod lacinia, nisl sem elementum lectus, at vehicula purus magna sed dolor. Vestibulum augue eros, interdum et tincidunt sed, lobortis eget nulla. Cras malesuada, lectus sit amet elementum sollicitudin, orci diam ornare elit, quis consequat lacus neque hendrerit justo. Phasellus id leo quis est consectetur feugiat nec nec erat. Aliquam molestie consectetur nunc, in volutpat nisl condimentum id. Sed id tellus nulla, vitae condimentum leo. Donec vehicula vestibulum aliquam. Vivamus id fermentum lectus. Aenean eget dolor tellus. Aenean a purus eros. Donec quis risus nunc. Sed a nibh ligula, et sollicitudin lacus. Nunc vitae mauris velit.\n\nUt sit amet tincidunt enim. Vestibulum convallis fringilla sollicitudin. Fusce suscipit porttitor sapien, vel posuere nisi lacinia et. Phasellus quis tincidunt mi. Morbi consectetur, mi sit amet lacinia mattis, orci lacus blandit mauris, a lobortis ante magna ac libero. Aliquam elementum pharetra justo ac feugiat. Nullam varius rutrum elit vel dictum. Duis gravida, tellus eget imperdiet ornare, mi est viverra magna, a adipiscing lectus tortor eu nibh. Integer quam nisi, accumsan ut convallis sed, interdum quis magna. Suspendisse congue, turpis eu hendrerit suscipit, magna nisl pellentesque nisl, eget interdum elit lectus at dolor. Duis sed purus erat, eu posuere metus. Proin quam nisi, consectetur vitae tempus non, blandit et ligula. Aenean magna velit, euismod ac imperdiet quis, tristique posuere turpis. In ut ante lorem, in condimentum dui. Pellentesque vehicula metus at dolor fringilla eget commodo nisl condimentum.', 'Hello world!', '', 'inherit', 'closed', 'open', '', '1-autosave', '', '', '2012-01-19 13:24:07', '2012-01-19 13:24:07', '', 1, 'http://localhost/twinne/blog/?p=30', 0, 'revision', '', 0),
(31, 1, '2012-01-19 14:01:45', '2012-01-19 14:01:45', 'Etiam eleifend vulputate viverra. Maecenas tempus massa neque. Phasellus nec turpis interdum sapien pharetra tempus a ac orci. Suspendisse pharetra leo nec tellus fringilla cursus. Morbi eget erat nunc. Proin velit mauris, pretium sed imperdiet nec, commodo fringilla leo. Mauris suscipit malesuada turpis, vel viverra risus elementum et.', 'first vidio', '', 'publish', 'open', 'open', '', 'first-vidio', '', '', '2012-01-20 11:30:17', '2012-01-20 11:30:17', '', 0, 'http://localhost/twinne/blog/?p=31', 0, 'post', '', 3),
(32, 1, '2012-01-19 14:01:44', '2012-01-19 14:01:44', '', 'first vidio', '', 'inherit', 'closed', 'open', '', '31-revision', '', '', '2012-01-19 14:01:44', '2012-01-19 14:01:44', '', 31, 'http://localhost/twinne/blog/?p=32', 0, 'revision', '', 0),
(33, 1, '2012-01-19 14:01:45', '2012-01-19 14:01:45', '', 'first vidio', '', 'inherit', 'closed', 'open', '', '31-revision-2', '', '', '2012-01-19 14:01:45', '2012-01-19 14:01:45', '', 31, 'http://localhost/twinne/blog/?p=33', 0, 'revision', '', 0),
(34, 1, '2012-01-19 14:02:10', '2012-01-19 14:02:10', '', 'first vidio', '', 'inherit', 'closed', 'open', '', '31-revision-3', '', '', '2012-01-19 14:02:10', '2012-01-19 14:02:10', '', 31, 'http://localhost/twinne/blog/?p=34', 0, 'revision', '', 0),
(35, 1, '2012-01-20 09:16:37', '2012-01-20 09:16:37', ' ', '', '', 'publish', 'closed', 'open', '', '35', '', '', '2012-01-20 09:20:01', '2012-01-20 09:20:01', '', 0, 'http://localhost/twinne/blog/?p=35', 1, 'nav_menu_item', '', 0),
(36, 1, '2012-01-20 09:16:38', '2012-01-20 09:16:38', ' ', '', '', 'publish', 'closed', 'open', '', '36', '', '', '2012-01-20 09:20:01', '2012-01-20 09:20:01', '', 0, 'http://localhost/twinne/blog/?p=36', 2, 'nav_menu_item', '', 0),
(37, 1, '2012-01-20 09:16:47', '2012-01-20 09:16:47', '', 'blogpage1', '', 'publish', 'closed', 'open', '', '37', '', '', '2012-01-31 05:31:28', '2012-01-31 05:31:28', '', 0, 'http://localhost/twinne/blog/?p=37', 1, 'nav_menu_item', '', 0),
(38, 1, '2012-01-20 09:16:47', '2012-01-20 09:16:47', '', 'Sample Page1', '', 'publish', 'closed', 'open', '', '38', '', '', '2012-01-31 05:31:28', '2012-01-31 05:31:28', '', 0, 'http://localhost/twinne/blog/?p=38', 2, 'nav_menu_item', '', 0),
(39, 1, '2012-01-20 09:18:29', '2012-01-20 09:18:29', ' ', '', '', 'publish', 'closed', 'open', '', '39', '', '', '2012-01-20 09:18:29', '2012-01-20 09:18:29', '', 0, 'http://localhost/twinne/blog/?p=39', 1, 'nav_menu_item', '', 0),
(40, 1, '2012-01-20 09:18:29', '2012-01-20 09:18:29', ' ', '', '', 'publish', 'closed', 'open', '', '40', '', '', '2012-01-20 09:18:29', '2012-01-20 09:18:29', '', 0, 'http://localhost/twinne/blog/?p=40', 2, 'nav_menu_item', '', 0),
(41, 1, '2012-01-20 09:20:01', '2012-01-20 09:20:01', '', 'Lorem ipsum ', '', 'publish', 'closed', 'open', '', 'lorem-ipsum', '', '', '2012-01-20 09:20:01', '2012-01-20 09:20:01', '', 0, 'http://localhost/twinne/blog/?p=41', 3, 'nav_menu_item', '', 0),
(42, 1, '2012-01-20 09:20:44', '2012-01-20 09:20:44', '', 'Lorem ipsum ', '', 'publish', 'closed', 'open', '', 'lorem-ipsum-2', '', '', '2012-01-31 05:31:28', '2012-01-31 05:31:28', '', 0, 'http://localhost/twinne/blog/?p=42', 3, 'nav_menu_item', '', 0),
(43, 1, '2012-01-20 09:20:44', '2012-01-20 09:20:44', '', 'Maecenas sit ', '', 'publish', 'closed', 'open', '', 'maecenas-sit', '', '', '2012-01-31 05:31:28', '2012-01-31 05:31:28', '', 0, 'http://localhost/twinne/blog/?p=43', 4, 'nav_menu_item', '', 0),
(44, 1, '2012-01-20 09:20:44', '2012-01-20 09:20:44', '', 'Donec', '', 'publish', 'closed', 'open', '', 'donec', '', '', '2012-01-31 05:31:28', '2012-01-31 05:31:28', '', 0, 'http://localhost/twinne/blog/?p=44', 5, 'nav_menu_item', '', 0),
(45, 1, '2011-12-09 04:28:35', '2011-12-09 04:28:35', 'This is an example page. It''s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:\n\n<blockquote>Hi there! I''m a bike messenger by day, aspiring actor by night, and this is my blog. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin'' caught in the rain.)</blockquote>\n\n...or something like this:\n\n<blockquote>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickies to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</blockquote>\n\nAs a new WordPress user, you should go to <a href="http://localhost/twinne/blog/wp-admin/">your dashboard</a> to delete this page and create new pages for your content. Have fun!', 'Sample Page', '', 'inherit', 'closed', 'open', '', '2-revision', '', '', '2011-12-09 04:28:35', '2011-12-09 04:28:35', '', 2, 'http://localhost/twinne/blog/?p=45', 0, 'revision', '', 0),
(46, 1, '2012-01-20 10:41:37', '2012-01-20 10:41:37', 'This is an example page. It''s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:\r\n<blockquote>Hi there! I''m a bike messenger by day, aspiring actor by night, and this is my blog. I live in Los Angeles, have a great dog named Jack, and I like piña coladas. (And gettin'' caught in the rain.)</blockquote>\r\n...or something like this:\r\n<blockquote>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickies to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</blockquote>\r\nAs a new WordPress user, you should go to <a href="http://localhost/twinne/blog/wp-admin/">your dashboard</a> to delete this page and create new pages for your content. Have fun!', 'Sample Page', '', 'inherit', 'closed', 'open', '', '2-revision-2', '', '', '2012-01-20 10:41:37', '2012-01-20 10:41:37', '', 2, 'http://localhost/twinne/blog/?p=46', 0, 'revision', '', 0),
(47, 1, '2012-01-20 10:41:58', '2012-01-20 10:41:58', 'This is an example page. It''s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:\r\n<blockquote>Hi there! I''m a bike messenger by day, aspiring actor by night, and this is my blog. I live in Los Angeles, have a great dog named Jack, and I like piña coladas. (And gettin'' caught in the rain.)</blockquote>\r\n...or something like this:\r\n<blockquote>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickies to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</blockquote>\r\nAs a new WordPress user, you should go to <a href="http://localhost/twinne/blog/wp-admin/">your dashboard</a> to delete this page and create new pages for your content. Have fun!', 'Sample Page', '', 'inherit', 'closed', 'open', '', '2-revision-3', '', '', '2012-01-20 10:41:58', '2012-01-20 10:41:58', '', 2, 'http://localhost/twinne/blog/?p=47', 0, 'revision', '', 0),
(48, 1, '2012-01-20 10:42:22', '2012-01-20 10:42:22', 'This is an example page. It''s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:\r\n<blockquote>Hi there! I''m a bike messenger by day, aspiring actor by night, and this is my blog. I live in Los Angeles, have a great dog named Jack, and I like piña coladas. (And gettin'' caught in the rain.)</blockquote>\r\n...or something like this:\r\n<blockquote>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickies to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</blockquote>\r\nAs a new WordPress user, you should go to <a href="http://localhost/twinne/blog/wp-admin/">your dashboard</a> to delete this page and create new pages for your content. Have fun!', 'Sample Page', '', 'inherit', 'closed', 'open', '', '2-revision-4', '', '', '2012-01-20 10:42:22', '2012-01-20 10:42:22', '', 2, 'http://localhost/twinne/blog/?p=48', 0, 'revision', '', 0),
(49, 1, '2012-01-27 09:39:13', '2012-01-27 09:39:13', 'This is an example page. It''s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:\n<blockquote>Hi there! I''m a bike messenger by day, aspiring actor by night, and this is my blog. I live in Los Angeles, have a great dog named Jack, and I like piña coladas. (And gettin'' caught in the rain.)</blockquote>\n...or something like this:\n<blockquote>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickies to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</blockquote>\nAs a new WordPress user, you should go to <a href="http://localhost/twinne/blog/wp-admin/">your dashboard</a> to delete this page and create new pages for your content. Have fun!', 'Sample Page', '', 'inherit', 'closed', 'open', '', '2-autosave', '', '', '2012-01-27 09:39:13', '2012-01-27 09:39:13', '', 2, 'http://localhost/twinne/blog/?p=49', 0, 'revision', '', 0),
(50, 1, '2012-01-20 04:47:03', '2012-01-20 04:47:03', '', 'first vidio', '', 'inherit', 'closed', 'open', '', '31-revision-4', '', '', '2012-01-20 04:47:03', '2012-01-20 04:47:03', '', 31, 'http://localhost/twinne/blog/?p=50', 0, 'revision', '', 0),
(51, 1, '2012-01-20 11:23:11', '2012-01-20 11:23:11', '', 'first vidio', '', 'inherit', 'closed', 'open', '', '31-revision-5', '', '', '2012-01-20 11:23:11', '2012-01-20 11:23:11', '', 31, 'http://localhost/twinne/blog/?p=51', 0, 'revision', '', 0),
(52, 1, '2012-01-20 11:31:20', '2012-01-20 11:31:20', 'Etiam eleifend vulputate viverra. Maecenas tempus massa neque. Phasellus nec turpis interdum sapien pharetra tempus a ac orci. Suspendisse pharetra leo nec tellus fringilla cursus. Morbi eget erat nunc. Proin velit mauris, pretium sed imperdiet nec, commodo fringilla leo. Mauris suscipit malesuada turpis, vel viverra risus elementum et.', 'first vidio', '', 'inherit', 'closed', 'open', '', '31-autosave', '', '', '2012-01-20 11:31:20', '2012-01-20 11:31:20', '', 31, 'http://localhost/twinne/blog/?p=52', 0, 'revision', '', 0),
(53, 1, '2012-01-20 11:29:07', '2012-01-20 11:29:07', 'Etiam eleifend vulputate viverra. Maecenas tempus massa neque. Phasellus nec turpis interdum sapien pharetra tempus a ac orci. Suspendisse pharetra leo nec tellus fringilla cursus. Morbi eget erat nunc. Proin velit mauris, pretium sed imperdiet nec, commodo fringilla leo. Mauris suscipit malesuada turpis, vel viverra risus elementum et.', 'first vidio', '', 'inherit', 'closed', 'open', '', '31-revision-6', '', '', '2012-01-20 11:29:07', '2012-01-20 11:29:07', '', 31, 'http://localhost/twinne/blog/?p=53', 0, 'revision', '', 0),
(54, 1, '2012-01-20 11:58:27', '2012-01-20 11:58:27', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a t', 'Title of the video 2', '', 'publish', 'open', 'open', '', 'title-of-the-video-2', '', '', '2012-01-20 11:58:27', '2012-01-20 11:58:27', '', 0, 'http://localhost/twinne/blog/?p=54', 0, 'post', '', 3),
(55, 1, '2012-01-20 11:55:04', '2012-01-20 11:55:04', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a t', 'Title of the video 2', '', 'inherit', 'closed', 'open', '', '54-revision', '', '', '2012-01-20 11:55:04', '2012-01-20 11:55:04', '', 54, 'http://localhost/twinne/blog/?p=55', 0, 'revision', '', 0),
(56, 1, '2012-01-20 11:59:29', '2012-01-20 11:59:29', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a t', 'Title of the video 2', '', 'inherit', 'closed', 'open', '', '54-autosave', '', '', '2012-01-20 11:59:29', '2012-01-20 11:59:29', '', 54, 'http://localhost/twinne/blog/?p=56', 0, 'revision', '', 0),
(58, 1, '2012-01-27 09:01:02', '2012-01-27 09:01:02', '', 'Footer menu', '', 'inherit', 'closed', 'open', '', '57-revision', '', '', '2012-01-27 09:01:02', '2012-01-27 09:01:02', '', 57, 'http://localhost/twinne/blog/blogpost/57-revision', 0, 'revision', '', 0),
(60, 1, '2012-01-30 11:06:20', '2012-01-30 11:06:20', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n<div>\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n', 'electronic typesetting', '', 'publish', 'closed', 'open', '', 'electronic-typesetting', '', '', '2012-01-30 11:06:20', '2012-01-30 11:06:20', '', 0, 'http://hostingmachine.net/dev/twinne/blog/?p=60', 0, 'post', '', 0),
(61, 1, '2012-01-30 11:06:09', '2012-01-30 11:06:09', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n<div>\n\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\n\n</div>', 'electronic typesetting', '', 'inherit', 'closed', 'open', '', '60-revision', '', '', '2012-01-30 11:06:09', '2012-01-30 11:06:09', '', 60, 'http://hostingmachine.net/dev/twinne/blog/blogpost/60-revision/', 0, 'revision', '', 0),
(62, 1, '2012-01-30 11:06:50', '2012-01-30 11:06:50', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n<div>\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Various versions ', '', 'publish', 'closed', 'open', '', 'various-versions', '', '', '2012-01-30 11:06:50', '2012-01-30 11:06:50', '', 0, 'http://hostingmachine.net/dev/twinne/blog/?p=62', 0, 'post', '', 0),
(63, 1, '2012-01-30 11:06:47', '2012-01-30 11:06:47', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n<div>\n\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Various versions ', '', 'inherit', 'closed', 'open', '', '62-revision', '', '', '2012-01-30 11:06:47', '2012-01-30 11:06:47', '', 62, 'http://hostingmachine.net/dev/twinne/blog/blogpost/62-revision/', 0, 'revision', '', 0),
(64, 1, '2012-01-27 09:01:11', '2012-01-27 09:01:11', '', 'Footer menu', '', 'inherit', 'closed', 'open', '', '57-revision-2', '', '', '2012-01-27 09:01:11', '2012-01-27 09:01:11', '', 57, 'http://hostingmachine.net/dev/twinne/blog/blogpost/57-revision-2/', 0, 'revision', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wp_terms`
--

CREATE TABLE IF NOT EXISTS `tbl_wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_wp_terms`
--

INSERT INTO `tbl_wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(6, 'Video', 'video', 0),
(2, 'Blogroll', 'blogroll', 0),
(3, 'hi', 'hi', 0),
(4, 'hello', 'hello', 0),
(5, 'BlogPost', 'blogpost', 0),
(7, 'MENU 1', 'menu-1', 0),
(8, 'MENU 2', 'menu-2', 0),
(9, 'MENU', 'menu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wp_term_relationships`
--

CREATE TABLE IF NOT EXISTS `tbl_wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_wp_term_relationships`
--

INSERT INTO `tbl_wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 2, 0),
(2, 2, 0),
(3, 2, 0),
(4, 2, 0),
(5, 2, 0),
(6, 2, 0),
(7, 2, 0),
(3, 5, 0),
(1, 5, 0),
(5, 3, 0),
(31, 6, 0),
(5, 5, 0),
(35, 9, 0),
(36, 9, 0),
(37, 7, 0),
(38, 7, 0),
(39, 8, 0),
(40, 8, 0),
(41, 9, 0),
(42, 7, 0),
(43, 7, 0),
(44, 7, 0),
(54, 6, 0),
(60, 5, 0),
(62, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wp_term_taxonomy`
--

CREATE TABLE IF NOT EXISTS `tbl_wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_wp_term_taxonomy`
--

INSERT INTO `tbl_wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(6, 6, 'category', '', 0, 2),
(2, 2, 'link_category', '', 0, 7),
(3, 3, 'post_tag', '', 0, 1),
(4, 4, 'post_tag', '', 0, 0),
(5, 5, 'category', '', 0, 5),
(7, 7, 'nav_menu', '', 0, 5),
(8, 8, 'nav_menu', '', 0, 2),
(9, 9, 'nav_menu', '', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wp_usermeta`
--

CREATE TABLE IF NOT EXISTS `tbl_wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `tbl_wp_usermeta`
--

INSERT INTO `tbl_wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'first_name', ''),
(2, 1, 'last_name', ''),
(3, 1, 'nickname', 'admin'),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'comment_shortcuts', 'false'),
(7, 1, 'admin_color', 'fresh'),
(8, 1, 'use_ssl', '0'),
(9, 1, 'show_admin_bar_front', 'true'),
(11, 1, 'aim', ''),
(12, 1, 'yim', ''),
(13, 1, 'jabber', ''),
(14, 1, 'tbl_wp_capabilities', 'a:1:{s:13:"administrator";s:1:"1";}'),
(15, 1, 'tbl_wp_user_level', '10'),
(16, 1, 'tbl_wp_dashboard_quick_press_last_post_id', '59'),
(17, 1, 'tbl_wp_user-settings', 'm5=o&m6=o&m7=o&m9=o&editor=html'),
(18, 1, 'tbl_wp_user-settings-time', '1327921577'),
(19, 6, 'first_name', ''),
(20, 6, 'last_name', ''),
(21, 6, 'nickname', 'krishnas'),
(22, 6, 'description', ''),
(23, 6, 'rich_editing', 'true'),
(24, 6, 'comment_shortcuts', 'false'),
(25, 6, 'admin_color', 'fresh'),
(26, 6, 'use_ssl', '0'),
(27, 6, 'show_admin_bar_front', 'true'),
(29, 6, 'aim', ''),
(30, 6, 'yim', ''),
(31, 6, 'jabber', ''),
(32, 6, 'tbl_wp_capabilities', 'a:0:{}'),
(33, 6, 'tbl_wp_user_level', '0'),
(49, 1, 'dismissed_wp_pointers', 'wp330_toolbar,wp330_media_uploader'),
(50, 1, 'closedpostboxes_post', 'a:0:{}'),
(51, 1, 'metaboxhidden_post', 'a:6:{i:0;s:11:"postexcerpt";i:1;s:13:"trackbacksdiv";i:2;s:11:"commentsdiv";i:3;s:7:"slugdiv";i:4;s:9:"authordiv";i:5;s:12:"revisionsdiv";}'),
(52, 1, 'managenav-menuscolumnshidden', 'a:4:{i:0;s:11:"link-target";i:1;s:11:"css-classes";i:2;s:3:"xfn";i:3;s:11:"description";}'),
(53, 1, 'metaboxhidden_nav-menus', 'a:2:{i:0;s:8:"add-post";i:1;s:12:"add-post_tag";}'),
(54, 1, 'nav_menu_recently_edited', '7'),
(55, 1, 'closedpostboxes_page', 'a:0:{}'),
(56, 1, 'metaboxhidden_page', 'a:4:{i:0;s:10:"postcustom";i:1;s:11:"commentsdiv";i:2;s:7:"slugdiv";i:3;s:9:"authordiv";}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wp_users`
--

CREATE TABLE IF NOT EXISTS `tbl_wp_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(64) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(60) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbl_wp_users`
--

INSERT INTO `tbl_wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin', '$P$B3oLVGH1VykteYAs8wynDuDppIepyD/', 'admin', 'abid.hussain@deemtech.com', '', '2011-12-09 04:28:35', '', 0, 'admin'),
(5, 'tanny88', 'e10adc3949ba59abbe56e057f20f883e', 'tanny88', 'shoky87@rediffmail.com', '', '2011-12-08 06:40:01', '', 0, 'tanny88'),
(4, 'mukesh', '$P$BE.CbOv5nfBSwzHvtz3Ts6oC82iocK/', 'mukesh', 'why_mukinfo@yahoo.co.in', '', '2011-12-08 06:40:01', '', 0, 'mukesh'),
(6, 'krishnas', 'e10adc3949ba59abbe56e057f20f883e', 'krishnas', 'kksshp@gmail.com', '', '2011-12-08 06:40:01', '', 0, 'krishnas'),
(8, 'muk', 'e10adc3949ba59abbe56e057f20f883e', 'muk', 'muk@gmail.com', '', '2011-12-08 06:40:01', '', 0, 'muk'),
(9, 'vikas', 'e10adc3949ba59abbe56e057f20f883e', 'vikas', 'seller83test@gmail.com', '', '2011-12-08 06:40:01', '', 0, 'vikas'),
(10, 'avdhesh', 'f34ba0e3a4c4ec01bbe924d424d7e1b0', 'avdhesh', 'avdhesh.bansal@deemtech.com', '', '2011-12-08 06:40:01', '', 0, 'avdhesh'),
(11, 'nikesh', 'e10adc3949ba59abbe56e057f20f883e', 'nikesh', 'nikesh@gmail.com', '', '2011-12-08 06:40:01', '', 0, 'nikesh'),
(12, 'nitin', 'e10adc3949ba59abbe56e057f20f883e', 'nitin', 'nitin@gmail.com', '', '2011-12-08 06:40:01', '', 0, 'nitin'),
(13, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 'taneja.shoky@gmail.com', '', '2011-12-08 06:40:01', '', 0, 'admin'),
(14, 'akash', 'e10adc3949ba59abbe56e057f20f883e', 'akash', 'mukesh.pedwal@hotmail.com', '', '2011-12-08 06:40:01', '', 0, 'akash'),
(15, 'tannu', 'e10adc3949ba59abbe56e057f20f883e', 'tannu', 'shoky87@rediffmail.com', '', '2011-12-08 06:40:01', '', 0, 'tannu'),
(16, 'nirvana', 'e10adc3949ba59abbe56e057f20f883e', 'nirvana', 'shokky007@rediffmail.com', '', '2011-12-08 06:40:01', '', 0, 'nirvana'),
(17, 'nirvana', 'e10adc3949ba59abbe56e057f20f883e', 'nirvana', 'shokky007@rediffmail.com', '', '2011-12-08 06:40:01', '', 0, 'nirvana'),
(18, 'nirvana', 'e10adc3949ba59abbe56e057f20f883e', 'nirvana', 'shokky007@rediffmail.com', '', '2011-12-08 06:40:01', '', 0, 'nirvana'),
(19, 'nirvana', 'e10adc3949ba59abbe56e057f20f883e', 'nirvana', 'shokky007@rediffmail.com', '', '2011-12-08 06:40:01', '', 0, 'nirvana'),
(20, 'nirvana', 'e10adc3949ba59abbe56e057f20f883e', 'nirvana', 'shokky007@rediffmail.com', '', '2011-12-08 06:40:01', '', 0, 'nirvana'),
(21, 'nirvana', 'e10adc3949ba59abbe56e057f20f883e', 'nirvana', 'shokky007@rediffmail.com', '', '2011-12-08 06:40:01', '', 0, 'nirvana'),
(22, 'nirvana', 'e10adc3949ba59abbe56e057f20f883e', 'nirvana', 'shokky007@rediffmail.com', '', '2011-12-08 06:40:01', '', 0, 'nirvana'),
(23, 'shoky1', 'e10adc3949ba59abbe56e057f20f883e', 'shoky1', 'shokky@gmail.com', '', '2011-12-08 06:40:01', '', 0, 'shoky1'),
(24, 'vikram', 'e10adc3949ba59abbe56e057f20f883e', 'vikram', 'seller83test@gmail.com', '', '2011-12-08 06:40:01', '', 0, 'vikram'),
(25, 'kekko', '03bc1b04c3c183f660a21b61c0a2ed8f', 'kekko', 'kekko@kekko.it', '', '2011-12-08 06:40:01', '', 0, 'kekko');
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
