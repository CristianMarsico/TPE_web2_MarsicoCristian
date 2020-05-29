-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2020 a las 01:45:26
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_music`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `name_admin` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_admin`, `name_admin`, `user_name`, `pass`) VALUES
(1, 'Marsico Cristian', 'CristianM', '$2y$12$nAJORzyf7JOVK5493.yjiuXsqYbEMcCzwXDASOBicDxuoHHzn6.pS'),
(3, 'Charly', 'garcia', '$2y$12$MoM6175p231U9JeR5d0jmO2fuH0.tuwe0LeomjGhpOpaxPcbT0qI6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bands`
--

CREATE TABLE `bands` (
  `id_b` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `album` varchar(200) NOT NULL,
  `songs` varchar(2000) NOT NULL,
  `year` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `id_g_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bands`
--

INSERT INTO `bands` (`id_b`, `name`, `album`, `songs`, `year`, `image`, `id_g_fk`) VALUES
(2, 'AC/DC', 'Highway To Hell', 'Highway To Hell, Girls Got The Rhythm, Walk All Over You', 1979, 'images/cds/highway.jpg', 2),
(3, 'Maná', 'Arde El Cielo', 'Déjame Entrar, Manda Una Señal, Labios Compartidos', 2008, 'images/cds/ardeelcielo.jpg', 3),
(4, 'Los Pericos', '1000 Vivos', '01-La Hiena, 02-Parate y Mira,03-Nada Que Perder', 2000, 'images/cds/1000vivos.jpg', 4),
(24, 'Soda Stereo', 'Nada Personal', 'Nada Personal, si no fuera por, Cuando pase el temblor, Danza Rota', 1875, 'images/cds/nadapersonal.jpg', 1),
(25, 'Gustavo Cerati', 'Ahí Vamos', 'Ahí vamos, Al fin sucede, Uno entre 1000', 2006, 'images/cds/ahivamos.jpg', 1),
(26, 'Guns n\' Roses', 'Appetite of destruction', 'Welcome to de jumgle, It\'s so easy, Nightrain', 1987, 'images/cds/appetite.jpg', 2),
(27, 'desconocido', 'no se sabe', 'tiene?', 1234, '', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genres`
--

CREATE TABLE `genres` (
  `id_g` int(11) NOT NULL,
  `genres` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genres`
--

INSERT INTO `genres` (`id_g`, `genres`) VALUES
(1, 'Rock Nacional'),
(2, 'Rock Internacional'),
(3, 'Latinos'),
(4, 'Reggae'),
(5, 'pedorros');

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `bands`
--
ALTER TABLE `bands`
  MODIFY `id_b` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `genres`
--
ALTER TABLE `genres`
  MODIFY `id_g` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
