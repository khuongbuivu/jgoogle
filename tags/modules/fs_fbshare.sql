-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 23, 2014 at 08:10 AM
-- Server version: 5.0.27
-- PHP Version: 5.2.1
-- 
-- Database: `autoviewsite`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `fs_fbshare`
-- 

CREATE TABLE `fs_fbshare` (
  `fbshare_id` bigint(20) NOT NULL,
  `fbshare_link` varchar(400) character set utf8 NOT NULL,
  `fbshare_iduser` mediumtext character set utf8 NOT NULL,
  `fbshare_time` mediumtext character set utf8 NOT NULL,
  PRIMARY KEY  (`fbshare_id`),
  KEY `fbshare_link` (`fbshare_link`(255))
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `fs_fbshare`
-- 

