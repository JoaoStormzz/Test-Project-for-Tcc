<?php
session_start(); // Iniciar a sessão
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/style-index.css">
    <link rel="icon" type="image/x-icon" href="images/LogoQuestionPlex.png">
    <title>Seja bem-vindo ao QuestionPlex</title>
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
                    <li>
                        <?php if (!isset($_SESSION['username'])): ?>
                            <a href="#" onclick="alertaLoginCriarQuestao(event)">Criar Questão</a>
                        <?php else: ?>
                            <a href="criarQuestao.php">Criar Questão</a>
                        <?php endif; ?>
                    </li>
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
        <?php
        // Verifica se há uma mensagem na sessão
        $mensagem = isset($_SESSION['mensagem']) ? $_SESSION['mensagem'] : '';
        $alert_type = isset($_SESSION['alert_type']) ? $_SESSION['alert_type'] : 'success'; // Tipo padrão

        unset($_SESSION['mensagem']); // Remove a mensagem da sessão após exibi-la
        unset($_SESSION['alert_type']); // Remove o tipo de alerta da sessão após exibi-lo

        // Exibir a mensagem se existir
        if (!empty($mensagem)) {
            echo '<script>
                window.onload = function() {
                    Swal.fire({
                        title: `' . addslashes($mensagem) . '`,

                        icon: "' . $alert_type . '", // Use o tipo de alerta definido
                        confirmButtonText: "OK"
                    });
                };
            </script>';
        }
        ?>

        <h2>Questões Disponíveis</h2>
        <?php
        include 'conexao.php'; // Conectar ao banco de dados

        // Recuperar as questões da tabela
        $sql = "SELECT id, titulo FROM questions";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            // Exibir cada questão com um link que verifica o login
            while ($row = $result->fetch_assoc()) {
                $titulo = htmlspecialchars($row['titulo']);
                $id = $row['id'];

                // Verifica se o usuário está logado e define o link da questão
                if (isset($_SESSION['username'])) {
                    echo "<p><a href='resolver-Questao.php?id=$id'>$titulo</a></p>";
                } else {
                    echo "<p><a href='#' onclick='alertaLogin(event)'>$titulo</a></p>";
                }
            }
        } else {
            echo "<p>Não há questões cadastradas.</p>";
        }

        $con->close(); // Fechar a conexão
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        function alertaLogin(event) {
            event.preventDefault(); // Impede o redirecionamento padrão
            Swal.fire({
                title: "Acesso negado",
                text: "Você precisa estar logado para resolver a questão.",
                icon: "warning",
                confirmButtonText: "OK"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "index.php"; // Redireciona para a página de login
                }
            });
        }

        function alertaLoginCriarQuestao(event) {
            event.preventDefault(); // Impede o redirecionamento padrão
            Swal.fire({
                title: "Acesso negado",
                text: "Você precisa estar logado para criar uma questão.",
                icon: "warning",
                confirmButtonText: "OK"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "index.php"; // Redireciona para a página de login
                }
            });
        }
    </script>
    <script src="scripts/script.js"></script>
</body>

</html>