-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-04-2024 a las 03:47:07
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pyxeles`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` text DEFAULT NULL,
  `maker` varchar(40) DEFAULT NULL,
  `item_condition` varchar(30) NOT NULL,
  `stock` int(11) NOT NULL,
  `number` varchar(45) DEFAULT NULL,
  `sku` varchar(45) DEFAULT NULL,
  `place` varchar(40) DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `sale` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `name`, `description`, `maker`, `item_condition`, `stock`, `number`, `sku`, `place`, `price`, `sale`) VALUES
(8, '  Ram  ', '  Memoria de 8gb DDR4 SODIMM  ', '  samsung  ', 'item_condition', 1, '123456789', '  987654321  ', '  MercadoLibre  ', 250.00, 340.00),
(18, 'ram', '8gb', '', 'Buena', 1, '1212', '1213', '', 0.00, 0.00),
(19, 'RAM', '8 gb', '', 'buena', 1, '2334', '5667', '', 0.00, 0.00),
(20, 'RAM', '8 gb', '', 'buena', 1, '2334544', '963963', '', 0.00, 0.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
