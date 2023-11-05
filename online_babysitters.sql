-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2023 at 06:03 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online babysitters`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` varchar(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Qualification` text NOT NULL,
  `DateOfBirth` datetime(6) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `PhoneNo` int(255) NOT NULL,
  `Experience` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Name`, `Password`, `Qualification`, `DateOfBirth`, `Email`, `PhoneNo`, `Experience`) VALUES
('ad1', 'Muhammad', '12345', 'PHD', '2000-09-01 12:02:20.000000', 'xxx@gmail.com', 1020304, '5 Years');

-- --------------------------------------------------------

--
-- Table structure for table `babysitters`
--

CREATE TABLE `babysitters` (
  `Id` varchar(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Qualification` text NOT NULL,
  `DateOfBirth` datetime(6) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `PhoneNo` int(255) NOT NULL,
  `Experience` text NOT NULL,
  `Address` text NOT NULL,
  `PhoneNo2` int(255) NOT NULL,
  `TimeOfShift` enum('NULL','Full time','Part time') NOT NULL,
  `OfferedServices` text NOT NULL,
  `InsertionTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `babysitters`
--

INSERT INTO `babysitters` (`Id`, `Name`, `Password`, `Qualification`, `DateOfBirth`, `Email`, `PhoneNo`, `Experience`, `Address`, `PhoneNo2`, `TimeOfShift`, `OfferedServices`, `InsertionTime`) VALUES
('bs1', 'Helena', '11111', 'Bachelor', '1999-09-01 12:23:39.000000', '111.111@gmail.com', 111011, '2 Years', 'Raiwind Road, Lahore, Pakistan', 110101, 'NULL', 'Babysit, Teach, Entertain, Put kids to sleep, Drive/ Drop kids to school', '2023-09-11 10:33:39'),
('bs2', 'Ayesha', '22222', 'Phd', '1997-09-21 06:46:34.000000', '222.222@gmail.com', 220202, 'No Experience', 'Cavalry Ground', 2222222, 'Full time', 'Entertain, Storytelling, Cooking, Drive/ Drop kids to school.', '2023-09-11 10:33:39'),
('bs3', 'Khadija', '33333', 'Bachelor', '1998-09-21 09:44:39.000000', '333.333@gmail.com', 330303, '2 years', 'Walton', 3333333, 'Part time', 'Put kids to sleep, Entertainment', '2023-09-11 10:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `Id` varchar(255) NOT NULL,
  `Password` varchar(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Gender` enum('NULL','M','F') NOT NULL,
  `Age` int(255) NOT NULL,
  `Region` text NOT NULL,
  `ContactNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`Id`, `Password`, `Name`, `Gender`, `Age`, `Region`, `ContactNo`) VALUES
('ch1', '11111', 'ali', 'M', 4, 'Punjab', 111011);

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `Id` int(11) NOT NULL,
  `NumberOfBabysitters` int(11) NOT NULL,
  `NoOfChildren` int(255) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `ContactNumber` bigint(255) DEFAULT NULL,
  `InternationalContactNumber` bigint(11) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `TotalEnrollments` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`Id`, `NumberOfBabysitters`, `NoOfChildren`, `Description`, `ContactNumber`, `InternationalContactNumber`, `Email`, `TotalEnrollments`) VALUES
(1, 10, 1, 'The AVARA group has been comitted to providing the best quality products/ services to our customers around the world. The AVARA group consists of hundreds of talented and focused employees bent on providing the people with only the best and nothing less. We hope you will join us and support us on our journey towards becoming the leading developers in the world. ', 1111111, 921111111, 'XXX.XXX@gmail.com', 15);

-- --------------------------------------------------------

--
-- Table structure for table `daycares`
--

CREATE TABLE `daycares` (
  `Id` varchar(11) NOT NULL,
  `Name` varchar(11) NOT NULL,
  `Description` text NOT NULL,
  `BabysittersAvailable` text NOT NULL,
  `Services` text NOT NULL,
  `InsertionTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daycares`
--

INSERT INTO `daycares` (`Id`, `Name`, `Description`, `BabysittersAvailable`, `Services`, `InsertionTime`) VALUES
('daca1', 'Daisy Dayca', 'We provide high quality babysitter and other services to pre-pubescents, 24/7. With a range of child care professionals, we are on our way to becoming the number 1 daycare in the entire county.', 'Bethany,\r\nHelena,\r\nBrittany...', 'Education program,\r\nSports program,\r\nIq related activities,\r\netc', '2023-09-12 01:09:10'),
('daca2', 'Hanna\'s Day', '9/10 Mothers recommend Hanna\'s daycare because of the premium un-copyable care given to every child. Register your kid now on 9978977.', 'Mia,\r\nAyesha,\r\nBeth...', 'Science programs,\r\nLeadership program,\r\nArt based activities,\r\netc', '2020-09-12 01:09:10'),
('daca3', 'Rainbow Day', 'One of the highest rated daycares in the county, thanks to consistent selfless effort from hundreds of comitted babysitters throughout the country.', 'Amy,\r\nRihanna,\r\nLizzy...', 'Science programs,\r\nSports program,\r\nIntelligence related activities,\r\netc', '2022-09-12 01:09:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `babysitters`
--
ALTER TABLE `babysitters`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `daycares`
--
ALTER TABLE `daycares`
  ADD PRIMARY KEY (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
