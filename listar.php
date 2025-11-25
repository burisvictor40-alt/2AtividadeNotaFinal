<?php
include 'conexao.php';

$sql = "SELECT id, titulo, autor, ano_publicacao FROM livros";
$resultado = $conexao->query($sql);
?>

<h2>Lista de Livros</h2>


<table border="1">
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Autor</th>
        <th>Ano</th>
        <th>Ação</th>
    </tr>
    <?php
    if ($resultado->num_rows > 0) {
        while($livro = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $livro["id"] . "</td>";
            echo "<td>" . $livro["titulo"] . "</td>";
            echo "<td>" . $livro["autor"] . "</td>";
            echo "<td>" . $livro["ano_publicacao"] . "</td>";
            echo "<td><a href='excluir.php?id=" . $livro["id"] . "'>Excluir</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Nenhum livro encontrado.</td></tr>";
    }
    $conexao->close();
    ?>
</table>

<p><a href="adicionar.php">Adicionar Novo Livro</a></p>