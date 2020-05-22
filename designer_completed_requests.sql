-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2020 at 07:04 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `content_engine`
--

-- --------------------------------------------------------

--
-- Table structure for table `designer_completed_requests`
--

CREATE TABLE `designer_completed_requests` (
  `id` int(11) NOT NULL,
  `client_name` varchar(200) NOT NULL,
  `client_email` varchar(200) NOT NULL,
  `designer_name` varchar(200) NOT NULL,
  `client_phone` int(20) NOT NULL,
  `designer_phone` int(20) NOT NULL,
  `designer_message` varchar(400) NOT NULL,
  `designed_files` varchar(400) NOT NULL,
  `time` varchar(400) NOT NULL,
  `status` varchar(400) NOT NULL,
  `from_ip` varchar(400) NOT NULL,
  `from_browser` varchar(400) NOT NULL,
  `designer_email` varchar(200) NOT NULL,
  `request_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designer_completed_requests`
--

INSERT INTO `designer_completed_requests` (`id`, `client_name`, `client_email`, `designer_name`, `client_phone`, `designer_phone`, `designer_message`, `designed_files`, `time`, `status`, `from_ip`, `from_browser`, `designer_email`, `request_id`) VALUES
(16, 'ravi', 'ravi@gmail.com', 'ravi', 2147483647, 2147483647, 'thankyou', 'e25a1b00-e22f-4c28-a4af-1ecad81a77c9.jpg', 'Fri, 22 May 2020 20:18:34 +0530', 'completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'ravi@gmail.com', 35),
(17, 'ravi', 'ravi@gmail.com', 'ravi', 2147483647, 2147483647, 'mn', 'sushant_sondhi-1.jpg++--the beginning of crypto.jpg++--tik-tok-flat-icon-template-black-color-editable-vector-29632311.jpg', 'Fri, 22 May 2020 20:30:56 +0530', 'completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'ravi@gmail.com', 36),
(18, 'ravi', 'ravi@gmail.com', 'ravi', 2147483647, 2147483647, '', 'f8a37e43-e890-4f68-baad-509f3405dc96.jpg', 'Fri, 22 May 2020 20:33:36 +0530', 'completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'ravi@gmail.com', 38),
(19, 'ravi', 'ravi@gmail.com', 'ravi', 2147483647, 2147483647, '', 'should you invest in crypto.jpg', 'Fri, 22 May 2020 20:35:46 +0530', 'completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'ravi@gmail.com', 37),
(20, 'testclient', 'testclient@gmail.vom', 'test', 2147483647, 2147483647, 'df', 'tiktok-share-icon-black-1.jpg', 'Fri, 22 May 2020 22:21:20 +0530', 'completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'test@gmail.com', 39);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `designer_completed_requests`
--
ALTER TABLE `designer_completed_requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `designer_completed_requests`
--
ALTER TABLE `designer_completed_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
