-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2014 at 08:21 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `TASK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` varchar(100) NOT NULL,
  `TASK_NAME` varchar(255) NOT NULL,
  `ASSIGNEE` varchar(255) NOT NULL,
  `STATUS` varchar(255) NOT NULL,
  PRIMARY KEY (`TASK_ID`),
  KEY `USER_ID` (`USER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`TASK_ID`, `USER_ID`, `TASK_NAME`, `ASSIGNEE`, `STATUS`) VALUES
(63, 'leiw414@gmail.com', 'Fax & Printing', 'Sammy', 'in progress'),
(64, 'leiw414@gmail.com', 'Graphic', 'Graham', 'completed'),
(65, 'leiw414@gmail.com', 'Text', 'Savannah', 'in progress'),
(73, 'leiw414@gmail.com', 'Editing', 'Leonard', 'not started'),
(88, 'leiw414@gmail.com', 'Composing', 'Richard', 'in progress');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `USER_ID` varchar(255) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `REGISTRATION_DATE` varchar(30) NOT NULL,
  `LAST_LOGIN` varchar(30) NOT NULL,
  `STATUS` varchar(100) NOT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `PASSWORD`, `REGISTRATION_DATE`, `LAST_LOGIN`, `STATUS`) VALUES
('leiw414@gmail.com', '7c8f9ad03beee8a2fe4275af8bb52c2e4559eca9', '01/24/2014', '03/14/2014', 'activated');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
