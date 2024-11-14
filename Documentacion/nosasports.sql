-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-11-2024 a las 12:50:40
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE `NosaSports`;

USE `NosaSports`;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `NosaSports`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorito`
--

CREATE TABLE `favorito` (
  `id_favorito` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `likes` int(11) NOT NULL,
  `precio` int(11) NOT NULL DEFAULT 0,
  `descripcion` varchar(1000) NOT NULL,
  `deporte` varchar(20) DEFAULT NULL,
  `imagen` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `likes`, `precio`, `descripcion`, `deporte`, `imagen`) VALUES
(24, 'Balón de fútbol', 9868, 46, 'Balón de fútbol de muy buena calidad.', 'fútbol', '/NosaSports/Codigo/app/view/Img/futbol.webp'),
(25, 'Camiseta de fútbol', 10456, 110, 'Camiseta de alta calidad con posibilidad de elegir número de dorsal y nombre.', 'fútbol', NULL),
(26, 'Guantes de boxeo', 5876, 31, 'Guantes de boxeo fabricados con espuma de látex.', 'boxeo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reseña`
--

CREATE TABLE `reseña` (
  `texto` varchar(1000) DEFAULT NULL,
  `puntuacion` int(11) NOT NULL,
  `id_reseña` int(11) NOT NULL,
  `nombre_usuario_reseña` varchar(20) DEFAULT NULL,
  `id_producto_reseña` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre_usuario` varchar(16) NOT NULL,
  `correo` varchar(70) NOT NULL,
  `nombreapellidos` varchar(100) NOT NULL,
  `contraseña` varchar(20) NOT NULL,
  `direccion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre_usuario`, `correo`, `nombreapellidos`, `contraseña`, `direccion`) VALUES
('123', '123@C', '123', '123', '1232'),
('234324', '23424', '234', '34234', '23424'),
('admin', 'admin@admin.com', 'admin admin admin', 'admin', 'calle admin'),
('admin2', 'admin2@a.c', 'admin2', 'admin2', 'admin2'),
('admin3', 'admin3@a.a', 'admin3', 'admin3', 'asdsad'),
('asdasdasdas', '45345353', 'asdsadd', '123', 'dsadsa'),
('pablo_prueba1', 'prueba1@gmail.com', 'pablo pablo dadadad', '123', 'sdasds, asd sadsdas, calle 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wishlist`
--

CREATE TABLE `wishlist` (
  `nombre_usuario` varchar(20) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_wishlist` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `favorito`
--
ALTER TABLE `favorito`
  ADD PRIMARY KEY (`id_favorito`),
  ADD KEY `clave_id_producto_favorito` (`id_producto`),
  ADD KEY `clave_nombreusuario_favorito` (`nombre_usuario`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `clave_idproducto_pedido` (`id_producto`),
  ADD KEY `clave_nombreusuario_pedido` (`nombre_usuario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `reseña`
--
ALTER TABLE `reseña`
  ADD PRIMARY KEY (`id_reseña`),
  ADD KEY `clave_idproducto_reseña` (`id_producto_reseña`),
  ADD KEY `clave_nombreusuario_reseña` (`nombre_usuario_reseña`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nombre_usuario`,`correo`);

--
-- Indices de la tabla `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`),
  ADD KEY `clave_idproducto_wishlist` (`id_producto`),
  ADD KEY `clave_nombreusuario_wishlist` (`nombre_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `favorito`
--
ALTER TABLE `favorito`
  MODIFY `id_favorito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `reseña`
--
ALTER TABLE `reseña`
  MODIFY `id_reseña` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `favorito`
--
ALTER TABLE `favorito`
  ADD CONSTRAINT `clave_id_producto_favorito` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `clave_nombreusuario_favorito` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `clave_idproducto_pedido` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `clave_nombreusuario_pedido` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`);

--
-- Filtros para la tabla `reseña`
--
ALTER TABLE `reseña`
  ADD CONSTRAINT `clave_idproducto_reseña` FOREIGN KEY (`id_producto_reseña`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `clave_nombreusuario_reseña` FOREIGN KEY (`nombre_usuario_reseña`) REFERENCES `usuario` (`nombre_usuario`);

--
-- Filtros para la tabla `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `clave_idproducto_wishlist` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `clave_nombreusuario_wishlist` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
