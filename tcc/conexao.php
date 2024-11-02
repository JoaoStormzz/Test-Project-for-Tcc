<?php

$host = "localhost"; 
$database = "login"; 
$usuario = "root"; 
$senha = ""; 

$con = new mysqli($host, $usuario, $senha, $database);

if ($con->connect_error) {
    echo "<p>Ocorreu um erro ao conectar no BD</p>";
    echo "<p>" . $con->connect_errno . ":" . $con->connect_error . "</p>";
    die("Erro fatal"); 
} 