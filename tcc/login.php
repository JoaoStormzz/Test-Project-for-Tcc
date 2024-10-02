<?php
include 'conexao.php'; // Arquivo que faz a conexão com o banco de dados

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Receber os dados enviados pelo formulário
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Proteger contra SQL Injection
    $username = $con->real_escape_string($username);
    $password = $con->real_escape_string($password);

    // Consultar o banco de dados para verificar se o usuário existe e se a senha está correta
    $sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Se o login for bem-sucedido, iniciar uma sessão
        session_start();
        $_SESSION['username'] = $username;

        // Redirecionar o usuário para a página principal (index.php)
        header('Location: index.php');
        exit();
    } else {
        // Se o login falhar, exibir uma mensagem de erro
        $error_message = "Usuário ou senha incorretos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style/login.css">
    <script src="script/giro.js" defer></script>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="#" method="post">
            <div class="input-group">
                <label for="username">Usuário</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="login-button">Entrar</button>
        </form>
        <div class="cadastrar">
            <a href="cadastro.php" id="cadastrar-link">Cadastro</a>
        </div>
    </div>
</body>

</html>