-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 06 2018 г., 06:50
-- Версия сервера: 5.6.37
-- Версия PHP: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `opencomm`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `resource_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_avatar` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `parent` bigint(20) DEFAULT NULL,
  `relation` bigint(20) DEFAULT NULL,
  `relation_name` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  `text` text NOT NULL,
  `approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `resource_id`, `user_id`, `user_avatar`, `user_name`, `parent`, `relation`, `relation_name`, `time`, `text`, `approved`) VALUES
(96, 21, 6, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-05 23:13:19', 'рррр', 1),
(97, 23, 6, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-05 23:17:09', 'привет', 1),
(98, 23, 6, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-05 23:17:20', 'вася', 1),
(99, 21, 7, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-06 05:06:57', 'asd sad as das dasd', 0),
(100, 21, 6, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-06 05:11:11', 'fffff\r\njjhhjkjh\r\ndasdd \r\ndasasdsad', 1),
(101, 21, 6, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-06 05:17:40', 'gfhgfgh', 1),
(102, 21, 6, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-06 06:05:29', 'рпорпор', 0),
(103, 21, 6, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', 99, 99, 'Vitalii Lufter', '2018-10-06 06:12:40', 'выф\r\nвыфвыфв\r\nыфв\r\nфывфывыыффф ыввввввввввввв', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `resources`
--

CREATE TABLE `resources` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `resources`
--

INSERT INTO `resources` (`id`, `url`, `title`) VALUES
(21, 'https://www.youtube.com/watch?v=QMBprd3Vpp8', 'Зеки продают коляску для детей!'),
(23, 'https://www.youtube.com/watch?v=-GDw1SS2ly4', 'Узнаю адреса мошенников под видом акции! У Егора паника!'),
(24, 'https://www.youtube.com/watch?v=tz6RV98LAvA', 'Мошенник в ступоре! Мошенник и его проколы! Мошенники не делайте, так как Виктор!');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `identity` varchar(255) NOT NULL,
  `network` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `seed` varchar(255) NOT NULL,
  `access_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `identity`, `network`, `avatar`, `name`, `email`, `password`, `seed`, `access_key`) VALUES
(6, '5d5408335aa7793596895916c23aa5e5', 'facebook', 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', 'lufter21@gmail.com', 'e3520485022bab2c399eee7de7782451', '6aafd280b55ce1274f6b542fbb3948a7f6cb575a', '5d5408335aa7793596895916c23aa5e5ab3d3d2a51c08dbc1cee9df7a6118e13409ccc57');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resource_id` (`resource_id`);

--
-- Индексы таблицы `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT для таблицы `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
