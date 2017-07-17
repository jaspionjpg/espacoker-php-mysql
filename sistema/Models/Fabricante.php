<?php
class Fabricante{

	private $codFabricante;
	private $descFabricante;

	function __construct(){}

	public function getCodFabricante(){
		return $this->codFabricante;
	}

	public function getDescFabricante(){
		return $this->descFabricante;
	}

	public function setCodFabricante($codFabricante){
		$this->codFabricante=$codFabricante;
	}

	public function setDescFabricante($descFabricante){
		$this->descFabricante=$descFabricante;
	}
}
?>
