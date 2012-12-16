-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2012 at 11:28 AM
-- Server version: 5.5.28-0ubuntu0.12.04.2
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eng2`
--

-- --------------------------------------------------------

--
-- Table structure for table `node`
--

CREATE TABLE IF NOT EXISTS `node` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `status` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `title` varchar(200) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `slug` varchar(100) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `description` text CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `content` text CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `published_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `node`
--

INSERT INTO `node` (`id`, `user_id`, `status`, `title`, `slug`, `description`, `content`, `created_at`, `published_at`, `modified_at`) VALUES
(1, 1, 'published', 'First one', 'first-one', 'First one in db', 'THis is First one in db', '2012-12-10 00:00:00', '2012-12-10 04:00:00', '0000-00-00 00:00:00'),
(2, 1, 'published', 'TOW', 'tow', '2nd one in db', 'THis is 2nd one in db', '2012-12-10 00:00:00', '2012-12-10 14:00:00', '0000-00-00 00:00:00'),
(3, 1, 'published', 'This is Sparta', 'this-is-sparta', '3rd one in db', '33333333333333THis is First one in db', '2012-12-10 00:00:00', '2012-12-10 16:30:00', '0000-00-00 00:00:00'),
(4, 1, 'published', 'Tool', 'tttow', 'sdfsdrwe efvre v wervtr', 'sdfSDTHis is 2nd one in dbFSDTHis is 2nd one in dbFDSTHis is 2nd one in dbFSDTHis is 2nd one in dbFTHis is 2nd one in dbSDFsd', '2012-12-10 00:00:00', '2012-12-10 18:10:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `node_term`
--

CREATE TABLE IF NOT EXISTS `node_term` (
  `id` bigint(20) unsigned NOT NULL,
  `node_id` bigint(20) unsigned NOT NULL,
  `term_id` bigint(20) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE IF NOT EXISTS `term` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `slug` varchar(100) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`id`, `name`, `slug`, `type`) VALUES
(1, 'Tecnología', 'tecnologia', 'category'),
(2, 'Música', 'musica', 'category'),
(3, 'Android', 'android', 'tag');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
