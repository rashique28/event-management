-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2022 at 04:35 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event-management`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `event_title` varchar(30) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `recurrence_type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=Repeat, 1=Repeat on the',
  `repeats` enum('Every','Every Other','Every Third','Every Fourth') NOT NULL,
  `repeat_every` enum('Day','Week','Month','Year') NOT NULL,
  `repeat_occur` enum('First','Second','Third','Fourth') NOT NULL,
  `repeat_week` enum('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday') NOT NULL,
  `repeat_month` enum('Month','3 Months','4 Months','6 Months','Year') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `event_title`, `start_date`, `end_date`, `recurrence_type`, `repeats`, `repeat_every`, `repeat_occur`, `repeat_week`, `repeat_month`, `created`, `modified`) VALUES
(1, 'Conferencee Meeting', '2022-05-04', '2022-05-11', 1, 'Every Fourth', 'Day', 'Third', 'Wednesday', '3 Months', '2022-05-14 14:50:27', '2022-05-14 16:34:27'),
(3, 'Client Meeting', '2022-05-14', '2022-05-17', 0, 'Every', 'Day', 'Third', 'Wednesday', '6 Months', '2022-05-14 14:56:30', '2022-05-14 16:13:43'),
(4, 'IPL Cricket Match', '2022-03-26', '2022-05-21', 0, 'Every', 'Day', '', '', '', '2022-05-14 15:29:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
