-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-05-2013 a las 18:11:26
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cinefilando`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

DROP TABLE IF EXISTS `comentario`;
CREATE TABLE IF NOT EXISTS `comentario` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `pelicula` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `contenido` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `usuario`, `pelicula`, `fecha`, `contenido`) VALUES
(1, 'javi', 'Jungla de cristal', '2013-03-26 00:27:01', 'troleando en la DB...\r\n\r\nXD'),
(2, 'javi', 'Jungla de cristal', '2013-03-26 00:27:55', 'otra pruebecica'),
(3, 'javi', 'Origen', '2013-03-28 15:59:28', 'me gusto mucho'),
(4, 'javi', 'Jungla de cristal', '2013-03-31 15:10:39', 'es un peli muchu-chula'),
(5, 'javi', 'La vida de Brian', '2013-04-01 08:56:47', 'Pole!'),
(6, 'mariana', 'Origen', '2013-04-04 14:18:21', 'me ha gustado mucho, recomiendo la peli! ;)'),
(7, 'javi', 'Jungla de cristal', '2013-04-04 14:31:31', 'comentario de prueba\r\n'),
(8, 'javi', 'Donnie Darko', '2013-04-04 14:52:48', '<script>alert(''hola'')</script>'),
(9, 'javi', 'Donnie Darko', '2013-04-04 15:06:05', '<script>alert(''holaaaaaaaaa'')</script>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

DROP TABLE IF EXISTS `pelicula`;
CREATE TABLE IF NOT EXISTS `pelicula` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `año` int(4) NOT NULL,
  `duracion` int(3) NOT NULL,
  `director` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `reparto` varchar(600) COLLATE utf8_spanish_ci NOT NULL,
  `genero` set('comedia','drama','accion','thriller','ciencia-ficcion') COLLATE utf8_spanish_ci NOT NULL,
  `sinopsis` varchar(800) COLLATE utf8_spanish_ci NOT NULL,
  `puntuacion` varchar(4) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'XXXX',
  `estado` varchar(15) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'sin validar',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id`, `titulo`, `año`, `duracion`, `director`, `reparto`, `genero`, `sinopsis`, `puntuacion`, `estado`) VALUES
