<?php
include 'database.php';

$sql_nao_concluidas = "SELECT * FROM tarefas WHERE concluida = 0 ORDER BY data_vencimento ASC";
$result_nao_concluidas = $conexao->query($sql_nao_concluidas);

$sql_concluidas = "SELECT * FROM tarefas WHERE concluida = 1 ORDER BY id DESC";
$result_concluidas = $conexao->query($sql_concluidas);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de Tarefas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .tarefas-lista { margin-top: 20px; }
        .tarefa-item { 
            padding: 10px; margin-bottom: 5px; border: 1px solid #ccc; 
            display: flex; justify-content: space-between; align-items: center;
        }
        .concluida { background-color: #e6ffe6; text-decoration: line-through; }
        .nao-concluida { background-color: #ffe6e6; }
        .botoes a { margin-left: 10px; text-decoration: none; padding: 5px 10px; border-radius: 3px; }
        .btn-concluir { background-color: #4CAF50; color: white; }
        .btn-excluir { background-color: #f44336; color: white; }
    </style>
</head>
<body>

    <h1>📋 Gerenciador de Tarefas</h1>
    
    <h2>Adicionar Nova Tarefa</h2>
    <form method="POST" action="add_tarefa.php">
        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" required size="50">
        
        <label for="data_vencimento">Vencimento:</label>
        <input type="date" id="data_vencimento" name="data_vencimento" required>
        
        <button type="submit">Adicionar</button>
    </form>
    
    <hr>
    
    <h2>🔴 Tarefas Pendentes</h2>
    <div class="tarefas-lista">
        <?php if ($result_nao_concluidas->num_rows > 0): ?>
            <?php while($tarefa = $result_nao_concluidas->fetch_assoc()): ?>
                <div class="tarefa-item nao-concluida">
                    <span>
                        **<?php echo htmlspecialchars($tarefa['descricao']); ?>** (Vencimento: <?php echo date('d/m/Y', strtotime($tarefa['data_vencimento'])); ?>)
                    </span>
                    <div class="botoes">
                        <a href="update_tarefa.php?id=<?php echo $tarefa['id']; ?>" class="btn-concluir">Concluir</a>
                        <a href="delete_tarefa.php?id=<?php echo $tarefa['id']; ?>" class="btn-excluir" 
                           onclick="return confirm('Tem certeza que deseja excluir esta tarefa?');">Excluir</a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>🎉 Nenhuma tarefa pendente! Bom trabalho.</p>
        <?php endif; ?>
    </div>

    <hr>
    
    <h2>🟢 Tarefas Concluídas</h2>
    <div class="tarefas-lista">
        <?php if ($result_concluidas->num_rows > 0): ?>
            <?php while($tarefa = $result_concluidas->fetch_assoc()): ?>
                <div class="tarefa-item concluida">
                    <span>
                        <?php echo htmlspecialchars($tarefa['descricao']); ?> 
                        (Concluída em: <?php echo date('d/m/Y', strtotime($tarefa['data_vencimento'])); ?>)
                    </span>
                    <div class="botoes">
                        <a href="delete_tarefa.php?id=<?php echo $tarefa['id']; ?>" class="btn-excluir" 
                           onclick="return confirm('Tem certeza que deseja excluir esta tarefa?');">Excluir</a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Nenhuma tarefa concluída ainda.</p>
        <?php endif; ?>
    </div>

</body>
</html>
<?php
$conexao->close();
?>