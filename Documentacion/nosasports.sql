-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 02-02-2025 a las 22:55:14
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE NosaSports;
USE NosaSports;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `NosaSports`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_producto`, `nombre_usuario`) VALUES
(134, 34, 'admin'),
(135, 35, 'admin'),
(136, 35, 'admin'),
(137, 48, 'admin'),
(138, 93, 'admin'),
(139, 35, 'admin'),
(140, 37, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(200) NOT NULL,
  `likes` int(11) NOT NULL,
  `precio` decimal(11,2) NOT NULL DEFAULT 0.00,
  `descripcion` varchar(10000) NOT NULL,
  `deporte` varchar(20) DEFAULT NULL,
  `imagen` varchar(3000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `likes`, `precio`, `descripcion`, `deporte`, `imagen`) VALUES
(33, 'Camiseta CB Canarias', 0, 28.00, 'Camiseta de baloncesto diseñada con un tejido ligero y transpirable, que permite la máxima comodidad y libertad de movimiento durante el juego. Con un estilo moderno y un ajuste cómodo.', 'baloncesto', '/NosaSports/Codigo/app/view/Img/cami_baloncesto.webp'),
(34, 'Balón Wilson NBA', 0, 15.00, 'Balón de baloncesto fabricado con materiales de alta calidad, ofreciendo un excelente agarre y durabilidad. Perfecto tanto para jugar en interiores como en exteriores, ideal para entrenamientos y competiciones.', 'baloncesto', '/NosaSports/Codigo/app/view/Img/pelota_baloncesto.webp'),
(35, 'Canasta Portátil', 0, 15.00, 'Balón de baloncesto fabricado con materiales de alta calidad, ofreciendo un excelente agarre y durabilidad. Perfecto tanto para jugar en interiores como en exteriores, ideal para entrenamientos y competiciones.', 'baloncesto', '/NosaSports/Codigo/app/view/Img/canasta.webp'),
(37, 'Zapatillas Baloncesto', 1, 100.00, ' Zapatos de baloncesto diseñados para ofrecer soporte y tracción en la cancha. Con una construcción ligera y cómoda, garantizan un ajuste seguro y son ideales para jugadores que buscan rendimiento y estilo.', 'baloncesto', '/NosaSports/Codigo/app/view/Img/zapatillas_baloncesto.webp'),
(40, 'Short de Baloncesto', 0, 30.00, 'Short de baloncesto econfeccionados con un tejido ligero y transpirable que permite la máxima libertad de movimiento. Con un diseño cómodo y moderno, son perfectos para entrenamientos y partidos.\r\n', 'baloncesto', '/NosaSports/Codigo/app/view/Img/Q10543AR4321_658_PHSFH001_2000.png'),
(41, 'Camiseta Leyma Coruña', 0, 74.95, 'Una camiseta para la historia. Primera temporada del equipo coruñes en la ACB y empiezan ganando sobre la bocina al Real Madrid. Épico.\r\n\r\nEn Madbasket tenemos la suerte de poder ofreceros ésta maravillosa camiseta', 'baloncesto', '/NosaSports/Codigo/app/view/Img/camiseta-leyma-coruna.jpg'),
(42, 'Camiseta Boston Celtics', 0, 130.00, 'Camiseta de 195639 de los Boston Celtics Hardwood Classics Road Swingman para hombre El programa de la NBA Hardwood Classics Swingman conmemora el legado de los jugadores de baloncesto más célebres. Inspirada en las equipaciones que utilizaban las leyendas de la NBA.', 'baloncesto', '/NosaSports/Codigo/app/view/Img/camiseta_boston_celtics.avif'),
(43, 'Camiseta Los Angeles Lakers', 0, 115.00, 'Elige una imagen diferente, pero no menos auténtica. Esta camiseta tiene un diseño y una calidad de fabricación excepcionales para ofrecer lo último en ropa de baloncesto.', 'baloncesto', '/NosaSports/Codigo/app/view/Img/los-angeles-lakers.avif'),
(45, 'Camiseta Chicago Bulls Michael Jordan 1997 ', 1, 302.00, 'Adopta ese elegante estilo retro con esta excelente prenda. Retorna a una época pasada para lucir un fantástico look vintage.', 'baloncesto', '/NosaSports/Codigo/app/view/Img/chicago-bulls.avif'),
(46, 'Camiseta Denver Nuggets', 0, 115.00, 'Cada franquicia tiene sus verdaderos colores, una identidad inconfundible que la distingue del resto de la liga. Esta camiseta de los Denver Nuggets, que rinde homenaje a la rica herencia del básquetbol, ​​está inspirada en la que usan los profesionales en la cancha, desde los detalles del escuadrón hasta la l', 'baloncesto', '/NosaSports/Codigo/app/view/Img/camiseta-denver-nuggets.avif'),
(47, 'Camiseta 3º Equipación Sevilla', 0, 95.00, 'Equípate como tus jugadores preferidos. Esta camiseta de manga corta, que luce el primer equipo en los partidos, es la mejor manera de demostrar tu orgullo y pasión por el equipo.', 'fútbol', '/NosaSports/Codigo/app/view/Img/camiseta_sevilla.avif'),
(48, 'Camiseta 1º Equipación Athletic Bilbao ', 0, 89.00, 'Equípate como tus jugadores preferidos. Esta camiseta de manga corta, que luce el primer equipo en los partidos, es la mejor manera de demostrar tu orgullo y pasión por el equipo.', 'fútbol', '/NosaSports/Codigo/app/view/Img/athletic-bilbao.jpg'),
(50, 'Camiseta Selección Española', 10456, 110.00, 'Camiseta de alta calidad con posibilidad de elegir número de dorsal y nombre.', 'fútbol', '/NosaSports/Codigo/app/view/Img/Camiseta.png'),
(51, 'Camiseta 1ºEquipación Real Sociedad', 0, 89.00, 'Equípate como tus jugadores preferidos. Esta camiseta de manga corta, que luce el primer equipo en los partidos, es la mejor manera de demostrar tu orgullo y pasión por el equipo.', 'fútbol', '/NosaSports/Codigo/app/view/Img/real-sociedad.avif'),
(52, 'Camiseta 1º Equipación Rayo Vallecano', 0, 89.00, 'Equípate como tus jugadores preferidos. Esta camiseta de manga corta, que luce el primer equipo en los partidos, es la mejor manera de demostrar tu orgullo y pasión por el equipo.', 'fútbol', '/NosaSports/Codigo/app/view/Img/rayo-vallecano.avif'),
(53, 'Camiseta 1º Equipación Deportivo de La Coruña', 0, 85.00, 'La camiseta oficial Arsenio Estrela rinde homenaje a Arsenio Iglesias, o zorro de Arteixo, una de las figuras claves y leyenda blanquiazul.\r\n\r\nEn este caso, el diseño está dedicado a su faceta como jugador del Deportivo.', 'fútbol', '/NosaSports/Codigo/app/view/Img/deportivo-1.jpg'),
(54, 'Camiseta 2º Equipación Deportivo de La Coruña ', 0, 72.25, 'La camiseta oficial del Deportivo de la Coruña de la 2ª equipación, se llama &quot;Arsenio Lenda&quot;. Un diseño exclusivo entre ambas entidades, que como el primer uniforme, está dedicado a Arsenio Iglesias, el personaje con mayor influencia directa en el terreno de juego en los 117 años de historia del RC Deportivo.', 'fútbol', '/NosaSports/Codigo/app/view/Img/deportivo-2.jpg'),
(55, 'Paraguas Automático Deportivo de La Coruña', 0, 18.00, 'paraguas manual infantil transparente con el escudo del Deportivo en azul. ', 'fútbol', '/NosaSports/Codigo/app/view/Img/paraguas-depor.jpg'),
(56, 'Botas Adidas Predator Elite', 0, 280.00, 'Comienza cada partido sabiendo que perforarás la portería con esta bota de fútbol adidas Predator Elite creada para marcar goles. Presenta un empeine HybridTouch flexible con inserciones de goma Strikeskin estratégicamente situadas y una lengüeta plegable que ofrecen un mejor contacto con el balón. ', 'fútbol', '/NosaSports/Codigo/app/view/Img/predator-elite.avif'),
(57, 'Botas F50 Elite Laceless', 0, 270.00, 'Acelera tu ritmo al máximo con la ligereza del calzado adidas F50, diseñado para dotar a tus pies de una velocidad vertiginosa. Esta bota de fútbol sin cordones presenta un empeine Fibertouch fino, un panel de tejido adidas PRIMEKNIT alrededor del tobillo que te proporciona una sujeción excepcional, y una textura Sprintweb 3D que mantiene el balón pegado al pie mientras vuelas sobre el terreno de juego. La suela Sprintframe 360 te ofrece una aceleración explosiva en campos de césped natural húmedo.', 'fútbol', '/NosaSports/Codigo/app/view/Img/botas-f50.webp'),
(58, 'Guantes Sirius 2.0', 0, 55.92, 'El Sirius 2.0 ha llegado para redefinir la portería. Con un diseño revolucionario y el nuevo tejido de alto rendimiento AirFlex Pro, este guante establece un nuevo estándar en flexibilidad, comodidad, ajuste y transpiración. Combina ligereza y ajuste con armado a la perfección. ¡El arma definitiva para porteros que exigen lo mejor!', 'fútbol', '/NosaSports/Codigo/app/view/Img/guantes-sirius.jpg'),
(59, 'Guantes Scorpius ', 0, 59.42, 'Descubre la evolución del guante de portero más exitoso, ahora más ligero y ajustado como una segunda piel. El Scorpius 2.0 UGT+ II presenta un corte Negativo y la palma de Látex Alemán 100% natural UGT+.', 'fútbol', '/NosaSports/Codigo/app/view/Img/guantes-scorpius.jpg'),
(60, 'Botas Copa Pure 2 Elite FG', 0, 137.99, 'Estas botas forman parte de la colección Energy Citrus Pack', 'fútbol', '/NosaSports/Codigo/app/view/Img/botas-copa-pure.jpg'),
(90, 'Camiseta UD Las Palmas', 0, 89.99, 'Equípate como tus jugadores preferidos. Esta camiseta de manga corta, que luce el primer equipo en los partidos, es la mejor manera de demostrar tu orgullo y pasión por el equipo.', 'fútbol', '/NosaSports/Codigo/app/view/Img/las-palmas.avif'),
(91, 'Raqueta Babolat Pure Drive', 0, 149.95, 'La gama Babolat Pure Drive con la que juegan Lucas Pouille, Fabio Fognini, Garbine Muguruza y Sofia Kenin se ha actualizado con un diseño más llamativo y moderno. En efecto, estas raquetas juegan con la simetría y los tonos de azul gracias al uso de un azul marino mate y un azul metálico. La potencia proporcionada por estos Pure Drives seguirá siendo excepcional, mientras que su explosividad y comodidad vuelven a mejorar en esta versión.', 'tenis', '/NosaSports/Codigo/app/view/Img/raqueta-babolat.jpg'),
(92, 'Raqueta Pure Strike 97', 0, 176.95, 'La gama de raquetas Babolat Pure Strike ha sido renovada para ofrecer aún más control y una sensación mejorada. Siguiendo los pasos de Cameron Norrie y Dominic Thiem, será ideal para los jugadores que busquen dominar la pista con golpes agresivos o para los contraatacantes que busquen golpear todas las zonas de la pista con precisión. Su emblemático color se ha mantenido, con más rojo y la inscripción &quot;Strike&quot; en el corazón.\r\nEsta raqueta Pure Strike 97 es perfecta para los jugadores experimentados que buscan la máxima precisión.', 'tenis', '/NosaSports/Codigo/app/view/Img/raqueta-pure-strike.jpg'),
(93, 'Raqueta Babolat Aero Rafa', 0, 227.95, 'La raqueta de tenis Babolat Pure Aero Rafa es la versión más ligera del modelo Origin, que se basa en las exactas especificaciones de Rafael Nadal. Será ideal para ofrecer a los jugadores la posibilidad de generar una potencia y unos efectos excepcionales pero con más maniobrabilidad. El diseño trabajado con Rafa cuenta con el amarillo y el negro de la Pure Aero pero también incluye sus colores favoritos como el fucsia, el azul, el naranja, así como el lima.', 'tenis', '/NosaSports/Codigo/app/view/Img/raqueta-pure-aero.jpg'),
(94, 'Bola Dunlop CX Performance 12 Raquetas', 0, 125.99, 'El diseño de la bolsa Dunlop representa los códigos y colores de las raquetas Cx', 'tenis', '/NosaSports/Codigo/app/view/Img/bolsa-cx.jpg'),
(96, 'Tubo de 3 bolas verdes Babolat', 0, 6.25, 'La pelota de tenis Babolat Green forma parte de la gama de iniciación de Babolat', 'tenis', '/NosaSports/Codigo/app/view/Img/pelotas-babolat-verde.jpg'),
(97, 'Tubo de 4 bolas Dunlop Fort Select', 0, 7.95, 'Han sido diseñadas para el juego de élite en todas las superficies', 'tenis', '/NosaSports/Codigo/app/view/Img/tubo-dunlop-fort.jpg'),
(98, 'Tubo de 4 bolas Head Pro', 0, 6.90, 'ha mejorado las características de juego para lograr trayectorias estables y una buena vivacidad de rebote.\r\nEl fieltro SmartOptik™ optimiza la visibilidad y el exclusivo compuesto de caucho hace que esta pelota sea muy duradera.', 'tenis', '/NosaSports/Codigo/app/view/Img/head-pro.jpg'),
(99, 'Raquetero Babolat Pure Strike 6', 0, 103.95, 'Este raquetero Babolat Pure Strike 6 raquetas es perfecto para llevar todo tu equipamiento de tenis gracias a sus múltiples compartimentos de almacenamiento. Su diseño en blanco, rojo y negro combina con las raquetas Pure Strike para ofrecerte un look completo.', 'tenis', '/NosaSports/Codigo/app/view/Img/babolat-raquetero-6.jpg'),
(100, 'Raquetero Babolat Pure Aero Rafa 12 ', 0, 139.95, 'Fue diseñada en colaboración con Rafael Nadal. Los colores elegidos están directamente asociados a la pala utilizada por el jugador español desde principios de 2023. Sobre una base negra se añadirán fucsia, amarillo y azul en diversos detalles como logotipos, cremalleras y registros.', 'tenis', '/NosaSports/Codigo/app/view/Img/babolat-bolsa-rafa.jpg'),
(104, 'Landazor bolas Slinder', 0, 1098.99, 'La máquina mas deseada', 'tenis', '/NosaSports/Codigo/app/view/Img/slinder-lanzador.jpg'),
(105, 'Saco de Boxeo Venum', 0, 599.99, 'El Saco de Boxeo Venum Flex Standing ha sido diseñada para permitirle trabajar eficientemente con su técnica de kickboxing o Muay Thai.El Saco de Boxeo Venum Flex Standing manejará tus más poderosos golpes, gracias a su espuma altamente absorbente y su duradera cubierta de cuero PU.Llenada, su base flexible ofrecerá una mejor respuesta a los golpes y una buena amortiguación en cada impacto.Con una altura aproximada de 180 cm, este equipo Venum es un compañero de entrenamiento ideal y ofrece una interesante alternativa a los sacos de boxeo.', 'boxeo', '/NosaSports/Codigo/app/view/Img/saco-boxeo-venum.webp'),
(107, 'Venum Impact Evo Guantes de Boxeo', 0, 109.99, 'Presentamos Venum Impact Evo, una gama completa de equipamiento diseñada para ofrecer una protección superior, acabados premium y un estilo minimalista. Ahora disponible en impresionantes nuevos colores.Los guantes de boxeo Venum Impact Evo en Púrpura Profundo están diseñados para boxeo, kickboxing y Muay Thai, siendo ideales para entrenamientos en saco, trabajo técnico y sparring. La espuma de triple densidad proporciona una protección excepcional, absorbiendo el impacto de cada golpe y contraataque.Estos guantes están fabricados con cuero Skintex de alta calidad para garantizar una excelente durabilidad. Las perforaciones en la palma, el pulgar y la muñeca permiten que el guante respire, prolongando aún más su vida útil.El hilo beige sigue las líneas de la construcción anatómica del guante, creando un efecto de contraste sutil. Pequeños logotipos beige en los nudillos y la muñeca mantienen el diseño discreto pero impactante.Los guantes de boxeo Venum Impact combinan a la perfección con el equipamiento del resto de la gama Venum Impact Evo.', 'boxeo', '/NosaSports/Codigo/app/view/Img/venus-impact.webp'),
(108, 'Venum Graffiti Guantes de Boxeo', 0, 89.90, 'Asuma riesgos, mantenga el rumbo, aplaste sus objetivos. La colección para mujeres Venum Graffiti inspira la valentía interior.Los guantes de boxeo Venum Graffiti en Urban Charcoal están hechos con espuma de triple densidad para una excelente absorción de impactos. El diseño ergonómico de los guantes, la muñequera ajustable y los puños alargados brindan comodidad y soporte adicionales. Mientras tanto, las costuras reforzadas maximizan la vida útil de estos guantes de PU de primera calidad.Adecuados para boxeo, kickboxing y muay thai, con uso regular (3-4 veces por semana).', 'boxeo', '/NosaSports/Codigo/app/view/Img/venum-graffiti.webp'),
(109, 'Venus Tiger Guantes de Boxeo', 0, 89.99, 'La caza ha comenzado. Venum Tiger es una gama completa de equipo de deportes de combate y ropa de rendimiento inspirada en el poder, la agilidad y el coraje de este depredador tan temible.Con una espuma de triple densidad, estos guantes de boxeo Venum ofrecen una absorción de impactos óptima y una protección efectiva para tus manos. Un sistema de cierre de gancho y bucle proporciona un soporte personalizado para la muñeca para un golpe explosivo, una y otra vez.El diseño impactante de los Guantes de Boxeo Venum Tiger captura la ferocidad desbordante de un gato salvaje, a mitad de caza. Este es el guante perfecto para los atletas con ese borde salvaje.Combínalos con la ropa de rendimiento de la misma colección.', 'boxeo', '/NosaSports/Codigo/app/view/Img/venum-tiger.webp'),
(110, 'Venum X Top Rank', 0, 160.00, 'Presentamos Venum x Top Rank Original, una colección en colaboración. Esta línea completa de ropa y equipamiento Venum ha sido desarrollada para poner a los atletas en la mejor posición posible para rendir, tal y como Top Rank ha hecho durante más de 50 años en la promoción del boxeo.', 'boxeo', '/NosaSports/Codigo/app/view/Img/venum-rank.webp');

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

--
-- Volcado de datos para la tabla `reseña`
--

INSERT INTO `reseña` (`texto`, `puntuacion`, `id_reseña`, `nombre_usuario_reseña`, `id_producto_reseña`) VALUES
('mola', 5, 2, 'admin', 33),
('hola', 1, 3, 'admin', 93);

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
('admin', 'admin2@admin.com', 'admin admin admin', 'admin', 'calle admin'),
('admin2', 'admin2@a.c', 'admin2', 'admin2', 'admin2'),
('admin3', 'admin3@a.a', 'admin3', 'admin3', 'asdsad'),
('asdasdasdas', '45345353', 'asdsadd', '123', 'dsadsa'),
('jorge2', 'jorge@jorge.jorge', 'Jorge', '12345678', 'grela de paleo'),
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
-- Volcado de datos para la tabla `wishlist`
--

INSERT INTO `wishlist` (`nombre_usuario`, `id_producto`, `id_wishlist`) VALUES
('admin', 35, 3),
('admin', 92, 5),
('admin', 93, 9),
('admin', 50, 10),
('admin', 109, 11),
('admin', 54, 12),
('admin', 93, 13),
('admin', 50, 14),
('admin', 109, 15),
('admin', 54, 16),
('admin', 93, 17),
('admin', 50, 18),
('admin', 109, 19),
('admin', 54, 20),
('admin', 93, 21),
('admin', 50, 22),
('admin', 109, 23),
('admin', 54, 24);

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT de la tabla `reseña`
--
ALTER TABLE `reseña`
  MODIFY `id_reseña` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

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
