-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28-Ago-2016 às 04:42
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bdagendatarefa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbamigo`
--

CREATE TABLE IF NOT EXISTS `tbamigo` (
  `codAmigo` int(11) NOT NULL AUTO_INCREMENT,
  `codUsuario` int(11) NOT NULL,
  `codUsuarioConvite` int(11) NOT NULL,
  `codStatusConvite` int(11) NOT NULL,
  `dataStatusConvite` datetime NOT NULL,
  PRIMARY KEY (`codAmigo`),
  KEY `codUsuario` (`codUsuario`,`codUsuarioConvite`,`codStatusConvite`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcategoriatarefa`
--

CREATE TABLE IF NOT EXISTS `tbcategoriatarefa` (
  `codCotegoriaTarefa` int(11) NOT NULL AUTO_INCREMENT,
  `descCategoriaTarefa` varchar(50) NOT NULL,
  PRIMARY KEY (`codCotegoriaTarefa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tbcategoriatarefa`
--

INSERT INTO `tbcategoriatarefa` (`codCotegoriaTarefa`, `descCategoriaTarefa`) VALUES
(1, 'Pessoal'),
(2, 'Escola'),
(3, 'Mãe do piscina'),
(4, 'Meu penis'),
(5, 'asdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbstatusconvite`
--

CREATE TABLE IF NOT EXISTS `tbstatusconvite` (
  `codStatusConvite` int(11) NOT NULL AUTO_INCREMENT,
  `descStatusConvite` varchar(20) NOT NULL,
  PRIMARY KEY (`codStatusConvite`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbstatustarefaamigo`
--

CREATE TABLE IF NOT EXISTS `tbstatustarefaamigo` (
  `codStatusTarefaAmigo` int(11) NOT NULL AUTO_INCREMENT,
  `descStatusTarefaAmigo` varchar(50) NOT NULL,
  PRIMARY KEY (`codStatusTarefaAmigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtarefa`
--

CREATE TABLE IF NOT EXISTS `tbtarefa` (
  `codTarefa` int(11) NOT NULL AUTO_INCREMENT,
  `codUsuario` int(11) NOT NULL,
  `nomeTarefa` varchar(50) NOT NULL,
  `dataInicial` datetime NOT NULL,
  `dataFinal` datetime NOT NULL,
  `dataCriacao` datetime NOT NULL,
  `codCategoriaTarefa` int(11) NOT NULL,
  PRIMARY KEY (`codTarefa`),
  KEY `codUsuario` (`codUsuario`,`codCategoriaTarefa`),
  KEY `fkCodCategoriaTarefa` (`codCategoriaTarefa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtarefaamigo`
--

CREATE TABLE IF NOT EXISTS `tbtarefaamigo` (
  `codTarefaAmigo` int(11) NOT NULL AUTO_INCREMENT,
  `codTarefa` int(11) NOT NULL,
  `codAmigo` int(11) NOT NULL,
  `codStatusTarefaAmigo` int(11) NOT NULL,
  PRIMARY KEY (`codTarefaAmigo`),
  KEY `codTarefa` (`codTarefa`,`codAmigo`,`codStatusTarefaAmigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

CREATE TABLE IF NOT EXISTS `tbusuario` (
  `codUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nomeUsuario` varchar(100) NOT NULL,
  `emailUsuario` varchar(80) NOT NULL,
  `senhaUsuario` varchar(255) NOT NULL,
  PRIMARY KEY (`codUsuario`),
  UNIQUE KEY `emailUsuario` (`emailUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `tbusuario`
--

INSERT INTO `tbusuario` (`codUsuario`, `nomeUsuario`, `emailUsuario`, `senhaUsuario`) VALUES
(6, 'Elzo Brito dos Santos Filho', 'elzobrito@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(7, 'richard', 'richard@asdf', '615f2a1a9855363e15db4de6ba95d185'),
(8, 'richardmar', 'richardas@asfd', '615f2a1a9855363e15db4de6ba95d185');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tbtarefa`
--
ALTER TABLE `tbtarefa`
  ADD CONSTRAINT `tbtarefa_ibfk_1` FOREIGN KEY (`codUsuario`) REFERENCES `tbusuario` (`codUsuario`),
  ADD CONSTRAINT `tbtarefa_ibfk_2` FOREIGN KEY (`codCategoriaTarefa`) REFERENCES `tbcategoriatarefa` (`codCotegoriaTarefa`);
--
-- Database: `espacoker`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbagendamento`
--

CREATE TABLE IF NOT EXISTS `tbagendamento` (
  `codAgendamento` int(11) NOT NULL AUTO_INCREMENT,
  `dataAgendamento` date NOT NULL,
  `horarioAgendamento` time NOT NULL,
  `codUsuario` int(11) NOT NULL,
  `codServico` int(11) NOT NULL,
  PRIMARY KEY (`codAgendamento`),
  KEY `codUsuario` (`codUsuario`),
  KEY `codServico` (`codServico`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `tbagendamento`
--

INSERT INTO `tbagendamento` (`codAgendamento`, `dataAgendamento`, `horarioAgendamento`, `codUsuario`, `codServico`) VALUES
(18, '2000-03-12', '12:03:00', 48, 29),
(20, '1122-02-12', '12:02:00', 60, 29);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcomandaservico`
--

CREATE TABLE IF NOT EXISTS `tbcomandaservico` (
  `codComandaServico` int(11) NOT NULL AUTO_INCREMENT,
  `subTotalServico` decimal(10,0) NOT NULL,
  PRIMARY KEY (`codComandaServico`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcomandavenda`
--

CREATE TABLE IF NOT EXISTS `tbcomandavenda` (
  `codComandaVenda` int(11) NOT NULL AUTO_INCREMENT,
  `subTotalVenda` decimal(10,0) NOT NULL,
  PRIMARY KEY (`codComandaVenda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbconta`
--

CREATE TABLE IF NOT EXISTS `tbconta` (
  `codConta` int(11) NOT NULL AUTO_INCREMENT,
  `dataConta` date NOT NULL,
  `desconto` decimal(10,0) NOT NULL,
  `valorTotal` decimal(10,0) NOT NULL,
  `codUsuario` int(11) NOT NULL,
  `codStatusUsuario` int(11) NOT NULL,
  `codFuncionario` int(11) NOT NULL,
  `codComandaServico` int(11) DEFAULT NULL,
  `codComandaVenda` int(11) DEFAULT NULL,
  PRIMARY KEY (`codConta`),
  KEY `codUsuario` (`codUsuario`),
  KEY `codStatusUsuario` (`codStatusUsuario`),
  KEY `codFuncionario` (`codFuncionario`),
  KEY `codComandaServico` (`codComandaServico`,`codComandaVenda`),
  KEY `codComandaVenda` (`codComandaVenda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbentradacaixa`
--

CREATE TABLE IF NOT EXISTS `tbentradacaixa` (
  `codEntradaCaixa` int(11) NOT NULL AUTO_INCREMENT,
  `valorEntradaCaixa` decimal(10,0) NOT NULL,
  `dataEntradaCaixa` date NOT NULL,
  `codOrigemEntradaCaixa` int(11) NOT NULL,
  PRIMARY KEY (`codEntradaCaixa`),
  KEY `codOrigemEntradaCaixa` (`codOrigemEntradaCaixa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tbentradacaixa`
--

INSERT INTO `tbentradacaixa` (`codEntradaCaixa`, `valorEntradaCaixa`, `dataEntradaCaixa`, `codOrigemEntradaCaixa`) VALUES
(1, '30', '2016-08-27', 3),
(2, '120', '2016-08-27', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbentradaproduto`
--

CREATE TABLE IF NOT EXISTS `tbentradaproduto` (
  `codEntradaProduto` int(11) NOT NULL AUTO_INCREMENT,
  `valorEntradaProduto` decimal(10,0) NOT NULL,
  `dataEntradaProduto` date NOT NULL,
  `codOrigemEntradaProduto` int(11) NOT NULL,
  `codProduto` int(11) NOT NULL,
  PRIMARY KEY (`codEntradaProduto`),
  KEY `codOrigemEntradaProduto` (`codOrigemEntradaProduto`,`codProduto`),
  KEY `codProduto` (`codProduto`),
  KEY `codProduto_2` (`codProduto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfabricante`
--

CREATE TABLE IF NOT EXISTS `tbfabricante` (
  `codFabricante` int(11) NOT NULL AUTO_INCREMENT,
  `descFabricante` varchar(100) NOT NULL,
  PRIMARY KEY (`codFabricante`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tbfabricante`
--

INSERT INTO `tbfabricante` (`codFabricante`, `descFabricante`) VALUES
(2, 'Panco'),
(3, 'Lello'),
(5, 'ZÃ©zinho');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbformapagamento`
--

CREATE TABLE IF NOT EXISTS `tbformapagamento` (
  `codFormaPagamento` int(11) NOT NULL AUTO_INCREMENT,
  `descFormaPagamento` int(100) NOT NULL,
  PRIMARY KEY (`codFormaPagamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbitenscomandaservico`
--

CREATE TABLE IF NOT EXISTS `tbitenscomandaservico` (
  `codItensComandaServico` int(11) NOT NULL AUTO_INCREMENT,
  `qtdeServico` int(11) NOT NULL,
  `codServico` int(11) NOT NULL,
  `codComandaServico` int(11) NOT NULL,
  PRIMARY KEY (`codItensComandaServico`),
  KEY `codServico` (`codServico`,`codComandaServico`),
  KEY `codComandaServico` (`codComandaServico`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbitenscomandavenda`
--

CREATE TABLE IF NOT EXISTS `tbitenscomandavenda` (
  `codItensComandaVenda` int(11) NOT NULL AUTO_INCREMENT,
  `qtdeProdutoVenda` int(11) NOT NULL,
  `codComandaVenda` int(11) NOT NULL,
  `codProduto` int(11) NOT NULL,
  PRIMARY KEY (`codItensComandaVenda`),
  KEY `codComandaVenda` (`codComandaVenda`,`codProduto`),
  KEY `codProduto` (`codProduto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbitenspacote`
--

CREATE TABLE IF NOT EXISTS `tbitenspacote` (
  `codItensPacote` int(11) NOT NULL AUTO_INCREMENT,
  `codPacote` int(11) NOT NULL,
  `codServico` int(11) NOT NULL,
  PRIMARY KEY (`codItensPacote`),
  KEY `codPacote` (`codPacote`,`codServico`),
  KEY `codServico` (`codServico`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `tbitenspacote`
--

INSERT INTO `tbitenspacote` (`codItensPacote`, `codPacote`, `codServico`) VALUES
(1, 3, 30),
(2, 4, 30),
(3, 5, 29),
(4, 7, 29),
(5, 7, 29),
(6, 7, 29),
(7, 7, 29),
(8, 7, 29),
(9, 7, 29),
(10, 10, 29),
(11, 10, 30),
(12, 11, 29);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tborigementradacaixa`
--

CREATE TABLE IF NOT EXISTS `tborigementradacaixa` (
  `codOrigemEntradaCaixa` int(11) NOT NULL AUTO_INCREMENT,
  `descOrigemEntradaCaixa` varchar(100) NOT NULL,
  PRIMARY KEY (`codOrigemEntradaCaixa`),
  UNIQUE KEY `descOrigemEntradaCaixa` (`descOrigemEntradaCaixa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `tborigementradacaixa`
--

INSERT INTO `tborigementradacaixa` (`codOrigemEntradaCaixa`, `descOrigemEntradaCaixa`) VALUES
(3, 'prostituiÃ§Ã£o'),
(4, 'Uns Role Monstro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tborigementradaproduto`
--

CREATE TABLE IF NOT EXISTS `tborigementradaproduto` (
  `codOrigemEntradaProduto` int(11) NOT NULL AUTO_INCREMENT,
  `descOrigemEntradaProduto` varchar(255) NOT NULL,
  PRIMARY KEY (`codOrigemEntradaProduto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tborigemsaidacaixa`
--

CREATE TABLE IF NOT EXISTS `tborigemsaidacaixa` (
  `codOrigemSaidaCaixa` int(11) NOT NULL AUTO_INCREMENT,
  `descOrigemSaidaCaixa` varchar(255) NOT NULL,
  PRIMARY KEY (`codOrigemSaidaCaixa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tborigemsaidacaixa`
--

INSERT INTO `tborigemsaidacaixa` (`codOrigemSaidaCaixa`, `descOrigemSaidaCaixa`) VALUES
(1, 'Back'),
(2, 'O Porra do meu Filho');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tborigemsaidaproduto`
--

CREATE TABLE IF NOT EXISTS `tborigemsaidaproduto` (
  `codOrigemSaidaProduto` int(11) NOT NULL AUTO_INCREMENT,
  `descOrigemSaidaProduto` varchar(255) NOT NULL,
  PRIMARY KEY (`codOrigemSaidaProduto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpacote`
--

CREATE TABLE IF NOT EXISTS `tbpacote` (
  `codPacote` int(11) NOT NULL AUTO_INCREMENT,
  `nomePacote` varchar(50) NOT NULL,
  `valorPacote` decimal(10,0) NOT NULL,
  `dataCadastro` date NOT NULL,
  PRIMARY KEY (`codPacote`),
  UNIQUE KEY `nomePacote` (`nomePacote`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `tbpacote`
--

INSERT INTO `tbpacote` (`codPacote`, `nomePacote`, `valorPacote`, `dataCadastro`) VALUES
(3, 'richard', '0', '2016-08-27'),
(4, 'macaca', '0', '2016-08-27'),
(5, 'sadasd', '0', '2016-08-27'),
(7, 'ertyuiop', '0', '2016-08-27'),
(10, 'ertyuiertyuiop', '0', '2016-08-27'),
(11, 'werty', '35', '2016-08-27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbparcela`
--

CREATE TABLE IF NOT EXISTS `tbparcela` (
  `codParcela` int(11) NOT NULL AUTO_INCREMENT,
  `valorParcela` decimal(10,0) NOT NULL,
  `dataParcela` date NOT NULL,
  `codFormaPagamento` int(11) NOT NULL,
  `codConta` int(11) NOT NULL,
  PRIMARY KEY (`codParcela`),
  KEY `codFormaPagamento` (`codFormaPagamento`,`codConta`),
  KEY `codConta` (`codConta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbproduto`
--

CREATE TABLE IF NOT EXISTS `tbproduto` (
  `codProduto` int(11) NOT NULL AUTO_INCREMENT,
  `descProduto` varchar(100) NOT NULL,
  `quantidadeProduto` int(11) NOT NULL,
  `valorUnidadeVenda` double NOT NULL,
  `valorUnidadeCompra` double NOT NULL,
  `codFabricante` int(11) NOT NULL,
  PRIMARY KEY (`codProduto`),
  KEY `codFabricante` (`codFabricante`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `tbproduto`
--

INSERT INTO `tbproduto` (`codProduto`, `descProduto`, `quantidadeProduto`, `valorUnidadeVenda`, `valorUnidadeCompra`, `codFabricante`) VALUES
(6, 'Shampoo', 21, 12.5, 5, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbsaidacaixa`
--

CREATE TABLE IF NOT EXISTS `tbsaidacaixa` (
  `codSaidaCaixa` int(11) NOT NULL AUTO_INCREMENT,
  `valorSaidaCaixa` decimal(10,0) NOT NULL,
  `dataSaidaCaixa` date NOT NULL,
  `codOrigemSaidaCaixa` int(11) NOT NULL,
  PRIMARY KEY (`codSaidaCaixa`),
  KEY `codOrigemSaidaCaixa` (`codOrigemSaidaCaixa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tbsaidacaixa`
--

INSERT INTO `tbsaidacaixa` (`codSaidaCaixa`, `valorSaidaCaixa`, `dataSaidaCaixa`, `codOrigemSaidaCaixa`) VALUES
(1, '30', '2016-08-27', 2),
(2, '12', '2016-08-27', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbsaidaproduto`
--

CREATE TABLE IF NOT EXISTS `tbsaidaproduto` (
  `codSaidaProduto` int(11) NOT NULL AUTO_INCREMENT,
  `valorSaidaProduto` decimal(10,0) NOT NULL,
  `dataSaidaProduto` date NOT NULL,
  `codOrigemSaidaProduto` int(11) NOT NULL,
  `codProduto` int(11) NOT NULL,
  PRIMARY KEY (`codSaidaProduto`),
  KEY `codOrigemSaidaProduto` (`codOrigemSaidaProduto`,`codProduto`),
  KEY `codProduto` (`codProduto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbservico`
--

CREATE TABLE IF NOT EXISTS `tbservico` (
  `codServico` int(11) NOT NULL AUTO_INCREMENT,
  `nomeServico` varchar(50) NOT NULL,
  `descServico` varchar(300) NOT NULL,
  `duracaoServico` time NOT NULL,
  `valorServico` double NOT NULL,
  `nomeImagem` varchar(100) NOT NULL,
  PRIMARY KEY (`codServico`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Extraindo dados da tabela `tbservico`
--

INSERT INTO `tbservico` (`codServico`, `nomeServico`, `descServico`, `duracaoServico`, `valorServico`, `nomeImagem`) VALUES
(29, 'muito loco', 'qewrwqer', '00:00:00', 123, '1472322141.jpg'),
(30, 'richard', 'gostosÃ£o', '00:30:00', 21, '1472322594.jpg'),
(31, 'caguei', 'coco', '12:03:00', 1234, '1472333442.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbstatususuario`
--

CREATE TABLE IF NOT EXISTS `tbstatususuario` (
  `codStatusUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `descStatusUsuario` varchar(50) NOT NULL,
  PRIMARY KEY (`codStatusUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtelefoneusuario`
--

CREATE TABLE IF NOT EXISTS `tbtelefoneusuario` (
  `codTelefoneUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `numTelefoneUsuario` varchar(15) NOT NULL,
  `codUsuario` int(11) NOT NULL,
  PRIMARY KEY (`codTelefoneUsuario`),
  KEY `codUsuario` (`codUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `tbtelefoneusuario`
--

INSERT INTO `tbtelefoneusuario` (`codTelefoneUsuario`, `numTelefoneUsuario`, `codUsuario`) VALUES
(1, 'qwerqwerqw', 56),
(2, '123231', 57),
(3, '123231', 59),
(4, 'ASDF', 60),
(5, 'GFDS', 60),
(6, 'GFDSA', 60),
(7, 'FDFSA', 60),
(8, '11 2556 0586', 65);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

CREATE TABLE IF NOT EXISTS `tbusuario` (
  `codUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nomeUsuario` varchar(100) NOT NULL,
  `dataNascimentoUsuario` date NOT NULL,
  `emailUsuario` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `salarioFuncionario` decimal(10,0) DEFAULT NULL,
  `cpfFuncionario` varchar(15) DEFAULT NULL,
  `tipoUsuario` varchar(15) NOT NULL,
  `sexoUsuario` varchar(10) NOT NULL,
  PRIMARY KEY (`codUsuario`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Extraindo dados da tabela `tbusuario`
--

INSERT INTO `tbusuario` (`codUsuario`, `nomeUsuario`, `dataNascimentoUsuario`, `emailUsuario`, `login`, `senha`, `salarioFuncionario`, `cpfFuncionario`, `tipoUsuario`, `sexoUsuario`) VALUES
(48, 'ricardomem', '2000-02-12', 'ricardo@asdf', 'ricardinhozikamemo', '615f2a1a9855363e15db4de6ba95d185', NULL, NULL, 'comum', 'Masculino'),
(60, 'FASDFSDF', '2222-12-12', 'ASDFASDF@GSFSDGD', 'AADFSADFASDF', '6d87a19f011653459575ceb722db3b69', NULL, NULL, 'comum', 'Masculino'),
(61, 'ricardao', '2000-02-12', 'ricardao@noiadal', 'ricardo', '615f2a1a9855363e15db4de6ba95d185', '800', '46751960808', 'admim', 'Masculino'),
(62, 'richard', '2000-03-12', 'richard@richard', 'richard', '615f2a1a9855363e15db4de6ba95d185', '800', '46751960808', 'admim', 'Masculino'),
(65, 'chave', '2000-03-12', 'chave@chave', 'chaveta', '912ec803b2ce49e4a541068d495ab570', '1200', '46751960808', 'admim', 'Masculino');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tbagendamento`
--
ALTER TABLE `tbagendamento`
  ADD CONSTRAINT `tbagendamento_ibfk_1` FOREIGN KEY (`codUsuario`) REFERENCES `tbusuario` (`codUsuario`);

--
-- Limitadores para a tabela `tbconta`
--
ALTER TABLE `tbconta`
  ADD CONSTRAINT `tbconta_ibfk_1` FOREIGN KEY (`codUsuario`) REFERENCES `tbusuario` (`codUsuario`),
  ADD CONSTRAINT `tbconta_ibfk_2` FOREIGN KEY (`codStatusUsuario`) REFERENCES `tbstatususuario` (`codStatusUsuario`),
  ADD CONSTRAINT `tbconta_ibfk_3` FOREIGN KEY (`codFuncionario`) REFERENCES `tbusuario` (`codUsuario`),
  ADD CONSTRAINT `tbconta_ibfk_4` FOREIGN KEY (`codComandaServico`) REFERENCES `tbcomandaservico` (`codComandaServico`),
  ADD CONSTRAINT `tbconta_ibfk_5` FOREIGN KEY (`codComandaVenda`) REFERENCES `tbcomandavenda` (`codComandaVenda`);

--
-- Limitadores para a tabela `tbentradacaixa`
--
ALTER TABLE `tbentradacaixa`
  ADD CONSTRAINT `tbentradacaixa_ibfk_1` FOREIGN KEY (`codOrigemEntradaCaixa`) REFERENCES `tborigementradacaixa` (`codOrigemEntradaCaixa`);

--
-- Limitadores para a tabela `tbentradaproduto`
--
ALTER TABLE `tbentradaproduto`
  ADD CONSTRAINT `tbentradaproduto_ibfk_1` FOREIGN KEY (`codOrigemEntradaProduto`) REFERENCES `tborigementradaproduto` (`codOrigemEntradaProduto`),
  ADD CONSTRAINT `tbentradaproduto_ibfk_2` FOREIGN KEY (`codProduto`) REFERENCES `tbproduto` (`codProduto`);

--
-- Limitadores para a tabela `tbitenscomandaservico`
--
ALTER TABLE `tbitenscomandaservico`
  ADD CONSTRAINT `tbitenscomandaservico_ibfk_1` FOREIGN KEY (`codServico`) REFERENCES `tbservico` (`codServico`),
  ADD CONSTRAINT `tbitenscomandaservico_ibfk_2` FOREIGN KEY (`codComandaServico`) REFERENCES `tbcomandaservico` (`codComandaServico`);

--
-- Limitadores para a tabela `tbitenscomandavenda`
--
ALTER TABLE `tbitenscomandavenda`
  ADD CONSTRAINT `tbitenscomandavenda_ibfk_1` FOREIGN KEY (`codComandaVenda`) REFERENCES `tbcomandavenda` (`codComandaVenda`),
  ADD CONSTRAINT `tbitenscomandavenda_ibfk_2` FOREIGN KEY (`codProduto`) REFERENCES `tbproduto` (`codProduto`);

--
-- Limitadores para a tabela `tbitenspacote`
--
ALTER TABLE `tbitenspacote`
  ADD CONSTRAINT `tbitenspacote_ibfk_1` FOREIGN KEY (`codPacote`) REFERENCES `tbpacote` (`codPacote`),
  ADD CONSTRAINT `tbitenspacote_ibfk_2` FOREIGN KEY (`codServico`) REFERENCES `tbservico` (`codServico`);

--
-- Limitadores para a tabela `tbparcela`
--
ALTER TABLE `tbparcela`
  ADD CONSTRAINT `tbparcela_ibfk_1` FOREIGN KEY (`codFormaPagamento`) REFERENCES `tbformapagamento` (`codFormaPagamento`),
  ADD CONSTRAINT `tbparcela_ibfk_2` FOREIGN KEY (`codConta`) REFERENCES `tbconta` (`codConta`);

--
-- Limitadores para a tabela `tbsaidacaixa`
--
ALTER TABLE `tbsaidacaixa`
  ADD CONSTRAINT `tbsaidacaixa_ibfk_1` FOREIGN KEY (`codOrigemSaidaCaixa`) REFERENCES `tborigemsaidacaixa` (`codOrigemSaidaCaixa`);

--
-- Limitadores para a tabela `tbsaidaproduto`
--
ALTER TABLE `tbsaidaproduto`
  ADD CONSTRAINT `tbsaidaproduto_ibfk_1` FOREIGN KEY (`codOrigemSaidaProduto`) REFERENCES `tborigemsaidaproduto` (`codOrigemSaidaProduto`),
  ADD CONSTRAINT `tbsaidaproduto_ibfk_2` FOREIGN KEY (`codProduto`) REFERENCES `tbproduto` (`codProduto`);
--
-- Database: `test`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
