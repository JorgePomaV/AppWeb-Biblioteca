-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-06-2024 a las 13:22:01
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `base_tareas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id` int NOT NULL,
  `tipoEstado` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `color` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `tipoEstado`, `color`) VALUES
(1, 'ToDo', '#36b9cc'),
(2, 'Doing', '#4e73df'),
(3, 'Finished', '#1cc88a'),
(4, 'Expired', '#e74a3b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `id` int NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `expired_at` datetime NOT NULL,
  `fk_id_estado` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`id`, `titulo`, `descripcion`, `created_at`, `updated_at`, `deleted_at`, `expired_at`, `fk_id_estado`) VALUES
(14, 'Usuario', 'Una vez que el usuario pudo loguearse que pueda elegir los productos que desea comprar', '2024-06-12 12:02:32', NULL, NULL, '2024-06-12 00:00:00', 2),
(27, 'Clientes', 'Se necesita listado de clientes que paguen con TC y el total de lo facturado a cada uno de enero a marzo 2024', '2024-06-12 12:44:38', NULL, NULL, '2024-06-05 00:00:00', 4),
(28, 'Correcciones', 'Corregir parciales taller de Comunicación IFTS 16', '2024-06-12 12:51:17', NULL, NULL, '2024-06-14 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea_usuario`
--

CREATE TABLE `tarea_usuario` (
  `id` int NOT NULL,
  `fk_id_usuario` int NOT NULL,
  `fk_id_tarea` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Volcado de datos para la tabla `tarea_usuario`
--

INSERT INTO `tarea_usuario` (`id`, `fk_id_usuario`, `fk_id_tarea`) VALUES
(13, 4, 14),
(16, 4, 27),
(17, 4, 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4  NOT NULL,
  `apellido` varchar(50) CHARACTER SET utf8mb4  NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `avatar`, `email`, `pass`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Juan Pablo', 'Cesarini', 'img20240311_19371145.jpg', 'jpablocesarini@gmail.com', 0xd24705858e42ab55ed8a7dddaeca130a, '2024-05-15 19:34:42', '2024-06-09 16:03:56', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_estado` (`fk_id_estado`);

--
-- Indices de la tabla `tarea_usuario`
--
ALTER TABLE `tarea_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_tarea` (`fk_id_tarea`),
  ADD KEY `fk_id_usuario` (`fk_id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `tarea_usuario`
--
ALTER TABLE `tarea_usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD CONSTRAINT `tarea_ibfk_1` FOREIGN KEY (`fk_id_estado`) REFERENCES `estado` (`id`);

--
-- Filtros para la tabla `tarea_usuario`
--
ALTER TABLE `tarea_usuario`
  ADD CONSTRAINT `tarea_usuario_ibfk_1` FOREIGN KEY (`fk_id_tarea`) REFERENCES `tarea` (`id`),
  ADD CONSTRAINT `tarea_usuario_ibfk_2` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
