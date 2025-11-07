-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2025 a las 03:41:29
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ceprocal_test`
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
('soniafleitas@ceprocal.org.py|181.94.222.139', 'i:1;', 1762181512),
('soniafleitas@ceprocal.org.py|181.94.222.139:timer', 'i:1762181512;', 1762181512),
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:7:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"d\";s:9:\"father_id\";s:1:\"e\";s:5:\"order\";s:1:\"r\";s:5:\"roles\";s:1:\"j\";s:6:\"status\";}s:11:\"permissions\";a:50:{i:0;a:5:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"users\";s:1:\"c\";s:3:\"web\";s:1:\"d\";N;s:1:\"e\";N;}i:1;a:6:{s:1:\"a\";i:2;s:1:\"b\";s:10:\"users.show\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:1;s:1:\"e\";i:1;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:2;a:6:{s:1:\"a\";i:3;s:1:\"b\";s:12:\"users.create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:1;s:1:\"e\";i:2;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:3;a:6:{s:1:\"a\";i:4;s:1:\"b\";s:10:\"users.edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:1;s:1:\"e\";i:3;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:4;a:6:{s:1:\"a\";i:5;s:1:\"b\";s:17:\"users.edit_status\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:1;s:1:\"e\";i:4;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:5;a:6:{s:1:\"a\";i:6;s:1:\"b\";s:13:\"users.destroy\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:1;s:1:\"e\";i:5;s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:5:{s:1:\"a\";i:7;s:1:\"b\";s:5:\"roles\";s:1:\"c\";s:3:\"web\";s:1:\"d\";N;s:1:\"e\";N;}i:7;a:6:{s:1:\"a\";i:8;s:1:\"b\";s:10:\"roles.show\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:7;s:1:\"e\";i:1;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:8;a:6:{s:1:\"a\";i:9;s:1:\"b\";s:12:\"roles.create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:7;s:1:\"e\";i:2;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:9;a:6:{s:1:\"a\";i:10;s:1:\"b\";s:10:\"roles.edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:7;s:1:\"e\";i:3;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:10;a:6:{s:1:\"a\";i:11;s:1:\"b\";s:17:\"roles.edit_status\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:7;s:1:\"e\";i:4;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:11;a:6:{s:1:\"a\";i:12;s:1:\"b\";s:13:\"roles.destroy\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:7;s:1:\"e\";i:5;s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:5:{s:1:\"a\";i:13;s:1:\"b\";s:11:\"permissions\";s:1:\"c\";s:3:\"web\";s:1:\"d\";N;s:1:\"e\";N;}i:13;a:6:{s:1:\"a\";i:14;s:1:\"b\";s:16:\"permissions.show\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:13;s:1:\"e\";i:1;s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:5:{s:1:\"a\";i:15;s:1:\"b\";s:7:\"company\";s:1:\"c\";s:3:\"web\";s:1:\"d\";N;s:1:\"e\";N;}i:15;a:6:{s:1:\"a\";i:16;s:1:\"b\";s:12:\"company.show\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:15;s:1:\"e\";i:1;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:16;a:6:{s:1:\"a\";i:17;s:1:\"b\";s:14:\"company.create\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:15;s:1:\"e\";i:2;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:17;a:6:{s:1:\"a\";i:18;s:1:\"b\";s:12:\"company.edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:15;s:1:\"e\";i:3;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:18;a:5:{s:1:\"a\";i:19;s:1:\"b\";s:7:\"courses\";s:1:\"c\";s:3:\"web\";s:1:\"d\";N;s:1:\"e\";N;}i:19;a:6:{s:1:\"a\";i:20;s:1:\"b\";s:12:\"courses.show\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:19;s:1:\"e\";i:1;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:20;a:6:{s:1:\"a\";i:21;s:1:\"b\";s:12:\"courses.edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:19;s:1:\"e\";i:2;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:21;a:6:{s:1:\"a\";i:22;s:1:\"b\";s:19:\"courses.edit_status\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:19;s:1:\"e\";i:3;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:22;a:6:{s:1:\"a\";i:23;s:1:\"b\";s:15:\"courses.destroy\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:19;s:1:\"e\";i:4;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:23;a:5:{s:1:\"a\";i:24;s:1:\"b\";s:8:\"students\";s:1:\"c\";s:3:\"web\";s:1:\"d\";N;s:1:\"e\";N;}i:24;a:6:{s:1:\"a\";i:25;s:1:\"b\";s:13:\"students.show\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:24;s:1:\"e\";i:1;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:25;a:6:{s:1:\"a\";i:26;s:1:\"b\";s:13:\"students.edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:24;s:1:\"e\";i:2;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:26;a:6:{s:1:\"a\";i:27;s:1:\"b\";s:20:\"students.edit_status\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:24;s:1:\"e\";i:3;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:27;a:6:{s:1:\"a\";i:28;s:1:\"b\";s:16:\"students.destroy\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:24;s:1:\"e\";i:4;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:28;a:5:{s:1:\"a\";i:29;s:1:\"b\";s:8:\"teachers\";s:1:\"c\";s:3:\"web\";s:1:\"d\";N;s:1:\"e\";N;}i:29;a:6:{s:1:\"a\";i:30;s:1:\"b\";s:13:\"teachers.show\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:29;s:1:\"e\";i:1;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:30;a:6:{s:1:\"a\";i:31;s:1:\"b\";s:13:\"teachers.edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:29;s:1:\"e\";i:2;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:31;a:6:{s:1:\"a\";i:32;s:1:\"b\";s:20:\"teachers.edit_status\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:29;s:1:\"e\";i:3;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:32;a:6:{s:1:\"a\";i:33;s:1:\"b\";s:16:\"teachers.destroy\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:29;s:1:\"e\";i:4;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:33;a:5:{s:1:\"a\";i:34;s:1:\"b\";s:12:\"certificates\";s:1:\"c\";s:3:\"web\";s:1:\"d\";N;s:1:\"e\";N;}i:34;a:6:{s:1:\"a\";i:35;s:1:\"b\";s:19:\"certificates.upload\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:34;s:1:\"e\";i:1;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:35;a:6:{s:1:\"a\";i:36;s:1:\"b\";s:22:\"certificates.shipments\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:34;s:1:\"e\";i:2;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:36;a:6:{s:1:\"a\";i:37;s:1:\"b\";s:26:\"certificates.show_shipment\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:34;s:1:\"e\";i:3;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:37;a:6:{s:1:\"a\";i:38;s:1:\"b\";s:25:\"certificates.generate_pdf\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:34;s:1:\"e\";i:4;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:38;a:6:{s:1:\"a\";i:39;s:1:\"b\";s:17:\"certificates.send\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:34;s:1:\"e\";i:5;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:39;a:5:{s:1:\"a\";i:40;s:1:\"b\";s:6:\"forums\";s:1:\"c\";s:3:\"web\";s:1:\"d\";N;s:1:\"e\";N;}i:40;a:6:{s:1:\"a\";i:41;s:1:\"b\";s:11:\"forums.show\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:40;s:1:\"e\";i:1;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:41;a:6:{s:1:\"a\";i:42;s:1:\"b\";s:11:\"forums.edit\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:40;s:1:\"e\";i:2;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:42;a:6:{s:1:\"a\";i:43;s:1:\"b\";s:18:\"forums.edit_status\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:40;s:1:\"e\";i:3;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:43;a:6:{s:1:\"a\";i:44;s:1:\"b\";s:14:\"forums.destroy\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:40;s:1:\"e\";i:4;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:44;a:5:{s:1:\"a\";i:45;s:1:\"b\";s:19:\"forums_certificates\";s:1:\"c\";s:3:\"web\";s:1:\"d\";N;s:1:\"e\";N;}i:45;a:6:{s:1:\"a\";i:46;s:1:\"b\";s:26:\"forums_certificates.upload\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:45;s:1:\"e\";i:1;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:46;a:6:{s:1:\"a\";i:47;s:1:\"b\";s:29:\"forums_certificates.shipments\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:45;s:1:\"e\";i:2;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:47;a:6:{s:1:\"a\";i:48;s:1:\"b\";s:33:\"forums_certificates.show_shipment\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:45;s:1:\"e\";i:3;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:48;a:6:{s:1:\"a\";i:49;s:1:\"b\";s:32:\"forums_certificates.generate_pdf\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:45;s:1:\"e\";i:4;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}i:49;a:6:{s:1:\"a\";i:50;s:1:\"b\";s:24:\"forums_certificates.send\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:45;s:1:\"e\";i:5;s:1:\"r\";a:2:{i:0;i:1;i:1;i:10;}}}s:5:\"roles\";a:2:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:10:\"Superadmin\";s:1:\"c\";s:3:\"web\";s:1:\"j\";i:1;}i:1;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:13:\"Administrador\";s:1:\"c\";s:3:\"web\";s:1:\"j\";i:1;}}}', 1762565450);

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
  `certificates_generated` tinyint(1) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `courses`
--

INSERT INTO `courses` (`id`, `name`, `teacher_id`, `start_date`, `end_date`, `hours`, `certificates_generated`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nombre del Curso', 1, '2025-01-01', '2025-12-31', 60, 1, 1, '2025-11-06 13:50:05', '2025-11-06 13:50:14');

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
(1, 1, 'I', 'Modulo 1', '2025-11-06 13:50:05', '2025-11-06 13:50:05'),
(2, 1, 'II', 'Modulo 2', '2025-11-06 13:50:05', '2025-11-06 13:50:05'),
(3, 1, 'III', 'Modulo 3', '2025-11-06 13:50:05', '2025-11-06 13:50:05'),
(4, 1, 'IV', 'Modulo 4', '2025-11-06 13:50:05', '2025-11-06 13:50:05'),
(5, 1, 'V', 'Modulo 5', '2025-11-06 13:50:05', '2025-11-06 13:50:05'),
(6, 1, 'VI', 'Modulo 6', '2025-11-06 13:50:05', '2025-11-06 13:50:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `course_students`
--

CREATE TABLE `course_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `hash_certificate` varchar(255) DEFAULT NULL,
  `path_certificate` varchar(255) NOT NULL,
  `send_status` varchar(255) NOT NULL DEFAULT 'Pendiente',
  `send_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `course_students`
--

INSERT INTO `course_students` (`id`, `course_id`, `student_id`, `hash_certificate`, `path_certificate`, `send_status`, `send_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'sihKz1qkgLGOmtl4OibA', 'storage/certificates/nombre-del-curso/1_PerezGonzalez,JuanAlberto.pdf', 'Enviado', '2025-11-06 21:59:17', '2025-11-06 13:50:05', '2025-11-06 21:59:17');

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
-- Estructura de tabla para la tabla `forums`
--

