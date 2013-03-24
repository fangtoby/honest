-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2013 at 03:53 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `honest_lies`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userimage` varchar(255) DEFAULT 'default',
  `userpower` int(11) DEFAULT '1',
  `loginfrequency` int(11) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `email`, `userimage`, `userpower`, `loginfrequency`, `createtime`, `updatetime`) VALUES
(1, 'f.honest', '26dc28c1f7b7dd4fb8842df7cb11e44f', 'fangtoby6@gmail.com', 'default', 1, 50, '0000-00-00 00:00:00', '2013-03-23 15:21:27'),
(2, 'toby.fang', '26dc28c1f7b7dd4fb8842df7cb11e44f', 'fangtoby@live.cn', 'default', 1, 2, '0000-00-00 00:00:00', '2013-03-23 14:51:56'),
(3, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'usertemple@gmail.com', 'default', 1, 1, '0000-00-00 00:00:00', '2013-03-10 14:14:37'),
(4, 'Yin', 'rtfvkjgtuioolkmnb', 'Fguj@hu.cn', 'default', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Fgy', 'ghnm', 'Fghj@uy.hj', 'default', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Fgjkk', 'dfggbbhuiuyv', 'Rtffcghhj', 'default', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Fight', 'cgh', 'Effvb', 'default', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Tegu', 'gu', 'Yjjhbv', 'default', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Jbjhj', 'vhjjjjkkjhgggffd', 'Dfghhjjfddd', 'default', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'helloworld', '5fd4e3389bd1914284959f78a0035c927f886231aeccba4f390aa709b121989c', 'helloworld@live.cn', 'default', 1, 24, '2013-03-23 16:05:04', '2013-03-24 02:34:54'),
(11, 'cheng.ni', '5fd4e3389bd1914284959f78a0035c927f886231aeccba4f390aa709b121989c', 'helloworld@gmail.com', 'default', 1, 0, '2013-03-23 16:07:57', '2013-03-23 16:07:57');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
