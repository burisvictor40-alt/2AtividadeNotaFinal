<?php
include 'database.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM tarefas WHERE id = $id";

    if ($conexao->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao excluir tarefa: " . $conexao->error;
    }
} else {
    echo "ID da tarefa inválido ou não fornecido.";
}

$conexao->close();
?>