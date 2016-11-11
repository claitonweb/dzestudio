<?php
include('config.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>DZESTUDIO - Avaliação Prática</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- JQUERY -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		
		<script src='public/js/index.js' type="text/javascript"></script>
		
			
		
	</head>
	<body>
		<div class='container'>
			<div class="page-header">
			  <h1>Quiz <small><?php echo $quiz->getTitulo()?></small></h1>
			</div>
				<?php
				$alphabet = range('a', 'e');
				if(isset($_POST['respostas'])){
					$quiz->setRespostas($_POST['respostas']);
					$quiz->calculaResultado();
					
					/**
					 * Chamando $quiz->exibeResultado();
					 * a classe ira gerar um HTML padrão com o resultado
					 */
					$seriequem = $quiz->getSeriequem();
					?>
					
					<div class='jumbotron'>
						<p><?php echo $seriequem['texto'] ?></p>
						<p><a class='btn btn-primary btn-lg' href='/dzestudio/' role='button'>Refazer</a></p>
					</div>
				<?php 
				}else{
					
					/**
					 * Chamando $quiz->inicia();
					 * a classe irá gerar uma formatação HTML padrão
					 */
					
					$questoes = $quiz->montaArray()->getArrayQuiz();
				 ?>
					
					<form method='post' id='frm_quiz'>
						<?php foreach ($questoes as $idpergunta => $pergunta){
							shuffle($pergunta['opcoes']);
							?>	
							<div class='panel panel-default' id='<?php echo $idpergunta; ?>'>
								<div class='panel-heading'>
									<?php echo ($idpergunta+1) .' . '. $pergunta['titulo']; ?> :
								</div>
								<div class='form-group'>
									<ul class='list-group'>
									<?php foreach ($pergunta['opcoes'] as $idresposta => $opcao){ ?>
										<li class='list-group-item'>
											<div class='checkbox'>
												<label>
												<?php echo $alphabet[$idresposta]; ?> . &nbsp;&nbsp;
												<input type='radio' name='respostas[pergunta_<?php echo $idpergunta;?>]' value='<?php echo $opcao['serie'] ?>'>
												<?php echo $opcao['titulo']; ?>
												</label>
											</div>
										</li>
									<?php } ?>
									</ul>
								</div>
								<div class='panel-footer'>
									<div class='btn-group btn-group-justified' role='group'>
										<?php if($idpergunta<4){ ?>
											<div class='btn-group' role='group'>
												<a href='#' class='btn btn-success pull-right proxima' title='<?php echo $idpergunta+1 ?>'>Próxima</a>
											</div>
										<?php }else{ ?>
										  <div class='btn-group' role='group'>
										    <input type='submit' class='btn btn-primary proxima' title='5' value='Enviar'>
										  </div>
										  
										<?php } ?>
									</div>
								</div>
							</div>
						<?php } ?>
						<div class='alert alert-danger' style='display:none'><p class='text-center'>Selecione uma opção</p></div>
					</form>
				<?php 
				}
				?>
				 
		</div>
	</body>
</html>
