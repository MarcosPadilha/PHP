-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 18/12/2016 às 23:35
-- Versão do servidor: 5.7.14
-- Versão do PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `eventosqi`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `AluCodigo` int(11) NOT NULL,
  `AluEmail` varchar(255) DEFAULT NULL,
  `AluNome` varchar(255) DEFAULT NULL,
  `AluSobrenome` varchar(255) NOT NULL,
  `AluDataNasc` date NOT NULL,
  `AluEndereco` varchar(255) NOT NULL,
  `AluSenha` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `aluno`
--

INSERT INTO `aluno` (`AluCodigo`, `AluEmail`, `AluNome`, `AluSobrenome`, `AluDataNasc`, `AluEndereco`, `AluSenha`) VALUES
(38, 'geisson@email', 'Geisson', 'Machado', '2000-01-01', 'rua geisson', 'senhageisson'),
(36, 'guilherme@email', 'guilherme', 'pereira', '2000-02-02', 'rua guilherme', 'senhaguilherme'),
(37, 'marcos@email', 'Marcos', 'Padilha', '2000-11-11', 'rua marcos', 'senhamarcos'),
(39, 'pedro@gmail', 'Pedro', 'Alencar', '2000-01-01', 'rua pedro', 'senhapedro');

-- --------------------------------------------------------

--
-- Estrutura para tabela `assiste`
--

