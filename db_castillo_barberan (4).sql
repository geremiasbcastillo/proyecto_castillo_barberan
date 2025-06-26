-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2025 a las 23:05:58
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
-- Base de datos: `db_castillo_barberan`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Botines'),
(2, 'Camisetas'),
(3, 'Entrenamiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `id_mensaje` int(11) NOT NULL,
  `nombre_mensaje` varchar(50) NOT NULL,
  `telefono_mensaje` varchar(15) NOT NULL,
  `correo_mensaje` varchar(50) NOT NULL,
  `titulo_mensaje` varchar(80) NOT NULL,
  `consulta_mensaje` text NOT NULL,
  `estado_mensaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id_mensaje`, `nombre_mensaje`, `telefono_mensaje`, `correo_mensaje`, `titulo_mensaje`, `consulta_mensaje`, `estado_mensaje`) VALUES
(1, 'ss', '3794638461', 'bocaraton@mail.com', '', 'gf', 1),
(2, 'Geremias benjamín', '3794638461', 'geremiasbc@gmail.com', 'Cambio de una prenda', 'Me gustaría solicitar el cambio de una prenda que fue comprada el día 17 de mayo, ya que era un regalo para mi papá que no le gustó.', 1),
(3, 'Andres', '8', 'pepito12345@outlook.com', 'Devolución', 'Mjkdfaskjdsandkasjnpsdklasnxcklszncxaklsdmnclas', 1),
(4, 'botin adidas', '03795029606', 'andres@gmail.com', 'swef', 'asdasd', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

CREATE TABLE `detalle_ventas` (
  `id_detalle` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `detalle_cantidad` int(11) NOT NULL,
  `detalle_precio` float NOT NULL,
  `venta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_ventas`
--

INSERT INTO `detalle_ventas` (`id_detalle`, `producto_id`, `detalle_cantidad`, `detalle_precio`, `venta_id`) VALUES
(10, 9, 2, 60000, 22),
(11, 10, 1, 90000, 22),
(12, 10, 1, 90000, 23),
(13, 9, 1, 60000, 24),
(14, 10, 1, 90000, 25),
(15, 9, 1, 60000, 26),
(16, 9, 1, 60000, 27),
(17, 10, 1, 90000, 28),
(18, 10, 1, 90000, 29),
(19, 9, 1, 60000, 30),
(20, 11, 1, 80000, 30),
(21, 22, 1, 99999, 31),
(22, 26, 1, 179999, 31),
(23, 23, 1, 219999, 32),
(24, 9, 3, 60000, 33),
(25, 21, 1, 189999, 33),
(26, 11, 1, 80000, 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_estado` int(11) NOT NULL,
  `estado_descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `estado_descripcion`) VALUES
(0, 'INACTIVO'),
(1, 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `perfil_descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `perfil_descripcion`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'CLIENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `producto_descripcion` varchar(80) NOT NULL,
  `producto_nombre` varchar(60) NOT NULL,
  `producto_categoria` int(11) NOT NULL,
  `producto_precio` float NOT NULL,
  `producto_cantidad` int(11) NOT NULL,
  `producto_imagen` varchar(255) NOT NULL,
  `producto_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `producto_descripcion`, `producto_nombre`, `producto_categoria`, `producto_precio`, `producto_cantidad`, `producto_imagen`, `producto_estado`) VALUES
(9, 'Camiseta Manchester City Puma Titular 2024', 'Camiseta Manchester City ', 2, 60000, 20, '1749692223_133195324800383d6836.jpg', 1),
(10, 'Botín Puma Borussia TF', 'Botín Puma', 1, 90000, 6, '1750946412_942679ea94cf7b80dc56.png', 0),
(11, 'Camiseta Liverpool Nike Titular 2023', 'Camiseta Livepool', 2, 80000, 13, '1750304672_726be24452aeb43b628c.jpg', 1),
(12, 'Camiseta Boca Juniors Adidas Suplente 2025', 'Camiseta Boca Juniors', 2, 139999, 140, '1750946486_840f12bf22ba3c1d5343.jpg', 0),
(13, 'Camiseta Boca Juniors Adidas Titular 2025', 'Camiseta Boca Juniors', 2, 139999, 150, '1750944859_7ca6c683f8e027699309.jpg', 1),
(14, 'Camiseta Real Madrid Adidas Titular 2025', 'Camiseta Real Madrid', 2, 129999, 79, '1750944989_e6f4fa3b8de5a61d2d3b.jpg', 1),
(15, 'Camiseta Talleres Le Coq Sportif Titular 2025', 'Camiseta Talleres', 2, 89999, 4, '1750945076_4857033705b513151c51.jpg', 1),
(16, 'Camiseta Juventus Adidas Titular 2025', 'Camiseta Juventus', 2, 129999, 23, '1750945145_0a0f166248d5d27e3fc0.jpg', 1),
(17, 'Cono Demarcatorio Atletic Verde Por Unidad', 'Cono Demarcatorio', 3, 1499, 1200, '1750945261_2c177b87abdc70ad9d95.jpg', 1),
(18, 'Silbato Plano Con Correa DBR', 'Silbato DBR', 3, 4999, 14, '1750945312_08506717ee09d8875895.jpg', 1),
(19, 'Inflador Rebook Azul', 'Inflador Reebok', 3, 29999, 15, '1750945366_279bab7450426e3c0ae5.jpg', 1),
(20, 'Inflador DRB Doble Accion', 'Inflador DRB', 3, 19999, 3, '1750945442_540d884146b74556d480.jpg', 1),
(21, 'Botin Nike Mercurial Vapor 16 Elite FG Celeste', 'Botin Nike', 1, 189999, 23, '1750945601_20f62e283c05e451847b.jpg', 1),
(22, 'Botines Adidas F50 Pro LL TF Blanco', 'Botin Adidas', 1, 99999, 33, '1750945654_d65f8935fd15836b4d55.jpg', 1),
(23, 'Botines Adidas Predator Pro TF Negro', 'Botin Adidas', 1, 219999, 20, '1750945723_06341372c0920b123f12.jpg', 1),
(24, 'Botin Adidas X Crazyfast Elite FG Naranja', 'Botin Adidas', 1, 109999, 23, '1750945802_a16639cda6402c1f5d36.jpg', 1),
(25, 'Botin Puma Ultra 5 Ultimate FG Blanco', 'Botin Puma', 1, 199999, 18, '1750945894_585d9c9a0a40d1b2c254.jpg', 1),
(26, 'Botin Adidas F50 League Messi TF Plateado', 'Botin Adidas', 1, 179999, 15, '1750945947_dff18c7ca1e926a0d6ae.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nombre_usuarios` varchar(50) NOT NULL,
  `apellido_usuarios` varchar(40) NOT NULL,
  `correo_usuarios` varchar(50) NOT NULL,
  `telefono_usuarios` varchar(20) DEFAULT NULL,
  `dni_usuarios` int(11) DEFAULT NULL,
  `contraseña_usuarios` varchar(255) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `persona_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nombre_usuarios`, `apellido_usuarios`, `correo_usuarios`, `telefono_usuarios`, `dni_usuarios`, `contraseña_usuarios`, `perfil_id`, `persona_estado`) VALUES
(8, 'Geremias benjamín', 'Castillo', 'geremiasbcastillo@gmail.com', '3820184722', 0, '$2y$10$I50PlefBHcXHmA8A.9.8O.6s.BbQ5Ve9m0HNWrqd5de1h1wVHHmXW', 1, 1),
(10, 'Andres Leon', 'Barberan', 'andresbarberan@gmail.com', '31212312313', 0, '$2y$10$zwly.z1Wxmc1Mq54MUhqs.GOk9HxPDu3oayk/5V.DtDA1nH753pqi', 1, 1),
(11, 'Castillo', 'Benjamin', 'yiyinyyo@gmail.com', '3794638461', 0, '$2y$10$v5myjXjW3Vj4uvHGm5DGsOydR/99ygH7.pMYQ6d7Xre4nADj.nUPK', 2, 1),
(12, 'Pablito', 'HC', 'mono12@gmail.com', '03794638461', 324, '$2y$10$uskbCxPzbez4nAIvUAuR0e8wWKv1ybRQ4d9kIDJtjkHhB.LocpRtO', 2, 1),
(13, 'Miranda', 'Gomez', 'mirandagomez@gmail.com', '03794638461', 45645652, '$2y$10$yKP1GK5YybTXoXwjfSPzuOJuWF2szb67tQ5sjwFXsdPWooBsfaXF6', 2, 0),
(14, 'Juan', 'Gomez', 'juancito@gmail.com', '379312', 45454545, '$2y$10$qPYruuVC75bJWO2.jrYqi..3TXLe6AhAVZXiKaB.iwFnG6zWmI.lK', 2, 0),
(15, 'barberan', 'andres', 'andres@gmail.com', '03795029606', 34223, '$2y$10$GTxaX14CS7.vrKNtUca1Fu1ZBiEasZhY/pZIhJ3lDrxiHBb5/oZmO', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_ventas` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `venta_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_ventas`, `cliente_id`, `venta_fecha`) VALUES
(22, 12, '2025-06-17'),
(23, 12, '2025-06-17'),
(24, 12, '2025-06-17'),
(25, 12, '2025-06-17'),
(26, 12, '2025-06-18'),
(27, 12, '2025-06-18'),
(28, 12, '2025-06-18'),
(29, 13, '2025-06-26'),
(30, 12, '2025-06-26'),
(31, 14, '2025-06-26'),
(32, 14, '2025-06-26'),
(33, 14, '2025-06-26'),
(34, 15, '2025-06-26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id_mensaje`);

--
-- Indices de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `venta_id` (`venta_id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `producto_categoria` (`producto_categoria`),
  ADD KEY `producto_estado` (`producto_estado`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`),
  ADD KEY `persona_estado` (`persona_estado`),
  ADD KEY `perfil_id` (`perfil_id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_ventas`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_ventas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD CONSTRAINT `detalle_ventas_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `detalle_ventas_ibfk_2` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`id_ventas`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`producto_categoria`) REFERENCES `categorias` (`id_categoria`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`producto_estado`) REFERENCES `estados` (`id_estado`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`persona_estado`) REFERENCES `estados` (`id_estado`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id_perfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
