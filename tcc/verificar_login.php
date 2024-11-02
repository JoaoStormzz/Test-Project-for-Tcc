<?php
session_start();
include 'conexao.php'; // Conexão com o banco de dados

// Inicializa variáveis para mensagens
$status_message = '';
$error_message = '';

// Verifica se o usuário já está logado
if (isset($_SESSION['username'])) {
    $status_message = "Você está logado como " . htmlspecialchars($_SESSION['username']) . ".";
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $con->real_escape_string($_POST['username']);
        $password = $_POST['password'];

        // Busca o usuário pelo username
        $sql = "SELECT * FROM usuarios WHERE username = '$username'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verifica se a senha hashada corresponde à senha inserida
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $username;
                $status_message = "Você está logado como " . htmlspecialchars($username) . ".";
            } else {
                $error_message = "Usuário ou senha incorretos.";
            }
        } else {
            $error_message = "Usuário ou senha incorretos.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificação de Login</title>
</head>
<body>
    <h2>Verificação de Login</h2>

    <!-- Exibe mensagem de status -->
    <?php if (!empty($status_message)): ?>
        <p style="color:green;"><?php echo $status_message; ?></p>
    <?php endif; ?>

    <!-- Exibe mensagem de erro -->
    <?php if (!empty($error_message)): ?>
        <p style="color:red;"><?php echo htmlspecialchars($error_message); ?></p>
    <?php endif; ?>

    <!-- Formulário de login -->
    <form action="verificar_login.php" method="post">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Entrar</button>
    </form>

    <!-- Link para logout -->
    <?php if (isset($_SESSION['username'])): ?>
        <p><a href="logout.php">Deslogar</a></p>
    <?php endif; ?>
</body>
</html>
