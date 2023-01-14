-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2023 at 09:21 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `babysitter_assistant`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `childId` varchar(100) NOT NULL,
  `start` varchar(100) NOT NULL,
  `end` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `comment` text NOT NULL,
  `eventId` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`childId`, `start`, `end`, `description`, `comment`, `eventId`) VALUES
('child_63bc62f8990bb', '2023-01-11T06:00:00', '2023-01-11T07:15:00', 'Sleep', 'Slept well?', 'event_63bf329f4381b'),
('child_63bc62f8990bb', '2023-01-11T12:45:00', '2023-01-11T13:55:00', 'Play Time', '', 'event_63bf34116e3ae'),
('child_63bc62f8990bb', '2023-01-12T02:12:00', '2023-01-12T03:45:00', 'Play Time', '', 'event_63bf4d97ba82f'),
('child_63bc62f8990bb', '2023-01-12T14:15:00', '2023-01-12T13:45:00', 'Play Time', '', 'event_63bf5055af993'),
('child_63bad39e58217', '2023-01-13T18:00:00', '2023-01-13T09:45:00', 'Sleep', '', 'event_63c1ab12dc780'),
('child_63bad39e58217', '2023-01-13T06:00:00', '2023-01-13T09:45:00', 'Sleep', '', 'event_63c1ab39b8a1e'),
('child_63bad39e58217', '2023-01-13T10:00:00', '2023-01-13T10:30:00', 'Breakfast', 'What was the breakfast?', 'event_63c1ab4de9e7d'),
('child_63baee44dfb2d', '2023-01-13T06:00:00', '2023-01-13T08:15:00', 'Sleep', '', 'event_63c1d23455925'),
('child_63baee44dfb2d', '2023-01-13T08:30:00', '2023-01-13T09:00:00', 'Breakfast', 'What was the breakfast?\r\n', 'event_63c1d24320a91'),
('child_63baee44dfb2d', '2023-01-13T09:00:00', '2023-01-13T09:15:00', 'Taking pills', '', 'event_63c1d26a752d2'),
('child_63baee44dfb2d', '2023-01-13T09:30:00', '2023-01-13T10:45:00', 'Play Time', '', 'event_63c1d2781afda'),
('child_63badffd39284', '2023-01-21T06:00:00', '2023-01-21T09:15:00', 'Sleep', 'Next time let him sleep 30 more minutes.', 'event_63cbe61be1d04'),
('child_63badffd39284', '2023-01-22T06:00:00', '2023-01-22T09:45:00', 'Sleep', '', 'event_63cd709f5cb83'),
('child_63badffd39284', '2023-01-22T10:00:00', '2023-01-22T10:15:00', 'Take a pill', '', 'event_63cd70d5c0e79'),
('child_63badffd39284', '2023-01-22T10:15:00', '2023-01-22T10:45:00', 'Breakfast', '', 'event_63cd71815257a'),
('child_63bc62f8990bb', '2023-01-26T06:00:00', '2023-01-26T09:30:00', 'Sleep', '', 'event_63d2e00ab710b');

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `parentId` varchar(100) NOT NULL,
  `babysitterId` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `name`, `age`, `parentId`, `babysitterId`) VALUES
('child_63bad39e58217', 'Bob Sonic', 2, 'parent_63b944866caa9', 'babysitter_63bae5c175c80'),
('child_63badffd39284', 'Sam Sonic', 1, 'parent_63b944866caa9', 'babysitter_63bae5c175c80'),
('child_63baee44dfb2d', 'Ross Sonic', 3, 'parent_63b944866caa9', 'babysitter_63bae5c175c80'),
('child_63bc62f8990bb', 'Tim Craig', 2, 'parent_63bc62e82dbcb', 'babysitter_63bae5c175c80'),
('child_63bf0fea60738', 'Mona Smoke', 4, 'parent_63bf0fd80311a', 'babysitter_63bae9056b51e'),
('child_63d29d7a47718', 'Ross Ross', 1, 'parent_63bc62e82dbcb', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `address`, `phone`, `name`, `email`, `password`, `user_type`) VALUES
('babysitter_63bae5c175c80', 'Samantha Green', 'st. Rojesrs, No. 5', '086453215', 'sGreen7', 'babySitter@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'babysitter'),
('babysitter_63bae9056b51e', 'Tom Franc', 'str. Rootrs, No. 90', '0123456789', 'TFranc', 'TFranc@abv.bg', '25f9e794323b453885f5181f1b624d0b', 'babysitter'),
('babysitter_63bae9f61f7d5', 'Frosha Gris', 'str. Tree rocks No5', '0231557463', 'frosha', 'fGrist@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'babysitter'),
('parent_63b944866caa9', 'Dave Sonic', 'New York, 75th. street', '0888888888889', 'dSonic', 'parent@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'parent'),
('parent_63bc62e82dbcb', 'Dane Craig', 'str No 8', '12345546', 'otherParent', 'otherParent@abv.bg', '25f9e794323b453885f5181f1b624d0b', 'parent'),
('parent_63bf0fd80311a', 'Danny Smoke', 'London, 75th. street', '01252365', 'dSmoke', 'dSmoke@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'parent');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`eventId`),
  ADD UNIQUE KEY `eventId` (`eventId`),
  ADD KEY `childId` (`childId`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `parentId` (`parentId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calendar`
--
ALTER TABLE `calendar`
  ADD CONSTRAINT `calendar_ibfk_1` FOREIGN KEY (`childId`) REFERENCES `children` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `children`
--
ALTER TABLE `children`
  ADD CONSTRAINT `children_ibfk_1` FOREIGN KEY (`parentId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
