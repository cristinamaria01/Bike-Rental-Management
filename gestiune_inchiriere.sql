-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mart. 02, 2019 la 12:11 PM
-- Versiune server: 10.1.36-MariaDB
-- Versiune PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `gestiune_inchiriere`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `bicicleta`
--

CREATE TABLE `bicicleta` (
  `ID_bicicleta` int(8) NOT NULL,
  `Marca` varchar(20) NOT NULL,
  `Caracteristici` varchar(60) NOT NULL,
  `ID_centru` int(6) NOT NULL,
  `Libera` char(2) NOT NULL,
  `Pret_extra` float DEFAULT NULL,
  `ID_inchiriere` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `bicicleta`
--

INSERT INTO `bicicleta` (`ID_bicicleta`, `Marca`, `Caracteristici`, `ID_centru`, `Libera`, `Pret_extra`, `ID_inchiriere`) VALUES
(24, 'bike', 'verde, adulti', 3, 'nu', 1, 89),
(27, 'Scott', 'electrica, de oras', 4, 'nu', 0, 0),
(29, 'Scott', 'Galbena', 4, 'nu', 1, 0),
(30, 'Focus', 'rosie, oras', 6, 'nu', 2, 0),
(31, 'Scott', 'copii, suspensie', 4, 'da', 0, NULL),
(33, 'helveta', 'rosie, oras', 3, 'da', 0, NULL),
(34, 'Niciuna', '-', 6, '-', 0, 0);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `centru_inchiriere`
--

CREATE TABLE `centru_inchiriere` (
  `ID_centru` int(6) NOT NULL,
  `Nume_centru` varchar(20) NOT NULL,
  `Adresa_centru` varchar(60) NOT NULL,
  `Telefon_centru` char(10) NOT NULL,
  `Orar_functionare` varchar(20) NOT NULL,
  `Sector` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `centru_inchiriere`
--

INSERT INTO `centru_inchiriere` (`ID_centru`, `Nume_centru`, `Adresa_centru`, `Telefon_centru`, `Orar_functionare`, `Sector`) VALUES
(3, 'Principal', 'Splaiul Independentei, nr. 300', '0751261817', 'non-stop', '6'),
(4, 'Unirii', 'Piata Unirii', '0218294738', 'non-stop', '1'),
(5, 'Victoriei', 'Piata Victoriei', '0318921748', 'zilnic, 8:00-21:30', '1'),
(6, 'Berceni', 'Soseaua Berceni, nr. 40, bloc F9, parter, ap. 5.', '0315246342', 'zilnic, 9-21', '4');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `inchiriere`
--

CREATE TABLE `inchiriere` (
  `ID_inchiriere` int(12) NOT NULL,
  `ID_client` int(11) NOT NULL,
  `ID_bicicleta` int(8) NOT NULL,
  `Data_inchiriere` date NOT NULL,
  `Ora_inchiriere` time NOT NULL,
  `ID_Tarif` int(4) DEFAULT NULL,
  `Data_retur` date NOT NULL,
  `Ora_retur` time NOT NULL,
  `ID_paguba` int(3) DEFAULT NULL,
  `ID_intarziere` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `inchiriere`
--

INSERT INTO `inchiriere` (`ID_inchiriere`, `ID_client`, `ID_bicicleta`, `Data_inchiriere`, `Ora_inchiriere`, `ID_Tarif`, `Data_retur`, `Ora_retur`, `ID_paguba`, `ID_intarziere`) VALUES
(89, 2, 24, '2019-01-19', '838:59:59', 1, '2019-01-20', '838:59:59', 1, 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `info_client`
--

CREATE TABLE `info_client` (
  `ID_client` int(11) NOT NULL,
  `Nume` varchar(30) NOT NULL,
  `Prenume` varchar(30) NOT NULL,
  `CNP` char(13) NOT NULL,
  `SeriaCI` char(2) NOT NULL,
  `NumarCI` int(6) NOT NULL,
  `Adresa_client` varchar(60) NOT NULL,
  `Telefon_client` char(10) NOT NULL,
  `ID_inchiriere` int(12) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `parola` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `info_client`
--

INSERT INTO `info_client` (`ID_client`, `Nume`, `Prenume`, `CNP`, `SeriaCI`, `NumarCI`, `Adresa_client`, `Telefon_client`, `ID_inchiriere`, `username`, `parola`) VALUES
(1, 'Matei', 'Alex', '1971212121212', 'df', 243545, 'Strada Calarasi,  nr 59, Sector 4, Bucuresti', '0762223344', 0, 'alexmatei', '123456'),
(2, 'Acu', 'Iuliana', '2972847634100', 'xz', 834753, 'Splaiul Independentei, nr. 290, Sector 6, Bucuresti', '0749118724', 89, 'iuliana', '123456'),
(4, 'admin', 'admin', '*************', 'xx', 0, 'Splaiul Independentei, nr. 300, Sector 6, Bucuresti', '0720202020', 1, 'admin', '123456'),
(6, 'pop', 'ioana', '2222222222222', 'ff', 777777, 'stra,sjhaadass', '0737624213', 0, 'ioana', '123456');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `intarziere`
--

CREATE TABLE `intarziere` (
  `ID_intarziere` int(4) NOT NULL,
  `Nr_minute` int(11) NOT NULL,
  `Tarif` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `intarziere`
--

INSERT INTO `intarziere` (`ID_intarziere`, `Nr_minute`, `Tarif`) VALUES
(1, 1, 0.3),
(2, 2, 0.5),
(3, 3, 1),
(4, 4, 1.5),
(5, 5, 2),
(6, 6, 3),
(7, 7, 3.5),
(8, 8, 4),
(9, 9, 4.5),
(10, 10, 5),
(11, 15, 7),
(12, 30, 15),
(13, 60, 30);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `paguba`
--

CREATE TABLE `paguba` (
  `ID_paguba` int(3) NOT NULL,
  `Tip_paguba` varchar(20) NOT NULL,
  `Pret_paguba` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `paguba`
--

INSERT INTO `paguba` (`ID_paguba`, `Tip_paguba`, `Pret_paguba`) VALUES
(1, 'cauciuc spart', 5),
(2, 'lipsa suruburi', 5),
(3, 'lant picat', 10),
(4, 'zgarietura mare', 10),
(5, 'zgarietura mica', 2),
(6, 'componente lipsa', 20);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `tarife`
--

CREATE TABLE `tarife` (
  `ID_Tarif` int(4) NOT NULL,
  `Interval_orar` varchar(20) NOT NULL,
  `Ziua` varchar(15) NOT NULL,
  `Pret/ora` float NOT NULL,
  `Pret/minut` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `tarife`
--

INSERT INTO `tarife` (`ID_Tarif`, `Interval_orar`, `Ziua`, `Pret/ora`, `Pret/minut`) VALUES
(1, '7-12', 'luni-vineri', 5, 0.1),
(2, '7-12', 'sambata-duminic', 7, 0.15),
(3, '12-18', 'luni-vineri', 7.5, 0.15),
(4, '12-18', 'sambata-duminic', 10, 0.2),
(5, '18-22', 'luni-vineri', 10, 0.2),
(6, '18-22', 'sambata-duminic', 12, 0.25),
(7, '22-7', 'zilnic', 10, 0.2);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `bicicleta`
--
ALTER TABLE `bicicleta`
  ADD PRIMARY KEY (`ID_bicicleta`),
  ADD KEY `ID_centru` (`ID_centru`),
  ADD KEY `ID_inchiriere` (`ID_inchiriere`);

--
-- Indexuri pentru tabele `centru_inchiriere`
--
ALTER TABLE `centru_inchiriere`
  ADD PRIMARY KEY (`ID_centru`),
  ADD UNIQUE KEY `ID_centru` (`ID_centru`);

--
-- Indexuri pentru tabele `inchiriere`
--
ALTER TABLE `inchiriere`
  ADD PRIMARY KEY (`ID_inchiriere`),
  ADD UNIQUE KEY `ID_inchiriere` (`ID_inchiriere`),
  ADD UNIQUE KEY `ID_client_2` (`ID_client`),
  ADD UNIQUE KEY `ID_bicicleta_2` (`ID_bicicleta`),
  ADD UNIQUE KEY `ID_Tarif` (`ID_Tarif`),
  ADD KEY `ID_client` (`ID_client`),
  ADD KEY `ID_bicicleta` (`ID_bicicleta`),
  ADD KEY `ID_paguba` (`ID_paguba`),
  ADD KEY `ID_intarziere` (`ID_intarziere`);

--
-- Indexuri pentru tabele `info_client`
--
ALTER TABLE `info_client`
  ADD PRIMARY KEY (`ID_client`),
  ADD UNIQUE KEY `CNP` (`CNP`),
  ADD UNIQUE KEY `CNP_2` (`CNP`),
  ADD UNIQUE KEY `ID_client` (`ID_client`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexuri pentru tabele `intarziere`
--
ALTER TABLE `intarziere`
  ADD PRIMARY KEY (`ID_intarziere`);

--
-- Indexuri pentru tabele `paguba`
--
ALTER TABLE `paguba`
  ADD PRIMARY KEY (`ID_paguba`);

--
-- Indexuri pentru tabele `tarife`
--
ALTER TABLE `tarife`
  ADD PRIMARY KEY (`ID_Tarif`),
  ADD KEY `Interval_orar` (`Interval_orar`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `bicicleta`
--
ALTER TABLE `bicicleta`
  MODIFY `ID_bicicleta` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pentru tabele `centru_inchiriere`
--
ALTER TABLE `centru_inchiriere`
  MODIFY `ID_centru` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pentru tabele `inchiriere`
--
ALTER TABLE `inchiriere`
  MODIFY `ID_inchiriere` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT pentru tabele `info_client`
--
ALTER TABLE `info_client`
  MODIFY `ID_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pentru tabele `intarziere`
--
ALTER TABLE `intarziere`
  MODIFY `ID_intarziere` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pentru tabele `paguba`
--
ALTER TABLE `paguba`
  MODIFY `ID_paguba` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pentru tabele `tarife`
--
ALTER TABLE `tarife`
  MODIFY `ID_Tarif` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `bicicleta`
--
ALTER TABLE `bicicleta`
  ADD CONSTRAINT `bicicleta_ibfk_1` FOREIGN KEY (`ID_centru`) REFERENCES `centru_inchiriere` (`ID_centru`);

--
-- Constrângeri pentru tabele `inchiriere`
--
ALTER TABLE `inchiriere`
  ADD CONSTRAINT `inchiriere_ibfk_1` FOREIGN KEY (`ID_client`) REFERENCES `info_client` (`ID_client`),
  ADD CONSTRAINT `inchiriere_ibfk_2` FOREIGN KEY (`ID_paguba`) REFERENCES `paguba` (`ID_paguba`),
  ADD CONSTRAINT `inchiriere_ibfk_3` FOREIGN KEY (`ID_intarziere`) REFERENCES `intarziere` (`ID_intarziere`),
  ADD CONSTRAINT `inchiriere_ibfk_5` FOREIGN KEY (`ID_bicicleta`) REFERENCES `bicicleta` (`ID_bicicleta`),
  ADD CONSTRAINT `inchiriere_ibfk_6` FOREIGN KEY (`ID_Tarif`) REFERENCES `tarife` (`ID_Tarif`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
