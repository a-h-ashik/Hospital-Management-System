-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 01:02 AM
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
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountants`
--

CREATE TABLE `accountants` (
  `acc_id` int(4) NOT NULL,
  `acc_name` varchar(50) DEFAULT NULL,
  `acc_email` varchar(250) DEFAULT NULL,
  `pass` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accountants`
--

INSERT INTO `accountants` (`acc_id`, `acc_name`, `acc_email`, `pass`) VALUES
(55500, 'Priyam', 'acc.priyam@gmail.com', '0000'),
(55501, 'Zahin', 'acc.zahin@gmail.com', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `acc_id` int(11) NOT NULL,
  `bill` int(11) DEFAULT NULL,
  `pat_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`acc_id`, `bill`, `pat_id`) VALUES
(110000, 600, 20220000),
(110001, 100, 20220001),
(110002, 0, 20220002),
(110003, 0, 20220003);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adm_id` int(4) NOT NULL,
  `adm_name` varchar(50) DEFAULT NULL,
  `adm_email` varchar(150) DEFAULT NULL,
  `is_staff` tinyint(1) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `pass` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adm_id`, `adm_name`, `adm_email`, `is_staff`, `is_admin`, `pass`) VALUES
(2200, 'Ashik', 'abidhossainashik@gmail.com', 1, 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `doc_id` int(4) NOT NULL,
  `pat_id` int(6) NOT NULL,
  `shift` char(1) DEFAULT NULL,
  `date` date NOT NULL,
  `is_completed` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`doc_id`, `pat_id`, `shift`, `date`, `is_completed`) VALUES
(1103, 20220003, 'M', '2022-12-23', 0),
(1104, 20220000, 'M', '2022-12-16', 0),
(1104, 20220000, 'M', '2022-12-17', 0),
(1104, 20220000, 'E', '2022-12-19', 1),
(1104, 20220000, 'M', '2022-12-20', 0),
(1104, 20220000, 'M', '2022-12-22', 0),
(1104, 20220001, 'E', '2022-12-16', 0),
(1104, 20220001, 'E', '2022-12-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dep_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dep_name`) VALUES
('CARDIOLOGY'),
('DENTAL'),
('GAYNAE'),
('MEDICINE'),
('NEUROLOGY'),
('SURGERY');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doc_id` int(4) NOT NULL,
  `doc_name` varchar(50) DEFAULT NULL,
  `doc_email` varchar(150) DEFAULT NULL,
  `degree` varchar(150) DEFAULT NULL,
  `speciality` varchar(300) DEFAULT NULL,
  `visit` int(11) DEFAULT NULL,
  `dep_name` varchar(50) DEFAULT NULL,
  `doc_image` varchar(150) DEFAULT NULL,
  `pass` varchar(6) DEFAULT NULL,
  `adm_id` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doc_id`, `doc_name`, `doc_email`, `degree`, `speciality`, `visit`, `dep_name`, `doc_image`, `pass`, `adm_id`) VALUES
