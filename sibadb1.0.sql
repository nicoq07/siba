-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-09-2017 a las 04:42:55
-- Versión del servidor: 5.6.34
-- Versión de PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
  `nombre_madre` varchar(128) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nombre_padre` varchar(128) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email_padre` varchar(128) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email_madre` varchar(128) COLLATE latin1_spanish_ci DEFAULT NULL,
  `celular_padre` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `celular_madre` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `monto_arancel` decimal(30,2) DEFAULT NULL,
  `monto_materiales` decimal(30,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `futuro_alumno` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `referencia_foto` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fecha_baja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) COLLATE latin1_spanish_ci NOT NULL,
  `valor` int(11) NOT NULL,
  `aprobado` tinyint(1) NOT NULL DEFAULT '0',
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
  `alumno_count` INT UNSIGNED NULL DEFAULT NULL COMMENT 'cantidad de alumnos por clase';
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
  `alumno_id` int(11) NOT NULL,
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
  `descripcion` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
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
  `aprobado` tinyint(1) NOT NULL DEFAULT '0',
  `calificacion` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'valor para calificación',
  `audioperceptiva` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'valor para audioperceptiva',
  `practica_ensamble` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'valor para practica_ensamble',
  `trabajos_practicos` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'valor para trabajos_practicos',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `ciclolectivo_id` int(11) NOT NULL,
  `nombre_dia` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `num_dia` int(1) DEFAULT NULL COMMENT 'valor numero del dia de 1 a 5',
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
  `mes` varchar(2) COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'mes correspondiente al pago',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `monto` decimal(30,2) DEFAULT NULL,
  `pagado` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `fecha_pagado` datetime DEFAULT NULL COMMENT 'fecha cuando se paga '
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
  `titulo` varchar(128) COLLATE latin1_spanish_ci DEFAULT NULL,
  `observacion` text COLLATE latin1_spanish_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `fecha_nacimiento` datetime DEFAULT NULL
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
-- Estructura de tabla para la tabla `seguimientos_clases_alumnos`
--

CREATE TABLE `seguimientos_clases_alumnos` (
  `id` int(11) NOT NULL,
  `clase_alumno_id` int(11) DEFAULT NULL,
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
  `dni` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `profesor_id` int(11) DEFAULT NULL,
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
  ADD KEY `FK_AlumnoClase_idx` (`alumno_id`),
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
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seguimientos_clases_alumnos`
--
ALTER TABLE `seguimientos_clases_alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ClaseAlumnoSeguimiento_idx` (`clase_alumno_id`),
  ADD KEY `FK_CalificacionSeguimiento_idx` (`calificacion_id`),
  ADD KEY `clase_id` (`clase_alumno_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_RolUser_idx` (`rol_id`),
  ADD KEY `FK_ProfesorUser` (`profesor_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1139;
--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ciclolectivo`
--
ALTER TABLE `ciclolectivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `clases_alumnos`
--
ALTER TABLE `clases_alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `examenes`
--
ALTER TABLE `examenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `pagos_conceptos`
--
ALTER TABLE `pagos_conceptos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `seguimientos_clases_alumnos`
--
ALTER TABLE `seguimientos_clases_alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=455;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  ADD CONSTRAINT `FK_AlumnoClaseAlumno` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`),
  ADD CONSTRAINT `FK_ClaseClaseAlumno` FOREIGN KEY (`clase_id`) REFERENCES `clases` (`id`);

--
-- Filtros para la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD CONSTRAINT `FK_ClaseAlumnoExamen` FOREIGN KEY (`clase_alumno_id`) REFERENCES `clases_alumnos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `FK_AlumnoPagoConcepto` FOREIGN KEY (`pago_alumno_id`) REFERENCES `pagos_alumnos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `seguimientos_clases_alumnos`
--
ALTER TABLE `seguimientos_clases_alumnos`
  ADD CONSTRAINT `FK_CalificacionSeguimiento` FOREIGN KEY (`calificacion_id`) REFERENCES `calificaciones` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `FK_ClasesAlumnoSeguimiento` FOREIGN KEY (`clase_alumno_id`) REFERENCES `clases_alumnos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_ProfesorUser` FOREIGN KEY (`profesor_id`) REFERENCES `profesores` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `FK_RolUser` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
