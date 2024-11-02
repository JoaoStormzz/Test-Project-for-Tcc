<?php
session_start();
include 'conexao.php';

if (!$con) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Inicializa variáveis
$mensagem = "";
$questao = null;

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Recuperar a questão com base no ID
    $sql = "SELECT * FROM questions WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $questao = $result->fetch_assoc();
    } else {
        $mensagem = "Questão não encontrada.";
    }

    $stmt->close();
} else {
    $mensagem = "ID da questão não especificado.";
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && $questao) {
    $questao_id = intval($_POST['questao_id']);
    $alternativa_selecionada = intval($_POST['alternativa']);

    // Recuperar a questão com base no ID para verificar a resposta
    $sql = "SELECT alternativa_correta FROM questions WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $questao_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $alternativa_correta = intval($row['alternativa_correta']); // Certifique-se de que isso é um inteiro

        // Compara a alternativa selecionada com a alternativa correta
        if ($alternativa_selecionada === $alternativa_correta) {
            $_SESSION['mensagem'] = "Parabéns! Você acertou a questão.";
            $_SESSION['alert_type'] = 'success'; // Para usar no alerta
        } else {
            $_SESSION['mensagem'] = "Que pena! A resposta correta era a alternativa " . $alternativa_correta . ".";
            $_SESSION['alert_type'] = 'error'; // Para usar no alerta
        }
    } else {
        $_SESSION['mensagem'] = "Questão não encontrada.";
        $_SESSION['alert_type'] = 'error'; // Para usar no alerta
    }

    $stmt->close();
    header("Location: index.php"); // Redireciona após processar
    exit();
}

$con->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="icon" type="image/x-icon" href="images/LogoQuestionPlex.png">
    <title><?php echo htmlspecialchars($questao['titulo'] ?? ''); ?></title>
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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
        <?php if ($questao): ?>
            <h2><?php echo htmlspecialchars($questao['titulo']); ?></h2>
            <p><?php echo nl2br(htmlspecialchars($questao['descricao'])); ?></p>

            <form method="post">
                <input type="hidden" name="questao_id" value="<?php echo $questao['id']; ?>">
                <div>
                    <input type="radio" name="alternativa" value="1" required>
                    <?php echo htmlspecialchars($questao['opcao1']); ?>
                </div>
                <div>
                    <input type="radio" name="alternativa" value="2">
                    <?php echo htmlspecialchars($questao['opcao2']); ?>
                </div>
                <div>
                    <input type="radio" name="alternativa" value="3">
                    <?php echo htmlspecialchars($questao['opcao3']); ?>
                </div>
                <div>
                    <input type="radio" name="alternativa" value="4">
                    <?php echo htmlspecialchars($questao['opcao4']); ?>
                </div>
                <button type="submit">Enviar Resposta</button>
            </form>
        <?php else: ?>
            <p>Não há questão disponível.</p>
        <?php endif; ?>
    </div>

    <script src="scripts/script.js"></script>
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php if (isset($_SESSION['mensagem'])): ?>
                Swal.fire({
                    title: "<?php echo $_SESSION['mensagem']; ?>",
                    icon: "<?php echo $_SESSION['alert_type'] === 'success' ? 'success' : 'error'; ?>",
                    confirmButtonText: "OK"
                });
                <?php 
                // Limpa a mensagem após exibição
                unset($_SESSION['mensagem']);
                unset($_SESSION['alert_type']);
                ?>
            <?php endif; ?>
        });
    </script>
</body>

</html>
