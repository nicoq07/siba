
--SCRIPT V23

DROP TABLE `historial_mails`;

ALTER TABLE `clases` ADD COLUMN (
  `operador_id` int(11) DEFAULT NULL,
  `programa_adolescencia` tinyint(1) DEFAULT '0'
)


CREATE TABLE `operadores` (
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
  `fecha_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `descripcion`, `created`, `modified`, `active`) VALUES
(3, 'Operador', '2017-08-12 19:11:20', '2017-08-12 19:11:20', 1);


--
-- Estructura de tabla para la tabla `seguimientos_programa`
--

CREATE TABLE `seguimientos_programa` (
  `id` int(11) NOT NULL,
  `clase_alumno_id` int(11) DEFAULT NULL,
  `observacion` text COLLATE latin1_spanish_ci,
  `presente` tinyint(1) NOT NULL DEFAULT '0',
  `fecha` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

ALTER TABLE `users` ADD COLUMN (
  `operador_id` int(14) DEFAULT NULL,
  `fondo` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL COMMENT 'fondo'
)

ALTER TABLE `clases`
  ADD KEY `FK_OperadorClase` (`operador_id`);


--
-- Indices de la tabla `operadores`
--
ALTER TABLE `operadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seguimientos_programa`
--
ALTER TABLE `seguimientos_programa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ClasesAlumnoSeguimientosPrograma_idx` (`clase_alumno_id`),
  ADD KEY `clase_id` (`clase_alumno_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD KEY `FK_OperadorUser` (`operador_id`);

-- AUTO_INCREMENT de la tabla `operadores`
--
ALTER TABLE `operadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- AUTO_INCREMENT de la tabla `seguimientos_programa`
--
ALTER TABLE `seguimientos_programa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Filtros para la tabla `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `FK_ProfesorClase` FOREIGN KEY (`profesor_id`) REFERENCES `profesores` (`id`);


--
-- Filtros para la tabla `seguimientos_programa`
--
ALTER TABLE `seguimientos_programa`
  ADD CONSTRAINT `FK_ClasesAlumnoSeguimientosPrograma` FOREIGN KEY (`clase_alumno_id`) REFERENCES `clases_alumnos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_OperadorUser` FOREIGN KEY (`operador_id`) REFERENCES `operadores` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
