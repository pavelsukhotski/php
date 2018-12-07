-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 02 2018 г., 18:44
-- Версия сервера: 5.7.17-log
-- Версия PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 'admin', 'Пишите свои отзывы', '2018-12-02 14:58:46');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
