-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2021 at 12:12 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ex_teatro`
--

-- --------------------------------------------------------

--
-- Table structure for table `entradas`
--

CREATE TABLE `entradas` (
  `id` int(11) NOT NULL,
  `idObra` int(11) NOT NULL,
  `fila` int(11) NOT NULL,
  `columna` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `email` varchar(128) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `entradas`
--

INSERT INTO `entradas` (`id`, `idObra`, `fila`, `columna`, `precio`, `email`) VALUES
(1, 1, 1, 4, 10, 'amigo1@iesgrancapitan.org'),
(2, 1, 1, 7, 10, 'amigo1@iesgrancapitan.org'),
(3, 1, 2, 2, 10, 'amigo1@iesgrancapitan.org'),
(4, 1, 1, 0, 10, 'amigo1@iesgrancapitan.org'),
(5, 1, 3, 1, 10, 'amigo1@iesgrancapitan.org'),
(6, 1, 3, 5, 10, 'amigo1@iesgrancapitan.org'),
(7, 1, 3, 0, 10, 'amigo1@iesgrancapitan.org'),
(8, 1, 1, 0, 10, 'amigo1@iesgrancapitan.org'),
(9, 1, 1, 1, 10, 'amigo1@iesgrancapitan.org'),
(10, 1, 1, 0, 10, 'amigo1@iesgrancapitan.org'),
(11, 1, 1, 1, 10, 'amigo1@iesgrancapitan.org'),
(12, 1, 1, 2, 10, 'amigo1@iesgrancapitan.org');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `fecha_hora` timestamp NULL DEFAULT current_timestamp(),
  `usuario` varchar(128) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(128) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `fecha_hora`, `usuario`, `descripcion`) VALUES
(1, '2021-03-05 09:59:16', 'amigo1', 'Intento de inicio de sesisón'),
(2, '2021-03-05 10:06:56', 'amigo1', 'Intento de inicio de sesisón'),
(3, '2021-03-05 11:09:15', 'amigo1', 'Intento de inicio de sesisón');

-- --------------------------------------------------------

--
-- Table structure for table `obras`
--

CREATE TABLE `obras` (
  `id` int(11) NOT NULL,
  `titulo` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `portada` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `numero_valoraciones` int(11) DEFAULT NULL,
  `valoracion_media` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `obras`
--

INSERT INTO `obras` (`id`, `titulo`, `descripcion`, `portada`, `fecha_inicio`, `fecha_final`, `numero_valoraciones`, `valoracion_media`) VALUES
(1, 'La Posadera', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel nibh eu massa ullamcorper scelerisque. \r\n\r\n', 'img_1.jpg', '2021-03-03', '2021-03-08', NULL, NULL),
(2, 'El burgués gentilhombre', 'Vestibulum porttitor nisi massa, dictum feugiat ex consectetur ac. Etiam eu pretium purus, quis venenatis lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'img_2.jpg', '2021-03-10', '2021-03-15', NULL, NULL),
(3, 'Familia', 'Nunc tortor quam, rhoncus in diam vel, tincidunt consequat quam. Morbi imperdiet libero et ullamcorper pulvinar. Vivamus blandit et felis quis tincidunt.', 'img_3.jpg', '2021-03-18', '2021-03-26', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `perfiles`
--

CREATE TABLE `perfiles` (
  `perfil` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `perfiles`
--

INSERT INTO `perfiles` (`perfil`) VALUES
('amigo'),
('gerente');

-- --------------------------------------------------------

--
-- Table structure for table `tarifas`
--

CREATE TABLE `tarifas` (
  `id` int(11) NOT NULL,
  `idObra` int(11) NOT NULL,
  `zonaA` int(11) NOT NULL,
  `zonaB` int(11) NOT NULL,
  `zonaC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `tarifas`
--

INSERT INTO `tarifas` (`id`, `idObra`, `zonaA`, `zonaB`, `zonaC`) VALUES
(1, 1, 10, 7, 5),
(2, 2, 7, 7, 7),
(3, 3, 15, 10, 7);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(128) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(128) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `bloqueado` varchar(45) COLLATE utf8_spanish_ci DEFAULT '0',
  `perfiles_perfil` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `email`, `bloqueado`, `perfiles_perfil`) VALUES
(5, 'gerente1', 'gerente1', 'gerente1@iesgrancapitan.org', '0', 'gerente'),
(6, 'gerente2', 'gerente2', 'gerente2@iesgrancapitan.org', '0', 'gerente'),
(7, 'amigo1', 'amigo1', 'amigo1@iesgrancapitan.org', '0', 'amigo'),
(8, 'amigo2', 'amigo2', 'amigo2@iesgrancapitan.org', '0', 'amigo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idObra` (`idObra`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`perfil`);

--
-- Indexes for table `tarifas`
--
ALTER TABLE `tarifas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idObra` (`idObra`),
  ADD KEY `idObra_2` (`idObra`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD UNIQUE KEY `usuario_2` (`usuario`),
  ADD KEY `fk_usuarios_perfiles_idx` (`perfiles_perfil`),
  ADD KEY `email` (`email`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `email_3` (`email`),
  ADD KEY `perfiles_perfil` (`perfiles_perfil`),
  ADD KEY `email_4` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `obras`
--
ALTER TABLE `obras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tarifas`
--
ALTER TABLE `tarifas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `entradas_ibfk_1` FOREIGN KEY (`idObra`) REFERENCES `obras` (`id`),
  ADD CONSTRAINT `entradas_ibfk_2` FOREIGN KEY (`email`) REFERENCES `usuarios` (`email`);

--
-- Constraints for table `tarifas`
--
ALTER TABLE `tarifas`
  ADD CONSTRAINT `tarifas_ibfk_1` FOREIGN KEY (`idObra`) REFERENCES `obras` (`id`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`perfiles_perfil`) REFERENCES `perfiles` (`perfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
