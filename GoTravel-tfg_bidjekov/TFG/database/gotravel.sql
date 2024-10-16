-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2024 a las 15:50:56
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
-- Estructura de tabla para la tabla `client`
--

CREATE TABLE `client` (
  `Client_ID` int(11) NOT NULL,
  `First_Name` varchar(50) DEFAULT NULL,
  `Last_Name` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `client`
--

INSERT INTO `client` (`Client_ID`, `First_Name`, `Last_Name`, `Email`, `Password`, `Phone`) VALUES
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
(11, 11, 'Hotel La Valeta Fortaleza', 'Hotel histórico en una fortaleza en La Valeta', 170.00, 4, 'Calle Ejemplo 11, La Valeta', '35621234567', 'info@hotellavaletafortaleza.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice`
--

CREATE TABLE `invoice` (
  `Invoice_ID` int(11) NOT NULL,
  `Client_ID` int(11) DEFAULT NULL,
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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`Client_ID`);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `client`
--
ALTER TABLE `client`
  MODIFY `Client_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `destination`
--
ALTER TABLE `destination`
  MODIFY `Destination_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `hotel`
--
ALTER TABLE `hotel`
  MODIFY `Hotel_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
