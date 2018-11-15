-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 27 2014 г., 22:45
-- Версия сервера: 5.1.68-community-log
-- Версия PHP: 5.3.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(250) NOT NULL,
  `answer` text,
  `priority` int(11) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `views` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Структура таблицы `quest_to_relation`
--

CREATE TABLE IF NOT EXISTS `quest_to_relation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_quest` int(11) unsigned NOT NULL,
  `id_rel` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_quest` (`id_quest`,`id_rel`),
  KEY `id_rel` (`id_rel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile` text,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `salt`, `email`, `profile`, `is_admin`) VALUES
(1, 'demo', '$2a$10$BscsaYHK6TvXQSYTbhQncOwol7WLy92uUi9aPs8dumkAKxcK7vqO6', '$2a$10$BscsaYHK6TvXQSYTbhQncW', 'demo@example.com', NULL, 0),
(2, 'admin', '$2a$10$MztDAUmYdr6NVzt5KpW21upR1C7v2/m34hk3NLhYYYpHdHxO30b/S', '$2a$10$MztDAUmYdr6NVzt5KpW216', 'admin@example.com', NULL, 0);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `quest_to_relation`
--
ALTER TABLE `quest_to_relation`
  ADD CONSTRAINT `quest_to_relation_ibfk_2` FOREIGN KEY (`id_rel`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quest_to_relation_ibfk_1` FOREIGN KEY (`id_quest`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
