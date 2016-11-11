<?php
class Quiz {

	public $series = array();
	public $questoes = array();
	public $arrayQuiz = array();
	public $respostas = array();
	public $titulo    = array();
	public $seriequem = '';

	public function __construct(){

	}
	
	public function getSerie($id){
		return $this->series[$id];
	}
	
	public function getSeriequem() {
		return $this->seriequem;
	}
	public function setSeriequem($seriequem) {
		$this->seriequem = $seriequem;
		return $this;
	}
	
	
	public function getQuestoes() {
		return $this->questoes;
	}
	public function getRespostas() {
		return $this->respostas;
	}
	public function setRespostas($respostas) {
		$this->respostas = $respostas;
		return $this;
	}
	public function addQuestao(Questao $questao) {
		$this->questoes[] = $questao;
		return $this;
	}
	public function getArrayQuiz() {
		return $this->arrayQuiz;
	}
	public function setArrayQuiz($arrayQuiz) {
		$this->arrayQuiz = $arrayQuiz;
		return $this;
	}
	public function addSerie(Serie $serie){

		$id = $serie->getId();

		if(!isset($this->series[$id])){
			$this->series[$id] = '';
		}

		$this->series[$id] = array(
				'nome' => $serie->getNome(),
				'nivel' => $serie->getNivel(),
				'texto' => $serie->getTexto()
		);
		return $this;
	}
	public function getTitulo() {
		return $this->titulo;
	}
	public function setTitulo($titulo) {
		$this->titulo = $titulo;
		return $this;
	}
	

	public function montaArray(){


		$arrayQuiz = array();
		foreach ($this->getQuestoes() as $chave => $questao){
				
			$arrayQuiz[$chave] = array(
					'titulo' => $questao->getTitulo(),
					'opcoes' => $questao->getOpcoes()
			);
				
		}
		$this->setArrayQuiz($arrayQuiz);

		return $this;


	}
	
	
	public function inicia(){
		$questoes = $this->montaArray()->getArrayQuiz();
		$alphabet = range('a', 'e');
		
		echo "<form method='post' id='frm_quiz'>";
		foreach ($questoes as $idpergunta => $pergunta){
			$display = '';
			if($idpergunta!='0'){
				$display = "style='display:none'";
			}
			$nrpergunta = $idpergunta+1;
			$titulopergunta = $pergunta['titulo'];
			
			$opcoes = $pergunta['opcoes'];
			shuffle($opcoes);
			
			$resposta = '';
			$respostas = $this->getRespostas();
			if(isset($respostas) && count($respostas) > 0){
				$resposta = $respostas['pergunta_'.$idpergunta];
			}
			
			echo "<div class='panel panel-default' id='$idpergunta' $display>
					<div class='panel-heading'>
						$nrpergunta . $titulopergunta
					</div>
					<div class='form-group'>
					<ul class='list-group'>";
						
					foreach ($opcoes as $idresposta => $opcao){
						$idserie = $opcao['serie'];
						$checked = '';
						if($resposta == $idserie){
							$checked = "checked";
						}
						$tituloOpcao = $opcao['titulo'];
						$letra = $alphabet[$idresposta];
						$nomecampo = "respostas[pergunta_$idpergunta]";
						
						echo "<li class='list-group-item'>
								<div class='checkbox'>
									<label>
										$letra . &nbsp;&nbsp;
										<input type='radio' name='$nomecampo' value='$idserie' $checked>
										$tituloOpcao
									</label>
							  	 </div>
							  </li>";
					}
			echo "</ul>
				</div>";
			$proxima = $idpergunta+1;		
			if($idpergunta<4){
				$botao = "<div class='btn-group' role='group'>
			    			<a href='#' class='btn btn-success pull-right proxima' title='$proxima'>Próxima</a>
			  			  </div>";	
			}else{
				$botao = "<div class='btn-group' role='group'>
						    <input type='submit' class='btn btn-primary proxima' title='5' value='Enviar'>
						  </div>
						  <div class='btn-group' role='group'>
						    <a href='/dzestudio/' class='btn btn-danger'>Limpar</a>
						  </div>";
			}
			  echo "<div class='panel-footer'>
			  			<div class='btn-group btn-group-justified' role='group'>
			  				$botao
			  			</div>
			  		</div>
				  </div>";
		}
		echo "<div class='alert alert-danger' style='display:none'><p class='text-center'>Selecione uma opção</p></div></form>";
	}
	
	public function calculaResultado (){
		$soma = array();
		
		foreach ($this->getRespostas() as $pergunta => $valor){
			$serie = $this->getSerie($valor);
			$nivel = $serie['nivel'];
			
			if(!isset($soma[$nivel])){
				$soma[$nivel] = array();
				$soma[$nivel] = array('serie' => $valor,'pontos'=>0);
					
			}
			$soma[$nivel]['pontos']++;
		}
		
		$maior = 0;
		$quem = '';
		$seriequem = '';
		foreach ($soma as $nivel => $resultado){
			$serie = $this->getSerie($resultado['serie']);
			
			if($resultado['pontos'] >= $maior){
				if($resultado['pontos'] == $maior){
					if($serie['nivel'] > $seriequem['nivel']){
						$maior = $resultado['pontos'];
						$quem = $resultado['serie'];
					}
				}else{
					$maior = $resultado['pontos'];
					$quem = $resultado['serie'];
				}
			}
			$seriequem = $this->getSerie($quem);
		}
		
		$this->setSeriequem($seriequem);
	}
	
	public function exibeResultado(){
		$seriequem = $this->getSeriequem();
		echo "<div class='jumbotron'>
				<p>{$seriequem['texto']}</p>
				<p><a class='btn btn-primary btn-lg' href='/dzestudio/' role='button'>Refazer</a></p>
			</div>";
		
	}
}