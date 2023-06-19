-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 03:52 AM
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
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorytable`
--

CREATE TABLE `categorytable` (
  `Category_ID` int(10) NOT NULL,
  `CategoryName` varchar(255) NOT NULL,
  `Post` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorytable`
--

INSERT INTO `categorytable` (`Category_ID`, `CategoryName`, `Post`) VALUES
(1, 'phone', 6),
(6, 'Helth', 2);

-- --------------------------------------------------------

--
-- Table structure for table `post_table`
--

CREATE TABLE `post_table` (
  `Post-ID` int(11) NOT NULL,
  `Post-Title` varchar(255) NOT NULL,
  `Post-Description` text NOT NULL,
  `Post-Date` datetime NOT NULL,
  `Post-Image` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_table`
--

INSERT INTO `post_table` (`Post-ID`, `Post-Title`, `Post-Description`, `Post-Date`, `Post-Image`, `Category`, `Author`) VALUES
(11, 'nokia', 'nokia4', '0000-00-00 00:00:00', '', 'phone', 'lemon'),
(12, 'xiome', 'text', '0000-00-00 00:00:00', '', '', 'leon'),
(17, 'xiome', 'test', '0000-00-00 00:00:00', '', '1', 'x'),
(18, 'xiome', 'text', '0000-00-00 00:00:00', 'Apple-iPhone-12-Pro-Max-Blue.jpg', '1', 'redoy'),
(19, 'xiome', 'text', '0000-00-00 00:00:00', 'Apple-iPhone-12-Pro-Max-Blue.jpg', '1', 'redoy'),
(20, 'xiome', '03test', '0000-00-00 00:00:00', 'Apple_iPhone_12_Pro_Max_Graphite_1000_0002.jpg', '1', 'x'),
(21, 'xiome', '03test', '0000-00-00 00:00:00', 'Apple_iPhone_12_Pro_Max_Graphite_1000_0002.jpg', '1', 'x'),
(22, 'xiome', '03test', '0000-00-00 00:00:00', 'Apple_iPhone_12_Pro_Max_Graphite_1000_0002.jpg', '1', 'x');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `userId` int(100) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(10) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`userId`, `firstName`, `lastName`, `userName`, `password`, `role`, `email`) VALUES
(32, 'lemon', 'ahmed', 'lemon', 'admin', 0, 'lemon@gmail.com'),
(34, 'leon', 'leon', 'leon', '202cb962ac59075b964b07152d234b70', 1, 'leon@gmail.com'),
(43, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, 'admin@gmail.com'),
(44, 'member', 'member', 'member', 'aa08769cdcb26674c6706093503ff0a3', 1, 'member@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorytable`
--
ALTER TABLE `categorytable`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `post_table`
--
ALTER TABLE `post_table`
  ADD PRIMARY KEY (`Post-ID`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorytable`
--
ALTER TABLE `categorytable`
  MODIFY `Category_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `post_table`
--
ALTER TABLE `post_table`
  MODIFY `Post-ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `userId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
