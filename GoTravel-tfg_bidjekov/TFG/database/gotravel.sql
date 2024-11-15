-- Volcado SQL de phpMyAdmin
-- versión 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2024 a las 12:55:58
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Ajustes de codificación de caracteres
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- 
-- Base de datos: `gotravel`
--

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `destino` (
  `Destino_ID` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `Ciudad` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 
-- Volcado de datos para la tabla `destino`
--

INSERT INTO `destino` (`Destino_ID`, `Nombre`, `Descripcion`, `Ciudad`) VALUES
(1, 'España', 'Conocida por sus museos y su vida nocturna.', 'Madrid'),
(2, 'Brasil', 'Ciudad costera y de playas.', 'Rio de Janeiro'),
(3, 'Italia', 'Conocida por su historia, arte, y deliciosa gastronomía.', 'Roma'),
(4, 'Marruecos', 'Famoso por sus paisajes desérticos y mercados vibrantes.', 'Rabat'),
(5, 'Bulgaria', 'Conocida por sus playas y montañas, ideal para vacaciones.', 'Sofía'),
(6, 'Turquía', 'Famosa por su rica historia y cultura, especialmente en Estambul.', 'Ankara'),
(7, 'Japón', 'Conocido por su mezcla de modernidad y tradiciones antiguas.', 'Tokio'),
(8, 'China', 'Famoso por su cultura milenaria y lugares emblemáticos como la Gran Muralla.', 'Pekín'),
(9, 'Tailandia', 'Famosa por sus playas tropicales, templos y vibrante vida callejera.', 'Bangkok'),
(10, 'Grecia', 'Conocida por sus antiguas ruinas, impresionantes islas y cultura mediterránea.', 'Atenas'),
(11, 'Malta', 'Famosa por sus sitios históricos relacionados con sucesiones de gobernantes.', 'La Valeta');


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `vuelo`
--

CREATE TABLE `vuelo` (
  `Vuelo_ID` int(11) NOT NULL,
  `Origen_ID` int(11) DEFAULT NULL,
  `Destino_ID` int(11) DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL,
  `Fecha_Salida` datetime DEFAULT NULL,
  `Fecha_Llegada` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 
-- Volcado de datos para la tabla `vuelo`
--

INSERT INTO `vuelo` (`Vuelo_ID`, `Origen_ID`, `Destino_ID`, `Precio`, `Fecha_Salida`, `Fecha_Llegada`) VALUES
(1, 1, 2, 250.00, '2024-11-06 08:00:00', '2024-11-06 10:00:00'),
(2, 1, 3, 210.00, '2024-11-06 15:30:00', '2024-11-06 17:30:00'),
(3, 1, 4, 190.00, '2024-11-06 09:15:00', '2024-11-06 10:45:00'),
(4, 1, 5, 230.00, '2024-11-06 13:00:00', '2024-11-06 16:00:00'),
(5, 1, 6, 280.00, '2024-11-06 11:30:00', '2024-11-06 15:30:00'),
(6, 1, 7, 320.00, '2024-11-06 10:00:00', '2024-11-06 14:00:00'),
(7, 2, 8, 300.00, '2024-11-06 12:45:00', '2024-11-06 14:45:00'),
(8, 2, 9, 260.00, '2024-11-06 07:30:00', '2024-11-06 09:30:00'),
(9, 2, 10, 320.00, '2024-11-06 14:00:00', '2024-11-06 17:00:00'),
(10, 2, 11, 290.00, '2024-11-06 09:00:00', '2024-11-06 12:00:00'),
(11, 2, 1, 260.00, '2024-11-07 08:30:00', '2024-11-07 10:30:00'),
(12, 2, 3, 220.00, '2024-11-07 15:00:00', '2024-11-07 17:00:00'),
(13, 3, 4, 200.00, '2024-11-07 09:30:00', '2024-11-07 12:00:00'),
(14, 3, 5, 240.00, '2024-11-07 13:15:00', '2024-11-07 16:15:00'),
(15, 3, 6, 290.00, '2024-11-07 11:45:00', '2024-11-07 14:45:00'),
(16, 3, 7, 330.00, '2024-11-07 10:30:00', '2024-11-07 14:30:00'),
(17, 3, 8, 310.00, '2024-11-07 12:00:00', '2024-11-07 15:00:00'),
(18, 3, 9, 270.00, '2024-11-07 07:00:00', '2024-11-07 10:00:00'),
(19, 3, 10, 330.00, '2024-11-07 14:15:00', '2024-11-07 17:15:00'),
(20, 3, 11, 300.00, '2024-11-07 09:45:00', '2024-11-07 12:45:00'),
(21, 4, 2, 270.00, '2024-11-08 08:00:00', '2024-11-08 11:00:00'),
(22, 4, 3, 230.00, '2024-11-08 15:30:00', '2024-11-08 18:30:00'),
(23, 4, 1, 210.00, '2024-11-08 09:15:00', '2024-11-08 10:45:00'),
(24, 4, 5, 250.00, '2024-11-08 13:00:00', '2024-11-08 16:00:00'),
(25, 4, 6, 300.00, '2024-11-08 11:30:00', '2024-11-08 15:00:00'),
(26, 4, 7, 340.00, '2024-11-08 10:00:00', '2024-11-08 14:00:00'),
(27, 4, 8, 320.00, '2024-11-08 12:45:00', '2024-11-08 15:45:00'),
(28, 4, 9, 280.00, '2024-11-08 07:30:00', '2024-11-08 10:30:00'),
(29, 5, 10, 340.00, '2024-11-08 14:00:00', '2024-11-08 17:00:00'),
(30, 5, 11, 300.00, '2024-11-08 09:00:00', '2024-11-08 12:00:00'),
(31, 5, 6, 250.00, '2024-11-08 12:15:00', '2024-11-08 14:15:00'),
(32, 5, 7, 290.00, '2024-11-08 11:00:00', '2024-11-08 14:00:00'),
(33, 5, 8, 270.00, '2024-11-08 14:30:00', '2024-11-08 16:00:00'),
(34, 5, 9, 230.00, '2024-11-08 08:45:00', '2024-11-08 11:00:00'),
(35, 6, 2, 260.00, '2024-11-09 10:30:00', '2024-11-09 12:00:00'),
(36, 6, 3, 240.00, '2024-11-09 15:00:00', '2024-11-09 18:00:00'),
(37, 6, 4, 210.00, '2024-11-09 09:30:00', '2024-11-09 12:00:00'),
(38, 6, 5, 230.00, '2024-11-09 14:15:00', '2024-11-09 17:15:00'),
(39, 6, 7, 280.00, '2024-11-09 13:00:00', '2024-11-09 18:00:00'),
(40, 6, 8, 270.00, '2024-11-09 11:30:00', '2024-11-09 15:00:00'),
(41, 6, 2, 290.00, '2024-11-10 08:00:00', '2024-11-10 11:00:00'),
(42, 6, 3, 250.00, '2024-11-10 15:30:00', '2024-11-10 18:30:00'),
(43, 6, 4, 230.00, '2024-11-10 09:15:00', '2024-11-10 12:15:00'),
(44, 7, 5, 270.00, '2024-11-10 13:00:00', '2024-11-10 16:00:00'),
(45, 7, 6, 320.00, '2024-11-10 10:00:00', '2024-11-10 14:00:00'),
(46, 7, 7, 340.00, '2024-11-10 12:30:00', '2024-11-10 16:30:00'),
(47, 7, 8, 310.00, '2024-11-10 14:45:00', '2024-11-10 17:45:00'),
(48, 7, 9, 280.00, '2024-11-10 08:15:00', '2024-11-10 11:15:00'),
(49, 7, 10, 320.00, '2024-11-10 16:00:00', '2024-11-10 19:00:00'),
(50, 7, 11, 290.00, '2024-11-10 09:45:00', '2024-11-10 12:45:00'),
(51, 8, 2, 270.00, '2024-11-11 13:00:00', '2024-11-11 16:00:00'),
(52, 8, 3, 240.00, '2024-11-11 10:15:00', '2024-11-11 13:15:00'),
(53, 8, 4, 220.00, '2024-11-11 14:30:00', '2024-11-11 17:30:00'),
(54, 8, 5, 250.00, '2024-11-11 08:00:00', '2024-11-11 11:00:00'),
(55, 8, 6, 290.00, '2024-11-11 12:00:00', '2024-11-11 15:00:00'),
(56, 8, 7, 310.00, '2024-11-11 16:15:00', '2024-11-11 19:15:00'),
(57, 8, 8, 320.00, '2024-11-11 11:30:00', '2024-11-11 14:30:00'),
(58, 8, 9, 270.00, '2024-11-11 09:45:00', '2024-11-11 12:45:00'),
(59, 8, 10, 290.00, '2024-11-11 14:00:00', '2024-11-11 17:00:00'),
(60, 8, 11, 260.00, '2024-11-11 07:30:00', '2024-11-11 10:30:00'),
(61, 9, 2, 220.00, '2024-11-12 10:30:00', '2024-11-12 13:30:00'),
(62, 9, 3, 240.00, '2024-11-12 15:00:00', '2024-11-12 18:00:00'),
(63, 9, 4, 230.00, '2024-11-12 09:45:00', '2024-11-12 12:45:00'),
(64, 9, 5, 260.00, '2024-11-12 08:15:00', '2024-11-12 11:15:00'),
(65, 9, 6, 300.00, '2024-11-12 12:00:00', '2024-11-12 15:00:00'),
(66, 9, 7, 330.00, '2024-11-12 13:30:00', '2024-11-12 16:30:00'),
(67, 9, 8, 320.00, '2024-11-12 07:00:00', '2024-11-12 10:00:00'),
(68, 9, 9, 290.00, '2024-11-12 11:45:00', '2024-11-12 14:45:00'),
(69, 9, 10, 310.00, '2024-11-12 08:30:00', '2024-11-12 11:30:00'),
(70, 9, 11, 280.00, '2024-11-12 14:15:00', '2024-11-12 17:15:00'),
(71, 10, 2, 340.00, '2024-11-13 10:00:00', '2024-11-13 13:00:00'),
(72, 10, 3, 310.00, '2024-11-13 15:30:00', '2024-11-13 18:30:00'),
(73, 10, 4, 320.00, '2024-11-13 09:00:00', '2024-11-13 12:00:00'),
(74, 10, 5, 330.00, '2024-11-13 14:15:00', '2024-11-13 17:15:00'),
(75, 10, 6, 350.00, '2024-11-13 11:00:00', '2024-11-13 14:00:00'),
(76, 11, 2, 300.00, '2024-11-13 12:30:00', '2024-11-13 15:30:00'),
(77, 11, 3, 270.00, '2024-11-13 08:15:00', '2024-11-13 11:15:00'),
(78, 11, 4, 250.00, '2024-11-13 13:00:00', '2024-11-13 16:00:00'),
(79, 11, 5, 280.00, '2024-11-13 10:30:00', '2024-11-13 13:30:00'),
(80, 11, 6, 300.00, '2024-11-13 09:45:00', '2024-11-13 12:45:00');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotel`
--

CREATE TABLE `hotel` (
  `Hotel_ID` int(11) NOT NULL,
  `Destino_ID` int(11) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Descripción` text DEFAULT NULL,
  `Precio_Por_Noche` decimal(10,2) DEFAULT NULL,
  `Calificación` int(1) DEFAULT NULL,
  `Dirección` varchar(255) DEFAULT NULL,
  `Teléfono` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Data dump for the `hotel` table
--

INSERT INTO `hotel` (`Hotel_ID`, `Destino_ID`, `Nombre`, `Descripción`, `Precio_Por_Noche`, `Calificación`, `Dirección`, `Teléfono`, `Email`) VALUES
(1, 1, 'Hotel Madrid Centro', 'Hotel céntrico con acceso a todo el transporte público', 120.50, 4, 'Calle Ejemplo 1, Madrid', '912345678', 'info@hotelmadridcentro.com'),
(2, 2, 'Hotel Río de Janeiro', 'Hotel de lujo junto a la playa en Río de Janeiro', 150.75, 5, 'Avenida Ejemplo 2, Río', '934567890', 'info@hotelrio.com'),
(3, 3, 'Hotel Roma Elegante', 'Hotel clásico con vistas al Coliseo en Roma', 200.00, 5, 'Via Ejemplo 3, Roma', '390612345678', 'info@hotelromaelegante.com'),
(4, 4, 'Hotel Rabat Medina', 'Hotel con decoración marroquí en el corazón de la medina de Rabat', 95.00, 4, 'Calle Ejemplo 4, Rabat', '212612345678', 'info@hotelrabatmedina.com'),
(5, 5, 'Hotel Sofía Panorama', 'Hotel con vistas panorámicas de las montañas en Sofía', 110.00, 4, 'Bulevar Ejemplo 5, Sofía', '359312345678', 'info@hotelsofiapanorama.com'),
(6, 6, 'Hotel Ankara Deluxe', 'Hotel de lujo para negocios en el centro de Ankara', 130.00, 4, 'Avenida Ejemplo 6, Ankara', '903123456789', 'info@hotelankaradeluxe.com'),
(7, 7, 'Hotel Tokio Skyline', 'Hotel moderno con vistas a la Torre de Tokio', 220.00, 5, 'Calle Ejemplo 7, Tokio', '813012345678', 'info@hoteltokioskylinel.com'),
(8, 8, 'Hotel Pekín Imperial', 'Hotel de lujo con arquitectura tradicional en Pekín', 180.00, 5, 'Avenida Ejemplo 8, Pekín', '861012345678', 'info@hotelpekinimperial.com'),
(9, 9, 'Hotel Bangkok Oasis', 'Hotel boutique con jardines tropicales en Bangkok', 140.00, 4, 'Calle Ejemplo 9, Bangkok', '6621234567', 'info@hotelbangkokoasis.com'),
(10, 10, 'Hotel Atenas Antiguo', 'Hotel cerca de la Acrópolis con vistas históricas', 160.00, 5, 'Calle Ejemplo 10, Atenas', '302112345678', 'info@hotelatenasantiguo.com'),
(11, 11, 'Hotel La Valeta Fortaleza', 'Hotel histórico en una fortaleza en La Valeta', 170.00, 4, 'Calle Ejemplo 11, La Valeta', '35621234567', 'info@hotellavaletafortaleza.com'),
(12, 1, 'Hotel Boutique Madrid', 'Acogedor hotel boutique en el corazón de Madrid.', 145.00, 4, 'Calle Gran Vía 12, Madrid', '912345684', 'info@hotelboutiquemadrid.com'),
(13, 1, 'Hotel Art Madrid', 'Hotel contemporáneo con exposiciones de arte.', 165.00, 5, 'Calle de Vallehermoso 79, Madrid', '912345685', 'info@hotelartmadrid.com'),
(14, 2, 'Hotel Santa Teresa', 'Hotel de lujo con vistas a la playa de Copacabana.', 220.00, 5, 'Rua Santa Teresa 90, Río de Janeiro', '213456794', 'info@hotelsantateresa.com'),
(15, 2, 'Hotel Windsor Barra', 'Hotel frente a la playa con una piscina infinita.', 200.00, 4, 'Avenida Lucio Costa 2630, Río de Janeiro', '213456795', 'info@windsorbarra.com'),
(16, 3, 'Hotel Della Valle', 'Hotel de lujo con spa en el centro de Roma.', 250.00, 5, 'Viale di Trastevere 50, Roma', '390612345684', 'info@hoteldellavalle.com'),
(17, 3, 'Hotel Imperiale', 'Hotel clásico con decoración elegante en Roma.', 190.00, 4, 'Via Vittorio Veneto 24, Roma', '390612345685', 'info@hotelimperiale.com'),
(18, 4, 'Hotel La Tour Hassan', 'Hotel de lujo con jardín y piscina en Rabat.', 210.00, 5, 'Avenue Moulay Hassan 20, Rabat', '212612345682', 'info@latourhassan.com'),
(19, 4, 'Hotel Villa Mandarine', 'Hotel con estilo marroquí y piscina privada.', 180.00, 4, 'Calle de la Medina, Rabat', '212612345683', 'info@villamandarine.com'),
(20, 5, 'Hotel Sense Hotel', 'Hotel moderno con vistas a Vitosha en Sofía.', 140.00, 4, 'Bulevar Vitosha 25, Sofía', '359312345684', 'info@sensehotel.com'),
(21, 5, 'Hotel Arena di Serdica', 'Hotel de lujo en el corazón de Sofía, con spa.', 200.00, 5, 'Calle Budapeshta 2, Sofía', '359312345685', 'info@arenadiserdica.com'),
(22, 6, 'Hotel Wyndham Ankara', 'Hotel de lujo con centro de conferencias y gimnasio.', 160.00, 4, 'Calle Bestekar 1, Ankara', '903123456793', 'info@wyndhamankara.com'),
(23, 6, 'Hotel Movenpick Ankara', 'Hotel contemporáneo con bar y restaurante de cocina internacional.', 175.00, 5, 'Calle Sehit Ersan 12, Ankara', '903123456794', 'info@movenpickankara.com'),
(24, 7, 'Hotel The Peninsula Tokio', 'Hotel de lujo con spa y vistas espectaculares.', 600.00, 5, '1-8-1 Yurakucho, Tokio', '81335000000', 'info@peninsula.com'),
(25, 7, 'Hotel Mandarin Oriental Tokio', 'Hotel de lujo con restaurantes galardonados.', 700.00, 5, '2-1-1 Nihonbashi Muromachi, Tokio', '81332700200', 'info@mandarinoriental.com'),
(26, 8, 'Hotel Raffles Pekín', 'Hotel icónico con elegancia y lujo en Pekín.', 400.00, 5, 'Jinbao St 33, Pekín', '861012345684', 'info@raffles.com'),
(27, 8, 'Hotel The Opposite House', 'Hotel contemporáneo con diseño moderno y restaurante famoso.', 350.00, 5, 'Taikoo Li Sanlitun, Pekín', '861012345685', 'info@theoppositehouse.com'),
(28, 9, 'Hotel Chatrium Hotel Riverside Bangkok', 'Hotel de lujo junto al río con transporte gratuito al centro.', 150.00, 4, '28 Charoenkrung Soi 70, Bangkok', '66212345673', 'info@chatrium.com'),
(29, 9, 'Hotel The Sukosol', 'Hotel elegante con música en vivo y excelente restaurante.', 120.00, 4, '477 Phaya Thai Rd, Bangkok', '66212345674', 'info@thesukosol.com'),
(30, 10, 'Hotel St George Lycabettus', 'Hotel de lujo con vistas a la Acrópolis y piscina en la azotea.', 300.00, 5, '1 P. K. Kyprou, Atenas', '302112345682', 'info@stgeorgelycabettus.com'),
(31, 10, 'Hotel Electra Metropolis Atenas', 'Hotel moderno con spa y restaurante en la azotea.', 250.00, 5, '15 Mitropoleos St, Atenas', '302112345683', 'info@electrametropolis.com'),
(32, 11, 'Hotel The Phoenicia Malta', 'Hotel de lujo con vistas al puerto de La Valeta.', 320.00, 5, 'The Mall, La Valeta', '35621234572', 'info@thephoeniciamalta.com'),
(33, 11, 'Hotel Palazzo Consiglia', 'Hotel boutique con diseño elegante y desayuno gourmet.', 180.00, 4, 'Pjazza D Argotti 8, La Valeta', '35621234573', 'info@palazzoconsiglia.com');


-- --------------------------------------------------------


CREATE TABLE `usuario` (
  `Usuario_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Contraseña` varchar(255) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Direccion` varchar(20) DEFAULT NULL,
  `Opinion` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`Usuario_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

-- Volcado de datos para la tabla `usuario`
INSERT INTO `usuario` (`Usuario_ID`, `Nombre`, `Apellido`, `Email`, `Contraseña`, `Telefono`) VALUES
(1, 'Juan', 'Pérez', 'juan.perez@gmail.com', 'contraseña123', '123456789'),
(2, 'María', 'González', 'maria.gonzalez@gmail.com', 'password456', '987654321'),
(3, 'Carlos', 'Martínez', 'carlos.martinez@gmail.com', 'clave789', '456123789'),
(4, 'Laura', 'Fernández', 'laura.fernandez@gmail.com', 'segura123', '654987321'),
(5, 'Pedro', 'Sánchez', 'pedro.sanchez@gmail.com', 'password321', '741852963'),
(6, 'Ana', 'Romero', 'ana.romero@gmail.com', 'ana1234', '321654987'),
(7, 'Luis', 'Torres', 'luis.torres@gmail.com', 'luis5678', '159753486'),
(8, 'Elena', 'Gómez', 'elena.gomez@gmail.com', 'elena8765', '852369741'),
(9, 'Raúl', 'Jiménez', 'raul.jimenez@gmail.com', 'raul3210', '753159468'),
(10, 'Sofía', 'Martín', 'sofia.martin@gmail.com', 'sofia6543', '951753842'),
(11, 'Fernando', 'Alonso', 'fernando.alonso@gmail.com', 'fer123456', '258963147');


-- Estructura de tabla para la tabla `factura`
CREATE TABLE `factura` (
  `Factura_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario_ID` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Total` decimal(10,2) DEFAULT NULL,
  `Estado_Pago` enum('Pagado','Pendiente','Vencido') DEFAULT 'Pendiente',
  `Impuesto` decimal(10,2) DEFAULT NULL,
  `Detalles` text DEFAULT NULL,
  PRIMARY KEY (`Factura_ID`),
  CONSTRAINT `FK_Usuario_Factura` FOREIGN KEY (`Usuario_ID`) REFERENCES `usuario`(`Usuario_ID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `factura_vuelo`
CREATE TABLE `factura_vuelo` (
  `Factura_Vuelo_ID` int(11) NOT NULL,
  `Factura_ID` int(11) NOT NULL,
  `Vuelo_ID` int(11) NOT NULL,
  `Pasajeros` int(11) DEFAULT NULL,
  CONSTRAINT `FK_Factura_Vuelo` FOREIGN KEY (`Factura_ID`) REFERENCES `factura`(`Factura_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `factura_hotel`
CREATE TABLE `factura_hotel` (
  `Factura_Hotel_ID` int(11) NOT NULL,
  `Factura_ID` int(11) NOT NULL,
  `Hotel_ID` int(11) NOT NULL,
  `Noches` int(11) DEFAULT NULL,
  CONSTRAINT `FK_Factura_Hotel` FOREIGN KEY (`Factura_ID`) REFERENCES `factura`(`Factura_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Índices de la tabla `destino`
ALTER TABLE `destino`
  ADD PRIMARY KEY (`Destino_ID`);

-- Índices de la tabla `vuelo`
ALTER TABLE `vuelo`
  ADD PRIMARY KEY (`Vuelo_ID`),
  ADD KEY `Origen_ID` (`Origen_ID`),
  ADD KEY `Destino_ID` (`Destino_ID`);

-- Índices de la tabla `hotel`
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`Hotel_ID`);


-- Índices de la tabla `factura_vuelo`
ALTER TABLE `factura_vuelo`
  ADD PRIMARY KEY (`Factura_Vuelo_ID`),
  ADD KEY `Factura_ID` (`Factura_ID`),
  ADD KEY `Vuelo_ID` (`Vuelo_ID`);

-- Índices de la tabla `factura_hotel`
ALTER TABLE `factura_hotel`
  ADD PRIMARY KEY (`Factura_Hotel_ID`),
  ADD KEY `Factura_ID` (`Factura_ID`),
  ADD KEY `Hotel_ID` (`Hotel_ID`);


-- AUTO_INCREMENT de la tabla `destino`
ALTER TABLE `destino`
  MODIFY `Destino_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

-- AUTO_INCREMENT de la tabla `hotel`
ALTER TABLE `hotel`
  MODIFY `Hotel_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

-- AUTO_INCREMENT de la tabla `factura`
ALTER TABLE `factura`
  MODIFY `Factura_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

-- AUTO_INCREMENT de la tabla `factura_vuelo`
ALTER TABLE `factura_vuelo`
  MODIFY `Factura_Vuelo_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

-- AUTO_INCREMENT de la tabla `factura_hotel`
ALTER TABLE `factura_hotel`
  MODIFY `Factura_Hotel_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

-- AUTO_INCREMENT de la tabla `usuario`
ALTER TABLE `usuario`
  MODIFY `Usuario_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

-- Restricciones para tablas volcadas

-- Filtros para la tabla `vuelo`
ALTER TABLE `vuelo`
  ADD CONSTRAINT `vuelo_ibfk_1` FOREIGN KEY (`Origen_ID`) REFERENCES `destino` (`Destino_ID`),
  ADD CONSTRAINT `vuelo_ibfk_2` FOREIGN KEY (`Destino_ID`) REFERENCES `destino` (`Destino_ID`);

-- Filtros para la tabla `factura_vuelo`
ALTER TABLE `factura_vuelo`
  ADD CONSTRAINT `factura_vuelo_ibfk_1` FOREIGN KEY (`Factura_ID`) REFERENCES `factura` (`Factura_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `factura_vuelo_ibfk_2` FOREIGN KEY (`Vuelo_ID`) REFERENCES `vuelo` (`Vuelo_ID`) ON DELETE CASCADE;

-- Filtros para la tabla `factura_hotel`
ALTER TABLE `factura_hotel`
  ADD CONSTRAINT `factura_hotel_ibfk_1` FOREIGN KEY (`Factura_ID`) REFERENCES `factura` (`Factura_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `factura_hotel_ibfk_2` FOREIGN KEY (`Hotel_ID`) REFERENCES `hotel` (`Hotel_ID`) ON DELETE CASCADE;

COMMIT;

-- Finalización de configuración de caracteres
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

