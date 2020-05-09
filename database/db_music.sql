-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2020 a las 16:02:34
-- Versión del servidor: 5.5.39
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_music`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `db_bands`
--

CREATE TABLE IF NOT EXISTS `db_bands` (
`id_b` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `album` varchar(200) NOT NULL,
  `songs` varchar(2000) NOT NULL,
  `year` int(11) NOT NULL,
  `id_g_fk` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `db_bands`
--

INSERT INTO `db_bands` (`id_b`, `name`, `album`, `songs`, `year`, `id_g_fk`) VALUES
(1, 'Soda Stereo', 'Nada Personal', 'nada personal, cuando pase el temblor', 1985, 1),
(2, 'AC/DC', 'Highway To Hell ', 'Highway To Hell, Girls Got The Rhythm, Walk All Over You', 1979, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `db_genres`
--

CREATE TABLE IF NOT EXISTS `db_genres` (
`id_g` int(11) NOT NULL,
  `genres` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `db_genres`
--

INSERT INTO `db_genres` (`id_g`, `genres`) VALUES
(1, 'Rock Nacional'),
(2, 'Rock Internacional'),
(3, 'Latinos'),
(4, 'Reggae');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `db_bands`
--
ALTER TABLE `db_bands`
 ADD PRIMARY KEY (`id_b`);

--
-- Indices de la tabla `db_genres`
--
ALTER TABLE `db_genres`
 ADD PRIMARY KEY (`id_g`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `db_bands`
--
ALTER TABLE `db_bands`
MODIFY `id_b` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `db_genres`
--
ALTER TABLE `db_genres`
MODIFY `id_g` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
