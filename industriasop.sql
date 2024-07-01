-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2024 a las 09:58:11
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
-- Base de datos: `industriasop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesos`
--

CREATE TABLE `accesos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pedido` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `accesos`
--

INSERT INTO `accesos` (`id`, `id_pedido`, `nombre`, `created_at`, `updated_at`) VALUES
(5, 37, 'DOBLE', '2024-06-26 09:42:35', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_generales`
--

CREATE TABLE `detalles_generales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pedido` bigint(20) UNSIGNED NOT NULL,
  `botonera` varchar(255) NOT NULL,
  `paradas` varchar(11) NOT NULL,
  `subsuelos` varchar(11) NOT NULL,
  `placa_cabina` tinyint(1) NOT NULL,
  `indicador_cabina` tinyint(1) NOT NULL,
  `indicador_pb` tinyint(1) NOT NULL,
  `indicador_palier` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_puertas`
--

CREATE TABLE `detalles_puertas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pedido` bigint(20) UNSIGNED NOT NULL,
  `marca` varchar(255) DEFAULT NULL,
  `voltaje` varchar(255) DEFAULT NULL,
  `patin_retractil` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalles_puertas`
--

INSERT INTO `detalles_puertas` (`id`, `id_pedido`, `marca`, `voltaje`, `patin_retractil`, `created_at`, `updated_at`) VALUES
(1, 37, NULL, NULL, 'NO POSEE', '2024-06-26 09:42:34', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_pedidos`
--

CREATE TABLE `estados_pedidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados_pedidos`
--

INSERT INTO `estados_pedidos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Solicitud', NULL, NULL);

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
-- Estructura de tabla para la tabla `habilitaciones_accesos`
--

CREATE TABLE `habilitaciones_accesos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pedido` bigint(20) UNSIGNED NOT NULL,
  `parada` varchar(255) NOT NULL,
  `salida_a` tinyint(1) NOT NULL,
  `salida_b` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(4, '2024_05_01_033925_pedidos', 2),
(5, '2024_05_01_034837_tipos_funtionamiento', 2),
(6, '2024_05_01_034928_tipos_control', 2),
(7, '2024_05_01_035207_tipos_puerta', 2),
(8, '2024_05_01_035343_detalles_puerta', 2),
(9, '2024_05_01_035534_tipos_patin_retractil', 2),
(10, '2024_05_01_035627_accesos', 2),
(11, '2024_05_01_035727_habilitaciones_acceso', 2),
(12, '2024_05_01_035927_tipos_obras', 2),
(13, '2024_05_01_040021_detalles_generales', 2),
(14, '2024_05_02_074039_estados_pedidos', 3),
(15, '2024_05_02_074617_estados_pedidos', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motores`
--

CREATE TABLE `motores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pedido` bigint(20) UNSIGNED NOT NULL,
  `id_tipo_control` bigint(20) UNSIGNED NOT NULL,
  `marca` varchar(255) NOT NULL,
  `voltaje` varchar(255) NOT NULL,
  `potencia` varchar(255) NOT NULL,
  `encoder` varchar(255) DEFAULT NULL,
  `rescate` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `motores`
--

INSERT INTO `motores` (`id`, `id_pedido`, `id_tipo_control`, `marca`, `voltaje`, `potencia`, `encoder`, `rescate`, `created_at`, `updated_at`) VALUES
(1, 24, 6, 'REDUAR', 'FRENO 220V DC', '21', 'FRENO 220V DC', NULL, '2024-06-26 09:09:06', NULL),
(2, 25, 6, 'REDUAR', 'FRENO 220V DC', '21', 'FRENO 220V DC', NULL, '2024-06-26 09:09:23', NULL),
(3, 26, 6, 'REDUAR', 'FRENO 220V DC', '21', 'FRENO 220V DC', NULL, '2024-06-26 09:10:45', NULL),
(4, 27, 6, 'REDUAR', 'FRENO 220V DC', '21', 'FRENO 220V DC', NULL, '2024-06-26 09:11:15', NULL),
(5, 28, 6, 'REDUAR', 'FRENO 220V DC', '21', 'FRENO 220V DC', NULL, '2024-06-26 09:11:38', NULL),
(6, 30, 6, 'REDUAR', 'FRENO 220V DC', '21', 'FRENO 220V DC', NULL, '2024-06-26 09:14:02', NULL),
(7, 31, 6, 'REDUAR', 'FRENO 220V DC', '21', 'FRENO 220V DC', NULL, '2024-06-26 09:15:40', NULL),
(8, 32, 6, 'REDUAR', 'FRENO 220V DC', '21', 'FRENO 220V DC', NULL, '2024-06-26 09:17:45', NULL),
(9, 33, 6, 'REDUAR', 'FRENO 220V DC', '21', 'FRENO 220V DC', NULL, '2024-06-26 09:18:29', NULL),
(10, 34, 6, 'REDUAR', 'FRENO 220V DC', '21', 'FRENO 220V DC', NULL, '2024-06-26 09:39:25', NULL),
(12, 36, 6, 'REDUAR', 'FRENO 220V DC', '21', 'FRENO 220V DC', NULL, '2024-06-26 09:42:00', NULL),
(13, 37, 6, 'REDUAR', 'FRENO 220V DC', '21', 'FRENO 220V DC', NULL, '2024-06-26 09:42:34', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('santiform@gmail.com', '$2y$12$wZ5LQ1sZbeWYhYggG8yjR.mdSCv.8wJdST4yzoSy/accUeHv98bhG', '2024-05-16 21:39:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tipo_obra` bigint(20) UNSIGNED NOT NULL,
  `id_tipo_funcionamiento` bigint(20) UNSIGNED NOT NULL,
  `id_tipo_control` bigint(20) UNSIGNED NOT NULL,
  `id_estado` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `direccion_obra` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_tipo_obra`, `id_tipo_funcionamiento`, `id_tipo_control`, `id_estado`, `nombre`, `email`, `telefono`, `direccion_obra`, `created_at`, `updated_at`) VALUES
(21, 2, 2, 6, 1, 'DIVOX', 'santiform@gmail.com', '1132435634', 'Francisco Miranda 2859', '2024-06-26 09:07:41', NULL),
(22, 2, 2, 6, 1, 'DIVOX', 'santiform@gmail.com', '1132435634', 'Francisco Miranda 2859', '2024-06-26 09:07:55', NULL),
(23, 2, 2, 6, 1, 'DIVOX', 'santiform@gmail.com', '1132435634', 'Francisco Miranda 2859', '2024-06-26 09:08:24', NULL),
(24, 2, 2, 6, 1, 'DIVOX', 'santiform@gmail.com', '1132435634', 'Francisco Miranda 2859', '2024-06-26 09:09:06', NULL),
(25, 2, 2, 6, 1, 'DIVOX', 'santiform@gmail.com', '1132435634', 'Francisco Miranda 2859', '2024-06-26 09:09:23', NULL),
(26, 2, 2, 6, 1, 'DIVOX', 'santiform@gmail.com', '1132435634', 'Francisco Miranda 2859', '2024-06-26 09:10:45', NULL),
(27, 2, 2, 6, 1, 'DIVOX', 'santiform@gmail.com', '1132435634', 'Francisco Miranda 2859', '2024-06-26 09:11:15', NULL),
(28, 2, 2, 6, 1, 'DIVOX', 'santiform@gmail.com', '1132435634', 'Francisco Miranda 2859', '2024-06-26 09:11:38', NULL),
(29, 2, 2, 6, 1, 'DIVOX', 'santiform@gmail.com', '1132435634', 'Francisco Miranda 2859', '2024-06-26 09:12:49', NULL),
(30, 2, 2, 6, 1, 'DIVOX', 'santiform@gmail.com', '1132435634', 'Francisco Miranda 2859', '2024-06-26 09:14:02', NULL),
(31, 2, 2, 6, 1, 'DIVOX', 'santiform@gmail.com', '1132435634', 'Francisco Miranda 2859', '2024-06-26 09:15:40', NULL),
(32, 2, 2, 6, 1, 'DIVOX', 'santiform@gmail.com', '1132435634', 'Francisco Miranda 2859', '2024-06-26 09:17:45', NULL),
(33, 2, 2, 6, 1, 'DIVOX', 'santiform@gmail.com', '1132435634', 'Francisco Miranda 2859', '2024-06-26 09:18:29', NULL),
(34, 2, 2, 6, 1, 'DIVOX', 'santiform@gmail.com', '1132435634', 'Francisco Miranda 2859', '2024-06-26 09:39:25', NULL),
(35, 2, 2, 6, 1, 'DIVOX', 'santiform@gmail.com', '1132435634', 'Francisco Miranda 2859', '2024-06-26 09:39:42', NULL),
(36, 2, 2, 6, 1, 'DIVOX', 'santiform@gmail.com', '1132435634', 'Francisco Miranda 2859', '2024-06-26 09:42:00', NULL),
(37, 2, 2, 6, 1, 'DIVOX', 'santiform@gmail.com', '1132435634', 'Francisco Miranda 2859', '2024-06-26 09:42:34', NULL);

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
('jTv8kL72wG91eFLeiDju5TirjST2FX5jZE6ODlGF', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicE1XdWF5TGdsZ1NYUlVuRG9vNWxjVlQ4ODZuWG1Va3d0MDdFRXJvaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly9sb2NhbGhvc3QvaW5kdXN0cmlhc29wL3B1YmxpYy9udWV2by9wYXNvNWludCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NToiZGF0b3MiO2E6MTI6e3M6MTM6ImVtYWlsX2VtcHJlc2EiO3M6MTk6InNhbnRpZm9ybUBnbWFpbC5jb20iO3M6MTQ6Im5vbWJyZV9lbXByZXNhIjtzOjU6IkRJVk9YIjtzOjE2OiJ0ZWxlZm9ub19lbXByZXNhIjtzOjEwOiIxMTM5NDUwMzQ5IjtzOjE0OiJkaXJlY2Npb25fb2JyYSI7czoyMjoiRnJhbmNpc2NvIE1pcmFuZGEgMjg1OSI7czo5OiJ0aXBvX29icmEiO3M6MToiMSI7czoxOToidGlwb19mdW5jaW9uYW1pZW50byI7czoxOiIyIjtzOjEyOiJ0aXBvX2NvbnRyb2wiO3M6MToiNyI7czoxNDoibW90b3JfcG90ZW5jaWEiO3M6MToiMyI7czoxMToibW90b3JfbWFyY2EiO3M6NToiQURTVVIiO3M6MTM6Im1vdG9yX3ZvbHRhamUiO3M6MTM6IkZSRU5PIDExMFYgQUMiO3M6MTM6Im1vdG9yX2VuY29kZXIiO047czoxMzoibW90b3JfcmVzY2F0ZSI7Tjt9fQ==', 1719816534);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_controles`
--

CREATE TABLE `tipos_controles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tipo_funcionamiento` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_controles`
--

INSERT INTO `tipos_controles` (`id`, `id_tipo_funcionamiento`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 1, '1 velocidad', NULL, NULL),
(2, 1, '2 velocidades', NULL, NULL),
(3, 1, 'Montacargas', NULL, NULL),
(4, 1, 'Montacoche', NULL, NULL),
(5, 1, 'Rampa', NULL, NULL),
(6, 2, '1 velocidad', NULL, NULL),
(7, 2, '2 velocidades', NULL, NULL),
(8, 2, 'Gearlles', NULL, NULL),
(9, 2, 'VVVF', NULL, NULL),
(10, 2, 'VVVF Velocidad alta', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_funcionamientos`
--

CREATE TABLE `tipos_funcionamientos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_funcionamientos`
--

INSERT INTO `tipos_funcionamientos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Hidraúlico', NULL, NULL),
(2, 'Mecánico', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_obras`
--

CREATE TABLE `tipos_obras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_obras`
--

INSERT INTO `tipos_obras` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Modernización', NULL, NULL),
(2, 'Nueva', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_puertas`
--

CREATE TABLE `tipos_puertas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tipo_control` bigint(20) UNSIGNED NOT NULL,
  `id_pedido` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_puertas`
--

INSERT INTO `tipos_puertas` (`id`, `id_tipo_control`, `id_pedido`, `nombre`, `created_at`, `updated_at`) VALUES
(5, 6, 25, 'SEMIAUTOMÁTICAS', '2024-06-26 09:09:23', NULL),
(6, 6, 26, 'SEMIAUTOMÁTICAS', '2024-06-26 09:10:45', NULL),
(7, 6, 27, 'SEMIAUTOMÁTICAS', '2024-06-26 09:11:15', NULL),
(8, 6, 28, 'SEMIAUTOMÁTICAS', '2024-06-26 09:11:38', NULL),
(9, 6, 30, 'SEMIAUTOMÁTICAS', '2024-06-26 09:14:02', NULL),
(10, 6, 31, 'SEMIAUTOMÁTICAS', '2024-06-26 09:15:40', NULL),
(11, 6, 32, 'SEMIAUTOMÁTICAS', '2024-06-26 09:17:45', NULL),
(12, 6, 33, 'SEMIAUTOMÁTICAS', '2024-06-26 09:18:29', NULL),
(13, 6, 34, 'SEMIAUTOMÁTICAS', '2024-06-26 09:39:25', NULL),
(14, 6, 36, 'SEMIAUTOMÁTICAS', '2024-06-26 09:42:00', NULL),
(15, 6, 37, 'SEMIAUTOMÁTICAS', '2024-06-26 09:42:34', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Santiago Formichelli', 'santiform@gmail.com', NULL, '$2y$12$D7Q9BsFTYlz/elOCcyhrweVdWGu/Li9UjVNoPiRlOmV3o49lZ/5mG', NULL, '2024-05-16 09:08:48', '2024-05-22 09:34:59');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesos`
--
ALTER TABLE `accesos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `detalles_generales`
--
ALTER TABLE `detalles_generales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `detalles_puertas`
--
ALTER TABLE `detalles_puertas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `estados_pedidos`
--
ALTER TABLE `estados_pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `habilitaciones_accesos`
--
ALTER TABLE `habilitaciones_accesos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pedido` (`id_pedido`);

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
-- Indices de la tabla `motores`
--
ALTER TABLE `motores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `motores_ibfk_1` (`id_tipo_control`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo_funcionamiento` (`id_tipo_funcionamiento`,`id_tipo_control`),
  ADD KEY `id_tipo_obra` (`id_tipo_obra`),
  ADD KEY `id_tipo_control` (`id_tipo_control`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `tipos_controles`
--
ALTER TABLE `tipos_controles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo_funcionamiento` (`id_tipo_funcionamiento`);

--
-- Indices de la tabla `tipos_funcionamientos`
--
ALTER TABLE `tipos_funcionamientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_obras`
--
ALTER TABLE `tipos_obras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_puertas`
--
ALTER TABLE `tipos_puertas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo_control` (`id_tipo_control`),
  ADD KEY `id_pedido` (`id_pedido`);

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
-- AUTO_INCREMENT de la tabla `accesos`
--
ALTER TABLE `accesos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalles_generales`
--
ALTER TABLE `detalles_generales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalles_puertas`
--
ALTER TABLE `detalles_puertas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estados_pedidos`
--
ALTER TABLE `estados_pedidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `habilitaciones_accesos`
--
ALTER TABLE `habilitaciones_accesos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `motores`
--
ALTER TABLE `motores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `tipos_controles`
--
ALTER TABLE `tipos_controles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tipos_funcionamientos`
--
ALTER TABLE `tipos_funcionamientos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipos_obras`
--
ALTER TABLE `tipos_obras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipos_puertas`
--
ALTER TABLE `tipos_puertas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `accesos`
--
ALTER TABLE `accesos`
  ADD CONSTRAINT `accesos_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalles_generales`
--
ALTER TABLE `detalles_generales`
  ADD CONSTRAINT `detalles_generales_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalles_puertas`
--
ALTER TABLE `detalles_puertas`
  ADD CONSTRAINT `detalles_puertas_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `habilitaciones_accesos`
--
ALTER TABLE `habilitaciones_accesos`
  ADD CONSTRAINT `habilitaciones_accesos_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `motores`
--
ALTER TABLE `motores`
  ADD CONSTRAINT `motores_ibfk_1` FOREIGN KEY (`id_tipo_control`) REFERENCES `tipos_controles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `motores_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_tipo_control`) REFERENCES `tipos_controles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pedidos_ibfk_4` FOREIGN KEY (`id_tipo_obra`) REFERENCES `tipos_obras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pedidos_ibfk_5` FOREIGN KEY (`id_tipo_funcionamiento`) REFERENCES `tipos_funcionamientos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pedidos_ibfk_6` FOREIGN KEY (`id_estado`) REFERENCES `estados_pedidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tipos_controles`
--
ALTER TABLE `tipos_controles`
  ADD CONSTRAINT `tipos_controles_ibfk_1` FOREIGN KEY (`id_tipo_funcionamiento`) REFERENCES `tipos_funcionamientos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tipos_puertas`
--
ALTER TABLE `tipos_puertas`
  ADD CONSTRAINT `tipos_puertas_ibfk_1` FOREIGN KEY (`id_tipo_control`) REFERENCES `tipos_controles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tipos_puertas_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
