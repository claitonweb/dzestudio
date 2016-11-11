<?php
class Serie {

	public $nome;
	public $nivel;
	public $texto;
	public $id;

	public function __construct(){

	}
	public function getNome() {
		return $this->nome;
	}
	public function setNome($nome) {
		$this->nome = $nome;
		return $this;
	}
	public function getNivel() {
		return $this->nivel;
	}
	public function setNivel($nivel) {
		$this->nivel = $nivel;
		return $this;
	}
	public function getTexto() {
		return $this->texto;
	}
	public function setTexto($texto) {
		$this->texto = $texto;
		return $this;
	}
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}

}