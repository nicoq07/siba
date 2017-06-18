-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2017 a las 23:22:00
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sibadb`
--
CREATE DATABASE IF NOT EXISTS `sibadb` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `sibadb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `legajo_numero` int(11) DEFAULT NULL,
  `nombre` varchar(128) COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(128) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_nacimiento` datetime DEFAULT NULL,
  `direccion` varchar(128) COLLATE latin1_spanish_ci DEFAULT NULL,
  `ciudad` varchar(128) COLLATE latin1_spanish_ci DEFAULT NULL,
  `codigo_postal` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `celular` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nro_documento` varchar(16) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(128) COLLATE latin1_spanish_ci DEFAULT NULL,
  `observacion` text COLLATE latin1_spanish_ci,
  `programa_adolecencia` tinyint(1) NOT NULL DEFAULT '0',
  `colegio` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nombre_madre` varchar(128) COLLATE latin1_spanish_ci NOT NULL,
  `nombre_padre` varchar(128) COLLATE latin1_spanish_ci NOT NULL,
  `email_padre` varchar(128) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email_madre` varchar(128) COLLATE latin1_spanish_ci DEFAULT NULL,
  `celular_padre` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `celular_madre` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `monto_arancel` decimal(30,2) DEFAULT NULL,
  `monto_materiales` decimal(30,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `futuro_alumno` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) COLLATE latin1_spanish_ci NOT NULL,
  `valor` int(11) NOT NULL,
  `aprobado` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclolectivo`
--

CREATE TABLE `ciclolectivo` (
  `id` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `descripcion` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `id` int(11) NOT NULL,
  `profesor_id` int(11) NOT NULL,
  `horario_id` int(11) NOT NULL,
  `disciplina_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases_alumnos`
--

CREATE TABLE `clases_alumnos` (
  `id` int(11) NOT NULL,
  `alumnno_id` int(11) NOT NULL,
  `clase_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id` int(11) NOT NULL,
  `descripcion` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE `examenes` (
  `id` int(11) NOT NULL,
  `clase_alumno_id` int(11) DEFAULT NULL,
  `periodo` varchar(150) COLLATE latin1_spanish_ci DEFAULT NULL,
  `aprobado` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos_alumnos`
--

