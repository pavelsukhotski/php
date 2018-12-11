-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 11 2018 г., 22:36
-- Версия сервера: 5.6.41
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mvc`
--
CREATE DATABASE IF NOT EXISTS `mvc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mvc`;

-- --------------------------------------------------------

--
-- Структура таблицы `guestbook`
--

CREATE TABLE `guestbook` (
  `id` int(11) NOT NULL,
  `user` varchar(25) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `messagetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `guestbook`
--

INSERT INTO `guestbook` (`id`, `user`, `message`, `messagetime`) VALUES
(1, 'admin', 'Пишите свои отзывы', '2018-12-02 14:58:48'),
(3, '123', '321', '2018-12-07 18:15:33'),
(4, '112', '1112', '2018-12-07 18:16:41'),
(5, '', '', '2018-12-07 18:17:05'),
(12, '2342', '35rwerd', '2018-12-11 18:21:24'),
(13, 'gbvbx', 'bxcvb  vgh', '2018-12-11 18:21:33'),
(15, 'dfbxvb', 'vxcvgdr', '2018-12-11 18:52:17'),
(16, 'zascz', 'zxczxc', '2018-12-11 18:52:21'),
(17, 'cbnvbnvbnvbn11111111', 'vbnvbnvbnvb11111111111', '2018-12-11 18:53:26'),
(18, 'jklklj4', 'kjlj5', '2018-12-11 18:54:03'),
(19, 'jklj', 'kljk', '2018-12-11 18:54:09'),
(21, 'ячсячс333', 'смичсмичсми444', '2018-12-11 19:06:14'),
(22, 'кппп', 'а&lt;b&gt;пв&lt;/b&gt;ап', '2018-12-11 19:16:12');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `guestbook`
--
ALTER TABLE `guestbook`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `guestbook`
--
ALTER TABLE `guestbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