CREATE TABLE `forums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `hours` int(11) NOT NULL,
  `certificates_generated` tinyint(1) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `forums`
--

INSERT INTO `forums` (`id`, `name`, `date`, `hours`, `certificates_generated`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Foro Internacional de Productividad con enfasis\nen Comercio Internacional', '2025-01-01', 6, 1, 1, '2025-11-07 01:54:25', '2025-11-07 02:05:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forum_students`
--

CREATE TABLE `forum_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `forum_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `hash_certificate` varchar(255) DEFAULT NULL,
  `path_certificate` varchar(255) DEFAULT NULL,
  `send_status` varchar(255) NOT NULL DEFAULT 'Pendiente',
  `send_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `forum_students`
--

INSERT INTO `forum_students` (`id`, `forum_id`, `student_id`, `hash_certificate`, `path_certificate`, `send_status`, `send_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '5RA0r9dBWKxrcJG1RCCA', 'storage/forums_certificates/1/1_PerezGonzalez,JuanAlberto.pdf', 'Pendiente', NULL, '2025-11-07 01:54:25', '2025-11-07 01:54:25');

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
(20, '2025_08_21_144505_create_course_students_table', 6),
(21, '2025_10_13_175416_create_ms_graph_tokens_table', 7),
(22, '2025_11_06_220320_create_forums_table', 7),
(23, '2025_11_06_220417_create_forum_students_table', 7);

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
(1, 'App\\Models\\User', 1),
(10, 'App\\Models\\User', 2),
(10, 'App\\Models\\User', 3),
(10, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ms_graph_tokens`
--

CREATE TABLE `ms_graph_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `access_token` text NOT NULL,
  `refresh_token` text DEFAULT NULL,
  `expires` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'users', 'web', NULL, NULL, NULL, NULL),
