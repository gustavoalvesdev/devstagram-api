-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Dez-2022 às 02:28
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mvc_psr4`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `photos`
--

INSERT INTO `photos` (`id`, `id_user`, `url`, `datecreated`) VALUES
(1, 1, 'foto_legal.jpg', '2022-12-15 22:27:19'),
(2, 2, 'foto_boa.jpg', '2022-12-15 22:27:19'),
(3, 2, 'outra2foto.jpg', '2022-12-15 22:27:19'),
(4, 3, 'maisuma.jpg', '2022-12-15 22:27:19'),
(5, 1, 'praia.jpg', '2022-12-15 22:27:19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `photos_comments`
--

CREATE TABLE `photos_comments` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_photo` int(11) NOT NULL,
  `date_comment` datetime NOT NULL,
  `txt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `photos_likes`
--

CREATE TABLE `photos_likes` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_photo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `avatar`) VALUES
(1, 'Bonieky Lacerda', 'suporte@b7web.com.br', '$2y$10$1THjGiI2nwPmTCqrWhAVJO9vFQiKSek2vcHpFR.PMuWeVu.rI3J1C', ''),
(3, 'Testador', 'teste@hotmail.com', '$2y$10$1THjGiI2nwPmTCqrWhAVJO9vFQiKSek2vcHpFR.PMuWeVu.rI3J1C', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_following`
--

CREATE TABLE `users_following` (
  `id` int(11) NOT NULL,
  `id_user_active` int(11) NOT NULL,
  `id_user_passive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users_following`
--

INSERT INTO `users_following` (`id`, `id_user_active`, `id_user_passive`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 2, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `photos_comments`
--
ALTER TABLE `photos_comments`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `photos_likes`
--
ALTER TABLE `photos_likes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users_following`
--
ALTER TABLE `users_following`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `photos_comments`
--
ALTER TABLE `photos_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `photos_likes`
--
ALTER TABLE `photos_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users_following`
--
ALTER TABLE `users_following`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
