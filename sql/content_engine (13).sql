-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 02:11 PM
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
(10, 'testfinalmob@gmail.com', '0b1541ff1c1d9569c68eded453ef32a4946bd2b720f506bf2759bf61748acd6c4e15f8702a837f30ad1ccd4f1358affd0d84701e07f377b9671429591038538b', 'testfinalmob', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Tue, 26 May 2020 19:56:19 +0530', 127183, 1, 5, 1, 1, 29, 4);

-- --------------------------------------------------------

--
-- Table structure for table `client_contact_us`
--

CREATE TABLE `client_contact_us` (
  `id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `from_ip` varchar(200) NOT NULL,
  `from_browser` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_contact_us`
--

INSERT INTO `client_contact_us` (`id`, `name`, `email`, `phone`, `message`, `from_ip`, `from_browser`, `time`) VALUES
(1, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Thu, 18 Jun 2020 22:50:29 +0530'),
(2, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Thu, 18 Jun 2020 22:51:08 +0530'),
(3, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', 'dfgbfg', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Thu, 18 Jun 2020 22:52:17 +0530'),
(4, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', 'cfhndf', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Thu, 18 Jun 2020 22:52:37 +0530'),
(5, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', 'cfb', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Thu, 18 Jun 2020 22:59:54 +0530');

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
('testfinalmob@gmail.com', '296cb6f152113bcf86c1234aec6a641a52e33674149b815b031af08addfe7034cb8c67eb0b12f26203782f6ccfb8bd814fbce4ce5ad946d5c38d97218938291d', 'testfinalmob', '9877887878', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Tue, 26 May 2020 19:55:43 +0530', 7, 12, 8, 6, 686);

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
-- Table structure for table `designer_contact_us`
--

CREATE TABLE `designer_contact_us` (
  `id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `from_ip` varchar(200) NOT NULL,
  `from_browser` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designer_contact_us`
--

INSERT INTO `designer_contact_us` (`id`, `name`, `email`, `phone`, `message`, `from_ip`, `from_browser`, `time`) VALUES
(1, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Thu, 18 Jun 2020 22:50:29 +0530'),
(2, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Thu, 18 Jun 2020 22:51:08 +0530'),
(3, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', 'dfgbfg', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Thu, 18 Jun 2020 22:52:17 +0530'),
(4, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', 'cfhndf', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Thu, 18 Jun 2020 22:52:37 +0530'),
(5, 'testfinalmob', 'testfinalmob@gmail.com', '9877887878', 'xfbdf', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Thu, 18 Jun 2020 23:00:22 +0530'),
(6, 'testfinalmob', 'testfinalmob@gmail.com', '9877887878', 'cvn', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Thu, 18 Jun 2020 23:01:01 +0530'),
(7, 'testfinalmob', 'testfinalmob@gmail.com', '9877887878', 'vv', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Thu, 18 Jun 2020 23:08:13 +0530');

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
-- Indexes for table `client_contact_us`
--
ALTER TABLE `client_contact_us`
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
-- Indexes for table `designer_contact_us`
--
ALTER TABLE `designer_contact_us`
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
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business_advert_requests`
--
ALTER TABLE `business_advert_requests`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `client_contact_us`
--
ALTER TABLE `client_contact_us`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clothing_requests`
--
ALTER TABLE `clothing_requests`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `designer_contact_us`
--
ALTER TABLE `designer_contact_us`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `logo_identity_requests`
--
ALTER TABLE `logo_identity_requests`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redo`
--
ALTER TABLE `redo`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `web_app_requests`
--
ALTER TABLE `web_app_requests`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
