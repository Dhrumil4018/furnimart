-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2023 at 07:34 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Nidhip', 'nidhip@gmail.com', '$2y$10$VPA8zP041kYDnbw/HlsujunoJvGKPvP94fOIP7ffw1M9QzuxqONtm');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Chair'),
(4, 'Sofa'),
(5, 'Bed'),
(6, 'Table'),
(7, 'Dining Table'),
(8, 'Bean Bag'),
(9, 'Interior Decoration');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`feedback_id`, `name`, `email`, `feedback`) VALUES
(1, 'dhrumil', 'dhrumil@gmail.com', 'dhrumil sanjaybhai bhindora');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `user_id`, `invoice_number`, `product_id`, `product_title`, `product_price`, `quantity`, `order_status`) VALUES
(1, 1, 1216460564, 7, 'Center Table For Living Room', 9999, 1, 'pending'),
(2, 1, 671479391, 1, 'Chair', 5000, 1, 'pending'),
(3, 2, 362314213, 1, 'Chair', 5000, 1, 'pending'),
(4, 2, 726297868, 2, 'Recliner Sofa', 8000, 1, 'pending'),
(5, 1, 330856512, 2, 'Recliner Sofa', 8000, 1, 'pending'),
(6, 1, 330856512, 9, 'office table', 11999, 2, 'pending'),
(7, 4, 350734792, 1, 'Chair', 5000, 1, 'pending'),
(8, 4, 350734792, 12, 'Patchwork Chair', 4999, 2, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `product_image`, `product_image2`, `product_image3`, `product_price`, `category_id`, `date`, `status`) VALUES
(1, 'Chair', 'relaxing chair', 'chair,relax', 'bigChair2and1.jpg', 'bigChair2and2.jpg', 'bigChair2.jpg', '5000', 1, '2023-06-30 11:43:00', 'true'),
(2, 'Recliner Sofa', 'living room sofa', 'living room,chair,interier,sofa', 'bigChair8and1.jpg', 'bigChair8and3.jpg', 'bigChair8.jpg', '8000', 4, '2023-07-16 09:05:57', 'true'),
(3, 'Premium Recliner', 'reclining sofa with extreme comfert', 'chair,relax,sofa,recliner,premium', 'rec1.jfif', 'rec2.jfif', 'rec3.jfif', '25000', 4, '2023-07-16 09:18:22', 'true'),
(4, 'Sofa Com Bed', 'FURNITURE VALLEY Sofa Com Bed for Home - Perfect for Guests - Washable Cover', 'single sofa, sofa, new, sofa cum bed ,one seater, premium ', 'sofa_com_bed2.jpg', 'sofa_com_bed1.jpg', 'sofa_com_bed3.jpg', '5499', 4, '2023-08-05 12:37:58', 'true'),
(5, 'Dining Table', 'Dining Table For Family - Wood - Perfect For Home - Four Chair', 'dining,dining table,table,new', 'dining_table1.jpg', 'dining_table2.jpg', 'dining_table3.jpg', '9999', 7, '2023-08-05 12:45:42', 'true'),
(6, 'Premium Outdoor Sofa ', 'Outdoor Sofa For Your Home - Nice Color - Made With Good Wood - Washable', 'outdoor, outdoor sofa , sofa , new , premium ', 'outdoor_sofa1.jpg', 'outdoor_sofa2.jpg', 'outdoor_sofa3.jpg', '29999', 4, '2023-08-05 12:49:43', 'true'),
(7, 'Center Table For Living Room', 'Center Table For Living Room - wood - premium - Good color', 'table, center table, new, premium, wood', 'center_table1.jpg', 'center_table2.jpg', 'center_table3.jpg', '9999', 6, '2023-08-07 12:39:41', 'true'),
(8, 'Bean bag', 'bean bag - classy - well designed - for living and bed room ', 'bean bag, bean, new, classy', 'bean_bag1.jpg', 'bean_bag2.jpg', 'bean_bag3.jpg', '3999', 8, '2023-08-07 12:43:30', 'true'),
(9, 'office table', 'office table - wood - for office desk and home desk - furnished - with drawer ', 'office, desk ,office desk ,new', 'o_table1.jpg', 'o_table2.jpg', 'o_table3.jpg', '11999', 6, '2023-08-07 12:47:47', 'true'),
(10, 'Bed For bedroom', 'Lemon Tree Furniture Low Profile Upholstered Platform King Size Bed for Bedroom (Ivory, Engineered Wood)', 'bed, bedroom, king size , new', 'king_bed1.jpg', 'king_bed2.jpg', 'king_bed3.jpg', '19999', 5, '2023-08-10 13:20:25', 'true'),
(11, 'Bed', 'queen size bed for bedroom - wood - designed -premium furniture ', 'bed, large, new, queen size', 'bed2.jpg', 'bed1.jfif', 'bed3.jpg', '15999', 5, '2023-08-10 13:23:07', 'true'),
(12, 'Patchwork Chair', 'Designer DSW Patchwork Chair for Bed Room, Office, Home, Living Room, Dining Room, Cafe, Side Chair, Accent Chair (Polypropylene, Steel & Beech Wood, Multicolor)', 'chair,relax, designer, new', 'chair1.jpg', 'chair2.jpg', 'chair3.jpg', '4999', 1, '2023-08-10 13:26:13', 'true'),
(13, 'Reception Chair', 'Reception chair provides a comfortable place to sitâ€”ideal for a lobby or waiting room;Supremely soft and durable Caressoft upholstery in solid black - (Black, Mahogany Wood)', 'chair,relax , new', 'r1.jpg', 'r2.jpg', 'r3.jpg', '5999', 1, '2023-08-13 11:17:22', 'true'),
(14, 'Portable table for study/work', 'Study Table/Bed Table/Foldable and Portable Wooden/Writing Desk for Office/Home/School/Desk', 'living room,table,interier', 't1.jpg', 't2.jpg', 't3.jpg', '499', 6, '2023-08-13 11:20:43', 'true'),
(15, 'Wall Shelf', 'Standing Floor 4 Tier Rack Wall Shelf for Living Bed Room Home Office | Multipurpose Storage Shelves and Display Organizer with Utility Storage for Home DÃ©cor', 'shelf ,interior, decor, new', 'shelf1.jpg', 'shelf2.jpg', 'shelf3.jpg', '1500', 9, '2023-08-13 11:30:02', 'true'),
(16, 'Wood Bar Tall Stool', 'Solid sheesham Wood Bar Tall Stool Patio Outdoor Garden Chair Seat Home Stool Brown (Brown)', 'stool , bar, new , interior', 'bar1.jpg', 'bar2.jpg', 'bar3.jpg', '3000', 9, '2023-08-13 11:31:53', 'true'),
(17, '2XL Bean Bag with Footrest', 'Solimo Leatherette 2XL Bean Bag with Footrest, Ready to Use, Filled with Beans (Brown)', 'bean bag,interior, new', 'bag11.jpg', 'bag2.jpg', 'bag3.jpg', '1990', 8, '2023-08-13 11:36:23', 'true'),
(18, 'six seater dining table', 'six seater dining table for your family - beanch - chairs - wood', 'dining,dining table,table,new', '6_seater_dtable1.jpg', '6_seater_dtable2.jpg', '6_seater_dtable3.jpg', '14999', 7, '2023-08-15 09:05:30', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 1, 9999, 1216460564, 1, '2023-08-15 08:50:39', 'complete'),
(2, 1, 5000, 671479391, 1, '2023-08-15 08:51:14', 'complete'),
(3, 2, 5000, 362314213, 1, '2023-08-15 08:52:00', 'complete'),
(4, 2, 8000, 726297868, 1, '2023-08-15 08:52:26', 'complete'),
(5, 1, 31998, 330856512, 2, '2023-08-15 08:59:47', 'complete'),
(6, 4, 14998, 350734792, 2, '2023-08-15 09:01:25', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 2, 312810008, 2500, 'netbanking', '2023-06-09 10:32:57'),
(2, 4, 1051448674, 12500, 'netbanking', '2023-06-20 02:42:36'),
(3, 4, 1051448674, 12500, 'COD', '2023-06-20 02:42:46'),
(4, 5, 1750768991, 66000, 'COD', '2023-07-23 06:08:02'),
(5, 1, 978840507, 60000, 'COD', '2023-07-23 10:15:37'),
(6, 2, 1530752247, 39000, 'netbanking', '2023-07-23 10:19:55'),
(7, 3, 1633666236, 26000, 'upi', '2023-07-23 10:21:28'),
(8, 4, 1233200380, 0, 'netbanking', '2023-07-23 10:40:01'),
(9, 5, 1117230894, 13000, 'netbanking', '2023-07-23 10:42:52'),
(10, 1, 121633519, 55000, 'COD', '2023-07-27 11:23:31'),
(11, 3, 395326264, 38000, 'COD', '2023-07-27 11:25:09'),
(12, 4, 199903328, 19998, 'upi', '2023-08-14 05:52:56'),
(13, 5, 753175856, 1990, 'netbanking', '2023-08-14 07:16:20'),
(14, 8, 138592416, 10000, 'paypal', '2023-08-14 13:42:59'),
(15, 7, 1470356529, 25997, 'netbanking', '2023-08-14 13:49:36'),
(16, 9, 1207013522, 25000, 'upi', '2023-08-14 18:30:33'),
(17, 10, 2012267525, 33997, 'upi', '2023-08-15 08:46:40'),
(18, 11, 1059349192, 4999, 'paypal', '2023-08-15 08:47:45'),
(19, 1, 1809064242, 5000, 'netbanking', '2023-08-15 08:49:24'),
(20, 1, 1216460564, 9999, 'upi', '2023-08-15 08:50:39'),
(21, 2, 671479391, 5000, 'netbanking', '2023-08-15 08:51:14'),
(22, 3, 362314213, 5000, 'netbanking', '2023-08-15 08:52:00'),
(23, 4, 726297868, 8000, 'netbanking', '2023-08-15 08:52:26'),
(24, 5, 330856512, 31998, 'upi', '2023-08-15 08:59:47'),
(25, 6, 350734792, 14998, 'upi', '2023-08-15 09:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_ip`, `user_address`, `user_mobile`) VALUES
(1, 'dhrumil', 'dhrumil@gmail.com', '$2y$10$YiG6wcXNpqA0uaDjZ/5tWOM8201qRmY3UYYa5Twf.cp3m6QAgx53i', '::1', 'wkr', '9876543222'),
(2, 'user', 'abcd@gmail.com', '$2y$10$/qViPRH/4WE101771PiDGus0sGKSjOT34Txb3V06MorfcjAm3VQrO', '::1', 'wankaner', '1234567890'),
(4, 'nidhip', 'nidhip@gmail.com', '$2y$10$NCtmAppi0rjlMzZHSMUU8uOi4IvJXroBjVMBTw684gyDiuFreB5Ry', '::1', 'wankaner', '6549873210');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
