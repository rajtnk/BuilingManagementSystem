-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2018 at 05:57 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bms_buildings`
--

CREATE TABLE `bms_buildings` (
  `id` int(11) NOT NULL,
  `buildingid` varchar(250) NOT NULL,
  `serviceno` varchar(250) NOT NULL,
  `builing_group` varchar(250) NOT NULL,
  `building_name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `status` int(1) NOT NULL,
  `state_id` int(11) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bms_buildings`
--

INSERT INTO `bms_buildings` (`id`, `buildingid`, `serviceno`, `builing_group`, `building_name`, `description`, `status`, `state_id`, `added_date`, `modified_date`) VALUES
(1, '1-686111', '00707875217', 'Consumer', 'WMU', 'Testing Purpose', 1, 1, '2018-07-03 01:37:08', '0000-00-00 00:00:00'),
(4, '1-78334', '6767674', 'dgdfgdfgddddd', 'dfgfdgfdg', 'fgdfgfdgg', 1, 2, '2018-07-03 03:16:31', '0000-00-00 00:00:00'),
(6, '1-982342', '00865334', 'Consumer', 'SMD', 'Testing Purpose', 1, 2, '2018-07-03 03:51:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bms_states`
--

CREATE TABLE `bms_states` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `state_code` varchar(10) NOT NULL,
  `added_by` int(11) NOT NULL,
  `added_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bms_states`
--

INSERT INTO `bms_states` (`id`, `name`, `state_code`, `added_by`, `added_date`, `modified_by`, `modified_date`, `status`) VALUES
(1, 'Selangor', 'B', 1, '2015-05-02 14:19:14', 1, '2015-05-02 15:07:36', 1),
(2, 'Kuala Lumpur', 'W', 1, '2015-05-02 14:20:12', 0, '0000-00-00 00:00:00', 1),
(3, 'Malacca', 'Q', 1, '2015-05-02 14:21:43', 0, '0000-00-00 00:00:00', 1),
(4, 'Johor', 'J', 1, '2015-05-02 14:40:24', 0, '0000-00-00 00:00:00', 1),
(5, 'Negeri Sembilan', 'P', 1, '2015-05-02 14:40:43', 0, '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bms_buildings`
--
ALTER TABLE `bms_buildings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bms_states`
--
ALTER TABLE `bms_states`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bms_buildings`
--
ALTER TABLE `bms_buildings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bms_states`
--
ALTER TABLE `bms_states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