(1100, 'Dr. Haque', 'doc.haque@gmail.com', 'MBBS, FCPS', 'Dental Surgeon', 600, 'DENTAL', 'default.png', '0000', 2200),
(1101, 'Dr. Afroza Khanom', 'doc.afroza@gmail.com', 'MBBS, FCPS, DGO, MCPS', 'Gynecology', 700, 'GYNE', 'default.png', '0000', 2200),
(1102, 'Dr. Shams Munwar', 'doc.shams@gmail.com', 'MBBS, MRCP (UK), D.Card (London)', 'Senior Consultant', 900, 'CARDIOLOGY', 'default.png', '0000', 2200),
(1103, 'Dr. Chowdhury Ratib Abdullah', 'doc.ratib@gmail.com', 'MBBS, CCD', 'Medicine Specialist', 600, 'MEDICINE', 'default.png', '0000', 2200),
(1104, 'Dr. Md Yasin ', 'yasin@gmail.com', 'MBBS, FCPS', 'Consultant', 500, 'MEDICINE', 'Dr. Md Yasin .jpeg', '0000', 2200);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `new_name` varchar(150) NOT NULL,
  `details` varchar(2000) DEFAULT NULL,
  `new_image` varchar(50) DEFAULT NULL,
  `adm_id` int(4) DEFAULT NULL,
  `new_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`new_name`, `details`, `new_image`, `adm_id`, `new_date`) VALUES
('Test 01', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit aut laboriosam beatae necessitatibus. Tempore sunt esse nulla doloribus molestias dolores, cumque dignissimos, corrupti, animi quod modi nostrum. Laudantium nam sed quam est id voluptatibus odit. Quo voluptatibus, eius facere, ea odio hic aut dolorum provident, omnis commodi voluptatem at nisi?(Edited2)', 'Test 01.png', 2200, '2022-12-08'),
('Test 02', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolore velit itaque consectetur, repellendus recusandae voluptates?', 'Test 02.png', 2200, '2022-12-08'),
('Test 03', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolore velit itaque consectetur, repellendus recusandae voluptates?', 'Test 03.png', 2200, '2022-12-08'),
('Test 04', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolore velit itaque consectetur, repellendus recusandae voluptates?', 'Test 04.png', 2200, '2022-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `pat_id` int(6) NOT NULL,
  `pat_name` varchar(50) DEFAULT NULL,
  `pat_email` varchar(150) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `address` varchar(15) DEFAULT NULL,
  `pat_image` varchar(150) DEFAULT NULL,
  `pass` varchar(6) DEFAULT NULL,
  `age` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`pat_id`, `pat_name`, `pat_email`, `gender`, `address`, `pat_image`, `pass`, `age`) VALUES
(20220000, 'Yasin', 'test@gmail.com', 'Male', 'Dhaka', 'Yasin.png', '0000', 22),
(20220001, 'Test 02', 'test2@gmail.com', 'Female', 'Dhaka', 'Test 02.png', '0000', 21),
(20220002, 'Test 03', 'test3@gmail.com', 'Male', 'Khulna', 'Test 03.png', '0000', 30),
(20220003, 'Ashik', 'ashik@gmail.com', 'Male', 'Rajbari', 'Ashik.png', '0000', 23);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` varchar(8) NOT NULL,
  `type` char(1) DEFAULT NULL,
  `is_booked` tinyint(1) DEFAULT NULL,
  `acc_id` int(6) DEFAULT NULL,
  `pat_id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `type`, `is_booked`, `acc_id`, `pat_id`) VALUES
('HB10201', 'V', 0, 55500, NULL),
('HB10202', 'V', 0, 55500, NULL),
('HB10203', 'V', 0, 55500, NULL),
('HB10204', 'V', 0, 55500, NULL),
('HB10205', 'V', 0, 55500, NULL),
('HB10301', 'I', 0, 55500, 20220000),
('HB10302', 'I', 0, 55500, NULL),
('HB10303', 'I', 0, 55500, NULL),
('HB10304', 'I', 0, 55500, NULL),
('HB10305', 'I', 0, 55500, NULL),
('HB20201', 'G', 0, 55500, NULL),
('HB20202', 'G', 0, 55500, NULL),
('HB20203', 'G', 0, 55500, NULL),
('HB20204', 'G', 0, 55500, NULL),
('HB20205', 'G', 0, 55500, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `doc_id` int(4) NOT NULL,
  `sch_day` varchar(12) NOT NULL,
  `shift_m` tinyint(1) NOT NULL,
  `shift_e` tinyint(1) NOT NULL,
  `sl` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`doc_id`, `sch_day`, `shift_m`, `shift_e`, `sl`) VALUES
(1100, 'Sat', 1, 0, 1),
(1101, 'Sat', 0, 1, 1),
(1102, 'Fri', 1, 1, 7),
(1103, 'Fri', 1, 0, 7),
(1104, 'Fri', 1, 1, 7),
(1104, 'Mon', 0, 1, 3),
(1104, 'Sat', 1, 1, 1),
(1104, 'Sun', 1, 0, 2),
(1104, 'Thu', 1, 1, 6),
(1104, 'Tue', 1, 1, 4),
(1104, 'Wed', 0, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `sto_name` varchar(150) NOT NULL,
  `details` varchar(2000) DEFAULT NULL,
  `sto_image` varchar(50) DEFAULT NULL,
  `adm_id` int(4) DEFAULT NULL,
  `sto_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`sto_name`, `details`, `sto_image`, `adm_id`, `sto_date`) VALUES
('Test 01', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit aut laboriosam beatae necessitatibus. Tempore sunt esse nulla doloribus molestias dolores, cumque dignissimos, corrupti, animi quod modi nostrum. Laudantium nam sed quam est id voluptatibus odit. Quo voluptatibus, eius facere, ea odio hic aut dolorum provident, omnis commodi voluptatem at nisi? (Edited2)', 'Test 01.png', 2200, '2022-12-08'),
('Test 02', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolore velit itaque consectetur, repellendus recusandae voluptates?', 'Test 02.png', 2200, '2022-12-08'),
('Test 03', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolore velit itaque consectetur, repellendus recusandae voluptates?', 'Test 03.png', 2200, '2022-12-08'),
('Test 04', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolore velit itaque consectetur, repellendus recusandae voluptates?', 'Test 04.png', 2200, '2022-12-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountants`
--
ALTER TABLE `accountants`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`acc_id`,`pat_id`),
  ADD KEY `pat_id` (`pat_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`doc_id`,`pat_id`,`date`),
  ADD KEY `pat_id` (`pat_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dep_name`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doc_id`),
  ADD KEY `dep_name` (`dep_name`),
  ADD KEY `adm_id` (`adm_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`new_name`),
  ADD KEY `adm_id` (`adm_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`pat_id`,`pat_email`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `acc_id` (`acc_id`),
  ADD KEY `pat_id` (`pat_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`doc_id`,`sch_day`,`shift_m`,`shift_e`,`sl`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`sto_name`),
  ADD KEY `adm_id` (`adm_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`pat_id`) REFERENCES `patients` (`pat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `doctors` (`doc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`pat_id`) REFERENCES `patients` (`pat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_2` FOREIGN KEY (`adm_id`) REFERENCES `admins` (`adm_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`adm_id`) REFERENCES `admins` (`adm_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `accountants` (`acc_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `doctors` (`doc_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stories`
--
ALTER TABLE `stories`
  ADD CONSTRAINT `stories_ibfk_1` FOREIGN KEY (`adm_id`) REFERENCES `admins` (`adm_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
