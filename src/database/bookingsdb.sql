-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 24, 2021 at 12:28 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookingsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_bookings`
--

CREATE TABLE `emp_bookings` (
  `id` bigint(20) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `employee_mail` varchar(255) NOT NULL,
  `event_id` bigint(20) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `participation_fee` decimal(10,2) NOT NULL,
  `event_date` datetime NOT NULL,
  `participation_id` bigint(20) NOT NULL,
  `version` varchar(20) NOT NULL COMMENT 'version column helps us to determine the right timezone. The external system changed the timezone of the event date. Prior to version 1.0.17+60 it was Europe/Berlin. Afterwards it is UTC.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_bookings`
--

INSERT INTO `emp_bookings` (`id`, `employee_name`, `employee_mail`, `event_id`, `event_name`, `participation_fee`, `event_date`, `participation_id`, `version`) VALUES
(322, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', '0.00', '2019-09-04 08:00:00', 1, '1.0.17+42'),
(323, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 2, 'International PHP Conference', '1485.99', '2019-10-21 10:00:00', 2, '1.0.17+59'),
(324, 'Leandro Bußmann', 'leandro.bussmann@no-reply.rexx-systems.com', 2, 'International PHP Conference', '657.50', '2019-10-21 10:00:00', 3, '1.0.15+83'),
(325, 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', '0.00', '2019-09-04 06:00:00', 4, '1.0.17+65'),
(326, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', '0.00', '2019-09-04 06:00:00', 5, '1.0.17+65'),
(327, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 2, 'International PHP Conference', '657.50', '2019-10-21 08:00:00', 6, '1.1.3'),
(328, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 3, 'code.talks', '474.81', '2019-10-24 08:00:00', 7, '1.0.17+59'),
(329, 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-systems.com', 3, 'code.talks', '534.31', '2019-10-24 06:00:00', 8, '1.1.3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp_bookings`
--
ALTER TABLE `emp_bookings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp_bookings`
--
ALTER TABLE `emp_bookings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
