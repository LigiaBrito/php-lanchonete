-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Maio-2022 às 03:29
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetolanchonete`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adicionais`
--

CREATE TABLE `adicionais` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `preco` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adicionais`
--

INSERT INTO `adicionais` (`id`, `nome`, `descricao`, `preco`) VALUES
(1, 'maionese', 'porcao', 6.9),
(13, 'mostarda', 'porcao', 3.9),
(14, 'ketchup', 'porcao', 3.9),
(15, 'catupiry', 'porcao', 8.9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bebida`
--

CREATE TABLE `bebida` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `preco` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `bebida`
--

INSERT INTO `bebida` (`id`, `nome`, `descricao`, `preco`) VALUES
(3, 'Coca', '350g', 6.95),
(10, 'Guarana', '350g', 6.95),
(11, 'Agua', '500g', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `endereco`, `telefone`) VALUES
(12, 'Pedro', 'Rua Alberto Soares 145', '(50) 91449-1901'),
(36, 'Vicente André Augusto Santos', 'Rua Emilio Fonini', '(19)99156-6751');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lanche`
--

CREATE TABLE `lanche` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `preco` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `lanche`
--

INSERT INTO `lanche` (`id`, `nome`, `descricao`, `preco`) VALUES
(2, 'x-salada', 'ingredientes:alface,tomates,queijo,rucula', 7.9),
(11, 'x-tudo', 'ingredientes:alface,tomates,queijo,rucula,bacon,burger', 17.9),
(12, 'x-frango', 'ingredientes:alface,tomates,queijo,frango', 15.9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `cod` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `tipoLanche` varchar(60) NOT NULL,
  `adicionais` varchar(3) NOT NULL,
  `bebida` varchar(3) NOT NULL,
  `bebidaGelada` varchar(3) NOT NULL,
  `tipoBebida` varchar(60) NOT NULL,
  `data` varchar(60) NOT NULL,
  `observacoes` varchar(100) NOT NULL,
  `ckAdicionais` varchar(60) NOT NULL,
  `totalPedido` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `cod`, `nome`, `tipoLanche`, `adicionais`, `bebida`, `bebidaGelada`, `tipoBebida`, `data`, `observacoes`, `ckAdicionais`, `totalPedido`) VALUES
(42, 0, 'Vicente André Augusto Santos', 'x-tudo', 'Sim', 'Sim', 'Sim', 'Guarana', '2022-05-11', 'pouca maionese', 'maionese,mostarda,ketchup', 39.55),
(44, 2, 'Giovanna', 'x-frango', 'Sim', 'Sim', 'Sim', 'Guarana', '2022-05-11', 'pouco ketchup', 'maionese,ketchup,catupiry', 42.55),
(45, 1, 'Vicente André Augusto Santos', 'x-tudo', 'Sim', 'Sim', 'Sim', 'Guarana', '2022-05-12', 'muita mostarda', 'mostarda,ketchup', 32.65);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adicionais`
--
ALTER TABLE `adicionais`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `bebida`
--
ALTER TABLE `bebida`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `lanche`
--
ALTER TABLE `lanche`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adicionais`
--
ALTER TABLE `adicionais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `bebida`
--
ALTER TABLE `bebida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `lanche`
--
ALTER TABLE `lanche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
