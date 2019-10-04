-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 03-07-2019 a las 17:44:28
-- Versión del servidor: 5.7.21
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `findaway`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

DROP TABLE IF EXISTS `calificaciones`;
CREATE TABLE IF NOT EXISTS `calificaciones` (
  `id_calificacion` int(5) NOT NULL AUTO_INCREMENT,
  `id_ruta` int(5) NOT NULL,
  `cant_estrellas` int(1) NOT NULL,
  PRIMARY KEY (`id_calificacion`),
  KEY `id_ruta` (`id_ruta`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caminar`
--

DROP TABLE IF EXISTS `caminar`;
CREATE TABLE IF NOT EXISTS `caminar` (
  `id_caminar` int(5) NOT NULL AUTO_INCREMENT,
  `nombre_ruta` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `id_parada` int(5) NOT NULL,
  `interseccion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_caminar`),
  KEY `id_parada` (`id_parada`),
  KEY `nombre_ruta` (`nombre_ruta`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `caminar`
--

INSERT INTO `caminar` (`id_caminar`, `nombre_ruta`, `id_parada`, `interseccion`) VALUES
(1, 'ruta 29', 10, '7 sur, 11 poniente'),
(2, 'ruta 45', 17, '2 sur, 11 oriente'),
(3, 'RUTA 3', 1, '2 sur, Blvd 5 de mayo'),
(4, 'Boulevard CU', 22, '7 sur, 21 poniente'),
(5, 'Bicentenario', 26, '18 sur, Blvd Circunvalación'),
(6, 'ruta 33', 37, '3 sur, 9 poniente'),
(7, 'ruta 72a', 44, '11 poniente, 2 sur');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paradas`
--

DROP TABLE IF EXISTS `paradas`;
CREATE TABLE IF NOT EXISTS `paradas` (
  `id_parada` int(5) NOT NULL AUTO_INCREMENT,
  `nombre_ruta` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `orden` int(2) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_parada`),
  KEY `nombre_ruta` (`nombre_ruta`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `paradas`
--

INSERT INTO `paradas` (`id_parada`, `nombre_ruta`, `orden`, `nombre`) VALUES
(1, 'RUTA 3', 1, 'Analco'),
(2, 'RUTA 3', 2, 'San Francisco'),
(3, 'RUTA 3', 3, 'San Antonio'),
(4, 'RUTA 3', 4, 'Santa Maria'),
(5, 'RUTA 3', 5, 'China Poblana'),
(6, 'RUTA 3', 6, 'Gpe Victoria'),
(7, 'RUTA 3', 7, '11 norte'),
(8, 'RUTA 3', 8, 'Nacozari'),
(9, 'RUTA 3', 9, 'Hueyotlipan'),
(10, 'ruta 29', 1, '7 sur'),
(11, 'ruta 29', 2, '27 poniente'),
(12, 'ruta 29', 3, '19 sur'),
(13, 'ruta 29', 4, '31 poniente'),
(14, 'ruta 29', 5, '25 poniente'),
(15, 'ruta 29', 6, 'Calzada Zavaleta'),
(16, 'ruta 29', 7, 'Boulevard Atlixco'),
(17, 'ruta 45', 1, '2 sur'),
(18, 'ruta 45', 2, '11 poniente'),
(19, 'ruta 45', 3, '19 sur'),
(20, 'ruta 45', 4, 'Circuito Juan Pablo II'),
(21, 'ruta 45', 5, 'Vía Atlixcáyotl'),
(22, 'Boulevard CU', 1, '7 sur'),
(23, 'Boulevard CU', 2, '31 poniente'),
(24, 'Boulevard CU', 3, 'Blvd Héroes del 5 de mayo'),
(25, 'Boulevard CU', 4, '18 sur'),
(26, 'Bicentenario', 1, 'Blvd Circunvalación'),
(27, 'Bicentenario', 2, ''),
(28, 'Bicentenario', 3, ''),
(29, 'Bicentenario', 4, ''),
(30, 'Bicentenario', 5, ''),
(31, 'Bicentenario', 6, ''),
(32, 'Bicentenario', 7, ''),
(33, 'Bicentenario', 8, ''),
(34, 'Bicentenario', 9, ''),
(35, 'Bicentenario', 10, ''),
(36, 'Bicentenario', 11, 'Cúmulo de Virgo'),
(37, 'ruta 33', 1, '3 sur'),
(38, 'ruta 33', 2, '9 oriente'),
(39, 'ruta 33', 3, '2 sur'),
(40, 'ruta 33', 4, '12, sur'),
(41, 'ruta 33', 5, 'Avenida San Francisco'),
(42, 'ruta 33', 6, '14 sur'),
(43, 'ruta 33', 7, 'Avenida San Claudio'),
(44, 'ruta 72a', 1, '11 poniente'),
(45, 'ruta 72a', 2, '14 sur'),
(46, 'ruta 72a', 3, '20 oriente'),
(47, 'ruta 72a', 4, '22 oriente'),
(48, 'ruta 72a', 5, 'Calz Ignacio Zaragoza'),
(49, 'ruta 72a', 6, '32 poniente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas`
--

DROP TABLE IF EXISTS `rutas`;
CREATE TABLE IF NOT EXISTS `rutas` (
  `id_ruta` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_origen` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `esquina_OrigenA` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `esquina_OrigenB` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_destino` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `esquina_DestinoA` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `esquina_DestinoB` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `mapa` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_ruta`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rutas`
--

INSERT INTO `rutas` (`id_ruta`, `nombre`, `descripcion`, `nombre_origen`, `esquina_OrigenA`, `esquina_OrigenB`, `nombre_destino`, `esquina_DestinoA`, `esquina_DestinoB`, `mapa`) VALUES
(1, 'ruta 29', 'Pasa del centro a Angelópolis. Solo camiones con frente verde y los laterales de color blanco liso. ', 'Centro', '7 sur', '11 poniente', 'Angelópolis', 'Blvd Niño Poblano', 'Vía Atlixcayotl', 'https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d30172.38810454633!2d-98.2332005733817!3d19.03960642494977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e3!4m3!3m2!1d19.0443311!2d-98.1987731!4m3!3m2!1d19.0319738!2d-98.23095149999999!5e0!3m2!1ses-419!2smx!4v1562173373663!5m2!1ses-419!2smx'),
(2, 'ruta 45a', 'Llega del centro a Angelópolis. Camión grande totalmente blanca y con número de ruta enfrente .', 'Centro', '2 sur', '11 poniente', 'Angelópolis', 'Blvd Niño Poblano', 'Vía Atlixcayotl', 'deadRuta.php'),
(3, 'RUTA 3', 'Metrobús para llegar del centro a CAPU. Camión articulado con paradero específico blanco con el logo de ruta 3 en los laterales y  con logotipo R de nueva ruta .', 'Centro', 'Analco', '', 'CAPU', 'Hueyotlipan', '', 'https://www.google.com/maps/embed?pb=!1m36!1m12!1m3!1d30168.967148184907!2d-98.21472332336302!3d19.058421574258357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m21!3e6!4m3!3m2!1d19.0443311!2d-98.1987731!4m3!3m2!1d19.0411405!2d-98.19321289999999!4m3!3m2!1d19.066023899999998!2d-98.19116269999999!4m3!3m2!1d19.072553799999998!2d-98.1949001!4m3!3m2!1d19.0738104!2d-98.2040518!5e0!3m2!1ses-419!2smx!4v1562173043257!5m2!1ses-419!2smx'),
(4, 'Bicentenario', 'Ruta Bicentenario para llegar del CU a CCU. Camión grande color verde y con el logo de la ruta en todo el lateral .', 'CU', '18 sur', 'Blvd. Circunvalación', 'CCU', 'Cúmulo de Virgo', 'Vía Atlixcayotl', 'https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d60347.078149149536!2d-98.25616622340776!3d19.0332721006686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e3!4m3!3m2!1d19.0443311!2d-98.1987731!4m3!3m2!1d19.022488199999998!2d-98.2426435!5e0!3m2!1ses-419!2smx!4v1562173255295!5m2!1ses-419!2smx'),
(5, 'Boulevard CU', 'Camión usualmente viejo de color azul de la parte de enfrente, los laterales en la parte superior crema, inferior azul con líneas que separan de color rojo y amarillo. ', 'Centro', '7 sur', '31 poniente', 'CU', '18 sur', 'Blvd. Circunvalación', 'https://www.google.com/maps/embed?pb=!1m22!1m8!1m3!1d30175.212252666322!2d-98.218558!3d19.0240602!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m5!1s0x85cfc0de93dda877%3A0xb42a9d723740b496!2sCentro%2C+Puebla%2C+Pue.!3m2!1d19.0437335!2d-98.1980244!4m3!3m2!1d19.005157!2d-98.204402!5e0!3m2!1ses-419!2smx!4v1562171519907!5m2!1ses-419!2smx'),
(6, 'ruta 33', 'Color blanco con el frontal blanco con un número 33 en color rojo , el lateral es blanco con una línea recta y al final.inclinada de color gris roja azul, con cartel naranja.', 'Centro', '3 sur', '9 poniente', 'CU', 'Avenida San Claudio', '14 sur', 'https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d30175.76183810754!2d-98.21954925449984!3d19.021033448203713!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m3!3m2!1d19.0443311!2d-98.1987731!4m3!3m2!1d19.0411405!2d-98.19321289999999!4m3!3m2!1d18.9995387!2d-98.2042239!5e0!3m2!1ses-419!2smx!4v1562171897608!5m2!1ses-419!2smx'),
(7, 'ruta 72a', 'Camión grande de color blanco con el frontal blanco con número de la ruta y cu de color naranja , en el lateral una línea roja con azul .', 'Centro', '11 poniente', '2 sur', 'Fuertes', 'Calzada Zaragoza', '32 poniente', 'https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d15085.255660102612!2d-98.20034622093156!3d19.049930893644497!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e6!4m3!3m2!1d19.0443311!2d-98.1987731!4m3!3m2!1d19.0595905!2d-98.18569149999999!5e0!3m2!1ses-419!2smx!4v1562173150723!5m2!1ses-419!2smx');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
