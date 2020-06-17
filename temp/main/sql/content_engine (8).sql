-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2020 at 01:40 AM
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
  `table_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `art_illusion_advert_requests`
--

INSERT INTO `art_illusion_advert_requests` (`id`, `name`, `email`, `phone`, `project_name`, `type_of_design`, `how_design_can_be_used`, `design_package`, `How_did_you_hear_about_us`, `Image_Size`, `Image_Format`, `Due_Date`, `Is_your_company_a_digital_marketing_or_design_agency`, `how_often_you_need_design`, `How_many_employees_you_company_have`, `reference_files`, `inspiration_files`, `status`, `from_ip`, `from_browser`, `time`, `designer_accept_email`, `designer_accept_name`, `designer_accept_id`, `designer_completed_email`, `no_of_redo`, `redo_status`, `credits_pay`, `orderid`, `no_of_designs`, `What_is_your_organization`, `Describe_what_your_organization_or_product_does_and_its_target`, `select_industry`, `communicate`, `Describe_what_you_want_designed`, `what_u_want_change`, `table_name`) VALUES
(119, 'testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'vh', '3D', 'vh', '', 'Search engine (e.g. Google, Bing)', 'hv', 'JPEG', '2020-06-03', 'Yes', 'Rarely', '1', '', '', 'Redo', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Mon, 15 Jun 2020 12:35:15 +0530', 'testfinalmob@gmail.com', 'testfinalmob', '7', '', 1, 'Redo', 449, 'ART1', 3, 'vhj', 'hv', 'Accounting & Financial', 'vh', 'hv', 'FDHGDFHNFGDF', 'art_illusion_advert_requests'),
(120, 'testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'VCJXNV', 'Illustration or graphics', 'VCJXNV', '', 'Search engine (e.g. Google, Bing)', 'VCJXNV', 'PNG', '0005-04-05', 'Yes', 'Rarely', '1', '', '', 'Redo', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 12_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/12.0 Mobile/15A372 Safari/604.1', 'Mon, 15 Jun 2020 16:52:06 +0530', 'testfinalmob@gmail.com', 'testfinalmob', '7', '', 1, 'Redo', 299, 'ART120', 3, 'VCJXNV', 'VCJXNV', 'Accounting & Financial', '', 'VCJXNV', 'j,hb,jh', 'art_illusion_advert_requests');

-- --------------------------------------------------------

--
-- Table structure for table `business_advert_requests`
--

CREATE TABLE `business_advert_requests` (
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
  `table_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_advert_requests`
--

INSERT INTO `business_advert_requests` (`id`, `name`, `email`, `phone`, `project_name`, `type_of_design`, `how_design_can_be_used`, `design_package`, `How_did_you_hear_about_us`, `Image_Size`, `Image_Format`, `Do_you_have_ideas_about_the_visual_style_you_want`, `Due_Date`, `Is_your_company_a_digital_marketing_or_design_agency`, `how_often_you_need_design`, `How_many_employees_you_company_have`, `reference_files`, `inspiration_files`, `status`, `from_ip`, `from_browser`, `time`, `designer_accept_email`, `designer_accept_name`, `designer_accept_id`, `designer_completed_email`, `no_of_redo`, `redo_status`, `credits_pay`, `orderid`, `no_of_designs`, `What_is_your_organization`, `Who_is_the_target_audience_for_your_Product`, `Website_address`, `What_do_you_like_about_this_site`, `Is_there_anything_that_should_be_avoided`, `select_industry`, `communicate`, `What_kind_of_Product_do_you_want_designed`, `What_size_paper_will_your_Product_be_using`, `What_is_required_on_the_front_of_your_Product`, `What_is_required_in_the_body_of_your_Product`, `What_is_required_on_ the_back_cover_of_your_Product`, `Describe_what_you_want_designed`, `what_u_want_change`, `table_name`) VALUES
(116, 'testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'jhh', 'Brochure', 'ghgh', '', 'Search engine (e.g. Google, Bing)', 'hh', 'JPEG', 'hnh', '2020-06-21', 'Yes', 'Rarely', '1', '', '', 'Completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Thu, 18 Jun 2020 01:49:25 +0530', 'testfinalmob@gmail.com', 'testfinalmob', '7', 'testfinalmob@gmail.com', 0, '', 299, 'BIZ1', 3, 'hggh', 'ghgh', '', '', 'hjjh', '', 'jhjh', 'hjhj', 'hhj', 'jhhj', 'jhhj', 'jhjh', '', '', 'business_advert_requests');

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
(10, 'testfinalmob@gmail.com', '0b1541ff1c1d9569c68eded453ef32a4946bd2b720f506bf2759bf61748acd6c4e15f8702a837f30ad1ccd4f1358affd0d84701e07f377b9671429591038538b', 'testfinalmob', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Tue, 26 May 2020 19:56:19 +0530', 701, 1, 5, 1, 1, 3, 3),
(11, 'last@gmail.com', 'b86ca1abd41a1d115e7ee34ce529eef4f64ff7ee2731ed8d6f3b12bdb6d813fbef4345122330f0f70367e6d67ec7feb9a2435893a981a877b254e64f17bd391f', 'last@gmail.com', '6565665656', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Thu, 18 Jun 2020 05:05:33 +0530', 200, 0, 0, 0, 0, 0, 0);

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
  `communicate` varchar(200) NOT NULL,
  `what_u_want_change` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clothing_requests`
