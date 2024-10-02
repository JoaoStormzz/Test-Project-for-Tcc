<?php
include 'conexao.php';

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar se todas as variáveis estão definidas
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['genero'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $genero = $_POST['genero'];

        // Comando SQL
        $sql = "INSERT INTO usuarios (username, email, password, genero)
                VALUES ('$username', '$email', '$password', '$genero')";

        // Executar consulta
        $result = $con->query($sql);

        if ($result == false) {
            echo "<p>Ocorreu um erro ao inserir no banco de dados</p>";
            echo "<p>" . $con->errno . ": " . $con->error . "</p>";
            die();
        }

        // Após o cadastro bem-sucedido, redirecionar para a página index.php
        header('Location: index.php');
        exit(); // Certifique-se de parar o script após o redirecionamento
    } else {
        echo "<p>Erro: todos os campos devem ser preenchidos!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/iconeofc.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="style/cadastro.css" />
    <title>Cadastro</title>
</head>

<body>
    <div class="cadastro-container">
        <h2>Cadastro</h2>
        <form action="./cadastro.php" method="post">
            <div class="input-group">
                <label for="username">Usuário</label>
                <input type="text" id="username" name="username" required />
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required />
            </div>
            <div class="input-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required />
            </div>
            <div class="input-group">
                <label for="confirm_password">Digite a senha novamente</label>
                <input type="password" id="confirm_password" name="confirm_password" required />
            </div>
            <div class="input-group">
                <label for="gender">Gênero</label>
                <select name="genero" class="select-gender">
                    <option value="m">Homem</option>
                    <option value="w">Mulher</option>
                    <option value="o">Outro</option>
                    <option value="d">Prefiro não informar</option>
                </select>
            </div>
            <button type="submit" class="cadastro-button" href="index.php">Cadastrar</button>
        </form>
        <div class="login">
            <a href="login.php" id="login-link">Login</a>
        </div>
    </div>
</body>

</html>