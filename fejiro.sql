-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2015 at 12:00 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fejiro`
--

-- --------------------------------------------------------

--
-- Table structure for table `fejiro_ads`
--

CREATE TABLE IF NOT EXISTS `fejiro_ads` (
  `ads_id` int(10) NOT NULL AUTO_INCREMENT,
  `ads_name` varchar(200) NOT NULL,
  `ads_image` varchar(200) NOT NULL,
  `navigation` varchar(500) NOT NULL,
  `status` enum('active','old') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`ads_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `fejiro_ads`
--

INSERT INTO `fejiro_ads` (`ads_id`, `ads_name`, `ads_image`, `navigation`, `status`) VALUES
(1, 'asdas', 'ads_55e3d4a121e6f.png', 'adss', 'active'),
(2, 'ok', 'item_55e3c961ba45e.jpg', 'okas', 'old'),
(3, 'okasd', 'item_55e3cb82d6edf.jpg', 'afd', 'old'),
(4, 'plas', 'item_55e3cbabcf71e.jpg', 'asd', 'old'),
(5, 'adsads', 'item_55e3cbefc3b2d.jpg', 'asd', 'old'),
(6, 'pl', 'item_55e3cc31ab78e.jpg', 'pl', 'old'),
(7, 'asd', 'item_55e3ccc7dceed.jpg', 'asd', 'old');

-- --------------------------------------------------------

--
-- Table structure for table `fejiro_cart`
--

