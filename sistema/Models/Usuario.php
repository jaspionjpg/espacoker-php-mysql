<?php
Class Usuario{

	private $codUsuario;
	private $nomeUsuario;
	private $dataNascimentoUsuario;
	private $emailUsuario;
	private $sexoUsuario;
	private $login;
	private $senha;
	private $tipoUsuario;
	private $salarioFuncionario;
	private $cpfUsuario;

	function __construct(){}

	public function getCodUsuario(){
		return $this->codUsuario;
	}

	public function getNomeUsuario(){
		return $this->nomeUsuario;
	}

	public function getDataNascimentoUsuario(){
		return $this->dataNascimentoUsuario;
	}

	public function getSexoUsuario(){
		return $this->sexoUsuario;
	}

	public function getEmailUsuario(){
		return $this->emailUsuario;
	}

	public function getLogin(){
		return $this->login;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function getTipoUsuario(){
		return $this->tipoUsuario;
	}

	public function getSalarioFuncionario(){
		return $this->salarioFuncionario;
	}

	public function getCpfUsuario(){
		return $this->cpfUsuario;
	}

	public function setCodUsuario($codUsuario){
		$this->codUsuario=$codUsuario;
	}

	public function setNomeUsuario($nomeUsuario){
		$this->nomeUsuario=$nomeUsuario;
	}

	public function setDataNascimentoUsuario($dataNascimentoUsuario){
		$this->dataNascimentoUsuario=$dataNascimentoUsuario;
	}

	public function setEmailUsuario($emailUsuario){
		$this->emailUsuario=$emailUsuario;
	}

	public function setSexoUsuario($sexoUsuario){
		$this->sexoUsuario=$sexoUsuario;
	}

	public function setLogin($login){
		$this->login=$login;
	}

	public function setSenha($senha){
		$this->senha=md5($senha);
	}

	public function setTipoUsuario($tipoUsuario){
		$this->tipoUsuario=$tipoUsuario;
	}

	public function setSalarioFuncionario($salarioFuncionario){
		$this->salarioFuncionario=$salarioFuncionario;
	}

	public function setCpfUsuario($cpfUsuario){
		$this->cpfUsuario=$cpfUsuario;
	}
}
