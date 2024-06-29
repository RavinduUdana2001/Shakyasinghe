-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 15, 2024 at 08:58 AM
-- Server version: 10.6.17-MariaDB-cll-lve
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srispvvr_db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `fname`, `lname`) VALUES
(1, 'srishakyasinhesarasavilk@gmail.com\n', '6TKArhcUC', 'Thushitha', 'Adhikari');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `district_name` varchar(45) NOT NULL,
  `province_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `district_name`, `province_id`) VALUES
(1, 'polonnaruwa', 1),
(2, 'Ampara', 3),
(3, 'Anuradhapura	', 1),
(4, 'Badulla', 8),
(5, 'Batticaloa', 3),
(6, 'Colombo', 9),
(7, 'Galle', 7),
(8, 'Gampaha', 9),
(9, 'Hambantota', 7),
(10, 'Jaffna', 4),
(11, 'Kalutara', 9),
(12, 'Kandy', 2),
(13, 'Kegalle', 6),
(14, 'Kilinochchi', 4),
(15, 'Kurunegala', 5),
(16, 'Mannar', 4),
(17, 'Matale', 2),
(18, 'Monaragala', 8),
(19, 'Mullaitivu', 4),
(20, 'Nuwara Eliya', 2),
(21, 'Puttalam', 5),
(22, 'Ratnapura', 6),
(23, 'Trincomalee', 3),
(24, 'Vavuniya', 4);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `header` varchar(100) NOT NULL DEFAULT '0',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_images`
--

