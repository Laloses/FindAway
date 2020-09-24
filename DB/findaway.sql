--
-- Base de datos: findaway
--
DROP DATABASE IF EXISTS findaway;
CREATE DATABASE findaway;
use findaway;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla USUARIOS
--
CREATE TABLE usuarios(
	id_usuario int(5) NOT NULL AUTO_INCREMENT,
	nombre varchar(15) COLLATE utf8_spanish_ci NOT NULL,
	usuario varchar(20) COLLATE utf8_spanish_ci NOT NULL,
	password varchar(8) COLLATE utf8_spanish_ci NOT NULL,
	email varchar(40) COLLATE utf8_spanish_ci NOT NULL,
	 PRIMARY KEY (id_usuario)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla RUTAS
--
CREATE TABLE IF NOT EXISTS rutas (
  id_ruta int(5) NOT NULL AUTO_INCREMENT,
  nombre varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  descripcion varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  nombre_origen varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  esquina_OrigenA varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  esquina_OrigenB varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  nombre_destino varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  esquina_DestinoA varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  esquina_DestinoB varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  mapa varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (id_ruta)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla COMENTARIOS
--
CREATE TABLE comentarios(
	id_comentario int(5) NOT NULL AUTO_INCREMENT,
	id_ruta int(5) NOT NULL,
	id_usuario int(5) NOT NULL,
	fecha datetime NOT NULL,
	mensaje varchar(500) COLLATE utf8_spanish_ci NOT NULL,
	 PRIMARY KEY(id_comentario),
	 FOREIGN KEY(id_ruta) REFERENCES rutas(id_ruta),
	 FOREIGN KEY(id_usuario) REFERENCES usuarios(id_usuario)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla CALIFICACIONES
--
CREATE TABLE IF NOT EXISTS calificaciones (
  id_calificacion int(5) NOT NULL AUTO_INCREMENT,
  id_usuario int(5) NOT NULL,
  id_ruta int(5) NOT NULL,
  cant_estrellas int(1) NOT NULL,
  PRIMARY KEY (id_calificacion),	
  FOREIGN KEY (id_ruta) REFERENCES rutas(id_ruta),
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla paradas
--
CREATE TABLE IF NOT EXISTS paradas (
  id_parada int(5) NOT NULL AUTO_INCREMENT,
  id_ruta int(5) NOT NULL,
  orden int(2) NOT NULL,
  nombre varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (id_parada),
  FOREIGN KEY (id_ruta) REFERENCES rutas(id_ruta)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla caminar
--
CREATE TABLE IF NOT EXISTS caminar (
  id_caminar int(5) NOT NULL AUTO_INCREMENT,
  id_ruta int(5) NOT NULL,
  id_parada int(5) NOT NULL,
  interseccion varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (id_caminar),
  KEY id_parada (id_parada),
  FOREIGN KEY (id_ruta) REFERENCES rutas(id_ruta)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
--
-- Volcado de datos para la tabla rutas
--
INSERT INTO rutas (id_ruta, nombre, descripcion, nombre_origen, esquina_OrigenA, esquina_OrigenB, nombre_destino, esquina_DestinoA, esquina_DestinoB, mapa) VALUES
(1, 'ruta 29', 'Pasa del centro a Angelópolis. Solo camiones con frente verde y los laterales de color blanco liso. ', 'Centro', '7 sur', '11 poniente', 'Angelópolis', 'Blvd Niño Poblano', 'Vía Atlixcayotl', 'https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d30172.38810454633!2d-98.2332005733817!3d19.03960642494977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e3!4m3!3m2!1d19.0443311!2d-98.1987731!4m3!3m2!1d19.0319738!2d-98.23095149999999!5e0!3m2!1ses-419!2smx!4v1562173373663!5m2!1ses-419!2smx'),
(2, 'ruta 45a', 'Llega del centro a Angelópolis. Camión grande totalmente blanca y con número de ruta enfrente .', 'Centro', '2 sur', '11 poniente', 'Angelópolis', 'Blvd Niño Poblano', 'Vía Atlixcayotl', 'deadRuta.php'),
(3, 'RUTA 3', 'Metrobús para llegar del centro a CAPU. Camión articulado con paradero específico blanco con el logo de ruta 3 en los laterales y  con logotipo R de nueva ruta .', 'Centro', 'Analco', '', 'Zocalo', 'Hueyotlipan', '', 'https://www.google.com/maps/embed?pb=!1m36!1m12!1m3!1d30168.967148184907!2d-98.21472332336302!3d19.058421574258357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m21!3e6!4m3!3m2!1d19.0443311!2d-98.1987731!4m3!3m2!1d19.0411405!2d-98.19321289999999!4m3!3m2!1d19.066023899999998!2d-98.19116269999999!4m3!3m2!1d19.072553799999998!2d-98.1949001!4m3!3m2!1d19.0738104!2d-98.2040518!5e0!3m2!1ses-419!2smx!4v1562173043257!5m2!1ses-419!2smx'),
(4, 'Bicentenario', 'Ruta Bicentenario para llegar del CU a CCU. Camión grande color verde y con el logo de la ruta en todo el lateral .', 'CU', '18 sur', 'Blvd. Circunvalación', 'CCU', 'Cúmulo de Virgo', 'Vía Atlixcayotl', 'https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d60347.078149149536!2d-98.25616622340776!3d19.0332721006686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e3!4m3!3m2!1d19.0443311!2d-98.1987731!4m3!3m2!1d19.022488199999998!2d-98.2426435!5e0!3m2!1ses-419!2smx!4v1562173255295!5m2!1ses-419!2smx'),
(5, 'Boulevard CU', 'Camión usualmente viejo de color azul de la parte de enfrente, los laterales en la parte superior crema, inferior azul con líneas que separan de color rojo y amarillo. ', 'Centro', '7 sur', '31 poniente', 'CU', '18 sur', 'Blvd. Circunvalación', 'https://www.google.com/maps/embed?pb=!1m22!1m8!1m3!1d30175.212252666322!2d-98.218558!3d19.0240602!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m5!1s0x85cfc0de93dda877%3A0xb42a9d723740b496!2sCentro%2C+Puebla%2C+Pue.!3m2!1d19.0437335!2d-98.1980244!4m3!3m2!1d19.005157!2d-98.204402!5e0!3m2!1ses-419!2smx!4v1562171519907!5m2!1ses-419!2smx'),
(6, 'ruta 33', 'Color blanco con el frontal blanco con un número 33 en color rojo , el lateral es blanco con una línea recta y al final.inclinada de color gris roja azul, con cartel naranja.', 'Centro', '3 sur', '9 poniente', 'CU', 'Avenida San Claudio', '14 sur', 'https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d30175.76183810754!2d-98.21954925449984!3d19.021033448203713!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m3!3m2!1d19.0443311!2d-98.1987731!4m3!3m2!1d19.0411405!2d-98.19321289999999!4m3!3m2!1d18.9995387!2d-98.2042239!5e0!3m2!1ses-419!2smx!4v1562171897608!5m2!1ses-419!2smx'),
(7, 'ruta 72a', 'Camión grande de color blanco con el frontal blanco con número de la ruta y cu de color naranja , en el lateral una línea roja con azul .', 'Centro', '11 poniente', '2 sur', 'Fuertes', 'Calzada Zaragoza', '32 poniente', 'https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d15085.255660102612!2d-98.20034622093156!3d19.049930893644497!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e6!4m3!3m2!1d19.0443311!2d-98.1987731!4m3!3m2!1d19.0595905!2d-98.18569149999999!5e0!3m2!1ses-419!2smx!4v1562173150723!5m2!1ses-419!2smx');
--
-- Volcado de datos para la tabla paradas
--
INSERT INTO paradas (id_parada, id_ruta, orden, nombre) VALUES
(1, 3, 1, 'Analco'),
(2, 3, 2, 'San Francisco'),
(3, 3, 3, 'San Antonio'),
(4, 3, 4, 'Santa Maria'),
(5, 3, 5, 'China Poblana'),
(6, 3, 6, 'Gpe Victoria'),
(7, 3, 7, '11 norte'),
(8, 3, 8, 'Nacozari'),
(9, 3, 9, 'Hueyotlipan'),
(10, 1, 1, '7 sur'),
(11, 1, 2, '27 poniente'),
(12, 1, 3, '19 sur'),
(13, 1, 4, '31 poniente'),
(14, 1, 5, '25 poniente'),
(15, 1, 6, 'Calzada Zavaleta'),
(16, 1, 7, 'Boulevard Atlixco'),
(17, 2, 1, '2 sur'),
(18, 2, 2, '11 poniente'),
(19, 2, 3, '19 sur'),
(20, 2, 4, 'Circuito Juan Pablo II'),
(21, 2, 5, 'Vía Atlixcáyotl'),
(22, 5, 1, '7 sur'),
(23, 5, 2, '31 poniente'),
(24, 5, 3, 'Blvd Héroes del 5 de mayo'),
(25, 5, 4, '18 sur'),
(26, 4, 1, 'Blvd Circunvalación'),
(27, 4, 2, ''),
(28, 4, 3, ''),
(29, 4, 4, ''),
(30, 4, 5, ''),
(31, 4, 6, ''),
(32, 4, 7, ''),
(33, 4, 8, ''),
(34, 4, 9, ''),
(35, 4, 10, ''),
(36, 4, 11, 'Cúmulo de Virgo'),
(37, 6, 1, '3 sur'),
(38, 6, 2, '9 oriente'),
(39, 6, 3, '2 sur'),
(40, 6, 4, '12, sur'),
(41, 6, 5, 'Avenida San Francisco'),
(42, 6, 6, '14 sur'),
(43, 6, 7, 'Avenida San Claudio'),
(44, 7, 1, '11 poniente'),
(45, 7, 2, '14 sur'),
(46, 7, 3, '20 oriente'),
(47, 7, 4, '22 oriente'),
(48, 7, 5, 'Calz Ignacio Zaragoza'),
(49, 7, 6, '32 poniente');
-- --------------------------------------------------------

--
-- Volcado de datos para la tabla caminar
--
INSERT INTO caminar (id_caminar, id_ruta, id_parada, interseccion) VALUES
(1, 1, 10, '7 sur, 11 poniente'),
(2, 2, 17, '2 sur, 11 oriente'),
(3, 3, 1, '2 sur, Blvd 5 de mayo'),
(4, 5, 22, '7 sur, 21 poniente'),
(5, 4, 26, '18 sur, Blvd Circunvalación'),
(6, 6, 37, '3 sur, 9 poniente'),
(7, 7, 44, '11 poniente, 2 sur');
