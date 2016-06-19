-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 19/06/2016 às 11:06
-- Versão do servidor: 5.5.49-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `galeria`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
  `id_foto` int(8) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `arquivo` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `posicao` tinyint(3) DEFAULT NULL,
  `estado` enum('visivel','invisivel') DEFAULT NULL,
  `fkgaleria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_foto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Fazendo dump de dados para tabela `fotos`
--

INSERT INTO `fotos` (`id_foto`, `nome`, `arquivo`, `posicao`, `estado`, `fkgaleria`) VALUES
(37, 'sdfsdf', NULL, NULL, NULL, NULL),
(38, 'sdfsfasdfasgag', NULL, NULL, NULL, NULL),
(39, 'teste agora vai sera', NULL, NULL, NULL, NULL),
(40, 'tes', 'sdsadasa.jpg', 1, 'visivel', 1),
(41, 'adhskdh', 'asdsda.jpg', 2, 'visivel', 1),
(42, 'alteracao db', NULL, NULL, NULL, NULL),
(43, 'segue amostra', NULL, 0, 'visivel', NULL),
(44, 'fkgaleria vai', NULL, 0, 'visivel', 0),
(45, 'segue', NULL, 0, 'visivel', 2),
(46, 'oito', NULL, 0, 'visivel', 8),
(47, 'nove', NULL, 0, 'visivel', 9),
(48, 'madrugada', NULL, 0, 'visivel', 11),
(49, 'madruga 2', NULL, 0, 'visivel', 11),
(50, 'e sebora comigo', NULL, 0, 'visivel', 11),
(51, 'eita nos', NULL, 0, 'visivel', 11);

-- --------------------------------------------------------

--
-- Estrutura para tabela `galerias`
--

CREATE TABLE IF NOT EXISTS `galerias` (
  `id_galeria` tinyint(15) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `descricao` text,
  PRIMARY KEY (`id_galeria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Fazendo dump de dados para tabela `galerias`
--

INSERT INTO `galerias` (`id_galeria`, `titulo`, `fecha_alta`, `descricao`) VALUES
(2, 'galeriadois', '2016-06-18 22:17:23', 'aqui e uma nova galeria funcionando (ta ok)'),
(8, 'testando', '2016-06-18 23:17:51', 'e vamos la'),
(9, 'nove', '2016-06-18 23:18:04', 'nove em ai'),
(10, 'vamos la', '2016-06-18 23:19:43', 'testado '),
(11, 'galeria da madrugada 2', '2016-06-19 05:40:49', 'feita na madrugada para servir kkk');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
