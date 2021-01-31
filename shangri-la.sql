-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2020 at 08:53 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shangri-la`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `PasswordHash` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Username`, `PasswordHash`) VALUES
('admin', '5994471ABB01112AFCC18159F6CC74B4F511B99806DA59B3CAF5A9C173CACFC5'),
('tester', '36BBE50ED96841D10443BCB670D6554F0A34B761BE67EC9C4A8AD2C0C44CA42C');

-- --------------------------------------------------------

--
-- Table structure for table `hometestkit`
--

CREATE TABLE `hometestkit` (
  `TNN_Code` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `used` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hometestkit`
--
INSERT INTO `hometestkit` (`TNN_Code`, `used`) VALUES
('34GC829B', '1'),
('4F7YKH9G', '1'),
('57UBS5J6', '1'),
('8RL4ENTK', '1'),
('CB8FBCCM', '1'),
('CCZTQ8KW', '1'),
('FEQQ6UUG', '1'),
('MM2874Z6', '1'),
('R9KZ2NXL', '1'),
('YBQUVXHL', '1'),
('JCSCSJC', '1'),
('CSJCBSA', '1'),
('DCSCSJC', '1'),
('ECSCSBS', '1'),
('F98JCBS', '1'),
('GCSFCBS', '1'),
('HCJ12CZ', '1'),
('ICSCOKS', '1'),
('JCSCS3Z', '1'),
('KCSCUBS', '1'),
('L23JCBS', '1'),
('MCS98BS', '1');

-- --------------------------------------------------------

--
-- Table structure for table `testresult`
--

CREATE TABLE `testresult` (
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Fullname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Gender` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `Postcode` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TTN` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TestResult` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testresult`
--
INSERT INTO `testresult` (`Email`, `Fullname`, `Age`, `Gender`, `Address`, `Postcode`, `TTN`, `TestResult`) VALUES
('abc@le.ac.uk', 'John Smith', 30, 'M', 'University Road, Leicester', 'LE1 7RH', '34GC829B', 'Negative'),
('dharavath.mohan47@gmail.com', 'Mohan Dharavath', 25, 'M', '63 Ullswater street', 'LE2 7DU', '4F7YKH9G', 'Negative'),
('Justinwright@gmail.com', 'Justin Wright', 60, 'M', '12 Glenfield ', 'LE4 7WD', 'R9KZ2NXL', 'Inconclusi'),
('loki@gmail.com', 'lokesh kumar', 29, 'M', '63 Ullswater street', 'LE2 7DU', 'CB8FBCCM', 'Positive'),
('michaeljack@gmail.com', 'Michael', 55, 'M', '272 narborough road', 'LE5 UGH', 'MM2874Z6', 'Negative'),
('pavan@gmail.com', 'pavan kande', 46, 'M', '177 hinckley', 'LE3 OTF', 'CCZTQ8KW', 'Negative'),
('raju12@gmail.com', 'Raju Durgam', 47, 'M', '32 Jarrom street', 'LE6 3SA', 'YBQUVXHL', 'Negative'),
('ravali@gmail.com', 'Ravali Burugu', 25, 'F', '252 tudor road', 'LE3 5UJ', 'FEQQ6UUG', 'Negative'),
('saikalyan@gmail.com', 'sai kalyan', 21, 'M', '63 Ullswater street', 'LE2 7DU', '8RL4ENTK', 'Positive'),
('srija22@gmail.com', 'Srija Kotha', 23, 'F', '77 grasmere st', 'LE3 5HW', '57UBS5J6', 'Negative'),
('sravan@gmail.com', 'Sravan', 63, 'M', '77 grasmere st', 'LE3 5IW', 'MCS98BS', 'Positive'),
('mahatma@gmail.com', 'Mahatma', 15, 'F', '7 allwood st', 'LE3 5HW', 'JCSCSJC', 'Positive'),
('venky@gmail.com', 'Venky', 3, 'M', '61 Ullswater street ', 'LE2 7DU', 'CSJCBSA', 'Positive'),
('chandana@gmail.com', 'Chandana', 46, 'F', '77 grasmere st', 'LE3 5HW', 'DCSCSJC', 'Positive'),
('vandana@gmail.com', 'Vandana', 16, 'F', '65 grasmere st', 'LE3 5HW', 'ECSCSBS', 'Positive'),
('rahul@gmail.com', 'Rahul', 48, 'M', '177 hinckley road', 'LE3 OTF', 'F98JCBS', 'Positive'),
('akhil@gmail.com', 'Akhil', 16, 'M', '177 grasmere st', 'LE3 OTF', 'GCSFCBS', 'Negative'),
('chanti@gmail.com', 'Chanti', 24, 'M', '7 grasmere st', 'LE3 5HW', 'HCJ12CZ', 'Negative'),
('david@gmail.com', 'David', 43, 'M', '7 jarrom st', 'LE2 7WH', 'ICSCOKS', 'Negative'),
('jasmine@gmail.com', 'Jasmine', 65, 'F', '77 grantham st', 'LE3 5IW', 'JCSCS3Z', 'Positive'),
('radhika@gmail.com', 'Radhika', 47, 'F', '27 grantham st', 'LE1 5IW', 'KCSCUBS', 'Positive'),
('jamuna@gmail.com', 'Jamuna', 68, 'F', '77 grasmere st', 'LE3 5IW', 'L23JCBS', 'Negative');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `hometestkit`
--
ALTER TABLE `hometestkit`
  ADD PRIMARY KEY (`TNN_Code`);

--
-- Indexes for table `testresult`
--
ALTER TABLE `testresult`
  ADD PRIMARY KEY (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
