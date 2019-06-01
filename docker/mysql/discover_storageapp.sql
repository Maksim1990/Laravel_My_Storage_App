-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2019 at 11:01 PM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `discover_storageapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No title',
  `description` text COLLATE utf8mb4_unicode_ci,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'none',
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_id` int(11) DEFAULT NULL,
  `photo_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `user_id`, `title`, `description`, `category_id`, `author`, `date`, `photo_id`, `photo_path`, `publish_year`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Гроздья гнева', 'none', 18, 'Дж.Стейнбек', '2012-07-15 00:00:00', 7, '/images/1524086958_Гроздья гнева.jpg', '', 1, '2018-04-18 18:21:33', '2018-04-18 18:29:18'),
(2, 1, 'Над пропастью во ржи', 'none', 18, 'Сэлинджер', '2012-08-12 00:00:00', 8, '/images/1524087005_Над пропастью во ржи.jpg', '', 1, '2018-04-18 18:21:33', '2018-04-18 18:30:05'),
(3, 1, 'Четыре сезона', 'none', 18, 'Стивен Кинг', '2012-09-03 00:00:00', 9, '/images/1524087032_Четыре сезона.jpg', '', 1, '2018-04-18 18:21:33', '2018-04-18 18:30:32'),
(4, 1, 'Ночная смена', 'none', 18, 'Стивен Кинг', '2012-10-25 00:00:00', 10, '/images/1524087068_Ночная смена.jpeg', '', 1, '2018-04-18 18:21:34', '2018-04-18 18:31:08'),
(5, 1, 'Унесённые ветром', 'none', 18, 'Маргарет Митчел', '2013-01-11 00:00:00', 11, '/images/1524087101_Унесённые ветром.jpg', '', 1, '2018-04-18 18:21:34', '2018-04-18 18:31:41'),
(6, 1, 'Прощай,оружие!', 'none', 18, 'Э.Хемингуэй', '2013-02-25 00:00:00', 12, '/images/1524087148_Прощай,оружие!.jpg', '', 1, '2018-04-18 18:21:34', '2018-04-18 18:32:28'),
(7, 1, 'Анжелика-маркиза ангелов', 'none', 18, 'Анн и Серж Галон', '2013-03-25 00:00:00', 13, '/images/1524087178_Анжелика-маркиза ангелов.jpg', '', 1, '2018-04-18 18:21:34', '2018-04-18 18:32:58'),
(8, 1, 'Путь в Версаль', 'none', 18, 'Aнн и Серж Галон', '2013-04-02 00:00:00', 14, '/images/1524087215_Путь в Версаль.jpg', '', 1, '2018-04-18 18:21:34', '2018-04-18 18:33:35'),
(9, 1, 'Анжелика и король', 'none', 18, 'Анн и Серж Галон', '2013-04-08 00:00:00', 15, '/images/1524251203_Анжелика и король.jpg', '', 1, '2018-04-18 18:21:34', '2018-04-20 16:07:06'),
(10, 1, 'Торквемада', 'none', 18, 'Говард Фаст', '2012-04-09 00:00:00', 16, '/images/1524251293_Торквемада.jpg', '', 1, '2018-04-18 18:21:34', '2018-04-20 16:08:13'),
(11, 1, 'Парфюмер', 'none', 18, 'Патрик Зюскинд', '2013-04-17 00:00:00', 17, '/images/1524251335_Парфюмер.jpg', '', 1, '2018-04-18 18:21:34', '2018-04-20 16:08:55'),
(12, 1, 'Последняя граница', 'none', 18, 'Говард Фаст', '2013-04-22 00:00:00', 18, '/images/1524253273_Последняя граница.jpeg', '', 1, '2018-04-18 18:21:34', '2018-04-20 16:41:13'),
(13, 1, 'Палая листва', 'none', 18, 'Габриэль Гарсия Маркез', '2013-04-25 00:00:00', 19, '/images/1524253304_Палая листва.jpg', '', 1, '2018-04-18 18:21:34', '2018-04-20 16:41:44'),
(14, 1, 'Ошибка Одинокого Бизона', 'none', 18, 'Джеймс Шульц', '2013-04-26 00:00:00', 20, '/images/1524253335_Ошибка Одинокого Бизона.JPG', '', 1, '2018-04-18 18:21:34', '2018-04-20 16:42:15'),
(15, 1, 'Джейн Эйр', 'none', 18, 'Шарлота Бронтэ', '2013-05-16 00:00:00', 21, '/images/1524253374_Джейн Эйр.jpg', '', 1, '2018-04-18 18:21:34', '2018-04-20 16:42:54'),
(16, 1, 'Старикам тут не место', 'none', 18, 'Кормак Маккарти', '2013-06-05 00:00:00', 22, '/images/1524253406_Старикам тут не место.jpeg', '', 1, '2018-04-18 18:21:34', '2018-04-20 16:43:26'),
(17, 1, 'Свой человек в Гаване', 'none', 18, 'Грин Грэм', '2013-06-11 00:00:00', 23, '/images/1524253450_Свой человек в Гаване.jpg', '', 1, '2018-04-18 18:21:34', '2018-04-20 16:44:10'),
(18, 1, 'Английский пациент', 'none', 18, 'Майкл Ондаатже ', '2013-07-08 00:00:00', 24, '/images/1524253473_Английский пациент.jpg', '', 1, '2018-04-18 18:21:34', '2018-04-20 16:44:33'),
(19, 1, 'Хижина дяди Тома', 'none', 18, 'Гарриет Бичер-Стоу', '2013-07-30 00:00:00', 25, '/images/1524253496_Хижина дяди Тома.jpg', '', 1, '2018-04-18 18:21:34', '2018-04-20 16:44:56'),
(20, 1, 'Неукротимая Анжелика', 'none', 18, 'Анн и Серж Галон', '2013-08-28 00:00:00', 26, '/images/1524253525_Неукротимая Анжелика.jpg', '', 1, '2018-04-18 18:21:34', '2018-04-20 16:45:25'),
(21, 1, 'Особые связи', 'none', 18, 'Тим Себастиан', '2013-09-28 00:00:00', 27, '/images/1524253549_Особые связи.jpg', '', 1, '2018-04-18 18:21:34', '2018-04-20 16:45:49'),
(22, 1, 'Граф Монте-Кристо', 'none', 18, 'Александр Дюма', '2013-10-29 00:00:00', 28, '/images/1524253578_Граф Монте-Кристо.jpg', '', 1, '2018-04-18 18:21:34', '2018-04-20 16:46:18'),
(23, 1, 'Гордость и  предубеждение', 'none', 18, 'Джейн Остин ', '2013-11-18 00:00:00', 29, '/images/1524253604_Гордость и  предубеждение.jpg', '', 1, '2018-04-18 18:21:34', '2018-04-20 16:46:44'),
(24, 1, 'Норвежский лес', 'none', 18, 'Харуки Мураками', '2013-12-01 00:00:00', 30, '/images/1524253623_Норвежский лес.jpg', '', 1, '2018-04-18 18:21:34', '2018-04-20 16:47:03'),
(25, 1, 'Хороший день для кенгуру (Сборник рассказов)', 'none', 18, 'Харуки Мураками', '2013-12-06 00:00:00', 31, '/images/1524253656_Хороший день для кенгуру.jpg', '', 1, '2018-04-18 18:21:34', '2018-04-20 16:47:36'),
(26, 1, 'Моя борьба', 'none', 18, 'Адольф Гитлер', '2014-01-04 00:00:00', 32, '/images/1524253681_Моя борьба.jpg', '', 1, '2018-04-18 18:21:34', '2018-04-20 16:48:01'),
(27, 1, 'Анжелика в мятеже', 'none', 18, 'Анн и Серж Голон', '2014-01-07 00:00:00', 33, '/images/1524253700_Анжелика в мятеже.jpg', '', 1, '2018-04-18 18:21:35', '2018-04-20 16:48:20'),
(28, 1, 'Слушай песню ветра', 'none', 18, 'Харуки Мураками', '2014-01-07 00:00:00', 34, '/images/1524253965_Слушай песню ветра.jpg', '', 1, '2018-04-18 18:21:35', '2018-04-20 16:52:45'),
(29, 1, 'Буря столетия', 'none', 18, 'Стивен Кинг', '2014-01-14 00:00:00', 35, '/images/1524253983_Буря столетия.jpg', '', 1, '2018-04-18 18:21:35', '2018-04-20 16:53:03'),
(30, 1, 'Чума', 'none', 18, 'Альбер Камю', '2014-01-26 00:00:00', 36, '/images/1524253999_Чума.jpg', '', 1, '2018-04-18 18:21:35', '2018-04-20 16:53:19'),
(31, 1, 'Великий Гэтсби', 'none', 18, 'Фрэнсис Скотт Фитжеральд', '2014-02-04 00:00:00', 37, '/images/1524254024_Великий Гэтсби.jpeg', '', 1, '2018-04-18 18:21:35', '2018-04-20 16:53:44'),
(32, 1, 'Случайная вакансия', 'none', 18, 'Джоан Кэтлин Роулинг', '2014-02-18 00:00:00', 38, '/images/1524254049_Случайная вакансия.jpg', '', 1, '2018-04-18 18:21:35', '2018-04-20 16:54:09'),
(33, 1, 'Мой любимый спутник', 'none', 18, 'Харуки Мураками', '2014-02-25 00:00:00', 39, '/images/1524254079_Мой любимый спутник.jpg', '', 1, '2018-04-18 18:21:35', '2018-04-20 16:55:00'),
(34, 1, 'Гомер \"Илиада\"', 'none', 18, 'Алессандро Барикко', '2014-03-02 00:00:00', 41, '/images/1524254169_Гомер Илиада.jpg', '1967', 1, '2018-04-18 18:21:35', '2018-04-20 16:56:09'),
(35, 1, 'О чём я говорю,когда говорю о беге', 'none', 18, 'Харуки Мураками', '2014-03-06 00:00:00', 42, '/images/1524254188_О чём я говорю,когда говорю о беге.jpg', '', 1, '2018-04-18 18:21:35', '2018-04-20 16:56:28'),
(36, 1, 'По ком звонит колокол', 'none', 18, 'Эрнест Хемингуэй', '2014-03-20 00:00:00', 43, '/images/1524254223_По ком звонит колокол.jpg', '', 1, '2018-04-18 18:21:35', '2018-04-20 16:57:03'),
(37, 1, 'Последний день приговорённого к смарти', 'none', 18, 'Виктор Гюго', '2014-03-22 00:00:00', 44, '/images/1524254240_Последний день приговорённого к смарти.jpg', '', 1, '2018-04-18 18:21:35', '2018-04-20 16:57:20'),
(38, 1, 'Бегущий за ветром', 'none', 18, 'Халед Хоссейни', '2014-04-09 00:00:00', 45, '/images/1524254260_Бегущий за ветром.jpg', '', 1, '2018-04-18 18:21:35', '2018-04-20 16:57:40'),
(39, 1, 'Трилогия Крысы', 'none', 18, 'Харуки Мураками', '2015-07-25 00:00:00', 46, '/images/1524254285_Трилогия Крысы.jpg', '', 1, '2018-04-18 18:21:35', '2018-04-20 16:58:05'),
(40, 1, 'Мемуары гейши', 'none', 18, 'Артур Голден', '2015-10-07 00:00:00', 47, '/images/1524254306_Мемуары гейши.jpg', '', 1, '2018-04-18 18:21:35', '2018-04-20 16:58:26'),
(41, 1, 'Американская трагедия', 'none', 18, 'Теодор Драйзер', '2015-07-01 00:00:00', 48, '/images/1524254328_Американская трагедия.jpg', '', 1, '2018-04-18 18:21:35', '2018-04-20 16:58:48'),
(42, 1, 'Цифровая крепость', 'none', 18, 'Дэн Браун', '2015-10-15 00:00:00', 49, '/images/1524254351_Цифровая крепость.jpg', '', 1, '2018-04-18 18:21:35', '2018-04-20 16:59:11'),
(43, 1, 'Алхимик', 'none', 18, 'Паоло Коэльо', '2015-10-17 00:00:00', 50, '/images/1524254373_Алхимик.png', '', 1, '2018-04-18 18:21:35', '2018-04-20 16:59:33'),
(44, 1, 'Утраченый символ', 'none', 18, 'Дэн Браун', '2015-12-28 00:00:00', 51, '/images/1524254394_Утраченый символ.jpg', '', 1, '2018-04-18 18:21:35', '2018-04-20 16:59:54'),
(45, 1, 'P.S. Я тебя люблю', 'none', 18, 'Сесилия Ахерн', '2016-03-05 00:00:00', 52, '/images/1524254419_P.S. Я тебя люблю.jpg', '', 1, '2018-04-18 18:21:35', '2018-04-20 17:00:19'),
(46, 1, 'Бесцветный Цкуру и годы его странствий', 'none', 18, 'Харуки Мураками', '2016-03-24 00:00:00', 53, '/images/1524254437_Бесцветный Цкуру и годы его странствий.jpg', '', 1, '2018-04-18 18:21:35', '2018-04-20 17:00:37'),
(47, 1, 'Послемрак', 'none', 18, 'Харуки Мураками ', '2016-05-09 00:00:00', 54, '/images/1524254457_Послемрак.jpg', '', 1, '2018-04-18 18:21:35', '2018-04-20 17:00:57'),
(48, 1, 'Сёгун', 'none', 18, 'Клавелл Джеймс', '2016-11-25 00:00:00', 55, '/images/1524254486_Сёгун.jpg', '', 1, '2018-04-18 18:21:35', '2018-04-20 17:01:26'),
(49, 1, 'Cyrano de Bergerac', 'none', 18, 'Edmond Rostand', '2017-03-30 00:00:00', 56, '/images/1524254509_Cyrano de Bergerac.jpg', '', 1, '2018-04-18 18:21:36', '2018-04-20 17:01:49'),
(50, 1, 'La momie du Louvre', 'none', 18, 'Régine Boutégère', '2017-04-05 00:00:00', 57, '/images/1524254525_La momie du Louvre.jpg', '', 1, '2018-04-18 18:21:36', '2018-04-20 17:02:05'),
(51, 1, 'Сначала скажите нет', 'none', 18, 'Джим Кэмп', '2017-05-17 00:00:00', 60, '/images/1524254609_Сначала скажите нет.jpg', '', 1, '2018-04-18 18:21:36', '2018-04-20 17:03:29'),
(52, 1, 'The girl with seven names', 'none', 18, 'Hyeonseo Lee', '2017-12-22 00:00:00', 59, '/images/1524254571_The girl with seven names.jpg', '', 1, '2018-04-18 18:21:36', '2018-04-20 17:02:51'),
(53, 1, 'Искусство любить', 'none', 18, 'Эрих Фромм', '2018-02-08 00:00:00', 58, '/images/1524254552_Искусство любить.jpg', '', 1, '2018-04-18 18:21:36', '2018-04-20 17:02:32'),
(54, 2, '9Xci4W8Jrq', NULL, 0, 'notKzMYbBW', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(55, 2, 'jOcSzNZBc2', NULL, 0, 'tO1iuMGiEJ', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(56, 2, 'FlGD6CpEjQ', NULL, 0, 'EAeAg9gblF', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(57, 2, 'X7EJQSeoQ0', NULL, 0, '78R6Fi9AUp', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(58, 2, 'ZEINdSWFgF', NULL, 0, 'QIvNyS361j', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(59, 2, 'v1NrRF47wN', NULL, 0, 'P1iqxQit06', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(60, 2, 'BWCbVHacmX', NULL, 0, 'RgWgtiHrTJ', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(61, 2, '8z5hblkvLN', NULL, 0, '7VuNzykdwr', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(62, 2, '7FZE10hFm8', NULL, 0, 'R9k0OSXjce', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(63, 2, 'E7gFxNbN9M', NULL, 0, 'Wolz8OxWi2', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(64, 2, 'B3XSkLiG7m', NULL, 0, 'hPonsZ8sdx', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(65, 2, 'jWPfqNnr97', NULL, 0, 'uieIhvyCtm', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(66, 2, 'JDwHAiqQMu', NULL, 0, 'Vy02hgBN72', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(67, 2, 'Swdk303jrF', NULL, 0, '4jsD4C1JCT', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(68, 2, 'ymTP03IpCp', NULL, 0, 'cVMCnRTzUX', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(69, 2, 'XVZViYisdR', NULL, 0, 'QdL7FLRrdy', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(70, 2, 'sueDyExhjO', NULL, 0, 'xkmMplx3v4', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(71, 2, 'RvnfVSTNns', NULL, 0, 'sABYubKGuO', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(72, 2, 'aPw6BLwnsh', NULL, 0, 'RvR7bQ0McH', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(73, 2, 'c2lgEq0Cey', NULL, 0, 'guTv9b0b4D', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(74, 2, 'E83GZtSrGh', NULL, 0, 'DoiNSkJ8nZ', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(75, 2, 'WRu7yrB1FV', NULL, 0, 'X2pguurTmB', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(76, 2, 'v3YG815bF5', NULL, 0, 'Q4XSrHQxKE', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(77, 2, 'PU2kmP3C6b', NULL, 0, 'yk1FsesXiV', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(78, 2, 'L3gS1XCXJF', NULL, 0, 'kUwLDjh3l0', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(79, 2, 'U32dJ1IdZh', NULL, 0, '8lHk8Dez6Y', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(80, 2, 'oEXo9Ws1xv', NULL, 0, 'cznlK3u6Vx', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(81, 2, 'KqYjtjBFa7', NULL, 0, 'iqXf07nfZO', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(82, 2, 'UdB4RQ8DJT', NULL, 0, 'MCeUzywNKj', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(83, 2, 'ZqGWN83NYD', NULL, 0, 'fGS0bgyxwW', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(84, 2, 'xif3ZnlmO4', NULL, 0, 'eifelm3p1N', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(85, 2, 'AHmlacWTKH', NULL, 0, '4GqiQNDsyp', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(86, 2, 'fTD9caltZN', NULL, 0, 'cAbI3Wdgbh', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(87, 2, 'vIsbQAKtt9', NULL, 0, 'JeF9JMzrFI', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(88, 2, 'DlyLB9stWP', NULL, 0, 'IyenVSW5gw', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(89, 2, 'ysuXA8CWcf', NULL, 0, '7InpC9Iamm', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(90, 2, 'E3ik0riECP', NULL, 0, 'CPWeKaAPqe', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(91, 2, 'ukv1EeBQNH', NULL, 0, 'ecYv4cs7rV', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(92, 2, 'i4SayXXInl', NULL, 0, 'kC2d8B3mr9', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(93, 2, 'bL05oYHQWH', NULL, 0, 'JafkpWkUoc', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(94, 2, 'Nz9KvGDTYk', NULL, 0, 'NmkG4KyTwe', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(95, 2, '31G2cKQ71N', NULL, 0, 'gkHz24dw7f', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(96, 2, 'sLCVkUmCy1', NULL, 0, 'gnQSWLewnp', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(97, 2, 'cVaUVZLE6z', NULL, 0, '9eztaapHNd', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(98, 2, '0vqAUL8t1A', NULL, 0, 'Hz30MNRTO4', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(99, 2, 'YwkFX94M9K', NULL, 0, '1qrD1XQKJM', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(100, 2, '11iG3Y0Hj1', NULL, 0, 'FCHgULZErr', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(101, 2, '5riTF8PsUE', NULL, 0, 'n5I8ii2aM2', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(102, 2, '4yxCNtZ0jY', NULL, 0, 'Fu80XgCEyA', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(103, 2, '128Z0NQ7JP', NULL, 0, 'vwTzwPSDXc', '2018-04-18 21:22:30', NULL, NULL, NULL, 1, '2018-04-18 21:22:30', NULL),
(104, 8, 'UkmKMJeiuX', NULL, 0, 'BOR8DFUAh5', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(105, 8, 'AQNHdjijwT', NULL, 0, '9NcUHzZitT', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(106, 8, 'bY14FAnRti', NULL, 0, 'q7ZmAqGAJb', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(107, 8, 'XFe532uHD3', NULL, 0, '9I4CYO8GOx', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(108, 8, 'LJ36Vdgqy4', NULL, 0, 'sKzacvs1XQ', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(109, 8, 'rXm6KZRV22', NULL, 0, 'eofUtzWA41', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(110, 8, 'sTJsKNraVb', NULL, 0, 'DM4ojVMmgH', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(111, 8, 'wXNSaJPy2o', NULL, 0, 'gUzDLMqdvn', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(112, 8, 'fbs2nFiYsY', NULL, 0, 'kz4lVeeCFH', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(113, 8, 'gFCrSJWnbI', NULL, 0, '6lsr2JBGEK', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(114, 8, 'fUzx3PgLAI', NULL, 0, 'y8IRMipNsZ', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(115, 8, 'rbWtUCXw9M', NULL, 0, 'z91HCT0plx', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(116, 8, 'pOMkcabCn4', NULL, 0, '91KEgKfVKz', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(117, 8, 'DEKNlMPTEW', NULL, 0, 'QnGLlkBjDD', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(118, 8, 'oZP33wspUv', NULL, 0, 'BTUmq3kcPK', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(119, 8, 'TobfiYOo0A', NULL, 0, 'Hkx2BObHnu', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(120, 8, 'kEcjbIOdLy', NULL, 0, '1VrCqbpN6s', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(121, 8, 'UWqkf35X0n', NULL, 0, 'n0JKCQlTc7', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(122, 8, 'OYZ0pHjVNc', NULL, 0, 'uuwyrOaG11', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(123, 8, 'aULseDif6z', NULL, 0, 'he4GuWh9Xw', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(124, 8, 'XObwM41MN3', NULL, 0, 'whLqKjmUy3', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(125, 8, '4rUkLM3FeJ', NULL, 0, 'LJgsyoNrDn', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(126, 8, 'EcHeMoNaQ7', NULL, 0, 'FrQPrecv7o', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(127, 8, 'tw6i2Ndulk', NULL, 0, 'GX5uBVuy53', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(128, 8, '1lNJjLTGFP', NULL, 0, 'PiVqXvlVtd', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(129, 8, '5Ul2RV0ytl', NULL, 0, '1eHXzTfmxj', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(130, 8, 'i6uYq26jyP', NULL, 0, 'McQ7lqIHsO', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(131, 8, '1PERmu8ORI', NULL, 0, 'V9ySl8bcHN', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(132, 8, '1lZQlp3D7Y', NULL, 0, 'J64WzFRbPA', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(133, 8, 'yoNJUVhXpM', NULL, 0, 'ZpFZsnB7HR', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(134, 8, 'rfX8wJykx6', NULL, 0, '5kEnkhfA8i', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(135, 8, 'GfZVwKAXRw', NULL, 0, 'acmOR8Ubb1', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(136, 8, 'PH3z1UddI4', NULL, 0, 'O1BlJ5SAjW', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(137, 8, 'GP1nSiWTHQ', NULL, 0, 'U1fAbKiwld', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(138, 8, 'UExA9llQbg', NULL, 0, 'xqumtNTxi0', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(139, 8, 'ZrDLt2YlMp', NULL, 0, '5G8tTGBluf', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(140, 8, 'FWLg25spJi', NULL, 0, 'U3dQCwz8Ps', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(141, 8, 'B8GJPibExn', NULL, 0, 'gXCvl0GOco', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(142, 8, 'PuxgIo2C2I', NULL, 0, 'yvLHuad0PU', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(143, 8, 'yvkgFvpzYH', NULL, 0, 'xI8IBcvAiX', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(144, 8, 'hpTCsWnRrp', NULL, 0, 'BbP2AfIzvC', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(145, 8, '7UGVBYY0gO', NULL, 0, 'vid1sKoAc7', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(146, 8, 'zokAEzgPOt', NULL, 0, 'aRLBzQZl85', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(147, 8, 'SCeTVcH3uE', NULL, 0, '0HgDg2IwNT', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(148, 8, 'tun9a1Xzl2', NULL, 0, 'WGj9hDGdZj', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(149, 8, 'GI06gxn5cF', NULL, 0, 'rRiEdKA0Hm', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(150, 8, 'u4ENdnQOaa', NULL, 0, 'vwmukhX3dp', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(151, 8, '7AS4p7WCHQ', NULL, 0, 'gxCSO4e4jc', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(152, 8, '0zE6lJ3hp0', NULL, 0, '8cPhBtCkMs', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(153, 8, 'dEAm98O0BA', NULL, 0, 'HYABXdVpaK', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(154, 8, 'XdGmucCqHB', NULL, 0, 'o0CLtbFIhi', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(155, 8, 'BeSRUawAZ0', NULL, 0, 'x1SHbGPFcy', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(156, 8, 'nIsuu0djVN', NULL, 0, 'CNEvQH14RI', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(157, 8, 'WBJsJDpZwj', NULL, 0, '9EwnYnpk1m', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(158, 8, 'GYBRoFsrHu', NULL, 0, 'SYyuq5igA4', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(159, 8, 'ui51Qj4OkO', NULL, 0, 'pLLMhCpSOn', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(160, 8, '1ionxiqZ0n', NULL, 0, 'uF0dw5os9R', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(161, 8, 'IuChV2AWpb', NULL, 0, 'H0Y0yymRP6', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(162, 8, 'QbNZ4a6ujg', NULL, 0, 'WNxnm1jUNc', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(163, 8, 'K4AZyHasRN', NULL, 0, 'jNMR9azna1', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(164, 8, 'PjSOq1SYDL', NULL, 0, 'Uwpl9OvJ0q', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(165, 8, 'n3mHbwYTPO', NULL, 0, '6UFgAQ23HG', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(166, 8, 'OV7n7AicVu', NULL, 0, '2Y0ZPysgYA', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(167, 8, '74RfWj2vFa', NULL, 0, '8zEh9D2JY9', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(168, 8, 'fG48FVwsKt', NULL, 0, 'BhzdTSddLV', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(169, 8, 'a7y5RUI5Fk', NULL, 0, '7JXsBqgVcS', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(170, 8, 'd1JTEZKGdb', NULL, 0, 'BP5Tof6QfZ', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(171, 8, 'OPZJVdaNym', NULL, 0, 'ivhe4mJrUy', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(172, 8, 'OGPfOZJ8dd', NULL, 0, 'rXnnmEzufP', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(173, 8, 'w7mKmKt6kU', NULL, 0, '579LQAUw1F', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(174, 8, 'LG1A4DlpGk', NULL, 0, '5IsjjsMxzb', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(175, 8, 'y6d7w8opVH', NULL, 0, 'sPttQhVHJr', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(176, 8, 'TnYjz5BaSz', NULL, 0, 'XobTC90xzk', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(177, 8, 'MzRbJl4XqJ', NULL, 0, '1ZEQMot8vK', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(178, 8, 'VfPTai57g3', NULL, 0, 'tgDcRLqkuG', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(179, 8, 'yrmny6BgeE', NULL, 0, 'PqvRhFNkT4', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(180, 8, 'hEgk5RWj3q', NULL, 0, 'GShE5TQLlE', '2018-04-18 21:24:24', NULL, NULL, NULL, 1, '2018-04-18 21:24:24', NULL),
(181, 9, 'axO3GEydOk', NULL, 0, 'Ym6H55wXWm', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(182, 9, 'XOJGnucn1t', NULL, 0, 'YAqokgeQj0', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(183, 9, 'xnBxMHYZPG', NULL, 0, 'sAOGQCZbu6', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(184, 9, 'WZ2yYhLyVO', NULL, 0, 'HwdKxG1u0L', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(185, 9, 'WnCLxwugY0', NULL, 0, 'ksxer7w9VC', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(186, 9, 'B65p1vtM7R', NULL, 0, 'z3y4CQKtUV', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(187, 9, 'vCj6Q5IOui', NULL, 0, 'iPKdzMUEKi', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(188, 9, 'TMZdj4ednc', NULL, 0, 'PcbmLLOTPQ', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(189, 9, 'Zh7lOAegNu', NULL, 0, 'pPbQ57jOyz', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(190, 9, 'LSPB2q0DUf', NULL, 0, 'e9qmnhApwH', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(191, 9, 'HDdYGMQXpb', NULL, 0, 'LLEtEWUsdg', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(192, 9, 'uAExNmhzD4', NULL, 0, 'SjcC9I24p4', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(193, 9, 'MMogg20Ppw', NULL, 0, 'kfRHzBQFdz', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(194, 9, '8orsn2lweO', NULL, 0, 'T7ZmlrroXq', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(195, 9, 'RIUfR2Paqy', NULL, 0, 'IECHCRrqHB', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(196, 9, 'FR9OHTCZLi', NULL, 0, 'kKuEfT6YTK', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(197, 9, 'bWAb0cL7e6', NULL, 0, 'YmtAfAIM9r', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(198, 9, 'AFTPzdbSBP', NULL, 0, 'uaPUPDPrdX', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(199, 9, '6bSeHOEUx2', NULL, 0, '0kdjilInx8', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(200, 9, 'GqkkBa6eGW', NULL, 0, 'D5eh3jGd5C', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(201, 9, 'P1x7qUwPoV', NULL, 0, 'VIPYyhJ33i', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(202, 9, 'MjQSbsIT7R', NULL, 0, 'tf7j4JO1HQ', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(203, 9, 'W66UgGHu0k', NULL, 0, 'QTlpbrdNeX', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(204, 9, '3xPj3zgYos', NULL, 0, 'MUHDJ8tDO0', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(205, 9, 'r7pBTLL2tD', NULL, 0, 'faAdPVgN9L', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(206, 9, 'WdZyLtXMRe', NULL, 0, '8Gnh7UnAPA', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(207, 9, 'NysdqRNN7X', NULL, 0, 'XVI12LvxdA', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(208, 9, 'QJyl07bNOC', NULL, 0, 'HaFk0dsXbN', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(209, 9, 'IPH0gFRKd1', NULL, 0, 'j66uawYlKL', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(210, 9, 'jXuAPnGGoz', NULL, 0, 'Smmhn162Z6', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(211, 9, 'aqZQ9eEScB', NULL, 0, 'YIuGKbjGxw', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(212, 9, 'M3xAQAOmYp', NULL, 0, 'qWUmS3q0E5', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(213, 9, 'JpIj7tXXZp', NULL, 0, 'pwfbXwUOTR', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(214, 9, 'KDiLs0N5Dz', NULL, 0, 'u5LZ9qptxh', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(215, 9, 'qBJof2Tuye', NULL, 0, '85CFk5jTWh', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(216, 9, 'kwGqhNdcNU', NULL, 0, 'Wxt4PP2YZT', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(217, 9, 'zFqMI5oQO6', NULL, 0, 'wCRXneTVyP', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(218, 9, 'muzWnCbCeX', NULL, 0, 'qS37wNjDM1', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(219, 9, 'a7hAS2iZH7', NULL, 0, 'DrZnic3634', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(220, 9, 'vWKfVoS6x9', NULL, 0, 'cBF1w0vmaj', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(221, 9, 'Xaln8epkDK', NULL, 0, 'wdp1Hz0OhK', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(222, 9, 'cs1bTh7R2Z', NULL, 0, 'rilZG25M9Z', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(223, 9, 'U28naC5voY', NULL, 0, 'slP3sFaHBl', '2018-04-18 21:25:05', NULL, NULL, NULL, 1, '2018-04-18 21:25:05', NULL),
(224, 12, 'erCymyIsBk', NULL, 0, 'EPeEd2K0VS', '2018-04-18 21:25:23', NULL, NULL, NULL, 1, '2018-04-18 21:25:23', NULL),
(225, 12, 'GZix7litr9', NULL, 0, 'OPDURNmgiv', '2018-04-18 21:25:23', NULL, NULL, NULL, 1, '2018-04-18 21:25:23', NULL),
(226, 12, 'fzYTebAhra', NULL, 0, '4sU9yO7QUH', '2018-04-18 21:25:23', NULL, NULL, NULL, 1, '2018-04-18 21:25:23', NULL),
(227, 12, 'FW9rjjFiJ4', NULL, 0, 'bU7HhyNPa8', '2018-04-18 21:25:23', NULL, NULL, NULL, 1, '2018-04-18 21:25:23', NULL),
(228, 12, 'vXCfravWsa', NULL, 0, 'L49j85I3Ju', '2018-04-18 21:25:23', NULL, NULL, NULL, 1, '2018-04-18 21:25:23', NULL),
(229, 12, 'bBt4843g1h', NULL, 0, 'PvBmj8bQWq', '2018-04-18 21:25:23', NULL, NULL, NULL, 1, '2018-04-18 21:25:23', NULL),
(230, 12, 'czEvUDcrYL', NULL, 0, 'A3d1vt4sE4', '2018-04-18 21:25:23', NULL, NULL, NULL, 1, '2018-04-18 21:25:23', NULL),
(231, 12, 'gKQA6S9dur', NULL, 0, 'GPIPDPKAsM', '2018-04-18 21:25:23', NULL, NULL, NULL, 1, '2018-04-18 21:25:23', NULL),
(232, 12, 'XPoJIQeQBw', NULL, 0, 'iCdRFVhGlO', '2018-04-18 21:25:23', NULL, NULL, NULL, 1, '2018-04-18 21:25:23', NULL),
(233, 12, 'P3U1VrW7yA', NULL, 0, 'grwJeNGjJ0', '2018-04-18 21:25:23', NULL, NULL, NULL, 1, '2018-04-18 21:25:23', NULL),
(234, 12, 'EFpowdns6d', NULL, 0, 'AFH5ScyxrF', '2018-04-18 21:25:23', NULL, NULL, NULL, 1, '2018-04-18 21:25:23', NULL),
(235, 12, '5584FMLnYq', NULL, 0, '3Fdw9mlJoy', '2018-04-18 21:25:23', NULL, NULL, NULL, 1, '2018-04-18 21:25:23', NULL),
(236, 12, 'yEHrj2hJ6q', NULL, 0, 'L9nLjQp0Fu', '2018-04-18 21:25:23', NULL, NULL, NULL, 1, '2018-04-18 21:25:23', NULL),
(237, 12, 'lCmXCFn1qY', NULL, 0, 'WAt7BW52WR', '2018-04-18 21:25:23', NULL, NULL, NULL, 1, '2018-04-18 21:25:23', NULL),
(238, 12, 'PjjpwzoK33', NULL, 0, '8d50HeaeI4', '2018-04-18 21:25:23', NULL, NULL, NULL, 1, '2018-04-18 21:25:23', NULL),
(239, 12, 'Vw0IbVt8wh', NULL, 0, 'HQDFgL7iTr', '2018-04-18 21:25:23', NULL, NULL, NULL, 1, '2018-04-18 21:25:23', NULL),
(240, 12, 'J7jQMnjKtu', NULL, 0, 'ML88iwF5v1', '2018-04-18 21:25:23', NULL, NULL, NULL, 1, '2018-04-18 21:25:23', NULL),
(241, 12, 'DIDMMi5DcX', NULL, 0, 'gE3HAecar4', '2018-04-18 21:25:23', NULL, NULL, NULL, 1, '2018-04-18 21:25:23', NULL),
(242, 12, 'CLX8jK8idc', NULL, 0, 'w2ibcTAc2g', '2018-04-18 21:25:23', NULL, NULL, NULL, 1, '2018-04-18 21:25:23', NULL),
(243, 12, 'a88gEsFrDr', NULL, 0, 'OipylIf5s3', '2018-04-18 21:25:23', NULL, NULL, NULL, 1, '2018-04-18 21:25:23', NULL),
(244, 12, 'zyqCtsCWPP', NULL, 0, '09vn0csQEi', '2018-04-18 21:25:23', NULL, NULL, NULL, 1, '2018-04-18 21:25:23', NULL),
(245, 12, '7X6e5TtNxv', NULL, 0, 'fTL85DgWzO', '2018-04-18 21:25:23', NULL, NULL, NULL, 1, '2018-04-18 21:25:23', NULL),
(246, 14, 'hnhaAzPM67', NULL, 0, '98JCXT1H8C', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(247, 14, 'Lf9mqHkVBN', NULL, 0, 'yZCxJ3hD75', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(248, 14, 'yzq6VWZYfc', NULL, 0, 'JInehLeJNO', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(249, 14, '75YlN883YH', NULL, 0, 'TgHMZ3HwcT', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(250, 14, 'M45njHSeK0', NULL, 0, '0rfHDADVDi', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(251, 14, 'nR6dxYMIbF', NULL, 0, 'f1XXeYuWQe', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(252, 14, 'E1dA1jpFch', NULL, 0, '7RGkd1fNqj', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(253, 14, '19lLAJux5a', NULL, 0, 'YRD5qgrNBt', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(254, 14, 'FlQUt8ZkfJ', NULL, 0, 'ZrntP2QEv8', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(255, 14, 'K8kbHz4T8E', NULL, 0, 'RFRXtrzfm2', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(256, 14, 'Ow6PbNXKAE', NULL, 0, 'nGqszmelta', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(257, 14, '7l0HGJREQJ', NULL, 0, 'mKD3HZnnEs', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(258, 14, '5etuccTFyz', NULL, 0, 'VYsicWi7Pu', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(259, 14, 'wiCjPtMZX3', NULL, 0, '0ajHzYcfvf', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(260, 14, 'eg0pceuyHG', NULL, 0, 'fFoEjrIK2v', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(261, 14, 'PipkZ6SxYR', NULL, 0, 'hVNSrTqOPJ', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(262, 14, 'ZatyAhZ6nV', NULL, 0, 'sGCRlkZRZO', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(263, 14, 'rG73Rmx94h', NULL, 0, 'pMX1qugWbU', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(264, 14, 'QqVO0yeJVp', NULL, 0, '6FWsy3irJn', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(265, 14, '453i6SC4fE', NULL, 0, 'R63GbPilRO', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(266, 14, 'VVSjhoutoF', NULL, 0, 'dwUOMZWTg3', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(267, 14, 'MdQHcedWir', NULL, 0, 'jf96kI4u0D', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(268, 14, '7a0D6H2LF2', NULL, 0, 'mPcSB5XZJD', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(269, 14, 'QUL9bBNAQZ', NULL, 0, 'mTAjkTmiVA', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(270, 14, 'TdTQzzavJV', NULL, 0, 'i4xorAf0Yo', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(271, 14, 'DgyPlpLfq4', NULL, 0, 'sIrL5IvccS', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(272, 14, '86g2yDRBYL', NULL, 0, 'TtdVA8qtRA', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(273, 14, 'wNwEpqyotS', NULL, 0, 'm0DdNaIawY', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(274, 14, 'g6xwcPJGfZ', NULL, 0, 'nhPEmlyPpK', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(275, 14, 'TlcXjfQR3z', NULL, 0, 'N5HpBcXak9', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(276, 14, 'wYSvzyWoJS', NULL, 0, 'TgDZslE9r1', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(277, 14, 'UCCtUtGt5B', NULL, 0, 'AhrRd9yzDA', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(278, 14, 'wKzzDv6q0G', NULL, 0, 'meT48YGs1u', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(279, 14, 'gxaOGfjsKO', NULL, 0, 'FnjT4pmJuK', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(280, 14, 'G8WL7nhXvW', NULL, 0, 'veBJNTHD2o', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(281, 14, 'wjnWSoSZpE', NULL, 0, 'tjFQiTauTu', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(282, 14, 'EOy6KEkzrz', NULL, 0, 'AfJiIsfb3J', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(283, 14, 'j9AQITrFhY', NULL, 0, '0xhM2BfEE5', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(284, 14, '1o8YXpYAgG', NULL, 0, 'TQ41uDyFpd', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(285, 14, 'yIDcX6RWHB', NULL, 0, 'QSOTzuDTXh', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(286, 14, 'TovIkXOY93', NULL, 0, 'qiiuy98DEt', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(287, 14, 'ntFrV0efr8', NULL, 0, 'TFncLxew53', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(288, 14, 'uilSPHqcFG', NULL, 0, 'YAd4Vlt7lB', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(289, 14, 'IApMB9AYeU', NULL, 0, 'JkoWpeEjGD', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(290, 14, 'KRLZQTAWdc', NULL, 0, 'rGvNCGo9H9', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(291, 14, '9tGQvu0DnX', NULL, 0, 'Mhq58Tz2b3', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(292, 14, 'Pi7auO8s41', NULL, 0, 'OeVIlRFL2W', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(293, 14, 'CrpAgcgQRS', NULL, 0, 'fU79blHvW7', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(294, 14, 'GuGgvUfIrP', NULL, 0, 'cXGrO6YNJP', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(295, 14, 'fnhDsoEuHE', NULL, 0, 'Wq6SKxflzX', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(296, 14, 'UuoSkEsRGP', NULL, 0, 'Sa1pkmM4LB', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(297, 14, 'JefljZfUlZ', NULL, 0, 'mvktzc9AVk', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(298, 14, 'peu12NEaB9', NULL, 0, 'm5FDSSSRfL', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(299, 14, 'pqcuYsTpWc', NULL, 0, 'wKZ2upfEMt', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(300, 14, 'BhmDa4soUt', NULL, 0, 'UvBuQEzsbS', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(301, 14, '6dKbfBQxsm', NULL, 0, 'iIycc3HKI1', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(302, 14, 'TWb7xbBGIQ', NULL, 0, 'Rjod6fQGWC', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(303, 14, 'M3cj8DmNzI', NULL, 0, 'L2JnDPqxgT', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(304, 14, '2yZMagZgUm', NULL, 0, 'jiUgaGq5rx', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(305, 14, 'Y5EGkAla5K', NULL, 0, 'F1SVJkQJqq', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(306, 14, '8uaWQWZ02c', NULL, 0, 'eRO25e25MN', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(307, 14, '5q1xvUUK4J', NULL, 0, 'G7rfKeupxr', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(308, 14, 'cv02Q4usx2', NULL, 0, 'CU7qOFYG01', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(309, 14, 'NOVdE9FYJ5', NULL, 0, 'yvj7NiN9Dv', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(310, 14, 'JZEIcTtw0H', NULL, 0, '90quR7jPtt', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(311, 14, 'IsivaSLETP', NULL, 0, 'uxPwys13Ex', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(312, 14, 'YjHfepT3fI', NULL, 0, 'TmjqZLJvok', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(313, 14, 'Exqr0BcP1k', NULL, 0, '6P1ZRy91wp', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(314, 14, '9BmYO8vThN', NULL, 0, 'kQj1XmsKQf', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(315, 14, 'UaYBvj6aKB', NULL, 0, 'SAvswd9GuY', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(316, 14, 'NdgZEbUV5h', NULL, 0, 'qluusGz517', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(317, 14, 'BMjArsuktK', NULL, 0, 'w55ZHnYqak', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(318, 14, 'TREgQy18kN', NULL, 0, 'cfFtgqVRfx', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(319, 14, 'OOgEK833oR', NULL, 0, 'iRkiieaRyZ', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(320, 14, 'gopYGwIupG', NULL, 0, 'z3m6aFIapx', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(321, 14, 'tEndjVIJmm', NULL, 0, '1oRGBOTTBh', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(322, 14, 'lXi7ZEjquB', NULL, 0, 'yIQXkxCCfb', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(323, 14, 'w4Eq9G44b8', NULL, 0, 'yR7Y8UH3oh', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(324, 14, 'D5mscbUkLl', NULL, 0, 'CxkiTIPSNB', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(325, 14, '0p95O23HkA', NULL, 0, 'DUfgmsURAC', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(326, 14, 'YrOmznCcQF', NULL, 0, 'phNEHEHDsN', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(327, 14, '63pSv89YB5', NULL, 0, 'sSC7P87KLM', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(328, 14, 'LqfheILUHS', NULL, 0, '1GQbrZSHaC', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(329, 14, 'aSUCG2T9xp', NULL, 0, 'U1gs8H3ooq', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(330, 14, 'pvlnVFFpTU', NULL, 0, 'f6YWunpi6a', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(331, 14, 'hv8W6wIyJm', NULL, 0, 'uQwCQ3TQlq', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(332, 14, '0oXhHcUU2v', NULL, 0, 'n9z7nPNjGc', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(333, 14, 'hSWsvVN4kd', NULL, 0, 'E550akDu9A', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(334, 14, 'zkvlgvTI8W', NULL, 0, 'uyylz0I0wu', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(335, 14, '653qnA1Grl', NULL, 0, 'LzLfCi5WvN', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(336, 14, 'BL965SgTs3', NULL, 0, '6wVq8QCL9q', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(337, 14, 'D2KIbhdcG9', NULL, 0, 'ENDvytxy9h', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(338, 14, '5I6bdYOYWs', NULL, 0, '9uv8tHwLIh', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(339, 14, 'mdTrNlclfB', NULL, 0, 'XMIT8Qb4Vf', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(340, 14, 'KgSazoIwov', NULL, 0, 'XZtZ9PHcow', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(341, 14, 'EAIlfMf9Kb', NULL, 0, 'MDI3LDgJlw', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(342, 14, 'ahRIGDayPu', NULL, 0, 'ujssQX978p', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(343, 14, 'Kzgx8ELfT4', NULL, 0, 'HQsBiYho2D', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(344, 14, 'ElDzUIfJbP', NULL, 0, 'Gx66iWSVAJ', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(345, 14, 'LRvkUzQAKI', NULL, 0, 'KbjgXFW0z3', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(346, 14, 'AdxIeaRN77', NULL, 0, 'MV3JV33INQ', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(347, 14, 'jQyVUNjphj', NULL, 0, '6JngMBXABt', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(348, 14, '3WCD41F3wU', NULL, 0, 'JWfJEVMg4q', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(349, 14, 'IIOdKMaa19', NULL, 0, '4UUaNowgB8', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(350, 14, 'eoTvHDTZvw', NULL, 0, 'IVfVTYsX5b', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(351, 14, 'zjtexSAvVH', NULL, 0, 'sr5BVL9c96', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(352, 14, 'neRogsNz2x', NULL, 0, 'UGS8zsFyU8', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(353, 14, 'E8UQGHFMXZ', NULL, 0, '5DcLUKo6ma', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(354, 14, 'lyCoG2UAYj', NULL, 0, 'y3hVgYpNzi', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(355, 14, 'vqk8rBna2H', NULL, 0, 'KWuDvQOrHb', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(356, 14, 'Yqv3NMQstG', NULL, 0, '3kOUxWvHHN', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(357, 14, 'ot6SVeWzsC', NULL, 0, 'kjbiWlwQaQ', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(358, 14, 'gbBeSisEfN', NULL, 0, '5DJZyiNsri', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(359, 14, 'O2jqfQ8Vnp', NULL, 0, '7W1sMkOX9i', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(360, 14, '9FfzJef2a9', NULL, 0, 'ho3E1kgi3L', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(361, 14, 'mWPTMBfTxA', NULL, 0, 'OJQzup0LAD', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(362, 14, 'mvyqMbfHzi', NULL, 0, 'tqgbAj2xAF', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(363, 14, 'LXZbJjrFZB', NULL, 0, 'twy0JXr5Sw', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(364, 14, '4ghHYBgiMV', NULL, 0, 'dNjD6g7I4O', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(365, 14, 'iA7UsrrcwY', NULL, 0, 'LAui9A7TPT', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(366, 14, 'HftACW2ODp', NULL, 0, '61N8ELZ39R', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(367, 14, 'TdsEMVqip6', NULL, 0, 'yFAklT6RyS', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(368, 14, 'cMUoVInNXl', NULL, 0, 'gDevvvXj0M', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(369, 14, '6HxgPoo4WW', NULL, 0, '9kCYy5ihuL', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(370, 14, 'Jmp1Ac62TW', NULL, 0, '8CsPMyCtAd', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(371, 14, 'STXJa91xl1', NULL, 0, 'aBd6f0lux6', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(372, 14, 'yPkaENyyLN', NULL, 0, 'qysWrTlBxR', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(373, 14, '7cDyoPe4mx', NULL, 0, 'd8gGYgArqu', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(374, 14, 'ugEKOwzSRU', NULL, 0, 'sPVbIL0kQx', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(375, 14, 'TT8uDfUJxW', NULL, 0, '4c6jVLrMtd', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(376, 14, 'QH7p0Jnx81', NULL, 0, '01Jt8gZKGH', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(377, 14, 'WJoE5TVSMU', NULL, 0, 'SiONIxKAig', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(378, 14, 'mUz5wRcUDX', NULL, 0, 'Uzwcgr678v', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(379, 14, 'QUpJ2Q5LJv', NULL, 0, '8sCoK78Gsy', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(380, 14, 'aF11AxTWcS', NULL, 0, '7Eb9qrDRdm', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(381, 14, 'JOgswgYiGT', NULL, 0, 'n5t4S8SQdW', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(382, 14, 'haHbORVhCz', NULL, 0, 'fsCCAUDiJF', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(383, 14, '2WvCwCR0ZG', NULL, 0, 'HFaPDHiCZ1', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(384, 14, 'YXpVYtbBg0', NULL, 0, 'ZOyiX5C7bX', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(385, 14, '2KdVIwZcLR', NULL, 0, 'v1cogeoFEn', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(386, 14, 'hVaGbkXwKN', NULL, 0, '3G0jqmddye', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(387, 14, 'VRr1UeGXUt', NULL, 0, '8iThcqJrdJ', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(388, 14, 'kDdByh34Gv', NULL, 0, 'wUFdAeDWGv', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(389, 14, '8EbJ956gsr', NULL, 0, 'WnM8r3w1vR', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(390, 14, 'qwcYJnSOMU', NULL, 0, 'VA9RKc4J9L', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(391, 14, 'frFSwj8nb6', NULL, 0, 'CT1CC0fvkT', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(392, 14, 'JkDgsjadcq', NULL, 0, 'KSNJdH9MCA', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL);
INSERT INTO `books` (`id`, `user_id`, `title`, `description`, `category_id`, `author`, `date`, `photo_id`, `photo_path`, `publish_year`, `active`, `created_at`, `updated_at`) VALUES
(393, 14, 'UIeoiXVImn', NULL, 0, 'SOdqyog6qV', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(394, 14, '0ZgRVQvyzX', NULL, 0, 'vHeQDVaMdb', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(395, 14, 'x0X7IvQ9Tq', NULL, 0, 'u92kxwAWbZ', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(396, 14, 'cm99Saedas', NULL, 0, 'zjPXtRbteJ', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(397, 14, 'TN0e1RKtMr', NULL, 0, '7iIEgXfhBz', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(398, 14, 'c86czkyLSw', NULL, 0, 'sVUlvfCfnJ', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(399, 14, 'tjM1HdD67v', NULL, 0, 'RyUOdbLRJC', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(400, 14, 'JNQclxXIvT', NULL, 0, 'qdxQuUtgQU', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(401, 14, 'kp7yLJSdCu', NULL, 0, 'l4Efywo8n4', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(402, 14, 'pajzD1vMpW', NULL, 0, 'CVGHAoExMJ', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(403, 14, 'XxYTymT2y9', NULL, 0, 'Q4dacuLa7K', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(404, 14, 'uiDwJCM1k6', NULL, 0, 'ZorMKSloQF', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(405, 14, 'SyNNP8UXVx', NULL, 0, 'KM7rc3usIN', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(406, 14, 'N8wWCypy4n', NULL, 0, '1Etuqu4khU', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(407, 14, 'rtdSxdkHTb', NULL, 0, 'TBjOnWf8PR', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(408, 14, '0LT870uzYS', NULL, 0, 'w5WmWgkHJU', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(409, 14, 'uKtSPSfoMY', NULL, 0, 'm1aJnCJLmp', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(410, 14, 'ULWeayN87R', NULL, 0, 'GVMZohRGoF', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(411, 14, 'RnuXW777Zg', NULL, 0, 'onMCdYBkjH', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(412, 14, 'CSy2kzqtPe', NULL, 0, 'I5wiOtdVjV', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(413, 14, '8tOkYR3S2u', NULL, 0, 'eJO1x04gjz', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(414, 14, '9fuuTpeGV2', NULL, 0, 's2kyvjysry', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(415, 14, '7WMwjNc4or', NULL, 0, 'UGDyYWr2Fq', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(416, 14, '6NvCzl2XDg', NULL, 0, '843GH9VwIy', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(417, 14, 'kNIP8nMpOT', NULL, 0, 'lN05oatfBF', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(418, 14, 'UCEixcDkU9', NULL, 0, '0D7mP6SftT', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(419, 14, 'YCWC5FpqHe', NULL, 0, 'hwkhXSSgul', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(420, 14, '4BKa6Yh0oS', NULL, 0, 'qFfO5oTU8O', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(421, 14, 'tzIR9CBbwb', NULL, 0, 'wl3L9ZcpbE', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(422, 14, 'Sl5p7ro1N8', NULL, 0, 'N52dtzE8xo', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(423, 14, 'kPumaWqOvg', NULL, 0, 'E0xFVRywnz', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(424, 14, 'wCmAiPvt4b', NULL, 0, 'cszvM30Mxs', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(425, 14, 'wZrtIhshuk', NULL, 0, 'iwnAAX6vvN', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(426, 14, 'eUvfQjPOyw', NULL, 0, 'qwTWWIiD4B', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(427, 14, '9dg6iPVAvy', NULL, 0, '0PFW4UwuCZ', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(428, 14, '63LvjMn9Xw', NULL, 0, 'R2PvrjhgxJ', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(429, 14, 'hoXWZBUY0O', NULL, 0, 'a5jvqurSje', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(430, 14, '8oeNlbKo4r', NULL, 0, 'BMM61RsZF6', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(431, 14, 'IY74oX8p8j', NULL, 0, 'NdPww9gWXM', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(432, 14, '9nHpzMThQd', NULL, 0, '2mhEU56FdT', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(433, 14, 'PbYbsQJKug', NULL, 0, 'GPdTw4nIhb', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(434, 14, 'zLgplcReek', NULL, 0, 'Y10olYxnOq', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(435, 14, '4RZ0fI4DGp', NULL, 0, 'pYiG7uSQwf', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(436, 14, 'FNXo9wFKyQ', NULL, 0, 'kwrBd3uKnr', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(437, 14, 'do57727HYP', NULL, 0, '6dWDlbEuJu', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(438, 14, 'vx7lWzg868', NULL, 0, 'IpzzLutqti', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(439, 14, 'DmN9Ot4wy1', NULL, 0, 'VsFrBiGIEx', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(440, 14, 'H5x4FUR0kz', NULL, 0, '8lCx2O0Cf4', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(441, 14, 'Uc3vhdNL7Y', NULL, 0, 'OzX3QzHz2z', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(442, 14, 'KRx9pHcDgA', NULL, 0, 'V1o2hBFqrM', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(443, 14, 'vOLGgGrPbM', NULL, 0, 'CGPaEOs2cN', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(444, 14, 'Uehf5ra1z2', NULL, 0, 'Idwoz3eicq', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(445, 14, 'TP1A5jLfTI', NULL, 0, 'G3zL5sj26j', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(446, 14, 'kw0pFgvpjo', NULL, 0, 'xPyVYzWtS8', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(447, 14, '9ZFBN0gnM7', NULL, 0, '41eEXVrfEX', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(448, 14, 'o3Qtk7rWF5', NULL, 0, 'hanwLtIYnm', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(449, 14, '8Fdsc7hFPn', NULL, 0, 'JlgDyrO4Sf', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(450, 14, 'BavN6qp0kV', NULL, 0, 'yp4yRxkIac', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(451, 14, 'fGqcXcWpoQ', NULL, 0, '0SV92aFTo7', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(452, 14, 'lmJAo9214Q', NULL, 0, 'jtRIeSPfc9', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(453, 14, 'wrglaskHVn', NULL, 0, 'WtlYlr6uWU', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(454, 14, 'pK6HRlZjIc', NULL, 0, 'fkzu4Pnw0Z', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(455, 14, 'liEkeA3OFc', NULL, 0, 'LHLckGUUBM', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(456, 14, '9UORacgDeY', NULL, 0, '4epK2FeljL', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(457, 14, 'PAm24yMc6l', NULL, 0, 'i4ygMYHvll', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(458, 14, 'Q7R5LYFzog', NULL, 0, 'HIjlSxoyh8', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(459, 14, 'ld1FaJH44I', NULL, 0, '7Iy9Tcr9SE', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(460, 14, 'Hbsi6qZT2Z', NULL, 0, 'D8UWy1evvk', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(461, 14, 'gPi5f6pI3G', NULL, 0, '2V3bTYgKMZ', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(462, 14, 'NpOEPrU9GM', NULL, 0, '02V9wlnNdj', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(463, 14, 'Ce9EdTchBn', NULL, 0, 'oo1UmbDimV', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(464, 14, '2aEBjJ7W0d', NULL, 0, 'RTFsd4MjF4', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(465, 14, '5Pm9jdU7h5', NULL, 0, 'zKCiC2NgLA', '2018-04-22 15:58:09', NULL, NULL, NULL, 1, '2018-04-22 15:58:09', NULL),
(466, 20, 'Harry potter', 'thunder scar on his forehead', 18, 'none', '2018-04-23 15:58:09', 67, '/images/1524504900_9781408855898_309038.jpeg', '1997', 1, '2018-04-23 14:22:56', '2018-04-23 14:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Technologies', '2018-03-13 16:59:32', '2018-03-13 16:59:51'),
(2, 1, 'Art & Music', '2018-03-13 17:02:47', '2018-03-13 17:02:47'),
(3, 1, 'Kids', '2018-03-13 17:02:53', '2018-03-13 17:02:53'),
(4, 1, 'Business', '2018-03-13 17:03:06', '2018-03-13 17:03:06'),
(5, 1, 'Biographies', '2018-03-13 17:03:23', '2018-03-13 17:03:23'),
(6, 1, 'Comics', '2018-03-13 17:03:34', '2018-03-13 17:03:34'),
(7, 1, 'Cooking', '2018-03-13 17:03:48', '2018-03-13 17:03:48'),
(8, 1, 'Health & Fitness', '2018-03-13 17:04:07', '2018-03-13 17:04:07'),
(9, 1, 'History', '2018-03-13 17:04:18', '2018-03-13 17:04:18'),
(10, 1, 'Horror', '2018-03-13 17:04:25', '2018-03-13 17:04:25'),
(11, 1, 'Entertainment', '2018-03-13 17:04:42', '2018-03-13 17:04:42'),
(12, 1, 'Medical', '2018-03-13 17:04:53', '2018-03-13 17:04:53'),
(13, 1, 'Sports', '2018-03-13 17:05:05', '2018-03-13 17:05:05'),
(14, 1, 'Teen', '2018-03-13 17:05:09', '2018-03-13 17:05:09'),
(15, 1, 'Travel', '2018-03-13 17:05:18', '2018-03-13 17:05:18'),
(16, 1, 'Novel', '2018-03-13 17:05:25', '2018-03-13 17:05:25'),
(17, 1, 'Westerns', '2018-03-13 17:05:40', '2018-03-13 17:05:40'),
(18, 1, 'Other', '2018-03-13 17:07:32', '2018-03-13 17:07:32');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `module_id`, `item_id`, `comment`, `image_id`, `created_at`, `updated_at`) VALUES
(10, 1, 1, 58, 'Nice book!', NULL, '2018-03-25 19:03:28', '2018-03-25 19:03:28'),
(11, 1, 1, 58, 'test', NULL, '2018-03-25 19:04:50', '2018-03-25 19:04:50'),
(12, 1, 1, 58, 'test 1', NULL, '2018-03-26 14:20:35', '2018-03-26 14:20:35'),
(13, 1, 1, 58, 'test 2', NULL, '2018-03-26 14:20:41', '2018-03-26 14:20:41'),
(14, 1, 1, 58, 'test 3', NULL, '2018-03-26 14:20:54', '2018-03-26 14:20:54'),
(15, 1, 1, 58, 'test 4', NULL, '2018-03-26 14:21:00', '2018-03-26 14:21:00'),
(16, 1, 1, 58, 'test 5', NULL, '2018-03-26 14:21:08', '2018-03-26 14:21:08'),
(17, 1, 1, 58, 'test 6', NULL, '2018-03-26 14:22:14', '2018-03-26 14:22:14'),
(18, 1, 1, 58, 'test 7', NULL, '2018-03-26 14:22:19', '2018-03-26 14:22:19'),
(19, 1, 1, 58, 'test 9', NULL, '2018-03-26 14:22:23', '2018-03-26 14:22:23'),
(20, 1, 1, 58, 'test 11', NULL, '2018-03-26 14:22:28', '2018-03-26 14:22:28'),
(21, 1, 1, 58, 'test 12', NULL, '2018-03-26 14:22:34', '2018-03-26 14:22:34'),
(22, 1, 1, 58, 'jjj', NULL, '2018-03-26 14:36:59', '2018-03-26 14:36:59'),
(23, 1, 1, 58, 'Very nice!!!', NULL, '2018-03-26 17:12:29', '2018-03-26 17:12:29'),
(24, 1, 1, 58, 'caascas', NULL, '2018-03-26 17:14:08', '2018-03-26 17:14:08'),
(25, 1, 1, 58, 'ffffffffffff', NULL, '2018-03-26 17:14:49', '2018-03-26 17:14:49'),
(26, 1, 1, 58, 'naaaaaaaaaa', NULL, '2018-03-26 17:16:56', '2018-03-26 17:16:56'),
(27, 1, 1, 58, 'hehe', NULL, '2018-03-26 17:17:59', '2018-03-26 17:17:59'),
(28, 1, 1, 58, 'ggg', NULL, '2018-03-26 17:18:19', '2018-03-26 17:18:19'),
(29, 1, 1, 69, 'Test comment 1', NULL, '2018-03-31 13:36:03', '2018-03-31 13:36:03'),
(30, 1, 1, 69, 'Test comment 1', NULL, '2018-03-31 13:43:29', '2018-03-31 13:43:29'),
(31, 1, 1, 69, 'Test comment 3', NULL, '2018-03-31 13:47:35', '2018-03-31 13:47:35'),
(35, 1, 2, 1, 'Test comment!', NULL, '2018-04-13 17:02:03', '2018-04-13 17:02:03'),
(36, 1, 1, 24, 'So interesting book!', NULL, '2018-04-23 04:34:39', '2018-04-23 04:34:39'),
(37, 20, 1, 53, 'good story ever, but so much pages', NULL, '2018-04-23 14:17:40', '2018-04-23 14:17:40'),
(38, 20, 1, 466, 'bring back your childhood', NULL, '2018-04-23 14:23:19', '2018-04-23 14:23:19'),
(39, 1, 1, 7, 'Nice book!', NULL, '2019-02-12 11:12:23', '2019-02-12 11:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No title',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `module_number` int(11) DEFAULT NULL,
  `item_number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `module_number`, `item_number`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 80, '2018-04-14 19:23:00', '2018-04-14 19:23:00'),
