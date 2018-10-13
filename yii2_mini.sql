-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 13 2018 г., 14:55
-- Версия сервера: 5.6.38
-- Версия PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2_mini`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `keywords`, `description`) VALUES
(1, 'JavaScript', '', 'Фреймворк Yii — это современный PHP фреймворк для разработки веб-приложений любого уровня сложности. Yii, как и любой современный фреймворк, реализует паттерн MVC, а это значит, что логика будет отделена от отображения, что сделает код более чистым и логи'),
(2, 'CSS3', '', 'Фреймворк Yii — это современный PHP фреймворк для разработки веб-приложений любого уровня сложности. Yii, как и любой современный фреймворк, реализует паттерн MVC, а это значит, что логика будет отделена от отображения, что сделает код более чистым и логи'),
(3, 'HTML5', '', 'Фреймворк Yii — это современный PHP фреймворк для разработки веб-приложений любого уровня сложности. Yii, как и любой современный фреймворк, реализует паттерн MVC, а это значит, что логика будет отделена от отображения, что сделает код более чистым и логи'),
(4, 'SVG', 'svg', 'Фреймворк Yii — это современный PHP фреймворк для разработки веб-приложений любого уровня сложности. Yii, как и любой современный фреймворк, реализует паттерн MVC, а это значит, что логика будет отделена от отображения, что сделает код более чистым и логи'),
(5, 'Test', '', 'Фреймворк Yii — это современный PHP фреймворк для разработки веб-приложений любого уровня сложности. Yii, как и любой современный фреймворк, реализует паттерн MVC, а это значит, что логика будет отделена от отображения, что сделает код более чистым и логи'),
(6, 'Фреймворк YII2', 'YII2', 'Фреймворк YII2. Быстрая разработка с современным PHP фреймворком');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `parent_id`, `post_id`, `username`, `text`, `date`) VALUES
(34, 0, 16, 'user', 'Основной комментарий', '2018-09-26 19:26:49'),
(36, 34, 16, 'user', 'Вложенный комментарий 34', '2018-09-26 19:27:49'),
(37, 34, 16, 'user', 'Вложенный комментарий 34-2', '2018-09-26 19:28:35'),
(38, 0, 16, 'user', 'Основной комментарий 2', '2018-09-26 19:45:36'),
(40, 0, 16, 'user', 'Вложенный комментарий 2', '2018-09-26 20:05:28'),
(43, 0, 15, 'user', 'Parent', '2018-09-26 20:07:54'),
(44, 43, 15, 'user', 'Child', '2018-09-26 20:08:03'),
(45, 43, 15, 'user', 'Child43', '2018-09-26 20:08:44'),
(48, 0, 15, 'admin', 'Parent', '2018-09-26 20:49:47'),
(49, 48, 15, 'admin', 'Child48', '2018-09-26 20:50:15'),
(50, 0, 16, 'user', 'Post::find()->where([\'category_id\' => 4])->count(); // 14', '2018-09-28 18:08:32');

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `excerpt` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id`, `category_id`, `title`, `excerpt`, `text`, `keywords`, `description`, `created`, `updated`, `image`, `slug`) VALUES
(14, 2, 'Блочные и строчные элементы', 'Выделяют две основные категории HTML-элементов, которые соответствуют типам их содержимого и поведению в структуре веб-страницы — блочные и строчные элементы. ', '<p>Выделяют две основные категории HTML-элементов, которые соответствуют типам их содержимого и поведению в структуре веб-страницы — <strong>блочные</strong> и <strong>строчные элементы</strong>. С помощью блочных элементов можно создавать структуру веб-страницы, строчные элементы используются для форматирования текстовых фрагментов (за исключением элементов <kbd>&lt;area&gt;</kbd> и <kbd>&lt;img&gt;</kbd>). Разделение элементов на блочные и строчные используется в спецификации HTML до версии 4.01. В HTML5 эти понятия заменены более сложным набором <a href=\"https://html5book.ru/kontentnaya-model-html5/\" class=\"site\" target=\"_blank\">категорий контента</a>, согласно которым каждый HTML-элемент должен следовать правилам, определяющим, какой контент для него допустим.</p>', 'HTML', 'CSS', '2018-09-06 01:42:26', '2018-09-07 02:04:04', 'c8c2a7981703f02cb95e3e2ea29d7a64.jpg', NULL),
(15, 2, 'Форматирование текста в CSS', 'CSS-текст представляет набор свойств для форматирования текстового содержимого веб-страниц. ', '<p><strong><strong>CSS</strong>-текст</strong> представляет набор свойств для форматирования текстового содержимого веб-страниц. Использование CSS-стилей для форматирования текста позволяет придать HTML-элементам желаемый вид, благодаря чему HTML-теги могут применяться только по своему прямому назначению — для определения структуры документа.</p><p>О свойствах для работы с текстом, добавленных в спецификацию <strong>CSS3</strong> — <kbd>text-overflow</kbd>, <kbd>word-break</kbd>, <kbd>word-wrap</kbd>, можно прочитать <a href=\"https://html5book.ru/css3-text/\" class=\"site\" target=\"_blank\">здесь</a>.</p>', 'CSS', 'CSS', '2018-09-06 01:45:35', '2018-09-07 02:03:21', 'f530d611c624155bbefa70919e249125.jpg', NULL),
(16, 6, 'Yii2 pagination', 'Использование данного класса может нам потребоваться для пользовательской части сайта в тех разделах, где присутствуют большие массивы данных', '<p>Итак, в этой статье мы рассмотрим работу с постраничной навигацией на сайте и используем для этого класс <a href=\"http://www.yiiframework.com/doc-2.0/yii-data-pagination.html\" target=\"_blank\" rel=\"nofollow\">Pagination</a>. Использование данного класса может нам потребоваться для пользовательской части сайта в тех разделах, где присутствуют большие массивы данных. Например, это может быть каталог товаров или лента новостей и т.п. Сразу стоит оговориться, что в админской части сайта, где используются виджеты данных, можно использовать провайдер данных и в этом случае будет автоматически сформирована постраничная разбивка данных. Однако, пользовательской части сайта виджеты данных используются редко и там проще воспользоваться классом Pagination.</p><p>К примеру, давайте выведем все посты нашего сайта. Для этого в контроллере мы получим их и передадим в представление:</p>', 'Yii2.0', 'Yii2.0 ', '2018-09-07 13:19:05', '2018-09-07 13:19:29', '326da2161efa3721aa8f2d3c194cf0c4.jpg', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(30, 'admin', '$2y$13$qhCIPhy5a8uKb7SBx/EnMuzk.zvudO4xZyd4wC/QSOKRS//v/.CX.', 'admin'),
(32, 'user', '$2y$13$5qTEyyUH6m.8ET2G81WB.OuDX6reJd5HP36T4wMS2iiTuuwT9NTZW', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
