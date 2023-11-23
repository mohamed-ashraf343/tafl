-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2023 at 11:40 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tafl`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_values`
--

CREATE TABLE `about_values` (
  `id` int(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `activity_id` int(5) NOT NULL,
  `activity_title` varchar(255) NOT NULL,
  `activity_image` varchar(255) NOT NULL,
  `activity_date` date NOT NULL,
  `activity_office` varchar(255) NOT NULL,
  `activity_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activity_id`, `activity_title`, `activity_image`, `activity_date`, `activity_office`, `activity_details`) VALUES
(2, 'dsdsds', '1742021114214_report.jpg', '2021-04-07', 'technology_marketing', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n'),
(3, 'test2', '1742021114538_about22.jpg', '2021-05-05', 'patents', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n'),
(4, 'test3', '1742021114554_banner2.jpg', '2021-04-13', 'gico', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email1` varchar(100) NOT NULL,
  `email2` varchar(100) NOT NULL,
  `email3` varchar(100) NOT NULL,
  `email4` varchar(100) NOT NULL,
  `email5` varchar(100) NOT NULL,
  `email6` varchar(100) NOT NULL,
  `email7` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_albums`
--

CREATE TABLE `gallery_albums` (
  `album_id` int(5) NOT NULL,
  `album_title` varchar(255) NOT NULL,
  `album_title_en` varchar(255) NOT NULL,
  `album_cover_img` varchar(255) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery_albums`
--

INSERT INTO `gallery_albums` (`album_id`, `album_title`, `album_title_en`, `album_cover_img`, `create_date`) VALUES
(1, ' يوم مع الصينين بالمدينة الجامعية ', 'Day with Chinese in University City', '792022131135_3.jpg', '2021-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `image_id` int(5) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_album` int(5) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`image_id`, `image_name`, `image_album`, `date_created`) VALUES
(8, '7920221311451453417516_2.jpg', 1, '2022-09-07'),
(9, '792022131146795325360_3.jpg', 1, '2022-09-07'),
(10, '7920221311461760368664_4.jpg', 1, '2022-09-07'),
(11, '792022131146819669566_5.jpg', 1, '2022-09-07'),
(12, '10920221258182018747474_2.jpg', 1, '2022-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `mission_vision`
--

CREATE TABLE `mission_vision` (
  `id` int(4) NOT NULL,
  `mission` text NOT NULL,
  `vision` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mission_vision`
--

INSERT INTO `mission_vision` (`id`, `mission`, `vision`, `image`) VALUES
(1, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>\r\n', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here,</p>\r\n', '1092016202617_values-01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `details_en` text NOT NULL,
  `slug` varchar(400) NOT NULL,
  `main_image` varchar(255) NOT NULL,
  `publish_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `title_en`, `details`, `details_en`, `slug`, `main_image`, `publish_date`) VALUES
(1, 'خبر جديد', 'sdfsfsdfsd', '<p>الاتلاتلاتsdfsdfsdfsdf</p>\r\n', '<p>sdfsdfsdfsdfsdfsdfsdf</p>\r\n', 'new', '1492022125318_4.jpg', '2022-09-06'),
(2, 'خبر جديد 2023', 'new article 2023', '<p>asdasda das dasd asdasdasdasda das dasd asdasdasdasda das dasd asdasdasdasda das dasd asdasdasdasda das dasd asdasdasdasda das dasd asdasd</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: 320px; top: 38px;\">\r\n<div class=\"gtx-trans-icon\"> </div>\r\n</div>\r\n', '<p>asdasda das dasd asdasd</p>\r\n', '', '411202393147_26102023104106_projects.jpg', '2023-11-01'),
(3, 'ggggg', 'rrrrrr', '<p>rrrrr</p>\r\n', '<p>gggggggggggggg</p>\r\n', '', '411202395925_12121221.png', '2023-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `news_images`
--

CREATE TABLE `news_images` (
  `image_id` int(5) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `articleid` int(5) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(4) NOT NULL,
  `header_text` varchar(400) NOT NULL,
  `header_text_en` varchar(400) NOT NULL,
  `details` text NOT NULL,
  `details_en` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `header_text`, `header_text_en`, `details`, `details_en`, `image`, `type`) VALUES
(1, 'عن الوحدة', 'en header', '', '', '3092019114539_about.jpg', 'about'),
(2, '', '', '<p style=\"direction: rtl;\">يتمثل الهدف الرئيسي للوحدة في تسهيل التواصل بين الخريجين والجامعة حتى يحصلوا على خدمات الخاصة بهم بطريقة سهلة وزيادة ارتباط الخريجين بالجامعة بإعلامهم بأنشطتها من ندوات ومؤتمرات ودورات تخصصية وإتاحة الفرصة لهم للإسهام في النهوض بالجامعة تعليميا وبحثيا لتواكب الاحتياجات المتغيرة لسوق العمل.</p>\r\n', '<p>The main objective of the unit is to facilitate communication between the graduates and the university so that they can get their services in an easy way and increase the link of graduates to the university by informing them of its activities such as seminars, conferences and specialized courses and allowing them to contribute to the advancement of the university educationally and research to cope with the changing needs of the labor market.</p>\r\n', '', 'footer');

-- --------------------------------------------------------

--
-- Table structure for table `parteners`
--

CREATE TABLE `parteners` (
  `id` int(4) NOT NULL,
  `partener_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `set_id` int(4) NOT NULL,
  `set_phone` varchar(40) NOT NULL,
  `set_email` varchar(255) NOT NULL,
  `set_address` varchar(500) NOT NULL,
  `set_address_en` varchar(255) NOT NULL,
  `set_facebook` varchar(255) NOT NULL,
  `set_twitter` varchar(255) NOT NULL,
  `set_instagram` varchar(255) NOT NULL,
  `set_linkedin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`set_id`, `set_phone`, `set_email`, `set_address`, `set_address_en`, `set_facebook`, `set_twitter`, `set_instagram`, `set_linkedin`) VALUES
(1, '00201224443775', 'tafl@unv.tanta.edu.eg', 'كلية الآداب - جامعة طنطا', 'Art faculty - Tanta university', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(4) NOT NULL,
  `slide_image` varchar(255) NOT NULL,
  `head_ar` varchar(255) NOT NULL,
  `head_en` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slide_image`, `head_ar`, `head_en`) VALUES
(9, '592022120011_6666.jpg', '', ''),
(13, '592022131321_DSC00252.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` int(4) NOT NULL,
  `social_type` varchar(30) NOT NULL,
  `link` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `registration_date` date NOT NULL,
  `userType` varchar(30) NOT NULL,
  `products_priv` int(2) NOT NULL,
  `news_priv` int(2) NOT NULL,
  `career_priv` int(2) NOT NULL,
  `about_priv` int(2) NOT NULL,
  `commercial_priv` int(2) NOT NULL,
  `img_gallery_priv` int(2) NOT NULL,
  `vid_gallery_priv` int(2) NOT NULL,
  `faq_priv` int(2) NOT NULL,
  `social_priv` int(2) NOT NULL,
  `slider_priv` int(2) NOT NULL,
  `bd` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `first_name`, `last_name`, `email`, `registration_date`, `userType`, `products_priv`, `news_priv`, `career_priv`, `about_priv`, `commercial_priv`, `img_gallery_priv`, `vid_gallery_priv`, `faq_priv`, `social_priv`, `slider_priv`, `bd`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', 'Admin', 'admin@admin.com', '2017-03-04', 'superadmin', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_values`
--
ALTER TABLE `about_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_albums`
--
ALTER TABLE `gallery_albums`
  ADD PRIMARY KEY (`album_id`),
  ADD UNIQUE KEY `album_name` (`album_title`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `mission_vision`
--
ALTER TABLE `mission_vision`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `news_images`
--
ALTER TABLE `news_images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parteners`
--
ALTER TABLE `parteners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_values`
--
ALTER TABLE `about_values`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activity_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_albums`
--
ALTER TABLE `gallery_albums`
  MODIFY `album_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `image_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mission_vision`
--
ALTER TABLE `mission_vision`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news_images`
--
ALTER TABLE `news_images`
  MODIFY `image_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parteners`
--
ALTER TABLE `parteners`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `set_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
