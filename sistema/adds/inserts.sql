SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


INSERT INTO `tbagendamento` (`codAgendamento`, `dataAgendamento`, `horarioAgendamento`, `codUsuario`, `codServico`) VALUES
(2, '2000-03-12', '12:34:00', 1, 1),
(7, '2000-02-12', '12:34:00', 1, 1);

INSERT INTO `tbservico` (`codServico`, `nomeServico`, `descServico`, `duracaoServico`, `valorServico`, `urlImagem`) VALUES
(1, 'corte de cabelo', 'corta', 0, 12, '1234');

INSERT INTO `tbusuario` (`codUsuario`, `nomeUsuario`, `dataNascimentoUsuario`, `emailUsuario`, `sexoUsuario`, `login`, `senha`, `salarioFuncionario`, `cpfFuncionario`, `tipoUsuario`) VALUES
(1, 'richard', '2000-03-12', 'richard@asdf', '', 'richard', '615f2a1a9855363e15db4de6ba95d185', '0', '', 'admim'),
(2, 'qwer', '4234-03-12', 'qwer@aqwer', '', 'qwer', '962012d09b8170d912f0669f6d7d9d07', '0', '', 'comum');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
