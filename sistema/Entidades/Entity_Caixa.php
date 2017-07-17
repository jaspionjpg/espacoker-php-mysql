<?php
class Entity_Caixa{
    function __construct(){
    }
	public function apresentarvalorcaixa(){
        include_once '/Utils/ConectaBanco.php';
        $label="";
        $data = date('Y-m-d');
        $query = mysql_query("SELECT valorfinaCaixa FROM tbcaixa where dataCaixa='{$data}'")or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $i = 0;
        if($query != ""){
        while($row = mysql_fetch_assoc($query)){
         if($i == 0){
          $label= $label.'R$ '.$row['valorfinaCaixa'];
         }
         $i++;

            }
        return $label;

        }
        }
        
        public function apresentarvalorcaixabusca(){
        include_once '../Utils/ConectaBanco.php';
        $label="";
        $data = date('Y-m-d');
        $query = mysql_query("SELECT valorfinaCaixa FROM tbcaixa where dataCaixa='{$data}'")or die( '<p class="bg-danger">'.mysql_error().'</p>' );
        $i = 0;
        if($query != ""){
        while($row = mysql_fetch_assoc($query)){
         if($i == 0){
          $label= $row['valorfinaCaixa'];
         }
         $i++;

            }
        return $label;

        }
        }
    }

?>


<!--begin
declare
@valor decimal(10,2),
@data datetime

SELECT @data = dataSaidaCaixa, @valor = valorSaidaCaixa from INSERTED

UPDATE tbcaixa set valorfinaCaixa = valorfinaCaixa + @valor
where dataCaixa = @data

end

go -->
