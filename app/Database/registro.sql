-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-02-2022 a las 03:50:30
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_alumno`
--

CREATE TABLE `alm_alumno` (
  `alm_id` int(11) NOT NULL,
  `alm_codigo` varchar(100) NOT NULL,
  `alm_nombre` varchar(100) NOT NULL,
  `alm_edad` int(11) NOT NULL,
  `alm_sexo` varchar(100) NOT NULL,
  `alm_id_grd` int(11) NOT NULL,
  `alm_observacion` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grd_grado`
--

CREATE TABLE `grd_grado` (
  `grd_id` int(11) NOT NULL,
  `grd_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mat_materia`
--

CREATE TABLE `mat_materia` (
  `mat_id` int(11) NOT NULL,
  `mat_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mxg_materiasxgrado`
--

CREATE TABLE `mxg_materiasxgrado` (
  `mxg_id` int(11) NOT NULL,
  `mxg_id_grad` int(11) NOT NULL,
  `mxg_id_mat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alm_alumno`
--
ALTER TABLE `alm_alumno`
  ADD PRIMARY KEY (`alm_id`),
  ADD KEY `alm_id_grd` (`alm_id_grd`);

--
-- Indices de la tabla `grd_grado`
--
ALTER TABLE `grd_grado`
  ADD PRIMARY KEY (`grd_id`);

--
-- Indices de la tabla `mat_materia`
--
ALTER TABLE `mat_materia`
  ADD PRIMARY KEY (`mat_id`);

--
-- Indices de la tabla `mxg_materiasxgrado`
--
ALTER TABLE `mxg_materiasxgrado`
  ADD PRIMARY KEY (`mxg_id`),
  ADD KEY `mxg_id_grad` (`mxg_id_grad`,`mxg_id_mat`),
  ADD KEY `mxg_id_mat` (`mxg_id_mat`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alm_alumno`
--
ALTER TABLE `alm_alumno`
  MODIFY `alm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grd_grado`
--
ALTER TABLE `grd_grado`
  MODIFY `grd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mat_materia`
--
ALTER TABLE `mat_materia`
  MODIFY `mat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mxg_materiasxgrado`
--
ALTER TABLE `mxg_materiasxgrado`
  MODIFY `mxg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alm_alumno`
--
ALTER TABLE `alm_alumno`
  ADD CONSTRAINT `alm_alumno_ibfk_1` FOREIGN KEY (`alm_id_grd`) REFERENCES `grd_grado` (`grd_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `mxg_materiasxgrado`
--
ALTER TABLE `mxg_materiasxgrado`
  ADD CONSTRAINT `mxg_materiasxgrado_ibfk_1` FOREIGN KEY (`mxg_id_grad`) REFERENCES `grd_grado` (`grd_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mxg_materiasxgrado_ibfk_2` FOREIGN KEY (`mxg_id_mat`) REFERENCES `mat_materia` (`mat_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
