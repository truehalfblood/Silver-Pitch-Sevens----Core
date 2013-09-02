-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2013 at 05:24 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `id` mediumint(10) NOT NULL AUTO_INCREMENT,
  `player_name` varchar(50) NOT NULL,
  `team_name` varchar(50) NOT NULL,
  `position` mediumint(2) NOT NULL,
  `fitness` mediumint(3) NOT NULL,
  `handling` mediumint(3) NOT NULL,
  `enduarance` mediumint(3) NOT NULL,
  `attack` mediumint(3) NOT NULL,
  `tackling` mediumint(3) NOT NULL,
  `speed` mediumint(3) NOT NULL,
  `strength` mediumint(3) NOT NULL,
  `kicking` mediumint(3) NOT NULL,
  `conditioning` mediumint(4) NOT NULL,
  `fatigue` mediumint(4) NOT NULL,
  `experience` mediumint(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `player_name`, `team_name`, `position`, `fitness`, `handling`, `enduarance`, `attack`, `tackling`, `speed`, `strength`, `kicking`, `conditioning`, `fatigue`, `experience`) VALUES
(1, 'Ace Attwick', 'Strathmore University', 1, 14, 13, 14, 12, 14, 13, 13, 12, 53, 0, 100253),
(2, 'Bjourn Herzog', 'Strathmore University', 2, 12, 14, 11, 14, 14, 14, 14, 12, 68, 0, 108985),
(3, 'Stu Clarke', 'Strathmore University', 3, 11, 12, 11, 11, 13, 14, 13, 12, 21, 0, 111676),
(4, 'Alex Huang', 'Strathmore University', 4, 14, 11, 13, 12, 13, 11, 13, 12, 5, 0, 101027),
(5, 'Francis Maina', 'Strathmore University', 5, 13, 12, 12, 11, 11, 11, 12, 11, 51, 0, 108909),
(6, 'Waylon Pigott', 'Strathmore University', 6, 13, 11, 12, 11, 14, 11, 14, 12, 45, 0, 114615),
(7, 'Jason Andren', 'Strathmore University', 7, 12, 11, 11, 14, 13, 14, 12, 13, 37, 0, 110830),
(8, 'Franko', 'Africa Nazarene University', 1, 7, 8, 8, 9, 7, 7, 7, 8, 16, 0, 50059),
(9, 'Boi', 'Africa Nazarene University', 2, 8, 7, 7, 9, 19, 9, 11, 7, 75, 0, 50059),
(10, 'Lore', 'Africa Nazarene University', 3, 9, 14, 7, 8, 8, 8, 9, 7, 77, 0, 50059),
(11, 'Kene', 'Africa Nazarene University', 4, 8, 9, 12, 9, 7, 7, 9, 7, 69, 0, 50059),
(12, 'Brayo', 'Africa Nazarene University', 5, 12, 7, 9, 7, 21, 8, 14, 9, 36, 0, 50059),
(13, 'viki', 'Africa Nazarene University', 6, 9, 7, 8, 15, 7, 7, 9, 7, 75, 0, 50059),
(14, 'Career', 'Africa Nazarene University', 7, 10, 8, 9, 9, 9, 9, 1, 7, 33, 0, 50059),
(15, 'Francis', 'Titans', 1, 23, 22, 24, 26, 23, 23, 23, 20, 74, 0, 189932),
(16, 'Odu', 'Titans', 2, 22, 25, 20, 22, 24, 21, 26, 23, 97, 0, 189932),
(17, 'Dan Njuguna', 'Titans', 3, 20, 23, 21, 24, 26, 26, 26, 24, 87, 0, 189932),
(18, 'Abdi Zak', 'Titans', 4, 25, 21, 22, 22, 22, 24, 26, 26, 66, 0, 189932),
(19, 'Felix Onsando', 'Titans', 5, 22, 23, 26, 20, 20, 20, 25, 26, 39, 0, 189932),
(20, 'Kevin Ndirangu', 'Titans', 6, 26, 21, 20, 26, 22, 26, 26, 24, 66, 0, 189932),
(21, 'Martin Kanyi', 'Titans', 7, 23, 22, 25, 23, 24, 22, 23, 21, 64, 0, 189932);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
