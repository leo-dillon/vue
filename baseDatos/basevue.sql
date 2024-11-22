-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2024 a las 15:15:11
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `basevue`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `imagen`, `descripcion`, `categoria`) VALUES
(1, 'Celular Moto G54', 60000.00, 'public/moto1.png', 'Celular de gama media con buen rendimiento y cámara de 50 MP', 'Celulares'),
(2, 'Celular Moto G65', 70000.00, 'public/moto2.png', 'Celular con gran capacidad de batería y cámara de alta resolución', 'Celulares'),
(3, 'Celular Moto G75', 80000.00, 'public/moto3.png', 'Celular con pantalla de 120Hz y procesador eficiente', 'Celulares'),
(4, 'Samsung Tab S7', 75000.00, 'public/tablet11.png', 'Tablet con pantalla de 11 pulgadas y soporte para S Pen', 'Tablets'),
(5, 'Samsung Tab A7', 80000.00, 'public/tablet2.png', 'Tablet económica con buena duración de batería y pantalla de 10 pulgadas', 'Tablets'),
(6, 'Samsung Tab A8', 85000.00, 'public/tablet3.png', 'Tablet con procesador actualizado y pantalla de alta resolución', 'Tablets'),
(7, 'Samsung TV Qled 55\'', 250000.00, 'public/tv1.png', 'Televisor QLED de 55 pulgadas con resolución 4K', 'Televisores'),
(8, 'Samsung TV Oled 55\'', 350000.00, 'public/tv2.png', 'Televisor OLED de 55 pulgadas con colores intensos y negros profundos', 'Televisores'),
(9, 'Samsung TV Neo 55\'', 300000.00, 'public/tv3.png', 'Televisor Neo QLED de 55 pulgadas con excelente calidad de imagen', 'Televisores'),
(10, 'Notebook Dell I5', 450000.00, 'public/dell1.png', 'Notebook con procesador Intel Core i5 y 8GB de RAM', 'Notebooks'),
(11, 'Notebook Dell Ryzen 5', 400000.00, 'public/dell2.png', 'Notebook con procesador Ryzen 5 y pantalla Full HD', 'Notebooks'),
(12, 'Notebook Dell I7', 500000.00, 'public/dell1.png', 'Notebook de alto rendimiento con Intel Core i7 y 16GB de RAM', 'Notebooks');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `usuario`, `contraseña`, `mail`) VALUES
(1, 'Leonardo', 'Dillon', 'Leonardo Dillon', 'leo123', 'leonardo.dillon@davinci.edu.ar'),
(2, 'Malena', 'Caparros', 'Malena Caparros', 'male123', 'malena.caparros@davinci.edu.ar'),
(3, 'Ezequiel', 'Messina', 'Ezequiel Messina', 'eze123', 'ezequiel.messina@davinci.edu.ar');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
