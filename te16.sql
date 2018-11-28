-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 17 okt 2018 kl 11:10
-- Serverversion: 10.1.35-MariaDB
-- PHP-version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `te16`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `login`
--

CREATE TABLE `login` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `email`) VALUES
(2, 'felix', '$2y$10$CFJaED0/.ATmxpRq8R17VuWgX4hMLZIpfRTuOj8PKdBQjFUw1BvES', 'felle00@live.se');

-- --------------------------------------------------------

--
-- Tabellstruktur `story`
--

CREATE TABLE `story` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `plats` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `story`
--

INSERT INTO `story` (`id`, `text`, `plats`) VALUES
(1, 'Vill du spela som Alfredo eller Violetta?', 'Början'),
(2, 'Du vaknar i en mjuk och skön säng. Vad ska du ha på dig idag?', 'alfredosHus'),
(3, 'Ah, ännu en dag med storslagna fester. Vad ska jag ha på mig idag? ', 'violettasHus'),
(4, 'Du kommer ner i köket och tar fram ett paket stor franska och förbereder frukosten.', 'Alfredos_kök'),
(5, 'Nu då du ätit dig mät så då är det väl dags att ge sig ut på stan. Ska du ta bilen, cykeln eller ska du gå?', 'Alfredos_Garage'),
(6, 'Du går ner i köket och steker 18 stycken ägg. ', 'Alfredos_köketNaken'),
(7, 'Du känner dig mätt och belåten. Men nu är alla dina ägg slut och du måste fara och köpa mer. Med en snabb tit ut ser du att det är strålande fint väder. Hur ska du ta dig till affären? ', 'Alfredos_hallnaken'),
(8, 'Du går in i garaget och sätter dig i bilen och kör ut.', 'bilnaken'),
(9, 'Du går ut och sätter dig på cykeln. Du får ovanligt mycket uppmärksamhet, dom måste nog äntligen ha upptäckt hur fin din cykel är. \r\n\r\nEn gammal tant går ut framför dig. \r\n\r\nSka du köra på henne eller inte?', 'cykelnaken'),
(10, 'Du går ut genom dörren och svänger höger, varför vet ingen men du gör det iallafall även fast att du vet att affären är åt det motsatta hållet. \r\n\r\nDu kommer fram till en gigantisk mur, den verkar att sträcka sig så långt ögat når. Den finns en lucka nog stor att krypa igenom och en stege lite till höger från den. Vilken väg tar du\r\n?', 'gånaken'),
(11, 'Det kallt och fuktigt inuti hålet. Ska du fortsätta in?', 'luckan'),
(12, 'du klättrar uppåt. ', 'stegen'),
(13, 'Du går längre och längre in. Du kommer fram till ett väl upplyst rum, det är nog högt i tak för att du ska kunna stå upp. Två kolsvarta gångar är inhuggna i väggen. Ljust från rummet slutar tvärt framför de båda gångarna. Vad gör du? ', 'i_hållet'),
(14, 'du vänder dig om för att gå tillbaka den väg som du kom men gången du kom genom verkar ha försvunnit.\r\n\r\nDet finns bara en väg och det är framåt. \r\n', 'rummet'),
(15, 'Du kryper osäkert in i tunneln och det är någonting kletigt på marken. Du tittar bakåt mot rummet men du ser bara mörker. Du får svårt att andas, och känner hur vägarna sakta krymper runt dig. ', 'högra_tunneln'),
(16, 'Du böjer dig ned och kryper in i tunneln. ', 'vänstra_tunneln');

-- --------------------------------------------------------

--
-- Tabellstruktur `storylinks`
--

CREATE TABLE `storylinks` (
  `id` int(10) UNSIGNED NOT NULL,
  `storyid` int(10) UNSIGNED NOT NULL,
  `target` int(10) UNSIGNED NOT NULL,
  `text` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `storylinks`
--

INSERT INTO `storylinks` (`id`, `storyid`, `target`, `text`) VALUES
(3, 1, 2, 'Alfredo'),
(4, 1, 3, 'Violetta'),
(5, 2, 4, 'Kostym '),
(6, 2, 6, 'ingenting'),
(7, 4, 5, 'fortsätt '),
(8, 6, 8, 'bil'),
(9, 6, 9, 'cykel'),
(10, 6, 10, 'gå'),
(11, 10, 11, 'luckan'),
(12, 10, 12, 'stege'),
(13, 11, 13, 'fortsätt '),
(14, 11, 14, 'gå därifrån'),
(15, 13, 14, 'gå tillbaka den väg du kom. '),
(16, 13, 15, 'högra tunneln'),
(17, 13, 16, 'vänstra tunneln'),
(18, 14, 15, 'högra tunneln'),
(19, 14, 16, 'västra tunneln');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `storylinks`
--
ALTER TABLE `storylinks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT för tabell `story`
--
ALTER TABLE `story`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT för tabell `storylinks`
--
ALTER TABLE `storylinks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
