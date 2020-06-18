-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2020 at 03:44 PM
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
-- Table structure for table `art_illusion_advert_requests`
--

CREATE TABLE `art_illusion_advert_requests` (
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
  `What_is_your_organization` varchar(200) NOT NULL,
  `Describe_what_your_organization_or_product_does_and_its_target` varchar(200) NOT NULL,
  `select_industry` varchar(200) NOT NULL,
  `communicate` varchar(200) NOT NULL,
  `Describe_what_you_want_designed` varchar(200) NOT NULL,
  `what_u_want_change` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL,
  `id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `art_illusion_advert_requests`
--

INSERT INTO `art_illusion_advert_requests` (`name`, `email`, `phone`, `project_name`, `type_of_design`, `how_design_can_be_used`, `design_package`, `How_did_you_hear_about_us`, `Image_Size`, `Image_Format`, `Due_Date`, `Is_your_company_a_digital_marketing_or_design_agency`, `how_often_you_need_design`, `How_many_employees_you_company_have`, `reference_files`, `inspiration_files`, `status`, `from_ip`, `from_browser`, `time`, `designer_accept_email`, `designer_accept_name`, `designer_accept_id`, `designer_completed_email`, `no_of_redo`, `redo_status`, `credits_pay`, `orderid`, `no_of_designs`, `What_is_your_organization`, `Describe_what_your_organization_or_product_does_and_its_target`, `select_industry`, `communicate`, `Describe_what_you_want_designed`, `what_u_want_change`, `table_name`, `id`) VALUES
('testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'j', '3D', 'j', '', 'Search engine (e.g. Google, Bing)', 'j', 'JPEG', '2020-06-11', 'Yes', 'Rarely', '1', '', '', 'Submitted', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Thu, 18 Jun 2020 19:06:52 +0530', '', '', '', '', 0, '', 449, 'ART1', 3, 'j', 'j', 'Accounting & Financial', 'j', 'j', '', 'art_illusion_advert_requests', 3);

-- --------------------------------------------------------

--
-- Table structure for table `business_advert_requests`
--

CREATE TABLE `business_advert_requests` (
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
  `Do_you_have_ideas_about_the_visual_style_you_want` varchar(200) NOT NULL,
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
  `What_is_your_organization` varchar(200) NOT NULL,
  `Who_is_the_target_audience_for_your_Product` varchar(200) NOT NULL,
  `Website_address` varchar(200) NOT NULL,
  `What_do_you_like_about_this_site` varchar(200) NOT NULL,
  `Is_there_anything_that_should_be_avoided` varchar(200) NOT NULL,
  `select_industry` varchar(200) NOT NULL,
  `communicate` varchar(200) NOT NULL,
  `What_kind_of_Product_do_you_want_designed` varchar(200) NOT NULL,
  `What_size_paper_will_your_Product_be_using` varchar(200) NOT NULL,
  `What_is_required_on_the_front_of_your_Product` varchar(200) NOT NULL,
  `What_is_required_in_the_body_of_your_Product` varchar(200) NOT NULL,
  `What_is_required_on_ the_back_cover_of_your_Product` varchar(200) NOT NULL,
  `Describe_what_you_want_designed` varchar(200) NOT NULL,
  `what_u_want_change` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL,
  `id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_advert_requests`
--

INSERT INTO `business_advert_requests` (`name`, `email`, `phone`, `project_name`, `type_of_design`, `how_design_can_be_used`, `design_package`, `How_did_you_hear_about_us`, `Image_Size`, `Image_Format`, `Do_you_have_ideas_about_the_visual_style_you_want`, `Due_Date`, `Is_your_company_a_digital_marketing_or_design_agency`, `how_often_you_need_design`, `How_many_employees_you_company_have`, `reference_files`, `inspiration_files`, `status`, `from_ip`, `from_browser`, `time`, `designer_accept_email`, `designer_accept_name`, `designer_accept_id`, `designer_completed_email`, `no_of_redo`, `redo_status`, `credits_pay`, `orderid`, `no_of_designs`, `What_is_your_organization`, `Who_is_the_target_audience_for_your_Product`, `Website_address`, `What_do_you_like_about_this_site`, `Is_there_anything_that_should_be_avoided`, `select_industry`, `communicate`, `What_kind_of_Product_do_you_want_designed`, `What_size_paper_will_your_Product_be_using`, `What_is_required_on_the_front_of_your_Product`, `What_is_required_in_the_body_of_your_Product`, `What_is_required_on_ the_back_cover_of_your_Product`, `Describe_what_you_want_designed`, `what_u_want_change`, `table_name`, `id`) VALUES
('testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'j', 'Brochure', 'j', '', 'Search engine (e.g. Google, Bing)', 'j', 'JPEG', 'j', '2020-06-23', 'Yes', 'Rarely', '1', '', '', 'Submitted', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Thu, 18 Jun 2020 19:05:47 +0530', '', '', '', '', 0, '', 299, 'BIZ1', 3, 'j', 'j', '', '', 'j', '', 'j', 'j', 'j', 'j', 'j', 'j', '', '', 'business_advert_requests', 1),
('testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'jk', 'Pamphlet', 'jk', '', 'Search engine (e.g. Google, Bing)', 'jk', 'JPEG', 'jk', '2020-07-03', 'Yes', 'Rarely', '1', '', '', 'Submitted', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Thu, 18 Jun 2020 19:06:17 +0530', '', '', '', '', 0, '', 299, 'BIZ2', 3, 'kj', 'kj', '', '', 'jk', '', 'jk', 'jk', 'jk', 'jk', 'kj', 'jk', '', '', 'business_advert_requests', 2);

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
  `time` varchar(200) NOT NULL,
  `Credits` int(200) NOT NULL,
  `freetier` int(11) NOT NULL,
  `freelancer` int(11) NOT NULL,
  `startups` int(11) NOT NULL,
  `sme` int(11) NOT NULL,
  `no_requests` int(200) NOT NULL,
  `no_completed_requests` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `email`, `password`, `name`, `phone`, `from_ip`, `from_browser`, `time`, `Credits`, `freetier`, `freelancer`, `startups`, `sme`, `no_requests`, `no_completed_requests`) VALUES
(1, 'keshav@gmail.com', '2c63d0af271e928172ffba41b6cd59a4ba39513fb8488bdf9bc658028ef0028309696b9d41d859612c4b67e184836572449b23a699b6a6ab59cca33544d77fc7', 'keshav', '9877887878', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 11 May 2020 22:29:55 +0530', 0, 0, 0, 0, 0, 0, 0),
(2, 'rahul@gmail.com', '3385a239ea10f2b7ffb15b144bb12e9489861ec0836affef54b54f5eb5d38f00a75e7b2ab66e2d8abc33ec30b4bd3328845dcdd6519c8a0d9cbd2716e249e25e', 'rahul@gmail.com', '9899899999', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Tue, 12 May 2020 11:42:56 +0530', 0, 0, 0, 0, 0, 0, 0),
(3, 'kullu@fmail.com', '845631f55f8742ae4158daf4e7d339f67d881651fbd6584c797574a0bfcfefc6dced21f931703ef554d80757b9626a13008b51eb63b9874cd3525b0c787fca2b', 'kullu@fmail.com', '98989898989', '::1', 'Mozilla/5.0 (Linux; Android 8.0; Pixel 2 Build/OPD3.170816.012) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Mobile Safari/537.36', 'Tue, 12 May 2020 11:43:49 +0530', 0, 0, 0, 0, 0, 0, 0),
(4, 'dxv@dfd.d', '1225dd288590631fc1ad88ba920947876d69331dc93b5fbdaa4588d3d95ea5bcad8e38c98557a79bdbc924c2cdf0160787274a40aea4a2ef391340b27373848e', 'dxv@dfd.d', '88787878787', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 19:12:48 +0530', 0, 0, 0, 0, 0, 0, 0),
(5, 'perry@gmail.com', 'd38c499d1447445b44ea5ef175b247546568414b5b3380c328dfecf7add9a44eb225eef63eacb4d6c098baa47569d087c904f32f3bc3d96b4c4f9ab06c80cec2', 'perry', '9866776767', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 18 May 2020 20:01:14 +0530', 0, 0, 0, 0, 0, 0, 0),
(6, 'perrya@gmail.com', 'edd6b689a4cc0963eb372ae52a7ea4d3e3b01fd5cc2283f5706710360aafbdd569f330825f586bc0449372d7f7d786f9d251c4c7a9e55e02f076262d70bcb42a', 'perry', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Thu, 21 May 2020 21:58:16 +0530', 0, 0, 0, 0, 0, 0, 0),
(7, 'ravi@gmail.com', 'e0d69a9d4f7f066168aac003cf4990fc37324bb557dd942b461fa37695c26cc2275f5bb7b7a9266f719cfb7c5089df67cd8ffa2d71f724d44e95d27fdc9e84f0', 'ravi', '9877887878', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Fri, 22 May 2020 20:11:43 +0530', 0, 0, 0, 0, 0, 0, 0),
(8, 'testclient@gmail.vom', '60853a2f9713df3bef4e5fe31ff5d5987b6a6cedbb3355f2d0e5bf0666d17dca56536a9e2f55021bb6bc633e55b6d73c15d45e87b6594214b90557d28682c722', 'testclient', '9887878787', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Fri, 22 May 2020 22:09:01 +0530', 0, 0, 0, 0, 0, 0, 0),
(9, 'testfinal@gmail.com', 'd731df070d3663ae0d65993eb0996a8c49c40fe2e6f83131fa6a21421ad5c73f7301f673cbafaf8c661780dd7e84218f828cf9e69726aed7a4741e2723cbf899', 'testfinal@gmail.com', '7676766676767', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Mon, 25 May 2020 16:42:46 +0530', 0, 0, 0, 0, 0, 0, 0),
(10, 'testfinalmob@gmail.com', '0b1541ff1c1d9569c68eded453ef32a4946bd2b720f506bf2759bf61748acd6c4e15f8702a837f30ad1ccd4f1358affd0d84701e07f377b9671429591038538b', 'testfinalmob', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Tue, 26 May 2020 19:56:19 +0530', 132185, 1, 5, 1, 1, 11, 4),
(11, 'last@gmail.com', 'b86ca1abd41a1d115e7ee34ce529eef4f64ff7ee2731ed8d6f3b12bdb6d813fbef4345122330f0f70367e6d67ec7feb9a2435893a981a877b254e64f17bd391f', 'last@gmail.com', '6565665656', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Thu, 18 Jun 2020 05:05:33 +0530', 200, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `clothing_requests`
--

CREATE TABLE `clothing_requests` (
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
  `communicate` varchar(200) NOT NULL,
  `what_u_want_change` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL,
  `id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clothing_requests`
--

INSERT INTO `clothing_requests` (`name`, `email`, `phone`, `project_name`, `type_of_design`, `how_design_can_be_used`, `design_package`, `How_did_you_hear_about_us`, `Image_Size`, `Image_Format`, `Describe_Visual_style_of_project`, `Due_Date`, `Is_your_company_a_digital_marketing_or_design_agency`, `how_often_you_need_design`, `How_many_employees_you_company_have`, `reference_files`, `inspiration_files`, `status`, `from_ip`, `from_browser`, `time`, `designer_accept_email`, `designer_accept_name`, `designer_accept_id`, `designer_completed_email`, `no_of_redo`, `redo_status`, `credits_pay`, `orderid`, `no_of_designs`, `Who_is_the_product_for`, `Do_you_have_any_specific_colors_in_mind`, `What_kind_of_product_do_you_want_designed`, `What_is_required_on_the_product`, `Is_there_anything_that_should_be_avoided`, `Describe_your_product_and_its_purpose`, `What_is_your_organization_name`, `select_industry`, `communicate`, `what_u_want_change`, `table_name`, `id`) VALUES
('testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'hjhj', 'T-shirt', 'hjhj', '', 'Search engine (e.g. Google, Bing)', 'hjjh', 'JPEG', 'hjhj', '2020-06-22', 'Yes', 'Rarely', '1', '', '', 'Submitted', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Thu, 18 Jun 2020 19:02:30 +0530', '', '', '', '', 0, '', 199, 'CLOTH1', 3, 'Men', 'hjhj', 'Standard short-sleeve Tshirt', 'b ', 'hjhj', '', '', '', '', '', 'clothing_requests', 1);

-- --------------------------------------------------------

--
-- Table structure for table `credits`
--

CREATE TABLE `credits` (
  `id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `from_ip` varchar(200) NOT NULL,
  `from_browser` varchar(200) NOT NULL,
  `date_now` varchar(200) NOT NULL,
  `credit_name` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `razorpay_payment_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credits`
--

INSERT INTO `credits` (`id`, `name`, `email`, `phone`, `from_ip`, `from_browser`, `date_now`, `credit_name`, `status`, `razorpay_payment_id`) VALUES
(26, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 14:54:50 +0530', 'Freelancer', 'Processing', ''),
(27, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 14:55:28 +0530', 'Freelancer', 'Processing', ''),
(28, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 14:55:32 +0530', 'Freelancer', 'Processing', ''),
(29, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 19:34:14 +0530', 'SME', 'paid', 'pay_F3iZMuRMZazvzo'),
(30, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 19:34:47 +0530', 'Startup', 'paid', 'pay_F3iZpjYG7zYH6n'),
(31, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Linux; Android 8.0.0; Pixel 2 XL Build/OPD1.170816.004) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Mobile Safari/537.36', 'Wed, 17 Jun 2020 23:16:54 +0530', 'Freelancer', 'paid', 'pay_F3mMZr4Jesc9e9');

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
  `no_of_redo` int(200) NOT NULL,
  `credits` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designer`
--

INSERT INTO `designer` (`email`, `password`, `name`, `phone`, `from_ip`, `from_browser`, `time`, `id`, `no_request_accepted`, `no_request_completed`, `no_of_redo`, `credits`) VALUES
('ravi@gmail.com', '1462c545e143db5e9f4ce0e59f81e3d166ab790695d2065f3fea4eb2dedddcab5d80fe4cd427c9b3039cb358b9b112733cdb660f218708e862e97eda603116a6', 'ravi', '9877887878', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Fri, 22 May 2020 20:12:24 +0530', 4, 4, 4, 0, 0),
('test@gmail.com', '797c7f838b55f5bedc5b585de64e02f3669f6e821921bef0341b3b760fa8fc1f936edb58e1c37bc4f46bba58f85b96a196d61d398926f2e0c18cc784515d0eff', 'test', '9877878787', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Fri, 22 May 2020 22:08:22 +0530', 5, 4, 3, 1, 0),
('testfinal@gmail.com', '8cf084d91a30a3e06af51c8e0409808a575e9e0362f2c9605c47030eceeec0c679de6016287148bb8398114ddaa8d818112ed33e7f654041b0b60828896536e6', 'testfinal@gmail.com', '9888778787', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Tue, 26 May 2020 19:26:11 +0530', 6, 2, 2, 3, 0),
('testfinalmob@gmail.com', '296cb6f152113bcf86c1234aec6a641a52e33674149b815b031af08addfe7034cb8c67eb0b12f26203782f6ccfb8bd814fbce4ce5ad946d5c38d97218938291d', 'testfinalmob', '9877887878', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Tue, 26 May 2020 19:55:43 +0530', 7, 12, 8, 6, 686),
('last@gmail.com', 'fc62a84fcec470bd9dff2eecf8fed19091529874ee482fdf55e34f8b1a0b630ba74e2b891afca7bbfb3711d775807a8f1e02d3cdbf9cf5b08407592e0dd130be', 'last@gmail.com', '4545544545', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Thu, 18 Jun 2020 05:06:19 +0530', 8, 0, 0, 0, 0);

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
  `request_id` varchar(200) NOT NULL,
  `employer_tablename` varchar(200) NOT NULL,
  `credits` int(22) NOT NULL,
  `client_table` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logo_identity_requests`
--

CREATE TABLE `logo_identity_requests` (
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
  `If_you_have_an_existing_website_please_list_it_here` varchar(200) NOT NULL,
  `what_u_want_change` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL,
  `id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logo_identity_requests`
--

INSERT INTO `logo_identity_requests` (`name`, `email`, `phone`, `project_name`, `type_of_design`, `how_design_can_be_used`, `design_package`, `How_did_you_hear_about_us`, `Image_Size`, `Image_Format`, `Describe_Visual_style_of_project`, `Due_Date`, `Is_your_company_a_digital_marketing_or_design_agency`, `how_often_you_need_design`, `How_many_employees_you_company_have`, `reference_files`, `inspiration_files`, `status`, `from_ip`, `from_browser`, `time`, `designer_accept_email`, `designer_accept_name`, `designer_accept_id`, `designer_completed_email`, `no_of_redo`, `redo_status`, `credits_pay`, `orderid`, `no_of_designs`, `What_name_do_you_want_in_your_product`, `Do_you_have_a_slogan_you_want_incorporated_in_your_product`, `Describe_what_your_organization_or_product_does_and_its_target`, `What_details_do_you_want_on_your_product`, `Is_there_anything_that_should_be_avoided`, `select_industry`, `communicate`, `If_you_have_an_existing_website_please_list_it_here`, `what_u_want_change`, `table_name`, `id`) VALUES
('testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'k', 'Business card', 'k', '', 'Search engine (e.g. Google, Bing)', 'k', 'JPEG', 'k', '2020-06-21', 'Yes', 'Rarely', '1', '', '', 'Submitted', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Thu, 18 Jun 2020 19:05:13 +0530', '', '', '', '', 0, '', 169, 'LOGO1', 3, 'k', '', 'k', 'k', 'k', 'Community & Non-Profit', '', 'k', '', 'logo_identity_requests', 1);

-- --------------------------------------------------------

--
-- Table structure for table `redo`
--

CREATE TABLE `redo` (
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` int(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `from_ip` varchar(200) NOT NULL,
  `from_browser` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `order_number` varchar(200) NOT NULL,
  `what_u_want_change` varchar(200) NOT NULL,
  `designer_email` varchar(200) NOT NULL,
  `id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `web_app_requests`
--

CREATE TABLE `web_app_requests` (
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
  `What_ideas_do_you_have_for_the_style/theme_of_your_product` varchar(200) NOT NULL,
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
  `What_is_your_organization_or_website_name` varchar(200) NOT NULL,
  `Briefly_describe_what_you_do_and_your_target_audience` varchar(200) NOT NULL,
  `Website_address` varchar(200) NOT NULL,
  `What_do_you_like_about_this_site` varchar(200) NOT NULL,
  `Is_there_anything_that_should_be_avoided` varchar(200) NOT NULL,
  `select_industry` varchar(200) NOT NULL,
  `communicate` varchar(200) NOT NULL,
  `If_you_have_an_existing_website_please_list_it_here` varchar(200) NOT NULL,
  `How_many_pages_do_you_need_designed_for_your_product` varchar(200) NOT NULL,
  `What_would_you_like_on_each_page` varchar(200) NOT NULL,
  `List_any_colors_themes_or_other_elements_include` varchar(200) NOT NULL,
  `device_type` varchar(200) NOT NULL,
  `app_name` varchar(200) NOT NULL,
  `what_u_want_change` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL,
  `id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_app_requests`
--

INSERT INTO `web_app_requests` (`name`, `email`, `phone`, `project_name`, `type_of_design`, `how_design_can_be_used`, `design_package`, `How_did_you_hear_about_us`, `Image_Size`, `Image_Format`, `What_ideas_do_you_have_for_the_style/theme_of_your_product`, `Due_Date`, `Is_your_company_a_digital_marketing_or_design_agency`, `how_often_you_need_design`, `How_many_employees_you_company_have`, `reference_files`, `inspiration_files`, `status`, `from_ip`, `from_browser`, `time`, `designer_accept_email`, `designer_accept_name`, `designer_accept_id`, `designer_completed_email`, `no_of_redo`, `redo_status`, `credits_pay`, `orderid`, `no_of_designs`, `What_is_your_organization_or_website_name`, `Briefly_describe_what_you_do_and_your_target_audience`, `Website_address`, `What_do_you_like_about_this_site`, `Is_there_anything_that_should_be_avoided`, `select_industry`, `communicate`, `If_you_have_an_existing_website_please_list_it_here`, `How_many_pages_do_you_need_designed_for_your_product`, `What_would_you_like_on_each_page`, `List_any_colors_themes_or_other_elements_include`, `device_type`, `app_name`, `what_u_want_change`, `table_name`, `id`) VALUES
('testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'j', 'Website Redesign', 'hjhj', '', 'Search engine (e.g. Google, Bing)', 'j', 'JPEG', 'jk', '2020-06-26', 'Yes', 'Rarely', '1', '', '', 'Submitted', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Thu, 18 Jun 2020 19:04:36 +0530', '', '', '', '', 0, '', 599, 'WEB1', 3, 'jk', 'kj', 'jk', 'jk', '', 'Accounting & Financial', 'kj', 'jk', 'onepage', 'jkjk', 'kj', '', '', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `art_illusion_advert_requests`
--
ALTER TABLE `art_illusion_advert_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_advert_requests`
--
ALTER TABLE `business_advert_requests`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `credits`
--
ALTER TABLE `credits`
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
-- Indexes for table `web_app_requests`
--
ALTER TABLE `web_app_requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `art_illusion_advert_requests`
--
ALTER TABLE `art_illusion_advert_requests`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `business_advert_requests`
--
ALTER TABLE `business_advert_requests`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `clothing_requests`
--
ALTER TABLE `clothing_requests`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `credits`
--
ALTER TABLE `credits`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `designer`
--
ALTER TABLE `designer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `designer_completed_requests`
--
ALTER TABLE `designer_completed_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `logo_identity_requests`
--
ALTER TABLE `logo_identity_requests`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `redo`
--
ALTER TABLE `redo`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `web_app_requests`
--
ALTER TABLE `web_app_requests`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
