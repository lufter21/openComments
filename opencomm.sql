-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 19 2018 г., 17:47
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
  `likes` int(11) NOT NULL DEFAULT '0',
  `likes_users` text,
  `approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `resource_id`, `user_id`, `user_avatar`, `user_name`, `parent`, `relation`, `relation_name`, `time`, `text`, `likes`, `likes_users`, `approved`) VALUES
(96, 21, 6, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-05 23:13:19', 'рррр', 0, NULL, 1),
(97, 23, 6, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-05 23:17:09', 'привет', 0, NULL, 1),
(98, 23, 6, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-05 23:17:20', 'вася', 0, NULL, 0),
(99, 21, 7, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-06 05:06:57', 'asd sad as das dasd', 0, NULL, 0),
(100, 21, 6, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-06 05:11:11', 'fffff\r\njjhhjkjh\r\ndasdd \r\ndasasdsad', 0, NULL, 1),
(101, 21, 6, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-06 05:17:40', 'gfhgfgh', 0, NULL, 1),
(102, 21, 6, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-06 06:05:29', 'рпорпор', 0, NULL, 0),
(103, 21, 6, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', 99, 99, 'Vitalii Lufter', '2018-10-06 06:12:40', 'выф\r\nвыфвыфв\r\nыфв\r\nфывфывыыффф ыввввввввввввв', 0, NULL, 1),
(104, 23, 6, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-16 20:15:21', 'выа авыавы аыва', 0, NULL, 0),
(105, 23, 7, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', 97, 97, 'Vitalii Lufter', '2018-10-16 21:05:08', 'привет привет', 0, NULL, 0),
(106, 23, 6, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-16 21:17:34', 'ропрпор', 0, NULL, 1),
(107, 23, 6, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-16 21:17:47', 'роропр', 0, NULL, 0),
(108, 23, 7, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', 106, 106, 'Vitalii Lufter', '2018-10-16 21:18:35', 'вфы в фыв фыв', 0, NULL, 0),
(109, 23, 7, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-16 21:19:27', 'аааа', 0, NULL, 0),
(110, 23, 7, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', 106, 106, 'Vitalii Lufter', '2018-10-16 21:19:34', 'ееее', 0, NULL, 0),
(111, 23, 7, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-16 21:20:16', 'привет\r\nавапавп\r\nавпавпавпвап', 0, NULL, 0),
(112, 23, 7, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', 106, 106, 'Vitalii Lufter', '2018-10-16 21:26:55', 'авывавыа ваыва', 0, NULL, 0),
(113, 23, 7, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', 97, 97, 'Vitalii Lufter', '2018-10-16 21:29:17', 'ывыф фывфыв', 0, NULL, 0),
(114, 23, 7, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', 106, 106, 'Vitalii Lufter', '2018-10-16 21:29:43', 'ч\\яч\\яч', 0, NULL, 0),
(115, 23, 7, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-16 21:29:47', 'ч\\яч\\яч', 0, NULL, 0),
(116, 26, 7, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-17 04:30:55', 'привет выаю.рф ывыфыфв', 0, NULL, 0),
(117, 26, 7, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-17 04:31:45', 'hgfghfhf', 0, NULL, 0),
(118, 26, 7, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-17 04:33:03', 'gfgfhg', 0, NULL, 0),
(119, 26, 7, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-17 04:40:02', 'alert(\'Vasja\');', 0, NULL, 0),
(120, 26, 7, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-17 04:42:13', '&lt;script&gt;alert(\'Vasja\');&lt;/script&gt;', 0, NULL, 0),
(121, 26, 7, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-17 04:58:48', '&lt;script&gt;alert(&#039;Vasja&#039;);&lt;/script&gt;', 0, NULL, 0),
(122, 26, 7, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-17 05:17:36', '“/?,#”&gt;&gt;&gt;&gt;&lt;&lt;script{(alert(&#039;fdz&#039;);)}', 22, '[3,5,8,\"6\"]', 1),
(125, 26, 6, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', 122, 122, 'Vitalii Lufter', '2018-10-17 06:05:55', 'sad sad sadsad &lt;span&gt;dasd&lt;/span&gt;', 0, NULL, 0),
(126, 26, 7, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', 122, 122, 'dasd sadasd', '2018-10-17 06:09:57', 'z\\x\\zx', 0, '[]', 1),
(127, 26, 6, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', 122, 122, 'console.log(\'XSS\')', '2018-10-17 06:10:43', 'ooo', 8, '[3,5,8,6]', 0),
(128, 26, 6, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', 122, 0, 'Vitalii Lufter', '2018-10-17 06:15:47', 'kkk', 0, NULL, 0),
(129, 26, 6, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', 122, 122, 'Vitalii Lufter', '2018-10-17 06:20:27', 'ddd', 0, NULL, 0),
(130, 26, 6, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', 122, 122, 'Vitalii Lufter', '2018-10-17 06:22:39', 'jjj', 0, NULL, 0),
(131, 26, 7, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-17 22:21:44', 'zxczxc', 0, '[]', 1),
(132, 26, 6, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-19 14:23:05', 'zxcccc xzc xzc', 0, NULL, 1),
(133, 26, 6, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', 122, 126, 'Vitalii Lufter', '2018-10-19 17:36:10', 'привет\r\nфак', 0, NULL, 1),
(134, 26, 6, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', 122, 122, 'Vitalii Lufter', '2018-10-19 17:36:34', 'сячсч\r\nсячсчячс\r\nячс', 0, NULL, 1),
(135, 26, 6, 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', NULL, NULL, '', '2018-10-19 17:38:01', 'сячсч чя сс яч', 0, NULL, 1);

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
(24, 'https://www.youtube.com/watch?v=tz6RV98LAvA', 'Мошенник в ступоре! Мошенник и его проколы! Мошенники не делайте, так как Виктор!'),
(26, 'https://www.youtube.com/watch?v=_swdGIKamZI', 'Video 2018 10 16 223425'),
(27, 'https://www.youtube.com/watch?v=_swdGItamZI', ''),
(28, 'https://www.youtube.com/watch?v=qrVirJe4EGE', 'Торвальд за кадром - разоблачение'),
(29, 'https://www.youtube.com/watch?v=99mUXZQVq3k', 'Осторожно, охранники супермаркетов в ПОЛИЦИИ!'),
(30, 'https://www.youtube.com/watch?v=_Tvn5sWDxGA', 'Как ездить без документов на машине!');

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
(6, '5d5408335aa7793596895916c23aa5e5', 'facebook', 'https://graph.facebook.com/1197141040337367/picture?type=square', 'Vitalii Lufter', 'lufter21@gmail.com', 'e3520485022bab2c399eee7de7782451', '6aafd280b55ce1274f6b542fbb3948a7f6cb575a', '5515c7fda43125d9a73607bf9a6599052c6d6715');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT для таблицы `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
