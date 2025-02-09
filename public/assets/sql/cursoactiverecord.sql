-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/02/2025 às 16:24
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
-- Banco de dados: `cursoactiverecord`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(120) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `create_at`, `update_at`) VALUES
(1, 'Guilherme', 'De Souza Muller', NULL, '$2y$10$jc7oX3za0LYofhxfMY8AgOIWK', NULL, NULL),
(2, 'Ana', 'Caroliona Rossoni Ferreira', NULL, '$2y$10$jc7oX3za0LYofhxfMY8AgOIWKiK.7ITxdfMTQtNaLW0/o1qjwG6Em', NULL, NULL),
(3, 'John', 'Doe', 'john.doe@example.com', '$2y$10$jc7oX3za0LYofhxfMY8AgOIWK', '2025-01-23', '2025-01-23'),
(4, 'Jane', 'Smith', 'jane.smith@example.com', '$2y$10$jc7oX3za0LYofhxfMY8AgOIWKiK.7ITxdfMTQtNaLW0/o1qjwG6Em', '2025-01-22', '2025-01-23'),
(5, 'Carlos', 'Silva', 'carlos.silva@example.com', '$2y$10$jc7oX3za0LYofhxfMY8AgOIWKiK.7ITxdfMTQtNaLW0/o1qjwG6Em', '2025-01-20', '2025-01-21'),
(6, 'Emily', 'Johnson', 'emily.johnson@example.com', '$2y$10$jc7oX3za0LYofhxfMY8AgOIWKiK.7ITxdfMTQtNaLW0/o1qjwG6Em', '2025-01-18', '2025-01-18'),
(7, 'Lucas', 'Martins', 'lucas.martins@example.com', '$2y$10$jc7oX3za0LYofhxfMY8AgOIWKiK.7ITxdfMTQtNaLW0/o1qjwG6Em', '2025-01-19', '2025-01-23');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
