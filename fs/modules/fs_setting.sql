-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 05, 2015 at 10:59 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `autoviewsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `fs_setting`
--

CREATE TABLE IF NOT EXISTS `fs_setting` (
  `setting_id` int(20) NOT NULL AUTO_INCREMENT,
  `setting_uid` varchar(20) CHARACTER SET utf8 NOT NULL,
  `setting_projectname` varchar(200) CHARACTER SET utf8 NOT NULL,
  `setting_keywords` varchar(400) CHARACTER SET utf8 NOT NULL,
  `setting_linkseo` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `setting_linkbl1` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `setting_linkbl2` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `setting_linkbl3` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `setting_linkg1` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `setting_linkg2` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `setting_linkg3` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `setting_linkfb1` varchar(400) CHARACTER SET utf8 DEFAULT NULL,
  `setting_totalclick` int(7) NOT NULL,
  `setting_dailyclick` int(5) NOT NULL,
  `setting_cpc` int(3) NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fs_setting`
--

INSERT INTO `fs_setting` (`setting_id`, `setting_uid`, `setting_projectname`, `setting_keywords`, `setting_linkseo`, `setting_linkbl1`, `setting_linkbl2`, `setting_linkbl3`, `setting_linkg1`, `setting_linkg2`, `setting_linkg3`, `setting_linkfb1`, `setting_totalclick`, `setting_dailyclick`, `setting_cpc`) VALUES
(1, '100001707050712', 'Giải Pháp Thương Hiệu', 'Dịch Vụ Seo', 'http://giaiphapthuonghieu.vn/dich-vu-seo-website-top-google/', 'http://www.giaiphapthuonghieu.org/', 'http://bang-gia-seo-website.blogspot.com/', 'http://www.giaiphapthuonghieu.net/2014/08/viec-lam-them-cho-sinh-vien-xhnv-tai-hcm.html', 'https://plus.google.com/109004002290114308083/posts/cm7Q88vnPUJ', 'https://plus.google.com/109004002290114308083/posts/cm7Q88vnPUJ', 'https://plus.google.com/109004002290114308083/posts/cm7Q88vnPUJ', 'http://facebook.com/faceseo.vn', 5000, 100, 10);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
