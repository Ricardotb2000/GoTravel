-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2024 a las 13:32:38
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
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ID_Cliente` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Contraseña` varchar(255) DEFAULT NULL,
  `Teléfono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ID_Cliente`, `Nombre`, `Apellido`, `Email`, `Contraseña`, `Teléfono`) VALUES
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
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `destino` (
  `ID_Destino` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Descripción` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `destino`
--

INSERT INTO `destino` (`ID_Destino`, `Nombre`, `Descripción`) VALUES
(1, 'Madrid', 'Capital de España, conocida por sus museos y su vida nocturna.'),
(2, 'Barcelona', 'Ciudad costera con arquitectura modernista y playas.'),
(3, 'Sevilla', 'Famosa por su catedral, la Giralda y el flamenco.'),
(4, 'Granada', 'Conocida por la Alhambra, un palacio y fortaleza árabe.'),
(5, 'Valencia', 'Famosa por la Ciudad de las Artes y las Ciencias y sus playas.'),
(6, 'Italia', 'Conocida por su historia, arte, y deliciosa gastronomía.'),
(7, 'Marruecos', 'Famoso por sus paisajes desérticos y mercados vibrantes.'),
(8, 'Bulgaria', 'Conocida por sus playas y montañas, ideal para vacaciones.'),
(9, 'Turquía', 'Famosa por su rica historia y cultura, especialmente en Estambul.'),
(10, 'Japón', 'Conocido por su mezcla de modernidad y tradiciones antiguas.'),
(11, 'China', 'Famoso por su cultura milenaria y lugares emblemáticos como la Gran Muralla.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `ID_Factura` int(11) NOT NULL,
  `Cliente_ID` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Total` decimal(10,2) DEFAULT NULL,
  `Detalles` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`ID_Factura`, `Cliente_ID`, `Fecha`, `Total`, `Detalles`) VALUES
