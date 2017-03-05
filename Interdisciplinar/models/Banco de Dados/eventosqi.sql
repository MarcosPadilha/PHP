-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/12/2016 às 20:32
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
  `AluRA` varchar(255) DEFAULT NULL,
  `AluSenha` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `aluno`
--

INSERT INTO `aluno` (`AluCodigo`, `AluEmail`, `AluNome`, `AluRA`, `AluSenha`) VALUES
(1, '466@gmail.com', 'asd', '56465', '6416'),
(2, '', '', '', ''),
(3, '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `assiste`
--

CREATE TABLE `assiste` (
  `AluCodigo` int(11) NOT NULL,
  `PalCodigo` int(11) NOT NULL,
  `AssConfirmacao` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `colaborador`
--

CREATE TABLE `colaborador` (
  `ColCodigo` int(11) NOT NULL,
  `ColEmail` varchar(255) DEFAULT NULL,
  `ColNome` varchar(255) DEFAULT NULL,
  `ColSenha` varchar(255) DEFAULT NULL,
  `ColRA` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(4, 'Semana sobre Linguagens de ProgramaÃ§Ã£o', '2017-01-01', '2017-01-05', 'Semana dedicada ao aprendizado sobre as linguagens de programação existentes no mercado atualmente, suas implementaÃ§Ãµes, histÃ³ria curiosidades, entre outros.', '');

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
  `PalDataTermino` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `palestra`
--

INSERT INTO `palestra` (`PalCodigo`, `SalCodigo`, `EveCodigo`, `PalNome`, `PalDescricao`, `PalFotoCapa`, `PalDataInicio`, `PalDataTermino`) VALUES
(40, 3, 4, 'Javascript', 'JavaScript Ã© uma linguagem de programaÃ§Ã£o interpretada, Foi originalmente implementada como parte dos navegadores web para que scripts pudessem ser executados do lado do cliente e interagissem com o usuÃ¡rio sem a necessidade deste script passar pelo servidor, controlando o navegador, realizando comunicaÃ§Ã£o assÃ­ncrona e alterando o conteÃºdo do documento exibido. Ã‰ atualmente a principal linguagem para programaÃ§Ã£o client-side em navegadores web. ComeÃ§a tambÃ©m a ser bastante utilizada do lado do servidor atravÃ©s de ambientes como o node.js. Foi concebida para ser uma linguagem script com orientaÃ§Ã£o a objetos baseada em protÃ³tipos, tipagem fraca e dinÃ¢mica e funÃ§Ãµes de primeira classe.', '1481605927.png', '2017-01-01', '2017-01-01'),
(41, 4, 4, 'Java', 'Ã‰ a ilha mais povoada do mundo e uma das regiÃµes mais densamente povoadas do planeta. Antigamente foi um poderoso reino hindu e, nos tempos coloniais, foi o territÃ³rio principal dos domÃ­nios da Companhia Neerlandesa das Ãndias Orientais. Actualmente a ilha tem um papel predominante na vida econÃ³mica e polÃ­tica da IndonÃ©sia. A principal etnia Ã© a javanesa e a religiÃ£o predominante Ã© o IslÃ£o.', '1481605998.png', '2017-01-02', '2017-01-02'),
(42, 5, 4, 'PHP', '	PHP (um acrÃ´nimo recursivo para "PHP: Hypertext Preprocessor", originalmente Personal Home Page) Ã© uma linguagem interpretada livre, usada originalmente apenas para o desenvolvimento de aplicaÃ§Ãµes presentes e atuantes no lado do servidor, capazes de gerar conteÃºdo dinÃ¢mico na World Wide Web. Figura entre as primeiras linguagens passÃ­veis de inserÃ§Ã£o em documentos HTML, dispensando em muitos casos o uso de arquivos externos para eventuais processamentos de dados. O cÃ³digo Ã© interpretado no lado do servidor pelo mÃ³dulo PHP, que tambÃ©m gera a pÃ¡gina web a ser visualizada no lado do cliente.', '1481606043.png', '2017-01-03', '2017-01-03'),
(43, 6, 4, 'WEB', 'A World Wide Web (termo inglÃªs que, em portuguÃªs, se traduz literalmente por "Teia mundial"), tambÃ©m conhecida como Web ou WWW, Ã© um sistema de documentos em hipermÃ­dia (hipermÃ©dia) que sÃ£o interligados e executados na Internet.', '1481606086.png', '2017-01-04', '2017-01-04');

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

-- --------------------------------------------------------

--
-- Estrutura para tabela `palestra_recurso`
--

CREATE TABLE `palestra_recurso` (
  `PalCodigo` int(11) NOT NULL,
  `RecCodigo` int(11) NOT NULL,
  `PreQuantidade` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `recurso`
--

CREATE TABLE `recurso` (
  `RecCodigo` int(11) NOT NULL,
  `RecNome` varchar(255) DEFAULT NULL,
  `RecQuantidade` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(6, 56, 204);

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
  ADD KEY `EveCodigo` (`EveCodigo`);

--
-- Índices de tabela `palestrante`
--
ALTER TABLE `palestrante`
  ADD PRIMARY KEY (`PltCodigo`),
  ADD KEY `PalCodigo` (`PalCodigo`);

--
-- Índices de tabela `palestra_recurso`
--
ALTER TABLE `palestra_recurso`
  ADD PRIMARY KEY (`PalCodigo`,`RecCodigo`),
  ADD KEY `RecCodigo` (`RecCodigo`);

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
  MODIFY `AluCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `colaborador`
--
ALTER TABLE `colaborador`
  MODIFY `ColCodigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `evento`
--
ALTER TABLE `evento`
  MODIFY `EveCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `palestra`
--
ALTER TABLE `palestra`
  MODIFY `PalCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT de tabela `palestrante`
--
ALTER TABLE `palestrante`
  MODIFY `PltCodigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `recurso`
--
ALTER TABLE `recurso`
  MODIFY `RecCodigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `sala`
--
ALTER TABLE `sala`
  MODIFY `SalCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
