-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 12. Jan 2017 um 19:52
-- Server-Version: 10.1.19-MariaDB
-- PHP-Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `beindie`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `employee`
--

CREATE TABLE `employee` (
  `e_ID` int(11) NOT NULL,
  `e_firstname` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `e_lastname` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `e_birthdate` varchar(20) NOT NULL,
  `e_image` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `employee`
--

INSERT INTO `employee` (`e_ID`, `e_firstname`, `e_lastname`, `e_birthdate`, `e_image`) VALUES
(1, 'Ron', 'Wagner', '25.07.1996', 'images/e_images/ronw.jpg'),
(2, 'Paul', 'Hentgen', '25.08.1992', 'images/e_images/paulh.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `project`
--

CREATE TABLE `project` (
  `project_ID` int(11) NOT NULL,
  `creator` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `goal` int(11) NOT NULL,
  `current_status` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `category` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `project`
--

INSERT INTO `project` (`project_ID`, `creator`, `title`, `goal`, `current_status`, `start_date`, `end_date`, `category`) VALUES
(2, 'John.D@gmail.com', 'Awesome Project', 500000, 125000, '2016-12-01', '2017-01-16', 'Technologie'),
(3, 'kelixf@gmx.de', 'Barbie 2.0', 1000, 10, '2017-01-12', '2017-04-12', 'Beauty & Kosmetik'),
(4, 'paul.hentgen@fh-erfurt.de', 'All Woman''s Sea - The Game', 100000, 250000, '2016-11-01', '2017-04-01', 'Spiele'),
(5, 'ron.wagner@fh-erfurt.de', 'Fatbool - The football reinvented', 15000, 1255, '2016-07-25', '2017-07-25', 'Sport'),
(6, 'wurstjay@web.de', 'Real Roschter - The Wurst for everyone', 35000, 23450, '2016-11-29', '2017-03-24', 'Beauty & Kosmetik'),
(7, 'Not.Doe@gmail.com', 'The Face Enhancer - Be beautiful for once', 8000, 5, '2017-01-01', '2017-04-28', 'Beauty & Kosmetik'),
(8, 'kelixf@gmx.de', 'Strawberry Cookie', 17500, 555, '2016-12-24', '2017-03-16', 'Technologie');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `project_image`
--

CREATE TABLE `project_image` (
  `image_ID` int(11) NOT NULL,
  `project_ID` int(11) NOT NULL,
  `slideshow_picture` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `project_image`
--

INSERT INTO `project_image` (`image_ID`, `project_ID`, `slideshow_picture`) VALUES
(1, 2, 'images/slideshow_img/awesome1.jpg'),
(2, 2, 'images/slideshow_img/awesome2.jpg'),
(3, 2, 'images/slideshow_img/awesome3.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `transaction`
--

CREATE TABLE `transaction` (
  `ID` int(11) NOT NULL,
  `user_ID` varchar(200) NOT NULL,
  `project_ID` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `transaction`
--

INSERT INTO `transaction` (`ID`, `user_ID`, `project_ID`, `amount`) VALUES
(1, 'Not.Doe@gmail.com', 2, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `user_ID` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `location` varchar(200) NOT NULL,
  `crypt_pw` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`user_ID`, `email`, `user_name`, `first_name`, `last_name`, `avatar`, `location`, `crypt_pw`) VALUES
(2, 'John.D@gmail.com', 'JD', 'John', 'Doe', '/img/johnD.png', 'Erfurt, Germany', ''),
(3, 'Not.Doe@gmail.com', 'NotD', 'Not', 'Doe', '/img/not.jpg', 'Weimar, Germany', ''),
(4, 'kelixf@gmx.de', 'TheFiesling', 'Kelix', 'Fießling', NULL, 'Waynetrain, No Mans Sky', ''),
(5, 'ron.wagner@fh-erfurt.de', 'ro6520wa', 'Ron', 'Wagner', NULL, 'Weimar, Germany', ''),
(6, 'wurstjay@web.de', 'WurstJay', 'Jonathan', 'Wurst', NULL, 'Oktoberfest, Germany', ''),
(7, 'paul.hentgen@fh-erfurt.de', 'pa4873he', 'Paul', 'Hentgen', NULL, 'Erfurt, Germany', '');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`e_ID`);

--
-- Indizes für die Tabelle `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_ID`),
  ADD KEY `creator` (`creator`);

--
-- Indizes für die Tabelle `project_image`
--
ALTER TABLE `project_image`
  ADD PRIMARY KEY (`image_ID`),
  ADD KEY `project_ID` (`project_ID`);

--
-- Indizes für die Tabelle `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `creator` (`user_ID`),
  ADD KEY `project_ID` (`project_ID`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`),
  ADD KEY `e-mail` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `employee`
--
ALTER TABLE `employee`
  MODIFY `e_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `project`
--
ALTER TABLE `project`
  MODIFY `project_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT für Tabelle `project_image`
--
ALTER TABLE `project_image`
  MODIFY `image_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `transaction`
--
ALTER TABLE `transaction`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `user` (`email`);

--
-- Constraints der Tabelle `project_image`
--
ALTER TABLE `project_image`
  ADD CONSTRAINT `project_image_ibfk_1` FOREIGN KEY (`project_ID`) REFERENCES `project` (`project_ID`);

--
-- Constraints der Tabelle `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`project_ID`) REFERENCES `project` (`project_ID`),
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`user_ID`) REFERENCES `user` (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
