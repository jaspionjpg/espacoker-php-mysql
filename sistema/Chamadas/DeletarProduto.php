<?php

include_once "../Entidades/Entity_Produto.php";

$prod_ent = new Entity_Produto();

$codProduto = $_GET['id'];

$prod_ent->deletaProduto($codProduto);

echo "<script type='text/javascript' language='javascript'> window.location.href='http://localhost/batata/sistema/paginaProdutos.php?i=del'; </script>";
