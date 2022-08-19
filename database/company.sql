-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2022 at 02:39 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `role`, `password`, `date`) VALUES
(4, 'admin', 'admin@example.com', 'admin', '$2y$12$HP9yMU7ND.83aak5UmmDM.xXm24RuxXcq8cEfhPgCS5C2yoA8jM0q', '2018-08-07 01:23:11'),
(6, '', 'dfdf@gmail.com', 'manager', '$2y$12$QeJTuqzcjMdDHkP4VIzXueo1gNaTrjF7hmYzNlXjNcjuQaKLvRtS.', '2022-08-17 21:19:02'),
(7, 'awishka yohan', 'yohanaaa@gmail.coaa', 'staff', '$2y$12$63O0jRsIinhvMJoW9CdeTOeZi/Mb3UBjpyBY6QITnxL15ibuvm7Tq', '2022-08-17 21:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `status` varchar(255) NOT NULL,
  `blogid` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `status`, `blogid`, `date`) VALUES
(1, 'Jaden', 'Awesome post guys!!', '', 6, '2018-07-28 00:15:59'),
(6, 'Cliff', 'I really relate to this', '', 5, '2018-07-28 01:00:14'),
(8, 'Ethredah', 'nice', 'open', 7, '2018-07-29 21:10:30');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `names` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `names`, `email`, `message`, `date`) VALUES
(2, 'Chao', 'chao@gmail.com', 'Hi there!!', '2018-07-27 16:57:59'),
(4, 'James Mlamba', 'jaymo@gmail.com', 'I am interested in a meeting.', '2018-07-28 01:38:22'),
(5, 'James Mlamba', 'ethredah@gmail.com', 'hi', '2018-07-31 19:45:43'),
(8, 'indrawansha', 'indrawansha@gmail.com', 'system testing ', '2022-08-18 20:25:18');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `nic` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(500) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `image_pro` varchar(1000) NOT NULL,
  `assign` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `fname`, `lname`, `nic`, `phone`, `email`, `birthday`, `address`, `gender`, `image_pro`, `assign`) VALUES
(4, 'yohan', 'awishka', '200008600315', '0778956235', 'yohanawishka2000326@gmail.com', '2022-08-02', '18 lakshman garden colombo road divulapitiya', 'Male', 'IMG_20210115_123148_005.jpg', 'active'),
(7, 'yohan', 'indrawansha', '200008600315', '0781667268', 'indrawansha@gmail.com', '2000-03-26', '178,ullalapola,divulapitiya', 'Male', 'WhatsApp Image 2021-11-14 at 19.46.18ghj.png', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `id` int(11) NOT NULL,
  `number` varchar(15) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`id`, `number`, `status`, `date`) VALUES
(7, '0778956235', '', '2022-08-16 13:34:45'),
(11, '0775149044', '', '2022-08-18 20:08:53');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(2, 'admin'),
(3, 'manager'),
(4, 'staff'),
(5, 'supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `date`) VALUES
(3, 'ethredah@gmail.com', '2018-07-27 18:21:30'),
(4, 'james@hack3.io', '2018-07-27 18:21:30'),
(6, 'admin@pikash.sales', '2018-07-28 01:49:21'),
(7, 'test@gmail.com', '2022-08-11 18:48:45'),
(8, 'yohanawishka2000326@gmail.com', '2022-08-13 12:30:49'),
(9, 'indrawansha@gmail.com', '2022-08-18 20:25:50');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `tasktype` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `admin_remark` varchar(1000) NOT NULL,
  `admin_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `subject`, `tasktype`, `priority`, `description`, `status`, `date`, `admin_remark`, `admin_date`) VALUES
(1, 'helo', 'ot1', 'non-urgent', 'hi hi', 'closed', '2022-08-16 18:56:35', 'ssssa', '2022-08-17 19:12:09'),
(4, 'Create Ticket', 'ot1', 'important', 'I want create ticket and manage ticket', 'closed', '2022-08-18 00:57:38', 'solved', '2022-08-17 19:27:38'),
(5, 'ddssd', 'ot2', 'question', 'sdsdsd', 'closed', '2022-08-18 01:29:23', 'sdsd', '2022-08-17 19:59:23'),
(6, 'testing ', 'ot3', 'urgent(functional problem)', 'system testing part 02', '', '2022-08-18 20:09:47', '', '2022-08-18 14:39:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) CHARACTER SET latin1 NOT NULL,
  `lname` varchar(100) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(200) CHARACTER SET latin1 NOT NULL,
  `password` varchar(500) CHARACTER SET latin1 NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `phone`, `email`, `password`, `date`) VALUES
(2, 'awishka', 'yohan', '0778956235', 'yohan1@gmail.com', '$2y$12$XQ2jokySAgVn8U7iITVgGuP3OqVA.XjzWdm7KZi5kQAS0ulC6w1Q2', '2022-08-13 12:08:43'),
(3, 'fdhgdgfh', 'dfghfdgh', '5656', 'fhfcgh@gmail.com', 'dsdsd', '2022-09-01 11:25:39'),
(5, 'yohan', 'awishka', '0778956235', 'yohanawishka2000326@gmail.com', '$2y$12$h7ZUITY6qgIqOvjWQZ48x.1/jlcpxrzhWixxLoLo3reJX6tBvHVBK', '2022-08-17 18:59:51'),
(6, 'yohan', 'indrawansha', '0781667268', 'indrawansha@gmail.com', '$2y$12$o3CzRrhh6XkUmeCOK74v9uSveQyITeugZeFGRO5ZU75oVl9AhN5Ba', '2022-08-18 20:03:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogid` (`blogid`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