(2, 'users.show', 'web', 1, 1, NULL, NULL),
(3, 'users.create', 'web', 1, 2, NULL, NULL),
(4, 'users.edit', 'web', 1, 3, NULL, NULL),
(5, 'users.edit_status', 'web', 1, 4, NULL, NULL),
(6, 'users.destroy', 'web', 1, 5, NULL, NULL),
(7, 'roles', 'web', NULL, NULL, NULL, NULL),
(8, 'roles.show', 'web', 7, 1, NULL, NULL),
(9, 'roles.create', 'web', 7, 2, NULL, NULL),
(10, 'roles.edit', 'web', 7, 3, NULL, NULL),
(11, 'roles.edit_status', 'web', 7, 4, NULL, NULL),
(12, 'roles.destroy', 'web', 7, 5, NULL, NULL),
(13, 'permissions', 'web', NULL, NULL, NULL, NULL),
(14, 'permissions.show', 'web', 13, 1, NULL, NULL),
(15, 'company', 'web', NULL, NULL, NULL, NULL),
(16, 'company.show', 'web', 15, 1, NULL, NULL),
(17, 'company.create', 'web', 15, 2, NULL, NULL),
(18, 'company.edit', 'web', 15, 3, NULL, NULL),
(19, 'courses', 'web', NULL, NULL, NULL, NULL),
(20, 'courses.show', 'web', 19, 1, NULL, NULL),
(21, 'courses.edit', 'web', 19, 2, NULL, NULL),
(22, 'courses.edit_status', 'web', 19, 3, NULL, NULL),
(23, 'courses.destroy', 'web', 19, 4, NULL, NULL),
(24, 'students', 'web', NULL, NULL, NULL, NULL),
(25, 'students.show', 'web', 24, 1, NULL, NULL),
(26, 'students.edit', 'web', 24, 2, NULL, NULL),
(27, 'students.edit_status', 'web', 24, 3, NULL, NULL),
(28, 'students.destroy', 'web', 24, 4, NULL, NULL),
(29, 'teachers', 'web', NULL, NULL, NULL, NULL),
(30, 'teachers.show', 'web', 29, 1, NULL, NULL),
(31, 'teachers.edit', 'web', 29, 2, NULL, NULL),
(32, 'teachers.edit_status', 'web', 29, 3, NULL, NULL),
(33, 'teachers.destroy', 'web', 29, 4, NULL, NULL),
(34, 'certificates', 'web', NULL, NULL, NULL, NULL),
(35, 'certificates.upload', 'web', 34, 1, NULL, NULL),
(36, 'certificates.shipments', 'web', 34, 2, NULL, NULL),
(37, 'certificates.show_shipment', 'web', 34, 3, NULL, NULL),
(38, 'certificates.generate_pdf', 'web', 34, 4, NULL, NULL),
(39, 'certificates.send', 'web', 34, 5, NULL, NULL),
(40, 'forums', 'web', NULL, NULL, NULL, NULL),
(41, 'forums.show', 'web', 40, 1, NULL, NULL),
(42, 'forums.edit', 'web', 40, 2, NULL, NULL),
(43, 'forums.edit_status', 'web', 40, 3, NULL, NULL),
(44, 'forums.destroy', 'web', 40, 4, NULL, NULL),
(45, 'forums_certificates', 'web', NULL, NULL, NULL, NULL),
(46, 'forums_certificates.upload', 'web', 45, 1, NULL, NULL),
(47, 'forums_certificates.shipments', 'web', 45, 2, NULL, NULL),
(48, 'forums_certificates.show_shipment', 'web', 45, 3, NULL, NULL),
(49, 'forums_certificates.generate_pdf', 'web', 45, 4, NULL, NULL),
(50, 'forums_certificates.send', 'web', 45, 5, NULL, NULL);

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
(1, 'Superadmin', 'web', 1, NULL, NULL),
(10, 'Administrador', 'web', 1, '2025-11-03 08:15:57', '2025-11-03 08:15:57');

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
(2, 1),
(2, 10),
(3, 1),
(3, 10),
(4, 1),
(4, 10),
(5, 1),
(5, 10),
(6, 1),
(8, 1),
(8, 10),
(9, 1),
(9, 10),
(10, 1),
(10, 10),
(11, 1),
(11, 10),
(12, 1),
(14, 1),
(16, 1),
(16, 10),
(17, 1),
(17, 10),
(18, 1),
(18, 10),
(20, 1),
(20, 10),
(21, 1),
(21, 10),
(22, 1),
(22, 10),
(23, 1),
(23, 10),
(25, 1),
(25, 10),
(26, 1),
(26, 10),
(27, 1),
(27, 10),
(28, 1),
(28, 10),
(30, 1),
(30, 10),
(31, 1),
(31, 10),
(32, 1),
(32, 10),
(33, 1),
(33, 10),
(35, 1),
(35, 10),
(36, 1),
(36, 10),
(37, 1),
(37, 10),
(38, 1),
(38, 10),
(39, 1),
(39, 10),
(41, 1),
(41, 10),
(42, 1),
(42, 10),
(43, 1),
(43, 10),
(44, 1),
(44, 10),
(46, 1),
(46, 10),
(47, 1),
(47, 10),
(48, 1),
(48, 10),
(49, 1),
(49, 10),
(50, 1),
(50, 10);

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
(1, 'Perez Gonzalez, Juan Alberto', '1234567', '0981111222', 'joabiedermann@gmail.com', 1, '2025-11-06 13:50:05', '2025-11-06 13:50:45');

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
(1, 'Perez Gonzalez, Juan Alberto', '1234567', '0981111222', 'example@example.com', 1, '2025-11-06 13:50:05', '2025-11-06 13:50:05');

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
  `avatar` text NOT NULL DEFAULT 'storage/no-avatar.png',
  `status` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `email_verified_at`, `avatar`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Joaquin Biedermann', '$2y$12$cSTDeIy.DCWFD3o0vVaB5ene1duyDfymj5cjBes6IHdnL7pjFpu76', 'joaquin@bsoft.com.py', NULL, 'storage/users/avatar-user-id-1-23082025124010.png', 1, 'H31wg25DcBuR0tgLcqaIqcQZGGBCDkh4Sw6DVJR3lzcoc6WlZC9fraUBbSOx', NULL, NULL),
