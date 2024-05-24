-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 10:27 AM
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
-- Database: `videogamedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `igraci`
--

CREATE TABLE `igraci` (
  `IDIgraca` int(10) UNSIGNED NOT NULL,
  `Ime` varchar(20) NOT NULL,
  `Prezime` varchar(20) NOT NULL,
  `KorisnickoIme` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Sifra` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `igraci`
--

INSERT INTO `igraci` (`IDIgraca`, `Ime`, `Prezime`, `KorisnickoIme`, `Email`, `Sifra`) VALUES
(1, 'Igor', 'Dizdarević', 'IgorD11', 'igordizdarevic99@gmail.com', 'sifra1'),
(2, 'Ognjen', 'Brkić', 'OgnjenB12', 'ognjenbrkic@gmail.com', 'sifra2'),
(3, 'Dusan', 'Vučucević', 'DusanV13', 'dusanvucicevic@gmail.com', 'sifra3'),
(4, 'Uroš', 'Stanojević', 'UrosS14', 'urosstanojevic@gmail.com', 'sifra4'),
(5, 'Momir', 'Nedeljković', 'MomirN15', 'momirnedeljkovic@gmail.co', 'sifra5'),
(6, 'Nikola', 'Radosavljević', 'NikolaR16', 'nikolaradosavljevic@gmail', 'sifra6'),
(7, 'Aleksa', 'Slavinić', 'AleksaS45', 'aleksaslavinic@gmail.com', 'sifra7');

-- --------------------------------------------------------

--
-- Table structure for table `nivoi`
--

