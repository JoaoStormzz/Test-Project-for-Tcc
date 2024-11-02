<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (username, password)
                VALUES ('$username','$hashed_password')";

        // Executar consulta
        if ($con->query($sql) === true) {
            
            header('Location: index.php');
            exit();
        } else {
            echo "<p>Ocorreu um erro ao inserir no banco de dados</p>";
            echo "<p>" . $con->errno . ": " . $con->error . "</p>";
            die();
        }
    } else {
        echo "<p>Erro: todos os campos devem ser preenchidos!</p>";
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
    <title>Cadastre-se no QuestionPlex</title>
</head>

<body>
    <header>
        <div class="container" id="myHeader">
            <div class="logo-title">
                <a href="index.php"><img src="images/LogoQuestionPlex.png" height="50px" width="50px"></a>
                <h1>QuestionPlex</h1>
            </div>
            <nav>
                <ul>
                </ul>
            </nav>
        </div>
    </header>

    <div class="login-form">
        <h2>Cadastrar</h2>

        <?php if (isset($error_message)): ?>
            <p style="color:red;"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <form action="#" method="post">
            <div class="input-group">
                <label for="username">Usuário</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="confirm-password">Confirmar Senha</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>
            <button type="submit" class="login-button">Cadastrar-se</button>
        </form>
        <div class="cadastrar">
            <a href="login.php" id="login-link">Login</a>
        </div>
    </div>

    <script src="scripts/script.js"></script>
</body>

</html>