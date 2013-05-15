-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generato il: Mag 01, 2013 alle 16:47
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
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `video_ID` int(11) unsigned NOT NULL,
  `user_ID` int(11) unsigned NOT NULL,
  `vote` tinyint(1) unsigned NOT NULL,
  `comment` text CHARACTER SET utf8 NOT NULL,
  `timestamp_insert` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `timestamp_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=101 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `av_quotes`
--

CREATE TABLE IF NOT EXISTS `av_quotes` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `quote` text COLLATE latin1_general_ci,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=512 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `av_videos`
--

CREATE TABLE IF NOT EXISTS `av_videos` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `host` tinyint(1) unsigned NOT NULL,
  `host_video_ID` varchar(128) COLLATE latin1_general_ci NOT NULL,
  `title` varchar(128) CHARACTER SET utf8 NOT NULL,
  `description` varchar(4000) CHARACTER SET utf8 NOT NULL,
  `thumbnail_default` varchar(128) COLLATE latin1_general_ci NOT NULL,
  `thumbnail_medium` varchar(128) COLLATE latin1_general_ci NOT NULL,
  `thumbnail_high` varchar(128) COLLATE latin1_general_ci NOT NULL,
  `user_ID` int(11) unsigned NOT NULL,
  `views` int(11) unsigned NOT NULL,
  `timestamp_insert` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `timestamp_edit` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `daily_views` int(11) unsigned NOT NULL,
  `weekly_views` int(11) unsigned NOT NULL,
  `monthly_views` int(11) unsigned NOT NULL,
  `votes` int(11) unsigned NOT NULL,
  `daily_votes` int(11) unsigned NOT NULL,
  `weekly_votes` int(11) unsigned NOT NULL,
  `monthly_votes` int(11) unsigned NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `timestamp_edit` (`timestamp_edit`),
  KEY `weekly_views` (`weekly_views`,`ID`,`title`,`thumbnail_default`,`views`),
  KEY `daily_views` (`daily_views`,`ID`,`title`,`thumbnail_default`,`views`),
  KEY `monthly_views` (`monthly_views`,`ID`,`title`,`thumbnail_default`,`views`),
  KEY `views` (`views`,`ID`,`title`,`thumbnail_default`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=309 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `av_views`
--

CREATE TABLE IF NOT EXISTS `av_views` (
  `video_ID` int(11) unsigned NOT NULL,
  `date` date NOT NULL,
  `slot` tinyint(3) unsigned NOT NULL,
  `cnt` int(10) unsigned NOT NULL,
  PRIMARY KEY (`video_ID`,`date`,`slot`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