CREATE TABLE `event_images` (
  `id` int(11) NOT NULL,
  `img_path` varchar(200) NOT NULL,
  `events_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `gender_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender_name`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `full_name` varchar(200) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `division` varchar(100) NOT NULL,
  `nic` varchar(45) NOT NULL,
  `birthday` date NOT NULL,
  `birth_place` varchar(45) NOT NULL,
  `job` varchar(100) NOT NULL,
  `mobile` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `district_id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `member_id` varchar(100) DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `expier_date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members_has_receipt`
--

CREATE TABLE `members_has_receipt` (
  `members_user_email` varchar(200) NOT NULL,
  `receipt_receipt_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_images`
--

CREATE TABLE `profile_images` (
  `img_path` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `profile_images`
--

INSERT INTO `profile_images` (`img_path`, `user_email`) VALUES
('resources/profile_images/kavindusinghapura64@gmail.com_66447dcfab429.jpeg', 'kavindusinghapura64@gmail.com'),
('resources/profile_images/movindu@gmail.com_662bf0b4eca50.jpeg', 'movindu@gmail.com'),
('resources/profile_images/codenestlk24@gmail.com_662cc7be355c7.jpeg', 'codenestlk24@gmail.com'),
('resources/profile_images/codenestlk@gmail.com_662d3acec6376.jpeg', 'codenestlk@gmail.com'),
('resources/profile_images/kavindusinghapura@gmail.com_662d546a5c28d.jpeg', 'kavindusinghapura@gmail.com'),
('resources/profile_images/jananinethara@gmail.com_662e1932237b2.jpeg', 'jananinethara@gmail.com'),
('resources/profile_images/kavinduwari@gmail.com_662e441c36616.jpeg', 'kavinduwari@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `province_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `province_name`) VALUES
(1, 'North centrel'),
(2, ' Central'),
(3, 'Eastern'),
(4, 'Northern'),
(5, 'North Western'),
(6, ' Sabaragamuwa'),
(7, ' Southern'),
(8, 'Uva'),
(9, ' Western');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `img_path` varchar(200) NOT NULL,
  `receipt_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`img_path`, `receipt_id`) VALUES
('resources/receipt/movindu@gmail.com_662b2d5d52eab.jpeg', '662b2d5d53113'),
('resources/receipt/ksinghapura64@gmail.com_662b3257716e7.jpeg', '662b3257722b8'),
('resources/receipt/ksinghapura64@gmail.com_662b3533eeae4.jpeg', '662b3533eedd0'),
('resources/receipt/ksinghapura64@gmail.com_662b38adc3bce.jpeg', '662b384388349'),
('resources/receipt/kavindusinghapura64@gmail.com_662b7000c619c.jpeg', '662b7000c654c'),
('resources/receipt/kavindusinghapura64@gmail.com_662bb1869a218.jpeg', '662bb1869a7bd'),
('resources/receipt/movindu@gmail.com_662bb44da508e.jpeg', '662bb44da5350'),
('resources/receipt/kavindusinghapura64@gmail.com_662bec017e825.jpeg', '662bec017ee01'),
('resources/receipt/kavindusinghapura64@gmail.com_662bec900317f.jpeg', '662bec5ee3271'),
('resources/receipt/kavindusinghapura64@gmail.com_662bee1f3d9d7.jpeg', '662bee1f3de21'),
('resources/receipt/movindu@gmail.com_662befbcc4eaf.jpeg', '662befbcc51ac'),
('resources/receipt/movindu@gmail.com_662bf03f36d26.jpeg', '662bf03f37205'),
('resources/receipt/movindu@gmail.com_662c8cfe7b421.jpeg', '662c8cfe7b72e'),
('resources/receipt/codenestlk24@gmail.com_662cc861abd83.jpeg', '662cc861abf71'),
('resources/receipt/codenestlk24@gmail.com_662cc9fa6cfcd.jpeg', '662cc9fa6d129'),
('resources/receipt/kavindusinghapura64@gmail.com_662d4593e9d7a.jpeg', '662d3f5d50d2e'),
('resources/receipt/kavindusinghapura@gmail.com_662d4b5ca57b9.jpeg', '662d4b5ca5a79'),
('resources/receipt/kavindusinghapura@gmail.com_662d4bdbc048d.jpeg', '662d4bdbc06ba'),
('resources/receipt/ksinghapura76@gmail.com_662dcba07e8d8.jpeg', '662dcba07eb71'),
('resources/receipt/jananinethara@gmail.com_662e19c8c2f16.jpeg', '662e19c8c30b4'),
('resources/receipt/kavinduwari@gmail.com_662e42fe774d5.jpeg', '662e42fe77621'),
('resources/receipt/kavinduwari@gmail.com_662e4504750af.jpeg', '662e450475279'),
('resources/receipt/kavindusinghapura64@gmail.com_662f15d6207d0.jpeg', '662f15d62090c');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(10) NOT NULL,
  `verification_code` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`fname`, `lname`, `email`, `password`, `verification_code`) VALUES
('Ravindu', 'Singhapura', 'codenestlk24@gmail.com', '123456', NULL),
('Ravindu', 'Singhapura', 'codenestlk@gmail.com', '2001', '662cd9d2ef4da'),
('Janani', 'upeksha', 'jananinethara@gmail.com', 'ravindu', NULL),
('kavindu', 'singhapura', 'kavindusinghapura64@gmail.com', '123456', '662e29876eae3'),
('kavindu', 'singhapura', 'kavindusinghapura@gmail.com', '1234567', NULL),
('hiruni ', 'induwari', 'kavinduwari@gmail.com', 'Hiru02#@', NULL),
('Ksjsjx', 'Jsjsjs', 'kkkk@gmail.com', '$2y$10$76Y', NULL),
('kavindu', 'singhapura', 'ksinghapura123@gmail.com', '$2y$10$R6t', NULL),
('john', 'doe', 'ksinghapura64@gmail.com', '123456', NULL),
('kavindu', 'singhapura', 'ksinghapura76@gmail.com', '123456', NULL),
('ramiru', 'bandula', 'ksinghapura@gmail.com', '123456', NULL),
('heshan', 'gagana', 'movindu@gmail.com', '123456', '662bea7034558'),
('kavindu', 'singhapura', 'zsdsfsfs@gmail.com', '1234567', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_district_province1_idx` (`province_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_images`
--
ALTER TABLE `event_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_event_images_events1_idx` (`events_id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`user_email`),
  ADD KEY `fk_members_user1_idx` (`user_email`),
  ADD KEY `fk_members_district1_idx` (`district_id`),
  ADD KEY `fk_members_gender1_idx` (`gender_id`);

--
-- Indexes for table `members_has_receipt`
--
ALTER TABLE `members_has_receipt`
  ADD PRIMARY KEY (`members_user_email`),
  ADD KEY `fk_members_has_receipt_members1_idx` (`members_user_email`),
  ADD KEY `fk_members_has_receipt_receipt1_idx` (`receipt_receipt_id`);

--
-- Indexes for table `profile_images`
--
ALTER TABLE `profile_images`
  ADD KEY `fk_profile_images_user_idx` (`user_email`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `event_images`
--
ALTER TABLE `event_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `fk_district_province1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`);

--
-- Constraints for table `event_images`
--
ALTER TABLE `event_images`
  ADD CONSTRAINT `fk_event_images_events1` FOREIGN KEY (`events_id`) REFERENCES `events` (`id`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `fk_members_district1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`),
  ADD CONSTRAINT `fk_members_gender1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  ADD CONSTRAINT `fk_members_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`);

--
-- Constraints for table `members_has_receipt`
--
ALTER TABLE `members_has_receipt`
  ADD CONSTRAINT `fk_members_has_receipt_members1` FOREIGN KEY (`members_user_email`) REFERENCES `members` (`user_email`),
  ADD CONSTRAINT `fk_members_has_receipt_receipt1` FOREIGN KEY (`receipt_receipt_id`) REFERENCES `receipt` (`receipt_id`);

--
-- Constraints for table `profile_images`
--
ALTER TABLE `profile_images`
  ADD CONSTRAINT `fk_profile_images_user` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
