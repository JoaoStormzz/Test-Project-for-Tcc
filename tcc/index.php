<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina inicial</title>
    <link rel="icon" href="images/iconeofc.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js" defer></script>
</head>

<body>
    <header id="page-header-id" class="page-header" role="banner">
        <a href="index.html"><img src="images/iconeofc.png" alt="Ícone" class="icone"></a>
        <nav class="header-buttons">
            <a href="themes">Temas</a>
            <a href="create">Criar</a>
            <a href="config.php">Configurações</a>
            <a href="login.php" id="loginLink">Login</a>
        </nav>
    </header>
    <div class="main-content">
            <div class="search-bar">
                <form action="search.html" method="GET">
                    <input type="text" name="query" placeholder="Buscar..." required />
                    <button type="submit">Pesquisar</button>
                </form>
            </div>

    </div>
</body>

</html>