-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2018 at 05:55 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `views`, `image`) VALUES
(1, 'Sport', 'sport', 10, '../upload/20181111125132-sport_logo_vector_6824925.jpg'),
(4, 'Electronic', 'electronic', 31, '../upload/20181112183156-elec.jpg'),
(5, 'Mobile', 'mobile', 18, '../upload/20181112183213-mob.jpg'),
(6, 'Computer', 'computer', 1, '../upload/20181112183318-samsung-desktop-computer-500x500.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `des` longtext NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `currency` varchar(5) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `des`, `category_id`, `price`, `currency`, `views`, `created_at`, `image`) VALUES
(2, 'Galaxy S9', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam velit, sit debitis enim dicta a! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam velit, sit debitis enim dicta a!\r\n\r\n', 4, 700, '$', 22, '2018-11-11 12:56:39', '../upload/20181112183406-81wLkQ64HXL._SX522_.jpg'),
(3, 'Mate 20 Pro', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam velit, sit debitis enim dicta a! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam velit, sit debitis enim dicta a!\r\n\r\n', 5, 800, '$', 7, '2018-11-12 17:35:11', '../upload/20181112183511-20.jpg'),
(4, 'Dell Core i7', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam velit, sit debitis enim dicta a! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam velit, sit debitis enim dicta a!\r\n\r\n', 6, 800, 'IQD', 0, '2018-11-12 17:36:02', '../upload/20181112183602-1-xps-13-laptop-core-i7-silver.jpg'),
(5, 'Television', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam velit, sit debitis enim dicta a! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam velit, sit debitis enim dicta a!\r\n\r\n', 4, 10000, '$', 104, '2018-11-12 17:37:26', '../upload/20181112183726-home_enter.jpg'),
(6, 'Sport Boot', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam velit, sit debitis enim dicta a! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam velit, sit debitis enim dicta a!\r\n\r\n', 1, 50, '$', 2, '2018-11-12 17:38:10', '../upload/20181112183904-sy388797.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `meta` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `meta`) VALUES
(1, 'social', 'a:4:{s:2:\"fb\";s:23:\"http://fb.com/govar.web\";s:2:\"tw\";s:1:\"#\";s:3:\"you\";s:1:\"#\";s:2:\"li\";s:1:\"#\";}'),
(2, 'about', 'a:3:{s:5:\"email\";s:15:\"gmail@gmail.com\";s:5:\"title\";s:15:\"Shopping System\";s:5:\"about\";s:197:\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam velit, sit debitis enim dicta a! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam velit, sit debitis enim dicta a!\";}');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `image`) VALUES
(1, 'govar.web@gmail.com', '1234', 'Sport', '../upload/20181111125011-sport_logo_vector_6824925.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
