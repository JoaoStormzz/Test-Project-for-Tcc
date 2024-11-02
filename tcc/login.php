<?php
session_start();
include 'conexao.php';

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $con->real_escape_string($_POST['username']);
        $password = $con->real_escape_string($_POST['password']);

        $sql = "SELECT * FROM usuarios WHERE username = '$username'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                $_SESSION['username'] = $username;
                header('Location: index.php');
                exit();
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
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="icon" type="image/x-icon" href="images/LogoQuestionPlex.png">
    <title>Entre no QuestionPlex</title>
</head>

<body>
    <header>
        <div class="container" id="myHeader">
            <div class="logo-title">
                <a href="index.php"><img src="images/LogoQuestionPlex.png" height="50px" width="50px"></a>
                <h1>QuestionPlex</h1>
            </div>
            <nav>
                <ul></ul>
            </nav>
        </div>
    </header>

    <div class="login-form">
        <h2>Login</h2>

        <?php if (!empty($error_message)): ?>
            <p style="color:red;"><?php echo htmlspecialchars($error_message); ?></p>
        <?php endif; ?>

        <form action="login.php" method="post">
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

    <script src="scripts/script.js"></script>
</body>
</html>
