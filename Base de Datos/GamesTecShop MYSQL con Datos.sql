-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2025 a las 07:50:15
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
-- Base de datos: `gamestec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idCarrito` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fechaCreacionCarrito` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`idCarrito`, `idUsuario`, `fechaCreacionCarrito`) VALUES
(3, 5, '2025-06-05 00:16:29'),
(5, 6, '2025-06-05 00:40:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombreCategoria`) VALUES
(1, 'Mundo Abierto'),
(2, 'Deportes'),
(3, 'Supervivencia'),
(4, 'Shooter'),
(5, 'Demo Web'),
(6, 'Sanbox'),
(7, 'Realidad Virtual'),
(8, 'Pelea'),
(9, 'SimulaciÃ³n'),
(10, 'Carreras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(30) NOT NULL,
  `primerApellidoUsuario` varchar(20) NOT NULL,
  `segundoApellidoUsuario` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `idUsuario`, `nombreUsuario`, `primerApellidoUsuario`, `segundoApellidoUsuario`) VALUES
(1, 5, 'Jonathan Eduardo', 'Moo', 'Mijares'),
(2, 6, 'Julio', 'Carrillo', 'AlemÃ¡n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datostarjeta`
--

CREATE TABLE `datostarjeta` (
  `idTarjeta` int(11) NOT NULL,
  `nombreTitular` varchar(100) NOT NULL,
  `numeroTarjeta` varchar(18) NOT NULL,
  `vencimientoTarjeta` date NOT NULL,
  `CVV` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `datostarjeta`
--

INSERT INTO `datostarjeta` (`idTarjeta`, `nombreTitular`, `numeroTarjeta`, `vencimientoTarjeta`, `CVV`) VALUES
(1, 'Jonathan', '8234923984932432', '0000-00-00', '1131'),
(2, 'Julio Carrillo AlemÃ¡n', '1798343279823244', '2039-12-01', '1322'),
(3, 'Julio Carrillo AlemÃ¡n DÃ©bito', '1238129842305235', '2030-05-01', '1323');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecarrito`
--

CREATE TABLE `detallecarrito` (
  `idDetalleCarrito` int(11) NOT NULL,
  `idCarrito` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidadProductos` int(11) DEFAULT 1,
  `precioUnitario` decimal(10,2) DEFAULT NULL,
  `subtotalProductos` decimal(10,2) GENERATED ALWAYS AS (`cantidadProductos` * `precioUnitario`) STORED
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `detallecarrito`
--

INSERT INTO `detallecarrito` (`idDetalleCarrito`, `idCarrito`, `idProducto`, `cantidadProductos`, `precioUnitario`) VALUES
(3, 3, 4, 1, 600.00),
(4, 3, 5, 1, 500.00),
(6, 5, 4, 1, 600.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `idDetalle` int(11) NOT NULL,
  `idVenta` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioUnitario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`idDetalle`, `idVenta`, `idProducto`, `cantidad`, `precioUnitario`) VALUES
(1, 1, 1, 1, 400.00),
(2, 1, 2, 1, 300.00),
(3, 3, 5, 1, 500.00);

--
-- Disparadores `detalle_venta`
--
DELIMITER $$
CREATE TRIGGER `actualizar_inventario_despues_venta` AFTER INSERT ON `detalle_venta` FOR EACH ROW BEGIN
    UPDATE productos
    SET inventarioProducto = inventarioProducto - NEW.cantidad
    WHERE idProducto = NEW.idProducto;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `nombreProducto` varchar(180) NOT NULL,
  `descripcionProducto` text DEFAULT NULL,
  `precioProducto` decimal(10,2) NOT NULL DEFAULT 0.00,
  `inventarioProducto` int(11) NOT NULL DEFAULT 0,
  `linkProducto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `idCategoria`, `imagen`, `nombreProducto`, `descripcionProducto`, `precioProducto`, `inventarioProducto`, `linkProducto`) VALUES
(1, 1, 'gow.jpeg', 'God Of War', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu lacinia ipsum. Donec facilisis, est eu egestas congue, ipsum justo eleifend dolor, quis consequat nisi diam sed tortor.', 400.00, 49, ''),
(2, 1, 'gtaV.jpg', 'Grand Theft Auto V', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu lacinia ipsum. Donec facilisis, est eu egestas congue, ipsum justo eleifend dolor, quis consequat nisi diam sed tortor.', 300.00, 29, ''),
(3, 1, 'fz5.jpg', 'Forza Horizon 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu lacinia ipsum. Donec facilisis, est eu egestas congue, ipsum justo eleifend dolor, quis consequat nisi diam sed tortor.', 500.00, 36, ''),
(4, 1, 'cp.jpeg', 'Cyberpunk', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu lacinia ipsum. Donec facilisis, est eu egestas congue, ipsum justo eleifend dolor, quis consequat nisi diam sed tortor.', 600.00, 20, ''),
(5, 3, 'MC.jpg', 'Minecraft JAVA', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu lacinia ipsum. Donec facilisis, est eu egestas congue, ipsum justo eleifend dolor, quis consequat nisi diam sed tortor.', 500.00, 39, ''),
(6, 2, 'ps22.jpeg', 'PES 2022', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu lacinia ipsum. Donec facilisis, est eu egestas congue, ipsum justo eleifend dolor, quis consequat nisi diam sed tortor.', 230.00, 20, ''),
(7, 2, 'f24.jpg', 'FC24', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu lacinia ipsum. Donec facilisis, est eu egestas congue, ipsum justo eleifend dolor, quis consequat nisi diam sed tortor.', 500.00, 30, ''),
(8, 3, 'rust.jpg', 'RUST', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu lacinia ipsum. Donec facilisis, est eu egestas congue, ipsum justo eleifend dolor, quis consequat nisi diam sed tortor.', 250.00, 40, ''),
(9, 3, 're.jpeg', 'Resident Evil 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu lacinia ipsum. Donec facilisis, est eu egestas congue, ipsum justo eleifend dolor, quis consequat nisi diam sed tortor.', 300.00, 19, ''),
(10, 4, 'w.jpg', 'Call of Duty Warzone', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu lacinia ipsum. Donec facilisis, est eu egestas congue, ipsum justo eleifend dolor, quis consequat nisi diam sed tortor.', 0.00, 100, ''),
(11, 4, 'HR.jpg', 'Halo Reach ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu lacinia ipsum. Donec facilisis, est eu egestas congue, ipsum justo eleifend dolor, quis consequat nisi diam sed tortor.', 200.00, 30, ''),
(12, 4, 'gof.jpg', 'Gears of War 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu lacinia ipsum. Donec facilisis, est eu egestas congue, ipsum justo eleifend dolor, quis consequat nisi diam sed tortor.', 500.00, 60, ''),
(13, 5, 'mariobros.jpg', 'Super Mario Bros', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu lacinia ipsum. Donec facilisis, est eu egestas congue, ipsum justo eleifend dolor, quis consequat nisi diam sed tortor.', 0.00, 100, 'https://jcw87.github.io/c2-smb1/'),
(14, 5, 'sans.png', 'Pelea Contra Sans el Esqueleto', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu lacinia ipsum. Donec facilisis, est eu egestas congue, ipsum justo eleifend dolor, quis consequat nisi diam sed tortor.', 0.00, 100, 'https://jcw87.github.io/c2-sans-fight/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetacliente`
--

CREATE TABLE `tarjetacliente` (
  `idTarjeta` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tarjetacliente`
--

INSERT INTO `tarjetacliente` (`idTarjeta`, `idCliente`) VALUES
(1, 1),
(2, 2),
(3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuarios`
--

CREATE TABLE `tipousuarios` (
  `idTipoUsuario` int(11) NOT NULL,
  `tipoUsuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tipousuarios`
--

INSERT INTO `tipousuarios` (`idTipoUsuario`, `tipoUsuario`) VALUES
(2, 'Administrador'),
(1, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `correoUsuario` varchar(100) NOT NULL,
  `contrasenaUsuario` varchar(255) DEFAULT NULL,
  `idTipoUsuario` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `correoUsuario`, `contrasenaUsuario`, `idTipoUsuario`) VALUES
(1, 'iticweb@gmail.com', '$2y$10$s7A0PaSSANMlDj5JohTl.OvmGN4nx4aX7lwngHI3UMIn6Dw7BOeRW', 2),
(2, 'erick2004@gmail.com', '$2y$10$BfR0UQJQQNmOCaeMo1bzzuzdFedQ/5D72tG3aNHUhuQsYa44J7aKO', 2),
(3, 'jorge2004@gmail.com', '$2y$10$5htrF4jMI6JSnzMbCb.3QOh8Z.SOWjl/znV9I5YX1/HbLruf/iwNO', 2),
(4, 'juliocarrillo@gmail.com', '$2y$10$VHD.BhQg1QDutY4vAAuBSuBa24iJnLkpf0j/RhGW6j4gMZnp2R8au', 2),
(5, 'cliente1@gmail.com', '$2y$10$zWq23UV2vsKwPraDszNLfungu82XdNCzs726bAk36KlqsR5NidDhS', 1),
(6, 'maestro@gmail.com', '$2y$10$hyGHyHdoFor3cAARUt6tOOqAf9yo9QD48TiG4A6Vdn9izpQOKYCTy', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idVenta` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idTarjeta` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idVenta`, `idCliente`, `idTarjeta`, `total`, `fecha`) VALUES
(1, 1, 1, 700.00, '2025-06-05 11:32:11'),
(2, 2, 2, 0.00, '2025-06-05 12:37:07'),
(3, 2, 2, 500.00, '2025-06-05 12:38:02'),
(4, 2, 2, 0.00, '2025-06-05 12:47:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`idCarrito`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `datostarjeta`
--
ALTER TABLE `datostarjeta`
  ADD PRIMARY KEY (`idTarjeta`);

--
-- Indices de la tabla `detallecarrito`
--
ALTER TABLE `detallecarrito`
  ADD PRIMARY KEY (`idDetalleCarrito`),
  ADD KEY `idCarrito` (`idCarrito`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`idDetalle`),
  ADD KEY `idVenta` (`idVenta`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `tarjetacliente`
--
ALTER TABLE `tarjetacliente`
  ADD KEY `idTarjeta` (`idTarjeta`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `tipousuarios`
--
ALTER TABLE `tipousuarios`
  ADD PRIMARY KEY (`idTipoUsuario`),
  ADD UNIQUE KEY `tipoUsuario` (`tipoUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `correoUsuario` (`correoUsuario`),
  ADD KEY `idTipoUsuario` (`idTipoUsuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idVenta`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idTarjeta` (`idTarjeta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `idCarrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `datostarjeta`
--
ALTER TABLE `datostarjeta`
  MODIFY `idTarjeta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detallecarrito`
--
ALTER TABLE `detallecarrito`
  MODIFY `idDetalleCarrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `idDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tipousuarios`
--
ALTER TABLE `tipousuarios`
  MODIFY `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);

--
-- Filtros para la tabla `detallecarrito`
--
ALTER TABLE `detallecarrito`
  ADD CONSTRAINT `detallecarrito_ibfk_1` FOREIGN KEY (`idCarrito`) REFERENCES `carrito` (`idCarrito`),
  ADD CONSTRAINT `detallecarrito_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`);

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`idVenta`) REFERENCES `ventas` (`idVenta`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`);

--
-- Filtros para la tabla `tarjetacliente`
--
ALTER TABLE `tarjetacliente`
  ADD CONSTRAINT `tarjetacliente_ibfk_1` FOREIGN KEY (`idTarjeta`) REFERENCES `datostarjeta` (`idTarjeta`),
  ADD CONSTRAINT `tarjetacliente_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tipousuarios` (`idTipoUsuario`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `tarjetacliente` (`idCliente`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`idTarjeta`) REFERENCES `tarjetacliente` (`idTarjeta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
