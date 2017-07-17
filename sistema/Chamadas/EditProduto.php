<?php

include_once "../Models/Produto.php";
include_once "../Entidades/Entity_Produto.php";

$prod = new Produto();
$prod_ent = new Entity_Produto();

$prod->setCodProduto($_GET['id']);
$prod->setDescProduto($_POST['nome']);
$prod->setQuantidadeProduto($_POST['quantidade']);
$prod->setValorUnidadeCompra($_POST['valorcompra']);
$prod->setValorUnidadeVenda($_POST['valorvenda']);
$prod->setCodFabricante($_POST['codFabricante']);

$prod_ent->EditProduto($prod);
echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaProdutos.php?i=ed'; </script>";


?>
