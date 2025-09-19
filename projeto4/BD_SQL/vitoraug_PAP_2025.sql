-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 15-Jul-2025 às 11:24
-- Versão do servidor: 10.5.29-MariaDB-cll-lve
-- versão do PHP: 8.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dados: `vitoraug_PAP_2025`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dicas_sustentaveis`
--

CREATE TABLE `dicas_sustentaveis` (
  `id` int(11) NOT NULL,
  `posicao` enum('esquerda','direita') NOT NULL,
  `texto_principal` mediumtext DEFAULT NULL,
  `texto_destaque` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `dicas_sustentaveis`
--

INSERT INTO `dicas_sustentaveis` (`id`, `posicao`, `texto_principal`, `texto_destaque`) VALUES
(58, 'esquerda', '<p><br>Cada gota conta! 🌍💧</p>', '<p>Fecha a torneira enquanto ensaboas a louça e usa uma bacia para enxaguar. Isso pode poupar dezenas de litros de água por dia.</p>'),
(59, 'direita', '<p><br>Desliga para não desperdiçar ⚡</p>', '<p>Mesmo desligados, aparelhos em stand-by continuam a consumir energia. Retira-os da tomada quando não estiveres a usar.</p>'),
(60, 'esquerda', '<p><br>Menos carros, mais planeta 🌱</p>', '<p>Sempre que possível, opta por caminhar, pedalar ou usar transportes públicos em vez do carro.</p>'),
(61, 'direita', '<p><br>Reutiliza, não descartes 🛒♻️</p>', '<p>Sacos plásticos descartáveis causam enorme poluição. Usa sacos de pano ou reutilizáveis.</p>'),
(62, 'esquerda', '<p><br>Sol: a energia mais limpa ☀️</p>', '<p>Abre as cortinas e usa ao máximo a luz do dia. Reduz o consumo de energia e melhora o ambiente da casa.</p>'),
(63, 'direita', '<p><br>Comida não é lixo! 🍲🚫</p>', '<p>Planeia as refeições e reaproveita sobras. Assim poupas dinheiro e evitas lixo desnecessário.</p>'),
(64, 'esquerda', '<p><br>Reciclar é um acto de cidadania ♻️</p>', '<p>Separa o lixo em papel, plástico, vidro e orgânico. A reciclagem reduz a poluição e economiza recursos naturais.</p>'),
(65, 'direita', '<p><br>Planta hoje, respira amanhã 🌳💚</p>', '<p>Árvores absorvem CO₂, dão sombra e contribuem para o equilíbrio do ecossistema urbano.</p>'),
(66, 'esquerda', '<p><br>Veste-te com consciência 👖🌍</p>', '<p>Prefere roupas duráveis e produzidas de forma ética. O consumo excessivo na moda gera imenso impacto ambiental.</p><p><br></p>'),
(67, 'direita', '<p><br>Tecnologia sustentável também existe 🔁📱</p>', '<p>Não deites fora dispositivos ainda funcionais. Doa, repara ou recicla em pontos próprios.</p>'),
(86, 'esquerda', '<p>tempo</p>', '<p>tempo</p>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `envios`
--

CREATE TABLE `envios` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `envios`
--

INSERT INTO `envios` (`id`, `email`, `data`, `total`) VALUES
(15, '101vitor.a@gmail.com', '2025-06-25', 1),
(19, '102vitor.a@gmail.com', '2025-07-04', 1),
(20, '101vitor.a@gmail.com', '2025-07-04', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `preference` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `token_recuperacao` varchar(64) DEFAULT NULL,
  `token_expira` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`id`, `nome`, `email`, `senha`, `token_recuperacao`, `token_expira`) VALUES
(1, 'admin', 'admin@admin.pt', '$2y$10$L5Eo0u8VsE/5UYPUyyDYaegZBQM7832MBUrJc5R3CHUid3EL2nklq', NULL, NULL),
(28, 'teste@gmail.com', 'teste@gmail.com', '$2y$10$8bz20XWfBqS08/Z.enEv7uXkm5I5HD.w52v9WamWWLWp8CQIBsp.K', '9ad66bcd04e8752d817b239ada14a455c7a12a19092eeb274d0beed47d7606f8', NULL),
(39, 'Beatrys', 'lemesbeatrys@gmail.com', '$2y$10$uzH4f3l9wII4YZosVjwe4u.nHzNrr.0vLWC.Sg6iVx7a9iHryR3FS', NULL, NULL),
(40, 'Elis', 'elis@gmail.com', '$2y$10$lHOYmGvTXx/llE4.NoqsoeIERNTcTOBjwr3rhecKjYYqqf9lZqBIu', NULL, NULL),
(52, '101vitor.a', '101vitor.a@gmail.com', '$2y$10$ENrdBWGr1uPZ6kGel9oV..XuyRm3pVXZhuEmUecZKFrwAq.S//umC', '8da6d7ef138e063570f0a1a12a19f40fd07a3f4477b7b96aa37ead2c6752d9fd', NULL),
(53, 'Jaqueline', '28jmoreira@gmail.com', '$2y$10$U4k0BAbME4sZvAYRu8kRj.m8fUitwgwYe0ItRkrUwvH6cAGtyA0e2', NULL, NULL),
(57, 'vitor', '101vitor@gmail.com', '$2y$10$rgn3pBafo8YY3gEYRXZVWeY2CqT9Zm7PDFHHxW5MCGVqyBifZVMZu', NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `dicas_sustentaveis`
--
ALTER TABLE `dicas_sustentaveis`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `dicas_sustentaveis`
--
ALTER TABLE `dicas_sustentaveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de tabela `envios`
--
ALTER TABLE `envios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