(2, 1, 1, 69, '2018-04-14 20:12:00', '2018-04-14 20:12:00'),
(3, 1, 1, 24, '2018-04-23 04:34:46', '2018-04-23 04:34:46'),
(4, 1, 1, 15, '2018-04-23 04:35:38', '2018-04-23 04:35:38'),
(5, 1, 1, 22, '2018-04-23 04:35:58', '2018-04-23 04:35:58'),
(6, 1, 2, 1, '2018-04-23 04:38:10', '2018-04-23 04:38:10'),
(7, 1, 2, 3, '2018-04-23 04:39:40', '2018-04-23 04:39:40'),
(8, 20, 1, 193, '2018-04-23 14:14:30', '2018-04-23 14:14:30'),
(9, 20, 1, 466, '2018-04-23 14:23:30', '2018-04-23 14:23:30'),
(10, 14, 1, 49, '2018-07-27 05:36:50', '2018-07-27 05:36:50'),
(11, 1, 1, 52, '2018-11-16 07:00:35', '2018-11-16 07:00:35'),
(12, 1, 1, 7, '2019-02-12 11:12:31', '2019-02-12 11:12:31'),
(13, 1, 1, 104, '2019-02-12 11:12:59', '2019-02-12 11:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `image_books`
--

CREATE TABLE `image_books` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `photo_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_books`
--

INSERT INTO `image_books` (`id`, `book_id`, `photo_id`, `created_at`, `updated_at`) VALUES
(1, 1, 7, '2018-04-18 18:29:21', '2018-04-18 18:29:21'),
(2, 2, 8, '2018-04-18 18:30:07', '2018-04-18 18:30:07'),
(3, 3, 9, '2018-04-18 18:30:35', '2018-04-18 18:30:35'),
(4, 4, 10, '2018-04-18 18:31:11', '2018-04-18 18:31:11'),
(5, 5, 11, '2018-04-18 18:31:44', '2018-04-18 18:31:44'),
(6, 6, 12, '2018-04-18 18:32:30', '2018-04-18 18:32:30'),
(7, 7, 13, '2018-04-18 18:33:01', '2018-04-18 18:33:01'),
(8, 8, 14, '2018-04-18 18:33:37', '2018-04-18 18:33:37'),
(9, 9, 15, '2018-04-20 16:06:43', '2018-04-20 16:06:43'),
(10, 10, 16, '2018-04-20 16:08:16', '2018-04-20 16:08:16'),
(11, 11, 17, '2018-04-20 16:08:57', '2018-04-20 16:08:57'),
(12, 12, 18, '2018-04-20 16:41:15', '2018-04-20 16:41:15'),
(13, 13, 19, '2018-04-20 16:41:45', '2018-04-20 16:41:45'),
(14, 14, 20, '2018-04-20 16:42:17', '2018-04-20 16:42:17'),
(15, 15, 21, '2018-04-20 16:42:55', '2018-04-20 16:42:55'),
(16, 16, 22, '2018-04-20 16:43:28', '2018-04-20 16:43:28'),
(17, 17, 23, '2018-04-20 16:44:12', '2018-04-20 16:44:12'),
(18, 18, 24, '2018-04-20 16:44:35', '2018-04-20 16:44:35'),
(19, 19, 25, '2018-04-20 16:44:58', '2018-04-20 16:44:58'),
(20, 20, 26, '2018-04-20 16:45:27', '2018-04-20 16:45:27'),
(21, 21, 27, '2018-04-20 16:45:51', '2018-04-20 16:45:51'),
(22, 22, 28, '2018-04-20 16:46:21', '2018-04-20 16:46:21'),
(23, 23, 29, '2018-04-20 16:46:46', '2018-04-20 16:46:46'),
(24, 24, 30, '2018-04-20 16:47:05', '2018-04-20 16:47:05'),
(25, 25, 31, '2018-04-20 16:47:38', '2018-04-20 16:47:38'),
(26, 26, 32, '2018-04-20 16:48:03', '2018-04-20 16:48:03'),
(27, 27, 33, '2018-04-20 16:48:24', '2018-04-20 16:48:24'),
(28, 28, 34, '2018-04-20 16:52:47', '2018-04-20 16:52:47'),
(29, 29, 35, '2018-04-20 16:53:05', '2018-04-20 16:53:05'),
(30, 30, 36, '2018-04-20 16:53:20', '2018-04-20 16:53:20'),
(31, 31, 37, '2018-04-20 16:53:46', '2018-04-20 16:53:46'),
(32, 32, 38, '2018-04-20 16:54:11', '2018-04-20 16:54:11'),
(35, 34, 41, '2018-04-20 16:56:11', '2018-04-20 16:56:11'),
(36, 35, 42, '2018-04-20 16:56:30', '2018-04-20 16:56:30'),
(37, 36, 43, '2018-04-20 16:57:05', '2018-04-20 16:57:05'),
(38, 37, 44, '2018-04-20 16:57:22', '2018-04-20 16:57:22'),
(39, 38, 45, '2018-04-20 16:57:42', '2018-04-20 16:57:42'),
(40, 39, 46, '2018-04-20 16:58:07', '2018-04-20 16:58:07'),
(41, 40, 47, '2018-04-20 16:58:28', '2018-04-20 16:58:28'),
(42, 41, 48, '2018-04-20 16:58:50', '2018-04-20 16:58:50'),
(43, 42, 49, '2018-04-20 16:59:14', '2018-04-20 16:59:14'),
(44, 43, 50, '2018-04-20 16:59:34', '2018-04-20 16:59:34'),
(45, 44, 51, '2018-04-20 16:59:56', '2018-04-20 16:59:56'),
(46, 45, 52, '2018-04-20 17:00:21', '2018-04-20 17:00:21'),
(47, 46, 53, '2018-04-20 17:00:38', '2018-04-20 17:00:38'),
(48, 47, 54, '2018-04-20 17:00:58', '2018-04-20 17:00:58'),
(49, 48, 55, '2018-04-20 17:01:28', '2018-04-20 17:01:28'),
(50, 49, 56, '2018-04-20 17:01:51', '2018-04-20 17:01:51'),
(51, 50, 57, '2018-04-20 17:02:07', '2018-04-20 17:02:07'),
(52, 53, 58, '2018-04-20 17:02:34', '2018-04-20 17:02:34'),
(53, 52, 59, '2018-04-20 17:02:53', '2018-04-20 17:02:53'),
(54, 51, 60, '2018-04-20 17:03:31', '2018-04-20 17:03:31'),
(55, 33, 62, '2018-04-20 17:27:55', '2018-04-20 17:27:55'),
(58, 466, 67, '2018-04-23 14:35:00', '2018-04-23 14:35:00'),
(59, 466, 68, '2018-04-23 14:35:01', '2018-04-23 14:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `image_events`
--

CREATE TABLE `image_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `photo_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_movies`
--

CREATE TABLE `image_movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  `photo_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No description',
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_02_21_171653_create_books_table', 1),
(4, '2018_02_21_172107_create_roles_table', 1),
(5, '2018_02_22_183916_create_items_table', 1),
(6, '2018_03_01_181720_create_photos_table', 1),
(7, '2018_03_01_182432_create_image_books_table', 1),
(8, '2018_03_01_195716_create_movies_table', 1),
(9, '2018_03_01_195822_create_events_table', 1),
(10, '2018_03_05_181209_create_image_movies_table', 1),
(11, '2018_03_11_112839_create_settings_table', 1),
(12, '2018_03_12_194815_create_image_events_table', 1),
(13, '2018_03_13_180026_create_categories_table', 1),
(16, '2018_03_16_173718_create_comments_table', 2),
(17, '2018_03_24_191132_create_profiles_table', 3),
(18, '2018_03_26_190735_create_ratings_table', 4),
(19, '2018_03_26_191751_create_modules_table', 5),
(20, '2018_03_27_164331_create_favorites_table', 6),
(21, '2018_03_27_171323_create_subscriptions_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Books', '2018-03-25 21:00:00', '2018-03-25 21:00:00'),
(2, 'Movies', '2018-03-25 21:00:00', '2018-03-25 21:00:00'),
(3, 'Users', '2018-03-25 21:00:00', '2018-03-25 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No title',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'none',
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'none',
  `category_id` int(11) NOT NULL DEFAULT '0',
  `finished_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_id` int(40) DEFAULT NULL,
  `photo_path` text COLLATE utf8mb4_unicode_ci,
  `movie_created_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `user_id`, `title`, `description`, `author`, `category_id`, `finished_date`, `photo_id`, `photo_path`, `movie_created_year`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 'A5020SkAcr', '5QLAqZ2H0dWauh6VZdWI', 'rwVN5ilMp4', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(2, 1, 'xkodNeuSqe', 'pZVVC1vEmjjByMYFUaSn', 'PDfznsw2xd', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(3, 1, 'UlC3TGzZPh', '2LRWe9fE3szml4iKT7z2', 'mow50k5u8s', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(4, 1, 'LYhgD58xTc', 'FEQJTZG4KTm523LWm9nh', 'YiRmR02lFr', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(5, 1, 'V8oS5CmefV', 'boAw9yib2NSr0aCT0gg6', 'qCKvrjE2Hg', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(6, 1, 'Rtzo2aIBdQ', 'p98WvYeRtR8Bk9urQ9ax', 'XBvtsPTVnv', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(7, 1, '1k9O82nDdP', 'lZ4AxCEj9SDnc0XYKBov', 'XGcNNEdhKZ', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(8, 1, '4Md01QsZGt', 'd7BFx6lwUK6GKflxfLnF', '7czC2oJlAq', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(9, 1, 'FZ8Zx3u0T3', '3ctpqFWq5Q1TBltIuXen', '7FzBT6133Z', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(10, 1, 'g8soA09Vbv', 'yQqWMzyCtQkssBmQpL4y', 'gSx0HG10CN', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(11, 1, 'N04dfYJGhl', 'JE2k4WvMctMVLllzUiY0', 'UoxP87RM3I', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(12, 1, 'Z6ZsPcUwZV', 'l4QujTkjMOnu3Fq8rQxt', 'Wawqjx5B9T', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(13, 1, 'krWtONSvCQ', 'Fo5IkQ8TVYiBAn6aiElX', 'CAm3VjZMNZ', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(14, 1, '83OZMvgD1Q', 'T7MR47IFb5qnnhTWUFnk', 'CbWaFsVdnW', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(15, 1, '7xBhAQRa8B', 'cAhf4jA1X1SvongnOxRW', 'vQcLODwWMm', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(16, 1, 'zyiD9ECVmt', 'bIjpHK4sGSmdbayszDLC', 'j5QPTMOqtq', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(17, 1, 'H9BZy1W0u2', '97Jelbdz58SwjRFcpX87', 'RvXDpUQ0VM', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(18, 1, 'KfQjnVWmPH', 'WuElYFnFX2KsyLTH7DA2', 'kgEEPAYDJx', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(19, 1, 'f0HRbhRISD', '8M2BXcXLEACXnE3pDwdi', 'CdDdrwzakn', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(20, 1, 'QmosbccS0T', '9tYVD5omWSrhF7EZOXw0', '8OWIN9hFVp', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(21, 1, '4TSaHZqVc2', 'xXvuyYCgpNrpdNUxiU1x', 'S5qA1oCGI1', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(22, 1, '1osgbD9TKD', 'HutPYtAztFmIT3X7bMR1', '8LSa2A98kz', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(23, 1, 'mgKaIUarTf', 'U69k0PFk0uYGUcahzYp6', 'Jg8HDmBjFk', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(24, 1, 'sOqFoDGgp5', 'QTObkIBWjZMd5QZFmVaU', 'NZvMKW61YB', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(25, 1, 'PCZVEXs4GV', 'dZhAse4niC16oFuxCUgi', 'efdAyBYARh', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(26, 1, 'mkS9Dp1sEL', 'bNI8Zc1yvWPAWMkv9mqS', 'gcpvficEBH', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(27, 1, 'gUR5KrSDQ8', 'jrlLFfMHr372TB5fssUF', 'dGizR5uCIR', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(28, 1, '8Q4U1xSevn', 'inaaATna6l2azOa2H4N1', '281bqomPXa', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(29, 1, 'nGRxBdo40n', '9tInMJYp5ChIl58LXouC', 'jXq9PaEYCy', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(30, 1, 'qsmeClYikf', 'h0tTUkWMZ0KcIFzM8eny', 'Wp4TQbODmy', 0, '2018-04-20 20:33:58', NULL, NULL, NULL, 1, '2018-04-20 20:33:58', NULL),
(31, 2, '97nQPw4WGR', 'Tvvw1FdEO5PhUHFd70An', 'Qq2KhewtCJ', 0, '2018-04-20 20:34:30', NULL, NULL, NULL, 1, '2018-04-20 20:34:30', NULL),
(32, 2, 'yqXdJoKMir', '3ezlv0Pw2dk6aajbXevz', 'prZTK2neZF', 0, '2018-04-20 20:34:30', NULL, NULL, NULL, 1, '2018-04-20 20:34:30', NULL),
(33, 2, 'cH50XJlhPH', 'huFw2utMotrd0oCD6ei3', 'l8vdcXL9SE', 0, '2018-04-20 20:34:30', NULL, NULL, NULL, 1, '2018-04-20 20:34:30', NULL),
(34, 2, 'jCou229y8K', 'cq8O9ESO4DzTkp1F20W3', '9RNfGo7hZt', 0, '2018-04-20 20:34:30', NULL, NULL, NULL, 1, '2018-04-20 20:34:30', NULL),
(35, 2, 'BkQ5StVZaK', 'Yd5oWpA7uTAjgB4Eu73A', 'BH7ExGwP3B', 0, '2018-04-20 20:34:30', NULL, NULL, NULL, 1, '2018-04-20 20:34:30', NULL),
(36, 2, 'VVvtdP64E1', 'wLOY8ubUfHE7gu7ddEIT', 'Tk25GkVozK', 0, '2018-04-20 20:34:30', NULL, NULL, NULL, 1, '2018-04-20 20:34:30', NULL),
(37, 2, 'WXMcxxEZtM', 'hgcVzAgAj8iA3VgcBCMq', 'kpATJtQlwy', 0, '2018-04-20 20:34:30', NULL, NULL, NULL, 1, '2018-04-20 20:34:30', NULL),
(38, 2, '0ZVCuJa9eR', 'Lh8eKfflu3OhmDm2ug0t', 'W3911sPb1Q', 0, '2018-04-20 20:34:30', NULL, NULL, NULL, 1, '2018-04-20 20:34:30', NULL),
(39, 2, 'Zv7TIonKuN', '10GoD8URsNDTGApXYdqj', 'R10xk4Zr2N', 0, '2018-04-20 20:34:30', NULL, NULL, NULL, 1, '2018-04-20 20:34:30', NULL),
(40, 2, 'n8mqmsDsTq', '9JMiqL5zkwA1cUkWEtWY', 'oFmBVuPB0G', 0, '2018-04-20 20:34:30', NULL, NULL, NULL, 1, '2018-04-20 20:34:30', NULL),
(41, 2, 'li8WbXkdLu', '6GQJLvDhOrOJrrpq9BSl', '7XjZPUka3T', 0, '2018-04-20 20:34:30', NULL, NULL, NULL, 1, '2018-04-20 20:34:30', NULL),
(42, 2, '9ij2LPq2eM', 'DTGD4osSrGpT52i3JWYY', 'Ka2l89j04J', 0, '2018-04-20 20:34:30', NULL, NULL, NULL, 1, '2018-04-20 20:34:30', NULL),
(43, 2, 'XJhvY25JiE', 'HL8yeuiVcGo0DdJU44fd', '7W5MNDFqa9', 0, '2018-04-20 20:34:30', NULL, NULL, NULL, 1, '2018-04-20 20:34:30', NULL),
(44, 2, 'nmY5iKzZDs', 'Xnd9sk8eJazz8HBEJQkp', 'vWg3rEr5rc', 0, '2018-04-20 20:34:30', NULL, NULL, NULL, 1, '2018-04-20 20:34:30', NULL),
(45, 2, 'aosrN1De9f', 'tvvzrq3VsRkM4MdEPlOw', 'obj8GJKU49', 0, '2018-04-20 20:34:30', NULL, NULL, NULL, 1, '2018-04-20 20:34:30', NULL),
(46, 2, 'gm3tE5eBeT', 'XvQXux1fwxKkhPwjBR3W', 'SyAs9pzJgN', 0, '2018-04-20 20:34:30', NULL, NULL, NULL, 1, '2018-04-20 20:34:30', NULL),
(47, 2, 'MscpDoZJrl', 'HRLpC8Z0R9SL6te6XrLM', 'TUT6DBa6hM', 0, '2018-04-20 20:34:30', NULL, NULL, NULL, 1, '2018-04-20 20:34:30', NULL),
(48, 2, 'BdTT8q1sbI', 'Z6l7eDr3I8B6hgSiugPC', 'md7QNJn0aM', 0, '2018-04-20 20:34:30', NULL, NULL, NULL, 1, '2018-04-20 20:34:30', NULL),
(49, 2, 'rXEFMKipTa', 'w5BiXlUPTezEua0ZHMSc', 'F4YL57VPEx', 0, '2018-04-20 20:34:30', NULL, NULL, NULL, 1, '2018-04-20 20:34:30', NULL),
(50, 2, 'GStsG6wqwv', 'ZrRW9FRcixTTmIUvNbjy', 'Z5aSV19OK5', 0, '2018-04-20 20:34:30', NULL, NULL, NULL, 1, '2018-04-20 20:34:30', NULL),
(51, 2, 'KqtXtox4Or', 'gOEuO56V7KdJLIG4IPCT', 'YQ77gFczFX', 0, '2018-04-20 20:34:30', NULL, NULL, NULL, 1, '2018-04-20 20:34:30', NULL),
(52, 8, 'DqDqbJ9Cfp', 'F5S2RHODKYyoOK3CoZdT', '6jqS02c570', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(53, 8, 'm0c5SOtu1w', '5vPNGvB8QSNFX2o7fgGx', 'QxDf2Ds5GZ', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(54, 8, 'V4Viw0nzhs', 'OcRyEog7YYUKIjd9HkSX', '3wQzLpfcA9', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(55, 8, 'tyMx9W40Vq', '5fX1ojIm4auFrxgxALgT', 'o4FNWROKBY', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(56, 8, 'DK0wFFTwRU', 'YmEWLYm3heYXPuatsKlV', 'an5H6vGSKi', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(57, 8, '4zDMCLpMgY', '8Yshv7Pln2jj3bEh5T5Z', 'NzsuU7QHLT', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(58, 8, 'eDJuewKUdL', 'CHwIY5Y0cf655IaNvcBA', 'Hfuh26EDyT', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(59, 8, 'hS7lszK0mO', 'HZmIXYzoCbcwWXVapUSZ', '3RSEKjSsnA', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(60, 8, 'GyLc47BORL', 'Hhhe9YSrHEh6VqSkYz5S', 'XBqNgNz7LH', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(61, 8, 'YuS1bEzzBq', 'XFdaGLQqK3kSiAYckGMy', 'v3FocCsLU6', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(62, 8, 'zf09JkOSu6', 'c4dBOFHXUDiAZHBaAf2S', 'm1wJEVHm4X', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(63, 8, 'hWqbgsBVyd', 'GxjTCOWjET4ZGhjBG8JB', 'hAj9fMMxtV', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(64, 8, '3jFRvcueW7', 'H5ijlbJzYJooypkFsh3d', '2T4OT7QC0S', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(65, 8, 'qZZFPWHmy7', 'XVEJHHIGFhZ85Pm0183F', 'FjsgKmNJY8', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(66, 8, 'ujaK7gArMc', 'SC2EMhf8US09dsDQyXo8', 'oMoWHVbjtW', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(67, 8, 'xwJYBXx1NA', '5ymA1US3gDmXV6aNHqbu', 'uNCuUs9loM', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(68, 8, 'yBLv2iCdoH', '8SkeRiptdYTKUVFbIxtu', 'd2xnOSSU7t', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(69, 8, '5mkTxHkVTF', 'iD5NbJvSBLqcxHtTAbl6', 'z8pefQ8MYu', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(70, 8, 'zaz95yyAZW', '6PmRseLSHAPPnilplXXu', 'NpiQfVqzsD', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(71, 8, '3pgA0YfJs9', 'FKTpEwT6t3zB3oMVRs4K', 'ORtjmF0qjl', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(72, 8, 'idnYQliect', 'vX35IaKGYLtVcuelZthB', '6t9D9UnQ31', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(73, 8, 'IXWgEyvTF9', 'nLhY4qKkoCheqjjI3glZ', 'SurNrthl9P', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(74, 8, 'WQIgvT5Joq', 'c41Ze5CTDUuFXyRCNTb7', 'KPhFeB8a3V', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(75, 8, 'tLuxeH39SH', 'ieSQ26Q3vOTsMW6WKsSO', 'TbhEn3Tj3F', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(76, 8, 'VtRJXdUPos', 'iswebmqtPvy0iBrU0vLW', 'f9fue5gAEI', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(77, 8, 'u0jcpkCLY0', 'iviQKojeVxJYQ8U9T4iq', '4OpE78mC4n', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(78, 8, 'RsxOdaXaoT', 'MdLSvSnaxvAhCdjWenzP', 'nwNHitkw8N', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(79, 8, 'BDZEPEGrQY', '1zVxBjRQw4dtm57Km5aV', '6izuwnqTBW', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(80, 8, 'qhcPsVNqas', 'QEU9RQENRonL8lcbWcUl', 'vgVH1viiN6', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(81, 8, 'Lzw2utKZkB', 'QUDl7j22rxudEMXvMh7e', 'AA5brkLkTo', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(82, 8, 'SjgXRxa4pC', 'Fbn792IvnA9ly9Ii5CIu', 'ZtevuVLzbx', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(83, 8, 'SNtRi9jLB9', 'IelEBmolwHDKWNCi5Qq7', 'KJuIorTCkE', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(84, 8, '2v8UsmeYar', '8RczFfsY8ChnxMbPhdjf', 'MYai434ewY', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(85, 8, 'VKojka7fNh', 'hpAIhmqsATabfbMaWclO', 'qpvGDzJXwX', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(86, 8, 'uLTvmkCUh1', 'pX3D52qB72GJge7jyJ6Q', 'VeHl5cNvuu', 0, '2018-04-20 20:34:46', NULL, NULL, NULL, 1, '2018-04-20 20:34:46', NULL),
(87, 9, 'nWG6huIOHw', 'ZPwkbPmDFcsRsrXW8Dby', 'UOQvLRa8cN', 0, '2018-04-20 20:34:57', NULL, NULL, NULL, 1, '2018-04-20 20:34:57', NULL),
(88, 9, 'zUugqs34Sr', 'yiXciGaQK61bGzJx1GC7', 'WwuueHW6Qf', 0, '2018-04-20 20:34:57', NULL, NULL, NULL, 1, '2018-04-20 20:34:57', NULL),
(89, 9, '8uwDekwQ8C', 'rrxIDd7VenIyJaQUFRcQ', 'X4xgSmzdbM', 0, '2018-04-20 20:34:57', NULL, NULL, NULL, 1, '2018-04-20 20:34:57', NULL),
(90, 9, '7H99C62H4O', 'xVVnSz8uh77NNLDPajRt', 'uVMRiky7x1', 0, '2018-04-20 20:34:57', NULL, NULL, NULL, 1, '2018-04-20 20:34:57', NULL),
(91, 9, 'tewWYJBN1E', 'OhKk8IJOoyWXTkNmxCTK', 'JP05BMtCHE', 0, '2018-04-20 20:34:57', NULL, NULL, NULL, 1, '2018-04-20 20:34:57', NULL),
(92, 9, 'zBQg8Nzo4C', 'D6TmgbdVgBr1aCDVOdhz', 'qcAege14Qq', 0, '2018-04-20 20:34:57', NULL, NULL, NULL, 1, '2018-04-20 20:34:57', NULL),
(93, 9, 'YBl1PcrfER', 'zzzVKJVhwHfBVY96qLcM', 'ozbIQhv7nZ', 0, '2018-04-20 20:34:57', NULL, NULL, NULL, 1, '2018-04-20 20:34:57', NULL),
(94, 9, 'trNtBEDQgw', 'eZxHvPnKPvegE2sf0r0v', 'Rk67J18EIO', 0, '2018-04-20 20:34:57', NULL, NULL, NULL, 1, '2018-04-20 20:34:57', NULL),
(95, 9, 'AqEgdOZFJ5', 'RbQepOvWhoN8DZ2qIn45', '4yuSDy1bGT', 0, '2018-04-20 20:34:57', NULL, NULL, NULL, 1, '2018-04-20 20:34:57', NULL),
(96, 9, 'm6kFxsM1gs', 'PfNH5iUM7TOuLCD8RHts', 'FCP4xDhkwz', 0, '2018-04-20 20:34:57', NULL, NULL, NULL, 1, '2018-04-20 20:34:57', NULL),
(97, 9, '3wdmKIQMll', 'z20TweHKeEJ4CJ6ZHEoy', 'fS2ESPydRc', 0, '2018-04-20 20:34:57', NULL, NULL, NULL, 1, '2018-04-20 20:34:57', NULL),
(98, 9, 'aLNU5qCkkB', 'VqTkmCuowSx75HfIbJ7T', 'i2eBZDdW6K', 0, '2018-04-20 20:34:57', NULL, NULL, NULL, 1, '2018-04-20 20:34:57', NULL),
(99, 12, 'TrGYp61bdw', '9SAyUcARUv63QRPG4skJ', 'pDa5Lc5FIu', 0, '2018-04-20 20:35:09', NULL, NULL, NULL, 1, '2018-04-20 20:35:09', NULL),
(100, 12, 'WBPe0HH4Zy', '3y3R6Atm1PpM8VDqNOxM', 'xH4dSsAkFu', 0, '2018-04-20 20:35:09', NULL, NULL, NULL, 1, '2018-04-20 20:35:09', NULL),
(101, 12, 'Kjp4iDunIt', 'yVO2Sp7YdnwAMxys3QGf', 'inqQQT2v4c', 0, '2018-04-20 20:35:09', NULL, NULL, NULL, 1, '2018-04-20 20:35:09', NULL),
(102, 12, 'P60fdimE28', 'trhNiv6mfRipwltpHAp4', 'rZGU41vcQa', 0, '2018-04-20 20:35:09', NULL, NULL, NULL, 1, '2018-04-20 20:35:09', NULL),
(103, 12, 'ScqgeAiqEl', '7OSOT77mle4J6W1pDanf', 'ZvhUG7iyLK', 0, '2018-04-20 20:35:09', NULL, NULL, NULL, 1, '2018-04-20 20:35:09', NULL),
(104, 14, 'rJJCbBXG5O', 'pkqfn1Q2Ntz5z99Lk1eA', 'ozIylnvomt', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(105, 14, 'mabTCn9n0R', '1ciRVflws3TwD8yz0tda', '5DaMgYkrTH', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(106, 14, 'ykmW1aNjav', 'v5WOLIw92IYNBXq3yHzp', 'IMceiInvCj', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(107, 14, '1ql3IGBLDZ', 'BnNNQVMGOfUJFSSOjNLA', 'MzZvOGun6I', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(108, 14, 'LoUaPnuUWW', 'Jb4PQxRVNISMsEg3o2QC', 'dZ1IShH16l', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(109, 14, '6e9nySsHiB', 'Cu3qPxNTW8dmVS1YVjU3', 'j8vLsQHHDW', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(110, 14, 'pTgeLS5N9t', 'B1xVYPmQVP62qC1xqA3E', 'yMeDCAYJ7q', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(111, 14, 'IzyAmIM6Lz', 'dM2IUfWZHyTJVKUJ1i80', 'NnasFDHKvu', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(112, 14, 'aCTx4kozdH', 'FTs9PyGCAzmaxJ6oMN8g', '7iYFLBUzWC', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(113, 14, 'xk8J7duqyY', 'YYfwWEfK6IcGClw3Z8Jx', 'T5GLQd2cSv', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(114, 14, '7mlm3wQGOv', '6k6RE9k2NZPLvI7kwN1I', '1BWzQijGKp', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(115, 14, '8AqAjOGFsG', 'HwieMfBzkasn9me8PkSE', 'pD4HDCSMRZ', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(116, 14, 'Z3PeaOU7qQ', 'qFiZLfep97WuL8Jm2xPm', 'NznPH9RzYx', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(117, 14, 'TN8rHooDtb', 'uUUMv3fcie9KkVphmF9f', 'vjGmG5GriX', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(118, 14, 'XrlwAC2usS', 'vqxJtxBg4hUcqCdIELJS', 'uAUXgwOpDO', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(119, 14, 'UlSMMXhCRB', 'g70Q67OAHokfAN1xTBES', 'e4DTuAsqyJ', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(120, 14, '5CUVgV2IOV', 'yGLzM9OFhgSvJJkH5fcv', 'VcM2zgECvY', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(121, 14, 'Asdox54vkh', 'AyrgMjhLnIstzZlXWMvq', '1nmlsiv76G', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(122, 14, 'kIorGHDmrR', '1TmQv7mAmeZaQOCuLaXH', '06NiXN1oTc', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(123, 14, 'XaUWXsE95B', 'dzQPkv2Vgni6hJsPAFhg', '6qwwYlFRcb', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(124, 14, '2cQvirdWwC', 'NfduN9IwEg1P2sMrC31W', 'ZUjnx7WHBD', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(125, 14, '3DeL3erQ96', '7Bv1xrHo8VOf5xAG19UO', 'QQAkcTQgoV', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(126, 14, 'Q5ERCI8ewP', '2wHX0Jo5zcon3Av5HXgV', 'DODCLO6BvK', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(127, 14, 't46cByRaow', 'rHcqbIi78DTc3NetUj3X', '8uiGrnZTqN', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(128, 14, 'j0MDzJ4h5w', 'MTENQYObsdEDcQ0U0ue6', 'DTt5OXVQTa', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(129, 14, 'Kg5tvk1opL', 'Tws2uzmQjhhvClu951Rf', '32NaMKWPdu', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(130, 14, 'kD8syVyWme', 'dT69SnE12XO6cpFj5T91', 'xGTYgb0lpy', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(131, 14, '7eFFv62iP2', 'WkdaradobZEKOxE7Qg53', 'jojP5aFd5T', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(132, 14, 'NGdwl58gvr', 'TVVEnt9laKCARSdIHW0S', 'CaqXopSsBY', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(133, 14, 'Ma9X5Os1mB', 'oIjw6gfKG3ITr5aq7duI', 'yzv2g6xmaQ', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(134, 14, 'MVAlBIi5IN', 'rHFe5pQ3z0DKMefsQLAk', 'ayLzuyKnux', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(135, 14, 'qezPi2HazA', 'HOTZr8dSGNeQQ9iUG4bZ', 'TusnpPADSa', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(136, 14, 'tjRyNbJBqV', '9zm7IpVawi5ToXxnukIa', 'IwhYQeFIzt', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(137, 14, 'QSjOgYK3Vk', 'I6aVoeOTGciIJ4xArlqG', 'DXP3We8HIR', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(138, 14, 'WfTlXckW3o', '7kBZ48BtAbNWrGGNpw7v', 'gHz2zGHzxp', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(139, 14, 'xFfjyhnZGr', 'tME30MefvkmTnWx08iDI', 'UGq2QTTsC9', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(140, 14, 'ba9o0H1ZS3', 'yGv5kqKjoDaUa3rNkfFg', 'M1Ev2QmNFv', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(141, 14, 'VYvpr5SZzY', 'mNuytbm2LDu3Ura8UJ5o', 'A6EOIopVIO', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(142, 14, 'WnOLHC9282', 'L52ND4nhdsw9FyUo7E9J', 'agcaiJPgy8', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(143, 14, 'IUSiW0YFFV', 'QehLlHISSPtShFhdVyhA', '7gVEoPwNp1', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(144, 14, 'W8RQpvzCPC', 'uAZNMvRcGqv4saCRvNox', 'jP9i8QDqGW', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(145, 14, 'VpBZNc2WqQ', 'ylxJgcB6HgkF8EMTSgPO', 'BhzbXdgv4C', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(146, 14, 'HG1oeW9FXg', '3zh2qSgR5469v7l1j9hK', 'lEvKK33Z21', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(147, 14, 'b6dUwNXbZ6', 'QrLSYVOFvM5tWuVLthDi', 'ASrhjlIdel', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(148, 14, 'AxAb8fGpYP', '95X5IA0e1kM1FaEctPO9', 'u8vORNVgUC', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(149, 14, 'n8mXSulGUj', 'rzKss7dXQbDG9A4oTZBp', 'ewrAqmLEh3', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(150, 14, 'pYbUxqddZg', '6zvdroqwT29XyV4zCYIN', 'LBrCyhn5QG', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(151, 14, 'zBT3rgMaEO', '0MDBPxn2xWik5bjKyNGl', '8KKBww2qJq', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(152, 14, '5UkgAzwR9h', 'mS0H2adxJixsfi9JVsKy', 'vOG3EN0o6a', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(153, 14, 'lcVUx3thzl', 'xv6C4HDulWOYMHzW8bWO', '71qrLYJDgO', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(154, 14, 'XbCcjFMPrn', 'nyOFh6fP7ERUTA8Xu12e', 'FM5c8uYZVj', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(155, 14, 'enkLx3DbEP', 'tkyZWtBYc2CaHde1FXLJ', 'TUMfINkiNy', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(156, 14, 'pPUidoP9oY', 'ZtGjfjxBCMWCJT9fhXK0', 'QfZtMDdDBj', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(157, 14, 'OA71iZk4n7', 'A1356WBZERDIt1d6GnT1', 'xnbP3GmzY8', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(158, 14, 'hwaY3sYKgA', 'mnjjrIP8vC7nxL3Gc7TG', 'XX3gnLCeLZ', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL),
(159, 14, 'cLwZNzYgV5', 'tcTZY4ll6IfpEr0tHpZO', 'uLgLiatBiY', 0, '2018-04-22 15:57:17', NULL, NULL, NULL, 1, '2018-04-22 15:57:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `module_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `path`, `user_id`, `module_id`, `created_at`, `updated_at`) VALUES
(7, '1524086958_Гроздья гнева.jpg', 1, '1', '2018-04-18 18:29:18', '2018-04-18 18:29:18'),
(8, '1524087005_Над пропастью во ржи.jpg', 1, '1', '2018-04-18 18:30:05', '2018-04-18 18:30:05'),
(9, '1524087032_Четыре сезона.jpg', 1, '1', '2018-04-18 18:30:32', '2018-04-18 18:30:32'),
(10, '1524087068_Ночная смена.jpeg', 1, '1', '2018-04-18 18:31:08', '2018-04-18 18:31:08'),
(11, '1524087101_Унесённые ветром.jpg', 1, '1', '2018-04-18 18:31:41', '2018-04-18 18:31:41'),
(12, '1524087148_Прощай,оружие!.jpg', 1, '1', '2018-04-18 18:32:28', '2018-04-18 18:32:28'),
(13, '1524087178_Анжелика-маркиза ангелов.jpg', 1, '1', '2018-04-18 18:32:58', '2018-04-18 18:32:58'),
(14, '1524087215_Путь в Версаль.jpg', 1, '1', '2018-04-18 18:33:35', '2018-04-18 18:33:35'),
(15, '1524251203_Анжелика и король.jpg', 1, '1', '2018-04-20 16:06:43', '2018-04-20 16:06:43'),
(16, '1524251293_Торквемада.jpg', 1, '1', '2018-04-20 16:08:13', '2018-04-20 16:08:13'),
(17, '1524251335_Парфюмер.jpg', 1, '1', '2018-04-20 16:08:55', '2018-04-20 16:08:55'),
(18, '1524253273_Последняя граница.jpeg', 1, '1', '2018-04-20 16:41:13', '2018-04-20 16:41:13'),
(19, '1524253304_Палая листва.jpg', 1, '1', '2018-04-20 16:41:44', '2018-04-20 16:41:44'),
(20, '1524253335_Ошибка Одинокого Бизона.JPG', 1, '1', '2018-04-20 16:42:15', '2018-04-20 16:42:15'),
(21, '1524253374_Джейн Эйр.jpg', 1, '1', '2018-04-20 16:42:54', '2018-04-20 16:42:54'),
(22, '1524253406_Старикам тут не место.jpeg', 1, '1', '2018-04-20 16:43:26', '2018-04-20 16:43:26'),
(23, '1524253450_Свой человек в Гаване.jpg', 1, '1', '2018-04-20 16:44:10', '2018-04-20 16:44:10'),
(24, '1524253473_Английский пациент.jpg', 1, '1', '2018-04-20 16:44:33', '2018-04-20 16:44:33'),
(25, '1524253496_Хижина дяди Тома.jpg', 1, '1', '2018-04-20 16:44:56', '2018-04-20 16:44:56'),
(26, '1524253525_Неукротимая Анжелика.jpg', 1, '1', '2018-04-20 16:45:25', '2018-04-20 16:45:25'),
(27, '1524253549_Особые связи.jpg', 1, '1', '2018-04-20 16:45:49', '2018-04-20 16:45:49'),
(28, '1524253578_Граф Монте-Кристо.jpg', 1, '1', '2018-04-20 16:46:18', '2018-04-20 16:46:18'),
(29, '1524253604_Гордость и  предубеждение.jpg', 1, '1', '2018-04-20 16:46:44', '2018-04-20 16:46:44'),
(30, '1524253623_Норвежский лес.jpg', 1, '1', '2018-04-20 16:47:03', '2018-04-20 16:47:03'),
(31, '1524253656_Хороший день для кенгуру.jpg', 1, '1', '2018-04-20 16:47:36', '2018-04-20 16:47:36'),
(32, '1524253681_Моя борьба.jpg', 1, '1', '2018-04-20 16:48:01', '2018-04-20 16:48:01'),
(33, '1524253700_Анжелика в мятеже.jpg', 1, '1', '2018-04-20 16:48:20', '2018-04-20 16:48:20'),
(34, '1524253965_Слушай песню ветра.jpg', 1, '1', '2018-04-20 16:52:45', '2018-04-20 16:52:45'),
(35, '1524253983_Буря столетия.jpg', 1, '1', '2018-04-20 16:53:03', '2018-04-20 16:53:03'),
(36, '1524253999_Чума.jpg', 1, '1', '2018-04-20 16:53:19', '2018-04-20 16:53:19'),
(37, '1524254024_Великий Гэтсби.jpeg', 1, '1', '2018-04-20 16:53:44', '2018-04-20 16:53:44'),
(38, '1524254049_Случайная вакансия.jpg', 1, '1', '2018-04-20 16:54:09', '2018-04-20 16:54:09'),
(41, '1524254169_Гомер Илиада.jpg', 1, '1', '2018-04-20 16:56:09', '2018-04-20 16:56:09'),
(42, '1524254188_О чём я говорю,когда говорю о беге.jpg', 1, '1', '2018-04-20 16:56:28', '2018-04-20 16:56:28'),
(43, '1524254223_По ком звонит колокол.jpg', 1, '1', '2018-04-20 16:57:03', '2018-04-20 16:57:03'),
(44, '1524254240_Последний день приговорённого к смарти.jpg', 1, '1', '2018-04-20 16:57:20', '2018-04-20 16:57:20'),
(45, '1524254260_Бегущий за ветром.jpg', 1, '1', '2018-04-20 16:57:40', '2018-04-20 16:57:40'),
(46, '1524254285_Трилогия Крысы.jpg', 1, '1', '2018-04-20 16:58:05', '2018-04-20 16:58:05'),
(47, '1524254306_Мемуары гейши.jpg', 1, '1', '2018-04-20 16:58:26', '2018-04-20 16:58:26'),
(48, '1524254328_Американская трагедия.jpg', 1, '1', '2018-04-20 16:58:48', '2018-04-20 16:58:48'),
(49, '1524254351_Цифровая крепость.jpg', 1, '1', '2018-04-20 16:59:11', '2018-04-20 16:59:11'),
(50, '1524254373_Алхимик.png', 1, '1', '2018-04-20 16:59:33', '2018-04-20 16:59:33'),
(51, '1524254394_Утраченый символ.jpg', 1, '1', '2018-04-20 16:59:54', '2018-04-20 16:59:54'),
(52, '1524254419_P.S. Я тебя люблю.jpg', 1, '1', '2018-04-20 17:00:19', '2018-04-20 17:00:19'),
(53, '1524254437_Бесцветный Цкуру и годы его странствий.jpg', 1, '1', '2018-04-20 17:00:37', '2018-04-20 17:00:37'),
(54, '1524254457_Послемрак.jpg', 1, '1', '2018-04-20 17:00:57', '2018-04-20 17:00:57'),
(55, '1524254486_Сёгун.jpg', 1, '1', '2018-04-20 17:01:26', '2018-04-20 17:01:26'),
(56, '1524254509_Cyrano de Bergerac.jpg', 1, '1', '2018-04-20 17:01:49', '2018-04-20 17:01:49'),
(57, '1524254525_La momie du Louvre.jpg', 1, '1', '2018-04-20 17:02:05', '2018-04-20 17:02:05'),
(58, '1524254552_Искусство любить.jpg', 1, '1', '2018-04-20 17:02:32', '2018-04-20 17:02:32'),
(59, '1524254571_The girl with seven names.jpg', 1, '1', '2018-04-20 17:02:51', '2018-04-20 17:02:51'),
(60, '1524254609_Сначала скажите нет.jpg', 1, '1', '2018-04-20 17:03:29', '2018-04-20 17:03:29'),
(61, '1524255070_eQWu4AYHL70.jpg', 1, '3', '2018-04-20 17:11:10', '2018-04-20 17:11:10'),
(62, '1524256073_Мой любимый спутник.jpg', 1, '1', '2018-04-20 17:27:53', '2018-04-20 17:27:53'),
(63, '1524412182_Test-Logo-Circle-black-transparent.png', 13, '3', '2018-04-22 12:49:42', '2018-04-22 12:49:42'),
(64, '1524503895_f72869_36e804f16db1439cba86a5e97a167b18_mv2_d_2397_2397_s_2.png', 20, '3', '2018-04-23 14:18:15', '2018-04-23 14:18:15'),
(65, '1524504176_9781408855898_309038.jpeg', 20, '1', '2018-04-23 14:22:56', '2018-04-23 14:22:56'),
(66, '1524504636_sorce_stone.jpg', 20, '1', '2018-04-23 14:30:36', '2018-04-23 14:30:36'),
(67, '1524504900_9781408855898_309038.jpeg', 20, '1', '2018-04-23 14:35:00', '2018-04-23 14:35:00'),
(68, '1524504901_sorce_stone.jpg', 20, '1', '2018-04-23 14:35:01', '2018-04-23 14:35:01'),
(69, '1524509437_7.jpg', 19, '3', '2018-04-23 15:50:37', '2018-04-23 15:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_id` int(11) DEFAULT NULL,
  `birthdate` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `status`, `country`, `city`, `lastname`, `user_gender`, `photo_id`, `birthdate`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hello to all world!', 'Belarus', 'Minsk', 'Narushevich', 'M', 61, '04/05/1990', '2018-03-24 16:26:15', '2018-04-20 17:11:10'),
(2, 2, NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-03-24 16:26:15', '2018-03-24 16:26:15'),
(7, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-27 14:34:00', '2018-03-27 14:34:00'),
(8, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-29 18:02:27', '2018-03-29 18:02:27'),
(11, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-04-09 16:30:48', '2018-04-09 16:54:31'),
(12, 14, NULL, NULL, NULL, NULL, NULL, 63, NULL, '2018-04-22 12:49:02', '2018-04-22 12:49:42'),
(16, 19, 'Hello world!', NULL, NULL, NULL, 'M', 69, NULL, '2018-04-23 13:20:53', '2018-04-23 15:50:37'),
(17, 20, NULL, NULL, NULL, NULL, NULL, 64, NULL, '2018-04-23 14:06:55', '2018-04-23 14:18:15'),
(18, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-04-29 08:46:02', '2018-04-29 08:46:02');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating_value` int(11) DEFAULT NULL,
  `module_number` int(11) DEFAULT NULL,
  `item_number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `rating_value`, `module_number`, `item_number`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 80, '2018-04-14 19:21:20', '2018-04-14 19:21:20'),
(2, 1, 5, 1, 69, '2018-04-14 20:12:24', '2018-04-14 20:12:24'),
(3, 1, 4, 1, 24, '2018-04-23 04:34:35', '2018-04-23 04:34:35'),
(6, 14, 5, 1, 52, '2018-04-23 11:24:34', '2018-04-23 11:24:34'),
(7, 20, 4, 1, 193, '2018-04-23 14:14:19', '2018-04-23 14:14:19'),
(8, 20, 2, 1, 53, '2018-04-23 14:16:56', '2018-04-23 14:16:56'),
(9, 20, 5, 1, 466, '2018-04-23 14:23:48', '2018-04-23 14:23:48'),
(10, 19, 5, 1, 466, '2018-04-23 14:56:57', '2018-04-23 14:56:57'),
(11, 1, 4, 1, 466, '2018-04-28 11:44:43', '2018-04-28 11:44:43'),
(12, 14, 4, 1, 49, '2018-07-27 05:36:55', '2018-07-27 05:36:55'),
(14, 1, 4, 1, 52, '2018-11-16 07:02:27', '2018-11-16 07:02:27'),
(15, 1, 2, 1, 7, '2019-02-12 11:12:36', '2019-02-12 11:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', '2018-03-24 19:28:32', '2018-03-24 19:28:32'),
(2, 'Admin', '2018-03-24 19:28:32', '2018-03-24 19:28:32'),
(3, 'User', '2018-03-24 19:28:45', '2018-03-24 19:28:45'),
(4, 'Test', '2018-04-03 20:16:23', '2018-04-03 20:16:23');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `book_list` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_list_quantity` int(11) DEFAULT NULL,
  `movie_list` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `movie_list_quantity` int(11) DEFAULT NULL,
  `event_list` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_list_quantity` int(11) DEFAULT NULL,
  `show_tutorial` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_plan` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `user_id`, `book_list`, `book_list_quantity`, `movie_list`, `movie_list_quantity`, `event_list`, `event_list_quantity`, `show_tutorial`, `subscription_plan`, `created_at`, `updated_at`) VALUES
(1, 1, 'detail', 20, 'normal', 10, NULL, NULL, 'yes', 'basic', '2018-03-13 16:46:53', '2018-04-28 11:44:02'),
(2, 8, 'normal', 10, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-27 16:46:35', '2018-03-27 16:46:35'),
(3, 8, 'normal', 10, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-27 16:46:35', '2018-03-27 16:46:35'),
(4, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'free', '2018-04-09 16:14:06', '2018-04-09 16:19:33'),
(5, 11, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'free', '2018-04-09 16:27:56', '2018-04-09 16:28:02'),
(6, 12, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'free', '2018-04-09 16:30:48', '2018-04-09 17:13:42'),
(7, 14, 'detail', 10, NULL, NULL, NULL, NULL, NULL, 'basic', '2018-04-22 12:49:02', '2018-07-27 05:35:53'),
(11, 19, 'detail', 10, NULL, NULL, NULL, NULL, 'no', 'Free', '2018-04-23 13:20:53', '2018-04-23 15:51:57'),
(12, 20, 'normal', 10, NULL, NULL, NULL, NULL, 'yes', 'Free', '2018-04-23 14:06:55', '2018-04-23 14:16:26'),
(13, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Free', '2018-04-24 06:24:57', '2018-04-24 06:24:57'),
(14, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Free', '2018-04-29 08:46:02', '2018-04-29 08:46:02'),
(15, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-16 06:49:44', '2018-11-16 06:49:44'),
(16, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-16 06:49:45', '2018-11-16 06:49:45'),
(17, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-16 06:49:47', '2018-11-16 06:49:47'),
(18, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-16 06:49:47', '2018-11-16 06:49:47'),
(19, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-16 06:49:48', '2018-11-16 06:49:48'),
(20, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-16 06:49:48', '2018-11-16 06:49:48'),
(21, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-16 06:49:50', '2018-11-16 06:49:50'),
(22, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-16 06:49:51', '2018-11-16 06:49:51'),
(23, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-16 06:49:52', '2018-11-16 06:49:52'),
(24, 1, NULL, NULL, 'normal', 10, NULL, NULL, NULL, NULL, '2018-11-16 06:55:16', '2018-11-16 06:55:16'),
(25, 1, NULL, NULL, 'normal', 10, NULL, NULL, NULL, NULL, '2018-11-16 06:55:17', '2018-11-16 06:55:17'),
(26, 1, NULL, NULL, 'normal', 10, NULL, NULL, NULL, NULL, '2018-11-16 06:55:20', '2018-11-16 06:55:20'),
(27, 1, NULL, NULL, 'normal', 10, NULL, NULL, NULL, NULL, '2018-11-16 06:55:20', '2018-11-16 06:55:20'),
(28, 1, NULL, NULL, 'normal', 10, NULL, NULL, NULL, NULL, '2018-11-16 06:55:24', '2018-11-16 06:55:24'),
(29, 1, NULL, NULL, 'normal', 10, NULL, NULL, NULL, NULL, '2018-11-16 06:55:24', '2018-11-16 06:55:24'),
(30, 1, NULL, NULL, 'normal', 10, NULL, NULL, NULL, NULL, '2018-11-16 06:55:26', '2018-11-16 06:55:26'),
(31, 1, NULL, NULL, 'detail', 10, NULL, NULL, NULL, NULL, '2018-11-16 06:55:33', '2018-11-16 06:55:33'),
(32, 1, NULL, NULL, 'detail', 10, NULL, NULL, NULL, NULL, '2018-11-16 06:55:49', '2018-11-16 06:55:49'),
(33, 1, 'normal', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-16 06:56:10', '2018-11-16 06:56:10'),
(34, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-16 06:56:11', '2018-11-16 06:56:11'),
(35, 1, NULL, NULL, 'detail', 10, NULL, NULL, NULL, NULL, '2018-11-16 06:56:21', '2018-11-16 06:56:21'),
(36, 1, NULL, NULL, 'detail', 10, NULL, NULL, NULL, NULL, '2018-11-16 06:58:04', '2018-11-16 06:58:04'),
(37, 1, NULL, NULL, 'detail', 10, NULL, NULL, NULL, NULL, '2018-11-16 06:59:35', '2018-11-16 06:59:35'),
(38, 1, NULL, NULL, 'normal', 10, NULL, NULL, NULL, NULL, '2018-11-16 06:59:39', '2018-11-16 06:59:39'),
(39, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-16 07:00:10', '2018-11-16 07:00:10'),
(40, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-16 07:00:11', '2018-11-16 07:00:11'),
(41, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-16 07:00:12', '2018-11-16 07:00:12'),
(42, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-16 07:00:13', '2018-11-16 07:00:13'),
(43, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-16 07:00:15', '2018-11-16 07:00:15'),
(44, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-16 07:00:16', '2018-11-16 07:00:16'),
(45, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-16 07:00:19', '2018-11-16 07:00:19'),
(46, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-16 07:00:20', '2018-11-16 07:00:20'),
(47, 1, 'normal', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-16 07:00:24', '2018-11-16 07:00:24'),
(48, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-16 07:00:27', '2018-11-16 07:00:27'),
(49, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-16 07:02:40', '2018-11-16 07:02:40'),
(50, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-16 07:02:41', '2018-11-16 07:02:41'),
(51, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-16 07:02:41', '2018-11-16 07:02:41'),
(52, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-16 07:02:42', '2018-11-16 07:02:42'),
(53, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:09:27', '2019-02-12 11:09:27'),
(54, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:09:28', '2019-02-12 11:09:28'),
(55, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:09:29', '2019-02-12 11:09:29'),
(56, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:09:30', '2019-02-12 11:09:30'),
(57, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:09:31', '2019-02-12 11:09:31'),
(58, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:09:44', '2019-02-12 11:09:44'),
(59, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:09:45', '2019-02-12 11:09:45'),
(60, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:00', '2019-02-12 11:10:00'),
(61, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:03', '2019-02-12 11:10:03'),
(62, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:04', '2019-02-12 11:10:04'),
(63, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:04', '2019-02-12 11:10:04'),
(64, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:05', '2019-02-12 11:10:05'),
(65, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:07', '2019-02-12 11:10:07'),
(66, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:07', '2019-02-12 11:10:07'),
(67, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:07', '2019-02-12 11:10:07'),
(68, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:08', '2019-02-12 11:10:08'),
(69, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:14', '2019-02-12 11:10:14'),
(70, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:28', '2019-02-12 11:10:28'),
(71, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:28', '2019-02-12 11:10:28'),
(72, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:29', '2019-02-12 11:10:29'),
(73, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:29', '2019-02-12 11:10:29'),
(74, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:29', '2019-02-12 11:10:29'),
(75, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:30', '2019-02-12 11:10:30'),
(76, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:30', '2019-02-12 11:10:30'),
(77, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:30', '2019-02-12 11:10:30'),
(78, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:32', '2019-02-12 11:10:32'),
(79, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:33', '2019-02-12 11:10:33'),
(80, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:34', '2019-02-12 11:10:34'),
(81, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:36', '2019-02-12 11:10:36'),
(82, 1, 'detail', 10, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:41', '2019-02-12 11:10:41'),
(83, 1, 'detail', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:42', '2019-02-12 11:10:42'),
(84, 1, 'detail', 10, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:43', '2019-02-12 11:10:43'),
(85, 1, 'detail', 10, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:46', '2019-02-12 11:10:46'),
(86, 1, 'detail', 50, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:51', '2019-02-12 11:10:51'),
(87, 1, 'detail', 50, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:10:59', '2019-02-12 11:10:59'),
(88, 1, 'detail', 10, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:11:04', '2019-02-12 11:11:04'),
(89, 1, 'normal', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:11:12', '2019-02-12 11:11:12'),
(90, 1, 'normal', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-12 11:11:21', '2019-02-12 11:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `name`, `stripe_id`, `stripe_plan`, `quantity`, `trial_ends_at`, `ends_at`, `created_at`, `updated_at`) VALUES
(12, 1, 'main', 'sub_Cc9rKVMshrxgeH', 'basic', 1, '2018-05-03 17:15:45', NULL, '2018-04-03 17:15:48', '2018-04-18 03:54:39'),
(13, 13, 'main', 'sub_CjCvvcITCsoU4x', 'basic', 1, '2018-05-22 12:54:01', NULL, '2018-04-22 12:54:03', '2018-04-22 12:54:37'),
(15, 14, 'main', 'sub_DJ3XPEvwWS78nP', 'basic', 1, '2018-08-26 05:35:30', NULL, '2018-07-27 05:35:32', '2018-07-27 05:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '3',
  `is_active` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `is_active`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`) VALUES
(1, 'Maksim', 'narushevich.maksim@gmail.com', '$2y$10$eSqZuyHYgiymyikIblDKW.HM3Rfa4iTbOqQQh9EBwAV3WrxNQc/b.', 1, 1, '18zuXKGnKmmt9kiZWOxHToZuvZoFYRXdtZsPTxg675igoEYOF31sP9WpDwzE', '2018-03-13 13:13:25', '2018-04-03 13:40:58', 'cus_Cc9I0V5pyc8KZs', NULL, NULL, NULL),
(2, 'Anna', 'anna@gmail.com', '$2y$10$CAyOaHNhEG3pg6MnovO6RORUC9DP3xFtPozdE.o0crfGVKkOk315C', 3, 1, 'xeRZsyOS874tF8odJLKEdNdbxGquMAMSU5jsItL7E2eyUq7hSX52fiSgP3nv', '2018-03-24 12:43:27', '2018-03-24 12:43:27', 'cus_C8UfzsMgzMlnoI', NULL, NULL, NULL),
(8, 'Dima', 'dima@gmail.com', '$2y$10$xBQQDQwzWiu/u9yO7NUZi.5oWvKNPedZdPORq1cqGQTmkSQt9WRDW', 3, 1, NULL, '2018-03-27 11:34:00', '2018-03-27 11:34:00', 'cus_CZUfndGJ87w3Xb', NULL, NULL, NULL),
(9, 'katya', 'katya@gmail.com', '$2y$10$Buw7qfvTqZJrxvzcC9mEo.lzrNgzKNTCoIqwqCV..QltNWAKrWeRu', 3, 1, '8PDA2jEBBQiSg4DNhPxOMOXFWH6S3YyMzQoYkTZzyu98fIseJDnyxBJlSKOg', '2018-03-29 15:02:27', '2018-03-29 15:02:27', 'cus_CjCujPfkF0D3CK', NULL, NULL, NULL),
(12, 'Lena', 'lena@gmail.com', '$2y$10$CicEhWy6vqqlqJBHaNIO7.rakrxIzfinV8Rebc7xh8KxxtVf7Hlim', 3, 1, NULL, '2018-04-09 13:30:48', '2018-04-09 13:30:48', '\r\ncus_CjCvJdFSE1YsgS', NULL, NULL, NULL),
(14, 'Test', 'test@gmail.com', '$2y$10$DYdAa17t/mUZe9BFcMbDUOiUWVhOjqNvtuCj89XNjCWKYZ3gpt8Rm', 4, 1, '0mEhgU990Ek4o5O85AI9cCYBNZNcVOwwAUviJ7AnmKKZyCap3muYVLl0ninh', '2018-04-22 12:49:02', '2018-04-22 12:49:02', 'cus_CjCpJKYg6TmQa9', NULL, NULL, NULL),
(19, 'Antony', 'discoveringworld90@gmail.com', '$2y$10$ZxgFuVBEYhHPU8rM.QQiteltmWqJpqUxpOTSdJPN3hBFsqvYXq3kC', 3, 1, 'mbpoC3z6WByBWhLqGAm2HD93EblgQJ88Kclrcf6pUrNgyemfy2dhXk2TELmN', '2018-04-23 13:20:53', '2018-04-23 15:51:01', NULL, NULL, NULL, NULL),
(20, 'MSMINK NUSARA', 'msminnk@gmail.com', '$2y$10$ILmLLx6iNXLIdmMJVJ75/OWntL8r65aJmvNiJcjrHxZZw5Bu1i68q', 3, 1, '59ug1Bn5mNd6MPkVvjf6SaEpadGkGahDJrATjVuGMwNkAY9wm2FT3FNDgxl3', '2018-04-23 14:06:53', '2018-04-23 14:06:53', NULL, NULL, NULL, NULL),
(21, 'test@test.com', 'test@test.com', '$2y$10$tAMQ473H5/glkjkW0Oe7VuM22nkIm849HwF8TPGgS8C1.SNQK1SSu', 3, 1, NULL, '2018-04-29 08:46:02', '2018-04-29 08:46:02', 'cus_CjCpJKYg6TmQa9', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_books`
--
ALTER TABLE `image_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_events`
--
ALTER TABLE `image_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_movies`
--
ALTER TABLE `image_movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=467;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `image_books`
--
ALTER TABLE `image_books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `image_movies`
--
ALTER TABLE `image_movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
