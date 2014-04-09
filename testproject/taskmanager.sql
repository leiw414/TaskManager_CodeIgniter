-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2014 at 07:25 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `taskmanager`
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

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('10ef7e6df17cc75c09a8119d1bf8b976', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.117 Safari/537.36', 1396304386, 'a:3:{s:9:"user_data";s:0:"";s:11:"login_state";b:1;s:2:"id";s:17:"leiw414@gmail.com";}'),
('1383e0f7f793dd641c2e56f8c2dafa7b', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.117 Safari/537.36', 1396634860, ''),
('446185e951dacdc464dd62faec096052', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.117 Safari/537.36', 1396915259, ''),
('5c3932f72d8dac8026491a15083c95be', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.117 Safari/537.36', 1395961532, 'a:3:{s:9:"user_data";s:0:"";s:11:"login_state";b:1;s:2:"id";s:17:"leiw414@gmail.com";}'),
('7e8defb312ef60a73e7568c0910205b3', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:27.0) Gecko/20100101 Firefox/27.0', 1395960025, 'a:3:{s:9:"user_data";s:0:"";s:11:"login_state";b:1;s:2:"id";s:17:"leiw414@gmail.com";}'),
('b77bbc6cf357e98aaf6f7ac74d0f02b8', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:27.0) Gecko/20100101 Firefox/27.0', 1395961799, ''),
('e6364df741d2fed64b12f940c74af6df', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.117 Safari/537.36', 1396113107, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`TASK_ID`, `USER_ID`, `TASK_NAME`, `ASSIGNEE`, `STATUS`) VALUES
(63, 'leiw414@gmail.com', 'Fax & Printing', 'Sammy Bush', 'in progress'),
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
('chunxiz@live.unc.edu', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '03/17/2014', '', '084ef582d716bf158d5d2363d4701011f5d5feb0'),
('fiteveryone@gmail.com', '7c8f9ad03beee8a2fe4275af8bb52c2e4559eca9', '03/27/2014', '03/27/2014', 'activated'),
('leiw414@gmail.com', '7c8f9ad03beee8a2fe4275af8bb52c2e4559eca9', '01/24/2014', '03/31/2014', 'activated');

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
