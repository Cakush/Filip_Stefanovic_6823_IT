-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2025 at 09:17 PM
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
-- Database: `frizerski_proizvodi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_korisnici`
--

CREATE TABLE `admin_korisnici` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_korisnici`
--

INSERT INTO `admin_korisnici` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE `komentari` (
  `id` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `objavljen` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `proizvod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentari`
--

INSERT INTO `komentari` (`id`, `komentar`, `objavljen`, `proizvod_id`) VALUES
(0, 'aaaa', '2025-03-12 20:16:44', 11),
(0, 'bbb', '2025-03-12 20:16:52', 12),
(0, 'ccc', '2025-03-12 20:16:57', 11);

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `id` int(11) NOT NULL,
  `naziv` varchar(50) NOT NULL,
  `cena` float NOT NULL,
  `popust` float DEFAULT NULL,
  `deskripcija` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`id`, `naziv`, `cena`, `popust`, `deskripcija`) VALUES
(11, 'Makaze', 500, 20, 'Makaze su ručni alat koji se koristi za rezanje različitih materijala, kao što su papir, tkanina, plastika, metal i drugi. Sastoje se od dva oštra sečiva koja su spojena na jednom mestu, omogućavajući da se pomeraju u odnosu jedno na drugo. Pri rezanju, pritisak na ručke pokreće sečiva tako da se materijal preseče između njih.'),
(12, 'fen', 2000, 10, 'Fen je električni uređaj koji se koristi za sušenje kose, oblikovanje frizura i osvežavanje vlasi. Sastoji se od motorne jedinice koja pokreće ventilator, te grijača koji zagreva zrak koji izlazi kroz usmerivač. Fen obično ima nekoliko postavki temperature i brzine, što omogućava korisnicima da prilagode uređaj prema svojim potrebama i tipu kose.'),
(13, 'sampon', 100, 0, 'Šampon je tečni ili gelasti proizvod koji se koristi za čišćenje kose i temena, uklanjanje prljavštine, viška sebuma, mrtvih ćelija kože i drugih nečistoća. Šampon se obično nanosi na mokru kosu, masira u koren kose i temenu, a zatim se ispiranje vodom. On je osnovni proizvod u svakodnevnoj rutini održavanja kose, koji pomaže da kosa ostane sveža, čista i zdrava.'),
(14, 'farba', 200, 0, 'Farba za kosu je proizvod koji se koristi za promenu boje kose, bilo da se želi prekriti sivi pramenovi, osvežiti trenutna boja ili potpuno promeniti nijansu. Farbe za kosu obično se sastoje od boje, oksidanta (ili razvijača) i drugih sastojaka koji pomažu u postizanju željenog efekta. Oksidant aktivira boju i omogućava joj da prodre u strukturu kose, čime dolazi do trajne promene boje.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_korisnici`
--
ALTER TABLE `admin_korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentari`
--
ALTER TABLE `komentari`
  ADD KEY `prozivod_id` (`proizvod_id`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_korisnici`
--
ALTER TABLE `admin_korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentari`
--
ALTER TABLE `komentari`
  ADD CONSTRAINT `komentari_ibfk_1` FOREIGN KEY (`proizvod_id`) REFERENCES `proizvodi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
