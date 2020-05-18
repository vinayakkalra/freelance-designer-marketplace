-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2020 at 04:18 PM
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
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(222) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `from_ip` varchar(200) NOT NULL,
  `from_browser` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `email`, `password`, `name`, `phone`, `from_ip`, `from_browser`, `time`) VALUES
(1, 'keshav@gmail.com', '2c63d0af271e928172ffba41b6cd59a4ba39513fb8488bdf9bc658028ef0028309696b9d41d859612c4b67e184836572449b23a699b6a6ab59cca33544d77fc7', 'keshav', '9877887878', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 11 May 2020 22:29:55 +0530'),
(2, 'rahul@gmail.com', '3385a239ea10f2b7ffb15b144bb12e9489861ec0836affef54b54f5eb5d38f00a75e7b2ab66e2d8abc33ec30b4bd3328845dcdd6519c8a0d9cbd2716e249e25e', 'rahul@gmail.com', '9899899999', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Tue, 12 May 2020 11:42:56 +0530'),
(3, 'kullu@fmail.com', '845631f55f8742ae4158daf4e7d339f67d881651fbd6584c797574a0bfcfefc6dced21f931703ef554d80757b9626a13008b51eb63b9874cd3525b0c787fca2b', 'kullu@fmail.com', '98989898989', '::1', 'Mozilla/5.0 (Linux; Android 8.0; Pixel 2 Build/OPD3.170816.012) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Mobile Safari/537.36', 'Tue, 12 May 2020 11:43:49 +0530'),
(4, 'dxv@dfd.d', '1225dd288590631fc1ad88ba920947876d69331dc93b5fbdaa4588d3d95ea5bcad8e38c98557a79bdbc924c2cdf0160787274a40aea4a2ef391340b27373848e', 'dxv@dfd.d', '88787878787', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 19:12:48 +0530');

-- --------------------------------------------------------

--
-- Table structure for table `designer`
--

CREATE TABLE `designer` (
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `from_ip` varchar(200) NOT NULL,
  `from_browser` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designer`
--

INSERT INTO `designer` (`email`, `password`, `name`, `phone`, `from_ip`, `from_browser`, `time`, `id`) VALUES
('fd@edd.d', '81e49ff71410d28c8637d02b11eee01e8f1157d1b283283f0dd86eeb83931a72084d62f98e3b6aaf3dfea8b0d292119830ca35fa997eeecfb35a1d584afcd080', 'fd', '988989', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Sun, 17 May 2020 15:20:12 +0530', 1),
('rajesg@ff.f', '90b7d02bf40ec57af1d91ea2283cfe42c07bed7048a47b4d231b738795d9dcd319bc2a6376bb4511081ccb9000fea487ad96af7cfa4a0e9682ff7162184220a0', 'rajesg', '988888888', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 19:12:25 +0530', 2);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(111) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` int(200) NOT NULL,
  `project_name` varchar(200) NOT NULL,
  `type_of_design` varchar(200) NOT NULL,
  `how_design_be_used` varchar(200) NOT NULL,
  `Main_tagline` varchar(200) NOT NULL,
  `Age_Group` varchar(200) NOT NULL,
  `Image_Size` varchar(200) NOT NULL,
  `Image_Format` varchar(200) NOT NULL,
  `Describe_your_project` varchar(200) NOT NULL,
  `Due_Date` varchar(200) NOT NULL,
  `credits_pay` varchar(200) NOT NULL,
  `link_to_any_inspiration` varchar(200) NOT NULL,
  `Your_Page_Url` varchar(200) NOT NULL,
  `message_convey` varchar(200) NOT NULL,
  `reference_files` varchar(200) NOT NULL,
  `inspiration_files` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `from_ip` varchar(200) NOT NULL,
  `from_browser` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `name`, `email`, `phone`, `project_name`, `type_of_design`, `how_design_be_used`, `Main_tagline`, `Age_Group`, `Image_Size`, `Image_Format`, `Describe_your_project`, `Due_Date`, `credits_pay`, `link_to_any_inspiration`, `Your_Page_Url`, `message_convey`, `reference_files`, `inspiration_files`, `status`, `from_ip`, `from_browser`, `time`) VALUES
(1, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'hb', 'kjn@dd.d', 656556, 'nn', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'dd', 'xxx@s.s', 98989, 'm', 'Brochure', 'bnnn', 'jjj', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'rere', 'rere@dd.d', 888, 'rere', 'T-shirt', 'rere', 'rere', 'rere', 'rere', 'JPEG', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'xcv', 'xcv@sdds.d', 88888, 'xcv', 'T-shirt', 'xcv', 'xcv', 'dffv', 'xcv', 'JPEG', 'xcv', '2020-05-08', '22', 'xcv', 'xcv', '', '', '', '', '', '', ''),
(6, 'wd', '', 0, '', 'T-shirt', '', '', '', '', 'JPEG', '', '', '', '', '', '', '', '', 'processing', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 00:06:51 +0530'),
(7, 'sfs', 'sfs@ded.d', 888, 'sfs', 'T-shirt', 'n', 'n', 'n', 'n', 'JPEG', 'nnn', '2020-05-24', '66', 'https://www.finstreet.in/', 'https://www.finstreet.in/top-3-crypto-news-about-btc-spam-coinbase-and-visa/', 'https://www.finstreet.in/top-3-crypto-news-about-btc-spam-coinbase-and-visa/', 'Hogwarts_dementor-1.jpg', 'Hogwarts_dementor-1.jpg,2images.jpg,6download (3).jpg,26dc297736a07b5cb2975e552303afd5.jpg,15711.jpg', 'processing', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 00:08:31 +0530'),
(8, '', '', 0, '', 'T-shirt', '', '', '', '', 'JPEG', '', '', '', '', '', '', 'download.png,Hogwarts_dementor-1.jpg,images (1).jfif,images (2).jfif,images (3).jfif,images (4).jfif,images (5).jfif', 'download.png,Hogwarts_dementor-1.jpg,images (1).jfif,images (2).jfif,images (3).jfif,images (4).jfif,images (5).jfif,572080.jpg', 'processing', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 00:09:37 +0530'),
(9, '', '', 0, '', 'T-shirt', '', '', '', '', 'JPEG', '', '', '', '', '', '', 'download.png++--Hogwarts_dementor-1.jpg++--images (1).jfif++--images (2).jfif++--images (3).jfif++--images (4).jfif', 'download.png++--Hogwarts_dementor-1.jpg++--images (1).jfif++--images (2).jfif++--images (3).jfif++--images (4).jfif++--images (1).jfif', 'processing', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 00:15:30 +0530'),
(10, '', '', 0, '', 'T-shirt', '', '', '', '', 'JPEG', '', '', '', '', '', '', 'Hogwarts_dementor-1.jpg', 'Hogwarts_dementor-1.jpg', 'processing', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 00:16:38 +0530'),
(11, 'percy', 'percy@dd.d', 4445, 'sdfsdf', 'T-shirt', 'percy', 'percy', '', 'percy', 'JPEG', 'percy', '2020-05-07', '77', 'percy', 'percy', 'percy', 'Hogwarts_dementor-1.jpg', 'Hogwarts_dementor-1.jpg', 'processing', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 00:19:00 +0530'),
(12, '', '', 0, '', 'T-shirt', '', '', '', '', 'JPEG', '', '', '', '', '', '', 'images (1).jfif', '', 'processing', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 00:20:41 +0530'),
(13, '', '', 0, '', 'T-shirt', '', '', '', '', 'JPEG', '', '', '', '', '', '', '', 'images (1).jfif', 'processing', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 00:21:06 +0530'),
(14, '', '', 0, '', 'T-shirt', '', '', '', '', 'JPEG', '', '', '', '', '', '', 'download.png++--Hogwarts_dementor-1.jpg++--images (1).jfif++--images (2).jfif', 'images (2).jfif++--images (3).jfif++--images (4).jfif', 'processing', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 00:21:24 +0530'),
(15, 'cvzcv', 'cszcv@dd.dd', 888, 'knn', 'T-shirt', 'h', 'h', 'h', 'h', 'JPEG', 'h', '2020-05-30', '22', '', '', '', '', '', 'processing', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 00:56:34 +0530'),
(16, 'wfds', 'nk@dd.d', 2147483647, 'nkm', 'Merchandise', 'm', 'm', 'm', 'mm', 'JPEG', 'm', '2020-05-23', '20', '', '', '', 'download.png++--Hogwarts_dementor-1.jpg++--images (1).jfif++--images (2).jfif', 'images (1).jfif', 'processing', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 00:59:16 +0530'),
(17, 'm', 'xc@ss.s', 45454, 'o', 'Other clothing or merchandise', 'o', 'o', 'o', 'o', 'JPEG', 'o', '2020-05-17', '20', '', '', '', '', '13a7778e-967b-4c05-b028-6c9cc68e115f.jpg++--15a16326-70a5-44db-a84f-3e7c58adcc02.jpg', 'processing', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 01:00:58 +0530'),
(18, 'xc', 'xc@dd.d', 343, 'n', 'Pamphlet', 'n', 'm', 'm', 'm', 'JPEG', 'm', '2020-05-14', '20', '', '', '', '546d8e33-0f35-41a3-a4fa-955594bbacb7.jpg++--821d250a-4b21-4fed-ba2e-6e6fdbea752b.jpg', '', 'processing', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 01:01:32 +0530'),
(19, 'xc', 'cx@dd.d', 77, 'bh', 'T-shirt', 'b', 'b', 'b', 'b', 'JPEG', 'b', '2020-05-15', '20', '', '', '', '', '', 'processing', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 01:02:01 +0530'),
(20, 'h', 'xc@s.s', 344, '434', 'T-shirt', 'xdv', 'xc', 'xc', 'fg', 'JPEG', 'd', '2020-05-09', '20', '', '', '', '546d8e33-0f35-41a3-a4fa-955594bbacb7.jpg', '13a7778e-967b-4c05-b028-6c9cc68e115f.jpg++--15a16326-70a5-44db-a84f-3e7c58adcc02.jpg', 'processing', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 01:02:39 +0530'),
(21, 'zxd', 'xc@xds.s', 4545, 'm', 'T-shirt', 'm', 'm', 'm', 'm', 'JPEG', 'm', '2020-05-21', '20', '', '', '', 'nikhil_patni-1.jpg++--palashdeep-1.jpg++--raghav_garg-1.jpg', '', 'processing', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 02:22:06 +0530'),
(22, 'fd', 'fd@edd.d', 988989, 'm', 'T-shirt', 'm', 'm', 'm', ' m', 'JPEG', 'df', '2020-05-08', '10', 'xc ', 'f', '', '', '', 'processing', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 18:36:08 +0530'),
(23, 'fd', 'fd@edd.d', 988989, 'm', 'T-shirt', 'm', 'm', 'm', ' m', 'JPEG', 'df', '2020-05-08', '10', 'xc ', 'f', '', '', '', 'processing', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 18:36:42 +0530'),
(24, 'fd', 'fd@edd.d', 988989, 'xc', 'T-shirt', 'c', 'm', 'k', 'k', 'JPEG', 'l', '2020-05-15', '10', 'k', 'k', 'k', '', '', 'processing', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 19:05:37 +0530'),
(25, 'fd', 'fd@edd.d', 988989, 'k', 'T-shirt', 'k', 'k', 'k', 'k', 'JPEG', 'k', '2020-05-17', '10', 'k', 'k', '', 'titok.png', '', 'processing', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 19:06:12 +0530'),
(26, 'kullu@fmail.com', 'kullu@fmail.com', 2147483647, 'xcv', 'T-shirt', 'xc', 'cv', 'c', 'k', 'JPEG', 'k', '2020-05-13', '10', 'k', 'k', '', '', '', 'processing', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 19:11:30 +0530'),
(27, 'dxv@dfd.d', 'dxv@dfd.d', 2147483647, 'c', 'T-shirt', 'xc', 'xc', 'xc', 'xc', 'JPEG', 'xc', '2020-05-17', '10', '', '', '', 'Untitled-3.jpg++--Untitled-4.jpg++--vinayaksirnumberre.PNG', 'Crypto Infographic-India.jpg++--Crypto Infographic-Market.jpg++--Crypto Infographic-Title.jpg', 'processing', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 19:33:33 +0530');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designer`
--
ALTER TABLE `designer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `designer`
--
ALTER TABLE `designer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
