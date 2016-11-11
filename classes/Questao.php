<?php
class Questao {

	public $titulo;
	public $opcoes;

	public function __construct(){

	}

	public function getTitulo() {
		return $this->titulo;
	}
	public function setTitulo($titulo) {
		$this->titulo = $titulo;
		return $this;
	}
	public function getSerie() {
		return $this->serie;
	}
	public function setSerie(Serie $serie) {
		$this->serie = $serie;
		return $this;
	}

	public function addOpcao(Opcao $opcao,Serie $serie){
		$this->opcoes[] = array(
				'titulo' => $opcao->getTitulo(),
				'serie' => $serie->getId()

		);

	}
	public function getOpcoes(){
		return $this->opcoes;
	}
}