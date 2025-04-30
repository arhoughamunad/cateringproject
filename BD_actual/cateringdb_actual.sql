-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 29-04-2025 a las 15:43:06
-- Versión del servidor: 9.1.0
-- Versión de PHP: 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cateringdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formularios`
--

DROP TABLE IF EXISTS `formularios`;
CREATE TABLE IF NOT EXISTS `formularios` (
  `Id_Formulario` int NOT NULL AUTO_INCREMENT,
  `Id_TipoUsuario` int NOT NULL,
  `Desc_Formulario` varchar(255) NOT NULL,
  PRIMARY KEY (`Id_Formulario`),
  KEY `Id_TipoUsuario` (`Id_TipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `formularios`
--

INSERT INTO `formularios` (`Id_Formulario`, `Id_TipoUsuario`, `Desc_Formulario`) VALUES
(1, 3, 'Servicio de catering'),
(2, 4, 'Servicio de coctelería'),
(3, 5, 'Servicio de alquiler y menaje');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_contactos`
--

DROP TABLE IF EXISTS `historial_contactos`;
CREATE TABLE IF NOT EXISTS `historial_contactos` (
  `Id_Contacto` int NOT NULL AUTO_INCREMENT,
  `Nombre_Apellido` varchar(100) NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Mensaje` varchar(255) NOT NULL,
  `Fecha_Contacto` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id_Contacto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_formularios`
--

DROP TABLE IF EXISTS `historial_formularios`;
CREATE TABLE IF NOT EXISTS `historial_formularios` (
  `Id_HistoriaFormulario` int NOT NULL AUTO_INCREMENT,
  `Id_Formulario` int NOT NULL,
  `Id_Usuario` int NOT NULL,
  `Fecha_Formulario` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id_HistoriaFormulario`),
  KEY `Id_Formulario` (`Id_Formulario`),
  KEY `Id_Usuario` (`Id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `historial_formularios`
--

INSERT INTO `historial_formularios` (`Id_HistoriaFormulario`, `Id_Formulario`, `Id_Usuario`, `Fecha_Formulario`) VALUES
(1, 1, 3, '2025-04-18 19:18:40'),
(2, 1, 3, '2025-04-18 19:25:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas_formularios`
--

DROP TABLE IF EXISTS `preguntas_formularios`;
CREATE TABLE IF NOT EXISTS `preguntas_formularios` (
  `Id_Pregunta` int NOT NULL AUTO_INCREMENT,
  `Id_Formulario` int NOT NULL,
  `Id_Usuario` int NOT NULL,
  `Desc_TipoDato` varchar(50) NOT NULL,
  `Desc_Pregunta` varchar(255) NOT NULL,
  `Cb_EsRequerida` tinyint(1) DEFAULT '0',
  `Cb_EsHabilitada` tinyint(1) DEFAULT '1',
  `Fecha_Pregunta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id_Pregunta`),
  KEY `Id_Formulario` (`Id_Formulario`),
  KEY `Id_Usuario` (`Id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `preguntas_formularios`
--

INSERT INTO `preguntas_formularios` (`Id_Pregunta`, `Id_Formulario`, `Id_Usuario`, `Desc_TipoDato`, `Desc_Pregunta`, `Cb_EsRequerida`, `Cb_EsHabilitada`, `Fecha_Pregunta`) VALUES
(1, 1, 2, 'text', 'Indique día, fecha y lugar del evento', 1, 0, '2025-04-18 19:17:27'),
(2, 1, 2, 'text', 'Cuéntanos si alguien cuenta con alguna restricción alimentaria', 1, 0, '2025-04-18 19:17:27'),
(3, 1, 2, 'number', 'Indica la cantidad de invitados que asisitirán al evento', 1, 0, '2025-04-18 19:17:27'),
(4, 1, 2, 'text', 'Proteína preferida: Carne de res, pollo, cerdo o pescado', 1, 0, '2025-04-18 19:21:07'),
(5, 1, 4, 'text', 'Cuéntanos cuál es su país de preferencia gastronómica ', 1, 1, '2025-04-18 19:24:53'),
(6, 1, 4, 'number', 'Cantidad de comensales', 1, 1, '2025-04-18 19:24:53'),
(7, 1, 4, 'text', 'Algún tipo de alergia', 1, 1, '2025-04-18 19:24:53'),
(8, 2, 5, 'text', 'Cuéntanos que bebidas te gustan', 1, 1, '2025-04-18 20:32:20'),
(9, 2, 5, 'text', 'Cuéntanos que colores te gustan para tus cocteles', 1, 1, '2025-04-18 20:32:20'),
(10, 2, 5, 'number', 'Cuantos invitados tienes a tu evento', 1, 1, '2025-04-18 20:32:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas_formularios`
--

DROP TABLE IF EXISTS `respuestas_formularios`;
CREATE TABLE IF NOT EXISTS `respuestas_formularios` (
  `Id_Respuesta` int NOT NULL AUTO_INCREMENT,
  `Id_HistoriaFormulario` int NOT NULL,
  `Desc_Pregunta` text,
  `Desc_Respuesta` text,
  PRIMARY KEY (`Id_Respuesta`),
  KEY `Id_HistoriaFormulario` (`Id_HistoriaFormulario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `respuestas_formularios`
--

INSERT INTO `respuestas_formularios` (`Id_Respuesta`, `Id_HistoriaFormulario`, `Desc_Pregunta`, `Desc_Respuesta`) VALUES
(1, 1, 'Indique día, fecha y lugar del evento', '05 - Mayo - 2025 / Chapinero'),
(2, 1, 'Cuéntanos si alguien cuenta con alguna restricción alimentaria', 'no'),
(3, 1, 'Indica la cantidad de invitados que asisitirán al evento', '20'),
(4, 2, 'Cuéntanos cuál es su país de preferencia gastronómica ', 'Peru'),
(5, 2, 'Cantidad de comensales', '10'),
(6, 2, 'Algún tipo de alergia', 'Mani');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `Id_TipoUsuario` int NOT NULL AUTO_INCREMENT,
  `Desc_TipoUsuario` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_TipoUsuario`),
  UNIQUE KEY `Desc_TipoUsuario` (`Desc_TipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`Id_TipoUsuario`, `Desc_TipoUsuario`) VALUES
(1, 'Administrador'),
(2, 'Cliente'),
(3, 'Emprendedor 1'),
(4, 'Emprendedor 2'),
(5, 'Emprendedor 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id_Usuario` int NOT NULL AUTO_INCREMENT,
  `Id_TipoUsuario` int NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PasswordHash` varchar(255) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Fecha_Creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Cb_UsuarioActivo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id_Usuario`),
  UNIQUE KEY `Email` (`Email`),
  KEY `Id_TipoUsuario` (`Id_TipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id_Usuario`, `Id_TipoUsuario`, `Email`, `PasswordHash`, `Nombre`, `Telefono`, `Direccion`, `Fecha_Creacion`, `Cb_UsuarioActivo`) VALUES
(1, 1, 'admin@catering.com', '$2y$10$tv8w6Eh13WxopOcdeqRvZeqVicsTj.StuyzMd/VTPlDH5gNOb0HXm', 'Catering Services', NULL, NULL, '2025-03-01 01:55:44', 1),
(2, 3, 'salazar.pedro@gmail.com', '$2y$10$P8uWYFaVSfX8VwPw2T0ID.ub526NnQGjjaP7ZeV3/.azVbxp4Ewwe', 'Pedro Esteban Salazar', '3214657985', 'calle 2 # 3 - 4', '2025-04-18 19:13:10', 1),
(3, 2, 'simionijuan@gmail.com', '$2y$10$KYSkNDfyV3Pt0Ds.nAPMW.YV8/z3vPIusHDm.rD22FKEYCPX8tsx2', 'Juan Simioni', '3007941235', 'Calle 4 # 2 - 1', '2025-04-18 19:18:22', 1),
(4, 3, 'carlosnieto@gmail.com', '$2y$10$0UQq4fNH9vSF0DXH5GD6f.QjjcGHL4s5XrhIzsM8s67foJVoeMZvC', 'Carlos Nieto', '3145687945', 'Calle 5 # 2 - 3', '2025-04-18 19:22:48', 0),
(5, 4, 'ayalaluis@gmail.com', '$2y$10$.D9bmd1.FuzgfhQi8qAoWOlY/2pnrSTEtHCHbE9NUl6SFXtiUeWSe', 'Luis Ayala', '3146548546', 'Calle 6 # 2 - 3', '2025-04-18 20:28:29', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `formularios`
--
ALTER TABLE `formularios`
  ADD CONSTRAINT `formularios_ibfk_1` FOREIGN KEY (`Id_TipoUsuario`) REFERENCES `tipo_usuario` (`Id_TipoUsuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `historial_formularios`
--
ALTER TABLE `historial_formularios`
  ADD CONSTRAINT `historial_formularios_ibfk_1` FOREIGN KEY (`Id_Formulario`) REFERENCES `formularios` (`Id_Formulario`) ON DELETE CASCADE,
  ADD CONSTRAINT `historial_formularios_ibfk_2` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuarios` (`Id_Usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `preguntas_formularios`
--
ALTER TABLE `preguntas_formularios`
  ADD CONSTRAINT `preguntas_formularios_ibfk_1` FOREIGN KEY (`Id_Formulario`) REFERENCES `formularios` (`Id_Formulario`) ON DELETE CASCADE,
  ADD CONSTRAINT `preguntas_formularios_ibfk_2` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuarios` (`Id_Usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `respuestas_formularios`
--
ALTER TABLE `respuestas_formularios`
  ADD CONSTRAINT `respuestas_formularios_ibfk_1` FOREIGN KEY (`Id_HistoriaFormulario`) REFERENCES `historial_formularios` (`Id_HistoriaFormulario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Id_TipoUsuario`) REFERENCES `tipo_usuario` (`Id_TipoUsuario`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
