-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generato il: Apr 22, 2013 alle 14:00
-- Versione del server: 5.5.27
-- Versione PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `avideo`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `av_comments`
--

CREATE TABLE IF NOT EXISTS `av_comments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `video_ID` int(11) NOT NULL,
  `vote` int(11) NOT NULL,
  `comment` text NOT NULL,
  `timestamp_insert` int(11) NOT NULL,
  `timestamp_edit` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `av_quotes`
--

CREATE TABLE IF NOT EXISTS `av_quotes` (
  `ID` int(11) NOT NULL,
  `quote` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `av_videos`
--

CREATE TABLE IF NOT EXISTS `av_videos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `host` int(11) NOT NULL,
  `host_video_ID` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `description` varchar(4000) NOT NULL,
  `thumbnail_default` varchar(128) NOT NULL,
  `thumbnail_medium` varchar(128) NOT NULL,
  `thumbnail_high` varchar(128) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `timestamp_insert` int(11) NOT NULL,
  `timestamp_edit` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=262 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `av_views`
--

CREATE TABLE IF NOT EXISTS `av_views` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `video_ID` int(11) NOT NULL,
  `timestamp_insert` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2047 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
