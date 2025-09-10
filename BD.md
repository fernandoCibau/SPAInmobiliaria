-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-09-2025 a las 16:18:41
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `el_salvador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultamedica`
--

CREATE TABLE `consultamedica` (
  `id` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `medico_certificado` varchar(50) NOT NULL,
  `diagnostico_cie10` varchar(255) NOT NULL,
  `solicitud_ausentismo` varchar(40) NOT NULL,
  `fecha_inicio_ausentismo` date NOT NULL,
  `fecha_fin_ausentismo` date NOT NULL,
  `observaciones` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consultamedica`
--

INSERT INTO `consultamedica` (`id`, `id_empleado`, `fecha`, `medico_certificado`, `diagnostico_cie10`, `solicitud_ausentismo`, `fecha_inicio_ausentismo`, `fecha_fin_ausentismo`, `observaciones`) VALUES
(3, 1, '2023-11-15', 'Certificado Médico 3', 'Gripe Común', 'Ausentismo Justificado', '2023-11-16', '2023-11-18', 'Reposo en casa'),
(4, 3, '2023-12-01', 'Certificado Médico 4', 'Fractura de pierna', 'Ausentismo Prolongado', '2023-12-02', '2024-01-15', 'Requiere rehabilitación'),
(5, 3, '2024-01-10', 'Certificado Médico 5', 'Migraña Crónica', 'Ausentismo Recurrente', '2024-01-10', '2024-01-11', 'Receta medicación diaria'),
(6, 9, '2024-02-20', 'Certificado Médico 6', 'Infección Respiratoria', 'Ausentismo Justificado', '2024-02-20', '2024-02-25', 'Requiere antibióticos'),
(7, 10, '2024-03-05', 'Certificado Médico 7', 'Lumbalgia', 'Ausentismo Corto', '2024-03-05', '2024-03-07', 'Reposo relativo y fisioterapia'),
(8, 1, '2024-11-05', 'Maradona', 'Colicos', '48 hs', '2024-11-05', '2024-11-06', 'Ninguna'),
(10, 8, '2024-11-05', 'Maradona', 'Pulbalgia', '15 dias', '2024-11-06', '2024-11-21', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `legajo` int(11) DEFAULT NULL,
  `dni` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `domicilio` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `observaciones` varchar(50) DEFAULT NULL,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `legajo`, `dni`, `nombre`, `apellido`, `domicilio`, `fecha_nacimiento`, `fecha_ingreso`, `observaciones`, `id_empresa`) VALUES
(1, 10001, 40391022, 'Joaquin', 'Tenenbaum', 'Sarachaga 4433', '1997-07-02', '2023-01-01', 'Remil capo', 1),
(2, 10002, 12345679, 'Ana', 'Gómez Centurion', 'Calle Secundaria 456', '1981-02-01', '2023-02-01', 'Ana ha demostrado habilidades excepcionales en ate', 2),
(3, 10003, 12345680, 'Carlitos', 'López', 'Calle Terciaria 789', '1982-03-01', '2023-03-01', 'Carlos es un líder natural, capaz de motivar a su ', 3),
(4, 10004, 12345681, 'Vanesa', 'Fernández Perez', 'Av. Libertad 101', '1983-04-01', '2023-04-01', 'Lucía se destaca por su atención al detalle y su c', 4),
(5, 10005, 12345682, 'Pedrito', 'Martínez', 'Calle Nueva 202', '1984-05-01', '2023-05-01', 'Pedro es un colaborador valioso, siempre dispuesto', 5),
(6, 10006, 12345683, 'Sofía', 'Martínez', 'Calle Vieja 303', '1985-06-01', '2023-06-01', 'Sofía ha tenido un impacto significativo en el des', 6),
(7, 10007, 12345684, 'Javier', 'Rodríguez', 'Calle 7 de Julio 404', '1986-07-01', '2023-07-01', 'Javier es conocido por su creatividad y su capacid', 7),
(8, 10008, 12345685, 'María', 'González', 'Calle de los Olmos 505', '1987-08-01', '2023-08-01', 'María ha establecido relaciones sólidas con los cl', 8),
(9, 10009, 12345686, 'Laura', 'Sánchez', 'Calle de la Paz 606', '1988-09-01', '2023-09-01', 'Laura es una trabajadora incansable que siempre bu', 9),
(10, 10010, 12345687, 'Fernando', 'Ramírez', 'Calle San Martín 707', '1989-10-01', '2023-10-01', 'Fernando aporta una visión fresca al equipo y es u', 10),
(11, 1, 12345678, 'Juan', 'Peralta', 'Av. Siempre Viva 123', '1985-01-15', '2020-05-01', 'Empleado destacado', 1),
(12, 2, 23456789, 'Maria', 'Calero', 'Calle Falsa 456', '1990-03-22', '2019-06-15', 'Buen rendimiento', 1),
(13, 3, 34567890, 'Carlos', 'Carrascal', 'Ruta 123 km 10', '1988-07-30', '2021-01-10', 'Requiere formación adicional', 2),
(14, 4, 45678901, 'Lucía', 'Fernández', 'Boulevard 789', '1995-12-05', '2018-08-20', 'Trabajo en equipo', 2),
(15, 5, 56789012, 'Pedro', 'Martínez', 'Calle Real 234', '1992-11-11', '2022-03-03', 'Satisfacción del cliente', 3),
(16, 111, 39456123, 'Juanma', 'Melgarejo', 'Ituza', '1996-10-05', '2024-10-08', '', 2),
(19, 0, 45123789, 'Nacho', 'Melgarejo', '', '1999-05-02', '0000-00-00', 'Un tipazo', 3),
(20, 0, 39423561, 'Fernando', 'Cibau', '', '1989-02-05', '0000-00-00', '', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `razon_social` varchar(40) NOT NULL,
  `cuit` varchar(13) NOT NULL,
  `domicilio` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `razon_social`, `cuit`, `domicilio`, `email`) VALUES
(1, 'M - Electricidad', '30-70995009-2', 'Avenida Chile 1449', 'capitalhumano@m-electricidad.com'),
(2, 'HIRPACE', '30-58771877-0', 'SANTIAGO DEL ESTERO 1951', 'rrhh@hirpace.org.ar'),
(3, 'INTECIPRO SRL.', '30-70954517-1', 'General Güemes 1483', 'areapersonalsic@gmail.com'),
(4, 'OyS ingeniería s.r.l', '33-70943020-9', 'Alsina 104', 'oysingenieria@yahoo.com.ar'),
(5, 'Ag Max srl', '30-71637518-4', 'San Luis 848', 'rr.hh@angelitagolosinas.com'),
(6, 'Sindicato de Luz y Fuerza', '30-57068473-2', 'Pellegrini 525', 'saltasorglyf@hotmail.com'),
(7, 'Asociación de veteranos de guerra de Mal', '33-69127536-9', 'Florida 1199', 'sedemalvinas@hotmail.com'),
(8, 'TRANSPORTE LAGOS S.R.L', '30-62615714-5', 'Republica de Siria 1333', 'tasanignacio@arnetbiz.com.ar'),
(9, 'TRANSPORTE SAN IGNACIO S.R.L.', '30-71232665-0', 'Avda. Independencia 898', 'tasanignacio@arnetbiz.com.ar'),
(10, 'TDV S.R.L.', '30-71105941-1', 'Dr. Francisco de Gurruchaga 69', 'contacto1@empresa.com'),
(11, 'SANATORIO EL CARMEN S.A.', '30-54586514-5', 'Av. Belgrano 892', 'contacto2@empresa.com'),
(12, 'ALE HNOS. S.R.L.', '30-69068641-0', 'Las Bumbunas 702', 'recepcion.salta@alehnos.com.ar'),
(13, 'ISICACA', '30-54336003-8', 'Santiago del Estero 865', 'recursoshumanos@isicana.org.ar'),
(19, 'MI PROPIO JEFE', '1243453412341', 'LA CASA DE CARLITOS', 'carlitos@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `id` int(5) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `especialidad` varchar(30) NOT NULL,
  `matricula` varchar(30) NOT NULL,
  `dni` int(10) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`id`, `nombre`, `especialidad`, `matricula`, `dni`, `apellido`, `email`) VALUES
(1, 'Juan', 'Cardiología', 'CM-123456', 12345678, 'Pérez', 'juan.perez@example.com'),
(2, 'Ana', 'Pediatría General', 'PM-234567', 23456789, 'Gómez', 'ana.gomez@example.com'),
(3, 'Carloss', 'Dermatología Estética', 'DE-345678', 34567890, 'López', 'carlos.lopez@example.com'),
(4, 'María', 'Neurología Infantil', 'NI-456789', 45678901, 'Martínez', 'maria.martinez@example.com'),
(5, 'Lucíoa', 'Oncología Médica', 'OM-567890', 56789012, 'Hernández', 'lucia.hernandez@example.com'),
(6, 'Rodrigo', 'Oftalmología Pediátrica', 'OP-678901', 67890123, 'Fernández', 'jose.fernandez@example.com'),
(7, 'Pedro', 'Ginecología y Obstetricia', 'GO-789012', 78901234, 'Ramírez', 'pedro.ramirez@example.com'),
(8, 'Clara', 'Psiquiatría Adulta', 'PA-890123', 89012345, 'Torres', 'clara.torres@example.com'),
(9, 'Luis', 'Traumatología Deportiva', 'TD-901234', 90123456, 'Morales', 'luis.morales@example.com'),
(10, 'Sofía', 'Endocrinología y Metabolismo', 'EM-987654', 98765432, 'Rivera', 'sofia.rivera@example.com'),
(11, 'Roman', 'Urologia', 'CM-12356', 30123456, 'Elmascapo', 'medicodefinitivo@gmail.com'),
(18, 'Joaquin', 'Futbologia', 'asdasd', 40391022, 'Tenenbaum', 'jtenenbaum923@alumnos.frh.utn.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `empleado_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `medico` int(5) NOT NULL,
  `hora` time NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `id_turno` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`empleado_id`, `fecha`, `medico`, `hora`, `empresa_id`, `id_turno`) VALUES
