-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Dez-2019 às 01:14
-- Versão do servidor: 10.1.40-MariaDB
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ngrefeicoes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `gastos`
--

CREATE TABLE `gastos` (
  `IdGasto` int(11) NOT NULL,
  `DataGasto` date NOT NULL,
  `HoraGasto` time DEFAULT NULL,
  `ValorGasto` float(18,2) NOT NULL,
  `ComentarioGasto` varchar(500) DEFAULT NULL,
  `IdTipoGastoFk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `gastos`
--

INSERT INTO `gastos` (`IdGasto`, `DataGasto`, `HoraGasto`, `ValorGasto`, `ComentarioGasto`, `IdTipoGastoFk`) VALUES
(1, '2019-02-15', '00:00:00', 1627.00, '', 1),
(2, '2019-02-15', '00:00:00', 800.00, '', 2),
(3, '2019-02-15', '00:00:00', 200.00, '', 3),
(4, '2019-02-15', '00:00:00', 500.00, '', 4),
(5, '2019-02-15', '00:00:00', 1500.00, '', 5),
(6, '2019-02-15', '00:00:00', 700.00, '', 9),
(7, '2019-02-15', '00:00:00', 350.00, '', 13),
(8, '2019-02-15', '00:00:00', 4000.00, '', 14),
(9, '2019-02-15', '00:00:00', 1118.00, '', 15),
(10, '2019-11-10', '17:05:00', 55.19, 'sem comentarios', 1),
(11, '2019-11-19', '13:45:00', 598.55, 'EDITADO', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `IdProduto` int(11) NOT NULL,
  `NomeProduto` varchar(100) NOT NULL,
  `PrecoProduto` decimal(18,2) NOT NULL,
  `ComentarioProduto` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`IdProduto`, `NomeProduto`, `PrecoProduto`, `ComentarioProduto`) VALUES
(1, 'Café', '4.79', ''),
(2, 'Almoço / Janta', '14.72', 'No almço ou na janta a comida é a mesma'),
(3, 'Lanche', '8.00', ''),
(4, 'suco de limão', '2.50', 'natural'),
(5, 'suco de limão', '1.55', 'natural'),
(6, 'suco de limão', '1.55', 'natural'),
(7, 'suco de limão', '1.55', 'natural'),
(8, 'suco de limão', '1.55', 'natural'),
(10, 'ABACAXI', '7.00', 'DOCINHO'),
(12, 'suco de limão', '1.99', 'natural'),
(13, 'iogurte', '5.55', 'natural'),
(14, 'SANDIA', '5.50', 'AGORA'),
(15, 'test', '1.55', 'test'),
(16, 'AFFF', '155.00', 'AFFFF'),
(17, 'LUZ', '1.55', 'EDITADO!!'),
(18, 'MARIHUANA', '0.55', 'NO ES MUY BUENA'),
(19, 'KEFIR', '2.22', 'MAIZENA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipogastos`
--

CREATE TABLE `tipogastos` (
  `IdTipoGasto` int(11) NOT NULL,
  `NomeTipoGasto` varchar(100) NOT NULL,
  `ComentarioTipoGasto` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipogastos`
--

INSERT INTO `tipogastos` (`IdTipoGasto`, `NomeTipoGasto`, `ComentarioTipoGasto`) VALUES
(1, 'Bovinos', 'Açogue'),
(2, 'Padaria', ''),
(3, 'Contador', ''),
(4, 'Nutricionista', ''),
(5, 'Xaxa', ''),
(6, 'Visa', ''),
(7, 'Gas', ''),
(8, 'Just', ''),
(9, 'Simples', ''),
(10, 'Niederauer', ''),
(11, 'Quero-quero', ''),
(12, 'Banco do Brasil', ''),
(13, 'INSS / FGTS', ''),
(14, 'Dienifer', ''),
(15, 'Saveiro', ''),
(16, 'brasil', 'teste teste teste'),
(17, 'brasil', 'teste teste teste'),
(18, 'sdf', 'dfd'),
(19, 'ass', 'dsdfsmerda'),
(20, 'Luz', 'agora vai'),
(21, 'Luz', 'agora vai'),
(22, 'VAAAI', 'VAAAI'),
(23, 'FOOOOI', 'FOOI'),
(24, 'FOOOOI', 'FOOI'),
(25, 'FOOOOI', 'FOOI'),
(26, 'FOOOOI', 'FOOI'),
(27, 'FOOOOI', 'FOOI'),
(28, 'FOOOOI', 'FOOI'),
(29, 'FOOOOI', 'FOOI'),
(30, 'EDITANDO AGORA 11:48', 'EDITANDO AGORA 11:48'),
(33, 'ultimo', 'EDITANDO'),
(34, 'luz', 'na'),
(36, 'qwwww', 'aaa'),
(37, 'sdasd', 'asdas'),
(39, 'FLORESTA', 'EDITADOOOOOOOO'),
(40, 'EDITADOOOO', 'SDGSD\\GS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`) VALUES
(1, 'Karen Suarez', 'karen@karen.com', 'e0ae3d5c'),
(4, 'Dieniffer', 'dieniffer@dieniffer.com', 'e0ae3d5c'),
(5, 'Alesssandro', 'ale@ale.com', '38113736');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `IdVenda` int(11) NOT NULL,
  `DataVenda` date NOT NULL,
  `QuantidadeVenda` int(11) NOT NULL,
  `PrecoVenda` decimal(18,2) NOT NULL,
  `IdProdutoFk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`IdVenda`, `DataVenda`, `QuantidadeVenda`, `PrecoVenda`, `IdProdutoFk`) VALUES
(1, '2019-02-01', 62, '4.79', 1),
(2, '2019-02-01', 75, '14.72', 2),
(3, '2019-02-02', 59, '4.79', 1),
(4, '2019-02-02', 63, '14.72', 2),
(5, '2019-02-02', 13, '8.00', 3),
(6, '2019-02-03', 14, '4.79', 1),
(7, '2019-02-03', 17, '14.72', 2),
(8, '2019-02-04', 62, '4.79', 1),
(9, '2019-02-04', 78, '14.72', 2),
(10, '2019-02-05', 64, '4.79', 1),
(11, '2019-02-05', 75, '14.72', 2),
(12, '2019-02-06', 60, '4.79', 1),
(13, '2019-02-06', 75, '4.79', 2),
(14, '2019-02-06', 1, '8.00', 3),
(15, '2019-02-07', 27, '4.79', 1),
(16, '2019-02-07', 40, '14.72', 2),
(17, '2019-02-08', 29, '4.79', 1),
(18, '2019-02-08', 43, '4.79', 2),
(19, '2019-02-09', 16, '4.79', 1),
(20, '2019-02-09', 24, '14.72', 2),
(21, '2019-02-10', 1, '4.79', 1),
(22, '2019-02-10', 2, '14.72', 2),
(23, '2019-02-11', 30, '4.79', 1),
(24, '2019-02-11', 40, '14.72', 2),
(25, '2019-02-12', 26, '4.79', 1),
(26, '2019-02-12', 41, '14.72', 2),
(27, '2019-02-13', 30, '4.79', 1),
(28, '2019-02-12', 41, '14.72', 2),
(29, '2019-02-13', 30, '4.79', 1),
(30, '2019-02-13', 43, '14.72', 2),
(31, '2019-02-13', 1, '8.00', 3),
(32, '2019-02-14', 27, '4.79', 1),
(33, '2019-02-14', 42, '14.72', 2),
(34, '2019-02-15', 29, '4.79', 1),
(35, '2019-02-15', 43, '14.72', 2),
(36, '2019-02-15', 1, '8.00', 3),
(37, '2019-11-19', 40, '5.55', 3),
(38, '2019-12-04', 5, '1.55', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`IdGasto`),
  ADD KEY `fk_gastos_tipoGastos1_idx` (`IdTipoGastoFk`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`IdProduto`);

--
-- Indexes for table `tipogastos`
--
ALTER TABLE `tipogastos`
  ADD PRIMARY KEY (`IdTipoGasto`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`IdVenda`),
  ADD KEY `fk_vendas_produtos_idx` (`IdProdutoFk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gastos`
--
ALTER TABLE `gastos`
  MODIFY `IdGasto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `IdProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tipogastos`
--
ALTER TABLE `tipogastos`
  MODIFY `IdTipoGasto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `IdVenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `gastos`
--
ALTER TABLE `gastos`
  ADD CONSTRAINT `fk_gastos_tipoGastos1` FOREIGN KEY (`IdTipoGastoFk`) REFERENCES `tipogastos` (`IdTipoGasto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk_vendas_produtos` FOREIGN KEY (`IdProdutoFk`) REFERENCES `produtos` (`IdProduto`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
