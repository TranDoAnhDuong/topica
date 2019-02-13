-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 25, 2018 at 09:18 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm_topica`
--

-- --------------------------------------------------------

--
-- Table structure for table `crm_c3`
--

CREATE TABLE `crm_c3` (
  `c3_id` int(11) NOT NULL,
  `c3_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `c3_tel` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `c3_email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `c3_nganhdangky` varchar(50) CHARACTER SET utf8 NOT NULL,
  `c3_bangcapcaonhat` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `c3_diachinoio` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `c3_nguon` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `c3_datereg` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crm_c3`
--

INSERT INTO `crm_c3` (`c3_id`, `c3_name`, `c3_tel`, `c3_email`, `c3_nganhdangky`, `c3_bangcapcaonhat`, `c3_diachinoio`, `c3_nguon`, `c3_datereg`) VALUES
(33, 'Son T', '90444444', 'test1@example.com', 'Ngành 1', 'Bảng A', 'Thanh Xuân - Hà Nội', 'Nguồn ABC', '0000-00-00 00:00:00'),
(34, 'Mr Bon', '89235235', 'test2@example.com', 'Ngành 2', 'B_ng HHH', 'Hoàng Mai - Hà Nội', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `crm_c4`
--

CREATE TABLE `crm_c4` (
  `c4_id` int(11) NOT NULL,
  `c3_datereg` datetime DEFAULT NULL,
  `c3_name` varchar(100) DEFAULT NULL,
  `c3_tel` varchar(20) DEFAULT NULL,
  `c3_email` varchar(100) DEFAULT NULL,
  `c3_nganhdangky` varchar(50) DEFAULT NULL,
  `c3_bangcapcaonhat` varchar(100) DEFAULT NULL,
  `c3_diachinoio` varchar(250) DEFAULT NULL,
  `truong` varchar(250) DEFAULT NULL,
  `SP` varchar(250) DEFAULT NULL,
  `khuvuc` varchar(250) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `last_c3_datereg` datetime DEFAULT NULL,
  `last_calllog` varchar(100) DEFAULT NULL,
  `last_calllog_dtevisit` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `crm_calllog`
--

CREATE TABLE `crm_calllog` (
  `calllog_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `calllog` varchar(100) DEFAULT NULL,
  `truong_tot_nghiep` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `crm_group`
--

CREATE TABLE `crm_group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `group_sp` varchar(10) NOT NULL,
  `group_truong` varchar(50) NOT NULL,
  `group_khuvuc` varchar(50) NOT NULL,
  `group_kenh` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `crm_role`
--

CREATE TABLE `crm_role` (
  `role_id` int(11) NOT NULL,
  `rolename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `crm_status`
--

CREATE TABLE `crm_status` (
  `level_id` int(11) NOT NULL,
  `level_name` varchar(2) NOT NULL,
  `level_diengiai` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crm_status`
--

INSERT INTO `crm_status` (`level_id`, `level_name`, `level_diengiai`) VALUES
(1, 'L1', NULL),
(2, 'L2', NULL),
(3, 'L3', NULL),
(4, 'L4', NULL),
(5, 'L5', NULL),
(6, 'L6', NULL),
(7, 'L7', NULL),
(8, 'L8', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `crm_user`
--

CREATE TABLE `crm_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_fullname` varchar(150) NOT NULL,
  `role_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crm_user`
--

INSERT INTO `crm_user` (`user_id`, `username`, `password`, `user_fullname`, `role_id`, `group_id`, `user_active`) VALUES
(1, 'sontv', 'a2cf1d21f3a0266ef52431cb5b3fb877', 'Son Tran', 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crm_c3`
--
ALTER TABLE `crm_c3`
  ADD PRIMARY KEY (`c3_id`);

--
-- Indexes for table `crm_c4`
--
ALTER TABLE `crm_c4`
  ADD PRIMARY KEY (`c4_id`);

--
-- Indexes for table `crm_calllog`
--
ALTER TABLE `crm_calllog`
  ADD PRIMARY KEY (`calllog_id`);

--
-- Indexes for table `crm_group`
--
ALTER TABLE `crm_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `crm_role`
--
ALTER TABLE `crm_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `crm_status`
--
ALTER TABLE `crm_status`
  ADD PRIMARY KEY (`level_id`),
  ADD UNIQUE KEY `level_name` (`level_name`);

--
-- Indexes for table `crm_user`
--
ALTER TABLE `crm_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crm_c3`
--
ALTER TABLE `crm_c3`
  MODIFY `c3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `crm_c4`
--
ALTER TABLE `crm_c4`
  MODIFY `c4_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_calllog`
--
ALTER TABLE `crm_calllog`
  MODIFY `calllog_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_group`
--
ALTER TABLE `crm_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_role`
--
ALTER TABLE `crm_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crm_status`
--
ALTER TABLE `crm_status`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `crm_user`
--
ALTER TABLE `crm_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
