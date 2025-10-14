-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-08-2025 a las 21:08:49
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ceprocal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:7:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"d\";s:9:\"father_id\";s:1:\"e\";s:5:\"order\";s:1:\"r\";s:5:\"roles\";s:1:\"j\";s:6:\"status\";}s:11:\"permissions\";a:18:{i:0;a:6:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"users\";s:1:\"c\";s:3:\"web\";s:1:\"d\";N;s:1:\"e\";N;s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:6:{s:1:\"a\";i:2;s:1:\"b\";s:10:\"users.show\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:1;s:1:\"e\";i:1;s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:6:{s:1:\"a\";i:3;s:1:\"b\";s:12:\"users.create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:1;s:1:\"e\";i:2;s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:6:{s:1:\"a\";i:4;s:1:\"b\";s:10:\"users.edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:1;s:1:\"e\";i:3;s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:6:{s:1:\"a\";i:5;s:1:\"b\";s:17:\"users.edit_status\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:1;s:1:\"e\";i:4;s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:6:{s:1:\"a\";i:6;s:1:\"b\";s:13:\"users.destroy\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:1;s:1:\"e\";i:5;s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:6:{s:1:\"a\";i:7;s:1:\"b\";s:5:\"roles\";s:1:\"c\";s:3:\"web\";s:1:\"d\";N;s:1:\"e\";N;s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:6:{s:1:\"a\";i:8;s:1:\"b\";s:10:\"roles.show\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:7;s:1:\"e\";i:1;s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:6:{s:1:\"a\";i:9;s:1:\"b\";s:12:\"roles.create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:7;s:1:\"e\";i:2;s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:6:{s:1:\"a\";i:10;s:1:\"b\";s:10:\"roles.edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:7;s:1:\"e\";i:3;s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:6:{s:1:\"a\";i:11;s:1:\"b\";s:17:\"roles.edit_status\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:7;s:1:\"e\";i:4;s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:6:{s:1:\"a\";i:12;s:1:\"b\";s:13:\"roles.destroy\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:7;s:1:\"e\";i:5;s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:6:{s:1:\"a\";i:13;s:1:\"b\";s:11:\"permissions\";s:1:\"c\";s:3:\"web\";s:1:\"d\";N;s:1:\"e\";N;s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:6:{s:1:\"a\";i:14;s:1:\"b\";s:16:\"permissions.show\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:13;s:1:\"e\";i:1;s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:6:{s:1:\"a\";i:15;s:1:\"b\";s:7:\"company\";s:1:\"c\";s:3:\"web\";s:1:\"d\";N;s:1:\"e\";N;s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:6:{s:1:\"a\";i:16;s:1:\"b\";s:12:\"company.show\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:15;s:1:\"e\";i:1;s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:6:{s:1:\"a\";i:17;s:1:\"b\";s:14:\"company.create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:15;s:1:\"e\";i:2;s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:6:{s:1:\"a\";i:18;s:1:\"b\";s:12:\"company.edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:15;s:1:\"e\";i:3;s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:1:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:10:\"Superadmin\";s:1:\"c\";s:3:\"web\";s:1:\"j\";i:1;}}}', 1755803150);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fantasy_name` varchar(255) NOT NULL,
  `real_name` varchar(255) NOT NULL,
  `document_number` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `logo` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `hours` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `courses`
--