(7, '2024-10-31', 2, '06:00:00', 5, 18),
(4, '2024-11-01', 1, '02:30:00', 5, 2),
(4, '2024-11-01', 2, '06:00:00', 8, 3),
(2, '2024-11-03', 3, '03:00:00', 6, 5),
(3, '2024-11-03', 3, '05:00:00', 1, 6),
(2, '2024-11-03', 3, '06:30:00', 2, 7),
(4, '2024-11-03', 3, '07:00:00', 8, 8),
(2, '2024-11-04', 3, '03:00:00', 7, 9),
(13, '2024-11-04', 2, '07:30:00', 8, 10),
(8, '2024-11-05', 2, '07:30:00', 2, 11),
(15, '2024-11-06', 3, '03:00:00', 7, 13),
(6, '2024-11-06', 3, '07:30:00', 5, 12),
(1, '2024-11-07', 5, '02:00:00', 2, 14),
(6, '2024-11-07', 2, '04:30:00', 5, 17),
(6, '2024-11-07', 3, '05:30:00', 6, 16),
(6, '2024-11-07', 8, '06:30:00', 2, 20),
(12, '2024-11-13', 4, '15:30:00', 1, 36),
(6, '2024-11-15', 1, '07:00:00', 6, 33),
(1, '2024-11-20', 4, '07:30:00', 1, 34),
(1, '2024-11-22', 4, '05:00:00', 1, 0),
(20, '2024-11-22', 4, '07:00:00', 6, 0),
(11, '2024-11-22', 2, '18:30:00', 1, 37),
(6, '2024-11-27', 3, '08:00:00', 6, 32),
(20, '2024-11-29', 8, '15:30:00', 6, 0),
(7, '2024-11-30', 2, '07:30:00', 6, 31),
(6, '2024-11-30', 2, '08:30:00', 6, 30),
(20, '2024-12-04', 4, '20:00:00', 6, 0),
(20, '2024-12-05', 6, '05:30:00', 6, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) DEFAULT NULL,
  `nombre_usuario` varchar(40) NOT NULL,
  `contrasenia` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tipo_usuario` int(11) NOT NULL DEFAULT 0,
  `medico` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `empresa_id`, `nombre_usuario`, `contrasenia`, `email`, `tipo_usuario`, `medico`) VALUES
(1, 1, 'ADM_MEDICINA', '$2y$10$2maWJN3aaX8sP730Ql4h5.gXcOC82kdLY8op/h0Pjo4ToesGAdx3S', 'prueba@gmail.com', 1, NULL),
(16, 3, 'EMPRESAS', '$2y$10$2maWJN3aaX8sP730Ql4h5.gXcOC82kdLY8op/h0Pjo4ToesGAdx3S', 'prueba2@gmail.com', 0, NULL),
(22, 2, 'MEDICOS', '$2y$10$2maWJN3aaX8sP730Ql4h5.gXcOC82kdLY8op/h0Pjo4ToesGAdx3S', 'prueba3@gmail.com', 2, 18),
(23, 19, 'Carlitos', '$2y$10$a78fE6boHlCbOuaIIbfhZ.29gtjael6aEcSYZ0oXVMhBx2jUBy3ju', 'carlitos@gmail.com', 0, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consultamedica`
--
ALTER TABLE `consultamedica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`fecha`,`hora`),
  ADD KEY `empleado_id` (`empleado_id`),
  ADD KEY `empresa_id` (`empresa_id`),
  ADD KEY `medico` (`medico`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`),
  ADD KEY `empresa_id` (`empresa_id`),
  ADD KEY `fk_medico` (`medico`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultamedica`
--
ALTER TABLE `consultamedica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consultamedica`
--
ALTER TABLE `consultamedica`
  ADD CONSTRAINT `consultamedica_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD CONSTRAINT `turnos_ibfk_1` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `turnos_ibfk_2` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `turnos_ibfk_3` FOREIGN KEY (`medico`) REFERENCES `medicos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_medico` FOREIGN KEY (`medico`) REFERENCES `medicos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
