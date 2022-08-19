-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-08-2020 a las 10:00:08
-- Versión del servidor: 10.3.22-MariaDB-cll-lve
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hoteles`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `id_habitacion` int(11) NOT NULL,
  `numero_habitacion` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `piso` int(30) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`id_habitacion`, `numero_habitacion`, `tipo`, `piso`, `id_usuario`, `foto`) VALUES
(19, 101, 'individual', 1, 6, 'img_401c4bedd2e6d1cfac0af587481883e4.jpg'),
(20, 102, 'magna', 1, 6, 'img_cc206d12ed032cc3e40b8c2ddf5517a6.jpg'),
(21, 103, 'matrimonial ', 2, 6, 'img_401c4bedd2e6d1cfac0af587481883e4.jpg'),
(22, 104, 'individual', 1, 6, 'img_ba2b26518a6052d68e51331ba8b659e1.jpg'),
(23, 105, 'king', 2, 6, 'img_befcbbf39cab70fb3da73801b7de12ba.jpg'),
(24, 101, 'individual', 1, 5, 'img_c8d24e0b1958518e9950c70a9611fa61.jpg'),
(25, 102, 'individual', 1, 5, 'img_70a8ab4407e4075b85225fbd689603ce.jpg'),
(28, 105, 'king', 2, 5, 'img_da47f3dec41beba75189aa8d03ab0aa2.jpg'),
(29, 106, 'magna', 2, 5, 'img_8971c7c045012612d799f5b787a86703.jpg'),
(32, 107, 'matrimonial ', 1, 5, 'img_f0212e329f22601170f0f44aa987e22c.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `numero_habitacion` int(30) NOT NULL,
  `numero_noches` int(11) NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL,
  `lugar` varchar(255) NOT NULL,
  `numero_personas` int(11) NOT NULL,
  `coche` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `precio_noche` int(11) NOT NULL,
  `precio_total` int(11) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `title`, `numero_habitacion`, `numero_noches`, `nombre_usuario`, `lugar`, `numero_personas`, `coche`, `start`, `end`, `precio_noche`, `precio_total`, `color`, `id_usuario`) VALUES
(18, 'habitacion 101', 101, 2, 'juan diego ', 'Mexico', 2, 'si', '2020-08-08 00:00:00', '2020-08-09 00:00:00', 22, 22, '#40E0D0', 6),
(20, 'habitacion 101', 101, 2, 'paola cecilia', 'Mexico', 2, 'si', '2020-08-09 00:00:00', '2020-08-11 00:00:00', 222, 2222, '#0071c5', 5),
(21, 'habitacion 102', 102, 2, 'Juan Diego ', 'Gutierrez Zamora', 2, 'si', '2020-08-09 00:00:00', '2020-08-10 00:00:00', 222, 222, '#0071c5', 5),
(24, 'habitacion 105', 105, 2, 'Erubiel Villa ', 'papantla', 2, 'no', '2020-08-10 00:00:00', '2020-08-15 00:00:00', 500, 1000, '#0071c5', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(500) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `nombre_usuario` varchar(200) NOT NULL,
  `tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `clave`, `nombre_usuario`, `tipo_usuario`) VALUES
(4, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrador', 1),
(5, 'cliente1', 'd94019fd760a71edf11844bb5c601a4de95aacaf', 'cliente1', 2),
(6, 'cliente2', 'd94019fd760a71edf11844bb5c601a4de95aacaf', 'cliente2', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`id_habitacion`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `numero_habitacion` (`numero_habitacion`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `numero_habitacion` (`numero_habitacion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `id_habitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD CONSTRAINT `habitaciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`numero_habitacion`) REFERENCES `habitaciones` (`numero_habitacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
