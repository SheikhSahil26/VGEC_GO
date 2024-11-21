-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2024 at 07:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faculty_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty_default`
--

CREATE TABLE `faculty_default` (
  `name` text NOT NULL,
  `default_room` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_loc`
--

CREATE TABLE `faculty_loc` (
  `at_time_slot` tinyint(1) NOT NULL,
  `name` text NOT NULL,
  `day` text NOT NULL,
  `block` text DEFAULT NULL,
  `room_no` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_loc`
--

INSERT INTO `faculty_loc` (`at_time_slot`, `name`, `day`, `block`, `room_no`) VALUES
(1, 'J V Adeshara', 'MON', 'G', 106),
(2, 'R K Shah', 'MON', 'G', 106),
(3, 'J J Jadav', 'MON', 'G', 106),
(4, 'U G Chauhan', 'MON', 'J', 205),
(5, 'U G Chauhan', 'MON', 'D', 202),
(5, 'R K Shah', 'MON', 'D', 205),
(5, 'J J Jadav', 'MON', 'D', 100),
(5, 'J V Adeshara', 'MON', 'L', 101),
(6, 'R K Shah', 'MON', 'D', 204),
(1, 'J V Adeshara', 'TUE', 'G', 106),
(2, 'J V Adeshara', 'TUE', 'G', 106),
(3, 'R K Shah', 'TUE', 'J', 205),
(4, 'R K Shah', 'TUE', 'J', 205),
(5, 'J J Jadav', 'TUE', 'D', 100),
(5, 'U G Chauhan', 'TUE', 'D', 202),
(5, 'J J Jadav', 'TUE', 'D', 100),
(5, 'J V Adeshara', 'TUE', 'L', 101),
(6, 'R K Shah', 'TUE', 'D', 204),
(1, 'J V Adeshara', 'WED', 'G', 106),
(2, 'J V Adeshara', 'WED', 'G', 106),
(3, 'R K Shah', 'WED', 'J', 205),
(4, 'J J Jadav', 'WED', 'J', 205),
(5, 'J V Adeshara', 'WED', 'L', 101),
(5, 'R K Shah', 'WED', 'D', 205),
(5, 'U G Chauhan', 'WED', 'D', 202),
(6, 'R K Shah', 'WED', 'D', 205),
(1, 'J V Adeshara', 'THU', 'J', 205),
(2, 'J V Adeshara', 'THU', 'G', 106),
(3, 'R K Shah', 'THU', 'J', 205),
(4, 'U G Chauhan', 'THU', 'J', 205),
(5, 'R K Shah', 'THU', 'D', 205),
(5, 'J J Jadav', 'THU', 'D', 100),
(5, 'R K Shah', 'THU', 'D', 205),
(6, 'U G Chauhan', 'THU', 'D', 202),
(6, 'J V Adeshara', 'THU', 'L', 101),
(1, 'J J Jadav', 'FRI', 'G', 106),
(2, 'U G Chauhan', 'FRI', 'G', 106),
(3, 'R K Shah', 'FRI', 'J', 205),
(5, 'R K Shah', 'FRI', 'D', 103),
(5, 'J V Adeshara', 'FRI', 'L', 101),
(5, 'J V Adeshara', 'FRI', 'D', 203),
(6, 'R K Shah', 'FRI', 'D', 103),
(6, 'U G Chauhan', 'FRI', 'D', 202),
(1, 'J V Adeshara', 'SAT', 'D', 205),
(2, 'J V Adeshara', 'SAT', 'D', 205),
(3, 'J V Adeshara', 'SAT', 'D', 205),
(4, 'J V Adeshara', 'SAT', 'D', 205),
(5, 'J V Adeshara', 'SAT', 'D', 205),
(6, 'J V Adeshara', 'SAT', 'D', 205);

-- --------------------------------------------------------

--
-- Table structure for table `schemes`
--

CREATE TABLE `schemes` (
  `scheme_name` varchar(150) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schemes`
--

INSERT INTO `schemes` (`scheme_name`, `city_name`, `description`, `link`) VALUES
('ICMR', 'Kerala', 'My name is Jaidev.', 'https://example.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
