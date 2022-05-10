<?php

$host = 'localhost';
$usuario = 'root';
$senha = '';
$db = 'projetolanchonete';
$conexao = new mysqli($host, $usuario, $senha, $db);

if ($conexao->connect_errno) {
    die("Erro: $conexao->connect_errno");
}
?>