INSERT INTO `courses` (`id`, `name`, `teacher_id`, `start_date`, `end_date`, `hours`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Curso Prueba', 1, '2025-08-20', '2025-08-31', 60, 1, '2025-08-20 10:53:11', '2025-08-20 15:01:13'),
(6, 'Curso Importacion', 1, '2025-08-21', '2025-09-21', 60, 1, '2025-08-21 18:53:42', '2025-08-21 18:53:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `course_companies`
--

CREATE TABLE `course_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_logo` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `course_companies`
--

INSERT INTO `course_companies` (`id`, `course_id`, `company_name`, `company_logo`, `created_at`, `updated_at`) VALUES
(3, 1, 'Ceprocal', 'storage/courses/companies/logo-curso-prueba_ceprocal-20082025132003.jpg', '2025-08-20 16:20:03', '2025-08-20 16:20:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `course_modules`
--

CREATE TABLE `course_modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `module` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `course_modules`
--

INSERT INTO `course_modules` (`id`, `course_id`, `module`, `description`, `created_at`, `updated_at`) VALUES
(5, 1, 'I', 'Prueba 1 de descripcion para curso detalle', '2025-08-20 14:38:06', '2025-08-20 14:38:06'),
(30, 6, 'I', 'Modulo 1', '2025-08-21 18:53:42', '2025-08-21 18:53:42'),
(31, 6, 'II', 'Modulo 2', '2025-08-21 18:53:42', '2025-08-21 18:53:42'),
(32, 6, 'III', 'Modulo 3', '2025-08-21 18:53:42', '2025-08-21 18:53:42'),
(33, 6, 'IV', 'Modulo 4', '2025-08-21 18:53:42', '2025-08-21 18:53:42'),
(34, 6, 'V', 'Modulo 5', '2025-08-21 18:53:42', '2025-08-21 18:53:42'),
(35, 6, 'VI', 'Modulo 6', '2025-08-21 18:53:42', '2025-08-21 18:53:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `course_students`
--

CREATE TABLE `course_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `hash_certificate` varchar(255) DEFAULT NULL,
  `send_status` varchar(255) NOT NULL DEFAULT 'Pendiente',
  `send_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `course_students`
--

INSERT INTO `course_students` (`id`, `course_id`, `student_id`, `hash_certificate`, `send_status`, `send_date`, `created_at`, `updated_at`) VALUES
(9, 6, 1, NULL, 'Pendiente', NULL, '2025-08-21 18:53:42', '2025-08-21 18:53:42'),
(10, 6, 6, NULL, 'Pendiente', NULL, '2025-08-21 18:53:42', '2025-08-21 18:53:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_06_15_041841_create_modules_table', 1),
(5, '2024_06_15_043745_create_media_table', 1),
(6, '2024_06_15_044743_create_permission_tables', 1),
(7, '2024_07_06_104750_create_pages_table', 1),
(8, '2024_07_08_054634_create_categories_table', 1),
(9, '2024_07_09_062117_create_blogs_table', 1),
(10, '2024_07_09_093643_create_tags_table', 1),
(11, '2024_07_30_090244_setup_countries_table', 1),
(12, '2024_11_04_052526_create_settings_table', 1),
(13, '2024_11_11_102110_create_landing_pages_table', 1),
(14, '2025_08_19_121916_create_companies_table', 2),
(15, '2025_08_19_151504_create_students_table', 3),
(16, '2025_08_19_155607_create_teachers_table', 4),
(17, '2025_08_20_072249_create_courses_table', 5),
(18, '2025_08_20_072427_create_course_modules_table', 5),
(19, '2025_08_20_072917_create_course_companies_table', 5),
(20, '2025_08_21_144505_create_course_students_table', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `father_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `father_id`, `order`, `created_at`, `updated_at`) VALUES
(1, 'users', 'web', NULL, NULL, '2025-08-19 13:11:06', '2025-08-19 13:11:06'),
(2, 'users.show', 'web', 1, 1, '2025-08-19 13:11:06', '2025-08-19 13:11:06'),
(3, 'users.create', 'web', 1, 2, '2025-08-19 13:12:34', '2025-08-19 13:12:34'),
(4, 'users.edit', 'web', 1, 3, '2025-08-19 13:12:34', '2025-08-19 13:12:34'),
(5, 'users.edit_status', 'web', 1, 4, '2025-08-19 13:13:01', '2025-08-19 13:13:01'),
(6, 'users.destroy', 'web', 1, 5, '2025-08-19 13:13:01', '2025-08-19 13:13:01'),
(7, 'roles', 'web', NULL, NULL, '2025-08-19 18:19:04', '2025-08-19 18:19:04'),
(8, 'roles.show', 'web', 7, 1, '2025-08-19 18:19:04', '2025-08-19 18:19:04'),
(9, 'roles.create', 'web', 7, 2, '2025-08-19 18:19:04', '2025-08-19 18:19:04'),
(10, 'roles.edit', 'web', 7, 3, '2025-08-19 18:19:04', '2025-08-19 18:19:04'),
(11, 'roles.edit_status', 'web', 7, 4, '2025-08-19 18:19:04', '2025-08-19 18:19:04'),
(12, 'roles.destroy', 'web', 7, 5, '2025-08-19 18:19:04', '2025-08-19 18:19:04'),
(13, 'permissions', 'web', NULL, NULL, '2025-08-19 18:19:04', '2025-08-19 18:19:04'),
(14, 'permissions.show', 'web', 13, 1, '2025-08-19 18:19:04', '2025-08-19 18:19:04'),
(15, 'company', 'web', NULL, NULL, '2025-08-19 18:19:04', '2025-08-19 18:19:04'),
(16, 'company.show', 'web', 15, 1, '2025-08-19 18:19:04', '2025-08-19 18:19:04'),
(17, 'company.create', 'web', 15, 2, '2025-08-19 18:23:21', '2025-08-19 18:23:21'),
(18, 'company.edit', 'web', 15, 3, '2025-08-19 18:23:21', '2025-08-19 18:23:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 'web', 1, '2025-08-18 19:25:13', '2025-08-19 13:35:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('66ELos6STEUFjwHyWC5vytWMVOCz6AvOlFdQBbqc', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36 Edg/139.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiNFAzV01MNDlmUVdvTHZjWjQ5bUJWZjg1OTJyTER6R0Z2RUNtQ2xCYSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NzoiaHR0cDovL2xvY2FsaG9zdC9jZXByb2NhbC9wdWJsaWMvY291cnNlcy9lZGl0LzEiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0MjoiaHR0cDovL2xvY2FsaG9zdC9jZXByb2NhbC9wdWJsaWMvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3NTU2OTk3OTg7fX0=', 1755713471);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `document_number` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` (`id`, `name`, `document_number`, `phone_number`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Biedermann, Joaquin', '4477701', '0983495960', 'joabiedermann@gmail.com', 1, '2025-08-19 18:48:28', '2025-08-19 18:53:39'),
(6, 'Castro, Arami', '5838014', '0984763556', 'aramicastro0@gmail.com', 1, '2025-08-21 18:53:42', '2025-08-21 18:53:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `document_number` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `document_number`, `phone_number`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Biedermann, Joaquin', '4477701', '0983495960', 'joabiedermann@gmail.com', 1, '2025-08-19 18:57:36', '2025-08-19 18:57:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `avatar` text NOT NULL DEFAULT 'storage/users/user.png',
  `status` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `email_verified_at`, `avatar`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Joaquin Biedermann', '$2y$12$cSTDeIy.DCWFD3o0vVaB5ene1duyDfymj5cjBes6IHdnL7pjFpu76', 'joaquin@bsoft.com.py', NULL, 'storage/users/user.png', 1, 'OjLvTWM97wHaWmOYUQBK8zzBfa6eZMaNiY81hAdlkQuqAQIM6g9XVy0JRVL7', '2025-08-18 19:25:13', '2025-08-19 01:29:29');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_teacher_id_foreign` (`teacher_id`);

--
-- Indices de la tabla `course_companies`
--
ALTER TABLE `course_companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_companies_course_id_foreign` (`course_id`);

--
-- Indices de la tabla `course_modules`
--
ALTER TABLE `course_modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_details_course_id_foreign` (`course_id`);

--
-- Indices de la tabla `course_students`
--
ALTER TABLE `course_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_students_course_id_foreign` (`course_id`),
  ADD KEY `course_students_student_id_foreign` (`student_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `course_companies`
--
ALTER TABLE `course_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `course_modules`
--
ALTER TABLE `course_modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `course_students`
--
ALTER TABLE `course_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Filtros para la tabla `course_companies`
--
ALTER TABLE `course_companies`
  ADD CONSTRAINT `course_companies_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Filtros para la tabla `course_modules`
--
ALTER TABLE `course_modules`
  ADD CONSTRAINT `course_details_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Filtros para la tabla `course_students`
--
ALTER TABLE `course_students`
  ADD CONSTRAINT `course_students_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `course_students_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
