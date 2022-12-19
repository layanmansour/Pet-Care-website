-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 21, 2022 at 11:21 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Pet_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `label` text NOT NULL,
  `description` text NOT NULL,
  `photo` text DEFAULT NULL,
  `photo1` text NOT NULL,
  `location` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`label`, `description`, `photo`, `photo1`, `location`, `id`) VALUES
('About Us', 'Welcome to our Petcare Veterinary Clinic! Where animals and their owners are valued and cherished. The clinic first opened its doors in Riyadh in January 2022. In Saudi Arabia, our clinic is the first of its kind. Our staff has been offering unique veterinary medical services and compassion to pets as a primary focus. We are here to keep your pets healthy by treating each client as if they were family and each pet as if it were our own. <br>Our mission is to provide quality, caring, and compassionate veterinary care to pet owners in addition to detecting diseases and providing outstanding health care.<br> We specislize in the care of cats , dogs, rabbits, birds, fish, and turtles.', 'Pet-Place1.jpg', 'Pet-Place2.jpeg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3622.7256444722366!2d46.68682081516388!3d24.77059418409634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2efd3fc8ec4aeb%3A0x605baa975e4243f9!2sAdvanced%20Pet%20Clinic!5e0!3m2!1sen!2ssa!4v1645211168968!5m2!1sen!2ssa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `appointments_requests`
--

CREATE TABLE `appointments_requests` (
  `pet_name` varchar(15) NOT NULL,
  `service` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `owner_email` varchar(25) NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  `note` varchar(150) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments_requests`
--

INSERT INTO `appointments_requests` (`pet_name`, `service`, `date`, `time`, `owner_email`, `status`, `note`, `id`) VALUES
('charile', 'Grooming', '2022-05-26', '16:30:00', 'naadaalsomali@gmail.com', 'completed', 'take care of charile', 41),
('luna', 'Boarding', '2022-05-24', '19:16:00', 'naadaalsomali@gmail.com', NULL, 'take care of luna', 42),
('Milo', 'Checkup', '2022-05-26', '18:16:00', 'layanalwadie22@gmail.com', 'completed', 'take care of Milo', 43),
('Loki', 'Checkup', '2022-05-30', '22:20:00', 'layanalwadie22@gmail.com', NULL, 'Loki took vaccine', 44),
('Zoey', 'Checkup', '2022-05-26', '04:20:00', 'S.i.AlShathri@gmail.com', 'completed', 'Zoey took vaccine', 45),
('Lulu', 'Checkup', '2022-05-25', '20:25:00', 'S.i.AlShathri@gmail.com', NULL, 'take care of lulul', 46);

-- --------------------------------------------------------

--
-- Table structure for table `available_appointments`
--

CREATE TABLE `available_appointments` (
  `service` varchar(15) NOT NULL,
  `date` varchar(15) NOT NULL,
  `time` varchar(8) NOT NULL,
  `appointment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `available_appointments`
--

INSERT INTO `available_appointments` (`service`, `date`, `time`, `appointment_id`) VALUES
('Grooming', '2022-05-22', '14:15', 25),
('Boarding', '2022-05-25', '18:15', 28),
('Checkup', '2022-05-25', '13:25', 40);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `email` varchar(35) NOT NULL,
  `password` varchar(15) NOT NULL,
  `Verification` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`email`, `password`, `Verification`) VALUES
('hano.alawwad@gmail.com', 'Aa123456', '2413');

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `ID` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `photo` text DEFAULT NULL,
  `birthDate` date NOT NULL,
  `breed` varchar(30) NOT NULL,
  `pet_status` enum('spayed','neutered') NOT NULL,
  `medicalHistory` longblob DEFAULT NULL,
  `vaccinations` longblob DEFAULT NULL,
  `gender` enum('male','female') NOT NULL,
  `owner_email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`ID`, `name`, `photo`, `birthDate`, `breed`, `pet_status`, `medicalHistory`, `vaccinations`, `gender`, `owner_email`) VALUES
(4, 'Milo', 'DemoDog.png', '2022-05-12', 'dog', 'neutered', '', '', 'female', 'layanalwadie22@gmail.com'),
(5, 'Loki', 'catR2.png', '2022-03-15', 'cat', 'neutered', '', '', 'female', 'layanalwadie22@gmail.com'),
(6, 'Zoey', 'catR.png', '2022-01-15', 'cat', 'neutered', '', '', 'female', 'S.i.AlShathri@gmail.com'),
(7, 'Lulu', 'lulu.png', '2021-12-15', 'dog', 'spayed', '', '', 'female', 'S.i.AlShathri@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pet_owner`
--

CREATE TABLE `pet_owner` (
  `email` varchar(60) NOT NULL,
  `password` varchar(30) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `phone_no` int(11) NOT NULL,
  `photo` text DEFAULT NULL,
  `Verification` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet_owner`
--

INSERT INTO `pet_owner` (`email`, `password`, `Fname`, `Lname`, `gender`, `phone_no`, `photo`, `Verification`) VALUES
('layanalwadie22@gmail.com', 'Ll123456', 'Layan', '.', 'female', 505713122, '', NULL),
('S.i.AlShathri@gmail.com', 'Ss123456', 'Sara', 'AlShathri', 'female', 582653424, 'ProfilePhoto.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `pet_name` varchar(25) NOT NULL,
  `owner_email` varchar(45) NOT NULL,
  `review` varchar(100) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `pet_name`, `owner_email`, `review`, `photo`) VALUES
(43, 'Milo', 'layanalwadie22@gmail.com', 'nice service!', 'DemoDog.png'),
(41, 'charile', 'naadaalsomali@gmail.com', 'Thank you !', 'charlie.png'),
(45, 'Zoey', 'S.i.AlShathri@gmail.com', 'nice service,thank you ! ', 'catR.png');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `servicename` text NOT NULL,
  `description` text NOT NULL,
  `price` text NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`servicename`, `description`, `price`, `photo`) VALUES
('Grooming', '    grooming session consists of the pet being brushed , bathed , and dried.  \r\n', '70', 'grooming.jpeg'),
('Boarding', 'providing a place where your pet can stay overnight or longer.  \r\n', '120', 'Boarding.jpeg'),
('Checkup', 'tests that are meant to detect any signs of health issues that your pet may be facing.\r\n', '180', 'cheakup.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments_requests`
--
ALTER TABLE `appointments_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `available_appointments`
--
ALTER TABLE `available_appointments`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `owner_email` (`owner_email`) USING BTREE;

--
-- Indexes for table `pet_owner`
--
ALTER TABLE `pet_owner`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD KEY `review_ibfk_1` (`review_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments_requests`
--
ALTER TABLE `appointments_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `available_appointments`
--
ALTER TABLE `available_appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `pet_ibfk_1` FOREIGN KEY (`owner_email`) REFERENCES `pet_owner` (`email`) ON DELETE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`review_id`) REFERENCES `appointments_requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
