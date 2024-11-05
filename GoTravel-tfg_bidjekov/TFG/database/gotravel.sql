-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2024 a las 12:55:58
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
-- Base de datos: `gotravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destination`
--

CREATE TABLE `destination` (
  `Destination_ID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `destination`
--

INSERT INTO `destination` (`Destination_ID`, `Name`, `Description`, `City`) VALUES
(1, 'España', 'Capital de España, conocida por sus museos y su vida nocturna.', 'Madrid'),
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
-- Estructura de tabla para la tabla `flight`
--

CREATE TABLE `flight` (
  `Flight_ID` int(11) NOT NULL,
  `Origin_ID` int(11) DEFAULT NULL,
  `Destination_ID` int(11) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Departure_Date` datetime DEFAULT NULL,
  `Arrival_Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `flight`
--

INSERT INTO `flight` (`Flight_ID`, `Origin_ID`, `Destination_ID`, `Price`, `Departure_Date`, `Arrival_Date`) VALUES
(1, 1, 2, 250.00, '2024-10-30 08:00:00', '2024-10-31 06:00:00'),
(2, 1, 3, 210.00, '2024-10-30 15:30:00', '2024-10-30 17:30:00'),
(3, 1, 4, 190.00, '2024-10-30 09:15:00', '2024-10-30 10:45:00'),
(4, 1, 5, 230.00, '2024-10-30 13:00:00', '2024-10-30 16:00:00'),
(5, 1, 6, 280.00, '2024-10-30 11:30:00', '2024-10-30 15:30:00'),
(6, 1, 7, 320.00, '2024-10-30 10:00:00', '2024-10-31 00:00:00'),
(7, 2, 8, 300.00, '2024-10-30 12:45:00', '2024-10-31 14:45:00'),
(8, 2, 9, 260.00, '2024-10-30 07:30:00', '2024-10-30 17:30:00'),
(9, 2, 10, 320.00, '2024-10-30 14:00:00', '2024-10-30 17:00:00'),
(10, 2, 11, 290.00, '2024-10-30 09:00:00', '2024-10-30 18:00:00'),
(11, 2, 1, 260.00, '2024-10-31 08:30:00', '2024-10-31 18:30:00'),
(12, 2, 3, 220.00, '2024-10-31 15:00:00', '2024-10-31 21:00:00'),
(13, 3, 4, 200.00, '2024-10-31 09:30:00', '2024-10-31 12:00:00'),
(14, 3, 5, 240.00, '2024-10-31 13:15:00', '2024-10-31 16:15:00'),
(15, 3, 6, 290.00, '2024-10-31 11:45:00', '2024-10-31 14:45:00'),
(16, 3, 7, 330.00, '2024-10-31 10:30:00', '2024-10-31 23:30:00'),
(17, 3, 8, 310.00, '2024-10-31 12:00:00', '2024-10-31 22:00:00'),
(18, 3, 9, 270.00, '2024-10-31 07:00:00', '2024-11-01 00:00:00'),
(19, 3, 10, 330.00, '2024-10-31 14:15:00', '2024-10-31 17:15:00'),
(20, 3, 11, 300.00, '2024-10-31 09:45:00', '2024-10-31 12:45:00'),
(21, 4, 2, 270.00, '2024-11-01 08:00:00', '2024-11-01 11:00:00'),
(22, 4, 3, 230.00, '2024-11-01 15:30:00', '2024-11-01 18:30:00'),
(23, 4, 1, 210.00, '2024-11-01 09:15:00', '2024-11-01 10:45:00'),
(24, 4, 5, 250.00, '2024-11-01 13:00:00', '2024-11-01 16:00:00'),
(25, 4, 6, 300.00, '2024-11-01 11:30:00', '2024-11-01 15:00:00'),
(26, 4, 7, 340.00, '2024-11-01 10:00:00', '2024-11-01 14:00:00'),
(27, 4, 8, 320.00, '2024-11-01 12:45:00', '2024-11-01 15:45:00'),
(28, 4, 9, 280.00, '2024-11-01 07:30:00', '2024-11-01 10:30:00'),
(29, 5, 10, 340.00, '2024-11-01 14:00:00', '2024-11-01 17:00:00'),
(30, 5, 11, 300.00, '2024-11-01 09:00:00', '2024-11-01 12:00:00'),
(31, 5, 6, 250.00, '2024-11-01 12:15:00', '2024-11-01 14:15:00'),
(32, 5, 7, 290.00, '2024-11-01 11:00:00', '2024-11-01 14:00:00'),
(33, 5, 8, 270.00, '2024-11-01 14:30:00', '2024-11-01 16:00:00'),
(34, 5, 9, 230.00, '2024-11-01 08:45:00', '2024-11-01 11:00:00'),
(35, 6, 2, 260.00, '2024-11-02 10:30:00', '2024-11-02 12:00:00'),
(36, 6, 3, 240.00, '2024-11-02 15:00:00', '2024-11-02 18:00:00'),
(37, 6, 4, 210.00, '2024-11-02 09:30:00', '2024-11-02 12:00:00'),
(38, 6, 5, 230.00, '2024-11-02 14:15:00', '2024-11-02 17:15:00'),
(39, 6, 7, 280.00, '2024-11-02 13:00:00', '2024-11-02 18:00:00'),
(40, 6, 8, 270.00, '2024-11-02 11:30:00', '2024-11-02 15:00:00'),
(41, 6, 2, 290.00, '2024-11-03 08:00:00', '2024-11-03 11:00:00'),
(42, 6, 3, 250.00, '2024-11-03 15:30:00', '2024-11-03 18:30:00'),
(43, 6, 4, 230.00, '2024-11-03 09:15:00', '2024-11-03 12:15:00'),
(44, 7, 5, 270.00, '2024-11-03 13:00:00', '2024-11-03 16:00:00'),
(45, 7, 6, 320.00, '2024-11-03 11:30:00', '2024-11-03 14:30:00'),
(46, 7, 7, 360.00, '2024-11-03 10:00:00', '2024-11-03 14:00:00'),
(47, 7, 8, 340.00, '2024-11-03 12:45:00', '2024-11-03 15:45:00'),
(48, 7, 9, 300.00, '2024-11-03 07:30:00', '2024-11-03 10:30:00'),
(49, 7, 10, 360.00, '2024-11-03 14:00:00', '2024-11-03 17:00:00'),
(50, 7, 11, 330.00, '2024-11-03 09:00:00', '2024-11-03 12:00:00'),
(51, 7, 2, 300.00, '2024-11-04 08:30:00', '2024-11-04 11:30:00'),
(52, 8, 3, 260.00, '2024-11-04 15:00:00', '2024-11-04 18:00:00'),
(53, 8, 4, 240.00, '2024-11-04 09:30:00', '2024-11-04 12:30:00'),
(54, 8, 5, 280.00, '2024-11-04 13:15:00', '2024-11-04 16:15:00'),
(55, 8, 6, 330.00, '2024-11-04 11:45:00', '2024-11-04 14:45:00'),
(56, 8, 7, 370.00, '2024-11-04 10:30:00', '2024-11-04 14:30:00'),
(57, 8, 8, 350.00, '2024-11-04 12:00:00', '2024-11-04 15:00:00'),
(58, 8, 9, 310.00, '2024-11-04 07:00:00', '2024-11-04 10:00:00'),
(59, 8, 10, 370.00, '2024-11-04 14:15:00', '2024-11-04 17:15:00'),
(60, 8, 11, 340.00, '2024-11-04 09:45:00', '2024-11-04 12:45:00'),
(61, 9, 2, 310.00, '2024-11-05 08:00:00', '2024-11-05 11:00:00'),
(62, 9, 3, 270.00, '2024-11-05 15:30:00', '2024-11-05 18:30:00'),
(63, 9, 4, 250.00, '2024-11-05 09:15:00', '2024-11-05 12:15:00'),
(64, 9, 5, 290.00, '2024-11-05 13:00:00', '2024-11-05 16:00:00'),
(65, 9, 6, 340.00, '2024-11-05 11:30:00', '2024-11-05 14:30:00'),
(66, 9, 7, 380.00, '2024-11-05 10:00:00', '2024-11-05 14:00:00'),
(67, 10, 8, 360.00, '2024-11-05 12:45:00', '2024-11-05 15:45:00'),
(68, 10, 9, 320.00, '2024-11-05 07:30:00', '2024-11-05 10:30:00'),
(69, 11, 10, 380.00, '2024-11-05 14:00:00', '2024-11-05 17:00:00'),
(70, 11, 10, 350.00, '2024-11-05 09:00:00', '2024-11-05 12:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotel`
--

CREATE TABLE `hotel` (
  `Hotel_ID` int(11) NOT NULL,
  `Destination_ID` int(11) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Price_Per_Night` decimal(10,2) DEFAULT NULL,
  `Rating` int(1) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hotel`
--

INSERT INTO `hotel` (`Hotel_ID`, `Destination_ID`, `Name`, `Description`, `Price_Per_Night`, `Rating`, `Address`, `Phone`, `Email`) VALUES
(1, 1, 'Hotel Madrid Centro', 'Hotel centrico con acceso a todo el transporte público', 120.50, 4, 'Calle Ejemplo 1, Madrid', '912345678', 'info@hotelmadridcentro.com'),
(2, 2, 'Hotel Rio de Janeiro', 'Hotel de lujo frente a la playa en Rio de Janeiro', 150.75, 5, 'Avenida Ejemplo 2, Rio', '934567890', 'info@hotelrio.com'),
(3, 3, 'Hotel Roma Elegante', 'Hotel clásico con vistas al Coliseo en Roma', 200.00, 5, 'Via Ejemplo 3, Roma', '390612345678', 'info@hotelromaelegante.com'),
(4, 4, 'Hotel Rabat Medina', 'Hotel con decoración marroquí en el corazón de la medina de Rabat', 95.00, 4, 'Calle Ejemplo 4, Rabat', '212612345678', 'info@hotelrabatmedina.com'),
(5, 5, 'Hotel Sofía Panorama', 'Hotel con vistas panorámicas de las montañas en Sofía', 110.00, 4, 'Bulevar Ejemplo 5, Sofía', '359312345678', 'info@hotelsofiapanorama.com'),
(6, 6, 'Hotel Ankara Deluxe', 'Hotel de negocios de lujo en el centro de Ankara', 130.00, 4, 'Avenida Ejemplo 6, Ankara', '903123456789', 'info@hotelankaradeluxe.com'),
(7, 7, 'Hotel Tokio Skyline', 'Hotel moderno con vistas a la Torre de Tokio', 220.00, 5, 'Calle Ejemplo 7, Tokio', '813012345678', 'info@hoteltokioskylinel.com'),
(8, 8, 'Hotel Pekín Imperial', 'Hotel lujoso con arquitectura tradicional en Pekín', 180.00, 5, 'Avenida Ejemplo 8, Pekín', '861012345678', 'info@hotelpekinimperial.com'),
(9, 9, 'Hotel Bangkok Oasis', 'Hotel boutique con jardines tropicales en Bangkok', 140.00, 4, 'Calle Ejemplo 9, Bangkok', '6621234567', 'info@hotelbangkokoasis.com'),
(10, 10, 'Hotel Atenas Antiguo', 'Hotel ubicado cerca de la Acrópolis con vistas históricas', 160.00, 5, 'Calle Ejemplo 10, Atenas', '302112345678', 'info@hotelatenasantiguo.com'),
(11, 11, 'Hotel La Valeta Fortaleza', 'Hotel histórico en una fortaleza en La Valeta', 170.00, 4, 'Calle Ejemplo 11, La Valeta', '35621234567', 'info@hotellavaletafortaleza.com'),
(12, 1, 'Hotel Boutique Madrid', 'Acogedor hotel boutique en el corazón de Madrid.', 145.00, 4, 'Calle Gran Vía 12, Madrid', '912345684', 'info@hotelboutiquemadrid.com'),
(13, 1, 'Hotel Art Madrid', 'Hotel contemporáneo con exposiciones de arte.', 165.00, 5, 'Calle de Vallehermoso 79, Madrid', '912345685', 'info@hotelartmadrid.com'),
(14, 2, 'Hotel Santa Teresa', 'Hotel de lujo con vistas a la playa de Copacabana.', 220.00, 5, 'Rua Santa Teresa 90, Rio de Janeiro', '213456794', 'info@hotelsantateresa.com'),
(15, 2, 'Hotel Windsor Barra', 'Hotel frente a la playa con piscina infinita.', 200.00, 4, 'Avenida Lucio Costa 2630, Rio de Janeiro', '213456795', 'info@windsorbarra.com'),
(16, 3, 'Hotel Della Valle', 'Hotel de lujo con spa en el centro de Roma.', 250.00, 5, 'Viale di Trastevere 50, Roma', '390612345684', 'info@hoteldellavalle.com'),
(17, 3, 'Hotel Imperiale', 'Hotel clásico con decoración elegante en Roma.', 190.00, 4, 'Via Vittorio Veneto 24, Roma', '390612345685', 'info@hotelimperiale.com'),
(18, 4, 'Hotel La Tour Hassan', 'Hotel de lujo con jardín y piscina en Rabat.', 210.00, 5, 'Avenue Moulay Hassan 20, Rabat', '212612345682', 'info@latourhassan.com'),
(19, 4, 'Hotel Villa Mandarine', 'Hotel con estilo marroquí y piscina privada.', 180.00, 4, 'Calle de la Medina, Rabat', '212612345683', 'info@villamandarine.com'),
(20, 5, 'Hotel Sense Hotel', 'Moderno hotel con vistas a Vitosha en Sofía.', 140.00, 4, 'Bulevar Vitosha 25, Sofía', '359312345684', 'info@sensehotel.com'),
(21, 5, 'Hotel Arena di Serdica', 'Hotel de lujo en el corazón de Sofía, con spa.', 200.00, 5, 'Calle Budapeshta 2, Sofía', '359312345685', 'info@arenadiserdica.com'),
(22, 6, 'Hotel Wyndham Ankara', 'Hotel de lujo con centro de conferencias y gimnasio.', 160.00, 4, 'Calle Bestekar 1, Ankara', '903123456793', 'info@wyndhamankara.com'),
(23, 6, 'Hotel Movenpick Ankara', 'Hotel contemporáneo con bar y restaurante de cocina internacional.', 175.00, 5, 'Calle Sehit Ersan 12, Ankara', '903123456794', 'info@movenpickankara.com'),
(24, 7, 'Hotel The Peninsula Tokyo', 'Hotel de lujo con spa y vistas espectaculares.', 600.00, 5, '1-8-1 Yurakucho, Tokio', '81335000000', 'info@peninsula.com'),
(25, 7, 'Hotel Mandarin Oriental Tokyo', 'Hotel de lujo con restaurantes galardonados.', 700.00, 5, '2-1-1 Nihonbashi Muromachi, Tokio', '81332700200', 'info@mandarinoriental.com'),
(26, 8, 'Hotel Raffles Beijing', 'Hotel icónico con elegancia y lujo en Pekín.', 400.00, 5, 'Jinbao St 33, Pekín', '861012345684', 'info@raffles.com'),
(27, 8, 'Hotel The Opposite House', 'Hotel contemporáneo con diseño moderno y un restaurante famoso.', 350.00, 5, 'Taikoo Li Sanlitun, Pekín', '861012345685', 'info@theoppositehouse.com'),
(28, 9, 'Hotel Chatrium Hotel Riverside Bangkok', 'Hotel de lujo junto al río con transporte gratuito al centro.', 150.00, 4, '28 Charoenkrung Soi 70, Bangkok', '66212345673', 'info@chatrium.com'),
(29, 9, 'Hotel The Sukosol', 'Hotel elegante con música en vivo y excelente restaurante.', 120.00, 4, '477 Phaya Thai Rd, Bangkok', '66212345674', 'info@thesukosol.com'),
(30, 10, 'Hotel St George Lycabettus', 'Hotel de lujo con vistas a la Acrópolis y piscina en la azotea.', 300.00, 5, '1 P. K. Kyprou, Atenas', '302112345682', 'info@stgeorgelycabettus.com'),
(31, 10, 'Hotel Electra Metropolis Athens', 'Hotel moderno con spa y restaurante en la azotea.', 250.00, 5, '15 Mitropoleos St, Atenas', '302112345683', 'info@electrametropolis.com'),
(32, 11, 'Hotel The Phoenicia Malta', 'Hotel de lujo con vistas al puerto de La Valeta.', 320.00, 5, 'The Mall, La Valeta', '35621234572', 'info@thephoeniciamalta.com'),
(33, 11, 'Hotel Palazzo Consiglia', 'Hotel boutique con un diseño elegante y desayuno gourmet.', 180.00, 4, 'Pjazza D Argotti 8, La Valeta', '35621234573', 'info@palazzoconsiglia.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice`
--

CREATE TABLE `invoice` (
  `Invoice_ID` int(11) NOT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Total` decimal(10,2) DEFAULT NULL,
  `Payment_Status` enum('Paid','Pending','Overdue') DEFAULT 'Pending',
  `Tax` decimal(10,2) DEFAULT NULL,
  `Details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice_flight`
--

CREATE TABLE `invoice_flight` (
  `Invoice_Flight_ID` int(11) NOT NULL,
  `Invoice_ID` int(11) NOT NULL,
  `Flight_ID` int(11) NOT NULL,
  `Passengers` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice_hotel`
--

CREATE TABLE `invoice_hotel` (
  `Invoice_Hotel_ID` int(11) NOT NULL,
  `Invoice_ID` int(11) NOT NULL,
  `Hotel_ID` int(11) NOT NULL,
  `Nights` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `First_Name` varchar(50) DEFAULT NULL,
  `Last_Name` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`User_ID`, `First_Name`, `Last_Name`, `Email`, `Password`, `Phone`) VALUES
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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`Destination_ID`);

--
-- Indices de la tabla `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`Flight_ID`),
  ADD KEY `Origin_ID` (`Origin_ID`),
  ADD KEY `Destination_ID` (`Destination_ID`);

--
-- Indices de la tabla `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`Hotel_ID`);

--
-- Indices de la tabla `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`Invoice_ID`);

--
-- Indices de la tabla `invoice_flight`
--
ALTER TABLE `invoice_flight`
  ADD PRIMARY KEY (`Invoice_Flight_ID`),
  ADD KEY `Invoice_ID` (`Invoice_ID`),
  ADD KEY `Flight_ID` (`Flight_ID`);

--
-- Indices de la tabla `invoice_hotel`
--
ALTER TABLE `invoice_hotel`
  ADD PRIMARY KEY (`Invoice_Hotel_ID`),
  ADD KEY `Invoice_ID` (`Invoice_ID`),
  ADD KEY `Hotel_ID` (`Hotel_ID`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `destination`
--
ALTER TABLE `destination`
  MODIFY `Destination_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `hotel`
--
ALTER TABLE `hotel`
  MODIFY `Hotel_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `invoice`
--
ALTER TABLE `invoice`
  MODIFY `Invoice_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `invoice_flight`
--
ALTER TABLE `invoice_flight`
  MODIFY `Invoice_Flight_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `invoice_hotel`
--
ALTER TABLE `invoice_hotel`
  MODIFY `Invoice_Hotel_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `flight`
--
ALTER TABLE `flight`
  ADD CONSTRAINT `flight_ibfk_1` FOREIGN KEY (`Origin_ID`) REFERENCES `destination` (`Destination_ID`),
  ADD CONSTRAINT `flight_ibfk_2` FOREIGN KEY (`Destination_ID`) REFERENCES `destination` (`Destination_ID`);

--
-- Filtros para la tabla `invoice_flight`
--
ALTER TABLE `invoice_flight`
  ADD CONSTRAINT `invoice_flight_ibfk_1` FOREIGN KEY (`Invoice_ID`) REFERENCES `invoice` (`Invoice_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoice_flight_ibfk_2` FOREIGN KEY (`Flight_ID`) REFERENCES `flight` (`Flight_ID`) ON DELETE CASCADE;

--
-- Filtros para la tabla `invoice_hotel`
--
ALTER TABLE `invoice_hotel`
  ADD CONSTRAINT `invoice_hotel_ibfk_1` FOREIGN KEY (`Invoice_ID`) REFERENCES `invoice` (`Invoice_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoice_hotel_ibfk_2` FOREIGN KEY (`Hotel_ID`) REFERENCES `hotel` (`Hotel_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
