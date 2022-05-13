-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2022 at 05:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sysdev`
--

-- --------------------------------------------------------

--
-- Table structure for table `addressapi`
--

CREATE TABLE `addressapi` (
  `postal` varchar(10) NOT NULL,
  `result` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addressapi`
--

INSERT INTO `addressapi` (`postal`, `result`) VALUES
('GGG', '{}'),
('H4G', '{\"post code\": \"H4G\", \"country\": \"Canada\", \"country abbreviation\": \"CA\", \"places\": [{\"place name\": \"Verdun North\", \"longitude\": \"-73.5798\", \"state\": \"Quebec\", \"state abbreviation\": \"QC\", \"latitude\": \"45.4644\"}]}'),
('J3R', '{\"post code\": \"J3R\", \"country\": \"Canada\", \"country abbreviation\": \"CA\", \"places\": [{\"place name\": \"Sorel Southwest\", \"longitude\": \"-73.1263\", \"state\": \"Quebec\", \"state abbreviation\": \"QC\", \"latitude\": \"46.0476\"}]}'),
('H1H', '{\"post code\": \"H1H\", \"country\": \"Canada\", \"country abbreviation\": \"CA\", \"places\": [{\"place name\": \"Montreal North South\", \"longitude\": \"-73.6524\", \"state\": \"Quebec\", \"state abbreviation\": \"QC\", \"latitude\": \"45.5829\"}]}'),
('H1L', '{\"post code\": \"H1L\", \"country\": \"Canada\", \"country abbreviation\": \"CA\", \"places\": [{\"place name\": \"Mercier North\", \"longitude\": \"-73.5362\", \"state\": \"Quebec\", \"state abbreviation\": \"QC\", \"latitude\": \"45.5943\"}]}'),
('H4L', '{\"post code\": \"H4L\", \"country\": \"Canada\", \"country abbreviation\": \"CA\", \"places\": [{\"place name\": \"Saint-Laurent Inner Northeast\", \"longitude\": \"-73.6974\", \"state\": \"Quebec\", \"state abbreviation\": \"QC\", \"latitude\": \"45.5269\"}]}'),
('H4S', '{\"post code\": \"H4S\", \"country\": \"Canada\", \"country abbreviation\": \"CA\", \"places\": [{\"place name\": \"Saint-Laurent Southwest\", \"longitude\": \"-73.754\", \"state\": \"Quebec\", \"state abbreviation\": \"QC\", \"latitude\": \"45.4958\"}]}'),
('H4Z', '{\"post code\": \"H4Z\", \"country\": \"Canada\", \"country abbreviation\": \"CA\", \"places\": [{\"place name\": \"Tour de la Bourse\", \"longitude\": \"-73.5621\", \"state\": \"Quebec\", \"state abbreviation\": \"QC\", \"latitude\": \"45.5003\"}]}'),
('H4H', '{\"post code\": \"H4H\", \"country\": \"Canada\", \"country abbreviation\": \"CA\", \"places\": [{\"place name\": \"Verdun South\", \"longitude\": \"-73.5818\", \"state\": \"Quebec\", \"state abbreviation\": \"QC\", \"latitude\": \"45.4532\"}]}'),
('H4D', '{}'),
('H4A', '{\"post code\": \"H4A\", \"country\": \"Canada\", \"country abbreviation\": \"CA\", \"places\": [{\"place name\": \"Notre-Dame-de-Gr\\u00d4ce Northeast\", \"longitude\": \"-73.6252\", \"state\": \"Quebec\", \"state abbreviation\": \"QC\", \"latitude\": \"45.4781\"}]}');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` double DEFAULT 0,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = in cart, 1 = pending, 2 = accepted, 3 = shipped, 4 = delivered/closed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `total`, `createdAt`, `order_status`) VALUES
(1, 3, 0, '2022-05-09 04:09:14', 0),
(2, 1, 0, '2022-05-09 08:59:45', 0),
(3, 1, 0, '2022-05-09 09:00:46', 0),
(4, 1, 0, '2022-05-09 09:03:21', 0),
(5, 1, 0, '2022-05-09 09:21:48', 0),
(6, 1, 0, '2022-05-09 10:32:18', 0),
(7, 1, 0, '2022-05-09 19:20:31', 0),
(11, 6, 0, '2022-05-10 20:22:53', 0),
(13, 8, 0, '2022-05-13 01:47:36', 0),
(14, 9, 0, '2022-05-13 02:35:27', 0),
(15, 8, 0, '2022-05-13 13:20:07', 0),
(16, 10, 0, '2022-05-13 15:03:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `unit_price` double NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `product_id`, `quantity`, `unit_price`, `price`) VALUES
(147, 14, 1, 1, 40, 40),
(148, 14, 3, 2, 25, 50),
(151, 14, 10, 1, 40, 40),
(153, 14, 8, 1, 20, 20),
(154, 14, 9, 1, 80, 80),
(155, 16, 9, 1, 80, 80),
(157, 16, 10, 1, 40, 40);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_image` varchar(50) NOT NULL DEFAULT 'blank.png',
  `product_name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_image`, `product_name`, `description`, `price`, `quantity`) VALUES
