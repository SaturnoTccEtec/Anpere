-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Ago-2021 às 22:55
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdservices`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbavaliacao`
--

CREATE TABLE `tbavaliacao` (
  `idAvaliacao` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `comentarioAvaliacao` text DEFAULT NULL,
  `notaAvaliacao` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcliente`
--

CREATE TABLE `tbcliente` (
  `idCliente` int(11) NOT NULL,
  `nomeCliente` varchar(50) NOT NULL,
  `cpfCliente` varchar(11) NOT NULL,
  `emailCliente` varchar(50) NOT NULL,
  `senhaCliente` varchar(20) NOT NULL,
  `logradouroCliente` text NOT NULL,
  `estadoCliente` text NOT NULL,
  `cidadeCliente` varchar(20) NOT NULL,
  `bairroCliente` text NOT NULL,
  `cepCliente` varchar(12) NOT NULL,
  `numEndCliente` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbcliente`
--

INSERT INTO `tbcliente` (`idCliente`, `nomeCliente`, `cpfCliente`, `emailCliente`, `senhaCliente`, `logradouroCliente`, `estadoCliente`, `cidadeCliente`, `bairroCliente`, `cepCliente`, `numEndCliente`) VALUES
(3, 'Luana Lacerda Passos', '43449831062', 'Passos.Luana@gmail.com', 'LuaPassos2021', 'Rua Jardins Rosas', 'São Paulo', 'São Paulo', 'Tatuapé', '08461100', '20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbempresa`
--

CREATE TABLE `tbempresa` (
  `idEmpresa` int(11) NOT NULL,
  `nomeEmpresa` varchar(50) NOT NULL DEFAULT '0',
  `emailEmpresa` varchar(150) NOT NULL DEFAULT '0',
  `senhaEmpresa` varchar(50) NOT NULL DEFAULT '0',
  `cnpjEmpresa` varchar(14) NOT NULL DEFAULT '0',
  `logradouroEmpresa` varchar(100) DEFAULT NULL,
  `estadoEmpresa` text DEFAULT NULL,
  `cidadeEmpresa` text DEFAULT NULL,
  `bairroEmpresa` text DEFAULT NULL,
  `cepEmpresa` varchar(15) DEFAULT NULL,
  `numEndEmpresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbempresa`
--

INSERT INTO `tbempresa` (`idEmpresa`, `nomeEmpresa`, `emailEmpresa`, `senhaEmpresa`, `cnpjEmpresa`, `logradouroEmpresa`, `estadoEmpresa`, `cidadeEmpresa`, `bairroEmpresa`, `cepEmpresa`, `numEndEmpresa`) VALUES
(3, 'Blusas & Cia', 'blusasCia@gmail.com', 'BlusasCia2021', '77862125000155', 'Rua Lago Doce', 'São Paulo', 'São Paulo', 'Tatuapé', '08462333', 785);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbperfilempresa`
--

CREATE TABLE `tbperfilempresa` (
  `idPerfilEmpresa` int(11) NOT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `fotoPerfilEmpresa` varchar(1000) DEFAULT NULL,
  `biografiaPerfilEmpresa` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpublicacao`
--

CREATE TABLE `tbpublicacao` (
  `idPublicacao` int(11) NOT NULL,
  `fotoProdutoPublicacao` varchar(50) DEFAULT NULL,
  `precoProdutoPublicacao` decimal(6,2) DEFAULT NULL,
  `descricaoPublicacao` varchar(50) DEFAULT NULL,
  `idAvaliacao` int(11) DEFAULT NULL,
  `idPerfilEmpresa` int(11) DEFAULT NULL,
  `linkAvaliacao` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtelefonecliente`
--

CREATE TABLE `tbtelefonecliente` (
  `idTelefoneCliente` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL DEFAULT 0,
  `numTelefoneEmpresa` varchar(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtelefoneempresa`
--

CREATE TABLE `tbtelefoneempresa` (
  `idTelefoneEmpresa` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL DEFAULT 0,
  `numTelefoneEmpresa` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbavaliacao`
--
ALTER TABLE `tbavaliacao`
  ADD PRIMARY KEY (`idAvaliacao`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Índices para tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices para tabela `tbempresa`
--
ALTER TABLE `tbempresa`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Índices para tabela `tbperfilempresa`
--
ALTER TABLE `tbperfilempresa`
  ADD PRIMARY KEY (`idPerfilEmpresa`),
  ADD KEY `FK_tbperfilempresa_tbempresa` (`idEmpresa`);

--
-- Índices para tabela `tbpublicacao`
--
ALTER TABLE `tbpublicacao`
  ADD PRIMARY KEY (`idPublicacao`),
  ADD KEY `idPerfilEmpresa` (`idPerfilEmpresa`),
  ADD KEY `idAvaliacao` (`idAvaliacao`);

--
-- Índices para tabela `tbtelefonecliente`
--
ALTER TABLE `tbtelefonecliente`
  ADD PRIMARY KEY (`idTelefoneCliente`),
  ADD KEY `FK__tbcliente` (`idCliente`);

--
-- Índices para tabela `tbtelefoneempresa`
--
ALTER TABLE `tbtelefoneempresa`
  ADD PRIMARY KEY (`idTelefoneEmpresa`),
  ADD KEY `FK__tbempresa` (`idEmpresa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbavaliacao`
--
ALTER TABLE `tbavaliacao`
  MODIFY `idAvaliacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbempresa`
--
ALTER TABLE `tbempresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbperfilempresa`
--
ALTER TABLE `tbperfilempresa`
  MODIFY `idPerfilEmpresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbpublicacao`
--
ALTER TABLE `tbpublicacao`
  MODIFY `idPublicacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbtelefonecliente`
--
ALTER TABLE `tbtelefonecliente`
  MODIFY `idTelefoneCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbtelefoneempresa`
--
ALTER TABLE `tbtelefoneempresa`
  MODIFY `idTelefoneEmpresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbavaliacao`
--
ALTER TABLE `tbavaliacao`
  ADD CONSTRAINT `idCliente` FOREIGN KEY (`idCliente`) REFERENCES `tbcliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tbperfilempresa`
--
ALTER TABLE `tbperfilempresa`
  ADD CONSTRAINT `FK_tbperfilempresa_tbempresa` FOREIGN KEY (`idEmpresa`) REFERENCES `tbempresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tbpublicacao`
--
ALTER TABLE `tbpublicacao`
  ADD CONSTRAINT `idAvaliacao` FOREIGN KEY (`idAvaliacao`) REFERENCES `tbavaliacao` (`idAvaliacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idPerfilEmpresa` FOREIGN KEY (`idPerfilEmpresa`) REFERENCES `tbperfilempresa` (`idPerfilEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tbtelefonecliente`
--
ALTER TABLE `tbtelefonecliente`
  ADD CONSTRAINT `FK__tbcliente` FOREIGN KEY (`idCliente`) REFERENCES `tbcliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tbtelefoneempresa`
--
ALTER TABLE `tbtelefoneempresa`
  ADD CONSTRAINT `FK__tbempresa` FOREIGN KEY (`idEmpresa`) REFERENCES `tbempresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
