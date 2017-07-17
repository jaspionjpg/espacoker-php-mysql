-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06-Ago-2016 às 20:33
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bdespacoker`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

CREATE TABLE IF NOT EXISTS `tbusuario` (
  `codUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nomeUsuario` varchar(100) NOT NULL,
  `dataNascimentoUsuario` date NOT NULL,
  `emailUsuario` varchar(50) NOT NULL,
  `sexoUsuario` varchar(10) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `salarioFuncionario` decimal(10,0) NOT NULL,
  `cpfFuncionario` varchar(15) NOT NULL,
  `tipoUsuario` varchar(15) NOT NULL,  
  PRIMARY KEY (`codUsuario`),
  UNIQUE KEY `login` (`login`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Estrutura da tabela `tborigementradacaixa`
--

CREATE TABLE IF NOT EXISTS `tborigementradacaixa` (
  `codOrigemEntradaCaixa` int(11) NOT NULL AUTO_INCREMENT,
  `descOrigemEntradaCaixa` varchar(255) NOT NULL,
  PRIMARY KEY (`codOrigemEntradaCaixa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `InicioValidadePacote` date NOT NULL,
  `FinalValidadePacote` date NOT NULL,
  PRIMARY KEY (`codPacote`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`codProduto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `nomeServico` varchar(50) not null,
  `descServico` varchar(300) NOT NULL,
  `duracaoServico` TIME NOT NULL,
  `valorServico` double not null,
  `codImagem` int(11) not null,
  PRIMARY KEY (`codServico`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  ADD CONSTRAINT `tbconta_ibfk_5` FOREIGN KEY (`codComandaVenda`) REFERENCES `tbcomandavenda` (`codComandaVenda`),
  ADD CONSTRAINT `tbconta_ibfk_1` FOREIGN KEY (`codUsuario`) REFERENCES `tbusuario` (`codUsuario`),
  ADD CONSTRAINT `tbconta_ibfk_2` FOREIGN KEY (`codStatusUsuario`) REFERENCES `tbstatususuario` (`codStatusUsuario`),
  ADD CONSTRAINT `tbconta_ibfk_3` FOREIGN KEY (`codFuncionario`) REFERENCES `tbusuario` (`codUsuario`),
  ADD CONSTRAINT `tbconta_ibfk_4` FOREIGN KEY (`codComandaServico`) REFERENCES `tbcomandaservico` (`codComandaServico`);

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
-- Limitadores para a tabela `tbtelefoneusuario`
--
ALTER TABLE `tbtelefoneusuario`
  ADD CONSTRAINT `tbtelefoneusuario_ibfk_1` FOREIGN KEY (`codUsuario`) REFERENCES `tbusuario` (`codUsuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
