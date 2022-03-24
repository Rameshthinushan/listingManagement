-- phpMyAdmin SQL Dump
-- version 4.9.10
-- https://www.phpmyadmin.net/
--
-- Host: db5000259912.hosting-data.io
-- Generation Time: Mar 07, 2022 at 08:44 AM
-- Server version: 5.7.36-log
-- PHP Version: 7.0.33-0+deb9u12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs253594`
--

-- --------------------------------------------------------

--
-- Table structure for table `comboproducts`
--

CREATE TABLE `comboproducts` (
  `id` int(255) NOT NULL,
  `sku` text NOT NULL,
  `originalsku` text NOT NULL,
  `image` text NOT NULL,
  `instruction` text NOT NULL,
  `uploadedon` date NOT NULL,
  `addedby` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comboproducts`
--

INSERT INTO `comboproducts` (`id`, `sku`, `originalsku`, `image`, `instruction`, `uploadedon`, `addedby`) VALUES
(13594, 'ENC2957', 'PCBIFF2PK+PCBI90EL2PK+PCBI50TP6PK+PCBI100TP3PK+PCBITC3PK+PCBISR3PK+PCGZ30NT3PK+PHHT1PBRBM3PK+WCBNFG3PK+ICST64E273PK', 'http://digitweb.vintageinterior.co.uk/comboproducts/ENC2957.jpg', '', '2022-03-07', 'kavitha'),
(13593, 'ENC2956', 'PCBIFF2PK+PCBI90EL2PK+PCBI50TP6PK+PCBI100TP3PK+PCBITC3PK+PCBISR3PK+PCGZ30NT3PK+PHHT1PBRBM3PK+WCBNFG3PK', 'http://digitweb.vintageinterior.co.uk/comboproducts/ENC2956.jpg', '', '2022-03-07', 'kavitha'),
(13592, 'ENC2955', 'PCBIFF2PK+PCBI90EL2PK+PCBI50TP6PK+PCBI100TP+PCBITC2PK+PCBISR2PK+PCGZ30NT2PK+PHHT1PBRBM2PK+WCBNFG2PK+ICST64E272PK', 'http://digitweb.vintageinterior.co.uk/comboproducts/ENC2955.jpg', '', '2022-03-07', 'kavitha'),
(13591, 'ENC2954', 'PCBIFF2PK+PCBI90EL2PK+PCBI50TP6PK+PCBI100TP+PCBITC2PK+PCBISR2PK+PCGZ30NT2PK+PHHT1PBRBM2PK+WCBNFG2PK', 'http://digitweb.vintageinterior.co.uk/comboproducts/ENC2954.jpg', '', '2022-03-07', 'kavitha'),
(13590, 'ENC2953', 'PCBIFF+PCBI50TP+PCBI90EL+PCBI75TP+PCBISR+PCGZ30NT+PHHT1PBRBM+WCBNFG+ICST64E27', 'http://digitweb.vintageinterior.co.uk/comboproducts/ENC2953.jpg', '', '2022-03-07', 'kavitha'),
(13589, 'ENC2952', 'PCBIFF+PCBI50TP+PCBI90EL+PCBI75TP+PCBISR+PCGZ30NT+PHHT1PBRBM+WCBNFG', 'http://digitweb.vintageinterior.co.uk/comboproducts/ENC2952.jpg', '', '2022-03-07', 'kavitha'),
(13588, 'CRSF120YB+WSRH230YB+LSCY290YE', 'CRSF120YB+WSRH230YB+LSCY290YE', 'http://digitweb.vintageinterior.co.uk/comboproducts/CRSF120YB+WSRH230YB+LSCY290YE.jpg', '', '2022-03-07', 'thadshayini'),
(13587, 'ENC2951', 'PCBIFF2PK+PCBI100TP2PK+PCBI200TP+PCBITC+PCBI50TP2PK+PCBICP2PK', 'http://digitweb.vintageinterior.co.uk/comboproducts/ENC2951.jpg', '', '2022-03-06', 'kavitha'),
(13586, 'ENC2950', 'CRFF140GL+LHNSE27YB+SCRN70BM+LSDO210RE+ICST64E27', 'http://digitweb.vintageinterior.co.uk/comboproducts/ENC2950.jpg', '', '2022-03-05', 'Thojika Santhaseelan'),
(13585, 'CRFF140GL+LHNSE27YB+SCRN70BM+LSDO210RE', 'CRFF140GL+LHNSE27YB+SCRN70BM+LSDO210RE', 'http://digitweb.vintageinterior.co.uk/comboproducts/CRFF140GL+LHNSE27YB+SCRN70BM+LSDO210RE.jpg', '', '2022-03-05', 'Thojika Santhaseelan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comboproducts`
--
ALTER TABLE `comboproducts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comboproducts`
--
ALTER TABLE `comboproducts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13595;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
