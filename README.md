# Quiz - DZ Estúdio

Um quiz que mostra em que série de TV você é, baseado em como você age em algumas situações do dia a dia.
  
----------
# Exemplos
```php
<?php 
include('classes/Serie.php');
include('classes/Questao.php');
include('classes/Opcao.php');
include('classes/Quiz.php');

//inicia uma nova série
$serieA = new Serie();
$serieA->setId('a');
$serieA->setNome('House Of Cards');
$serieA->setNivel(1);
$serieA->setTexto("Você é House of Cards: ataca o problema com método e faz de tudo para resolver a situação");

//inicia o quiz
$quiz = new Quiz();
$quiz->setTitulo("Em um dia, que série melhor representa você?");
$quiz->addSerie($serieA);

//questão 1
$questao = new Questao();
$questao->setTitulo('De manhã, você');

$opcao = new Opcao();
$opcao->setTitulo('Acorda cedo e come frutas cortadas metodicamente.');
$questao->addOpcao($opcao,$serieA);

$opcao = new Opcao();
$opcao->setTitulo('Sai da cama com o despertador e se prepara para a batalha da semana.');
$questao->addOpcao($opcao,$serieB);

$opcao = new Opcao();
$opcao->setTitulo('Só consegue lembrar do seu nome depois do café.');
$questao->addOpcao($opcao,$serieC);

$opcao = new Opcao();
$opcao->setTitulo('Levanta e faz café pra todos da casa.');
$questao->addOpcao($opcao,$serieD);

$opcao = new Opcao();
$opcao->setTitulo('Passa o café e conserta um erro no HTML.');
$questao->addOpcao($opcao,$serieE);

//exibe o formulário
$quiz->inicia();

if(isset($_POST['respostas'])){
    $quiz->setRespostas($_POST['respostas']);
	$quiz->calculaResultado();
	
	//exibe o texto com o resultado
	$quiz->exibeResultado(); 
}

?>
```

### Instalação
QUIZ requer PHP v5+ para rodar e qualquer servidor Web.

Licença
----

MIT