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

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `question`, `answer`, `priority`, `status`, `views`) VALUES
(1, 'прапр', 'апрапра', 1, 1, 1),
(2, 'ываыва', 'ываываыв', 2, 1, 1),
(3, 'аываыва', 'ываываыв', 444, 1, 12),
(4, 'ываыва', 'ываываываы', 6, 1, 1),
(5, 'аываыва', 'ываываыв', 2, 1, 1),
(6, 'аываыва', 'ываываыв', 213, 1, 1),
(7, 'яяяяяяяяяяяя', 'яяяяяяяяяяяяяяяяяяяяяяяя', 99, 1, 4),
(10, 'ывфывфы', 'вфывфывфы', 9, 1, 1),
(11, 'ывываыва', 'ываываываыв', 64, 1, 2),
(14, '33333333333333333', '', 0, 1, 1),
(15, '4444444444444444444444444', NULL, 0, 0, 1),
(16, '5555555555555555555555', NULL, 0, 0, 1),
(17, '66666666666666666', NULL, 0, 0, 1),
(18, '7777777777777777777777', NULL, 0, 0, 1),
(19, '99999999999999999999999999999', NULL, 0, 0, 1),
(20, '1000000000000', NULL, 0, 0, 1),
(21, 'мссмисмисм', NULL, 0, 0, 0),
(22, 'В связи с увольнением Александра Дугина из МГУ за его поддержку', NULL, 0, 0, 0),
(23, 'Конечно же, мы фашисты, садисты, террористы и сепаратисты, однако...', NULL, 0, 0, 2),
(24, '2222222222222222', NULL, 0, 0, 0),
(25, '"СБУшка" никогда не славилась высокими моральными принципами, да и профессионализмом тоже. С 2004 года в СБУ остались только жадные, наглые и не сильно умные подонки. Цепкие - да. Злопамятные - да. Продажные - да. Но не профессионалы. СБУ сейчас несп', 'Позавчера в Одессе СБУ арестовало Авдееву Инну, во вКонтакте её знали, как Алисса Ченская. Вся вина девушки в том, что она несколько раз написала на своей страничке "Новороссии быть!". СБУшники так и не смогли найти ничего противозаконного у девушки дома - и в материалах обвинения фигурируют только скрины странички во Вконтакте.', 3453, 1, 0);

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

--
-- Дамп данных таблицы `quest_to_relation`
--

INSERT INTO `quest_to_relation` (`id`, `id_quest`, `id_rel`) VALUES
(17, 2, 7),
(13, 2, 18),
(27, 3, 23),
(28, 3, 24),
(1, 6, 1),
(4, 7, 1),
(10, 10, 1),
(15, 20, 19),
(26, 22, 3),
(29, 25, 3),
(30, 25, 7);

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