CREATE TABLE `assiste` (
  `AluCodigo` int(11) NOT NULL,
  `PalCodigo` int(11) NOT NULL,
  `AssConfirmacao` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `colaborador`
--

CREATE TABLE `colaborador` (
  `ColCodigo` int(11) NOT NULL,
  `ColEmail` varchar(255) DEFAULT NULL,
  `ColNome` varchar(255) DEFAULT NULL,
  `ColSobrenome` varchar(255) NOT NULL,
  `ColDataNasc` date NOT NULL,
  `ColEndereco` varchar(255) NOT NULL,
  `ColSenha` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `colaborador`
--

INSERT INTO `colaborador` (`ColCodigo`, `ColEmail`, `ColNome`, `ColSobrenome`, `ColDataNasc`, `ColEndereco`, `ColSenha`) VALUES
(1, 'silvio@email', 'Silvio', 'Vargas', '2000-01-01', 'rua silvio', 'senhasilvio'),
(16, 'eduardo@email', 'Eduardo', 'Reus', '2000-01-01', 'rua eduardo', 'senhaeduardo'),
(17, 'juliano@email', 'Juliano', 'Quadrado', '2000-01-01', 'rua juliano', 'senhajuliano');

-- --------------------------------------------------------

--
-- Estrutura para tabela `evento`
--

CREATE TABLE `evento` (
  `EveCodigo` int(11) NOT NULL,
  `EveNome` varchar(255) DEFAULT NULL,
  `EveDataInicio` date DEFAULT NULL,
  `EveDataTermino` date DEFAULT NULL,
  `EveDescricao` longtext,
  `EveLogo` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `evento`
--

INSERT INTO `evento` (`EveCodigo`, `EveNome`, `EveDataInicio`, `EveDataTermino`, `EveDescricao`, `EveLogo`) VALUES
(10, 'Semana Sobre ProgramaÃ§Ã£o', '2017-01-01', '2017-01-10', 'Evento que abordarÃ¡ diversos temas relacionados a programaÃ§Ã£o.', NULL),
(11, 'Semana de Moda', '2017-01-01', '2017-05-07', 'Semana que terÃ¡ diversos assuntos, todos focados no ramo na Moda.', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `gerenciaaluno`
--

CREATE TABLE `gerenciaaluno` (
  `ColCodigo` int(11) DEFAULT NULL,
  `AluCodigo` int(11) DEFAULT NULL,
  `GalCodigo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `gerenciaevento`
--

CREATE TABLE `gerenciaevento` (
  `GevCodigo` int(11) NOT NULL,
  `EveCodigo` int(11) DEFAULT NULL,
  `ColCodigo` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `gerenciapalestra`
--

CREATE TABLE `gerenciapalestra` (
  `ColCodigo` int(11) DEFAULT NULL,
  `PalCodigo` int(11) DEFAULT NULL,
  `GpaCodigo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `gerenciapalestrante`
--

CREATE TABLE `gerenciapalestrante` (
  `GptCodigo` int(11) NOT NULL,
  `ColCodigo` int(11) DEFAULT NULL,
  `PltCodigo` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `palestra`
--

CREATE TABLE `palestra` (
  `PalCodigo` int(11) NOT NULL,
  `SalCodigo` int(11) DEFAULT NULL,
  `EveCodigo` int(11) DEFAULT NULL,
  `PalNome` varchar(255) DEFAULT NULL,
  `PalDescricao` longtext,
  `PalFotoCapa` varchar(255) DEFAULT NULL,
  `PalDataInicio` date DEFAULT NULL,
  `PalDataTermino` date DEFAULT NULL,
  `PltCodigo` int(11) NOT NULL,
  `RecCodigo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `palestra`
--

INSERT INTO `palestra` (`PalCodigo`, `SalCodigo`, `EveCodigo`, `PalNome`, `PalDescricao`, `PalFotoCapa`, `PalDataInicio`, `PalDataTermino`, `PltCodigo`, `RecCodigo`) VALUES
(53, 3, 10, 'Javascript', 'Mussum Ipsum, cacilds vidis litro abertis. Pra lÃ¡ , depois divoltis porris, paradis. Quem manda na minha terra sou Euzis!  Suco de cevadiss deixa as pessoas mais interessantiss. Si u mundo tÃ¡ muito paradis? Toma um mÃ© que o mundo vai girarzis! Mussum Ipsum, cacilds vidis litro abertis. Pra la , depois divoltis porris, paradis. Quem manda na minha terra sou Euzis!  Suco de cevadiss deixa as pessoas mais interessantiss. Si u mundo ta muito paradis? Toma um me que o mundo vai girarzis!', '1482103658.png', '2016-01-01', '2016-01-01', 10, 1),
(54, 4, 10, 'PHP', 'Mussum Ipsum, cacilds vidis litro abertis. Pra lÃ¡ , depois divoltis porris, paradis. Quem manda na minha terra sou Euzis!  Suco de cevadiss deixa as pessoas mais interessantiss. Si u mundo tÃ¡ muito paradis? Toma um mÃ© que o mundo vai girarzis! Mussum Ipsum, cacilds vidis litro abertis. Pra la , depois divoltis porris, paradis. Quem manda na minha terra sou Euzis!  Suco de cevadiss deixa as pessoas mais interessantiss. Si u mundo ta muito paradis? Toma um me que o mundo vai girarzis!', '1482103703.png', '2017-01-01', '2017-01-01', 11, 2),
(55, 5, 10, 'HTML', 'Mussum Ipsum, cacilds vidis litro abertis. Pra lÃ¡ , depois divoltis porris, paradis. Quem manda na minha terra sou Euzis!  Suco de cevadiss deixa as pessoas mais interessantiss. Si u mundo tÃ¡ muito paradis? Toma um mÃ© que o mundo vai girarzis! Mussum Ipsum, cacilds vidis litro abertis. Pra la , depois divoltis porris, paradis. Quem manda na minha terra sou Euzis!  Suco de cevadiss deixa as pessoas mais interessantiss. Si u mundo ta muito paradis? Toma um me que o mundo vai girarzis!', '1482103749.png', '2017-01-01', '2017-01-01', 15, 3),
(56, 6, 10, 'Java', 'Mussum Ipsum, cacilds vidis litro abertis. Pra lÃ¡ , depois divoltis porris, paradis. Quem manda na minha terra sou Euzis!  Suco de cevadiss deixa as pessoas mais interessantiss. Si u mundo tÃ¡ muito paradis? Toma um mÃ© que o mundo vai girarzis! Mussum Ipsum, cacilds vidis litro abertis. Pra la , depois divoltis porris, paradis. Quem manda na minha terra sou Euzis!  Suco de cevadiss deixa as pessoas mais interessantiss. Si u mundo ta muito paradis? Toma um me que o mundo vai girarzis!', '1482103792.png', '2017-01-04', '2017-01-04', 16, 1),
(57, 3, 11, 'Alguma Coisa', 'Mussum Ipsum, cacilds vidis litro abertis. Pra lÃ¡ , depois divoltis porris, paradis. Quem manda na minha terra sou Euzis!  Suco de cevadiss deixa as pessoas mais interessantiss. Si u mundo tÃ¡ muito paradis? Toma um mÃ© que o mundo vai girarzis! Mussum Ipsum, cacilds vidis litro abertis. Pra la , depois divoltis porris, paradis. Quem manda na minha terra sou Euzis!  Suco de cevadiss deixa as pessoas mais interessantiss. Si u mundo ta muito paradis? Toma um me que o mundo vai girarzis!', '1482103831.jpg', '2017-01-03', '2017-01-03', 16, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `palestrante`
--

CREATE TABLE `palestrante` (
  `PltCodigo` int(11) NOT NULL,
  `PalCodigo` int(11) DEFAULT NULL,
  `PltNome` varchar(255) DEFAULT NULL,
  `PltEspecializacao` varchar(255) DEFAULT NULL,
  `PltDescricao` longtext,
  `PltFoto` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `palestrante`
--

INSERT INTO `palestrante` (`PltCodigo`, `PalCodigo`, `PltNome`, `PltEspecializacao`, `PltDescricao`, `PltFoto`) VALUES
(10, NULL, 'Charlize Theron', 'Javascript', 'Mussum Ipsum, cacilds vidis litro abertis. Pra lÃ¡ , depois divoltis porris, paradis. Quem manda na minha terra sou Euzis!  Suco de cevadiss deixa as pessoas mais interessantiss. Si u mundo tÃ¡ muito paradis? Toma um mÃ© que o mundo vai girarzis!', '1482103338.jpg'),
(11, NULL, 'Emma Stone', 'PHP', 'Mussum Ipsum, cacilds vidis litro abertis. Pra lÃ¡ , depois divoltis porris, paradis. Quem manda na minha terra sou Euzis!  Suco de cevadiss deixa as pessoas mais interessantiss. Si u mundo tÃ¡ muito paradis? Toma um mÃ© que o mundo vai girarzis!', '1482103370.jpg'),
(12, NULL, 'Jennifer Lawrence', 'Java', 'Mussum Ipsum, cacilds vidis litro abertis. Pra lÃ¡ , depois divoltis porris, paradis. Quem manda na minha terra sou Euzis!  Suco de cevadiss deixa as pessoas mais interessantiss. Si u mundo tÃ¡ muito paradis? Toma um mÃ© que o mundo vai girarzis!', '1482103405.jpg'),
(13, NULL, 'Elisha Cuthbert', '.NET', 'Mussum Ipsum, cacilds vidis litro abertis. Pra lÃ¡ , depois divoltis porris, paradis. Quem manda na minha terra sou Euzis!  Suco de cevadiss deixa as pessoas mais interessantiss. Si u mundo tÃ¡ muito paradis? Toma um mÃ© que o mundo vai girarzis!', '1482103501.jpg'),
(14, NULL, 'Anne Hathaway', 'ASP', 'Mussum Ipsum, cacilds vidis litro abertis. Pra lÃ¡ , depois divoltis porris, paradis. Quem manda na minha terra sou Euzis!  Suco de cevadiss deixa as pessoas mais interessantiss. Si u mundo tÃ¡ muito paradis? Toma um mÃ© que o mundo vai girarzis!', '1482103527.jpg'),
(15, NULL, 'Emma Watson', 'Ruby', 'Mussum Ipsum, cacilds vidis litro abertis. Pra lÃ¡ , depois divoltis porris, paradis. Quem manda na minha terra sou Euzis!  Suco de cevadiss deixa as pessoas mais interessantiss. Si u mundo tÃ¡ muito paradis? Toma um mÃ© que o mundo vai girarzis!', '1482103549.jpg'),
(16, NULL, 'Amy Adams', 'Pearl', 'Mussum Ipsum, cacilds vidis litro abertis. Pra lÃ¡ , depois divoltis porris, paradis. Quem manda na minha terra sou Euzis!  Suco de cevadiss deixa as pessoas mais interessantiss. Si u mundo tÃ¡ muito paradis? Toma um mÃ© que o mundo vai girarzis!', '1482103583.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `recurso`
--

CREATE TABLE `recurso` (
  `RecCodigo` int(11) NOT NULL,
  `RecNome` varchar(255) DEFAULT NULL,
  `RecQuantidade` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `recurso`
--

INSERT INTO `recurso` (`RecCodigo`, `RecNome`, `RecQuantidade`) VALUES
(1, 'Giz de Cera', 54),
(2, 'Canetas', 500),
(3, 'Computadores', 56);

-- --------------------------------------------------------

--
-- Estrutura para tabela `sala`
--

CREATE TABLE `sala` (
  `SalCodigo` int(11) NOT NULL,
  `SalCapacidade` int(11) DEFAULT NULL,
  `SalNumero` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `sala`
--

INSERT INTO `sala` (`SalCodigo`, `SalCapacidade`, `SalNumero`) VALUES
(3, 98, 201),
(4, 99, 202),
(5, 150, 301),
(6, 45, 209);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`AluCodigo`);

--
-- Índices de tabela `assiste`
--
ALTER TABLE `assiste`
  ADD PRIMARY KEY (`AluCodigo`,`PalCodigo`),
  ADD KEY `PalCodigo` (`PalCodigo`);

--
-- Índices de tabela `colaborador`
--
ALTER TABLE `colaborador`
  ADD PRIMARY KEY (`ColCodigo`);

--
-- Índices de tabela `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`EveCodigo`);

--
-- Índices de tabela `gerenciaaluno`
--
ALTER TABLE `gerenciaaluno`
  ADD PRIMARY KEY (`GalCodigo`),
  ADD KEY `ColCodigo` (`ColCodigo`),
  ADD KEY `AluCodigo` (`AluCodigo`);

--
-- Índices de tabela `gerenciaevento`
--
ALTER TABLE `gerenciaevento`
  ADD PRIMARY KEY (`GevCodigo`),
  ADD KEY `ColCodigo` (`ColCodigo`),
  ADD KEY `EveCodigo` (`EveCodigo`);

--
-- Índices de tabela `gerenciapalestra`
--
ALTER TABLE `gerenciapalestra`
  ADD PRIMARY KEY (`GpaCodigo`),
  ADD KEY `ColCodigo` (`ColCodigo`),
  ADD KEY `PalCodigo` (`PalCodigo`);

--
-- Índices de tabela `gerenciapalestrante`
--
ALTER TABLE `gerenciapalestrante`
  ADD PRIMARY KEY (`GptCodigo`),
  ADD KEY `ColCodigo` (`ColCodigo`),
  ADD KEY `PltCodigo` (`PltCodigo`);

--
-- Índices de tabela `palestra`
--
ALTER TABLE `palestra`
  ADD PRIMARY KEY (`PalCodigo`),
  ADD KEY `SalCodigo` (`SalCodigo`),
  ADD KEY `EveCodigo` (`EveCodigo`),
  ADD KEY `PltCodigo` (`PltCodigo`),
  ADD KEY `RecCodigo` (`RecCodigo`);

--
-- Índices de tabela `palestrante`
--
ALTER TABLE `palestrante`
  ADD PRIMARY KEY (`PltCodigo`),
  ADD KEY `PalCodigo` (`PalCodigo`);

--
-- Índices de tabela `recurso`
--
ALTER TABLE `recurso`
  ADD PRIMARY KEY (`RecCodigo`);

--
-- Índices de tabela `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`SalCodigo`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `AluCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de tabela `colaborador`
--
ALTER TABLE `colaborador`
  MODIFY `ColCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de tabela `evento`
--
ALTER TABLE `evento`
  MODIFY `EveCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de tabela `palestra`
--
ALTER TABLE `palestra`
  MODIFY `PalCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT de tabela `palestrante`
--
ALTER TABLE `palestrante`
  MODIFY `PltCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de tabela `recurso`
--
ALTER TABLE `recurso`
  MODIFY `RecCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `sala`
--
ALTER TABLE `sala`
  MODIFY `SalCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
