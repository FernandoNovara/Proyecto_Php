-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-10-2022 a las 17:28:15
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `turnos`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_Paciente` (IN `Id` INT(11))  BEGIN
	DECLARE personaId integer;
    
    SELECT Devolver_id_persona(Id) into personaId;
	
	DELETE FROM paciente WHERE paciente.IdPaciente = Id;
    
    DELETE FROM persona WHERE persona.IdPersona = personaId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_pacientes` (IN `Nombre` VARCHAR(50), IN `Dni` INT(11), IN `Correo` VARCHAR(100), IN `Telefono` VARCHAR(11), IN `Password` VARCHAR(80), IN `Contacto` VARCHAR(70), IN `Medico_Cabecera` VARCHAR(70), IN `Mutual` VARCHAR(30))  BEGIN
	DECLARE id integer;
    
    INSERT INTO `persona`(`Nombre`, `Dni`, `Correo`, `Telefono`, `Password`) VALUES (Nombre, Dni, Correo, Telefono, Password);
    
    SELECT `Mostrar_Ultimo_IdPersona`() into id;
    
    INSERT INTO `paciente`(`IdPersona`,`Contacto`, `Medico_Cabecera`, `Mutual`) VALUES (id,Contacto,Medico_Cabecera,Mutual);
END$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `Devolver_id_persona` (`Id` INT(11)) RETURNS INT(11) BEGIN
	DECLARE personaID integer;
    
    SELECT paciente.IdPersona  INTO personaID FROM 			paciente WHERE paciente.IdPaciente = Id;
    
    RETURN personaID;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `Mostrar_Ultimo_IdPersona` () RETURNS INT(11) BEGIN
	declare id integer;
    SELECT MAX(IdPersona) into id from persona;
    RETURN id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `IdAdmin` int(11) NOT NULL,
  `IdAdmision` int(11) NOT NULL,
  `Codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admision`
--

