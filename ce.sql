-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 02-Jul-2021 às 02:27
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ce`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `childs`
--

DROP TABLE IF EXISTS `childs`;
CREATE TABLE IF NOT EXISTS `childs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `childs`
--

INSERT INTO `childs` (`id`, `name`, `active`) VALUES
(1, 'BIANCA', 1),
(2, 'DIOGO', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplines`
--

DROP TABLE IF EXISTS `disciplines`;
CREATE TABLE IF NOT EXISTS `disciplines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `punishment1` tinyint(1) NOT NULL DEFAULT 0,
  `punishment2` tinyint(1) NOT NULL DEFAULT 0,
  `punishment3` tinyint(1) NOT NULL DEFAULT 0,
  `id_child` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `disciplines`
--

INSERT INTO `disciplines` (`id`, `title`, `points`, `punishment1`, `punishment2`, `punishment3`, `id_child`) VALUES
(1, 'Esqueceu obrigação (3X)', 1, 0, 0, 0, 1),
(2, 'Não jogou no lixo (3X)', 0, 0, 0, 0, 1),
(3, 'Respondeu (3X)', 2, 0, 0, 0, 1),
(4, 'Chorou pra fazer obrigação (3X)', 1, 0, 0, 0, 1),
(5, 'Reclamou pra fazer obrigação (5X)', 3, 0, 0, 0, 1),
(6, 'Fez sem permissão (3X)', 1, 0, 0, 0, 1),
(7, 'Mentiu (3X)', 1, 0, 0, 0, 1),
(20, 'Brigou com irmão (3X)', 1, 0, 0, 0, 1),
(19, 'Desobedeceu (3X)', 2, 0, 0, 0, 1),
(21, 'Esqueceu obrigação (3X)', 0, 0, 0, 0, 2),
(22, 'Não jogou no lixo (3X)', 1, 0, 0, 0, 2),
(23, 'Respondeu (3X)', 2, 0, 0, 0, 2),
(24, 'Chorou pra fazer obrigação (3X)', 0, 0, 0, 0, 2),
(25, 'Reclamou pra fazer obrigação (5X)', 0, 1, 0, 0, 2),
(26, 'Fez sem permissão (3X)', 1, 0, 0, 0, 2),
(27, 'Mentiu (3X)', 0, 0, 0, 0, 2),
(28, 'Brigou com irmão (3X)', 2, 0, 0, 0, 2),
(29, 'Desobedeceu (3X)', 1, 0, 0, 0, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
