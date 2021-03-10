-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Mar-2021 às 14:47
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
  `idSorteio` varchar(45) NOT NULL DEFAULT '0',
  `data` varchar(45) DEFAULT '',
  `idCambista` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `apostas`
--

INSERT INTO `apostas` (`idapostas`, `numeros`, `idUser`, `idSorteio`, `data`, `idCambista`) VALUES
(11, '01, 02, 03, 04, 05', '4', '24', '10/3/2021', '10'),
(12, '01, 03, 04, 05, 08', '4', '24', '10/3/2021', '4'),
(13, '01, 03, 05, 11, 20', '4', '24', '10/3/2021', '10'),
(14, '07, 21, 34, 67, 80', '1', '24', '10/3/2021', '4'),
(15, '01, 02, 03, 04, 05', '1', '25', '10/3/2021', '4'),
(16, '01, 02, 03, 04, 05', '1', '35', '10/3/2021', '10'),
(17, '01, 02, 03, 04, 05', '1', '35', '10/3/2021', '4'),
(18, '01, 02, 03, 04, 04', '1', '35', '10/3/2021', '4'),
(19, '01, 02, 03, 06, 07', '1', '35', '10/3/2021', '4'),
(20, '01, 02, 07, 08, 09', '1', '36', '10/3/2021', '4'),
(21, '01, 02, 03, 07, 08', '1', '36', '10/3/2021', '4'),
(22, '01, 02, 03, 04, 07', '1', '36', '10/3/2021', '4'),
(23, '01, 02, 03, 04, 05', '1', '36', '10/3/2021', '4'),
(25, '01, 02, 03, 04, 05', '10', '37', '10/3/2021', '4'),
(26, '01, 02, 03, 04, 05', '5', '37', '10/3/2021', '4'),
(27, '01, 02, 03, 04, 05', '5', '39', '10/3/2021', '4'),
(28, '01, 02, 03, 04, 07', '11', '39', '10/3/2021', '4'),
(29, '01, 02, 03, 07, 08', '12', '39', '10/3/2021', '4'),
(30, '01, 02, 06, 08, 09', '15', '39', '10/3/2021', '4'),
(31, '12, 23, 34, 45, 56', '20', '39', '10/3/2021', '4'),
(33, '01, 02, 03, 04, 05, 06, 07, 08, 09, 10', '5', '41', '10/3/2021', '4'),
(34, '01, 02, 03, 04, 06, 07, 08, 09, 10, 11', '5', '41', '10/3/2021', '4'),
(35, '01, 02, 03, 06, 07, 08, 09, 10, 11, 12', '15', '41', '10/3/2021', '4'),
(36, '01, 02, 12, 13, 14, 15, 16, 17, 18, 19', '23', '41', '10/3/2021', '4'),
(37, '01, 11, 12, 13, 14, 15, 21, 22, 23, 24', '18', '41', '10/3/2021', '4'),
(38, '01, 02, 03, 04, 05, 06, 07, 08, 09, 10', '23', '0', '10/03/2021', '1');

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
(21, '17/02/2021', '01, 04, 06, 71, 80', 'luis', 4),
(22, '17/02/2021', '01, 02, 50, 60, 70', 'vai la', 4),
(23, '17/02/2021', '01, 02, 50, 70, 80', 'wwww', 4),
(24, '17/02/2021', '07, 21, 34, 67, 80', 'hghghg', 1),
(25, '17/02/2021', '01, 02, 03, 04, 05', 'oioi', 1),
(26, '17/02/2021', '01, 07, 21, 34, 70', 'banana', 1),
(27, '17/02/2021', '07, 21, 23, 34, 67', 'banana', 1),
(28, '17/02/2021', '01, 07, 21, 23, 34', 'luis', 1),
(29, '17/02/2021', '07, 11, 21, 67, 80', 'banana', 1),
(30, '17/02/2021', '01, 02, 03, 04, 05', 'banana', 1),
(31, '17/02/2021', '01, 02, 03, 04, 05', 'luis', 1),
(32, '17/02/2021', '01, 02, 03, 04, 05', 'Luis Felipe', 1),
(33, '17/02/2021', '01, 03, 23, 34, 80', 'luis', 1),
(34, '17/02/2021', '01, 02, 03, 04, 05', 'luis', 1),
(35, '19/02/2021', '01, 02, 03, 04, 05', 'banana', 1),
(36, '19/02/2021', '01, 02, 03, 04, 05', 'banana', 1),
(37, '01/03/2021', '01, 02, 03, 04, 05', 'asasas', 1),
(38, '01/03/2021', '01, 02, 03, 04, 05', 'banana', 1),
(39, '05/03/2021', '01, 02, 03, 04, 05', 'banana', 1),
(40, '05/03/2021', '01, 02, 03, 04, 05', 'luis', 1),
(41, '05/03/2021', '01, 02, 03, 04, 05', 'banana', 1),
(42, '09/03/2021', '01, 02, 03, 04, 05', 'fc', 1);

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
(4, 'maipee', '19999999999', 'e7d80ffeefa212b7c5c55700e4f7193e', '1', 1),
(5, 'userT1', '19999999999', 'e7d80ffeefa212b7c5c55700e4f7193e', '2', 2),
(7, 'userT3', '19191119199', 'e7d80ffeefa212b7c5c55700e4f7193e', '0', 1),
(10, 'luisffff', '19999610005', 'e7d80ffeefa212b7c5c55700e4f7193e', '1', 1),
(11, 'luisjogador', '89418918198189', 'e7d80ffeefa212b7c5c55700e4f7193e', '2', 1),
(12, 'luisjogador2', '1561516', 'e7d80ffeefa212b7c5c55700e4f7193e', '2', 1),
(15, 'luuu', '2858282828', 'e7d80ffeefa212b7c5c55700e4f7193e', '2', 1),
(16, 'qwe', '123131', '76d80224611fc919a5d54f0ff9fba446', '2', 1),
(17, 'qwqw', '12121', '76d80224611fc919a5d54f0ff9fba446', '2', 1),
(18, 'qweqwe', '12312', 'e110fb45bc4f7cc5d367b06bfbc8e5c3', '2', 1),
(19, 'qaws', '1212121', '22f75d966798ae7995aae100bcf80142', '2', 1),
(20, 'joaozinho', '19999610009', 'e7d80ffeefa212b7c5c55700e4f7193e', '2', 1),
(21, 'adm123', '13965478', 'e7d80ffeefa212b7c5c55700e4f7193e', '0', 1),
(23, '123321', '19999999999', 'e7d80ffeefa212b7c5c55700e4f7193e', '2', 1),
(24, 'clebinho mill', '19999610009', 'e7d80ffeefa212b7c5c55700e4f7193e', '2', 1),
(25, 'maipi', '123123', 'e7d80ffeefa212b7c5c55700e4f7193e', '1', 1),
(26, 'awsaws', '19999610009', 'e7d80ffeefa212b7c5c55700e4f7193e', '2', 25);

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
  MODIFY `idapostas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `sorteio`
--
ALTER TABLE `sorteio`
  MODIFY `idsorteio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
