-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2022 a las 01:59:20
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_catar`
--
CREATE DATABASE IF NOT EXISTS `db_catar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_catar`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id_equipo` int(11) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `puntos` int(11) NOT NULL,
  `pj` int(11) NOT NULL,
  `pg` int(11) NOT NULL,
  `pe` int(11) NOT NULL,
  `pp` int(11) NOT NULL,
  `gf` int(11) NOT NULL,
  `gc` int(11) NOT NULL,
  `dif` int(11) NOT NULL,
  `fk_id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `pais`, `puntos`, `pj`, `pg`, `pe`, `pp`, `gf`, `gc`, `dif`, `fk_id_grupo`) VALUES
(20, 'Argentina', 999, 999, 999, 999, 0, 999, 0, 999, 6),
(23, 'Brasil', 1, 2, 13, 4, 5, 23, 4, 24, 6),
(24, 'España', 1, 1, 1, 1, 3, 4, 1, 4, 6),
(25, 'Qatar', 2, 3, 4, 5, 6, 8, 9, 2, 7),
(26, 'Estados Unidos', 3, 4, 2, 5, 2, 1, 6, 8, 7),
(27, 'Paises Bajos', 2, 5, 23, 45, 5, 25, 2, 5, 6),
(28, 'Alemania', 7, 2, 4, 5, 2, 4, 5, 1, 11),
(30, 'Inglaterra', 6, 32, 4, 2, 3, 4, 2, 2, 6),
(31, '0000', 0, 0, 0, 0, 0, 0, 0, 0, 11),
(32, 'Cenegal', 1, 3, 5, 1, 0, 1, 2, 5, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id_grupo` int(11) NOT NULL,
  `nombre` varchar(1) NOT NULL,
  `finalizado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id_grupo`, `nombre`, `finalizado`) VALUES
(6, 'A', 1),
(7, 'B', 0),
(11, 'D', 0),
(12, 'C', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `email` varchar(50) NOT NULL,
  `contrasenia` varchar(260) NOT NULL,
  `administrador` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`email`, `contrasenia`, `administrador`) VALUES
('admin@admin.com', '$2y$10$MVEidpxDsbTEKrwkYE75du73lr4IrAsQvDKDw1YGhD/.KfN99LJXO', 1),
('probanding@asd.com', '$2y$10$9j7qoTXCxzQOHRi2gH/4Qe386mtpsLoz0HGVkTR7JwQ7WbZpyirN2', 0),
('user@user.com', '$2y$10$eFcluDlPctx.M2o/ehAGF.MIX2SNrHzFYuxlic5QRmNj4Bcx6rRBm', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `id_grupo` (`fk_id_grupo`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`fk_id_grupo`) REFERENCES `grupos` (`id_grupo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
