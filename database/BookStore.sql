-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 25. Mrz 2016 um 21:35
-- Server-Version: 5.7.9
-- PHP-Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `bookstore`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bid` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `author` varchar(50) NOT NULL,
  `message` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `giver` int(11) NOT NULL,
  `field` varchar(10) NOT NULL,
  `publishingDate` date NOT NULL,
  `price` varchar(10) NOT NULL,
  `hidden` tinyint(1) NOT NULL,
  `taken` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='at';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `took`
--

DROP TABLE IF EXISTS `took`;
CREATE TABLE IF NOT EXISTS `took` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `deadline` date NOT NULL,
  `giveback` date NOT NULL,
  `class` varchar(5) NOT NULL,
  `extensions` varchar(250) NOT NULL,
  `notice` varchar(100) NOT NULL,
  `book` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`name`, `password`) VALUES
('root', 'root');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
