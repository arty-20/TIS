-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2019 a las 19:21:16
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tis2`
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
(10001, 'arturo', 'arturo@gmail.com', 'Arturo', 'Adrian Huaylla', 201604415, 1),
(10002, 'antony', 'antony@gmail.com', 'Antony', 'Maceda Choque', 201604435, 1);

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
(1001, 'leticia', 'leticia@gmail.com', 'Leticia', 'Blanco Coca', 65879022, '19900624', 1),
(1002, 'corina', 'corina@gmail.com', 'Corina', 'Flores Villarroel', 54545454, '55544122', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente_materia`
--

CREATE TABLE `docente_materia` (
  `ID_DOCENTE_MATERIA` int(11) NOT NULL,
  `ID_MATERIA` int(11) NOT NULL,
  `ID_DOCENTE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `docente_materia`
--

INSERT INTO `docente_materia` (`ID_DOCENTE_MATERIA`, `ID_MATERIA`, `ID_DOCENTE`) VALUES
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
  `ESTADO` tinyint(1) NOT NULL,
  `ESTADO_ASISTENCIA` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`ID_ESTUDIANTE`, `CONTRASENIA`, `EMAIL`, `NOMBRE_ESTUDIANTE`, `APELLIDO_ESTUDIANTE`, `CODIGO_SIS`, `ESTADO`, `ESTADO_ASISTENCIA`) VALUES
(100001, 'laura', 'laura@gmail.com', 'Laura', 'Sejas', '201903325', 1, 1),
(100002, '1234', 'cc@gmail.com', 'Antony', 'Maceda', '201601234', 1, 1),
(100003, '1234', 'asfa@gmail.com', 'Pablo', 'Flores', '12312123', 1, 0),
(100004, '12345', 'asd@gmial.com', 'Arturo', 'Adrian', '201901234', 1, 1);

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
-- Estructura de tabla para la tabla `grupo_laboratorio`
--

CREATE TABLE `grupo_laboratorio` (
  `ID_GRUPOLAB` int(11) NOT NULL,
  `ID_DOC_MAT` int(11) NOT NULL,
  `ID_HORA` int(11) NOT NULL,
  `ID_AUX` int(11) NOT NULL,
  `DIA` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `ESTADO_GC` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `grupo_laboratorio`
--

INSERT INTO `grupo_laboratorio` (`ID_GRUPOLAB`, `ID_DOC_MAT`, `ID_HORA`, `ID_AUX`, `DIA`, `ESTADO_GC`) VALUES
(1, 1, 1, 10001, 'Lunes', 1),
(2, 1, 1, 10001, 'Martes', 1),
(3, 3, 2, 10002, 'Martes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hora_clase`
--

CREATE TABLE `hora_clase` (
  `ID_HORA` int(11) NOT NULL,
  `HORA_INICIO` time NOT NULL,
  `HORA_FIN` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `hora_clase`
--

INSERT INTO `hora_clase` (`ID_HORA`, `HORA_INICIO`, `HORA_FIN`) VALUES
(1, '06:45:00', '08:15:00'),
(2, '08:15:00', '09:45:00'),
(3, '09:45:00', '11:15:00'),
(4, '11:15:00', '12:45:00'),
(5, '12:45:00', '14:15:00'),
(6, '14:15:00', '15:45:00'),
(7, '15:45:00', '17:15:00'),
(8, '17:15:00', '18:45:00'),
(9, '18:45:00', '20:15:00'),
(10, '20:15:00', '21:45:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `ID_INSCRIPCION` int(11) NOT NULL,
  `ID_ESTUDIANTE` int(11) NOT NULL,
  `ID_GRUPOLAB` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`ID_INSCRIPCION`, `ID_ESTUDIANTE`, `ID_GRUPOLAB`) VALUES
(1, 100004, 2),
(10, 100004, 1),
(12, 100004, 3);

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
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portafolio`
--

CREATE TABLE `portafolio` (
  `ID_PORTAFOLIO` int(11) NOT NULL,
  `ID_INSCRIPCION` int(11) NOT NULL,
  `ID_PRAC_GRUPO` int(11) NOT NULL,
  `COMENTARIO_AUXILIAR` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `portafolio`
--

INSERT INTO `portafolio` (`ID_PORTAFOLIO`, `ID_INSCRIPCION`, `ID_PRAC_GRUPO`, `COMENTARIO_AUXILIAR`) VALUES
(4, 2, 1, ''),
(5, 2, 2, ''),
(6, 1, 3, ''),
(7, 10, 2, ''),
(8, 10, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portafolio_multiple`
--

CREATE TABLE `portafolio_multiple` (
  `ID_PORTAFOLIO` int(11) NOT NULL,
  `RUTA_ARCHIVO` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica_grupo`
--

CREATE TABLE `practica_grupo` (
  `ID_PRAC_GRUPO` int(11) NOT NULL,
  `ID_GRUPOLAB` int(11) NOT NULL,
  `NOMBRE_SESION` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `FECHA` date NOT NULL,
  `PRACTICA` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `practica_grupo`
--

INSERT INTO `practica_grupo` (`ID_PRAC_GRUPO`, `ID_GRUPOLAB`, `NOMBRE_SESION`, `FECHA`, `PRACTICA`) VALUES
(1, 1, 'Sesion 1', '2019-05-01', 'prac1'),
(2, 1, 'Sesion 2', '2019-05-08', 'prac2'),
(3, 2, 'Sesion 1', '2019-05-01', 'p');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jessicka', 'jessicka@gmail.com', '$2y$10$qHlYp.DMSWTb34HfvBXIUeemws2mf3gAwu5YzwM4rjg6JlyWXJjWa', 4, 'HWqqHd8Yi9HVtEyTUjmkSE1xpD2bVyXkRYa9x2yK18pzsjMIYaJMwPriCMOl', '2019-05-09 12:11:09', '2019-05-09 12:11:09'),
(2, 'artur', 'artur@gmail.com', '$2y$10$qHlYp.DMSWTb34HfvBXIUeemws2mf3gAwu5YzwM4rjg6JlyWXJjWa', 1, '3jIgEPk0HSGYLXZUEfAnZISLMSUhJ2PBMYg13tG9kzTvQnAzLALkDy0rd3Na', NULL, NULL),
(3, 'clara', 'clara@gmail.com', '$2y$10$qHlYp.DMSWTb34HfvBXIUeemws2mf3gAwu5YzwM4rjg6JlyWXJjWa', 2, 'JcMPkJFWvtXeeRBiv6u0GGNxSYCh7bbFPnjh1BpYt2kg7qRWItTo54viyeXe', NULL, NULL);

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
-- Indices de la tabla `docente_materia`
--
ALTER TABLE `docente_materia`
  ADD PRIMARY KEY (`ID_DOCENTE_MATERIA`),
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
-- Indices de la tabla `grupo_laboratorio`
--
ALTER TABLE `grupo_laboratorio`
  ADD PRIMARY KEY (`ID_GRUPOLAB`),
  ADD KEY `fk_grupo-doc_mat` (`ID_DOC_MAT`),
  ADD KEY `fk_grupo-aux` (`ID_AUX`),
  ADD KEY `fk_grupo-hora` (`ID_HORA`);

--
-- Indices de la tabla `hora_clase`
--
ALTER TABLE `hora_clase`
  ADD PRIMARY KEY (`ID_HORA`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`ID_INSCRIPCION`),
  ADD KEY `fk_inscr-est` (`ID_ESTUDIANTE`),
  ADD KEY `fk_inscr-grupo` (`ID_GRUPOLAB`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`ID_MATERIA`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `portafolio`
--
ALTER TABLE `portafolio`
  ADD PRIMARY KEY (`ID_PORTAFOLIO`),
  ADD KEY `fk_practica_grupo_portafolio` (`ID_PRAC_GRUPO`);

--
-- Indices de la tabla `practica_grupo`
--
ALTER TABLE `practica_grupo`
  ADD PRIMARY KEY (`ID_PRAC_GRUPO`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `ID_INSCRIPCION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `ID_MATERIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=503;
--
-- AUTO_INCREMENT de la tabla `portafolio`
--
ALTER TABLE `portafolio`
  MODIFY `ID_PORTAFOLIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `docente_materia`
--
ALTER TABLE `docente_materia`
  ADD CONSTRAINT `fk_docente-doc_mat` FOREIGN KEY (`ID_DOCENTE`) REFERENCES `docente` (`ID_DOCENTE`),
  ADD CONSTRAINT `fk_materia-doc_mat` FOREIGN KEY (`ID_MATERIA`) REFERENCES `materia` (`ID_MATERIA`);

--
-- Filtros para la tabla `grupo_laboratorio`
--
ALTER TABLE `grupo_laboratorio`
  ADD CONSTRAINT `fk_grupo-aux` FOREIGN KEY (`ID_AUX`) REFERENCES `auxiliar` (`ID_AUXILIAR`),
  ADD CONSTRAINT `fk_grupo-doc_mat` FOREIGN KEY (`ID_DOC_MAT`) REFERENCES `docente_materia` (`ID_DOCENTE_MATERIA`),
  ADD CONSTRAINT `fk_grupo-hora` FOREIGN KEY (`ID_HORA`) REFERENCES `hora_clase` (`ID_HORA`);

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `fk_inscr-est` FOREIGN KEY (`ID_ESTUDIANTE`) REFERENCES `estudiante` (`ID_ESTUDIANTE`),
  ADD CONSTRAINT `fk_inscr-grupo` FOREIGN KEY (`ID_GRUPOLAB`) REFERENCES `grupo_laboratorio` (`ID_GRUPOLAB`);

--
-- Filtros para la tabla `portafolio`
--
ALTER TABLE `portafolio`
  ADD CONSTRAINT `fk_practica_grupo_portafolio` FOREIGN KEY (`ID_PRAC_GRUPO`) REFERENCES `practica_grupo` (`ID_PRAC_GRUPO`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
