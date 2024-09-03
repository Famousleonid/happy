-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Сен 03 2024 г., 03:53
-- Версия сервера: 8.0.20
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `happy`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Earring', '2024-08-30 04:51:10', '2024-08-30 04:51:10'),
(2, 'Brooch', '2024-08-30 04:53:50', '2024-08-30 04:53:50'),
(3, 'Bags (purs)', '2024-08-30 04:54:10', '2024-08-30 04:54:10'),
(4, 'Vintage', '2024-08-30 04:54:40', '2024-08-30 04:54:40'),
(5, 'Dishes', '2024-08-30 04:55:01', '2024-08-30 04:55:01'),
(6, 'Other', '2024-08-30 04:55:11', '2024-08-30 04:55:11');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `media`
--

INSERT INTO `media` (`id`, `uuid`, `model_type`, `model_id`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(2, '5b413836-89af-45af-9b42-7331ff7e2279', 'App\\Models\\Product', 6, 'photos', '5-10-15', '5-10-15.jpg', 'image/jpeg', 'public', 'public', 69264, '[]', '[]', '{\"thumb\": true}', '[]', 1, '2024-09-02 02:58:19', '2024-09-02 02:58:19'),
(3, '8a24d303-7fe0-4c0a-8c23-6eb228290a6b', 'App\\Models\\Product', 7, 'photos', 'dom', 'dom.jpg', 'image/jpeg', 'public', 'public', 113962, '[]', '[]', '{\"thumb\": true}', '[]', 1, '2024-09-02 03:03:34', '2024-09-02 03:03:34'),
(7, '9c4d9e19-19ad-47c0-a7e3-feea9521950d', 'App\\Models\\Product', 11, 'photos', 'x192', 'x192.jpg', 'image/jpeg', 'public', 'public', 16423, '[]', '[]', '{\"thumb\": true}', '[]', 1, '2024-09-02 03:30:24', '2024-09-02 03:30:24'),
(14, '9a667414-bdd6-4fc2-a3b0-2760220199c1', 'App\\Models\\Product', 15, 'photos', 'renovation', 'renovation.webp', 'image/webp', 'public', 'public', 427430, '[]', '[]', '{\"thumb\": true}', '[]', 1, '2024-09-02 03:32:42', '2024-09-02 03:32:42'),
(15, '1a2f8288-6827-4b79-8c4e-f47b1d079774', 'App\\Models\\Product', 15, 'photos', 'rybalka-objavlenie-pesochnica-udalyonnoe-2130010', 'rybalka-objavlenie-pesochnica-udalyonnoe-2130010.jpg', 'image/jpeg', 'public', 'public', 73794, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2024-09-02 03:32:42', '2024-09-02 03:32:42'),
(16, '2e5c6b2a-ef8a-4a26-ba6e-55ef8a883661', 'App\\Models\\Product', 15, 'photos', 'x192', 'x192.jpg', 'image/jpeg', 'public', 'public', 16423, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2024-09-02 03:32:43', '2024-09-02 03:32:43'),
(17, 'e3b07b0c-6c04-4d65-8540-f594cf1ce422', 'App\\Models\\Product', 15, 'photos', 'асенизатор', 'асенизатор.jpg', 'image/jpeg', 'public', 'public', 23468, '[]', '[]', '{\"thumb\": true}', '[]', 4, '2024-09-02 03:32:43', '2024-09-02 03:32:43'),
(30, '10b82f0b-fe5c-4cc3-8550-cef683ce72f8', 'App\\Models\\Product', 22, 'photos', 'photoapp', 'photoapp.png', 'image/png', 'public', 'public', 5362, '[]', '[]', '{\"thumb\": true}', '[]', 1, '2024-09-02 04:35:20', '2024-09-02 04:35:20'),
(34, '759e9f6a-6354-4dad-8cc7-36ec9684323f', 'App\\Models\\Product', 24, 'photos', 'ее', 'ее.jpg', 'image/jpeg', 'public', 'public', 28473, '[]', '[]', '{\"thumb\": true}', '[]', 1, '2024-09-02 20:07:43', '2024-09-02 20:07:43'),
(35, '89b80997-e250-44bd-a045-12979deebe5c', 'App\\Models\\Product', 24, 'photos', 'зага', 'зага.jpg', 'image/jpeg', 'public', 'public', 33456, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2024-09-02 20:07:44', '2024-09-02 20:07:44'),
(36, '08ce54c9-c3e7-4bc6-acfc-a639da6376cf', 'App\\Models\\Product', 24, 'photos', 'зарплата', 'зарплата.jpg', 'image/jpeg', 'public', 'public', 48310, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2024-09-02 20:07:44', '2024-09-02 20:07:44'),
(37, '3795452b-9589-40d9-aba9-d43516bd1a52', 'App\\Models\\Product', 24, 'photos', 'ипотека', 'ипотека.jpg', 'image/jpeg', 'public', 'public', 35788, '[]', '[]', '{\"thumb\": true}', '[]', 4, '2024-09-02 20:07:44', '2024-09-02 20:07:44'),
(38, '6d420648-9404-410f-a43b-e0a2e17cb030', 'App\\Models\\Product', 24, 'photos', 'испанский мат', 'испанский-мат.jpg', 'image/jpeg', 'public', 'public', 85453, '[]', '[]', '{\"thumb\": true}', '[]', 5, '2024-09-02 20:07:44', '2024-09-02 20:07:45'),
(39, 'd3276aaa-72fa-4d31-ba2e-e1848bc97bc1', 'App\\Models\\Product', 24, 'photos', 'как', 'как.jpg', 'image/jpeg', 'public', 'public', 24000, '[]', '[]', '{\"thumb\": true}', '[]', 6, '2024-09-02 20:07:45', '2024-09-02 20:07:45'),
(40, '9258e300-22fb-4a70-96ea-b17da8a23aa9', 'App\\Models\\Product', 24, 'photos', 'кал', 'кал.jpg', 'image/jpeg', 'public', 'public', 77641, '[]', '[]', '{\"thumb\": true}', '[]', 7, '2024-09-02 20:07:45', '2024-09-02 20:07:45'),
(41, 'de0913c2-1c08-4375-9cb7-40fe2db0da65', 'App\\Models\\Product', 24, 'photos', 'канада', 'канада.jpg', 'image/jpeg', 'public', 'public', 62347, '[]', '[]', '{\"thumb\": true}', '[]', 8, '2024-09-02 20:07:45', '2024-09-02 20:07:46'),
(42, '4bd8a39c-647f-4eb5-af50-c76e7a2cb74f', 'App\\Models\\Product', 24, 'photos', 'кухня', 'кухня.jpg', 'image/jpeg', 'public', 'public', 50134, '[]', '[]', '{\"thumb\": true}', '[]', 9, '2024-09-02 20:07:46', '2024-09-02 20:07:46'),
(43, 'fc440464-9754-4c88-8b22-08111a3d7ee5', 'App\\Models\\Product', 24, 'photos', 'лиса', 'лиса.jpg', 'image/jpeg', 'public', 'public', 58237, '[]', '[]', '{\"thumb\": true}', '[]', 10, '2024-09-02 20:07:46', '2024-09-02 20:07:46'),
(44, 'c8551e8c-20f6-4eec-9e66-9573fcd9f5ff', 'App\\Models\\Product', 24, 'photos', 'лсд', 'лсд.jpg', 'image/jpeg', 'public', 'public', 16036, '[]', '[]', '{\"thumb\": true}', '[]', 11, '2024-09-02 20:07:46', '2024-09-02 20:07:46'),
(45, '0d85af49-b5ff-4d5e-8935-b9a11f2f283e', 'App\\Models\\Product', 24, 'photos', 'мороженко', 'мороженко.jpg', 'image/jpeg', 'public', 'public', 50605, '[]', '[]', '{\"thumb\": true}', '[]', 12, '2024-09-02 20:07:46', '2024-09-02 20:07:46'),
(50, '3ed84694-be76-432a-864c-419d19d358f6', 'App\\Models\\Product', 27, 'photos', '2', '2.jpg', 'image/jpeg', 'public', 'public', 25404, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2024-09-02 20:37:34', '2024-09-02 20:37:34'),
(51, '2dd6755d-ebb2-4c46-8858-70692bd1bca6', 'App\\Models\\Product', 27, 'photos', '3', '3.jpg', 'image/jpeg', 'public', 'public', 9974, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2024-09-02 20:37:34', '2024-09-02 20:37:34'),
(52, 'ea6d9334-4dcd-408a-be08-d2e5c951481f', 'App\\Models\\Product', 27, 'photos', '4', '4.jpg', 'image/jpeg', 'public', 'public', 10980, '[]', '[]', '{\"thumb\": true}', '[]', 4, '2024-09-02 20:37:35', '2024-09-02 20:37:35'),
(53, 'bd58822a-9f88-4b99-a8c0-d79f93ce208d', 'App\\Models\\Product', 27, 'photos', '5', '5.jpg', 'image/jpeg', 'public', 'public', 9879, '[]', '[]', '{\"thumb\": true}', '[]', 5, '2024-09-02 20:37:35', '2024-09-02 20:37:35'),
(54, '9bb3ca12-806d-4bb6-95b0-72cdb32a06ba', 'App\\Models\\Product', 27, 'photos', '7', '7.jpg', 'image/jpeg', 'public', 'public', 83418, '[]', '[]', '{\"thumb\": true}', '[]', 6, '2024-09-02 20:37:35', '2024-09-02 20:37:35'),
(56, '67f254a4-d261-4464-86af-c785f1955ce8', 'App\\Models\\Product', 28, 'photos', '7881.750x0', '7881.750x0.jpg', 'image/jpeg', 'public', 'public', 69391, '[]', '[]', '{\"thumb\": true}', '[]', 1, '2024-09-02 22:32:32', '2024-09-02 22:32:32'),
(57, '1d1f2090-a3f8-44ba-9ab0-bda54338dc90', 'App\\Models\\Product', 28, 'photos', '116216_original', '116216_original.jpg', 'image/jpeg', 'public', 'public', 217961, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2024-09-02 22:32:32', '2024-09-02 22:32:32'),
(58, 'f1718619-11ea-40ac-a7ac-570cac31a5f9', 'App\\Models\\Product', 28, 'photos', 'buzuteria-1', 'buzuteria-1.jpg', 'image/jpeg', 'public', 'public', 607216, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2024-09-02 22:32:32', '2024-09-02 22:32:33'),
(59, 'b80bdb52-17e0-4ab1-a62a-f1dc5ca68a28', 'App\\Models\\Product', 28, 'photos', 'da2f68cb7023b26d2d84183d09d966fc', 'da2f68cb7023b26d2d84183d09d966fc.png', 'image/png', 'public', 'public', 759494, '[]', '[]', '{\"thumb\": true}', '[]', 4, '2024-09-02 22:32:33', '2024-09-02 22:32:33'),
(60, '949b2f08-2f01-4c9a-94aa-b07e4ad972ed', 'App\\Models\\Product', 28, 'photos', 'fonstola.ru_157167', 'fonstola.ru_157167.jpg', 'image/jpeg', 'public', 'public', 2174742, '[]', '[]', '{\"thumb\": true}', '[]', 5, '2024-09-02 22:32:33', '2024-09-02 22:32:34'),
(61, '622fbf3e-c25d-4c5e-86d3-cc27e2de64c8', 'App\\Models\\Product', 28, 'photos', 'gold1-1-24cb4c57', 'gold1-1-24cb4c57.jpeg', 'image/jpeg', 'public', 'public', 81766, '[]', '[]', '{\"thumb\": true}', '[]', 6, '2024-09-02 22:32:34', '2024-09-02 22:32:34'),
(62, '2580bb03-34b3-4b6c-8678-6c9ffd889d20', 'App\\Models\\Product', 28, 'photos', 'Gold-Jewellery-Transparent-Background-PNG', 'Gold-Jewellery-Transparent-Background-PNG.png', 'image/png', 'public', 'public', 918576, '[]', '[]', '{\"thumb\": true}', '[]', 7, '2024-09-02 22:32:34', '2024-09-02 22:32:34'),
(63, 'fa1fa112-8665-4ca8-b1d8-c70d0d76187b', 'App\\Models\\Product', 29, 'photos', 'Jewellery-Ring-PNG-Picture', 'Jewellery-Ring-PNG-Picture.png', 'image/png', 'public', 'public', 1543793, '[]', '[]', '{\"thumb\": true}', '[]', 1, '2024-09-02 22:41:28', '2024-09-02 22:41:29'),
(64, 'a1321821-534b-4461-b2d0-44aa4cf7ef88', 'App\\Models\\Product', 29, 'photos', 'lombard-brendovyh-ukrashenii-', 'lombard-brendovyh-ukrashenii-.jpg', 'image/jpeg', 'public', 'public', 204800, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2024-09-02 22:41:29', '2024-09-02 22:41:29'),
(65, '4ae3838d-dc95-4586-80ac-72b6782cd18a', 'App\\Models\\Product', 29, 'photos', 'maxresdefault', 'maxresdefault.jpg', 'image/jpeg', 'public', 'public', 191411, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2024-09-02 22:41:29', '2024-09-02 22:41:29'),
(66, 'd89ce2ff-c050-4aca-b5ff-f91dc5fd4731', 'App\\Models\\Product', 29, 'photos', 'pi7rbX8yT', 'pi7rbX8yT.jpg', 'image/jpeg', 'public', 'public', 399609, '[]', '[]', '{\"thumb\": true}', '[]', 4, '2024-09-02 22:41:29', '2024-09-02 22:41:30'),
(67, '1f611f4f-fdaf-43a3-8ae8-7646efe01d8d', 'App\\Models\\Product', 29, 'photos', 'png-clipart-ruby-pendant-bijou-bead', 'png-clipart-ruby-pendant-bijou-bead.png', 'image/png', 'public', 'public', 280925, '[]', '[]', '{\"thumb\": true}', '[]', 5, '2024-09-02 22:41:30', '2024-09-02 22:41:30'),
(68, '48cada9b-a07a-40ad-9a4d-eed1f6d9472c', 'App\\Models\\Product', 29, 'photos', 'ruby4', 'ruby4.jpg', 'image/jpeg', 'public', 'public', 407727, '[]', '[]', '{\"thumb\": true}', '[]', 6, '2024-09-02 22:41:31', '2024-09-02 22:41:31'),
(69, 'f3e97dc9-5499-477b-917e-841a1135a50a', 'App\\Models\\Product', 30, 'photos', 'i (6)', 'i-(6).webp', 'image/webp', 'public', 'public', 434074, '[]', '[]', '{\"thumb\": true}', '[]', 1, '2024-09-03 02:06:54', '2024-09-03 02:06:54'),
(70, '83107f68-e8b8-4e8a-a61a-15f5340d25e0', 'App\\Models\\Product', 30, 'photos', 'i (7)', 'i-(7).webp', 'image/webp', 'public', 'public', 16284, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2024-09-03 02:06:54', '2024-09-03 02:06:54'),
(71, 'c1ce39f1-7c2e-414f-bfe4-788cfafe1f6f', 'App\\Models\\Product', 30, 'photos', 'i (8)', 'i-(8).webp', 'image/webp', 'public', 'public', 44944, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2024-09-03 02:06:55', '2024-09-03 02:06:55'),
(72, '85340915-15e2-43dc-a6ef-0c3fa0d483d4', 'App\\Models\\Product', 30, 'photos', 'i', 'i.webp', 'image/webp', 'public', 'public', 151544, '[]', '[]', '{\"thumb\": true}', '[]', 4, '2024-09-03 02:06:55', '2024-09-03 02:06:55'),
(73, '1f46ba0b-8fac-4beb-aa85-51e7e71bdadf', 'App\\Models\\Product', 30, 'photos', 'Jewellery-Ring-PNG-Picture', 'Jewellery-Ring-PNG-Picture.png', 'image/png', 'public', 'public', 1543793, '[]', '[]', '{\"thumb\": true}', '[]', 5, '2024-09-03 02:06:55', '2024-09-03 02:06:55'),
(74, 'c8c61c0f-2e80-4d0a-a2f2-5e18ddeb0886', 'App\\Models\\Product', 30, 'photos', 'lombard-brendovyh-ukrashenii-', 'lombard-brendovyh-ukrashenii-.jpg', 'image/jpeg', 'public', 'public', 204800, '[]', '[]', '{\"thumb\": true}', '[]', 6, '2024-09-03 02:06:56', '2024-09-03 02:06:56'),
(75, '85f556dd-0fc3-4dc1-bb8a-22cbc5859ad9', 'App\\Models\\Product', 31, 'photos', 'fonstola.ru_157167', 'fonstola.ru_157167.jpg', 'image/jpeg', 'public', 'public', 2174742, '[]', '[]', '{\"thumb\": true}', '[]', 1, '2024-09-03 02:08:53', '2024-09-03 02:08:54'),
(76, '6293b711-ca5e-4b6b-94cf-ecc3d1eab7fa', 'App\\Models\\Product', 31, 'photos', 'gold1-1-24cb4c57', 'gold1-1-24cb4c57.jpeg', 'image/jpeg', 'public', 'public', 81766, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2024-09-03 02:08:54', '2024-09-03 02:08:54'),
(77, 'ba7ac024-688d-4710-9f51-c876f91ec908', 'App\\Models\\Product', 31, 'photos', 'Gold-Jewellery-Transparent-Background-PNG', 'Gold-Jewellery-Transparent-Background-PNG.png', 'image/png', 'public', 'public', 918576, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2024-09-03 02:08:54', '2024-09-03 02:08:54'),
(78, '375c25dd-1c36-4632-b36b-4c55c0bfdeef', 'App\\Models\\Product', 31, 'photos', 'i (1)', 'i-(1).webp', 'image/webp', 'public', 'public', 105226, '[]', '[]', '{\"thumb\": true}', '[]', 4, '2024-09-03 02:08:54', '2024-09-03 02:08:54'),
(79, '8cfc326e-63c6-4f0e-bd5d-cee8aa136de4', 'App\\Models\\Product', 32, 'photos', '5ddc79682c9fb6600a6eec6e64f8a5e5', '5ddc79682c9fb6600a6eec6e64f8a5e5.jpg', 'image/jpeg', 'public', 'public', 119570, '[]', '[]', '{\"thumb\": true}', '[]', 1, '2024-09-03 02:09:21', '2024-09-03 02:09:21'),
(80, '2216df21-2b8a-4a1b-a922-9c5798756958', 'App\\Models\\Product', 32, 'photos', 'fonstola.ru_157167', 'fonstola.ru_157167.jpg', 'image/jpeg', 'public', 'public', 2174742, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2024-09-03 02:09:21', '2024-09-03 02:09:22'),
(81, 'b1460d63-2421-4696-bb19-4ff397fdaeb6', 'App\\Models\\Product', 32, 'photos', 'i (8)', 'i-(8).webp', 'image/webp', 'public', 'public', 44944, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2024-09-03 02:09:22', '2024-09-03 02:09:22'),
(82, '2dd65995-1c13-4a67-8dda-ac632fa330dd', 'App\\Models\\Product', 33, 'photos', '0c2dce2da8eb54a3258766aaf84a5df6', '0c2dce2da8eb54a3258766aaf84a5df6.png', 'image/png', 'public', 'public', 1054907, '[]', '[]', '{\"thumb\": true}', '[]', 1, '2024-09-03 02:09:56', '2024-09-03 02:09:56'),
(83, '7ed11a7d-05c9-4726-b72e-106beb2bbdbb', 'App\\Models\\Product', 33, 'photos', '1', '1.jpg', 'image/jpeg', 'public', 'public', 8626, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2024-09-03 02:09:56', '2024-09-03 02:09:56'),
(84, '60e2bbf8-310a-4caf-b9d9-6cae1aebb977', 'App\\Models\\Product', 33, 'photos', '1kai02jvkcit2v3n1sedsxxw2ftx70ry', '1kai02jvkcit2v3n1sedsxxw2ftx70ry.jpg', 'image/jpeg', 'public', 'public', 322538, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2024-09-03 02:09:56', '2024-09-03 02:09:57'),
(85, 'dc46934b-7032-48db-bce1-8838ecf71f88', 'App\\Models\\Product', 34, 'photos', '837a0711fe502c8721d148cd35e169ef', '837a0711fe502c8721d148cd35e169ef.png', 'image/png', 'public', 'public', 1601248, '[]', '[]', '{\"thumb\": true}', '[]', 1, '2024-09-03 02:12:05', '2024-09-03 02:12:06'),
(86, 'e37e94ee-9d09-41d6-afbe-62c35606d51f', 'App\\Models\\Product', 34, 'photos', '7881.750x0', '7881.750x0.jpg', 'image/jpeg', 'public', 'public', 69391, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2024-09-03 02:12:06', '2024-09-03 02:12:06'),
(87, 'a88db12a-52d5-40e3-8522-7a61142426b1', 'App\\Models\\Product', 34, 'photos', '116216_original', '116216_original.jpg', 'image/jpeg', 'public', 'public', 217961, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2024-09-03 02:12:06', '2024-09-03 02:12:07'),
(88, 'c0667d07-b7fd-42b3-9d32-29a30ce6d87c', 'App\\Models\\Product', 34, 'photos', 'buzuteria-1', 'buzuteria-1.jpg', 'image/jpeg', 'public', 'public', 607216, '[]', '[]', '{\"thumb\": true}', '[]', 4, '2024-09-03 02:12:07', '2024-09-03 02:12:07'),
(89, '56929e4a-de99-4755-983f-e2122c5bf943', 'App\\Models\\Product', 35, 'photos', 'i (8)', 'i-(8).webp', 'image/webp', 'public', 'public', 44944, '[]', '[]', '{\"thumb\": true}', '[]', 1, '2024-09-03 02:31:07', '2024-09-03 02:31:07'),
(90, '546a5604-9774-4869-8b9e-174bac94d661', 'App\\Models\\Product', 36, 'photos', '837a0711fe502c8721d148cd35e169ef', '837a0711fe502c8721d148cd35e169ef.png', 'image/png', 'public', 'public', 1601248, '[]', '[]', '{\"thumb\": true}', '[]', 1, '2024-09-03 02:57:20', '2024-09-03 02:57:21'),
(91, 'fb7b03f4-b163-41a5-a8ef-4ee3e0bf990e', 'App\\Models\\Product', 36, 'photos', 'i (5)', 'i-(5).webp', 'image/webp', 'public', 'public', 67698, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2024-09-03 02:57:21', '2024-09-03 02:57:21'),
(92, 'b3872e6b-4115-409e-ac6e-74a1bb26d858', 'App\\Models\\Product', 36, 'photos', 'png-clipart-ruby-pendant-bijou-bead', 'png-clipart-ruby-pendant-bijou-bead.png', 'image/png', 'public', 'public', 280925, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2024-09-03 02:57:21', '2024-09-03 02:57:21'),
(93, '21fa9cf2-ebde-4e12-a1ea-fc70b06f8d4b', 'App\\Models\\Product', 20, 'photos', 'i (1)', 'i-(1).webp', 'image/webp', 'public', 'public', 105226, '[]', '[]', '{\"thumb\": true}', '[]', 1, '2024-09-03 04:11:45', '2024-09-03 04:11:45'),
(94, 'e15516d0-61f1-41f8-8edd-c94c8a5f51bf', 'App\\Models\\Product', 20, 'photos', 'i (2)', 'i-(2).webp', 'image/webp', 'public', 'public', 132100, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2024-09-03 04:11:45', '2024-09-03 04:11:45'),
(95, '4cb678d4-c4ac-47f9-9d8e-1a0787093c5e', 'App\\Models\\Product', 20, 'photos', 'i (3)', 'i-(3).webp', 'image/webp', 'public', 'public', 91420, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2024-09-03 04:11:45', '2024-09-03 04:11:46'),
(96, 'c59be8ae-b0c1-4ce6-a4ba-5624e7a36d51', 'App\\Models\\Product', 27, 'photos', 'один', 'один.jpg', 'image/jpeg', 'public', 'public', 45712, '[]', '[]', '{\"thumb\": true}', '[]', 8, '2024-09-03 04:18:11', '2024-09-03 04:18:11'),
(97, 'e86b431a-108a-423a-b01c-219cb21cd4d3', 'App\\Models\\Product', 27, 'photos', 'дебилы', 'дебилы.jpg', 'image/jpeg', 'public', 'public', 47092, '[]', '[]', '{\"thumb\": true}', '[]', 9, '2024-09-03 04:43:01', '2024-09-03 04:43:01');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_08_25_232201_create_categories_table', 1),
(6, '2024_08_25_232503_create_products_table', 1),
(7, '2024_09_01_205541_create_media_table', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `old_price`, `location`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, '3 item', '70', '707', 'tttt', 'tttt', 'yes', NULL, NULL),
(6, 1, '9999', '100', '110', 'Toronto', 'no', 'yes', '2024-09-02 02:58:18', '2024-09-02 02:58:18'),
(7, 1, '9999', '100', '110', 'Toronto', 'no', 'yes', '2024-09-02 03:03:34', '2024-09-02 03:03:34'),
(11, 1, 'Brr', '100', '110', 'Missisaga', 'no', 'yes', '2024-09-02 03:30:24', '2024-09-02 03:30:24'),
(15, 1, 'Brr', '100', '110', 'Missisaga', 'no', 'yes', '2024-09-02 03:32:42', '2024-09-02 03:32:42'),
(20, 5, 'admin4', '444', '4434', 'Toronto4', 'no', 'yes', '2024-09-02 04:29:35', '2024-09-03 04:11:44'),
(21, 5, 'user', '2345', '2345', 'Missisaga', 'no', 'yes', '2024-09-02 04:31:54', '2024-09-02 04:31:54'),
(22, 5, 'user', '2345', '2345', 'Missisaga', 'no', 'yes', '2024-09-02 04:35:20', '2024-09-02 04:35:20'),
(24, 6, 'Busy', '45', '56', 'Usa', 'no', 'yes', '2024-09-02 20:07:43', '2024-09-02 20:07:43'),
(26, 2, 'le', '456', '', '456', 'no', 'yes', '2024-09-02 20:36:49', '2024-09-02 20:36:49'),
(27, 1, 'User U', '888 888', '456', 'Toronto3', 'no', 'yes', '2024-09-02 20:37:34', '2024-09-03 04:44:18'),
(28, 5, 'Dishes very 3', '35', NULL, 'Toronto ON', 'no', 'yes', '2024-09-02 22:32:32', '2024-09-03 03:27:53'),
(29, 4, 'Broshka', '79', '90', 'Toronto ON', 'no', 'yes', '2024-09-02 22:41:28', '2024-09-02 22:41:28'),
(30, 1, 'fox', '55', NULL, 'Toronto ON', 'no', 'yes', '2024-09-03 02:06:53', '2024-09-03 02:06:53'),
(31, 1, 'user', '99', NULL, 'Toronto', 'no', 'yes', '2024-09-03 02:08:53', '2024-09-03 02:08:53'),
(32, 1, 'admin', '098', NULL, 'Missisaga', 'no', 'yes', '2024-09-03 02:09:21', '2024-09-03 02:09:21'),
(33, 1, '9999', 'dsf', NULL, 'Toronto ON', 'no', 'yes', '2024-09-03 02:09:56', '2024-09-03 02:09:56'),
(34, 1, 'fox ee', '100', '876', 'Missisaga', 'no', 'yes', '2024-09-03 02:12:05', '2024-09-03 02:12:05'),
(35, 2, 'user', '100', NULL, 'Toronto', 'no', 'yes', '2024-09-03 02:31:07', '2024-09-03 02:31:07'),
(36, 4, '9999', '100', NULL, 'Toronto', 'no', 'yes', '2024-09-03 02:57:19', '2024-09-03 02:57:19');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$m/Ot1QLQ9Fq7dd4RsIyYmOPDzwPEmqnHGgVBb6gkFLkIuWeC6afGG', 'vI4p3zpPLQl9E9qnwZqoAbQ2Iio2sXvY04TdHbjvvjDGRhSrz5CtI6tPEpe3', '2024-08-26 04:55:26', '2024-08-26 04:55:26');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