CREATE TABLE IF NOT EXISTS `fejiro_cart` (
  `cart_id` int(10) NOT NULL AUTO_INCREMENT,
  `beat_id` int(10) NOT NULL,
  `beat_name` varchar(200) NOT NULL,
  `beat_price` float NOT NULL,
  `user_id` int(10) NOT NULL,
  `status` enum('active','old') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `fejiro_cart`
--

INSERT INTO `fejiro_cart` (`cart_id`, `beat_id`, `beat_name`, `beat_price`, `user_id`, `status`) VALUES
(1, 38, 'raja', 54.98, 30, 'active'),
(2, 37, 'uiu', 99, 30, 'active'),
(3, 38, 'raja', 54.98, 30, 'active'),
(4, 38, 'raja', 54.98, 30, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `fejiro_item`
--

CREATE TABLE IF NOT EXISTS `fejiro_item` (
  `item_id` int(10) NOT NULL AUTO_INCREMENT,
  `FK_userid_id` int(10) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_image` varchar(100) NOT NULL,
  `status` enum('active','old') NOT NULL DEFAULT 'active',
  `item_genre` varchar(500) NOT NULL,
  `item_description` varchar(2000) NOT NULL,
  `item_price` float NOT NULL,
  `item_sample1_name` varchar(200) NOT NULL,
  `item_sample1_new_name` varchar(200) NOT NULL,
  `beat1_duration` varchar(200) NOT NULL,
  `item_sample2_name` varchar(200) NOT NULL,
  `item_sample2_new_name` varchar(200) NOT NULL,
  `beat2_duration` varchar(200) NOT NULL,
  `item_music_name` varchar(200) NOT NULL,
  `item_music_new_name` varchar(200) NOT NULL,
  `beat0_duration` varchar(200) NOT NULL,
  `feature_type` int(10) NOT NULL DEFAULT '0',
  `project_file_name` varchar(200) NOT NULL,
  `project_file_new_name` varchar(200) NOT NULL,
  `beat_status` enum('Approved','Pending','Rejected','Sold beats') NOT NULL DEFAULT 'Pending',
  `added_by` int(10) NOT NULL,
  `added_date` date NOT NULL,
  `added_time` varchar(100) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `fejiro_item`
--

INSERT INTO `fejiro_item` (`item_id`, `FK_userid_id`, `item_name`, `item_image`, `status`, `item_genre`, `item_description`, `item_price`, `item_sample1_name`, `item_sample1_new_name`, `beat1_duration`, `item_sample2_name`, `item_sample2_new_name`, `beat2_duration`, `item_music_name`, `item_music_new_name`, `beat0_duration`, `feature_type`, `project_file_name`, `project_file_new_name`, `beat_status`, `added_by`, `added_date`, `added_time`) VALUES
(46, 30, 'beat', 'item_55efd4f788bed.jpg', 'active', 'blues', 'dffd', 3, 'item_55c894248ec10.wav', 'item_55efd50f9016d.wav', '0:19', '', '', '', 'item_55d6c649df108.wav', 'item_55efd5175316b.wav', '0:19', 0, 'item_55d41650f2a50.zip', 'project_55efd51dafabd.zip', 'Pending', 30, '2015-09-09', ''),
(43, 8, 'ok', 'item_55ea94476d111.png', 'old', 'soul', 'asd', 90, '$Läügh$.wav', 'item_55ea94511538b.wav', '0:20', '', '', '', 'rapture{remix}.mp3', 'item_55ea945705a05.mp3', '0:18', 0, '05 - BP - Receivables Statement.zip', 'project_55ea945f28538.zip', 'Sold beats', 8, '0000-00-00', ''),
(42, 8, 'asd', 'item_55dea30565de2.jpg', 'active', 'pop', 'sdf', 22, '$Läügh$.wav', 'item_55dea31475f28.wav', '0:20', '', '', '', 'Hiriye -vive.mp3', 'item_55dea3328ec82.mp3', '0:21', 1, 'boat.rar', 'project_55dea33ae3dbf.rar', 'Approved', 8, '0000-00-00', ''),
(41, 8, 'asd', 'item_55dea1a833d35.jpg', 'active', 'electronic', 'asd', 12, '$Läügh$.wav', 'item_55dea1afae002.wav', '0:20', '', '', '', 'bajrahaahaai.mp3', 'item_55dea1b49d394.mp3', '0:21', 0, 'boat.rar', 'project_55dea197033ed.rar', 'Approved', 8, '0000-00-00', ''),
(40, 8, 'ok', 'item_55dea06bde752.jpg', 'old', 'blues,jazz', 'ok', 90, '$Läügh$.wav', 'item_55dea076eb8d2.wav', '0:20', 'Hiriye -vive.mp3', 'item_55dea07ca030f.mp3', '0:21', 'rapture{remix}.mp3', 'item_55dea08242468.mp3', '0:18', 0, 'boat.rar', 'project_55dea0cdb41f5.rar', 'Approved', 8, '0000-00-00', ''),
(39, 8, 'New beat', 'beat_55d6d6b3806a7.png', 'active', 'blues', 'ok', 90, 'i love u.wav', 'item_55d6c649df108.wav', '0:19', '', '', '', 'Hiriye -vive.mp3', 'item_55d6c6591d2f6.mp3', '0:21', 0, 'mayas.sql.zip', 'project_55d6c6699d96f.zip', 'Approved', 0, '0000-00-00', ''),
(38, 29, 'raja', 'item55c438083a736.jpg', 'old', 'country', 'hidgkfgkdngkdnfgkdrjrkemwmwkwnwke e fuckppd d ek;sfsdf aksldfksfdk kermknknnkkkkkkkkkkkkkkkkssssssssssss allalakas sksks djdkd sks sksks jd djs dfs', 54.98, '$Läügh$.wav', 'item_55c8988c51c5a.wav', '0:20', 'i love u.wav', 'item_55c8989e8913f.wav', '0:19', 'i love u.wav', 'item_55c898a562b32.wav', '0:19', 1, '', '', 'Pending', 8, '0000-00-00', ''),
(37, 29, 'uiu', 'item_55c895a0e86e1.png', 'active', 'rap', 'tyut', 99, 'i love u.wav', 'item_55c895a6711b2.wav', '0:19', '', '', '', 'i love u.wav', 'item_55c895acdd4d5.wav', '0:19', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(36, 29, 'jgy56', 'item_55c8958190fd6.png', 'active', 'rap', 'rets', 345678, 'i love u.wav', 'item_55c8958750e3e.wav', '0:19', '', '', '', 'i love u.wav', 'item_55c895958caf1.wav', '0:19', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(35, 29, '544ssrt', 'item_55c8945a49654.png', 'active', 'soul', 'ryr', 5678, 'i love u.wav', 'item_55c8946092e67.wav', '0:19', '', 'item_55c8938a374c3.wav', '', '', 'item_55c88d3526094.mp3', '', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(34, 29, 'yttyu', 'item_55c894331023e.png', 'active', 'soul', 'dyds', 23346, 'i love u.wav', 'item_55c8943b696b4.wav', '0:19', '', 'item_55c8938a374c3.wav', '', '', 'item_55c88d3526094.mp3', '', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(33, 29, 'werw', 'item_55c8941f2cd54.png', 'active', 'soul', 'cx', 234, 'i love u.wav', 'item_55c894248ec10.wav', '0:19', '', 'item_55c8938a374c3.wav', '', '', 'item_55c88d3526094.mp3', '', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(32, 29, 'werw12', 'item_55c893e97fb66.png', 'active', 'reggae', '34eresa', 344, 'i love u.wav', 'item_55c893f011530.wav', '0:19', '', 'item_55c8938a374c3.wav', '', '', 'item_55c88d3526094.mp3', '', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(31, 29, 'eww', 'item_55c893d4a19c1.png', 'active', 'reggae', 'hjh', 123, '$Läügh$.wav', 'item_55c893db34571.wav', '0:20', '', 'item_55c8938a374c3.wav', '', '', 'item_55c88d3526094.mp3', '', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(30, 29, 'erew', 'item_55c8937bee6aa.png', 'active', 'rock', 'sdfsa', 3344, 'i love u.wav', 'item_55c89382c82a4.wav', '0:19', 'i love u.wav', 'item_55c8938a374c3.wav', '0:19', '', 'item_55c88d3526094.mp3', '', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(29, 29, 'dsdfds', 'item_55c89365af5bc.png', 'active', 'rock', 'cvbc', 4221, 'i love u.wav', 'item_55c8936b2c7c5.wav', '0:19', '', 'item_55c88d2df121a.wav', '', '', 'item_55c88d3526094.mp3', '', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(28, 29, 'fgfg', 'item_55c88f8a71367.png', 'active', 'dance', 'jhjh', 5565, '$Läügh$.wav', 'item_55c88f9b39b25.wav', '0:20', '', 'item_55c88d2df121a.wav', '', '', 'item_55c88d3526094.mp3', '', 3, '', '', 'Pending', 0, '0000-00-00', ''),
(27, 29, 'sdfs', 'item_55c88f73c3057.png', 'active', 'dance', 'fdg', 443, 'i love u.wav', 'item_55c88f7b5c5fa.wav', '0:19', '', 'item_55c88d2df121a.wav', '', '', 'item_55c88d3526094.mp3', '', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(26, 29, 'erert', 'item_55c88d06d7993.png', 'active', 'dance', 'saaaaet', 44, '$Läügh$.wav', 'item_55c88d26b9325.wav', '0:20', 'i love u.wav', 'item_55c88d2df121a.wav', '0:19', 'rapture{remix}.mp3', 'item_55c88d3526094.mp3', '0:18', 3, '', '', 'Pending', 0, '0000-00-00', ''),
(25, 29, 'ghf', 'item55c0f1fe95ead.jpg', 'active', 'country,soul', 'local', 50, 'i love u.wav', 'item_55c58b462bb88.wav', '0:19', 'i love u.wav', 'item_55c58b6e13a83.wav', '0:19', 'i love u.wav', 'item_55c58b733b920.wav', '0:19', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(24, 29, 'ss', 'item 55c440aceeb59.png', 'active', 'electronic', 'slsl', 55, 'i love u.wav', 'item_55c440cab7989.wav', '0:19', '$Läügh$.wav', 'item_55c440d5ebcfc.wav', '0:20', 'i love u.wav', 'item_55c440e2c70f7.wav', '0:19', 2, '', '', 'Pending', 0, '0000-00-00', ''),
(23, 29, 'ss', 'item 55c440aceeb59.png', 'active', 'electronic', 'slsl', 55, 'i love u.wav', 'item_55c440cab7989.wav', '0:19', '$Läügh$.wav', 'item_55c440d5ebcfc.wav', '0:20', 'i love u.wav', 'item_55c440e2c70f7.wav', '0:19', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(22, 29, 'songs', 'item 55c43c27d65dd.jpg', 'active', 'country', 'song honey', 5, '$Läügh$.wav', 'item_55c43c6ef17a2.wav', '0:20', '', '', '', '$Läügh$.wav', 'item_55c43c7fec50f.wav', '0:20', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(21, 1, 'tere nam', 'item 55c24d30c310c.jpg', 'active', 'vocal,world', 'tere nam', 40, 'i love u.wav', 'item_55c24d3fc456e.wav', '0:19', '$Läügh$.wav', 'item_55c24d4bc720f.wav', '0:20', '[SongsPK.info] 02 - Action Jackson - Punjabi Mast.mp3', 'item_55c24d783f22f.mp3', '4:8', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(20, 0, 'bss', 'item 55c0f1fe95ead.jpg', 'active', 'blues,country,electronic,dance', 'dkfldsgjkjgkfgjkfgkfdgjkfgjkdf', 99, 'i love u.wav', 'item_55c0f2192cf82.wav', '0:19', 'i love u.wav', 'item_55c0f22124204.wav', '0:19', 'Sleep Away.mp3', 'item_55c0f24574438.mp3', '2:49', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(19, 0, 'fgfd', 'item 55bcbcff2bfa4.png', 'active', 'blues,rap,rock', 'sdfsdf', 44, '$Läügh$.wav', 'item_55bcbd0da7276.wav', '0:20', '$Läügh$.wav', 'item_55bcbd1205155.wav', '0:20', '$Läügh$.wav', 'item_55bcbd142596d.wav', '0:20', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(18, 0, '4545', 'item 55bcbca2a5a75.png', 'active', 'blues,rap,rock', 'rtert', 44, '$Läügh$.wav', 'item_55bcbcaa14b1d.wav', '0:20', '$Läügh$.wav', 'item_55bcbcaea7368.wav', '0:20', '$Läügh$.wav', 'item_55bcbcb30d293.wav', '0:20', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(17, 9, 'rtert', 'item 55bcbc3bdaea6.jpg', 'active', 'blues,country,rap,jazz,rock,vocal', 'rtert', 44, '$Läügh$.wav', 'item_55bcbc4f0a614.wav', '0:20', '$Läügh$.wav', 'item_55bcbc539aa3e.wav', '0:20', '$Läügh$.wav', 'item_55bcbc58c60c4.wav', '0:20', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(16, 0, 'erwe', 'item 55bcba73357b3.png', 'active', 'blues,rap', '3423', 343, '$Läügh$.wav', 'item_55bcba7bb008a.wav', '0:20', '$Läügh$.wav', 'item_55bcba889b0c7.wav', '0:20', '$Läügh$.wav', 'item_55bcba8d482a1.wav', '0:20', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(15, 0, 'fgdfg', 'item 55bcba3821fad.jpg', 'active', 'blues,country', 'fgdfg', 55, '$Läügh$.wav', 'item_55bcba3eb39b3.wav', '0:20', '$Läügh$.wav', 'item_55bcba4417730.wav', '0:20', 'Maid with the Flaxen Hair.mp3', 'item_55bcba4e77d16.mp3', '2:49', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(14, 0, 'sdfsd', 'item 55bcb8024700f.jpg', 'active', 'blues,country,rap', 'dsfsdf', 44, '$Läügh$.wav', 'item_55bcb80a9e4a8.wav', '0:20', 'i love u.wav', 'item_55bcb8133b52b.wav', '0:19', 'Maid with the Flaxen Hair.mp3', 'item_55bcb82038d96.mp3', '2:49', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(13, 0, 'cvxcv', 'item 55bcad54dc5fa.jpg', 'active', 'country,jazz,vocal', 'cvxcvxv', 44, '$Läügh$.wav', 'item_55bcad66dcc18.wav', '0:20', '$Läügh$.wav', 'item_55bcad7b3896e.wav', '0:20', 'Kalimba.mp3', 'item_55bcad8202d62.mp3', '5:48', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(12, 0, 'dfsdf', 'item 55bcace63c017.jpg', 'active', 'blues,rap,rock', 'dfsdfsd', 34, '$Läügh$.wav', 'item_55bcacef91e13.wav', '0:20', '$Läügh$.wav', 'item_55bcacf501e56.wav', '0:20', 'Kalimba.mp3', 'item_55bcacfcb7ed5.mp3', '5:48', 3, '', '', 'Pending', 0, '0000-00-00', ''),
(11, 0, 'gdfgd', 'item 55bcaa4465538.png', 'active', 'blues,rap,rock', 'gfdgdfg', 44, '$Läügh$.wav', 'item_55bcaa4e4ff31.wav', '0:20', '$Läügh$.wav', 'item_55bcaa532aa2f.wav', '0:20', 'Kalimba.mp3', 'item_55bcaa5a62eff.mp3', '5:48', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(10, 0, 'fsgdf', 'item 55bca8d7b4df3.jpg', 'old', 'country,jazz,world', 'fgfgfg', 44, '$Läügh$.wav', 'item_55bca8dfb2f2f.wav', '0:20', '$Läügh$.wav', 'item_55bca8e3dffc1.wav', '0:20', 'Maid with the Flaxen Hair.mp3', 'item_55bca91d69573.mp3', '2:49', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(9, 1, 'fsgdf', 'item 55bca8d7b4df3.jpg', 'active', 'country,jazz,world', 'fgfgfg', 44, '$Läügh$.wav', 'item_55bca8dfb2f2f.wav', '0:20', '$Läügh$.wav', 'item_55bca8e3dffc1.wav', '0:20', 'Maid with the Flaxen Hair.mp3', 'item_55bca91d69573.mp3', '2:49', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(8, 1, 'fsgdf', 'item 55bca8d7b4df3.jpg', 'active', 'country,jazz,world', 'fgfgfg', 44, '$Läügh$.wav', 'item_55bca8dfb2f2f.wav', '0:20', '$Läügh$.wav', 'item_55bca8e3dffc1.wav', '0:20', 'Maid with the Flaxen Hair.mp3', 'item_55bca91d69573.mp3', '2:49', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(7, 1, 'fsgdf', 'item 55bca8d7b4df3.jpg', 'active', 'country,jazz,world', 'fgfgfg', 44, '$Läügh$.wav', 'item_55bca8dfb2f2f.wav', '0:20', '$Läügh$.wav', 'item_55bca8e3dffc1.wav', '0:20', 'Maid with the Flaxen Hair.mp3', 'item_55bca91d69573.mp3', '2:49', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(6, 1, 'dfsdf', '', 'active', 'blues,rap,rock', 'sdfsdf', 33, '$Läügh$.wav', 'item_55bca7313ac0d.wav', '0:20', '$Läügh$.wav', 'item_55bca73654344.wav', '0:20', 'Kalimba.mp3', 'item_55bca741c910d.mp3', '5:48', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(5, 1, 'dfsdf', '', 'active', 'blues,rap,rock', 'sdfsdf', 33, '$Läügh$.wav', 'item_55bca7313ac0d.wav', '0:20', '$Läügh$.wav', 'item_55bca73654344.wav', '0:20', 'Kalimba.mp3', 'item_55bca741c910d.mp3', '5:48', 0, '', '', 'Pending', 0, '0000-00-00', ''),
(45, 30, 'fdg', 'item_55efd1ba81061.jpg', 'active', 'blues', 'df', 3, 'item_55c43c6eed1a7.wav', 'item_55efd1c0dfd72.wav', '0:20', '', '', '', 'item_55c43c6eed1a7.wav', 'item_55efd1c769cf2.wav', '0:20', 0, 'project_55d418e5df10a.zip', 'project_55efd1cf4bb03.zip', 'Pending', 30, '0000-00-00', ''),
(47, 30, 'vb', 'item_55efd5f7df4d4.jpg', 'active', 'dance', 'vb', 453, 'item_55ea94511538b.wav', 'item_55efd600e8379.wav', '0:20', '', '', '', 'item_55debcce91f38.wav', 'item_55efd60702cf3.wav', '0:20', 0, 'project_55de9fb4292e4.zip', 'project_55efd80c5b9f2.zip', 'Approved', 30, '2015-09-09', '12:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `fejiro_message`
--

CREATE TABLE IF NOT EXISTS `fejiro_message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `item_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0:unseen,1:seen',
  `date_time` timestamp NOT NULL,
  `message_to` int(11) NOT NULL,
  `message_from` int(11) NOT NULL,
  `parent_message` int(11) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fejiro_profile`
--

CREATE TABLE IF NOT EXISTS `fejiro_profile` (
  `profile_id` int(10) NOT NULL AUTO_INCREMENT,
  `FK_userid_id` int(10) NOT NULL,
  `profile_age` date NOT NULL,
  `profile_sex` varchar(100) NOT NULL,
  `profile_pnumber` double NOT NULL,
  `profile_nation` varchar(100) NOT NULL,
  `profile_raddress` varchar(500) NOT NULL,
  `profile_caddress` varchar(500) NOT NULL,
  `profile_image` varchar(100) NOT NULL,
  `producer_name` varchar(200) NOT NULL,
  `producer_description` varchar(5000) NOT NULL,
  `correspondence_caddress` varchar(200) NOT NULL,
  PRIMARY KEY (`profile_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `fejiro_profile`
--

INSERT INTO `fejiro_profile` (`profile_id`, `FK_userid_id`, `profile_age`, `profile_sex`, `profile_pnumber`, `profile_nation`, `profile_raddress`, `profile_caddress`, `profile_image`, `producer_name`, `producer_description`, `correspondence_caddress`) VALUES
(1, 1, '0000-00-00', 'Male', 9999999999, 'India', 'India India India India', 'India India India India', 'profile_55bcded2634d7.png', '', '', ''),
(2, 2, '2015-07-15', 'male', 8888888888, 'cvxcv dfdfdfd  fgd', 'xcvxvdfgdgdgd fgd d fgdd fgdd fgdd fgdd fgdd fgdd fgdd fgdFGFG', 'xcvxcv fgfdg d fgdd fgdd fgdd fgdd fgdd fgdd fgdd fgdd fgdd fgdFGFG', 'profile_55bb72901a3bb.jpg', '', '', ''),
(23, 8, '0000-00-00', 'male', 4545, 'vbcvb', 'vb', 'cvbc', 'profile_55ed7e7b07b7d.png', 'Ram lal', 'okokokook ok oko o ko ko ko k o ko ko ko  okokokooooo o o oo k     k k kkk', ''),
(24, 24, '0000-00-00', '', 0, '', '', '', '', '', '', ''),
(25, 25, '0000-00-00', '', 0, '', '', '', '', '', '', ''),
(26, 26, '0000-00-00', '', 0, '', '', '', '', '', '', ''),
(27, 27, '0000-00-00', '', 0, '', '', '', '', '', '', ''),
(28, 28, '2015-08-04', 'male', 347912712132, 'ads', 'ok', '', '', 'New', '', ''),
(29, 29, '0000-00-00', '', 0, '', '', '', '', '', '', ''),
(30, 30, '0000-00-00', '', 0, '', '', '', '', '', '', ''),
(31, 31, '0000-00-00', '', 0, '', '', '', '', '', '', ''),
(32, 32, '0000-00-00', '', 0, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fejiro_users`
--

CREATE TABLE IF NOT EXISTS `fejiro_users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password_hash` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` varchar(100) NOT NULL,
  `status` enum('active','old') NOT NULL DEFAULT 'active',
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `$verify_code` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `fejiro_users`
--

INSERT INTO `fejiro_users` (`user_id`, `email`, `firstname`, `lastname`, `password_hash`, `created_date`, `created_time`, `status`, `role`, `$verify_code`) VALUES
(1, 'bss@gmail.com', 'bss', 'bss', '8b744b5ea04f100bf00b4db63f6e1c7b5de8381b', '2015-07-27', '14:07:47', 'active', 'user', ''),
(2, 'abc@gmail.com', 'abc', 'abc', '8b744b5ea04f100bf00b4db63f6e1c7b5de8381b', '2015-07-27', '15:07:36', 'active', 'user', ''),
(3, 'aaa@gmail.com', 'aaa', 'aaa', '8b744b5ea04f100bf00b4db63f6e1c7b5de8381b', '2015-07-27', '15:07:28', 'active', 'user', ''),
(4, 'ccc@gmail.com', 'ccc', 'ccc', '8b744b5ea04f100bf00b4db63f6e1c7b5de8381b', '2015-07-27', '15:07:00', 'active', 'user', ''),
(5, 'dddd@gmail.com', 'ddd', 'ddd', '8b744b5ea04f100bf00b4db63f6e1c7b5de8381b', '2015-07-27', '15:07:02', 'active', 'user', ''),
(6, 'www@gmail.com', 'www', 'www', '8b744b5ea04f100bf00b4db63f6e1c7b5de8381b', '2015-07-27', '15:07:21', 'active', 'user', ''),
(7, 'ac@gmail.com', 'bss', 'bs', 'adcbc0209ae71f3e61d68be933046ee1a028f023', '2015-07-27', '16:07:19', 'active', 'user', ''),
(8, 'admin@gmail.com', 'ram', 'ji', '4508fbadd22700ed59e7c0c013fa4e7bbfabe376', '2015-07-27', '17:07:18', 'active', 'admin', ''),
(9, 'lennox@gmail.com', 'Lennox', 'Software', 'c739fbe481e8eaca5196e48d3b356c9b2160b91a', '2015-08-03', '16:08:15', 'active', 'user', ''),
(23, 'abc@gmail.com', 'abcf', 'abc', 'adcbc0209ae71f3e61d68be933046ee1a028f023', '2015-07-31', '13:07:17', 'old', 'user', ''),
(24, 'aaa@gmail.com', 'aaa', 'aaa', 'adcbc0209ae71f3e61d68be933046ee1a028f023', '2015-08-06', '00:08:18', 'active', 'user', ''),
(25, 'bbb@gmail.com', 'bbbb', 'bbb', 'adcbc0209ae71f3e61d68be933046ee1a028f023', '2015-08-06', '00:08:41', 'active', 'user', ''),
(26, 'ccc@gmail.com', 'ccc', 'ccc', 'adcbc0209ae71f3e61d68be933046ee1a028f023', '2015-08-06', '00:08:08', 'active', 'user', ''),
(27, 'sdf@asd.as', 'kjkl', 'njkj', 'adcbc0209ae71f3e61d68be933046ee1a028f023', '2015-08-24', '10:08:49', 'active', 'user', ''),
(28, 'bigprajapat@gmail.com', 'chaturbhuj', 'prajapat', 'adcbc0209ae71f3e61d68be933046ee1a028f023', '2015-08-24', '10:08:13', 'active', 'user', ''),
(29, 'admin@candidconnection.com', 'jijioj', 'iji', 'adcbc0209ae71f3e61d68be933046ee1a028f023', '2015-08-31', '21:08:03', 'active', 'user', ''),
(30, 'admin@admin.com', 'admin@admin.com', 'admin@admin.com', '4508fbadd22700ed59e7c0c013fa4e7bbfabe376', '2015-09-08', '15:09:38', 'active', 'user', ''),
(31, 'admin1@admin.com', 'admin1@admin.com', 'admin1@admin.com', 'e2b88c535200c02f5e974a25c3ab2f01ac2d7dc2', '2015-09-09', '13:09:28', 'active', 'admin', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
