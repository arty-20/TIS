-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2019 a las 05:23:04
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `baset`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auxiliar`
--

CREATE TABLE `auxiliar` (
  `ID_AUXILIAR` int(11) NOT NULL,
  `CONTRASENIA` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `EMAIL` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `NOMBRE_AUXILIAR` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `APELLIDO_AUXILIAR` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `CODIGO_SIS` int(15) NOT NULL,
  `ESTADO` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `auxiliar`
--

INSERT INTO `auxiliar` (`ID_AUXILIAR`, `CONTRASENIA`, `EMAIL`, `NOMBRE_AUXILIAR`, `APELLIDO_AUXILIAR`, `CODIGO_SIS`, `ESTADO`) VALUES
(10001, 'arturo', 'arturo@gmail.com', 'arturo', 'adrian huaylla', 201604415, 1),
(10002, 'antony', 'antony@gmail.com', 'antony', 'maceda choque', 201604435, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `ID_DOCENTE` int(11) NOT NULL,
  `CONTRASENIA` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `EMAIL` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `NOMBRE_DOCENTE` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `APELLIDO_DOCENTE` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `TELEFONO` int(11) DEFAULT NULL,
  `CODIGO_DOCENTE` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ESTADO` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`ID_DOCENTE`, `CONTRASENIA`, `EMAIL`, `NOMBRE_DOCENTE`, `APELLIDO_DOCENTE`, `TELEFONO`, `CODIGO_DOCENTE`, `ESTADO`) VALUES
(1001, 'leticia', 'leticia@gmail.com', 'leticia', 'blanco coca', 65879022, '19900624', 1),
(1002, 'corina', 'corina@gmail.com', 'corina', 'flores villarroel', 54545454, '55544122', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente-materia`
--

CREATE TABLE `docente-materia` (
  `ID_DOCENTE-MATERIA` int(11) NOT NULL,
  `ID_MATERIA` int(11) NOT NULL,
  `ID_DOCENTE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `docente-materia`
--

INSERT INTO `docente-materia` (`ID_DOCENTE-MATERIA`, `ID_MATERIA`, `ID_DOCENTE`) VALUES
(1, 501, 1001),
(2, 501, 1002),
(3, 502, 1001);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `ID_ESTUDIANTE` int(11) NOT NULL,
  `CONTRASENIA` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `EMAIL` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `NOMBRE_ESTUDIANTE` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `APELLIDO_ESTUDIANTE` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `CODIGO_SIS` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `ESTADO` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`ID_ESTUDIANTE`, `CONTRASENIA`, `EMAIL`, `NOMBRE_ESTUDIANTE`, `APELLIDO_ESTUDIANTE`, `CODIGO_SIS`, `ESTADO`) VALUES
