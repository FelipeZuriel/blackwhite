-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 08-Nov-2019 às 13:23
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
-- Estrutura da tabela `enderecopedido`
--

DROP TABLE IF EXISTS `enderecopedido`;
CREATE TABLE IF NOT EXISTS `enderecopedido` (
  `cep` int(11) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` varchar(4) NOT NULL,
  `numero` int(11) NOT NULL,
  PRIMARY KEY (`cep`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  `idProd` int(11) NOT NULL,
  `cep` int(11) NOT NULL,
  PRIMARY KEY (`idPedido`),
  UNIQUE KEY `fk_idProd` (`idProd`),
  UNIQUE KEY `fk_cep` (`cep`),
  KEY `FK_cpfUser` (`cpfUser`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `idProd` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `imagem` longblob NOT NULL,
  `descProd` varchar(160) NOT NULL,
  `qtdProd` int(11) NOT NULL,
  `infoAddProd` text,
  `precoUnit` double UNSIGNED NOT NULL,
  `idTipoProd` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idProd`),
  KEY `FK_idTipoProd` (`idTipoProd`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_produto`
--

DROP TABLE IF EXISTS `tipo_produto`;
CREATE TABLE IF NOT EXISTS `tipo_produto` (
  `idTipoProd` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descTipoProd` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`idTipoProd`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_produto`
--

INSERT INTO `tipo_produto` (`idTipoProd`, `descTipoProd`) VALUES
(1, 'Livro'),
(2, 'Geeks');

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
(1, 'Admin'),
(2, 'Normal');

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
('Felpopo', '73234294', 'felps@gmail.com', '1', 1);

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
