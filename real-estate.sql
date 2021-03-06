-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2022 at 01:27 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `real-estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_02_204503_create_posts_table', 1),
(6, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(7, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(8, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(9, '2016_06_01_000004_create_oauth_clients_table', 2),
(10, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('6bfdc2636e0083f7c33d7df3394890d66c5a94e54aac465e46ae5c6e98987b2d2fd1f97c2aacbff6', 7, 1, 'Logged-user', '[]', 0, '2022-02-04 10:25:09', '2022-02-04 10:25:09', '2023-02-04 12:25:09'),
('b3ba5f4a188519f8449d936c8d77eadd48dd3edc5e89f01eeb70617d8ab708abd5d12277c0b63f9c', 7, 1, 'register-user', '[]', 0, '2022-02-04 10:19:37', '2022-02-04 10:19:37', '2023-02-04 12:19:37');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'KQx56NyGbSzKJd9Rr2To26AhslXqeYF7z2sqeqCm', NULL, 'http://localhost', 1, 0, 0, '2022-02-04 10:07:53', '2022-02-04 10:07:53'),
(2, NULL, 'Laravel Password Grant Client', 'U2GvD29E1BnLeeAtKYxArJYMkL5GfNJPW4fpIrL0', 'users', 'http://localhost', 0, 1, 0, '2022-02-04 10:07:53', '2022-02-04 10:07:53');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-02-04 10:07:53', '2022-02-04 10:07:53');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `description`, `image`, `contact_number`, `created_at`, `updated_at`) VALUES
(1, 3, 'Mohammed Ali', 'Quam qui nihil sit rerum mollitia. Nisi pariatur accusantium ipsam voluptatem. Enim expedita assumenda molestiae repellat.', 'C:\\Users\\Khaled\\AppData\\Local\\Temp\\c3160fc3c4b71f7bf63a4602de1b7e65.png', '+1-802-789-9770', '2022-02-02 19:57:30', '2022-02-03 21:27:30'),
(4, 5, 'Dr.', 'Provident aut officiis voluptatem dignissimos. Sequi sed est itaque consequatur pariatur sed. Perferendis officia ut hic neque distinctio non. Adipisci rem voluptas mollitia illum odit veniam eum.', 'C:\\Users\\Khaled\\AppData\\Local\\Temp\\d4e628355d7360d6d0cc9780a1ce5e79.png', '+1.212.259.3885', '2022-02-02 19:57:31', '2022-02-02 19:57:31'),
(5, 1, 'Mrs.', 'Autem ut rerum sed delectus dicta ipsa. Tenetur doloremque vel maxime amet et dolor. Consequatur aut sint est temporibus placeat odit.', 'C:\\Users\\Khaled\\AppData\\Local\\Temp\\e5d4a0c4e457fa5a7401dcf1ac6b5743.png', '+1 (850) 643-1879', '2022-02-02 19:57:31', '2022-02-02 19:57:31'),
(6, 3, 'Ms.', 'Aliquam optio delectus voluptatem non error ut. Similique quis ut non fugit odit neque cumque. Laudantium dicta tempora rerum dolores.', 'C:\\Users\\Khaled\\AppData\\Local\\Temp\\bd85aa693e1d61e92ee6fbba17ca11eb.png', '1-743-303-2039', '2022-02-02 19:57:31', '2022-02-02 19:57:31'),
(7, 3, 'Ms.', 'Aspernatur omnis ea quos debitis eos. Rerum pariatur cupiditate sed atque odit. Voluptatem labore a tempore similique.', 'C:\\Users\\Khaled\\AppData\\Local\\Temp\\27ebf37739311975247bbb4b98008229.png', '1-828-239-9103', '2022-02-02 19:57:31', '2022-02-02 19:57:31'),
(8, 4, 'Prof.', 'In libero veritatis omnis quo sit rerum soluta. Explicabo voluptatem sit nulla. Et odit molestiae atque vero amet voluptas. Veritatis atque non fuga sit accusantium enim.', 'C:\\Users\\Khaled\\AppData\\Local\\Temp\\80bd457161660b587b53a47829d69016.png', '(737) 461-5827', '2022-02-02 19:57:31', '2022-02-02 19:57:31'),
(9, 3, 'Dr.', 'Quam voluptas voluptates sit deserunt. Quibusdam impedit ullam at. Nam quasi sed sunt.', 'C:\\Users\\Khaled\\AppData\\Local\\Temp\\8f702b10a527bc374e92fca3967eb0a4.png', '(229) 519-8598', '2022-02-02 19:57:31', '2022-02-02 19:57:31'),
(11, 1, 'Dr.', 'Nobis iste esse repellat quia. At quas quia eos veritatis. Eum doloremque illo perspiciatis consequatur corporis totam incidunt.', 'C:\\Users\\Khaled\\AppData\\Local\\Temp\\863076f56ca2e1841b56480db829efbf.png', '+1.931.546.7652', '2022-02-02 19:57:31', '2022-02-02 19:57:31'),
(12, 1, 'Mr.', 'Quia eum vel similique pariatur blanditiis. Consequatur et id et quo assumenda ea atque.', 'C:\\Users\\Khaled\\AppData\\Local\\Temp\\2ad51009a60a31971d912bb3ba384804.png', '650.997.5521', '2022-02-02 19:57:31', '2022-02-02 19:57:31'),
(13, 1, 'Dr.', 'Aut eligendi officiis similique nemo. Cupiditate voluptatibus facere harum et. Est quis est similique sit.', 'C:\\Users\\Khaled\\AppData\\Local\\Temp\\b70d21984ff87502289681347b52df42.png', '+19794728757', '2022-02-02 19:57:31', '2022-02-02 19:57:31'),
(14, 4, 'Ms.', 'Voluptas nemo voluptas dolores ut. Placeat provident voluptatem excepturi possimus quos doloribus quo.', 'C:\\Users\\Khaled\\AppData\\Local\\Temp\\9fbaafae3de3a10be0f1d3b60535eacd.png', '662-867-8374', '2022-02-02 19:57:31', '2022-02-02 19:57:31'),
(15, 3, 'Dr.', 'Earum non perspiciatis id. Incidunt dolores qui autem inventore delectus perspiciatis at. Qui quia saepe facere a tenetur.', 'C:\\Users\\Khaled\\AppData\\Local\\Temp\\a4bced38c196b85777a3c0b91ca0990b.png', '(678) 493-5077', '2022-02-02 19:57:31', '2022-02-02 19:57:31'),
(16, 5, 'Ms.', 'Earum et id accusantium necessitatibus harum. Eius harum sequi labore. Ea quia aliquam dolorem qui.', 'C:\\Users\\Khaled\\AppData\\Local\\Temp\\a1f7660adf729035c6f4b30b1c55316e.png', '+1-919-260-3207', '2022-02-02 19:57:31', '2022-02-02 19:57:31'),
(17, 5, 'Mr.', 'Quis asperiores eum rerum. Ullam sint dolores dolor autem. Molestiae eos quibusdam animi ex vitae. Sit doloribus quasi dignissimos dolores.', 'C:\\Users\\Khaled\\AppData\\Local\\Temp\\139d08baa8c2874475b507f17f129dcc.png', '1-985-384-2238', '2022-02-02 19:57:31', '2022-02-02 19:57:31'),
(18, 5, 'Ms.', 'Non labore quidem odit at nihil ipsam voluptatem. Qui culpa id voluptatem dolorem quod eum est doloremque. Sit eum at rerum quaerat hic voluptatem deserunt. Nostrum impedit sed dolor praesentium.', 'C:\\Users\\Khaled\\AppData\\Local\\Temp\\37639ba4c6db8cd74cb917f6a0d9c321.png', '989-515-4986', '2022-02-02 19:57:31', '2022-02-02 19:57:31'),
(19, 2, 'Ms.', 'Ut vel magni et omnis a aut. Recusandae voluptatum dicta expedita ab dolorem et adipisci rem. Et magni aut facilis fuga culpa temporibus.', 'C:\\Users\\Khaled\\AppData\\Local\\Temp\\432a3e743ef2b83ef944ca03e7701cb5.png', '1-678-202-8159', '2022-02-02 19:57:31', '2022-02-02 19:57:31'),
(20, 5, 'Dr.', 'Et nulla modi molestiae iste. Error voluptatem provident mollitia. Atque est laborum aperiam est.', 'C:\\Users\\Khaled\\AppData\\Local\\Temp\\ced6a085bafa4ce9c640b1404b77c37c.png', '1-575-553-7611', '2022-02-02 19:57:31', '2022-02-02 19:57:31'),
(21, 3, 'Prof.', 'Labore iste laudantium odit et ratione cumque dolores provident. Accusantium nisi doloribus maxime sit alias dolorem nihil. Minima optio hic voluptatum occaecati reprehenderit.', 'C:\\Users\\Khaled\\AppData\\Local\\Temp\\c50deafb2fb84bae23a2e025ae5eb79d.png', '(941) 327-1492', '2022-02-02 19:57:31', '2022-02-02 19:57:31'),
(23, 2, 'Mr.', 'Aut vel atque voluptate ea consequatur. Deleniti at sequi voluptatem quam aut reiciendis.', 'C:\\Users\\Khaled\\AppData\\Local\\Temp\\b333fea821e186ef4e1da1b7030d7d27.png', '269-659-2599', '2022-02-02 19:57:31', '2022-02-02 19:57:31'),
(24, 5, 'Dr.', 'Aliquam est rerum vitae qui qui enim. Nemo et velit placeat suscipit ducimus et. Ratione enim consequatur eos eius.', 'C:\\Users\\Khaled\\AppData\\Local\\Temp\\cf223aaf4fe3a29c10cd9d2f3326f3a1.png', '+16893419541', '2022-02-02 19:57:31', '2022-02-02 19:57:31'),
(25, 5, 'Mr.', 'Error voluptatem autem quaerat debitis quasi iure. Tempora fuga at tempora beatae recusandae labore velit.', 'C:\\Users\\Khaled\\AppData\\Local\\Temp\\a597b0c01f203c5dcee3fb4586c21dfd.png', '1-952-229-8779', '2022-02-02 19:57:31', '2022-02-02 19:57:31'),
(26, 3, 'Prof.', 'Neque id unde autem dolores. Consequatur quia et recusandae sed omnis explicabo aut repudiandae. Cum et accusamus quos atque totam. Rem in ab aspernatur dolor impedit provident.', 'C:\\Users\\Khaled\\AppData\\Local\\Temp\\6447ac2a05ada5b0d2be8f5e67912b1e.png', '(971) 785-5415', '2022-02-02 19:57:31', '2022-02-02 19:57:31'),
(27, 3, 'Miss', 'Culpa deserunt qui quidem fugiat. Nemo soluta sequi reiciendis omnis sit. Voluptas cumque dolores sint amet asperiores. Sapiente ut modi laboriosam et eveniet officia.', 'C:\\Users\\Khaled\\AppData\\Local\\Temp\\2d124c357449f7dea1463f64f7113f52.png', '(850) 210-4052', '2022-02-02 19:57:31', '2022-02-02 19:57:31'),
(28, 3, 'Prof.', 'Blanditiis sit qui nisi. Velit praesentium assumenda fuga eius sit. Ullam quis provident aliquid quam sapiente qui nulla. Vitae optio quia eveniet.', 'C:\\Users\\Khaled\\AppData\\Local\\Temp\\54eec2526d36e65d6b836c90d1f56ed4.png', '+12525958014', '2022-02-02 19:57:31', '2022-02-02 19:57:31'),
(29, 4, 'Mr.', 'Eveniet exercitationem reiciendis incidunt animi quis rerum exercitationem a. Et dolor sit omnis. Autem eius corrupti velit. Consequatur aut libero labore fugiat quod ipsum a quo.', 'C:\\Users\\Khaled\\AppData\\Local\\Temp\\5d29c7dc067a52c32d2e952bea9163f5.png', '+1.803.910.6971', '2022-02-02 19:57:31', '2022-02-02 19:57:31'),
(30, 2, 'Dr.', 'Ipsa ab aliquam hic dicta. Dolore labore rem voluptatibus quae repellat veniam labore qui. Cupiditate et eaque libero placeat.', 'C:\\Users\\Khaled\\AppData\\Local\\Temp\\7bdf7fdf9f29036fec4bc780e0f2aea0.png', '+1 (325) 824-8418', '2022-02-02 19:57:31', '2022-02-02 19:57:31'),
(31, NULL, '????????', 'getClientOriginalName getClientOriginalNamegetClientOriginalNamegetClientOriginalNamegetClientOriginalNamegetClientOriginalNamegetClientOriginalNamegetClientOriginalName', '1643841124271988474_743159903755742_6228488132466760254_n.jpg', '01129350885', '2022-02-02 20:32:04', '2022-02-02 20:32:04'),
(32, 1, 'jdsj', 'test test test test test test test test test test test test test test test test test test test test test test test test test test test test', '1643841283271988474_743159903755742_6228488132466760254_n.jpg', '0112930885', '2022-02-02 20:34:43', '2022-02-02 20:34:43'),
(33, NULL, 'asd', 'asd', NULL, 'asd', '2022-02-03 15:07:29', '2022-02-03 15:07:29'),
(34, NULL, 'okok', 'kokoko', NULL, 'okoko', '2022-02-03 16:22:36', '2022-02-03 16:22:36'),
(35, NULL, 'qwe', 'qwe', NULL, 'qwe', '2022-02-03 16:27:05', '2022-02-03 16:27:05'),
(37, NULL, 'opopo', 'tesgahsanjsamskamska kmsakmskam', NULL, '3232656565', '2022-02-03 21:27:54', '2022-02-03 21:27:54'),
(40, NULL, 'update last', 'description', '', '013121615', '2022-02-04 09:17:52', '2022-02-04 09:58:03'),
(41, 7, 'test api 10', 'test api description 10', '1643977283png', '01213161540', '2022-02-04 10:21:23', '2022-02-04 10:21:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'khaled', 'khaled@gmail.com', NULL, '$2y$10$KKiePxATi0axVpQiJUsRE.9Es4TgUsPUyisgerQzW2GdnkfXk8LhW', NULL, '2022-02-02 19:01:16', '2022-02-02 19:01:16'),
(2, 'Aliza Rice', 'arvel.dietrich@example.net', '2022-02-02 19:57:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'GFHXBK2NVM', '2022-02-02 19:57:17', '2022-02-02 19:57:17'),
(3, 'Virgil Kovacek I', 'wiegand.nella@example.net', '2022-02-02 19:57:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'phgWVsYjUj', '2022-02-02 19:57:17', '2022-02-02 19:57:17'),
(4, 'Dr. Paul Kautzer', 'adrian.torphy@example.org', '2022-02-02 19:57:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'J584C5NrYJ', '2022-02-02 19:57:17', '2022-02-02 19:57:17'),
(5, 'Ms. Cathryn Hirthe II', 'hreilly@example.org', '2022-02-02 19:57:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '4XLK0GanCO', '2022-02-02 19:57:17', '2022-02-02 19:57:17'),
(6, 'Prof. Florian Brakus', 'pollich.marion@example.net', '2022-02-02 19:57:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5FAQrUpVbw', '2022-02-02 19:57:17', '2022-02-02 19:57:17'),
(7, 'oraby', 'oraby@mail.com', NULL, '$2y$10$e4ASddX10bg4iNnXd7Mku.g6d7CFJa4GXeIgGxd3kC546cMPDaRUK', NULL, '2022-02-04 10:19:37', '2022-02-04 10:19:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_contact_number_unique` (`contact_number`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
