<?php
session_start(); // Iniciar a sessão
include 'conexao.php'; // Incluindo a conexão com o banco de dados

$error_message = ''; // Variável para armazenar mensagens de erro

// Verifica se o usuário está logado
if (!isset($_SESSION['username'])) {
    // Armazenar a mensagem do alerta
    echo "<!DOCTYPE html>
    <html lang='pt-BR'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' type='text/css' href='styles/style-question.css'>
        <link rel='icon' type='image/x-icon' href='images/LogoQuestionPlex.png'>
        <title>Acesso Negado</title>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    </head>
    <body>
        <script>
            Swal.fire({
                title: 'Acesso negado',
                text: 'Você precisa estar logado para criar uma questão.',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'index.php'; // Redireciona para a página 
                }
            });
        </script>
        <style>
            body {
                background-color: #f5f5f5; /* Cor de fundo */
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                font-family: Arial, sans-serif;
            }
        </style>
    </body>
    </html>";
    exit(); // Impede a execução do restante do código
}

// Processa o envio do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $opcao1 = $_POST['opcao1'];
    $opcao2 = $_POST['opcao2'];
    $opcao3 = $_POST['opcao3'];
    $opcao4 = $_POST['opcao4'];
    $alternativa_correta = $_POST['opcao'];

    // Preparar e vincular
    $stmt = $con->prepare("INSERT INTO questions (titulo, descricao, opcao1, opcao2, opcao3, opcao4, alternativa_correta) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssi", $titulo, $descricao, $opcao1, $opcao2, $opcao3, $opcao4, $alternativa_correta);

    if ($stmt->execute()) {
        // Redirecionar ou mostrar uma mensagem de sucesso, se desejado
        $_SESSION['mensagem'] = 'Questão cadastrada com sucesso!';
        header('Location: index.php'); // Redireciona para a página inicial ou outra página desejada
        exit();
    } else {
        $error_message = "Erro ao cadastrar questão: " . $stmt->error;
    }

    $stmt->close();
}

$con->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style-question.css">
    <link rel="icon" type="image/x-icon" href="images/LogoQuestionPlex.png">
    <title>Cadastrar Questão</title>
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
                    <?php if (!isset($_SESSION['username'])): ?>
                        <li><a href="login.php">Login</a></li>
                    <?php else: ?>
                        <li><a href="logout.php">Logout</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>

    <div class="main-content">
        <h1>Criador de Questões</h1>
        <?php if ($error_message): ?>
            <p style="color:red;"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form class="form-criar-questao" method="POST" action="criarQuestao.php">
            <div class="input-criar-questao">
                <label for="titulo">Título</label>
                <input type="text" id="titulo" name="titulo" required>
            </div>
            <div class="input-criar-questao">
                <label for="descricao">Informe a questão completa</label>
                <textarea id="descricao" name="descricao" rows="3" placeholder="João tem 3 maçãs..." required></textarea>
            </div>
            <div class="input-criar-questao">
                <label for="opcao">Selecione a alternativa correta:</label><br>
                <input type="radio" id="opcao1" name="opcao" value="1" required>
                <label for="opcao1">Alternativa 1</label><br>
                <input type="text" id="opcao1_text" name="opcao1" required placeholder="Digite a alternativa 1"><br>

                <input type="radio" id="opcao2" name="opcao" value="2">
                <label for="opcao2">Alternativa 2</label><br>
                <input type="text" id="opcao2_text" name="opcao2" required placeholder="Digite a alternativa 2"><br>

                <input type="radio" id="opcao3" name="opcao" value="3">
                <label for="opcao3">Alternativa 3</label><br>
                <input type="text" id="opcao3_text" name="opcao3" required placeholder="Digite a alternativa 3"><br>

                <input type="radio" id="opcao4" name="opcao" value="4">
                <label for="opcao4">Alternativa 4</label><br>
                <input type="text" id="opcao4_text" name="opcao4" required placeholder="Digite a alternativa 4"><br>
            </div>
            <div class="input-criar-questao">
                <button type="submit" id="cadastrarQuestao" name="cadastrarQuestao" style="background: green; color: white;">Cadastrar questão</button>
            </div>
        </form>
    </div>

    <script src="scripts/script.js"></script>
</body>
</html>
