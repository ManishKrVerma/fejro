-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2015 at 02:15 PM
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
-- Table structure for table `fejiro_banner`
--

CREATE TABLE IF NOT EXISTS `fejiro_banner` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `fejiro_banner`
--

INSERT INTO `fejiro_banner` (`banner_id`, `banner_image`, `status`, `created_on`, `modified`) VALUES
(6, 'item_55f95a96e46e7.jpg', 0, '2015-09-16 12:04:51', '2015-09-16 12:04:51'),
(7, 'item_55f95b0c5d1bd.jpg', 0, '2015-09-16 12:05:33', '2015-09-16 12:05:33');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
