-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2021 at 05:53 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metierfinddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblappliedjobs`
--

CREATE TABLE `tblappliedjobs` (
  `applied_id` int(11) NOT NULL,
  `js_id` int(11) NOT NULL,
  `j_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblappliedjobs`
--

INSERT INTO `tblappliedjobs` (`applied_id`, `js_id`, `j_id`) VALUES
(11, 14, 35),
(12, 15, 31),
(14, 15, 32),
(15, 14, 32);

-- --------------------------------------------------------

--
-- Table structure for table `tblemployer`
--

CREATE TABLE `tblemployer` (
  `employerid` int(100) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_location` varchar(100) NOT NULL,
  `c_website` varchar(100) NOT NULL,
  `c_contactname` varchar(100) NOT NULL,
  `c_mobile` varchar(100) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_password` varchar(100) NOT NULL,
  `c_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblemployer`
--

INSERT INTO `tblemployer` (`employerid`, `c_name`, `c_location`, `c_website`, `c_contactname`, `c_mobile`, `c_email`, `c_password`, `c_photo`) VALUES
(20, 'Apple', 'Sulivan Baliuag Bulacan', 'Apple-Sulivan.com', 'Michaela Robles', '09234555555', 'michaela@gmail.com', '123', 'http://localhost/metierfind/backend/uploads/6026ac45f16e76.35055311.png'),
(21, 'Microsoft', 'Bustos Bulacan', 'Microsoft-Bustos.com', 'Denice Ann Dela Cruz', '09567756456', 'denice@gmail.com', '123', 'http://localhost/metierfind/backend/uploads/6026af371338d3.99404602.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbljobs`
--

CREATE TABLE `tbljobs` (
  `j_id` int(11) NOT NULL,
  `c_employerid` int(11) NOT NULL,
  `c_person_name` varchar(100) NOT NULL,
  `j_title` varchar(100) NOT NULL,
  `j_desc` varchar(255) NOT NULL,
  `j_quali` varchar(255) NOT NULL,
  `j_vacancies` varchar(100) NOT NULL,
  `j_location` varchar(100) NOT NULL,
  `j_type` varchar(100) NOT NULL,
  `j_salary` int(11) NOT NULL,
  `j_posted_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbljobs`
--

INSERT INTO `tbljobs` (`j_id`, `c_employerid`, `c_person_name`, `j_title`, `j_desc`, `j_quali`, `j_vacancies`, `j_location`, `j_type`, `j_salary`, `j_posted_date`) VALUES
(31, 20, 'Apple', 'aaaaa', 'sadasas, asdas, asdas', 'asdas, asdas, asdasd', '15', 'gago', 'Full Time', 120000, '2021-02-13'),
(32, 20, 'Apple', 'bbbbbbbb', 'dasasd, asdas, asdasd', 'asdas, asdasd, asdasdasd', '32', 'asdasdas', 'Full Time', 546546, '2021-02-13'),
(33, 20, 'Apple', 'cccccccc', 'dfssdsd, fsdfsd, fsdfsd', 'fsdfsd, fsdfsd, sdfsd', '32', 'sdfsd', 'Full Time', 324323, '2021-02-13'),
(34, 21, 'Microsoft', 'dddddd', 'asdasas, das, dasasd', 'asdsda, asdasd, asdsad', '32', 'asdfsdsfd', 'Part Time', 453534, '2021-02-13'),
(35, 21, 'Microsoft', 'eeeeee', 'asdasd, asdasd, asdasd', 'asdads, asdads, asdasd', '32', 'sdffsf', 'Part Time', 543534, '2021-02-13'),
(36, 21, 'Microsoft', 'ffffffffff', 'asdasd, asdas, asdas', 'asdas, asdas, asds', '32', 'asdasdas', 'Part Time', 453543, '2021-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbljobseeker`
--

CREATE TABLE `tbljobseeker` (
  `js_id` int(11) NOT NULL,
  `js_name` varchar(100) NOT NULL,
  `js_mobile` varchar(11) NOT NULL,
  `js_email` varchar(100) NOT NULL,
  `js_password` varchar(100) NOT NULL,
  `js_photo` varchar(100) NOT NULL,
  `js_jp_availability` varchar(100) NOT NULL,
  `js_jp_job_type` varchar(100) NOT NULL,
  `js_jp_expected_sal` varchar(100) NOT NULL,
  `js_am_highest_education` varchar(100) NOT NULL,
  `js_am_gender` varchar(100) NOT NULL,
  `js_am_birthday` varchar(100) NOT NULL,
  `js_am_introduce` varchar(255) NOT NULL,
  `js_resume` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbljobseeker`
--

INSERT INTO `tbljobseeker` (`js_id`, `js_name`, `js_mobile`, `js_email`, `js_password`, `js_photo`, `js_jp_availability`, `js_jp_job_type`, `js_jp_expected_sal`, `js_am_highest_education`, `js_am_gender`, `js_am_birthday`, `js_am_introduce`, `js_resume`) VALUES
(14, 'Danica Tayum', '09655676754', 'danica@gmail.com', '123', 'assets/images/index/profile-img.jpg', '', '', '', '', '', '', '', ''),
(15, 'Lyca De Leon', '09678888888', 'lyca@gmail.com', '123', 'http://localhost/metierfind/backend/uploads/6026b008189c98.47456356.png', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblsavedjobs`
--

CREATE TABLE `tblsavedjobs` (
  `saved_id` int(11) NOT NULL,
  `js_id` int(11) NOT NULL,
  `j_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblappliedjobs`
--
ALTER TABLE `tblappliedjobs`
  ADD PRIMARY KEY (`applied_id`);

--
-- Indexes for table `tblemployer`
--
ALTER TABLE `tblemployer`
  ADD PRIMARY KEY (`employerid`);

--
-- Indexes for table `tbljobs`
--
ALTER TABLE `tbljobs`
  ADD PRIMARY KEY (`j_id`);

--
-- Indexes for table `tbljobseeker`
--
ALTER TABLE `tbljobseeker`
  ADD PRIMARY KEY (`js_id`);

--
-- Indexes for table `tblsavedjobs`
--
ALTER TABLE `tblsavedjobs`
  ADD PRIMARY KEY (`saved_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblappliedjobs`
--
ALTER TABLE `tblappliedjobs`
  MODIFY `applied_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblemployer`
--
ALTER TABLE `tblemployer`
  MODIFY `employerid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbljobs`
--
ALTER TABLE `tbljobs`
  MODIFY `j_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbljobseeker`
--
ALTER TABLE `tbljobseeker`
  MODIFY `js_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblsavedjobs`
--
ALTER TABLE `tblsavedjobs`
  MODIFY `saved_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
