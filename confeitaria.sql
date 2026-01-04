-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04/01/2026 às 23:12
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `confeitaria`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Brownies'),
(2, 'Bolos'),
(3, 'Tortas'),
(4, 'Copo da Felicidade'),
(5, 'Outros');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nome_cliente` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `endereco` text NOT NULL,
  `produto_nome` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `data_pedido` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem_url` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `imagem_url`, `descricao`, `categoria_id`) VALUES
(33, 'Bolo de 4 leites', 24.99, '/confeitaria/img/686bdbc27d21e_fourleites.jpg', 'Bolo de 4 leites', 2),
(34, 'Copo da felicidade de Kinder Bueno', 50.00, '/confeitaria/img/686bbd522ca3f_copokinder.jpg', 'Copo da felicidade de Kinder Bueno.', 4),
(35, 'Torta de Limão', 12.99, '/confeitaria/img/686bbd947569a_torta.jpg', 'Deliciosa Torta de Limão, com uma base crocante e finalizada com chantininho.', 3),
(37, 'Bolo de Goiaba', 19.99, '/confeitaria/img/686bdcce62ea7_goiaba.jpg', 'Bolo de Goiaba', 2),
(38, 'Bolo crocante', 25.00, '/confeitaria/img/686bdde1079c9_crocante.jpg', 'Bolo crocante ', 2),
(39, 'Bolacha oreo', 5.99, '/confeitaria/img/686bdedaf1cdf_oreo.jpg', 'Oreo', 5),
(41, 'Bolo de cenoura ', 24.99, '/confeitaria/img/686be0a879e65_cenoura.jpg', 'Bolo de cenoura - bolo na promoção', 2),
(44, 'Morango do amor', 15.00, '/confeitaria/img/68915f5122299_morango.jpeg', 'um delicioso morango do amor', 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` varchar(20) NOT NULL DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `tipo`) VALUES
(1, 'Admin', 'admin1@gmail.com', '$2y$10$4siuYKvIdmJsDh3eOK6Uu.KFMbd1MRgaBtoSWne1aYH693fwKLKdq', 'admin'),
(3, 'Cliente', 'cliente1@gmail.com', '$2y$10$Z49z27XZDYFhbfxLSBk4GOMhH19FQsqIKw828JHYaD6oVC0F/Lqmi', 'cliente'),
(6, 'Fefe', 'fefe@gmail.com', '$2y$10$scKQRyk8StopUicD0hUVW.Fqk3YF2YuMDlRUKTULbuROdW7j03DKO', 'cliente'),
(8, 'SS', 'ss@gmail.com', '$2y$10$rTjmtr8r1xdp2RpgfpCkAeWj.zZfror/0mEsUzIMr.XzZlzfkuBPm', 'cliente'),
(10, 'DD', 'dd@gmail.com', '$2y$10$NB.6juR/7z4Z7KiGwmFmnOhkJOSvs1sxPCCtmwuBpIXJ3Of2LlCMO', 'cliente'),
(13, 'Day\r\n', 'day@gmail.com', '$2y$10$1aPgvfeKhUF9ixFb3WRv7O/Y8at4s9QnymHUOMtZMZvCsSLUHOHli', 'cliente');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
