<?php
class Entity_EntradaDia{
      function __construct(){
    }
    public function Insert(Caixadois $caixa){
        include_once '../Utils/ConectaBanco.php';
        $data = date('Y-m-d');
$sql = mysql_query("INSERT INTO tbcaixa(dataCaixa,valorinicialCaixa,valorfinaCaixa) VALUES ('{$data}','{$caixa->getValorCaixadois()}','{$caixa->getValorCaixadois()}')") or die( mysql_error() );
               mysql_close();
          }
}
?>