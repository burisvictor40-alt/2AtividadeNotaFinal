<?php
include 'database.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "UPDATE tarefas SET concluida = 1 WHERE id = $id";

    if ($conexao->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao marcar tarefa: " . $conexao->error;
    }
} else {
    echo "ID da tarefa inválido ou não fornecido.";
}

$conexao->close();
?>