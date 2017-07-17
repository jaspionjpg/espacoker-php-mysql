<?php

Class colecao{
    protected $objetos;
     //cria uma variavel protegida
    protected $numeObjeto;
    //cria uma variavel protegida

    public Function __Construct(){

        $this->numeObjeto=0;
        //reinicia a variavel da classe
        $this->objetos=array();
        //faz um array de objeto
    }
    public Function Adiciona($obj){
        //cria uma função publica
        $this->objetos[]= $obj;
        //a variavel da classe recebe a variavel da função
       
        $this->numeObjeto ++;
         //incrementa a variavel da classe
}   
    public Function Tamanho  (){
        //cria uma função publica
        
        return $this->numeObjeto;
        //retorna a variavel da classe
        
        
    }
    
    public Function get($valor){
        //cria uma função publica
        return $this->objetos[$valor];
        //retorna a variavel da classe com a variavel da função
        
        
     }
    
    }


?>