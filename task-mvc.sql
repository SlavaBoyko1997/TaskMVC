-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Вер 03 2022 р., 19:00
-- Версія сервера: 8.0.24
-- Версія PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `task-mvc`
--

-- --------------------------------------------------------

--
-- Структура таблиці `posts`
--

CREATE TABLE `posts` (
  `id` int UNSIGNED NOT NULL,
  `id_user` int UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `button` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `position`) VALUES
(26, 'boss@com', '$2y$10$VKOS4beb85rkktOhVQbgguQCekVsdKifkEDFBCWGJ7PW2Bfd6k.bC', '1'),
(27, 'manager@com', '$2y$10$/vxQo9h2BG6Yg7ndG2vav.tAsp8mfomM2kRj.J9lKpNFrO/7p4R3S', '2'),
(28, 'manager2@com', '$2y$10$dRzCDbGpxU3lwyA04iNige1WntMIiaOVJxSJTL8wYEwQ9swqk503G', '2'),
(29, 'performer@com', '$2y$10$8zH3wuyT7N9/nWscYoz2y.MR8yR6DKwl3LuA9ZtBMnK3Yf4yqxo9K', '3'),
(30, 'performer2@com', '$2y$10$MivBO9MJFk.pYnyy29JnoucBDnW.v/fJ8anAYwf5tYCcIlXak3vZW', '3'),
(31, 'performer3@com', '$2y$10$Fq.Pt2.tRcUrX5emv89rm.FHsMnrn7zaGR7Izrp1PQnKkHb87JQ6S', '3'),
(32, 'performer4@com', '$2y$10$zTgFL8U5SB7rcAP0mwfIeu4YjWBOWUC89v6Av0CEUjiS2EH8WS.0y', '3');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
