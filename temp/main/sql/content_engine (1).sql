-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2020 at 07:59 PM
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
(4, 'dxv@dfd.d', '1225dd288590631fc1ad88ba920947876d69331dc93b5fbdaa4588d3d95ea5bcad8e38c98557a79bdbc924c2cdf0160787274a40aea4a2ef391340b27373848e', 'dxv@dfd.d', '88787878787', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 19:12:48 +0530'),
(5, 'perry@gmail.com', 'd38c499d1447445b44ea5ef175b247546568414b5b3380c328dfecf7add9a44eb225eef63eacb4d6c098baa47569d087c904f32f3bc3d96b4c4f9ab06c80cec2', 'perry', '9866776767', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 20:01:14 +0530'),
(6, 'perrya@gmail.com', 'edd6b689a4cc0963eb372ae52a7ea4d3e3b01fd5cc2283f5706710360aafbdd569f330825f586bc0449372d7f7d786f9d251c4c7a9e55e02f076262d70bcb42a', 'perry', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Thu, 21 May 2020 21:58:16 +0530'),
(7, 'ravi@gmail.com', 'e0d69a9d4f7f066168aac003cf4990fc37324bb557dd942b461fa37695c26cc2275f5bb7b7a9266f719cfb7c5089df67cd8ffa2d71f724d44e95d27fdc9e84f0', 'ravi', '9877887878', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Fri, 22 May 2020 20:11:43 +0530'),
(8, 'testclient@gmail.vom', '60853a2f9713df3bef4e5fe31ff5d5987b6a6cedbb3355f2d0e5bf0666d17dca56536a9e2f55021bb6bc633e55b6d73c15d45e87b6594214b90557d28682c722', 'testclient', '9887878787', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Fri, 22 May 2020 22:09:01 +0530');

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
  `id` int(11) NOT NULL,
  `no_request_accepted` int(200) NOT NULL,
  `no_request_completed` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designer`
--

INSERT INTO `designer` (`email`, `password`, `name`, `phone`, `from_ip`, `from_browser`, `time`, `id`, `no_request_accepted`, `no_request_completed`) VALUES
('ravi@gmail.com', '1462c545e143db5e9f4ce0e59f81e3d166ab790695d2065f3fea4eb2dedddcab5d80fe4cd427c9b3039cb358b9b112733cdb660f218708e862e97eda603116a6', 'ravi', '9877887878', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Fri, 22 May 2020 20:12:24 +0530', 4, 4, 4),
('test@gmail.com', '797c7f838b55f5bedc5b585de64e02f3669f6e821921bef0341b3b760fa8fc1f936edb58e1c37bc4f46bba58f85b96a196d61d398926f2e0c18cc784515d0eff', 'test', '9877878787', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Fri, 22 May 2020 22:08:22 +0530', 5, 1, 1);

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
  `time` varchar(200) NOT NULL,
  `designer_accept_email` varchar(200) NOT NULL,
  `designer_accept_name` varchar(200) NOT NULL,
  `designer_accept_id` varchar(200) NOT NULL,
  `designer_completed_name` varchar(200) NOT NULL,
  `designer_completed_email` varchar(200) NOT NULL,
  `designer_completed_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `name`, `email`, `phone`, `project_name`, `type_of_design`, `how_design_be_used`, `Main_tagline`, `Age_Group`, `Image_Size`, `Image_Format`, `Describe_your_project`, `Due_Date`, `credits_pay`, `link_to_any_inspiration`, `Your_Page_Url`, `message_convey`, `reference_files`, `inspiration_files`, `status`, `from_ip`, `from_browser`, `time`, `designer_accept_email`, `designer_accept_name`, `designer_accept_id`, `designer_completed_name`, `designer_completed_email`, `designer_completed_id`) VALUES
(35, 'ravi', 'ravi@gmail.com', 2147483647, 'design', '3D', 'design sdf', 'j', 'j', 'j', 'JPEG', 'j', '2020-05-06', '10', '', '', 'km', '5b4b8681-9a89-4331-b21d-3677768b5f7f.jpg++--007f87db-3fb3-491d-bb0d-b234866cedbb.jpg++--12aac98a-1d88-43da-849d-d12af561b9bd.jpg++--13a7778e-967b-4c05-b028-6c9cc68e115f.jpg', '', 'completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Fri, 22 May 2020 20:14:09 +0530', 'ravi@gmail.com', 'ravi', '4', 'ravi', 'ravi@gmail.com', '4'),
(36, 'ravi', 'ravi@gmail.com', 2147483647, 'zdc', 'T-shirt', 'nj', 'j', 'j', 'j', 'JPEG', 'j', '2020-05-08', '10', '', '', '', '', 'Crypto Infographic-Title.jpg', 'completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Fri, 22 May 2020 20:26:23 +0530', 'ravi@gmail.com', 'ravi', '4', 'ravi', 'ravi@gmail.com', '4'),
(37, 'ravi', 'ravi@gmail.com', 2147483647, 'hh', 'T-shirt', 'nj', 'n', 'n', 'n', 'JPEG', 'n', '2020-05-21', '10', '', '', '', '', '', 'completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Fri, 22 May 2020 20:28:12 +0530', 'ravi@gmail.com', 'ravi', '4', 'ravi', 'ravi@gmail.com', '4'),
(38, 'ravi', 'ravi@gmail.com', 2147483647, 'n', 'Brochure', 'n', 'n', 'n', 'n', 'JPEG', 'n', '2020-05-21', '10', '', '', '', '', '', 'completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Fri, 22 May 2020 20:30:01 +0530', 'ravi@gmail.com', 'ravi', '4', 'ravi', 'ravi@gmail.com', '4'),
(39, 'testclient', 'testclient@gmail.vom', 2147483647, 'fghfg', 'Sweatshirt & Hoodie', 'fghfg', 'fghfg', 'fghfg', 'fghfg', 'JPEG', 'fghfg', '2020-05-12', '10', '', '', 'sdf', 'mayank_anand1.jpg++--mehar_kaur_bhatia-1.jpg++--methods to buy crypto.jpg', 'how should crypto works.jpg++--images.png', 'completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Fri, 22 May 2020 22:11:24 +0530', 'test@gmail.com', 'test', '5', 'test', 'test@gmail.com', '5');

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
-- Indexes for table `designer_completed_requests`
--
ALTER TABLE `designer_completed_requests`
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
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `designer`
--
ALTER TABLE `designer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `designer_completed_requests`
--
ALTER TABLE `designer_completed_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
