-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 10:08 AM
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
(8, 'testclient@gmail.vom', '60853a2f9713df3bef4e5fe31ff5d5987b6a6cedbb3355f2d0e5bf0666d17dca56536a9e2f55021bb6bc633e55b6d73c15d45e87b6594214b90557d28682c722', 'testclient', '9887878787', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Fri, 22 May 2020 22:09:01 +0530'),
(9, 'testfinal@gmail.com', 'd731df070d3663ae0d65993eb0996a8c49c40fe2e6f83131fa6a21421ad5c73f7301f673cbafaf8c661780dd7e84218f828cf9e69726aed7a4741e2723cbf899', 'testfinal@gmail.com', '7676766676767', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 25 May 2020 16:42:46 +0530'),
(10, 'testfinalmob@gmail.com', '0b1541ff1c1d9569c68eded453ef32a4946bd2b720f506bf2759bf61748acd6c4e15f8702a837f30ad1ccd4f1358affd0d84701e07f377b9671429591038538b', 'testfinalmob', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Tue, 26 May 2020 19:56:19 +0530');

-- --------------------------------------------------------

--
-- Table structure for table `clothing_requests`
--

CREATE TABLE `clothing_requests` (
  `id` int(111) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` int(200) NOT NULL,
  `project_name` varchar(200) NOT NULL,
  `type_of_design` varchar(200) NOT NULL,
  `how_design_can_be_used` varchar(200) NOT NULL,
  `design_package` varchar(200) NOT NULL,
  `How_did_you_hear_about_us` varchar(200) NOT NULL,
  `Image_Size` varchar(200) NOT NULL,
  `Image_Format` varchar(200) NOT NULL,
  `Describe_Visual_style_of_project` varchar(200) NOT NULL,
  `Due_Date` varchar(200) NOT NULL,
  `Is_your_company_a_digital_marketing_or_design_agency` varchar(200) NOT NULL,
  `how_often_you_need_design` varchar(200) NOT NULL,
  `How_many_employees_you_company_have` varchar(200) NOT NULL,
  `reference_files` varchar(200) NOT NULL,
  `inspiration_files` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `from_ip` varchar(200) NOT NULL,
  `from_browser` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `designer_accept_email` varchar(200) NOT NULL,
  `designer_accept_name` varchar(200) NOT NULL,
  `designer_accept_id` varchar(200) NOT NULL,
  `designer_completed_email` varchar(200) NOT NULL,
  `no_of_redo` int(200) NOT NULL,
  `redo_status` varchar(200) NOT NULL,
  `credits_pay` int(200) NOT NULL,
  `orderid` varchar(200) NOT NULL,
  `no_of_designs` int(22) NOT NULL,
  `Who_is_the_product_for` varchar(200) NOT NULL,
  `Do_you_have_any_specific_colors_in_mind` varchar(200) NOT NULL,
  `What_kind_of_product_do_you_want_designed` varchar(200) NOT NULL,
  `What_is_required_on_the_product` varchar(200) NOT NULL,
  `Is_there_anything_that_should_be_avoided` varchar(200) NOT NULL,
  `Describe_your_product_and_its_purpose` varchar(200) NOT NULL,
  `What_is_your_organization_name` varchar(200) NOT NULL,
  `select_industry` varchar(200) NOT NULL,
  `communicate` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clothing_requests`
--

INSERT INTO `clothing_requests` (`id`, `name`, `email`, `phone`, `project_name`, `type_of_design`, `how_design_can_be_used`, `design_package`, `How_did_you_hear_about_us`, `Image_Size`, `Image_Format`, `Describe_Visual_style_of_project`, `Due_Date`, `Is_your_company_a_digital_marketing_or_design_agency`, `how_often_you_need_design`, `How_many_employees_you_company_have`, `reference_files`, `inspiration_files`, `status`, `from_ip`, `from_browser`, `time`, `designer_accept_email`, `designer_accept_name`, `designer_accept_id`, `designer_completed_email`, `no_of_redo`, `redo_status`, `credits_pay`, `orderid`, `no_of_designs`, `Who_is_the_product_for`, `Do_you_have_any_specific_colors_in_mind`, `What_kind_of_product_do_you_want_designed`, `What_is_required_on_the_product`, `Is_there_anything_that_should_be_avoided`, `Describe_your_product_and_its_purpose`, `What_is_your_organization_name`, `select_industry`, `communicate`) VALUES
(90, 'testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'mmmm', 'Merchandise', 'm', 'Bronze', 'Search engine (e.g. Google, Bing)', 'mm', 'JPEG', 'mk', '2020-06-18', 'Yes', 'Rarely', '1', '', '', 'Submitted', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Mon, 08 Jun 2020 09:51:11 +0530', '', '', '', '', 0, '', 20, 'CLOTH90', 3, '', '', '', '', '', ' l', 'm', 'Accounting & Financial', 'm'),
(91, 'testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'bj', 'T-shirt', 'hbbh', 'Platinum', 'Search engine (e.g. Google, Bing)', 'bj', 'JPEG', 'bhbh', '2020-06-10', 'Yes', 'Rarely', '1', '', '', 'Submitted', '::1', 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel 2 XL Build/OPD1.170816.004) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Mobile Safari/537.36', 'Tue, 09 Jun 2020 13:38:35 +0530', '', '', '', '', 0, '', 50, 'CLOTH91', 9, 'Men', 'bhhb', 'Tank top', 'hb', 'hb', '', '', '', '');

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
  `no_request_completed` int(200) NOT NULL,
  `no_of_redo` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designer`
--

INSERT INTO `designer` (`email`, `password`, `name`, `phone`, `from_ip`, `from_browser`, `time`, `id`, `no_request_accepted`, `no_request_completed`, `no_of_redo`) VALUES
('ravi@gmail.com', '1462c545e143db5e9f4ce0e59f81e3d166ab790695d2065f3fea4eb2dedddcab5d80fe4cd427c9b3039cb358b9b112733cdb660f218708e862e97eda603116a6', 'ravi', '9877887878', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Fri, 22 May 2020 20:12:24 +0530', 4, 4, 4, 0),
('test@gmail.com', '797c7f838b55f5bedc5b585de64e02f3669f6e821921bef0341b3b760fa8fc1f936edb58e1c37bc4f46bba58f85b96a196d61d398926f2e0c18cc784515d0eff', 'test', '9877878787', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Fri, 22 May 2020 22:08:22 +0530', 5, 3, 3, 1),
('testfinal@gmail.com', '8cf084d91a30a3e06af51c8e0409808a575e9e0362f2c9605c47030eceeec0c679de6016287148bb8398114ddaa8d818112ed33e7f654041b0b60828896536e6', 'testfinal@gmail.com', '9888778787', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Tue, 26 May 2020 19:26:11 +0530', 6, 2, 2, 3),
('testfinalmob@gmail.com', '296cb6f152113bcf86c1234aec6a641a52e33674149b815b031af08addfe7034cb8c67eb0b12f26203782f6ccfb8bd814fbce4ce5ad946d5c38d97218938291d', 'testfinalmob', '9877887878', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Tue, 26 May 2020 19:55:43 +0530', 7, 2, 1, 2);

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
  `request_id` int(200) NOT NULL,
  `employer_tablename` varchar(200) NOT NULL,
  `credits` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designer_completed_requests`
--

INSERT INTO `designer_completed_requests` (`id`, `client_name`, `client_email`, `designer_name`, `client_phone`, `designer_phone`, `designer_message`, `designed_files`, `time`, `status`, `from_ip`, `from_browser`, `designer_email`, `request_id`, `employer_tablename`, `credits`) VALUES
(24, 'testfinal@gmail.com', 'testfinal@gmail.com', 'testfinal@gmail.com', 2147483647, 2147483647, 'perrcy', '3147447c-1165-44db-a959-0a61d69a842f.jpg++--5065983d-4167-4887-9040-7986bef20987.jpg++--50699169-1d80-4086-8aa1-ec50e3a46098.jpg', 'Tue, 26 May 2020 19:46:20 +0530', 'Redo', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'testfinal@gmail.com', 58, 'designer', 0),
(25, 'testfinal@gmail.com', 'testfinal@gmail.com', 'testfinal@gmail.com', 2147483647, 2147483647, 'redo', 'Wazirx App.jpg', 'Tue, 26 May 2020 19:48:14 +0530', 'Redo', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'testfinal@gmail.com', 58, 'designer', 0),
(26, 'testfinal@gmail.com', 'testfinal@gmail.com', 'testfinal@gmail.com', 2147483647, 2147483647, 'shas', 'wazirchangecfa1.jpg', 'Tue, 26 May 2020 19:50:50 +0530', 'Redo', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'testfinal@gmail.com', 59, 'designer', 0),
(27, 'testfinal@gmail.com', 'testfinal@gmail.com', 'testfinal@gmail.com', 2147483647, 2147483647, 'shas', 'different wallets.jpg', 'Tue, 26 May 2020 19:52:14 +0530', 'Completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'testfinal@gmail.com', 59, 'designer', 0),
(28, 'testfinal@gmail.com', 'testfinal@gmail.com', 'testfinal@gmail.com', 2147483647, 2147483647, 'shas', 'sharane.PNG', 'Tue, 26 May 2020 19:54:14 +0530', 'Completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'testfinal@gmail.com', 58, 'designer', 0),
(29, 'testfinalmob', 'testfinalmob@gmail.com', 'testfinalmob', 2147483647, 2147483647, 'xc ', 'e77e893b-6650-4986-b57a-16e51a750c11.jpg', 'Tue, 26 May 2020 20:00:48 +0530', 'Redo', '::1', 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel 2 XL Build/OPD1.170816.004) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Mobile Safari/537.36', 'testfinalmob@gmail.com', 60, 'designer', 0),
(30, 'testfinalmob', 'testfinalmob@gmail.com', 'testfinalmob', 2147483647, 2147483647, 'j', 'Capture.PNG', 'Tue, 26 May 2020 20:02:28 +0530', 'Completed', '::1', 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel 2 XL Build/OPD1.170816.004) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Mobile Safari/537.36', 'testfinalmob@gmail.com', 60, 'designer', 0),
(31, 'testfinalmob', 'testfinalmob@gmail.com', 'testfinalmob', 2147483647, 2147483647, '', 'bhafinali 1.jpg', 'Tue, 26 May 2020 21:13:59 +0530', 'Redo', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'testfinalmob@gmail.com', 61, 'designer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `logo_identity_requests`
--

CREATE TABLE `logo_identity_requests` (
  `id` int(111) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` int(200) NOT NULL,
  `project_name` varchar(200) NOT NULL,
  `type_of_design` varchar(200) NOT NULL,
  `how_design_can_be_used` varchar(200) NOT NULL,
  `design_package` varchar(200) NOT NULL,
  `How_did_you_hear_about_us` varchar(200) NOT NULL,
  `Image_Size` varchar(200) NOT NULL,
  `Image_Format` varchar(200) NOT NULL,
  `Describe_Visual_style_of_project` varchar(200) NOT NULL,
  `Due_Date` varchar(200) NOT NULL,
  `Is_your_company_a_digital_marketing_or_design_agency` varchar(200) NOT NULL,
  `how_often_you_need_design` varchar(200) NOT NULL,
  `How_many_employees_you_company_have` varchar(200) NOT NULL,
  `reference_files` varchar(200) NOT NULL,
  `inspiration_files` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `from_ip` varchar(200) NOT NULL,
  `from_browser` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `designer_accept_email` varchar(200) NOT NULL,
  `designer_accept_name` varchar(200) NOT NULL,
  `designer_accept_id` varchar(200) NOT NULL,
  `designer_completed_email` varchar(200) NOT NULL,
  `no_of_redo` int(200) NOT NULL,
  `redo_status` varchar(200) NOT NULL,
  `credits_pay` int(200) NOT NULL,
  `orderid` varchar(200) NOT NULL,
  `no_of_designs` int(22) NOT NULL,
  `What_name_do_you_want_in_your_product` varchar(200) NOT NULL,
  `Do_you_have_a_slogan_you_want_incorporated_in_your_product` varchar(200) NOT NULL,
  `Describe_what_your_organization_or_product_does_and_its_target` varchar(200) NOT NULL,
  `What_details_do_you_want_on_your_product` varchar(200) NOT NULL,
  `Is_there_anything_that_should_be_avoided` varchar(200) NOT NULL,
  `select_industry` varchar(200) NOT NULL,
  `communicate` varchar(200) NOT NULL,
  `If_you_have_an_existing_website_please_list_it_here` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logo_identity_requests`
--

INSERT INTO `logo_identity_requests` (`id`, `name`, `email`, `phone`, `project_name`, `type_of_design`, `how_design_can_be_used`, `design_package`, `How_did_you_hear_about_us`, `Image_Size`, `Image_Format`, `Describe_Visual_style_of_project`, `Due_Date`, `Is_your_company_a_digital_marketing_or_design_agency`, `how_often_you_need_design`, `How_many_employees_you_company_have`, `reference_files`, `inspiration_files`, `status`, `from_ip`, `from_browser`, `time`, `designer_accept_email`, `designer_accept_name`, `designer_accept_id`, `designer_completed_email`, `no_of_redo`, `redo_status`, `credits_pay`, `orderid`, `no_of_designs`, `What_name_do_you_want_in_your_product`, `Do_you_have_a_slogan_you_want_incorporated_in_your_product`, `Describe_what_your_organization_or_product_does_and_its_target`, `What_details_do_you_want_on_your_product`, `Is_there_anything_that_should_be_avoided`, `select_industry`, `communicate`, `If_you_have_an_existing_website_please_list_it_here`) VALUES
(90, 'testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'mmmm', 'Merchandise', 'm', 'Bronze', 'Search engine (e.g. Google, Bing)', 'mm', 'JPEG', 'mk', '2020-06-18', 'Yes', 'Rarely', '1', '', '', 'Submitted', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Mon, 08 Jun 2020 09:51:11 +0530', '', '', '', '', 0, '', 20, 'CLOTH90', 3, '', '', '', '', '', 'Accounting & Financial', 'm', ''),
(91, 'testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'nn', 'Logo design', 'nn', 'Bronze', 'Search engine (e.g. Google, Bing)', 'nn', 'JPEG', '', '2020-06-25', 'Yes', 'Rarely', '1', '', '', 'Submitted', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Tue, 09 Jun 2020 12:43:04 +0530', '', '', '', '', 0, '', 20, 'CLOTH91', 3, 'nn', 'nn', 'nn', '', '', 'Construction', 'n', ''),
(92, 'testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'k', 'Stationery', 'n  n', 'Bronze', 'Search engine (e.g. Google, Bing)', 'j', 'JPEG', 'jj', '2020-06-17', 'Yes', 'Rarely', '1', '', '', 'Submitted', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Tue, 09 Jun 2020 13:08:40 +0530', '', '', '', '', 0, '', 20, 'CLOTH92', 3, 'jj', '', 'jj', 'jj', 'jj', 'Accounting & Financial', '', 'jj'),
(93, 'testfinalmob', 'testfinalmob@gmail.com', 2147483647, ',l', 'Business card', 'nj', 'Bronze', 'Search engine (e.g. Google, Bing)', ',l', 'JPEG', 'jn', '2020-06-04', 'Yes', 'Rarely', '1', '92240805_220402115847612_1649414767134444675_n_49b84606c02ce876f069793f54331ffa.jpg++--92457029_869086613613653_5073888457209025592_n_31c85a146d61103edd412b362c752c06.jpg++--92457029_869086613613653_5', '88202210_644086999685741_160523837767310271_n_5752e3919b89a6b05c7507e4f488b8cc.jpg++--89084026_200217464417838_1877585520417749538_n_6ef1e03afad28937414926ed23462a34.jpg++--90180717_283740269275714_90', 'Submitted', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Tue, 09 Jun 2020 13:09:20 +0530', '', '', '', '', 0, '', 20, 'CLOTH93', 3, 'jnjn', '', 'nj', 'jnnj', 'jnnj', 'Accounting & Financial', '', 'jn'),
(94, 'testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'jn', 'Logo design', 'njnj', 'Platinum', 'Search engine (e.g. Google, Bing)', 'jnnj', 'JPEG', '', '2020-06-17', 'Yes', 'Rarely', '1', '', '', 'Submitted', '::1', 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel 2 XL Build/OPD1.170816.004) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Mobile Safari/537.36', 'Tue, 09 Jun 2020 13:34:17 +0530', '', '', '', '', 0, '', 50, 'CLOTH94', 9, 'jnjnj', 'njnj', 'nj', '', '', 'Accounting & Financial', 'jnnj', ''),
(95, 'testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'nj', 'Business card', 'nj', 'Bronze', 'Search engine (e.g. Google, Bing)', 'njjn', 'PNG', 'jn', '2020-06-20', 'Yes', 'Rarely', '1', '', '', 'Submitted', '::1', 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel 2 XL Build/OPD1.170816.004) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Mobile Safari/537.36', 'Tue, 09 Jun 2020 13:34:57 +0530', '', '', '', '', 0, '', 20, 'CLOTH95', 3, 'jn', '', 'nj', 'jn', 'nj', 'Accounting & Financial', '', 'jn');

-- --------------------------------------------------------

--
-- Table structure for table `redo`
--

CREATE TABLE `redo` (
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
  `designer_completed_id` varchar(200) NOT NULL,
  `order_number` int(200) NOT NULL,
  `credits_pay` int(200) NOT NULL,
  `what_u_want_change` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `redo`
--

INSERT INTO `redo` (`id`, `name`, `email`, `phone`, `project_name`, `type_of_design`, `how_design_be_used`, `Main_tagline`, `Age_Group`, `Image_Size`, `Image_Format`, `Describe_your_project`, `Due_Date`, `link_to_any_inspiration`, `Your_Page_Url`, `message_convey`, `reference_files`, `inspiration_files`, `status`, `from_ip`, `from_browser`, `time`, `designer_accept_email`, `designer_accept_name`, `designer_accept_id`, `designer_completed_name`, `designer_completed_email`, `designer_completed_id`, `order_number`, `credits_pay`, `what_u_want_change`) VALUES
(62, 'testfinal@gmail.com', 'testfinal@gmail.com', 2147483647, 'redo', 'T-shirt', 'redo', 'redo', 'redo', 'redo', 'JPEG', 'redo 1st', '2020-05-13', '', '', 'redo', '', '', 'Redo', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Tue, 26 May 2020 19:47:27 +0530', '', '', '', '', '', '', 58, 10, 'redo 1st'),
(63, 'testfinal@gmail.com', 'testfinal@gmail.com', 2147483647, 'redo 2nd', 'T-shirt', 'redo 2nd', 'redo 2nd', 'redo 2nd', 'redo 2nd', 'JPEG', 'redo 2nd', '2020-05-14', '', '', '', '', '', 'Redo', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Tue, 26 May 2020 19:48:53 +0530', '', '', '', '', '', '', 58, 10, 'redo 2nd'),
(64, 'testfinal@gmail.com', 'testfinal@gmail.com', 2147483647, 'shas', 'Logo design', 'shas', 'shas', 'shas', 'shas', 'JPEG', 'shas', '2020-04-17', '', '', '', '', '', 'Redo', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Tue, 26 May 2020 19:51:44 +0530', '', '', '', '', '', '', 59, 10, 'shas'),
(65, 'testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'm', 'T-shirt', 'm', 'mm', 'mm', 'mm', 'JPEG', 'm', '1000-01-01', '', '', '', '', '', 'Redo', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 12_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/12.0 Mobile/15A372 Safari/604.1', 'Tue, 26 May 2020 20:02:06 +0530', '', '', '', '', '', '', 60, 10, 'n'),
(66, 'testfinalmob', 'testfinalmob@gmail.com', 2147483647, ' vm', 'T-shirt', ' vm', ' vm', ' vm', ' vm', 'JPEG', ' vm', '2020-05-09', '', '', '', '', '', 'Redo', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Tue, 26 May 2020 21:14:39 +0530', '', '', '', '', '', '', 61, 10, ' vm');

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
  `designer_completed_email` varchar(200) NOT NULL,
  `no_of_redo` int(200) NOT NULL,
  `redo_status` varchar(200) NOT NULL,
  `credits_pay` int(200) NOT NULL,
  `orderid` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `name`, `email`, `phone`, `project_name`, `type_of_design`, `how_design_be_used`, `Main_tagline`, `Age_Group`, `Image_Size`, `Image_Format`, `Describe_your_project`, `Due_Date`, `link_to_any_inspiration`, `Your_Page_Url`, `message_convey`, `reference_files`, `inspiration_files`, `status`, `from_ip`, `from_browser`, `time`, `designer_accept_email`, `designer_accept_name`, `designer_accept_id`, `designer_completed_email`, `no_of_redo`, `redo_status`, `credits_pay`, `orderid`) VALUES
(0, 'testfinalmob', 'testfinalmob@gmail.com', 2147483647, ' vm', 'Brochure', ' vm', ' vm', ' vm', ' vm', 'JPEG', ' vm', '2020-05-15', '', '', ' vm', '', '', 'Redo', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Tue, 26 May 2020 21:13:44 +0530', 'testfinalmob@gmail.com', 'testfinalmob', '7', '', 1, 'Redo', 10, ''),
(58, 'testfinal@gmail.com', 'testfinal@gmail.com', 2147483647, 'perrcy', 'Logo design', 'perrcy', 'perrcy', 'perrcy', 'perrcy', 'JPEG', 'perrcy', '2020-05-14', '', '', 'perrcy', '821d250a-4b21-4fed-ba2e-6e6fdbea752b.jpg++--3783a81f-745b-43c1-a639-94a3ad03af40.jpg++--5516ddbf-f2cd-40a6-aced-d0410f1f7680.jpg++--16395e83-9fab-4a5f-8824-180898ac9cc4.jpg', '', 'Completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Tue, 26 May 2020 19:45:48 +0530', 'testfinal@gmail.com', 'testfinal@gmail.com', '6', 'testfinal@gmail.com', 2, 'Redo', 10, ''),
(59, 'testfinal@gmail.com', 'testfinal@gmail.com', 2147483647, 'shas', 'T-shirt', 'shas', 'shas', 'shas', 'shas', 'JPEG', 'shas', '2020-05-01', '', '', 'shas', '', 'Crypto Infographic-Different.jpg', 'Completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Tue, 26 May 2020 19:50:18 +0530', 'testfinal@gmail.com', 'testfinal@gmail.com', '6', 'testfinal@gmail.com', 1, 'Redo', 10, ''),
(60, 'testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'h', 'T-shirt', 'h', 'h', 'h', 'h', 'JPEG', 'h', '0199-05-09', '', '', 'u', 'Untitled-4.jpg', '', 'Completed', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 12_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/12.0 Mobile/15A372 Safari/604.1', 'Tue, 26 May 2020 19:57:49 +0530', 'testfinalmob@gmail.com', 'testfinalmob', '7', 'testfinalmob@gmail.com', 1, 'Redo', 10, ''),
(62, 'testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'hb', 'T-shirt', 'h', 'j', 'j', 'j', 'JPEG', 'j', '2020-06-23', '', 'j', 'j', '', '', 'Submitted', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Wed, 03 Jun 2020 04:50:19 +0530', '', '', '', '', 0, '', 10, 'OPC61'),
(63, 'testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'j', 'T-shirt', 'j', 'j', 'j', 'j', 'JPEG', 'j', '2020-06-18', 'j', 'j', 'j', '', '', 'Submitted', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Wed, 03 Jun 2020 04:51:38 +0530', '', '', '', '', 0, '', 10, 'OPC63');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clothing_requests`
--
ALTER TABLE `clothing_requests`
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
-- Indexes for table `logo_identity_requests`
--
ALTER TABLE `logo_identity_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redo`
--
ALTER TABLE `redo`
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
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `clothing_requests`
--
ALTER TABLE `clothing_requests`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `designer`
--
ALTER TABLE `designer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `designer_completed_requests`
--
ALTER TABLE `designer_completed_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `logo_identity_requests`
--
ALTER TABLE `logo_identity_requests`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `redo`
--
ALTER TABLE `redo`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
