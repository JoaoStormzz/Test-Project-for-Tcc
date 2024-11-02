<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="icon" type="image/x-icon" href="images/LogoQuestionPlex.png">
    <title>Sobre o QuestionPlex</title>
</head>
<body>
<header>
        <div class="container" id="myHeader">
            <div class="logo-title">
                <a href="index.php"><img src="images/LogoQuestionPlex.png" height="100px" width="100px"></a>
                <h1>QuestionPlex</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Início</a></li>
                    <li><a href="sobre.php">Sobre</a></li>
                    <li><a href="criarQuestao.php">Criar Questão</a></li>
                    <li><a href="login.php">Cadastrar-se</a></li>
                    <li><button id="toggleTheme">Trocar Tema</button></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="main-content">
        <h1><li>Introdução</li></h1>
        <p>
            Os quizzes são uma ótima forma de fazer perguntas sobre diversos conteúdos, semelhante a ele temos os questionários, e um grande exemplo de questionário que temos no Brasil é o ENEM (Exame Nacional do Ensino Médio). Nesse caso, os quizzes são bons para reforçar estudos,  familiarizar o formato do teste, praticar questões, ter um feedback imediato sobre, e etc.
	        Algumas das ferramentas de quiz mais famosas e utilizadas são Kahoot, Quizur, Quizzis e BuzzFeed, todas essas possuem o mesmo objetivo, criar uma lista de perguntas com opções certas e erradas sobre conteúdos gerais ou quizzes de personalidade onde você opina em que opção melhor se encaixa com seu gosto. 
            Os quizzes hoje em dia são poucas vezes utilizados em sala de aula por questões de, às vezes, falta de ferramentas gratuitas de alta qualidade, tendo limitações e dificuldade de uso, precisando que você pague para usufruir completamente a ferramenta, e nem todos alunos e professores podem ter acesso por questões financeiras. 
            Pensando nisso, o QuestionPlex seria uma plataforma online onde professores poderiam criar questões com assuntos personalizados de seu interesse e os estudantes poderão responder as questões e com base nas respostas será gerada uma classificação.
        </p>
        <h1><li>Objetivos</li></h1>
        <p>
            O objetivo geral deste trabalho é fazer uma plataforma on-line em que, professores, possam cadastrar questões sobre assuntos personalizados de sua área de atuação para seus alunos, como forma de estudo. As questões estariam separadas por tags de conteúdo escolhidas pelo criador. Os estudantes poderão responder as questões e serão ranqueados baseados em sua pontuação.
            Para atingir o objetivo geral deste trabalho, os seguintes objetivos específicos foram definidos: 
            Pesquisar trabalhos relacionados ao desenvolvimento de quizzes;
            Estudar as técnicas e linguagens de programação buscando identificar as mais adequadas para o desenvolvimento do projeto;
            Projetar a interface gráfica onde alunos e professores realizarão a interação;
            Desenvolver a aplicação;
            Elaborar e cadastrar as questões de conteúdos diversos.
            Testar com estudantes;
        </p>
        <h1><li>Justificativa</li></h1>
        <p>
            Esse projeto foi pensado para que os estudantes possuam uma nova forma de estudo que pode ser utilizada, inclusive, como instrumento avaliativo pelos professores. Os estudantes poderão responder perguntas de maneira on-line e dinâmica, e os professores acompanhar o progresso nas mais diversas áreas de conhecimento.
            As plataformas de quizzes no geral apresentam alguns problemas aparentes como forma de avaliação, por serem plataformas mais focadas para o entretenimento. O kahoot, por exemplo, possui recursos pagos para utilizar o site em seu todo, limitando o número de quizzes que você pode fazer, imagens que podem ser adicionadas, etc. Outra questão sobre o site, só é possível realizar os quizzes na hora que o criador dele falar que irá começar, ou seja, caso seja realizado como uma atividade para estudos, não teria como o aluno revisar o quiz no site.
            O que pretendemos fazer, é criar uma plataforma de questões que possam ser feitas de forma presencial e online, em que possa ser usada tanto como uma avaliação, quanto uma atividade para estudos. Ajudando e dando mais opções de estudo para os alunos e avaliação para os professores, podendo trazer resultados positivos na experiência de estudos.
        </p>
        <h1><li>Revisão Teórica</li></h1>
        <p>
            <b><a href="https://docs.google.com/document/d/19TTjM_w64La2SfERuvxhio14u1eZ-fkY/edit">Imagens da revisão teórica</a></b>
        </p>
        <h1><li>Metodologia</li></h1>
        <p>
            Este trabalho será iniciado por uma pesquisa, feita no dia 24/07 pelo google scholar, com as palavras “website”, “quiz” e “ensino” sobre trabalhos relacionados ao desenvolvimento de quizzes, observando quais linguagens de programação utilizaram, como eles chegaram a tais resultados, e entre outros.
            Paralelamente, estudaremos as técnicas e linguagens de programação buscando identificar as mais adequadas para o desenvolvimento do projeto, dentre elas, encontramos as linguagens de marcação HTML5 (HyperText Markup Language) e CSS, de programação PHP e JavaScript (JS), e as técnicas de encapsulamento, herança e polimorfismo.
            Utilizando as linguagens de marcação citadas acima, será possível projetar a interface gráfica baseada na facilidade e praticidade de interação entre alunos e professores, onde enviarão, responderão ou gerenciarão as perguntas, de acordo com o usuário, e também visualizarão seus perfis e ranques.
            Além da parte frontend citada acima, desenvolvemos a aplicação a partir da linguagem PHP e SQL para o backend, garantindo que todos os botões, barras de pesquisas, banco de dados, tudo esteja em pleno funcionamento ao término do site, utilizaremos o VSCode e o MySQL para realizar tal objetivo.
            Após o desenvolvimento, será necessário elaborar e cadastrar questões de conteúdos diversos, consultando professores para que seja possível finalizar e observar como a parte gráfica do gerenciamento de questões estará. Por fim, o site será testado com estudantes, percebendo qual nível de dificuldade para entrar e utilizar o site, também pedindo o feedback sobre a interface gráfica, questões e se eles utilizam a plataforma como uma nova forma de estudos.
        </p>
    </div>
    <script src="scripts/script.js"></script>
</body>
</html>
