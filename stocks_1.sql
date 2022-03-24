-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2022 at 04:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datastore`
--

-- --------------------------------------------------------

--
-- Table structure for table `stocks_1`
--

CREATE TABLE `stocks_1` (
  `id` int(11) NOT NULL,
  `updateAt` varchar(255) NOT NULL,
  `jsonData` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stocks_1`
--

INSERT INTO `stocks_1` (`id`, `updateAt`, `jsonData`) VALUES
(19, '08-03-22 01:39:02', '[{\"Sku\":\"SK0014bvhb\",\"quantity\":5},{\"Sku\":\"Pack=1|Vintage Bulb=Mushroom Bowl Shape E27\",\"quantity\":4},{\"Sku\":\"SK0014bvhb\",\"quantity\":3}]'),
(20, '08-03-22 05:08:37', '[{\"Sku\":\"SK0014bvhb\",\"quantity\":5},{\"Sku\":\"Pack=1|Vintage Bulb=Mushroom Bowl Shape E27\",\"quantity\":4},{\"Sku\":\"SK0014bvhb\",\"quantity\":3}]'),
(21, '08-03-22 07:27:48', '[{\"Sku\":\"SK0014bvhb\",\"quantity\":5},{\"Sku\":\"Pack=1|Vintage Bulb=Mushroom Bowl Shape E27\",\"quantity\":4},{\"Sku\":\"SK0014bvhb\",\"quantity\":3}]'),
(22, '08-03-22 07:28:05', '[{\"Sku\":\"SK0014bvhb\",\"quantity\":5},{\"Sku\":\"Pack=1|Vintage Bulb=Mushroom Bowl Shape E27\",\"quantity\":4},{\"Sku\":\"SK0014bvhb\",\"quantity\":3}]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stocks_1`
--
ALTER TABLE `stocks_1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stocks_1`
--
ALTER TABLE `stocks_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