(1, 'beard_oil.png', 'Beard Oil', 'Beard oil is a conditioner used to moisturize and soften beard hair. It\'s also effective for moisturizing the skin beneath your beard. People use beard oil to keep their beards looking fuller, softer, and tamer. It\'s also sometimes used to promote beard growth.', 40, 9),
(3, '627e75a295875.png', 'Beard Balm', 'A beard balm works as a leave-in conditioner which will moisturize, condition, style and soften your beard. All of these ingredients are combined to help promote proper beard growth and keep your beard healthy and smelling its best.', 25, 5),
(8, 'blank.png', 'Beard Serum', 'Beard serum allow you to growth your beard at the right pace. Serum works by increasing the blood flow to the capillaries in the follicles. Once the follicles receive the nutrients they need, the hairs grow longer, stronger, and lustrous.\r\n', 20, 4),
(9, 'kit2.png', 'Kit', 'This is a kit of beard products.', 80, 1),
(10, 'kit.png', 'Simple Kit', 'This is a simpler kit of beard products.', 40, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(254) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password_hash` varchar(63) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'o is for customer, 1 is for admin, 2 is for supervisor and 3 is for employee',
  `street_name` varchar(30) DEFAULT NULL,
  `street_number` varchar(10) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `province` varchar(30) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `first_name`, `last_name`, `password_hash`, `role`, `street_name`, `street_number`, `city`, `province`, `country`, `postal_code`) VALUES
(1, 'admin@gmail.com', 'ADMIN', 'ADMIN', '$2y$10$LFrXr6u9SDTpV05WgcpvSulwKzuCRLCu239MzPdE3rL5uaxDgEwti', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'test@gmail.com', 'First', 'Last', '$2y$10$zY3WZkwGlV9mJCLYyafePeY/lox6cGRTDOlMkC3VZqXSpruNXsJuy', 0, '', '', '', '', '', ''),
(6, 'test2@gmail.com', 'Test', 'Test2', '$2y$10$YnhkNphlusl2A7em7T/px.rQ3h5h.2IuFE5eJt9RAWKHp2Vg6vtKa', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'marcio@bouzon.com.br', 'Marcio', 'Bouzon', '$2y$10$yMAAiXdEJnBVjr8Bd/kbA.hfRVmlTzeEcnojZG4DR5fZkAt8IQNJi', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'ga@bouzon.com.br', 'Giuliana', 'Bouzon', '$2y$10$F7dcIzFeYB9NY1svR.D08eZsnw7GHGBALD7fW.lt0gqOzk.6Ftiim', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'a@b.c', 'Julian', 'Lebensold', '$2y$10$iYj4Ffv/uQlM9KG0zinQsu9Zif.059iTyFiSk4r3HFzUIkI/CA1La', 0, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_customer_fk` (`user_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD UNIQUE KEY `order_id` (`order_id`,`product_id`),
  ADD KEY `orderdetail_product_fk` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_customer_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `orderdetail_order_fk` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderdetail_product_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
