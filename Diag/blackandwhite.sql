-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 13-Ago-2019 às 23:31
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blackandwhite`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `idPedido` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dataPedido` datetime DEFAULT CURRENT_TIMESTAMP,
  `valorTotal` double UNSIGNED NOT NULL,
  `cpfUser` char(11) NOT NULL,
  PRIMARY KEY (`idPedido`),
  KEY `FK_cpfUser` (`cpfUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `idProd` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descProd` varchar(160) NOT NULL,
  `qtdProd` int(11) NOT NULL,
  `infoAddProd` text,
  `precoUnit` double UNSIGNED NOT NULL,
  `idTipoProd` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idProd`),
  KEY `FK_idTipoProd` (`idTipoProd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_produto`
--

DROP TABLE IF EXISTS `tipo_produto`;
CREATE TABLE IF NOT EXISTS `tipo_produto` (
  `idTipoProd` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descTipoProd` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`idTipoProd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `idTipoUser` int(1) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descTipoUser` varchar(7) NOT NULL,
  PRIMARY KEY (`idTipoUser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`idTipoUser`, `descTipoUser`) VALUES
(2, 'Admin'),
(3, 'Normal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `nomeUser` varchar(100) NOT NULL DEFAULT '',
  `cpfUser` varchar(11) NOT NULL,
  `emailUser` varchar(100) NOT NULL,
  `senhaUser` varchar(35) NOT NULL,
  `idTipoUser` int(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`cpfUser`),
  KEY `FK_idTipoUser` (`idTipoUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`nomeUser`, `cpfUser`, `emailUser`, `senhaUser`, `idTipoUser`) VALUES
('Felipe', '45678912345', 'asersxcp@hotmail.com', '4343483', 3);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `FK_cpfUser` FOREIGN KEY (`cpfUser`) REFERENCES `usuario` (`cpfUser`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `FK_idTipoProd` FOREIGN KEY (`idTipoProd`) REFERENCES `tipo_produto` (`idTipoProd`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_idTipoUser` FOREIGN KEY (`idTipoUser`) REFERENCES `tipo_usuario` (`idTipoUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