CREATE TABLE `admision` (
  `IdAdmision` int(11) NOT NULL,
  `IdPersona` int(11) NOT NULL,
  `Horario_Turno` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `IdAgenda` int(11) NOT NULL,
  `IdMedico` int(11) DEFAULT NULL,
  `IdProcedimiento` int(11) DEFAULT NULL,
  `Cant_Turnos` int(11) NOT NULL,
  `Fecha_disponible` date NOT NULL,
  `Duracion` int(11) NOT NULL,
  `Turnos_Dados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `IdEspecialidad` int(11) NOT NULL,
  `Tipo` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`IdEspecialidad`, `Tipo`) VALUES
(2, 'Cardiologo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja_turnos`
--

CREATE TABLE `hoja_turnos` (
  `IdHojaTurnos` int(11) NOT NULL,
  `IdTurnos` int(11) NOT NULL,
  `IdAgenda` int(11) NOT NULL,
  `Turno_num` int(11) NOT NULL,
  `Horario_Turno` varchar(15) NOT NULL,
  `Estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `IdMedico` int(11) NOT NULL,
  `IdPersona` int(11) NOT NULL,
  `Matricula` varchar(70) NOT NULL,
  `IdEspecialidad` int(11) NOT NULL,
  `Imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `IdPaciente` int(11) NOT NULL,
  `IdPersona` int(11) NOT NULL,
  `Contacto` varchar(70) NOT NULL,
  `Medico_Cabecera` varchar(70) NOT NULL,
  `Mutual` varchar(30) NOT NULL,
  `Estado` enum('Cumplidor','Riesgoso','No cumplidor','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`IdPaciente`, `IdPersona`, `Contacto`, `Medico_Cabecera`, `Mutual`, `Estado`) VALUES
(1, 1, 'Felipe', 'Kuns', 'Dosep', 'Cumplidor'),
(2, 4, 'Felipe', 'Kuns', 'Dosep', 'Cumplidor'),
(3, 5, 'Felipe', 'Kuns', 'Dosep', 'Cumplidor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `IdPersona` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Dni` int(11) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Telefono` varchar(11) NOT NULL,
  `Password` varchar(80) NOT NULL,
  `Rol` enum('Paciente','Admision','Medico','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`IdPersona`, `Nombre`, `Dni`, `Correo`, `Telefono`, `Password`, `Rol`) VALUES
(1, 'Claudio Diaz', 1357246, 'claudio@gmail.com', '1231411', '1234', 'Paciente'),
(4, 'Gilberto Suarez', 14284194, 'gilberto,@gmail.com', '1231411', '1234', 'Paciente'),
(5, 'Lidia Correa', 1234567, 'Lidia@gmail.com', '12345678', '1234', 'Paciente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimientos`
--

CREATE TABLE `procedimientos` (
  `idProcedimiento` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Indicacion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `IdTurnos` int(11) NOT NULL,
  `IdPaciente` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`IdAdmin`),
  ADD KEY `IdAdmision` (`IdAdmision`);

--
-- Indices de la tabla `admision`
--
ALTER TABLE `admision`
  ADD PRIMARY KEY (`IdAdmision`),
  ADD KEY `IdPersona` (`IdPersona`);

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`IdAgenda`),
  ADD KEY `IdMedico` (`IdMedico`) USING BTREE,
  ADD KEY `IdProcedimiento` (`IdProcedimiento`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`IdEspecialidad`);

--
-- Indices de la tabla `hoja_turnos`
--
ALTER TABLE `hoja_turnos`
  ADD PRIMARY KEY (`IdHojaTurnos`),
  ADD KEY `IdTurnos` (`IdTurnos`,`IdAgenda`),
  ADD KEY `IdAgenda` (`IdAgenda`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`IdMedico`),
  ADD KEY `IdPersona` (`IdPersona`),
  ADD KEY `IdEspecialidad` (`IdEspecialidad`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`IdPaciente`),
  ADD KEY `pacienteid` (`IdPersona`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`IdPersona`),
  ADD UNIQUE KEY `Dni` (`Dni`);

--
-- Indices de la tabla `procedimientos`
--
ALTER TABLE `procedimientos`
  ADD PRIMARY KEY (`idProcedimiento`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`IdTurnos`),
  ADD KEY `IdPaciente` (`IdPaciente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `IdAdmin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `admision`
--
ALTER TABLE `admision`
  MODIFY `IdAdmision` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `IdAgenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `IdEspecialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `hoja_turnos`
--
ALTER TABLE `hoja_turnos`
  MODIFY `IdHojaTurnos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `IdMedico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `IdPaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `IdPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `procedimientos`
--
ALTER TABLE `procedimientos`
  MODIFY `idProcedimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `IdTurnos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`IdAdmision`) REFERENCES `admision` (`IdAdmision`);

--
-- Filtros para la tabla `admision`
--
ALTER TABLE `admision`
  ADD CONSTRAINT `admision_ibfk_1` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`IdPersona`);

--
-- Filtros para la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`IdMedico`) REFERENCES `medico` (`IdMedico`),
  ADD CONSTRAINT `agenda_ibfk_2` FOREIGN KEY (`IdProcedimiento`) REFERENCES `procedimientos` (`idProcedimiento`);

--
-- Filtros para la tabla `hoja_turnos`
--
ALTER TABLE `hoja_turnos`
  ADD CONSTRAINT `hoja_turnos_ibfk_1` FOREIGN KEY (`IdTurnos`) REFERENCES `turnos` (`IdTurnos`),
  ADD CONSTRAINT `hoja_turnos_ibfk_2` FOREIGN KEY (`IdAgenda`) REFERENCES `agenda` (`IdAgenda`);

--
-- Filtros para la tabla `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `medico_ibfk_1` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`IdPersona`),
  ADD CONSTRAINT `medico_ibfk_2` FOREIGN KEY (`IdEspecialidad`) REFERENCES `especialidad` (`IdEspecialidad`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`IdPersona`);

--
-- Filtros para la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD CONSTRAINT `turnos_ibfk_1` FOREIGN KEY (`IdPaciente`) REFERENCES `paciente` (`IdPaciente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
