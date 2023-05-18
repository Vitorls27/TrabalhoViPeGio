-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Maio-2023 às 20:18
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sqltrabalhofinalvipegio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `leituravipegio`
--

CREATE TABLE `leituravipegio` (
  `idLeituraViPeGio` int(10) UNSIGNED NOT NULL,
  `SensorViPeGio_idSensorViPeGio` int(10) UNSIGNED NOT NULL,
  `Mac_idMac` varchar(17) NOT NULL,
  `DataLeitura` date DEFAULT NULL,
  `HoraLeitura` text DEFAULT NULL,
  `ValorSensor` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Acionadores `leituravipegio`
--
DELIMITER $$
CREATE TRIGGER `TgDeleteLeitura` AFTER DELETE ON `leituravipegio` FOR EACH ROW BEGIN
UPDATE mac
SET Contador=Contador-1
WHERE idMac=OLD.mac_idMac;
UPDATE SensorViPeGio
SET Contador=Contador-1
WHERE idSensorViPeGio=OLD.SensorViPeGio_idSensorViPeGio;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TgInsertLeitura` AFTER INSERT ON `leituravipegio` FOR EACH ROW BEGIN
UPDATE mac
SET Contador=Contador+1
WHERE idMac=NEW.mac_idMac;
UPDATE SensorViPeGio
SET Contador=Contador+1
WHERE idSensorViPeGio=NEW.SensorViPeGio_idSensorViPeGio;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mac`
--

CREATE TABLE `mac` (
  `idMac` varchar(17) NOT NULL,
  `Nome` varchar(35) DEFAULT NULL,
  `Contador` int(10) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sensorvipegio`
--

CREATE TABLE `sensorvipegio` (
  `idSensorViPeGio` int(10) UNSIGNED NOT NULL,
  `Nome` varchar(15) DEFAULT NULL,
  `Contador` int(10) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuariovipegio`
--

CREATE TABLE `usuariovipegio` (
  `idUsuarioViPeGio` int(10) UNSIGNED NOT NULL,
  `Login` varchar(25) DEFAULT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `Senha` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `leituravipegio`
--
ALTER TABLE `leituravipegio`
  ADD PRIMARY KEY (`idLeituraViPeGio`),
  ADD KEY `LeituraViPeGio_FKIndex1` (`Mac_idMac`),
  ADD KEY `LeituraViPeGio_FKIndex2` (`SensorViPeGio_idSensorViPeGio`);

--
-- Índices para tabela `mac`
--
ALTER TABLE `mac`
  ADD PRIMARY KEY (`idMac`);

--
-- Índices para tabela `sensorvipegio`
--
ALTER TABLE `sensorvipegio`
  ADD PRIMARY KEY (`idSensorViPeGio`);

--
-- Índices para tabela `usuariovipegio`
--
ALTER TABLE `usuariovipegio`
  ADD PRIMARY KEY (`idUsuarioViPeGio`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `leituravipegio`
--
ALTER TABLE `leituravipegio`
  MODIFY `idLeituraViPeGio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sensorvipegio`
--
ALTER TABLE `sensorvipegio`
  MODIFY `idSensorViPeGio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuariovipegio`
--
ALTER TABLE `usuariovipegio`
  MODIFY `idUsuarioViPeGio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `leituravipegio`
--
ALTER TABLE `leituravipegio`
  ADD CONSTRAINT `leituravipegio_ibfk_1` FOREIGN KEY (`Mac_idMac`) REFERENCES `mac` (`idMac`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `leituravipegio_ibfk_2` FOREIGN KEY (`SensorViPeGio_idSensorViPeGio`) REFERENCES `sensorvipegio` (`idSensorViPeGio`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
