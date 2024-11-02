<?php
session_start(); // Iniciar a sessão
session_unset(); // Limpa todas as variáveis de sessão
session_destroy(); // Destrói a sessão

// Redireciona para a página anterior (index.php)
header('Location: index.php');
exit();
?>
