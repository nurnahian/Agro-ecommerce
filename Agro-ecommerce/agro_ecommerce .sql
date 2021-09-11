-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2021 at 12:58 PM
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
-- Database: `agro_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pcatagory`
--

CREATE TABLE `pcatagory` (
  `id` int(11) NOT NULL,
  `catagory_name` varchar(50) NOT NULL,
  `catagory_num` varchar(150) NOT NULL,
  `publication_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pcatagory`
--

INSERT INTO `pcatagory` (`id`, `catagory_name`, `catagory_num`, `publication_status`) VALUES
(10, 'FISH', 'Stock Available', 1),
(11, ' VEGETABLES', ' VEGETABLE Stock Available', 1),
(12, 'POULTRY', 'Poultry Stock Available\r\n', 1),
(13, 'RICE', 'White rice, Champa rice, Miracle rice, Upland rice, Brown rice Stock Available\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(200) NOT NULL,
  `product_num` varchar(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `catagory_id` int(11) NOT NULL,
  `public_status` int(11) NOT NULL,
  `product_dis` text NOT NULL,
  `product_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_title`, `product_num`, `product_price`, `catagory_id`, `public_status`, `product_dis`, `product_image`) VALUES
(24, 'Hilsha Fish (0.700 - 0.799 Kg)', 'F1011', 450, 10, 1, 'Hilsa (ilish) any of the members of the genus Tenualosa of the family Clupeidae, order Clupeiformes. Locally known as Ilish, the fish has been designated as the national fish of Bangladesh.', '../images/hilsha-1.jpg'),
(25, 'Lady Finger (Dherosh) Kg 1 Kg', 'V1011', 45, 11, 1, 'Bangladesh exports vegetables to 41 countries across the world, according to a statistics placed by Commerce Minister in Parliament was earned US$ 81.03 million exporting vegetables ', '../images/bf07afcff9aca2274ec4ad3a1f8d1e22.jpg'),
(26, 'Desh Cock Chicken(400 /piece)', 'P1011', 200, 12, 0, 'Type: Layer / Cock Chicken  all eating food are organically make \r\n\r\nQuality and value: 100% fresh and halal.\r\n\r\nNote: Prices may vary slightly depending on the net weight and deshi cock producing.', '../images/poultry.jpg'),
(27, 'Hilsha Fish (0.900 - 1.200 Kg)', 'F1011', 750, 10, 1, 'Hilsa (ilish) any of the members of the genus Tenualosa of the family Clupeidae, order Clupeiformes. Locally known as Ilish, the fish has been designated as the national fish of Bangladesh.', '../images/download.jpg'),
(28, 'Desh Cock Chicken(400 /piece)', 'P1012', 400, 12, 1, 'Type: Layer / Cock Chicken  all eating food are organically make \r\n\r\nQuality and value: 100% fresh and halal.\r\n\r\nNote: Prices may vary slightly depending on the net weight and deshi cock producing.', '../images/11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `user_role` varchar(50) DEFAULT 'user',
  `reg_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `mobile`, `pass`, `user_role`, `reg_time`) VALUES
(1, 'Nur Nahian Ringgit', 'nurnahian007@gmail.com', '01857318033', '12345', 'admin', '0000-00-00 00:00:00'),
(2, 'MD Omor Faruk', 'tuhin.bdhi@gmail.com', '01671792136', '1234', 'user', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pcatagory`
--
ALTER TABLE `pcatagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pcatagory`
--
ALTER TABLE `pcatagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
