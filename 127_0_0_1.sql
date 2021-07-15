-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 29, 2021 at 12:15 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osu_event`
--
CREATE DATABASE IF NOT EXISTS `osu_event` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `osu_event`;

-- --------------------------------------------------------

--
-- Table structure for table `registered21`
--

DROP TABLE IF EXISTS `registered21`;
CREATE TABLE IF NOT EXISTS `registered21` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `regdate` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered21`
--

INSERT INTO `registered21` (`id`, `user_id`, `regdate`) VALUES
(1, 1, '2021-04-16'),
(2, 5, '2021-04-17'),
(5, 7, '2021-04-18'),
(7, 9, '2021-04-19'),
(8, 3, '2021-04-20'),
(9, 14, '2021-04-21'),
(10, 4, '2021-04-21'),
(11, 19, '2021-04-23'),
(12, 28, '2021-04-25'),
(13, 30, '2021-04-26'),
(14, 31, '2021-04-26'),
(15, 32, '2021-04-27'),
(16, 33, '2021-04-29'),
(17, 29, '2021-04-29');

-- --------------------------------------------------------

--
-- Stand-in structure for view `reguserdetail`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `reguserdetail`;
CREATE TABLE IF NOT EXISTS `reguserdetail` (
`user_id` int(11)
,`regdate` date
,`username` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `birthdate` varchar(10) NOT NULL,
  `level` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `email`, `gender`, `birthdate`, `level`) VALUES
(1, 'admin', 'osuosu111', 'Admin User', 'emma@imsmolelf.my', 'Male', '1997-04-01', 1),
(2, 'imsmolsushi', '123', 'Miea Pique', 'imsmolsushi@gmail.com', 'Female', '1997-11-11', 0),
(3, 'emma.llama', '123', 'Emma Vinter', 'emmallama@gmail.com', 'Female', '1991-09-13', 0),
(4, 'lele', '123', 'Eiman Danial', 'lele@gmail.com', 'Male', '1992-05-22', 0),
(5, 'travisnichole', '321', 'Arsyad Zaini', 'ayamterbang@gmail.com', 'Male', '1997-02-01', 0),
(7, 'xrampagex', '234', 'Ali Abu', 'xrampagex@gmail.com', 'Male', '2009-12-26', 0),
(8, 'mars.argo', '234', 'Brittany Sheets', 'marsargo@gmail.com', 'Female', '1991-02-27', 0),
(9, 'bonkudoge', '234', 'Good Doge', 'bonkudoge@gmail.com', 'Male', '1985-03-21', 0),
(14, 'asterisk', '345', 'Haikal Akmal', 'asterisk@gmail.com', 'Male', '1992-01-29', 0),
(16, 'MuNmiR', '456', 'Nazmi Roslan', 'MuNmiR@gmail.com', 'Male', '1994-06-08', 0),
(19, 'kutiyapopopo', '567', 'Popo Llama', 'popo@popo.com', 'Female', '1993-06-09', 0),
(28, 'azierz', '123', 'Azizi', 'azizi@gmail.com', 'Male', '1999-05-18', 0),
(29, 'helluva', '456789', 'Amir Shafiq', 'a.s@yahoo.com', 'Male', '1994-06-07', 0),
(30, 'syhrh', '234', 'Sabina Byna', 'bynot@yahoo.com', 'Female', '1997-12-30', 0),
(31, 'isekai', '123', 'Aoi', 'aoi@gmail.com', 'Female', '1985-06-11', 0),
(32, 'Jai', '123', 'Fulemak', 'alamak@yahoo.com', 'Male', '1993-05-31', 0),
(33, 'yolo', 'osuosu111', 'Yolo Bin Abu', 'yolo@yahoo.com', 'Male', '1993-08-20', 0);

-- --------------------------------------------------------

--
-- Structure for view `reguserdetail`
--
DROP TABLE IF EXISTS `reguserdetail`;

DROP VIEW IF EXISTS `reguserdetail`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reguserdetail`  AS  select `registered21`.`user_id` AS `user_id`,`registered21`.`regdate` AS `regdate`,`user`.`username` AS `username` from (`registered21` join `user` on((`registered21`.`user_id` = `user`.`id`))) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
