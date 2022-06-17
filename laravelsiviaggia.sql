-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 17, 2022 alle 11:48
-- Versione del server: 10.4.21-MariaDB
-- Versione PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelsiviaggia`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL COMMENT 'id riga pk, auto increment',
  `user_id` int(11) NOT NULL COMMENT 'id user ',
  `destination` varchar(255) NOT NULL COMMENT 'meta inserita preferita'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabelle con coppie user-destinazione preferita';

-- --------------------------------------------------------

--
-- Struttura della tabella `mete`
--

CREATE TABLE `mete` (
  `id` int(11) NOT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `content` text DEFAULT 'NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `mete`
--

INSERT INTO `mete` (`id`, `destination`, `img`, `price`, `days`, `content`) VALUES
(1, 'Venezia', 'images/Venezia.jpg', 750, 5, 'Volo A/R dai principali aeroporti Italiani\nTransfer A/R Aeroporto Marco Polo - Venezia\nAlloggio in pensione completa 3 stelle\nVisita Palazzo Ducale\nVisita Basilica di San Marco (solo ingresso)\nVisita Scala Contarini del Bovolo\nVenezia Pass (10 chiese a vostra scelta)\nGiro in gondola tipica 30 minuti'),
(2, 'Roma', 'images/Roma.jpg', 640, 4, 'Volo A/R dai principali aeroporti Italiani\nTransfer A/R Aeroporto Fiumicino - Roma\nAlloggio in pensione completa 4 stelle\nVisita Colosseo\nVisita Altare della Patria (con ascensore panoramico)\nVisita Cupolone Basilica di San Pietro\nPranzo tipico Trastevere'),
(3, 'Firenze', 'images/Firenze.jpg', 500, 3, 'Volo A/R dai principali aeroporti Italiani\nTransfer A/R Aeroporto Pisa - Firenze\nAlloggio in mezza pensione 4 stelle\nVisita Basilica di Santa Maria Novella\nVisita Museo Uffizi\nVisita Cupola del Brunelleschi\nCena tipica con fiorentina 1,5Kg'),
(4, 'Milano', 'images/Milano.jpg', 600, 4, 'Volo A/R dai principali aeroporti Italiani\nTransfer A/R Aeroporto Malpensa - Milano\nAlloggio in pensione completa 3 stelle\nVisita Duomo e Madonnina\nVisita Pinacoteca di Brera (Ultima Cena)\nVisita Teatro la Scala\nCena tipica con risotto allo zafferano e osso buco');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'id numerico pk auto increment',
  `Nome` varchar(255) NOT NULL COMMENT 'Nome user',
  `Cognome` varchar(255) NOT NULL COMMENT 'Cognome user',
  `Username` varchar(255) NOT NULL COMMENT 'Username unique',
  `Password` varchar(16) NOT NULL COMMENT 'Password user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabella con dati utenti, modellata in User';

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `Nome`, `Cognome`, `Username`, `Password`) VALUES
(1, 'Mario', 'Rossi', 'Mario74', 'Marione74'),
(3, 'Francesco', 'Marotta', 'FraMar', 'Marotta0'),
(6, 'Federica', 'Arena', 'Fede17', 'Arena1704'),
(12, 'Saro', 'Giuffrida', 'Saretto', 'Saro12345'),
(13, 'Ture', 'Arena', 'Ture23', 'Password20'),
(14, 'Giulio', 'Lecci', 'Giulio123', 'Lecci0100'),
(15, 'Francesco', 'Marotta', 'filippo', 'AAAAAA00'),
(16, 'Simone', 'Maravigna', 'simonemar', 'Pippo123!');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`destination`);

--
-- Indici per le tabelle `mete`
--
ALTER TABLE `mete`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id riga pk, auto increment', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT per la tabella `mete`
--
ALTER TABLE `mete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id numerico pk auto increment', AUTO_INCREMENT=17;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
