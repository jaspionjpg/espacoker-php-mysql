<?php

include_once '../Entidades/Entity_Comanda.php';
include_once '../Entidades/Entity_ItensComanda.php';
include_once '../Entidades/Entity_Conta.php';
$coma = new Entity_Comanda();
$itco = new Entity_ItensComanda();
$cont = new Entity_Conta();

$coma->InsertVenda(0);
$coma->InsertServico(0);

$codComdServ = $coma->getCodServico();
$codComdVend = $coma->getCodVenda();

if(!empty($_POST['servicos1'])){
	$quantidade = 1;
	if(!empty($_POST['valorqs1'])){
		$quantidade = $_POST['valorqs1'];
	}

	$itco->InsertServico($codComdServ, $_POST['servicos1'], $quantidade, $_POST['valords1']);
}
if(!empty($_POST['servicos2'])){
		$quantidade = 1;
	if(!empty($_POST['valorqs2'])){
		$quantidade = $_POST['valorqs2'];
	}

	$itco->InsertServico($codComdServ, $_POST['servicos2'], $quantidade, $_POST['valords2']);
}
if(!empty($_POST['servicos3'])){
	$quantidade = 1;
	if(!empty($_POST['valorqs3'])){
		$quantidade = $_POST['valorqs3'];
	}

	$itco->InsertServico($codComdServ, $_POST['servicos3'], $quantidade, $_POST['valords3']);
}
if(!empty($_POST['servicos4'])){
	$quantidade = 1;
	if(!empty($_POST['valorqs4'])){
		$quantidade = $_POST['valorqs4'];
	}

	$itco->InsertServico($codComdServ, $_POST['servicos4'], $quantidade, $_POST['valords4']);
}
if(!empty($_POST['servicos5'])){
	$quantidade = 1;
	if(!empty($_POST['valorqs5'])){
		$quantidade = $_POST['valorqs5'];
	}

	$itco->InsertServico($codComdServ, $_POST['servicos5'], $quantidade, $_POST['valords5']);
}
if(!empty($_POST['servicos6'])){
	$quantidade = 1;
	if(!empty($_POST['valorqs6'])){
		$quantidade = $_POST['valorqs6'];
	}

	$itco->InsertServico($codComdServ, $_POST['servicos6'], $quantidade, $_POST['valords6']);
}
if(!empty($_POST['servicos7'])){
	$quantidade = 1;
	if(!empty($_POST['valorqs7'])){
		$quantidade = $_POST['valorqs7'];
	}

	$itco->InsertServico($codComdServ, $_POST['servicos7'], $quantidade, $_POST['valords7']);
}

if(!empty($_POST['produtos1'])){
	$quantidade = 1;
	if(!empty($_POST['valorqp1'])){
		$quantidade = $_POST['valorqp1'];
	}

	$itco->InsertProduto($codComdVend, $_POST['produtos1'], $quantidade, $_POST['valordp1']);
}
if(!empty($_POST['produtos2'])){
		$quantidade = 1;
	if(!empty($_POST['valorqp2'])){
		$quantidade = $_POST['valorqp2'];
	}

	$itco->InsertProduto($codComdVend, $_POST['produtos2'], $quantidade, $_POST['valordp2']);
}
if(!empty($_POST['produtos3'])){
	$quantidade = 1;
	if(!empty($_POST['valorqp3'])){
		$quantidade = $_POST['valorqp3'];
	}

	$itco->InsertProduto($codComdVend, $_POST['produtos3'], $quantidade, $_POST['valordp3']);
}
if(!empty($_POST['produtos4'])){
	$quantidade = 1;
	if(!empty($_POST['valorqp4'])){
		$quantidade = $_POST['valorqp4'];
	}

	$itco->InsertProduto($codComdVend, $_POST['produtos4'], $quantidade, $_POST['valordp4']);
}
if(!empty($_POST['produtos5'])){
	$quantidade = 1;
	if(!empty($_POST['valorqp5'])){
		$quantidade = $_POST['valorqp5'];
	}

	$itco->InsertProduto($codComdVend, $_POST['produtos5'], $quantidade, $_POST['valordp5']);
}
if(!empty($_POST['produtos6'])){
	$quantidade = 1;
	if(!empty($_POST['valorqp6'])){
		$quantidade = $_POST['valorqp6'];
	}

	$itco->InsertProduto($codComdVend, $_POST['produtos6'], $quantidade, $_POST['valordp6']);
}
if(!empty($_POST['produtos7'])){
	$quantidade = 1;
	if(!empty($_POST['valorqp7'])){
		$quantidade = $_POST['valorqp7'];
	}

	$itco->InsertProduto($codComdVend, $_POST['produtos7'], $quantidade, $_POST['valordp7']);
}

$valorComanda = $coma->getTotalComanda($codComdServ,$codComdVend);
$valorDescontoComanda = $coma->getTotalDescontoComanda($codComdServ,$codComdVend);

$cont->InsertConta($valorComanda,$valorDescontoComanda, $_POST['usuario'], 0, 83, $codComdServ, $codComdVend);


echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaPagamento.php?i=sucess&idConta=".$cont->getUltimaConta()."'; </script>";

?> 
