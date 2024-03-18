-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2024 at 01:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dentalcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant_payment`
--

CREATE TABLE `applicant_payment` (
  `payment_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `official_receipt` varchar(100) NOT NULL,
  `service` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date_created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicant_payment`
--

INSERT INTO `applicant_payment` (`payment_id`, `applicant_id`, `name`, `official_receipt`, `service`, `amount`, `date_created`) VALUES
(38, 50, 'Mark Lumongsod', '2023-231267', 'Braces', '45,000.00', '2023-09-13 01:15:03 PM'),
(39, 54, 'James Albert', '2023-123213', 'Whitening', '1,000.00', '2023-09-18 05:12:40 PM');

-- --------------------------------------------------------

--
-- Table structure for table `booking_applicant`
--

CREATE TABLE `booking_applicant` (
  `booking_id` int(11) NOT NULL,
  `appointment_code` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `service` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `appointment_date` varchar(50) NOT NULL,
  `appointment_time` varchar(50) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `date_created` varchar(50) NOT NULL,
  `doctor_assigned` varchar(100) NOT NULL,
  `dental_records` varchar(100) NOT NULL,
  `proof_payment` varchar(100) NOT NULL,
  `timestamp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_applicant`
--

INSERT INTO `booking_applicant` (`booking_id`, `appointment_code`, `name`, `email`, `phone_number`, `service`, `price`, `appointment_date`, `appointment_time`, `remark`, `date_created`, `doctor_assigned`, `dental_records`, `proof_payment`, `timestamp`) VALUES
(56, 'OM063-0000069556', 'Mark Lumongsod', 'mark@example.com', '09123456789', 'Resto', '800', '2023-10-31', '9:30am - 10:30am', 'Completed', '2023-10-31 09:17:39 AM', 'Mark Lumongsod', '', '', ''),
(57, 'OM063-0000057937', 'Mark Lumongsod', 'mark@example.com', '09123456789', 'Extraction', '800', '2023-10-31', '10:30am - 11:30am', 'Completed', '2023-10-31 09:24:37 AM', 'Mark Lumongsod', '', '', ''),
(58, 'OM063-0000084221', 'Mark Lumongsod', 'mark@example.com', '23213213223', 'Denture', '2500', '2023-11-01', '9:30am - 10:30am', 'Failure to attend', '2023-10-31 09:51:38 AM', 'Mark Lumongsod', '', '', ''),
(85, 'OM063-0000010221', 'Meak Aumer', 'marklumongsod78@gmail.com', '09123456789', 'Braces', '45000', '2024-03-15', '3:30pm - 4:30pm', 'Pending', '2024-03-15 10:49:20 AM', ' ', '', '', ''),
(86, 'OM063-0000032514', 'Jay Lumongsod', 'marklumongsod78@gmail.com', '09651284885', 'Extraction', '800', '2024-03-14', '10:30am - 11:30am', 'Pending', '2024-03-15 11:13:57 AM', ' ', 'https://drive.google.com/open?id=1Lp17ZnyGgSeimT3s70--MXU_pZDTHva1', 'https://drive.google.com/open?id=1sbj99GGN9GOsWy054F3PA0cXRZv788eA', '3/14/2024 22:59:14'),
(87, 'OM063-0000059676', 'Ivan Garcia', 'ivangarcia@gmail.com', '0912345678', 'Veneers', '8500', '2024-03-15', '9:30am - 10:30am', 'Pending', '2024-03-15 11:13:57 AM', ' ', 'https://drive.google.com/open?id=1vAvXa2t6_qgoiNHG4nEMKPbAoQj-myyo', 'https://drive.google.com/open?id=17qE2BV2ozNJNA7XOIJeuJybamTVIj8ep', '3/15/2024 10:08:35'),
(88, 'OM063-0000043696', 'Ralph Anton', 'marklumongsod78@gmail.com', '09123456789', 'Root Canal', '5000', '2024-03-29', '1:00pm - 2:00pm', 'Pending', '2024-03-15 07:54:05 PM', ' ', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `full_name`, `contact_number`, `status`, `created_at`) VALUES
(1, 'Mark Lumongsod', '09123456789', 'Active', '2024-03-05'),
(2, 'Alynette Lumongsod', '0912345678', 'Active', '2024-03-11'),
(3, 'Jay Lumongsod', '0912345678', 'Active', '2024-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `email_notification`
--

CREATE TABLE `email_notification` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `email_notification`
--

INSERT INTO `email_notification` (`id`, `email`) VALUES
(1, 'simistra07@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `equipment_name` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `equipment_name`, `quantity`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Probe', '5', 'upload/equipmentsME-548-5.jpg', '2024-03-15 16:22:34', 'March 15, 2024 04:27:37 PM');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `supply_name` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `date_created` varchar(100) NOT NULL,
  `update_created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `supply_name`, `quantity`, `date_created`, `update_created`) VALUES
