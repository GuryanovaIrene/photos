-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 04 2018 г., 16:12
-- Версия сервера: 5.6.38
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `photos`
--

-- --------------------------------------------------------

--
-- Структура таблицы `photos`
--

CREATE TABLE `photos` (
  `photoID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `url` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `photos`
--

INSERT INTO `photos` (`photoID`, `userID`, `url`) VALUES
(1, 1, '../images/1_xbE0mxNS.jpg'),
(2, 1, '../images/2_Ih2X5bNn.jpg'),
(3, 1, '../images/3_2rxmTSAO.jpg'),
(4, 1, '../images/4_jmcgCrzo.jpg'),
(5, 1, '../images/5_OM2nnaY7.jpg'),
(6, 1, '../images/6_TsPeWc1H.jpg'),
(7, 1, '../images/7_7OXyIM9i.jpg'),
(8, 1, '../images/8_RvpppIys.jpg'),
(9, 1, './images/9_8vGkxv31.jpg'),
(10, 1, '../images/10_NS6eHeM4.jpg'),
(11, 1, '../images/11_axUzSOSg.jpg'),
(12, 1, '../images/12_xJl3eGcz.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL COMMENT 'ИД пользователя',
  `userName` varchar(128) NOT NULL COMMENT 'Имя пользователя',
  `email` varchar(128) NOT NULL COMMENT 'e-mail пользователя',
  `pwd` varchar(64) NOT NULL,
  `age` int(11) NOT NULL COMMENT 'Возраст пользователя',
  `userDescribe` varchar(1024) NOT NULL COMMENT 'Описание'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`userID`, `userName`, `email`, `pwd`, `age`, `userDescribe`) VALUES
(1, 'Гурьянова Ирина', 'irenegur78@gmail.com', '$2y$10$GpY1oGhzB32BIuOzDRilZesYJ0ykLYiDojIfuIr1jhP6yIytZpIMi', 21, 'cvb'),
(2, 'Александр', 'irene-gur@rambler.ru', '$2y$10$az8CTBXP/yUpItB9p4/B/.DjZ1HXIzdCPU1Jx80gvxJ92jPNrgjmG', 15, 'Школьник');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photoID`),
  ADD KEY `userID` (`userID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `photos`
--
ALTER TABLE `photos`
  MODIFY `photoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ИД пользователя', AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
