<?php
include 'conexao.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $conexao->real_escape_string($_POST['titulo']);
    $autor = $conexao->real_escape_string($_POST['autor']);
    $ano = $conexao->real_escape_string($_POST['ano_publicacao']);

    $sql = "INSERT INTO livros (titulo, autor, ano_publicacao) VALUES ('$titulo', '$autor', '$ano')";

    if ($conexao->query($sql) === TRUE) {
        echo "Novo livro adicionado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conexao->error;
    }
}
$conexao->close();
?>

<h2>Adicionar Novo Livro</h2>
<form method="POST" action="adicionar.php">
    Título: <input type="text" name="titulo" required><br><br>
    Autor: <input type="text" name="autor" required><br><br>
    Ano de Publicação: <input type="number" name="ano_publicacao" required><br><br>
    <input type="submit" value="Adicionar Livro">
</form>
<p><a href="listar.php">Ver Lista de Livros</a></p>