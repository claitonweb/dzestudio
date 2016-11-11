<?php
include('classes/Serie.php');
include('classes/Questao.php');
include('classes/Opcao.php');
include('classes/Quiz.php');


$serieA = new Serie();
$serieA->setId('a');
$serieA->setNome('House Of Cards');
$serieA->setNivel(1);
$serieA->setTexto("Você é House of Cards: ataca o problema com método e faz de tudo para resolver a situação");

$serieB = new Serie();
$serieB->setId('b');
$serieB->setNome('Game of Thrones');
$serieB->setNivel(3);
$serieB->setTexto("Você é Game of Thrones: não tem muita delicadeza nas ações, mas resolve o problema de forma prática");

$serieC = new Serie();
$serieC->setId('c');
$serieC->setNome('Lost');
$serieC->setNivel(5);
$serieC->setTexto("Você é Lost: faz as coisas sem ter total certeza se é o caminho certo ou se faz sentido, mas no final dá tudo certo.");

$serieD = new Serie();
$serieD->setId('d');
$serieD->setNome('Breaking Bad');
$serieD->setNivel(7);
$serieD->setTexto("Você é Breaking Bad: pra fazer acontecer você toma a liderança, mas sempre contando com seus parceiros.");

$serieE = new Serie();
$serieE->setId('e');
$serieE->setNome('Silicon Valley');
$serieE->setNivel(9);
$serieE->setTexto("Você é Silicon Valley: vive a tecnologia o tempo todo e faz disso um mantra para cada situação no dia.");



$quiz = new Quiz();
$quiz->setTitulo("Em um dia, que série melhor representa você?");
$quiz->addSerie($serieA);
$quiz->addSerie($serieB);
$quiz->addSerie($serieC);
$quiz->addSerie($serieD);
$quiz->addSerie($serieE);


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


$quiz->addQuestao($questao);

//questão 2
$questao = new Questao();
$questao->setTitulo('Indo para o trabalho você encontra uma senhora idosa caída na rua');

$opcao = new Opcao();
$opcao->setTitulo('Ela vai atrapalhar seu horário. Oculte o corpo.');
$questao->addOpcao($opcao,$serieA);

$opcao = new Opcao();
$opcao->setTitulo('Levanta a senhora e jura protegê&minus;la com sua vida.');
$questao->addOpcao($opcao,$serieB);

$opcao = new Opcao();
$opcao->setTitulo('Ajuda&minus;a, mas questiona sua real identidade.');
$questao->addOpcao($opcao,$serieC);

$opcao = new Opcao();
$opcao->setTitulo('Oferece para caminharem juntos até um destino em comum.');
$questao->addOpcao($opcao,$serieD);

$opcao = new Opcao();
$opcao->setTitulo('Testa se ela roda bem no Firefox. Não roda.');
$questao->addOpcao($opcao,$serieE);

$quiz->addQuestao($questao);



//questão 3
$questao = new Questao();
$questao->setTitulo('Chega no prédio e o elevador está cheio.');

$opcao = new Opcao();
$opcao->setTitulo('Convence parte das pessoas a esperarem o próximo.');
$questao->addOpcao($opcao,$serieA);

$opcao = new Opcao();
$opcao->setTitulo('Ignora as pessoas no elevador e entra de qualquer forma.');
$questao->addOpcao($opcao,$serieB);

$opcao = new Opcao();
$opcao->setTitulo('Você questiona a realidade, as coisas e tudo mais. Sobe de escada.');
$questao->addOpcao($opcao,$serieC);

$opcao = new Opcao();
$opcao->setTitulo('Com uma leve intimidação passivo&minus;agressiva, encontra um lugar no elevador.');
$questao->addOpcao($opcao,$serieD);

$opcao = new Opcao();
$opcao->setTitulo('Cria um app que mostra a lotação do elevador. Vende o app e fica milionário.');
$questao->addOpcao($opcao,$serieE);

$quiz->addQuestao($questao);


//questão 4
$questao = new Questao();
$questao->setTitulo('Você chega no trabalho e as convenções sociais te obrigam a puxar assunto.');

$opcao = new Opcao();
$opcao->setTitulo('Fala sobre a política, eleições, como tudo é um absurdo.');
$questao->addOpcao($opcao,$serieA);

$opcao = new Opcao();
$opcao->setTitulo('Larga uma frase polêmica e vê uma pequena guerra se formar.');
$questao->addOpcao($opcao,$serieB);

$opcao = new Opcao();
$opcao->setTitulo('Puxa um assunto e te lembram que já foi discutido semana passada.');
$questao->addOpcao($opcao,$serieC);

$opcao = new Opcao();
$opcao->setTitulo('Sugere que os colegas trabalhem na ideia de um novo projeto.');
$questao->addOpcao($opcao,$serieD);

$opcao = new Opcao();
$opcao->setTitulo('Desabafa sobre como odeia PHP. Todo mundo na sala adora PHP');
$questao->addOpcao($opcao,$serieE);

$quiz->addQuestao($questao);

//questão 5
$questao = new Questao();
$questao->setTitulo('A pauta pegou o dia todo, mas você está indo para casa.');

$opcao = new Opcao();
$opcao->setTitulo('Vou chamar aqui o meu Uber.');
$questao->addOpcao($opcao,$serieA);

$opcao = new Opcao();
$opcao->setTitulo('Pegarei o bus junto com o resto do povo.');
$questao->addOpcao($opcao,$serieB);

$opcao = new Opcao();
$opcao->setTitulo('No ponto de ônibus mais uma vez, espero não errar a linha de novo.');
$questao->addOpcao($opcao,$serieC);

$opcao = new Opcao();
$opcao->setTitulo('Vou de carro, mas ofereço uma carona para os colegas.');
$questao->addOpcao($opcao,$serieD);

$opcao = new Opcao();
$opcao->setTitulo('Acho que descobri uma forma de fazer aquela senhora rodar no Firefox.');
$questao->addOpcao($opcao,$serieE);

$quiz->addQuestao($questao);
