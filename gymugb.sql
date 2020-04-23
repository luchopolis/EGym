-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-04-2020 a las 02:07:07
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gymugb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `Nombres` text NOT NULL,
  `Apellidos` text NOT NULL,
  `Estatura` float NOT NULL,
  `peso` float NOT NULL,
  `edad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `Nombres`, `Apellidos`, `Estatura`, `peso`, `edad`) VALUES
(1, 'Anastasio', 'Gutierrez', 175, 160, 33),
(2, 'Angelia', 'Castillo', 1.68, 120, 25),
(3, 'Fernando', 'herrera', 1.76, 120, 33),
(4, 'Camila', 'Humanzor', 156, 150, 25),
(5, 'Joaquina', 'GUzman', 1.5, 120, 35),
(6, 'Veronica', 'Castillo', 1.6, 136, 25),
(7, 'Maria de los Angeles', 'Caballero Gonzalez', 1.52, 95, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosusuarios`
--

CREATE TABLE `datosusuarios` (
  `id` int(11) NOT NULL,
  `Email` text NOT NULL,
  `UserName` text NOT NULL,
  `PassWord` varchar(150) NOT NULL,
  `ClienteId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datosusuarios`
--

INSERT INTO `datosusuarios` (`id`, `Email`, `UserName`, `PassWord`, `ClienteId`) VALUES
(11, 'Anastasio@gmail.com', 'Joaquino', '123456', 1),
(12, 'angelina@gmail.com', 'Angi22', '123456', 2),
(15, 'Fernando@Gmail.com', 'FeGmail', '123456', 3),
(16, 'Joaquina@yahoo.com', 'JoAquina', '123456', 5),
(17, 'Camila@Hotmail.com', 'Camila', '123456', 4),
(18, 'veronica93@gmail.com', 'Veronica', '123456', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosusuariosempleado`
--

CREATE TABLE `datosusuariosempleado` (
  `id` int(11) NOT NULL,
  `Email` text NOT NULL,
  `UserName` text NOT NULL,
  `Pass` varchar(150) NOT NULL,
  `Tipo` varchar(40) NOT NULL,
  `NombreImagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datosusuariosempleado`
--

INSERT INTO `datosusuariosempleado` (`id`, `Email`, `UserName`, `Pass`, `Tipo`, `NombreImagen`) VALUES
(1, 'Caballero@gmail.com', 'Caballero', '5c1fd1df10ea33540b48171afd0db50867ba7ff3', 'Admin', 'default.png'),
(2, 'ElAdmin', 'Luis', '69c5fcebaa65b560eaf06c3fbeb481ae44b8d618', 'Admin', 'american_bald_eagle-wallpaper-1366x768.jpg'),
(3, 'ElChapo@gmail.com', 'Chapo', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin', 'default.png'),
(4, 'Aniceto', 'Por', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Empleado', 'default.png'),
(8, 'asdfasdf', 'asdf', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin', 'saturn-planet-minimalist.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `Nombre` text NOT NULL,
  `Apellido` text NOT NULL,
  `Direccion` text NOT NULL,
  `Telefono` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `Nombre`, `Apellido`, `Direccion`, `Telefono`) VALUES
(2, 'Arcangel', 'Ventura', 'San miguel', '7866969'),
(3, 'Anonimo', 'sadf', 'sadf', '7777777'),
(4, 'Juan Guillermo ', 'Guadalupe Rivas', 'Santo domingo', '60132128'),
(5, 'Cangura', 'Gutierrez', 'Mxico', '7865486'),
(6, 'Jose Arcadio', 'Buendia', 'Macondo', '79707872'),
(7, 'Emiliano', 'Toboso', 'Usulutan', '76653388'),
(8, 'Carlos', 'Marroquin', 'San miguel', '7556389');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenador`
--

CREATE TABLE `entrenador` (
  `id` int(11) NOT NULL,
  `IdEmpleado` int(11) NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `entrenador`
--

INSERT INTO `entrenador` (`id`, `IdEmpleado`, `Descripcion`) VALUES
(2, 2, 'sadf'),
(3, 3, 'Info'),
(4, 4, 'Ostras'),
(5, 5, 'fitness'),
(6, 6, 'Entrenador de Artes marciales'),
(15, 7, 'Atleta olimpico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `start` text NOT NULL,
  `end` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `title`, `Description`, `start`, `end`) VALUES
(3, 'dasf', 'asdf', '2020-03-03 18:17', '2020-04-19 10:20'),
(4, '2', '2', '2020-03-03 18:22', '2020-04-19 11:20'),
(5, 'dasf', 'asdf', '2020-03-03 15:29', '2020-04-04 10:20'),
(15, 'gg', 'ggg', '2020-04-21 16:51', '2020-04-21 20:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL,
  `nombregrupo` text NOT NULL,
  `identrenador` int(11) NOT NULL,
  `Cupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `nombregrupo`, `identrenador`, `Cupo`) VALUES
(2, 'A', 2, 20),
(3, 'H', 3, 15),
(4, 'C', 4, 15),
(5, 'F', 5, 15),
(6, 'I', 6, 15),
(18, 'M', 3, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Horarios`
--

CREATE TABLE `Horarios` (
  `idHorario` int(11) NOT NULL,
  `DiasTrabajo` text NOT NULL,
  `Entrada` text NOT NULL,
  `Salida` text NOT NULL,
  `idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Horarios`
--

INSERT INTO `Horarios` (`idHorario`, `DiasTrabajo`, `Entrada`, `Salida`, `idEmpleado`) VALUES
(1, 'Martes,Miercoles,Viernes', '8:00am', '4:00pm', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `id` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idGrupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`id`, `idCliente`, `idGrupo`) VALUES
(1, 5, 3),
(2, 6, 18),
(3, 3, 18),
(4, 7, 6),
(5, 4, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `TipoInventario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinas`
--

CREATE TABLE `maquinas` (
  `id` int(11) NOT NULL,
  `NombreMaquina` varchar(100) NOT NULL,
  `Estado` varchar(10) NOT NULL,
  `Imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `maquinas`
--

INSERT INTO `maquinas` (`id`, `NombreMaquina`, `Estado`, `Imagen`) VALUES
(1, 'Caminadora X20Pro', 'Disponible', 'caminadora.jpg'),
(2, 'Bicicleta Estacionaria W2', 'Disponible', 'BicicletaEstacionaria.jpg'),
(3, 'Gimnasio en casa', 'Disponible', 'EstacionGym.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre_p` text NOT NULL,
  `Descripcion` text NOT NULL,
  `Precio` float NOT NULL,
  `Stock` int(11) NOT NULL,
  `ImageProduct` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre_p`, `Descripcion`, `Precio`, `Stock`, `ImageProduct`) VALUES
(1, 'ISO WHEY ZERO', 'BE A SUPERHUMAN', 30, 20, 'SuplementoX.png'),
(2, 'Mascarilla', 'Mascarilla super pro', 10, 5, 'Mascarilla.png'),
(3, 'Producto silueta', '', 20, 12, 'silueta.png'),
(5, 'Producto silueta', '', 20, 12, 'minimalism-sunset.jpg'),
(6, 'Papel PRO MAX', '', 1000, 2, 'papel.png'),
(7, 'SILUETA 2', '', 10, 2, 'silueta.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacionproductos`
--

CREATE TABLE `reservacionproductos` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `fecha_reservacion` date NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodeinventario`
--

CREATE TABLE `tipodeinventario` (
  `id` int(11) NOT NULL,
  `TipoInventario` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoempleado`
--

CREATE TABLE `tipoempleado` (
  `id` int(11) NOT NULL,
  `TipoEmpleado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoempleado`
--

INSERT INTO `tipoempleado` (`id`, `TipoEmpleado`) VALUES
(1, 'Admin'),
(2, 'Empleado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datosusuarios`
--
ALTER TABLE `datosusuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ClienteId` (`ClienteId`);

--
-- Indices de la tabla `datosusuariosempleado`
--
ALTER TABLE `datosusuariosempleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entrenador`
--
ALTER TABLE `entrenador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IdEmpleado` (`IdEmpleado`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `identrenador` (`identrenador`);

--
-- Indices de la tabla `Horarios`
--
ALTER TABLE `Horarios`
  ADD PRIMARY KEY (`idHorario`),
  ADD KEY `idEmpleado` (`idEmpleado`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idGrupo` (`idGrupo`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `TipoInventario` (`TipoInventario`);

--
-- Indices de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservacionproductos`
--
ALTER TABLE `reservacionproductos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipodeinventario`
--
ALTER TABLE `tipodeinventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipoempleado`
--
ALTER TABLE `tipoempleado`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `datosusuarios`
--
ALTER TABLE `datosusuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `datosusuariosempleado`
--
ALTER TABLE `datosusuariosempleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `entrenador`
--
ALTER TABLE `entrenador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `Horarios`
--
ALTER TABLE `Horarios`
  MODIFY `idHorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `reservacionproductos`
--
ALTER TABLE `reservacionproductos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `datosusuarios`
--
ALTER TABLE `datosusuarios`
  ADD CONSTRAINT `datosusuarios_ibfk_1` FOREIGN KEY (`ClienteId`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `entrenador`
--
ALTER TABLE `entrenador`
  ADD CONSTRAINT `entrenador_ibfk_1` FOREIGN KEY (`IdEmpleado`) REFERENCES `empleado` (`id`);

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `Grupos_ibfk_1` FOREIGN KEY (`identrenador`) REFERENCES `entrenador` (`id`);

--
-- Filtros para la tabla `Horarios`
--
ALTER TABLE `Horarios`
  ADD CONSTRAINT `Horarios_ibfk_1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`id`);

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `Fk_gRUPOSS` FOREIGN KEY (`idGrupo`) REFERENCES `grupos` (`id`),
  ADD CONSTRAINT `Inscripcion_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `Inventario_ibfk_1` FOREIGN KEY (`TipoInventario`) REFERENCES `tipodeinventario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
