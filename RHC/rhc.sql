-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 19-Dez-2017 às 04:45
-- Versão do servidor: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rhc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `banlist`
--

DROP TABLE IF EXISTS `banlist`;
CREATE TABLE IF NOT EXISTS `banlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banned_username` varchar(64) NOT NULL,
  `ban_start` int(11) NOT NULL,
  `banned_days` int(11) NOT NULL,
  `message` text NOT NULL,
  `ban_author_username` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) NOT NULL,
  `group_color` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `history`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receiver_username` varchar(64) NOT NULL,
  `applicator_username` varchar(64) NOT NULL,
  `message` text NOT NULL,
  `action_time` int(11) NOT NULL,
  `action_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `history_actions`
--

DROP TABLE IF EXISTS `history_actions`;
CREATE TABLE IF NOT EXISTS `history_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action_name` varchar(256) NOT NULL,
  `action_icon` varchar(256) NOT NULL,
  `groups_allowed` text NOT NULL COMMENT 'Grupos separados por vírgulas, igual no userlist',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `userlist`
--

DROP TABLE IF EXISTS `userlist`;
CREATE TABLE IF NOT EXISTS `userlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `groups` text NOT NULL COMMENT 'Grupos devem ser separados por vírgulas',
  `patent_id` int(11) NOT NULL DEFAULT '1' COMMENT 'Id da patente',
  `register_date` int(11) NOT NULL DEFAULT '0',
  `last_visit` int(11) NOT NULL DEFAULT '0',
  `cookie_session` varchar(64) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `userlist`
--

INSERT INTO `userlist` (`id`, `username`, `password`, `groups`, `patent_id`, `register_date`, `last_visit`, `cookie_session`, `active`) VALUES
(1, 'luuuiiiz.', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1,2', 1, 1513576623, 1513576623, NULL, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
