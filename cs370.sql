-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2023 at 07:12 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs370`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `bluegold_id` int(11) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `addr` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`bluegold_id`, `fName`, `addr`, `email`) VALUES
(777, 'admin', '777 admin rd.', 'admin@uwec.edyou');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `bluegold_id` int(11) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `addr` varchar(255) NOT NULL,
  `email` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`bluegold_id`, `fName`, `addr`, `email`) VALUES
(7054863, 'faculty', 'Faculty fills out', 'Faculty fills out'),
(987654321, 'staff', '370 professor ave.', 'staff@uwec.edyou');

-- --------------------------------------------------------

--
-- Table structure for table `homework`
--

CREATE TABLE `homework` (
  `hwNum` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `chapter` varchar(255) NOT NULL,
  `descsript` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `homework`
--

INSERT INTO `homework` (`hwNum`, `faculty_id`, `chapter`, `descsript`) VALUES
(1, 7054863, 'Chapter 1: Intro', 'intro'),
(2, 7054863, 'Chapter 1.1: Intro', 'Basics of Comp Security'),
(3, 7054863, 'Chapter 2', 'Protection'),
(4, 987654321, 'Chapter 1: Intro', 'economics');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('student','faculty','admin') NOT NULL,
  `bluegold_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logins`
--
