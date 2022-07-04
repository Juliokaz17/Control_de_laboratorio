-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2022 a las 19:06:27
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `control_laboratorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analisis`
--

CREATE TABLE `analisis` (
  `Num_lote_prod` int(11) NOT NULL,
  `Fecha_prod` date NOT NULL,
  `Tipo_harina` varchar(100) NOT NULL,
  `Inspeccion_A` varchar(100) NOT NULL,
  `Inspeccion_B_Z` varchar(100) NOT NULL,
  `Resul_fuerza_panadera` varchar(100) NOT NULL,
  `Resul_tenacidad` varchar(100) NOT NULL,
  `Resul_extensibildad` varchar(100) NOT NULL,
  `Resul_radio_curva` varchar(100) NOT NULL,
  `Resul_elasticidad` varchar(100) NOT NULL,
  `Resul_humedad` varchar(100) NOT NULL,
  `Resul_absorción` varchar(100) NOT NULL,
  `Resul_tolerancia_mec` varchar(100) NOT NULL,
  `Responsable_análisis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_unidades_medida`
--

CREATE TABLE `catalogo_unidades_medida` (
  `Clv_unidad_medida` int(11) NOT NULL,
  `Simbolo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificados_de_calidad`
--

CREATE TABLE `certificados_de_calidad` (
  `Num_pedido_cliente` int(11) NOT NULL,
  `Num_lote` int(11) NOT NULL,
  `Cantidad_solicitada` int(11) NOT NULL,
  `Cantidad_total_entrega` int(11) NOT NULL,
  `Num_factura` int(11) NOT NULL,
  `Fecha_envio` date NOT NULL,
  `Fecha_caducidad` date NOT NULL,
  `Resul_fuerza_panadera` varchar(100) NOT NULL,
  `Resul_tenacidad` varchar(100) NOT NULL,
  `Resul_extensibildad` varchar(100) NOT NULL,
  `Resul_radio_curva` varchar(100) NOT NULL,
  `Resul_elasticidad` varchar(100) NOT NULL,
  `Resul_humedad` varchar(100) NOT NULL,
  `Resul_absorción` varchar(100) NOT NULL,
  `Resul_tolerancia_mec` varchar(100) NOT NULL,
  `Desviación_resultante` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Clv_cliente` int(11) NOT NULL,
  `Nombre_cliente` varchar(100) NOT NULL,
  `RFC` varchar(100) NOT NULL,
  `Domicilio_entrega` varchar(100) NOT NULL,
  `Factores_particulares` tinyint(1) NOT NULL,
  `Nombre_contacto` varchar(100) DEFAULT NULL,
  `Correo_contacto` varchar(100) DEFAULT NULL,
  `Telefono_contacto` varchar(100) DEFAULT NULL,
  `Puesto_contacto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Clv_cliente`, `Nombre_cliente`, `RFC`, `Domicilio_entrega`, `Factores_particulares`, `Nombre_contacto`, `Correo_contacto`, `Telefono_contacto`, `Puesto_contacto`) VALUES
(1009, 'julio perez', '2312423432', 'mexico', 0, 'rodolfo perez', 'julioveco@hotmail.com', '657565654', 'admin'),
(1010, 'julio ddsdw', '2312423432', 'mexico', 1, 'dwdqw wdqdwqd', 'julioveco@hotmail.com', '4543534543', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos_laboratorio`
--

CREATE TABLE `equipos_laboratorio` (
  `Clv_Equipo` int(11) NOT NULL,
  `Marca` varchar(100) NOT NULL,
  `Modelo` varchar(100) NOT NULL,
  `Serie` varchar(100) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Proveedor` varchar(100) NOT NULL,
  `Fecha_adquisicion` date NOT NULL,
  `Garantia` date NOT NULL,
  `Vigencia_garantia` date NOT NULL,
  `Ubic_equipo` varchar(100) DEFAULT NULL,
  `Responsable_equipo` varchar(100) NOT NULL,
  `Mantenimiento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipos_laboratorio`
--

INSERT INTO `equipos_laboratorio` (`Clv_Equipo`, `Marca`, `Modelo`, `Serie`, `Descripcion`, `Proveedor`, `Fecha_adquisicion`, `Garantia`, `Vigencia_garantia`, `Ubic_equipo`, `Responsable_equipo`, `Mantenimiento`) VALUES
(1, 'w', 'w', 'w', 'w', 'w', '2022-07-14', '0000-00-00', '0000-00-00', 'w', 'w', 'w'),
(7, 'v', 'v', 'v', 'v', 'v', '2022-07-01', '2022-07-01', '2022-07-01', 'x', 'x', 'x'),
(8, 'julio', 'a', 'a', 'a', 'a', '2022-07-13', '2022-07-15', '2022-07-14', 'a', 'a a', 'a'),
(9, 'julio', 'a', 'a', 'a', 'a', '2022-07-13', '2022-07-15', '2022-07-14', 'a', 'a a', 'a'),
(10, 'e', 'e', 'e', 'e', 'e', '2022-07-20', '0000-00-00', '0000-00-00', 'e', 'e e', 'e'),
(11, 'e', 'e', 'e', 'e', 'e', '2022-07-20', '0000-00-00', '0000-00-00', 'e', 'e e', 'e'),
(12, 'e', 'e', 'e', 'e', 'e', '2022-07-20', '0000-00-00', '0000-00-00', 'e', 'e e', 'e'),
(13, 'q', 'q', 'q', 'q', 'q', '2022-07-20', '0000-00-00', '0000-00-00', 'q', 'q q', 'q'),
(14, 'q', 'q', 'q', 'q', 'q', '2022-07-20', '0000-00-00', '0000-00-00', 'q', 'q q', 'q'),
(15, 'z', 'z', 'z', 'z', 'z', '2022-07-15', '2022-07-13', '2022-07-08', 'z', 'z z', 'z'),
(16, 'z', 'z', 'z', 'z', 'z', '2022-07-15', '2022-07-13', '2022-07-08', 'z', 'z z', 'z'),
(17, 'z', 'z', 'z', 'z', 'z', '2022-07-15', '2022-07-13', '2022-07-08', 'z', 'z z', 'z'),
(18, 'z', 'z', 'z', 'z', 'z', '2022-07-15', '2022-07-13', '2022-07-08', 'z', 'z z', 'z'),
(19, 'v', 'v', 'v', 'v', 'v', '2022-07-22', '2022-07-14', '2022-07-14', 'v', 'v v', 'v'),
(20, 't', 't', 't', 't', 't', '2022-07-20', '0000-00-00', '0000-00-00', 't', 't t', 't');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Puesto` varchar(100) NOT NULL,
  `Derechos` varchar(100) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Contrasena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nombre`, `Puesto`, `Derechos`, `Correo`, `Contrasena`) VALUES
(1, 'juan', 'Laboratorista', 'Altas', 'juliokaz17@gmail.com', 'juan12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valores_de_referencia`
--

CREATE TABLE `valores_de_referencia` (
  `Clv_cliente` int(11) NOT NULL,
  `Flag_equipo` tinyint(1) NOT NULL,
  `Nombre_factor` varchar(100) NOT NULL,
  `Lim_inferior` int(11) NOT NULL,
  `Lim_superior` int(11) NOT NULL,
  `Clv_unidad_medida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `analisis`
--
ALTER TABLE `analisis`
  ADD PRIMARY KEY (`Num_lote_prod`);

--
-- Indices de la tabla `catalogo_unidades_medida`
--
ALTER TABLE `catalogo_unidades_medida`
  ADD PRIMARY KEY (`Clv_unidad_medida`);

--
-- Indices de la tabla `certificados_de_calidad`
--
ALTER TABLE `certificados_de_calidad`
  ADD PRIMARY KEY (`Num_pedido_cliente`),
  ADD KEY `certificados_de_calidad_FK` (`Num_lote`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Clv_cliente`);

--
-- Indices de la tabla `equipos_laboratorio`
--
ALTER TABLE `equipos_laboratorio`
  ADD PRIMARY KEY (`Clv_Equipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `valores_de_referencia`
--
ALTER TABLE `valores_de_referencia`
  ADD PRIMARY KEY (`Clv_cliente`),
  ADD KEY `valores_de_referencia_FK` (`Clv_unidad_medida`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `analisis`
--
ALTER TABLE `analisis`
  MODIFY `Num_lote_prod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `catalogo_unidades_medida`
--
ALTER TABLE `catalogo_unidades_medida`
  MODIFY `Clv_unidad_medida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `certificados_de_calidad`
--
ALTER TABLE `certificados_de_calidad`
  MODIFY `Num_pedido_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Clv_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- AUTO_INCREMENT de la tabla `equipos_laboratorio`
--
ALTER TABLE `equipos_laboratorio`
  MODIFY `Clv_Equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `valores_de_referencia`
--
ALTER TABLE `valores_de_referencia`
  MODIFY `Clv_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `certificados_de_calidad`
--
ALTER TABLE `certificados_de_calidad`
  ADD CONSTRAINT `certificados_de_calidad_FK` FOREIGN KEY (`Num_lote`) REFERENCES `analisis` (`Num_lote_prod`);

--
-- Filtros para la tabla `valores_de_referencia`
--
ALTER TABLE `valores_de_referencia`
  ADD CONSTRAINT `valores_de_referencia_FK` FOREIGN KEY (`Clv_unidad_medida`) REFERENCES `catalogo_unidades_medida` (`Clv_unidad_medida`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
