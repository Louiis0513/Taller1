-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2022 a las 06:55:37
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_taller1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla1`
--

CREATE TABLE `tabla1` (
  `ID` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Clase` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `Salon` text COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tabla1`
--

INSERT INTO `tabla1` (`ID`, `descripcion`, `Clase`, `Salon`) VALUES
(1, 'Clase primiparos', 'DesarolloWeb', '205'),
(2, 'Clase de calculo pensul nuevo', 'Calculo2', '301'),
(3, 'Clase de base de datos pensul viejo', 'Base de Datos', '207'),
(4, 'Clase totalmente virtual', 'Estadistica', '0'),
(8, 'Prueba2', 'Matematica', '111');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla2`
--

CREATE TABLE `tabla2` (
  `ID` int(11) NOT NULL,
  `ID_TABLA1` int(11) NOT NULL,
  `Nombre` varchar(225) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Estado_Civil` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `cc` int(11) NOT NULL,
  `Peso` float NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tabla2`
--

INSERT INTO `tabla2` (`ID`, `ID_TABLA1`, `Nombre`, `Estado_Civil`, `fecha_registro`, `Fecha_Nacimiento`, `cc`, `Peso`, `Email`) VALUES
(1, 1, 'Mario', 'Casado', '2022-09-22 16:25:11', '0000-00-00', 115488562, 85, 'Mario@unicordoba.edu.co'),
(2, 2, 'Luisa', 'Complicado', '2022-09-22 16:27:01', '1985-05-21', 115488562, 70, 'Luisa@unicordoba.edu.co'),
(3, 3, 'Lary', 'Soltero', '2022-09-22 16:30:10', '1999-01-11', 1187458562, 78, 'Larry@unicordoba.edu.co'),
(4, 4, 'Oscar', 'Soltero', '2022-09-22 16:30:11', '1985-08-26', 115745844, 95, 'Oscar@unicordoba.edu.co'),
(5, 3, 'Valeria', 'Soltera', '2022-09-25 09:42:12', '2005-03-27', 1192365872, 65, 'yurley3hgj@aleamazcuen.org'),
(6, 3, 'Valeria', 'Soltera', '2022-09-25 09:48:43', '2005-03-27', 1192365872, 65, 'yurley3hgj@aleamazcuen.org'),
(9, 2, 'Sergio', 'Soltero', '2022-09-25 23:47:23', '2000-03-29', 789546321, 56, 'Sergio@aleamazcuen.org'),
(10, 3, 'Valeria', 'Soltera', '2022-09-25 09:56:37', '2005-03-27', 1192365872, 65, 'yurley3hgj@aleamazcuen.org'),
(11, 1, 'Miriam', 'Complicado', '2022-09-25 23:44:43', '2000-03-29', 123456789, 99, 'alan44@aleamazcuen.org'),
(12, 3, 'Valeria', 'Soltera', '2022-09-25 09:58:06', '2005-03-27', 1192365872, 65, 'yurley3hgj@aleamazcuen.org');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tabla1`
--
ALTER TABLE `tabla1`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tabla2`
--
ALTER TABLE `tabla2`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `KF_ID` (`ID_TABLA1`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tabla1`
--
ALTER TABLE `tabla1`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tabla2`
--
ALTER TABLE `tabla2`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tabla2`
--
ALTER TABLE `tabla2`
  ADD CONSTRAINT `tabla2_ibfk_1` FOREIGN KEY (`ID_TABLA1`) REFERENCES `tabla1` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
