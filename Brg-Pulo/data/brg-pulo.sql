-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2025 at 07:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brg-pulo`
--

-- --------------------------------------------------------

--
-- Table structure for table `b-official`
--

CREATE TABLE `b-official` (
  `fname` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `mname` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `lname` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `number` int(50) DEFAULT NULL,
  `barangay` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `position` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `age` int(50) DEFAULT NULL,
  `dateofbirth` int(50) DEFAULT NULL,
  `address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `picture` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `password` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `b-official`
--

INSERT INTO `b-official` (`fname`, `mname`, `lname`, `number`, `barangay`, `position`, `age`, `dateofbirth`, `address`, `picture`, `email`, `password`, `id`) VALUES
('Baka', 'to', 'tao', 1234567890, 'pekpek', 'Mayor', 78, 9999, '53 oblacion East, Alitagtag, Batangas', 'data/uploads/Screenshot 2025-03-13 170124.png', 'Ratbu69@gmail.com', 'Ratbu69', 0);

-- --------------------------------------------------------

--
-- Table structure for table `res-info`
--

CREATE TABLE `res-info` (
  `id` int(11) NOT NULL,
  `fname` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mname` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lname` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `age` int(50) NOT NULL,
  `number` int(50) NOT NULL,
  `c-status` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `dob` date NOT NULL,
  `profile` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `housen` int(50) NOT NULL,
  `purok` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `barangay` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `res-info`
--

INSERT INTO `res-info` (`id`, `fname`, `mname`, `lname`, `age`, `number`, `c-status`, `dob`, `profile`, `housen`, `purok`, `barangay`) VALUES
(1, 'Andrei David', 'R', 'Roxas', 21, 1234567890, 'Widowed', '1999-12-07', '../uploads/Screenshot 2025-03-13 165900.png', 69, 'Purok 1', 'Barangay 5'),
(2, 'Andrei David', 'R', 'Del Pillar', 29, 1234567890, 'Widowed', '2009-09-09', '../uploads/Screenshot 2025-03-13 165900.png', 69, 'Purok 2', 'Barangay 3'),
(3, 'Andrei David', 'D', 'Roxas', 90, 1234567890, 'Separated', '2009-09-09', '../uploads/Screenshot 2025-03-13 165900.png', 69, 'Purok 2', 'Barangay 3'),
(4, 'Douglas', 'D', 'Del kupal', 48, 1234567890, 'Separated', '2029-05-15', '../uploads/Screenshot 2025-03-13 170124.png', 69, 'Purok 4', 'Barangay 3'),
(5, 'Ratbu', 'D', 'Del kupal', 98, 1234567890, 'Married', '1777-09-09', '../uploads/cover.png', 69, 'Purok 5', 'Barangay 2'),
(6, 'Pablo', 'Mark', 'Escobar', 17, 987654321, 'Widowed', '2005-01-01', '../uploads/Screenshot 2025-03-13 171725.png', 69, 'Purok 1', 'Barangay 2'),
(7, 'Douglas', 'D', 'Escobar', 37, 987654321, 'Single', '1980-02-07', '../uploads/Screenshot 2025-03-13 170124.png', 69, 'Purok 1', 'Barangay 1'),
(8, 'Baka', 'Si', 'Escobar', 19, 987654321, 'Married', '2006-12-07', '../uploads/drop.png', 69, 'Purok 4', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `b-official`
--
ALTER TABLE `b-official`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `res-info`
--
ALTER TABLE `res-info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `res-info`
--
ALTER TABLE `res-info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
