-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-06-2019 a las 17:01:10
-- Versión del servidor: 10.0.28-MariaDB-0+deb8u1
-- Versión de PHP: 5.6.27-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `koverload_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE IF NOT EXISTS `estudiante` (
`ID_ESTUDIANTE` int(11) unsigned NOT NULL,
  `CONTRASENIA` varchar(191) COLLATE utf8_spanish2_ci NOT NULL,
  `EMAIL` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `NOMBRE_ESTUDIANTE` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `APELLIDO_ESTUDIANTE` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `CODIGO_SIS` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `ESTADO` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10002 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Disparadores `estudiante`
--
DELIMITER //
CREATE TRIGGER `estudianteUsuario` AFTER INSERT ON `estudiante`
 FOR EACH ROW BEGIN
INSERT INTO users(id,name,email,password,role,remember_token,created_at,updated_at) 
VALUES(new.ID_ESTUDIANTE,new.NOMBRE_ESTUDIANTE,new.EMAIL,new.CONTRASENIA,4,null,null,null);
END
//
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
 ADD PRIMARY KEY (`ID_ESTUDIANTE`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
MODIFY `ID_ESTUDIANTE` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10002;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
