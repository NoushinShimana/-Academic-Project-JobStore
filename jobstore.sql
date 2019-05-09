-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2018 at 11:06 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Web, Mobile & Software Dev'),
(2, 'Design & Creative'),
(3, 'IT & Networking'),
(4, 'Data Science & Analytics');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `aboutme` varchar(255) DEFAULT NULL,
  `category` varchar(200) DEFAULT NULL,
  `optn` varchar(200) DEFAULT NULL,
  `logo` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id_company`, `name`, `companyname`, `contactno`, `website`, `email`, `password`, `aboutme`, `category`, `optn`, `logo`, `createdAt`, `active`) VALUES
(102, 'Noushin', 'web design', '1111111111', 'web design', 'nshimana@yahoo.com', 'N2U5MjE3ZjJkODhmZTBlZDMyYTdkOTY2NzBmZmQ5ODI=', 'IT company', 'Web, Mobile & Software Dev', 'All Web, Mobile & Software Dev', '5b83e7229543c.jpg', '2018-08-27 11:57:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_post`
--

CREATE TABLE `job_post` (
  `id_jobpost` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `jobtitle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `minimumsalary` varchar(255) NOT NULL,
  `maximumsalary` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_post`
--

INSERT INTO `job_post` (`id_jobpost`, `id_company`, `jobtitle`, `description`, `minimumsalary`, `maximumsalary`, `experience`, `qualification`, `createdat`) VALUES
(1, 102, 'php programmer', 'php programmer', '100', '300', '1', 'BSC', '2018-08-27 13:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `optn`
--

CREATE TABLE `optn` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `optn`
--

INSERT INTO `optn` (`id`, `name`, `category_id`) VALUES
(1, 'All Web, Mobile & Software Dev', 1),
(2, 'Desktop Software Development', 1),
(3, 'Ecommerce Development', 1),
(4, 'Game Development', 1),
(5, 'Mobile Development', 1),
(6, 'Product Management', 1),
(7, 'QA & Testing', 1),
(8, 'Scripts & Utilities', 1),
(9, 'Web Development', 1),
(10, 'Web & Mobile Design', 1),
(11, 'Other - Software Development', 1),
(12, 'All Design & Creative', 2),
(13, 'Animation', 2),
(14, '3D Modeling & CAD', 2),
(15, 'Graphic Design', 2),
(16, 'Illustration', 2),
(17, 'Logo Design & Branding', 2),
(18, 'All IT & Networking', 3),
(19, 'Database Administration', 3),
(20, 'ERP / CRM Software', 3),
(21, 'Information Security', 3),
(22, 'Network & System Administration', 3),
(23, 'Other - IT & Networking', 3),
(24, 'All Data Science & Analytics', 4),
(25, 'A/B Testing', 4),
(26, 'Data Visualization', 4),
(27, 'Data Extraction / ETL', 4),
(28, 'Data Mining & Management', 4),
(29, 'Machine Learning', 4),
(30, 'Quantitative Analysis', 4),
(31, 'Other - Data Science & Analytics', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text,
  `contactno` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `passingyear` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '2',
  `aboutme` text,
  `skills` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `firstname`, `lastname`, `email`, `password`, `address`, `contactno`, `qualification`, `passingyear`, `dob`, `age`, `designation`, `logo`, `active`, `aboutme`, `skills`) VALUES
(0, 'Noushin', 'Shimana', 'nshimana@yahoo.com', 'MDdiNDMyZDI1MTcwYjQ2OWI1NzA5NWNhMjY5YmMyMDI=', 'Shantinagar, Dhaka', '11111111111', 'BSC', '2018-12-01', '1993-02-28', '25', 'none', '5b8465580effe.jpg', 1, 'I am a CSE student', 'C, C#, HTML, CSS, PHP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `job_post`
--
ALTER TABLE `job_post`
  ADD PRIMARY KEY (`id_jobpost`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `job_post`
--
ALTER TABLE `job_post`
  MODIFY `id_jobpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
