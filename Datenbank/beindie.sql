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
(1, 'Ran', 'Wogner', '25.07.1996', 'images/e_images/ronw.jpg'),
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
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `project`
--

INSERT INTO `project` (`project_ID`, `creator`, `title`, `goal`, `current_status`, `start_date`, `end_date`) VALUES
(2, 'John.D@gmail.com', 'Awesome Project', 500000, 125000, '2016-12-01', '2017-01-16');

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
  `e-mail` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`user_ID`, `e-mail`, `first_name`, `last_name`, `avatar`, `location`) VALUES
(2, 'John.D@gmail.com', 'John', 'Doe', '/img/johnD.png', 'Erfurt, Germany'),
(3, 'Not.Doe@gmail.com', 'Not', 'Doe', '/img/not.jpg', 'Weimar, Germany');

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
  ADD KEY `e-mail` (`e-mail`);

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
  MODIFY `project_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `user` (`e-mail`);

--
-- Constraints der Tabelle `project_image`
--
ALTER TABLE `project_image`
  ADD CONSTRAINT `project_image_ibfk_1` FOREIGN KEY (`project_ID`) REFERENCES `project` (`project_ID`);

--
-- Constraints der Tabelle `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`e-mail`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`project_ID`) REFERENCES `project` (`project_ID`),
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`user_ID`) REFERENCES `user` (`e-mail`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
