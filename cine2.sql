-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-02-2024 a las 22:31:29
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cine2`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregarpelicula` (IN `nombre2` VARCHAR(25), IN `precio2` VARCHAR(25), IN `img2` VARCHAR(100))   BEGIN
DECLARE rutaImagen VARCHAR(100);
SET rutaImagen = CONCAT('/storage/', img2);
INSERT INTO `peliculas`(`id`, `Nombre`, `precio`, `total`, `Imagen`) VALUES (null,nombre2,precio2,1,rutaImagen);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ventas` (IN `id2` INT, IN `entradas` VARCHAR(25))   BEGIN
DECLARE precio2 double;
DECLARE total2 double;
DECLARE val double;
    
    SELECT precio INTO precio2 FROM peliculas WHERE id = id2 LIMIT 1;
    SELECT Total INTO total2 FROM peliculas WHERE id = id2 LIMIT 1;
	set val=(precio2*entradas)+total2;
UPDATE `peliculas` SET `Total`= val WHERE id=id2;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `precio` double(8,2) NOT NULL,
  `total` varchar(50) NOT NULL,
  `Imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `Nombre`, `precio`, `total`, `Imagen`) VALUES
(14, 'tranformers', 1000.00, '1', '/storage/WhatsApp Image 2024-02-18 at 11.42.36 PM.jpeg'),
(15, 'qwertyui', 80.00, '1', '/storage/WhatsApp Image 2024-02-18 at 11.35.55 PM.jpeg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
