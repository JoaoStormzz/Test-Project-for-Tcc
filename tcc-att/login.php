<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username_or_email']) && isset($_POST['password'])) {
        $username_or_email = $_POST['username_or_email'];
        $password = $_POST['password'];

        $username_or_email = $con->real_escape_string($username_or_email);
        $password = $con->real_escape_string($password);

        $sql = "SELECT * FROM usuarios WHERE (username = '$username_or_email' OR email = '$username_or_email')";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['username'] = $username_or_email;
                header('Location: index.php');
                exit();
            } else {
                $error_message = "Usuário, email ou senha incorretos.";
            }
        } else {
            $error_message = "Usuário, email ou senha incorretos.";
        }
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

        <?php if (isset($error_message)): ?>
            <p style="color:red;"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <form action="#" method="post">
            <div class="input-group">
                <label for="username_or_email">Usuário ou Email</label>
                <input type="text" id="username_or_email" name="username_or_email" required>
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
