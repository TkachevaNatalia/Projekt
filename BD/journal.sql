-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 30 2018 г., 10:51
-- Версия сервера: 10.1.30-MariaDB
-- Версия PHP: 7.2.1

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
(1, 'Институт точных наук и информационных технологий', 1),
(2, 'Институт социальных технологий', 10),
(3, 'Институт истории и права', 12),
(4, 'Институт естественных наук', 9),
(5, 'Институт экономики и финансов', 11);

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
(1, 1, 2, '2018-11-16', '2018-12-01', '2018-12-01', '', 1, 'Членам кафедры предоставить информацию о научной работе за 2017 календарный год'),
(2, 13, 0, '2018-11-16', '2018-12-03', '2018-12-03', '', 1, 'Подготовить отчет (idu 2 4 8 14) о научно-исследовательской работе '),
(3, 1, 0, '2018-10-30', '2018-12-06', '2018-12-06', 'Выполнено', 2, 'Поручил (idu 6 14) в четверг со студентами таких-то (неизвестно каких) групп явиться на кафедру'),
(4, 1, 0, '2018-11-30', '2018-12-27', '2018-12-27', '', NULL, 'НАПОМИНАНИЕ! 27 декабря в 18:40 новогодний корпоратив (idi 1)');

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
(1, 'Миронов Владимир Валерьевич', 'Директор института', 0, 'sadfa@mail.ru', '89043829174'),
(2, 'Гольчевский Юрий Валентинович', 'Заведующий кафедры', 1, 'depry@mail.ru', '89123648372'),
(3, 'Туркина Марина Стефановна', 'Гланый документовед', 1, 'turk@gmail.com', '89126479374'),
(4, 'Пупкин Василий Петрович', 'Заведующий кафедры', 2, 'opppa@gmail.com', '89076548467'),
(5, 'Гуляева Сабина Тахировна', 'Перподаватель кафедры', 1, 'zavkaf@gmail.com', '89172527598'),
(6, 'Бабенко Виктор Васильевич', 'Преподаватель кафедры', 1, 'lovenysha@gmail.com', '89996663636'),
(7, 'Селезнев Кузьма Данилович', 'старший преподаватель кафедры', 2, 'usdhf@gmail.com', '89684535884'),
(8, 'Зыков Самуил Миронович', 'Заведующий кафедры', 5, 'klsjdfh@gmail.com', '89245641256'),
(9, 'Зиновьев Тимур Давидович', 'Директор института', 0, 'zsdse@yandex.ru', '89536245984'),
(10, 'Нестеров Арнольд Всеволодович', 'Директор института', 0, 'lpuljd@mail.ru', '89562258475'),
(11, 'Кошелева Нелли Дмитрьевна', 'Директор института', 0, 'koshKA@gmail.com', '89563478925'),
(12, 'Бирюков Захар Кириллович', 'Директор Института', 0, 'beeer25@yandex.ru', '89256395236'),
(13, 'Сотникова О.A.', 'Ректор СГУ', NULL, '100KA@yandex.ru', '89056236985'),
(14, 'Ермоленко Андрей Васильевич ', 'Заведующий кафедры', NULL, 'aermolenko@gmal.com', '89056358965');

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
  MODIFY `idt` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `idu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
