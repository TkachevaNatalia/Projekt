-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 16 2018 г., 13:16
-- Версия сервера: 10.1.31-MariaDB
-- Версия PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `journal`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authorization`
--

CREATE TABLE `authorization` (
  `ida` int(10) NOT NULL,
  `login` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `user_idu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `authorization`
--

INSERT INTO `authorization` (`ida`, `login`, `password`, `user_idu`) VALUES
(1, 'saske', '12332', 1),
(2, 'naruto', '456', 2),
(3, 'uzumaki', '789', 3),
(4, 'krosh', '321', 4),
(5, 'barash', '654', 5),
(6, 'losyash', '987', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `department`
--

CREATE TABLE `department` (
  `idd` int(10) NOT NULL,
  `kafedra` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `inst_idi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `department`
--

INSERT INTO `department` (`idd`, `kafedra`, `inst_idi`) VALUES
(1, 'Кафедра информационных систем', 1),
(2, 'Кафедра радиофизики и электроники', 1),
(3, 'Кафедра социальной работы', 2),
(4, 'Кафедра физического воспитания', 2),
(5, 'Кафедра гражданского права', 3),
(6, 'Кафедра химии', 4),
(7, 'Кафедра банковского дела', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE `files` (
  `idf` int(10) NOT NULL,
  `task_idt` int(10) NOT NULL,
  `doc` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `institutes`
--

CREATE TABLE `institutes` (
  `idi` int(10) NOT NULL,
  `inst_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `direct_idu` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `institutes`
--

INSERT INTO `institutes` (`idi`, `inst_name`, `direct_idu`) VALUES
(1, 'Институт точных наук и информационных технологий', 3),
(2, 'Институт социальных технологий', 4),
(3, 'Институт истории и права', 2),
(4, 'Институт естественных наук', 1),
(5, 'Институт экономики и финансов', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE `task` (
  `idt` int(10) NOT NULL,
  `poruchitel` int(10) NOT NULL,
  `ispolnitel` int(10) NOT NULL,
  `data_poruch` date NOT NULL,
  `data_ispol` date NOT NULL,
  `srok` date NOT NULL,
  `status` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `obosnovanie_idf` int(10) DEFAULT NULL,
  `opisanie` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`idt`, `poruchitel`, `ispolnitel`, `data_poruch`, `data_ispol`, `srok`, `status`, `obosnovanie_idf`, `opisanie`) VALUES
(1, 1, 2, '2018-11-16', '2018-11-22', '2018-11-24', 'Выполнено', 0, 'Купить 300 кг бумаги'),
(2, 3, 5, '2018-11-07', '2018-11-21', '2018-11-23', 'Выполнено', NULL, 'Помыть посуду в офисе'),
(3, 4, 2, '2018-10-09', '2018-11-23', '2018-11-19', 'Выполнено', NULL, 'Поговорить лично с каждым прогулявшим пару студентом');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `idu` int(10) NOT NULL,
  `FIO` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `function` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `depart_idd` int(10) DEFAULT NULL,
  `e-mail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`idu`, `FIO`, `function`, `depart_idd`, `e-mail`, `tel`) VALUES
(1, 'Попов Иван Афанасьевич', 'Директор', 1, 'sadfa@mail.ru', '89043829174'),
(2, 'Иванов Петр Васильевич', 'Главный документовед', 2, 'depry@mail.ru', '89123648372'),
(3, 'Тиркина Мария Ивановна', 'Заместитель директора', 5, 'turk@gmail.com', '89126479374'),
(4, 'Васильева Василина Васильевна', 'Главный секретарь', 6, 'opppa@gmail.com', '89076548467'),
(5, 'Попов Роман Викторович', 'Заведующий кафедрой', 2, 'zavkaf@gmail.com', '89172527598'),
(6, 'Грушин Павел Николаевич', 'Директор', 1, 'lovenysha@gmail.com', '89996663636');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authorization`
--
ALTER TABLE `authorization`
  ADD PRIMARY KEY (`ida`);

--
-- Индексы таблицы `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`idd`);

--
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`idf`);

--
-- Индексы таблицы `institutes`
--
ALTER TABLE `institutes`
  ADD PRIMARY KEY (`idi`);

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`idt`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idu`),
  ADD KEY `depart_idd` (`depart_idd`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authorization`
--
ALTER TABLE `authorization`
  MODIFY `ida` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `department`
--
ALTER TABLE `department`
  MODIFY `idd` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `idf` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `institutes`
--
ALTER TABLE `institutes`
  MODIFY `idi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `idt` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `idu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
