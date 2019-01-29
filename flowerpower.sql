-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 29 jan 2019 om 08:30
-- Serverversie: 5.7.14
-- PHP-versie: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flowerpower`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestellingen`
--

CREATE TABLE `bestellingen` (
  `id` int(11) NOT NULL,
  `PersoonId` int(11) NOT NULL,
  `Totaalprijs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestellingproducten`
--

CREATE TABLE `bestellingproducten` (
  `id` int(11) NOT NULL,
  `BestellingId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `personen`
--

CREATE TABLE `personen` (
  `id` int(11) NOT NULL,
  `Voornaam` varchar(255) NOT NULL,
  `Achternaam` varchar(255) NOT NULL,
  `Wachtwoord` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Geboortedatum` date NOT NULL,
  `Postcode` varchar(7) NOT NULL,
  `Woonplaats` varchar(255) NOT NULL,
  `RolId` int(11) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `personen`
--

INSERT INTO `personen` (`id`, `Voornaam`, `Achternaam`, `Wachtwoord`, `Email`, `Geboortedatum`, `Postcode`, `Woonplaats`, `RolId`) VALUES
(3, 'test', 'test', 'test', 'test@test.com', '2000-05-16', '7887EZ', 'Erica', 3),
(4, 'henk', 'henk', 'c1b13157df74145d5213c8f4b38d2962b6c4083613c79204ec793e786b21c95885e839a6c0181735692fcb9902066dd486ce4956d97b883e4eb18ed60ba66301', 'henk@henk.com', '2000-05-16', '7887EZ', 'Erica', 1),
(5, 'test', 'test', 'ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff', 'testing@test.com', '2011-08-19', '7887EZ', 'Erica', 3),
(6, 'hen', 'k', 'ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff', 'henkhenk@henk.com', '2000-05-16', '7887EZ', 'Erica', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `producten`
--

CREATE TABLE `producten` (
  `id` int(11) NOT NULL,
  `Productnaam` varchar(255) NOT NULL,
  `Omschrijving` varchar(4080) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Prijs` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `producten`
--

INSERT INTO `producten` (`id`, `Productnaam`, `Omschrijving`, `Image`, `Prijs`) VALUES
(1, 'Roos', 'Tering grote haai met een buik en een lorem ipsum en valt deze tekst nu niet buiten de div en verkracht dit alles want dan moeten we het even afsneiden voor het plakken en alleen laten zien bij hover    Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken. Het heeft niet alleen vijf eeuwen overleefd maar is ook, vrijwel onveranderd, overgenomen in elektronische letterzetting. Het is in de jaren \'60 populair geworden met de introductie van Letraset vellen met Lorem Ipsum passages en meer recentelijk door desktop publishing software zoals Aldus PageMaker die versies van Lorem Ipsum bevatten.', '../../model/img/bloemen/roos', '6'),
(2, 'Roos', 'prikkelig ding met interresante geur', '../../model/img/bloemen/roos', '6'),
(3, 'Roos', 'prikkelig ding met interresante geur', '../../model/img/bloemen/roos', '6'),
(4, 'Roos', 'prikkelig ding met interresante geur', '../../model/img/bloemen/roos', '6'),
(5, 'Roos', 'prikkelig ding met interresante geur', '../../model/img/bloemen/roos', '6'),
(6, 'Roos', 'prikkelig ding met interresante geur', '../../model/img/bloemen/roos', '6'),
(7, 'Roos', 'prikkelig ding met interresante geur', '../../model/img/bloemen/roos', '6'),
(8, 'Roos', 'prikkelig ding met interresante geur', '../../model/img/bloemen/roos', '6'),
(9, 'Roos', 'prikkelig ding met interresante geur', '../../model/img/bloemen/roos', '6'),
(10, 'Roos', 'prikkelig ding met interresante geur', '../../model/img/bloemen/roos', '6'),
(11, 'Roos', 'prikkelig ding met interresante geur', '../../model/img/bloemen/roos', '6'),
(12, 'Roos', 'prikkelig ding met interresante geur', '../../model/img/bloemen/roos', '6'),
(17, 'fsdf', 'fdafads', ' 	../../model/img/bloemen/flowerpower-logo.png', '12321'),
(18, 'testsfewf', 'fsdfsd', ' 	../../model/img/bloemen/Dancers Theo van doesburg 254hx83b.jpg', '20'),
(19, 'fdsfds', 'fsdf', ' 	../../model/img/bloemen/WhatsApp Image 2018-06-26 at 14.31.37(3).jpeg', '15'),
(20, 'fsdfs', 'fdsfds', ' 	../../model/img/bloemen/zonnebloem (2).jpg', '152'),
(21, 'tesdfs', 'fsdf', ' 	../../model/img/bloemen/Dancers Theo van doesburg 254hx83b.jpg', '15');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rollen`
--

CREATE TABLE `rollen` (
  `id` int(11) NOT NULL,
  `Rolnaam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `rollen`
--

INSERT INTO `rollen` (`id`, `Rolnaam`) VALUES
(1, 'admin'),
(2, 'medewerker'),
(3, 'gebruiker');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PersoonId` (`PersoonId`);

--
-- Indexen voor tabel `bestellingproducten`
--
ALTER TABLE `bestellingproducten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `BestellingId` (`BestellingId`),
  ADD KEY `ProductId` (`ProductId`);

--
-- Indexen voor tabel `personen`
--
ALTER TABLE `personen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `RolId` (`RolId`);

--
-- Indexen voor tabel `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `rollen`
--
ALTER TABLE `rollen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `bestellingproducten`
--
ALTER TABLE `bestellingproducten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `personen`
--
ALTER TABLE `personen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT voor een tabel `producten`
--
ALTER TABLE `producten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT voor een tabel `rollen`
--
ALTER TABLE `rollen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD CONSTRAINT `bestellingen_ibfk_1` FOREIGN KEY (`PersoonId`) REFERENCES `personen` (`id`);

--
-- Beperkingen voor tabel `bestellingproducten`
--
ALTER TABLE `bestellingproducten`
  ADD CONSTRAINT `bestellingproducten_ibfk_1` FOREIGN KEY (`BestellingId`) REFERENCES `bestellingen` (`id`),
  ADD CONSTRAINT `bestellingproducten_ibfk_2` FOREIGN KEY (`ProductId`) REFERENCES `producten` (`id`);

--
-- Beperkingen voor tabel `personen`
--
ALTER TABLE `personen`
  ADD CONSTRAINT `personen_ibfk_1` FOREIGN KEY (`RolId`) REFERENCES `rollen` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
