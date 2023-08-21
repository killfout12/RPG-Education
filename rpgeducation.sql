-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17-Ago-2023 às 08:25
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rpgeducation`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `senha`, `profile_picture`) VALUES
(17, 'Samuel da Rosa Leidens', 'sla@slaaa.com', '123', NULL),
(18, 'fernando', 'aa@gmail.com', '123', 'LgoR.png'),
(19, 'Michael Cristiano Derlam', 'testeouro@teste', '123', NULL),
(20, 'teste teste', 'teste@teste.com', '123', 'images.jpg'),
(21, 'teste silva ', 'tiagosilveira@hot.com', '123', NULL),
(22, 'aa', 'samucanarnia@gmail.com', '123', NULL),
(23, 'teste da silva', 'teste@teste.combr', '123', NULL),
(24, 'Patrick', 'pa@pa', '123', NULL),
(25, 'fer', '2@2', '123', NULL),
(26, 'FabeTeste', 'fabibecker_@hotmail.com', '123456', NULL),
(27, 'Lucas OM', 'contatolucasrequia@gmail.com', '123456', NULL),
(28, 'adriano', 'adrianohcampos@gmail.com', 'rpg', NULL),
(29, 'natan', 'na@na.com', '123', NULL),
(30, 'nando', 'a@a', '123', 'wallgalix.png'),
(31, 'nando', 'aaa@gmail.com', '123', 'wallgalix.png'),
(32, 'ab', 'ab@a', '123', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE IF NOT EXISTS `professores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id`, `nome`, `email`, `senha`, `profile_picture`) VALUES
(31, 'profe nando', 'aa@gmail.com', '123', NULL),
(32, 'profe nandoo', 'aaa@gmail.com', '123', 'LgoR.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