(1, 1, '2024-10-05', 550.75, 'Viaje a Madrid con estancia en hotel y vuelo.'),
(2, 2, '2024-11-10', 680.50, 'Viaje a Barcelona con estancia en hotel y vuelo.'),
(3, 3, '2024-09-30', 450.00, 'Viaje a Sevilla con estancia en hotel.'),
(4, 4, '2024-12-15', 780.25, 'Viaje a Granada con vuelo y hotel.'),
(5, 5, '2024-10-25', 520.00, 'Viaje a Valencia con vuelo.'),
(6, 6, '2024-10-10', 900.50, 'Viaje a Italia con vuelo y hotel.'),
(7, 7, '2024-10-11', 450.00, 'Viaje a Marruecos con vuelo y hotel.'),
(8, 8, '2024-10-12', 600.75, 'Viaje a Bulgaria con vuelo y hotel.'),
(9, 9, '2024-10-13', 1200.25, 'Viaje a Turquía con vuelo y hotel.'),
(10, 10, '2024-10-14', 1500.00, 'Viaje a Japón con vuelo y hotel.'),
(11, 11, '2024-10-15', 1300.00, 'Viaje a China con vuelo y hotel.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_hotel`
--

CREATE TABLE `factura_hotel` (
  `Factura_ID` int(11) NOT NULL,
  `Hotel_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `factura_hotel`
--

INSERT INTO `factura_hotel` (`Factura_ID`, `Hotel_ID`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_vuelo`
--

CREATE TABLE `factura_vuelo` (
  `Factura_ID` int(11) NOT NULL,
  `Vuelo_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `factura_vuelo`
--

INSERT INTO `factura_vuelo` (`Factura_ID`, `Vuelo_ID`) VALUES
(1, 1),
(2, 2),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotel`
--

CREATE TABLE `hotel` (
  `ID_Hotel` int(11) NOT NULL,
  `Destino_ID` int(11) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Precio_Noche` decimal(10,2) DEFAULT NULL,
  `Duración_Sugerida` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hotel`
--

INSERT INTO `hotel` (`ID_Hotel`, `Destino_ID`, `Nombre`, `Precio_Noche`, `Duración_Sugerida`) VALUES
(1, 1, 'Hotel Madrid Centro', 120.50, 3),
(2, 2, 'Hotel Barcelona Playa', 150.75, 4),
(3, 3, 'Hotel Sevilla Flamenco', 100.00, 2),
(4, 4, 'Hotel Granada Alhambra', 130.25, 3),
(5, 5, 'Hotel Valencia Arts', 110.00, 2),
(6, 6, 'Hotel Roma', 180.50, 5),
(7, 7, 'Hotel Marrakech', 90.00, 4),
(8, 8, 'Hotel Sofía', 70.25, 3),
(9, 9, 'Hotel Estambul', 160.75, 5),
(10, 10, 'Hotel Tokio', 200.00, 6),
(11, 11, 'Hotel Pekín', 150.50, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelo`
--

CREATE TABLE `vuelo` (
  `ID_Vuelo` int(11) NOT NULL,
  `Destino_ID` int(11) DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL,
  `Fecha_Salida` datetime DEFAULT NULL,
  `Fecha_Llegada` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vuelo`
--

INSERT INTO `vuelo` (`ID_Vuelo`, `Destino_ID`, `Precio`, `Fecha_Salida`, `Fecha_Llegada`) VALUES
(1, 1, 200.50, '2024-10-15 08:00:00', '2024-10-15 10:30:00'),
(2, 2, 180.75, '2024-11-01 09:00:00', '2024-11-01 11:15:00'),
(3, 3, 220.00, '2024-09-25 07:30:00', '2024-09-25 09:45:00'),
(4, 4, 250.25, '2024-12-10 06:45:00', '2024-12-10 09:00:00'),
(5, 5, 170.00, '2024-10-20 12:00:00', '2024-10-20 14:15:00'),
(6, 6, 250.50, '2024-11-15 10:00:00', '2024-11-15 12:30:00'),
(7, 7, 150.75, '2024-11-20 09:00:00', '2024-11-20 11:15:00'),
(8, 8, 120.00, '2024-12-01 08:30:00', '2024-12-01 10:45:00'),
(9, 9, 300.25, '2024-12-10 14:00:00', '2024-12-10 16:30:00'),
(10, 10, 400.00, '2024-12-15 07:00:00', '2024-12-15 09:15:00'),
(11, 11, 350.00, '2024-12-20 16:00:00', '2024-12-20 18:30:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID_Cliente`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indices de la tabla `destino`
--
ALTER TABLE `destino`
  ADD PRIMARY KEY (`ID_Destino`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`ID_Factura`),
  ADD KEY `Cliente_ID` (`Cliente_ID`);

--
-- Indices de la tabla `factura_hotel`
--
ALTER TABLE `factura_hotel`
  ADD PRIMARY KEY (`Factura_ID`,`Hotel_ID`),
  ADD KEY `Hotel_ID` (`Hotel_ID`);

--
-- Indices de la tabla `factura_vuelo`
--
ALTER TABLE `factura_vuelo`
  ADD PRIMARY KEY (`Factura_ID`,`Vuelo_ID`),
  ADD KEY `Vuelo_ID` (`Vuelo_ID`);

--
-- Indices de la tabla `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`ID_Hotel`),
  ADD KEY `Destino_ID` (`Destino_ID`);

--
-- Indices de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  ADD PRIMARY KEY (`ID_Vuelo`),
  ADD KEY `Destino_ID` (`Destino_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `ID_Destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `ID_Factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `hotel`
--
ALTER TABLE `hotel`
  MODIFY `ID_Hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  MODIFY `ID_Vuelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`Cliente_ID`) REFERENCES `cliente` (`ID_Cliente`);

--
-- Filtros para la tabla `factura_hotel`
--
ALTER TABLE `factura_hotel`
  ADD CONSTRAINT `factura_hotel_ibfk_1` FOREIGN KEY (`Factura_ID`) REFERENCES `factura` (`ID_Factura`),
  ADD CONSTRAINT `factura_hotel_ibfk_2` FOREIGN KEY (`Hotel_ID`) REFERENCES `hotel` (`ID_Hotel`);

--
-- Filtros para la tabla `factura_vuelo`
--
ALTER TABLE `factura_vuelo`
  ADD CONSTRAINT `factura_vuelo_ibfk_1` FOREIGN KEY (`Factura_ID`) REFERENCES `factura` (`ID_Factura`),
  ADD CONSTRAINT `factura_vuelo_ibfk_2` FOREIGN KEY (`Vuelo_ID`) REFERENCES `vuelo` (`ID_Vuelo`);

--
-- Filtros para la tabla `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `hotel_ibfk_1` FOREIGN KEY (`Destino_ID`) REFERENCES `destino` (`ID_Destino`);

--
-- Filtros para la tabla `vuelo`
--
ALTER TABLE `vuelo`
  ADD CONSTRAINT `vuelo_ibfk_1` FOREIGN KEY (`Destino_ID`) REFERENCES `destino` (`ID_Destino`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
