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

INSERT INTO `logins` (`username`, `password`, `role`, `bluegold_id`) VALUES
('1253208465b1efa876f982d8a9e73eef', '8d0b535f10c4a9053f51e8d511b3db39', 'faculty', 987654321),
('172522ec1028ab781d9dfd17eaca4427', '6b2ded51d81a4403d8a4bd25fa1e57ee', 'student', 555),
('21232f297a57a5a743894a0e4a801fc3', 'f1c1592588411002af340cbaedd6fc33', 'admin', 777),
('332532dcfaa1cbf61e2a266bd723612c', 'b706835de79a2b4e80506f582af3676a', 'student', 999),
('39c63ddb96a31b9610cd976b896ad4f0', 'caf1a3dfb505ffed0d024130f58c5cfa', 'student', 321),
('684c851af59965b680086b7b4896ff98', '1f9440f0a54156424fedd461c1cc2230', 'student', 82),
('8ffe695c958773feded97286704d4f88', 'd9928cef325200a155c575e3bf666d14', 'student', 3071999),
('a1a9299d6ec5e1fde5be9eab2fdeeb3c', '0ec38ee768ff758b5fafe33045bd80ce', 'student', 19990703),
('b02ae5aaefe3f7090668df034b0f2324', '7d69567520a3e1f6a3df21129c9506aa', 'student', 7054864),
('d561c7c03c1f2831904823a95835ff5f', '8ec370ce8a1b51760dd44b82cf219b18', 'faculty', 7054863);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `bluegold_id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `addr` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gpa` decimal(3,2) NOT NULL,
  `total_credit` int(11) NOT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `bluegold_id`, `fullName`, `addr`, `phone`, `gpa`, `total_credit`, `balance`) VALUES
(10020, 3071999, 'ryanhrastich', 'Student Info', 'Student Info', '4.00', 21, 5000),
(10021, 19990703, 'rhrastich', '370 comp sci.', '6512008722', '3.50', 71, 115),
(10022, 321, 'man', 'Student Info', 'Student Info', '1.60', 110, 5000),
(10025, 555, 'david', 'Student Info', 'Student Info', '2.90', 98, 29),
(10026, 82, 'Robert', '370 blugold rd.', 'Student Info', '3.20', 53, 5000),
(10028, 7054864, 'emily', '1073 fairyland blvd.', 'Student Info', '0.00', 0, 5000),
(10032, 999, 'sam', 'Student Info', 'Student Info', '0.00', 0, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE `teaches` (
  `student_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `increm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teaches`
--

INSERT INTO `teaches` (`student_id`, `faculty_id`, `increm`) VALUES
(3071999, 987654321, 1),
(19990703, 987654321, 2),
(999, 987654321, 3),
(7054864, 987654321, 4),
(321, 7054863, 5),
(555, 7054863, 6),
(82, 7054863, 7),
(19990703, 7054863, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`bluegold_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`bluegold_id`);

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`hwNum`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bluegold_id` (`bluegold_id`);

--
-- Indexes for table `teaches`
--
ALTER TABLE `teaches`
  ADD PRIMARY KEY (`increm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
  MODIFY `hwNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10034;

--
-- AUTO_INCREMENT for table `teaches`
--
ALTER TABLE `teaches`
  MODIFY `increm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
