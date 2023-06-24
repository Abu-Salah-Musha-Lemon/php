-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 06:23 PM
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
(1, 'phone', 20),
(6, 'Helth', 6),
(10, 'leon', 0),
(11, 'leon', 0),
(12, 'city', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_table`
--

CREATE TABLE `post_table` (
  `Post_ID` int(11) NOT NULL,
  `Post_Title` varchar(255) NOT NULL,
  `Post_Description` text NOT NULL,
  `Post_Date` datetime NOT NULL,
  `Post_Image` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_table`
--

INSERT INTO `post_table` (`Post_ID`, `Post_Title`, `Post_Description`, `Post_Date`, `Post_Image`, `Category`, `Author`) VALUES
(43, 'symphoney', 'nokia4', '0000-00-00 00:00:00', '3719937_1.jpg', '6', '43'),
(44, 'symphoney', 'nokia4', '0000-00-00 00:00:00', '3719937_1.jpg', '6', '43'),
(45, 'xiome', '03test', '0000-00-00 00:00:00', '3719937_1.jpg', '12', '43');

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
  ADD PRIMARY KEY (`Post_ID`);

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
  MODIFY `Category_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `post_table`
--
ALTER TABLE `post_table`
  MODIFY `Post_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `userId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
