-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 05 2019 г., 01:35
-- Версия сервера: 5.7.20
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
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `Id` int(11) NOT NULL,
  `Title` varchar(256) NOT NULL,
  `Image` text NOT NULL,
  `Content` text NOT NULL,
  `Date` date NOT NULL,
  `Author` varchar(256) NOT NULL,
  `Category_id` int(255) NOT NULL DEFAULT '0',
  `kolvo` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`Id`, `Title`, `Image`, `Content`, `Date`, `Author`, `Category_id`, `kolvo`) VALUES
(1, 'Актриса', 'https://cv6.litres.ru/pub/c/elektronnaya-kniga/cover/615365-arkadiy-averchenko-prestuplenie-aktrisy-maryskinoy.jpg_330.jpg', 'Из сборника «О хороших, в сущности, людях!», Петербург, 1914 год.', '1914-01-01', 'Аверченко Аркадий', 3, 5),
(2, 'Сам себе программист. Как научиться программировать и устроиться в Ebay? ', 'https://www.bookvoed.ru/files/1836/52/11/93/7.jpeg', 'Автор книги всего за год научился программировать, что само по себе немало. Однако Кори Альтхофф пошел дальше, и научившись программировать, он устроился разработчиком в одну из самых серьезных современных IT компаний - Ebay. Как ему удалось? Читайте эту книгу, изучайте программирование на языке Python по уникальной авторской методике - вам это тоже по силам!', '2018-01-01', 'Альтхофф К.', 4, 9),
(3, 'Диета чемпионов. Пять принципов питания лучших спортсменов', 'https://cv5.litres.ru/pub/c/elektronnaya-kniga/cover_415/25445952-met-ficdzherald-dieta-chempionov-pyat-principov-pitaniya-luchshih-sportsme.jpg', '5 правил, по которым питаются лучшие спортсмены на выносливость во всем мире и которым можете следовать вы для улучшения здоровья и спортивных результатов. \r\nПитание играет решающую роль не только в здоровье, но и в спортивных результатах. Ошибочно полагать, что спортсмены, выдерживающие колоссальные нагрузки и сжигающие тысячи калорий, могут позволить себе \"питаться как угодно\". \r\nНаоборот, для адекватного восстановления и роста тренированности на таком уровне нужно очень качественно питаться. \r\nИ привычки лучших атлетов совершенно точно подойдут как любителям спорта, так и всем, кто хочет быть здоровее и иметь нормальный вес. ', '2017-09-19', 'Мэт Фицджеральд', 4, 4),
(4, 'Программирование на C++ в примерах и задачах', 'https://ozon-st.cdn.ngenix.net/multimedia/1016080085.jpg', 'Книга включает в себя полный набор сведений о языке С++, необходимых для успешного анализа и составления эффективных программных кодов. Материал излагается последовательно и дополняется большим количеством примеров, практических задач и детальным разбором их решений. К каждому разделу прилагается обширный список задач для самостоятельного решения.\r\n', '2017-09-05', 'Алексей Васильев', 4, 0),
(5, 'Go на практике', 'https://ozon-st.cdn.ngenix.net/multimedia/1017202012.jpg', 'Go - превосходный системный язык. Созданный для удобной разработки современных приложений с параллельной обработкой, язык Go предоставляет встроенный набор инструментов для быстрого создания облачных, системных и веб-приложений. Знакомые с такими языками как Java или C#, быстро освоят Go - достаточно лишь немного попрактиковаться, чтобы научиться писать профессиональный код. Книга \"Go на практике\" содержит решения десятков типовых задач в ключевых областях. Следуя стилю сборника рецептов - проблема/решение/обсуждение - это практическое руководство опирается на основополагающие концепции языка Go и знакомит с конкретными приемами использования языка Go в облаке, тестировании и отладке, маршрутизации, а также для создания веб-служб, сетевых и многих других приложений. Эта книга подготовит вас к разработке сложных облачных Go-приложений.\r\n\r\nКнига адресована опытным разработчикам, уже начавшим изучать язык Go и желающим научиться эффективно использовать его в производственных условиях.', '2017-11-21', 'Matt Butcher, Мэтт Фарина Мэтт', 4, 0),
(6, 'HTML и CSS. Разработка и дизайн веб-сайтов', 'https://ozon-st.cdn.ngenix.net/multimedia/1007186818.jpg', 'Эта книга – самый простой и интересный способ изучить HTML и CSS. Независимо от стоящей перед вами задачи: спроектировать и разработать веб-сайт с нуля или получить больше контроля над уже существующим сайтом, эта книга поможет вам создать привлекательный, дружелюбный к пользователю веб-контент. Простой визуальный способ подачи информации с понятными примерами и небольшим фрагментом кода знакомит с новой темой на каждой странице. Вы найдете практические советы о том, как организовать и спроектировать страницы вашего сайта и после прочтения книги сможете разработать свой веб-сайт профессионального вида и удобный в использовании.', '2018-09-28', 'Джон Дакетт', 4, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `Id` int(11) NOT NULL,
  `Title` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`Id`, `Title`) VALUES