CREATE TABLE `fotos_alumnos` (
  `id` int(11) NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `referencia` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos_profesores`
--

CREATE TABLE `fotos_profesores` (
  `id` int(11) NOT NULL,
  `profesor_id` int(11) NOT NULL,
  `referencia` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `ciclolectivo_id` int(11) NOT NULL,
  `nombre_dia` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `hora` time NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `descripcion` text COLLATE latin1_spanish_ci NOT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `descripcion` text COLLATE latin1_spanish_ci NOT NULL,
  `emisor` int(11) NOT NULL,
  `receptor` int(11) NOT NULL,
  `leida` tinyint(1) NOT NULL DEFAULT '0',
  `broadcast` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_alumnos`
--

CREATE TABLE `pagos_alumnos` (
  `id` int(11) NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `monto` decimal(30,2) DEFAULT NULL,
  `pagado` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_conceptos`
--

CREATE TABLE `pagos_conceptos` (
  `id` int(11) NOT NULL,
  `pago_alumno_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '1',
  `monto` decimal(30,2) DEFAULT NULL,
  `detalle` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id` int(11) NOT NULL,
  `legajo_numero` int(11) DEFAULT NULL,
  `apellido` varchar(128) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(128) COLLATE latin1_spanish_ci NOT NULL,
  `nro_documento` varchar(16) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(128) COLLATE latin1_spanish_ci DEFAULT NULL,
  `ciudad` varchar(128) COLLATE latin1_spanish_ci DEFAULT NULL,
  `codigo_postal` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `cuit` varchar(128) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `celular` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nombre_contacto` varchar(128) COLLATE latin1_spanish_ci NOT NULL,
  `celular_contacto` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `titulo` varchar(128) COLLATE latin1_spanish_ci NOT NULL,
  `observacion` text COLLATE latin1_spanish_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos_examen`
--

CREATE TABLE `puntos_examen` (
  `id` int(11) NOT NULL,
  `examen_id` int(11) NOT NULL,
  `descripcion` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `nota` int(2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `calificacion_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimientos_clases`
--

CREATE TABLE `seguimientos_clases` (
  `id` int(11) NOT NULL,
  `clase_alumno_id` int(11) NOT NULL,
  `observacion` text COLLATE latin1_spanish_ci,
  `presente` tinyint(1) NOT NULL DEFAULT '1',
  `calificacion_id` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `dni` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `nombre_usuario` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ciclolectivo`
--
ALTER TABLE `ciclolectivo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_DisciplinaClase_idx` (`disciplina_id`),
  ADD KEY `FK_ProfesorClase_idx` (`profesor_id`),
  ADD KEY `FK_HorarioClase_idx` (`horario_id`);

--
-- Indices de la tabla `clases_alumnos`
--
ALTER TABLE `clases_alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_AlumnoClase_idx` (`alumnno_id`),
  ADD KEY `FK_ClaseClase_idx` (`clase_id`);

--
-- Indices de la tabla `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ClaseAlumnoExamen_idx` (`clase_alumno_id`);

--
-- Indices de la tabla `fotos_alumnos`
--
ALTER TABLE `fotos_alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_AlumnoFoto_idx` (`alumno_id`);

--
-- Indices de la tabla `fotos_profesores`
--
ALTER TABLE `fotos_profesores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ProfesorFoto_idx` (`profesor_id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CicloLectivoHorario_idx` (`ciclolectivo_id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_UserReceptor_idx` (`receptor`),
  ADD KEY `FK_UserEmisor_idx` (`emisor`);

--
-- Indices de la tabla `pagos_alumnos`
--
ALTER TABLE `pagos_alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_AlumnoPago_idx` (`alumno_id`),
  ADD KEY `FK_UserPago_idx` (`user_id`);

--
-- Indices de la tabla `pagos_conceptos`
--
ALTER TABLE `pagos_conceptos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_AlumnoPagoConcepto_idx` (`pago_alumno_id`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `puntos_examen`
--
ALTER TABLE `puntos_examen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PuntosExamenExamen_idx` (`examen_id`),
  ADD KEY `FK_CalificacionPuntosExamen_idx` (`calificacion_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seguimientos_clases`
--
ALTER TABLE `seguimientos_clases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ClaseAlumnoSeguimiento_idx` (`clase_alumno_id`),
  ADD KEY `FK_CalificacionSeguimiento_idx` (`calificacion_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_RolUser_idx` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ciclolectivo`
--
ALTER TABLE `ciclolectivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `clases_alumnos`
--
ALTER TABLE `clases_alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `examenes`
--
ALTER TABLE `examenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `fotos_alumnos`
--
ALTER TABLE `fotos_alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `fotos_profesores`
--
ALTER TABLE `fotos_profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pagos_alumnos`
--
ALTER TABLE `pagos_alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pagos_conceptos`
--
ALTER TABLE `pagos_conceptos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `puntos_examen`
--
ALTER TABLE `puntos_examen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `seguimientos_clases`
--
ALTER TABLE `seguimientos_clases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `FK_DisciplinaClase` FOREIGN KEY (`disciplina_id`) REFERENCES `disciplinas` (`id`),
  ADD CONSTRAINT `FK_HorarioClase` FOREIGN KEY (`horario_id`) REFERENCES `horarios` (`id`),
  ADD CONSTRAINT `FK_ProfesorClase` FOREIGN KEY (`profesor_id`) REFERENCES `profesores` (`id`);

--
-- Filtros para la tabla `clases_alumnos`
--
ALTER TABLE `clases_alumnos`
  ADD CONSTRAINT `FK_AlumnoClase` FOREIGN KEY (`alumnno_id`) REFERENCES `alumnos` (`id`),
  ADD CONSTRAINT `FK_ClaseClase` FOREIGN KEY (`clase_id`) REFERENCES `clases` (`id`);

--
-- Filtros para la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD CONSTRAINT `FK_ClaseAlumnoExamen` FOREIGN KEY (`clase_alumno_id`) REFERENCES `clases_alumnos` (`id`);

--
-- Filtros para la tabla `fotos_alumnos`
--
ALTER TABLE `fotos_alumnos`
  ADD CONSTRAINT `FK_AlumnoFoto` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`);

--
-- Filtros para la tabla `fotos_profesores`
--
ALTER TABLE `fotos_profesores`
  ADD CONSTRAINT `FK_ProfesorFoto` FOREIGN KEY (`profesor_id`) REFERENCES `profesores` (`id`);

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `FK_CicloLectivoHorario` FOREIGN KEY (`ciclolectivo_id`) REFERENCES `ciclolectivo` (`id`);

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `FK_UserEmisor` FOREIGN KEY (`emisor`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_UserReceptor` FOREIGN KEY (`receptor`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `pagos_alumnos`
--
ALTER TABLE `pagos_alumnos`
  ADD CONSTRAINT `FK_AlumnoPago` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`),
  ADD CONSTRAINT `FK_UserPago` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `pagos_conceptos`
--
ALTER TABLE `pagos_conceptos`
  ADD CONSTRAINT `FK_AlumnoPagoConcepto` FOREIGN KEY (`pago_alumno_id`) REFERENCES `pagos_alumnos` (`id`);

--
-- Filtros para la tabla `puntos_examen`
--
ALTER TABLE `puntos_examen`
  ADD CONSTRAINT `FK_CalificacionPuntosExamen` FOREIGN KEY (`calificacion_id`) REFERENCES `calificaciones` (`id`),
  ADD CONSTRAINT `FK_ExamenPuntosExamen` FOREIGN KEY (`examen_id`) REFERENCES `examenes` (`id`);

--
-- Filtros para la tabla `seguimientos_clases`
--
ALTER TABLE `seguimientos_clases`
  ADD CONSTRAINT `FK_CalificacionSeguimiento` FOREIGN KEY (`calificacion_id`) REFERENCES `calificaciones` (`id`),
  ADD CONSTRAINT `FK_ClaseAlumnoSeguimiento` FOREIGN KEY (`clase_alumno_id`) REFERENCES `clases_alumnos` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_RolUser` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
