-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 18. Jan 2017 um 09:56
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
  `category` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `project`
--

INSERT INTO `project` (`project_ID`, `creator`, `title`, `goal`, `current_status`, `start_date`, `end_date`, `category`, `description`) VALUES
(2, 'John.D@gmail.com', 'Awesome Project', 50000, 125000, '2016-12-01', '2017-01-16', 'technology', 'texts/description_texts/2.txt'),
(3, 'kelixf@gmx.de', 'Barbie 2.0', 1000, 10, '2017-01-12', '2017-04-12', 'beauty', 'texts/description_texts/3.txt'),
(4, 'paul.hentgen@fh-erfurt.de', 'All Woman''s Sea - The Game', 100000, 250000, '2016-11-01', '2017-04-01', 'games', 'texts/description_texts/4.txt'),
(5, 'ron.wagner@fh-erfurt.de', 'Fatbool - The football reinvented', 15000, 1255, '2016-07-25', '2017-07-25', 'sports', 'texts/description_texts/5.txt'),
(6, 'wurstjay@web.de', 'Real Roschter - The Wurst for everyone', 35000, 23450, '2016-11-29', '2017-03-24', 'beauty', 'texts/description_texts/6.txt'),
(7, 'Not.Doe@gmail.com', 'The Face Enhancer - Be beautiful for once', 8000, 500, '2017-01-01', '2017-04-28', 'beauty', 'texts/description_texts/7.txt'),
(8, 'kelixf@gmx.de', 'Strawberry Cookie', 17500, 555, '2016-12-24', '2017-01-13', 'technology', 'texts/description_texts/8.txt');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `project_image`
--

CREATE TABLE `project_image` (
  `image_ID` int(11) NOT NULL,
  `project_ID` int(11) NOT NULL,
  `image_path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `project_image`
--

INSERT INTO `project_image` (`image_ID`, `project_ID`, `image_path`) VALUES
(1, 2, 'images/project_images/2_1.jpg'),
(2, 2, 'images/project_images/2_2.jpg'),
(3, 2, 'images/project_images/2_3.jpg'),
(10, 3, 'images/project_images/3_4.jpg'),
(11, 4, 'images/project_images/4_5.jpg'),
(12, 5, 'images/project_images/5_6.jpg'),
(13, 6, 'images/project_images/6_7.jpg'),
(14, 7, 'images/project_images/7_8.jpg'),
(15, 8, 'images/project_images/8_9.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reward`
--

CREATE TABLE `reward` (
  `reward_ID` int(11) NOT NULL,
  `project_ID` int(11) NOT NULL,
  `min_amount` int(11) NOT NULL,
  `r_title` varchar(50) NOT NULL,
  `r_text` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `reward`
--

INSERT INTO `reward` (`reward_ID`, `project_ID`, `min_amount`, `r_title`, `r_text`) VALUES
(1, 2, 1, 'Thank you!', 'texts/reward_texts/2_1.txt'),
(2, 2, 5, 'You are awesome!', 'texts/reward_texts/2_5.txt'),
(3, 2, 50, 'You are more more awesome!', 'texts/reward_texts/2_50.txt'),
(4, 2, 25, 'You are more awesome!', 'texts/reward_texts/2_25.txt');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `transaction`
--

CREATE TABLE `transaction` (
  `transaction_ID` int(11) NOT NULL,
  `user_ID` varchar(200) NOT NULL,
  `project_ID` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `transaction`
--

INSERT INTO `transaction` (`transaction_ID`, `user_ID`, `project_ID`, `amount`) VALUES
(1, 'Not.Doe@gmail.com', 2, 10000),
(2, 'kelixf@gmx.de', 5, 5000),
(3, 'paul.hentgen@fh-erfurt.de', 2, 100),
(4, 'wurstjay@web.de', 7, 200),
(5, 'ron.wagner@fh-erfurt.de', 5, 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `user_ID` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `crypt_pw` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`user_ID`, `email`, `user_name`, `first_name`, `last_name`, `avatar`, `location`, `crypt_pw`) VALUES
(2, 'John.D@gmail.com', 'JD', 'John', 'Doe', '/img/johnD.png', 'Erfurt, Germany', '$2y$10$88pYVXdm03EyGa4Z2.zB2OCrbFIadc6E..Rd8PgYMnZ64Acjshof.'),
(3, 'Not.Doe@gmail.com', 'NotD', 'Not', 'Doe', '/img/not.jpg', 'Weimar, Germany', '$2y$10$88pYVXdm03EyGa4Z2.zB2OCrbFIadc6E..Rd8PgYMnZ64Acjshof.'),
(4, 'kelixf@gmx.de', 'TheFiesling', 'Kelix', 'Fießling', NULL, 'Waynetrain, No Mans Sky', '$2y$10$88pYVXdm03EyGa4Z2.zB2OCrbFIadc6E..Rd8PgYMnZ64Acjshof.'),
(5, 'ron.wagner@fh-erfurt.de', 'ro6520wa', 'Ron', 'Wagner', NULL, 'Weimar, Germany', '$2y$10$88pYVXdm03EyGa4Z2.zB2OCrbFIadc6E..Rd8PgYMnZ64Acjshof.'),
(6, 'wurstjay@web.de', 'WurstJay', 'Jonathan', 'Wurst', NULL, 'Oktoberfest, Germany', '$2y$10$88pYVXdm03EyGa4Z2.zB2OCrbFIadc6E..Rd8PgYMnZ64Acjshof.'),
(7, 'paul.hentgen@fh-erfurt.de', 'pa4873he', 'Paul', 'Hentgen', NULL, 'Erfurt, Germany', '$2y$10$88pYVXdm03EyGa4Z2.zB2OCrbFIadc6E..Rd8PgYMnZ64Acjshof.'),
(12, 'jochen@schweizer.com', 'Schwizzi', NULL, NULL, NULL, NULL, '$2y$10$g4Om1KaNaIzi1GJue2/.kecfwVWQQtSUoNIiw/puAocwv3Op8lAgq');

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
-- Indizes für die Tabelle `reward`
--
ALTER TABLE `reward`
  ADD PRIMARY KEY (`reward_ID`),
  ADD KEY `project_ID` (`project_ID`);

--
-- Indizes für die Tabelle `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_ID`),
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
  MODIFY `image_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT für Tabelle `reward`
--
ALTER TABLE `reward`
  MODIFY `reward_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
-- Constraints der Tabelle `reward`
--
ALTER TABLE `reward`
  ADD CONSTRAINT `reward_ibfk_1` FOREIGN KEY (`project_ID`) REFERENCES `project` (`project_ID`);

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
