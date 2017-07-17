<?php
class Origem{

	private $codOrigem;
	private $descOrigem;

	function __construct(){}

	public function getCodOrigem(){
		return $this->codOrigem;
	}

	public function getDescOrigem(){
		return $this->descOrigem;
	}

	public function setCodOrigem($codOrigem){
		$this->codOrigem=$codOrigem;
	}

	public function setDescOrigem($descOrigem){
		$this->descOrigem=$descOrigem;
	}
}
?>