(100001, 'laura', 'laura@gmail.com', 'laura', 'sejas', '201903325', 1),
(100002, '1234', 'cc@gmail.com', 'Antony', 'maceda', '201601234', 1),
(100003, '1234', 'asfa@gmail.com', 'pablo', 'flores', '12312123', 1),
(100004, '12345', 'asd@gmial.com', 'arty', 'adrian', '201901234', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion`
--

CREATE TABLE `gestion` (
  `ID_GESTION` int(11) NOT NULL,
  `NOMBRE_GESTION` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ESTADO` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `gestion`
--

INSERT INTO `gestion` (`ID_GESTION`, `NOMBRE_GESTION`, `ESTADO`) VALUES
(301, 'SemestreUMSS 1-2019', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo-clase`
--

CREATE TABLE `grupo-clase` (
  `ID_GRUPO` int(11) NOT NULL,
  `ID_DOC-MAT` int(11) NOT NULL,
  `ID_HORA` int(11) NOT NULL,
  `ID_AUX` int(11) NOT NULL,
  `DIA` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `ESTADO_GC` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `grupo-clase`
--

INSERT INTO `grupo-clase` (`ID_GRUPO`, `ID_DOC-MAT`, `ID_HORA`, `ID_AUX`, `DIA`, `ESTADO_GC`) VALUES
(1, 1, 1, 10001, 'lunes', 1),
(2, 1, 1, 10001, 'martes', 1),
(3, 3, 2, 10002, 'martes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hora-clase`
--

CREATE TABLE `hora-clase` (
  `ID_HORA` int(11) NOT NULL,
  `HORA_INICIO` time NOT NULL,
  `HORA_FIN` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `hora-clase`
--

INSERT INTO `hora-clase` (`ID_HORA`, `HORA_INICIO`, `HORA_FIN`) VALUES
(1, '08:15:00', '09:45:00'),
(2, '09:45:00', '11:15:00'),
(3, '11:15:00', '12:45:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `ID_INSCRIPCION` int(11) NOT NULL,
  `ID_ESTUDIANTE` int(11) NOT NULL,
  `ID_GRUPO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`ID_INSCRIPCION`, `ID_ESTUDIANTE`, `ID_GRUPO`) VALUES
(1, 100004, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `ID_MATERIA` int(11) NOT NULL,
  `NOMBRE_MATERIA` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ESTADO` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`ID_MATERIA`, `NOMBRE_MATERIA`, `ESTADO`) VALUES
(501, 'Introducción a la programación', 1),
(502, 'Elementos y Estructura de Datos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portafolio`
--

CREATE TABLE `portafolio` (
  `ID_PORTAFOLIO` int(11) NOT NULL,
  `ID_INSCRIPCION` int(11) NOT NULL,
  `ARCHIVOS` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `COMENTARIO_AUXILIAR` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica-grupo`
--

CREATE TABLE `practica-grupo` (
  `ID_PRAC_GRUPO` int(11) NOT NULL,
  `ID_GRUPO` int(11) NOT NULL,
  `NOMBRE_SESION` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `FECHA` date NOT NULL,
  `PRACTICA` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auxiliar`
--
ALTER TABLE `auxiliar`
  ADD PRIMARY KEY (`ID_AUXILIAR`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`ID_DOCENTE`);

--
-- Indices de la tabla `docente-materia`
--
ALTER TABLE `docente-materia`
  ADD PRIMARY KEY (`ID_DOCENTE-MATERIA`),
  ADD KEY `fk_docente-doc_mat` (`ID_DOCENTE`),
  ADD KEY `fk_materia-doc_mat` (`ID_MATERIA`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`ID_ESTUDIANTE`);

--
-- Indices de la tabla `gestion`
--
ALTER TABLE `gestion`
  ADD PRIMARY KEY (`ID_GESTION`);

--
-- Indices de la tabla `grupo-clase`
--
ALTER TABLE `grupo-clase`
  ADD PRIMARY KEY (`ID_GRUPO`),
  ADD KEY `fk_grupo-doc_mat` (`ID_DOC-MAT`),
  ADD KEY `fk_grupo-aux` (`ID_AUX`),
  ADD KEY `fk_grupo-hora` (`ID_HORA`);

--
-- Indices de la tabla `hora-clase`
--
ALTER TABLE `hora-clase`
  ADD PRIMARY KEY (`ID_HORA`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`ID_INSCRIPCION`),
  ADD KEY `fk_inscr-est` (`ID_ESTUDIANTE`),
  ADD KEY `fk_inscr-grupo` (`ID_GRUPO`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`ID_MATERIA`);

--
-- Indices de la tabla `portafolio`
--
ALTER TABLE `portafolio`
  ADD PRIMARY KEY (`ID_PORTAFOLIO`);

--
-- Indices de la tabla `practica-grupo`
--
ALTER TABLE `practica-grupo`
  ADD PRIMARY KEY (`ID_PRAC_GRUPO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auxiliar`
--
ALTER TABLE `auxiliar`
  MODIFY `ID_AUXILIAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10003;
--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `ID_DOCENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;
--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `ID_ESTUDIANTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100005;
--
-- AUTO_INCREMENT de la tabla `gestion`
--
ALTER TABLE `gestion`
  MODIFY `ID_GESTION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;
--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `ID_INSCRIPCION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `ID_MATERIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=503;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `docente-materia`
--
ALTER TABLE `docente-materia`
  ADD CONSTRAINT `fk_docente-doc_mat` FOREIGN KEY (`ID_DOCENTE`) REFERENCES `docente` (`ID_DOCENTE`),
  ADD CONSTRAINT `fk_materia-doc_mat` FOREIGN KEY (`ID_MATERIA`) REFERENCES `materia` (`ID_MATERIA`);

--
-- Filtros para la tabla `grupo-clase`
--
ALTER TABLE `grupo-clase`
  ADD CONSTRAINT `fk_grupo-aux` FOREIGN KEY (`ID_AUX`) REFERENCES `auxiliar` (`ID_AUXILIAR`),
  ADD CONSTRAINT `fk_grupo-doc_mat` FOREIGN KEY (`ID_DOC-MAT`) REFERENCES `docente-materia` (`ID_DOCENTE-MATERIA`),
  ADD CONSTRAINT `fk_grupo-hora` FOREIGN KEY (`ID_HORA`) REFERENCES `hora-clase` (`ID_HORA`);

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `fk_inscr-est` FOREIGN KEY (`ID_ESTUDIANTE`) REFERENCES `estudiante` (`ID_ESTUDIANTE`),
  ADD CONSTRAINT `fk_inscr-grupo` FOREIGN KEY (`ID_GRUPO`) REFERENCES `grupo-clase` (`ID_GRUPO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
