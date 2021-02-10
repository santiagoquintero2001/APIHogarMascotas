-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-02-2021 a las 01:23:48
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mascotas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animal`
--

CREATE TABLE `animal` (
  `idAnimal` int(5) NOT NULL,
  `nombreAnimal` varchar(25) NOT NULL,
  `edadAnimal` int(5) NOT NULL,
  `tipoAnimal` varchar(30) NOT NULL,
  `descripcionAnimal` varchar(200) NOT NULL,
  `comidaAnimal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `animal`
--

INSERT INTO `animal` (`idAnimal`, `nombreAnimal`, `edadAnimal`, `tipoAnimal`, `descripcionAnimal`, `comidaAnimal`) VALUES
(1, 'Perro', 2, 'Domestico', 'Color café, tamaño grande.', 'Croquetas'),
(2, 'Gato', 3, 'Domestico', 'Color negro, ojos verdes', 'Galletas'),
(3, 'Mono', 2, 'Fauna Silvestre', 'Color café, tamaño pequeño.', 'Banano');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`idAnimal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
