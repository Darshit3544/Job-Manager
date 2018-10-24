-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 20, 2018 at 03:38 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job creator`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic`
--

DROP TABLE IF EXISTS `academic`;
CREATE TABLE IF NOT EXISTS `academic` (
  `User_id` varchar(10) NOT NULL,
  `10th` varchar(5) NOT NULL,
  `10_Board` varchar(50) NOT NULL,
  `12th` varchar(5) NOT NULL,
  `12_board` varchar(50) NOT NULL,
  `current Sem` varchar(5) NOT NULL,
  `CGPA` varchar(5) NOT NULL,
  `Backlog` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic`
--

INSERT INTO `academic` (`User_id`, `10th`, `10_Board`, `12th`, `12_board`, `current Sem`, `CGPA`, `Backlog`) VALUES
('16it067', '85', 'GSEB', '79', 'GSEB', '5', '8.26', '0'),
('16it083', '98', 'GSEB', '100', 'GSEB', '5', '10', '0'),
('16it058', '95', 'GSEB', '90', 'GHSEB', '5', '9.16', '0'),
('16it053', '8.6', 'CBSE', '90', 'CBSE', '5', '8.8', '0'),
('16it068', '85', 'ICSE', '91.2', 'ISC', '5', '9.00', '0'),
('16it063', '87', 'GSEB', '93', 'GHSEB', '5', '6.5', '1');

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

DROP TABLE IF EXISTS `achievements`;
CREATE TABLE IF NOT EXISTS `achievements` (
  `User_id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `rank` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`User_id`, `name`, `rank`, `description`) VALUES
