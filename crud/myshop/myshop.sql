-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2023 at 05:53 AM
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
-- Database: `myshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `phone`, `address`) VALUES
(1, 'Bill Gates', 'bill.gates@microsoft', '+123456789', 'New York, USA'),
(2, 'Elon Musk', 'elon.musk@spacex.com', '+111222333', 'Florida, USA'),
(3, 'Will Smith', 'will.smith@gmail.com', '+111333555', 'California, USA'),
(4, 'Bob Marley', 'bob@gmail.com', '+111555999', 'Texas, USA'),
(5, 'Cristiano Ronaldo', 'cristiano.ronaldo@gm', '+32447788993', 'Manchester, England'),
(6, 'Boris Johnson', 'boris.johnson@gmail.', '+4499778855', 'London, England'),
(7, 'lemon', 'e@email.com', '', 'asdlfjk'),
(9, 'lx4', 'a@gmail.com', '123da', 'aksldf'),
(14, 'lemon-0', 'lemon@gmail.com', '00123', 'dhaka'),
(17, 'lex', '', '12', 'asd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