CREATE TABLE `nivoi` (
  `IDNivoa` int(10) UNSIGNED NOT NULL,
  `NazivNivoa` varchar(20) NOT NULL,
  `Tezina` varchar(25) NOT NULL,
  `Opis` varchar(255) NOT NULL,
  `Img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nivoi`
--

INSERT INTO `nivoi` (`IDNivoa`, `NazivNivoa`, `Tezina`, `Opis`, `Img`) VALUES
(1, 'Šuma', 'Lako (1/5)', 'Šumski ravan teren bez prepreka. Sadrzi samo jednu platformu', './IMG/Suma.jpg'),
(2, 'Planina', 'Srednja težina (3/5)', 'Planinski teren sa orušavajućim platformama. Sadrzi 3 platforme koje se vremenom orušavaju', './IMG/Planina.jpg'),
(3, 'Vulkan', 'Teško (5/5)', 'Vulkanski teren sa preprekama. Sadrzi 2 platforme sa lavom između i povremenim naletom vatrenih lopti', './IMG/Vulkan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `onlinemecevi`
--

CREATE TABLE `onlinemecevi` (
  `IDMeca` int(10) UNSIGNED NOT NULL,
  `IDIgraca1` int(10) UNSIGNED NOT NULL,
  `IDIgraca2` int(10) UNSIGNED NOT NULL,
  `IDNivoa` int(10) UNSIGNED NOT NULL,
  `Rezultat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `onlinemecevi`
--

INSERT INTO `onlinemecevi` (`IDMeca`, `IDIgraca1`, `IDIgraca2`, `IDNivoa`, `Rezultat`) VALUES
(1, 2, 1, 1, 'Pobeda'),
(2, 2, 3, 2, 'Pobeda'),
(3, 2, 5, 2, 'Pobeda'),
(4, 2, 3, 3, 'Pobeda'),
(5, 2, 6, 1, 'Pobeda'),
(6, 1, 2, 1, 'Poraz'),
(7, 1, 4, 2, 'Pobeda'),
(8, 3, 2, 2, 'Poraz'),
(9, 3, 2, 3, 'Poraz'),
(10, 4, 1, 2, 'Poraz'),
(11, 5, 2, 2, 'Poraz'),
(12, 6, 2, 1, 'Poraz'),
(18, 7, 3, 1, 'Poraz'),
(19, 7, 4, 1, 'Pobeda'),
(20, 7, 6, 1, 'Pobeda'),
(21, 7, 2, 1, 'Poraz'),
(22, 7, 1, 1, 'Poraz'),
(23, 7, 5, 1, 'Poraz'),
(24, 7, 6, 1, 'Pobeda'),
(25, 7, 5, 1, 'Pobeda'),
(26, 7, 1, 1, 'Poraz'),
(27, 7, 6, 1, 'Pobeda'),
(28, 7, 3, 1, 'Pobeda'),
(29, 7, 4, 1, 'Poraz'),
(30, 7, 3, 1, 'Pobeda'),
(31, 7, 4, 1, 'Pobeda'),
(32, 7, 5, 1, 'Poraz'),
(33, 7, 2, 1, 'Pobeda'),
(34, 7, 1, 1, 'Poraz'),
(35, 7, 5, 1, 'Poraz'),
(36, 7, 6, 1, 'Pobeda'),
(37, 7, 4, 1, 'Poraz'),
(38, 7, 1, 1, 'Poraz'),
(39, 7, 6, 1, 'Pobeda'),
(40, 7, 2, 1, 'Poraz'),
(41, 7, 3, 1, 'Pobeda'),
(42, 7, 5, 1, 'Poraz'),
(43, 7, 6, 1, 'Pobeda'),
(44, 7, 1, 1, 'Pobeda'),
(45, 7, 4, 1, 'Pobeda'),
(46, 7, 2, 1, 'Poraz'),
(47, 7, 5, 1, 'Pobeda'),
(48, 7, 4, 1, 'Poraz'),
(49, 7, 3, 1, 'Poraz'),
(50, 7, 5, 1, 'Poraz'),
(51, 7, 6, 1, 'Pobeda'),
(52, 7, 4, 1, 'Poraz'),
(53, 7, 5, 1, 'Pobeda'),
(54, 7, 1, 1, 'Pobeda'),
(55, 7, 6, 1, 'Pobeda'),
(56, 7, 3, 1, 'Pobeda'),
(57, 7, 6, 1, 'Poraz'),
(58, 7, 1, 1, 'Poraz'),
(59, 7, 1, 1, 'Pobeda'),
(60, 7, 2, 1, 'Pobeda'),
(225, 7, 5, 1, 'Pobeda'),
(226, 7, 4, 1, 'Pobeda'),
(227, 7, 4, 1, 'Poraz'),
(228, 7, 1, 1, 'Pobeda'),
(229, 7, 3, 1, 'Poraz'),
(230, 7, 5, 1, 'Pobeda'),
(231, 7, 5, 1, 'Poraz'),
(232, 7, 4, 1, 'Pobeda'),
(233, 7, 4, 1, 'Poraz'),
(234, 7, 6, 1, 'Poraz'),
(235, 7, 4, 1, 'Poraz'),
(236, 7, 5, 1, 'Poraz'),
(237, 7, 4, 1, 'Pobeda'),
(238, 7, 6, 1, 'Poraz'),
(239, 7, 6, 1, 'Poraz'),
(240, 7, 2, 1, 'Poraz'),
(241, 7, 2, 1, 'Poraz'),
(242, 7, 3, 1, 'Pobeda'),
(243, 7, 5, 1, 'Pobeda'),
(244, 7, 4, 1, 'Pobeda'),
(245, 7, 3, 1, 'Poraz'),
(246, 7, 2, 1, 'Poraz'),
(247, 7, 3, 1, 'Poraz'),
(248, 7, 6, 1, 'Pobeda'),
(249, 7, 6, 1, 'Poraz'),
(250, 7, 5, 1, 'Pobeda'),
(251, 7, 2, 1, 'Poraz'),
(252, 7, 1, 1, 'Poraz'),
(253, 7, 2, 1, 'Pobeda'),
(254, 7, 3, 1, 'Poraz'),
(255, 7, 1, 1, 'Poraz'),
(256, 7, 4, 1, 'Poraz'),
(257, 7, 2, 1, 'Poraz'),
(258, 7, 2, 1, 'Poraz'),
(259, 7, 4, 1, 'Poraz'),
(260, 7, 2, 1, 'Pobeda'),
(261, 7, 4, 1, 'Poraz'),
(262, 7, 1, 1, 'Poraz'),
(263, 7, 1, 1, 'Pobeda'),
(264, 7, 1, 1, 'Pobeda'),
(265, 7, 5, 1, 'Pobeda'),
(266, 7, 4, 1, 'Poraz'),
(267, 7, 2, 1, 'Pobeda'),
(268, 7, 6, 1, 'Poraz'),
(269, 7, 1, 1, 'Pobeda'),
(270, 7, 3, 1, 'Poraz'),
(271, 7, 5, 1, 'Pobeda'),
(272, 7, 1, 1, 'Pobeda'),
(273, 7, 5, 1, 'Poraz'),
(274, 7, 5, 1, 'Poraz'),
(275, 7, 2, 1, 'Pobeda'),
(276, 7, 3, 1, 'Poraz'),
(277, 7, 6, 1, 'Pobeda'),
(278, 7, 2, 1, 'Poraz'),
(279, 7, 1, 3, 'Poraz'),
(280, 7, 5, 3, 'Poraz'),
(281, 7, 5, 3, 'Pobeda'),
(282, 7, 2, 2, 'Pobeda'),
(283, 7, 4, 1, 'Pobeda'),
(284, 7, 2, 1, 'Pobeda'),
(285, 7, 2, 1, 'Poraz');

-- --------------------------------------------------------

--
-- Table structure for table `pojedinacnapostignucaigraca`
--

CREATE TABLE `pojedinacnapostignucaigraca` (
  `IDPojPostignuca` int(10) UNSIGNED NOT NULL,
  `IDIgraca` int(10) UNSIGNED NOT NULL,
  `IDPostignuca` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pojedinacnapostignucaigraca`
--

INSERT INTO `pojedinacnapostignucaigraca` (`IDPojPostignuca`, `IDIgraca`, `IDPostignuca`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 4),
(4, 1, 1),
(6, 7, 1),
(7, 7, 4),
(9, 7, 2),
(10, 7, 3),
(11, 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `postignuca`
--

CREATE TABLE `postignuca` (
  `IdPostignuca` int(10) UNSIGNED NOT NULL,
  `NazivPostignuca` varchar(50) NOT NULL,
  `Opis` varchar(255) NOT NULL,
  `Img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `postignuca`
--

INSERT INTO `postignuca` (`IdPostignuca`, `NazivPostignuca`, `Opis`, `Img`) VALUES
(1, 'Pobednik', 'Postići 1 pobedu u online meču.', './IMG/Pobednik.jpg'),
(2, 'Nezaustavljiv', 'Postići 5 pobeda u online mečevima.', './IMG/Nezaustavljiv.jpg'),
(3, 'Ultimativni borac', 'Postići 10 pobeda u online mečevima.', './IMG/UltimativniBorac.jpg'),
(4, 'Profesionalac', 'Postići pobedu u online meču bez gubitka runde.', './IMG/Profesionalac.jpg'),
(5, 'Nedodirljiv ', 'Postići pobedu u online meču bez primanja ijednog udarca.', './IMG/Nedodirljiv.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `igraci`
--
ALTER TABLE `igraci`
  ADD PRIMARY KEY (`IDIgraca`);

--
-- Indexes for table `nivoi`
--
ALTER TABLE `nivoi`
  ADD PRIMARY KEY (`IDNivoa`);

--
-- Indexes for table `onlinemecevi`
--
ALTER TABLE `onlinemecevi`
  ADD PRIMARY KEY (`IDMeca`),
  ADD KEY `FK_IDIgraca1` (`IDIgraca1`),
  ADD KEY `FK_IDIgraca2` (`IDIgraca2`),
  ADD KEY `FK_IDNivoa` (`IDNivoa`);

--
-- Indexes for table `pojedinacnapostignucaigraca`
--
ALTER TABLE `pojedinacnapostignucaigraca`
  ADD PRIMARY KEY (`IDPojPostignuca`),
  ADD KEY `FK_IDIgraca` (`IDIgraca`),
  ADD KEY `FK_IDPostignuca` (`IDPostignuca`);

--
-- Indexes for table `postignuca`
--
ALTER TABLE `postignuca`
  ADD PRIMARY KEY (`IdPostignuca`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `igraci`
--
ALTER TABLE `igraci`
  MODIFY `IDIgraca` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nivoi`
--
ALTER TABLE `nivoi`
  MODIFY `IDNivoa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `onlinemecevi`
--
ALTER TABLE `onlinemecevi`
  MODIFY `IDMeca` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `pojedinacnapostignucaigraca`
--
ALTER TABLE `pojedinacnapostignucaigraca`
  MODIFY `IDPojPostignuca` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `postignuca`
--
ALTER TABLE `postignuca`
  MODIFY `IdPostignuca` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `onlinemecevi`
--
ALTER TABLE `onlinemecevi`
  ADD CONSTRAINT `FK_IDIgraca1` FOREIGN KEY (`IDIgraca1`) REFERENCES `igraci` (`IDIgraca`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_IDIgraca2` FOREIGN KEY (`IDIgraca2`) REFERENCES `igraci` (`IDIgraca`),
  ADD CONSTRAINT `FK_IDNivoa` FOREIGN KEY (`IDNivoa`) REFERENCES `nivoi` (`IDNivoa`);

--
-- Constraints for table `pojedinacnapostignucaigraca`
--
ALTER TABLE `pojedinacnapostignucaigraca`
  ADD CONSTRAINT `FK_IDIgraca` FOREIGN KEY (`IDIgraca`) REFERENCES `igraci` (`IDIgraca`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_IDPostignuca` FOREIGN KEY (`IDPostignuca`) REFERENCES `postignuca` (`IdPostignuca`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