('16it067', 'NPTEL', 'GOLD', '<p>PHP</p>\n'),
('16it083', 'NPTEL', 'GOLD', '<p>DBMS</p>\n'),
('16it083', 'Stanford', 'GOLD', '<p>Satyamev Jayate</p>\n'),
('16it067', 'Stanford', 'GOLD', '<p>PHP</p>\n'),
('16it058', 'NPTEL', 'GOLD', '<p>java</p>\n'),
('16it041', 'sdkgj;oi', '1', '<p>g,jdfg,kjd.fgukha;udfhv.ajdogha</p>\n\n<p>adg;aoidgad</p>\n\n<p>gaud;ighad</p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

DROP TABLE IF EXISTS `apply`;
CREATE TABLE IF NOT EXISTS `apply` (
  `User_id` varchar(50) NOT NULL,
  `post_id` varchar(50) NOT NULL,
  `com_id` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`User_id`, `post_id`, `com_id`) VALUES
('16it058', '1', '1'),
('16it058', '2', '1'),
('16it058', '8', '6'),
('', '2', '1'),
('16it083', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `com_detail`
--

DROP TABLE IF EXISTS `com_detail`;
CREATE TABLE IF NOT EXISTS `com_detail` (
  `id` bigint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Description` varchar(5000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `com_detail`
--

INSERT INTO `com_detail` (`id`, `name`, `Description`) VALUES
(6, 'AppSite Technolab', '<p>We are here to make Website and Android application in reasonable Price in India</p>\n'),
(1, 'DCP', '<p>fdbdnfnf fgn f tf tr htrh rt hrt htrh r5h</p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `com_login`
--

DROP TABLE IF EXISTS `com_login`;
CREATE TABLE IF NOT EXISTS `com_login` (
  `id` bigint(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `com_login`
--

INSERT INTO `com_login` (`id`, `name`, `password`) VALUES
(1, 'DCP', '662cd4634fff88084423c245505f5dee'),
(2, 'Darshit', '662cd4634fff88084423c245505f5dee'),
(3, 'Nik', 'e6c151d449e1db05b1ffb5ad5ec656cf'),
(4, 'Niks', '3691308f2a4c2f6983f2880d32e29c84'),
(5, 'qq', '7694f4a66316e53c8cdd9d9954bd611d'),
(6, 'AppSite Technolab', 'e6422e3c2a047e9537107e84c325aad1');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

DROP TABLE IF EXISTS `details`;
CREATE TABLE IF NOT EXISTS `details` (
  `User_id` varchar(7) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Number` varchar(10) NOT NULL,
  `Image` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`User_id`, `Name`, `Address`, `Number`, `Image`) VALUES
('16it067', 'Darshit Patel', 'Surat', '7698715269', ''),
('16it058', 'Parth Navsariwala', 'Surat', '9876543215', ''),
('16it083', 'Milan Patel', 'Vadodra', '8529637415', ''),
('16it041', 'Nikunj Khandar', 'Jamnagar', '798456132', ''),
('16it053', 'Aneri Mehta', 'Surat', '789456321', ''),
('16it068', 'Devanshi Patel', 'Vadodra', '568974123', ''),
('16it063', 'Ashna Patel', 'Anand', '568974123', ''),
('16it074', 'Jeet Patel', 'Surat', '456879123', '');

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

DROP TABLE IF EXISTS `interests`;
CREATE TABLE IF NOT EXISTS `interests` (
  `User_id` varchar(10) NOT NULL,
  `Skills` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`User_id`, `Skills`) VALUES
('16it083', 'PHP'),
('16it053', 'c'),
('16it058', 'PHP'),
('16it074', 'Pro'),
('16it041', 'java'),
('16it058', 'java'),
('16it067', 'PHP'),
('16it041', 'c  '),
('16it067', 'HTML'),
('16it067', 'web'),
('16it053', 'java'),
('16it053', 'cpp'),
('16it053', 'dbms'),
('16it053', 'php'),
('16it053', 'html'),
('16it053', 'javascript'),
('16it053', 'Python');

-- --------------------------------------------------------

--
-- Table structure for table `internship`
--

DROP TABLE IF EXISTS `internship`;
CREATE TABLE IF NOT EXISTS `internship` (
  `User_id` varchar(10) NOT NULL,
  `company` varchar(50) NOT NULL,
  `time` varchar(20) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internship`
--

INSERT INTO `internship` (`User_id`, `company`, `time`, `description`) VALUES
('16it058', 'dhwalin', '2 months', '<p>ON AJAX FOR MAKE ONE APPLICATION NAME WEBORTAL</p>\n'),
('16it083', 'dhwalin', '2 months', '<p>web Design</p>\n'),
('16it067', 'dhwalin', '2 months', '<p>Web Designing</p>\n'),
('16it041', 'SPRAT', '3 month`', '<p>wordpress internship</p>\n'),
('16it041', 'SPRAT', '3 month`', '<p>wordpress internship</p>\n'),
('16it053', 'Lead Infosoft', '1 month', '<p>Wordpress and Basics of SEO</p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `user_id` varchar(7) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `Password`) VALUES
('16it067', '2234c23d7ed4fa289b37d415a8dd9a96'),
('16it058', '4fad55b2c5a3aaff3a1c1b3bc04a0771'),
('16it083', '8642ae17be0668f6d9b09f0c3195ea03'),
('16it041', '720de92ccad3039f9e0495d191b34855'),
('16it053', 'be171c5f5878e1d531e38865dc9694b9'),
('16it068', '60211ed1c91da40817760ea66583334b'),
('16it063', 'ba89a1a9555a25fe342300eba4a174a8'),
('16it074', '6962ee2e260ec9b89a84f34a96fe1ce4');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` bigint(10) NOT NULL,
  `post_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `post` varchar(50) NOT NULL,
  `requirement` varchar(500) NOT NULL,
  `Eligible` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `post_id`, `post`, `requirement`, `Eligible`, `description`) VALUES
(1, 1, 'Jn. Engineer', 'python', 'Btech', '<p>bfxhd dfh hrdh h hdr eh ftj srj6r'),
(1, 2, 'mj. Engineer', 'python', 'Btech', '<p>ss</p>\n'),
(6, 8, 'Developer', 'Python developer', '8.0', '<p>With all library</p>\n'),
(5, 4, 'w', 'w', 'w', '<p>w</p>\n'),
(5, 5, 'g', 'g', 'g', '<p>g</p>\n'),
(5, 6, 'g', 'h', 'gh', '<p>h</p>\n'),
(5, 7, 'j', 'j', 'j', '<p>j</p>\n'),
(6, 9, 'DevOps', 'AWS', '9.5 CGPA', '<p>Fully Knowledge of Cloud AWS ,');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `User_id` varchar(10) NOT NULL,
  `Projects` varchar(50) NOT NULL,
  `tech` varchar(100) NOT NULL,
  `Description` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`User_id`, `Projects`, `tech`, `Description`) VALUES
('16it041', 'BLog', 'Android', '<p>App on blogging</p>\n'),
('16it058', 'ARCHER', 'C', '<p>BASIC GAME USING C LANGUAGE</p>\n'),
('16it083', 'project managment', 'php,css,html', '<p>project</p>\n'),
('16it074', 'CityFood', 'Android', '<p>Display the restaurant near you only available in Huwaie</p>\n'),
('16it053', 'Web scraping ecommerce websites', 'python, php,css,html', ''),
('16it067', 'ac=', 'dd', '<p>k</p>\n');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
