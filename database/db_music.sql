-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2020 a las 16:46:55
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
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(11) NOT NULL,
  `name_admin` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_admin`, `name_admin`, `user_name`, `pass`) VALUES
(1, 'Marsico Cristian', 'CristianM', '31317933');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bands`
--

CREATE TABLE IF NOT EXISTS `bands` (
`id_b` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `album` varchar(200) NOT NULL,
  `songs` varchar(2000) NOT NULL,
  `year` int(11) NOT NULL,
  `id_g_fk` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `bands`
--

INSERT INTO `bands` (`id_b`, `name`, `album`, `songs`, `year`, `id_g_fk`) VALUES
(2, 'AC/DC', 'Highway To Hell', 'Highway To Hell, Girls Got The Rhythm, Walk All Over You', 1979, 2),
(3, 'Maná', 'Arde El Cielo', 'Déjame Entrar, Manda Una Señal, Labios Compartidos', 2008, 3),
(4, 'Los Pericos', '1000 Vivos', '01-La Hiena, 02-Parate y Mira,03-Nada Que Perder', 2000, 4),
(24, 'Soda Stereo', 'Nada Personal', 'Nada Personal', 1875, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
`id_g` int(11) NOT NULL,
  `genres` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `genres`
--

INSERT INTO `genres` (`id_g`, `genres`) VALUES
(1, 'Rock Nacional'),
(2, 'Rock Internacional'),
(3, 'Latinos'),
(4, 'Reggae'),
(7, 'Pedorros'),
(8, 'ahora si'),
(11, 'qqqqqqq');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `bands`
--
ALTER TABLE `bands`
 ADD PRIMARY KEY (`id_b`);

--
-- Indices de la tabla `genres`
--
ALTER TABLE `genres`
 ADD PRIMARY KEY (`id_g`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `bands`
--
ALTER TABLE `bands`
MODIFY `id_b` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `genres`
--
ALTER TABLE `genres`
MODIFY `id_g` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
