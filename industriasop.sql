-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-05-2024 a las 10:13:26
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
  `id_tipo_funcionamiento` bigint(20) UNSIGNED NOT NULL,
  `id_tipo_control` bigint(20) UNSIGNED NOT NULL,
  `id_tipo_puerta` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `accesos`
--

INSERT INTO `accesos` (`id`, `id_tipo_funcionamiento`, `id_tipo_control`, `id_tipo_puerta`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Santiago', '2024-05-02 05:51:15', '2024-05-02 05:51:15');

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
  `placa_cabina` tinyint(1) NOT NULL,
  `indicador_cabina` tinyint(1) NOT NULL,
  `indicador_pb` tinyint(1) NOT NULL,
  `indicador_palier` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalles_generales`
--

INSERT INTO `detalles_generales` (`id`, `id_pedido`, `placa_cabina`, `indicador_cabina`, `indicador_pb`, `indicador_palier`, `created_at`, `updated_at`) VALUES
(2, 1, 0, 0, 0, 0, '2024-05-02 05:55:08', '2024-05-02 05:55:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_puertas`
--

CREATE TABLE `detalles_puertas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pedido` bigint(20) UNSIGNED NOT NULL,
  `id_tipo_funcionamiento` bigint(20) UNSIGNED NOT NULL,
  `id_tipo_control` bigint(20) UNSIGNED NOT NULL,
  `id_tipo_puerta` bigint(20) UNSIGNED NOT NULL,
  `marca` varchar(255) NOT NULL,
  `voltaje` varchar(255) NOT NULL,
  `id_patin_retractil` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalles_puertas`
--

INSERT INTO `detalles_puertas` (`id`, `id_pedido`, `id_tipo_funcionamiento`, `id_tipo_control`, `id_tipo_puerta`, `marca`, `voltaje`, `id_patin_retractil`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 1, 1, 'Toyota', '45V', 1, '2024-05-02 05:54:33', '2024-05-02 05:54:33');

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
(1, 'Solicitud', '2024-05-01 07:50:05', '2024-05-01 07:50:09');

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
  `salida_b` tinyint(1) NOT NULL,
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
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tipo_obra` bigint(20) UNSIGNED NOT NULL,
  `id_tipo_funcionamiento` bigint(20) UNSIGNED NOT NULL,
  `id_tipo_control` bigint(20) UNSIGNED NOT NULL,
  `id_tipo_puerta` bigint(20) UNSIGNED NOT NULL,
  `id_acceso` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `pedidos` (`id`, `id_tipo_obra`, `id_tipo_funcionamiento`, `id_tipo_control`, `id_tipo_puerta`, `id_acceso`, `id_estado`, `nombre`, `email`, `telefono`, `direccion_obra`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, 'DIVOX', 'santiform@gmail.com', '23951013', 'Francisco Miranda 2859', '2024-05-02 05:52:43', '2024-05-02 05:52:43');

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
('Ag8vwlIvXD2mKAax6YjjwL4oNwuvLNcl9335Wdv7', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMVF4NGk2UjVXcXZpWFR0bk9xcTFFdXczZWcyb2pqdFVJa1N4VlI0SCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ0OiJodHRwOi8vbG9jYWxob3N0L2luZHVzdHJpYXNvcC9wdWJsaWMvcGVkaWRvcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzE0NjM2NDExO319', 1714637105);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_controles`
--

CREATE TABLE `tipos_controles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tipo_funcionamiento` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `voltaje` varchar(255) NOT NULL,
  `potencia` varchar(255) NOT NULL,
  `encoder` varchar(255) NOT NULL,
  `rescate` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_controles`
--

INSERT INTO `tipos_controles` (`id`, `id_tipo_funcionamiento`, `nombre`, `marca`, `voltaje`, `potencia`, `encoder`, `rescate`, `created_at`, `updated_at`) VALUES
(1, 2, 'PROB', 'ASD', '35V', 'SD', 'ASD', 0, NULL, '2024-05-02 06:29:20');

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
(1, 'Renovación', '2024-05-01 23:41:56', '2024-05-01 23:41:56'),
(2, 'Nueva', '2024-05-01 23:42:06', '2024-05-01 23:42:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_patin_retractiles`
--

CREATE TABLE `tipos_patin_retractiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `voltaje` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_patin_retractiles`
--

INSERT INTO `tipos_patin_retractiles` (`id`, `tipo`, `voltaje`, `created_at`, `updated_at`) VALUES
(1, 'Semiautomático', '45V', '2024-05-02 05:54:20', '2024-05-02 05:54:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_puertas`
--

CREATE TABLE `tipos_puertas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tipo_funcionamiento` bigint(20) UNSIGNED NOT NULL,
  `id_tipo_control` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_puertas`
--

INSERT INTO `tipos_puertas` (`id`, `id_tipo_funcionamiento`, `id_tipo_control`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'HEH', NULL, NULL);

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
(1, 'Santiago Formichelli', 'santiform@gmail.com', NULL, '$2y$12$/m4PC8uwuYoVN9b0gL2b6.wg69bObxtqd1I8ViBNiK6VO/86/WFp.', NULL, '2024-05-01 02:31:23', '2024-05-01 02:31:23');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesos`
--
ALTER TABLE `accesos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo_funcionamiento` (`id_tipo_funcionamiento`,`id_tipo_control`,`id_tipo_puerta`),
  ADD KEY `id_tipo_control` (`id_tipo_control`),
  ADD KEY `id_tipo_puerta` (`id_tipo_puerta`);

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
  ADD KEY `id_pedido` (`id_pedido`,`id_tipo_funcionamiento`,`id_tipo_control`,`id_tipo_puerta`),
  ADD KEY `id_tipo_puerta` (`id_tipo_puerta`),
  ADD KEY `id_tipo_funcionamiento` (`id_tipo_funcionamiento`),
  ADD KEY `id_tipo_control` (`id_tipo_control`),
  ADD KEY `id_patin_retractil` (`id_patin_retractil`);

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
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo_funcionamiento` (`id_tipo_funcionamiento`,`id_tipo_control`,`id_tipo_puerta`,`id_acceso`),
  ADD KEY `id_tipo_obra` (`id_tipo_obra`),
  ADD KEY `id_tipo_puerta` (`id_tipo_puerta`),
  ADD KEY `id_tipo_control` (`id_tipo_control`),
  ADD KEY `id_acceso` (`id_acceso`),
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
-- Indices de la tabla `tipos_patin_retractiles`
--
ALTER TABLE `tipos_patin_retractiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_puertas`
--
ALTER TABLE `tipos_puertas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo_funcionamiento` (`id_tipo_funcionamiento`,`id_tipo_control`),
  ADD KEY `id_tipo_control` (`id_tipo_control`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalles_generales`
--
ALTER TABLE `detalles_generales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalles_puertas`
--
ALTER TABLE `detalles_puertas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipos_controles`
--
ALTER TABLE `tipos_controles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipos_funcionamientos`
--
ALTER TABLE `tipos_funcionamientos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipos_obras`
--
ALTER TABLE `tipos_obras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipos_patin_retractiles`
--
ALTER TABLE `tipos_patin_retractiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipos_puertas`
--
ALTER TABLE `tipos_puertas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `accesos`
--
ALTER TABLE `accesos`
  ADD CONSTRAINT `accesos_ibfk_1` FOREIGN KEY (`id_tipo_control`) REFERENCES `tipos_controles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `accesos_ibfk_2` FOREIGN KEY (`id_tipo_puerta`) REFERENCES `tipos_puertas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `accesos_ibfk_3` FOREIGN KEY (`id_tipo_funcionamiento`) REFERENCES `tipos_funcionamientos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalles_generales`
--
ALTER TABLE `detalles_generales`
  ADD CONSTRAINT `detalles_generales_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalles_puertas`
--
ALTER TABLE `detalles_puertas`
  ADD CONSTRAINT `detalles_puertas_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `detalles_puertas_ibfk_2` FOREIGN KEY (`id_tipo_puerta`) REFERENCES `tipos_puertas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `detalles_puertas_ibfk_3` FOREIGN KEY (`id_tipo_funcionamiento`) REFERENCES `tipos_funcionamientos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `detalles_puertas_ibfk_4` FOREIGN KEY (`id_tipo_control`) REFERENCES `tipos_controles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `detalles_puertas_ibfk_5` FOREIGN KEY (`id_patin_retractil`) REFERENCES `tipos_patin_retractiles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `habilitaciones_accesos`
--
ALTER TABLE `habilitaciones_accesos`
  ADD CONSTRAINT `habilitaciones_accesos_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_tipo_puerta`) REFERENCES `tipos_puertas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_tipo_control`) REFERENCES `tipos_controles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`id_acceso`) REFERENCES `accesos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
  ADD CONSTRAINT `tipos_puertas_ibfk_2` FOREIGN KEY (`id_tipo_funcionamiento`) REFERENCES `tipos_funcionamientos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
