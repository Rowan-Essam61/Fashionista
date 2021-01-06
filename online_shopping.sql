-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 04:08 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_desc` varchar(100) NOT NULL,
  `product_size` varchar(100) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'DRESSES'),
(2, 'PANTALONS'),
(3, 'SKIRTS'),
(4, 'BLOUSSES'),
(5, 'TSHIRTS');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `User_name` varchar(100) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `second_name` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `gender` enum('Male','Female','','','') NOT NULL,
  `type` enum('client','admin','','') NOT NULL,
  `Balance` int(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `User_name`, `first_name`, `second_name`, `Email`, `password`, `phone_no`, `gender`, `type`, `Balance`, `country`, `city`, `address1`, `address2`) VALUES
(1, 'roro', 'rowan', 'essam', 'roroessam60@gmail.com', '1', 1284250393, 'Female', 'client', 0, 'Egypt ', '', '', ''),
(7, 'ronyyy', 'rowann', 'essamm', 'ronyessam61@gmail.com', '12', 1952479338, 'Female', 'client', 100, 'egypt', '', 'smoha egypt', 'Alexandia'),
(11, 'ron', '', '', '', '2000', 0, 'Female', 'client', 0, 'Egypt ', '', '', ''),
(12, 'ronnp', 'rowes', 'ssamm', 'roorororor@gamil.com', '123', 1258793456, 'Female', 'client', 0, 'egypt', '', '', ''),
(13, 'tifa', 'toto', 'tete', 'totototo', '12345', 1258967431, 'Female', 'client', 0, 'Egypt ', '', '', ''),
(15, 'titii', 'totoo', 'totot', 'totototoo', '12345', 1284250394, 'Male', 'client', 0, 'Egypt ', '', '', ''),
(16, 'anona', 'anan', 'essam', 'anona80@gmail.com', '12345', 2147483647, 'Female', 'client', 0, 'Egypt ', '', '', ''),
(17, 'amola', 'amall', 'shoukry', 'aaasss', '12334', 1112225896, 'Female', 'client', 100, 'Egypt ', '', '', ''),
(18, 'rowan', 'rowan', 'essamm', 'rownessamabbas@gmail.com', '111', 1284250333, 'Female', 'client', 0, 'Egypt ', '', '', ''),
(19, 'anan', 'anon', 'essam', 'ananessam@gmail.com', '1233', 1284250336, '', 'admin', 0, 'Egypt ', '', '', ''),
(20, 'anann', 'ananan', 'essam', 'ananessamm@gmail.com', '122', 1284250383, 'Female', 'admin', 0, 'Egypt ', '', '', ''),
(21, 'rowannn', 'rowan', 'essam', 'sim.rowann.essam@alexu.edu.eg', '20000', 1255864224, 'Female', 'client', 0, 'Egypt ', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delievery_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `customer_id`, `quantity`, `total_price`, `order_date`, `delievery_date`) VALUES
(3, 2, 11, 5, 1250, '2020-12-10 22:00:00', '2020-12-18 00:00:00'),
(5, 3, 11, 5, 375, '2020-12-10 22:00:00', '2020-12-18 00:00:00'),
(6, 1, 11, 5, 500, '2020-12-10 22:00:00', '2020-12-18 00:00:00'),
(7, 3, 11, 4, 300, '2020-12-10 22:00:00', '2020-12-18 00:00:00'),
(8, 1, 11, 5, 500, '2020-12-10 22:00:00', '2020-12-18 00:00:00'),
(9, 21, 11, 5, 1000, '2020-12-10 22:00:00', '2020-12-18 00:00:00'),
(10, 2, 18, 5, 1250, '2020-12-11 22:00:00', '2020-12-19 00:00:00'),
(11, 21, 18, 5, 1000, '2020-12-11 22:00:00', '2020-12-19 00:00:00'),
(12, 1, 18, 5, 500, '2020-12-11 22:00:00', '2020-12-19 00:00:00'),
(13, 17, 11, 2, 160, '2020-12-12 22:00:00', '2020-12-20 00:00:00'),
(14, 10, 11, 5, 250, '2020-12-12 22:00:00', '2020-12-20 00:00:00'),
(16, 7, 7, 1, 100, '2020-12-13 22:00:00', '2020-12-21 00:00:00'),
(17, 6, 11, 2, 100, '2020-12-13 22:00:00', '2020-12-21 00:00:00'),
(18, 9, 11, 1, 50, '2020-12-13 22:00:00', '2020-12-21 00:00:00'),
(19, 18, 11, 1, 100, '2020-12-13 22:00:00', '2020-12-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `price` int(50) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `picture` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `size` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `cat_id`, `quantity`, `picture`, `size`) VALUES
(1, '', 'Minnie Mouse Pink Polka Dot Dress for Women', 100, 1, 175, '../images/Dresses/d1-mikymouse.jpg', 'L'),
(2, '', 'Strawberry Midi Dress', 250, 1, 185, '../images/Dresses/d2-straberry.jpg', 'XL'),
(3, '', 'red ditsy floral print skater dress', 75, 1, 186, '../images/Dresses/d3-floral.jpg', 'S'),
(4, '', 'Long Sleeve Party Evening Dress', 50, 1, 190, '../images/Dresses/d4-night.jpg', 'M'),
(5, '', 'SERRES PANT WOMENS', 120, 2, 190, '../images/Pantalons/p1.png', 'M'),
(6, '', 'WOMENS TROUSER BOOTCUT', 50, 2, 188, '../images/Pantalons/p2.jpg', 'L'),
(7, '', 'Womens Polar Fleece Pants', 100, 2, 189, '../images/Pantalons/p3.webp', 'L'),
(8, '', 'Mammut Chamuera Pants Women', 80, 2, 190, '../images/Pantalons/p4.jpg', 'M'),
(9, '', 'women short skirt', 50, 3, 189, '../images/skirts/s1.jpg', 'S'),
(10, '', 'Woman long skirt', 50, 3, 185, '../images/skirts/s2.jpg', 'M'),
(11, '', 'Mid-length pleated skirt', 100, 3, 190, '../images/skirts/s3.jpg', 'XL'),
(12, '', 'micro houndstooth print pleated skirt', 80, 3, 190, '../images/skirts/s4.jpg', 'L'),
(13, '', 'Long-sleeved blouse', 70, 4, 190, '../images/Blooses/b1.jpg', 'M'),
(14, '', 'WOMENâ€™S BANGKOK BLOUSE', 60, 4, 190, '../images/Blooses/b2.jpg', 'L'),
(15, '', 'PRINTED VELVET BLOUSE', 50, 4, 190, '../images/Blooses/b3.jpg', 'L'),
(16, '', 'elegant woman summer sleeveless office blouse', 50, 4, 188, '../images/Blooses/b4.jpg', 'XXL'),
(17, '', 'ARIES WOMAN Tshirts And Hoodies ', 80, 5, 188, '../images/Tshirts/t1.jpg', 'S'),
(18, '', 'Printed woman TShirt', 100, 5, 189, '../images/Tshirts/t2.jpg', 'M'),
(19, '', 'PullDog Printed Tshirt', 150, 5, 190, '../images/Tshirts/t3.jpg', 'L'),
(20, '', 'HALLOWEEN PRINTED WOMAN TSHIRTS', 50, 5, 190, '../images/Tshirts/t4.jpg', 'M'),
(21, '', 'night short multicolor dress', 200, 1, 180, '../images/Dresses/d5-morning.jpg', 'L'),
(22, '', 'night long dress', 100, 1, 200, '../images/Dresses/d7-night.png', 'L'),
(23, '', 'night short dress', 200, 1, 100, '../images/Dresses/d9-night.webp', 'L');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`User_id`),
  ADD KEY `CartProductId` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `phone_no` (`phone_no`),
  ADD UNIQUE KEY `username` (`User_name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `OrderProductId` (`product_id`),
  ADD KEY `OrderUsertId` (`customer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `CartProductId` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `OrderProductId` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `OrderUsertId` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
