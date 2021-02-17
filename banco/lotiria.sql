-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Fev-2021 às 06:14
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lotiria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `apostas`
--

CREATE TABLE `apostas` (
  `idapostas` int(11) NOT NULL,
  `numeros` varchar(45) NOT NULL,
  `idUser` varchar(45) NOT NULL,
  `idSorteio` varchar(45) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `apostas`
--

INSERT INTO `apostas` (`idapostas`, `numeros`, `idUser`, `idSorteio`) VALUES
(11, '01, 02, 03, 04, 05', '4', '24'),
(12, '01, 03, 04, 05, 08', '4', '24'),
(13, '01, 03, 05, 11, 20', '4', '24'),
(14, '07, 21, 34, 67, 80', '1', '24'),
(15, '01, 02, 03, 04, 05', '1', '25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sorteio`
--

CREATE TABLE `sorteio` (
  `idsorteio` int(11) NOT NULL,
  `data` varchar(45) NOT NULL,
  `numeros` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `idCriador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sorteio`
--

INSERT INTO `sorteio` (`idsorteio`, `data`, `numeros`, `nome`, `idCriador`) VALUES
(4, '16/02/2021', '07/80/11/21/67', 'banana', 1),
(5, '16/02/2021', '07, 80, 11, 21, 67', 'banana', 1),
(6, '17/02/2021', '87, 67, 65, 86, 08', 'dsdsd', 4),
(7, '17/02/2021', '32, 21, 32, 53, 55', 'qwqw', 4),
(8, '17/02/2021', '08, 14, 25, 74, 80', 'yuyu', 4),
(9, '17/02/2021', '12, 23, 34, 56, 67', 'rtrt', 4),
(10, '17/02/2021', '12, 23, 34, 45, 56', 'luisdsd', 4),
(11, '17/02/2021', '12, 23, 34, 45, 56', 'teste', 4),
(12, '17/02/2021', '12, 23, 34, 45, 56', 'testeeeeeeee', 4),
(13, '17/02/2021', '12, 23, 34, 45, 56', '12345', 4),
(14, '17/02/2021', '12, 23, 45, 65, 84', '1234567890', 4),
(15, '17/02/2021', '11, 11, 11, 11, 11', 'ff', 4),
(16, '17/02/2021', '07, 80, 34, 45, 56', '1qw2', 4),
(17, '17/02/2021', '07, 80, 11, 21, 67', '132789', 4),
(18, '17/02/2021', '07, 80, 34, 45, 67', 'banana', 4),
(19, '17/02/2021', '07, 23, 34, 45, 56', 'banana', 4),
(20, '17/02/2021', '07, 80, 11, 21, 67', 'luis', 4),
(21, '17/02/2021', '01, 04, 06, 71, 80', 'luis', 4),
(22, '17/02/2021', '01, 02, 50, 60, 70', 'vai la', 4),
(23, '17/02/2021', '01, 02, 50, 70, 80', 'wwww', 4),
(24, '17/02/2021', '07, 21, 34, 67, 80', 'hghghg', 1),
(25, '17/02/2021', '01, 02, 03, 04, 05', 'oioi', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `celular` varchar(45) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `tipo` varchar(45) NOT NULL DEFAULT '0',
  `idSuperior` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`iduser`, `name`, `celular`, `senha`, `tipo`, `idSuperior`) VALUES
(1, 'maipe', '19999610009', 'e7d80ffeefa212b7c5c55700e4f7193e', '0', 1),
(2, 'LuisFelipe', '19999610009', 'e7d80ffeefa212b7c5c55700e4f7193e', '0', 1),
(3, 'admin', '19999999999', 'e7d80ffeefa212b7c5c55700e4f7193e', '0', 15),
(4, 'maipee', '19999999999', 'e7d80ffeefa212b7c5c55700e4f7193e', '1', 0),
(5, 'userT1', '19999999999', 'e7d80ffeefa212b7c5c55700e4f7193e', '2', 0),
(7, 'userT3', '19191119199', 'e7d80ffeefa212b7c5c55700e4f7193e', '0', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `apostas`
--
ALTER TABLE `apostas`
  ADD PRIMARY KEY (`idapostas`);

--
-- Índices para tabela `sorteio`
--
ALTER TABLE `sorteio`
  ADD PRIMARY KEY (`idsorteio`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `apostas`
--
ALTER TABLE `apostas`
  MODIFY `idapostas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `sorteio`
--
ALTER TABLE `sorteio`
  MODIFY `idsorteio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
