-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2015 at 05:15 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `eventattend`
--

CREATE TABLE IF NOT EXISTS `eventattend` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `eventId` int(11) NOT NULL,
  `memberId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `date` datetime NOT NULL,
  `description` text NOT NULL,
  `photo` text,
  `organizer` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `date`, `description`, `photo`, `organizer`) VALUES
(5, 'Reunion 10', '2015-11-14 00:00:00', 'gallery,Just and Binudia family park. ha ha ha ha ha   ', 'Image/newEvent.png', 15),
(6, 'Reunion 11', '2015-11-20 00:00:00', ' venue: Binudia Family Park.\r\n \r\nTime: Morning To night.\r\n\r\nBatch: Only cse-11 batch.\r\n\r\n\r\nJust come Guys.... JUST miss you all.thank you.. ', 'Image/box.png', 15),
(7, 'Conference', '2015-11-14 00:00:00', ' JUST gallery. JUST gallery. JUST gallery. JUST gallery. JUST gallery. JUST gallery. JUST gallery. JUST gallery. JUST gallery. JUST gallery. JUST gallery. JUST gallery. JUST gallery. JUST gallery. JUST gallery. JUST gallery. JUST gallery. JUST gallery. JUST gallery. JUST gallery. JUST gallery.   ', 'Image/remaind.png', 16),
(8, 'Html conference', '2015-11-21 00:00:00', ' venue: Binudia Family Park. Time: Morning To night. Batch: Only cse-11 batch. Just come Guys. JUST miss you all.thank you. Only cse-11 batch. Just come Guys. JUST miss you all.thank you.Time: Morning To night. Batch: Only cse-11 batch. Just come Guys. JUST miss you all.thank you. Only cse-11 batch. Just come Guys. JUST miss you all.thank you.   ', 'Image/gh.png', 15),
(9, 'Coffee Adda Cse 10 Batch ', '2015-12-31 00:00:00', 'Morning :Central Cafeteria JUST. Passing time with teachers and gossip. Lunch: At Vairab hotel. Afternoon: Movie show in Monihar Chinemahall. Our sponsor is Nawshin vai and Nazmul Vai. Guys please come and be nostalgic. Miss all of you. Thanks.  ', 'Image/jhg.png', 16);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `roll` int(15) NOT NULL,
  `batch` varchar(15) NOT NULL,
  `dob` timestamp NULL DEFAULT NULL,
  `blood` varchar(5) NOT NULL,
  `cu_address` text,
  `per_address` text,
  `profession` varchar(250) DEFAULT NULL,
  `com_name` text,
  `com_address` text,
  `email` varchar(200) DEFAULT NULL,
  `fb_pro` text,
  `phone` varchar(15) NOT NULL,
  `photo` text,
  `password` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roll` (`roll`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `roll`, `batch`, `dob`, `blood`, `cu_address`, `per_address`, `profession`, `com_name`, `com_address`, `email`, `fb_pro`, `phone`, `photo`, `password`) VALUES
(15, 'Tanvir Ahmed', 100134, 'CSE 2010-11', '1992-12-28 18:00:00', 'A+', 'S.M.R Hall, Just ', 'Madhupur, Tangail ', 'Student', 'No Job', 'No Address.  ', 'tanvir@gmail.com', 'http:\\www.khokkos.com', '01733644287', 'Image/r.png', 'tanvir'),
(16, 'Ispahan Sarker', 100127, 'CSE 2010-11', '1993-01-02 18:00:00', 'O+', 'SMR hall ', 'Nator ', 'Student', 'no', ' no', 'ispahan@gmail.com', 'http:\\www.bidhanfacrbook.com', '01737122950', 'Image/r.png', 'ispahan'),
(17, 'Bidhan Kundo', 100124, 'CSE 2010-11', '1992-01-11 18:00:00', 'B+', 'Dakbangla, khulna', 'Dakbangla, Khulna ', 'No job', 'no', 'No  ', 'bidhan@gmail.com', 'http:\\www.bidhanfacrbook.com', '01733844290', 'Image/default_0xt5.jpg', 'bidhan');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
