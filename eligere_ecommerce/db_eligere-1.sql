-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 07:34 AM
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
-- Database: `db_eligere`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `items_id` int(11) NOT NULL,
  `item_img` varchar(255) DEFAULT NULL,
  `item_name` varchar(55) NOT NULL,
  `item_desc` text NOT NULL,
  `item_price` decimal(7,2) NOT NULL,
  `item_status` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`items_id`, `item_img`, `item_name`, `item_desc`, `item_price`, `item_status`) VALUES
(1, 'coquette.jpg', 'Coquette', 'free size ribbon bracelet', 5000.00, 'A'),
(11, 'aneri.jpg', 'Aneri', 'most sold item', 6000.00, 'A'),
(12, 'hermione.jpg', 'Hermione', '24k gold necklace', 6000.00, 'A'),
(13, 'dainty.jpg', 'Solitaire', '16k gold plated ring', 5000.00, 'A'),
(14, 'pineapple.jpg', 'Niña', 'pineapple necklace', 1500.00, 'A'),
(15, 'infinity.jpg', 'Infinite', 'infinity bracelet', 1000.00, 'A'),
(17, 'babygold.jpeg', 'Cameliah', 'sterling silver necklace', 1000.00, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `item_statuses`
--

CREATE TABLE `item_statuses` (
  `item_status_id` int(11) NOT NULL,
  `item_status_cd` char(1) NOT NULL,
  `item_status_desc` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_statuses`
--

INSERT INTO `item_statuses` (`item_status_id`, `item_status_cd`, `item_status_desc`) VALUES
(1, 'A', 'Active'),
(2, 'I', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `order_ref_number` varchar(9) DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `gcash_ref_num` varchar(55) DEFAULT NULL,
  `gcash_account_name` varchar(55) DEFAULT NULL,
  `gcash_account_number` varchar(22) DEFAULT NULL,
  `gcash_amount_sent` double DEFAULT NULL,
  `shipper_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `alternate_receiver` varchar(100) DEFAULT NULL,
  `alternate_address` varchar(100) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `item_qty` int(11) NOT NULL,
  `order_phase` varchar(1) NOT NULL DEFAULT '1' COMMENT '1 - Cart\r\n2 - Checkout\r\n3 - Pending\r\n4 - Confirmed\r\n5 - Delivered\r\n0 - Cancelled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_phase`
--

CREATE TABLE `order_phase` (
  `order_phase_id` int(11) NOT NULL,
  `order_phase_desc` varchar(55) NOT NULL,
  `order_phase_admin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_phase`
--

INSERT INTO `order_phase` (`order_phase_id`, `order_phase_desc`, `order_phase_admin`) VALUES
(1, 'Cart', ''),
(2, 'Checkout', 'New'),
(3, 'Pending', ''),
(4, 'Confirmed', ''),
(5, 'Delivered', ''),
(0, 'Cancelled', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `payment_method_id` int(11) NOT NULL,
  `payment_method_desc` varchar(55) NOT NULL,
  `payment_method_status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`payment_method_id`, `payment_method_desc`, `payment_method_status`) VALUES
(1, 'GCASH', 'A'),
(2, 'COD', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `shippers`
--

CREATE TABLE `shippers` (
  `shipper_id` int(11) NOT NULL,
  `shipping_company` varchar(55) NOT NULL,
  `shipping_address` text DEFAULT NULL,
  `shipping_company_cd` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shippers`
--

INSERT INTO `shippers` (`shipper_id`, `shipping_company`, `shipping_address`, `shipping_company_cd`) VALUES
(1, 'J&T Express', NULL, 'JTX'),
(2, 'Flash Express', NULL, 'FX'),
(3, 'SPX', 'Shoppee Express', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_info_id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `user_address` text NOT NULL,
  `contact_no` varchar(22) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_status` char(1) NOT NULL DEFAULT 'A',
  `user_type` char(1) NOT NULL DEFAULT 'C'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_info_id`, `username`, `user_password`, `fullname`, `user_address`, `contact_no`, `email`, `date_added`, `user_status`, `user_type`) VALUES
(11, 'aliyah28', 'aleya123', 'Aleya Mae T. Garma', 'Travesia, Guinobatan, Albay', '09630415084', 'aleyamaegarma@gmail.com', '2024-06-02 04:13:35', 'A', 'C'),
(12, 'mimiyuh', 'mia123', 'Mia Sevilla', 'Oas, Albay', '09126784601', 'miasevilla@gmail.com', '2024-06-02 04:16:40', 'A', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`items_id`),
  ADD KEY `item_status_items` (`item_status`);

--
-- Indexes for table `item_statuses`
--
ALTER TABLE `item_statuses`
  ADD PRIMARY KEY (`item_status_id`),
  ADD KEY `item_status_cd` (`item_status_cd`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `user_id_orders` (`user_id`),
  ADD KEY `item_id_orders` (`item_id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`payment_method_id`);

--
-- Indexes for table `shippers`
--
ALTER TABLE `shippers`
  ADD PRIMARY KEY (`shipper_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `items_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `item_statuses`
--
ALTER TABLE `item_statuses`
  MODIFY `item_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `payment_method_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shippers`
--
ALTER TABLE `shippers`
  MODIFY `shipper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `item_status_items` FOREIGN KEY (`item_status`) REFERENCES `item_statuses` (`item_status_cd`) ON DELETE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `user_id_orders` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_info_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
