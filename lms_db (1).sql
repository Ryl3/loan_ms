-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 10:29 AM
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
-- Database: `lms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthdate` date NOT NULL,
  `age` int(10) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `bank_account_number` varchar(20) NOT NULL,
  `card_holder_name` varchar(50) NOT NULL,
  `tin_number` varchar(20) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_address` text NOT NULL,
  `company_phone_number` varchar(20) NOT NULL,
  `position` varchar(50) NOT NULL,
  `monthly_earnings` decimal(10,2) NOT NULL,
  `proof_billing` text NOT NULL,
  `valid_id` text NOT NULL,
  `coe` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `account_type` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `address`, `gender`, `birthdate`, `age`, `contact_number`, `bank_name`, `bank_account_number`, `card_holder_name`, `tin_number`, `company_name`, `company_address`, `company_phone_number`, `position`, `monthly_earnings`, `proof_billing`, `valid_id`, `coe`, `created_at`, `updated_at`, `account_type`, `status`, `user_type`) VALUES
(1, 'terminator', '$2y$10$dr/q2RwraO3ZXaqnXFVilOyG9uZ.7qNnrPPSBXtH9S5', 'terminator@gmail.com', 'term inator', 'Vito minglanilla cebu', 'Male', '2001-11-14', 22, '+639456851493', 'ChinaBank', '2345678', 'Terminator', '1234567', 'Mercy Please', 'Cebu City', '06532641503', 'Manager', 50000.00, 'uploads/q.jpg', 'uploads/q.jpg', 'uploads/q.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Basic', 'pending', 'user'),
(2, 'samsam', '3c8b801054480c210244e04e63af2772276b5d3f', 'samsam@gmail.com', 'Samuel Macua', 'Naga', 'Male', '2002-11-22', 21, '+639653152642', 'ChinaBank', '2345678', 'Samuel Macua', '234567', 'Wire Inc.', 'Carcar', '09658462513', 'Manager', 45000.00, 'uploads/q.jpg', 'uploads/q.jpg', 'uploads/q.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Basic', 'pending', 'user'),
(3, 'nazareno', '11c6ca9ba4a5099107a2927cd75f6a20ceee3783', 'nazareno@gmail.com', 'Keith Nazareno', 'Minglanilla', 'Male', '2002-10-23', 21, '+639456851493', 'ChinaBank', '3254652135', 'Keith Nazareno', '234567', 'Mercy Please', 'vito', '09658462513', 'Manager', 15000.00, 'uploads/q.jpg', 'uploads/q.jpg', 'uploads/q.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Basic', 'pending', 'user'),
(4, 'veronica', '585637d17593e3832673e2ab78aeec21c688ba55', 'veronica@gmail.com', 'veronica flame', 'min', 'Male', '2008-02-21', 16, '+639456851493', 'ChinaBank', '2345678', 'veronica flame', '234567', 'Mercy Please', 'vito', '+639584658457', 'Manager', 15000.00, 'uploads/q.jpg', 'uploads/q.jpg', 'uploads/q.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Basic', 'pending', 'user'),
(5, 'tyburwill', 'a5693005f6f3c77584a96eee7454f6c43331983f', 'tyburwill@gmail.com', 'Tybur Will', 'vito', 'Male', '2001-11-21', 22, '+639456851493', 'ChinaBank', '2345678', 'Tybur Will', '234567', 'Mercy Please', 'vito', '1234567', 'Manager', 20000.00, 'uploads/q.jpg', 'uploads/q.jpg', 'uploads/q.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Basic', 'pending', 'user'),
(6, 'yowyow', '58bbbc7863de1c9cd617e4084afc50d6bb486f8a', 'yowyow@gmail.com', 'yow', 'Minglanilla', 'Male', '2024-04-29', 0, '+639456851493', 'ChinaBank', '3254652135', 'wow', '234567', 'Julie\'s Bakeshop', 'Cebu City', '1234567', 'Manager', 12222.00, 'uploads/28828604_1762397517114996_4476939489817947925_o.jpg', 'uploads/BP.png', 'uploads/2x2 no SB.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Basic', 'pending', 'user'),
(7, 'mordekai', '285c2001353ef19359b441c77866dc314d08438d', 'mordekai@gmail.com', 'mordekai', 'vito', 'Male', '2003-06-17', 20, '+639455673456', 'ChinaBank', '2345678', 'Keith Nazareno', '234567', 'Mercy Please', 'vito', '+639584658457', 'Manager', 15000.00, 'uploads/q.jpg', 'uploads/q.jpg', 'uploads/q.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Basic', 'pending', 'user'),
(8, 'justine', '$2y$10$XB6owfUUo.vzQfbg7Eg.dukJaDx4fgYznRcE8UxUQ/A', 'sammacua23@gmail.com', 'justine', 'Minglanilla', 'Male', '2024-05-02', 0, '+639455673456', 'ChinaBank', '3254652135', 'Keith Nazareno', '234567', 'Julie&#039;s Bakeshop', 'sam', '09658462513', 'Manager', 12222.00, 'uploads/2x2 (2).png', 'uploads/2x2 (2).png', 'uploads/2x2 (2).png', '2024-05-16 09:47:16', '2024-05-16 09:47:16', 'Premium', 'Pending', 'User'),
(9, 'justine', '$2y$10$38lHbSFPfaWbyK6Z.Llgje1H99auVJ1JlMMCIR2ga8Q', 'sammacua23@gmail.com', 'justine', 'Minglanilla', 'Male', '2024-05-02', 0, '+639455673456', 'ChinaBank', '3254652135', 'Keith Nazareno', '234567', 'Julie&#039;s Bakeshop', 'sam', '09658462513', 'Manager', 12222.00, 'uploads/2x2 (2).png', 'uploads/2x2 (2).png', 'uploads/2x2 (2).png', '2024-05-16 09:50:09', '2024-05-16 09:50:09', 'Premium', 'Pending', 'User'),
(10, 'naninani', '$2y$10$41LY9borwI/OdOeKoVmJdeBaJeYo4mEQQzvq9C6ppiB', 'sammacua@yahoo.com', 'nani', 'Minglanilla', 'Male', '2024-01-31', 0, '+639456851493', 'ChinaBank', '2345678', 'wow', '6542513021', 'Julie&#039;s Bakeshop', 'Cebu City', '09658462513', 'Manager', 122222.00, 'uploads/10.png', 'uploads/10.png', 'uploads/baby2.jpg', '2024-05-16 09:57:09', '2024-05-16 09:57:09', 'Premium', 'Pending', 'User'),
(11, 'jhonry', '$2y$10$/k/W1dK5y12n1BxC1L/HJu3E6p2RvCe3vkeh8I8.g2p', 'sammacua@yahoo.com', 'jhonry', 'Minglanilla', 'Male', '2022-02-02', 2, '+639456851493', 'ChinaBank', '3254652135', 'Keith Nazareno', '6542513021', 'Julie&#039;s Bakeshop', 'vito', '09658462513', 'Manager', 12222.00, 'uploads/2x2.png', 'uploads/10.png', 'uploads/10.png', '2024-05-16 10:04:06', '2024-05-16 10:04:06', 'Premium', 'Pending', 'User'),
(12, 'aaronryle', '$2y$10$p.xu6GlTpm0dokh9GxwJcuSsypiZd5E2aFyu9z8BUud', 'lego@gmail.com', 'aaron', 'Minglanilla', 'Male', '2024-05-01', 0, '+639455673456', 'ChinaBank', '2345678', 'Keith Nazareno', '234567', 'Julie&#039;s Bakeshop', 'Cebu City', '09658462513', 'Manager', 12222.00, 'uploads/2x2 (2).png', 'uploads/2x2 (2).png', 'uploads/2x2 (2).png', '2024-05-16 10:28:24', '2024-05-16 10:28:24', 'Premium', 'Pending', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
