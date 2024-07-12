-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 01:28 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bhls-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `content`, `image`) VALUES
(10, 'About Us', '<div id=\"pgc-w5d0dcc3394ac1-0-0\" class=\"panel-grid-cell\">\r\n<div id=\"panel-w5d0dcc3394ac1-0-0-0\" class=\"so-panel widget widget_sow-editor panel-first-child panel-last-child\" data-index=\"0\">\r\n<div class=\"so-widget-sow-editor so-widget-sow-editor-base\">\r\n<div class=\"siteorigin-widget-tinymce textwidget\">\r\n<p class=\"text_all_p_tag_css\">ABOUT US ABOUT US ABOUT US.</p>\r\n<p class=\"text_all_p_tag_css\">This is a demo about us page for this project.This is a demo about us page for this project.This is a demo about us page for this project.This is a demo about us page for this project.This is a demo about us page for this project. This is a demo about us page for this project. This is a demo about us page for this project. This is a demo about us page for this project. This is a demo about us page for this project. This is a demo about us page for this project. This is a demo about us page for this project.</p>\r\n<div id=\"pgc-w5d0dcc3394ac1-0-0\" class=\"panel-grid-cell\">\r\n<div id=\"panel-w5d0dcc3394ac1-0-0-0\" class=\"so-panel widget widget_sow-editor panel-first-child panel-last-child\" data-index=\"0\">\r\n<div class=\"so-widget-sow-editor so-widget-sow-editor-base\">\r\n<div class=\"siteorigin-widget-tinymce textwidget\">\r\n<p class=\"text_all_p_tag_css\">This is a demo about us page for this project. This is a demo about us page for this project. This is a demo about us page for this project.</p>\r\n<p class=\"text_all_p_tag_css\">This is a demo about us page for this project.This is a demo about us page for this project.This is a demo about us page for this project.This is a demo about us page for this project. This is a demo about us page for this project.This is a demo about us page for this project.This is a demo about us page for this project.This is a demo about us page for this project.This is a demo about us page for this project.This is a demo about us page for this project.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'yoda baby044.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(10) NOT NULL,
  `auser` varchar(50) NOT NULL,
  `aemail` varchar(50) NOT NULL,
  `apass` varchar(50) NOT NULL,
  `adob` date NOT NULL,
  `aphone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `auser`, `aemail`, `apass`, `adob`, `aphone`) VALUES
(1, 'admin', 'boardinghouselocatorsystem@gmail.com', 'BHLSys2023.', '2001-07-02', '09458520450');


-- --------------------------------------------------------

--
-- Table structure for table `city`

-- Dumping data for table `city`
--

CREATE TABLE `city` (
  `cid` INT AUTO_INCREMENT PRIMARY KEY,
  `cname` VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert data into the city table
INSERT INTO `city` (`cid`, `cname`) VALUES
(1, 'Brgy1_Ems_Barrio'),
(2, 'Brgy2_Ems_Barrio_South'),
(3, 'Brgy3_Ems_Barrio_East'),
(4, 'Brgy4_Sagpon'),
(5, 'Brgy5_Sagmin'),
(6, 'Brgy6_Bañadero'),
(7, 'Brgy7_Baño'),
(8, 'Brgy8_Bagumbayan'),
(9, 'Brgy9_Pinaric'),
(10, 'Brgy10_Cabugao'),
(11, 'Brgy11_Maoyod'),
(12, 'Brgy12_Tula-tula'),
(13, 'Brgy13_Ilawod_West'),
(14, 'Brgy14_Ilawod'),
(15, 'Brgy15_Ilawod_East'),
(16, 'Brgy16_Kawit-East_Washington_Drive'),
(17, 'Brgy17_Rizal_Street'),
(18, 'Brgy18_Cabagñan_West'),
(19, 'Brgy19_Cabagñan'),
(20, 'Brgy20_Cabagñan_East'),
(21, 'Brgy21_Binanuahan_West'),
(22, 'Brgy22_Binanuahan_East'),
(23, 'Brgy23_Imperial_Court_Subd'),
(24, 'Brgy24_Rizal_Street'),
(25, 'Brgy25_Lapu-lapu'),
(26, 'Brgy26_Dinagaan'),
(27, 'Brgy27_Victory_Village_South'),
(28, 'Brgy28_Victory_Village_North'),
(29, 'Brgy29_Sabang'),
(30, 'Brgy30_Pigcale'),
(31, 'Brgy31_Centro-Baybay'),
(32, 'Brgy32_San_Roque'),
(33, 'Brgy33_PNR-Peñaranda_St-Iraya'),
(34, 'Brgy34_Oro_Site-Magallanes_St'),
(35, 'Brgy35_Tinago'),
(36, 'Brgy36_Kapantawan'),
(37, 'Brgy37_Bitano'),
(38, 'Brgy38_Gogon'),
(39, 'Brgy39_Bonot'),
(40, 'Brgy40_Cruzada'),
(41, 'Brgy41_Bogtong'),
(42, 'Brgy42_Rawis'),
(43, 'Brgy43_Tamaoyan'),
(44, 'Brgy44_Pawa'),
(45, 'Brgy45_Dita'),
(46, 'Brgy46_San_Joaquin'),
(47, 'Brgy47_Arimbay'),
(48, 'Brgy48_Bagong_Abre'),
(49, 'Brgy49_Bigaa'),
(50, 'Brgy50_Padang'),
(51, 'Brgy51_Buyuan'),
(52, 'Brgy52_Matanag'),
(53, 'Brgy53_Bonga'),
(54, 'Brgy54_Mabinit'),
(55, 'Brgy55_Estanza'),
(56, 'Brgy56_Taysan'),
(57, 'Brgy57_Dap-dap'),
(58, 'Brgy58_Buragwis'),
(59, 'Brgy59_Puro'),
(60, 'Brgy60_Lamba'),
(61, 'Brgy61_Maslog'),
(62, 'Brgy62_Homapon'),
(63, 'Brgy63_Mariawa'),
(64, 'Brgy64_Bagacay'),
(65, 'Brgy65_Imalnod'),
(66, 'Brgy66_Banquerohan'),
(67, 'Brgy67_Bariis'),
(68, 'Brgy68_San_Francisco'),
(69, 'Brgy69_Buenavista'),
(70, 'Brgy70_Cagbacong');


-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cid` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cid`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(7, 'BHLS', 'boardinghouselocatorsystem@gmail.com', '9458520450', 'BHLS', 'fufufu');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(50) NOT NULL,
  `uid` int(50) NOT NULL,
  `fdescription` varchar(300) NOT NULL,
  `status` int(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `uid`, `fdescription`, `status`, `date`) VALUES
(7, 28, 'This is a demo feedback in order to use set it as Testimonial for the site. Just a simply dummy text rather than using lorem ipsum text lines.', 1, '2023-12-01 01:07:08');


-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `pid` int(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `pcontent` longtext NOT NULL,
  `type` varchar(100) NOT NULL,
  `bhk` varchar(50) NOT NULL,
  `stype` varchar(100) NOT NULL,
  `bedroom` int(50) NOT NULL,
  `bathroom` int(50) NOT NULL,
  `balcony` int(50) NOT NULL,
  `kitchen` int(50) NOT NULL,
  `hall` int(50) NOT NULL,
  `floor` varchar(50) NOT NULL,
  `size` int(50) NOT NULL,
  `price` int(50) NOT NULL,
  `location` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `feature` longtext NOT NULL,
  `pimage` varchar(300) NOT NULL,
  `pimage1` varchar(300) NOT NULL,
  `pimage2` varchar(300) NOT NULL,
  `pimage3` varchar(300) NOT NULL,
  `pimage4` varchar(300) NOT NULL,
  `uid` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `mapimage` varchar(300) NOT NULL,
  `topmapimage` varchar(300) NOT NULL,
  `groundmapimage` varchar(300) NOT NULL,
  `totalfloor` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isFeatured` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Dumping data for table `property`
--

INSERT INTO `property` (`pid`, `title`, `pcontent`, `type`, `bhk`, `stype`, `bedroom`, `bathroom`, `balcony`, `kitchen`, `hall`, `floor`, `size`, `price`, `location`, `city`, `state`, `feature`, `pimage`, `pimage1`, `pimage2`, `pimage3`, `pimage4`, `uid`, `status`, `mapimage`, `topmapimage`, `groundmapimage`, `totalfloor`, `date`, `isFeatured`) VALUES
(25, 'Jols', '', 'house', '14 BHK', 'sale', 4, 2, 0, 1, 1, '2nd Floor', 1869, 219690, 'Gilidgild', 'hatdog', 'hotdog', '<p>&nbsp;</p>\r\n<!---feature area start--->\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Property Age : </span>10 Years</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Swiming Pool : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Parking : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">GYM : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Type : </span>Appartment</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Security : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Dining Capacity : </span>10 People</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Church/Temple : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">3rd Party : </span>No</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Elevator : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">CCTV : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Water Supply : </span>Ground Water / Tank</li>\r\n</ul>\r\n</div>\r\n<!---feature area end---->\r\n<p>&nbsp;</p>', 'zillhms1.jpg', 'zillhms2.jpg', 'zillhms3.jpg', 'zillhms4.jpg', 'zillhms5.jpg', 30, 'available', 'floorplan_sample.jpg', 'zillhms7.jpg', 'zillhms6.jpg', '2 Floor', '2022-07-22 22:29:20', 0);

-- --------------------------------------------------------

--

--


-- --------------------------------------------------------

CREATE TABLE `user` (
    `uid` INT AUTO_INCREMENT PRIMARY KEY,
    `uname` VARCHAR(255) NOT NULL,
    `uemail` VARCHAR(255) NOT NULL UNIQUE,
    `uphone` VARCHAR(10) NOT NULL,
    `upass` VARCHAR(255) NOT NULL,
    `utype` VARCHAR(50) NOT NULL,
    `uimage` VARCHAR(255) NOT NULL,
    `birthday` DATE NOT NULL,
    `age` INT NOT NULL,
    `valid_id_picture` VARCHAR(255) NOT NULL,
    `valid_id_number` VARCHAR(255) NOT NULL,
    `facebook_account` VARCHAR(255) NOT NULL,
    `permit_id_picture` VARCHAR(255) NOT NULL,
    `permit_id_number` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `status` VARCHAR(20) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Create a simple table to store additional user details (optional)
CREATE TABLE `user_details` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `uid` INT,
    `detail_name` VARCHAR(255) NOT NULL,
    `detail_value` TEXT,
    FOREIGN KEY (uid) REFERENCES user(uid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert data into the user table
INSERT INTO `user` (
    `uname`, `uemail`, `uphone`, `upass`, `utype`, `uimage`,
    `birthday`, `age`, `valid_id_picture`, `valid_id_number`,
    `facebook_account`, `permit_id_picture`, `permit_id_number`
) VALUES (
    'Baby Yoda', 'babyyoda@mail.com', '696969', 'babyyoda', 'agent', 'yoda baby044.jpg',
    '2000-01-01', 21, 'valid_id_picture.jpg', 'ABC123', 'facebook.com/babyyoda',
    'permit_id_picture.jpg', 'XYZ456'
);

CREATE TABLE `state` (
  `sid` int(50) NOT NULL,
  `sname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`sid`, `sname`) VALUES
(2, 'Colotana'),
(3, 'Floaii'),
(4, 'Virconsin'),
(7, 'West Misstana\n\n'),
(9, 'New Pennrk\n\n'),
(10, 'Louiswa\n\n'),
(15, 'Wisginia\n\n');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `pid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `sid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
