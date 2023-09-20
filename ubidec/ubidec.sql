-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-09-2023 a las 01:39:51
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ubidec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto_institutos`
--

CREATE TABLE `foto_institutos` (
  `id` int(11) NOT NULL,
  `foto_instituto` varchar(255) NOT NULL,
  `id_instituto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institutos`
--

CREATE TABLE `institutos` (
  `id` int(11) NOT NULL,
  `id_secretario` int(11) NOT NULL,
  `coordenadas` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `provincia` int(11) NOT NULL,
  `localidad` int(11) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `pagina` varchar(1000) NOT NULL,
  `nom_instu` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `cue` int(11) NOT NULL,
  `niveles` varchar(255) NOT NULL,
  `horarios` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `director` varchar(255) NOT NULL,
  `subdirector` varchar(255) NOT NULL,
  `secretario` varchar(255) NOT NULL,
  `requisitos` text NOT NULL,
  `f_actualizacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `institutos`
--

INSERT INTO `institutos` (`id`, `id_secretario`, `coordenadas`, `direccion`, `provincia`, `localidad`, `telefono`, `correo`, `pagina`, `nom_instu`, `tipo`, `cue`, `niveles`, `horarios`, `descripcion`, `director`, `subdirector`, `secretario`, `requisitos`, `f_actualizacion`) VALUES
(1, 1, '-34.793553, -58.618431', 'Bariloche 6615 1759 González', 1, 1, '11 5567-709', 'eest14lamatanza@abc.gob.ar', 'http://mt0690014.escuelas.gov.ar/?fbclid=IwAR05smycE4CfQhZSNzfHV-wqOi6FNbDX_G4Bv5nYNK7JiFErq699ckWu91E', 'Escuela Secundaria Tecnica N°14', 'Pública', 6563322, 'Técnico', 'Mañana/Tarde/Noche', 'Es una escuela publica que se desprende del desdoblamiento de la Escuela Media 12. Tiene 3 orientaciones tecnicas: tecnico en Informatica, tecnico de programación  en Tecnologia de los Alimentos. Nuestro principal propósito es contribuir para lograr una educación técnica de calidad que prepare al egresado para una educación superior y a la vez facilite su inserción en el ámbito laboral, conforme a lo estipulado por la Ley de Educación Técnico Profesional que persigue “favorecer niveles crecientes de equidad, calidad, eficiencia y efectividad de la Educación Técnico Profesional, como elemento clave de las estrategias de inclusión social, de desarrollo y crecimiento socioeconómico del país y sus regiones...”.\r\n                        El perfil del egresado de nuestra escuela, apunta a formar ciudadanos activos que con una marcada formación ética, solidaria y comprometida con la realidad social, que tenga una formación técnica suficientemente sólida y a la vez flexible, para que pueda desempeñarse como un profesional idóneo frente a un mundo laboral cambiante que exige adaptabilidad y capacitación continua.', 'Nestor Muños', 'Maria Capozuka', 'Pepe Mujica', 'Se requiere los niveles inicial y primario', '2023-08-31 02:08:19'),
(2, 1, '-4124132 3423243', 'Cnel. Conde, González Catánes', 1, 1, '01170785670', 'jajsda3@gmail.com', 'https://padremario.org', 'Escuela Secundaria padre mario', 'Privada', 7547, 'Secundario', 'Mañana/Tarde', 'Nuestro propósito se puede resumir en nuestra más profunda intención de alcanzar el pleno desarrollo de la persona como parte de una comunidad.\r\nDicho propósito se efectiviza a través de una misión que guía nuestro día a día, y una visión que nos invita a un futuro que estamos seguros de poder alcanzar como comunidad.', 'nestor', 'kapozuka', 'pepe', 'Se requiere los nivel inicial y primario, además de contar con las vestimenta de la propia de la escuela', '2023-09-01 22:23:00'),
(3, 1, '-34.891929, -58.695294', 'José A. de San Alberto, Virrey del Pino', 1, 1, '011 4219-68', 'nicolaslcestudio@gmail.com', '', 'Escuela Educación Secundaria N°60', 'Pública', 542352, 'Secundario', 'Mañana/Tarde', 'alta escuela compa aca alado tenes el campo y el amigo el pomberito', 'jujas', 'marcos montoya', 'maria elena', 'nivel inicial y primario', '2023-09-01 23:19:10'),
(4, 1, '-34.6969764,-58.5777504', ' juan manuel de rosas, Isidro Casanova', 1, 1, '01170785670', ' tecnica1isidrocasanova@gmail.com', '', 'Técnica N°1 Armada Argentina', 'Pública', 4325423, 'Técnico', 'Mañana/Tarde/Noche', 'Poder obtener nuevas oportunidades para nuestros alumnos para desempeñarse en empresas de distinta envergadura, con tecnología de punta, intermedia o elemental. Asimismo, realizar actividades vinculadas al equipamiento y las instalaciones eléctricas en inmuebles y obras eléctricas de corrientes de muy baja, baja y media tensión.\r\n\r\nPoder desarrollar sus actividades en empresas constructoras e industriales, en empresas contratistas que brindan servicios de proyecto, montaje y/o mantenimiento eléctrico. En empresas de distribución, generación y transporte de energía eléctrica.  Prepararlos para originar y gestionar, emprendimientos productivos o de servicios en las áreas vinculadas a su competencia.', 'Sanches Montoya', 'Nazareno Fernandez', 'Luis Carrera', 'Se requiere los niveles inicial y primario. también contar con guardapolvo ', '2023-09-02 22:19:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ins_cuenta`
--

CREATE TABLE `ins_cuenta` (
  `id` int(11) NOT NULL,
  `eq_orientacion` varchar(10) NOT NULL,
  `centro_es` int(11) NOT NULL,
  `biblioteca` varchar(10) NOT NULL,
  `patio` varchar(10) NOT NULL,
  `comedor` varchar(10) NOT NULL,
  `sr_alimen` varchar(10) NOT NULL,
  `id_institucion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ins_cuenta`
--

INSERT INTO `ins_cuenta` (`id`, `eq_orientacion`, `centro_es`, `biblioteca`, `patio`, `comedor`, `sr_alimen`, `id_institucion`) VALUES
(1, '1', 1, '1', '1', '1', '1', 1),
(2, '1', 1, '0', '1', '0', '0', 2),
(3, '1', 1, '0', '1', '0', '0', 3),
(4, '1', 1, '0', '1', '1', '1', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE `localidades` (
  `id` int(11) NOT NULL,
  `localidad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`id`, `localidad`) VALUES
(1, 'La matanza'),
(2, 'San justo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidades`
--

CREATE TABLE `modalidades` (
  `id` int(11) NOT NULL,
  `icon` varchar(9999) NOT NULL,
  `modalidad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `modalidades`
--

INSERT INTO `modalidades` (`id`, `icon`, `modalidad`) VALUES
(1, 'icons/school/alimentos.png', 'Tecnologia en Alimentos'),
(2, 'icons/school/computadora.png', 'Informatica'),
(3, 'icons/school/informatica.png', 'Programación'),
(4, 'icons/school/constructor.png', 'Constructor'),
(5, 'icons/school/aeronautica.png', 'Aeronáutica'),
(6, 'icons/school/naval.png', 'Ingeniería naval'),
(7, 'icons/school/electromecanica.png', 'Electromecánica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mod_insti`
--

CREATE TABLE `mod_insti` (
  `id` int(11) NOT NULL,
  `id_modalidad` int(11) NOT NULL,
  `id_institucion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mod_insti`
--

INSERT INTO `mod_insti` (`id`, `id_modalidad`, `id_institucion`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 7, 4),
(5, 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id` int(11) NOT NULL,
  `provincia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id`, `provincia`) VALUES
(1, 'Buenos aires'),
(2, 'Cordoba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redes`
--

CREATE TABLE `redes` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `link` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `id_institucion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `redes`
--

INSERT INTO `redes` (`id`, `icon`, `tipo`, `link`, `color`, `id_institucion`) VALUES
(1, 'icons/facebook.png', 'facebook', 'https://www.facebook.com/tecnica.catorce/?locale=es_LA', 'background:#1877f2', 1),
(2, 'icons/twitter.png', 'twitter', 'https://twitter.com/tecnicacatorce?lang=es', 'background:#55acee', 1),
(3, 'icons/facebook.png', 'facebook', 'https://www.facebook.com/padremariopantaleo', 'background:#1877f2', 2),
(4, 'icons/instagram.png', 'instagram', 'https://www.instagram.com/obrapadremario/?hl=es-la', 'background:linear-gradient(30deg,#f78331,#da2e7d 50.39%,#6b54c6)', 2),
(5, 'icons/youtube.png', 'youtube', 'https://www.youtube.com/user/obradelpadremario', 'background:#f50022', 2),
(6, 'icons/facebook.png', 'facebook', 'https://www.facebook.com/tecnicauno.armadaargentina?locale=es_LA', 'background:#1877f2', 4),
(7, 'icons/instagram.png', 'instagram', 'https://www.instagram.com/eest_n1_oficial/?hl=es', 'background:linear-gradient(30deg,#f78331,#da2e7d 50.39%,#6b54c6)', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `foto_perfil` varchar(255) NOT NULL,
  `type_user` varchar(255) NOT NULL DEFAULT 'userOff',
  `f_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `apellido`, `telefono`, `correo`, `contrasena`, `foto_perfil`, `type_user`, `f_creacion`) VALUES
(1, 'Admin', 'facha', 'Número de teléfono no ingresado', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'user.png', 'Admin', '2023-07-11 15:53:06'),
(2, 'Nicolas Leonel', 'Corbalan', 'Número de teléfono no ingresado', 'nicolaslcestudio@gmail.com', '6cb22d1a3cbe703433bb567c3021d533', 'user.png', 'userOff', '2023-08-01 00:33:09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `foto_institutos`
--
ALTER TABLE `foto_institutos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_instituto` (`id_instituto`);

--
-- Indices de la tabla `institutos`
--
ALTER TABLE `institutos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ins_cuenta`
--
ALTER TABLE `ins_cuenta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modalidades`
--
ALTER TABLE `modalidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mod_insti`
--
ALTER TABLE `mod_insti`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `redes`
--
ALTER TABLE `redes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_institucion` (`id_institucion`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `foto_institutos`
--
ALTER TABLE `foto_institutos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `institutos`
--
ALTER TABLE `institutos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ins_cuenta`
--
ALTER TABLE `ins_cuenta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `modalidades`
--
ALTER TABLE `modalidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `mod_insti`
--
ALTER TABLE `mod_insti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `redes`
--
ALTER TABLE `redes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


--
-- Metadatos
--
USE `phpmyadmin`;

--
-- Metadatos para la tabla foto_institutos
--

--
-- Metadatos para la tabla institutos
--

--
-- Metadatos para la tabla ins_cuenta
--

--
-- Metadatos para la tabla localidades
--

--
-- Metadatos para la tabla modalidades
--

--
-- Metadatos para la tabla mod_insti
--

--
-- Metadatos para la tabla provincias
--

--
-- Metadatos para la tabla redes
--

--
-- Metadatos para la tabla user
--

--
-- Metadatos para la base de datos ubidec
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
