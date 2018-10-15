-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 15-Abr-2018 às 22:45
-- Versão do servidor: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cadastro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `captacao`
--

DROP TABLE IF EXISTS `captacao`;
CREATE TABLE IF NOT EXISTS `captacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `empresa` int(11) NOT NULL COMMENT 'Empresa',
  `nome` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nome',
  `responsavel` varchar(255) DEFAULT NULL COMMENT 'Resposanvel',
  `telefone_responsavel` text COMMENT 'Telefone responsavel',
  `parentesco` int(11) DEFAULT NULL COMMENT 'Parentesco',
  `parentesco_outro` varchar(100) DEFAULT NULL COMMENT 'Outro parentesco',
  `turno` int(11) DEFAULT NULL COMMENT 'Turno',
  `telefone_fixo` text CHARACTER SET utf8 COLLATE utf8_unicode_ci COMMENT 'Telefone fixo',
  `telefone_celular` text CHARACTER SET utf8 COLLATE utf8_unicode_ci COMMENT 'Telefone Celular',
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'E-mail',
  `idade` int(11) DEFAULT NULL COMMENT 'Idade',
  `cidade` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Cidade',
  `data_contato` datetime DEFAULT NULL COMMENT 'Data',
  `data_evento` date DEFAULT NULL COMMENT 'Data do evento',
  `data_agendamento` datetime DEFAULT NULL COMMENT 'Data agendamento',
  `data_matricula` date DEFAULT NULL COMMENT 'Data matricula',
  `data_atualizacao` datetime DEFAULT NULL COMMENT 'Data atualiza&#x00E7;&#x00E3;o',
  `data_criacao` datetime NOT NULL COMMENT 'Data criacao',
  `equipe` int(11) DEFAULT NULL COMMENT 'Equipe',
  `pesquisador` int(11) DEFAULT NULL COMMENT 'Pesquisador',
  `atendimento` int(11) DEFAULT NULL COMMENT 'Atendimento',
  `acao` int(11) DEFAULT NULL COMMENT 'Acao',
  `status` int(11) NOT NULL COMMENT 'Status',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipe`
--

DROP TABLE IF EXISTS `equipe`;
CREATE TABLE IF NOT EXISTS `equipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nome',
  `documento` bigint(11) UNSIGNED ZEROFILL DEFAULT NULL COMMENT 'cpf->CPF',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Login',
  `salt` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Senha',
  `data_criacao` datetime NOT NULL,
  `data_atualizacao` datetime DEFAULT NULL,
  `data_acesso` datetime DEFAULT NULL,
  `admin` int(11) DEFAULT '2' COMMENT 'Administrador',
  `status` int(11) NOT NULL COMMENT 'Status',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `equipe`
--

INSERT INTO `equipe` (`id`, `cod`, `nome`, `documento`, `email`, `salt`, `data_criacao`, `data_atualizacao`, `data_acesso`, `admin`, `status`) VALUES
(1, 'a457814e0058ec24f27731ff48862238', 'Administrador', NULL, 'admin', '$2y$11$AveCZ2gfMCVAdeeLwJb/4umDIdaCfTdb8mPLGiwDUMCHnwP7GarFa', '2018-04-15 19:43:18', NULL, NULL, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
