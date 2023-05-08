-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 10:29 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) UNSIGNED NOT NULL,
  `roomid` int(11) NOT NULL,
  `studentregno` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `roomid`, `studentregno`, `date`) VALUES
(45, 4, '9', '2023-05-02'),
(46, 3, '17', '2023-05-03'),
(53, 16, '14', '2023-05-03'),
(54, 1, '17', '2023-05-03');

-- --------------------------------------------------------

--
-- Table structure for table `foodbookings`
--

CREATE TABLE `foodbookings` (
  `id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `reg` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foodbookings`
--

INSERT INTO `foodbookings` (`id`, `food_id`, `reg`, `date`) VALUES
(18, 2, '14', '2023-05-03'),
(19, 4, '17', '2023-05-03'),
(22, 5, '17', '2023-05-03');

-- --------------------------------------------------------

--
-- Table structure for table `food_menu`
--

CREATE TABLE `food_menu` (
  `food_id` int(11) NOT NULL,
  `diet_type` varchar(50) DEFAULT NULL,
  `food` varchar(100) DEFAULT NULL,
  `Day` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_menu`
--

INSERT INTO `food_menu` (`food_id`, `diet_type`, `food`, `Day`) VALUES
(1, 'special', 'Ugali and Sukuma Wiki', '2023-04-20'),
(2, 'normal', 'Chapati and Kachumbari', '2023-04-21'),
(3, 'special', 'Nyama Choma and Ugali', '2023-04-22'),
(4, 'normal', 'Matoke and Beef Stew', '2023-04-23'),
(5, 'special', 'Fish Fry and Ugali', '2023-04-24'),
(6, 'normal', 'Pilau and Kachumbari', '2023-04-25'),
(7, 'special', 'Mukimo and Beef Stew', '2023-04-26'),
(8, 'normal', 'Chips and Chicken', '2023-04-27'),
(9, 'special', 'Githeri and Fried Beef', '2023-04-28'),
(11, 'Normal', 'Matoke and Beef', '2023-04-29'),
(12, 'Special', 'Ugali and Kales', '2023-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `max_occupants` int(11) NOT NULL,
  `status` text NOT NULL DEFAULT 'empty'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_type`, `fee`, `max_occupants`, `status`) VALUES
(1, 'single', '5000.00', 1, 'full'),
(2, 'shared', '6000.00', 2, 'full'),
(3, 'single', '5000.00', 1, 'full'),
(4, 'shared', '6000.00', 2, 'full'),
(6, 'shared', '6000.00', 2, 'full'),
(8, 'shared', '6000.00', 2, 'empty'),
(9, 'single', '5000.00', 1, 'full'),
(16, 'single', '234.00', 1, 'full'),
(17, 'single', '8000.00', 1, 'Empty');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `reg` int(20) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `idno` int(20) NOT NULL,
  `dob` date NOT NULL,
  `phone` int(10) NOT NULL,
  `county` varchar(30) NOT NULL,
  `contact` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`reg`, `userid`, `fname`, `lname`, `email`, `idno`, `dob`, `phone`, `county`, `contact`) VALUES
(345353, 18, 'Mitchel', 'Itindi', 'mitchel@gmail.com', 5345635, '2009-06-03', 2147483647, 'Machakos', 4546763),
(1036551, 19, 'Amos', 'Mugendi', 'amosmugendi07@gmail.com', 37563997, '2000-05-17', 793805246, 'Meru', 722899678),
(2147483647, 17, 'Collins', 'Kiptoo', 'collins222@gmail.com', 765436, '2023-04-30', 12312321, 'Nairobi City', 1412412);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` text NOT NULL DEFAULT 'web_user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`) VALUES
(5, 'admin@gmail.com', '60578aa9639d094139ee2fd503cfa364', 'admin'),
(17, 'collins222@gmail.com', '1ca97c025e7bdc6d927ac81e93692ca2', 'web_user'),
(18, 'mitchel@gmail.com', 'bfbad79be8f01145677a4acc857c5daf', 'web_user'),
(19, 'amosmugendi07@gmail.com', '6f9a6706ad1b029601e6a4e8699334a1', 'web_user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roomid` (`roomid`);

--
-- Indexes for table `foodbookings`
--
ALTER TABLE `foodbookings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `food_id` (`food_id`);

--
-- Indexes for table `food_menu`
--
ALTER TABLE `food_menu`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`reg`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `foodbookings`
--
ALTER TABLE `foodbookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `food_menu`
--
ALTER TABLE `food_menu`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `reg` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`roomid`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `student_details`
--
ALTER TABLE `student_details`
  ADD CONSTRAINT `student_details_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
