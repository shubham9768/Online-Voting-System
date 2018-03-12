-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2016 at 10:38 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `polling`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbadministrators`
--

CREATE TABLE IF NOT EXISTS `tbadministrators` (
  `admin_id` int(5) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbadministrators`
--

INSERT INTO `tbadministrators` (`admin_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Kimani', 'Kahiga', 'kahiga@gmail.com', '547da2b03f947606f1d06a8dec093e64'),
(2, 'shubham', 'gaikwad', 'anu.ac.ke@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(4, 'Yuvraj', 'Jadhav', 'yu@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `tbcandidates`
--

CREATE TABLE IF NOT EXISTS `tbcandidates` (
  `candidate_id` int(5) NOT NULL,
  `candidate_name` varchar(45) NOT NULL,
  `candidate_position` varchar(45) NOT NULL,
  `candidate_region` varchar(25) NOT NULL,
  `candidate_district` varchar(25) NOT NULL,
  `candidate_cvotes` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbcandidates`
--

INSERT INTO `tbcandidates` (`candidate_id`, `candidate_name`, `candidate_position`, `candidate_region`, `candidate_district`, `candidate_cvotes`) VALUES
(14, 'YUVRAJ', 'ward200', 'hhh', 'lonavla', 5),
(15, 'SHUBHAM', 'ward200', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbdistricts`
--

CREATE TABLE IF NOT EXISTS `tbdistricts` (
  `district_id` int(25) NOT NULL,
  `district_name` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbdistricts`
--

INSERT INTO `tbdistricts` (`district_id`, `district_name`) VALUES
(8, 'lonavla'),
(10, 'mumbai'),
(9, 'Pune');

-- --------------------------------------------------------

--
-- Table structure for table `tbmembers`
--

CREATE TABLE IF NOT EXISTS `tbmembers` (
  `member_id` int(5) NOT NULL,
  `voting_id` int(12) NOT NULL,
  `adhar_no` bigint(12) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `mobile_no` bigint(10) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `is_voted` int(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbmembers`
--

INSERT INTO `tbmembers` (`member_id`, `voting_id`, `adhar_no`, `first_name`, `last_name`, `mobile_no`, `email`, `password`, `is_voted`) VALUES
(1, 1234567, 123456789012, 'Yuvraj', 'Jadhav', 9096373874, 'yu@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(2, 51525665, 556625566485, 'Shubham', 'Gaikwad', 1234567891, 'sh@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(3, 652514, 652514200025, 'Prashant', 'Mali', 8898385966, 'prashant97@gmail.com', '1d72310edc006dadf2190caad5802983', 1),
(4, 2439, 454855445555, 'Akshay', 'Mohite', 9867299569, '39akshaymohite@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(5, 743657643, 9657698579, 'akshay', 'mohite', 7676867884, 'am@gmail.com', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbpositions`
--

CREATE TABLE IF NOT EXISTS `tbpositions` (
  `position_id` int(25) NOT NULL,
  `position_name` varchar(25) NOT NULL,
  `position_region` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpositions`
--

INSERT INTO `tbpositions` (`position_id`, `position_name`, `position_region`) VALUES
(2, 'ward200', 'lanavla'),
(3, 'MLA', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbregions`
--

CREATE TABLE IF NOT EXISTS `tbregions` (
  `region_id` int(25) NOT NULL,
  `region_name` varchar(25) NOT NULL,
  `district_name` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbregions`
--

INSERT INTO `tbregions` (`region_id`, `region_name`, `district_name`) VALUES
(1, 'hhh', 'lonavla'),
(6, 'virar', 'Pune'),
(7, 'bandra', 'mumbai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbadministrators`
--
ALTER TABLE `tbadministrators`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbcandidates`
--
ALTER TABLE `tbcandidates`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `tbdistricts`
--
ALTER TABLE `tbdistricts`
  ADD PRIMARY KEY (`district_id`), ADD UNIQUE KEY `districts_name` (`district_name`);

--
-- Indexes for table `tbmembers`
--
ALTER TABLE `tbmembers`
  ADD PRIMARY KEY (`member_id`), ADD UNIQUE KEY `adhar_no` (`adhar_no`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `mobile_no` (`mobile_no`), ADD UNIQUE KEY `voting_id` (`voting_id`), ADD KEY `member_id` (`member_id`), ADD KEY `member_id_2` (`member_id`);

--
-- Indexes for table `tbpositions`
--
ALTER TABLE `tbpositions`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `tbregions`
--
ALTER TABLE `tbregions`
  ADD PRIMARY KEY (`region_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbadministrators`
--
ALTER TABLE `tbadministrators`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbcandidates`
--
ALTER TABLE `tbcandidates`
  MODIFY `candidate_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbdistricts`
--
ALTER TABLE `tbdistricts`
  MODIFY `district_id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbmembers`
--
ALTER TABLE `tbmembers`
  MODIFY `member_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbpositions`
--
ALTER TABLE `tbpositions`
  MODIFY `position_id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbregions`
--
ALTER TABLE `tbregions`
  MODIFY `region_id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
