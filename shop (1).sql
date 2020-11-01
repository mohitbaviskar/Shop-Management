-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2020 at 04:49 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `c_number` varchar(10) NOT NULL,
  `c_name` varchar(20) DEFAULT NULL,
  `frequency` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`c_number`, `c_name`, `frequency`) VALUES
('7070707070', 'ram', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `i_name` varchar(20) NOT NULL,
  `i_quantity` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`i_name`, `i_quantity`) VALUES
('base', 9),
('capsicum', 55),
('cheese', 20),
('onion', 34);

-- --------------------------------------------------------

--
-- Table structure for table `ingredient_supplier`
--

CREATE TABLE `ingredient_supplier` (
  `i_name` varchar(20) NOT NULL,
  `s_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ingredient_supplier`
--

INSERT INTO `ingredient_supplier` (`i_name`, `s_number`) VALUES
('base', '9090909090'),
('onion', '9090909090');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `d_name` varchar(20) NOT NULL,
  `d_description` varchar(120) DEFAULT NULL,
  `d_type` varchar(15) DEFAULT NULL,
  `d_price` int(5) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`d_name`, `d_description`, `d_type`, `d_price`) VALUES
('pizza', 'capsicum pizza', 'veg', 100);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `d_name` varchar(20) NOT NULL,
  `o_quantity` int(5) DEFAULT NULL,
  `t_id` int(11) NOT NULL,
  `o_amount` int(10) DEFAULT NULL,
  `o_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `c_number` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`d_name`, `o_quantity`, `t_id`, `o_amount`, `o_timestamp`, `c_number`) VALUES
('pizza', 1, 25, 100, '2020-11-01 15:37:46', '7070707070');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `i_name` varchar(20) NOT NULL,
  `p_quantity` int(5) DEFAULT NULL,
  `t_id` int(11) NOT NULL,
  `p_amount` int(10) DEFAULT NULL,
  `p_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `s_number` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`i_name`, `p_quantity`, `t_id`, `p_amount`, `p_timestamp`, `s_number`) VALUES
('onion', 12, 26, 70, '2020-11-01 15:39:16', '9090909090');

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `d_name` varchar(20) NOT NULL,
  `i_name` varchar(20) NOT NULL,
  `r_quantity` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`d_name`, `i_name`, `r_quantity`) VALUES
('pizza', 'base', 1),
('pizza', 'capsicum', 5);

-- --------------------------------------------------------

--
-- Table structure for table `staff_details`
--

CREATE TABLE `staff_details` (
  `e_number` varchar(10) NOT NULL,
  `designation` varchar(10) DEFAULT NULL,
  `e_name` varchar(20) DEFAULT NULL,
  `salary` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_details`
--

INSERT INTO `staff_details` (`e_number`, `designation`, `e_name`, `salary`) VALUES
('8080808080', 'cook', 'a', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_info`
--

CREATE TABLE `supplier_info` (
  `s_name` varchar(20) DEFAULT NULL,
  `s_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_info`
--

INSERT INTO `supplier_info` (`s_name`, `s_number`) VALUES
('alex', '9090909090');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `t_id` int(11) NOT NULL,
  `t_type` varchar(10) DEFAULT NULL,
  `t_description` varchar(20) DEFAULT NULL,
  `t_amount` int(10) DEFAULT NULL,
  `t_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`t_id`, `t_type`, `t_description`, `t_amount`, `t_timestamp`) VALUES
(25, 'bill', 'pizza quantity-1 cus', 100, '2020-11-01 15:37:46'),
(26, 'payment', 'onion quantity-12 su', 70, '2020-11-01 15:39:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(25) NOT NULL,
  `password` varchar(16) DEFAULT NULL,
  `u_type` varchar(10) DEFAULT NULL,
  `u_number` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `u_type`, `u_number`) VALUES
('a@a.com', '123', 'cook', '8080808080'),
('mohit@mohit.com', '12345', 'owner', '9999888877');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`c_number`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`i_name`);

--
-- Indexes for table `ingredient_supplier`
--
ALTER TABLE `ingredient_supplier`
  ADD PRIMARY KEY (`i_name`,`s_number`),
  ADD KEY `FK_IngredientSupplier2` (`s_number`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`d_name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`d_name`,`t_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`i_name`,`t_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`d_name`,`i_name`),
  ADD KEY `i_name` (`i_name`);

--
-- Indexes for table `staff_details`
--
ALTER TABLE `staff_details`
  ADD PRIMARY KEY (`e_number`);

--
-- Indexes for table `supplier_info`
--
ALTER TABLE `supplier_info`
  ADD PRIMARY KEY (`s_number`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ingredient_supplier`
--
ALTER TABLE `ingredient_supplier`
  ADD CONSTRAINT `FK_IngredientSupplier1` FOREIGN KEY (`i_name`) REFERENCES `ingredients` (`i_name`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_IngredientSupplier2` FOREIGN KEY (`s_number`) REFERENCES `supplier_info` (`s_number`) ON DELETE CASCADE,
  ADD CONSTRAINT `ingredient_supplier_ibfk_1` FOREIGN KEY (`i_name`) REFERENCES `ingredients` (`i_name`) ON DELETE CASCADE,
  ADD CONSTRAINT `ingredient_supplier_ibfk_2` FOREIGN KEY (`s_number`) REFERENCES `supplier_info` (`s_number`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`d_name`) REFERENCES `menu` (`d_name`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`t_id`) REFERENCES `transaction` (`t_id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`i_name`) REFERENCES `ingredients` (`i_name`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`t_id`) REFERENCES `transaction` (`t_id`) ON DELETE CASCADE;

--
-- Constraints for table `requirements`
--
ALTER TABLE `requirements`
  ADD CONSTRAINT `requirements_ibfk_1` FOREIGN KEY (`d_name`) REFERENCES `menu` (`d_name`) ON DELETE CASCADE,
  ADD CONSTRAINT `requirements_ibfk_2` FOREIGN KEY (`i_name`) REFERENCES `ingredients` (`i_name`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
