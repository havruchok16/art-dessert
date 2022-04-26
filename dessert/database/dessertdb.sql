-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 26 2022 г., 09:13
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dessertdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `basket_id` int UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `creation_date` timestamp NOT NULL,
  `delivery_date` timestamp NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `dessert_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `dessert_price` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`basket_id`, `user_id`, `creation_date`, `delivery_date`, `address`, `dessert_name`, `dessert_price`, `image`) VALUES
(20, 15, '2022-03-27 17:41:28', '2022-03-27 17:41:28', NULL, 'Блины и ягоды', 12, '/bliny_yagody.png'),
(21, 15, '2022-03-27 17:47:26', '2022-03-27 17:47:26', NULL, 'Воздушный', 15, '/vosdushny.png'),
(22, 15, '2022-03-27 17:48:30', '2022-03-27 17:48:30', NULL, 'Сникерс чизкейк', 20, '/chesscake_snikers.png'),
(32, 18, '2022-03-29 22:25:34', '2022-03-29 22:25:34', NULL, 'Кокосовый чизкейк', 15, '/kokos_cheescake.png'),
(36, 26, '2022-04-09 17:28:52', '2022-04-09 17:28:52', NULL, 'Блины и ягоды', 12, '/bliny_yagody.png');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Бисквитные'),
(2, 'Творожные'),
(3, 'Песочные'),
(4, 'Блинные');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `comment_text` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `create_date` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `comment_text`, `username`, `create_date`) VALUES
(1, 25, 'test_comment', 'test123', '2022-03-24 19:08:45'),
(2, 25, 'фыаыфафыафыафыа', 'test123', '2022-03-24 19:17:34'),
(3, 25, 'asdfghjkl', 'test123', '2022-03-25 22:49:33'),
(4, 25, 'dfghjre', 'test123', '2022-03-26 08:46:01'),
(5, 18, 'cvbfdhg', 'asdasd', '2022-03-27 16:18:25'),
(6, 18, 'Обращаем ваше внимание, что оставлять отзывы могут только зарегистрированные пользователи.', 'asdasd', '2022-03-27 16:19:39'),
(7, 26, 'sfserer', 'dsfsdf', '2022-03-30 05:25:28'),
(8, 26, 'атчвч', 'dsfsdf', '2022-04-09 17:28:07');

-- --------------------------------------------------------

--
-- Структура таблицы `dessert`
--

CREATE TABLE `dessert` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `category_id` int NOT NULL,
  `price` int NOT NULL,
  `composition` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `dessert`
--

INSERT INTO `dessert` (`id`, `name`, `category_id`, `price`, `composition`, `image`) VALUES
(1, 'Апельсин-корица', 1, 12, 'бисквит, сливки, сахарная пудра, белый шоколад, апельсин', '/apelsin_korica.png'),
(2, 'Блины и ягоды', 4, 12, 'блины, сливки, сливочный сыр, любые ягоды', '/bliny_yagody.png'),
(3, 'Брауни', 1, 20, 'шоколадный бисквит, молочный шоколад, сливки, орехи', '/brauny.png'),
(4, 'Вишня-кокос', 1, 18, 'бисквит, сливки, сахарная пудра, вишня', '/vishnya_kokos.png'),
(5, 'Воздушный', 2, 15, 'творог, печенье, белый шоколад, сметана, орехи', '/vosdushny.png'),
(6, 'Кешью кейк', 2, 18, 'творог, сливки, овсянка, финики, кешью, мед, агар-агар, малина', '/keshyu_cake.png'),
(7, 'Кокосовый чизкейк', 2, 15, 'творог, сливки, печенье, кокосовая стружка, орехи', '/kokos_cheescake.png'),
(8, 'Красный бархат', 3, 20, 'печенье, какао, красный краситель, сливки, сливочный сыр', '/krasny_barhat.png'),
(9, 'Малиновый чизкейк', 2, 15, 'творог, печенье, сливки, белый шоколад, малина', '/malina_cheescake.png'),
(10, 'Меренговый', 1, 22, 'бисквит, сливки, сливочный сыр, сахарная пудра, ягоды', '/merengovy.png'),
(11, 'Морковный', 3, 20, 'печенье, сливки, сахар, сливочный сыр, морковь', '/morkovny.png'),
(12, 'Ферреро роше', 1, 24, 'бисквит, молочный шоколад, орехи, сливки, какао', '/ferrero_roshe.png'),
(13, 'Черничный чизкейк', 2, 12, 'творог, печенье, сливки, сметана, черничное пюре', '/chernychny_cheescake.png'),
(14, 'Сникерс чизкейк', 2, 20, 'творог, печенье, сливки, какао, банан, финики, арахис', '/chesscake_snikers.png'),
(15, 'Шоколадный бум', 4, 15, 'блины, сливки, молочный шоколад, какао, любые ягоды', '/shoko_boom.png');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int UNSIGNED NOT NULL,
  `basket_id` int NOT NULL,
  `order_id` int NOT NULL,
  `date` timestamp NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cost` int NOT NULL,
  `dream` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `basket_id`, `order_id`, `date`, `address`, `cost`, `dream`) VALUES
