-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Nov-2021 às 16:08
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `idCliente` int(11) NOT NULL,
  `comentarioAvaliacao` text NOT NULL,
  `notaAvaliacao` tinyint(4) NOT NULL,
  `idPublicacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcategoria`
--

CREATE TABLE `tbcategoria` (
  `idCategoria` int(11) NOT NULL,
  `nomeCategoria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbcategoria`
--

INSERT INTO `tbcategoria` (`idCategoria`, `nomeCategoria`) VALUES
(1, 'Auto & Peças'),
(2, 'Assistência técnica'),
(3, 'Alimentos'),
(4, 'Animais'),
(5, 'Arte, Papelaria e Armarinho'),
(6, 'Bebes & Infantil'),
(7, 'Beleza e Cuidado Pessoal'),
(8, 'Brinquedos'),
(9, 'Calçados, Roupas e Bolsas'),
(10, 'Casa, Móveis e Decoração'),
(11, 'Eletrodomésticos'),
(12, 'Eletrônicos'),
(13, 'Esportes e Fitness'),
(14, 'Festas'),
(15, 'Informática'),
(16, 'Instrumentos & Musica'),
(17, 'Joalheirias & Bijuterias'),
(18, 'Saúde'),
(19, 'Bebidas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcategoriaempresa`
--

CREATE TABLE `tbcategoriaempresa` (
  `idCategoriaEmpresa` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL DEFAULT 0,
  `idCategoria` int(11) NOT NULL
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
  `numEndCliente` varchar(50) NOT NULL,
  `nivel_acesso` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbcliente`
--

INSERT INTO `tbcliente` (`idCliente`, `nomeCliente`, `cpfCliente`, `emailCliente`, `senhaCliente`, `logradouroCliente`, `estadoCliente`, `cidadeCliente`, `bairroCliente`, `cepCliente`, `numEndCliente`, `nivel_acesso`) VALUES
(22, 'Otavio Fernando', '55651031840', 'fernandes@gmail.com', '3418346', 'Rua inácio monteiro', 'SP', 'São Paulo', 'Guaianases', '08460300', '10', 0),
(23, 'Giovani Marcelo Arthur Nascimento', '08257741876', 'giovannimarcelo72@gmail', 'c2352352352123', 'Avenida Macuco', 'SP', 'São Paulo', 'Indianópolis', '04523916', '200', 0),
(24, 'José Kaique Drumond', '67759187807', 'josekaiquedrumond-88@gmail.com', '089123678', 'Avenida Barão do Rego Barros', 'SP', 'São Paulo', 'Vila Congonhas', '04612041', '223', 0),
(25, 'Tiago martin láudio Barros', '45571883898', 'tiagomartinclaudiobarros@gmail.com', '3327456234', 'Rua Jaime Schunk Branco', 'SP', 'São Paulo', 'Vila Socorro', '04760010', '896', 0),
(26, 'Bernardo Vitor Sérgio da Silva', '54283855880', 'bbernardovitor@gmail.com', '1275641276', 'Rua Armando Salvador Palermo', 'SP', 'São Paulo', 'Vila Capela', '04415060', '318', 0),
(27, 'Márcio Kauê Calebe Moreira', '35999439825', 'marciokauecaleb82@gmail.com', 'auwdgv12568', 'Rua Rui Pinheiro Brisolla', 'SP', 'São Paulo', 'Vila Mariana', '04121110', '307', 0),
(28, 'Henry Ricardo Martins', '41004172842', 'hhenryricardomartins@3dmaker.com', '923469awdhug', 'Rua Amadeu Pagnanelli', 'SP', 'São Paulo', 'Jardim Centenário', '05365180', '305', 0),
(29, 'Luan Manoel Davi da Rocha', '50175267812', 'luanmanoeldavidarocha@gmail.com', '26351937', 'Travessa Roland Berigan', 'SP', 'São Paulo', 'Vila Nair', '08071160', '659', 0),
(30, 'Francisco Elias Rodrigo Melo', '86863179873', 'franciscomelo@hotmail.com', 'fran235625', 'Rua Santa Sabina', 'SP', 'São Paulo', 'Vila Marilena', '08411110', '453', 0),
(31, 'Theo Oliver Vicente Martins', '71757376887', 'theoolivervicentemartins@jp.ind.br', 'FZB3ktZSFK', 'Rua Luís José Junqueira Freire', 'SP', 'São Paulo', 'Vila Penteado', '02864000', '565', 0);

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
  `logradouroEmpresa` varchar(100) NOT NULL,
  `numEndEmpresa` int(11) NOT NULL,
  `cepEmpresa` varchar(15) NOT NULL,
  `bairroEmpresa` text NOT NULL,
  `cidadeEmpresa` text NOT NULL,
  `estadoEmpresa` text NOT NULL,
  `disponibilidade` tinyint(1) NOT NULL,
  `nivel_acesso` int(1) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbempresa`
--

INSERT INTO `tbempresa` (`idEmpresa`, `nomeEmpresa`, `emailEmpresa`, `senhaEmpresa`, `cnpjEmpresa`, `logradouroEmpresa`, `numEndEmpresa`, `cepEmpresa`, `bairroEmpresa`, `cidadeEmpresa`, `estadoEmpresa`, `disponibilidade`, `nivel_acesso`, `idCategoria`) VALUES
(14, 'Atacadão do Veículo', 'AtacadaoVeiculo@gmail.com', '123456', '00222268000178', 'Felíciano de Mendonça', 12, '08460365', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 1),
(15, 'Tem Tudo Autopeças', 'TudoAutopecas@gmail.com', '123456', '13812638000179', 'Francisco Baldin', 32, '08460350', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 1),
(16, 'Reparo Rápido', 'ReparoRapido@gmail.com', '123456', '16214321000129', 'André Higino', 64, '08460460', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 2),
(17, 'SmartTech', 'SmartTech@gmail.com', '123456', '38948786000146', 'Cardoso de Abreu', 23, '08460160', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 2),
(18, 'Culinária Saudável Bio', 'SaudavelBio@gmail.com', '123456', '67821176000185', 'Carolina Brant', 87, '08460330', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 3),
(19, 'Cardápio Fit', 'CardapioFit@gmail.com', '123456', '20336178000115', 'Diogo de Castro', 132, '08420-330', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 3),
(20, 'Pet Shower', 'PetShower@gmail.com', '123456', '29925807000117', 'Jaques Lacan', 243, '08470330', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 4),
(21, 'Cão Cuidado', 'CaoCuidado@gmail.com', '123456', '85814030000194', 'Treze', 576, '08370330', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 4),
(22, '2 D PAPELARIA', '2DPAPELARIA@gmail.com', '123456', '05950613000103', 'Agostinho Félix de Lima', 845, '08390330', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 5),
(23, 'A & C PAPELARIA', 'A&CPAPELARIA@gmail.com', '123456', '46992036000108', 'Cristóvão Mendes', 237, '08460360', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 5),
(24, 'Baby Magazine', 'BabyMagazine@gmail.com', '123456', '95551991000107', 'Inácio Moreira', 978, '08460300', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 6),
(25, 'Casa do Bebê', 'CasaBebe@gmail.com', '123456', '81807493000178', 'Castanho da Silva', 194, '08460348', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 6),
(26, '2beauty', '2beauty@gmail.com', '123456', '27898023000111', 'Barbosa Calheiros', 213, '08460000', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 7),
(27, 'Acqua Hair', 'AcquaHair@gmail.com', '123456', '82503061000136', 'Bernardino Antunes', 738, '08460190', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 7),
(28, 'Toy Store', 'ToyStore@gmail.com', '123456', '99003795000159', 'Isidoro Rodrigues', 102, '08460370', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 8),
(29, 'Fun Brinks', 'FunBrinks@gmail.com', '123456', '92607234000110', 'Fernando Malo', 92, '08460380', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 8),
(30, 'Donna Bela', 'DonnaBela@gmail.com', '123456', '51983637000186', 'Bartolomeu Gato', 128, '08460390', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 9),
(31, 'Encanto', 'Encanto@gmail.com', '123456', '43225641000157', 'Labor', 923, '08460400', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 9),
(32, 'Móveis Mix', 'MoveisMix@gmail.com', '123456', '62803560000131', 'Domingos Pinheiro', 423, '08460430', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 10),
(33, 'Inovar Móveis', 'InovarMoveis@gmail.com', '123456', '57228453000197', 'Araújo Delgado', 587, '08460440', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 10),
(34, 'Light Eletro', 'LightEletro@gmail.com', '123456', '28244507000100', 'Inocêncio Prêto', 846, '08460450', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 11),
(35, 'Eletro e CIA', 'EletroCIA@gmail.com', '123456', '66414088000104', 'Estr. de Poá', 2456, '08460400', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 11),
(36, 'Hiper Tech', 'HiperTech@gmail.com', '123456', '34713213000182', 'Gravaçu', 743, '08461130', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 12),
(37, 'Start', 'Start@gmail.com', '123456', '45183548000152', 'Alcio Carneiro de Lima', 836, ' 08461190', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 12),
(38, 'Boa Forma', 'BoaForma@gmail.com', '123456', '82250539000163', 'Paulo Ramos', 945, '08461200', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 13),
(39, 'Dynamic', 'Dynamic@gmail.com', '123456', '14846022000181', 'Oito', 567, '08460530', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 13),
(40, 'Ki’Festas', 'KiFestas@gmail.com', '123456', '38089861000160', 'Sete', 567, '08460530', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 14),
(41, 'Magic Party', 'MagicParty@gmail.com', '123456', '81313505000108', 'Projetada Três', 789, '08460532', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 14),
(42, 'Tech inside', 'TechInside@gmail.com', '123456', '46641062000183', 'Tajapuru', 345, '08460470', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 15),
(43, 'Super Tech', 'SuperTech@gmail.com', '123456', '64141911000111', 'Aranha Barreto', 786, '08460510', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 15),
(44, 'Imports Music', 'ImportsMusic@gmail.com', '123456', '34269208000122', 'João Alves Aranha', 456, '08460660', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 16),
(45, '1001 Instrumentos', '1001Instrumentos@gmail.com', '123456', '59671201000163', 'Moreira Neto', 645, '08525450', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 16),
(46, 'Divino Acessório', 'DivinoAcessorio@gmail.com', '123456', '10140822000121', 'Cristóvão de Araújo', 734, '08460346', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 17),
(47, 'Raras Bijus', 'RarasBijus@gmail.com', '123456', '59486335000104', '02345733098', 123, '08460380', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 17),
(48, 'Droga Bem', 'DrogaBem@gmail.com', '123456', '72501730000187', 'Gravaçu', 456, '08461130', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 18),
(49, 'Farma Cura', 'FarmaCura@gmail.com', '123456', '87461628000172', 'Barbosa Calheiros', 987, '08460000', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 18),
(50, 'Barrilada', 'Barrilada@gmail.com', '123456', '70893888000114', 'Cardoso de Abreu', 234, '08460160', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 19),
(51, 'Paris Adega', 'ParisAdega@gmail.com', '123456', '29628747000170', 'Oito', 567, '08460530', 'Guaianases', 'São Paulo', 'São Paulo', 0, 0, 19);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbempresaparceria`
--

CREATE TABLE `tbempresaparceria` (
  `idEmpresaParceria` int(11) NOT NULL,
  `idEmpresa` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbempresaparceria`
--

INSERT INTO `tbempresaparceria` (`idEmpresaParceria`, `idEmpresa`) VALUES
(6, 14),
(7, 14),
(8, 19),
(9, 19),
(10, 19);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbparceria`
--

CREATE TABLE `tbparceria` (
  `idParceria` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `idEmpresaParceria` int(11) NOT NULL,
  `dataParceria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbparceria`
--

INSERT INTO `tbparceria` (`idParceria`, `idEmpresa`, `idEmpresaParceria`, `dataParceria`) VALUES
(13, 17, 6, '17/10/2021'),
(14, 18, 7, '17/10/2021');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbperfilempresa`
--

CREATE TABLE `tbperfilempresa` (
  `idPerfilEmpresa` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `fotoPerfilEmpresa` varchar(1000) NOT NULL,
  `biografiaPerfilEmpresa` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbperfilempresa`
--

INSERT INTO `tbperfilempresa` (`idPerfilEmpresa`, `idEmpresa`, `fotoPerfilEmpresa`, `biografiaPerfilEmpresa`) VALUES
(5, 14, '61688e5e4f92f.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(6, 15, '61688ecfca212.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(9, 20, '61688ff347a64.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(10, 21, '616890056534e.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(11, 22, '6168901ae2814.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(12, 23, '6168902a5872c.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(13, 24, '6168903805c0f.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(14, 25, '61689049299ff.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(15, 26, '61689057cbf4e.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(16, 27, '6168907180fc4.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(17, 28, '616890818d7f7.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(18, 29, '616890913f962.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(19, 30, '616890b2e0304.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(20, 31, '616890c71935d.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(21, 32, '616890d8f2755.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(22, 33, '616890e76fb32.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(23, 34, '616890feca881.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(24, 35, '6168910f843de.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(25, 36, '61689129adc89.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(26, 37, '61689139b8b68.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(27, 38, '6168915dec46e.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(28, 39, '6168917ae9421.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(29, 40, '616891c553252.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(30, 41, '616891d76ce9f.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(31, 42, '61689200c04fb.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(32, 43, '6168921323286.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(33, 44, '6168922827a83.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(34, 45, '6168925d95ffd.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(35, 46, '61689277e5278.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(36, 47, '616892b431ecb.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(37, 48, '616892ce2b05d.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(38, 49, '61689317180f4.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(39, 50, '616893296bfd5.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(40, 51, '616893456275f.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas egestas neque vulputate ligula viverra, non tempus est placerat. Quisque aliquam dictum ipsum. '),
(41, 16, '6168c311c90f6.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ex dui, euismod non neque nec, interdum tincidunt odio. Ut cursus luctus elit in pulvinar.'),
(42, 17, '6168c32322397.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ex dui, euismod non neque nec, interdum tincidunt odio. Ut cursus luctus elit in pulvinar.'),
(43, 18, '6168c35625fa0.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ex dui, euismod non neque nec, interdum tincidunt odio. Ut cursus luctus elit in pulvinar.'),
(44, 19, '6168c37bb500e.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ex dui, euismod non neque nec, interdum tincidunt odio. Ut cursus luctus elit in pulvinar.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpublicacao`
--

CREATE TABLE `tbpublicacao` (
  `idPublicacao` int(11) NOT NULL,
  `tituloPublicacao` varchar(500) NOT NULL,
  `fotoProdutoPublicacao` varchar(50) NOT NULL,
  `precoProdutoPublicacao` decimal(6,2) NOT NULL,
  `descricaoPublicacao` varchar(50) NOT NULL,
  `idAvaliacao` int(11) DEFAULT NULL,
  `idEmpresa` int(11) NOT NULL,
  `linkAvaliacao` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbpublicacao`
--

INSERT INTO `tbpublicacao` (`idPublicacao`, `tituloPublicacao`, `fotoProdutoPublicacao`, `precoProdutoPublicacao`, `descricaoPublicacao`, `idAvaliacao`, `idEmpresa`, `linkAvaliacao`) VALUES
(30, 'Ar condicionado', '6191a5b1bf7c5.jpg', '1500.00', 'Ar condicionado novo + instalação.', NULL, 14, '3'),
(31, 'Manutenção de veiculo', '6191a76cf2249.jpg', '0.00', 'Manutenção de veiculos, com ótimos preços e mão de', NULL, 15, '3'),
(32, 'Manutenção de celular', '6191a7c5a874a.jpg', '100.00', 'Troca de tela e bateria com controle de qualidade.', NULL, 17, '3'),
(33, 'Organização de Festas', '6191a8ed70bc9.jpg', '1500.00', 'Serviço de organização de festa, está afim de faze', NULL, 40, '3'),
(34, 'Cama Elástica', '6191a91e71fea.jpg', '200.00', 'Aluguel de brinquedos para festa, fazemos encomend', NULL, 41, '3'),
(35, 'Cadernos', '6191a9e1bed7b.jpg', '25.00', 'Brochura ou Espiral - 1 matéria', NULL, 22, '3'),
(36, 'Serviços de beleza', '6191af980cf10.jpg', '27.00', 'Cortes de cabelo, Pintura, e Alisamento', NULL, 27, '3'),
(37, 'Maquiagem', '6191afdf92001.jpg', '100.00', 'Maquiagem a gosto do cliente', NULL, 27, '3'),
(38, 'Computador Gamer', '6191b036ba90c.jpg', '1500.00', 'Computadores com a mais alta performance em jogos,', NULL, 36, '3'),
(39, 'Montagem de micro', '6191b05f278d3.jpg', '500.00', 'Montagens de qualquer configuração de computador.', NULL, 37, '3'),
(45, 'Tela -Smartphone', '6191b59f7bbee.jpg', '100.00', 'Troca de tela quebrada/danificada.', NULL, 16, '3'),
(46, 'Formataçao/Instalação', '6191b65293306.jpg', '100.00', ' Formatação de PCs e Smartphones.\r\nInstalação de S', NULL, 16, '3'),
(47, 'Temperos Naturais', '6191b7d315b34.jpg', '5.00', ' Tempero baiano, Pimenta-do-Reino, Cheiro-Verde, e', NULL, 18, '3'),
(48, 'Temperos Naturais', '6191b8ea851a5.jpg', '5.00', ' Temperos naturais, Cravo, Canela, Manjericão, etc', NULL, 19, '3'),
(49, 'Banho e Tosa', '6191b94ed978c.png', '120.00', 'Banho e Tosa! \r\nPreço pode variar de acordo com o ', NULL, 20, '3'),
(50, 'Coleira/ Coleira - Guia', '6191b9b171c7b.jpg', '30.00', ' Coleira para o seu pet.\r\nPreço varia com o tamanh', NULL, 21, '3'),
(51, 'Lápis de Cor - Faber Castell', '6191ba17b290a.jpg', '20.00', ' Lápis de Cor | 12, 24, 36 Cores\r\nPreços variam', NULL, 23, '3'),
(52, 'Barbies', '6191bcc433436.jpg', '120.00', ' Bonecas Barbie e suas profissões', NULL, 28, '3'),
(53, 'Sapatilhas', '6191bd2a73b0d.jpg', '150.00', ' Sapatilhas femininas | N° 35 ao 39', NULL, 30, '3'),
(54, 'Nike - Tênis', '6191bd903d782.jpg', '300.00', 'Calçado Nike | Feminino & Masculino', NULL, 31, '3'),
(55, 'Armário de Cozinha - Itatiaia', '6191bddf6a25a.jpg', '2000.00', ' Armário completo para cozinha | Itatiaia', NULL, 32, '3'),
(56, 'Sala Completa', '6191be34a118c.jpg', '800.00', ' Movéis Sala Completa', NULL, 33, '3'),
(57, 'Máquinas de Lavar Roupa', '6191bf01c3d0e.png', '1500.00', ' Electrolux | Brastemp | Panasonic', NULL, 34, '3'),
(58, 'Microondas', '6191bf4c47404.jpg', '1000.00', ' Brastemp | Electrolux | LG\r\nPreços podem variar', NULL, 35, '3'),
(59, 'Halteres 10KG', '6191c0c74a3bd.jpg', '100.00', 'Kit Halteres 10Kg', NULL, 38, '3'),
(60, 'Macacão', '6192cb3c67511.jpg', '100.00', ' Macacão de bebê, tamanhos variam.', NULL, 24, '3'),
(61, 'Sapato de Bebê', '6192d205e7c64.jpg', '50.00', ' Sapatinhos de bebê | Masculino e Feminino', NULL, 25, '3'),
(62, 'Paleta de Maquiagem', '6192d26f41f61.jpg', '100.00', ' Paleta de Maquiagem | Tamanhos e cores diferentes', NULL, 26, '3'),
(63, 'Conjunto Academia Feminino', '6192d2e48110c.jpg', '90.00', ' Conjuntos de diferentes tamanho | P, M ou G | Pre', NULL, 39, '3'),
(64, 'Impressora | Canon', '6192d32fbe2e3.jpg', '700.00', ' Impressoras Canon | preços podem variar', NULL, 42, '3'),
(65, 'Galaxy A22 | Samsung', '6192d38022afb.jpg', '1500.00', ' Smarthphone Galaxy A22 | Samsung', NULL, 43, '3'),
(66, 'Violão Giannini', '6192d42e18d54.jpg', '1000.00', ' Violão Giannini - Profissional | Corda de Aço', NULL, 44, '3'),
(67, 'Amplificador Marshall', '6192d48e11366.jpg', '2000.00', ' Amplificador de som | Marshall', NULL, 45, '3'),
(68, 'Bolsas Arietto', '6192d4f1e1239.jpg', '1000.00', ' Bolsas Arietto | Preços podem variar', NULL, 46, '3'),
(69, 'Pulseiras femininas', '6192d55c4e7d4.jpg', '50.00', ' Pulseiras delicadas folheadas a ouro', NULL, 47, '3'),
(70, 'Tonalizantes Keraton', '6192d59c710c0.jpg', '30.00', ' Tonalizantes Keraton | Diversas cores', NULL, 48, '3'),
(71, 'Buscofem', '6192d5ff5ae25.jpg', '30.00', 'Buscofem | Ibuprofeno | Com/Sem receita', NULL, 49, '3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbrecomendacao`
--

CREATE TABLE `tbrecomendacao` (
  `idRecomendacao` int(11) NOT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `idEmpresaRecomendada` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbrecomendacao`
--

INSERT INTO `tbrecomendacao` (`idRecomendacao`, `idEmpresa`, `idEmpresaRecomendada`) VALUES
(5, 14, 17),
(6, 14, 18),
(7, 19, 50),
(8, 19, 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbsolicitacaoparceria`
--

CREATE TABLE `tbsolicitacaoparceria` (
  `idSolicitacaoParceria` int(11) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `idRemetente` int(11) NOT NULL,
  `idDestinatario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbsolicitacaoparceria`
--

INSERT INTO `tbsolicitacaoparceria` (`idSolicitacaoParceria`, `descricao`, `idRemetente`, `idDestinatario`) VALUES
(18, 'Minha empresa é muito legal e voce deveria conhecer ela e afins', 19, 14),
(19, '', 14, 15),
(20, '', 14, 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtelefonecliente`
--

CREATE TABLE `tbtelefonecliente` (
  `idTelefoneCliente` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL DEFAULT 0,
  `numTelefoneCliente` varchar(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtelefoneempresa`
--

CREATE TABLE `tbtelefoneempresa` (
  `idTelefoneEmpresa` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL DEFAULT 0,
  `numTelefoneEmpresa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbtelefoneempresa`
--

INSERT INTO `tbtelefoneempresa` (`idTelefoneEmpresa`, `idEmpresa`, `numTelefoneEmpresa`) VALUES
(8, 55, '01122445566'),
(9, 56, '01122445566'),
(10, 57, '01122445566'),
(11, 58, '01122445566'),
(12, 59, '01122445566'),
(13, 60, '01146757934'),
(14, 61, '01146757934');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbavaliacao`
--
ALTER TABLE `tbavaliacao`
  ADD PRIMARY KEY (`idAvaliacao`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idPublicacao` (`idPublicacao`);

--
-- Índices para tabela `tbcategoria`
--
ALTER TABLE `tbcategoria`
  ADD PRIMARY KEY (`idCategoria`),
  ADD KEY `FK__tbcategoria` (`idCategoria`);

--
-- Índices para tabela `tbcategoriaempresa`
--
ALTER TABLE `tbcategoriaempresa`
  ADD PRIMARY KEY (`idCategoriaEmpresa`),
  ADD KEY `idEmpresa` (`idEmpresa`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Índices para tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices para tabela `tbempresa`
--
ALTER TABLE `tbempresa`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Índices para tabela `tbempresaparceria`
--
ALTER TABLE `tbempresaparceria`
  ADD PRIMARY KEY (`idEmpresaParceria`),
  ADD KEY `i` (`idEmpresa`);

--
-- Índices para tabela `tbparceria`
--
ALTER TABLE `tbparceria`
  ADD PRIMARY KEY (`idParceria`),
  ADD KEY `FK_tbparceria_tbempresa` (`idEmpresa`),
  ADD KEY `FK_tbparceria_tbempresaparceria` (`idEmpresaParceria`);

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
  ADD KEY `FK__tbperfilempresa` (`idEmpresa`);

--
-- Índices para tabela `tbrecomendacao`
--
ALTER TABLE `tbrecomendacao`
  ADD PRIMARY KEY (`idRecomendacao`),
  ADD KEY `idEmpresa` (`idEmpresa`);

--
-- Índices para tabela `tbsolicitacaoparceria`
--
ALTER TABLE `tbsolicitacaoparceria`
  ADD PRIMARY KEY (`idSolicitacaoParceria`),
  ADD KEY `idRemetente` (`idRemetente`),
  ADD KEY `idDestinatario` (`idDestinatario`);

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
-- AUTO_INCREMENT de tabela `tbcategoria`
--
ALTER TABLE `tbcategoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `tbcategoriaempresa`
--
ALTER TABLE `tbcategoriaempresa`
  MODIFY `idCategoriaEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `tbempresa`
--
ALTER TABLE `tbempresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de tabela `tbempresaparceria`
--
ALTER TABLE `tbempresaparceria`
  MODIFY `idEmpresaParceria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tbparceria`
--
ALTER TABLE `tbparceria`
  MODIFY `idParceria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `tbperfilempresa`
--
ALTER TABLE `tbperfilempresa`
  MODIFY `idPerfilEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `tbpublicacao`
--
ALTER TABLE `tbpublicacao`
  MODIFY `idPublicacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de tabela `tbrecomendacao`
--
ALTER TABLE `tbrecomendacao`
  MODIFY `idRecomendacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tbsolicitacaoparceria`
--
ALTER TABLE `tbsolicitacaoparceria`
  MODIFY `idSolicitacaoParceria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `tbtelefonecliente`
--
ALTER TABLE `tbtelefonecliente`
  MODIFY `idTelefoneCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tbtelefoneempresa`
--
ALTER TABLE `tbtelefoneempresa`
  MODIFY `idTelefoneEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbavaliacao`
--
ALTER TABLE `tbavaliacao`
  ADD CONSTRAINT `idCliente` FOREIGN KEY (`idCliente`) REFERENCES `tbcliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbavaliacao_ibfk_1` FOREIGN KEY (`idPublicacao`) REFERENCES `tbpublicacao` (`idPublicacao`);

--
-- Limitadores para a tabela `tbcategoria`
--
ALTER TABLE `tbcategoria`
  ADD CONSTRAINT `FK__tbcategoria` FOREIGN KEY (`idCategoria`) REFERENCES `tbcategoria` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tbcategoriaempresa`
--
ALTER TABLE `tbcategoriaempresa`
  ADD CONSTRAINT `FK_tbcategoriaempresa_tbcategoria` FOREIGN KEY (`idCategoria`) REFERENCES `tbcategoria` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idEmpresa` FOREIGN KEY (`idEmpresa`) REFERENCES `tbempresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbcategoriaempresa_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `tbempresa` (`idEmpresa`),
  ADD CONSTRAINT `tbcategoriaempresa_ibfk_2` FOREIGN KEY (`idEmpresa`) REFERENCES `tbempresa` (`idEmpresa`),
  ADD CONSTRAINT `tbcategoriaempresa_ibfk_3` FOREIGN KEY (`idCategoria`) REFERENCES `tbcategoria` (`idCategoria`);

--
-- Limitadores para a tabela `tbempresa`
--
ALTER TABLE `tbempresa`
  ADD CONSTRAINT `tbempresa_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `tbcategoria` (`idCategoria`);

--
-- Limitadores para a tabela `tbempresaparceria`
--
ALTER TABLE `tbempresaparceria`
  ADD CONSTRAINT `i` FOREIGN KEY (`idEmpresa`) REFERENCES `tbempresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tbparceria`
--
ALTER TABLE `tbparceria`
  ADD CONSTRAINT `FK_tbparceria_tbempresa` FOREIGN KEY (`idEmpresa`) REFERENCES `tbempresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_tbparceria_tbempresaparceria` FOREIGN KEY (`idEmpresaParceria`) REFERENCES `tbempresaparceria` (`idEmpresaParceria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tbperfilempresa`
--
ALTER TABLE `tbperfilempresa`
  ADD CONSTRAINT `FK_tbperfilempresa_tbempresa` FOREIGN KEY (`idEmpresa`) REFERENCES `tbempresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tbrecomendacao`
--
ALTER TABLE `tbrecomendacao`
  ADD CONSTRAINT `tbrecomendacao_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `tbempresa` (`idEmpresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
