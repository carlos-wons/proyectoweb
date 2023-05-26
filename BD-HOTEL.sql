-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 21-05-2023 a las 05:22:03
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactanos`
--

CREATE TABLE `contactanos` (
  `id` int(3) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `mensaje` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `contactanos`
--

INSERT INTO `contactanos` (`id`, `nombre`, `email`, `mensaje`) VALUES
(1, 'Carlos Alberto', 'carlos@gmail.com', 'hola mundo'),
(8, 'Paola ', 'Paolita@yahoo.com', 'Su pagina esta bien fea :('),
(9, 'Diana', 'dcb@hotmail.com', 'La mejor página del mundo mundial. :D'),
(10, 'German Guzman', 'como@outlook.com', 'No se entristezcan, sigan viniendo.'),
(11, 'Ñoño Barriga Pérez', 'nonito@gmail.com', 'Está chido su hotel, pero más chido uno de Acapulco.'),
(12, 'Monserrat Álbarran González', 'monse@mail.com', 'Todo limpio y ordenado.'),
(13, 'Samano', 'samano@gmail.com', 'Aunque esta pagina sea para un proyecto de fin de semestre, está quedando mamalón.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

CREATE TABLE `reservacion` (
  `id` int(3) NOT NULL,
  `tipohabitaciones` varchar(10) NOT NULL,
  `numerohabitaciones` int(3) NOT NULL,
  `entrada` varchar(15) NOT NULL,
  `salida` varchar(15) NOT NULL,
  `nombreCliente` varchar(80) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `idUsuario` int(3) NOT NULL,
  `adultos` int(3) NOT NULL,
  `jovenes` int(3) NOT NULL,
  `costoTotal` int(6) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion` (`id`, `tipohabitaciones`, `numerohabitaciones`, `entrada`, `salida`, `nombreCliente`, `telefono`, `idUsuario`, `adultos`, `jovenes`, `costoTotal`, `status`) VALUES
(1, 'Ejecutiva', 3, '2023-04-29', '2023-04-30', 'Pepe Luis', '4451234567', 1, 2, 1, 2000, 'vigente'),
(10, 'Ejecutiva', 2, '2023-05-13', '2023-05-16', 'Pancrasio el grande', '4451100080', 1, 2, 2, 2000, 'vigente'),
(14, 'Ejecutiva', 2, '2023-05-14', '2023-05-15', 'Pancho Villa', '3332221144', 1, 3, 1, 2000, 'vigente'),
(15, 'Ejecutiva', 2, '2023-05-14', '2023-05-15', 'Isaac López', '2223331144', 1, 4, 0, 2000, 'vigente'),
(17, 'Ejecutiva', 3, '2023-05-14', '2023-05-14', 'Ñoño Barriga Pérez', '2221114455', 1, 1, 4, 2000, 'vigente'),
(18, 'Ejecutiva', 4, '2023-05-14', '2023-05-15', 'Clase nocturna', '2225554477', 6, 3, 2, 2000, 'vigente'),
(19, 'Suite', 5, '2023-05-30', '2023-05-30', 'Clase nocturna', '4454582147', 6, 3, 2, 3000, 'vigente'),
(20, 'Suite', 3, '2023-05-21', '2023-07-30', 'carlos', '4454561123', 8, 3, 2, 3000, 'vigente'),
(23, 'Estandar', 2, '2023-05-28', '2023-05-31', 'Isaac', '4451031697', 10, 3, 2, 7200, 'vigente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(3) NOT NULL,
  `usuario` varchar(80) NOT NULL,
  `contraseña` varchar(25) NOT NULL,
  `rol` varchar(15) NOT NULL,
  `correo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contraseña`, `rol`, `correo`) VALUES
(1, 'root', '1234', 'admin', ''),
(3, 'jejejejej', '1234567890', 'admin', 'jejeje@gmail.com'),
(4, 'Prueba definitiva', '1234567890', 'admin', 'DENIFR7@GMAIL.COM'),
(5, 'Isaacsillo', '1234567890', 'admin', 'vjeofp@gmail.com'),
(6, 'Clase nocturna', '1234567890', 'admin', 'escuela@itsur.com'),
(7, 'Diego', '12345678', 'admin', 'dj.morales@itsur.edu.mx'),
(8, 'carlos', 'carlos1234', 'admin', 'carlos@hotmail.com'),
(9, 'Mario', 'mario123', 'admin', 'mariobros@gmail.com'),
(10, 'Isaac', 'isaac12345', 'cliente', 'isaac@gmail.com'),
(11, 'Hugo', 'hugo123456', 'admin', 'hugo@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactanos`
--
ALTER TABLE `contactanos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactanos`
--
ALTER TABLE `contactanos`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD CONSTRAINT `idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
