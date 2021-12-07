-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2021 at 12:24 AM
-- Server version: 5.1.73
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cen4010_fa21_g20`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tokens` int(255) NOT NULL,
  `security` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `tokens`, `security`) VALUES
(4, 'Truong', '827ccb0eea8a706c4c34a16891f84e7b', 'test12345@gmail.com', 0, 0),
(7, 'Luiza', '827ccb0eea8a706c4c34a16891f84e7b', 'Luiza@gmail.com', 0, 0),
(8, 'magmalamp', 'a06b75fbfef2a16d093e5fd5b28d80a7', 'sreardon2018@fau.edu', 0, 0),
(9, 'LuizaTest', '827ccb0eea8a706c4c34a16891f84e7b', 'LuizaTest@gmail.com', 0, 0),
(10, 'Demo', '827ccb0eea8a706c4c34a16891f84e7b', 'Demo@gmail.com', 0, 0),
(11, 'demo1', '827ccb0eea8a706c4c34a16891f84e7b', 'demo1@gmail.com', 0, 0),
(12, 'truong', '827ccb0eea8a706c4c34a16891f84e7b', 'truong4138@gmail.com', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