(1, 'Спорт'),
(2, 'Журнальные выписки'),
(3, 'Художественная литература'),
(4, 'Программирование');

-- --------------------------------------------------------

--
-- Структура таблицы `subscribers`
--

CREATE TABLE `subscribers` (
  `Id` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT '0',
  `Code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Login` varchar(191) DEFAULT NULL,
  `Password` varchar(191) DEFAULT NULL,
  `Email` varchar(191) DEFAULT NULL,
  `Graup` varchar(155) NOT NULL DEFAULT 'user',
  `my_books` varchar(9999) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`Id`, `Login`, `Password`, `Email`, `Graup`, `my_books`) VALUES
(8, 'sereja', '$2y$10$h0TKEXNRYGQzKXw1RnovjuPSLnSTIWIV0r/Dw7M/hXDtp5lNAXKXq', 'asd@mail.ru', 'user', NULL),
(9, 'see', '$2y$10$ZFN6oamKq0yVvSbe4B56FuAvc2fG0B3Rv7AGRbVTFYaZYS2FIjk3e', '123@mail.ru', 'user', NULL),
(12, 'seek', '$2y$10$KJzihNwqDOxN.sHOFLOOGOvIOsFM7OrN4CaWZxFpEf0tBEnN.qBGS', '1234@mail.ru', 'user', NULL),
(13, 'seeka', '$2y$10$eyC8NLnIZ1qzNmhA6Aku0utzoz2Yfzh1NFMNNfjf449TyFfjU5Ley', '1234a@mail.ru', 'user', NULL),
(14, 'seekaa', '$2y$10$DlCskGWJXYxu9QHeSYC4/.3JrXIsBlo7tbFVH5fejFfR0MNUeBmF.', '12aaaa4a@mail.ru', 'user', NULL),
(15, '123', '$2y$10$EJgnN68vHfz9LWoR5LwS2OChL.TlcCN8i7uQuSG.cNPcsVvY6guM6', '123@mail.ru5', 'administrator', '1,'),
(16, 'fed', '$2y$10$05YuvYM8SP9QBe1Sx/uRFeCjjoXjoCCwQIRzMw8LFtxU8fq7TfdaO', 'fed51@mail.ru', 'user', NULL),
(17, 'admin', '$2y$10$ocy4Y.JXxig7YBVrB92KmeRnEWED1pbemelrQyQV0L90u60mDh5v.', 'admin@mail.ru', 'moderator', '1,2,3,4,5,6,3,4,5,6,1,2,3,4,5,61,1,1,1,2,'),
(18, 'фывфыв', '$2y$10$4DvebwdCHTK0iMt5nH23xe7SryCYlAvswpzEIluKY3X0PG1f5tLbq', 'qwertu@asdasd.qweqwe', 'user', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
