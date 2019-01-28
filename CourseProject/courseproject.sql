-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 29 2019 г., 00:22
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
-- База данных: `courseproject`
--

-- --------------------------------------------------------

--
-- Структура таблицы `modellist`
--

CREATE TABLE `modellist` (
  `idmodellist` int(11) NOT NULL,
  `modelname` char(15) NOT NULL,
  `modelcapacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `modellist`
--

INSERT INTO `modellist` (`idmodellist`, `modelname`, `modelcapacity`) VALUES
(1, 'EG-10', 157),
(2, 'EG-15', 235),
(3, 'EG-20', 313),
(4, 'EG-26', 407),
(5, 'EG-40', 626),
(6, 'EG-50', 783),
(7, 'EG-60', 939),
(8, 'EG-80', 1253),
(9, 'EG-100', 1566),
(10, 'EG-125', 1957),
(11, 'EG-154', 2349),
(12, 'EG-204', 3131),
(13, 'EG-254', 3914),
(14, 'EG-304', 4697),
(15, 'EG-354', 5480),
(16, 'EG-404', 6263),
(17, 'EG-504', 7829),
(18, 'EG-604', 9394),
(19, 'EG-704', 10960),
(20, 'EG-804', 12519),
(21, 'EG-1004', 15657),
(22, 'EG-1104', 17223),
(23, 'EG-1204', 18788),
(24, 'EG-1304', 20354);

-- --------------------------------------------------------

--
-- Структура таблицы `optionblock`
--

CREATE TABLE `optionblock` (
  `idoptionblock` int(11) NOT NULL,
  `optionblockname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `optionblock`
--

INSERT INTO `optionblock` (`idoptionblock`, `optionblockname`) VALUES
(5, 'Blowdown'),
(2, 'Burner'),
(7, 'Clayton feed water pump'),
(1, 'Economizer'),
(4, 'Generator controls & instrumentation'),
(6, 'Generator valves'),
(8, 'Noise reduction'),
(9, 'Operation without permanent supervision'),
(3, 'Separator steam/water');

-- --------------------------------------------------------

--
-- Структура таблицы `optionscost`
--

CREATE TABLE `optionscost` (
  `idmodellist` int(11) NOT NULL,
  `idoptionscost` int(11) NOT NULL,
  `optionscost` int(11) NOT NULL,
  `optionsinblock_idoptionsinblock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `optionsinblock`
--

CREATE TABLE `optionsinblock` (
  `idoptionblock` int(11) NOT NULL,
  `optionsinblockname` varchar(100) NOT NULL,
  `idoptionsinblock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `optionsinblock`
--

INSERT INTO `optionsinblock` (`idoptionblock`, `optionsinblockname`, `idoptionsinblock`) VALUES
(3, '99.5% quality separator', 22),
(3, 'separator level control', 23),
(3, 'feed water preheater built-in', 24),
(4, 'add auxiliary controls in control panel', 25),
(4, 'remote start/stop', 26),
(4, 'PLC Schneider', 27),
(4, 'Schneider Ethernet communication module', 28),
(4, 'PLC Siemens', 29),
(4, 'Siemens PROFINET Communication Module', 30),
(4, 'stack exhaust temperature transducer', 31),
(5, 'time based blowdown', 32),
(6, 'generator valve kit', 33),
(6, 'generator steam outlet valve', 34),
(7, 'pump inlet valve', 35),
(7, 'oil level switch', 36),
(7, 'semi-closed system: cooling + inlet pulsation damper', 37),
(8, '85 dB(A) kit  at 1 m - free field', 38),
(8, '90 dB(A) kit  at 1 m - free field', 39),
(9, 'PED - EN12952-7 - max. 24 h', 40),
(9, 'PED - EN12952-7 - max. 72 h', 41),
(1, 'economizer', 42),
(1, 'economizer removed for shipment/installation', 43),
(2, 'low NOx execution', 44),
(2, 'modulating burner', 45);

-- --------------------------------------------------------

--
-- Структура таблицы `stgencost`
--

CREATE TABLE `stgencost` (
  `workingpress_idworkingpress` int(11) NOT NULL,
  `modellist_idmodellist` int(11) NOT NULL,
  `stgencost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stgencost`
--

INSERT INTO `stgencost` (`workingpress_idworkingpress`, `modellist_idmodellist`, `stgencost`) VALUES
(6, 6, -6),
(6, 5, -5),
(6, 4, -4),
(6, 3, -3),
(6, 2, -2),
(6, 1, -1),
(1, 1, 20010),
(1, 2, 22334),
(1, 3, 25246),
(2, 1, 27893),
(1, 4, 29052),
(3, 1, 29166),
(2, 2, 30217),
(4, 1, 30254),
(3, 2, 31491),
(4, 2, 32819),
(2, 3, 33128),
(3, 3, 34395),
(5, 1, 35568),
(2, 4, 35921),
(4, 3, 36254),
(3, 4, 37155),
(5, 2, 38663),
(1, 5, 39849),
(4, 4, 40256),
(2, 5, 41868),
(5, 3, 42099),
(1, 6, 43335),
(3, 5, 43924),
(2, 6, 45516),
(5, 4, 45946),
(4, 5, 46206),
(1, 7, 47248),
(3, 6, 47807),
(2, 7, 49654),
(4, 6, 50204),
(3, 7, 52136),
(5, 5, 52932),
(1, 8, 55151),
(4, 7, 55958),
(5, 6, 57642),
(2, 8, 57691),
(3, 8, 60231),
(1, 9, 61275),
(4, 8, 62604),
(2, 9, 64398),
(3, 9, 67686),
(1, 10, 68222),
(5, 7, 69194),
(2, 10, 71677),
(4, 9, 72549),
(3, 10, 75309),
(5, 8, 77393),
(4, 10, 80704),
(5, 9, 89646),
(1, 11, 91332),
(2, 11, 93287),
(3, 11, 95290),
(4, 11, 99360),
(5, 10, 99723),
(1, 12, 99731),
(2, 12, 101850),
(3, 12, 104011),
(4, 12, 108427),
(1, 13, 112632),
(2, 13, 115006),
(6, 7, 117000),
(3, 13, 117431),
(4, 13, 122373),
(1, 14, 122627),
(5, 11, 123834),
(2, 14, 125230),
(6, 8, 127192),
(3, 14, 127889),
(4, 14, 133314),
(5, 12, 134938),
(1, 15, 141947),
(2, 15, 144939),
(6, 9, 147098),
(3, 15, 147998),
(5, 13, 152201),
(4, 15, 154230),
(6, 10, 155274),
(1, 16, 155976),
(2, 16, 159283),
(3, 16, 162658),
(5, 14, 166361),
(4, 16, 169541),
(6, 11, 177361),
(1, 17, 183687),
(2, 17, 187563),
(6, 12, 189020),
(3, 17, 191507),
(5, 15, 192340),
(4, 17, 199565),
(6, 13, 207287),
(5, 16, 217679),
(1, 18, 219502),
(6, 14, 222544),
(2, 18, 223666),
(3, 18, 228790),
(4, 18, 238366),
(5, 17, 250907),
(6, 15, 250909),
(1, 19, 256083),
(2, 19, 260949),
(3, 19, 266927),
(1, 20, 278034),
(4, 19, 278096),
(2, 20, 283315),
(5, 18, 287398),
(3, 20, 289806),
(4, 20, 301933),
(6, 16, 306431),
(5, 19, 335279),
(6, 17, 339506),
(1, 21, 363724),
(5, 20, 364017),
(6, 18, 370920),
(2, 21, 371132),
(3, 21, 380251),
(1, 22, 392822),
(4, 21, 397287),
(2, 22, 400824),
(6, 19, 402333),
(3, 22, 410672),
(1, 23, 421920),
(5, 21, 422362),
(4, 22, 429070),
(2, 23, 430514),
(6, 20, 436819),
(3, 23, 441089),
(1, 24, 451017),
(5, 22, 456150),
(4, 23, 460852),
(5, 23, 489940),
(2, 24, 497022),
(6, 21, 506832),
(3, 24, 509230),
(4, 24, 532046),
(6, 22, 547379),
(5, 24, 565625),
(6, 23, 587926),
(6, 24, 678748);

-- --------------------------------------------------------

--
-- Структура таблицы `workingpress`
--

CREATE TABLE `workingpress` (
  `idworkingpress` int(11) NOT NULL,
  `workingpress` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `workingpress`
--

INSERT INTO `workingpress` (`idworkingpress`, `workingpress`) VALUES
(1, 7),
(2, 10),
(3, 13),
(4, 16),
(5, 25),
(6, 58);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `modellist`
--
ALTER TABLE `modellist`
  ADD PRIMARY KEY (`idmodellist`),
  ADD UNIQUE KEY `modelrangename_UNIQUE` (`modelname`),
  ADD UNIQUE KEY `modelcapacity_UNIQUE` (`modelcapacity`);

--
-- Индексы таблицы `optionblock`
--
ALTER TABLE `optionblock`
  ADD PRIMARY KEY (`idoptionblock`),
  ADD UNIQUE KEY `optionblockname_UNIQUE` (`optionblockname`);

--
-- Индексы таблицы `optionscost`
--
ALTER TABLE `optionscost`
  ADD PRIMARY KEY (`idoptionscost`),
  ADD KEY `fk_optionsinblock_has_modellist_modellist1_idx` (`idmodellist`),
  ADD KEY `fk_optionscost_optionsinblock1_idx` (`optionsinblock_idoptionsinblock`);

--
-- Индексы таблицы `optionsinblock`
--
ALTER TABLE `optionsinblock`
  ADD PRIMARY KEY (`idoptionsinblock`),
  ADD UNIQUE KEY `optionsinblockname_UNIQUE` (`optionsinblockname`),
  ADD KEY `fk_optionsinblock_optionblock1` (`idoptionblock`);

--
-- Индексы таблицы `stgencost`
--
ALTER TABLE `stgencost`
  ADD PRIMARY KEY (`workingpress_idworkingpress`,`modellist_idmodellist`),
  ADD UNIQUE KEY `stgencost_UNIQUE` (`stgencost`),
  ADD KEY `fk_workingpress_has_modellist_modellist2_idx` (`modellist_idmodellist`),
  ADD KEY `fk_workingpress_has_modellist_workingpress2_idx` (`workingpress_idworkingpress`);

--
-- Индексы таблицы `workingpress`
--
ALTER TABLE `workingpress`
  ADD PRIMARY KEY (`idworkingpress`),
  ADD UNIQUE KEY `idworkingpress_UNIQUE` (`idworkingpress`),
  ADD UNIQUE KEY `workingpress_UNIQUE` (`workingpress`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `modellist`
--
ALTER TABLE `modellist`
  MODIFY `idmodellist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `optionblock`
--
ALTER TABLE `optionblock`
  MODIFY `idoptionblock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `optionscost`
--
ALTER TABLE `optionscost`
  MODIFY `idoptionscost` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `optionsinblock`
--
ALTER TABLE `optionsinblock`
  MODIFY `idoptionsinblock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT для таблицы `workingpress`
--
ALTER TABLE `workingpress`
  MODIFY `idworkingpress` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `optionscost`
--
ALTER TABLE `optionscost`
  ADD CONSTRAINT `fk_optionscost_optionsinblock1` FOREIGN KEY (`optionsinblock_idoptionsinblock`) REFERENCES `optionsinblock` (`idoptionsinblock`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_optionsinblock_has_modellist_modellist1` FOREIGN KEY (`idmodellist`) REFERENCES `modellist` (`idmodellist`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `optionsinblock`
--
ALTER TABLE `optionsinblock`
  ADD CONSTRAINT `fk_optionsinblock_optionblock1` FOREIGN KEY (`idoptionblock`) REFERENCES `optionblock` (`idoptionblock`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `stgencost`
--
ALTER TABLE `stgencost`
  ADD CONSTRAINT `fk_workingpress_has_modellist_modellist2` FOREIGN KEY (`modellist_idmodellist`) REFERENCES `modellist` (`idmodellist`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_workingpress_has_modellist_workingpress2` FOREIGN KEY (`workingpress_idworkingpress`) REFERENCES `workingpress` (`idworkingpress`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
