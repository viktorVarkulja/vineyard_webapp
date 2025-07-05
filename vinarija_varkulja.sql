-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Jan 23. 18:16
-- Kiszolgáló verziója: 10.4.17-MariaDB
-- PHP verzió: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `vinarija_varkulja`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `bottles`
--

CREATE TABLE `bottles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `wine_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `in_stock` tinyint(1) NOT NULL DEFAULT 1,
  `cost_RSD` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `bottles`
--

INSERT INTO `bottles` (`id`, `wine_id`, `name`, `size`, `image`, `quantity`, `in_stock`, `cost_RSD`, `created_at`, `updated_at`) VALUES
(1, 1, 'Italijanski Rizling 2020', '1l', 'Italijanski Rizling 2020_1l.jpeg', 45, 1, '300.00', '2024-01-09 15:31:42', '2024-01-12 15:50:47'),
(2, 3, 'Rajnski Rizling 2018', '1l', 'Rajnski Rizling 2018_1l.jpeg', 47, 1, '300.00', '2024-01-09 15:31:51', '2024-01-18 00:02:23'),
(4, 4, 'Cabernet Franc 2018', '1l', 'Cabernet Franc 2018_1l.jpeg', 45, 1, '350.00', '2024-01-12 16:09:44', '2024-01-18 00:02:23'),
(5, 5, 'Roze 2019', '1l', 'Roze 2019_1l.jpeg', 0, 0, '350.00', '2024-01-12 16:10:18', '2024-01-12 16:11:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `grape`
--

CREATE TABLE `grape` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `grape`
--

INSERT INTO `grape` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Italijanski Rizling', '2024-01-10 21:40:08', '2024-01-10 21:40:08'),
(2, 'Rajnski Rizling', '2024-01-10 21:40:15', '2024-01-10 21:40:15'),
(3, 'Cabernet Franc', '2024-01-10 21:40:22', '2024-01-10 21:40:22'),
(4, 'Shiraz', '2024-01-10 21:40:33', '2024-01-10 21:40:33');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(14, '2024_01_04_215605_create_wine_table', 2),
(15, '2024_01_04_220438_create_grape_table', 2),
(16, '2024_01_04_220646_create_bottles_table', 2),
(17, '2024_01_04_221638_create_receipt_table', 2),
(18, '2024_01_08_111453_create_receipt_bottle_table', 2),
(19, '2024_01_08_142911_update_users_table', 3),
(20, '2024_01_11_155701_update_wine_table', 4),
(26, '2024_01_16_222920_create_reciept_status_table', 5),
(27, '2024_01_16_223059_update_reciept_table', 6),
(28, '2024_01_17_173447_update_user_table', 7);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `receipt`
--

CREATE TABLE `receipt` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_RSD` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `receipt`
--

INSERT INTO `receipt` (`id`, `total_RSD`, `created_at`, `updated_at`, `status`, `user_id`) VALUES
(9, '300.00', '2024-01-17 15:51:21', '2024-01-18 02:23:58', 2, 4),
(10, '300.00', '2024-01-17 16:21:31', '2024-01-18 02:24:06', 3, 4),
(11, '350.00', '2024-01-17 16:48:39', '2024-01-18 02:24:15', 3, 4),
(12, '350.00', '2024-01-17 22:10:56', '2024-01-18 02:24:21', 2, 2),
(13, '1650.00', '2024-01-18 00:02:22', '2024-01-18 00:02:22', 1, 2);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `receipt_bottle`
--

CREATE TABLE `receipt_bottle` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reciept_id` bigint(20) UNSIGNED NOT NULL,
  `bottle_id` bigint(20) UNSIGNED NOT NULL,
  `bottle_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `receipt_bottle`
--

INSERT INTO `receipt_bottle` (`id`, `reciept_id`, `bottle_id`, `bottle_quantity`, `created_at`, `updated_at`) VALUES
(4, 9, 2, 1, '2024-01-17 15:51:22', '2024-01-17 15:51:22'),
(5, 10, 2, 1, '2024-01-17 16:21:32', '2024-01-17 16:21:32'),
(6, 11, 4, 1, '2024-01-17 16:48:39', '2024-01-17 16:48:39'),
(7, 12, 4, 1, '2024-01-17 22:10:56', '2024-01-17 22:10:56'),
(8, 13, 2, 2, '2024-01-18 00:02:23', '2024-01-18 00:02:23'),
(9, 13, 4, 3, '2024-01-18 00:02:23', '2024-01-18 00:02:23');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `reciept_status`
--

CREATE TABLE `reciept_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `reciept_status`
--

INSERT INTO `reciept_status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Aktivan', '2024-01-18 00:53:51', '2024-01-18 00:53:51'),
(2, 'Izmiren', '2024-01-18 00:53:51', '2024-01-18 00:53:51'),
(3, 'Otkazan', '2024-01-18 00:54:00', '2024-01-18 00:54:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`, `address`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$wErXJyG3WyNwikqqA5gVOeBw5kT5P20bg4u8WE1Pd4LlhhgllNe9u', NULL, '2024-01-08 10:34:18', '2024-01-18 00:12:37', 1, 'Narednička 5, Beograd'),
(2, 'Viktor', 'vark@gmail.com', NULL, '$2y$10$jG7KAncZludHXlW4A0.WPOip0ClDT.mW2W3iOmBdfGr83geD5pDOe', NULL, '2024-01-08 13:41:14', '2024-01-08 13:41:14', 0, 'Petar Petrovica 20, Subotica'),
(4, 'Ime', 'ime@gmail.com', NULL, '$2y$10$K45GVWM5Y84Ol.2shsovGeWVfomrPWKR8wm5Z5KHsMTOOoa0Jye8i', NULL, '2024-01-13 23:12:14', '2024-01-13 23:12:44', 0, 'Marko Markovica 50, Beograd'),
(5, 'Korisnik', 'koris@gmail.com', NULL, '$2y$10$6WO1k7GcL2dyNJja4mWZnuo0QiEdO9XpYL3SrFnnQ/.txdhdj9Y3i', NULL, '2024-01-23 14:39:25', '2024-01-23 14:39:25', 0, 'Savski nasip 7, Beograd');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `wine`
--

CREATE TABLE `wine` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grape_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `wine`
--

INSERT INTO `wine` (`id`, `name`, `year`, `grape_id`, `created_at`, `updated_at`) VALUES
(1, 'Italijanski rizling', '2020', 1, NULL, '2024-01-11 16:57:02'),
(3, 'Rajnski rizling', '2018', 2, '2024-01-11 15:58:03', '2024-01-11 15:58:03'),
(4, 'Cabernet Franc', '2018', 3, '2024-01-11 15:58:21', '2024-01-11 15:58:21'),
(5, 'Roze Cabernet', '2019', 3, '2024-01-11 15:58:34', '2024-01-11 16:02:39'),
(6, 'Shiraz', '2023', 4, '2024-01-11 15:58:53', '2024-01-11 15:58:53');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `bottles`
--
ALTER TABLE `bottles`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- A tábla indexei `grape`
--
ALTER TABLE `grape`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- A tábla indexei `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- A tábla indexei `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `receipt_bottle`
--
ALTER TABLE `receipt_bottle`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `reciept_status`
--
ALTER TABLE `reciept_status`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- A tábla indexei `wine`
--
ALTER TABLE `wine`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `bottles`
--
ALTER TABLE `bottles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `grape`
--
ALTER TABLE `grape`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT a táblához `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT a táblához `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT a táblához `receipt_bottle`
--
ALTER TABLE `receipt_bottle`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT a táblához `reciept_status`
--
ALTER TABLE `reciept_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `wine`
--
ALTER TABLE `wine`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
