-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2020 a las 00:53:25
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `moodle`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `cod_asignatura` int(3) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `n_creditos` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`cod_asignatura`, `nombre`, `n_creditos`) VALUES
(1, 'Algebra', 2),
(2, 'Programacion Orientada a objetos', 3),
(3, 'Calculo diferencial', 3),
(4, 'Calculo integral', 4),
(5, 'Fisica Mecanica', 2),
(6, 'Etica', 1),
(7, 'Fisica optica', 2),
(8, 'Fisica optica', 2),
(9, 'Fisica ondulatoria', 2),
(10, 'Investigación 2', 1),
(11, 'Test', 2),
(12, 'Tesó', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `cod_clase` int(7) NOT NULL,
  `ID_docente` int(6) NOT NULL,
  `cod_asignatura` int(3) NOT NULL,
  `tema` varchar(40) NOT NULL,
  `asistencia_profesor` int(1) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`cod_clase`, `ID_docente`, `cod_asignatura`, `tema`, `asistencia_profesor`, `descripcion`, `estado`) VALUES
(18, 23, 3, '', 1, 'Iniciar', 2),
(19, 98, 3, '', 0, 'Ausentar', 0),
(20, 23, 3, '', 0, 'Los estudiantes no fueron', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `ID_docente` int(6) NOT NULL,
  `dia_semana` varchar(9) NOT NULL,
  `hora` varchar(11) NOT NULL,
  `cod_asignatura` int(3) NOT NULL,
  `semestre` varchar(7) NOT NULL,
  `salon` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`ID_docente`, `dia_semana`, `hora`, `cod_asignatura`, `semestre`, `salon`) VALUES
(4, 'Viernes', '8:00 - 9:00', 2, '2020-2', '302'),
(8, 'Viernes', '10:00 - 11:', 7, '2020-2', '101'),
(11, 'Miercoles', '4:00 - 5:00', 5, '2020-2', '101-A'),
(23, 'Lunes', '7:00 - 8:00', 1, '2020-1', '401-B'),
(23, 'Martes', '8:00 - 9:00', 3, '2020-2', '401-B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_usuario` int(6) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `edad` int(2) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `estudios` varchar(40) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `rol` int(1) NOT NULL,
  `facultad` varchar(40) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_usuario`, `nombre`, `edad`, `sexo`, `estudios`, `correo`, `password`, `rol`, `facultad`, `fecha_registro`) VALUES
(1, 'Diego Suero', 24, 'M', 'Ingenieria de sistemas', 'diego', '123', 1, 'Ingeniera', '2020-06-06'),
(2, 'Bryan', 20, 'M', 'Ingenieria de sistemas', 'BL', '123', 1, 'Ingeniera', '2020-06-06'),
(3, 'Cesar', 20, 'M', 'Ingenieria de sistemas', 'CSS', '456', 0, 'Ingeniera', '2020-06-06'),
(4, 'Patty Pedroza', 19, 'F', 'Ingenieria Industrial', 'patty', '123', 2, 'Ingeniera', '2020-06-01'),
(8, 'Gianluigi', 19, 'M', 'Ingenieria Industrial', 'GGH', '333', 2, 'Ingeniera', '2020-06-02'),
(11, 'Juan', 25, 'M', 'Ingenieria Industrial', 'JJR', '341', 2, 'Ingenieria', '2020-06-02'),
(23, 'Marvin Molina', 47, 'M', 'Ingenieria Industrial', 'marvin', '123', 2, 'Ingenieria', '2020-10-29'),
(98, 'Luis Ortega', 47, 'M', 'Ingenieria Industrial', 'luis', '123', 2, 'Ingenieria', '2020-10-30'),
(1234567, 'Ingrid Dominguez', 37, 'F', 'wadawd', 'ingrid', '123', 2, 'efesffes', '2020-10-29');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`cod_asignatura`);

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`cod_clase`),
  ADD KEY `fk__usuario_clase` (`ID_docente`),
  ADD KEY `fk__asignatura_clase` (`cod_asignatura`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`ID_docente`,`dia_semana`,`hora`,`cod_asignatura`),
  ADD KEY `fk__asignatura_horario` (`cod_asignatura`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `cod_asignatura` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `cod_clase` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clase`
--
ALTER TABLE `clase`
  ADD CONSTRAINT `fk__asignatura_clase` FOREIGN KEY (`cod_asignatura`) REFERENCES `asignatura` (`cod_asignatura`),
  ADD CONSTRAINT `fk__usuario_clase` FOREIGN KEY (`ID_docente`) REFERENCES `usuario` (`ID_usuario`);

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `fk__asignatura_horario` FOREIGN KEY (`cod_asignatura`) REFERENCES `asignatura` (`cod_asignatura`),
  ADD CONSTRAINT `fk__usuario_horario` FOREIGN KEY (`ID_docente`) REFERENCES `usuario` (`ID_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