--

INSERT INTO `clothing_requests` (`id`, `name`, `email`, `phone`, `project_name`, `type_of_design`, `how_design_can_be_used`, `design_package`, `How_did_you_hear_about_us`, `Image_Size`, `Image_Format`, `Describe_Visual_style_of_project`, `Due_Date`, `Is_your_company_a_digital_marketing_or_design_agency`, `how_often_you_need_design`, `How_many_employees_you_company_have`, `reference_files`, `inspiration_files`, `status`, `from_ip`, `from_browser`, `time`, `designer_accept_email`, `designer_accept_name`, `designer_accept_id`, `designer_completed_email`, `no_of_redo`, `redo_status`, `credits_pay`, `orderid`, `no_of_designs`, `Who_is_the_product_for`, `Do_you_have_any_specific_colors_in_mind`, `What_kind_of_product_do_you_want_designed`, `What_is_required_on_the_product`, `Is_there_anything_that_should_be_avoided`, `Describe_your_product_and_its_purpose`, `What_is_your_organization_name`, `select_industry`, `communicate`, `what_u_want_change`, `table_name`) VALUES
(104, 'testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'T-shirt', 'T-shirt', 'How will your design be used? ', '', 'I\'ve used 99designs before', '540px', 'JPEG', 'Do you have ideas about the visual style you want? :', '2020-06-24', 'Yes', 'Rarely', '1', '5516ddbf-f2cd-40a6-aced-d0410f1f7680.jpg++--16395e83-9fab-4a5f-8824-180898ac9cc4.jpg', '', 'Completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Mon, 15 Jun 2020 11:43:08 +0530', 'testfinalmob@gmail.com', 'testfinalmob', '7', 'testfinalmob@gmail.com', 0, '', 200, 'CLOTH1', 3, 'Men', 'Do you have any specific colors in mind? ', 'Standard short-sleeve Tshirt', 'What is required on the t-shirt? : ', ' there anything that should be avoided', '', '', '', '', '', 'clothing_requests'),
(105, 'testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'SDGFXD', 'Jersey', 'ow will your design be used?', '', 'Facebook', 'CFBG', 'JPEG', 'Do you have ideas about the visual style you want? : ', '2020-06-02', 'Yes', 'Quarterly', '11-20', '', '', 'Completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Mon, 15 Jun 2020 17:51:42 +0530', 'testfinalmob@gmail.com', 'testfinalmob', '7', 'testfinalmob@gmail.com', 0, '', 199, 'CLOTH105', 3, '', '', 'Shoe', 'ow will your design be used?', 'ow will your design be used?', 'ow will your design be used?', '', '', '', '', 'clothing_requests'),
(106, 'testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'hbhb', 'T-shirt', 'hbjhb', '', 'Search engine (e.g. Google, Bing)', 'hbbh', 'JPEG', 'hbbh', '2020-06-17', 'Yes', 'Rarely', '1', '', '', 'Completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Thu, 18 Jun 2020 01:14:15 +0530', 'testfinalmob@gmail.com', 'testfinalmob', '7', 'testfinalmob@gmail.com', 0, '', 199, 'CLOTH106', 3, 'Women', 'hhjb', 'Polo shirt', 'hbbh', 'hbbh', '', '', '', '', '', 'clothing_requests'),
(107, 'testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'jnknj', 'T-shirt', 'jnk', '', 'Search engine (e.g. Google, Bing)', 'jknnkj', 'JPEG', 'nkjkjn', '2020-06-05', 'Yes', 'Rarely', '1', '', '', 'Completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Thu, 18 Jun 2020 01:36:09 +0530', 'testfinalmob@gmail.com', 'testfinalmob', '7', 'testfinalmob@gmail.com', 0, '', 199, 'CLOTH107', 3, 'Men', 'jnk', 'Standard short-sleeve Tshirt', 'jkn', 'jnk', '', '', '', '', '', 'clothing_requests');

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
(1, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 12:40:30 +0530', 'Freelancer', 'Processing', ''),
(2, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 13:47:45 +0530', 'Freelancer', 'Processing', ''),
(3, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 13:48:46 +0530', 'Freelancer', 'paid', ''),
(4, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 13:52:22 +0530', 'Freelancer', 'paid', ''),
(5, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 13:56:08 +0530', 'Freelancer', 'Processing', ''),
(6, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 13:56:18 +0530', 'Freelancer', 'paid', ''),
(7, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 13:57:49 +0530', 'Freelancer', 'paid', ''),
(8, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 13:59:59 +0530', 'Freelancer', 'paid', ''),
(9, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 14:01:49 +0530', 'Freelancer', 'paid', ''),
(10, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 14:08:34 +0530', 'Freelancer', 'paid', ''),
(11, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 14:11:08 +0530', 'Freelancer', 'paid', ''),
(12, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 14:13:46 +0530', 'Freelancer', 'paid', 'pay_F3d6wHoumrbO2B'),
(13, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 14:15:09 +0530', 'Freelancer', 'paid', 'pay_F3d8RtPgNtOuDN'),
(14, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 14:16:05 +0530', 'Freelancer', 'Processing', ''),
(15, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 14:16:09 +0530', 'Freelancer', 'paid', 'pay_F3d9Jf61psHvia'),
(16, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 14:23:02 +0530', 'Freelancer', 'paid', 'pay_F3dGqOg3GIXDNd'),
(17, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 14:45:33 +0530', 'Freelancer', 'paid', 'pay_F3debQIIsDqBY3'),
(18, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 14:47:27 +0530', 'Freelancer', 'Processing', ''),
(19, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 14:47:29 +0530', 'Freelancer', 'Processing', ''),
(20, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 14:47:31 +0530', 'Freelancer', 'Processing', ''),
(21, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 14:47:32 +0530', 'Freelancer', 'Processing', ''),
(22, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 14:47:32 +0530', 'Freelancer', 'Processing', ''),
(23, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 14:47:32 +0530', 'Freelancer', 'Processing', ''),
(24, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 14:47:35 +0530', 'Freelancer', 'Processing', ''),
(25, 'testfinalmob', 'testfinalmob@gmail.com', '9898989898', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Wed, 17 Jun 2020 14:47:50 +0530', 'Freelancer', 'Processing', ''),
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
('testfinalmob@gmail.com', '296cb6f152113bcf86c1234aec6a641a52e33674149b815b031af08addfe7034cb8c67eb0b12f26203782f6ccfb8bd814fbce4ce5ad946d5c38d97218938291d', 'testfinalmob', '9877887878', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36', 'Tue, 26 May 2020 19:55:43 +0530', 7, 10, 7, 6, 547),
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

--
-- Dumping data for table `designer_completed_requests`
--

INSERT INTO `designer_completed_requests` (`id`, `client_name`, `client_email`, `designer_name`, `client_phone`, `designer_phone`, `designer_message`, `designed_files`, `time`, `status`, `from_ip`, `from_browser`, `designer_email`, `request_id`, `employer_tablename`, `credits`, `client_table`) VALUES
(32, 'testfinalmob', 'testfinalmob@gmail.com', 'testfinalmob', 2147483647, 2147483647, 'kkjnk', 'IMG-20181012-WA0008.jpg', 'Mon, 15 Jun 2020 11:45:37 +0530', 'Completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'testfinalmob@gmail.com', 'CLOTH1', 'designer', 0, 'clothing_requests'),
(33, 'testfinalmob', 'testfinalmob@gmail.com', 'testfinalmob', 2147483647, 2147483647, 'kjjk', 'bbbc4ab4-9b9e-4274-800d-3d501fd51e46.jfif', 'Mon, 15 Jun 2020 11:58:27 +0530', 'Redo', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'testfinalmob@gmail.com', 'LOGO1', 'designer', 0, 'logo_identity_requests'),
(34, 'testfinalmob', 'testfinalmob@gmail.com', 'testfinalmob', 2147483647, 2147483647, 'jnklijb ', '5may22-min.jpg', 'Mon, 15 Jun 2020 12:22:16 +0530', 'Redo', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'testfinalmob@gmail.com', 'LOGO1', 'designer', 0, 'logo_identity_requests'),
(35, 'testfinalmob', 'testfinalmob@gmail.com', 'testfinalmob', 2147483647, 2147483647, 'jn', '8THMAY1.jpg', 'Mon, 15 Jun 2020 12:23:16 +0530', 'Completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'testfinalmob@gmail.com', 'LOGO1', 'designer', 0, 'logo_identity_requests'),
(36, 'testfinalmob', 'testfinalmob@gmail.com', 'testfinalmob', 2147483647, 2147483647, 'ow will your design be used?ow will your design be used?', 'IMG-20180506-WA0025.jpg', 'Mon, 15 Jun 2020 17:54:14 +0530', 'Completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'testfinalmob@gmail.com', 'CLOTH105', 'designer', 0, 'clothing_requests'),
(37, 'testfinalmob', 'testfinalmob@gmail.com', 'testfinalmob', 2147483647, 2147483647, 'DFHD', 'kkk.jpg', 'Mon, 15 Jun 2020 17:55:23 +0530', 'Redo', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'testfinalmob@gmail.com', 'ART1', 'designer', 0, 'art_illusion_advert_requests'),
(38, 'testfinalmob', 'testfinalmob@gmail.com', 'testfinalmob', 2147483647, 2147483647, 'bnv', '97d278a0-c05b-4709-b0e1-1581ae1ae394.jpg', 'Thu, 18 Jun 2020 02:16:00 +0530', 'Completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'testfinalmob@gmail.com', 'CLOTH106', 'designer', 199, 'clothing_requests'),
(39, 'testfinalmob', 'testfinalmob@gmail.com', 'testfinalmob', 2147483647, 2147483647, 'ji', '26ed703f-345e-424b-bfe8-c0dc588d1550.jpg', 'Thu, 18 Jun 2020 02:24:13 +0530', 'Completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'testfinalmob@gmail.com', 'BIZ1', 'designer', 299, 'business_advert_requests'),
(40, 'testfinalmob', 'testfinalmob@gmail.com', 'testfinalmob', 2147483647, 2147483647, 'j,h', '94da139c-3d4f-4d1c-91c2-8f08498187e6.jpg', 'Thu, 18 Jun 2020 02:27:24 +0530', 'Completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'testfinalmob@gmail.com', 'CLOTH107', 'designer', 199, 'clothing_requests'),
(41, 'testfinalmob', 'testfinalmob@gmail.com', 'testfinalmob', 2147483647, 2147483647, 'cdf', '12aac98a-1d88-43da-849d-d12af561b9bd.jpg', 'Thu, 18 Jun 2020 04:21:41 +0530', 'Redo', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'testfinalmob@gmail.com', 'ART120', 'designer', 299, 'art_illusion_advert_requests');

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
  `If_you_have_an_existing_website_please_list_it_here` varchar(200) NOT NULL,
  `what_u_want_change` varchar(200) NOT NULL,
  `table_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logo_identity_requests`
--

INSERT INTO `logo_identity_requests` (`id`, `name`, `email`, `phone`, `project_name`, `type_of_design`, `how_design_can_be_used`, `design_package`, `How_did_you_hear_about_us`, `Image_Size`, `Image_Format`, `Describe_Visual_style_of_project`, `Due_Date`, `Is_your_company_a_digital_marketing_or_design_agency`, `how_often_you_need_design`, `How_many_employees_you_company_have`, `reference_files`, `inspiration_files`, `status`, `from_ip`, `from_browser`, `time`, `designer_accept_email`, `designer_accept_name`, `designer_accept_id`, `designer_completed_email`, `no_of_redo`, `redo_status`, `credits_pay`, `orderid`, `no_of_designs`, `What_name_do_you_want_in_your_product`, `Do_you_have_a_slogan_you_want_incorporated_in_your_product`, `Describe_what_your_organization_or_product_does_and_its_target`, `What_details_do_you_want_on_your_product`, `Is_there_anything_that_should_be_avoided`, `select_industry`, `communicate`, `If_you_have_an_existing_website_please_list_it_here`, `what_u_want_change`, `table_name`) VALUES
(102, 'testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'stationartyy', 'Stationery', 'How will your design be used? *', '', 'Search engine (e.g. Google, Bing)', 'jn', 'JPEG', 'Do you have ideas about the visual style you want? : *', '2020-06-07', 'Yes', 'Rarely', '1', '', '', 'Completed', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Mon, 15 Jun 2020 11:57:44 +0530', 'testfinalmob@gmail.com', 'testfinalmob', '7', 'testfinalmob@gmail.com', 2, 'Redo', 219, 'LOGO1', 3, 'nd name do you want on your s', '', 'you have an existing website, please list it he', 'hat details do you want on your stationery items? : *', 'anything that should be avoided', 'Accounting & Financial', '', 'you have an existing website, please list it he', ';jk ;', 'logo_identity_requests');

-- --------------------------------------------------------

--
-- Table structure for table `redo`
--

CREATE TABLE `redo` (
  `id` int(111) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` int(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `from_ip` varchar(200) NOT NULL,
  `from_browser` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `order_number` varchar(200) NOT NULL,
  `what_u_want_change` varchar(200) NOT NULL,
  `designer_email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `redo`
--

INSERT INTO `redo` (`id`, `name`, `email`, `phone`, `status`, `from_ip`, `from_browser`, `time`, `order_number`, `what_u_want_change`, `designer_email`) VALUES
(62, 'testfinal@gmail.com', 'testfinal@gmail.com', 2147483647, 'Redo', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Tue, 26 May 2020 19:47:27 +0530', '58', 'redo 1st', ''),
(63, 'testfinal@gmail.com', 'testfinal@gmail.com', 2147483647, 'Redo', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Tue, 26 May 2020 19:48:53 +0530', '58', 'redo 2nd', ''),
(64, 'testfinal@gmail.com', 'testfinal@gmail.com', 2147483647, 'Redo', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Tue, 26 May 2020 19:51:44 +0530', '59', 'shas', ''),
(65, 'testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'Redo', '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 12_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/12.0 Mobile/15A372 Safari/604.1', 'Tue, 26 May 2020 20:02:06 +0530', '60', 'n', ''),
(66, 'testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'Redo', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 'Tue, 26 May 2020 21:14:39 +0530', '61', ' vm', ''),
(67, 'testfinalmob', 'testfinalmob@gmail.com', 2147483647, 'Redo', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 'Thu, 18 Jun 2020 04:22:02 +0530', 'ART120', 'j,hb,jh', 'testfinalmob@gmail.com');

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

-- --------------------------------------------------------

--
-- Table structure for table `web_app_requests`
--

CREATE TABLE `web_app_requests` (
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
  `table_name` varchar(200) NOT NULL
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
-- Indexes for table `requests`
--
ALTER TABLE `requests`
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
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `business_advert_requests`
--
ALTER TABLE `business_advert_requests`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `clothing_requests`
--
ALTER TABLE `clothing_requests`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `logo_identity_requests`
--
ALTER TABLE `logo_identity_requests`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `redo`
--
ALTER TABLE `redo`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `web_app_requests`
--
ALTER TABLE `web_app_requests`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