(13, 24, 24, '2022-03-29 21:37:42', 'asdfghjkl', 15, 'glllll'),
(14, 25, 25, '2022-03-29 21:37:42', 'asdfghjkl', 20, 'glllll'),
(15, 26, 26, '2022-03-29 21:37:42', 'asdfghjkl', 15, 'glllll'),
(16, 27, 573, '2022-03-29 21:41:56', 'tytytytytytytyty', 12, 'gagagagagagag'),
(17, 28, 573, '2022-03-29 21:41:56', 'tytytytytytytyty', 20, 'gagagagagagag'),
(18, 29, 573, '2022-03-29 21:41:56', 'tytytytytytytyty', 22, 'gagagagagagag'),
(19, 30, 573, '2022-03-29 21:41:56', 'tytytytytytytyty', 20, 'gagagagagagag'),
(20, 31, 5958, '2022-03-29 21:44:25', 'noview', 20, 'asdasdasdasd'),
(21, 35, 4023, '2022-04-09 17:28:34', 'Polevaya 74, 38', 20, '');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `phone`, `address`, `password`) VALUES
(8, 'yanaaa', 'yana.havrukova@mail.ru', '+375447499048', NULL, '507c63092c07956789369ff761e62563'),
(9, 'test11', 'yana.havrukova@mail.ru', '+375447499048', NULL, '99f368aaab6e7f0eaec6a72ab2c4730e'),
(10, 'test12', 'yana.havrukova@mail.ru', '+375447499048', NULL, '99f368aaab6e7f0eaec6a72ab2c4730e'),
(11, 'havruchok', 'yana.havrukova@mail.ru', '+375296883758', NULL, 'edee4853dd71b01083b7ae975f19e7c0'),
(12, 'poiuy', 'tyhjkl@mail.ru', '4567890', NULL, '5004d5e3d9959695e9e5d2c7e0c832f5'),
(13, 'zxcvb', 'yana.havrukova@mail.ru', '+375447499048', NULL, '4de0ac2dbeebb590b930b0c4faadb754'),
(14, 'qazwsx', 'osel@mail.ru', '+375445149442', NULL, '05f59dab03b4f9fc8c5ce139d98d41c5'),
(15, 'yanayana', 'yanahavrukova@mail.ru', '1234567', NULL, '926b167518cfe8d8e2787657d5abe2a7'),
(16, 'kerel', 'yana.havrukova@mail.ru', '+375447499048', NULL, '99f368aaab6e7f0eaec6a72ab2c4730e'),
(17, 'weaegasgas', 'osel@mail.ru', '+375445149442', NULL, '6c778b2c7b8d1146dd98a479ef01a90c'),
(18, 'asdasd', 'yana.havrukova@mail.ru', '+375447499048', 'asdfghjkl', '4d2712a5150cc101e447f5436d0e0500'),
(19, 'qwert', 'osel@mail.ru', '+375445149442', NULL, '39f9a7b21d6b822df67400f9ad2eea4a'),
(20, 'lelel', 'sinkevichh.kirill@gmail.com', '+375292901184', 'rfgjkl;', '62e825f0d23c4ecc8492525aa04f1677'),
(21, 'yaniiiiks', 'asdfghjhgfdsa@mail.com', '1234567', NULL, 'c9359bef9153e8190e9e19411fc8ca02'),
(22, 'xcvbsdfg', '356uikf@mail.ru', '123456789', NULL, 'e753e4d34d141a6e87f35d84b60ee3fc'),
(23, 'grysia', 'sinkevichh.kirill@gmail.com', '+375292901184', 'asdsagfagas', '62e825f0d23c4ecc8492525aa04f1677'),
(24, 'admin', 'sinkevichh.kirill@gmail.com', '+375292901184', NULL, 'eadec434e870daf2051d5750a8cd83ec'),
(25, 'test123', 'sinkevichh.kirill@gmail.com', '+375292901184', 'zsdfghjdcd', '99f368aaab6e7f0eaec6a72ab2c4730e'),
(26, 'dsfsdf', 'osel@mail.ru', '+375445149442', 'Polevaya 74, 38', '837f56d75a1a73f25c5dae1c818101cc');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`basket_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `dessert`
--
ALTER TABLE `dessert`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `basket_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `dessert`
--
ALTER TABLE `dessert`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
