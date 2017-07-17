<?php
class Produto{

	private $codProduto;
	private $descProduto;
	private $quantidadeProduto;
	private $valorUnidadeVenda;
	private $valorUnidadeCompra;
	private $codFabricante;

	function __construct(){}

	public function getCodProduto(){
		return $this->codProduto;
	}

	public function getQuantidadeProduto(){
		return $this->quantidadeProduto;
	}

	public function getDescProduto(){
		return $this->descProduto;
	}

	public function getValorUnidadeVenda(){
		return $this->valorUnidadeVenda;
	}

	public function getValorUnidadeCompra(){
		return $this->valorUnidadeCompra;
	}

	public function getCodFabricante(){
		return $this->codFabricante;
	}

	public function setCodProduto($codProduto){
		$this->codProduto=$codProduto;
	}

	public function setQuantidadeProduto($quantidadeProduto){
		$this->quantidadeProduto=$quantidadeProduto;
	}

	public function setDescProduto($descProduto){
		$this->descProduto=$descProduto;
	}

	public function setValorUnidadeVenda($valorUnidadeVenda){
		$this->valorUnidadeVenda=$valorUnidadeVenda;
	}

	public function setValorUnidadeCompra($valorUnidadeCompra){
		$this->valorUnidadeCompra=$valorUnidadeCompra;
	}

	public function setCodFabricante($codFabricante){
		$this->codFabricante=$codFabricante;
	}
}
?>
