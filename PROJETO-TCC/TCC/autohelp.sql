-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Maio-2020 às 16:15
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `autohelp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aut_users`
--

CREATE TABLE `aut_users` (
  `Cod_Auto` int(4) NOT NULL,
  `Nome_Auto` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Nome_UsAu` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Pass` varchar(20) NOT NULL,
  `CNPJ` varchar(20) NOT NULL,
  `Endereco` varchar(50) NOT NULL,
  `Complemento` varchar(50) NOT NULL,
  `Telefone_C` varchar(20) NOT NULL,
  `Telefone_Fix` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aut_users`
--

INSERT INTO `aut_users` (`Cod_Auto`, `Nome_Auto`, `Nome_UsAu`, `Email`, `Pass`, `CNPJ`, `Endereco`, `Complemento`, `Telefone_C`, `Telefone_Fix`) VALUES
(21, 'gabriel Rezende', 'sabiodamontanhabr', 'gabriel.rezende131101@gmail.com', '123', '98765432123456', 'R. General Newton Estilac Leal', 'Pestana', '11973209920', '11973209920'),
(23, 'dog', 'dog', 'dog@gmail.com', '123', '98765432123456', 'R. General Newton Estilac Leal', 'Pestana', '11973209920', '11973209920');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cli_infos`
--

CREATE TABLE `cli_infos` (
  `Cod_Info` int(11) NOT NULL,
  `Descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cli_infos`
--

INSERT INTO `cli_infos` (`Cod_Info`, `Descricao`) VALUES
(3, 'Eu gosto de batata.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cli_users`
--

CREATE TABLE `cli_users` (
  `Cod_Cli` int(4) NOT NULL,
  `Cod_Auto` int(11) NOT NULL,
  `Nome_Cli` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Pass` varchar(50) NOT NULL,
  `CPF` varchar(50) NOT NULL,
  `Datanasc` date NOT NULL,
  `Endereco` varchar(50) NOT NULL,
  `Complemento` varchar(50) NOT NULL,
  `CEP` int(8) NOT NULL,
  `Telefone` varchar(50) NOT NULL,
  `Foto_Perfil` varchar(1000) NOT NULL,
  `Foto_ID` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cli_users`
--

INSERT INTO `cli_users` (`Cod_Cli`, `Cod_Auto`, `Nome_Cli`, `Email`, `Pass`, `CPF`, `Datanasc`, `Endereco`, `Complemento`, `CEP`, `Telefone`, `Foto_Perfil`, `Foto_ID`) VALUES
(2, 23, 'João', 'jo@gmail.com', '333', '47667718909', '2001-11-13', 'R. General Nelson', 'Porta', 7190000, '2452365477', '', ''),
(3, 21, 'Vini', 'vini@gmail.com', '333', '47667718909', '2020-05-05', 'R. General Nelson', 'Pestana', 7190000, '999999999999999', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `testedinheiro`
--

CREATE TABLE `testedinheiro` (
  `CodM` int(11) NOT NULL,
  `Cod_Auto` int(4) NOT NULL,
  `Entrada` double NOT NULL,
  `data` date NOT NULL,
  `mes` varchar(20) CHARACTER SET armscii8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `testedinheiro`
--

INSERT INTO `testedinheiro` (`CodM`, `Cod_Auto`, `Entrada`, `data`, `mes`) VALUES
(4, 21, 1300, '2020-04-20', 'abril'),
(5, 21, 1000, '2020-06-09', 'junho'),
(6, 23, 5000, '2020-05-04', 'maio'),
(7, 21, 2000.5, '2020-04-08', 'abril');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aut_users`
--
ALTER TABLE `aut_users`
  ADD PRIMARY KEY (`Cod_Auto`);

--
-- Índices para tabela `cli_infos`
--
ALTER TABLE `cli_infos`
  ADD PRIMARY KEY (`Cod_Info`);

--
-- Índices para tabela `cli_users`
--
ALTER TABLE `cli_users`
  ADD PRIMARY KEY (`Cod_Cli`),
  ADD KEY `Cod_Auto` (`Cod_Auto`);

--
-- Índices para tabela `testedinheiro`
--
ALTER TABLE `testedinheiro`
  ADD PRIMARY KEY (`CodM`),
  ADD KEY `Cod_Auto` (`Cod_Auto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aut_users`
--
ALTER TABLE `aut_users`
  MODIFY `Cod_Auto` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `cli_infos`
--
ALTER TABLE `cli_infos`
  MODIFY `Cod_Info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `cli_users`
--
ALTER TABLE `cli_users`
  MODIFY `Cod_Cli` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `testedinheiro`
--
ALTER TABLE `testedinheiro`
  MODIFY `CodM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cli_users`
--
ALTER TABLE `cli_users`
  ADD CONSTRAINT `cli_users_ibfk_1` FOREIGN KEY (`Cod_Auto`) REFERENCES `aut_users` (`Cod_Auto`);

--
-- Limitadores para a tabela `testedinheiro`
--
ALTER TABLE `testedinheiro`
  ADD CONSTRAINT `testedinheiro_ibfk_1` FOREIGN KEY (`Cod_Auto`) REFERENCES `aut_users` (`Cod_Auto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
