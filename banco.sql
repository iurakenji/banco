-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 18-Set-2023 às 18:56
-- Versão do servidor: 5.7.40
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `bancopot`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

DROP TABLE IF EXISTS `conta`;
CREATE TABLE IF NOT EXISTS `conta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agencia` varchar(15) NOT NULL,
  `contacorrente` varchar(45) NOT NULL,
  `saldo` decimal(14,2) DEFAULT NULL,
  `pessoa_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_conta_pessoa_idx` (`pessoa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `conta`
--

INSERT INTO `conta` (`id`, `agencia`, `contacorrente`, `saldo`, `pessoa_id`) VALUES
(1, '1234', '4321', '40.00', 1),
(2, '1234', '1232', '0.00', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacao`
--

DROP TABLE IF EXISTS `movimentacao`;
CREATE TABLE IF NOT EXISTS `movimentacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acao` tinyint(11) NOT NULL,
  `valor` varchar(45) DEFAULT NULL,
  `data_movimentacao` datetime NOT NULL,
  `conta_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_movimentacao_conta1_idx` (`conta_id`),
  KEY `index_acao` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `movimentacao`
--

INSERT INTO `movimentacao` (`id`, `acao`, `valor`, `data_movimentacao`, `conta_id`) VALUES
(1, 1, '-2', '2023-08-16 18:27:17', 1),
(2, 2, '5', '2023-07-18 18:27:41', 1),
(3, 3, '-5', '2023-06-24 18:39:18', 1),
(4, 4, '5', '2023-09-18 18:39:18', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE IF NOT EXISTS `pessoa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(80) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nascimento` date DEFAULT NULL,
  `senha` varchar(40) NOT NULL,
  `imagem` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `email`, `cpf`, `nascimento`, `senha`, `imagem`) VALUES
(1, 'Kendji Iura', 'kendji.iura@essentia.com.br', '12345678900', '1982-10-15', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'img/gato3.jpg'),
(2, 'José de Souza', 'joao@dasilva.com.br', '98765432100', '1911-11-11', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'img/anon.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `transacao`
--

DROP TABLE IF EXISTS `transacao`;
CREATE TABLE IF NOT EXISTS `transacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `inc` tinyint(1) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `transacao`
--

INSERT INTO `transacao` (`id`, `nome`, `inc`, `descricao`) VALUES
(1, 'Saque', 0, 'Retirar dinheiro da conta'),
(2, 'Depósito', 1, 'Adicionar dinheiro da conta'),
(3, 'Transferência Enviada', 0, 'Enviar dinheiro para outra conta'),
(4, 'Transferência Recebida', 1, 'Enviar dinheiro para outra conta');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `conta`
--
ALTER TABLE `conta`
  ADD CONSTRAINT `fk_conta_pessoa` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD CONSTRAINT `fk_movimentacao_conta1` FOREIGN KEY (`conta_id`) REFERENCES `conta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;