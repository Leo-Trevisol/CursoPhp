-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Mar-2023 às 00:22
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
-- Banco de dados: `produto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `descricao` varchar(300) DEFAULT NULL,
  `tags` varchar(150) DEFAULT NULL,
  `link_alternativo` varchar(255) DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL,
  `unidade_medida` char(3) DEFAULT NULL,
  `marca_fabricante` varchar(50) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `categorias_facebook` varchar(255) DEFAULT NULL,
  `categorias_google` varchar(255) DEFAULT NULL,
  `arquivo` varchar(255) DEFAULT NULL,
  `preco_custo` int(11) DEFAULT NULL,
  `margem_lucro` int(11) DEFAULT NULL,
  `preco_cheio` int(11) DEFAULT NULL,
  `porcentagem_desconto` int(11) DEFAULT NULL,
  `preco_promocional` int(11) DEFAULT NULL,
  `inicio_promocao` date DEFAULT NULL,
  `fim_promocao` date DEFAULT NULL,
  `altura` float DEFAULT NULL,
  `largura` float DEFAULT NULL,
  `profundidade` float DEFAULT NULL,
  `peso` float DEFAULT NULL,
  `hotsite` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
