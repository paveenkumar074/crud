-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2019 at 12:14 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--
CREATE DATABASE IF NOT EXISTS `crud` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `crud`;

-- --------------------------------------------------------

--
-- Table structure for table `mcolleges`
--

DROP TABLE IF EXISTS `mcolleges`;
CREATE TABLE IF NOT EXISTS `mcolleges` (
  `CollegeUID` int(11) NOT NULL AUTO_INCREMENT,
  `CollegeName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CollegeUID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcolleges`
--

INSERT INTO `mcolleges` (`CollegeUID`, `CollegeName`) VALUES
(1, 'ABC Engg College'),
(2, 'EXPER INSTITUTE OF ENGG');

-- --------------------------------------------------------

--
-- Table structure for table `mcountries`
--

DROP TABLE IF EXISTS `mcountries`;
CREATE TABLE IF NOT EXISTS `mcountries` (
  `CountryUID` int(11) NOT NULL AUTO_INCREMENT,
  `CountryName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CountryUID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcountries`
--

INSERT INTO `mcountries` (`CountryUID`, `CountryName`) VALUES
(1, 'India'),
(2, 'Singapore'),
(3, 'Malaysia');

-- --------------------------------------------------------

--
-- Table structure for table `mteams`
--

DROP TABLE IF EXISTS `mteams`;
CREATE TABLE IF NOT EXISTS `mteams` (
  `TeamUID` int(11) NOT NULL AUTO_INCREMENT,
  `TeamName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`TeamUID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mteams`
--

INSERT INTO `mteams` (`TeamUID`, `TeamName`) VALUES
(1, 'Team A'),
(2, 'Team B');

-- --------------------------------------------------------

--
-- Table structure for table `musers`
--

DROP TABLE IF EXISTS `musers`;
CREATE TABLE IF NOT EXISTS `musers` (
  `UserUID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Birthday` date DEFAULT NULL,
  `CountryUID` int(11) NOT NULL,
  `TeamUID` int(11) NOT NULL,
  `CollegeUID` int(11) NOT NULL,
  `Height` varchar(100) DEFAULT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Avatar` varchar(100) DEFAULT NULL,
  `Position` enum('','Backward','Forward') DEFAULT NULL,
  `Number` varchar(100) DEFAULT NULL,
  `NBAdebut` varchar(100) NOT NULL,
  PRIMARY KEY (`UserUID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
