-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 13, 2018 at 06:20 PM
-- Server version: 10.2.17-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id7118233_slack_todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` int(11) NOT NULL,
  `txt` text NOT NULL,
  `team_id` varchar(45) NOT NULL,
  `channel_id` varchar(45) NOT NULL,
  `user_id` varchar(45) NOT NULL,
  `status` enum('NEW','DONE') NOT NULL DEFAULT 'NEW'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `txt`, `team_id`, `channel_id`, `user_id`, `status`) VALUES
(1, 'Learn slack api integration', 'TCRJKL3CZ', 'CCT7JH9RD', 'UCREB2HME', 'DONE'),
(2, 'Decide technology stack to develop end points', 'TCRJKL3CZ', 'CCT7JH9RD', 'UCREB2HME', 'NEW'),
(3, 'Gather requirements', 'TCRJKL3CZ', 'CCT7JH9RD', 'UCREB2HME', 'NEW'),
(4, 'Database design for todoapp', 'TCRJKL3CZ', 'CCT7JH9RD', 'UCREB2HME', 'NEW'),
(5, 'Expose apis  - addtoo, listtodos, marktodo', 'TCRJKL3CZ', 'CCT7JH9RD', 'UCREB2HME', 'NEW'),
(6, 'Implementation of usecases', 'TCRJKL3CZ', 'CCT7JH9RD', 'UCREB2HME', 'NEW'),
(7, 'Code management over git', 'TCRJKL3CZ', 'CCT7JH9RD', 'UCREB2HME', 'NEW'),
(8, 'Host application', 'TCRJKL3CZ', 'CCT7JH9RD', 'UCREB2HME', 'NEW'),
(9, 'Integration with slack', 'TCRJKL3CZ', 'CCT7JH9RD', 'UCREB2HME', 'NEW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
