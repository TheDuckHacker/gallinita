-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 27, 2024 at 06:02 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3_avicola_bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `cierreprocesocrianza`
--

DROP TABLE IF EXISTS `cierreprocesocrianza`;
CREATE TABLE IF NOT EXISTS `cierreprocesocrianza` (
  `id_CierreCrianza` int NOT NULL AUTO_INCREMENT,
  `id_ProcesoCrianza` int NOT NULL,
  `faseFin` enum('1era','2da','3era') NOT NULL,
  `gallinasAptas` int NOT NULL,
  `gallinasNoAptas` int NOT NULL,
  `gallinasFallecidas` int NOT NULL,
  `fechaCierre` date NOT NULL,
  `id_Usuario` int NOT NULL,
  PRIMARY KEY (`id_CierreCrianza`),
  KEY `id_ProcesoCrianza` (`id_ProcesoCrianza`),
  KEY `id_Usuario` (`id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cierreprocesocrianza`
--

INSERT INTO `cierreprocesocrianza` (`id_CierreCrianza`, `id_ProcesoCrianza`, `faseFin`, `gallinasAptas`, `gallinasNoAptas`, `gallinasFallecidas`, `fechaCierre`, `id_Usuario`) VALUES
(1, 3, '3era', 50, 25, 25, '2024-08-12', 3),
(2, 4, '1era', 0, 0, 500, '2024-07-08', 3);

-- --------------------------------------------------------

--
-- Table structure for table `corrales`
--

DROP TABLE IF EXISTS `corrales`;
CREATE TABLE IF NOT EXISTS `corrales` (
  `id_Corral` int NOT NULL AUTO_INCREMENT,
  `faseAdmitida` enum('1era','2da','3era') NOT NULL,
  `capacidadMax` int NOT NULL,
  `estado` enum('Disponible','Ocupado') NOT NULL,
  PRIMARY KEY (`id_Corral`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `corrales`
--

INSERT INTO `corrales` (`id_Corral`, `faseAdmitida`, `capacidadMax`, `estado`) VALUES
(1, '1era', 200, 'Disponible'),
(2, '1era', 200, 'Disponible'),
(3, '1era', 500, 'Disponible'),
(4, '2da', 200, 'Disponible'),
(5, '2da', 500, 'Disponible'),
(6, '3era', 100, 'Disponible'),
(7, '3era', 100, 'Disponible'),
(8, '2da', 100, 'Disponible'),
(9, '3era', 100, 'Disponible');

-- --------------------------------------------------------

--
-- Table structure for table `corralproduccion`
--

DROP TABLE IF EXISTS `corralproduccion`;
CREATE TABLE IF NOT EXISTS `corralproduccion` (
  `id_CorralProd` int NOT NULL AUTO_INCREMENT,
  `cantMaxima` int NOT NULL,
  `cantActual` int DEFAULT NULL,
  PRIMARY KEY (`id_CorralProd`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `corralproduccion`
--

INSERT INTO `corralproduccion` (`id_CorralProd`, `cantMaxima`, `cantActual`) VALUES
(1, 200, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallinaponedora`
--

DROP TABLE IF EXISTS `gallinaponedora`;
CREATE TABLE IF NOT EXISTS `gallinaponedora` (
  `id_Gallina` int NOT NULL AUTO_INCREMENT,
  `id_CierreCrianza` int DEFAULT NULL,
  `id_LoteIngreso` int DEFAULT NULL,
  `nroCollar` int NOT NULL,
  `fechaIngreso` date NOT NULL,
  `id_CorralProd` int NOT NULL,
  `edadGallina` date NOT NULL,
  `estadoGallina` enum('Activa','Baja') NOT NULL,
  `fechaSalida` date DEFAULT NULL,
  PRIMARY KEY (`id_Gallina`),
  KEY `id_CierreCrianza` (`id_CierreCrianza`),
  KEY `id_LoteIngreso` (`id_LoteIngreso`),
  KEY `id_CorralProd` (`id_CorralProd`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallinaponedora`
--

INSERT INTO `gallinaponedora` (`id_Gallina`, `id_CierreCrianza`, `id_LoteIngreso`, `nroCollar`, `fechaIngreso`, `id_CorralProd`, `edadGallina`, `estadoGallina`, `fechaSalida`) VALUES
(1, 1, 1, 1000, '2024-08-13', 1, '2024-04-01', 'Activa', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gestiontransporte`
--

DROP TABLE IF EXISTS `gestiontransporte`;
CREATE TABLE IF NOT EXISTS `gestiontransporte` (
  `id_ProcesoTransporte` int NOT NULL AUTO_INCREMENT,
  `id_salida` int NOT NULL,
  `id_personal` int NOT NULL,
  `vehiculoPlaca` varchar(10) NOT NULL,
  PRIMARY KEY (`id_ProcesoTransporte`),
  KEY `id_salida` (`id_salida`),
  KEY `id_personal` (`id_personal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventarioproducto`
--

DROP TABLE IF EXISTS `inventarioproducto`;
CREATE TABLE IF NOT EXISTS `inventarioproducto` (
  `id_Producto` int NOT NULL AUTO_INCREMENT,
  `calidad` enum('A','B','C') NOT NULL,
  `tamaño` enum('S','M','L','XL') NOT NULL,
  `cantidadHuevos` int NOT NULL,
  PRIMARY KEY (`id_Producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loteingreso`
--

DROP TABLE IF EXISTS `loteingreso`;
CREATE TABLE IF NOT EXISTS `loteingreso` (
  `id_LoteIngreso` int NOT NULL AUTO_INCREMENT,
  `cantidad` int NOT NULL,
  `detalle` enum('Pollitos','Gallinas') NOT NULL,
  `fechaAdquisicion` date NOT NULL,
  `id_Usuario` int NOT NULL,
  PRIMARY KEY (`id_LoteIngreso`),
  KEY `id_Usuario` (`id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loteingreso`
--

INSERT INTO `loteingreso` (`id_LoteIngreso`, `cantidad`, `detalle`, `fechaAdquisicion`, `id_Usuario`) VALUES
(1, 200, 'Pollitos', '2024-04-07', 1),
(2, 200, 'Gallinas', '2024-04-10', 1),
(3, 500, 'Pollitos', '2024-05-05', 1),
(4, 500, 'Gallinas', '2024-05-12', 1),
(5, 400, 'Pollitos', '2024-10-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `planillapersonal`
--

DROP TABLE IF EXISTS `planillapersonal`;
CREATE TABLE IF NOT EXISTS `planillapersonal` (
  `id_Personal` int NOT NULL AUTO_INCREMENT,
  `ci` int NOT NULL,
  `nombrePersonal` varchar(50) NOT NULL,
  `apellidosPersonal` varchar(50) NOT NULL,
  `cargo` enum('Granjero','Despachador','Transportista') NOT NULL,
  `nroCelular` int NOT NULL,
  PRIMARY KEY (`id_Personal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `procesodecrianza`
--

DROP TABLE IF EXISTS `procesodecrianza`;
CREATE TABLE IF NOT EXISTS `procesodecrianza` (
  `id_ProcesoCrianza` int NOT NULL AUTO_INCREMENT,
  `id_LoteIngreso` int NOT NULL,
  `cantidadActual` int NOT NULL,
  `id_Corral` int NOT NULL,
  `faseCrianza` enum('1era','2da','3era') NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date DEFAULT NULL,
  `id_Usuario` int NOT NULL,
  PRIMARY KEY (`id_ProcesoCrianza`),
  KEY `id_LoteIngreso` (`id_LoteIngreso`),
  KEY `id_Corral` (`id_Corral`),
  KEY `id_Usuario` (`id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `procesodecrianza`
--

INSERT INTO `procesodecrianza` (`id_ProcesoCrianza`, `id_LoteIngreso`, `cantidadActual`, `id_Corral`, `faseCrianza`, `fechaInicio`, `fechaFin`, `id_Usuario`) VALUES
(1, 1, 200, 1, '1era', '2024-04-08', '2024-05-08', 1),
(2, 1, 150, 4, '2da', '2024-05-09', '2024-07-09', 1),
(3, 1, 100, 6, '3era', '2024-07-10', '2024-08-10', 1),
(4, 3, 500, 2, '1era', '2024-06-03', '2024-07-06', 1),
(5, 5, 400, 3, '1era', '2024-09-01', '2024-10-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `recepcionhuevos`
--

DROP TABLE IF EXISTS `recepcionhuevos`;
CREATE TABLE IF NOT EXISTS `recepcionhuevos` (
  `id_Recepcion` int NOT NULL AUTO_INCREMENT,
  `id_InventarioProducto` int DEFAULT NULL,
  `cantidadHuevosAptos` int NOT NULL,
  `cantidadDescartada` int DEFAULT NULL,
  `fechaRecepcion` date NOT NULL,
  `id_Personal` int NOT NULL,
  `id_Usuario` int NOT NULL,
  PRIMARY KEY (`id_Recepcion`),
  KEY `id_Usuario` (`id_Usuario`),
  KEY `id_Personal` (`id_Personal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registrosaludcrianza`
--

DROP TABLE IF EXISTS `registrosaludcrianza`;
CREATE TABLE IF NOT EXISTS `registrosaludcrianza` (
  `id_Registro` int NOT NULL AUTO_INCREMENT,
  `id_ProcesoCrianza` int NOT NULL,
  `sintomas` varchar(100) NOT NULL,
  `tipoAplicacion` enum('Vitaminas','Vacunas') NOT NULL,
  `observaciones` varchar(100) DEFAULT NULL,
  `fechaAplicacion` date NOT NULL,
  `id_Usuario` int NOT NULL,
  PRIMARY KEY (`id_Registro`),
  KEY `id_Usuario` (`id_Usuario`),
  KEY `id_ProcesoCrianza` (`id_ProcesoCrianza`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrosaludcrianza`
--

INSERT INTO `registrosaludcrianza` (`id_Registro`, `id_ProcesoCrianza`, `sintomas`, `tipoAplicacion`, `observaciones`, `fechaAplicacion`, `id_Usuario`) VALUES
(1, 1, 'falta de apetito', 'Vitaminas', NULL, '2024-04-15', 3),
(2, 2, 'dificultad para respirar', 'Vacunas', '1 sola aplicacion suficiente', '2024-05-13', 3),
(3, 3, 'deshidratacion', 'Vitaminas', NULL, '2024-07-18', 3);

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `id_Rol` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_Rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`id_Rol`, `nombre`) VALUES
(1, 'Gerente Avicola'),
(2, 'Encargado Produccion'),
(3, 'Veterinario');

-- --------------------------------------------------------

--
-- Table structure for table `salidaproduccion`
--

DROP TABLE IF EXISTS `salidaproduccion`;
CREATE TABLE IF NOT EXISTS `salidaproduccion` (
  `id_Salida` int NOT NULL AUTO_INCREMENT,
  `id_Producto` int NOT NULL,
  `CantidadSalidaHuevos` int NOT NULL,
  `fechaSalida` date NOT NULL,
  `id_personal` int NOT NULL,
  `id_usuario` int NOT NULL,
  PRIMARY KEY (`id_Salida`),
  KEY `id_Producto` (`id_Producto`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_personal` (`id_personal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_Usuario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `password` varchar(128) DEFAULT NULL,
  `id_Rol` int NOT NULL,
  PRIMARY KEY (`id_Usuario`),
  KEY `id_Rol` (`id_Rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_Usuario`, `nombre`, `apellidos`, `correo`, `password`, `id_Rol`) VALUES
(1, 'Sebastian', 'Gonzales Flores', 'sbf@gmail.com', '1234', 1),
(2, 'Carlos', 'Fuentes Torrico', 'cftgmail.com', '1234', 2),
(3, 'Mario', 'Rodriguez Perez', 'mrp@gmail.com', '1234', 3),
(4, 'Marcelo', 'Yucra Linares', 'myl@gmail.com', '1234', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cierreprocesocrianza`
--
ALTER TABLE `cierreprocesocrianza`
  ADD CONSTRAINT `cierreprocesocrianza_ibfk_1` FOREIGN KEY (`id_ProcesoCrianza`) REFERENCES `procesodecrianza` (`id_ProcesoCrianza`),
  ADD CONSTRAINT `cierreprocesocrianza_ibfk_2` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id_Usuario`);

--
-- Constraints for table `gallinaponedora`
--
ALTER TABLE `gallinaponedora`
  ADD CONSTRAINT `gallinaponedora_ibfk_1` FOREIGN KEY (`id_CierreCrianza`) REFERENCES `cierreprocesocrianza` (`id_CierreCrianza`),
  ADD CONSTRAINT `gallinaponedora_ibfk_2` FOREIGN KEY (`id_LoteIngreso`) REFERENCES `loteingreso` (`id_LoteIngreso`),
  ADD CONSTRAINT `gallinaponedora_ibfk_3` FOREIGN KEY (`id_CorralProd`) REFERENCES `corralproduccion` (`id_CorralProd`);

--
-- Constraints for table `gestiontransporte`
--
ALTER TABLE `gestiontransporte`
  ADD CONSTRAINT `gestiontransporte_ibfk_1` FOREIGN KEY (`id_salida`) REFERENCES `salidaproduccion` (`id_Salida`),
  ADD CONSTRAINT `gestiontransporte_ibfk_2` FOREIGN KEY (`id_personal`) REFERENCES `planillapersonal` (`id_Personal`);

--
-- Constraints for table `loteingreso`
--
ALTER TABLE `loteingreso`
  ADD CONSTRAINT `loteingreso_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id_Usuario`);

--
-- Constraints for table `procesodecrianza`
--
ALTER TABLE `procesodecrianza`
  ADD CONSTRAINT `procesodecrianza_ibfk_1` FOREIGN KEY (`id_LoteIngreso`) REFERENCES `loteingreso` (`id_LoteIngreso`),
  ADD CONSTRAINT `procesodecrianza_ibfk_2` FOREIGN KEY (`id_Corral`) REFERENCES `corrales` (`id_Corral`),
  ADD CONSTRAINT `procesodecrianza_ibfk_3` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id_Usuario`);

--
-- Constraints for table `recepcionhuevos`
--
ALTER TABLE `recepcionhuevos`
  ADD CONSTRAINT `recepcionhuevos_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id_Usuario`),
  ADD CONSTRAINT `recepcionhuevos_ibfk_2` FOREIGN KEY (`id_Personal`) REFERENCES `planillapersonal` (`id_Personal`);

--
-- Constraints for table `registrosaludcrianza`
--
ALTER TABLE `registrosaludcrianza`
  ADD CONSTRAINT `registrosaludcrianza_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id_Usuario`),
  ADD CONSTRAINT `registrosaludcrianza_ibfk_2` FOREIGN KEY (`id_ProcesoCrianza`) REFERENCES `procesodecrianza` (`id_ProcesoCrianza`);

--
-- Constraints for table `salidaproduccion`
--
ALTER TABLE `salidaproduccion`
  ADD CONSTRAINT `salidaproduccion_ibfk_1` FOREIGN KEY (`id_Producto`) REFERENCES `inventarioproducto` (`id_Producto`),
  ADD CONSTRAINT `salidaproduccion_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_Usuario`),
  ADD CONSTRAINT `salidaproduccion_ibfk_3` FOREIGN KEY (`id_personal`) REFERENCES `planillapersonal` (`id_Personal`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_Rol`) REFERENCES `rol` (`id_Rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
