-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/


-- Autor: Jesus Cortazar Romera


-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2021 a las 20:14:02
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lindavista`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viviendas`
--

CREATE TABLE `viviendas` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `tipo` enum('piso','adosado','chalet','casa') NOT NULL,
  `zona` enum('centro','nervion','triana','aljarafe','macarena') NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `ndormitorios` enum('1','2','3','4','5') NOT NULL DEFAULT '3',
  `precio` decimal(10,0) NOT NULL,
  `tamaño` decimal(10,0) NOT NULL,
  `extras` varchar(100) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `viviendas`
--
ALTER TABLE `viviendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `viviendas`
--
ALTER TABLE `viviendas`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