(1, 'Mouthwash', '10', '2023-09-13 01:15:03 PM', '2023-09-17 02:43:18 PM'),
(4, 'Explorer', '5', '2023-09-17 02:44:43 PM', ' '),
(5, 'Bib', '5', '2023-09-17 02:46:02 PM', ' '),
(6, 'Bib Clip', '5', '2023-09-17 02:46:13 PM', ' '),
(7, 'Cheek Retractor', '15', '2023-09-17 02:46:35 PM', ' '),
(8, 'Torch', '10', '2023-09-17 02:46:45 PM', ' '),
(9, 'Distal End Cutter', '5', '2023-09-17 02:47:06 PM', ' '),
(10, 'Ligature Wire', '15', '2023-09-17 02:47:28 PM', ' '),
(11, 'Spoon Excavator', '10', '2023-09-17 02:47:48 PM', ' '),
(12, 'Burs', '10', '2023-09-17 02:47:58 PM', ' '),
(13, 'Composites', '10', '2023-09-17 02:48:09 PM', ' '),
(14, 'Dental Floss', '30', '2023-09-17 02:48:23 PM', ' '),
(15, 'Low Speed ', '5', '2023-09-17 02:48:37 PM', ' '),
(16, 'Prophy Powder', '10', '2023-09-17 02:48:54 PM', ' '),
(17, 'Matrixband', '10', '2023-09-17 02:49:06 PM', ' '),
(18, 'Anesthesia', '50', '2023-09-17 02:49:31 PM', ' '),
(19, 'K Files', '10', '2023-09-17 02:49:48 PM', ' '),
(20, 'K Spreader', '10', '2023-09-17 02:50:05 PM', ' '),
(21, 'Paper Point', '10', '2023-09-17 02:50:19 PM', ' '),
(22, 'Needle', '50', '2023-09-17 02:50:45 PM', ' '),
(23, 'Topical', '50', '2023-09-17 02:50:58 PM', ' '),
(24, 'Microbrush', '10', '2023-09-17 02:51:17 PM', ' '),
(25, 'Impression Tray', '20', '2023-09-17 02:51:34 PM', ' '),
(26, 'Ligaties', '10', '2023-09-17 02:51:43 PM', ' '),
(27, 'Deffoger ', '10', '2023-09-17 02:52:03 PM', ' '),
(28, 'Cotton Flyer', '15', '2023-09-17 02:52:14 PM', ' '),
(29, 'Mouth Mirror', '10', '2023-09-17 02:52:26 PM', ' '),
(30, 'Forceps', '15', '2023-09-17 02:52:38 PM', ' '),
(31, 'Cotton', '15', '2023-09-17 02:52:49 PM', ' '),
(32, 'Gloves', '15', '2023-09-17 02:53:02 PM', ' '),
(33, 'Gauze', '20', '2023-09-17 02:53:13 PM', ' '),
(34, 'Rubber Bowl', '25', '2023-09-17 02:53:23 PM', ' '),
(35, 'Mataw', '25', '2023-09-17 02:53:34 PM', ' '),
(36, 'Alginate', '50', '2023-09-17 02:54:07 PM', '2023-09-17 04:09:08 PM'),
(37, 'Bracket Holder', '50', '2023-09-17 02:54:21 PM', ' '),
(38, 'Wax', '20', '2023-09-17 02:54:31 PM', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `medicine_name` varchar(100) NOT NULL,
  `expiration_date` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `medicine_name`, `expiration_date`, `quantity`, `image`, `created_at`, `updated_at`) VALUES
(6, 'Mefenamic', '2024-03-30', '5', 'upload/download.jpg', '2024-03-15 15:55:01', 'March 15, 2024 04:27:51 PM');

-- --------------------------------------------------------

--
-- Table structure for table `notification_log`
--

CREATE TABLE `notification_log` (
  `id` int(11) NOT NULL,
  `medicine_id` varchar(100) NOT NULL,
  `notification_message` varchar(100) NOT NULL,
  `notification_date` varchar(100) NOT NULL,
  `is_read` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification_log`
--

INSERT INTO `notification_log` (`id`, `medicine_id`, `notification_message`, `notification_date`, `is_read`) VALUES
(3, '6', 'Reminder: The medicine \'Mefenamic\' will expire on March 30, 2024. Please take necessary action.', '2024-03-15 17:30:53', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `acc_id` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`acc_id`, `username`, `password`) VALUES
(2, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant_payment`
--
ALTER TABLE `applicant_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `booking_applicant`
--
ALTER TABLE `booking_applicant`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_notification`
--
ALTER TABLE `email_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_log`
--
ALTER TABLE `notification_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`acc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant_payment`
--
ALTER TABLE `applicant_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `booking_applicant`
--
ALTER TABLE `booking_applicant`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `email_notification`
--
ALTER TABLE `email_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notification_log`
--
ALTER TABLE `notification_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `acc_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