(1, 'Star Wars Episodio IV: Una Nueva Esperanza ', 1977, 121, 'George Lucas', 'Mark Hamill, Harrison Ford, Carrie Fisher, Peter Cushing, Alec Guinness, David Prowse, Peter Mayhew, Anthony Daniels, Kenny Baker, Phil Brown, Shelagh Fraser, Garrick Hagon, Denis Lawson, Alex McCrindle, Richard LeParmentier, Drewe Henley, Jack Purvis, Don Henderson, William Hootkins, Malcolm Tierney, Maury Chaykin', 'ciencia-ficcion', 'La princesa Leia, líder del movimiento rebelde que desea reinstaurar la República en la galaxia en los tiempos ominosos del Imperio, es capturada por las Fuerzas Imperiales, capitaneadas por el implacable Darth Vader, el sirviente más fiel del Emperador. El intrépido y joven Luke Skywalker, ayudado por Han Solo, capitán de la nave espacial "El Halcón Milenario", y los androides, R2D2 y C3PO, serán los encargados de luchar contra el enemigo y e intentar rescatar a la princesa para volver a instaurar la justicia en el seno de la galaxia. (FILMAFFINITY) ', '8.6', 'publicada'),
(2, 'El Padrino', 1972, 175, 'Francis Ford Coppola', 'Marlon Brando, Al Pacino, James Caan, Robert Duvall, Diane Keaton, John Cazale, Talia Shire, Richard Castellano, Sterling Hayden, Gianni Russo, Rudy Bond, John Marley, Richard Conte, Al Lettieri, Abe Vigoda, Franco Citti, Lenny Montana, Al Martino, Joe Spinell, Simonetta Stefanelli', 'drama', 'Años 40. Don Vito Corleone (Marlon Brando) es el respetado y temido jefe de una de las cinco familias de la mafia de Nueva York. Tiene cuatro hijos: una chica, Connie (Talia Shire), y tres varones: el impulsivo Sonny (James Caan), el pusilánime Freddie (John Cazale) y Michael (Al Pacino), que no quiere saber nada de los negocios de su padre. Cuando Corleone, siempre aconsejado por su consejero Tom Hagan (Robert Duvall), se niega a intervenir en el negocio de las drogas, el jefe de otra banda ordena su asesinato. Empieza entonces una violenta y cruenta guerra entre las familias mafiosas. (FILMAFFINITY)', '7.9', 'publicada'),
(3, 'Donnie Darko', 2001, 113, 'Richard Kelly', 'Jake Gyllenhaal, Maggie Gyllenhaal, Patrick Swayze, Jena Malone, Mary McDonnell, Drew Barrymore, Holmes Osborne, Noah Wyle, Katharine Ross, Daveigh Chase, James Duval, Arthur Taxier, Stuart Stone, Seth Rogen', 'ciencia-ficcion', 'Donnie es un chico americano dotado de gran inteligencia e imaginación. Tras escapar milagrosamente de una muerte casi segura, comienza a sufrir alucinaciones que lo llevan a actuar como nunca hubiera imaginado y a descubrir un mundo insólito a su alrededor. (FILMAFFINITY)', '10', 'publicada'),
(4, 'La vida de Brian', 1979, 93, 'Terry Jones', 'John Cleese, Michael Palin, Graham Chapman, Eric Idle, Terry Jones, Terry Gilliam, Sue Jones-Davies, Carol Cleveland, Terence Bayler, Andrew MacLachlan, Charles McKeown', 'comedia', 'Brian nace en un pesebre de Belén el mismo día que Jesucristo. Un cúmulo de desgraciados y tronchantes equívocos le harán llevar una vida paralela a la del verdadero Hijo de Dios. Sus pocas luces y el ambiente de decadencia y caos absoluto en que se haya sumergida la Galilea de aquellos días, le harán vivir en manos de su madre, de una feminista revolucionaria y del mismísimo Poncio Pilatos, su propia versión del calvario. (FILMAFFINITY)', '6.4', 'publicada'),
(5, 'Jungla de cristal', 1988, 131, 'John McTiernan', ' 	Bruce Willis, Bonnie Bedelia, Alan Rickman, Alexander Godunov, Reginald Veljohnson, Paul Gleason, William Atherton, Hart Bochner, Robert Davi, Grand L. Bush', 'accion', 'En lo alto de la ciudad de Los Ángeles un grupo armado terrorista se ha apoderado de un edificio tomando a un grupo de personas como rehenes. Sólo un hombre, el policía de Nueva York John McClane (Bruce Willis), ha conseguido escapar del acoso terrorista. McClane está solo y fuera de servicio, pero mantendrá una lucha feroz y agotadora contra los secuestradores. Él es la única esperanza para los rehenes. (FILMAFFINITY)', '6.7', 'publicada'),
(6, 'El silencio de los corderos', 1991, 118, 'Jonathan Demme', 'Jodie Foster, Anthony Hopkins, Scott Glenn, Ted Levine, Anthony Heald, Diane Baker, Brooke Smith, Tracey Walter, Kasi Lemmons, Chris Isaak, Charles Napier, Roger Corman, Frankie Faison, Paul Lazar', 'thriller', 'El FBI busca a "Buffalo Bill", un asesino en serie que mata a sus víctimas, todas adolescentes, después de prepararlas minuciosamente y arrancarles la piel. Para poder atraparlo recurren a Clarice Starling, una brillante licenciada universitaria, experta en conductas psicópatas, que aspira a formar parte del FBI. Siguiendo las instrucciones de su jefe, Jack Crawford, Clarice visita la cárcel de alta seguridad donde el gobierno mantiene encerrado a Hannibal Lecter, antiguo psicoanalista y asesino, dotado de una inteligencia superior a la normal. Su misión será intentar sacarle información sobre los patrones de conducta de "Buffalo Bill". (FILMAFFINITY)', '7.8', 'publicada'),
(7, 'Origen', 2010, 148, 'Christopher Nolan', 'Leonardo DiCaprio, Ken Watanabe, Joseph Gordon-Levitt, Marion Cotillard, Ellen Page, Tom Hardy, Cillian Murphy, Tom Berenger, Michael Caine, Dileep Rao, Lukas Haas, Pete Postlethwaite, Talulah Riley, Miranda Nolan', 'thriller,ciencia-ficcion', 'Dom Cobb (DiCaprio) es un experto en el arte de apropiarse, durante el sueño, de los secretos del subconsciente ajeno. La extraña habilidad de Cobb le ha convertido en un hombre muy cotizado en el mundo del espionaje, pero también lo ha condenado a ser un fugitivo y, por consiguiente, a renunciar a llevar una vida normal. Su única oportunidad para cambiar de vida será hacer exactamente lo contrario de lo que ha hecho siempre: la incepción, que consiste en implantar una idea en el subconsciente en lugar de sustraerla. Sin embargo, su plan se complica debido a la intervención de alguien que parece predecir cada uno de sus movimientos, alguien a quien sólo Cobb podrá descubrir. (FILMAFFINITY)', '9.1', 'publicada'),
(8, 'Solo ante el peligro', 1952, 84, 'Fred Zinnemann', 'Gary Cooper, Grace Kelly, Thomas Mitchell, Lloyd Bridges, Katy Jurado, Otto Kruger, Lon Chaney Jr., Henry Morgan, Lee Van Cleef, Ian MacDonald', 'drama', 'Will Kane (Gary Cooper), el sheriff del pequeño pueblo de Hadleyville, acaba de contraer matrimonio con Amy (Grace Kelly). Los recién casados proyectan trasladarse a la ciudad y abrir un pequeño negocio; pero, de repente, empieza a correr por el pueblo la noticia de que Frank Miller (Ian MacDonald), un criminal que Kane había atrapado y llevado ante la justicia, ha salido de la cárcel y llegará al pueblo en el tren del mediodía para vengarse. El tiempo va pasando lentamente, pero nadie en el pueblo está dispuesto a ayudar al sheriff.', '6.94', 'publicada'),
(9, 'Este muerto está muy vivo', 1989, 99, 'Ted Kotcheff', 'Andrew McCarthy, Jonathan Silverman, Catherine Mary Stewart, Terry Kiser, Don Calfa, Catherine Parks, Louis Giambalvo, Ted Kotcheff', 'comedia', 'Dos jóvenes empleados de una compañía de seguros, Larry y Richard, se van a la costa a pasar tranquilamente el primer lunes de septiembre, el Día del Trabajo. Larry y Richard se han comportado como empleados modélicos, y han descubierto un importante plan en el que se pensaba realizar un importante desfalco en la empresa donde trabajan. El director de la compañía, Bernie Lomax, les recompensa invitándoles a una casa que posee en Hampton, una zona muy lujosa de la costa de Long Island. Bernie sería el anfitrión ideal... si no fuera por un pequeño detalle: está muerto. (FILMAFFINITY)', '7.03', 'publicada'),
(10, 'Parque Jurásico', 1993, 120, 'Steven Spielberg', 'Sam Neill, Laura Dern, Jeff Goldblum, Richard Attenborough, Ariana Richards, Joseph Mazzello, Wayne Knight, Samuel L. Jackson, Bob Peck, Martin Ferrero, B.D. Wong, Miguel Sandoval, Gerald R. Molen', 'ciencia-ficcion', 'El multimillonario John Hammond consigue hacer realidad su sueño de clonar dinosaurios del Jurásico y crear con ellos un parque temático en una isla remota. Antes de abrirlo al público, invita a una pareja de eminentes científicos y a un matemático para que comprueben la viabilidad del proyecto. Pero las medidas de seguridad del parque no prevén el instinto de supervivencia de la madre naturaleza ni la codicia humana. (FILMAFFINITY)', '8.16', 'publicada'),
(11, 'La lista de Schindler', 1993, 195, 'Steven Spielberg', 'Liam Neeson, Ben Kingsley, Ralph Fiennes, Caroline Goodall, Jonathan Sagall, Embeth Davidtz, Norbert Weisser, Martin S. Bergmann', 'drama', 'Segunda Guerra Mundial (1939-1945). Oskar Schindler (Liam Neeson), un hombre de enorme astucia y talento para las relaciones públicas, organiza un ambicioso plan para ganarse la simpatía de los nazis. Después de la invasión de Polonia por los alemanes (1939), consigue, gracias a sus relaciones con los nazis, la propiedad de una fábrica de Cracovia. Allí emplea a cientos de operarios judíos, cuya explotación le hace prosperar rápidamente. Su gerente (Ben Kingsley), también judío, es el verdadero director en la sombra, pues Schindler carece completamente de conocimientos para dirigir una empresa. (FILMAFFINITY)', '7.86', 'publicada'),
(12, 'Cadena perpetua', 1994, 142, 'Frank Darabont', 'Tim Robbins, Morgan Freeman, Bob Gunton, James Whitmore, Gil Bellows, William Sadler, Mark Rolston, Clancy Brown, David Proval', 'drama', 'Acusado del asesinato de su mujer, Andrew Dufresne (Tim Robbins), tras ser condenado a cadena perpetua, es enviado a la cárcel de Shawshank. Con el paso de los años conseguirá ganarse la confianza del director del centro y el respeto de sus compañeros de prisión, especialmente de Red (Morgan Freeman), el jefe de la mafia de los sobornos. (FILMAFFINITY)', '7.32', 'publicada'),
(13, 'Pulp Fiction', 1994, 153, 'Quentin Tarantino', 'John Travolta, Samuel L. Jackson, Uma Thurman, Bruce Willis, Harvey Keitel, Eric Stoltz, Tim Roth, Maria de Medeiros, Amanda Plummer, Ving Rhames, Rosanna Arquette, Christopher Walken, Quentin Tarantino, Peter Greene, Phil LaMarr, Paul Calderon, Burr Steers, Frank Whaley', 'thriller', 'Jules y Vincent son dos asesinos a sueldo con muy pocas luces que trabajan para Marsellus Wallace. Antes de realizar un trabajo, Vincent le confiesa a Jules que Marsellus le ha pedido que cuide de Mia, su mujer. Jules le recomienda prudencia porque es muy peligroso sobrepasarse con la novia del jefe, pero llega la hora de trabajar y ambos deben ponerse manos a la obra. Su misión: recuperar un misterioso maletín. (FILMAFFINITY)', 'XXXX', 'sin validar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `username` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `mail` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `rol` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`,`mail`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`username`, `password`, `mail`, `rol`) VALUES
('asd', '750de7c1debcad6f433e64acded5369ea114e402', 'asd@asd.com', 'usuario'),
('javi', 'f8b72cce657c3b0da4f5ed2bb8cd8327e0984a6e', 'javi@javi.com', 'colaborador'),
('mariana', 'dcc8ac29461f589f14bf09fcaf7cb52df27af1fc', 'mariana_mcv@hotmail.com', 'usuario'),
('prueba', '6af9463496ad9b98c986ec4d35927a7869371d1d', 'poi@poi.com', 'usuario'),
('qwertyuioplkjhgf', '80e21a66fd537588735aa95c416709108acbb74a', 'qwe@qwe.com', 'usuario');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


GRANT ALL ON cinefilando.* TO javi@'localhost' IDENTIFIED BY "12345";