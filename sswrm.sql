-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Mai 2025 um 11:52
-- Server-Version: 10.4.24-MariaDB
-- PHP-Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `sswrm`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `factories`
--

CREATE TABLE `factories` (
  `ID` int(11) NOT NULL,
  `Type` varchar(4) DEFAULT NULL,
  `ModifierTime` int(11) DEFAULT NULL,
  `ModifierDescription` text DEFAULT NULL,
  `Modifier` tinyint(3) UNSIGNED DEFAULT NULL,
  `Workers` int(11) DEFAULT NULL,
  `GameStateID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `gamestates`
--

CREATE TABLE `gamestates` (
  `ID` int(11) NOT NULL,
  `LastEventInRounds` int(11) DEFAULT NULL,
  `PlayerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `market`
--

CREATE TABLE `market` (
  `ID` int(11) NOT NULL,
  `RawMaterialsPrice` int(11) DEFAULT NULL,
  `ToolsPrice` int(11) DEFAULT NULL,
  `SteelPrice` int(11) DEFAULT NULL,
  `ClothingPrice` int(11) DEFAULT NULL,
  `FurniturePrice` int(11) DEFAULT NULL,
  `GameStateID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `players`
--

CREATE TABLE `players` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `players`
--

INSERT INTO `players` (`ID`, `Name`, `Password`) VALUES
(1, 'Max', '$2y$10$0mCYCItPcbMUJIJoV9lB0uxthGh1mHmmPlUc5U3oD9XJBg/1MlZi.'),
(2, 'Max2', '$2y$10$cNFlZg67VoIn9Qv98kpxTuMTnJyXJYTvYQRXVchWCx0mv2KCXZABC'),
(3, 'Spieler', '$2y$10$VrLN4ZibNDHOxD67fIS6OuPDRK/n5mrqrdrO4x8RdqtAx3Fzt/mAe');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `resources`
--

CREATE TABLE `resources` (
  `ID` int(11) NOT NULL,
  `CreditPoints` int(11) DEFAULT NULL,
  `RawMaterials` int(11) DEFAULT NULL,
  `Tools` int(11) DEFAULT NULL,
  `Steel` int(11) DEFAULT NULL,
  `Clothing` int(11) DEFAULT NULL,
  `Furniture` int(11) DEFAULT NULL,
  `GameStateID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `factories`
--
ALTER TABLE `factories`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `GameStateID` (`GameStateID`);

--
-- Indizes für die Tabelle `gamestates`
--
ALTER TABLE `gamestates`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PlayerID` (`PlayerID`);

--
-- Indizes für die Tabelle `market`
--
ALTER TABLE `market`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `GameStateID` (`GameStateID`);

--
-- Indizes für die Tabelle `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `GameStateID` (`GameStateID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `factories`
--
ALTER TABLE `factories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `gamestates`
--
ALTER TABLE `gamestates`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `market`
--
ALTER TABLE `market`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `players`
--
ALTER TABLE `players`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `resources`
--
ALTER TABLE `resources`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `factories`
--
ALTER TABLE `factories`
  ADD CONSTRAINT `factories_ibfk_1` FOREIGN KEY (`GameStateID`) REFERENCES `gamestates` (`ID`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `gamestates`
--
ALTER TABLE `gamestates`
  ADD CONSTRAINT `gamestates_ibfk_1` FOREIGN KEY (`PlayerID`) REFERENCES `players` (`ID`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `market`
--
ALTER TABLE `market`
  ADD CONSTRAINT `market_ibfk_1` FOREIGN KEY (`GameStateID`) REFERENCES `gamestates` (`ID`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resources_ibfk_1` FOREIGN KEY (`GameStateID`) REFERENCES `gamestates` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
