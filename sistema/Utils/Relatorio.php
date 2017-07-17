<?php
$tipoRelatorio = $_POST['tipoRelatorio'];
if($tipoRelatorio === 'Funcionarios'){
  echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/relatorio/relFuncionario.php?de=".$_POST['de']."&ate=".$_POST['ate']."'; </script>";
} else if($tipoRelatorio === 'Usuarios'){
  echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/relatorio/relUsuarios.php?de=".$_POST['de']."&ate=".$_POST['ate']."'; </script>";
} else if($tipoRelatorio === 'Pacote'){
  echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/relatorio/relPacote.php?de=".$_POST['de']."&ate=".$_POST['ate']."'; </script>";
} else if($tipoRelatorio === 'Produto'){
  echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/relatorio/relProduto.php?de=".$_POST['de']."&ate=".$_POST['ate']."'; </script>";
} else if($tipoRelatorio === 'Serviço'){
  echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/relatorio/relServico.php?de=".$_POST['de']."&ate=".$_POST['ate']."'; </script>";
}

?>
