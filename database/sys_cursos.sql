-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Dez-2022 às 22:38
-- Versão do servidor: 8.0.29
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sys_cursos`
--
CREATE DATABASE sys_cursos;
USE sys_cursos;
-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int NOT NULL,
  `nome_curso` varchar(50) NOT NULL,
  `valor_curso` decimal(10,2) NOT NULL,
  `duracao_curso` int NOT NULL,
  `descricao_curso` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nome_curso`, `valor_curso`, `duracao_curso`, `descricao_curso`) VALUES
(1, 'Java Fundamentos', '80.00', 40, 'Curso de java para iniciantes'),
(2, 'Linux Fundamentos', '60.00', 30, 'Curso de linux para iniciantes'),
(3, 'Inteligência Artificial e Computacional', '100.00', 120, 'Curso de Inteligência Artificial'),
(4, 'Introdução ao HTML e CSS', '40.00', 30, 'Curso inicial de html e css'),
(5, 'Programação Orientada a Objetos com Java', '120.00', 150, 'Curso de orientação a objetos em Java'),
(6, 'Programação Orientada a Objetos com C#', '120.00', 150, 'Curso de orientação a objetos em C#'),
(7, 'Banco de dados MySql', '90.00', 60, 'Curso de banco de dados com MySql'),
(8, 'Banco de dados MongoDB', '90.00', 60, 'Curso de banco de dados com MongoDB'),
(9, 'Javascript Básico', '60.00', 40, 'Curso básico de javascript'),
(10, 'C# Fundamentos', '80.00', 60, 'Curso de C# para iniciantes'),
(11, 'Python Fundamentos', '80.00', 50, 'Curso de python para iniciantes'),
(12, 'Python para análise de dados', '100.00', 120, 'Curso de python para análise de dados');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` int NOT NULL,
  `nome_emp` varchar(50) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `email_emp` varchar(100) NOT NULL,
  `telefone_emp` varchar(14) NOT NULL,
  `descricao_emp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `nome_emp`, `cnpj`, `email_emp`, `telefone_emp`, `descricao_emp`) VALUES
(1, 'FIAP', '11.111.111/1111-11', 'fiap@gmail.com', '11-91111-1111', 'Empresa de cursos online de tecnologia'),
(2, 'Alura', '22.222.222/2222-22', 'alura@gmail.com', '11-92222-2222', 'Empresa de cursos online de tecnologia'),
(3, 'Rocketseat', '33.333.333/3333-33', 'rocketseat@gmail.com', '11-93333-3333', 'Empresa de cursos online de tecnologia'),
(4, 'Curso em video', '44.444.444/4444-44', 'cursoemvideo@gmail.com', '11-94444-4444', 'Empresa de cursos online de tecnologia'),
(5, 'Udemy', '55.555.555/5555-55', 'udemy@gmail.com', '11-95555-5555', 'Empresa de cursos online de tecnologia'),
(6, 'Digital Innovation One (DIO)', '66.666.666/6666-66', 'dio@gmail.com', '11-96666-6666', 'Empresa de cursos online de tecnologia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornece`
--

CREATE TABLE `fornece` (
  `id_fornece` int NOT NULL,
  `id_empresa` int NOT NULL,
  `id_curso` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `fornece`
--

INSERT INTO `fornece` (`id_fornece`, `id_empresa`, `id_curso`) VALUES
(1, 1, 1),
(2, 1, 2),
(9, 5, 3),
(8, 3, 4),
(3, 2, 5),
(4, 2, 6),
(6, 4, 7),
(11, 6, 8),
(5, 3, 9),
(12, 6, 10),
(7, 1, 11),
(10, 6, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorios`
--

CREATE TABLE `relatorios` (
  `id_relatorio` int NOT NULL,
  `num_venda` int NOT NULL,
  `data` date NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `curso` varchar(50) NOT NULL,
  `empresa` varchar(50) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `pagamento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL,
  `login` varchar(50) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `tipo` varchar(20) NOT NULL DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `login`, `nome`, `cpf`, `email`, `senha`, `telefone`, `tipo`) VALUES
(1, 'Admin', 'Admin', '123.456.789-10', 'admin@gmail.com', '$2y$10$cs7RdJHuIusiv75bI4oweuaQkY3thV25lO5NVmFyiiygtvKALf3J.', '33-91234-5678', 'administrador'),
(2, 'Teste', 'Teste', '123.456.789-20', 'teste@gmail.com', '$2y$10$BPKa19TfWBXq23oBR9BVheRittrjj30YI5uMvgeJckMoWVwfBVwDK', '33-91472-5836', 'usuario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id_venda` int NOT NULL,
  `id_usuario` int NOT NULL,
  `id_curso` int NOT NULL,
  `data_venda` date NOT NULL,
  `forma_pagamento` varchar(30) NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Índices para tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`),
  ADD UNIQUE KEY `cnpj_UNIQUE` (`cnpj`);

--
-- Índices para tabela `fornece`
--
ALTER TABLE `fornece`
  ADD PRIMARY KEY (`id_fornece`,`id_empresa`,`id_curso`),
  ADD KEY `fk_empresas_has_cursos_cursos1_idx` (`id_curso`),
  ADD KEY `fk_empresas_has_cursos_empresas_idx` (`id_empresa`);

--
-- Índices para tabela `relatorios`
--
ALTER TABLE `relatorios`
  ADD PRIMARY KEY (`id_relatorio`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`);

--
-- Índices para tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `fk_venda_usuarios1_idx` (`id_usuario`),
  ADD KEY `fk_venda_cursos1_idx` (`id_curso`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `fornece`
--
ALTER TABLE `fornece`
  MODIFY `id_fornece` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `relatorios`
--
ALTER TABLE `relatorios`
  MODIFY `id_relatorio` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id_venda` int NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `fornece`
--
ALTER TABLE `fornece`
  ADD CONSTRAINT `fk_empresas_has_cursos_cursos1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`),
  ADD CONSTRAINT `fk_empresas_has_cursos_empresas` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id_empresa`);

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `fk_venda_cursos1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`),
  ADD CONSTRAINT `fk_venda_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