(2, 'Sonia Fleitas', '$2y$12$VBgk72y0pIlOmn4KBYFE/uofhJXfwLu8lzscn2YZOFshFiekDnYBS', 'sonia.fleitas@ceprocal.org.py', NULL, 'storage/users/avatar-user-id-2-03112025131534.jpg', 1, NULL, '2025-11-03 08:17:19', '2025-11-03 13:15:34'),
(3, 'Vera Torres', '$2y$12$nfF5LG6l.yQQOuxGOGfr1usosbQHOFi.PaeVeo6p7m8AnpVMJe7WG', 'gerenciageneral@ceprocal.org.py', NULL, 'storage/no-avatar.png', 1, NULL, '2025-11-03 08:18:10', '2025-11-03 08:18:10'),
(4, 'Eulalia Delvalle', '$2y$12$tcKRI6pCDHBWMo.0poo5BuljNlFbZjyXdVVBQth4Z3PVnqUQc0oYy', 'comunicacion@ceprocal.org.py', NULL, 'storage/no-avatar.png', 1, NULL, '2025-11-03 08:18:37', '2025-11-03 08:18:37');

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
-- Indices de la tabla `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `forum_students`
--
ALTER TABLE `forum_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forum_students_forum_id_foreign` (`forum_id`),
  ADD KEY `forum_students_student_id_foreign` (`student_id`);

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
-- Indices de la tabla `ms_graph_tokens`
--
ALTER TABLE `ms_graph_tokens`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `course_companies`
--
ALTER TABLE `course_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `course_modules`
--
ALTER TABLE `course_modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `course_students`
--
ALTER TABLE `course_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `forums`
--
ALTER TABLE `forums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `forum_students`
--
ALTER TABLE `forum_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `ms_graph_tokens`
--
ALTER TABLE `ms_graph_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Filtros para la tabla `forum_students`
--
ALTER TABLE `forum_students`
  ADD CONSTRAINT `forum_students_forum_id_foreign` FOREIGN KEY (`forum_id`) REFERENCES `forums` (`id`),
  ADD CONSTRAINT `forum_students_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

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
