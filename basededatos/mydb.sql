-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-08-2024 a las 00:49:58
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
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `idcompra` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `idcomprador` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`idcompra`, `cantidad`, `idproducto`, `idcomprador`, `estado`) VALUES
(3, 1, 20, 35, 'pendiente'),
(4, 1, 27, 35, 'pendiente'),
(17, 1, 24, 35, 'pendiente'),
(21, 1, 41, 41, 'pendiente'),
(22, 1, 41, 41, 'pendiente'),
(23, 1, 35, 35, 'pendiente'),
(24, 1, 35, 35, 'pendiente'),
(25, 1, 35, 35, 'pendiente'),
(26, 1, 35, 35, 'pendiente'),
(27, 1, 16, 35, 'pendiente'),
(28, 1, 18, 35, 'pendiente'),
(29, 1, 16, 41, 'pendiente'),
(31, 1, 25, 41, 'pendiente'),
(32, 1, 28, 42, 'pendiente'),
(33, 1, 17, 41, 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `nombre`, `precio`, `stock`, `categoria`, `imagen`, `id_usuario`, `descripcion`) VALUES
(1, 'celular', 2500, 20210102, 15, NULL, NULL, NULL),
(2, 'Mesa', 5500, 20210110, 15, NULL, NULL, NULL),
(3, 'Modular', 14200, 20210210, 15, NULL, NULL, NULL),
(4, 'celular', 2500, 20210102, 15, NULL, NULL, NULL),
(5, 'Mesa', 5500, 20210110, 15, NULL, NULL, NULL),
(6, 'Modular', 14200, 20210210, 15, NULL, NULL, NULL),
(7, 'celular', 2500, 20210102, 15, NULL, NULL, NULL),
(8, 'Mesa', 5500, 20210110, 15, NULL, NULL, NULL),
(9, 'Modular', 14200, 20210210, 15, NULL, NULL, NULL),
(10, 'celular', 2500, 20210102, 15, NULL, NULL, NULL),
(11, 'Mesa', 5500, 20210110, 15, NULL, NULL, NULL),
(12, 'Modular', 14200, 20210210, 15, NULL, NULL, NULL),
(13, 'celular', 2500, 20210102, 15, NULL, NULL, NULL),
(14, 'Mesa', 5500, 20210110, 15, NULL, NULL, NULL),
(15, 'Modular', 14200, 20210210, 15, NULL, NULL, NULL),
(16, 'I phone 16', 35000, 10, 1, 'images/412TRO+fIuL._SL500_.jpg', 35, 'el novedoso '),
(17, 'I phone 15', 35000, 10, 1, 'images/412TRO+fIuL._SL500_.jpg', 35, 'el novedoso '),
(18, 'I phone 15', 35000, 25, 1, 'images/412TRO+fIuL._SL500_.jpg', 35, 'una vez mas'),
(19, 'Smart watch', 300, 300, 1, 'images/img-11.png', 35, 'Increible smart watch para ir a la moda'),
(20, 'Smart watch  para mujer', 350, 30, 1, 'images/img-15.png', 35, 'Para verse a la moda con lo ultimo de la tecnologia '),
(21, 'Michael Jackson vinilo', 3600, 1, 2, 'images/img-6.png', 35, 'Vinilo de coleccion firmado por el rey del pop'),
(22, 'Air pods', 5000, 35, 1, 'images/img-7.png', 35, 'Air pods originales, no fake'),
(23, 'Reloj automatico', 4000, 20, 3, 'images/img-8.png', 35, 'Elegante diseño, accesorio clasico para caballero.'),
(24, 'Fuente koblenz', 500, 23, 4, 'images/img-9.png', 35, 'fuente de poder portatil'),
(25, 'Alexa smart gadget', 1000, 70, 1, 'images/img-10.png', 35, 'Controla todo con tu voz con alexa, y compralo aqui y no en nuestra competencia. '),
(26, 'cojines para auto', 900, 16, 8, 'images/accesorios_fst.jpg', 35, 'cojines para auto'),
(27, 'Labial', 300, 10, 5, 'images/labial.jpg', 35, 'Labial rojo para toda ocasion '),
(28, 'Avion presidencial', 400, 10000, 15, 'images/avionP.jpg', 42, 'Rifa de avion presidencial ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombre`, `contrasena`, `email`) VALUES
(35, 'Oscar Rosales', '1234', 'zoohdeck@gmail.com'),
(36, 'Yahaira Puente', '12345', 'yaha@gmail.com'),
(39, 'nombre de ejemplo', '1234', 'ejemplo@gmail.com'),
(40, 'Melina Garcia', '1234', 'meli@gmail.com'),
(41, 'Lola Martinez', '123', 'lola@gmail.com'),
(42, 'Andres Manuel', 'bienestar', 'amlo@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`idcompra`),
  ADD KEY `idproducto` (`idproducto`),
  ADD KEY `idcomprador` (`idcomprador`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `fk_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `idcompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`idcomprador`) REFERENCES `usuarios` (`idusuario`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`idusuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
