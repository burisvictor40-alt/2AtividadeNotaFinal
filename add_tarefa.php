<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descricao = $conexao->real_escape_string($_POST['descricao']);
    $data_vencimento = $conexao->real_escape_string($_POST['data_vencimento']);

    $sql = "INSERT INTO tarefas (descricao, data_vencimento) VALUES ('$descricao', '$data_vencimento')";

    if ($conexao->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao adicionar tarefa: " . $conexao->error;
    }
}

$conexao->close();
?>