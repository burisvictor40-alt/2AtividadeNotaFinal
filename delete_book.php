<?php
include 'conexao.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM livros WHERE id = $id";

    if ($conexao->query($sql) === TRUE) {
        echo "Livro com ID $id excluído com sucesso!";
    } else {
        echo "Erro ao excluir: " . $conexao->error;
    }
} else {
    echo "ID do livro inválido ou não fornecido.";
}

$conexao->close();
header("Location: listar.php"); 
exit();
?>