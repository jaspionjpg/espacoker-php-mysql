<?php

error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
define('BD', 'localhost'); // USE O TEU BANCO DE DADOS
define('BD_USER', 'root'); // USE O TEU USUARIO DE BANCO DE DADOS
define('BD_PASS', ''); // USE A TUA SENHA DO BANCO DE DADOS
define('BD_NAME', 'espacoker'); // USE O NOME DO TEU BANCO DE DADOS


//$link = mysqli_connect(BD,BD_USER , BD_PASS, BD_NAME);
//mysqli_select_db($link, BD_NAME);

mysql_connect(BD, BD_USER, BD_PASS);
mysql_select_db(BD_NAME);
?>