-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-08-2023 a las 20:10:57
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_movimientos`
--
CREATE DATABASE IF NOT EXISTS `db_movimientos` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_movimientos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familiares`
--

CREATE TABLE `familiares` (
  `id_familia` int(3) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `rol` enum('padre/madre','hijo/hija','otro/otra') NOT NULL,
  `edad` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `familiares`
--

INSERT INTO `familiares` (`id_familia`, `nombre`, `rol`, `edad`) VALUES
(1, 'Damian Suarez', 'padre/madre', 41),
(2, 'Julia Zambrano', 'padre/madre', 44),
(3, 'Alberto Suarez', 'hijo/hija', 16),
(4, 'Julia Suarez', 'hijo/hija', 19),
(5, 'Delia Fernández', 'otro/otra', 77);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id_mov` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` enum('ingreso','egreso') NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `monto` float(9,2) NOT NULL,
  `forma_de_pago` enum('efectivo','cheque','tarjeta de crédito','transferencia bancaria') NOT NULL,
  `id_familia` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`id_mov`, `fecha`, `tipo`, `descripcion`, `monto`, `forma_de_pago`, `id_familia`) VALUES
(1, '2023-06-01', 'ingreso', 'Cobro de sueldo', 145500.45, 'transferencia bancaria', 1),
(2, '2023-06-08', 'ingreso', 'Cobro de Sueldo', 251000.78, 'transferencia bancaria', 2),
(3, '2023-06-09', 'egreso', 'Compra de Mercadería', 75000.45, 'tarjeta de crédito', 5),
(4, '2023-06-10', 'ingreso', 'Cobro de Jubilación', 156000.45, 'transferencia bancaria', 5),
(5, '2023-06-18', 'ingreso', 'Cobro de Beca', 52000.25, 'transferencia bancaria', 3),
(6, '2023-06-19', 'egreso', 'Gastos en Automóvil', 35560.25, 'tarjeta de crédito', 1),
(7, '2023-06-20', 'egreso', 'Pago de impuestos', 45365.45, 'tarjeta de crédito', 2),
(8, '2023-06-20', 'egreso', 'Gastos en educación', 24000.85, 'transferencia bancaria', 3),
(9, '2023-06-20', 'egreso', 'Pago de cuota de viaje', 38000.00, 'transferencia bancaria', 2),
(10, '2023-06-21', 'ingreso', 'Cobro de sueldo', 62000.78, 'efectivo', 4),
(11, '2023-06-22', 'egreso', 'Pago cuota colegio', 32000.00, 'tarjeta de crédito', 2),
(12, '2023-06-24', 'egreso', 'Gastos en vestimenta', 35600.12, 'efectivo', 4),
(13, '2023-06-26', 'egreso', 'Gastos en hogar', 45000.45, 'tarjeta de crédito', 2),
(14, '2023-07-01', 'ingreso', 'Cobro de sueldo', 158400.75, 'transferencia bancaria', 1),
(15, '2023-07-07', 'ingreso', 'Cobro de sueldo', 251000.45, 'transferencia bancaria', 2),
(16, '2023-07-08', 'egreso', 'Compra de Mercadería', 86000.45, 'tarjeta de crédito', 5),
(17, '2023-07-10', 'ingreso', 'Cobro de Jubilación', 156000.45, 'transferencia bancaria', 5),
(18, '2023-07-18', 'ingreso', 'Cobro de Beca', 52000.25, 'transferencia bancaria', 3),
(19, '2023-07-19', 'egreso', 'Gastos en Automóvil', 24500.25, 'tarjeta de crédito', 1),
(20, '2023-07-20', 'egreso', 'Pago de impuestos', 47465.45, 'tarjeta de crédito', 2),
(21, '2023-07-20', 'egreso', 'Gastos en entretenimientos', 35000.65, 'efectivo', 3),
(22, '2023-07-20', 'egreso', 'Pago de cuota de viaje', 38000.00, 'transferencia bancaria', 1),
(23, '2023-07-21', 'ingreso', 'Cobro de sueldo', 62000.78, 'efectivo', 4),
(24, '2023-07-22', 'egreso', 'Pago cuota colegio', 32000.00, 'tarjeta de crédito', 2),
(25, '2023-07-24', 'egreso', 'Gastos en entretenimiento', 25000.12, 'efectivo', 4),
(26, '2023-07-26', 'egreso', 'Gastos en costrucción', 150000.00, 'efectivo', 1),
(27, '2023-07-28', 'ingreso', 'Cobro de trabajo profesional', 170000.00, 'efectivo', 1),
(28, '2023-07-31', 'egreso', 'Compra de materiales de construcción', 178000.00, 'efectivo', 2),
(29, '2023-08-01', 'ingreso', 'Cobro de sueldo', 159400.75, 'transferencia bancaria', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `familiares`
--
ALTER TABLE `familiares`
  ADD PRIMARY KEY (`id_familia`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id_mov`),
  ADD KEY `FK_id_familia` (`id_familia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `familiares`
--
ALTER TABLE `familiares`
  MODIFY `id_familia` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id_mov` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `movimientos_ibfk_1` FOREIGN KEY (`id_familia`) REFERENCES `familiares` (`id_familia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
