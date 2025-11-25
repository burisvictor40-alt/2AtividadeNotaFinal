<?php
$host = 'localhost';
$usuario = 'root'; 
$senha = ''; 
$banco = 'gerenciador_tarefas';

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
}
?>